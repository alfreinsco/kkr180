<?php

namespace App\Filament\Resources\Pengaturans\Pages;

use App\Filament\Resources\Pengaturans\PengaturanResource;
use Filament\Resources\Pages\EditRecord;

class EditPengaturan extends EditRecord
{
    protected static string $resource = PengaturanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            \Filament\Actions\ViewAction::make()
                ->label(__('Kembali'))
                ->url(fn (): string => PengaturanResource::getUrl('index')),
        ];
    }

    public function getTitle(): string
    {
        return __('Edit Pengaturan');
    }
}
