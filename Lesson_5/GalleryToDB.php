<?php
define('ROOT', $_SERVER['DOCUMENT_ROOT']);
define('PATH_BIG', ROOT . './gallery_img/big/');

include_once "db.php";

$pathToGallery = PATH_BIG;

function makeGallery($pathToGallery)
{
    global $db;
    $image_arr = array_slice(scandir($pathToGallery), 2);
    mysqli_query($db, "INSERT INTO gallery_img(`gallery_filename`) VALUES ('" . implode("'),('", $image_arr) . "')");
}

$result = mysqli_query($db, "SELECT * FROM gallery_img");

if ($result->num_rows == 0) {
    makeGallery($pathToGallery);
    echo "Данные добавлены в таблицу";
} else {
    echo "В таблице уже есть данные";
}