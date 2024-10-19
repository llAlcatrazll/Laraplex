<?php

namespace App\Filament\Dssc\Resources\VenueBookingResource\Pages;

use App\Filament\Dssc\Resources\VenueBookingResource;
use Filament\Actions;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListVenueBookings extends ListRecords
{
    protected static string $resource = VenueBookingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getTabs(): array
    {

        return [

            Tab::make('All Requests')
                ->label('All Requests')
                ->badgeColor('success'),

            Tab::make('All Requests')
                ->label('Outsider')
                ->badgeColor('success'),
            Tab::make('All Requests')
                ->label('BED')
                ->badgeColor('success'),
            Tab::make('All Requests')
                ->label('CCIS')
                ->badgeColor('success')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('college', 'CCIS')),
            Tab::make('All Requests')
                ->label('CABE')
                ->badgeColor('success')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('college', 'CABE')),
            Tab::make('All Requests')
                ->label('CEDAS')
                ->badgeColor('success')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('college', 'CEDAS')),
            Tab::make('All Requests')
                ->label('COE')
                ->badgeColor('success')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('college', 'COE')),
            Tab::make('All Requests')
                ->label('CHS')
                ->badgeColor('success')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('college', 'CHS')),

        ];
    }
}
