<?php

namespace MichalM\Drivers;

interface AdapterDriverInterface
{
    public function __construct(array $config);

    public function getData(): array;
}