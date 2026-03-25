<?php

namespace App\Filament\Resources\Concerns;

use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\Relation;

trait ConfiguresTrashedListPage
{
    protected function getHeaderActions(): array
    {
        return [
            Action::make('semua_data')
                ->label('Semua data')
                ->icon(Heroicon::OutlinedRectangleStack)
                ->url(static::getResource()::getUrl('index')),
        ];
    }

    public function mount(): void
    {
        abort_unless((bool) auth()->user()?->is_admin, 403);

        parent::mount();
    }

    protected function getTableQuery(): Builder|Relation|null
    {
        return static::getResource()::getEloquentQuery()->onlyTrashed();
    }

    protected function makeTable(): Table
    {
        return parent::makeTable()
            ->recordActions([
                RestoreAction::make(),
                ForceDeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    RestoreBulkAction::make(),
                    ForceDeleteBulkAction::make(),
                ]),
            ])
            ->headerActions([]);
    }
}
