<?php

namespace App\Filament\Dssc\Resources\VenueBookingResource\Pages;

use App\Filament\Dssc\Resources\VenueBookingResource;
use App\Models\Action;
use App\Models\VenueBooking;
use Filament\Resources\Pages\CreateRecord;

class CreateVenueBooking extends CreateRecord
{
    protected static string $resource = VenueBookingResource::class;

    // Override the create method
    protected function handleRecordCreation(array $data): VenueBooking
    {
        // Call the original create method to create the booking
        $venueBooking = parent::handleRecordCreation($data);

        // Log the action after the booking is created
        Action::create([
            'user_id' => auth()->id(), // Assuming you have authentication
            'booking_id' => $venueBooking->id, // The created booking's ID
            'action_type' => 'created',
            'remarks' => 'Venue booking created',
            'status' => $venueBooking->status, // Assuming the booking has a status
        ]);

        return $venueBooking;
    }
}
