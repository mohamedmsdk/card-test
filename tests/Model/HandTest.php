<?php

declare(strict_types=1);

namespace App\Tests\Model;

use App\Model\Deck;
use App\Model\Enum\CardValue;
use App\Model\Enum\Color;
use App\Model\Hand;
use PHPUnit\Framework\TestCase;

class HandTest extends TestCase
{
    public function testSortByGivenValuesAndColors()
    {
        $hand = new Hand(new Deck());

        $randomlySortedCardValues = CardValue::sortRandomly();
        $randomlySortedCardValueNames = array_map(fn(CardValue $cardValue) => $cardValue->name, $randomlySortedCardValues);

        $randomlySortedColors = Color::sortRandomly();
        $randomlySortedColorsNames = array_map(fn(Color $color) => $color->name, $randomlySortedColors);

        $hand->sortByGivenValuesAndColors($randomlySortedCardValues, $randomlySortedColors);

        foreach ($hand->getCards() as $key => $card) {
            if (0 === $key) continue;
               if (array_search($card->color->name, $randomlySortedColorsNames) === array_search($hand->getCards()[$key - 1]->color->name, $randomlySortedColorsNames)) {
                   $this->assertTrue(array_search($card->value->name, $randomlySortedCardValueNames) > array_search($hand->getCards()[$key - 1]->value->name, $randomlySortedCardValueNames));
               } else {
                   $this->assertTrue(array_search($card->color->name, $randomlySortedColorsNames) > array_search($hand->getCards()[$key - 1]->color->name, $randomlySortedColorsNames));
               }
        }
    }
}
