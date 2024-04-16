<?php

declare(strict_types=1);

namespace App\Application;

use App\Model\Deck;
use App\Model\Enum\CardValue;
use App\Model\Enum\Color;
use App\Model\Hand;
use App\Presenter\Presenter;

class Main
{
    public function __invoke(Presenter $mainPresenter): void
    {
        $deck = new Deck();
        $deck->shuffle();

        $hand = new Hand($deck);

        $mainPresenter->present(new MainResponse(
            $randomlySortedCardValues = CardValue::sortRandomly(),
            $randomlySortedColors = Color::sortRandomly(),
            $hand->getCards(),
            $hand->sortByGivenValuesAndColors($randomlySortedCardValues, $randomlySortedColors)->getCards(),
        ));
    }
}
