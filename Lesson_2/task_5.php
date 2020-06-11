<?php
/*5. Собрать страницу с меню и контентом,
зарендерить как минимум 2 подшаблона через renderTemplate.
ВАЖНОЕ*/

$menu = renderTemplate("./engine/menu");

echo renderTemplate("./engine/site", $menu);

function renderTemplate($page, $content = "")
{
    ob_start();
    include $page . ".php";
    return ob_get_clean();
}