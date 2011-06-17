<?php
mysql_connect($host, $user, $pwd) or die ('Error: SQL-Daten überprüfen');
mysql_select_db($db) or die ('Error: Konnte nicht zur Datenbank "'.$db.'" verbinden');
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


	$sqllogin = safe_query("SELECT * FROM ".PREFIX."user WHERE username='$userlg' OR email='$userlg'");
	while ($userlogin = mysql_fetch_object ($sqllogin)) {
		if ($userlogin->password == $md5pw) { 
			$login = "true";
			$_SESSION['myid'] = $userlogin->userID;
			$_SESSION['myip'] = $ip;
			$_SESSION['user'] = $userlogin->nickname;
			$_SESSION['user'] = $userlogin->email;
		} 
		else { 
			$login="errorpw";
		} 
	}
} 

$myid = $_SESSION['myid'];
$myip = $_SESSION['myip'];
$user = $_SESSION['user'];

if($site == "logout" OR $myip != $ip) { 
	session_destroy(); 
}
?>