<?php

declare(strict_types=1);

namespace App\Tests\Model;

use App\Model\CardVO;
use App\Model\Deck;
use PHPUnit\Framework\TestCase;

class DeckTest extends TestCase
{
    public function testGetCards()
    {
        $deck = new Deck();
        $this->assertCount(52, $deck->getCards());
        $this->assertContainsOnlyInstancesOf(CardVO::class, $deck->getCards());
    }
}
