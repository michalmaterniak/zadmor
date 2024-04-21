<?php

namespace TestMichalM\Repository\Filters;

use MichalM\Repository\Filters\Filter;
use TestMichalM\Repository\Number\Number;
use MichalM\IRecord;

class EvenNumberFilter implements Filter
{
    public function check(Number|IRecord $value): bool
    {
        return $value->isEven();
    }
}