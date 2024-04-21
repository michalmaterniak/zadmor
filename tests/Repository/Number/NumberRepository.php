<?php

namespace TestMichalM\Repository\Number;

use MichalM\Repository\Repository;
use TestMichalM\Repository\Filters\EvenNumberFilter;

class NumberRepository extends Repository
{
    public function getEmptyArray(): NumberCollection
    {
        return new NumberCollection();
    }

    /**
     * @return NumberCollection
     */
    public function findEvenNumbers(): NumberCollection
    {
        return $this->filter(new EvenNumberFilter());
    }
}