<form action="">
    <input type="text" name="arg1" value="<?= $arg1 ?>">
    <select name="operation">
        <option <? if ($operation == 'add') echo 'selected' ?> value="add"> + </option>
        <option <? if ($operation == 'sub') echo 'selected' ?> value="sub"> - </option>
        <option <? if ($operation == 'mult') echo 'selected' ?> value="mult"> * </option>
        <option <? if ($operation == 'div') echo 'selected' ?> value="div"> / </option>
    </select>
    <input type="text" name="arg2" value="<?= $arg2 ?>">
    <input type="submit" value="="> <?= $result ?>
</form>
