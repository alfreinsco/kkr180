<?php

namespace App\Filament\Resources\SponsorLogos\Pages;

use App\Filament\Resources\SponsorLogos\SponsorLogoResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditSponsorLogo extends EditRecord
{
    protected static string $resource = SponsorLogoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
