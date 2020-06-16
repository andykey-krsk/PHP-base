<?php
/*9. *Объединить две ранее написанные функции в одну,
которая получает строку на русском языке,
производит транслитерацию и замену пробелов на подчеркивания
(аналогичная задача решается при конструировании
url-адресов на основе названия статьи в блогах).*/

$string = "производит транслитерацию и замену пробелов на подчеркивания";

include "alfavit.php";

function spaceToUnderline($string)
{
    return str_replace(' ', '_', $string);
}

function getTranslitString($string)
{
    $i = 0;
    $result = '';
    while ($i < mb_strlen($string)) {
        $result .= getTranslitletter(mb_substr($string, $i, 1));
        $i++;
    };

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

echo getTranslitString(spaceToUnderline($string));
