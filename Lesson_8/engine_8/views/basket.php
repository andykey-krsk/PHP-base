<h2>Корзина</h2>

<?foreach ($basket as $item):?>
    <div id="item_<?=$item['basket_id']?>">
        <?=$item['name']?> <br>
        <img src="/img/<?= $item['image'] ?>" width="150">
        <br>
        <button class="delete" data-id="<?=$item['basket_id']?>">Удалить</button>
        <br>
        Цена: <?=$item['price']?>  <br>
    </div>
<?endforeach;?>
<br>
Общая стоимость: <span id="summ"><?=$summ?></span><br>

<h2>Оформите заказ</h2>
<form action="/order/" method="post">
    <input placeholder="Ваше имя" type="text" name="name">
    <input placeholder="Телефон" type="text" name="phone">
    <input placeholder="Адрес доставки" type="text" name="adres">
    <input type="submit">
</form>


<script>
    let buttons = document.querySelectorAll('.delete');

    buttons.forEach((elem) => {
        elem.addEventListener('click', () => {
            let id = elem.getAttribute('data-id');
            (async ()=>{
                const response = await fetch('/api/delete/'+id);
                const answer = await response.json();
                document.getElementById('count').innerText = answer.count;
                document.getElementById('summ').innerText = answer.summ;
                document.getElementById("item_" + id).remove();
            })();
        })
    });

</script>