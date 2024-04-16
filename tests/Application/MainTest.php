<?php

declare(strict_types=1);

namespace App\Tests\Application;

use App\Application\Main;
use App\Presenter\MainPresenter;
use PHPUnit\Framework\TestCase;

class MainTest extends TestCase
{
    public function test__invoke()
    {
        $presenter = new MainPresenter();

        (new Main())($presenter);

        $this->assertNotNull($presenter->getView());
        $this->assertIsString($presenter->getView());

        $result = json_decode($presenter->getView(), true);

        $this->assertArrayHasKey('cardValues', $result);
        $this->assertArrayHasKey('handGame', $result);
        $this->assertArrayHasKey('colors', $result);
        $this->assertArrayHasKey('sortedByCardValuesAndColors', $result);

        $this->assertCount(4, $result);

        foreach ($result as $item) {
            $this->assertNotNull($item);
            $this->assertIsArray($item);
        }
    }
}
