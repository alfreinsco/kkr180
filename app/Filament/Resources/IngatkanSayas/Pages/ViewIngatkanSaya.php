<?php

namespace App\Filament\Resources\IngatkanSayas\Pages;

use App\Filament\Resources\IngatkanSayas\IngatkanSayaResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewIngatkanSaya extends ViewRecord
{
    protected static string $resource = IngatkanSayaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
