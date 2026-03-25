<?php

namespace App\Filament\Resources\BukuTamus\Pages;

use App\Filament\Resources\BukuTamus\BukuTamuResource;
use Filament\Actions\Action;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Filament\Support\Icons\Heroicon;

class ListBukuTamus extends ListRecords
{
    protected static string $resource = BukuTamuResource::class;

    protected function getHeaderActions(): array
    {
        $actions = [];

        if (auth()->user()?->is_admin) {
            $actions[] = Action::make('data_terhapus')
                ->label('Data terhapus')
                ->icon(Heroicon::OutlinedTrash)
                ->url(BukuTamuResource::getUrl('trashed'));
        }

        $actions[] = CreateAction::make();

        return $actions;
    }
}
