<?php

namespace App\Filament\Agso\Resources;

use App\Enums\VehicleType;
use App\Filament\Agso\Resources\VehicleBookingResource\Pages;
use App\Models\VehicleBooking;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class VehicleBookingResource extends Resource
{
    protected static ?string $model = VehicleBooking::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Vehicle';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('vehicle_type')
                    ->options(VehicleType::class),
                TextInput::make('requestor')
                    ->placeholder('Juan De la Cruz'),
                DatePicker::make('date')
                    ->format('Y/m/d'),
                TextInput::make('department')
                    ->placeholder('Department or Organization'),
                TextInput::make('purpose')
                    ->placeholder('What is this vehicle gonna be used for'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('vehicle_type')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('requestor')
                    ->searchable(),
                TextColumn::make('date')
                    ->sortable(),
                TextColumn::make('department')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('purpose'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function canCreate(): bool
    {
        return true;
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListVehicleBookings::route('/'),
            'create' => Pages\CreateVehicleBooking::route('/create'),
            'edit' => Pages\EditVehicleBooking::route('/{record}/edit'),
        ];
    }
}
