<?php
extract($_REQUEST);

function gettemplate($template,$endung="html") {

    $templatefolder = "system/templates";

    return str_replace("\"","\\\"",implode("",file($templatefolder."/".$template.".".$endung)));

}

function gettemplaten($template,$endung="html") {

    $templatefolder = "../../templates";

    return str_replace("\"","\\\"",implode("",file($templatefolder."/".$template.".".$endung)));

}


function percent($sub, $total, $dec) {

        if ($sub) {

            $perc = $sub / $total * 100;

                $perc = round($perc, $dec);

                return $perc;

        }

        else return 0;

}



function getnickname($userID) {

        $ds=mysql_fetch_array(safe_query("SELECT nickname FROM ".PREFIX."user WHERE userID='$userID'"));

        return $ds[nickname];

}



function getfirstname($userID) {

        $ds=mysql_fetch_array(safe_query("SELECT firstname FROM ".PREFIX."user WHERE userID='$userID'"));

        return $ds[firstname];

}



function getlastname($userID) {

        $ds=mysql_fetch_array(safe_query("SELECT lastname FROM ".PREFIX."user WHERE userID='$userID'"));

        return $ds[lastname];

}



function getbirthday($userID) {

        $ds=mysql_fetch_array(safe_query("SELECT birthday FROM ".PREFIX."user WHERE userID='$userID'"));

        return date("d.m.Y", $ds[birthday]);

}



function gettown($userID) {

        $ds=mysql_fetch_array(safe_query("SELECT town FROM ".PREFIX."user WHERE userID='$userID'"));

        return $ds[town];

}



function getemail($userID) {

    $ds=mysql_fetch_array(safe_query("SELECT email FROM ".PREFIX."user WHERE userID='$userID'"));

        return $ds[email];

}



function gethomepage($userID) {

    $ds=mysql_fetch_array(safe_query("SELECT clanhp FROM ".PREFIX."user WHERE userID='$userID'"));

        return $ds[clanhp];

}



function geticq($userID) {

    $ds=mysql_fetch_array(safe_query("SELECT icq FROM ".PREFIX."user WHERE userID='$userID'"));

        return $ds[icq];

}



function getcountry($userID) {

    $ds=mysql_fetch_array(safe_query("SELECT country FROM ".PREFIX."user WHERE userID='$userID'"));

        return $ds[country];

}



function getavatar($userID) {

    $ds=mysql_fetch_array(safe_query("SELECT avatar FROM ".PREFIX."user WHERE userID='$userID'"));

        return $ds[avatar];

}



function getsignatur($userID) {

    $ds=mysql_fetch_array(safe_query("SELECT usertext FROM ".PREFIX."user WHERE userID='$userID'"));

        $clearsignatur=strip_tags($ds[usertext]);

        return $clearsignatur;

}



function getregistered($userID) {

    $ds=mysql_fetch_array(safe_query("SELECT registerdate FROM ".PREFIX."user WHERE userID='$userID'"));

        $date=date("d.m.Y", $ds[registerdate]);

        return $date;

}



function usergroupexists($userID) {

    $anz=mysql_num_rows(safe_query("SELECT userID FROM ".PREFIX."user_groups WHERE userID='$userID'"));

        return $anz;

}



function isbuddy($userID, $buddy) {

    $anz=mysql_num_rows(safe_query("SELECT userID FROM ".PREFIX."buddys WHERE buddy='$buddy' AND userID='$userID'"));

        if($anz) {

            $ergebnis=safe_query("SELECT * FROM ".PREFIX."buddys WHERE buddy='$buddy' AND userID='$userID'");

                $ds=mysql_fetch_array($ergebnis);

            if($ds[banned]==0) return 1;

        }

        else return 0;

}



function isanyadmin($userID) {

    $anz=mysql_num_rows(safe_query("SELECT userID FROM ".PREFIX."user_groups WHERE userID='$userID' AND (page='1' OR forum='1' OR user='1' OR news='1' OR clanwars='1') "));

        return $anz;

}



function isforumadmin($userID) {

    $anz=mysql_num_rows(safe_query("SELECT userID FROM ".PREFIX."user_groups WHERE forum='1' AND userID='$userID'"));

        return $anz;

}



function ispageadmin($userID) {

    $anz=mysql_num_rows(safe_query("SELECT userID FROM ".PREFIX."user_groups WHERE page='1' AND userID='$userID'"));

        return $anz;

}



