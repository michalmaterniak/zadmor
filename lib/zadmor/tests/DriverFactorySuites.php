<?php

namespace TestMichalM;

use MichalM\Drivers\ArrayFileAdapterDriver;
use MichalM\ZadmorException;

trait DriverFactorySuites
{
    public static function getCorrectDefaultDrivers(): array
    {
        return [
            [['driver' => ['type' => 'array_file', 'source' => __DIR__ . '/resources/records.php']], ArrayFileAdapterDriver::class],
            [['driver' => ['source' => __DIR__ . '/resources/records.php']], ArrayFileAdapterDriver::class],
        ];
    }

    public static function getInorrectDefaultDrivers(): array
    {
        return [
            [['driver' => ['type' => 'array_file', 'source' => 'qwerty']], ZadmorException::class],
            [['driver' => ['type' => 'incorrect']], ZadmorException::class],
            [[], ZadmorException::class],
        ];
    }
}