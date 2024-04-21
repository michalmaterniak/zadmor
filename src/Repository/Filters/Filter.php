<?php

namespace MichalM\Repository\Filters;

use MichalM\IRecord;

interface Filter
{
    public function check(IRecord $value): bool;
}