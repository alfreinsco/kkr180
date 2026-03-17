<?php

namespace App\Filament\Resources\Pengaturans\Pages;

use App\Filament\Resources\Pengaturans\PengaturanResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewPengaturan extends ViewRecord
{
    protected static string $resource = PengaturanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
