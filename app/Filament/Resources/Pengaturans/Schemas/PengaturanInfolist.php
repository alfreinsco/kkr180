<?php

namespace App\Filament\Resources\Pengaturans\Schemas;

use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class PengaturanInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                ImageEntry::make('logo')
                    ->label('Logo')
                    ->disk('public')
                    ->visibility('public')
                    ->defaultImageUrl(asset('img/logo.png')),
                TextEntry::make('lebar_logo')
                    ->label('Lebar Logo (px)'),
                TextEntry::make('tinggi_logo')
                    ->label('Tinggi Logo (px)'),
                TextEntry::make('tanggal_kegiatan')
                    ->label('Tanggal Kegiatan')
                    ->date('d F Y'),
                TextEntry::make('judul_kegiatan')
                    ->label('Judul Kegiatan'),
                TextEntry::make('sub_judul_kegiatan')
                    ->label('Sub Judul Kegiatan'),
                TextEntry::make('lokasi_kegiatan')
                    ->label('Lokasi Kegiatan')
                    ->columnSpanFull(),
                TextEntry::make('created_at')
                    ->label('Dibuat')
                    ->dateTime('d/m/Y H:i'),
                TextEntry::make('updated_at')
                    ->label('Diperbarui')
                    ->dateTime('d/m/Y H:i'),
            ]);
    }
}
