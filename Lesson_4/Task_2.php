<?php
/*2. Расширить задание 1. Строить фотогалерею, не указывая статичные ссылки к файлам,
а просто передавая в функцию построения адрес папки с изображениями.
Функция сама должна считать список файлов и построить фотогалерею со ссылками в ней.
Массив изображенией из п.1 оставьте, но закомментите.*/

define('PATH_BIG', './gallery/big/');
define('PATH_SMALL', './gallery/small/');

$pathToGallery = PATH_BIG;

function makeGallery($pathToGallery)
{
    return array_slice(scandir($pathToGallery),2);
}

$image_arr = makeGallery($pathToGallery);

function getGallery($image_arr)
{
    $result = "";
    foreach ($image_arr as $item) {
        $result .= "<a class='photo' href='" . PATH_BIG . $item . "'>
                    <img src='" . PATH_SMALL . $item . "' width='150' height='100'>
                    </a>";
    }
    return $result;
}

$gallery = getGallery($image_arr);

include "mygallery.html";