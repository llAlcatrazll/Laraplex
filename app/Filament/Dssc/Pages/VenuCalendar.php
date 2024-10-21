<?php

namespace App\Filament\Dssc\Pages;

use App\Filament\Agso\Widgets\BookingCalendarWidget;
use Filament\Pages\Page;

class VenuCalendar extends Page
{
    protected static ?string $navigationIcon = 'heroicon-c-calendar-date-range';

    protected static string $view = 'filament.dssc.pages.venu-calendar';

    protected static ?string $navigationGroup = 'Venue';

    protected function getWidgets(): array
    {
        return [
            BookingCalendarWidget::class,
        ];
    }
}