function isfeedbackadmin($userID) {

    $anz=mysql_num_rows(safe_query("SELECT userID FROM ".PREFIX."user_groups WHERE feedback='1' AND userID='$userID'"));

        return $anz;

}



function isnewsadmin($userID) {

    $anz=mysql_num_rows(safe_query("SELECT userID FROM ".PREFIX."user_groups WHERE news='1' AND userID='$userID'"));

        return $anz;

}



function ispollsadmin($userID) {

    $anz=mysql_num_rows(safe_query("SELECT userID FROM ".PREFIX."user_groups WHERE polls='1' AND userID='$userID'"));

        return $anz;

}



function isclanwaradmin($userID) {

    $anz=mysql_num_rows(safe_query("SELECT userID FROM ".PREFIX."user_groups WHERE clanwars='1' AND userID='$userID'"));

        return $anz;

}



function ismoderator($userID, $boardID) {

    $anz=mysql_num_rows(safe_query("SELECT userID FROM ".PREFIX."forum_moderators WHERE userID='$userID' AND boardID='$boardID'"));

        return $anz;

}



function isanymoderator($userID) {

    $anz=mysql_num_rows(safe_query("SELECT userID FROM ".PREFIX."user_groups WHERE userID='$userID' AND moderator='1'"));

        return $anz;

}



function isuseradmin($userID) {

    $anz=mysql_num_rows(safe_query("SELECT userID FROM ".PREFIX."user_groups WHERE user='1' AND userID='$userID'"));

        return $anz;

}



function isinternboardprobe($userID) {

    $anz=mysql_num_rows(safe_query("SELECT userID FROM ".PREFIX."user_groups WHERE internboards='1' AND userID='$userID'"));

        return $anz;

}

function isinternboarduser($userID) {

    $anz=mysql_num_rows(safe_query("SELECT userID FROM ".PREFIX."user_groups WHERE internboards='2' AND userID='$userID'"));

        return $anz;

}

function isinternboardoffi($userID) {

    $anz=mysql_num_rows(safe_query("SELECT userID FROM ".PREFIX."user_groups WHERE internboards='3' AND userID='$userID'"));

        return $anz;

}


function isclanmember($userID) {

    $anz=mysql_num_rows(safe_query("SELECT userID FROM ".PREFIX."squads_members WHERE userID='$userID'"));

        return $anz;

}



function isbanned($userID) {

    $anz=mysql_num_rows(safe_query("SELECT userID FROM ".PREFIX."user WHERE userID='$userID' AND banned='1'"));

        return $anz;

}



function getusercomments($userID, $type) {

        $anz=mysql_num_rows(safe_query("SELECT commentID FROM ".PREFIX."comments WHERE userID='$userID' AND type='$type'"));

        return $anz;

}



function getnewmessages($userID) {

        $anz=mysql_num_rows(safe_query("SELECT messageID FROM ".PREFIX."messenger WHERE touser='$userID' AND userID='$userID' AND viewed='0'"));

        return $anz;

}



function getanzcomments($id, $type) {

    $anz=mysql_num_rows(safe_query("SELECT commentID FROM ".PREFIX."comments WHERE parentID='$id' AND type='$type'"));

        return $anz;

}



function getlastcommentposter($id, $type) {

    $ds=mysql_fetch_array(safe_query("SELECT userID, nickname FROM ".PREFIX."comments WHERE parentID='$id' AND type='$type' ORDER BY date DESC LIMIT 0,1"));

        if($ds[userID]) return getnickname($ds[userID]);

        else return $ds[nickname];

}



function getlastcommentdate($id, $type) {

    $ds=mysql_fetch_array(safe_query("SELECT date FROM ".PREFIX."comments WHERE parentID='$id' AND type='$type' ORDER BY date DESC LIMIT 0,1"));

        return $ds[date];

}



function getusernewsposts($userID) {

        $anz=mysql_num_rows(safe_query("SELECT newsID FROM ".PREFIX."news WHERE poster='$userID' "));

        return $anz;

}



function getusernewscomments($userID) {

        $anz=mysql_num_rows(safe_query("SELECT commentID FROM ".PREFIX."comments WHERE userID='$userID' AND type='ne'"));

        return $anz;

}



function getrubricname($rubricID) {

    $ds=mysql_fetch_array(safe_query("SELECT rubric FROM ".PREFIX."news_rubrics WHERE rubricID='$rubricID'"));

        return $ds[rubric];

}



