<? foreach ($gallery as $item): ?>
    <a class="photo" href="/image/?id=<?= $item['gallery_id'] ?>">
        <img src="/gallery_img/small/<?= $item['gallery_filename'] ?>" width="150" height="100">
        <p><span class="view">View: <?= $item['gallery_view'] ?></span></p>
    </a>
<? endforeach ?>

    <form method="post" enctype="multipart/form-data">
        <input type="file" name="myfile">
        <input type="submit" value="Загрузить" name="load">
    </form>

<?= $message?>



