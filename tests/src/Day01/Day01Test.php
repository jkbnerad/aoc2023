<?php

declare(strict_types=1);

use App\Day01\Solver;
use App\FileInput;
use Tester\Assert;

require_once '../../bootstrap.php';

$class = new Solver(new FileInput('inputA.txt'));
Assert::equal(142, $class->partOne());

$class = new Solver(new FileInput('inputB.txt'));
Assert::equal(365, $class->partTwo());

