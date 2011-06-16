<td width="164" height="67" valign="top" background="gfx/design/f_r1_c12.jpg">
	<table width="164" border="0" cellspacing="0" cellpadding="0">
		<tr> 
        	<td class="etable" height="10">&nbsp;</td>
        </tr>
        <tr> 
            <td>
<?php
if($access<1) { 
?>
				<form method="post" action="?section=login">
				<table class="etable" width="164" border="0" cellspacing="0" cellpadding="0">
                	<tr> 
                    	<td width="115"><input id="input" type="text" name="userlg" style="background: none; color:#DCD0D0; background-color:#8A005E; background-repeat: no-repeat; float: left; border: 1px solid #320809; width: 113; height: 14" size="14" maxlength="30" onfocus="if(this.value=='') this.value=''" onblur="if(this.value=='')this.value=''" value=""> 
                        </td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr> 
 	                   <td height="5" class="etable" colspan="2">&nbsp;</td>
                    </tr>
                    <tr> 
                       <td><input id="input" type="password" name="pwlg" style="background: none; color:#DCD0D0; background-color:#8A005E; background-repeat: no-repeat; float: left; border: 1px solid #320809; width: 113; height: 14" onfocus="if(this.value=='') this.value=''" onblur="if(this.value=='')this.value=''" value=""></td>
                       <td align="center"><input name="imageField" type="image" style="background: none; border: none;" src="gfx/design/login.gif" width="28" height="13" border="0"></td>
                    </tr>
              </table>
		</td>
	</tr>
    <tr> 
    	<td class="etable" height="7">&nbsp;</td>
	</tr>
	<tr>
    	<td>
			<table width="164" border="0" cellspacing="0" cellpadding="0">
            	<tr>
                	<td width="87" height="17">
						<table width="87" border="0" cellspacing="0" cellpadding="0">
                        	<tr>
                            	<td class="etable" height="9"><a href="?section=registrieren"><img src="gfx/design/d_r1_c1.gif" width="87" height="9" border="0"></a></td>
							</tr>
                            <tr>
                            	<td class="etable" height="8"><a href="?section=lost_password"><img src="gfx/design/d_r3_c1.gif" width="87" height="8" border="0"></a></td>
                            </tr>
                        </table>
					</td>
</form>
<?php
} 
else { 
?>
				<table class="etable" width="164" border="0" cellspacing="0" cellpadding="0">
                	<tr> 
                    	<td><? $sql3 = "SELECT * FROM cmd_user WHERE id='$myid' LIMIT 1";

										   $data = mysql_query($sql3, $db);
										   while ($myhome = mysql_fetch_object ($data)) { ?>Eingeloggt als <img src="gfx/design/arrow.gif" border="0"> <b><? echo "$myhome->nick" ?></b><? } ?></td>
                    </tr>
                    <tr> 
 	                   <td></td>
                    </tr>
              </table>
		</td>
	</tr>
    <tr> 
    	<td class="etable" height="7">&nbsp;</td>
	</tr>
	<tr>
    	<td>
			<table width="164" border="0" cellspacing="0" cellpadding="0">
            	<tr>
                	<td width="87" height="17">
						<table width="87" border="0" cellspacing="0" cellpadding="0">
                        	<tr>
                            	<td class="etable" height="9" colspan="2"><img src="gfx/design/arrow.gif" border="0"> <a href="?section=home">Home</a></td>
							</tr>
							<tr>
                            	<td class="etable" height="9" colspan="2"><img src="gfx/design/arrow.gif" border="0"> <a href="?section=logout">Logout</a></td>
							</tr>
                        </table>
					</td>
<?php } ?>							  