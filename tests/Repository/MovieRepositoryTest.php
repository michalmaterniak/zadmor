<?php

namespace TestApp\MichalM\Repository;

use App\MichalM\Repository\Movie\MovieRepository;
use MichalM\Drivers\ArrayFileAdapterDriver;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class MovieRepositoryTest extends TestCase
{
    use MovieSuites;

    protected MovieRepository $repository;

    private function getRepository(int $nrSuite): MovieRepository
    {
        return  new MovieRepository(
            new ArrayFileAdapterDriver(['source' => __DIR__ . "/../resources/movies{$nrSuite}.php"]),
        );
    }

    #[DataProvider('getResults')]
    public function testMovieResuls(int $nrSuite, int $expected)
    {
        $this->assertSame($expected, $this->getRepository($nrSuite)->findAll()->count());
    }

    #[DataProvider('getFirsLetterEvenCountLetters')]
    public function testFirsLetterEvenCountLetters(int $nrSuite, int $count, array $expected)
    {
        $collection = $this->getRepository($nrSuite)->findFirstWEventCountLetterCount();
        $this->assertSame($count, $collection->count());

        foreach ($collection as $index => $movie) {
            $this->assertSame($expected[$index], $collection->get($index)->getTitle());
        }
    }

    #[DataProvider('getMoreThanOneWords')]
    public function testMoreThanOneWords(int $nrSuite, int $count, array $expected)
    {
        $collection = $this->getRepository($nrSuite)->findWordsMoreOne();
        $this->assertSame($count, $collection->count());

        foreach ($collection as $index => $movie) {
            $this->assertSame($expected[$index], $collection->get($index)->getTitle());
        }
    }
}