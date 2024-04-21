<?php

namespace TestMichalM\Drivers;

use MichalM\Drivers\AdapterDriverInterface;
use MichalM\ZadmorException;
use MichalM\Drivers\AdapterDriver;

class CsvAdapterDriver extends AdapterDriver implements AdapterDriverInterface
{
    private string $separator = ',';

    private string $enclosure = '"';

    private string $filepath;

    public function __construct(array $config)
    {
        if (!isset($config['source'])) {
            throw new ZadmorException("Source is required");
        }

        $this->filepath =   $config['source'];
        $this->separator =  $config['separator'] ?? $this->separator;
        $this->enclosure =  $config['enclosure'] ?? $this->enclosure;
        parent::__construct($config);
    }

    protected function loadSource(): void
    {
        foreach (['separator', 'enclosure'] as $key) {
            if (isset($config['separator'])) {
                $this->{$key} = $config[$key];
            }
        }

        $file = fopen($this->filepath,'r');

        if (false === $file) {
            throw new \Exception("Unable to open source file");
        }

        while (($data = fgetcsv($file, null, $this->separator, $this->enclosure)) !== false) {
            $this->source[] = $this->parser->parse($data);
        }

        fclose($file);
    }

    public function getData(): array
    {
        if (!isset($this->source)) {
            $this->loadSource();
        }

        return $this->source;
    }
}