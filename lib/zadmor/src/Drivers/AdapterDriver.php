<?php

namespace MichalM\Drivers;

use MichalM\Drivers\Parsers\DefaultParser;
use MichalM\Drivers\Parsers\ParserInterface;

abstract class AdapterDriver
{
    protected ParserInterface $parser;

    protected array $source;

    public function __construct(array $config)
    {
        $config['parser'] = $config['parser'] ?? DefaultParser::class;
        $this->loadParser($config['parser'] ?? DefaultParser::class);
    }

    protected function loadParser(string $parserClass): void
    {
        $this->parser = new $parserClass();
    }

    abstract protected function loadSource(): void;
}