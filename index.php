<?php

use App\Repository\Movie\MovieRepository;

require_once __DIR__ . "/vendor/autoload.php";
try {
    $arrayFileAdapterDriver = new \MichalM\Drivers\ArrayFileAdapterDriver(
        ['source' => __DIR__ . '/tests/resources/movies2.php']
    );
    $movieRepository = new MovieRepository($arrayFileAdapterDriver);

    dump($movieRepository->findWordsMoreOne()->getArrayCopy());
    dump($movieRepository->findFirstWEventCountLetterCount()->getArrayCopy());
    dump($movieRepository->get3Random()->getArrayCopy());
} catch (\MichalM\ZadmorException $exception) {
    echo $exception->getMessage();
}
