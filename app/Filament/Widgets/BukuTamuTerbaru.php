<?php

namespace App\Filament\Widgets;

use App\Filament\Resources\BukuTamus\BukuTamuResource;
use App\Models\BukuTamu;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;

class BukuTamuTerbaru extends TableWidget
{
    protected static ?int $sort = 3;

    protected static ?string $heading = 'Buku Tamu Terbaru';

    protected int | string | array $columnSpan = [
        'md' => 1,
        'xl' => 1,
    ];

    public function table(Table $table): Table
    {
        return $table
            ->query(
                BukuTamu::query()->orderByDesc('created_at')->limit(8)
            )
            ->columns([
                TextColumn::make('nama_lengkap')
                    ->label('Nama')
                    ->limit(25)
                    ->searchable(false),
                TextColumn::make('no_telp')
                    ->label('No. WA')
                    ->limit(15),
                TextColumn::make('created_at')
                    ->label('Waktu')
                    ->dateTime('d/m H:i')
                    ->sortable(false),
            ])
            ->recordUrl(fn (BukuTamu $record): string => BukuTamuResource::getUrl('view', ['record' => $record]))
            ->paginated([5, 8])
            ->striped();
    }
}
