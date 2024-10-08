<?php

namespace App\Filament\Actions\Traits;

use App\Enums\VenueBookingStatus;

trait DeclineBookingTrait
{
    protected function setUp(): void
    {

        parent::setUp();

        $this->name ??= 'decline';

        $this->color('danger');

        $this->icon(VenueBookingStatus::DECLINED->getIcon());

        $this->action(function ($record) {
            $record->update([
                'status' => VenueBookingStatus::DECLINED,
            ]);
        });

        $this->requiresConfirmation();

        $this->successNotificationTitle('Request declined');
    }
}
