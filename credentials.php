<?php
define('DB_NAME','blah');
define('DB_USR','extern');
define('DB_PASS','qwe123');
define('DB_HOST','localhost');

define('DB_DSN','mysql:host='.DB_HOST.';dbname='.DB_NAME);
global $dbh;
$dbh=new PDO(DB_DSN, DB_USR, DB_PASS);
?>