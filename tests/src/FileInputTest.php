<?php

declare(strict_types=1);

use App\FileInput;
use Tester\Assert;

require_once '../bootstrap.php';

$class = new FileInput('input.txt');
Assert::equal('a 1', $class->getFirstLine());
