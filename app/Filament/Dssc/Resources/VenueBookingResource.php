<?php

namespace App\Filament\Dssc\Resources;

use App\Filament\Dssc\Resources\VenueBookingResource\Pages;
use App\Models\VenueBooking;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
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
                        DatePicker::make('event_date')->default(now()),
                        TimePicker::make('starting_time')->default(now()),
                        // limit the time
                        TimePicker::make('ending_time')->default(now()),
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
                TextColumn::make('booker'),
                TextColumn::make('college'),
                TextColumn::make('club'),
                TextColumn::make('eventname'),
                TextColumn::make('event_facility'),
                TextColumn::make('event_date'),
                TextColumn::make('starting_time'),
                TextColumn::make('ending_time'),
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
