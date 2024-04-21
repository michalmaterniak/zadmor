<?php

require_once __DIR__ . "/vendor/autoload.php";
try {
    $driverFacotry = new \MichalM\DriverFactory((new \App\MichalM\Config())->getConfig());
    $movieRepository = new \App\MichalM\Repository\Movie\MovieRepository($driverFacotry->getAdapterDriver());

    dump($movieRepository->findWordsMoreOne());
    dump($movieRepository->findFirstWEventCountLetterCount());
    dump($movieRepository->find3Random());
} catch (\MichalM\ZadmorException $exception) {
    echo $exception->getMessage();
}
