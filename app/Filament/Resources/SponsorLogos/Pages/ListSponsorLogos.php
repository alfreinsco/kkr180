<?php

namespace App\Filament\Resources\SponsorLogos\Pages;

use App\Filament\Resources\SponsorLogos\SponsorLogoResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSponsorLogos extends ListRecords
{
    protected static string $resource = SponsorLogoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
