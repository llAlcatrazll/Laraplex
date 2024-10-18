<?php

namespace App\Filament\Actions\Traits;

use App\Enums\VenueBookingStatus;
use App\Models\VenueBooking;

trait ApproveBookingTrait
{
    protected function setUp(): void
    {

        parent::setUp();

        $this->name ??= 'approve';

        $this->color('success');

        // $this->visible(function (VenueBooking $record) {
        //     // dd($record->status);

        //     return $record->status === VenueBookingStatus::APPROVED;
        // });

        $this->icon(VenueBookingStatus::APPROVED->getIcon());

        $this->action(function ($record) {
            $record->update([
                'status' => VenueBookingStatus::APPROVED,
            ]);
        });

        $this->requiresConfirmation();

        $this->successNotificationTitle('Request declined');
    }
}
