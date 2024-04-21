<?php

namespace TestMichalM\Drivers;

use TestMichalM\Drivers\Parsers\NumberParser;
use TestMichalM\Drivers\Parsers\NumbersParser;

trait CsvAdapterDriverSuites
{
    public static function getNewDrivers(): array
    {
        $config = [
            'driver' => [
                'type' => 'csv',
                'source' => __DIR__ . '/../resources/records.csv',
                'drivers' => [
                    'csv' => CsvAdapterDriver::class
                ]
            ]
        ];

        return [
            [$config]
        ];
    }

    public static function getNewDriversData(): array
    {
        return [
            [
                [
                    'type' => 'csv',
                    'source' => __DIR__ . '/../resources/records.csv',
                    'parser' => NumbersParser::class,
                    'drivers' => [
                        'csv' => CsvAdapterDriver::class
                    ]
                ],
                [[1, 10], [2,8], [5,5], [5, 5], [8, 2], [10, 1]]
            ],
            [
                [
                    'type' => 'csv',
                    'source' => __DIR__ . '/../resources/records2.csv',
                    'parser' => NumberParser::class,
                    'drivers' => [
                        'csv' => CsvAdapterDriver::class,
                    ]
                ],
                [1, 2, 5, 5, 8, 10]
            ],
        ];
    }
}