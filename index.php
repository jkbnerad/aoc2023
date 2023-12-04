<?php

declare(strict_types=1);

use App\Day01\Solver;
use App\FileInput;
use League\CLImate\CLImate;

require __DIR__ . '/vendor/autoload.php';

$basePath = __DIR__ . '/data/';
$climate = new CLImate();

$climate->br();
$climate->bold('Welcome in AOC 2023!');
$climate->br();

$climate->bold('Day 01');
$climate->bold('Part A');
$day01 = new Solver(new FileInput($basePath . 'Day01/input.txt'));
$climate->bold('Result One: ' . $day01->partOne());
$climate->bold('Result Two: ' . $day01->partTwo());


$climate->bold('Day 02');
$climate->bold('Part A');
$day02 = new \App\Day02\Solver(new FileInput($basePath . 'Day02/input.txt'));
$climate->bold('Result One: ' . $day02->partOne());
$climate->bold('Result Two: ' . $day02->partTwo());

$climate->bold('Day 03');
$climate->bold('Part A');
$day03 = new \App\Day03\Solver(new FileInput($basePath . 'Day03/input.txt'));
$climate->bold('Result One: ' . $day03->partOne());
$climate->bold('Result One: ' . $day03->partTwo());
