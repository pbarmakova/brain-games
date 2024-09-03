<?php

namespace BrainGames\Prime;

use function cli\line;
use function cli\prompt;

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

/**
 * Main function for the "prime" game.
 *
 * @param string $name The number to check.
 */
function prime($name)
{
    $flag = 0;
    line('Answer "yes" if given number is prime. Otherwise answer "no".');
    while ($flag < 3) {
        $num = rand(0, 100);

        // Выводим вопрос
        line("Question: %d", $num);

        // Получаем ответ от пользователя
        $answ = prompt('Your answer ');

        // Проверка числа на простоту
        $correctAnswer = primeCheck($num);

        // Сравниваем ответ пользователя с результатом
        if ($answ === $correctAnswer) {
            line('Correct!');
            $flag++;
        } else {
            line("'%s' is wrong answer ;(. Correct answer was '%s'.", $answ, $correctAnswer);
            line("Let's try again, %s!", $name);
            return; // Изменен на return, чтобы не продолжать при ошибке
        }
    }
    line("Congratulations, %s!", $name);
}
