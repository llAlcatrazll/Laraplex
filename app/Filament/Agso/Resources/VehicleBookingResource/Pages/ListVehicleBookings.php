<?php

namespace App\Filament\Agso\Resources\VehicleBookingResource\Pages;

use App\Filament\Agso\Resources\VehicleBookingResource;
use App\Filament\Agso\Widgets\VenueBookingOverview;
use Filament\Actions;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;

class ListVehicleBookings extends ListRecords
{
    protected static string $resource = VehicleBookingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            VenueBookingOverview::class, // Full path
        ];
    }

    public function getTabs(): array
    {
        return [
            Tab::make('All Requests')
                ->label('All Requests')
                ->badgeColor('success'),
            Tab::make('All Requests')
                ->label('Isuzu')
                ->badgeColor('success'),
            Tab::make('All Requests')
                ->label('HI-ACE')
                ->badgeColor('success'),
            Tab::make('All Requests')
                ->label('Small Bus')
                ->badgeColor('success'),
            Tab::make('All Requests')
                ->label('Big Bus')
                ->badgeColor('success'),
            Tab::make('All Requests')
                ->label('Tamaraw')
                ->badgeColor('success'),
            Tab::make('All Requests')
                ->label('Hilux')
                ->badgeColor('success'),
            Tab::make('All Requests')
                ->label('Innova Manual')
                ->badgeColor('success'),
            Tab::make('All Requests')
                ->label('Innova Automatic')
                ->badgeColor('success'),
        ];
    }
}
