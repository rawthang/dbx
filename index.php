<?php
require_once('credentials.php');
require_once('classes/helper/Dbhelper.php');
require_once('classes/Exploit.php');
$e=new Exploid();
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