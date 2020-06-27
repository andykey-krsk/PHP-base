<div class="menu">
    <a href="/gallery/">Галерея</a> - > <?= $image['gallery_filename'] ?>
    <p><span class="like">Like: <?= $image['gallery_like'] ?></span> <a
                href="<?= $_SERVER['REQUEST_URI'] ?>&like=like">+</a><br>
        <span class="view">View: <?= $image['gallery_view'] ?></span></p>
</div>

<img src="<?= PATH_BIG . $image['gallery_filename'] ?>" width="840">