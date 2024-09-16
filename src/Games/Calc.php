<?php

namespace BrainGames\Games;

use function BrainGames\Engine\frameGame;

/**
 * Calculates the result of the given expression.
 *
 * @param int $operand1 The first operand.
 * @param int $operand2 The second operand.
 * @param string $operator The operator.
 * @return int The result of the operation.
 */
function calculateResult(int $operand1, int $operand2, string $operator): int
{
    switch ($operator) {
        case '+':
            return $operand1 + $operand2;
        case '-':
            return $operand1 - $operand2;
        case '*':
            return $operand1 * $operand2;
        default:
            throw new \InvalidArgumentException("Unsupported operator: $operator");
    }
}

/**
 * Starts the "calc" game.
 *
 * @return void
 */
function runCalc(): void
{
    $rule = 'What is the result of the expression?';

    $generateQuestion = function () {
        $operand1 = rand(MIN_OPERAND, MAX_OPERAND);
        $operand2 = rand(MIN_OPERAND, MAX_OPERAND);
        $operator = OPERATORS[array_rand(OPERATORS)];

        $question = "{$operand1} {$operator} {$operand2}";
        $correctAnswer = calculateResult($operand1, $operand2, $operator);

        return [$question, $correctAnswer];
    };

    frameGame($rule, $generateQuestion);
}
