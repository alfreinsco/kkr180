<?php

namespace App\Filament\Resources\ProgramDetails\Pages;

use App\Filament\Resources\ProgramDetails\ProgramDetailResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListProgramDetails extends ListRecords
{
    protected static string $resource = ProgramDetailResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
