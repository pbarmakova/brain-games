<?php

namespace BrainGames\Progress;

use function BrainGames\Engine\frameGame;

function arifmProgression()
{
    $firstNum = rand(0, 100);
    $step = rand(1, 100);
    $count = 10;
    $progression = [];
    for ($i = 0; $i < $count; $i++) {
        $progression[] = $firstNum + ($i * $step);
    }
    return $progression;
}

function missingIndex($progression)
{
    $missingIndex = rand(0, 9);
    $missingNumber = $progression[$missingIndex];
    $progression[$missingIndex] = "..";
    return [$progression, $missingNumber];
}

function progress()
{
    $rule = ('What number is missing in the progression?');
    $NumbersForReserch = function () {
        $progression = arifmProgression();
        [$progression, $missingNumber] = missingIndex($progression);
        return [implode(' ', $progression), $missingNumber];
    };
    frameGame($rule, $NumbersForReserch);
}
