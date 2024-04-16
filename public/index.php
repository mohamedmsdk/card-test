<?php

use App\Application\Main;
use App\Presenter\MainPresenter;

require_once dirname(__DIR__).'/vendor/autoload.php';

$presenter = new MainPresenter();

(new Main())($presenter);

echo $presenter->getView();

exit();