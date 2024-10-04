<?php

namespace App\Filament\Agso\Widgets;

use Filament\Widgets\Widget;
use Saade\FilamentFullCalendar\Widgets\FullCalendarWidget;

class BookingCalendarWidget extends FullCalendarWidget
{
    protected function getOptions(): array
    {
        return [
            'initialView' => 'dayGridMonth', // The initial view of the calendar
            'height' => 'auto',          // Adjusts the calendar height automatically
            'contentHeight' => 400,      // Set height of the content area of the calendar
            'aspectRatio' => 2.0,
        ];
    }

    // protected static string $view = 'filament.agso.widgets.booking-calendar-widget';
    public function fetchEvents(array $fetchInfo): array
    {

        // Example of returning dummy events data
        return [
            [
                'title' => 'Sample Event 1',
                'start' => '2024-10-10 01:00:00',
                'end' => '2024-10-10 12:00:00',
                'url' => 'http://example.com/event/1',
                'shouldOpenUrlInNewTab' => true,
            ],
            [
                'title' => 'Sample Event 2',
                'start' => '2024-10-11 10:00:00',
                'end' => '2024-10-11 16:00:00',
                'url' => 'http://example.com/event/2',
                'shouldOpenUrlInNewTab' => true,
            ],
        ];
    }
}
