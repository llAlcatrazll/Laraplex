<?php

namespace App\Filament\Dssc\Widgets;

use Filament\Widgets\ChartWidget;

class BookingChart extends ChartWidget
{
    protected static ?string $heading = 'Chart';

    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => 'Bookings',
                    'data' => [100, 120, 140, 160, 180, 200], // Monthly data
                    'backgroundColor' => ['#f87171', '#f97316', '#facc15', '#34d399', '#3b82f6', '#a78bfa'],
                ],
            ],
            'labels' => ['January', 'February', 'March', 'April', 'May', 'June'],
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
