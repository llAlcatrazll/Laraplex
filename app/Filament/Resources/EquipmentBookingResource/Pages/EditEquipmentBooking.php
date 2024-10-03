<?php

namespace App\Filament\Resources\EquipmentBookingResource\Pages;

use App\Filament\Resources\EquipmentBookingResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEquipmentBooking extends EditRecord
{
    protected static string $resource = EquipmentBookingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
