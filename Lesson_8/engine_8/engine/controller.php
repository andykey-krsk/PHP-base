<?php

//Файл с функциями нашего движка

/*
 * Функция подготовки переменных для передачи их в шаблон
 */
function prepareVariables($page, $action, $id)
{
//Для каждой страницы готовим массив со своим набором переменных
//для подстановки их в соотвествующий шаблон
    $params = ["count" => getBasketCount()];
    $params['allow'] = false;
    if (is_auth()) {
        $params['allow'] = true;
        $params['user'] = get_user();
    }



    switch ($page) {

        case 'auth':
            if ($action == "login") {
                if (isset($_POST['send'])) {
                    $login = $_POST['login'];
                    $pass = $_POST['pass'];

                    if (!auth($login, $pass)) {
                        Die('Не верный логин пароль');
                    } else {
                        if (isset($_POST['save'])) {
                            makeHashAuth();
                            header("Location: {$_SERVER['HTTP_REFERER']}");

                        }
                        header("Location: {$_SERVER['HTTP_REFERER']}");
                    }
                }
                exit;
            }
            if ($action == "logout") {
                session_unset();
                session_destroy();
                setcookie("hash", "", time() - 3600, "/");
                header("Location: {$_SERVER['HTTP_REFERER']}");
            }

            break;



        //api/buy/5
        case 'api':
            if ($action == "buy") {
               addToBasket($id);
                //var_dump($id);
                echo json_encode(["result" => 1, "count" => getBasketCount()]);
                exit;
            }
            if ($action == "delete") {
                deleteFromBasket($id);

                echo json_encode([
                    "result" => 1,
                    "count" => getBasketCount(),
                    "summ" => summFromBasket()]);
                exit;
                }


        case 'news':

            $params["news"] = getNews();

            break;

        case 'newspage':
            //пример асинхронного обработчика лайков к новостям
            if ($action=="addlike") {
                //обращаемся к модели и ставим лайк
                $result = addNewsLike($id);
                echo json_encode(["result" => $result]);
            }

            $content = getNewsContent($id);
            $params['prev'] = $content['prev'];
            $params['text'] = $content['text'];
            break;

        case 'feedback':

            doFeedbackAction($params, $action, $id);

            $params['feedback'] = getAllFeedback();

            break;

        case 'catalog':

            $params['goods'] = getAllGoods();
            break;

        case 'item':
            $params['good'] = getOneGood($id);
            break;

        case 'basket':
            $params['basket'] = getBasket();
            $params['summ'] = summFromBasket();
            break;
    }

    return $params;
}





