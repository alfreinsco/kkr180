<?php

namespace App\Filament\Resources\SponsorLogos\Pages;

use App\Filament\Resources\SponsorLogos\SponsorLogoResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewSponsorLogo extends ViewRecord
{
    protected static string $resource = SponsorLogoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
