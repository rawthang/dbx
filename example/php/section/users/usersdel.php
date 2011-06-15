<?
if($access>=5) { 
?>
<table width="435" border="0" cellpadding="0" cellspacing="1">
	<tr>
		<td colspan="3">&nbsp;</td>
	</tr>
	<tr>
		<td height="20" colspan="3"><strong><font color="#000000">CMS<font face="Webdings">4</font>User entfernen </font></strong></td>
	</tr>
</table>

<table width="435" border="0" cellpadding="0" cellspacing="1">
	<tr>
		<td><strong>Benutzername</strong></td>
		<td><strong>Zugriffslevel</strong></td>
		<td><strong>Zuletzt hier</strong></td>
	</tr>
<? 
$sql="SELECT * FROM users ORDER BY id DESC";
$data=mysql_query($sql, $db);
while ($users = mysql_fetch_object ($data)) { 
?>
	<tr>
		<td><? print "<a href=\"index.php?section=usersaction&action=delete&userid=$users->id\">$users->nick</a>"; ?></td>
		<td><? echo $users->access; ?></td>
		<td><? $date = date("d.m.y",$users->laston);
			   $day = date("H:i",$users->laston);
			   print "$date - $day"; 
			?>
		</td>
	</tr>
<? } ?>
</table>
<? } else { echo $noacc; } ?>