<?php
/*1. Создать галерею фотографий. Она должна состоять всего из одной странички,
на которой пользователь видит все картинки в уменьшенном виде
и форму для загрузки нового изображения.
При клике на фотографию она должна открыться в браузере в новой вкладке.
Размер картинок можно ограничивать с помощью свойства width.
Список файлов изображений хранить в массиве.*/

define('PATH_BIG', './gallery/big/');
define('PATH_SMALL', './gallery/small/');

$image_arr = ['01.jpg', '02.jpg', '03.jpg', '04.jpg', '05.jpg', '06.jpg', '07.jpg', '08.jpg', '09.jpg', '10.jpg', '11.jpg', '12.jpg', '13.jpg', '14.jpg', '15.jpg'];

function makeGallery($image_arr)
{
    $result = "";
    foreach ($image_arr as $item){
        $result .= "<a class='photo' href='" . PATH_BIG . $item . "'>
                    <img src='" . PATH_SMALL . $item . "' width='150' height='100'>
                    </a>";
    }
    return $result;
}

$gallery = makeGallery($image_arr);

include "mygallery.html";
