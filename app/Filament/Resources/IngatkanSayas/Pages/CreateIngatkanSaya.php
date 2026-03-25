<?php

namespace App\Filament\Resources\IngatkanSayas\Pages;

use App\Filament\Resources\IngatkanSayas\IngatkanSayaResource;
use Filament\Resources\Pages\CreateRecord;

class CreateIngatkanSaya extends CreateRecord
{
    protected static string $resource = IngatkanSayaResource::class;

    protected static ?string $title = 'Tambah Pendaftar';
}
