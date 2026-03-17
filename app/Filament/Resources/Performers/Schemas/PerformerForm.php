<?php

namespace App\Filament\Resources\Performers\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class PerformerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                FileUpload::make('foto')
                    ->label('Foto')
                    ->image()
                    ->directory('performers')
                    ->disk('public')
                    ->visibility('public')
                    ->columnSpanFull(),
                TextInput::make('nama')
                    ->label('Nama')
                    ->required()
                    ->maxLength(255)
                    ->placeholder('Contoh: PDT. Hendra Stefanus'),
                TextInput::make('peran')
                    ->label('Peran / Jabatan')
                    ->required()
                    ->maxLength(255)
                    ->placeholder('Contoh: Pelayan Firman'),
                TextInput::make('urutan')
                    ->label('Urutan tampil')
                    ->numeric()
                    ->default(0)
                    ->minValue(0)
                    ->helperText('Angka kecil tampil lebih dulu'),
            ]);
    }
}
