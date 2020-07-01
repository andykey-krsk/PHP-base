<? if (isset($feedback[0])):
    foreach ($feedback as $item): ?>
        <p><strong><?= $item['feedback_name'] ?></strong><a href="/feedback/?id=<?= $item['id'] ?>&del">[X]</a></p>
        <p><?= $item['content'] ?></p>
    <? endforeach;
else:?>
    <p>Пока нет отзывов</p>
<? endif?>

<br>
<hr>
<br>
<h3>Добавить отзыв</h3>
<form action="" method="post">
    <input type="text" placeholder="Имя" name="name"><br>
    <textarea name="text" placeholder="Напишите отзыв" width="159px" height="120px"></textarea><br>
    <input type="hidden" name="page" value="<?= $page ?>">
    <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
    <button type="submit" name="feedback">Добавить</button>
</form>
