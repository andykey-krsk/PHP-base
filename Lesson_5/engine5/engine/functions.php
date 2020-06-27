<?

//Для каждой страницы готовим массив со своим набором переменных
//для подстановки их в соотвествующий шаблон
function prepareVariables($page)
{
    $params['layout'] = 'main';;
    switch ($page) {
        case 'index':
            break;
        case 'image':
            $params['layout'] = 'gallery';
            $params['image'] = getOneImage($_GET['id']);
            break;
        case 'gallery':
            //uploadFile();
            $params['layout'] = 'gallery';
            $params['gallery'] = getGallery();

            _log($params, 'gallery');
            break;

        case 'catalog':
            //uploadFile();
            $params['layout'] = 'catalog';
            $params = [
                'catalog' => ["Чай", "Печенье", "Вафли"]
            ];
            _log($params, 'catalog');
            break;
        case 'news':
            $params['layout'] = 'news';
            $params['news'] = getNews();
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