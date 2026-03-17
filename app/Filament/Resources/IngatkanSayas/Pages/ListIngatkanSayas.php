<?php

namespace App\Filament\Resources\IngatkanSayas\Pages;

use App\Filament\Resources\IngatkanSayas\IngatkanSayaResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListIngatkanSayas extends ListRecords
{
    protected static string $resource = IngatkanSayaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
