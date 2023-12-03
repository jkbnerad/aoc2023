<?php

declare(strict_types=1);

use App\Day02\Solver;
use App\FileInput;
use Tester\Assert;

require_once '../../bootstrap.php';

$class = new Solver(new FileInput('inputOne.txt'));

Assert::equal(8, $class->partOne());

$class = new Solver(new FileInput('inputOne.txt'));

Assert::equal(2286, $class->partTwo());
