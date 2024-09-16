<?php

namespace BrainGames\Games;

use function BrainGames\Engine\frameGame;

/**
 * Generates an arithmetic progression.
 *
 * @return int[] The arithmetic progression array.
 */
function generateArithmeticProgression(): array
{
    $firstNum = rand(MIN_OPERAND, MAX_OPERAND);
    $step = rand(MIN_STEP, MAX_STEP); // Убедитесь, что шаг не слишком велик
    $count = rand(MIN_PROGRESSION_LENGTH, MAX_PROGRESSION_LENGTH);
    $progression = [];

    for ($i = 0; $i < $count; $i++) {
        $progression[] = $firstNum + ($i * $step);
    }

    return $progression;
}

/**
 * Randomly hides an element from the progression and returns the modified progression.
 *
 * @param int[] $progression The arithmetic progression array.
 * @return array
 */
function hideElementInProgression(array $progression): array
{
    if (count($progression) === 0) {
        throw new \InvalidArgumentException("Progression array is empty.");
    }


    $missingIndex = rand(0, count($progression) - 1);
    $missingNumber = $progression[$missingIndex];
    $progression[$missingIndex] = ".."; // Рассмотрите возможность использовать специальное значение

    return [$progression, $missingNumber];
}

/**
 * Starts the "progression" game.
 *
 * @return void
 */
function runProgressionGame(): void
{
    $rule = 'What number is missing in the progression?';

    $generateQuestion = function () {
        $progression = generateArithmeticProgression();
        [$progression, $missingNumber] = hideElementInProgression($progression);

        return [implode(' ', $progression), $missingNumber];
    };

    frameGame($rule, $generateQuestion);
}
