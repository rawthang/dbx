<?
if($access<5) { echo $noacc; } 
else {
$userid = $_GET['userid'];
$sel = "selected=\"selected\""; 
$sql = "SELECT * FROM users WHERE id='$userid' LIMIT 1";
$data = mysql_query($sql, $db);
while ($users = mysql_fetch_object ($data)) {
if(!empty($users->clansince)) {
$xday = date(d,$users->clansince);
$xmonth = date(m,$users->clansince); 
$xyear = date(Y,$users->clansince); }
$usersq = $users->squad; $usersq2=$users->squad2; $usersx=$users->access;
$clansx = $users->clanax; $clansx1=$users->clanax1; 
?>
<table width="435" border="0" cellpadding="0" cellspacing="1">
	<tr>
		<td colspan="3">&nbsp;</td>
	</tr>
	<tr>
		<td height="20" colspan="3"><strong><font color="#000000">CMS</font><font color="#000000"><font face="Webdings">4</font>User bearbeiten</font></strong></td>
	</tr>
</table>

<form method="post" action="index.php?section=usersaction&action=edit" name="theform">
<table width="435" border="0" cellpadding="1" cellspacing="1">
	<tr valign="middle" bgcolor="<? echo $farbe1 ?>">
		<td height="25">Benutzername:</td>
		<td><input type="text" name="nick" class="cssButton" style="background-color:#F4F4F4; border: inherit; height: 15; font-size: 8pt; font-family: Tahoma" size="30" maxlength="50" value="<? echo $users->nick; ?>"></td>
	</tr>
	<tr valign="middle" bgcolor="<? echo $farbe2 ?>">
		<td>Anrede:</td>
		<td><select name="anrede" class="cssButton" style="background-color:#F4F4F4; border: inherit; height: 15; font-size: 8pt; font-family: Tahoma">
			<? if($users->sex=="Herr") { echo "<option checked> Herr <option> Frau"; }
			   		elseif($users->sex=="Frau") { echo "<option checked> Frau <option> Herr"; }
			   else { echo "<option> Nicht angegeben</option>"; } 
			?>
			</select>
		</td>
	</tr>
	<tr valign="middle" bgcolor="<? echo $farbe1 ?>">
		<td>Nachname:</td>
		<td><input type="text" name="surname" class="cssButton" style="background-color:#F4F4F4; border: inherit; height: 15; font-size: 8pt; font-family: Tahoma" size="30" maxlength="50" value="<? echo $users->surname ?>"></td>
	</tr>
	<tr valign="middle" bgcolor="<? echo $farbe2 ?>">
		<td>Vorname:</td>
		<td><input type="text" name="name" class="cssButton" style="background-color:#F4F4F4; border: inherit; height: 15; font-size: 8pt; font-family: Tahoma" size="30" maxlength="50" value="<? echo $users->name ?>"></td>
	</tr>
	<tr valign="middle" bgcolor="<? echo $farbe1 ?>">
		<td>Stra&szlig;e:</td>
		<td><input type="text" name="street" class="cssButton" style="background-color:#F4F4F4; border: inherit; height: 15; font-size: 8pt; font-family: Tahoma" size="30" maxlength="50" value="<? echo $users->street ?>"></td>
	</tr>
	<tr valign="middle" bgcolor="<? echo $farbe2 ?>">
		<td>PLZ:</td>
		<td><input type="text" name="plz" class="cssButton" style="background-color:#F4F4F4; border: inherit; height: 15; font-size: 8pt; font-family: Tahoma" size="30" maxlength="50" value="<? echo $users->plz ?>"></td>
	</tr>
	<tr valign="middle" bgcolor="<? echo $farbe1 ?>">
		<td>Ort:</td>
		<td><input type="text" name="place" class="cssButton" style="background-color:#F4F4F4; border: inherit; height: 15; font-size: 8pt; font-family: Tahoma" size="30" maxlength="50" value="<? echo $users->place ?>"></td>
	</tr>
	<tr valign="middle" bgcolor="<? echo $farbe2 ?>">
		<td>E-Mail:</td>
		<td><input type="text" name="email" class="cssButton" style="background-color:#F4F4F4; border: inherit; height: 15; font-size: 8pt; font-family: Tahoma" size="30" maxlength="50" value="<? echo $users->email ?>"></td>
	</tr>
	<tr valign="middle" bgcolor="<? echo $farbe1 ?>">
		<td>Zugriffslevel</td>
		<td><select id="axxme" name="axxme" class="cssButton" style="background-color:#F4F4F4; border: inherit; height: 15; font-size: 8pt; font-family: Tahoma">
				<option value="0" <? if(empty($usersx)) { echo $sel; } ?>>0: Deaktiviert</option>
				<option value="2" <? if($usersx==2) { echo $sel; } ?>>2: Tefpad-Kunde</option>
				<option value="3" <? if($usersx==3) { echo $sel; } ?>>3: Tefpad-Admin</option>
				<option value="4" <? if($usersx==4) { echo $sel; } ?>>4: Tefpad-Super Admin</option>
				<option value="5" <? if($usersx==5) { echo $sel; } ?>>5: Tefpad-Master Account</option>
			</select>
		</td>
	</tr>
	<tr>
		<td><input type="hidden" name="userid" value="<? echo $userid; ?>">
			<input name="ok" type="image" style="background-image:url('gfx/design/t_r11_c6.jpg'); border:0" value="" src="gfx/design/t_r11_c6.jpg" align="middle"> 
       	    <input type="reset" name="reset" style="background-image:url('gfx/design/t_r11_c7.jpg'); height:13px; width:31px; border:0" value="" src="gfx/design/t_r11_c7.jpg" align="middle">
		</td>
	</tr>
</table>
</form>
<? } } ?>