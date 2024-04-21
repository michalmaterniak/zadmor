<?php

namespace TestMichalM;

use MichalM\DriverFactory;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use TestMichalM\Drivers\CsvAdapterDriver;
use TestMichalM\Drivers\CsvAdapterDriverSuites;

class DriverFactoryTest extends TestCase
{
    use DriverFactorySuites, CsvAdapterDriverSuites;

    #[DataProvider('getCorrectDefaultDrivers')]
    public function testGetAdapterDriverCorrect(array $config, string $expected)
    {
        $arrayFileDriver = new DriverFactory($config);

        $this->assertInstanceOf($expected, $arrayFileDriver->getAdapterDriver());
    }

    #[DataProvider('getInorrectDefaultDrivers')]
    public function testGetAdapterDriverIncorrect(array $config, string $expected)
    {
        $this->expectException($expected);
        new DriverFactory($config);
    }

    #[DataProvider('getNewDrivers')]
    public function testNewDriver(array $config): void
    {
        $driverFactory = new DriverFactory($config);
        $adapter = $driverFactory->getAdapterDriver();
        $this->assertInstanceOf(CsvAdapterDriver::class, $adapter);
    }
}