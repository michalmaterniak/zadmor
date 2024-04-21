<?php

namespace MichalM\Drivers\Parsers;

class DefaultParser implements ParserInterface
{
    public function parse(mixed $data): mixed
    {
        return $data;
    }
}