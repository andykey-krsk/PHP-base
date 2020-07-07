<? if (isset($basket[0])):
    $total_price = 0;
    $count = 1;
    foreach ($basket as $item): ?>
        <div id="item<?= $item['id'] ?>">
            <p><?= $count++ ?>. <strong><?= $item['name'] ?>. </strong>
                Стоимость: <?= $item['good_price'] ?>. Колличество: <?= $item['good_quantyti'] ?>.
                <a href="?id=<?= $item['basket_id'] ?>&action=delete">[удалить]</a>
            </p>
        </div>
        <? $total_price += (float)$item['good_price'] * (int)$item['good_quantyti'];
    endforeach ?>
    Всего: <?= $total_price ?> рублей.
<? else: ?>
    <p>Корзина пуста</p>
<? endif ?>