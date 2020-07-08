<?php

if (isset($_POST['send'])){
    $login = $_POST['login'];
    $pass = $_POST['pass'];
    if (!auth($login, $pass)){
        $_SESSION['authError'] = "<br>Не верный логин или пароль";
        header("location: /registration/");
    } else {
        if (isset($_POST['save'])){
            $hash = uniqid(rand(),true);
            $id = (int)$_SESSION['id'];
            executeSql("UPDATE users SET hash = '{$hash}' WHERE id = '{$id}'");
            setcookie("hash", $hash, time() + 36000, '/');
        }
        $_SESSION['authError'] = "";
        header("location:" . $_SERVER['HTTP_REFERER']);
    }
}

function auth($login, $pass)
{
    $db = getDb();
    $login = mysqli_real_escape_string($db, strip_tags(stripslashes($login)));
    $passDb = getAssocResult("SELECT * FROM users WHERE login = '{$login}'")[0];
    if (password_verify($pass, $passDb['pass'])) {
        $_SESSION['login'] = $login;
        $_SESSION['id'] = $passDb['id'];
        return true;
    }
    return false;
}

if (isset($_GET['logout'])) {
    session_destroy();
    setcookie("hash", "", time() - 36000, '/');
    header("location:" . $_SERVER['HTTP_REFERER']);
}

function isAuth()
{
    if (isset($_COOKIE['hash']) && (!isset($_SESSION['login']))) {
        $hash = $_COOKIE['hash'];
        $user = getAssocResult("SELECT * FROM users WHERE hash = '{$hash}'")[0]['login'];
        if (!empty($user)) {
            $_SESSION['login'] = $user;
            header("location:" . $_SERVER['HTTP_REFERER']);
        }
    }
    return isset($_SESSION['login']);
}

function getUser()
{
    return isAuth() ? $_SESSION['login'] : "Guest";
}