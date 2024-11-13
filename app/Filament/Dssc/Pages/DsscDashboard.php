<?php

namespace App\Filament\Dssc\Pages;

use App\Filament\Widgets\UpcomingVenueBookings;
use Filament\Pages\Page;

class DsscDashboard extends Page
{
    protected static ?string $navigationIcon = 'heroicon-c-home';

    protected static string $view = 'filament.dssc.pages.dssc-dashboard';

    protected static ?string $title = 'Dashboard';

    protected function getWidgets(): array
    {
        return [
            UpcomingVenueBookings::class,
        ];
    }
}
