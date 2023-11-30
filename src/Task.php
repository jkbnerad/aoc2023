<?php

declare(strict_types=1);

namespace App;

abstract class Task
{
    public function __construct(private FileInput $fileInput)
    {
    }
    protected function getFileInput(): FileInput
    {
        return $this->fileInput;
    }

    abstract public function partA(): int;
    abstract public function partB(): int;
}
