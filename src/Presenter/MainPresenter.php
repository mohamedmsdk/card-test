<?php

declare(strict_types=1);

namespace App\Presenter;

use App\Application\MainResponse;
use App\Model\CardVO;
use App\Model\Enum\CardValue;
use App\Model\Enum\Color;

class MainPresenter implements Presenter
{
    private array $view;
    public function present(MainResponse $response): void
    {
        $this->view = [
            'cardValues' => array_map(fn(CardValue $cardValue) => $cardValue->name ,$response->randomlySortedCardValues),
            'colors' => array_map(fn(Color $color) => $color->name ,$response->randomlySortedColors),
            'handGame' => $this->formatCards($response->randomlySortedHandGame),
            'sortedByCardValuesAndColors' => $this->formatCards($response->sortedByCardValuesAndColorsHandGame),
        ];
    }

    public function getView(): string
    {
        return json_encode($this->view, JSON_PRETTY_PRINT);
    }

    /** @param array<CardVO> $cards */
    private function formatCards(array $cards): array
    {
        $outputCards = [];

        foreach ($cards as $card) {
            $outputCards[] = CardUtils::prettify($card);
        }

        return $outputCards;
    }
}
