<?php
extract($_REQUEST);
$ws_pwd=md5($pwd);
require ("php/misc/conf.php"); // DB Conf
require ("php/misc/head.php");

$referer = $_SERVER['HTTP_REFERER'];

$check = safe_query("SELECT * FROM ".PREFIX."user WHERE username='$ws_user'");
$anz = mysql_num_rows($check);

if($anz) {
    $ds=mysql_fetch_array($check);

        if($ws_pwd == $ds[password]) {
                setcookie("ws_auth", $ws_user.":".$ws_pwd, time()+(3600*24*365));
                if(empty($referer)) header("Location: index.php?site=news");
                else header("Location: $referer");
        }
        elseif(!($ws_pwd == $ds[password])) {
            $error='You have entered an invalid password<br><br><a href="javascript:history.back()">Go back and try it again!</a>';
        }
}
else $error='No user with this username available<br><br>
                                          <a href="javascript:history.back()">Go back and try it again!</a>';
?>
<html>
<head>
<style>td.scroll { height:464px; scrollbar-base-color: #C9C9C9; scrollbar-3d-light-color: #ff0000; scrollbar-arrow-color: #8D8D8D; scrollbar-darkshadow-color: #C9C9C9; 
scrollbar-face-color: #C9C9C9; scrollbar-highlight-color: #DBDBDB; scrollbar-shadow-color: #DBDBDB; scrollbar-track-color: #DBDBDB; }

.scroll { scrollbar-base-color: #C9C9C9; scrollbar-3d-light-color: #ff0000; scrollbar-arrow-color: #8D8D8D; scrollbar-darkshadow-color: #C9C9C9; 
scrollbar-face-color: #C9C9C9; scrollbar-highlight-color: #DBDBDB; scrollbar-shadow-color: #DBDBDB; scrollbar-track-color: #DBDBDB; }

span.ainfo { font-family:verdana;font-weight:normal;color:#A8A8A8;font-size:10px; }
span.text, div.text { font-family:verdana;font-weight:normal;color:#4A4A4A;font-size:12px; }

input, textarea, select { font-family: Verdana;	font-size: 10pt; color: #4A4A4A; border: 1px solid #666666; }

table { font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 10px; color: #4A4A4A; text-decoration: none; }

.headl { font-family:verdana;font-weight:bold;color:#4a4a4a;font-size:14px; }

a.login:link    { color:#75787D;font-family:verdana;font-weight:bold;font-size:11px;text-decoration:none; }
a.login:visited { color:#75787D;font-family:verdana;font-weight:bold;font-size:11px;text-decoration:none; }
a.login:hover   { color:#A53D46;font-family:verdana;font-weight:bold;font-size:11px;text-decoration:none; }
a.login:active  { color:#A53D46;font-family:verdana;font-weight:bold;font-size:11px;text-decoration:none; }
a.login:focus   { color:#A53D46;font-family:verdana;font-weight:bold;font-size:11px;text-decoration:none; }

a.dlink:link    { color:#ADAAAD;font-family:verdana;font-weight:bold;font-size:10px;text-decoration:none; }
a.dlink:visited { color:#ADAAAD;font-family:verdana;font-weight:bold;font-size:10px;text-decoration:none; }
a.dlink:hover   { color:#292C29;font-family:verdana;font-weight:bold;font-size:10px;text-decoration:none; }
a.dlink:active  { color:#292C29;font-family:verdana;font-weight:bold;font-size:10px;text-decoration:none; }
a.dlink:focus   { color:#292C29;font-family:verdana;font-weight:bold;font-size:10px;text-decoration:none; }

a:link    { color:#4a4a4a;font-family:verdana;text-decoration:none; }
a:visited { color:#4a4a4a;font-family:verdana;text-decoration:none; }
a:hover   { color:#A33945;font-family:verdana;text-decoration:none; }
a:active  { color:#A33945;font-family:verdana;text-decoration:none; }
a:focus   { color:#A33945;font-family:verdana;text-decoration:none; }</style>
</head>
<body bgcolor="#000000">
<table width="100%" height="100%">
  <tr>
    <td align="center">
          <table width="350" border="1" cellpadding="10" cellspacing="0" bordercolor="silver" bgcolor="#FFFFFF">
            <tr>
                  <td align="center"><?php echo $error; ?></td>
                </tr>
          </table>
    </td>
  </tr>
</table>
</body>
</html>