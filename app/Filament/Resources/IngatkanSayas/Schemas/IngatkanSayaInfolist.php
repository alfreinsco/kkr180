<?php

namespace App\Filament\Resources\IngatkanSayas\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class IngatkanSayaInfolist
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
                TextEntry::make('pernah_ikut')
                    ->label('Pernah mengikuti CG')
                    ->formatStateUsing(fn (string $state): string => $state === 'sudah' ? 'Sudah' : 'Belum'),
                TextEntry::make('nama_cgl')
                    ->label('Nama CGL')
                    ->placeholder('-'),
                TextEntry::make('created_at')
                    ->label('Didaftarkan')
                    ->dateTime('d/m/Y H:i'),
                TextEntry::make('updated_at')
                    ->label('Diperbarui')
                    ->dateTime('d/m/Y H:i'),
            ]);
    }
}
