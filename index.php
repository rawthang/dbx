<?php
require_once('credentials.php');
require_once('classes/helper/Dbhelper.php');
require_once('classes/Exploit.php');
require_once ('classes/other/geshi/geshi.php');
require ('classes/Platform.php');
require ('classes/pPlatform.php');

require_once 'classes/Category.php';

/**Passwörter*/
require_once 'classes/other/phpass-0.3/PasswordHash.php';
require_once 'classes/helper/Login.php';
require_once 'classes/helper/Session.php';

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
		<div class="exploit-">
			<h3 class="category-title">Remote Exploits</h3>
			<table>
				<tr><th>Date</th><th>DL</th><th>V</th><th>Description</th><th>DL's</th><th>Platform</th><th>Author</th></tr>				
				<tr><td>2011-06-20</td><td>&#9112;</td><td>&#10006;</td><td><a href="index.php">Mozilla Firefox "nsTreeRange" Dangling Pointer Exploit</a></td><td>200</td><td><a href="index.php">windows</a></td><td><a href="index.php">anonymous</a></td></tr>
				<tr><td>2011-06-20</td><td>&#9112;</td><td>&#10006;</td><td><a href="index.php">DATAC RealWin SCADA Server 2 On_FC_CONNECT_FCS_a_FILE Buffer Overflow</a></td><td>1580</td><td><a href="index.php">linux</a></td><td><a href="index.php">anonymous</a></td></tr>
				<tr><td>2011-06-20</td><td></td><td>&#10003;</td><td><a href="index.php"> Black Ice Fax Voice SDK v12.6 Remote Code Execution Exploit</a></td><td>2</td><td><a href="index.php">schice</a></td><td><a href="index.php">anonymous</a></td></tr>			
				<tr><td>2011-06-20</td><td>&#9112;</td><td>&#10006;</td><td><a href="index.php"> Black Ice Cover Page SDK insecure method DownloadImageFileURL() exploit</a></td><td>14</td><td><a href="index.php">mac</a></td><td><a href="index.php">anonymous</a></td></tr>
				<tr><td>2011-06-20</td><td>&#9112;</td><td>&#10006;</td><td><a href="index.php">MS11-050 IE mshtml!CObjectElement Use After Free</a></td><td>10000</td><td><a href="index.php">windows</a></td><td><a href="index.php">anonymous</a></td></tr>
				<tr><td>2011-06-20</td><td>&#9112;</td><td>&#10006;</td><td><a href="index.php">  IBM Tivoli Endpoint Manager POST Query Buffer Overflow</a></td><td>250</td><td><a href="index.php">windows</a></td><td><a href="index.php">anonymous</a></td></tr>
				<tr><td>2011-06-20</td><td>&#9112;</td><td>&#10006;</td><td><a href="index.php">Mozilla Firefox "nsTreeRange" Dangling Pointer Exploit</a></td><td>128</td><td><a href="index.php">windows</a></td><td><a href="index.php">anonymous</a></td></tr>
				<tr><td>2011-06-20</td><td></td><td>&#10003;</td><td><a href="index.php">Simple web-server 1.2 Directory Traversal</a></td><td>47</td><td><a href="index.php">nAN</a></td><td><a href="index.php">anonymous</a></td></tr>


			</table>
		</div>
		<div class="exploit-">
			<h4 class="category-title">Web Applications</h4>
		
		</div>
		<div class="exploit-">
			<h4 class="category-title">Local Exploits</h4>
	
		</div>
		<div class="exploit-">
			<h4 class="category-title">Shellcode</h4>
	
		</div>
		<div class="exploit-">
			<h4 class="category-title">Papers</h4>

		</div>
		<div class="exploit-">
			<h4 class="category-title">DoS/PoC</h4>

		</div>

	</div>

</body>
</html>
