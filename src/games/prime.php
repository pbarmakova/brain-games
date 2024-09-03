<?php

namespace BrainGames\Prime;

use function cli\line;
use function cli\prompt;

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

function prime($name)
{
    $flag = 0;
    line('Answer "yes" if given number is prime. Otherwise answer "no".');
    while ($flag != 3) {
        $num = rand(0, 100);

        // Выводим вопрос
        line("Question: %d", $num);

        // Получаем ответ от пользователя
        $answ = prompt('Your answer ');

        // Проверка числа на четность
        $correctNum = primeCheck($num);

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
