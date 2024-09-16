<?php

namespace BrainGames\Games;

use function BrainGames\Engine\frameGame;

/**
 * Checks if a number is even or odd.
 *
 * @param  int $num The number to check.
 * @return bool True if the number is even, false otherwise.
 */
function isEven(int $num): bool
{
    return $num % 2 === 0;
}

function runEven()
{
    $rule = 'Answer "yes" if the number is even, otherwise answer "no".';

    $generateQuestion = function () {
        $randomNumber = rand(MIN_OPERAND, MAX_OPERAND);
        $isEven = isEven($randomNumber);
        $correctAnswer = $isEven ? 'yes' : 'no';

        return [$randomNumber, $correctAnswer];
    };

    frameGame($rule, $generateQuestion);
}
