<?php

namespace BrainGames\Calc;

use function cli\line;
use function cli\prompt;

function calc($name)
{
    $operators = ["+", "-", "*"];
    $flag = 0;
    line('What is the result of the expression?');
    while ($flag != 3) {
        $numOne = rand(0, 100);
        $numTwo = rand(0, 100);
        $randomOperator = $operators[array_rand($operators)];
        // Определяем результат оператора
        switch ($randomOperator) {
            case '+':
                $result = $numOne + $numTwo;
                break;
            case '-':
                $result = $numOne - $numTwo;
                break;
            case '*':
                $result = $numOne * $numTwo;
                break;
        }

        // Выводим вопрос
        line("Question: %d %s %d", $numOne, $randomOperator, $numTwo);

        // Получаем ответ от пользователя и приводим его к числу
        $answ = (int)prompt('Your answer ');

        // Сравниваем ответ пользователя с результатом
        if ($answ === $result) {
            $flag++;
            line('Correct!');
        } else {
            line("'%d' is wrong answer ;(. Correct answer was '%d'.", $answ, $result);
            line("Let's try again, %s!", $name);
            break;
        }
    }
    if ($flag === 3) {
        line("Congratulations, %s!", $name);
    }
}
