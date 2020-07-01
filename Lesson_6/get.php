<?php
if (isset($_GET['arg1'])) {
    $arg1 = (int)$_GET['arg1'];
} else {
    $arg1 = 0;
}

if (isset($_GET['arg2'])) {
    $arg2 = (int)$_GET['arg2'];
} else {
    $arg2 = 0;
}

if (isset($_GET['operation'])) {
    $operation = strip_tags($_GET['operation']);
    switch ($operation) {
        case "add":
            $result = addition($arg1, $arg2);
            break;
        case "sub":
            $result = subtraction($arg1, $arg2);
            break;
        case "mult":
            $result = multiplication($arg1, $arg2);
            break;
        case "div":
            $result = division($arg1, $arg2);
            break;
    }
} else {
    $operation = 'add';
}
