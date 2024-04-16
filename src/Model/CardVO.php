<?php

declare(strict_types=1);

namespace App\Model;

use App\Model\Enum\CardValue;
use App\Model\Enum\Color;

readonly class CardVO
{
    public function __construct(
        public Color $color,
        public CardValue $value,
    ) {}
}
