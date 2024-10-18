<?php

namespace App\Filament\Actions\Traits;

use App\Enums\VenueBookingStatus;
use Filament\Forms\Components\TextInput;

trait DeclineBookingTrait
{
    protected function setUp(): void
    {

        parent::setUp();

        $this->name ??= 'decline';

        $this->color('danger');

        $this->icon(VenueBookingStatus::DECLINED->getIcon());

        $this->form([TextInput::make('remarks')->placeholder('Reason for declining this request')]);

        $this->action(function ($record) {
            $record->update([
                'status' => VenueBookingStatus::DECLINED,
            ]);
        });

        $this->requiresConfirmation();

        $this->successNotificationTitle('Request declined');
    }
}
