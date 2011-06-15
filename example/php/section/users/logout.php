<meta http-equiv="refresh" content="3; url=index.html">
<table width="435" cellspacing="0" cellpadding="0">
	<tr>
		<td align="center" valign="top">&nbsp;</td>
	</tr>
	<tr>
		<td><strong><font color="#000000">Logout</font></strong></td>
	</tr>
	<tr>
		<td><? $update = "UPDATE users SET laston='$time' WHERE id='$myid' LIMIT 1";
		       $sqlaction = mysql_query($update); $access==0; 
     		   session_unset();
			?>
		    Erfolgreich abgemeldet; Weiterleitung erfolgt in 3 Sekunden</td>
	</tr>
</table>