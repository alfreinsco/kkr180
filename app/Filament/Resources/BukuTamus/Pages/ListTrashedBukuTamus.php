<?php

namespace App\Filament\Resources\BukuTamus\Pages;

use App\Filament\Resources\BukuTamus\BukuTamuResource;
use App\Filament\Resources\Concerns\ConfiguresTrashedListPage;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Contracts\Support\Htmlable;

class ListTrashedBukuTamus extends ListRecords
{
    use ConfiguresTrashedListPage;

    protected static string $resource = BukuTamuResource::class;

    public function getTitle(): string|Htmlable
    {
        return 'Data terhapus — Buku Tamu';
    }
}
