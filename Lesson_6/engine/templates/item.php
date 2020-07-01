<h2><?= $item[0]['name'] ?></h2>

<img src="/catalog_img/<?= $item[0]['image'] ?>" height="300">
<p>Описание: <?= $item[0]['description'] ?></p>
<p>Стоимость: <strong><?= $item[0]['price'] ?></strong> рублей</p>
<button>купить</button>
<hr>

<? include TEMPLATES_DIR . "feedback.php" ?>
