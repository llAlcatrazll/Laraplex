<?php

namespace App\Filament\Agso\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class VenueBookingOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Bookings', '362')
                ->color('success'),
            Stat::make('Approved Bookings', '281')
                ->color('warning'),
            Stat::make('Completed Bookings', '81'),
        ];
    }
}
