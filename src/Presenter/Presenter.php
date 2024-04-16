<?php

namespace App\Presenter;

use App\Application\MainResponse;

interface Presenter
{
    public function present(MainResponse $response): void;
    public function getView(): string;
}