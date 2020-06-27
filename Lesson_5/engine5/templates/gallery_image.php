<?php
//var_dump($_SERVER['REQUEST_URI']);
//die;
define('ROOT', $_SERVER['DOCUMENT_ROOT']);
define('PATH_BIG', './gallery/big/');

if (!isset($_GET['id'])) {
    header("Location: Task_1.php");
    die;
}

$id = (int)$_GET['id'];

$like = $_GET['like'];

include "db.php";

if ($like == 'like'){
    mysqli_query($db, "UPDATE gallery SET gallery_like = gallery_like + 1 WHERE gallery_id = {$id}");
} else {
    mysqli_query($db, "UPDATE gallery SET gallery_view = gallery_view + 1 WHERE gallery_id = {$id}");
}

$item = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM gallery WHERE gallery_id = {$id}"));

if ($item['gallery_filename'] == null) {
    header("Location: Task_1.php");
    die;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Моя галерея</title>
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
</head>
<body>
<div id="main">
    <div class="post_title"><h2>Моя галерея</h2></div>
    <div class="menu">
        <a href="/gallery/">Галерея</a> - > <?= $item['gallery_filename'] ?>
        <p><span class="like">Like: <?= $item['gallery_like'] ?></span> <a href="<?=$_SERVER['REQUEST_URI']?>&like=like">+</a><br>
            <span class="view">View: <?= $item['gallery_view'] ?></span></p>
    </div>
    <div class="gallery">
        <img src="<?= PATH_BIG . $item['gallery_filename'] ?>" width="840">
    </div>
</div>

</body>
</html>
