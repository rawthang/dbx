<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="de" xml:lang="de">
<head>
<?php
if($site == "error") {
?>
	<title>Error 404: <? echo PAGE_TITLE; ?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<link rel="stylesheet" type="text/css" media="all" href="css/404/ajax-pages.css"/>
	<link rel="stylesheet" type="text/css" media="all" href="css/404/styles.css"/>
</head>
<body>
<noscript>
<div id="noscript-bg"></div>
<div id="noscript-text"><b>This Site needs JavaScript for Ajax etc.</b><br/>
  Please <a href="https://www.google.com/support/adsense/bin/answer.py?answer=12654" target="_blank">enable JavaScript</a> in your browser.</div>
</noscript>
<?php
}
else {
?>
	<title><?php echo PAGE_TITLE; ?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<link rel="stylesheet" type="text/css" media="all" href="css/reset.css"/>
	<link rel="stylesheet" type="text/css" media="all" href="css/styles.css"/>
	<link rel="stylesheet" type="text/css" media="all" href="css/960.css"/>
</head>
<body>
<noscript>
<div id="noscript-bg"></div>
<div id="noscript-text"><b>This Site needs JavaScript for Ajax etc.</b><br/>
  Please <a href="https://www.google.com/support/adsense/bin/answer.py?answer=12654" target="_blank">enable JavaScript</a> in your browser.</div>
</noscript>
<?php
}
?>