function getrubricpic($rubricID) {

    $ds=mysql_fetch_array(safe_query("SELECT pic FROM ".PREFIX."news_rubrics WHERE rubricID='$rubricID'"));

        return $ds[pic];

}



function getlanguage($lang) {

    $ds=mysql_fetch_array(safe_query("SELECT language FROM ".PREFIX."news_languages WHERE lang='$lang'"));

        return $ds[language];

}



function getanzcwcomments($cwID) {

    $anz=mysql_num_rows(safe_query("SELECT commentID FROM ".PREFIX."comments WHERE parentID='$cwID' AND type='cw'"));

        return $anz;

}



function getsquads() {

    $ergebnis=safe_query("SELECT * FROM ".PREFIX."squads");

    while($ds=mysql_fetch_array($ergebnis)) {

            $squads.='<option value="'.$ds[squadID].'">'.$ds[name].'</option>';

        }

        return $squads;

}



function getgamesquads() {

    $ergebnis=safe_query("SELECT * FROM ".PREFIX."squads WHERE gamesquad='1'");

    while($ds=mysql_fetch_array($ergebnis)) {

            if($squads==$ds[squadID]) $squads.='<option value="'.$ds[squadID].'" selected>'.$ds[name].'</option>';

                else $squads.='<option value="'.$ds[squadID].'">'.$ds[name].'</option>';

        }

        return $squads;

}



function getsquadname($squadID) {

    $ds=mysql_fetch_array(safe_query("SELECT name FROM ".PREFIX."squads WHERE squadID='$squadID'"));

        return $ds[name];

}



function issquadmember($userID, $squadID) {

    $anz=mysql_num_rows(safe_query("SELECT sqmID FROM ".PREFIX."squads_members WHERE userID='$userID' AND squadID='$squadID'"));

        return $anz;

}



function makepagelink($link, $page, $pages) {

        $page_link = '<img src="system/images/icons/multipage.gif" width="10" height="12"> <span class="small">';

        if($page!=1) $page_link .= "&nbsp;<a href=\"$link&page=1\">&laquo;</a>&nbsp;<a href=\"$link&page=".($page-1)."\">‹</a>";

        if($page>=6) $page_link .= "&nbsp;<a href=\"$link&page=".($page-5)."\">...</a>";

        if($page+4>=$pages) $pagex=$pages;

        else $pagex=$page+4;

        for($i=$page-4 ; $i<=$pagex ; $i++) {

                if($i<=0) $i=1;

                if($i==$page) $page_link .= "&nbsp;<b><u>$i</u></b>";

                else $page_link .= "&nbsp;<a href=\"$link&page=$i\">$i</a>";

        }

        if(($pages-$page)>=5) $page_link .= "&nbsp;<a href=\"$link&page=".($page+5)."\">...</a>";

        if($page!=$pages) $page_link .= "&nbsp;<a href=\"$link&page=".($page+1)."\">›</a>&nbsp;<a href=\"$link&page=".$pages."\">&raquo;</a>";

        $page_link .= "</span>";



        return $page_link;

}



function str_break($str, $maxlen) {

  $nobr = 0;

  $len = strlen($str);

  for ($i = 0; $i<$len; $i++) {



    if (($str[$i]!=' ') && ($str[$i]!='-') && ($str[$i]!="\n")) $nobr++;

    else {

      $nobr = 0;

      if($maxlen+$i>$len) {



        $str_br .= substr($str, $i);

        break;

      }

    }



    if ($nobr>$maxlen) {

      $str_br .= '-'.$str[$i];

      $nobr = 1;

    } else $str_br .= $str[$i];

  }

  return $str_br;

}


function isinternprobeboard($boardID) {
	
    $anz=mysql_num_rows(safe_query("SELECT intern FROM ".PREFIX."forum_boards WHERE intern='1' AND boardID='$boardID'"));

        return $anz;

}

function isinternuserboard($boardID) {
	
    $anz=mysql_num_rows(safe_query("SELECT intern FROM ".PREFIX."forum_boards WHERE intern='2' AND boardID='$boardID'"));

        return $anz;

}

function isinternoffiboard($boardID) {

	$anz=mysql_num_rows($safe_query("SELECT * FROM ".PREFIX."forum_boards AS fb, ".PREFIX."squads_members AS sm, ".PREFIX."squads AS s WHERE fb.intern='3' AND sm.squadID='1' AND s.squadID='1'"));

	return $anz;
	
}

