<?php
function getGallery() {
    return getAssocResult("SELECT * FROM gallery ORDER BY gallery_view DESC");
}

function getOneImage(int $id)
{
    return getAssocResult("SELECT * FROM gallery WHERE gallery_id = {$id}");
}

function addToDB($filename)
{
    $db = getDb();
    $filename = mysqli_real_escape_string($db, $filename);
    $sql = "INSERT INTO gallery(`gallery_filename`) VALUES ('$filename')";
    @mysqli_query($db, $sql) or die(mysqli_error($db));
}

function loadImage(){

    if (isset($_POST['load'])) {

        if ($_FILES["myfile"]["size"] > 2000000) {
            header("Location: /gallery/?message=4");
            die;
        } elseif (exif_imagetype($_FILES["myfile"]["tmp_name"]) == IMAGETYPE_JPEG) {

            $path_big = PATH_BIG . $_FILES["myfile"]["name"];
            $path_small = PATH_SMALL . $_FILES["myfile"]["name"];

            if (move_uploaded_file($_FILES["myfile"]["tmp_name"], $path_big)) {
                addToDB($_FILES["myfile"]["name"]);
                $im = imagecreatefromjpeg($path_big);
                $im = imagescale($im, 150, -1,);
                imagejpeg($im, $path_small);
                imagedestroy($im);
                header("Location: /gallery/?message=1");
            } else {
                header("Location: /gallery/?message=2");
            }
        } else {
            header("Location: /gallery/?message=3");
        }
    }
}