<?php
/*5. Написать функцию, которая заменяет в строке пробелы на подчеркивания
и возвращает видоизмененную строчку. Можно через str_replace*/

$string = "которая заменяет в строке пробелы на подчеркивания
и возвращает видоизмененную строчку";

function spaceToUnderline1($string)
{
    return str_replace(' ', '_', $string);
}

function spaceToUnderline2($string)
{
    $i = 0;
    $result = '';
    while ($i < mb_strlen($string)) {
        if (mb_substr($string, $i, 1) == " ") {
            $result .= "_";
        } else {
            $result .= mb_substr($string, $i, 1);
        }
        $i++;
    };

    return $result;
}

echo spaceToUnderline1($string);
echo "<br>";
echo spaceToUnderline2($string);