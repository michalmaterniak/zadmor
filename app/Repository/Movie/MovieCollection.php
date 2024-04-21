<?php

namespace App\MichalM\Repository\Movie;

use MichalM\ArrayCollection;

class MovieCollection extends ArrayCollection
{
    public function insert(mixed $value): void
    {
        $this->append(new Movie($value));
    }

    public function __serialize(): array
    {
        return (array)$this;
    }
}