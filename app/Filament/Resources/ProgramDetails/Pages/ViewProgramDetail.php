<?php

namespace App\Filament\Resources\ProgramDetails\Pages;

use App\Filament\Resources\ProgramDetails\ProgramDetailResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewProgramDetail extends ViewRecord
{
    protected static string $resource = ProgramDetailResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
