<?php

namespace App\Filament\Agso\Resources\VenueBookingResource\Pages;

use App\Filament\Agso\Resources\VenueBookingResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewVenueBooking extends ViewRecord
{
    protected static string $resource = VenueBookingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
            DeleteAction::make(),
        ];
    }
}
