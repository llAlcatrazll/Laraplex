<?php

namespace App\Filament\Actions\Traits;

use App\Enums\VenueBookingStatus;
use App\Models\Action;
use App\Models\VenueBooking;

trait ViewRequestHistoryTrait
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->name('history');

        $this->modalSubmitAction(false);

        $this->color('primary');

        $this->slideOver();

        $this->modalWidth('2xl');

        $this->icon(VenueBookingStatus::VIEWHISTORY->getIcon());

        $this->modalContent(function (VenueBooking $record) {
            $actions = Action::where('bookable_id', $record->id)
                ->where('bookable_type', VenueBooking::class)
                ->orderBy('created_at', 'desc')
                ->get();

            dd(Action::where('id'));

            return view('filament.booking.history', [
                'booking' => $record,
                'actions' => $actions,
            ]);
        });
    }
}
