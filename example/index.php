<?php
extract($_REQUEST);
session_start();

require ("php/misc/conf.php"); // DB Conf
require ("php/misc/head.php");
require ("php/misc/common.php"); // Languages [DE, EN]
require ("php/misc/head_html.php"); // HTML Head
require ("php/misc/func.php"); // Regulary Functions

$site = $_REQUEST['site'];

if (empty($site)) { $page = "php/section/home/index.php"; } 
	elseif ($site == "login") { $page = "php/section/users/login.php"; }
	elseif ($site == "logout") { $page = "php/section/users/logout.php"; }
	elseif ($site == "register") { $page = "php/section/users/register.php"; }	
	elseif ($site == "error") { $page = "php/misc/error.php"; }
else {
	$ergebnis = safe_query("SELECT * FROM ".PREFIX."modules WHERE name='$reqsite'");
	while($ds = mysql_fetch_array($ergebnis)) {
		$site = $ds[name];
	}
	$page = "php/section/".$site."/index.php";
}

$temp_array = array (
	'site:site' => $page,
); 

if(file_exists("php/misc/source_html.php")) { $tmp_get = implode ("",file("php/misc/source_html.php")); }
else { die("U have broken the web site!"); }

foreach ($temp_array as $tmp_row => $tmp_new) {
	if (file_exists($tmp_new)) { 
		ob_start();
		include ($tmp_new);
		$tmp_new = ob_get_contents();
		ob_end_clean(); 
	} 
	
	$tmp_get = str_replace ('{' . $tmp_row . '}', $tmp_new, $tmp_get);	
}

$tmp_get = str_replace ('{site:parse}', $getparse, $tmp_get);
echo $tmp_get;
?>