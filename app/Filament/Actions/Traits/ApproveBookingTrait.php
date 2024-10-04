<?php

namespace App\Filament\Actions\Traits;

use App\Enums\VenueBookingStatus;

trait ApproveBookingTrait
{
    protected function setUp(): void
    {

        parent::setUp();

        $this->name ??= 'approve';

        $this->color('success');
        // $this->icon('gmdi-approval-o');

        $this->action(function ($record) {
            $record->update([
                'status' => VenueBookingStatus::APPROVED,
            ]);
        });

        $this->requiresConfirmation();

        $this->successNotificationTitle('Request declined');
    }
}
