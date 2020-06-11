<?php
/*6. *С помощью рекурсии организовать функцию возведения числа в степень.
Формат: function power($val, $pow), где $val – заданное число,
$pow – степень. При желании сделайте это через замыкание.*/

function power($val, $pow)
{
    if ($pow == 0) {
        return 1;
    } else {
        return $val * power($val, $pow - 1);
    }
}

echo power(6, 15);

$power = function ($val, $pow) use (&$power) {
    if ($pow == 0) {
        return 1;
    } else {
        return $val * $power($val, $pow - 1);
    }
};

echo "</br>" . $power(6, 15);