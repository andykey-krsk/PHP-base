<? if (!$auth) : ?>
    <form action="" method="post">
        <input type="text" name="login" placeholder="admin" value="admin">
        <input type="password" name="pass" placeholder="123" value="123">
        Запомнить? <input type="checkbox" name="save">
        <input type="submit" name="send">
    </form>
    <a href="/registration/">Зарегистрироваться</a><br><br>
<? else: ?>
    Добро пожаловать! <?= $user ?> <a href="?logout">Выход</a><br><br>
<? endif ?>

<a href="/">Главная</a>
<a href="/gallery/">Галерея</a>
<a href="/catalog/">Каталог</a>
<a href="/news/">Новости</a>
<a href="/feedback/">Отзывы</a>
<a href="/about/">О нас</a>
<a href="/basket/">Корзина (<?= 0 + $basketCount ?>)</a><br>
