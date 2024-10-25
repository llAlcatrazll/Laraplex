<?php

namespace App\Filament\Actions\Traits;

use App\Enums\VenueBookingStatus;
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
            // $record->load([
            //     'actions' => fn ($q) => $q->orderBy('created_at', 'desc'),
            //     'actions.attachment',
            //     'attachment',
            // ]);

            // return view('filament.request.history', [
            //     'request' => $record,
            // ]);
        });
    }
}
