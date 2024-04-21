<?php

namespace TestMichalM\Drivers;

use TestMichalM\Drivers\Parsers\NumberParser;

trait ArrayFileAdapterDriverSuites
{
    public static function getDataArrayFileCorrect(): array
    {
        return [
            [['source' => __DIR__ . '/../resources/records.php'], [1, 3, 5, 8, 10]],
            [['' => 'array_file', 'source' => __DIR__ . '/../resources/records.php'], [1, 3, 5, 8, 10]],
            [['' => 'array_file', 'source' => __DIR__ . '/../resources/records2.php', 'parser' => NumberParser::class], [1, 3, 5, 8, 10]],
        ];
    }

    public static function getInvalidSource(): array
    {
        return [
            [['source' => 'qwerty']],
            [['' => 'array_file', 'source' => 'qwerty']],
        ];
    }
}