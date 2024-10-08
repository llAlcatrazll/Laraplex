<?php

namespace App\Filament\Agso\Widgets;

use App\Filament\Agso\Resources\VenueBookingResource;
use App\Models\VenueBooking;
use Filament\Widgets\Widget;
use Saade\FilamentFullCalendar\Data\EventData;
use Saade\FilamentFullCalendar\Widgets\FullCalendarWidget;

class BookingCalendarWidget extends FullCalendarWidget
{
    protected function getOptions(): array
    {
        return [
            'initialView' => 'dayGridMonth',
            'height' => 'auto',
            'contentHeight' => 400,
            'aspectRatio' => 2.0,
        ];
    }

    // protected static string $view = 'filament.agso.widgets.booking-calendar-widget';
    public function fetchEvents(array $fetchInfo): array
    {
        return VenueBooking::query()
            ->where('event_date', '>=', $fetchInfo['start'])
            ->where('event_date', '<=', $fetchInfo['end'])
            ->get()
            ->map(
                fn (VenueBooking $booking) => EventData::make()
                    ->id($booking->id)
                    ->title($booking->eventname)
                    ->start($booking->event_date.' '.$booking->starting_time)
                    ->end($booking->event_date.' '.$booking->ending_time)
                // ->url(
                //     url: VenueBookingResource::getUrl(name: 'view', parameters: ['record' => $booking]),
                //     shouldOpenUrlInNewTab: true
                // )
            )
            ->toArray();
    }
    // public function fetchEvents(array $fetchInfo): array
    // {

    //     return [
    //         [
    //             'title' => 'Sample Event 1',
    //             'start' => '2024-10-10 01:00:00',
    //             'end' => '2024-10-10 12:00:00',
    //             'url' => 'http://example.com/event/1',
    //             'shouldOpenUrlInNewTab' => true,
    //         ],
    //         [
    //             'title' => 'Sample Event 2',
    //             'start' => '2024-10-11 10:00:00',
    //             'end' => '2024-10-11 16:00:00',
    //             'url' => 'http://example.com/event/2',
    //             'shouldOpenUrlInNewTab' => true,
    //         ],
    //     ];
    // }
}
