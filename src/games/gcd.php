<?php

namespace BrainGames\Gcd;

use function cli\line;
use function cli\prompt;

function gcd($name)
{
    $flag = 0;
    line('Find the greatest common divisor of given numbers.');
    while ($flag != 3) {
        $numOne = rand(1, 100);
        $numTwo = rand(1, 100);
        line("Question: %d %d", $numOne, $numTwo);
        $answ = (int)prompt('Your answer ');
        $correctNum = gmp_intval(gmp_gcd($numOne, $numTwo));
        if ($answ === $correctNum) {
            line('Correct!');
            $flag++;
        } else {
            line("'%s' is wrong answer ;(. Correct answer was '%s'.", $answ, $correctNum);
            line("Let's try again, %s!", $name);
            break;
        }
    }
    if ($flag === 3) {
        line("Congratulations, %s!", $name);
    }
}
