<h2><?= $item[0]['name'] ?></h2>
<form action="" method="post">
    <img src="/catalog_img/<?= $item[0]['image'] ?>" height="300">
    <p>Описание: <?= $item[0]['description'] ?></p>
    <p>Стоимость: <strong><?= $item[0]['price'] ?></strong> рублей</p>
    <input type="hidden" name="good_id" value="<?= $item['id'] ?>">
    <input type="hidden" name="good_price" value="<?= $item['price'] ?>">
    <button type="submit" name="buy">Купить</button>
</form>
<hr>

<? include TEMPLATES_DIR . "feedback.php" ?>
