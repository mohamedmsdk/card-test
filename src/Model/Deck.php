<?php

declare(strict_types=1);

namespace App\Model;

use App\Model\Enum\CardValue;
use App\Model\Enum\Color;

class Deck
{
    /** @var CardVO[] */
    private array $cards = [];

    public function __construct()
    {
        $this->create();
    }

    /** @return CardVO[] */
    public function getCards(): array
    {
        return $this->cards;
    }

    public function shuffle(): self
    {
        shuffle($this->cards);

        return $this;
    }

    private function create(): void
    {
        foreach (CardValue::cases() as $cardValue) {
            foreach (Color::cases() as $color) {
                $this->cards[] = new CardVO($color, $cardValue);
            }
        }
    }
}
