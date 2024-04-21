<?php

namespace MichalM\Drivers;

use MichalM\ZadmorException;

class ArrayFileAdapterDriver extends AdapterDriver implements AdapterDriverInterface
{
    protected string $filepath;

    public function __construct(array $config)
    {
        parent::__construct($config);

        $this->filepath = $config['source'];
    }

    protected function loadSource(): void
    {
        if (!file_exists($this->filepath)) {
            throw new ZadmorException('Source ' . $this->filepath . ' file does not exist');
        }

        $source = require $this->filepath;

        foreach ($source as $data) {
            $this->source[] = $this->parser->parse($data);
        }
    }

    public function getData(): array
    {
        if (!isset($this->source)) {
            $this->loadSource();
        }

        return $this->source;
    }

}