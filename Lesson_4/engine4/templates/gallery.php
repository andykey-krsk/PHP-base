<? $gallery_htm = getGallery($gallery)?>
<div id="main">
    <div class="post_title"><h2>Моя галерея</h2></div>
    <div class="gallery">
        <?= $gallery_htm?>
        <form method="post" enctype="multipart/form-data">
            <input type="file" name="myfile">
            <input type="submit" value="Загрузить" name="load">
        </form>
        <?= $message?>
    </div>
</div>
