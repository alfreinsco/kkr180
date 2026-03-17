<?php

namespace App\Filament\Resources\ProgramDetails\Pages;

use App\Filament\Resources\ProgramDetails\ProgramDetailResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditProgramDetail extends EditRecord
{
    protected static string $resource = ProgramDetailResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
