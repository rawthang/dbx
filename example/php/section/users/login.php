<?php
if($loggedin) {
    $username='<b>'.getnickname($userID).'</b>';;
    if(isanyadmin($userID)) $admin='&nbsp;&nbsp;<img height=7 src="system/images/arrow.gif" width=9> <a href="acentre.php" target="_blank">Admincenter</a>';
    else $admin='';

   
    eval ("\$logged = \"".gettemplate("logged")."\";");
    echo $logged;
}

else {
        eval ("\$loginform = \"".gettemplate("login")."\";");
	echo $loginform;
}
?>