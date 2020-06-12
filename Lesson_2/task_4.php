<?php
/*4. Реализовать функцию с тремя параметрами:
function mathOperation($arg1, $arg2, $operation),
где $arg1, $arg2 – значения аргументов, $operation – строка с названием операции.
В зависимости от переданного значения операции выполнить одну из арифметических операций
(использовать функции из пункта 3) и вернуть полученное значение (использовать switch).*/

include("task_3_function.php");

$arg1 = rand(-100, 100);
$arg2 = rand(-100, 100);

function mathOperation($arg1, $arg2, $operation)
{
    switch ($operation) {
        case "+":
            $result = addition($arg1, $arg2);
            break;
        case "-":
            $result = subtraction($arg1, $arg2);
            break;
        case "*":
            $result = multiplication($arg1, $arg2);
            break;
        case "/":
            $result = division($arg1, $arg2);
            break;
        default:
            $result = "Неверная операция";
    }
    return $result;
}

echo "Операция сложения {$arg1} + {$arg2} = " . mathOperation($arg1, $arg2, "+");
echo "Операция вычитания {$arg1} - {$arg2} = " . mathOperation($arg1, $arg2, "-");
echo "Операция умножения {$arg1} * {$arg2} = " . mathOperation($arg1, $arg2, "*");
echo "Операция деления {$arg1} / {$arg2} = " . mathOperation($arg1, $arg2, "/");