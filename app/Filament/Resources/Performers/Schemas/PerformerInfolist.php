<?php

namespace App\Filament\Resources\Performers\Schemas;

use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class PerformerInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                ImageEntry::make('foto')
                    ->label('Foto')
                    ->disk('public')
                    ->visibility('public'),
                TextEntry::make('nama')
                    ->label('Nama'),
                TextEntry::make('peran')
                    ->label('Peran / Jabatan'),
                TextEntry::make('urutan')
                    ->label('Urutan'),
                TextEntry::make('created_at')
                    ->label('Dibuat')
                    ->dateTime('d/m/Y H:i'),
            ]);
    }
}
