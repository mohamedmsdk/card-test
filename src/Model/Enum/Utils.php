<?php

declare(strict_types=1);

namespace App\Model\Enum;

trait Utils
{
    /** @return array<self> */
    public static function all(): array
    {
        $cases = self::cases();
        shuffle($cases);

        return $cases;
    }

    /** @return array<self> */
    public static function sortRandomly(): array
    {
        $cases = self::all();
        shuffle($cases);

        return $cases;
    }
}
