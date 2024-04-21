<?php

namespace App\MichalM;

class Config
{
    protected array $config;

    public function __construct(array $config = [])
    {
        if (empty($config)) {
            $this->loadDefaultConfig();
        } else {
            $this->config = $config;
        }
    }

    protected function loadDefaultConfig(): void
    {
        $this->config = require __DIR__ . '/../data/config.php';
    }

    public function getConfig(): array
    {
        return $this->config;
    }
}