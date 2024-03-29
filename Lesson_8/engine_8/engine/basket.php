<?php
function getBasket() {
    $session_id = session_id();
    $sql ="SELECT basket.id as basket_id, goods.id as good_id, goods.name as name, goods.price as price, goods.image as image FROM `basket`, `goods` WHERE basket.goods_id=goods.id AND `session_id`='{$session_id}'";
    $basket = getAssocResult($sql);

    return $basket;
}

function summFromBasket() {
    $session_id = session_id();
    $sql = "SELECT SUM(goods.price) as summ FROM `basket`, `goods` WHERE basket.goods_id=goods.id AND `session_id` ='$session_id'";
    return getAssocResult($sql)[0]['summ'];
}

function getBasketCount() {
    $session_id = session_id();
    $sql = "SELECT COUNT(*) as count FROM `basket` WHERE `session_id`='$session_id'";
    return getAssocResult($sql)[0]['count'];

}

function addToBasket($id) {
    $id = (int)$id;
    $session_id = session_id();
    //Помещаем товар id в корзину, по сесси
    $sql = "INSERT INTO `basket` (`session_id`, `goods_id`) VALUES ('{$session_id}', '{$id}');";

    return executeQuery($sql);
}

function deleteFromBasket($id) {
    $id = (int)$id;
    $session_id = session_id();
    $sql = "DELETE FROM `basket` WHERE `basket`.`id` = {$id} AND `session_id`='$session_id'";
    return executeQuery($sql);
}