<?php

declare(strict_types=1);

namespace App\Tests\Utils;

use App\Model\CardVO;
use App\Model\Deck;
use App\Model\Enum\CardValue;
use App\Model\Enum\Color;

final class CardProvider
{
    public static function provideColor(): Color
    {
        return Color::cases()[array_rand(Color::cases())];
    }

    public static function provideCardValue(): CardValue
    {
        return CardValue::cases()[array_rand(CardValue::cases())];
    }

    /** @return array<CardVO[]> */
    public static function provideCard(): array
    {
        return [[new CardVO(self::provideColor(), self::provideCardValue())]];
    }

    /** @return array<CardVO[]> */
    public static function provideCards($count = 10): array
    {
        $deck = new Deck();
        $deck->shuffle();

        return [array_map(fn(int $keys) => $deck->getCards()[$keys], array_rand($deck->getCards(), $count))];
    }
}