function getanzforumtopics($boardID) {

    $anz=mysql_num_rows(safe_query("SELECT topicID FROM ".PREFIX."forum_topics WHERE boardID='$boardID'"));

        return $anz;

}



function getanzforumposts($boardID) {

    $topics=getanzforumtopics($boardID);

        $anz=mysql_num_rows(safe_query("SELECT postID FROM ".PREFIX."forum_posts WHERE boardID='$boardID'"));

        if(($anz-$topics) < 0) return 0;

        else return $anz-$topics;

}



function getuserforumtopics($userID) {

        $anz=mysql_num_rows(safe_query("SELECT topicID FROM ".PREFIX."forum_topics WHERE userID='$userID' "));

        return $anz;

}



function getuserforumposts($userID) {

        $anz=mysql_num_rows(safe_query("SELECT postID FROM ".PREFIX."forum_posts WHERE poster='$userID'"));

        return $anz;

}



function getboardname($boardID) {

        $ds=mysql_fetch_array(safe_query("SELECT name FROM ".PREFIX."forum_boards WHERE boardID='$boardID'"));

        return $ds[name];

}



function gettopicname($topicID) {

        $ds=mysql_fetch_array(safe_query("SELECT topic FROM ".PREFIX."forum_topics WHERE topicID='$topicID'"));

        return $ds[topic];

}



function redirect($url, $info) {

    echo'<meta http-equiv="refresh" content="1;URL='.$url.'">

             <br>'.$info.'<br><br>';

}



function getmoderators($boardID) {

    $moderatoren=safe_query("SELECT * FROM ".PREFIX."forum_moderators WHERE boardID='$boardID'");

    $j=1;

    while($dm=mysql_fetch_array($moderatoren)) {

        $username=getnickname($dm[userID]);

            if($j>1) $moderators .= ', <a href="index.php?site=profile&id='.$dm[userID].'">'.$username.'</a>';

            else $moderators = '<a href="index.php?site=profile&id='.$dm[userID].'">'.$username.'</a>';

            $j++;

        }

        return $moderators;

}



function smileys($text) {

        $filepath = "./system/images/smileys/";

        unset($files);

        if ($dh = opendir($filepath)) {

            while($file = readdir($dh)) {

                    if (ereg("\.gif",$file)) $files[] = $file;

                }

        }

        foreach($files as $file) {

            $smiley = explode(".", $file);

            $text = eregi_replace (":".$smiley[0].":", '<img src="system/images/smileys/'.$file.'" border="0">', $text);

        }



        $text = eregi_replace (":D", '<img src="system/images/smileys/d.gif" width="15" height="15" alt="Großes Grinsen" border="0">', $text);

        $text = eregi_replace ("\?\(", '<img src="system/images/smileys/confused.gif" border=0 width="15" height="22" alt="Verwirrt" border="0">', $text);

        $text = eregi_replace (";\(", '<img src="system/images/smileys/cry.gif" border=0 width="21" height="16" alt="Traurig" border="0">', $text);

        $text = eregi_replace (":)", '<img src="system/images/smileys/smile.gif" border=0 width="15" height="15" alt="Smile" border="0">', $text);

        $text = eregi_replace (";)", '<img src="system/images/smileys/wink.gif" border=0 width="15" height="15" alt="Augenzwinkern" border="0">', $text);

        $text = eregi_replace (":\(", '<img src="system/images/smileys/frown.gif" border=0 width="15" height="15" alt="Unglücklich" border="0">', $text);

        $text = eregi_replace (":P", '<img src="system/images/smileys/p.gif" border=0 width="15" height="15" alt="Zunge raus" border="0">', $text);

        $text = eregi_replace ("8)", '<img src="system/images/smileys/cool.gif" border=0 width="15" height="15" alt="Cool" border="0">', $text);

        $text = eregi_replace ("8o", '<img src="system/images/smileys/eek.gif" border=0 width="15" height="15" alt="Geschockt" border="0">', $text);

        $text = eregi_replace (":evil:", '<img src="system/images/smileys/evil.gif" border=0 width="25" height="26" alt="Teufel" border="0">', $text);

        $text = eregi_replace ("X\(", '<img src="system/images/smileys/mad.gif" border=0 width="15" height="15" alt="Böse" border="0">', $text);



        return $text;

}



