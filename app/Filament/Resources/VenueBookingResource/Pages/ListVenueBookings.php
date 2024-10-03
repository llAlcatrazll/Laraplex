<?php

namespace App\Filament\Resources\VenueBookingResource\Pages;

use App\Filament\Resources\VenueBookingResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListVenueBookings extends ListRecords
{
    protected static string $resource = VenueBookingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
