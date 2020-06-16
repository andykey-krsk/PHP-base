<?php
/*2. С помощью цикла do…while написать функцию для вывода чисел от 0 до 10,
чтобы результат выглядел так:
0 – ноль.
1 – нечетное число.
2 – четное число.
3 – нечетное число.
…
10 – четное число.*/

function evenNumber($number)
{
    if ($number === 0) {
        $result = $number . " - ноль.";
    } elseif ($number % 2 == 0) {
        $result = $number . " - четное число.";
    } else {
        $result = $number . " - нечетное число.";
    }

    return $result;
}

function whileDo($x, $y)
{
    do {
        $result .= evenNumber($x) . "<br>";
        $x++;
    } while ($x <= $y);
    return $result;
}

echo whileDo(0, 10);