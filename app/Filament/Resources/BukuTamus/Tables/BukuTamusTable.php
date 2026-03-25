<?php

namespace App\Filament\Resources\BukuTamus\Tables;

use App\Filament\Exports\BukuTamuExporter;
use App\Models\BukuTamu;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ExportAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\Indicator;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

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
                TextColumn::make('umur')
                    ->label('Umur')
                    ->placeholder('-')
                    ->sortable()
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
                TrashedFilter::make(),
                SelectFilter::make('pernah_ikut')
                    ->label('Pernah CG')
                    ->options([
                        'sudah' => 'Sudah',
                        'belum' => 'Belum',
                    ]),
                SelectFilter::make('asal_kampus')
                    ->label('Asal Kampus')
                    ->options(fn (): array => BukuTamu::query()
                        ->whereNotNull('asal_kampus')
                        ->where('asal_kampus', '!=', '')
                        ->distinct()
                        ->orderBy('asal_kampus')
                        ->pluck('asal_kampus', 'asal_kampus')
                        ->all())
                    ->searchable()
                    ->preload(),
                // Filter::make('tanggal_daftar')
                //     ->label('Tanggal daftar')
                //     ->schema([
                //         DatePicker::make('dari')->label('Dari tanggal')->native(false),
                //         DatePicker::make('sampai')->label('Sampai tanggal')->native(false),
                //     ])
                //     ->query(function (Builder $query, array $data): Builder {
                //         if (! empty($data['dari'])) {
                //             $query->whereDate('created_at', '>=', $data['dari']);
                //         }
                //         if (! empty($data['sampai'])) {
                //             $query->whereDate('created_at', '<=', $data['sampai']);
                //         }

                //         return $query;
                //     })
                //     ->indicateUsing(function (array $data): array {
                //         $indicators = [];
                //         if (! empty($data['dari'])) {
                //             $indicators[] = Indicator::make('Dari: '.$data['dari']);
                //         }
                //         if (! empty($data['sampai'])) {
                //             $indicators[] = Indicator::make('Sampai: '.$data['sampai']);
                //         }

                //         return $indicators;
                //     }),
            ], layout: FiltersLayout::AboveContent)
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
