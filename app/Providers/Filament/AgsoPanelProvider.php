<?php

namespace App\Providers\Filament;

use App\Filament\Agso\Widgets\BookingCalendarWidget;
use App\Filament\Agso\Widgets\VehicleCalendarWidget;
use App\Filament\Agso\Widgets\VenueBookingOverview;
use App\Filament\Widgets\RecentVehicleBookings;
use App\Filament\Widgets\RecentVenueBookings;
use App\Filament\Widgets\UpcomingVehicleBookings;
use App\Filament\Widgets\UpcomingVenueBookings;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Support\Enums\MaxWidth;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Saade\FilamentFullCalendar\FilamentFullCalendarPlugin;

class AgsoPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->sidebarFullyCollapsibleOnDesktop()
            ->maxContentWidth(MaxWidth::Full)
            ->id('agso')
            ->spa()
            ->path('agso')
            ->colors([
                'primary' => Color::Amber,
            ])
            ->plugins([
                FilamentFullCalendarPlugin::make(),
            ])
            ->discoverResources(in: app_path('Filament/Agso/Resources'), for: 'App\\Filament\\Agso\\Resources')
            ->discoverPages(in: app_path('Filament/Agso/Pages'), for: 'App\\Filament\\Agso\\Pages')

            ->pages([
                // Pages\Dashboard::class,
            ])
            //->discoverWidgets(in: app_path('Filament/Agso/Widgets'), for: 'App\\Filament\\Agso\\Widgets')
            ->widgets([
                VehicleCalendarWidget::class,
                BookingCalendarWidget::class,
                RecentVenueBookings::class,
                RecentVehicleBookings::class,
                UpcomingVenueBookings::class,
                UpcomingVehicleBookings::class,
                VenueBookingOverview::class,
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
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}
