<?
if($access>=5) { 
?>
<table width="435" cellspacing="0" cellpadding="0">
	<tr>
		<td align="center" valign="top">&nbsp;</td>
	</tr>
	<tr>
		<td align="left" valign="top"><strong><font color="#000000">CMS<font face="Webdings">4</font>User &Uuml;bersicht</font></strong></td>
	</tr>
</table>

<table width="435" cellspacing="0" cellpadding="0">
	<tr>
			<td width="10" valign="top"></td>
			<td width="385" valign="top"><table width="427" cellpadding="1" cellspacing="1">
				<tr>
					<td width="421" valign="top">
						<table width="423" cellpadding="1" cellspacing="1">
							<tr>
								<td><strong>Benutzername</strong></td>
								<td><strong>Zugriffslevel</strong></td>
								<td><strong>Zuletzt hier</strong></td>
							</tr>
							<?
								$sql = "SELECT * FROM users ORDER BY nick DESC";
								$data = mysql_query($sql, $db);
								while ($users = mysql_fetch_object ($data)) { 
							?>
							<tr>
								<td><? print "<a href=\"index.php?section=usersedit&userid=$users->id\">$users->nick</a>"; ?></td>
								<td><? echo $users->access; ?></td>
								<td><? $date = date("d.m.y",$users->laston); $day = date("H:i",$users->laston); print "$date - $day"; ?></td>
							</tr>
							<? } ?>
					</table>
				</td>
			</tr>
		</table>
	</td>
	</tr>
</table>
<? 
}
else { echo $noacc; } 
?>