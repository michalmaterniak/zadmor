<?php

namespace App\MichalM\Repository\Movie\Filters;

use App\MichalM\Repository\Movie\Movie;
use MichalM\IRecord;

class EvenCountLettersFilter extends MoveFilter
{
    public function check(Movie|IRecord $value): bool
    {
        $title = trim($value->getTitle());

        return mb_strlen($title) % 2 === 0;
    }
}