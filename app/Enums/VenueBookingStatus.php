<?php

namespace App\Enums;

enum VenueBookingStatus: string
{
    case APPROVED = 'approved';
    case DECLINED = 'declined';
    case PENDING = 'pending';

    public function getDescription(): ?string
    {
        return match ($this) {
            self::APPROVED => 'This request is t',
            self::DECLINED => 'Low Priority',
            self::PENDING => 'Medium Priority',
        };
    }

    public function getColor(): ?string
    {
        return match ($this) {
            self::APPROVED => 'success',
            self::DECLINED => 'danger',
            self::PENDING => 'secondary',
        };
    }

    public function getIcon(): ?string
    {
        return match ($this) {
            self::APPROVED => 'heroicon-c-check-badge',
            self::DECLINED => 'heroicon-c-x-circle',
            self::PENDING => 'heroicon-o-check',
        };
    }

    public static function options(): array
    {
        return array_map(fn ($case) => $case->value.' - '.$case->getDescription(), self::cases());
    }
}
