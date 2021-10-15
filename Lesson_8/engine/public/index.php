<?php
session_start();
//Точка входа в приложение, сюда мы попадаем каждый раз когда загружаем страницу

//Первым делом подключим файл с константами настроек
include $_SERVER['DOCUMENT_ROOT'] . "/../config/config.php";

//Читаем параметр page из url, чтобы определить, какую страницу-шаблон
//хочет увидеть пользователь, по умолчанию это будет index

$arr_message = [
    '1' => "Файл загружен",
    '2' => "Ошибка закгузки файла",
    '3' => "Неверный тип файла",
    '4' => "Файл превышает максимально допустимый размер"
];

$message = $arr_message[$_GET['message']];

$url_array = explode("/", $_SERVER['REQUEST_URI']);

//Читаем параметр page из url, чтобы определить, какую страницу-шаблон
//хочет увидеть пользователь, по умолчанию это будет index
if ($url_array[1] == "") {
    $page = 'index';
} else {
    $page = $url_array[1];
}

$params = prepareVariables($page, $_GET['action']);


//Вызываем рендер, и передаем в него имя шаблона и массив подстановок
echo render($page, $params);