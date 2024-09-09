<?php

namespace BrainGames\Even;

use function BrainGames\Engine\frameGame;

/**
 * Checks if a number is even or odd.
 *
 * @param  int $num The number to check.
 * @return string "yes" if the number is even, "no" otherwise.
 */
function evenNoEven($num)
{
    if ($num % 2 === 0) {
        return 'yes';
    } else {
        return 'no';
    }
}

function even()
{
    $rule = ('Answer "yes" if the number is even, otherwise answer "no".');
    $NumbersForReserch = function () {
        $randomNumber = rand(0, 100);
        $correctAnsw = evenNoEven($randomNumber);
        return [$randomNumber, $correctAnsw];
    };
    frameGame($rule, $NumbersForReserch);
}
