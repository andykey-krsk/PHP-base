<?php
/*6. В имеющемся шаблоне сайта заменить статичное меню (ul – li) на генерируемое через PHP.
Необходимо представить пункты меню как элементы массива и вывести их циклом.
Подумать, как можно реализовать меню с вложенными подменю? Попробовать его реализовать.
Важное, при желании можно сделать на движке 3. ВАЖНОЕ!*/

$menu = [
    ['url' => '/', 'name' => 'Главная'],
    ['url' => '/catalog', 'name' => 'Каталог',
        'sub_name' => [
            ['url' => '/sub1', 'name' => 'Под меню 1'],
            ['url' => '/sub2', 'name' => 'Под меню 2'],
            ['url' => '/sub3', 'name' => 'Под меню 3']
        ]],
    ['url' => '/contacts', 'name' => 'Контакты',
        'sub_name' => [
            ['url' => '/sub1', 'name' => 'Под меню 1'],
            ['url' => '/sub2', 'name' => 'Под меню 2'],
            ['url' => '/sub3', 'name' => 'Под меню 3']
        ]],
    ['url' => '/about', 'name' => 'О нас']
];

function getMenu($menu)
{
    $result = "<ul>";
    foreach ($menu as $menuItem) {
        $result .= getMenuItem($menuItem);
    }
    $result .= "</ul>";
    return $result;
}

function getMenuItem($menuItem)
{
    $result = "<li>";
    $sub_menu = "";
    foreach ($menuItem as $key => $value) {
        $$key = $value;
        if (is_array($value)){
            $sub_menu .= getMenu($value);
        }
    }
        $result .= "<a href =" . $url . ">" . $name . "</a>" . $sub_menu;

    $result .= "</li>";
    return $result;
}

echo getMenu($menu);