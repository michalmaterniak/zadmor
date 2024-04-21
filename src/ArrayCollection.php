<?php

namespace MichalM;

abstract class ArrayCollection extends \ArrayObject
{
    public function __construct(array $array = [])
    {
        foreach ($array as $value) {
            $this->insert($value);
        }

        $this->setFlags(0);
        $this->setIteratorClass("ArrayIterator");
    }

    abstract public function insert(mixed $value);

    public static function create(object|array $array): static
    {
        return new static($array);
    }

    public function geArrayKeys(): array
    {
        return array_keys((array)$this);
    }

    public function copy(): static
    {
        return clone $this;
    }

    public function get(mixed $key): mixed
    {
        return $this[$key];
    }
}