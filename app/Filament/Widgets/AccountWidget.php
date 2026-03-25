<?php

namespace App\Filament\Widgets;

use Filament\Widgets\AccountWidget as BaseAccountWidget;

class AccountWidget extends BaseAccountWidget
{
    /**
     * @var int | string | array<string, int | null>
     */
    protected int|string|array $columnSpan = 2;

    protected function getProfileUrl(): ?string
    {
        // Halaman profil kustom di panel admin
        return route('filament.admin.pages.profile');
    }
}
