<?php

namespace App\Filament\Resources\BukuTamus\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class BukuTamuInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('nama_lengkap')
                    ->label('Nama Lengkap'),
                TextEntry::make('no_telp')
                    ->label('Nomor Telepon / WhatsApp'),
                TextEntry::make('alamat')
                    ->label('Alamat')
                    ->columnSpanFull(),
                TextEntry::make('asal_kampus')
                    ->label('Asal Kampus')
                    ->placeholder('-'),
                TextEntry::make('pernah_ikut')
                    ->label('Pernah mengikuti CG')
                    ->formatStateUsing(fn (string $state): string => $state === 'sudah' ? 'Sudah' : 'Belum'),
                TextEntry::make('nama_cgl')
                    ->label('Nama CGL')
                    ->placeholder('-'),
                TextEntry::make('created_at')
                    ->label('Tanggal')
                    ->dateTime('d F Y, H:i'),
            ]);
    }
}
