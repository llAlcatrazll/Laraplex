<?php

namespace App\Filament\Agso\Widgets;

use App\Enums\VenueBookingStatus;
use App\Models\VenueBooking;
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

    // protected static string $view = 'resources.views.filament.agso.widgets.booking-calendar-widget';
    // protected static string $view = 'filament.agso.widgets.booking-calendar-widget';

    public function fetchEvents(array $fetchInfo): array
    {
        return VenueBooking::query()
            ->where('event_date', '>=', $fetchInfo['start'])
            ->where('event_date', '<=', $fetchInfo['end'])
            ->where('status', VenueBookingStatus::APPROVED)
            ->get()
            ->map(
                fn (VenueBooking $booking) => EventData::make()
                    ->id($booking->id)
                    ->title($booking->eventname)
                    ->start($booking->event_date.' '.$booking->starting_time)
                    ->end($booking->event_date.' '.$booking->ending_time)
                    ->url(
                        url: 'venue-bookings'.'/'.$booking->id // Adjust based on your needs
                    )
            )
            ->toArray();
    }
}
