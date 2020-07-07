<? if (isset($feedback[0])):
    foreach ($feedback as $item): ?>
        <p><strong><?= $item['feedback_name'] ?></strong>
            <a href="?id=<?= $_GET['id'] ?>&id_feed=<?= $item['id'] ?>&action=delete">[удалить]</a>
            <a href="?id=<?= $_GET['id'] ?>&id_feed=<?= $item['id'] ?>&action=edit">[править]</a>
        </p>
        <p><?= $item['content'] ?></p>
    <? endforeach;
else:?>
    <p>Пока нет отзывов</p>
<? endif ?>

<br>
<hr>
<br>

<h3>Добавить отзыв</h3>
<form action="?action=<?= $action ?>" method="post">
    <input type="text" placeholder="Имя" name="name" value="<?= $edit[0]['feedback_name'] ?>"><br>
    <textarea name="text" placeholder="Напишите отзыв" width="159px"
              height="120px"><?= $edit[0]['content'] ?></textarea><br>
    <input type="hidden" name="page" value="<?= $page ?>">
    <input type="hidden" name="id" value="<?= $page_id ?>">
    <input type="hidden" name="feedback_id" value="<?= $edit[0]['id'] ?>">
    <button type="submit" name="feedback"><?= $buttonText ?></button>
</form>
