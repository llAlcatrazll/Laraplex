<?php

namespace App\Filament\Widgets;

use App\Models\VehicleBooking;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget; // Adjust to your model

class UpcomingVehicleBookings extends BaseWidget
{
    public function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('vehicle_type')->label('Vehicle Type'),
                Tables\Columns\TextColumn::make('requestor')->label('Requestor'),
                Tables\Columns\TextColumn::make('date')->label('Date')->date(),
                Tables\Columns\TextColumn::make('department')->label('Department'),
                Tables\Columns\TextColumn::make('purpose')->label('Purpose'),
            ])
            ->paginated(false)
            ->query(
                VehicleBooking::query()->latest()->limit(5)
            )
            ->defaultSort('date', 'desc');
    }
}
