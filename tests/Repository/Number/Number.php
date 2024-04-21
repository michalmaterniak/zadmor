<?php

namespace TestMichalM\Repository\Number;

use MichalM\IRecord;

readonly class Number implements IRecord
{
    protected int $number;

    public function __construct(int $number)
    {
        $this->number = $number;
    }

    public function getNumber(): int
    {
        return $this->number;
    }

    public function isEven(): bool
    {
        return $this->number % 2 === 0;
    }
}