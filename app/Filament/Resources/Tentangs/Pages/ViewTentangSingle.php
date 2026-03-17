<?php

namespace App\Filament\Resources\Tentangs\Pages;

use App\Filament\Resources\Tentangs\TentangResource;
use App\Models\Tentang;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ViewTentangSingle extends ViewRecord
{
    protected static string $resource = TentangResource::class;

    /**
     * @param int|string|null $record Route parameter (null saat akses index /)
     */
    public function mount(int|string|null $record = null): void
    {
        if ($record !== null) {
            $this->record = $this->resolveRecord($record);
        } else {
            $first = Tentang::first();
            if (! $first) {
                throw new ModelNotFoundException(__('Belum ada data tentang. Jalankan seeder terlebih dahulu.'));
            }
            $this->record = $first;
        }

        $this->authorizeAccess();

        if (! $this->hasInfolist()) {
            $this->fillForm();
        }
    }

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make()
                ->url(fn (): string => TentangResource::getUrl('edit', ['record' => $this->getRecord()])),
        ];
    }

    public function getTitle(): string
    {
        return __('Tentang');
    }

    public function getHeading(): string
    {
        return __('Detail Tentang');
    }
}
