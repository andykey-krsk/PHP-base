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
        if ($error) {
            $error .= "и минуты";
        } else {
            $error = "Неправильно указаны минуты";
        }
    }

    if ($error) {
        $result = $error;
    } else {
        $hourEnding = hourEnding2($hours);
        $minuteEnding = minuteEnding2($minutes);
        $result = "{$hours} час{$hourEnding} {$minutes} минут{$minuteEnding}";
    }
    return $result;
}

function hourEnding2($hours)
{
    if ($hours == 1 || $hours == 21) {
        $result = "";
    } elseif (($hours > 1 && $hours < 5) || ($hours > 21 && $hours < 24)) {
        $result = "а";
    } else {
        $result = "ов";
    }
    return $result;
}

function minuteEnding2($minutes)
{
    if (($minutes % 10) == 1 && $minutes != 11) {
        $result = "а";
    } elseif ((($minutes % 10) > 1 && ($minutes % 10) < 5 && $minutes > 20) || $minutes > 1 && $minutes < 5) {
        $result = "ы";
    } else {
        $result = "";
    }
    return $result;
}

for ($h = 0; $h < 24; $h++) {
    echo "Местное время " . goodTime($h, 0) . "</br>";
}
for ($m = 0; $m < 60; $m++) {
    echo "Местное время " . goodTime(0, $m) . "</br>";
}

//тестирование ошибок
echo "Местное время " . goodTime(25, 70) . "</br>";
echo "Местное время " . goodTime(21, 70) . "</br>";
echo "Местное время " . goodTime(25, 0) . "</br>";

//old version
function hourEnding($hours)
{
    if ($hours <= 10) {
        $hoursMarker = $hours % 10;
    } else {
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

function minuteEnding($minutes)
{
    $minutesMarker = $minutes;

    if ($minutes > 20) {
        $minutesMarker = $minutes % 20;
    }

    if ($minutes > 30) {
        $minutesMarker = $minutes % 30;
    }

    if ($minutes > 40) {
        $minutesMarker = $minutes % 40;
    }

    if ($minutes > 50) {
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