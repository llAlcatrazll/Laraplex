<?php

namespace App\Filament\Agso\Widgets;

use App\Enums\VenueBookingStatus;
use App\Models\VenueBooking;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class VenueBookingOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Pending Bookings', VenueBooking::where('status', VenueBookingStatus::PENDING)->count())
                ->descriptionIcon('heroicon-c-check-badge')
                ->description('Bookings that needs to be verified')
                ->color('info'),
            Stat::make('Approved Bookings', VenueBooking::where('status', VenueBookingStatus::APPROVED)->count())
                ->descriptionIcon('heroicon-c-check-badge')
                ->description('Bookings that have been verified')
                ->color('warning'),
            Stat::make('Rejected Bookings', VenueBooking::where('status', VenueBookingStatus::DECLINED)->count())
                ->descriptionIcon('heroicon-c-check-badge')
                ->description('Bookings that have been verified')
                ->color('danger'),
        ];
    }
}
