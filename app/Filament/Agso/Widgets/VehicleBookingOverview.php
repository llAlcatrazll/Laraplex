<?php

namespace App\Filament\Agso\Widgets;

use App\Models\VehicleBooking;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class VehicleBookingOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Pending Bookings', VehicleBooking::where('department', 'AGSO')->count())
                ->descriptionIcon('heroicon-c-check-badge')
                ->description('Bookings that needs to be verified')
                ->color('info'),
        ];
    }
}
