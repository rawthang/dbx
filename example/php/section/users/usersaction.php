<?
if($access<5) { echo $noacc; } 

else { 
$error=0; 
?>
<table width="435" border="0" cellpadding="0" cellspacing="1">
	<tr>
		<td colspan="3">&nbsp;</td>
	</tr>
	<tr>
		<td height="20" colspan="3"><strong><font color="#000000">CMS</font><font color="#000000"><font face="Webdings">4</font>User bearbeiten</font></strong></td>
	</tr>
</table>

<table width="435" border="0" cellpadding="0" cellspacing="1">
	<tr>
		<td>
<?
$action = $_REQUEST["action"];
$userid = $_REQUEST["userid"];
$anrede = $_POST["anrede"];
$surname = $_POST["surname"];
$name = $_POST["name"];
$street = $_POST["street"];
$plz = $_POST["plz"];
$place = $_POST["place"];
$nick = $_POST["nick"];
$axxme = $_POST["axxme"];
$email = $_POST["email"];
if(!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@([0-9a-z](-?[0-9a-z])*\.)+[a-z]{2}([zmuvtg]|fo|me)?$",$email) AND $action!="delete") { $error++; $msg = "Mail ist ung&uuml;ltig"; }

if($action=="add") {

if(empty($error)) {
$pool = "qwertzupasdfghkyxcvbnm";
$pool .= "23456789";
$pool .= "WERTZUPLKJHGFDSAYXCVBNM";

srand ((double)microtime()*1000000);
for($index = 0; $index < 5; $index++)
{ $password .= substr($pool,(rand()%(strlen ($pool))), 1); }

$md5pw = md5($password);

$add = "INSERT INTO users (nick, name, surname, sex, access, password, register, laston, plz, place, email, street) 
					VALUES
	  					  ('$nick', '$name', '$surname', '$sex', '2', '$md5pw', '$time', '$time', '$plz', '$place', '$email', '$street')";

$sqlaction = mysql_query($add); 

include "php/function/emails.php"; regmail($ip, $nick, $password, $email, $regmail);
				
print "Der Vorgang wurde erfolgreich abgeschlossen, das Passwort erh&auml;lt $nick per e-Mail.";
}

else { print "<strong>Fehler:</strong> $msg"; }
} 

if($action=="edit") {

if(empty($error)) {
$edit = "UPDATE users SET nick = '$nick', name = '$name', surname = '$surname', sex = '$anrede', access = '$axxme', plz = '$plz', place = '$place', email = '$email', street = '$street' WHERE id = '$userid'";
$sqlaction = mysql_query($edit);	
print "Der Vorgang wurde erfolgreich abgeschlossen."; 
} 

else { print "<strong>Fehler:</strong> $msg"; } 
}

if ($action=="delete") {
$delete = "DELETE FROM users WHERE id='$userid'";
$sqlaction = mysql_query($delete);
print "Der Vorgang wurde erfolgreich abgeschlossen."; 
} 
?>
		</td>
	</tr>
</table>
<? } ?>