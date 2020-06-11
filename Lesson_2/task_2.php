<?php
/*2. Присвоить переменной $а значение в промежутке [0..15].
С помощью оператора switch организовать вывод чисел от $a до 15.
При желании сделайте это задание через рекурсию.*/

$randomMin = 0;
$randomMax = 15;
$a = random_int($randomMin, $randomMax);
$content = "a = {$a}</br>";

switch ($a) {
    case 0:
        $content .= "0";
    case 1:
        $content .= "1";
    case 2:
        $content .= "2";
    case 3:
        $content .= "3 ";
    case 4:
        $content .= "4 ";
    case 5:
        $content .= "5 ";
    case 6:
        $content .= "6 ";
    case 7:
        $content .= "7 ";
    case 8:
        $content .= "8 ";
    case 9:
        $content .= "9 ";
    case 10:
        $content .= "10 ";
    case 11:
        $content .= "11 ";
    case 12:
        $content .= "12 ";
    case 13:
        $content .= "13 ";
    case 14:
        $content .= "14 ";
    case 15:
        $content .= "15 ";
}

echo $content;

function num($min,$max){
    $result = $min . " ";
    if ($min == $max){
        return $max;
    }else{
        return $result . num($min+1,$max);
    }
}

echo "</br></br>Через рекурсию</br>" . num($a,$randomMax);