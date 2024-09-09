<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

/**
 * Main function for the "calc" game.
 *
 * @param string $condition The condition before game.
 */
function frameGame($condition, callable $NumbersForReserch)
{
    // Приветствие игрока
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line($condition);
    $flag = 0;

    while ($flag != 3) {
        [$question, $correctAnswer] = $NumbersForReserch();
        line("Question: {$question}");
        $answ = prompt('Your answer ');
        if ((string)$answ === (string)$correctAnswer) {
            $flag++;
            line('Correct!');
        } else {
            line("'$answ' is wrong answer ;(. Correct answer was '$correctAnswer'.", $answ, $correctAnswer);
            line("Let's try again, %s!", $name);
            return;
        }
    }
        line("Congratulations, %s!", $name);
}
