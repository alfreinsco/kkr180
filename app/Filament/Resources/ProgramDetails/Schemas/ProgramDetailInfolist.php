<?php

namespace App\Filament\Resources\ProgramDetails\Schemas;

use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class ProgramDetailInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                ImageEntry::make('gambar')
                    ->label('Gambar')
                    ->disk('public')
                    ->visibility('public'),
                TextEntry::make('waktu')
                    ->label('Waktu'),
                TextEntry::make('judul')
                    ->label('Judul'),
                TextEntry::make('urutan')
                    ->label('Urutan'),
                TextEntry::make('created_at')
                    ->label('Dibuat')
                    ->dateTime('d/m/Y H:i'),
            ]);
    }
}
