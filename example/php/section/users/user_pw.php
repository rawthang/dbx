<?
if($access>=2) { 
?>
<table width="435" border="0" cellpadding="0" cellspacing="1">
	<tr>
		<td colspan="3">&nbsp;</td>
	</tr>
	<tr>
		<td height="20" colspan="3"><strong><font color="#000000">Passwort &auml;ndern </font></strong></td>
	</tr>
</table>

<form method="post" action="index.php?section=user_pw_acco">
<table width="435" border="0" cellpadding="0" cellspacing="1">
	<tr>
		<td width="120" height="30">Passwort:</td>
		<td height="30"><input type="password" name="pw" maxlength="12" size="30" class="cssButton" style="background-color:#F4F4F4; border: inherit; width: 133; height: 15; font-size: 8pt; font-family: Tahoma"></td>
	</tr>
	<tr>
		<td width="120" height="30">Neues Passwort:</td>
		<td height="30"><input type="password" name="pwn1" maxlength="12" size="30" class="cssButton" style="background-color:#F4F4F4; border: inherit; width: 133; height: 15; font-size: 8pt; font-family: Tahoma"></td>
	</tr>
	<tr>
		<td width="120" height="30">Wiederholen:</td>
		<td height="30"><input type="password" name="pwn2" maxlength="12" size="30" class="cssButton" style="background-color:#F4F4F4; border: inherit; width: 133; height: 15; font-size: 8pt; font-family: Tahoma"></td>
	</tr>	
</table>
<table width="435" border="0" cellpadding="0" cellspacing="1">
	<tr>
		<td height="30" colspan="2">&nbsp;</td>
		<td width="122" height="30"><div align="right">
			<input type="image" name="ok" src="gfx/design/t_r11_c6.jpg" style="background-image:url('gfx/design/t_r11_c6.jpg');" value="-">
		</div></td>
	    <td width="178" height="30">&nbsp;</td>
	</tr>
</table>
</form>
<? } ?>