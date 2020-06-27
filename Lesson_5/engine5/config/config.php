<?php
define("ROOT", dirname(__DIR__));
define("TEMPLATES_DIR", ROOT . "/templates/");
define("LAYOUTS_DIR", "layouts/");

define("PATH_BIG", $_SERVER['DOCUMENT_ROOT'] . "/gallery_img/big/");
define("PATH_SMALL", $_SERVER['DOCUMENT_ROOT'] . "/gallery_img/small/");

/* DB config */
define('HOST', 'localhost');
define('USER', 'shop');
define('PASS', '12345');
define('DB', 'shop');

include ROOT . "/engine/db.php";
include ROOT . "/engine/functions.php";
include ROOT . "/engine/news.php";
include ROOT . "/engine/log.php";
include ROOT . "/engine/upload.php";
include ROOT . "/engine/gallery.php";