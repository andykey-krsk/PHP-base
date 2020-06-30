<?php

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
    //($b == 0) ? $result = "Нельзя делить на ноль" : $result = $a / $b;
    if ($b == 0) {
        $result = "Нельзя делить на ноль";
    } else {
        $result = $a / $b;
    }
    return $result;
}
