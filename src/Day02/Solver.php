<?php

declare(strict_types=1);

namespace App\Day02;

use App\Task;
use League\CLImate\CLImate;

class Solver extends Task
{

    public function partOne(): int
    {
        $games = [];
        $blueMax = 14;
        $redMax = 12;
        $greenMax = 13;

        // line:
        // Game 1: 3 blue, 4 red; 1 red, 2 green, 6 blue; 2 green
        foreach ($this->getFileInput()->getLines() as $line) {
            /** @var string $line */

            [$gameName, $labels] = explode(': ', $line);
            $gameNumber = (int)str_replace('Game ', '', $gameName);
            $sets = explode('; ', $labels);
            $isPossible = false;
            foreach ($sets as $set) {
                preg_match('/(\d+) blue/', $set, $matches);
                $blue = (int)($matches[1] ?? 0);
                preg_match('/(\d+) red/', $set, $matches);
                $red = (int)($matches[1] ?? 0);
                preg_match('/(\d+) green/', $set, $matches);
                $green = (int)($matches[1] ?? 0);
                if ($blue <= $blueMax && $red <= $redMax && $green <= $greenMax) {
                    $isPossible = true;
                } else {
                    $isPossible = false;
                    break;
                }
            }

            if ($isPossible === true) {
                $games[] = $gameNumber;
            }
        }

        return array_sum($games);
    }

    public function partTwo(): int
    {
        $games = [];
        // line:
        // Game 1: 3 blue, 4 red; 1 red, 2 green, 6 blue; 2 green
        foreach ($this->getFileInput()->getLines() as $line) {
            /** @var string $line */

            $blues = $reds = $greens = [];
            [, $labels] = explode(': ', $line);
            $sets = explode('; ', $labels);
            foreach ($sets as $set) {
                preg_match('/(\d+) blue/', $set, $matches);
                $blue = (int)($matches[1] ?? 0);
                preg_match('/(\d+) red/', $set, $matches);
                $red = (int)($matches[1] ?? 0);
                preg_match('/(\d+) green/', $set, $matches);
                $green = (int)($matches[1] ?? 0);

                if ($blue > 0) {
                    $blues[] = $blue;
                }
                if ($red > 0) {
                    $reds[] = $red;
                }
                if ($green > 0) {
                    $greens[] = $green;
                }
            }

            $minBlue = max($blues);
            $minRed = max($reds);
            $minGreen = max($greens);

            $games[] = $minBlue * $minRed * $minGreen;

        }

        return array_sum($games);
    }
}
