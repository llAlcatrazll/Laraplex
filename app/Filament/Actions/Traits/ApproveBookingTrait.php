<?php

namespace App\Filament\Actions\Traits;

use App\Enums\VenueBookingStatus;
use App\Models\VenueBooking;

trait ApproveBookingTrait
{
    protected function setUp(): void
    {

        parent::setUp();

        $this->name('approve');

        $this->color('info');

        $this->action(function ($record) {
            dd($record);
        });
        // $this->visible(function (VenueBooking $record) {
        //     dd($record);

        //     return $record->status === VenueBookingStatus::PENDING;
        // });

        // $this->icon(VenueBookingStatus::APPROVED->getIcon());

        $this->action(function ($record) {
            $record->update([
                'status' => VenueBookingStatus::APPROVED,
            ]);
        });
        $this->requiresConfirmation();

        $this->successNotificationTitle('Request rescheduled');
    }
}
