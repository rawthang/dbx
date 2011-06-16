<?php
function redirect($url, $info) {
    echo'<meta http-equiv="refresh" content="1;URL='.$url.'"><br>'.$info.'<br><br>';
}

function nl2brPre($string)
{
    // First, check for <pre> tag
    if(strpos($string, "<pre>") === false)
    {
        return nl2br($string);
    }

    // If there is a <pre>, we have to split by line
    // and manually replace the linebreaks with <br />
    $strArr=explode("\n", $string);
    $output="";
    $preFound=3;

    // Loop over each line
    foreach($strArr as $line)
    {    // See if the line has a <pre>. If it does, set $preFound to true
        if(strpos($line, "<pre>") === true)
        {
            $preFound=1;
        }
        elseif(strpos($line, "</pre>"))
        {
            $preFound=2;
        }

        // If we are in a pre tag, just give a \n, else a <br />
        switch($preFound) {
            case 1: // found a <pre> tag, close the <p> element
                $output .= "</p>\n" . $line . "\n";
                break;
            case 2: // found the closing </pre> tag, append a newline and open a new <p> element
                $output .= $line . "\n<p>";
                $preFound = 3; // switch to normal behaviour
                break;
            case 3: // simply append a <br /> element
                $output .= $line . "<br />";
                break;
        }
    }

    return $output;
}

function nl2br2($string)
{
    $string = str_replace(array("\r\n", "\r", "\n"), '<br />', $string);
    return $string;
}  

mysql_query('set character set utf8;');

$action = isset($_GET["action"]) ? $_GET["action"] : null;

