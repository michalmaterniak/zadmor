<?php

namespace TestMichalM\Drivers\Parsers;

use MichalM\Drivers\Parsers\ParserInterface;

class NumbersParser implements ParserInterface
{
    public function parse(mixed $data): array
    {
        if (!is_array($data)) {
            $data = [$data];
        }

        foreach (array_keys($data) as $key) {
            $data[$key] = (int)$data[$key];
        }

        return $data;
    }
}