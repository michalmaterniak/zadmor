<?php

namespace App\MichalM\Repository\Movie\Filters;

use App\MichalM\Repository\Movie\Movie;
use MichalM\IRecord;

class FirstWLetterFilter extends MoveFilter
{
    public function check(Movie|IRecord $value): bool
    {
        $value = $value->getTitle();

        return lcfirst(mb_substr((string)$value, 0, 1)) === 'w';
    }
}