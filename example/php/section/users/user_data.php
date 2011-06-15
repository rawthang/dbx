<?
if($access<2) { echo $noacc; } 
else { 
?>
<table width="435" border="0" cellpadding="0" cellspacing="1">
	<tr>
		<td colspan="3">&nbsp;</td>
	</tr>
	<tr>
		<td height="20" colspan="3"><strong><font color="#000000">Profil</font></strong></td>
	</tr>
</table>
<? 
$sql1 = "SELECT * FROM users WHERE id='$myid' LIMIT 1";
$data = mysql_query($sql1, $db);
while ($myhome = mysql_fetch_object ($data)) {
?>
<table width="435" border="0" cellpadding="1" cellspacing="1">
	<tr valign="middle" bgcolor="<? echo $farbe1 ?>">
		<td height="25">Benutzername:</td>
		<td width="115" height="25"><? echo $myhome->nick ?></td>
	</tr>
	<tr valign="middle" bgcolor="<? echo $farbe2 ?>">
		<td width="25%" height="25">Anrede:</td>
		<td height="25"><? if($myhome->sex=="Herr") { echo "<option checked> Herr <option> Frau"; }
						   		elseif($myhome->sex=="Frau") { echo "<option checked> Frau <option> Herr"; }
						   else { echo "<option> Nicht angegeben"; } 
						?>
	    </td>
	</tr>
	<tr valign="middle" bgcolor="<? echo $farbe1 ?>">
		<td width="25%" height="25">Name:</td>
		<td height="25"><? echo $myhome->name ?></td>
	</tr>
	<tr valign="middle" bgcolor="<? echo $farbe2 ?>">
		<td width="25%" height="25">Vorname:</td>
		<td height="25"><? echo $myhome->surname ?></td>
	</tr>
	<tr valign="middle" bgcolor="<? echo $farbe1 ?>">
		<td width="25%" height="25">Stra&szlig;e:</td>
		<td height="25"><? echo $myhome->street ?></td>
	</tr>
	<tr valign="middle" bgcolor="<? echo $farbe2 ?>">
		<td width="25%" height="25">PLZ:</td>
		<td height="25"><? echo $myhome->plz ?></td>
	</tr>
	<tr valign="middle" bgcolor="<? echo $farbe1 ?>">
		<td width="25%" height="25">Ort:</td>
		<td height="25"><? echo $myhome->place ?></td>
	</tr>
	<tr valign="middle" bgcolor="<? echo $farbe2 ?>">
		<td width="25%" height="25">E-Mail:</td>
		<td height="25"><? echo $myhome->email ?></td>
	</tr>
</table>
<? } } ?>