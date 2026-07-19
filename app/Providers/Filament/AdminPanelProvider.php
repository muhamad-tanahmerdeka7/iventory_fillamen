<?php

namespace App\Providers\Filament;

use Filament\Enums\ThemeMode;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages\Dashboard;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets\AccountWidget;
use Filament\Widgets\FilamentInfoWidget;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\PreventRequestForgery;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use App\Filament\Widgets\FioriKpiTiles;
use App\Filament\Widgets\StockCategoryChart;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->viteTheme('resources/css/filament/admin/theme.css')
            ->login()

            // ==================================================
            // SAP FIORI STYLE
            // ==================================================
            ->colors([
                'primary' => Color::hex('#0070F2'), // SAP Blue
                'danger'  => Color::hex('#BB0000'),
                'success' => Color::hex('#2B7D2B'),
                'warning' => Color::hex('#E9730C'),
                'info'    => Color::hex('#0070F2'),
                'gray'    => Color::Slate,
            ])

            ->font('Inter')

            ->brandName('SAP Inventory')

            ->defaultThemeMode(ThemeMode::Light)

            // ==================================================
            // RESOURCE
            // ==================================================
            ->discoverResources(
                in: app_path('Filament/Resources'),
                for: 'App\\Filament\\Resources',
            )

            ->discoverPages(
                in: app_path('Filament/Pages'),
                for: 'App\\Filament\\Pages',
            )

            ->pages([
                Dashboard::class,
            ])

            ->discoverWidgets(
                in: app_path('Filament/Widgets'),
                for: 'App\\Filament\\Widgets',
            )

            ->widgets([
                //   AccountWidget::class,

    // Dashboard SAP
    FioriKpiTiles::class,
    StockCategoryChart::class,

    // Widget bawaan Filament
    // FilamentInfoWidget::class,
])

            // ==================================================
            // MIDDLEWARE
            // ==================================================
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                PreventRequestForgery::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])

            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}