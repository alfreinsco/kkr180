<?php

namespace App\Filament\Resources\Pengaturans\Pages;

use App\Filament\Resources\Pengaturans\PengaturanResource;
use App\Models\Pengaturan;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ViewPengaturanSingle extends ViewRecord
{
    protected static string $resource = PengaturanResource::class;

    /**
     * @param int|string|null $record Route parameter (null saat akses index /)
     */
    public function mount(int|string|null $record = null): void
    {
        if ($record !== null) {
            $this->record = $this->resolveRecord($record);
        } else {
            $first = Pengaturan::first();
            if (! $first) {
                throw new ModelNotFoundException(__('Belum ada data pengaturan. Jalankan seeder terlebih dahulu.'));
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
                ->url(fn (): string => PengaturanResource::getUrl('edit', ['record' => $this->getRecord()])),
        ];
    }

    public function getTitle(): string
    {
        return __('Pengaturan');
    }

    public function getHeading(): string
    {
        return __('Detail Pengaturan');
    }
}
