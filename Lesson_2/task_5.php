<?php
/*5. Собрать страницу с меню и контентом,
зарендерить как минимум 2 подшаблона через renderTemplate.
ВАЖНОЕ*/

$menu = renderTemplate("./templates/menu");
$content = renderTemplate("./templates/about");

echo renderTemplate("./templates/site", $content, $menu);

function renderTemplate($page, $content = "", $menu = "")
{
    ob_start();
    include $page . ".php";
    return ob_get_clean();
}