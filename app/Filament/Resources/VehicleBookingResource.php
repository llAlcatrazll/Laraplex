<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VehicleBookingResource\Pages;
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

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('vehicle_type')
                    ->options([
                        'Isuzu' => 'ISUZU',
                        'Hi-Ace' => 'HI-ACE',
                        'Innova (Manual)' => 'INNOVA-MANUAL',
                    ]),
                TextInput::make('requestor'),
                DatePicker::make('date'),
                TextInput::make('department'),
                TextInput::make('purpose'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                TextColumn::make('vehicle_type'),
                TextColumn::make('requestor'),
                TextColumn::make('date'),
                TextColumn::make('department'),
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListVehicleBookings::route('/'),
            'create' => Pages\CreateVehicleBooking::route('/create'),
            'edit' => Pages\EditVehicleBooking::route('/{record}/edit'),
        ];
    }
}
