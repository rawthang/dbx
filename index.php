<?php
require_once('credentials.php');
require_once('classes/helper/Dbhelper.php');
require_once ('classes/other/geshi/geshi.php');


require_once('classes/Exploit.php');
require_once('classes/pExploit.php');
require ('classes/Platform.php');
require ('classes/pPlatform.php');

require_once 'classes/Category.php';
require_once 'classes/pCategory.php';
/**Passwörter*/
require_once 'classes/other/phpass-0.3/PasswordHash.php';
require_once 'classes/helper/Login.php';

require_once 'classes/helper/Session.php';
require_once 'classes/helper/Upload.php';
require_once 'classes/helper/Getvars.php';
require_once 'classes/helper/Formgen.php';

$dbh=new PDO(DB_DSN, DB_USR, DB_PASS);
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);		//@todo das steht nur zum üben hier
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>ue-cr3w exploits</title>
<link rel="stylesheet" media="all" href="layout.css">
</head>
<body>
	<div id="head">
		<h1>ue-cr3w exploits</h1>
		<img src="img/logo.png" alt="logo" />
	</div>
	<div>
		<!-- aus jeder kategorie 7-8 ausgeben. div drum, werte in table -->
	<?php
	$c=new pCategory();
	$c->dbh($dbh);
	$categories=$c->mysqlSelect();


	foreach ($categories as $c){


		//-----lsExploits--------------------------------------------------------------------------------------------------------------------------------------------------------------
		$e= new pExploit();
		$e->dbh($dbh);
		$exploits=$e->mySqlSelectByCategory($c->id(),0, 8);
		echo "<div class=\"exploit-category\">\n";
		echo "<h4 class=\"category-title\">{$c->name()}</h4><table>\n";
		$ctr=0;
		foreach ($exploits as $e){			
			$ctr%2==0 ? $modulo="table-gerade" : $modulo="table-ungerade";
			$f=new Formgen();

			$viewExploit=$f->getLink($e->title(), "ShowExploit.php", array("view"=> $e->id()));
			$viewByAuthor=$f->getLink($e->autor(), "index.php", array("id"=>-1));
			$viewByPlatform=$f->getLink($e->loadPlatform(), "index.php", array("id"=>-1));

			$download="";
			if ($e->file()!='')
			$download=$f->getLink('&#9112;', $e->file());
			$verified="&#10003;";
			if ($e->verified())
			$verified="&#10006;";

			echo "<tr class=\"$modulo\"><td>{$e->date()}</td><td>$download</td><td>$verified</td><td>$viewExploit</a></td><td>{$e->hits()}</td><td>$viewByPlatform</td><td>$viewByAuthor</td></tr>\n";
			$ctr++;
		}//each
		echo "</table></div>\n";
		
		//-----lsExploits--------------------------------------------------------------------------------------------------------------------------------------------------------------
	}
	?>
	</div>

</body>
</html>
