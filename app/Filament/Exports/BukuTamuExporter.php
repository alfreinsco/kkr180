<?php

namespace App\Filament\Exports;

use App\Models\BukuTamu;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;
use Illuminate\Support\Number;

class BukuTamuExporter extends Exporter
{
    protected static ?string $model = BukuTamu::class;

    public static function getColumns(): array
    {
        return [
            ExportColumn::make('id')
                ->label('ID'),
            ExportColumn::make('nama_lengkap')
                ->label('Nama Lengkap'),
            ExportColumn::make('no_telp')
                ->label('No. Telepon / WA'),
            ExportColumn::make('alamat')
                ->label('Alamat'),
            ExportColumn::make('pernah_ikut')
                ->label('Pernah CG')
                ->formatStateUsing(fn (string $state): string => $state === 'sudah' ? 'Sudah' : 'Belum'),
            ExportColumn::make('nama_cgl')
                ->label('Nama CGL'),
            ExportColumn::make('created_at')
                ->label('Tanggal')
                ->formatStateUsing(fn ($state) => $state ? \Carbon\Carbon::parse($state)->format('d/m/Y H:i') : ''),
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Export Buku Tamu selesai. ' . Number::format($export->successful_rows) . ' baris berhasil diekspor.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' ' . Number::format($failedRowsCount) . ' baris gagal.';
        }

        return $body;
    }
}
