<?php

namespace App\Jobs;

use App\Models\BukuTamu;
use App\Models\IngatkanSaya;
use App\Models\Pengaturan;
use App\Support\UndanganUrl;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class SendPesanWhatsAppJob implements ShouldQueue
{
    use Queueable;

    public const SOURCE_PENDAFTAR = 'pendaftar';

    public const SOURCE_BUKU_TAMU = 'buku_tamu';

    public function __construct(
        public int $recordId,
        public string $messageTemplate,
        public string $source = self::SOURCE_PENDAFTAR,
    ) {}

    public function handle(): void
    {
        $pengaturan = Pengaturan::aktif();
        $penerima = $this->resolveRecipient();

        if (! $penerima || ! $pengaturan) {
            return;
        }

        $apiUrl = trim((string) ($pengaturan->whatsapp_api_url ?? ''));
        $sessionId = trim((string) ($pengaturan->whatsapp_session_id ?? ''));

        if ($apiUrl === '' || $sessionId === '' || blank($penerima->no_telp)) {
            return;
        }

        $text = $this->composeMessage($penerima, $this->messageTemplate);

        $sendTextEndpoint = $this->resolveSendTextEndpoint($apiUrl);
        $payload = [
            'session' => $sessionId,
            'to' => $penerima->no_telp,
            'text' => $text,
            'is_group' => false,
        ];

        try {
            Http::timeout(25)
                ->acceptJson()
                ->asJson()
                ->post($sendTextEndpoint, $payload)
                ->throw();
        } catch (\Throwable $e) {
            Log::error('Gagal kirim pesan WhatsApp kustom.', [
                'source' => $this->source,
                'record_id' => $this->recordId,
                'phone' => $penerima->no_telp,
                'api_url' => $sendTextEndpoint,
                'error' => $e->getMessage(),
            ]);

            throw $e;
        }
    }

    private function resolveRecipient(): IngatkanSaya|BukuTamu|null
    {
        if ($this->source === self::SOURCE_BUKU_TAMU) {
            return BukuTamu::query()->find($this->recordId);
        }

        return IngatkanSaya::query()->find($this->recordId);
    }

    /**
     * @param  IngatkanSaya|BukuTamu  $penerima
     */
    private function composeMessage(Model $penerima, string $template): string
    {
        $link = $this->invitationLink();

        return str_replace(
            ['{nama}', '{link_undangan}'],
            [$penerima->nama_lengkap ?? '', $link],
            $template
        );
    }

    private function invitationLink(): string
    {
        if ($this->source === self::SOURCE_BUKU_TAMU) {
            return url('/');
        }

        return UndanganUrl::forPendaftarId($this->recordId);
    }

    private function resolveSendTextEndpoint(string $apiUrl): string
    {
        $trimmed = rtrim($apiUrl, '/');

        if (str_contains($trimmed, '/message/send-text')) {
            return $trimmed;
        }

        if (str_ends_with($trimmed, '/send-message')) {
            $trimmed = substr($trimmed, 0, -strlen('/send-message'));
        }

        return $trimmed.'/message/send-text';
    }
}
