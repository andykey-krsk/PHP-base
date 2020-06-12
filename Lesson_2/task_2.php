<?php
/*2. Присвоить переменной $а значение в промежутке [0..15].
С помощью оператора switch организовать вывод чисел от $a до 15.
При желании сделайте это задание через рекурсию.*/

$randomMin = 0;
$randomMax = 15;
$a = rand($randomMin, $randomMax);
$content = "a = {$a}</br>";
$count = $a;
switch ($count) {
    case 0:
        $content .= $count++ . " ";
    case 1:
        $content .= $count++ . " ";
    case 2:
        $content .= $count++ . " ";
    case 3:
        $content .= $count++ . " ";
    case 4:
        $content .= $count++ . " ";
    case 5:
        $content .= $count++ . " ";
    case 6:
        $content .= $count++ . " ";
    case 7:
        $content .= $count++ . " ";
    case 8:
        $content .= $count++ . " ";
    case 9:
        $content .= $count++ . " ";
    case 10:
        $content .= $count++ . " ";
    case 11:
        $content .= $count++ . " ";
    case 12:
        $content .= $count++ . " ";
    case 13:
        $content .= $count++ . " ";
    case 14:
        $content .= $count++ . " ";
    case 15:
        $content .= $count++ . " ";
}

echo $content;

function num($min, $max)
{
    $result = $min . " ";
    if ($min == $max) {
        return $max;
    } else {
        return $result . num($min + 1, $max);
    }
}

echo "</br></br>Через рекурсию</br>" . num($a, $randomMax);

function num2($min, $max)
{
    $result = $min . " ";
    if ($min != $max) {
        return $result . num2($min + 1, $max);
    }
    return $max;
}

echo "</br></br>Через рекурсию вариант 2</br>" . num2($a, $randomMax);