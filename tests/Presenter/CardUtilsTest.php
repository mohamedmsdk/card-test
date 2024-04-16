<?php

declare(strict_types=1);

namespace App\Tests\Presenter;

use App\Model\CardVO;
use App\Presenter\CardUtils;
use App\Tests\Utils\CardProvider;
use PHPUnit\Framework\Attributes\DataProviderExternal;
use PHPUnit\Framework\TestCase;

final class CardUtilsTest extends TestCase
{
    #[DataProviderExternal(CardProvider::class, 'provideCard')]
    public function testPrettify(CardVO $card): void
    {
        $cardUtils = new CardUtils();
        $this->assertSame($cardUtils->prettify($card), [
            'value' => $card->value->name,
            'color' => $card->color->name,
        ]);
    }
}
