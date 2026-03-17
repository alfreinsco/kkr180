<?php

namespace App\Filament\Resources\Tentangs\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class TentangForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                FileUpload::make('gambar')
                    ->label('Gambar')
                    ->image()
                    ->directory('tentang')
                    ->disk('public')
                    ->visibility('public')
                    ->columnSpanFull(),
                TextInput::make('judul')
                    ->label('Judul')
                    ->placeholder('Contoh: Tentang KKR 180°')
                    ->maxLength(255),
                Textarea::make('deskripsi')
                    ->label('Deskripsi')
                    ->placeholder('Paragraf panjang di atas...')
                    ->rows(5)
                    ->columnSpanFull(),
                TextInput::make('subjudul')
                    ->label('Subjudul / Tagline')
                    ->placeholder('Contoh: Saatnya berubah. Saatnya berbalik 180° kepada Tuhan.')
                    ->maxLength(255),
                Textarea::make('deskripsi_singkat')
                    ->label('Deskripsi Singkat')
                    ->placeholder('Paragraf pendek di kanan...')
                    ->rows(3)
                    ->columnSpanFull(),
            ]);
    }
}
