<?php

namespace App\Filament\Exports;

use App\Models\IngatkanSaya;
use Carbon\Carbon;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;
use Illuminate\Support\Number;

class IngatkanSayaExporter extends Exporter
{
    protected static ?string $model = IngatkanSaya::class;

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
            ExportColumn::make('asal_kampus')
                ->label('Asal Kampus'),
            ExportColumn::make('umur')
                ->label('Umur'),
            ExportColumn::make('pernah_ikut')
                ->label('Pernah CG')
                ->formatStateUsing(fn (string $state): string => $state === 'sudah' ? 'Sudah' : 'Belum'),
            ExportColumn::make('nama_cgl')
                ->label('Nama CGL'),
            ExportColumn::make('created_at')
                ->label('Tanggal Daftar')
                ->formatStateUsing(fn ($state) => $state ? Carbon::parse($state)->format('d/m/Y H:i') : ''),
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Export Ingatkan Saya selesai. '.Number::format($export->successful_rows).' baris berhasil diekspor.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' '.Number::format($failedRowsCount).' baris gagal.';
        }

        return $body;
    }
}
