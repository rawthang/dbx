<?php
extract ( $_REQUEST );

if ($action == "new") {
	if (isnewsadmin ( $userID )) {
		safe_query ( "INSERT INTO " . PREFIX . "news (`date`, `rubric`, `lang1`, `headline1`, `content1`, `poster`, `link1`, `url1`, `window1`, `link2`, `url2`, `window2`, `link3`, `url3`, `window3`, `link4`, `url4`, `window4`, `saved`, `published`) VALUES ('" . time () . "', '0', '0', '0', '0', '$userID', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0')" );
		
		$newsID = mysql_insert_id ();
		
		$newsrubrics = safe_query ( "SELECT rubricID, rubric FROM " . PREFIX . "news_rubrics ORDER BY rubric" );
		while ( $dr = mysql_fetch_array ( $newsrubrics ) ) {
			$rubrics .= '<option value="' . $dr [rubricID] . '">' . $dr [rubric] . '</option>';
		}
		
		$lang = safe_query ( "SELECT lang, language FROM " . PREFIX . "news_languages ORDER BY language" );
		while ( $dl = mysql_fetch_array ( $lang ) ) {
			if ($dl [lang] == "de")
				$langs1 .= '<option value="' . $dl [lang] . '" selected>' . $dl [language] . '</option>';
			else
				$langs1 .= '<option value="' . $dl [lang] . '">' . $dl [language] . '</option>';
			
			if ($dl [lang] == "uk")
				$langs2 .= '<option value="' . $dl [lang] . '" selected>' . $dl [language] . '</option>';
			else
				$langs2 .= '<option value="' . $dl [lang] . '">' . $dl [language] . '</option>';
		}
		$url1 = "http://";
		$url2 = "http://";
		$url3 = "http://";
		$url4 = "http://";
		
		$bg1 = BG_1;
		eval ( "\$addbbcode = \"" . gettemplate ( "addbbcode" ) . "\";" );
		eval ( "\$news_post = \"" . gettemplate ( "news_post" ) . "\";" );
		echo $news_post;
	} else
		redirect ( 'index.php?site=news', 'No access!' );
} elseif ($action == "save") {
	if (isnewsadmin ( $userID )) {
		$headline1 = htmloutput ( $headline1 );
		$message = cleartext ( $message );
		
		$time = time ();
		
		safe_query ( "UPDATE " . PREFIX . "news SET
				date = '$time',
				rubric = '$rubric',
				poster = '$userID',
				saved = '1',
				comments = '0',
				lang1 = '$lang1', headline1 = '$headline1', content1 = '$message',
				url1 = '$url1', window1 = '$window1', link1 = '$link1',
				url2 = '$url2', window2 = '$window2', link2 = '$link2',
				url3 = '$url3', window3 = '$window3', link3 = '$link3',
				url4 = '$url4', window4 = '$window4', link4 = '$link4'
				WHERE " . PREFIX . "news newsID = '$newsID'" );
		
		$ergebnis = safe_query ( "SELECT * FROM " . PREFIX . "news WHERE headline1='' OR content1=''" );
		while ( $ds = mysql_fetch_array ( $ergebnis ) ) {
			if ((time () - $ds [date]) > (60 * 60))
				safe_query ( "DELETE FROM " . PREFIX . "news WHERE newsID='$ds[newsID]'" );
		}
		
		if ($save)
			echo '<meta http-equiv="refresh" content="1; url=?site=news">';
		if ($preview)
			echo '<meta http-equiv="refresh" content="1; url=?site=news&action=preview&newsID=$newsID">';
	} else
		redirect ( 'index.php?site=news', 'No access!' );

} elseif ($action == "preview") {
	
	if (isnewsadmin ( $userID )) {
		$bg1 = BG_1;
		
		echo $title_news;
		
		$result = safe_query ( "SELECT * FROM " . PREFIX . "news WHERE newsID='$newsID'" );
		$ds = mysql_fetch_array ( $result );
		$bgcolor = BG_1;
		
		$date = date ( "d.m.y", $ds [date] );
		$time = date ( "H:i", $ds [date] );
		$rubrikname = getrubricname ( $ds [rubric] );
		$rubricpic = '<img src="system/images/news/' . getrubricpic ( $ds [rubric] ) . '">';
		
		$lang = $ds [lang1];
		$language1 = "" . $ds [lang1] . "";
		$language2 = "" . $ds [lang2] . "";
		
		if ($lang == $ds [lang1]) {
			if ($ds [headline1])
				$headline = $ds [headline1];
			else
				$headline = $ds [headline2];
			
			if ($ds [content1])
				$content = $ds [content1];
			else
				$content = '[b]No version in selected language available![/b].[br][br]' . $ds [content2];
			
			$langs = '';
			if ($ds [headline2]) {
				$langs = '<a href="?site=news&action=preview&newsID=' . $ds [newsID] . '&lang=' . $ds [lang2] . '">' . $language2 . '</a>';
				$language = getlanguage ( $ds [lang2] );
				$langs = eregi_replace ( '(alt=")(.*)(")', "\\1 News in $language\\3", $langs );
			}
		} else {
			if ($ds [headline2])
				$headline = $ds [headline2];
			else
				$headline = $ds [headline1];
			
			if ($ds [content2])
				$content = $ds [content2];
			else
				$content = '[b]No version in selected language available![/b].[br][br]' . $ds [content1];
			
			$langs = '';
			if ($ds [headline1]) {
				$langs = '<a href="?site=news&action=preview&newsID=' . $ds [newsID] . '&lang=' . $ds [lang1] . '">' . $language1 . '</a>';
				$language = getlanguage ( $ds [lang1] );
				$langs = eregi_replace ( '(alt=")(.*)(")', "\\1 News in $language\\3", $langs );
			}
		}
		
		$content = cleartext ( $content );
		$content = toggle ( $content, $ds [newsID] );
		$poster = '' . getnickname ( $ds [poster] ) . '';
		if ($ds [link1] && $ds [url1] != "http://" && $ds [window1])
			$related .= '&#8226; <a href="' . $ds [url1] . '" target="_blank">' . $ds [link1] . '</a> ';
		if ($ds [link1] && $ds [url1] != "http://" && ! $ds [window1])
			$related .= '&#8226; <a href="' . $ds [url1] . '">' . $ds [link1] . '</a> ';
		
		if ($ds [link2] && $ds [url2] != "http://" && $ds [window2])
			$related .= '&#8226; <a href="' . $ds [url2] . '" target="_blank">' . $ds [link2] . '</a> ';
		if ($ds [link2] && $ds [url2] != "http://" && ! $ds [window2])
			$related .= '&#8226; <a href="' . $ds [url2] . '">' . $ds [link2] . '</a> ';
		
		if ($ds [link3] && $ds [url3] != "http://" && $ds [window3])
			$related .= '&#8226; <a href="' . $ds [url3] . '" target="_blank">' . $ds [link3] . '</a> ';
		if ($ds [link3] && $ds [url3] != "http://" && ! $ds [window3])
			$related .= '&#8226; <a href="' . $ds [url3] . '">' . $ds [link3] . '</a> ';
		
		if ($ds [link4] && $ds [url4] != "http://" && $ds [window4])
			$related .= '&#8226; <a href="' . $ds [url4] . '" target="_blank">' . $ds [link4] . '</a> ';
		if ($ds [link4] && $ds [url4] != "http://" && ! $ds [window4])
			$related .= '&#8226; <a href="' . $ds [url4] . '">' . $ds [link4] . '</a> ';
		
		eval ( "\$news = \"" . gettemplate ( "news" ) . "\";" );
		echo $news;
		
		echo '<hr noshade size="1" color="' . BORDER . '">
								 <input type="button" class="button" onClick="MM_goToURL(\'parent\',\'?site=news&action=edit&newsID=' . $newsID . '\');return document.MM_returnValue" value="Edit news">
                                 <input type="button" class="button" onClick="javascript:self.close()" value="Save news">
                                 <input type="button" class="button" onClick="MM_confirm(\'Really delete this entry?\', \'?site=news&action=delete&id=$newsID&close=true\')" value="Cancel">';
	} else
		redirect ( 'index.php?site=news', 'No access!' );
} elseif ($quickactiontype == "publish") {
	if (isnewsadmin ( $userID )) {
		if (is_array ( $newsID )) {
			foreach ( $newsID as $id ) {
				safe_query ( "UPDATE " . PREFIX . "news SET published='1' WHERE newsID='$id'" );
			}
		}
		echo '<meta http-equiv="refresh" content="1; url=?site=news">';
	} else
		redirect ( 'index.php?site=news', 'No access!' );
} elseif ($quickactiontype == "unpublish") {
	if (isnewsadmin ( $userID )) {
		foreach ( $newsID as $id ) {
			safe_query ( "UPDATE " . PREFIX . "news SET published='0' WHERE newsID='$id'" );
		}
		echo '<meta http-equiv="refresh" content="1; url=?site=news">';
	} else
		redirect ( 'index.php?site=news', 'No access!' );
} elseif ($quickactiontype == "delete") {
	if (isnewsadmin ( $userID )) {
		foreach ( $newsID as $id ) {
			$ds = mysql_fetch_array ( safe_query ( "SELECT screens FROM " . PREFIX . "news WHERE newsID='$id'" ) );
			if ($ds [screens]) {
				$screens = explode ( "|", $ds [screens] );
				if (is_array ( $screens )) {
					$filepath = "./system/images/news/";
					foreach ( $screens as $screen ) {
						if (file_exists ( $filepath . $screen ))
							@unlink ( $filepath . $screen );
					}
				}
			}
			safe_query ( "DELETE FROM " . PREFIX . "news WHERE newsID='$id'" );
			safe_query ( "DELETE FROM " . PREFIX . "comments WHERE parentID='$id' AND type='ne'" );
		}
		echo '<meta http-equiv="refresh" content="1; url=?site=news">';
	} else
		redirect ( 'index.php?site=news', 'No access!' );
} elseif ($action == "delete") {
	if (isnewsadmin ( $userID )) {
		$ds = mysql_fetch_array ( safe_query ( "SELECT screens FROM " . PREFIX . "news WHERE newsID='$id'" ) );
		if ($ds [screens]) {
			$screens = explode ( "|", $ds [screens] );
			if (is_array ( $screens )) {
				$filepath = "./system/images/news/";
				foreach ( $screens as $screen ) {
					if (file_exists ( $filepath . $screen ))
						@unlink ( $filepath . $screen );
				}
			}
		}
		
		safe_query ( "DELETE FROM " . PREFIX . "news WHERE newsID='$id'" );
		safe_query ( "DELETE FROM " . PREFIX . "comments WHERE parentID='$id' AND type='ne'" );
		
		if ($close)
			echo '<body onLoad="window.close()"></body>';
		else
			echo '<meta http-equiv="refresh" content="1; url=?site=news">';
	} else
		redirect ( 'index.php?site=news', 'No access!' );
} elseif ($action == "edit") {
	
	if (isnewsadmin ( $userID )) {
		$ds = mysql_fetch_array ( safe_query ( "SELECT * FROM " . PREFIX . "news WHERE newsID='$newsID'" ) );
		$lang = safe_query ( "SELECT lang, language FROM " . PREFIX . "news_languages ORDER BY language" );
		while ( $dl = mysql_fetch_array ( $lang ) ) {
			if ($dl [lang] == $ds [lang1])
				$langs1 .= '<option value="' . $dl [lang] . '" selected>' . $dl [language] . '</option>';
			else
				$langs1 .= '<option value="' . $dl [lang] . '">' . $dl [language] . '</option>';
			
			if ($dl [lang] == $ds [lang2])
				$langs2 .= '<option value="' . $dl [lang] . '" selected>' . $dl [language] . '</option>';
			else
				$langs2 .= '<option value="' . $dl [lang] . '">' . $dl [language] . '</option>';
		}
		
		$headline1 = $ds [headline1];
		$message = $ds [content1];
		
		$message = cleartext ( $message );
		
		$headline2 = $ds [headline2];
		//$content2=$ds[content2];
		

		$newsrubrics = safe_query ( "SELECT * FROM " . PREFIX . "news_rubrics ORDER BY rubric" );
		while ( $dr = mysql_fetch_array ( $newsrubrics ) ) {
			if ($ds [rubric] == $dr [rubricID])
				$rubrics .= '<option value="' . $dr [rubricID] . '" selected>' . $dr [rubric] . '</option>';
			else
				$rubrics .= '<option value="' . $dr [rubricID] . '">' . $dr [rubric] . '</option>';
		}
		
		$link1 = $ds [link1];
		$link2 = $ds [link2];
		$link3 = $ds [link3];
		$link4 = $ds [link4];
		
		$url1 = "http://";
		$url2 = "http://";
		$url3 = "http://";
		$url4 = "http://";
		
		if ($ds [url1] != "http://")
			$url1 = $ds [url1];
		if ($ds [url2] != "http://")
			$url2 = $ds [url2];
		if ($ds [url3] != "http://")
			$url3 = $ds [url3];
		if ($ds [url4] != "http://")
			$url4 = $ds [url4];
		
		if ($ds [window1])
			$window1 = '<input class="input" name="window1" type="radio" value="1" checked> Blank <input class="input" type="radio" name="window1" value="0"> Self';
		else
			$window1 = '<input class="input" name="window1" type="radio" value="1"> Blank <input class="input" type="radio" name="window1" value="0" checked> Self';
		
		if ($ds [window2])
			$window2 = '<input class="input" name="window2" type="radio" value="1" checked> Blank <input class="input" type="radio" name="window2" value="0"> Self';
		else
			$window2 = '<input class="input" name="window2" type="radio" value="1"> Blank <input class="input" type="radio" name="window2" value="0" checked> Self';
		
		if ($ds [window3])
			$window3 = '<input class="input" name="window3" type="radio" value="1" checked> Blank <input class="input" type="radio" name="window3" value="0"> Self';
		else
			$window3 = '<input class="input" name="window3" type="radio" value="1"> Blank <input class="input" type="radio" name="window3" value="0" checked> Self';
		
		if ($ds [window4])
			$window4 = '<input class="input" name="window4" type="radio" value="1" checked> Blank <input class="input" type="radio" name="window4" value="0"> Self';
		else
			$window4 = '<input class="input" name="window4" type="radio" value="1"> Blank <input class="input" type="radio" name="window4" value="0" checked> Self';
		
		if ($ds [picalign] == "left")
			$align = '<input class="input" type="radio" name="align" value="left" checked> Left
                                                <input class="input" type="radio" name="align" value="right"> Right';
		else
			$align = '<input class="input" type="radio" name="align" value="left"> Left
                             <input class="input" type="radio" name="align" value="right" checked> Right';
		
		$comments = "0";
		
		$bg1 = BG_1;
		
		eval ( "\$addbbcode = \"" . gettemplate ( "addbbcode" ) . "\";" );
		eval ( "\$news_edit = \"" . gettemplate ( "news_edit" ) . "\";" );
		echo $news_edit;
	} else
		redirect ( 'index.php?site=news', 'No access!' );
} elseif ($action == "unpublished") {
	echo $title_news;
	
	if (isnewsadmin ( $userID )) {
		$post = '<a href="?site=news&action=new">Post News</a>';
		
		echo $post . '<br/><br/>';
		
		$ergebnis = safe_query ( "SELECT * FROM " . PREFIX . "news WHERE published='0' AND saved='1' ORDER BY date ASC" );
		if (mysql_num_rows ( $ergebnis )) {
			echo '<h2>Not published</h2>';
			
			echo '<form method="post" name="form" action="?site=news">';
			eval ( "\$news_archive_head = \"" . gettemplate ( "news_archive_head" ) . "\";" );
			echo $news_archive_head;
			
			$i = 1;
			while ( $ds = mysql_fetch_array ( $ergebnis ) ) {
				if ($i % 2) {
					$bg1 = BG_1;
					$bg2 = BG_2;
				} else {
					$bg1 = BG_3;
					$bg2 = BG_4;
				}
				
				$date = date ( "d.m.y", $ds [date] );
				$rubric = getrubricname ( $ds [rubric] );
				$language1 = "" . $ds [lang1] . "";
				$language2 = "" . $ds [lang2] . "";
				
				if ($ds [headline1]) {
					$langs = '<a href="index.php?site=news_comments&newsID=' . $ds [newsID] . '&lang=' . $ds [lang1] . '">' . $language1 . '</a>';
					$language = getlanguage ( $ds [lang1] );
					$langs = eregi_replace ( '(alt=")(.*)(")', "\\1 News in $language\\3", $langs );
					$headline = '<a href="index.php?site=news_comments&newsID=' . $ds [newsID] . '&lang=' . $ds [lang1] . '">' . $ds [headline1] . '</a>';
				}
				if ($ds [headline2]) {
					$lang2 = ' <a href="index.php?site=news_comments&newsID=' . $ds [newsID] . '&lang=' . $ds [lang2] . '">' . $language2 . '</a>';
					$language = getlanguage ( $ds [lang2] );
					$lang2 = eregi_replace ( '(alt=")(.*)(")', "\\1 News in $language\\3", $lang2 );
					$langs .= $lang2;
					$headline .= ' - <a href="index.php?site=news_comments&newsID=' . $ds [newsID] . '&lang=' . $ds [lang2] . '">' . $ds [headline2] . '</a>';
				}
				
				$poster = '' . getnickname ( $ds [poster] ) . '';
				
				$multiple = '';
				$admdel = '';
				if (isnewsadmin ( $userID )) {
					$multiple = '<input class="input" type="checkbox" name="newsID[]" value="' . $ds [newsID] . '">';
					$admdel = '<form method="post" name="form" action="?site=news">
												 <table width="100%" border="0" cellspacing="0" cellpadding="4">
                                                        <tr>
                                                        <td><input class="input" type="checkbox" name="ALL" value="ALL" onClick="SelectAll(this.form);">Select all</td>
                                                            <td align="right"><select name="quickactiontype">
                                                                <option value="publish">Publish selected</option>
                                                                <option value="delete">Delete selected</option>
                                                                </select>
                                                        <input type="submit" name="quickaction" value="Go"></td>
                                                        </tr>
                                                        </table></form>';
				
				}
				eval ( "\$news_archive_content = \"" . gettemplate ( "news_archive_content" ) . "\";" );
				echo $news_archive_content;
				$i ++;
			}
			eval ( "\$news_archive_foot = \"" . gettemplate ( "news_archive_foot" ) . "\";" );
			echo $news_archive_foot;
			
			unset ( $ds );
		}
	} else
		redirect ( 'index.php?site=news', 'No access!' );
} elseif ($action == "archive") {
	echo $title_news;
	
	$all = safe_query ( "SELECT newsID FROM " . PREFIX . "news WHERE published='1'" );
	$all = mysql_num_rows ( $all );
	$pages = 1;
	if (! isset ( $page ))
		$page = 1;
	if (! isset ( $sort ))
		$sort = "date";
	if (! isset ( $type ))
		$type = "DESC";
	
	$max = empty ( $maxnewsarchiv ) ? 20 : $maxnewsarchiv;
	
	for($n = $max; $n <= $all; $n += $max) {
		if ($all > $n)
			$pages ++;
	}
	
	if ($pages > 1)
		$page_link = makepagelink ( "index.php?site=news&action=archive&sort=$sort&type=$type", $page, $pages );
	
	if ($page == "1") {
		$ergebnis = safe_query ( "SELECT * FROM " . PREFIX . "news WHERE published='1' ORDER BY $sort $type LIMIT 0,$max" );
		if ($type == "DESC")
			$n = $gesamt;
		else
			$n = 1;
	} else {
		$start = $page * $max - $max;
		$ergebnis = safe_query ( "SELECT * FROM " . PREFIX . "news WHERE published='1' ORDER BY $sort $type LIMIT $start,$max" );
		if ($type == "DESC")
			$n = ($gesamt) - $page * $max + $max;
		else
			$n = ($gesamt + 1) - $page * $max + $max;
	}
	if ($all) {
		if ($type == "ASC")
			echo '<a href="index.php?site=news&action=archive&page=' . $page . '&sort=' . $sort . '&type=DESC">Sort:</a> <img src="images/icons/asc.gif" width="9" height="7" border="0">&nbsp;&nbsp;&nbsp;';
		else
			echo '<a href="index.php?site=news&action=archive&page=' . $page . '&sort=' . $sort . '&type=ASC">Sort:</a> <img src="images/icons/desc.gif" width="9" height="7" border="0">&nbsp;&nbsp;&nbsp;';
		
		if ($pages > 1)
			echo $page_link;
		if (isnewsadmin ( $userID ))
			echo '<form method="post" name="form" action="?site=news">';
		eval ( "\$news_archive_head = \"" . gettemplate ( "news_archive_head" ) . "\";" );
		echo $news_archive_head;
		$i = 1;
		while ( $ds = mysql_fetch_array ( $ergebnis ) ) {
			if ($i % 2) {
				$bg1 = BG_1;
				$bg2 = BG_2;
			} else {
				$bg1 = BG_3;
				$bg2 = BG_4;
			}
			
			$date = date ( "d.m.y", $ds [date] );
			$rubric = getrubricname ( $ds [rubric] );
			$language1 = "" . $ds [lang1] . "";
			
			$comms = getanzcomments ( $ds [newsID], 'ne' );
			
			if ($ds [headline1]) {
				$langs = '<a href="index.php?site=news_comments&newsID=' . $ds [newsID] . '&lang=' . $ds [lang1] . '">' . $language1 . '</a>';
				$language = getlanguage ( $ds [lang1] );
				$langs = eregi_replace ( '(alt=")(.*)(")', "\\1 News in $language\\3", $langs );
				
				$headline = '<a href="index.php?site=news_comments&newsID=' . $ds [newsID] . '&lang=' . $ds [lang1] . '"><b>' . $ds [headline1] . '</b></a>';
			}
			if ($ds [headline2]) {
				$lang2 = ' <a href="index.php?site=news_comments&newsID=' . $ds [newsID] . '&lang=' . $ds [lang2] . '">' . $language2 . '</a>';
				$language = getlanguage ( $ds [lang2] );
				$lang2 = eregi_replace ( '(alt=")(.*)(")', "\\1 News in $language\\3", $lang2 );
				$langs .= $lang2;
				
				$headline .= ' - <a href="index.php?site=news_comments&newsID=' . $ds [newsID] . '&lang=' . $ds [lang2] . '"><b>' . $ds [headline2] . '</b></a>';
			}
			
			$poster = '' . getnickname ( $ds [poster] ) . '';
			
			$multiple = '';
			$admdel = '';
			if (isnewsadmin ( $userID ))
				$multiple = '<input class="input" type="checkbox" name="newsID[]" value="' . $ds [newsID] . '">';
			
			eval ( "\$news_archive_content = \"" . gettemplate ( "news_archive_content" ) . "\";" );
			echo $news_archive_content;
			$i ++;
		}
		
		$post = '';
		$publish = '';
		
		if (isnewsadmin ( $userID ))
			$admdel = '<form method="post" name="form" action="?site=news">
												  <table width="100%" border="0" cellspacing="0" cellpadding="4">
                                                        <tr>
                                                        	<td><input class="input" type="checkbox" name="ALL" value="ALL" onClick="SelectAll(this.form);">Select all</td>
                                                            <td align="right"><select name="quickactiontype">
                                                                <option value="delete">Delete selected</option>
                                                                <option value="unpublish">Unpublish selected</option>
                                                                </select>
                                                        		<input type="submit" name="quickaction" value="Go"></td>
                                                        </tr>
                                                  </table>
												  </form>';
		
		eval ( "\$news_archive_foot = \"" . gettemplate ( "news_archive_foot" ) . "\";" );
		echo $news_archive_foot;
		unset ( $ds );
	
	} else
		echo 'No entries!';
} else {
	$post = '';
	$publish = '';
	
	if (isnewsadmin ( $userID )) {
		$post = "<a href=\"?site=news&action=new\">Post News</a>";
		$unpublished = safe_query ( "SELECT newsID FROM " . PREFIX . "news WHERE published='0' AND saved='1'" );
		$unpublished = mysql_num_rows ( $unpublished );
		if ($unpublished)
			$publish = '<a href="?site=news&action=unpublished">' . $unpublished . ' unpublished News</a>';
		echo $post . '&nbsp;|&nbsp;' . $publish . '&nbsp|&nbsp;<a href="index.php?site=news&action=archive"><b>Archiv</b></a><br/><br/>';
	}
	
	echo $title_news;
	
	$result = safe_query ( "SELECT * FROM " . PREFIX . "news WHERE published='1' ORDER BY date DESC LIMIT 0,5" );
	$i = 1;
	while ( $ds = mysql_fetch_array ( $result ) ) {
		if ($i % 2)
			$bg1 = BG_1;
		else
			$bg1 = BG_2;
		
		$date = date ( "d.m.y", $ds [date] );
		$time = date ( "H:i", $ds [date] );
		$rubrikname = getrubricname ( $ds [rubric] );
		$rubricpic = '<img width="100" height="100" src="system/images/news/' . getrubricpic ( $ds [rubric] ) . '">';
		
		$lang = $ds [lang1];
		$language1 = "" . $ds [lang1] . "";
		
		if ($lang == $ds [lang1]) {
			if ($ds [headline1])
				$headline = $ds [headline1];
			else
				$headline = $ds [headline2];
			
			if ($ds [content1])
				$content = $ds [content1];
			else
				$content = '[b]no version in selected language available![/b].[br][br]' . $ds [content2];
			
			if ($ds [headline2]) {
				$langs = '<a href="index.php?site=news_comments&newsID=' . $ds [newsID] . '&lang=' . $ds [lang2] . '">' . $language2 . '</a>';
				$language = getlanguage ( $ds [lang2] );
				$langs = eregi_replace ( '(alt=")(.*)(")', "\\1 News in $language\\3", $langs );
			} else
				$langs = '';
		} else {
			if ($ds [headline2])
				$headline = $ds [headline2];
			else
				$headline = $ds [headline1];
			
			if ($ds [content2])
				$content = $ds [content2];
			else
				$content = '[b]no version in selected language available![/b].[br][br]' . $ds [content1];
			
			if ($ds [headline1]) {
				$langs = '<a href="index.php?site=news_comments&newsID=' . $ds [newsID] . '&lang=' . $ds [lang1] . '">' . $language1 . '</a>';
				$language = getlanguage ( $ds [lang1] );
				$langs = eregi_replace ( '(alt=")(.*)(")', "\\1 News in $language\\3", $langs );
			} else
				$langs = '';
		}
		$content = cleartext ( $content );
		$content = toggle ( $content, $ds [newsID] );
		$poster = '' . getnickname ( $ds [poster] ) . '';
		if ($ds [link1] && $ds [url1] != "http://" && $ds [window1])
			$related .= '&#8226; <a href="' . $ds [url1] . '" target="_blank">' . $ds [link1] . '</a><br> ';
		if ($ds [link1] && $ds [url1] != "http://" && ! $ds [window1])
			$related .= '&#8226; <a href="' . $ds [url1] . '">' . $ds [link1] . '</a><br> ';
		
		if ($ds [link2] && $ds [url2] != "http://" && $ds [window2])
			$related .= '&#8226; <a href="' . $ds [url2] . '" target="_blank">' . $ds [link2] . '</a><br> ';
		if ($ds [link2] && $ds [url2] != "http://" && ! $ds [window2])
			$related .= '&#8226; <a href="' . $ds [url2] . '">' . $ds [link2] . '</a><br> ';
		
		if ($ds [link3] && $ds [url3] != "http://" && $ds [window3])
			$related .= '&#8226; <a href="' . $ds [url3] . '" target="_blank">' . $ds [link3] . '</a><br> ';
		if ($ds [link3] && $ds [url3] != "http://" && ! $ds [window3])
			$related .= '&#8226; <a href="' . $ds [url3] . '">' . $ds [link3] . '</a><br> ';
		
		if ($ds [link4] && $ds [url4] != "http://" && $ds [window4])
			$related .= '&#8226; <a href="' . $ds [url4] . '" target="_blank">' . $ds [link4] . '</a> ';
		if ($ds [link4] && $ds [url4] != "http://" && ! $ds [window4])
			$related .= '&#8226; <a href="' . $ds [url4] . '">' . $ds [link4] . '</a> ';
		
		if (empty ( $related ))
			$related = "N/A";
		
		if ($ds [comments]) {
			if ($ds [cwID]) {
				$anzcomments = getanzcomments ( $ds [cwID], 'cw' );
				if ($anzcomments == "1")
					$comments = '<a href="index.php?site=clanwars_details&cwID=' . $ds [cwID] . '">[' . $anzcomments . '] Kommentar</a> <br>letzter ' . getlastcommentposter ( $ds [cwID], 'cw' ) . ', am ' . date ( "d.m.y, H:i", getlastcommentdate ( $ds [cwID], 'cw' ) );
				elseif ($anzcomments > "1")
					$comments = '<a href="index.php?site=clanwars_details&cwID=' . $ds [cwID] . '">[' . $anzcomments . '] Kommentare</a> <br>letzter ' . getlastcommentposter ( $ds [cwID], 'cw' ) . ', am ' . date ( "d.m.y, H:i", getlastcommentdate ( $ds [cwID], 'cw' ) );
				else
					$comments = '<a href="index.php?site=clanwars_details&cwID=' . $ds [cwID] . '">Keine Kommentare</a>';
			} else {
				$anzcomments = getanzcomments ( $ds [newsID], 'ne' );
				if ($anzcomments == "1")
					$comments = '<a href="index.php?site=news_comments&newsID=' . $ds [newsID] . '">[' . $anzcomments . '] Kommentar</a> <br>letzter ' . getlastcommentposter ( $ds [newsID], 'ne' ) . ', am ' . date ( "d.m.y, H:i", getlastcommentdate ( $ds [newsID], 'ne' ) );
				elseif ($anzcomments > "1")
					$comments = '<a href="index.php?site=news_comments&newsID=' . $ds [newsID] . '">[' . $anzcomments . '] Kommentare</a> <br>letzter ' . getlastcommentposter ( $ds [newsID], 'ne' ) . ', am ' . date ( "d.m.y, H:i", getlastcommentdate ( $ds [newsID], 'ne' ) );
				else
					$comments = '<a href="index.php?site=news_comments&newsID=' . $ds [newsID] . '">Keine Kommentare</a>';
			}
		} else
			$comments = '';
		
		if (isnewsadmin ( $userID ))
			$adminaction = '<a href="?site=news&action=edit&newsID=' . $ds [newsID] . '">Edit</a>
                                                       <a href="?site=news&action=delete&id=' . $ds [newsID] . '">Delete</a>';
		else
			$adminaction = '';
		
		eval ( "\$news = \"" . gettemplate ( "news" ) . "\";" );
		echo $news;
		
		$i ++;
		
		unset ( $related );
		unset ( $comments );
		unset ( $lang );
		unset ( $ds );
	}
}
?>