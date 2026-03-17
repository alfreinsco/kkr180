<?php

namespace App\Filament\Resources\Tentangs\Pages;

use App\Filament\Resources\Tentangs\TentangResource;
use Filament\Resources\Pages\EditRecord;

class EditTentang extends EditRecord
{
    protected static string $resource = TentangResource::class;

    protected function getHeaderActions(): array
    {
        return [
            \Filament\Actions\ViewAction::make()
                ->label(__('Kembali'))
                ->url(fn (): string => TentangResource::getUrl('index')),
        ];
    }

    public function getTitle(): string
    {
        return __('Edit Tentang');
    }
}
