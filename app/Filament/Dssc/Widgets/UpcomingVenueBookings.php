<?php

namespace App\Filament\Widgets;

use App\Models\VenueBooking;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget; // Adjust to your model

class UpcomingVenueBookings extends BaseWidget
{
    public function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('eventname')->label('EventName'),
                Tables\Columns\TextColumn::make('event_date')->label('Date'),
                Tables\Columns\TextColumn::make('event_facility')->label('Facility'),
                Tables\Columns\TextColumn::make('booker')->label('Booker'),
                // Tables\Columns\TextColumn::make('department')->label('Department'),
                // Tables\Columns\TextColumn::make('purpose')->label('Purpose'),
            ])
            ->paginated(false)
            ->query(
                VenueBooking::query()->latest()->limit(3)
            )
            ->defaultSort('event_date', 'desc');
    }
}
