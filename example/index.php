<?php
session_start();

require ("php/misc/conf.php");
require ("php/misc/head.php");
require ("php/misc/common.php");
require ("php/misc/head_html.php");

$reqsite = $_REQUEST['site'];
$time = time();

$today = date ("H:i");
$date = date ("d.m.y");  

$ergebnis = safe_query("SELECT * FROM ".PREFIX."modules WHERE name='$reqsite'");
while($ds = mysql_fetch_array($ergebnis)) {
	$site = $ds[name];
}

if (empty($site)) { $page = "php/section/home/index.php"; $site = "home"; } 
	elseif (!isset($_GET['site'])) { $page = "php/section/home/index.php"; $site = "home"; }
	elseif (!file_exists("php/section/".$site."/index.php")) { $page = "php/misc/error.php"; header("Location: index.php?site=error"); }
	elseif ($site == "login") { $page = "php/misc/login.php"; }
else { $site = $reqsite; $page = "php/section/".$site."/index.php"; }

echo $page."<br />";
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