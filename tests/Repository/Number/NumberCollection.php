<?php

namespace TestMichalM\Repository\Number;

use MichalM\ArrayCollection;

/**
 * @method Number[] findAll()
 * @method Number get(mixed $key)
 */
class NumberCollection extends ArrayCollection
{
    public function insert(mixed $value): void
    {
        $this->append(new Number($value));
    }
}