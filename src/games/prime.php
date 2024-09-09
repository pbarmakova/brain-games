<?php

namespace BrainGames\Prime;

use function BrainGames\Engine\frameGame;

/**
 * Checks if a number is prime.
 *
 * @param  int $number The number to check.
 * @return string "yes" if the number is primeß, "no" otherwise.
 */
function primeCheck($number)
{
    if ($number <= 1) {
        return 'no';
    }
    for ($i = 2; $i <= sqrt($number); $i++) {
        if ($number % $i === 0) {
            return 'no';
        }
    }
    return 'yes';
}

function prime()
{
    $rule = ('Answer "yes" if given number is prime. Otherwise answer "no".');
    $NumbersForReserch = function () {
        $randomNumber = rand(0, 100);
        $correctAnswer = primeCheck($randomNumber);
        return [$randomNumber, $correctAnswer];
    };
    frameGame($rule, $NumbersForReserch);
}
