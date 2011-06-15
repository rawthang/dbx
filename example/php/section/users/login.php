<?
$error = 0;

if ($login=="error") { $msglog="<strong>Der angegebene Benutzer existiert nicht!</strong>"; $error++; }

if (empty($userlg) or empty($pwlg)) { $msglog="<strong>Bitte Benutzer und das Passwort eingeben.</strong>"; $error = 2; }
else { if(empty($error) AND $login!="true") { $msglog="<strong>Das Passwort ist falsch!<strong>"; $login = "error"; } } 

if($login!="true") { 
?>
<table width="435" border="0" cellspacing="1" cellpadding="0">
	<tr>
		<td align="center" valign="top">&nbsp;</td>
	</tr>
	<tr>
		<td><strong><font color="#000000">Login</font></strong></td>
	</tr>
	<tr>
		<td><br>Folgender Fehler ist aufgetreten:<br><br><font color="#990000"><? echo $msglog; ?></font></td>
	</tr>
</table>
<?
}
if ($login=="true") { 
?>
<table width="435" border="0" cellpadding="0" cellspacing="1">
	<tr>
		<td colspan="2">&nbsp;</td>
	</tr>
	<tr>
		<td height="20" colspan="2"><strong><font color="#000000">&Uuml;bersicht</font></strong></td>
	</tr>
<? 
$sql3 = "SELECT * FROM users WHERE id='$myid' LIMIT 1";

$data = mysql_query($sql3, $db);
while ($myhome = mysql_fetch_object ($data)) { 
?>
	<tr valign="top">
		<td height="20" colspan="2">Dein Benutzername lautet <b><? echo "$myhome->nick" ?></b></td>
	</tr>
	<tr valign="top">
		<td height="20" colspan="2">Deine e-Mail lautet <b><? echo $myhome->email; ?></b></td>
	</tr>
	<tr valign="top">
		<td height="20" colspan="2">Registriert seit dem <? $date1 = date("d.m.y",$myhome->register);
												$day1 = date("H:i",$myhome->register);
												$tage1 = array("So.","Mo.","Di.","Mi.","Do.","Fr.","Sa.");
												$tag1 = date("w");
												echo "<b>$tage1[$tag1], $date1 $day1 Uhr</b>"; ?></td>
	</tr>
	<tr valign="top">
		<td height="20" colspan="2">Zuletzt hier, am <? $date2 = date("d.m.y",$laston);
				$day2 = date("H:i",$laston);
				$tage2 = array("So.","Mo.","Di.","Mi.","Do.","Fr.","Sa.");
				$tag2 = date("w");
				echo "<b>$tage2[$tag2], $date2 $day2 Uhr</b>"; ?></td>		
	</tr>
	<?  if($access>=5) { ?><tr valign="top">
		<td height="20" colspan="2">&nbsp;</td>
	</tr>
	<tr valign="top">
		<td width="129" height="20">Neue Bestellungen:</td>
	    <td width="303" height="20"><? $sql = "SELECT * FROM bestellungen LIMIT 15";

									   $data = mysql_query($sql, $db);
									   while ($bestellungen = mysql_fetch_object ($data)) {  
									   echo "<p><img src=\"gfx/design/arrow.gif\" border=\"0\"> <b><a href=\"?section=bestelladmin&id=$bestellungen->id\">".$bestellungen->anrede."&nbsp;".$bestellungen->nachname."</a></b></p>"; }
								    ?>
		</td>
	</tr>
	<? } ?>	
</table>
<? } } ?>