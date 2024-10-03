<?php

namespace App\Filament\Resources\VenueBookingResource\Pages;

use App\Filament\Resources\VenueBookingResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditVenueBooking extends EditRecord
{
    protected static string $resource = VenueBookingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
