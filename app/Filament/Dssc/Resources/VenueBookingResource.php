<?php

namespace App\Filament\Dssc\Resources;

use App\Filament\Actions\Tables\ApproveBookingAction;
use App\Filament\Actions\Tables\DeclineBookingAction;
use App\Filament\Actions\Tables\RescheduleBookingAction;
use App\Filament\Dssc\Resources\VenueBookingResource\Pages;
use App\Models\VenueBooking;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class VenueBookingResource extends Resource
{
    protected static ?string $model = VenueBooking::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Venue';

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
                        TextInput::make('organization')
                            ->label('Org / Dept'),
                        TextInput::make('contactnumber')
                            ->label('placeholder')
                            ->placeholder('9xx xxx xxxx')
                            ->mask('999 999 9999')
                            ->prefix('+63 ')
                            ->rule(fn () => function ($a, $v, $f) {
                                if (! preg_match('/^9.*/', $v)) {
                                    $f('Incorrect number format');
                                }
                            }),

                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                TextColumn::make('booker')
                    ->searchable(),
                TextColumn::make('organization')
                    ->label('Org / Dept')
                    ->badge()
                    ->searchable(),
                TextColumn::make('contactnumber')
                    ->prefix('+63 '),
                TextColumn::make('eventname'),
                TextColumn::make('event_facility')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('event_date')
                    ->formatStateUsing(fn ($state) => \Carbon\Carbon::parse($state)->format('F j, Y (l)')),
                TextColumn::make('starting_time')
                    ->formatStateUsing(fn ($state) => \Carbon\Carbon::parse($state)->format('h:i A')),
                TextColumn::make('ending_time')
                    ->formatStateUsing(fn ($state) => \Carbon\Carbon::parse($state)->format('h:i A')),
                TextColumn::make('status')
                    ->color(fn ($record) => $record->status->getColor())
                    ->tooltip(fn ($record) => $record->status->getDescription())
                    ->badge(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                ActionGroup::make([
                    DeclineBookingAction::make(),
                    RescheduleBookingAction::make(),
                    ApproveBookingAction::make(),
                ]),
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
