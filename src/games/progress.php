<?php

namespace BrainGames\Progress;

use function cli\line;
use function cli\prompt;

/**
 * Main function for the "progress" game.
 *
 * @param string $name The number to check.
 */
function progress($name)
{
    $flag = 0;
    line('What number is missing in the progression?');
    while ($flag != 3) {
        $firstNum = rand(0, 100);
        $step = rand(1, 100);
        $count = 10;
        $progression = [];
        for ($i = 0; $i < $count; $i++) {
            $progression[] = $firstNum + ($i * $step);
        }
        $missingIndex = rand(0, 9);
        $missingNumber = $progression[$missingIndex];
        $progression[$missingIndex] = "..";
        line("Question: " . implode(' ', $progression));
        $answ = (int)prompt('Your answer ');
        if ($answ === $missingNumber) {
            line('Correct!');
            $flag++;
        } else {
            line("'%s' is wrong answer ;(. Correct answer was '%s'.", $answ, $missingNumber);
            line("Let's try again, %s!", $name);
            break;
        }
    }
    if ($flag === 3) {
        line("Congratulations, %s!", $name);
    }
}
