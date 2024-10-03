<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EquipmentBookingResource\Pages;
use App\Models\EquipmentBooking;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class EquipmentBookingResource extends Resource
{
    protected static ?string $model = EquipmentBooking::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->columns(3)
            ->schema([

                TextInput::make('booker'),
                TextInput::make('equipment_name'),
                DatePicker::make('date'),
                TimePicker::make('starting_time'),
                TimePicker::make('ending_time'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListEquipmentBookings::route('/'),
            'create' => Pages\CreateEquipmentBooking::route('/create'),
            'edit' => Pages\EditEquipmentBooking::route('/{record}/edit'),
        ];
    }
}
