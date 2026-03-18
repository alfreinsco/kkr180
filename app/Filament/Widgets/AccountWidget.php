<?php

namespace App\Filament\Widgets;

use Filament\Widgets\AccountWidget as BaseAccountWidget;

class AccountWidget extends BaseAccountWidget
{
    protected function getProfileUrl(): ?string
    {
        // Halaman profil kustom di panel admin
        return route('filament.admin.pages.profile');
    }
}

