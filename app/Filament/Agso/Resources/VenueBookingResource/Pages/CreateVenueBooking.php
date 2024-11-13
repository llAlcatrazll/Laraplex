<?php

namespace App\Filament\Agso\Resources\VenueBookingResource\Pages;

use App\Filament\Agso\Resources\VenueBookingResource;
use Filament\Resources\Pages\CreateRecord;

class CreateVenueBooking extends CreateRecord
{
    protected static string $resource = VenueBookingResource::class;

    protected function getRedirectUrl(): string
    {
        // Redirect to the VenueBookingResource index page after form submission
        return $this->getResource()::getUrl('index');
    }
}
