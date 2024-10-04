<?php

namespace App\Filament\Agso\Resources\VenueBookingResource\Pages;

use App\Enums\VenueBookingStatus;
use App\Filament\Agso\Resources\VenueBookingResource;
use App\Filament\Agso\Widgets\VenueBookingOverview;
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

    protected function getHeaderWidgets(): array
    {
        return [
            VenueBookingOverview::class,
        ];
    }

    public function getTabs(): array
    {

        return [

            Tab::make('All Requests')
                ->label('All Requests')
                ->badgeColor('success'),
            Tab::make('All Requests')
                ->label('Pending')
                ->badgeColor('info')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('status', 'pending')),
            Tab::make('Approved')
                ->label('Approved')
                ->badgeColor('success')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('status', VenueBookingStatus::APPROVED)),
            Tab::make('Declined')
                ->label('Declined')
                ->badgeColor('danger')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('status', VenueBookingStatus::DECLINED)),

        ];
    }
}
