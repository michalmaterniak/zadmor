<?php

namespace TestMichalM\Drivers;

use MichalM\Drivers\ArrayFileAdapterDriver;
use MichalM\ZadmorException;
use PHPUnit\Framework\Attributes\DataProvider;

class ArrayFileAdapterDriverTest extends AdapterDriver
{
    use ArrayFileAdapterDriverSuites;

    #[DataProvider('getDataArrayFileCorrect')]
    public function testCorrectData(array $config, array $expected): void
    {
        $driver = new ArrayFileAdapterDriver($config);
        $this->assertSame($expected, $driver->getData());
    }

    #[DataProvider('getInvalidSource')]
    public function testInvalidSource(array $config): void
    {
        $this->expectException(ZadmorException::class);
        $driver = new ArrayFileAdapterDriver($config);
        $driver->getData();
    }
}