<table width="435" cellspacing="0" cellpadding="0">
	<tr>
		<td align="center" valign="top">&nbsp;</td>
	</tr>
	<tr>
		<td width="50" align="left" valign="top"><strong><font color="#000000">Registrierung</font></strong></td>
	</tr>
</table>

<table width="435" cellspacing="0" cellpadding="0">
	<tr>
		<td><?php  
				$nick = $_POST["nick"]; 
				$email = $_POST["email"]; 
				
				if(empty($nick) AND empty($email)) { 
			?>
				Bevor Sie direkt loslegen k&ouml;nnen, m&uuml;ssen Sie sich  kurz registrieren. Diese Registierung ist kostenlos und bietet Ihnen einen vollen Umfang, sowie die volle Leistung, unseres Services.				
				<?php 
				} 
				else { 
				$error = 0;
				
				if (empty($nick)) { 
				$error++; 
				$msg = "$msg Keinen Benutzernamen angegeben<br>"; 
				} 
				
				else {
				$sql = "SELECT nick, id FROM users WHERE nick='$nick' LIMIT 1";
				$data = mysql_query($sql, $db);
				
				while ($srcnick = mysql_fetch_object ($data)) { 
				$error++; 
				$msg = "$msg Benutzername ist schon im System registriert<br>"; 
				} 
				
				$nick2 = str_replace("","",$nick); $nickchars=strlen($nick2);
				
				if($nickchars<6) { 
				$error++;
				$msg = "$msg Der Benutzername, den Sie angegeben haben, ist k&uuml;rzer als sechs Zeichen<br>"; 
				} 
				
				}
				
				if (empty($email)) { 
				$error++; 
				$msg = "$msg Keine e-Mail Adresse angegeben<br>"; 
				} 
				
				else {
				$sql2 = "SELECT email, id FROM users WHERE email='$email' LIMIT 1";
				$data2 = mysql_query($sql2, $db);
				while ($srcemail = mysql_fetch_object ($data2)) { 
				$error++; 
				$msg = "$msg e-Mail Adresse ist schon im System registriert<br>"; 
				} 
				
				if(!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@([0-9a-z](-?[0-9a-z])*\.)+[a-z]{2}([zmuvtg]|fo|me)?$",$email)) { 
				$error++;
				$msg = "$msg Die e-Mail Adresse ist ung&uuml;ltig<br>"; } 
				}
				
				if(!empty($error)) { print "<br>Folgende Fehler sind aufgetreten:<br><br><strong><font color=\"#990000\">$msg"; }
				
				else {
				$pool = "qwertzupasdfghkyxcvbnm";
				$pool .= "23456789";
				$pool .= "WERTZUPLKJHGFDSAYXCVBNM";

				srand ((double)microtime()*1000000);
				for($index = 0; $index < 5; $index++)
				{
				$password .= substr($pool,(rand()%(strlen ($pool))), 1);
				}
				
				$md5pw = md5($password);
				
				$add = "INSERT INTO users (nick, name, surname, sex, access, password, register, laston, plz, place, email, street) 
						VALUES
						('$nick', '$name', '$surname', '$sex', '2', '$md5pw', '$time', '$time', '$plz', '$place', '$email', '$street')";
				$sqlaction = mysql_query($add); 
				include "php/function/emails.php"; regmail($ip, $nick, $password, $email, $regmail);
				
				print "Der Vorgang wurde erfolgreich abgeschlossen, das Passwort erhalten Sie gerade per e-Mail.";
				} 
				
				} 
				?>
		</td>
	</tr>
</table>
<?php if(empty($nick) OR empty($email) OR !empty($error)) { ?>
<br>
<form method="post" action="index.php?section=registrieren" name="theform">
<table width="435" border="0" cellspacing="1" cellpadding="1">
    <tr>
        <td width="21%" height="25">Benutzername:</td>
        <td height="25" colspan="2"><input type="text" name="nick" style="background-color:#F4F4F4; border: inherit; width: 133; height: 15; font-size: 8pt; font-family: Tahoma" class="cssButton" size="0" maxlength="15"></td>		
	</tr>
	<tr>
    	<td width="21%" height="25">E-Mail:</td>
		<td height="25" colspan="2"><input type="text" name="email" style="background-color:#F4F4F4; border: inherit; width: 133; height: 15; font-size: 8pt; font-family: Tahoma" class="cssButton" size="0" maxlength="50"></td>
    </tr>
	<tr>
    	<td width="21%" height="25">Geschlecht:</td>
		<td height="25" colspan="2"><select name="sex" style="background-color: #F4F4F4; border: inherit; height: 15; font-size: 8pt; font-family: Tahoma" class="cssButton" size="0" maxlength="15">
  		    	<option checked> Herr 
				<option> Frau
	        </select></td>			
    </tr>
	<tr>
    	<td width="21%" height="25">Vorname:</td>
		<td height="25" colspan="2"><input type="text" name="name" style="background-color:#F4F4F4; border: inherit; width: 133; height: 15; font-size: 8pt; font-family: Tahoma" class="cssButton" size="0" maxlength="15"></td>
    </tr>
	<tr>
    	<td width="21%" height="25">Nachname:</td>
		<td height="25" colspan="2"><input type="text" name="surname" style="background-color:#F4F4F4; border: inherit; width: 133; height: 15; font-size: 8pt; font-family: Tahoma" class="cssButton" size="0" maxlength="25"></td>
    </tr>
	<tr>
    	<td width="21%" height="25">Stra&szlig;e:</td>
		<td height="25" colspan="2"><input type="text" name="street" style="background-color:#F4F4F4; border: inherit; width: 133; height: 15; font-size: 8pt; font-family: Tahoma" class="cssButton" size="0" maxlength="50"></td>
    </tr>
	<tr>
    	<td width="21%" height="25">PLZ:</td>
		<td height="25" colspan="2"><input type="text" name="plz" style="background-color:#F4F4F4; border: inherit; width: 133; height: 15; font-size: 8pt; font-family: Tahoma" class="cssButton" size="0" maxlength="5"></td>
    </tr>
	<tr>
    	<td width="21%" height="25">Ort:</td>
		<td height="25" colspan="2"><input type="text" name="place" style="background-color:#F4F4F4; border: inherit; width: 133; height: 15; font-size: 8pt; font-family: Tahoma" class="cssButton" size="0" maxlength="20"></td>
    </tr>
    <tr>
       <td valign="baseline">&nbsp;</td>
       <td width="31%" align="right" valign="baseline"><input name="ok" type="image" style="background-image:url('gfx/design/t_r11_c6.jpg'); border:0" value="" src="gfx/design/t_r11_c6.jpg" align="middle"> 
       									 <input type="reset" name="reset" style="background-image:url('gfx/design/t_r11_c7.jpg'); height:13px; width:31px; border:0" value="" src="gfx/design/t_r11_c7.jpg"></td>
       <td width="48%" valign="baseline">&nbsp;</td>
    </tr>
</table>
</form>
<?php } ?>