<?php

namespace App\MichalM\Repository\Movie\Filters;

use App\MichalM\Repository\Movie\Movie;
use MichalM\IRecord;
use MichalM\Repository\Filters\Filter;

abstract class MoveFilter implements Filter
{
    abstract public function check(Movie|IRecord $value): bool;
}