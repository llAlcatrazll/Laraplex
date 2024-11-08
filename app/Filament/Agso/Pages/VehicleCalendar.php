<?php

namespace App\Filament\Agso\Pages;

use Filament\Pages\Page;

class VehicleCalendar extends Page
{
    protected static ?string $navigationIcon = 'heroicon-c-calendar-date-range';

    protected static string $view = 'filament.agso.pages.vehicle-calendar';

    protected static ?string $navigationGroup = 'Vehicle';

    protected function getWidgets(): array
    {
        return [
            \App\Filament\Agso\Widgets\VehicleCalendarWidget::class,
        ];
    }
}
