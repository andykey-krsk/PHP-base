<?php

$pathToGallery = GALLERY_PATH_BIG;

function makeGallery($pathToGallery)
{
    return array_slice(scandir($pathToGallery), 2);
}

function getGallery($image_arr)
{
    $result = "";
    foreach ($image_arr as $item) {
        $result .= "<a class='photo' href='" . GALLERY_PATH_BIG . $item . "'>
                    <img src='" . GALLERY_PATH_SMALL . $item . "' width='150' height='100'>
                    </a>";
    }
    return $result;
}