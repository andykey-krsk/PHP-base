<?

//Для каждой страницы готовим массив со своим набором переменных
//для подстановки их в соотвествующий шаблон
function prepareVariables($page, $action)
{
    $params['layout'] = 'main';;
    switch ($page) {
        case 'index':
            break;
        case 'image':
            doFeedBackAction($params, $action);
            $params['layout'] = 'gallery';
            $params['image'] = getOneImage($_GET['id']);
            executeSql("UPDATE gallery SET gallery_view = gallery_view + 1 WHERE gallery_id = {$_GET['id']}");
            $params['feedback'] = getFeedback($page, $_GET['id']);
            $params['page_id'] = $_GET['id'];
            break;
        case 'gallery':
            loadImage();
            $params['layout'] = 'gallery';
            $params['gallery'] = getGallery();
            _log($params, 'gallery');
            break;
        case 'catalog':
            $params['layout'] = 'main';
            $params['catalog'] = getCatalog();
            _log($params, 'catalog');
            break;
        case 'item':
            doFeedBackAction($params, $action);
            $params['layout'] = 'main';
            $params['item'] = getItem($_GET['id']);
            $params['feedback'] = getFeedback($page, $_GET['id']);
            $params['page_id'] = $_GET['id'];
            break;
        case 'news':
            $params['layout'] = 'main';
            $params['news'] = getNews();
            _log($params, 'news');
            break;
        case 'newscontent':
            $params['layout'] = 'main';
            $params['newscontent'] = getNewsContent($_GET['id']);
            break;
        case 'feedback':
            doFeedBackAction($params, $action);
            $params['layout'] = 'main';
            $params['feedback'] = getFeedback($page, 0);
            $params['page_id'] = 0;
            break;
    }
    return $params;
}

//Функция, возвращает текст шаблона $page с подстановкой переменных
//из массива $params, содержимое шабона $page подставляется в
//переменную $content главного шаблона layout для всех страниц
function render($page, array $params)
{
    $content = renderTemplate(LAYOUTS_DIR . $params['layout'], [
        'menu' => renderTemplate('menu', $params),
        'content' => renderTemplate($page, $params)
    ]);
    return $content;
}

//Функция возвращает текст шаблона $page с подставленными переменными из
//массива $params, просто текст
function renderTemplate($page, array $params)
{
    ob_start();

    if (!is_null($params)) {
        extract($params);
    }

    $fileName = TEMPLATES_DIR . $page . ".php";

    if (file_exists($fileName)) {
        include $fileName;
    } else {
        die("Страницы {$fileName} не существует.");
    }
    return ob_get_clean();
}