<h1>Каталог магазина</h1>

<? foreach ($catalog as $item): ?>
    <img class="catalog" src="/catalog_img/<?= $item['image'] ?>" height="100">
    <a class="photo" href="/item/?id=<?= $item['id'] ?>">
        <?=$item['name']?>
    </a>
    <p class="description">Описание: <?= $item['description'] ?></p>
    <p>Стоимость: <strong><?= $item['price'] ?></strong> рублей</p>
    <button>купить</button>
    <hr>
<? endforeach ?>