function codereplace($content) {

        preg_match_all("#\[code\](.*?)\[/code\]#si", $content, $code);

        $codestring=htmlspecialchars($code[1][0]);

        $content = preg_replace("#\[code\](.*?)\[/code\]#si", "[CODE]Code:[HR][FONT=COURIER]".$codestring."[/FONT][/CODE]", $content);

        return $content;

}



function replacement($content) {

        $pagebg=PAGEBG;

        $border=BORDER;

        $bg1=BG_1;

        $bghead=BGHEAD;

        $bgcat=BGCAT;



        $content = preg_replace("#\[url\]http://(.*?)\[img\]http://(.*?)\[/img\]\[/url\]#si", "<a href=\"http://\\1\" target=\"_blank\"><img src=\"http://\\2\" border=\"0\"></a>", $content);

        $content = preg_replace("#\[url\]www.(.*?)\[img\]www.(.*?)\[/img\]\[/url\]#si", "<a href=\"http://www.\\1\" target=\"_blank\"><img src=\"http://www.\\2\" border=\"0\"></a>", $content);

        $content = preg_replace("#\[url=http://(.*?)\]\[img\]http://(.*?)\[/img\]\[/url\]#si", "<a href=\"http://\\1\" target=\"_blank\"><img src=\"http://\\2\" border=\"0\"></a>", $content);

        $content = preg_replace("#\[url=www.(.*?)\]\[img\]www.(.*?)\[/img\]\[/url\]#si", "<a href=\"http://www.\\1\" target=\"_blank\"><img src=\"http://\\2\" border=\"0\"></a>", $content);

        $content = preg_replace("#\[url\]http://(.*?)\[/url\]#si", "<a href=\"http://\\1\" target=\"_blank\">\\1</a>", $content);

        $content = preg_replace("#\[url\]www.(.*?)\[/url\]#si", "<a href=\"http://\\1\" target=\"_blank\">http://www.\\1</a>", $content);

        $content = preg_replace("#\[url=http://(.*?)\](.*?)\[/url\]#si", "<a href=\"http://\\1\" target=\"_blank\">\\2</a>", $content);

        $content = preg_replace("#\[url=www.(.*?)\](.*?)\[/url\]#si", "<a href=\"http://www.\\1\" target=\"_blank\">\\2</a>", $content);

        $content = preg_replace("#\[url=(.*?)\](.*?)\[/url\]#si", "<a href=\"\\1\">\\2</a>", $content);

        $content = preg_replace("#\[url\](.*?)\[/url\]#si", "<a href=\"\\1\">\\1</a>", $content);

        $content = preg_replace("#\[img\](.*?)\[/img\]#si", "<img src=\"\\1\" border=\"0\">", $content);

        $content = preg_replace("#(^|[^\"=]{1})(http://|https://|ftp://|mailto:|news:)([^\s<>]+)([\s\n<>]|$)#sm","\\1<a href=\"\\2\\3\" target=\"_blank\">\\3</a>\\4",$content);

        $content = preg_replace("#\[email\](.*?)\[/email\]#si", "<a href=\"mailto:\\1\">\\1</a>", $content);

        $content = preg_replace("#\[email=(.*?)\](.*?)\[/email\]#si", "<a href=\"mailto:\\1\">\\2</a>", $content);

        $content = preg_replace("#\[size=(.*?)\](.*?)\[/size\]#si", "<font size=\"\\1\">\\2</font>", $content);

        $content = preg_replace("#\[color=(.*?)\](.*?)\[/color\]#si", "<font color=\"\\1\">\\2</font>", $content);

        $content = preg_replace("#\[font=(.*?)\](.*?)\[/font\]#si", "<font face=\"\\1\">\\2</font>", $content);

        $content = preg_replace("#\[align=(.*?)\](.*?)\[/align\]#si", "<div align=\"\\1\">\\2</div>", $content);

        $content = preg_replace("#\[code\](.*?)\[/code\]#si", "<table width=\"100%\" cellpadding=\"4\" cellspacing=\"1\" bgcolor=\"$border\" align=\"center\"><tr><td bgcolor=\"$bg1\">\\1</td></tr></table>", $content);



        $content = preg_replace("#\[quote\]#si", "<table width=\"100%\" cellpadding=\"2\" cellspacing=\"1\" bgcolor=\"$border\" align=\"center\"><tr><td bgcolor=\"$bg1\" class=\"small\">", $content);

        $content = preg_replace("#\[quote=(.*?)\]#si", "<table width=\"100%\" cellpadding=\"2\" cellspacing=\"1\" bgcolor=\"$border\" align=\"center\"><tr><td bgcolor=\"$bg1\" class=\"small\">\\1 wrote:[hr]", $content);

        $content = preg_replace("#\[/quote\]#si", "</td></tr></table>", $content);



        $content = preg_replace("#\[img\](.*?)\[/img\]#si", "<img src=\"\\1\" border=\"0\">", $content);

        $content = preg_replace("#\[b\](.*?)\[/b\]#si", "<b>\\1</b>", $content);

        $content = preg_replace("#\[i\](.*?)\[/i\]#si", "<i>\\1</i>", $content);

        $content = preg_replace("#\[u\](.*?)\[/u\]#si", "<u>\\1</u>", $content);

        $content = preg_replace("#\[s\](.*?)\[/s\]#si", "<s>\\1</s>", $content);

        $content = preg_replace("#\[pre\](.*?)\[/pre\]#si", "<pre>\\1</pre>", $content);

        $content = preg_replace("#\[list\](.*?)\[/list\]#si", "<ul>\\1</ul>", $content);

        $content = preg_replace("#\[list=1\](.*?)\[/list=1\]#si", "<ol>\\1</ol>", $content);

        $content = preg_replace("#\[list=a\](.*?)\[/list=a\]#si", "<ol type=\"A\">\\1</ol>", $content);



        $content = preg_replace("#\[\*\](.*?)#si", "<li>\\1</li>", $content);

        $content = preg_replace ("#\[br]#si", "<br>", $content);

        $content = preg_replace ("#\[hr]#si", "<hr noshade color=\"$border\" size=\"1\">", $content);

        $content = preg_replace ("#\[center]#si", "<center>", $content);

        $content = preg_replace ("#\[/center]#si", "</center>", $content);

        $content = str_replace ("'", "`", $content);
		
		return $content;

}



