<?php

namespace App\Repository\Movie;

use App\Repository\Movie\Filters\EvenCountLettersFilter;
use App\Repository\Movie\Filters\FirstWLetterFilter;
use App\Repository\Movie\Filters\MoreThanOneWordsFilter;
use MichalM\Repository\Repository;
use MichalM\ZadmorException;

class MovieRepository extends Repository
{
    public function getEmptyArray(): MovieCollection
    {
        return new MovieCollection();
    }

    public function random(int $count): MovieCollection
    {
        $source = $this->findAll();

        $keys = $source->geArrayKeys();

        if ($count > count($keys)) {
            throw new ZadmorException("The number of rows is too big!");
        } elseif ($count === count($keys)) {
            return $source;
        }

        $rands = $this->getEmptyArray();

        for($i = 0; $i < $count; $i++)  {
            $rand = rand(0, count($keys) - 1);
            $rands->append($source[$keys[$rand]]);
            unset($keys[$rand]);
            $keys = array_values($keys);
        }

        return $rands;
    }

    /**
     * Zwracane są 3 losowe tytuły.
     */
    public function get3Random(): MovieCollection
    {
        return $this->random(3);
    }

    /**
     * Zwracane są wszystkie filmy na literę ‘W’ ale tylko jeśli mają parzystą liczbę znaków w tytule.
     */
    public function findFirstWEventCountLetterCount(): MovieCollection
    {
        return $this->filter(new FirstWLetterFilter(), new EvenCountLettersFilter());
    }

    /**
     * Zwracany są wszystkie tytuły, które składają się z więcej niż 1 słowa.
     */
    public function findWordsMoreOne()
    {
        return $this->filter(new MoreThanOneWordsFilter());
    }
}