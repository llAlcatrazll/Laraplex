<?php

namespace App\Filament\Agso\Pages;

use Filament\Pages\Page;

class VenueCalendar extends Page
{
    protected static ?string $navigationIcon = 'heroicon-c-calendar-date-range';

    protected static string $view = 'filament.agso.pages.venue-calendar';

    protected static ?string $navigationGroup = 'Venue';

    protected function getWidgets(): array
    {
        return [
            \App\Filament\Agso\Widgets\BookingCalendarWidget::class,
        ];
    }
}
