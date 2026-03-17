<?php

namespace App\Filament\Resources\SponsorLogos\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class SponsorLogoForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                FileUpload::make('logo')
                    ->label('Logo')
                    ->image()
                    ->directory('sponsors')
                    ->disk('public')
                    ->visibility('public')
                    ->columnSpanFull(),
                TextInput::make('nama')
                    ->label('Nama Sponsor')
                    ->placeholder('Contoh: GM Sambon')
                    ->maxLength(255),
                TextInput::make('urutan')
                    ->label('Urutan tampil')
                    ->numeric()
                    ->default(0)
                    ->minValue(0)
                    ->helperText('Angka kecil tampil lebih dulu'),
            ]);
    }
}
