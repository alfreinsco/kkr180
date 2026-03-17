<?php

namespace App\Filament\Resources\Tentangs\Schemas;

use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class TentangInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                ImageEntry::make('gambar')
                    ->label('Gambar')
                    ->disk('public')
                    ->visibility('public')
                    ->defaultImageUrl(asset('img/kkr.png')),
                TextEntry::make('judul')
                    ->label('Judul'),
                TextEntry::make('deskripsi')
                    ->label('Deskripsi')
                    ->columnSpanFull(),
                TextEntry::make('subjudul')
                    ->label('Subjudul'),
                TextEntry::make('deskripsi_singkat')
                    ->label('Deskripsi Singkat')
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
