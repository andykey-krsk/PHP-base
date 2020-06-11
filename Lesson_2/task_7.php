<?php
/*7. *Написать функцию, которая вычисляет текущее время
и возвращает его в формате с правильными склонениями, например:
22 часа 15 минут
21 час 43 минуты*/

function goodTime($hours,$minutes){

    switch ($hours){
        case 0:
            $h = "ов";
            break;
        case 1:
            $h = "";
            break;
        case 2:
            $h = "а";
            break;
        default:
            $h = "ов";
    }

    switch ($minutes){
        case 0:
            $m = "";
            break;
        case 1:
            $m = "а";
            break;
        case 2:
        case 3:
        case 4:
            $m = "ы";
            break;
        default:
            $m = "";
    }
    return "{$hours} час{$h} {$minutes} минут{$m}";
}

for ($h = 0; $h < 24; $h++){
    for ($m = 0; $m < 60; $m++){
        echo "Время " . goodTime($h,$m) . "</br>";
    }
}