function toggle($content, $id) {

        $replace1='<table width="100%">

                            <tr><td><span onClick="

                            var myelement = document.getElementById(\'ToggleImg_'.$id.'_$1\').src;

                            var signs = myelement.length;

                            var url = myelement.substr((signs-25),signs);

                            if(url == \'images/icons/collapse.gif\') {

                               document.getElementById(\'ToggleImg_'.$id.'_$1\').src = \'images/icons/expand.gif\';

                               document.getElementById(\'ToggleRow_'.$id.'_$1\').style.display = \'none\';

                            }

                            else {

                               document.getElementById(\'ToggleImg_'.$id.'_$1\').src = \'images/icons/collapse.gif\';

                               document.getElementById(\'ToggleRow_'.$id.'_$1\').style.display = \'inline\';

                            };

                            "><a href="javascript:void(0)"><img alt="read more" src="images/icons/expand.gif" border="0" id="ToggleImg_'.$id.'_$1"> $2</a></span></td></tr>

                                <tr>

                                  <td style="padding-left: 16px;"><span id="ToggleRow_'.$id.'_$1" style="display: none">';

        $replace2='</span></td></tr></table>';



        $n=1;

        while($pos = strpos(strtoupper($content), "[TOGGLE=")) {

                $start = substr($content, 0, $pos);

                $end= substr($content, $pos+7);

                $middle='[TOGGLE_'.$n;



                $content = $start.$middle.$end;

                $n++;

        }



        $content = preg_replace("#\[TOGGLE_(.*?)=(.*?)\]#si", $replace1, $content);

        $content = preg_replace("#\[/TOGGLE\]#si", $replace2, $content);

        return $content;

}



function cleartext($text,$html="") {
        if($html) $text=htmlspecialchars($text);
        $text=codereplace($text);
        $text=strip_tags($text);
        $text=smileys($text);
        $text=replacement($text);
        $text=nl2br($text);

        return $text;
}

function htmloutput($text) {
        $text=codereplace($text);
        $text=smileys($text);
        $text=replacement($text);
        $text=nl2br($text);

        return $text;
}

function clearfromtags($text,$mode="") {
    $text=strip_tags($text);
        $text=stripslashes($text);
        if(!$mode) $text=nl2br($text);
        else $text = str_replace("<br>","[br]",str_replace("<br />","[br]",$text));

        return $text;
}




function isonline($userID) {

    $ergebnis=safe_query("SELECT site FROM ".PREFIX."whoisonline WHERE userID='$userID'");

        $anz=mysql_num_rows($ergebnis);

        if($anz) {

            $ds=mysql_fetch_array($ergebnis);

                return '<b>Online</b>';

        }

        else return 'offline';

}



$cookie=false;

if (isset($ws_auth)) {

    $authent = explode(":", $ws_auth);

        $ws_user = $authent[0];

        $ws_pwd = $authent[1];

        $cookie=true;

}

$loggedin=false;

if ($cookie) {

    $check = safe_query("SELECT userID FROM ".PREFIX."user WHERE username='$ws_user' AND password='$ws_pwd'");

        while($ds=mysql_fetch_array($check)) {

        $loggedin=true;

                $userID=$ds[userID];

    }

}



$ip = getenv(REMOTE_ADDR);

$banned=safe_query("SELECT userID, banned FROM ".PREFIX."user WHERE userID='$userID' OR ip='$ip'");

while($db=mysql_fetch_array($banned)) {

        if($db[banned]) die('You have been banished.');

}



$timeout=1;

$deltime = time()-($timeout*60);

$wasdeltime = time()-(60*60*24);



safe_query("UPDATE ".PREFIX."user SET ip='$ip' WHERE userID='$userID'");

safe_query("DELETE FROM ".PREFIX."whoisonline WHERE time < '$deltime'");

safe_query("DELETE FROM ".PREFIX."whowasonline WHERE time < '$wasdeltime'");



if(!isset($site)) $site="news";

if($userID!='') {



        if(mysql_num_rows(safe_query("SELECT userID FROM ".PREFIX."whoisonline WHERE userID='$userID'"))) {

            safe_query("UPDATE ".PREFIX."whoisonline SET time='".time()."', site='$site' WHERE userID='$userID'");

                safe_query("UPDATE ".PREFIX."user SET lastlogin='".time()."' WHERE userID='$userID'");

        }

    else safe_query("INSERT INTO ".PREFIX."whoisonline (time, userID, nickname, site) VALUES ('".time()."', '$userID', '".getnickname($userID)."', '$site')");



        if(mysql_num_rows(safe_query("SELECT userID FROM ".PREFIX."whowasonline WHERE userID='$userID'")))

                safe_query("UPDATE ".PREFIX."whowasonline SET time='".time()."', site='$site' WHERE userID='$userID'");

    else safe_query("INSERT INTO ".PREFIX."whowasonline (time, userID, nickname, site) VALUES ('".time()."', '$userID', '".getnickname($userID)."', '$site')");

}

else {

    $anz = mysql_num_rows(safe_query("SELECT ip FROM ".PREFIX."whoisonline WHERE ip='$ip'"));

    if($anz) safe_query("UPDATE ".PREFIX."whoisonline SET time='".time()."', site='$site' WHERE ip='$ip'");

    else safe_query("INSERT INTO ".PREFIX."whoisonline (time, ip, site) VALUES ('".time()."','$ip', '$site')");

}



$time = time();

$date = date("d.m.Y", $time);

$deltime = $time-(3600*24);

safe_query("DELETE FROM ".PREFIX."counter_iplist WHERE del<$deltime");



$anz=mysql_num_rows(safe_query("SELECT ip FROM ".PREFIX."counter_iplist WHERE ip='$ip'"));

if(!$anz) {

    safe_query("UPDATE ".PREFIX."counter SET hits=hits+1");

        safe_query("INSERT INTO ".PREFIX."counter_iplist (dates, del, ip) VALUES ('$date', '$time', '$ip')");

}



$countries = '<option value="ar">Argentina</option><option value="au">Australia</option><option value="at" selected>Austria</option><option value="be">Belgium</option>

                             <option value="ba">Bosnia Herzegowina</option><option value="br">Brazil</option><option value="bg">Bulgaria</option><option value="ca">Canada</option>

                          <option value="cl">Chile</option><option value="cn">China</option><option value="co">Colombia</option><option value="cz">Czech Republic</option>

                          <option value="hr">Croatia</option><option value="cy">Cyprus</option><option value="dk">Denmark</option><option value="ee">Estonia</option>

                          <option value="eu">European Union</option>

                          <option value="fi">Finland</option><option value="fo">Faroe Islands</option><option value="fr">France</option><option value="de">Germany</option>

                          <option value="gr">Greece</option><option value="hu">Hungary</option><option value="is">Iceland</option><option value="ie">Ireland</option>

                          <option value="il">Israel</option><option value="it">Italy</option><option value="jp">Japan</option><option value="kr">Korea</option>

                          <option value="lv">Latvia</option><option value="lt">Lithuania</option><option value="lu">Luxemburg</option><option value="my">Malaysia</option>

                          <option value="mt">Malta</option><option value="nl">Netherlands</option><option value="mx">Mexico</option><option value="mn">Mongolia</option>

                          <option value="nz">New Zealand</option><option value="no">Norway</option><option value="pl">Poland</option>

                          <option value="ph">Philippines</option><option value="pt">Portugal</option><option value="ro">Romania</option><option value="ru">Russian Federation</option><option value="sg">Singapore</option>

                          <option value="sk">Slovak Republic</option><option value="si">Slovenia</option><option value="tw">Taiwan</option><option value="za">South Africa</option>

                          <option value="es">Spain</option><option value="se">Sweden</option><option value="sy">Syria</option><option value="ch">Switzerland</option>

                          <option value="ti">Tibet</option><option value="tn">Tunisia</option><option value="tr">Turkey</option><option value="ua">Ukraine</option>

                          <option value="uk">United Kingdom</option><option value="us">USA</option><option value="ve">Venezuela</option><option value="yu">Yugoslavia</option>';



Class CounterStrike {

    var $m_playerinfo        ="";        // Info about players

    var $m_servervars        ="";        // Info about the server current map, players etc

    var $m_serverrules  ="";        // Serverrules



    //

    // Get exact time, used for timeout counting

    //

    function timenow() {

        return doubleval(ereg_replace('^0\.([0-9]*) ([0-9]*)$','\\2.\\1',microtime()));

    }



    //

    // Read raw data from server

    //

    function getServerData($command,$serveraddress,$portnumber,$waittime) {

        $serverdata        ="";

        $serverdatalen=0;



        if ($waittime< 500) $waittime= 500;

        if ($waittime>2000) $waittime=2000;

        $waittime=doubleval($waittime/1000.0);





        if (!$cssocket=fsockopen("udp://".$serveraddress,$portnumber,$errnr)) {

            $this->errmsg="No connection";

            return "";

        }



        socket_set_blocking($cssocket,true);

        socket_set_timeout($cssocket,0,500000);

        fwrite($cssocket,$command,strlen($command));

        // Mark

        $starttime=$this->timenow();

        do {

            $serverdata.=fgetc($cssocket);

            $serverdatalen++;

            $socketstatus=socket_get_status($cssocket);

            if ($this->timenow()>($starttime+$waittime)) {

                $this->errmsg="Connection timed out";

                fclose($cssocket);

                return "";

            }

        } while ($socketstatus["unread_bytes"] );

        fclose($cssocket);

        return $serverdata;

    }



    function getnextstring(&$data) {

        $temp="";

        $counter=0;

        while (ord($data[$counter++])!=0) $temp.=$data[$counter-1];

        $data=substr($data,strlen($temp)+1);

        return $temp;

    }



    function getnextbytevalue(&$data) {

        $temp=ord($data[0]);

      $data=substr($data,1);

      return $temp;

    }



    function getnextfragvalue(&$data) {

        $frags=ord($data[0])+(ord($data[1])<<8)+(ord($data[2])<<16)+(ord($data[3])<<24);

        if ($frags>=4294967294) $frags-=4294967296;

        $data=substr($data,4);

        return $frags;

    }


    function getServerInfo($serveraddress,$portnumber,$waittime) {

        $cmd="\xFF\xFF\xFF\xFFinfo\x00";

        $serverdata=$this->getServerData($cmd,$serveraddress,$portnumber,$waittime)    ;

        // Check length of returned data, if < 5 something went wrong

        if (strlen($serverdata)<5) return false;

        // Strip OOB data

        $serverdata=substr($serverdata,5);

        $this->m_servervars["serveraddress"]    =$this->getnextstring($serverdata);

        $this->m_servervars["servername"]            =$this->getnextstring($serverdata);

        $this->m_servervars["mapname"]                =$this->getnextstring($serverdata);

        $this->m_servervars["game"]                        =$this->getnextstring($serverdata);

        $this->m_servervars["gamename"]                =$this->getnextstring($serverdata);

        $this->m_servervars["currentplayers"]    =$this->getnextbytevalue($serverdata);

        $this->m_servervars["maxplayers"]            =$this->getnextbytevalue($serverdata);

        return true;

}

}
?>