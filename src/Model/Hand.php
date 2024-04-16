<?php

declare(strict_types=1);

namespace App\Model;

use App\Model\Enum\CardValue;
use App\Model\Enum\Color;

class Hand
{
    /** @var CardVO[] */
    private array $cards = [];

    public function __construct(Deck $deck)
    {
        $this->cards = array_map(fn(int $keys) => $deck->getCards()[$keys], array_rand($deck->getCards(), 10));
    }

    public function getCards(): array
    {
        return $this->cards;
    }

    /**
     * @param CardValue[] $sortedValues
     * @param Color[] $sortedColors
     */
    public function sortByGivenValuesAndColors(array $sortedValues, array $sortedColors): self
    {
        $sortedValues = array_map(fn(CardValue $cardValue) => $cardValue->name, $sortedValues);
        $sortedColors = array_map(fn(Color $color) => $color->name, $sortedColors);

        usort($this->cards, function (CardVO $a, CardVO $b) use ($sortedValues, $sortedColors) {
            $aColorPosition = array_search($a->color->name, $sortedColors);
            $bColorPosition = array_search($b->color->name, $sortedColors);

            $aValuePosition = array_search($a->value->name, $sortedValues);
            $bValuePosition = array_search($b->value->name, $sortedValues);

            return $aColorPosition === $bColorPosition ? $aValuePosition <=> $bValuePosition : $aColorPosition <=> $bColorPosition;
        });

        return $this;
    }
}
