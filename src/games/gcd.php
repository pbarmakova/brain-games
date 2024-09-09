<?php

namespace BrainGames\Gcd;

use function BrainGames\Engine\frameGame;

/**
 * Calculates the greatest common divisor of two numbers.
 *
 * @param  int $a The first number.
 * @param  int $b The second number.
 * @return int The greatest common divisor.
 */
function gcdGame(int $a, int $b): int
{
    while ($b !== 0) {
        $temp = $b;
        $b = $a % $b;
        $a = $temp;
    }
    return $a;
}

function gcd()
{
    $rule = ('Find the greatest common divisor of given numbers.');
    $NumbersForReserch = function () {
        $numberOne = rand(1, 100);
        $numberTwo = rand(1, 100);
        $correctNum = gcdGame($numberOne, $numberTwo);
        $question = ("{$numberOne} {$numberTwo}");
        return [$question, $correctNum];
    };
    frameGame($rule, $NumbersForReserch);
}
