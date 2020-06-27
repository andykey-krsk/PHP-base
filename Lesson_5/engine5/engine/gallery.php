<?php
function getGallery() {
    return getAssocResult("SELECT * FROM gallery ORDER BY gallery_view DESC");
}

function getOneImage(int $id)
{
    return getAssocResult("SELECT * FROM gallery_img WHERE gallery_id = {$id}");
}


function loadImage(){
    $arr_message = [
        '1' => "Файл загружен",
        '2' => "Ошибка закгузки файла",
        '3' => "Неверный тип файла",
        '4' => "Файл превышает максимально допустимый размер"
    ];

    $message = $arr_message[$_GET['message']];

    $filename ="";

    if (isset($_POST['load'])) {

        if ($_FILES["myfile"]["size"] > 2000000) {
            header("Location: {$_SERVER['PHP_SELF']}?message=4");
            die;
        } elseif (exif_imagetype($_FILES["myfile"]["tmp_name"]) == IMAGETYPE_JPEG) {

            $path_big = PATH_BIG . $_FILES["myfile"]["name"];
            $path_small = PATH_SMALL . $_FILES["myfile"]["name"];

            if (move_uploaded_file($_FILES["myfile"]["tmp_name"], $path_big)) {

                $filename = mysqli_real_escape_string($db, $_FILES["myfile"]["name"]);
                mysqli_query($db, "INSERT INTO gallery_img(`gallery_filename`) VALUES ('$filename')");
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
}