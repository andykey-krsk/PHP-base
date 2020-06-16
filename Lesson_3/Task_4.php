<?php
/*4. Объявить массив, индексами которого являются буквы русского языка,
а значениями – соответствующие латинские буквосочетания
(‘а’=> ’a’, ‘б’ => ‘b’, ‘в’ => ‘v’, ‘г’ => ‘g’, …, ‘э’ => ‘e’, ‘ю’ => ‘yu’, ‘я’ => ‘ya’).
Написать функцию транслитерации строк. Она должна учитывать и заглавне буквы.*/

include "alfavit.php";
$string = "Написать функцию транслитерации строк. Она должна учитывать и заглавне буквы. Щётка? Штопор!";

//через while
function getTranslitString1($string)
{
    $i = 0;
    $result = '';
    while ($i < mb_strlen($string)) {
        $result .= getTranslitletter(mb_substr($string, $i, 1));
        $i++;
    };

    return $result;
}

//через массивы и foreach
function getTranslitString2($string)
{
    $result = "";
    $string_array = mb_str_split($string);
    foreach ($string_array as $letter) {
        $result .= getTranslitletter($letter);
    }

    return $result;
}

function getTranslitLetter($letter)
{
    global $alfabet;

    if (mb_strtolower($letter) == $letter) {
        $registr = true;
    } else {
        $registr = false;
    }

    if (array_key_exists(mb_strtolower($letter), $alfabet)) {
        if ($registr) {
            $result = $alfabet[mb_strtolower($letter)];
        } else {
            $result = ucfirst($alfabet[mb_strtolower($letter)]);
        }
    } else {
        $result = $letter;
    }

    return $result;
}

echo getTranslitString1($string);
echo "<br>";
echo getTranslitString2($string);