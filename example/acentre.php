<?php
extract($_REQUEST);

@session_name("s");
@session_start();

include("system/scripts/_mysql.php");
include("system/scripts/_settings.php");
include("system/scripts/_functions.php");

$cookie=false;
if (isset($ws_auth)) {
    $authent = explode(":", $ws_auth);
        $ws_user = $authent[0];
        $ws_pwd = $authent[1];
        $cookie=true;
}
$loggedin=false;
if ($cookie) {
    $check = safe_query("SELECT * FROM ".PREFIX."user WHERE username='$ws_user' AND password='$ws_pwd'");
        $anz = mysql_num_rows($check);
        if($anz) {
            $ds=mysql_fetch_array($check);
        $loggedin=true;
                $userID=$ds[userID];

                $admin=isanyadmin($ds[userID]);
    }
}
if(!$loggedin) die('Sie sind nicht eingelogtg');
if(!$admin) die('Sie haben keine Zugangsberechtigung zum acentre');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>eXalted pRogress | Alliance [Nera'Thor - EU]</title>
<link rel="stylesheet" type="text/css" media="all" href="system/css/reset.css" />
<link rel="stylesheet" type="text/css" media="all" href="system/css/styles.css" />
<link rel="stylesheet" type="text/css" media="all" href="system/css/960.css" />
<script type="text/javascript" src="system/js/core.js"></script>
<script type="text/javascript" src="system/js/fx.js"></script>
<script type="text/javascript" src="system/js/blah.js"></script>
<script type="text/javascript" src="system/js/line.js"></script>
</head>
<body>
<noscript>
<div id="noscript-bg"></div>
<div id="noscript-text"><b>This Site needs JavaScript for Ajax etc.</b><br>
  Please <a href="https://www.google.com/support/adsense/bin/answer.py?answer=12654" target="_blank">enable JavaScript</a> in your browser.</div>
</noscript>
<table width="100%" align="center" cellpadding="5" cellspacing="1" bgcolor="#999999">
  <tr>
    <td width="15%" valign="top" bgcolor="#FFFFFF" align="center">
      <br>
<?php if(isuseradmin($userID)) { ?>
<table width="100%" border="0" cellpadding="4" cellspacing="1" bgcolor="#999999">
        <tr>
          <td bgcolor="#CCCCCC"><strong>User-Settings:</strong></td>
        </tr>
        <tr>
          <td bgcolor="#FFFFFF"><p>&#8226; <a href="?site=squads">Squads</a><br>
              &#8226; <a href="?site=members">Clanmembers</a><br>
              &#8226; <a href="?site=users">Registered Users</a>
            </p></td>
        </tr>
      </table>
<?php } ?>
      <br> <table width="100%" border="0" cellpadding="4" cellspacing="1" bgcolor="#999999">
        <tr>
          <td bgcolor="#CCCCCC"><strong>Rubrics</strong></td>
        </tr>
        <tr>
          <td bgcolor="#FFFFFF"><p> &#8226; <a href="?site=rubrics">News-Rubrics</a>
            </p></td>
        </tr>
      </table> <?php if(ispageadmin($userID)) { ?>
      <br> <table width="100%" border="0" cellpadding="4" cellspacing="1" bgcolor="#999999">
           <tr>
          <td bgcolor="#CCCCCC"><strong>Pageinhalt</strong></td>
        </tr>
        <tr>
          <td bgcolor="#FFFFFF">&#8226; <a href="?site=styles">Styles</a><br>
            &#8226; <a href="?site=settings">Settings</a></td>
        </tr>
        <tr>
          <td bgcolor="#FFFFFF">&#8226; <a href="?site=bosse">Bosse</a><br>&#8226; <a href="?site=history">About</a><br>
          &#8226; <a href="?site=impressum">Impressum</a></td>
        </tr>
      </table>
	  <?php } if(isforumadmin($userID)) { ?>
      <br> <table width="100%" border="0" cellpadding="4" cellspacing="1" bgcolor="#999999">
        <tr>
          <td bgcolor="#CCCCCC"><strong>Forum</strong></td>
        </tr>
        <tr>
          <td bgcolor="#FFFFFF">&#8226; <a href="?site=boards">Foren</a><br>
          &#8226; <a href="?site=ranks">Benutzer R&auml;nge</a> </td>
        </tr>
      </table> <?php } ?> 
      </td>
    <td width="85%" valign="top" bgcolor="#FFFFFF"> <h2>acentre</h2><hr noshade size="1" color="333333">

        <?php
if(isset($site) && $site!="news") include('system/scripts/admin/'.$site.'.php');
else echo'Welcome to acentre';
?>
</td>
  </tr>
</table>
</body>
</html>
