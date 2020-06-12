<?php
/*5. Собрать страницу с меню и контентом,
зарендерить как минимум 2 подшаблона через renderTemplate.
ВАЖНОЕ*/

$menu = renderTemplate("./engine/menu");
$content = renderTemplate("./engine/about");

echo renderTemplate("./engine/site", $content, $menu);

function renderTemplate($page, $content = "", $menu = "")
{
    ob_start();
    include $page . ".php";
    return ob_get_clean();
}