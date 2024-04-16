<?php

declare(strict_types=1);

namespace App\Presenter;

use App\Model\CardVO;

class CardUtils
{
    public static function prettify(CardVO $card): array
    {
        return [
            'value' => $card->value->name,
            'color' => $card->color->name,
        ];
    }
}
