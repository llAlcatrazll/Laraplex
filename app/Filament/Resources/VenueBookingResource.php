<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VenueBookingResource\Pages;
use App\Models\VenueBooking;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class VenueBookingResource extends Resource
{
    protected static ?string $model = VenueBooking::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Date')
                    ->columns(3)
                    ->schema([
                        DatePicker::make('event_date'),
                        TimePicker::make('starting_time'),
                        // limit the time
                        TimePicker::make('ending_time'),
                    ]),
                Section::make('Event and Venue')
                    ->columns(2)
                    ->schema([
                        TextInput::make('eventname'),
                        TextInput::make('event_facility'),
                    ]),
                Section::make('Booker')
                    ->columns(3)
                    ->schema([
                        TextInput::make('booker')
                            ->placeholder('Juan De la Cruz'),
                        Select::make('college')
                            ->options([
                                'CCIS' => 'CCIS',
                                'CABE' => 'CABE',
                                'CEDAS' => 'CEDAS',
                            ]),
                        Select::make('club')
                            ->options([
                                'CCIS LGU' => 'CCIS LGU',
                                'CABE LGU' => 'CABE LGU',
                                'CEDAS LGU' => 'CEDAS LGU',
                            ]),
                    ]),
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
            'index' => Pages\ListVenueBookings::route('/'),
            'create' => Pages\CreateVenueBooking::route('/create'),
            'edit' => Pages\EditVenueBooking::route('/{record}/edit'),
        ];
    }
}
