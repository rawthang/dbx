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
<style rel="stylesheet" type="text/css" media="all">
	a {
		cursor:pointer;
		text-decoration: underline;
		color: #638f2b;	
	}
	a:hover {
		text-decoration: none;
		color: #638f2b;	
	}
	a img {
		border:0;
	}
	#noscript-bg {
		position:fixed;left:0;top:0;width:100%;height:100%;background-color:black;opacity:.95;z-index:9999;
	}
	#noscript-text {
		position:absolute;
		text-align:center;left:0;width:100%;top:30%;
		font: 14px Myriad,Helvetica,Tahoma,Arial,clean,sans-serif; 
		font-size: 85%;
		font-size-adjust:none;
		font-weight:bold;
		color: #ccc5cc;
		line-height:1.5em;z-index:10000;
		padding-top:150px;		
	}
	#noscript-text b {
		font-size:22px;
	}
</style>
<div id="noscript-bg"></div>
<div id="noscript-text"><img src="images/noscript.png" center top no-repeat><p><b>This Site needs JavaScript for Ajax etc.</b><br />
  Please <a href="https://www.google.com/support/adsense/bin/answer.py?answer=12654" target="_blank">enable JavaScript</a> in your browser.</p></div>
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
<style rel="stylesheet" type="text/css" media="all">
	a {
		cursor:pointer;
		text-decoration: underline;
		color: #638f2b;	
	}
	a:hover {
		text-decoration: none;
		color: #638f2b;	
	}
	a img {
		border:0;
	}
	#noscript-bg {
		position:fixed;left:0;top:0;width:100%;height:100%;background-color:black;opacity:.95;z-index:9999;
	}
	#noscript-text {
		position:absolute;
		text-align:center;left:0;width:100%;top:30%;
		font: 14px Myriad,Helvetica,Tahoma,Arial,clean,sans-serif; 
		font-size: 85%;
		font-size-adjust:none;
		font-weight:bold;
		color: #ccc5cc;
		line-height:1.5em;z-index:10000;
		padding-top:150px;		
	}
	#noscript-text b {
		font-size:22px;
	}
</style>
<div id="noscript-bg"></div>
<div id="noscript-text"><img src="images/noscript.png" center top no-repeat><p><b>This Site needs JavaScript for Ajax etc.</b><br />
  Please <a href="https://www.google.com/support/adsense/bin/answer.py?answer=12654" target="_blank">enable JavaScript</a> in your browser.</p></div>
</noscript>
<?php
}
?>