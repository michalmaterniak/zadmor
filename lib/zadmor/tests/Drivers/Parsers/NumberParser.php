<?php

namespace TestMichalM\Drivers\Parsers;

use MichalM\Drivers\Parsers\ParserInterface;

class NumberParser implements ParserInterface
{
    public function parse(mixed $data): int
    {
        return (int)$data[0];
    }
}