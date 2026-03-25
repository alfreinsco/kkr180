<?php

namespace App\Filament\Resources\IngatkanSayas\Pages;

use App\Filament\Resources\Concerns\ConfiguresTrashedListPage;
use App\Filament\Resources\IngatkanSayas\IngatkanSayaResource;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Contracts\Support\Htmlable;

class ListTrashedIngatkanSayas extends ListRecords
{
    use ConfiguresTrashedListPage;

    protected static string $resource = IngatkanSayaResource::class;

    public function getTitle(): string|Htmlable
    {
        return 'Data terhapus — Ingatkan Saya';
    }
}
