<?php

namespace BrainGames\Games;

use function BrainGames\Engine\frameGame;

/**
 * Generates an arithmetic progression.
 *
 * @return int[] The arithmetic progression array.
 */
function arifmProgression(): array
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

/**
 * Randomly removes an element from the progression and returns the modified progression.
 *
 * @param int[] $progression The arithmetic progression array.
 * @return array An array where the first element is the modified progression (with one number replaced by ".."), and the second element is the missing number.
 */
function missingIndex($progression)
{
    $missingIndex = rand(0, 9);
    $missingNumber = $progression[$missingIndex];
    $progression[$missingIndex] = "..";
    return [$progression, $missingNumber];
}

/**
 * Starts the "progression" game.
 *
 * @return void
 */
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
