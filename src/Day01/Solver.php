<?php

declare(strict_types=1);

namespace App\Day01;

use App\Task;

class Solver extends Task
{

    public function partOne(): int
    {
        $numbers = [];
        foreach ($this->getFileInput()->getLines() as $line) {
            /** @var string $line */
            $numbersInLine = [];
            for ($i = 0, $length = strlen($line); $i < $length; $i++) {
                if (preg_match('/\d/', $line[$i])) {
                    $numbersInLine[] = $line[$i];
                }
            }

            $a = $numbersInLine[0] ?? '';
            $b = $numbersInLine[count($numbersInLine) - 1] ?? '';
            $numbers[] = (int)($a . $b);
        }

        return array_sum($numbers);
    }

    public function partTwo(): int
    {
        $digitsByName = [
            1 => 'one',
            'two',
            'three',
            'four',
            'five',
            'six',
            'seven',
            'eight',
            'nine'
        ];
        $numbers = [];
        foreach ($this->getFileInput()->getLines() as $line) {
            /** @var string $line */
            $part = '';
            $numbersInLines = [];
            for ($i = 0, $length = strlen($line); $i < $length; $i++) {
                if (preg_match('/\d/', $line[$i])) {
                    $numbersInLines[] = $line[$i];
                    $part = '';
                } else {
                    $part .= $line[$i];
                    foreach ($digitsByName as $digit => $name) {
                        if (str_contains($part, $name)) {
                            $numbersInLines[] = $digit;
                            // eightwo -> 8 and 2
                            $part = $part[strlen($part) - 1];
                            break;
                        }
                    }
                }
            }
            $numbers[] = (int)($numbersInLines[0] . $numbersInLines[count($numbersInLines) - 1]);
        }

        return array_sum($numbers);
    }

}
