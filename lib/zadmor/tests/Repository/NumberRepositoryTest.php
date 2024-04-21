<?php

namespace TestMichalM\Repository;

use MichalM\Drivers\ArrayFileAdapterDriver;
use PHPUnit\Framework\TestCase;
use TestMichalM\Repository\Number\Number;
use TestMichalM\Repository\Number\NumberCollection;
use TestMichalM\Repository\Number\NumberRepository;

class NumberRepositoryTest extends TestCase
{
    use NumberSuites;

    protected NumberRepository $repository;

    /**
     * @var Number[] $collection
     */
    protected $collection;

    protected function setUp(): void
    {
        $this->repository = new NumberRepository(
            new ArrayFileAdapterDriver(
                ['type' => 'array_file', 'source' => __DIR__ . '/../resources/records.php']
            )
        );
        $this->collection = $this->repository->findAll();
    }

    public function testCollectionType(): void
    {
        $this->assertSame(get_class($this->repository->getEmptyArray()), NumberCollection::class);
    }

    public function testCountNumbersRepository(): void
    {
        $this->assertSame(5, $this->collection->count());
    }

    public function testTypeElements(): void
    {
        foreach ($this->collection as $value) {
            $this->assertSame(Number::class, get_class($value));
        }
    }

    public function testElements(): void
    {
        $this->assertSame(5, $this->collection->count());

        $expected = [1, 3, 5, 8, 10];

        for($i = 0; $i < $this->collection->count(); ++$i) {
            $this->assertSame($expected[$i], $this->collection[$i]->getNumber());
        }
    }

    public function testEvenNumbers(): void
    {
        $evenNumbersCollection = $this->repository->findEvenNumbers();
        $this->assertSame(2, $evenNumbersCollection->count());

        $expected = [8, 10];

        for($i = 0; $i < $evenNumbersCollection->count(); ++$i) {
            $this->assertSame($expected[$i], $evenNumbersCollection[$i]->getNumber());
        }
    }
}