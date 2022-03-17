<?php

namespace App\Services\Gamify;

class LevelService
{
    public static function getLevels(): array
    {
        $max = config('levels.max');
        $multiplier = config('levels.multiplier');
        $start = config('levels.start');

        $levels = [];
        foreach (range(1, $max) as $level) {
            if ($level === 1) {
                $levels[$level] = $start;
            } else {
                $levels[$level] = round($start + ($levels[$level - 1] * $multiplier));
            }
        }

        return $levels;
    }

    public static function pointsByLevel(int $level = 0): int
    {
        $start = config('levels.start');
        $multiplier = config('levels.multiplier');

        $diff = 0;
        foreach (range(0, $level) as $value) {
            if ($value === 0) {
                $response = $start;
            } else {
                $response = $start + $diff;
            }

            $diff = $response * $multiplier;
        }

        return round($response);
    }
}
