<h1>Каталог магазина</h1>

<? foreach ($catalog as $item): ?>
    <form action="" method="post">
        <img class="catalog" src="/catalog_img/<?= $item['image'] ?>" height="100">
        <a class="photo" href="/item/?id=<?= $item['id'] ?>">
            <?= $item['name'] ?>
        </a>
        <p class="description">Описание: <?= $item['description'] ?></p>
        <p>Стоимость: <strong><?= $item['price'] ?></strong> рублей</p>
        <input type="hidden" name="good_id" value="<?=$item['id']?>">
        <input type="hidden" name="good_price" value="<?=$item['price']?>">
        <button type="submit" name="buy">Купить</button>
    </form>
    <hr>
<? endforeach ?>


