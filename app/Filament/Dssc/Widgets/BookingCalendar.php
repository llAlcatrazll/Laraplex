<?php

namespace App\Filament\Dssc\Widgets;

use App\Enums\VenueBookingStatus;
use App\Models\VenueBooking;
use Filament\Widgets\Widget;
use Saade\FilamentFullCalendar\Data\EventData;

class BookingCalendar extends Widget
{
    protected static string $view = 'filament.dssc.widgets.booking-calendar';

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
                        url: 'venue-bookings' // Adjust based on your needs
                    )
            )
            ->toArray();
    }
}
