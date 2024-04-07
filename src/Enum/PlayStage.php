<?php

namespace App\Enum;

enum PlayStage: string
{
    case GROUP_STAGE = 'Group stage';
    case R16 = 'R16';
    case QUARTER_FINAL = 'Quarter final';
    case SEMI_FINAL = 'Semi final';
    case FINAL = 'Final';

    public static function values(): array
    {
        return ['Group stage', 'R16', 'Quarter final', 'Semi final', 'Final'];
    }
}
