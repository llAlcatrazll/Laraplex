<?php

namespace App\Filament\Agso\Pages;

use App\Filament\Widgets\RecentVehicleBookings;
use Filament\Pages\Page;

class AgsoDashboard extends Page
{
    protected static ?string $navigationIcon = 'heroicon-c-home';

    protected static string $view = 'filament.agso.pages.agso-dashboard';

    protected static ?string $title = 'Dashboard';

    protected function getWidgets(): array
    {
        return [
            RecentVehicleBookings::class,
        ];
    }
}
