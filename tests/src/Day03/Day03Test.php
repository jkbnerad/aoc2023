<?php

declare(strict_types=1);

use App\Day03\Solver;
use App\FileInput;
use Tester\Assert;

require_once '../../bootstrap.php';


$class = new Solver(new FileInput('inputOne.txt'));

Assert::equal(925, $class->partOne());
Assert::equal(6756, $class->partTwo());

