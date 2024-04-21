<?php

namespace MichalM\Repository;

use MichalM\ArrayCollection;
use MichalM\Drivers\AdapterDriverInterface;
use MichalM\Repository\Filters\Filter;

abstract class Repository
{
    private readonly ArrayCollection $source;

    public function __construct(AdapterDriverInterface $driver)
    {
        $this->source = $this->getEmptyArray()::create($driver->getData());
    }

    abstract public function getEmptyArray(): ArrayCollection;

    public function check(mixed $value, Filter ...$filters): bool
    {
        foreach ($filters as $filter) {
            if (!$filter->check($value)) {
                return false;
            }
        }

        return true;
    }

    public function filter(Filter ...$filters): ArrayCollection
    {
        $collection = $this->getEmptyArray();

        foreach ($this->source as $value) {
            if ($this->check($value, ...$filters)) {
                $collection->append($value);
            }
        }

        return $collection;
    }

    public function findAll(): ArrayCollection
    {
        return clone $this->source;
    }
}