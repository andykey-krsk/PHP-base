<?php
function getFeedback($page, $id)
{
    return getAssocResult("SELECT * FROM feedback WHERE page = '{$page}' AND page_id = '{$id}' ORDER BY feedback_date DESC");
}

function addFeedback($post)
{
    if ($post['name'] != '' && $post['text'] != '') {
        $db = getDb();
        $name = mysqli_real_escape_string($db, $post['name']);
        $content = mysqli_real_escape_string($db, $post['text']);
        $page = mysqli_real_escape_string($db, $post['page']);
        $page_id = (int)$post['id'];
        $sql = "INSERT INTO feedback(feedback_name, content, page, page_id, feedback_date) VALUES ('$name','$content','$page','$page_id',NOW())";
        @mysqli_query($db, $sql) or die(mysqli_error($db));
    }
}

function delFeedback($id_feed)
{
    $db = getDb();
    $sql = "DELETE FROM feedback WHERE id = {$id_feed}";
    @mysqli_query($db, $sql) or die(mysqli_error($db));
}

function saveFeedback($post)
{
    $db = getDb();
    $name = mysqli_real_escape_string($db, $post['name']);
    $content = mysqli_real_escape_string($db, $post['text']);
    $page_id = (int)$post['feedback_id'];
    $sql = "UPDATE feedback SET feedback_name = '{$name}', content = '{$content}' WHERE id = {$page_id}";
    @mysqli_query($db, $sql) or die(mysqli_error($db));
}

function editFeedback($id)
{
    return getAssocResult("SELECT * FROM feedback WHERE id = '{$id}'");
}

function doFeedBackAction(&$params, $action)
{
    $params['action'] = 'add';
    $params['buttonText'] = 'Добавить';
    $params['feedback_name'] = '';
    $params['content'] = '';
    $params['id_feed'] = '';

    if ($action == 'add') {
        addFeedback($_POST);
        header("Location: ?id={$_POST['id']}&message=OK");
    }

    if ($action == 'delete') {
        delFeedback((int)$_GET['id_feed']);
        header("Location: ?id={$_GET['id']}&message=delete");
    }

    if ($action == 'edit') {
        $params['edit'] = editFeedback($_GET['id_feed']);
        $params['action'] = 'save';
        $params['buttonText'] = 'Править';
        //$params['id_feed'] = $_GET['id_feed'];
    }

    if ($_GET['action'] == 'save') {
        saveFeedback($_POST);
        header("Location: ?id={$_POST['id']}&message=edit");
    }
}