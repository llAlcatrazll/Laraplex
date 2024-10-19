<?php

namespace App\Filament\Agso\Pages;

use App\Filament\Agso\Widgets\BookingCalendarWidget;
use Filament\Pages\Page;

class VenueCalendar extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.agso.pages.venue-calendar';

    protected static ?string $navigationGroup = 'Venue';

    protected function getWidgets(): array
    {
        return [
            BookingCalendarWidget::class,
        ];
    }
}
