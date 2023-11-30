<?php

declare(strict_types=1);

namespace App;

class FileInput
{
    /**
     * @var resource
     */
    private $file;

    public function __construct(string $input)
    {
        $file = fopen($input, 'rb');
        if ($file === false) {
            throw new \RuntimeException(sprintf('The file %s was not loaded.', $input));
        }

        $this->file = $file;
    }

    /**
     * @return false|resource
     */
    public function getFile()
    {
        return $this->file;
    }

    public function getLines(): \Generator
    {
        rewind($this->file);
        while ($line = fgets($this->file)) {
            yield rtrim($line, PHP_EOL);
        }
    }

    public function getFirstLine(): string
    {
        rewind($this->file);
        $l = fgets($this->file);
        return $l ? rtrim($l, PHP_EOL) : '';
    }

    public function __destruct()
    {
        fclose($this->file);
    }
}
