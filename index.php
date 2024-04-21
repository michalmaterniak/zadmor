<?php

use MichalM\Repository\Movie\MovieRepository;

require_once __DIR__ . "/vendor/autoload.php";
try {
    $driverFacotry = new \MichalM\DriverFactory((new \MichalM\Config())->getConfig());
    $movieRepository = new MovieRepository($driverFacotry->getAdapterDriver());

    dump($movieRepository->findWordsMoreOne());
    dump($movieRepository->findFirstWEventCountLetterCount());
    dump($movieRepository->get3Random());
} catch (\MichalM\ZadmorException $exception) {
    echo $exception->getMessage();
}
