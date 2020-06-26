<?php
/*3. * на странице галереи сделать форму загрузки нового изображения,
сделать проверки на тип и размер файла и сделать ресайз изображения
и генерацию миниатюры, после загрузки перезагрузить сраницу,
чтобы новое изображение появилось на странице. При загрузке изображения
необходимо делать проверку на тип и размер файла.*/

define('PATH_BIG', './gallery/big/');
define('PATH_SMALL', './gallery/small/');

$arr_message = [
    '1' => "Файл загружен",
    '2' => "Ошибка закгузки файла",
    '3' => "Неверный тип файла",
    '4' => "Файл превышает максимально допустимый размер"
];

$message = $arr_message[$_GET['message']];

if (isset($_POST['load'])) {

    if ($_FILES["myfile"]["size"] > 2000000) {
        header("Location: {$_SERVER['PHP_SELF']}?message=4");
        die;
    } elseif (exif_imagetype($_FILES["myfile"]["tmp_name"]) == IMAGETYPE_JPEG) {

        $path_big = PATH_BIG . $_FILES["myfile"]["name"];
        $path_small = PATH_SMALL . $_FILES["myfile"]["name"];

        if (move_uploaded_file($_FILES["myfile"]["tmp_name"], $path_big)) {
            $im = imagecreatefromjpeg($path_big);
            $im = imagescale($im, 150, -1,);
            imagejpeg($im, $path_small);
            imagedestroy($im);
            header("Location: {$_SERVER['PHP_SELF']}?message=1");
        } else {
            header("Location: {$_SERVER['PHP_SELF']}?message=2");
        }
    } else {
        header("Location: {$_SERVER['PHP_SELF']}?message=3");
    }
}

$pathToGallery = PATH_BIG;

function makeGallery($pathToGallery)
{
    return array_slice(scandir($pathToGallery), 2);
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