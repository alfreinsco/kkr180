<?php

namespace App\Filament\Resources\BukuTamus\Tables;

use App\Filament\Exports\BukuTamuExporter;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ExportAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class BukuTamusTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->headerActions([
                ExportAction::make()
                    ->exporter(BukuTamuExporter::class),
            ])
            ->columns([
                TextColumn::make('nama_lengkap')
                    ->label('Nama Lengkap')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('no_telp')
                    ->label('No. Telepon / WA')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('alamat')
                    ->label('Alamat')
                    ->limit(40)
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('asal_kampus')
                    ->label('Asal Kampus')
                    ->placeholder('-')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('pernah_ikut')
                    ->label('Pernah CG')
                    ->formatStateUsing(fn (string $state): string => $state === 'sudah' ? 'Sudah' : 'Belum')
                    ->badge()
                    ->color(fn (string $state): string => $state === 'sudah' ? 'success' : 'gray'),
                TextColumn::make('nama_cgl')
                    ->label('Nama CGL')
                    ->placeholder('-')
                    ->searchable()
                    ->toggleable(),
                TextColumn::make('created_at')
                    ->label('Tanggal')
                    ->dateTime('d/m/Y H:i')
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
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
