<?php

declare(strict_types=1);

namespace App\Day03;

use App\Task;
use League\CLImate\CLImate;

class Solver extends Task
{

    public function partOne(): int
    {
        $matrix = [];
        $matrix[] = [];

        $numbers = [];
        $coordinates = [];
        $blockers = [];
        foreach ($this->getFileInput()->getLines() as $l => $line) {

            /** @var string $line */

            $part = [];
            $n = [];
            for ($i = 0, $length = strlen($line); $i < $length; $i++) {
                $c = $line[$i];
                $matrix[$l][$i] = $c;
                if (preg_match('/\d/', $c)) {
                    $part[] = $c;
                    $n[] = $i;
                } else {
                    if (count($part) > 0) {
                        $numbers[] = (int)implode('', $part);
                        $coordinates[] = [$l, min($n), max($n)];
                        $part = [];
                    }

                    if ($c !== '.') {
                        $blockers[] = [$l, $i];
                    }

                    $n = [];
                }
            }

            if (count($part) > 0) {
                $numbers[] = (int)implode('', $part);
                $coordinates[] = [$l, min($n), max($n)];
            }
        }

        $ok = [];
        foreach ($blockers as $blocker) {
            [$r, $c] = $blocker;
            for ($i = -1; $i <= 1; $i++) {
                for ($j = -1; $j <= 1; $j++) {
                    $a = $r + $i;
                    $b = $c + $j;
                    foreach ($coordinates as $k => $coordinate) {
                        [$aa, $bMin, $bMax] = $coordinate;
                        if ($a === $aa && $bMin <= $b && $bMax >= $b) {
                            $ok[$aa . '-' . $bMin . '-' . $bMax . '-' . $k] = $numbers[$k];
                        }
                    }
                }
            }
        }

        $m = count($matrix); // rows
        $n = count($matrix[0]); // columns

        $this->showMatrix($matrix);

        return array_sum($ok);
    }

    private function showMatrix(array $matrix): void
    {
        $climate = new CLImate();
        foreach ($matrix as $line) {
            $climate->out(implode('', $line));
        }
    }

    public function partTwo(): int
    {
        $matrix = [];
        $matrix[] = [];

        $numbers = [];
        $coordinates = [];
        $blockers = [];
        foreach ($this->getFileInput()->getLines() as $l => $line) {
            /** @var string $line */
            $part = [];
            $n = [];
            for ($i = 0, $length = strlen($line); $i < $length; $i++) {
                $c = $line[$i];
                $matrix[$l][$i] = $c;
                if (preg_match('/\d/', $c)) {
                    $part[] = $c;
                    $n[] = $i;
                } else {
                    if (count($part) > 0) {
                        $numbers[] = (int)implode('', $part);
                        $coordinates[] = [$l, min($n), max($n)];
                        $part = [];
                    }

                    if ($c === '*') {
                        $blockers[] = [$l, $i];
                    }

                    $n = [];
                }
            }

            if (count($part) > 0) {
                $numbers[] = (int)implode('', $part);
                $coordinates[] = [$l, min($n), max($n)];
            }
        }

        $ok = [];
        foreach ($blockers as $blocker) {
            [$r, $c] = $blocker;
            for ($i = -1; $i <= 1; $i++) {
                for ($j = -1; $j <= 1; $j++) {
                    $a = $r + $i;
                    $b = $c + $j;
                    foreach ($coordinates as $k => $coordinate) {
                        [$aa, $bMin, $bMax] = $coordinate;
                        if ($a === $aa && $bMin <= $b && $bMax >= $b) {
                            $v = $r . '-' . $c;
                            if (!isset($ok[$v])) {
                                $ok[$v][$k] = $numbers[$k];
                            } else {
                                $ok[$v][$k] = $numbers[$k];
                            }
                        }
                    }
                }
            }
        }

        $multiply = [];
        foreach ($ok as $numbers) {
            if (count($numbers) === 2) {
                $multiply[] = (int)array_product($numbers);
            }
        }

        $this->showMatrix($matrix);

        return array_sum($multiply);
    }
}
