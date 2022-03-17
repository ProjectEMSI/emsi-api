<?php

use App\Services\Gamify\LevelService;

it('returns all levels', function () {
    expect(LevelService::getLevels())->toBeArray();
});

it('returns points required to reach a level', function () {
    expect(LevelService::pointsByLevel(1))->toBeInt();
});
