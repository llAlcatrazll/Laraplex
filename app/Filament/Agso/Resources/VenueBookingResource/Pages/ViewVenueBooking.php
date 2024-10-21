<?php

namespace App\Filament\Agso\Resources\VenueBookingResource\Pages;

use App\Filament\Agso\Resources\VenueBookingResource;
use App\Models\VenueBooking;
use Filament\Forms;
use Filament\Pages\Page;

class ViewVenueBooking extends Page
{
    protected static string $resource = VenueBookingResource::class;

    public VenueBooking $record;

    protected function mount(VenueBooking $record): void
    {
        $this->record = $record;
    }

    public function getTitle(): string
    {
        return "Viewing Booking: {$this->record->eventname}";
    }

    protected function getFormSchema(): array
    {
        return [
            Forms\Components\Section::make('Venue Booking Details')
                ->schema([
                    Forms\Components\TextInput::make('eventname')
                        ->label('Event Name')
                        ->disabled()
                        ->default($this->record->eventname),
                    Forms\Components\TextInput::make('event_facility')
                        ->label('Event Facility')
                        ->disabled()
                        ->default($this->record->event_facility),
                    Forms\Components\TextInput::make('booker')
                        ->label('Booker')
                        ->disabled()
                        ->default($this->record->booker),
                    Forms\Components\TextInput::make('college')
                        ->label('College')
                        ->disabled()
                        ->default($this->record->college),
                    Forms\Components\TextInput::make('club')
                        ->label('Club')
                        ->disabled()
                        ->default($this->record->club),
                    Forms\Components\DatePicker::make('event_date')
                        ->label('Event Date')
                        ->disabled()
                        ->default($this->record->event_date),
                    Forms\Components\TimePicker::make('starting_time')
                        ->label('Starting Time')
                        ->disabled()
                        ->default($this->record->starting_time),
                    Forms\Components\TimePicker::make('ending_time')
                        ->label('Ending Time')
                        ->disabled()
                        ->default($this->record->ending_time),
                    Forms\Components\TextInput::make('status')
                        ->label('Status')
                        ->disabled()
                        ->default($this->record->status->getDescription()),
                ]),
        ];
    }

    public static function route(): string
    {
        return VenueBookingResource::getUrl('view', ['record' => '{record}']);
    }
}
