<?php
define("PASSWORD", "12345");
$db = @mysqli_connect("localhost", "shop", PASSWORD, "shop") or die("Ошибка! " . mysqli_connect_error());