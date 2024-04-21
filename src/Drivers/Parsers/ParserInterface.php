<?php

namespace MichalM\Drivers\Parsers;

interface ParserInterface
{
    public function parse(mixed $data): mixed;
}