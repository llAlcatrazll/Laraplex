<?php

namespace App\Enums;

enum VehicleType: string
{
    case ISUZU = 'isuzu';
    case HIACE = 'hi-ace';
    case KIA = 'kia';
    case SMALLBUS = 'small buss';

    public function getDescription(): ?string
    {
        return match ($this) {
            self::ISUZU => 'This request is t',
            self::HIACE => 'Low Priority',
            self::KIA => 'Medium Priority',
            self::SMALLBUS => 'Medium Priority',
        };
    }

    // public function getColor(): ?string
    // {
    //     return match ($this) {
    //         self::APPROVED => 'success',
    //         self::DECLINED => 'danger',
    //         self::PENDING => 'secondary',
    //     };
    // }

    // public function getIcon(): ?string
    // {
    //     return match ($this) {
    //         self::APPROVED => 'heroicon-c-check-badge',
    //         self::DECLINED => 'heroicon-c-x-circle',
    //         self::PENDING => 'heroicon-o-check',
    //     };
    // }

    public static function options(): array
    {
        return array_map(fn ($case) => $case->value.' - '.$case->getDescription(), self::cases());
    }
}
