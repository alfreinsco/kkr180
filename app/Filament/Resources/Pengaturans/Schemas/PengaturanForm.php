<?php

namespace App\Filament\Resources\Pengaturans\Schemas;

use Carbon\Carbon;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class PengaturanForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                FileUpload::make('logo')
                    ->label('Logo')
                    ->image()
                    ->directory('logos')
                    ->disk('public')
                    ->visibility('public')
                    ->imageResizeMode('cover')
                    ->columnSpanFull(),
                TextInput::make('lebar_logo')
                    ->label('Lebar Logo (px)')
                    ->numeric()
                    ->default(150)
                    ->minValue(1)
                    ->maxValue(500)
                    ->required(),
                TextInput::make('tinggi_logo')
                    ->label('Tinggi Logo (px)')
                    ->numeric()
                    ->default(150)
                    ->minValue(1)
                    ->maxValue(500)
                    ->required(),
                DatePicker::make('tanggal_kegiatan')
                    ->label('Tanggal Kegiatan')
                    ->displayFormat('d/m/Y')
                    ->native(false),
                DateTimePicker::make('countdown_at')
                    ->label('Countdown Acara (Tanggal & Jam)')
                    ->displayFormat('d/m/Y H:i')
                    ->native(false)
                    ->default(fn (): Carbon => Carbon::parse('2026-03-27 18:30:00', config('app.timezone'))),
                TextInput::make('judul_kegiatan')
                    ->label('Judul Kegiatan')
                    ->placeholder('Contoh: KKR 180°')
                    ->maxLength(255),
                TextInput::make('sub_judul_kegiatan')
                    ->label('Sub Judul Kegiatan')
                    ->placeholder('Contoh: FREEDOM')
                    ->maxLength(255),
                Textarea::make('lokasi_kegiatan')
                    ->label('Lokasi Kegiatan')
                    ->placeholder('Contoh: Aula Lantai 2 Universitas Pattimura')
                    ->rows(3)
                    ->columnSpanFull(),
                Textarea::make('peta_embed_url')
                    ->label('URL Embed Peta (Google Maps)')
                    ->placeholder('Tempel URL embed dari Google Maps (Share → Embed a map)')
                    ->rows(4)
                    ->columnSpanFull()
                    ->helperText('Kosongkan jika peta tidak ingin ditampilkan.'),
                TextInput::make('whatsapp_session_id')
                    ->label('WhatsApp Session ID')
                    ->placeholder('Contoh: kkr-session-01')
                    ->maxLength(255),
                Textarea::make('whatsapp_api_url')
                    ->label('WhatsApp API URL')
                    ->placeholder('Contoh: https://api.whatsapp.example.com/send-message')
                    ->rows(3)
                    ->helperText('URL endpoint API WhatsApp yang digunakan sistem.'),
                TextInput::make('whatsapp_send_delay_seconds')
                    ->label('Jeda antar pesan WA (detik)')
                    ->numeric()
                    ->minValue(0)
                    ->maxValue(65535)
                    ->placeholder('Kosongkan untuk pakai default (.env / config)')
                    ->helperText('Antar tiap pengiriman broadcast dijadwalkan bergantian (0 detik, lalu jeda, 2× jeda, …). Mengurangi risiko nomor diblokir. Kosong = pakai WHATSAPP_SEND_DELAY_SECONDS (default 20).'),
            ]);
    }
}
