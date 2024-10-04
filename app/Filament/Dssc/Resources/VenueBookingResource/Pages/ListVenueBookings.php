<?php

namespace App\Filament\Dssc\Resources\VenueBookingResource\Pages;

use App\Filament\Dssc\Resources\VenueBookingResource;
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
