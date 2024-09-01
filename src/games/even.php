<?php

namespace BrainGames\Even;

use function cli\line;
use function cli\prompt;

function evenNoEven($num)
{
    if ($num % 2 === 0) {
        return 'yes';
    } else {
        return 'no';
    }
}

function even($name)
{
    $flag = 0;
    line('Answer "yes" if the number is even, otherwise answer "no".');
    while ($flag != 3) {
        $num = rand(0, 100);

        // Выводим вопрос
        line("Question: %d", $num);

        // Получаем ответ от пользователя
        $answ = prompt('Your answer ');

        // Проверка числа на четность
        $correctNum = evenNoEven($num);

        // Сравниваем ответ пользователя с результатом
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
