<?php

namespace App\Enum;

enum StatusMatch: string
{
    case WIN = 'Win';
    case DRAW = 'Draw';

    public static function values(): array
    {
        return ['Win', 'Draw'];
    }
}
