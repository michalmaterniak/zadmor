<?php

namespace App\Repository\Movie\Filters;

class EvenCountLettersFilter extends MoveFilter
{
    public function check(mixed $value): bool
    {
        $title = trim($value->getTitle());

        return mb_strlen($title) % 2 === 0;
    }
}