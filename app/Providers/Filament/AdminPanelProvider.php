<?php

namespace App\Providers\Filament;

use App\Filament\Pages\Dashboard;
use App\Filament\Pages\Profile;
use App\Filament\Widgets\AccountWidget as AppAccountWidget;
use Filament\Actions\Action;
use Filament\Enums\ThemeMode;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Navigation\NavigationItem;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Support\Icons\Heroicon;
use Filament\View\PanelsRenderHook;
use Filament\Widgets\FilamentInfoWidget;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\Support\HtmlString;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->favicon(asset('img/logo-gmsambon.jpg'))
            ->id('admin')
            ->path('admin')
            ->login()
            ->colors([
                'primary' => Color::Blue,
            ])
            // ->font('Muli', url: 'https://fonts.googleapis.com/css2?family=Anton&family=Muli:wght@400;500;600;700&display=swap')
            ->defaultThemeMode(ThemeMode::Light)
            ->darkMode(false)
            ->renderHook(PanelsRenderHook::STYLES_AFTER, function (): HtmlString {
                $path = public_path('css/filament-kkr180.css');
                $v = file_exists($path) ? filemtime($path) : '';

                return new HtmlString('<link rel="stylesheet" href="'.asset('css/filament-kkr180.css').($v ? '?v='.$v : '').'" data-navigate-track />');
            })
            ->navigationGroups([
                'Data & Pendaftaran',
                'Konten Acara',
                'Pengaturan',
            ])
            ->navigationItems([
                NavigationItem::make('Situs Utama')
                    ->url('/')
                    ->icon(Heroicon::OutlinedGlobeAlt)
                    ->sort(-3)
                    ->openUrlInNewTab(),
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\Filament\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\Filament\Pages')
            ->pages([
                Dashboard::class,
                Profile::class, // route /admin/profile, tidak di sidebar (isDiscovered = false)
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\Filament\Widgets')
            ->widgets([
                // AppAccountWidget::class,
                // FilamentInfoWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->userMenuItems([
                'profile' => fn (Action $action) => $action->label('Profil Saya')->url(route('filament.admin.pages.profile')),
            ])
            ->spa()
            ->spaUrlExceptions(['/']) // Situs Utama: full page load, bukan SPA
            ->databaseNotifications()
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}
