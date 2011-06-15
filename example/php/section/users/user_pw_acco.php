<?
if($access>=2) { 
$pw = $_POST["pw"];
$pwn1 = $_POST["pwn1"];
$pwn2 = $_POST["pwn2"];
$error = 0; 
?>
<table width="435" border="0" cellpadding="0" cellspacing="1">
	<tr>
		<td colspan="3">&nbsp;</td>
	</tr>
	<tr>
		<td height="20" colspan="3"><strong><font color="#000000">Passwort &auml;ndern</font></strong></td>
	</tr>
</table>

<table width="435" border="0" cellpadding="0" cellspacing="1">
	<tr>
		<td>
<?
if (empty($pwn1) or empty($pwn2) or empty($pw)) { $error++; }

if ($error==0) {
$sql1 = "SELECT id, password FROM users WHERE id = '$myid'";
$data = mysql_query($sql1, $db);
while($mypw = mysql_fetch_object($data)) { $password = $mypw->password; }

$md5pw = md5($pw);
if ($password != $md5pw) { print "<br>Folgende Fehler sind aufgetreten:<br><br><strong><font color=\"#990000\">Das alte Passwort ist nicht korrekt
								  <p><a href=\"javascript:history.back()\">Hier klicken um es nocheinmal zu probieren</a></p></font></strong>"; }

if ($password == $md5pw) {
if ($pwn1 != $pwn2) { print "<br>Folgende Fehler sind aufgetreten:<br><br><strong><font color=\"#990000\">Das neueingegebene Passwort gleicht ab
							 <p><a href=\"javascript:history.back()\">Hier klicken um es nocheinmal zu probieren</a></p></font></strong>"; }

if ($pwn1 == $pwn2) {
$md5pw2 = md5($pwn2);
$update = "UPDATE users SET password = '$md5pw2' WHERE id = '$myid'";
$sqlaction = mysql_query($update);

print "Der Vorgang wurde erfolgreich abgeschlossen";
} } } 
else { print "<br>Folgende Fehler sind aufgetreten:<br><br><strong><font color=\"#990000\">Sie haben nicht alle Felder ausgef&uuml;llt</font>
			  <p><a href=\"javascript:history.back()\">Hier klicken um es nocheinmal zu probieren</a></p></strong>"; } ?>
		</td>
	</tr>
</table>
<? } ?>