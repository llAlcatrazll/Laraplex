<?php

namespace App\Filament\Agso\Widgets;

use App\Models\VehicleBooking;
use Saade\FilamentFullCalendar\Data\EventData;
use Saade\FilamentFullCalendar\Widgets\FullCalendarWidget;

class VehicleCalendarWidget extends FullCalendarWidget
{
    protected function getOptions(): array
    {
        return [
            'initialView' => 'dayGridMonth',
            'height' => 'auto',
            'contentHeight' => 400,
            'aspectRatio' => 3.0,
        ];
    }

    // protected static string $view = 'resources.views.filament.agso.widgets.booking-calendar-widget';
    // protected static string $view = 'filament.agso.widgets.booking-calendar-widget';

    public function fetchEvents(array $fetchInfo): array
    {
        return VehicleBooking::query()
            ->get()
            ->map(
                fn (VehicleBooking $vehicle) => EventData::make()
                    ->id($vehicle->id)
                    ->title($vehicle->vehicle_type)
                    ->start($vehicle->date)
                    ->end($vehicle->date)
                    ->url(
                        url: 'vehicle-bookings' // Adjust based on your needs
                    )
            )
            ->toArray();
    }
}
