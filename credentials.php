<?php
define('DB_NAME','exploit');
define('DB_USR','root');
define('DB_PASS','');
define('DB_HOST','localhost');

define('DB_DSN','mysql:host='.DB_HOST.';dbname='.DB_NAME);
global $dbh;
$dbh=new PDO(DB_DSN, DB_USR, DB_PASS);
?>