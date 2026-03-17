<?php

namespace App\Filament\Pages;

use Filament\Pages\Dashboard as BaseDashboard;

class Dashboard extends BaseDashboard
{
    protected static ?string $title = 'Dashboard KKR 180°';

    protected static ?string $navigationLabel = 'Dashboard';

    /**
     * Grid 2 kolom: statistik & chart full width, tabel side-by-side.
     *
     * @return int|array<string, int|null>
     */
    public function getColumns(): int | array
    {
        return 2;
    }
}
