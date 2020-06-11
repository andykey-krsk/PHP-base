<?php
/*4. Используя имеющийся HTML-шаблон, сделать так,
чтобы главная страница генерировалась через PHP.
Создать блок переменных в начале страницы.
Сделать так, чтобы h1, title и текущий год генерировались
в блоке контента из созданных переменных.*/


$title = "Главная страница - страница обо мне";
$h1 = "Информация обо мне";
$year = date('Y'); //текущий год

$content = file_get_contents("site_2.html");

$content = str_replace("{{ title }}", $title, $content);
$content = str_replace("{{ h1 }}", $h1, $content);
$content = str_replace("{{ year }}", $year, $content);

echo $content;

?>