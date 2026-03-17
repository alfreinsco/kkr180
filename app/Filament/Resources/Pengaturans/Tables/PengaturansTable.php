<?php

namespace App\Filament\Resources\Pengaturans\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PengaturansTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('logo')
                    ->label('Logo')
                    ->disk('public')
                    ->visibility('public')
                    ->defaultImageUrl(asset('img/logo.png'))
                    ->circular(),
                TextColumn::make('judul_kegiatan')
                    ->label('Judul Kegiatan')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('sub_judul_kegiatan')
                    ->label('Sub Judul')
                    ->searchable()
                    ->toggleable(),
                TextColumn::make('tanggal_kegiatan')
                    ->label('Tanggal')
                    ->date('d/m/Y')
                    ->sortable(),
                TextColumn::make('lokasi_kegiatan')
                    ->label('Lokasi')
                    ->limit(30)
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
