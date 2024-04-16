<?php

declare(strict_types=1);

namespace App\Application;

readonly class MainResponse
{
    public function __construct(
        public array $randomlySortedCardValues,
        public array $randomlySortedColors,
        public array $randomlySortedHandGame,
        public array $sortedByCardValuesAndColorsHandGame,
    ) {}
}
