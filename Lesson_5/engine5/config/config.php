<?php
define("TEMPLATES_DIR", "../templates/");
define("LAYOUTS_DIR", "layouts/");

/* DB config */
define('HOST', 'localhost');
define('USER', 'shop');
define('PASS', '12345');
define('DB', 'shop');

//TODO Сделать пути абсолютными
include "../engine/db.php";
include "../engine/functions.php";
include "../engine/news.php";
include "../engine/log.php";
include "../engine/upload.php";