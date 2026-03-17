<?php

namespace App\Filament\Resources\SponsorLogos\Schemas;

use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class SponsorLogoInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                ImageEntry::make('logo')
                    ->label('Logo')
                    ->disk('public')
                    ->visibility('public'),
                TextEntry::make('nama')
                    ->label('Nama Sponsor')
                    ->placeholder('-'),
                TextEntry::make('urutan')
                    ->label('Urutan'),
                TextEntry::make('created_at')
                    ->label('Dibuat')
                    ->dateTime('d/m/Y H:i'),
            ]);
    }
}
