<?php

namespace App\Repository\Movie\Filters;

use App\Repository\Movie\Movie;
use MichalM\IRecord;

class FirstWLetterFilter extends MoveFilter
{
    public function check(Movie|IRecord $value): bool
    {
        $value = $value->getTitle();

        return lcfirst(mb_substr((string)$value, 0, 1)) === 'w';
    }
}