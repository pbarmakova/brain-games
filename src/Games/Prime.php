<?php

namespace BrainGames\Games;

use function BrainGames\Engine\frameGame;

/**
 * Checks if a number is prime.
 *
 * @param  int $number The number to check.
 * @return bool True if the number is prime, false otherwise.
 */
function isPrime(int $number): bool
{
    if ($number <= 1) {
        return false;
    }
    for ($i = 2; $i <= sqrt($number); $i++) {
        if ($number % $i === 0) {
            return false;
        }
    }
    return true;
}

function runPrime()
{
    $rule = 'Answer "yes" if the given number is prime. Otherwise answer "no".';

    $generateQuestion = function () {
        $randomNumber = rand(MIN_OPERAND, MAX_OPERAND);
        $isPrime = isPrime($randomNumber);
        $correctAnswer = $isPrime ? 'yes' : 'no';

        return [$randomNumber, $correctAnswer];
    };

    frameGame($rule, $generateQuestion);
}
