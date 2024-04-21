<?php

namespace MichalM;

use MichalM\Drivers\AdapterDriverInterface;
use MichalM\Drivers\ArrayFileAdapterDriver;
use TestMichalM\Drivers\CsvAdapterDriver;

final class DriverFactory
{
    protected array $config;

    protected array $drivers = [
        'array_file' => ArrayFileAdapterDriver::class,
        'csv' => CsvAdapterDriver::class,
    ];

    public function __construct(array $config)
    {
        $this->config = $config['driver'] ?? [];

        if (!isset($this->config['type'])) {
            $this->config['type'] = 'array_file';
        }

        if (!isset($this->config['source'])) {
            throw new ZadmorException("Source type not specified");
        }

        if (!file_exists($this->config['source'])) {
            throw new ZadmorException("Source file '{$this->config['source']}' does not exist");
        }

        foreach ($this->config['drivers'] ?? [] as $key => $class) {
            if (!class_exists($class)) {
                throw new ZadmorException('Class "' . $class . '" does not exist.');
            }

            $this->addDriver($key, $class);
        }
    }

    public function getAdapterDriver(): AdapterDriverInterface
    {
        if (!isset($this->drivers[$this->config['type']])) {
            throw new ZadmorException("Unknown driver type '{$this->config['type']}'");
        }

        $driver = $this->drivers[$this->config['type']];

        return new $driver($this->config);
    }

    public function addDriver(string $name, string $className): void
    {
        $this->drivers[$name] = $className;
    }
}