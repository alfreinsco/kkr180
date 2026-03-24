<?php

namespace App\Jobs;

use App\Models\IngatkanSaya;
use App\Models\Pengaturan;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class SendUndanganWhatsAppJob implements ShouldQueue
{
    use Queueable;

    public function __construct(public int $ingatkanSayaId) {}

    public function handle(): void
    {
        $pengaturan = Pengaturan::aktif();
        $penerima = IngatkanSaya::find($this->ingatkanSayaId);

        if (! $penerima || ! $pengaturan) {
            return;
        }

        $apiUrl = trim((string) ($pengaturan->whatsapp_api_url ?? ''));
        $sessionId = trim((string) ($pengaturan->whatsapp_session_id ?? ''));

        if ($apiUrl === '' || $sessionId === '' || blank($penerima->no_telp)) {
            return;
        }

        $encryptedId = Crypt::encryptString((string) $penerima->id);
        $undanganUrl = route('undangan.show', ['encryptedId' => $encryptedId]);

        $message = $this->composeMessage($penerima->nama_lengkap, $undanganUrl);

        $sendTextEndpoint = $this->resolveSendTextEndpoint($apiUrl);
        $payload = [
            'session' => $sessionId,
            'to' => $penerima->no_telp,
            'text' => $message,
            'is_group' => false,
        ];

        try {
            Http::timeout(25)
                ->acceptJson()
                ->asJson()
                ->post($sendTextEndpoint, $payload)
                ->throw();
        } catch (\Throwable $e) {
            Log::error('Gagal kirim undangan WhatsApp.', [
                'ingatkan_saya_id' => $penerima->id,
                'phone' => $penerima->no_telp,
                'api_url' => $sendTextEndpoint,
                'error' => $e->getMessage(),
            ]);

            throw $e;
        }
    }

    private function composeMessage(string $nama, string $undanganUrl): string
    {
        return "Shalom {$nama},\n\n".
            "Kami mengundang kamu untuk hadir di KKR 180°.\n".
            "Undangan resmi kamu bisa diakses melalui link berikut:\n{$undanganUrl}\n\n".
            "Mohon tunjukkan QR pada saat registrasi kedatangan.\n\n".
            'Terima kasih, Tuhan Yesus memberkati.';
    }

    private function resolveSendTextEndpoint(string $apiUrl): string
    {
        $trimmed = rtrim($apiUrl, '/');

        if (str_contains($trimmed, '/message/send-text')) {
            return $trimmed;
        }

        // Kompatibilitas: jika sebelumnya disimpan endpoint lama /send-message,
        // potong kembali ke base URL gateway.
        if (str_ends_with($trimmed, '/send-message')) {
            $trimmed = substr($trimmed, 0, -strlen('/send-message'));
        }

        return $trimmed.'/message/send-text';
    }
}
