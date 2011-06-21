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
require_once 'classes/helper/Navigation.php';
$dbh=new PDO(DB_DSN, DB_USR, DB_PASS);
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);		//@todo das steht nur zum üben hier
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>ue-cr3w exploits view by category</title>
<link rel="stylesheet" media="all" href="layout.css">
</head>
<body>
	<div id="head">
		<h1>
			<a href="index.php">ue-cr3w exploits</a>
		</h1>
		<img src="img/logo.png" alt="logo" />
	</div>
	<div>

	<?php

	$sitename=pathinfo(__FILE__);
	$sitename=$sitename['basename'];
	
	$f=new Formgen();
	$get=new Getvars();
	$get->requireVar('view');
	$get->assignVar('back');
	$get->assignVar('forward');
	$get->assignVar('site');
	$get->assignVar('type');
	if($get->validateVars()){
		$e= new pExploit();
		$e->dbh($dbh);
		$n=$e->mysqlCountByCategory($get->view());															//anpassen
		

		/***************
		 * navigation *
		 **************/
		$nav=new Navigation($f);
		$nav->currentSite($get->site());
		$nav->nElements($n);
		$nav->itemsPerSite(15);
		$nav->targetUrl($sitename);									
		$nav->additionalUrlParams(array('view'=>$get->view()));
		//-----lsExploits--------------------------------------------------------------------------------------------------------------------------------------------------------------
		$e= new pExploit();
		$e->dbh($dbh);
		$c=new pCategory();
		$c->dbh($dbh);
		$c->mysqlSelect($get->view());
		$exploits=$e->mySqlSelectByCategory($get->view(),$nav->mysqlStart(), $nav->itemsPerSite());			//anpassen
		
		
		
		$viewByCategory=$f->getLink($c->name(), $sitename, array("view"=> $c->id()));	
		echo "<div class=\"exploit-category\">\n";
		echo "<h4 class=\"category-title\">$viewByCategory</h4><table>\n";
		echo "<tr><th>Date</th><th>DL</th><th>V</th><th>Description</th><th>DL's</th><th>Platform</th><th>Author</th></tr>";
		$ctr=0;
		foreach ($exploits as $e){
			$ctr%2==0 ? $modulo="table-gerade" : $modulo="table-ungerade";


			$viewExploit=$f->getLink($e->title(), "ViewExploit.php", array("view"=> $e->id()));
			$viewByAuthor=$f->getLink($e->autor(), "ViewByAuthor.php", array("view"=>1));
			$viewByPlatform=$f->getLink($e->loadPlatform(), "ViewByPlatform.php", array("view"=>$e->platform()));

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
	}
	//-----lsExploits--------------------------------------------------------------------------------------------------------------------------------------------------------------
	?>

		<div class="list-navigation">
		<?php echo $nav;?>
		</div>
	</div>
</body>
</html>