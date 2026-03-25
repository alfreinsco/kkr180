<?php

namespace App\Filament\Resources\IngatkanSayas\Pages;

use App\Filament\Resources\IngatkanSayas\IngatkanSayaResource;
use Filament\Actions\Action;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Filament\Support\Icons\Heroicon;
use Illuminate\Support\Facades\Auth;

class ListIngatkanSayas extends ListRecords
{
    protected static string $resource = IngatkanSayaResource::class;

    protected function getHeaderActions(): array
    {
        $actions = [];

        if (Auth::user()?->is_admin) {
            $actions[] = Action::make('data_terhapus')
                ->label('Data terhapus')
                ->icon(Heroicon::OutlinedTrash)
                ->url(IngatkanSayaResource::getUrl('trashed'));
        }

        $actions[] = CreateAction::make()
            ->label('Tambah Pendaftar');

        return $actions;
    }
}
