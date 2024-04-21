<?php

namespace App\Repository\Movie;

use MichalM\IRecord;

readonly class Movie implements IRecord
{
    public function __construct(protected string $title)
    {}

    public function getTitle(): string
    {
        return $this->title;
    }
}