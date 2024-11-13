<?php

namespace App\Filament\Actions\Traits;

use App\Enums\VenueBookingStatus;
use App\Models\Action;
use App\Models\VenueBooking;
use Filament\Forms\Components\DatePicker;

trait ApproveBookingTrait
{
    protected function setUp(): void
    {

        parent::setUp();

        $this->name ??= 'accept';

        $this->color('info');

        // $this->visible(function (VenueBooking $record) {
        //     // dd($record->status);

        //     return $record->status === VenueBookingStatus::DECLINED;
        // });

        $this->icon(VenueBookingStatus::APPROVED->getIcon());

        $this->action(function ($record, $action) {
            $record->update([
                'status' => VenueBookingStatus::APPROVED,
            ]);
            Action::create([
                'user_id' => auth()->id(),
                'bookable_id' => $record->id,
                // 'bookable_type' => ,
                'action_type' => 'approve',
                'remarks' => '',
                'status' => VenueBookingStatus::APPROVED,
            ]);

            // $record->action()->create([

            // ]);
        });
        // $this->form([
        //     DatePicker::make('date'),
        // ]);

        $this->requiresConfirmation();

        $this->successNotificationTitle('Request Approved');
    }
}
