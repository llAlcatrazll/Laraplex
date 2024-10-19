<?php

namespace App\Enums;

enum VenueBookingStatus: string
{
    case APPROVED = 'approved';
    case DECLINED = 'declined';
    case PENDING = 'pending';
    case RESCHEDULED = 'rescheduled';

    public function getDescription(): ?string
    {
        return match ($this) {
            self::APPROVED => 'This request is approved and booked successfully',
            self::DECLINED => 'Request Declined due to certain reasons',
            self::PENDING => 'Request is yet to be monitored',
            self::RESCHEDULED => 'Request has been rescheduled',
        };
    }

    public function getColor(): ?string
    {
        return match ($this) {
            self::APPROVED => 'success',
            self::DECLINED => 'danger',
            self::PENDING => 'info',
            self::RESCHEDULED => 'primary',
        };
    }

    public function getIcon(): ?string
    {
        return match ($this) {
            self::APPROVED => 'heroicon-c-check-badge',
            self::DECLINED => 'heroicon-c-x-circle',
            self::PENDING => 'heroicon-o-check',
            self::RESCHEDULED => 'heroicon-m-calendar-days',
        };
    }

    public static function options(): array
    {
        return array_map(fn ($case) => $case->value.' - '.$case->getDescription(), self::cases());
    }
}
