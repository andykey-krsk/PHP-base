<?php
/*7. *Написать функцию, которая вычисляет текущее время
и возвращает его в формате с правильными склонениями, например:
22 часа 15 минут
21 час 43 минуты*/

function goodTime($hours, $minutes)
{
    if ($hours > 23 || $hours < 0) {
        $error = "Неправильно указаны часы ";
    }

    if ($minutes > 59 || $minutes < 0) {
        $error .= "Неправильно указаны минуты";
    }

    if ($error){
        return $error;
    }
    $hourEnding = hourEnding($hours);
    $minuteEnding = minuteEnding($minutes);
    return "{$hours} час{$hourEnding} {$minutes} минут{$minuteEnding}";
}

function hourEnding($hours){
    if ($hours <= 10) {
        $hoursMarker = $hours % 10;
    } else{
        $hoursMarker = $hours % 20;
    }

    switch ($hoursMarker) {
        case 0:
            $hourEnding = "ов";
            break;
        case 1:
            $hourEnding = "";
            break;
        case 2:
        case 3:
        case 4:
            $hourEnding = "а";
            break;
        default:
            $hourEnding = "ов";
    }
    return $hourEnding;
}

function minuteEnding($minutes) {
    $minutesMarker = $minutes;

    if ($minutes > 20){
        $minutesMarker = $minutes % 20;
    }

    if ($minutes > 30){
        $minutesMarker = $minutes % 30;
    }

    if ($minutes > 40){
        $minutesMarker = $minutes % 40;
    }

    if ($minutes > 50){
        $minutesMarker = $minutes % 50;
    }

    switch ($minutesMarker) {
        case 0:
            $minuteEnding = "";
            break;
        case 1:
            $minuteEnding = "а";
            break;
        case 2:
        case 3:
        case 4:
            $minuteEnding = "ы";
            break;
        default:
            $minuteEnding = "";
    }
    return $minuteEnding;
}

for ($h = 0; $h < 24; $h++) {
    for ($m = 0; $m < 60; $m++) {
        echo "Местное время " . goodTime($h, $m) . "</br>";
    }
}