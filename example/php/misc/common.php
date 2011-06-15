<?php
if(isSet($_GET['lang'])) {
	$lang = $_GET['lang'];
	$_SESSION['lang'] = $lang;

	setcookie('lang', $lang, time() + (3600 * 24 * 30));
}
	else if(isSet($_SESSION['lang'])) {
		$lang = $_SESSION['lang'];
	}
	else if(isSet($_COOKIE['lang'])) {
		$lang = $_COOKIE['lang'];
	}
else {
	$lang = 'en';
}

switch ($lang) {
	case 'en':
		$ergebnis = safe_query("SELECT * FROM ".PREFIX."languages WHERE language='en'");
		while($ds = mysql_fetch_array($ergebnis)) {
			$where = $ds[where];
			$what = $ds[what];
			define($where, $what);
		}
	break;

	case 'de':
		$ergebnis = safe_query("SELECT * FROM ".PREFIX."languages WHERE language='de'");
		while($ds = mysql_fetch_array($ergebnis)) {
			$where = $ds[where];
			$what = $ds[what];
			define($where, $what);
		}
	break;

	default:
		$ergebnis = safe_query("SELECT * FROM ".PREFIX."languages WHERE language='de'");
		while($ds = mysql_fetch_array($ergebnis)) {
			$where = $ds[where];
			$what = $ds[what];
			define($where, $what);
		}  
}
?>