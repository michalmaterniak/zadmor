<?php

namespace TestMichalM\Drivers;

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class CsvAdapterDriverTest extends TestCase
{
    use CsvAdapterDriverSuites;

    #[DataProvider('getNewDriversData')]
    public function testCsvDriverData(array $config, array $expected)
    {
        $csvAdapter = new CsvAdapterDriver($config);
        $this->assertSame($expected, $csvAdapter->getData());
    }
}