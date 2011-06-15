<?php
require_once('credentials.php');
require_once('classes/helper/Dbhelper.php');
require_once('classes/Exploit.php');
require_once ('classes/other/geshi/geshi.php');
require ('classes/Platform.php');
require ('classes/pPlatform.php');

/**Passwörter*/
require_once 'classes/other/phpass-0.3/PasswordHash.php';
require_once 'classes/helper/Login.php';
require_once 'classes/helper/Session.php';

/**Beispiel objekt erzeugen
 * Später wird ein Objekt vom Typ PExploit instanziiert und $obj->mysqlSelect($id) aufgerufen
 */
$e=new Exploit();
$e->title('Geshi Verwenden');
$e->autor('fingerb&auml;ng');
$e->content('
// Include the GeSHi library
//
include_once \'geshi.php\';

//
// Define some source to highlight, a language to use
//and the path to the language files
//
				 
$source = \'$foo = 45;
for ( $i = 1; $i < $foo; $i++ )
{
	echo "$foo\n";
	--$foo;
}\';
$language = \'php\';
				 
//
// Create a GeSHi object
//
				 
$geshi = new GeSHi($source, $language);
				 
//
// And echo the result!
//
echo $geshi->parse_code();');

$e->codeLanguage('php');
$e->verified(true);
$e->file('/bin/cp');
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
	<?php echo "Ausgabe Platform----------------------------------------------------------------------------------------------------------------------------------------------------<p>";?>		
	<?php 
	//das hier können wir für die listbox bei der eingabemaske für exploits verwenden :)
	
	$p = new pPlatform();
	$dbh=new PDO(DB_DSN, DB_USR, DB_PASS);
	//$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);		//@todo das steht nur zum üben hier

	$p->dbh($dbh);
	//alle ausgeben
	$platforms=$p->mysqlSelect();	
	foreach($platforms as $p_db)
		echo " $p_db";
	
	echo "<h5>Element mit id 1 ausgeben + löschen -  klappt nur einmal</h5>"; 
	
	$p->mysqlSelect(1);		
	echo $p;
	echo $p->mysqlDelete(1);
	echo "<h5>Element mit id 2 ändern</h5>";		
	$p->mysqlSelect(2);
	echo $p.'<p>';
	
	$p->name('alfons68');
	$p->mysqlUpdate();
	$p->mysqlSelect(2);	
	echo $p.'<p>';
		
	$p->name('Spielautomat');
	$p->mysqlUpdate();
	$p->mysqlSelect(2);	
	echo $p.'<p>';
	?>
	<p>
	<?php echo "Ausgabe Platform----------------------------------------------------------------------------------------------------------------------------------------------------<p>";?>
	
	<!--  beispielausgabe -->
	<!-- wenn die ordentlich ist kann man sie auch in die Klasse packen.... -->	
	<?php echo "Ausgabe Exploit----------------------------------------------------------------------------------------------------------------------------------------------------<p>";?>
	<div class="exploit">
	<div class="exploit-title"><?php echo $e->title();?></div>
	<div class="exploit-autor">Author: <?php echo $e->autor();?></div>
	<div class="exploit-date">Date: <?php echo $e->date();?></div>
	<div class="exploit-hits">Views: <?php echo $e->hits(); ?></div>	
	<div class="exploit-content"><?php echo $e->getFormatedCode();?></div>
	<div class="exploit-verified">Verified: <?php echo $e->verified();?></div>
	<div class="exploit-download">download: <a href="<?php echo $e->file()?>">here</a></div>
	</div>
		<?php echo "Ausgabe Exploit----------------------------------------------------------------------------------------------------------------------------------------------------<p>";?>
	<!--  beispielausgabe -->
		<h2>new exploit</h2>
		<form id="newexploit" action="index.php" enctype="multipart/form-data"
			method="get">
			<fieldset>
				<ul>
					<li>
						<label for="name">name</label>
						<input id="name" type="text" size="" name="newteam">
					</li>
					<li>
						<label for="category">category</label>				
						<select name="category" id="category"  >
							<option value="1">item 1</option>
							<option value="2">item 2</option>
							<option value="3">item 3</option>
							<option value="4">item 4</option>							
					</select>
					</li>					
					<li>
						<label for="description">description</label> 
						<textarea id="description" rows="40" cols=70" name="description"></textarea>
					</li>
					
					<li>
						<label for="file">from PC </label>
						<input size="36" id="local" type="file" name="local"> 
					</li>
					<li>
						<label for="remote">from url</label> 
						<input id="remote" type="text" size="37" name="remote">
					</li>
					<li>
						<label for="recaptcha_challenge_field">captcha</label>
						<script type="text/javascript" src="http://www.google.com/recaptcha/api/challenge?k=6Lf3PMUSAAAAAFacL00Ry5v9E3EJqSKVch4bsuv9"></script>
						<noscript>
							<iframe
								src="http://www.google.com/recaptcha/api/noscript?k=6Lf3PMUSAAAAAFacL00Ry5v9E3EJqSKVch4bsuv9"
								height="300" width="500" frameborder="0"></iframe>
							<br>
							<textarea name="recaptcha_challenge_field" rows="3" cols="40"></textarea>
							<input type="hidden" name="recaptcha_response_field"
								value="manual_challenge">
						</noscript>
					</li>
				</ul>
			</fieldset>
			<fieldset>
				<button type="submit" name="submit" value="true">anlegen</button>
			</fieldset>
		</form>
	</div>
</body>
</html>
