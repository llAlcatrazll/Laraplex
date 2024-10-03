<?php

namespace App\Filament\Resources\EquipmentBookingResource\Pages;

use App\Filament\Resources\EquipmentBookingResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEquipmentBookings extends ListRecords
{
    protected static string $resource = EquipmentBookingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
