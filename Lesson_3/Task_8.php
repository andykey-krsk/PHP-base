<?php
/*8. *Повторить третье задание, но вывести на экран только города,
начинающиеся с буквы «К».*/

$regions = [
    "Московская область" => ["Москва", "Зеленоград", "Клин"],
    "Ленинградская область" => ["Санкт-Петербург", "Всеволожск", "Павловск", "Кронштадт"],
    "Рязанская область" => ["Рязань", "михайлов", "Скопин", "Шилово", "Касимов"]
];

function itemInRegions($regions)
{
    $result = "";
    foreach ($regions as $region => $item) {
        $result .= "<strong>" . $region . ":</strong><br>" . cityInRegion($item) . "<br>";
    }

    return $result;
}

function cityInRegion($region, $firstLetter = "К")
{
    $result = "";
    foreach ($region as $item) {
        if (mb_substr($item, 0, 1) == $firstLetter){
            $result .= $item . ", ";
        }
    }

    return rtrim($result, ", ") . ".";
}

echo itemInRegions($regions);