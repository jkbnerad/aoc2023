<?php

declare(strict_types=1);

use League\CLImate\CLImate;

require __DIR__ . '/vendor/autoload.php';

$climate = new CLImate();

$climate->br();
$climate->bold('Welcome in AOC 2023!');
$climate->br();
