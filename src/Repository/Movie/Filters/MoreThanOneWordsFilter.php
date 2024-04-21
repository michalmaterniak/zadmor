<?php

namespace App\Repository\Movie\Filters;

use App\Repository\Movie\Movie;
use MichalM\IRecord;

class MoreThanOneWordsFilter extends MoveFilter
{
    public function check(Movie|IRecord $value): bool
    {
        $parts = explode(' ', $value->getTitle());

        return count($parts) > 1;
    }
}