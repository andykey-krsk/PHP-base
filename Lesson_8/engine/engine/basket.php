<?php
function processingBasket(&$params)
{
    $params['session_id'] = session_id();

    //isGoodBasket(7, $params['session_id']);

    if (isset($_POST['buy'])) {
        if (isGoodBasket((int)$_POST['good_id'], $params['session_id'])) {
            quantytiGoodToBasket((int)$_POST['good_id'], $params['session_id']);
        } else {
            addToBasket((int)$_POST['good_id'], (float)$_POST['good_price'], $params['session_id']);
        }
    }

    if (isset($_POST['delete'])){
        var_dump($params['session_id']);
        die;
    }

    $params['basketCount'] = getBasketCount($params['session_id']);
}

function getBasketCount($session_id)
{
    $result = getAssocResult("SELECT SUM(good_quantyti) FROM basket WHERE session_id = '{$session_id}'");
    return $result[0]['SUM(good_quantyti)'];
}

//добавление товара в корзину
function addToBasket($good_id, $good_price, $session_id)
{
    $db = getDb();
    $good_id = mysqli_real_escape_string($db, $good_id);
    $good_price = mysqli_real_escape_string($db, $good_price);
    $session_id = mysqli_real_escape_string($db, $session_id);
    $sql = "INSERT INTO basket(good_id,good_price,session_id,create_time) VALUES ({$good_id},{$good_price},'{$session_id}', NOW())";
    @mysqli_query($db, $sql) or die(mysqli_error($db));
}

function delToBasket($id)
{
    $db = getDb();
    $sql = "DELETE FROM basket WHERE id = {$id}";
    @mysqli_query($db, $sql) or die(mysqli_error($db));
}

//проверка товара в корзине
function isGoodBasket($good_id, $session_id)
{
    $result = false;
    $response = getAssocResult("SELECT * FROM basket WHERE good_id = {$good_id} AND session_id = '{$session_id}'");
    if ($response) {
        $result = true;
    }
    return $result;
}

//Изменение колличества товара в корзине
function quantytiGoodToBasket($good_id, $session_id)
{
    executeSql("UPDATE basket SET good_quantyti = good_quantyti + 1 WHERE good_id = {$good_id} AND session_id = 
'{$session_id}'");
}

function getBasket($session_id)
{
    $sql ="SELECT basket.id as basket_id, basket.good_id, basket.good_quantyti, basket.good_price, basket.session_id,
                  goods.id, goods.name 
           FROM basket, goods
           WHERE basket.good_id = goods.id AND basket.session_id = '{$session_id}'";
    return getAssocResult($sql);
}