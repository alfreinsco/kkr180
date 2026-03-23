<?php

use App\Providers\AppServiceProvider;
use App\Providers\Filament\AdminPanelProvider;
use Ladumor\LaravelPwa\PWAServiceProvider;

return [
    AppServiceProvider::class,
    AdminPanelProvider::class,
    PWAServiceProvider::class,
];
