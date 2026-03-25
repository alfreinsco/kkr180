<?php

namespace App\Filament\Pages;

use App\Jobs\SendPesanWhatsAppJob;
use App\Models\BukuTamu;
use App\Models\IngatkanSaya;
use App\Models\Pengaturan;
use BackedEnum;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Support\Icons\Heroicon;

class KirimPesanWhatsApp extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $navigationLabel = 'Kirim Pesan WhatsApp';

    protected static ?string $title = 'Kirim Pesan WhatsApp';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedChatBubbleLeftRight;

    protected static string|\UnitEnum|null $navigationGroup = 'Data & Pendaftaran';

    protected static ?int $navigationSort = 3;

    protected static ?string $slug = 'kirim-pesan-whatsapp';

    protected string $view = 'filament.pages.kirim-pesan-whatsapp';

    /**
     * @var array<string, mixed>
     */
    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill([
            'sumber' => SendPesanWhatsAppJob::SOURCE_PENDAFTAR,
            'mode' => 'semua',
            'recipient_ids' => [],
            'pesan' => '',
        ]);
    }

    protected function getFormStatePath(): ?string
    {
        return 'data';
    }

    protected function getFormSchema(): array
    {
        return [
            Radio::make('sumber')
                ->label('Sumber data')
                ->options([
                    SendPesanWhatsAppJob::SOURCE_PENDAFTAR => 'Data Pendaftar (Ingatkan Saya)',
                    SendPesanWhatsAppJob::SOURCE_BUKU_TAMU => 'Buku Tamu',
                ])
                ->required()
                ->inline()
                ->live()
                ->afterStateUpdated(fn (Set $set) => $set('recipient_ids', []))
                ->columnSpanFull(),
            Radio::make('mode')
                ->label('Penerima')
                ->options([
                    'semua' => 'Semua data (nomor WA terisi)',
                    'pilih' => 'Pilih secara manual',
                ])
                ->required()
                ->reactive()
                ->inline()
                ->columnSpanFull(),
            Select::make('recipient_ids')
                ->label('Pilih data')
                ->multiple()
                ->searchable()
                ->preload()
                ->reactive()
                ->options(function (Get $get): array {
                    if ($get('sumber') === SendPesanWhatsAppJob::SOURCE_BUKU_TAMU) {
                        return BukuTamu::query()
                            ->orderBy('nama_lengkap')
                            ->get()
                            ->mapWithKeys(fn (BukuTamu $b): array => [
                                $b->id => $b->nama_lengkap.($b->no_telp ? ' ('.$b->no_telp.')' : ' [tanpa WA]'),
                            ])
                            ->all();
                    }

                    return IngatkanSaya::query()
                        ->orderBy('nama_lengkap')
                        ->get()
                        ->mapWithKeys(fn (IngatkanSaya $p): array => [
                            $p->id => $p->nama_lengkap.($p->no_telp ? ' ('.$p->no_telp.')' : ' [tanpa WA]'),
                        ])
                        ->all();
                })
                ->visible(fn (Get $get): bool => $get('mode') === 'pilih')
                ->required(fn (Get $get): bool => $get('mode') === 'pilih')
                ->columnSpanFull(),
            Textarea::make('pesan')
                ->label('Isi pesan WhatsApp')
                ->required()
                ->minLength(1)
                ->maxLength(5000)
                ->rows(10)
                ->helperText('Gunakan {nama} untuk nama, dan {link_undangan} untuk link: pada Data Pendaftar berupa link undangan digital; pada Buku Tamu berupa link ke halaman utama acara. Tanpa placeholder, teks sama untuk semua penerima.')
                ->columnSpanFull(),
        ];
    }

    public function kirim(): void
    {
        $state = $this->form->getState();

        $pengaturan = Pengaturan::aktif();
        $apiUrl = trim((string) ($pengaturan?->whatsapp_api_url ?? ''));
        $sessionId = trim((string) ($pengaturan?->whatsapp_session_id ?? ''));

        if ($apiUrl === '' || $sessionId === '') {
            Notification::make()
                ->title('Pengaturan WhatsApp belum lengkap')
                ->body('Isi WhatsApp Session ID dan WhatsApp API URL di modul Pengaturan.')
                ->danger()
                ->send();

            return;
        }

        $pesan = trim((string) ($state['pesan'] ?? ''));
        if ($pesan === '') {
            Notification::make()
                ->title('Pesan kosong')
                ->warning()
                ->send();

            return;
        }

        $sumber = $state['sumber'] ?? SendPesanWhatsAppJob::SOURCE_PENDAFTAR;
        if (! in_array($sumber, [SendPesanWhatsAppJob::SOURCE_PENDAFTAR, SendPesanWhatsAppJob::SOURCE_BUKU_TAMU], true)) {
            $sumber = SendPesanWhatsAppJob::SOURCE_PENDAFTAR;
        }

        $mode = $state['mode'] ?? 'semua';

        if ($mode === 'semua') {
            $ids = $this->resolveAllIds($sumber);
        } else {
            /** @var array<int|string> $raw */
            $raw = $state['recipient_ids'] ?? [];
            $candidateIds = array_values(array_unique(array_map('intval', $raw)));
            $ids = $this->resolveFilteredIds($sumber, $candidateIds);
        }

        if ($ids === []) {
            Notification::make()
                ->title('Tidak ada penerima')
                ->body($mode === 'semua'
                    ? 'Belum ada data dengan nomor WhatsApp untuk sumber ini.'
                    : 'Pilih minimal satu data dengan nomor WhatsApp.')
                ->warning()
                ->send();

            return;
        }

        foreach ($ids as $id) {
            SendPesanWhatsAppJob::dispatch($id, $pesan, $sumber);
        }

        Notification::make()
            ->title('Pesan dimasukkan ke antrean')
            ->body(count($ids).' pengiriman akan diproses lewat job.')
            ->success()
            ->send();
    }

    /**
     * @return list<int>
     */
    private function resolveAllIds(string $sumber): array
    {
        if ($sumber === SendPesanWhatsAppJob::SOURCE_BUKU_TAMU) {
            return BukuTamu::query()
                ->whereNotNull('no_telp')
                ->where('no_telp', '!=', '')
                ->pluck('id')
                ->map(fn ($id): int => (int) $id)
                ->all();
        }

        return IngatkanSaya::query()
            ->whereNotNull('no_telp')
            ->where('no_telp', '!=', '')
            ->pluck('id')
            ->map(fn ($id): int => (int) $id)
            ->all();
    }

    /**
     * @param  list<int>  $candidateIds
     * @return list<int>
     */
    private function resolveFilteredIds(string $sumber, array $candidateIds): array
    {
        if ($sumber === SendPesanWhatsAppJob::SOURCE_BUKU_TAMU) {
            return BukuTamu::query()
                ->whereIn('id', $candidateIds)
                ->whereNotNull('no_telp')
                ->where('no_telp', '!=', '')
                ->pluck('id')
                ->map(fn ($id): int => (int) $id)
                ->all();
        }

        return IngatkanSaya::query()
            ->whereIn('id', $candidateIds)
            ->whereNotNull('no_telp')
            ->where('no_telp', '!=', '')
            ->pluck('id')
            ->map(fn ($id): int => (int) $id)
            ->all();
    }
}
