<?php

namespace BrainGames\Games;

use function BrainGames\Engine\frameGame;

function result(int $operandOne, int $operandTwo, string $randomOperator): int
{
    // Определяем результат оператора
    switch ($randomOperator) {
        case '+':
            return($operandOne + $operandTwo);
        case '-':
            return($operandOne - $operandTwo);
        case '*':
            return($operandOne * $operandTwo);
    }
}

function calc()
{
    $rule = ('What is the result of the expression?');

    $NumbersForReserch = function () {
        $operators = ["+", "-", "*"];
        $operandOne = rand(0, 100);
        $operandTwo = rand(0, 100);
        $randomOperator = $operators[array_rand($operators)];
        $question = ("{$operandOne} {$randomOperator} {$operandTwo}");
        $correctQuestion = result($operandOne, $operandTwo, $randomOperator);
        return [$question, $correctQuestion];
    };
    frameGame($rule, $NumbersForReserch);
}
