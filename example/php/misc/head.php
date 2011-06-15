<?php
mysql_connect($host, $user, $pwd) or die ('Error: SQL-Daten überprüfen');
mysql_select_db($db) or die ('Error: Konnte nicht zu Datenbank "'.$db.'" verbinden');
mysql_query("SET NAMES 'utf8'"); 
mysql_query("SET CHARACTER SET 'utf8'");

function safe_query($query="") {
	if(empty($query)) return false;
	
	if(DEBUG == "OFF") $result = mysql_query($query) or die ("Query failed!");
	else {
		$result = mysql_query($query) or die("Query failed:"
		."<li>Errorno: ".mysql_errno()
		."<li>Error: ".mysql_error()
		."<li>Query: ".$query);
    }
	
	return $result;
}

$access = 0;
$ip = $_SERVER['REMOTE_ADDR'];
$pwlg = $_POST['pwlg'];
$userlg = $_POST['userlg'];

if (!empty($userlg) AND !empty($pwlg)) {
	$login = "error";
	$md5pw = md5($pwlg);

	$sqllogin = "SELECT * FROM `clan_user` WHERE `username` = '$userlg' OR `email` = '$userlg'";
	$datalogin = mysql_query($sqllogin, $db);

	while ($userlogin = mysql_fetch_object ($datalogin)) {
		if ($userlogin->password == $md5pw) { 
			$login = "true";
			$_SESSION['myid'] = $userlogin->id;
			$_SESSION['myip'] = $ip;
			$_SESSION['user'] = $userlogin->nick;
			$_SESSION['user'] = $userlogin->email;
			$_SESSION['laston'] = $userlogin->laston; 
		} 
		else { 
			$login="errorpw";
		} 
	}

	mysql_free_result($datalogin);
} 

$myid = $_SESSION['myid'];
$myip = $_SESSION['myip'];
$user = $_SESSION['user'];
$laston = $_SESSION['laston'];

if (!empty($myid) AND $myip==$ip) {

	$sqlaccess = "SELECT `access` FROM `users` WHERE `id` = '$myid'";
	$accessdata = mysql_query($sqlaccess, $db);

	while ($useraccess = mysql_fetch_object ($accessdata)) { $access = $useraccess->access; }
		mysql_free_result($accessdata); 
		
		$setlaston="UPDATE `users` SET `laston` = '$time' WHERE `id` = '$myid'";
		$sqlaction = mysql_query($setlaston); 
}

if($show == "logout" OR $myip != $ip) { 
	session_destroy(); 
}
?>