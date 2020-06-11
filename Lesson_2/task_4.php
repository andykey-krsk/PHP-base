<?php
/*4. Реализовать функцию с тремя параметрами:
function mathOperation($arg1, $arg2, $operation),
где $arg1, $arg2 – значения аргументов, $operation – строка с названием операции.
В зависимости от переданного значения операции выполнить одну из арифметических операций
(использовать функции из пункта 3) и вернуть полученное значение (использовать switch).*/

function addition($a, $b)
{
    return $a + $b;
}

function subtraction($a, $b)
{
    return $a - $b;
}

function multiplication($a, $b)
{
    return $a * $b;
}

function division($a, $b)
{
    if ($b == 0) {
        return "Нельзя делить на ноль";
    }
    return $a / $b;
}

function mathOperation($arg1, $arg2, $operation)
{
    switch ($operation) {
        case 1:
            $result = "Операция сложения {$arg1} + {$arg2} = " . addition($arg1, $arg2);
            break;
        case 2:
            $result = "Операция вычитания {$arg1} - {$arg2} = " . subtraction($arg1, $arg2);
            break;
        case 3:
            $result = "Операция умножения {$arg1} * {$arg2} = " . multiplication($arg1, $arg2);
            break;
        case 4:
            $result = "Операция деления {$arg1} / {$arg2} = " . division($arg1, $arg2);
            break;
        default:
            $result = "Неверная операция";
    }
    return $result;
}

echo mathOperation(3, 4, 4);