if ($action == "delete") { 
		safe_query("DELETE FROM ".PREFIX."blog WHERE id='$id'");
		header("Location: bloggy.php");
}

	elseif($action == "new") {
		$newsrubrics=safe_query("SELECT id, rubric FROM ".PREFIX."blog_rubrics ORDER BY rubric");
		while($dr=mysql_fetch_array($newsrubrics)) { $rubrics.='<option value="'.$dr[id].'">'.$dr[rubric].'</option>'; }

		$url1="http://";
		$url2="http://";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Lars Brokmeier | Portfolio</title>
<meta name="keywords" content="IT, Information, Technology, Technologie, Business, Development, Website development, Web Entwicklung" />
<link href="styles/reset.css" rel="stylesheet" type="text/css" />
<link href="styles/blog.css" rel="stylesheet" type="text/css" />
<script SRC="js/ckeditor/ckeditor.js" type="text/javascript" ></script>
<script SRC="js/ckeditor/sample.js" type="text/javascript" ></script>
<script type="text/javascript" >
	function MM_confirm(msg, url) {
		if(confirm(msg)) location.replace(url);
	}
</script>
</head>
<body>
<form action="bloggy.php?action=save" method="post">
  <table width="100%" border="0" cellspacing="4" cellpadding="4">
    <tr>
      <td align="center">New post</td>
    </tr>
    <tr>
      <td>
        <table width="100%" border="0" cellspacing="4" cellpadding="4">
          <tr>
            <td><b>Rubric: </b><select name="rubric"><?php echo $rubrics; ?></select></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td width="50%"><b>Headline: <input name="headline" type="text" value="" size="80" maxlength="67"></b></td>
          </tr>
          <tr>
            <td><textarea cols="80" id="editor1" name="editor1" rows="10"></textarea>
<script type="text/javascript">
	//<![CDATA[
	CKEDITOR.replace( 'editor1',{fullPage : false});
	//]]>
</script></td>
          </tr>
        </table>
        <table width="100%" border="0" cellpadding="4" cellspacing="4">
          <tr>
            <td valign="top">Link 1:
              <input name="link1" type="text" value="" maxlength="8">
              <input name="url1" type="text" value="">
              Link 2:
              <input name="link2" type="text" value="" maxlength="8">
              <input name="url2" type="text" value=""></td>
            <td valign="top"><br></td>
          </tr>
          <tr align="right">
            <td colspan="2" align="left">&nbsp;</td>
          </tr>
          <tr align="right">
            <td colspan="2" align="left"><input type="submit" name="save" value="Save news"></td>
          </tr>
      </table></td>
    </tr>
  </table>
</form>
</body>
</html>
<?php
}

	elseif($action=="save") {
		$time = time();
		safe_query("INSERT INTO ".PREFIX."blog (date, rubric, headline, content, url1, link1, url2, link2) VALUES ('$time', '$rubric', '$headline', '$editor1', '$url1', '$link1', '$url2', '$link2')");

		echo'<meta http-equiv="refresh" content="1; url=bloggy.php">';
	}

	elseif($action=="editsave") {
		$time = time();
		safe_query("UPDATE ".PREFIX."blog SET
			date = '$time',
			rubric = '$rubric',
			headline = '$headline',
			content = '$editor1',
			url1 = '$url1',
			link1 = '$link1',
			url2 = '$url2',
			link2 = '$link2'
			WHERE id = '$id'");

		echo'<meta http-equiv="refresh" content="1; url=bloggy.php">';
	}

	elseif($action=="edit") {
		$ds=mysql_fetch_array(safe_query("SELECT * FROM ".PREFIX."blog WHERE id='$id'"));
		$headline=$ds[headline];
		$message=$ds[content];
	
		$newsrubrics=safe_query("SELECT * FROM ".PREFIX."blog_rubrics ORDER BY rubric");
		while($dr=mysql_fetch_array($newsrubrics)) {
			if($ds[rubric]==$dr[id]) $rubrics.='<option value="'.$dr[id].'" selected>'.$dr[rubric].'</option>';
			else $rubrics.='<option value="'.$dr[id].'">'.$dr[rubric].'</option>';
		}

		$link1=$ds['link1'];
		$link2=$ds['link2'];

		$url1="http://";
		$url2="http://";

		if($ds['url1']!="http://") $url1=$ds['url1'];
		if($ds['url2']!="http://") $url2=$ds['url2'];	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Lars Brokmeier | Portfolio</title>
<meta name="keywords" content="IT, Information, Technology, Technologie, Business, Development, Website development, Web Entwicklung" />
<link href="styles/reset.css" rel="stylesheet" type="text/css" />
<link href="styles/blog.css" rel="stylesheet" type="text/css" />
<script SRC="js/ckeditor/ckeditor.js" type="text/javascript" ></script>
<script SRC="js/ckeditor/sample.js" type="text/javascript" ></script>
</head>
<body>
<form action="bloggy.php?action=editsave" method="post">
  <table width="100%" border="0" cellspacing="4" cellpadding="4">
    <tr>
      <td align="center">Edit post</td>
    </tr>
    <tr>
      <td>
        <table width="100%" border="0" cellspacing="4" cellpadding="4">
          <tr>
            <td><b>Rubric: </b><select name="rubric"><?php echo $rubrics; ?></select></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td width="50%"><b>Headline: <input name="headline" type="text" value="<?php echo $headline; ?>" size="80" maxlength="67"></b></td>
          </tr>
          <tr>
            <td><textarea cols="80" id="editor1" name="editor1" rows="10"><?php echo $message; ?></textarea>
<script type="text/javascript">
	//<![CDATA[
	CKEDITOR.replace( 'editor1',{fullPage : false});
	//]]>
</script></td>
          </tr>
        </table>
        <table width="100%" border="0" cellpadding="4" cellspacing="4">
          <tr>
            <td valign="top">Link 1:
              <input name="link1" type="text" value="<?php echo $link1; ?>" maxlength="8">
              <input name="url1" type="text" value="<?php echo $url1; ?>">
              Link 2:
              <input name="link2" type="text" value="<?php echo $link2; ?>" maxlength="8">
              <input name="url2" type="text" value="<?php echo $url2; ?>"></td>
            <td valign="top"><br></td>
          </tr>
          <tr align="right">
            <td colspan="2" align="left">&nbsp;</td>
          </tr>
          <tr align="right">
            <td colspan="2" align="left">
            <input name="id" value="<?php echo $id;?>" type="hidden">
            <input type="submit" name="edit" value="Edit news"> <a href="bloggy.php?action=delete&id=<?php echo $id; ?>">Delete</a></td> 
          </tr>
      </table></td>
    </tr>
  </table>
</form>
</body>
</html>
<?php		
}

else {
	function getrubricname($id) {
		$ds = mysql_fetch_array(safe_query("SELECT rubric FROM ".PREFIX."blog_rubrics WHERE id='$id'"));
		return $ds['rubric'];
}

	$result=safe_query("SELECT * FROM ".PREFIX."blog ORDER BY date DESC LIMIT 0,5");
	$i=1;
        while($ds=mysql_fetch_array($result)) {
				$date = date("d.m.y", $ds['date']);
                $time = date("H:i", $ds['date']);
                $rubrik = getrubricname($ds['rubric']);

				$headline = $ds['headline'];
                $content = $ds['content'];

                if(empty($related)) $related="N/A";


?>
				<p>&nbsp;</p>
                <strong>Rubrik: <?php echo $rubrik; ?></strong><hr color="#666666" size="1" />
				<strong><?php  echo $date. " | " .$headline; ?></strong><p>&nbsp;</p>
                <?php  echo nl2brPre($content); ?>

<?php               

                $i++;

                unset($related);
                unset($comments);
                unset($lang);
                unset($ds);
		}
 }
?>