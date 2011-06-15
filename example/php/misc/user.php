<?php
$empty_user = 0;
$last_five = $time - 300;
$sql_user = "SELECT `id`,`nick` FROM `users` WHERE `laston` >= '$last_five' ORDER BY `laston` DESC LIMIT 4";
$data_user = mysql_query($sql_user, $db);

while($next_user = mysql_fetch_object ($data_user)) { 
	$empty_user++;
	$next_id=$next_user->id;
	$next_name=$next_user->nick;
	print "<a href=\"index.php?show=users&userid=$next_id\">$next_name</a>\n<br>"; 
} 

if(empty($empty_user)) { print "Eingegebener Benutzer existiert nicht!"; }
?>