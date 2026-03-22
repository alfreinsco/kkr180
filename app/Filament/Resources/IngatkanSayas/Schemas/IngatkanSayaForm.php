<?php

namespace App\Filament\Resources\IngatkanSayas\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Schema;

class IngatkanSayaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama_lengkap')
                    ->label('Nama Lengkap')
                    ->required()
                    ->maxLength(255),
                TextInput::make('no_telp')
                    ->label('Nomor Telepon / WhatsApp')
                    ->tel()
                    ->required()
                    ->maxLength(20)
                    ->regex('/^[0-9+\s\-()]+$/')
                    ->validationMessages(['regex' => 'Nomor telepon hanya boleh berisi angka dan format nomor (+, spasi, strip).']),
                Textarea::make('alamat')
                    ->label('Alamat')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('asal_kampus')
                    ->label('Asal Kampus')
                    ->maxLength(255),
                TextInput::make('umur')
                    ->label('Umur')
                    ->numeric()
                    ->minValue(0)
                    ->maxValue(120)
                    ->helperText('Opsional. Isi jika ingin dicatat.'),
                Select::make('pernah_ikut')
                    ->label('Sudah pernah mengikuti CG (Connect Group) sebelumnya?')
                    ->options([
                        'belum' => 'Belum',
                        'sudah' => 'Sudah',
                    ])
                    ->default('belum')
                    ->required()
                    ->live(),
                TextInput::make('nama_cgl')
                    ->label('Nama CGL (Connect Group Leader)')
                    ->placeholder('Nama CGL')
                    ->visible(fn (Get $get): bool => $get('pernah_ikut') === 'sudah')
                    ->required(fn (Get $get): bool => $get('pernah_ikut') === 'sudah')
                    ->maxLength(255),
            ]);
    }
}
