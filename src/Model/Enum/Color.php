<?php

declare(strict_types=1);

namespace App\Model\Enum;

enum Color
{
    use Utils;
    case CLUBS;
    case DIAMONDS;
    case HEARTS;
    case SPADES;
}
