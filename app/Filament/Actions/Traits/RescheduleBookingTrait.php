<?php

namespace App\Filament\Actions\Traits;

use App\Enums\VenueBookingStatus;
use App\Models\VenueBooking;
use Filament\Forms\Components\DatePicker;

trait RescheduleBookingTrait
{
    protected function setUp(): void
    {

        parent::setUp();

        $this->name ??= 'reschedule';

        $this->color('info');

        $this->visible(function (VenueBooking $record) {
            // dd($record->status);

            return $record->status === VenueBookingStatus::DECLINED;
        });

        $this->icon(VenueBookingStatus::APPROVED->getIcon());

        $this->action(function ($record) {
            $record->update([
                'status' => VenueBookingStatus::RESCHEDULED,
            ]);
        });
        $this->form([
            DatePicker::make('date'),
        ]);

        $this->requiresConfirmation();

        $this->successNotificationTitle('Request rescheduled');
    }
}
