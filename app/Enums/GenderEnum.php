<?php

namespace App\Enums;

enum GenderEnum : string
{
    case MALE = 'male';
    case FEMALE = 'female';

    public function toString(): string
    {
        return match ($this) {
            self::MALE => 'Male',
            self::FEMALE => 'Female'
        };
    }

    public function getColor(): ?string
    {
        return match ($this) {
            self::MALE => 'blue',
            self::FEMALE => 'pink',
        };
    }
}
