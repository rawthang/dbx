<table width="435" cellspacing="0" cellpadding="0">
	<tr>
		<td align="center" valign="top">&nbsp;</td>
	</tr>
	<tr>
		<td><strong><font color="#000000">Passwort verloren?</font></strong></td>
	</tr>
</table>
<table width="435" cellspacing="0" cellpadding="0">	
	<tr>
		<td><? $email = $_POST["email"]; $foundemail = 0;
			   if(empty($email)) { 
			?>
			E-Mail Textfeld ausf&uuml;llen und ins Postfach schauen!
			<? } 
				else {
				$sql1 = "SELECT * FROM users WHERE email='$email' LIMIT 1";
				$data = mysql_query($sql1, $db);
				while ($users = mysql_fetch_object ($data)) {
				$foundemail = 1; 
				$mailme = "$users->email";
				$nick = $users->nick;
				mt_srand((double)microtime()*10);
				$randpw = mt_rand();
				$password = substr ("$randpw", 3, 5);
				$md5pw = md5($password);
				$edit = "UPDATE users SET password='$md5pw' WHERE email='$email'";
				$sqlaction = mysql_query($edit);
				$org = "Passwort verloren";	
				include "php/function/emails.php"; pwmail($org, $ip, $nick, $password, $email, $pwdmail);
				print "Das Passwort wurde soeben neugeneriert - schauen Sie nach!";
			    }
				$msg = "Angegebene e-Mail im System nicht gefunden!";
				
				if($foundemail!=1) { print "<br>Folgende Fehler sind aufgetreten:<br><br><strong><font color=\"#990000\">$msg"; } 
				} 
				?>
		</td>
	</tr>
</table>
<?
if(empty($email) OR $error!=0) { ?>
<br>
<form method="post" action="index.php?section=lost_password">
<table border="0" cellspacing="1" cellpadding="0">
	<tr>
	    <td width="65" height="15" background="gfx/design/t_r7_c2.jpg">&nbsp;</td>
        <td><font face="Verdana" style="font-size: 8pt"><input type="text" name="email" style="background-image:url('gfx/design/t_r7_c4.jpg'); 
		background-repeat: no-repeat; float: right; border: inherit; width: 133; height: 15; font-size: 8pt; font-family: Tahoma" 
		class="cssButton" size="0" maxlength="50" onfocus="if(this.value=='E-Mail') this.value=''" onblur="if(this.value=='')this.value='E-Mail'" value="<? echo $email; ?>"></font></td>
	</tr>
</table>
	<table width="198" border="0" cellpadding="0" cellspacing="1" class="balken">
    	<tr>
        	<td class="balken" height="6">&nbsp;</td>
        </tr>
        <tr>
            <td height="13" align="right"><input name="ok" type="image" style="background-image:url('gfx/design/t_r11_c6.jpg'); border:0" value="" src="gfx/design/t_r11_c6.jpg" align="middle"> 
       	<input type="reset" name="reset" style="background-image:url('gfx/design/t_r11_c7.jpg'); height:13px; width:31px; border:0" value="" src="gfx/design/t_r11_c7.jpg"></td>
        </tr>
    </table>
</form>
<? } ?>