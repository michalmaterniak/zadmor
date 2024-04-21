<?php

namespace App\MichalM\Repository\Movie;

use App\MichalM\Repository\Movie\Filters\EvenCountLettersFilter;
use App\MichalM\Repository\Movie\Filters\FirstWLetterFilter;
use App\MichalM\Repository\Movie\Filters\MoreThanOneWordsFilter;
use MichalM\Repository\Filters\Filter;
use MichalM\Repository\Repository;
use MichalM\ZadmorException;

/**
 * @method MovieCollection filter(Filter ...$filters)
 */
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
     * @return Movie[]
     *  Zwracane są 3 losowe tytuły.
     */
    public function find3Random(): MovieCollection
    {
        return $this->random(3);
    }

    /**
     * @return Movie[]
     * Zwracane są wszystkie filmy na literę ‘W’ ale tylko jeśli mają parzystą liczbę znaków w tytule.
     */
    public function findFirstWEventCountLetterCount(): MovieCollection
    {
        return $this->filter(new FirstWLetterFilter(), new EvenCountLettersFilter());
    }

    /**
     * @return Movie[]
     * Zwracany są wszystkie tytuły, które składają się z więcej niż 1 słowa.
     */
    public function findWordsMoreOne(): MovieCollection
    {
        return $this->filter(new MoreThanOneWordsFilter());
    }
}