<?php
function getFeedback($page,$id)
{
    return getAssocResult("SELECT * FROM feedback WHERE page = '{$page}' AND page_id = '{$id}' ORDER BY feedback_date DESC");
}

function addFeedback($post)
{
    $db = getDb();
    $name = mysqli_real_escape_string($db, $post['name']);
    $content = mysqli_real_escape_string($db, $post['text']);
    $page = mysqli_real_escape_string($db, $post['page']);
    $page_id = (int)$post['id'];
    $sql = "INSERT INTO feedback(feedback_name, content, page, page_id, feedback_date) VALUES ('$name','$content','$page','$page_id',NOW())";
    @mysqli_query($db, $sql) or die(mysqli_error($db));
}

function delFeedback($id)
{
    $db = getDb();
    $sql = "DELETE FROM feedback WHERE id = {$id}";
    @mysqli_query($db, $sql) or die(mysqli_error($db));
}