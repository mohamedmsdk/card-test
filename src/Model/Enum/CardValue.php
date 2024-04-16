<?php

declare(strict_types=1);

namespace App\Model\Enum;

enum CardValue
{
    use Utils;

    case AS;
    case TWO;
    case THREE;
    case FOUR;
    case FIVE;
    case SIX;
    case SEVEN;
    case EIGHT;
    case NINE;
    case TEN;
    case J;
    case Q;
    case K;
}
