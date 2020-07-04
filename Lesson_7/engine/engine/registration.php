<?php
if (isset($_POST['registration'])) {
    $login = $_POST['login'];
    $name = $_POST['name'];
    $pass = $_POST['pass'];
    $pass_ver = $_POST['pass_ver'];
    if ($pass != $pass_ver) { //верификацию лучше делать на стороне браузера
        die('Не верный пароль');
    }else{
        //регистрация
        $pass_hash = password_hash($pass, PASSWORD_DEFAULT); //шифрование пароля
        password_verify($pass,$pass_hash); //проверка пароля
    }
}