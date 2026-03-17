<?php

namespace App\Filament\Widgets;

use App\Filament\Resources\IngatkanSayas\IngatkanSayaResource;
use App\Models\IngatkanSaya;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;

class IngatkanSayaTerbaru extends TableWidget
{
    protected static ?int $sort = 4;

    protected static ?string $heading = 'Ingatkan Saya Terbaru';

    protected int | string | array $columnSpan = [
        'md' => 1,
        'xl' => 1,
    ];

    public function table(Table $table): Table
    {
        return $table
            ->query(
                IngatkanSaya::query()->orderByDesc('created_at')->limit(8)
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
                    ->label('Daftar')
                    ->dateTime('d/m H:i')
                    ->sortable(false),
            ])
            ->recordUrl(fn (IngatkanSaya $record): string => IngatkanSayaResource::getUrl('view', ['record' => $record]))
            ->paginated([5, 8])
            ->striped();
    }
}
