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
    <div class="gallery">
        <? if ($image_arr->num_rows != 0) : ?>
            <? foreach ($image_arr as $item): ?>
                <a class="photo" href="image.php?id=<?= $item['gallery_id'] ?>">
                    <img src="<?= PATH_SMALL . $item['gallery_filename'] ?>" width="150" height="100">
                    <p><span class="like">Like: <?= $item['gallery_like'] ?></span><br>
                        <span class="view">View: <?= $item['gallery_view'] ?></span></p>
                </a>
            <? endforeach; ?>
        <? else: ?>
            Галлерея пуста
        <? endif; ?>
        <form method="post" enctype="multipart/form-data">
            <input type="file" name="myfile">
            <input type="submit" value="Загрузить" name="load">
        </form>
        <?= $message ?>
    </div>
</div>

</body>
</html>
