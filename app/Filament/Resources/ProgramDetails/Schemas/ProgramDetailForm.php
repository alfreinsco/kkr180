<?php

namespace App\Filament\Resources\ProgramDetails\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ProgramDetailForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                FileUpload::make('gambar')
                    ->label('Gambar')
                    ->image()
                    ->directory('program_details')
                    ->disk('public')
                    ->visibility('public')
                    ->columnSpanFull(),
                TextInput::make('waktu')
                    ->label('Waktu')
                    ->required()
                    ->maxLength(255)
                    ->placeholder('Contoh: 18:30-19:30 WIT'),
                TextInput::make('judul')
                    ->label('Judul')
                    ->required()
                    ->maxLength(255)
                    ->placeholder('Contoh: Praise and Worship'),
                TextInput::make('urutan')
                    ->label('Urutan tampil')
                    ->numeric()
                    ->default(0)
                    ->minValue(0)
                    ->helperText('Angka kecil tampil lebih dulu'),
            ]);
    }
}
