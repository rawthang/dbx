-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Erstellungszeit: 17. Juni 2011 um 02:00
-- Server Version: 5.1.56
-- PHP-Version: 5.3.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Datenbank: `blah`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur f�r Tabelle `cms_blog`
--

DROP TABLE IF EXISTS `cms_blog`;
CREATE TABLE IF NOT EXISTS `cms_blog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` int(14) DEFAULT NULL,
  `rubric` int(11) DEFAULT NULL,
  `headline` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `content` text CHARACTER SET latin1 COLLATE latin1_general_ci,
  `link1` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `url1` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `link2` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `url2` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Daten f�r Tabelle `cms_blog`
--

INSERT INTO `cms_blog` (`id`, `date`, `rubric`, `headline`, `content`, `link1`, `url1`, `link2`, `url2`) VALUES
(1, 1119175578, 1, 'Apple-Chef Steve Jobs: Eine Auszeit mit Folgen', '<b>Auch in New York bricht der Kurs der Apple-Aktie nach der Krankmeldung von Steve Jobs ein. Dabei ist noch nicht einmal genau klar, woran der Apple-Chef �berhaupt leidet. B�rsianer sprechen inzwischen vom �Jobs-Schock�. </b>\r\n\r\nZweiter Akt des Dramas: Die gesundheitlichen Probleme von Apple-Chef Steve Jobs haben die Aktie des iPhone-Herstellers in New York nach unten gedr�ckt. Im fr�hen Handels an der Technologieb�rse Nasdaq verlor das Papier fast sechs Prozent. Das entspricht einem B�rsenwert von mehr als 15 Milliarden Dollar. Im weiteren Verlauf erholte sich die Aktie allerdings wieder.\r\n\r\nJobs hatte zwar schon am Montag eine Auszeit auf unbestimmte Zeit angek�ndigt. Die US-B�rsen hatten jedoch wegen eines Feiertages geschlossen. In Frankfurt hatte die Apple-Aktie am Vortag rund sechs Prozent eingeb��t.', 'fr-online', 'http://www.fr-online.de/wirtschaft/eine-auszeit-mit-folgen/-/1472780/5979502/-/view/asFirstTeaser/-/index.html', NULL, NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur f�r Tabelle `cms_blog_rubrics`
--

DROP TABLE IF EXISTS `cms_blog_rubrics`;
CREATE TABLE IF NOT EXISTS `cms_blog_rubrics` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rubric` varchar(255) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=61 ;

--
-- Daten f�r Tabelle `cms_blog_rubrics`
--

INSERT INTO `cms_blog_rubrics` (`id`, `rubric`) VALUES
(1, 'Webseiten'),
(2, 'Allgemein'),
(3, 'IT');

-- --------------------------------------------------------

--
-- Tabellenstruktur f�r Tabelle `cms_download`
--

DROP TABLE IF EXISTS `cms_download`;
CREATE TABLE IF NOT EXISTS `cms_download` (
  `download` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Daten f�r Tabelle `cms_download`
--

INSERT INTO `cms_download` (`download`) VALUES
('<b>Die Downloads sind in Arbeit.</b> :bounce:');

-- --------------------------------------------------------

--
-- Tabellenstruktur f�r Tabelle `cms_exploit_cat`
--

DROP TABLE IF EXISTS `cms_exploit_cat`;
CREATE TABLE IF NOT EXISTS `cms_exploit_cat` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `cat` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Daten f�r Tabelle `cms_exploit_cat`
--

INSERT INTO `cms_exploit_cat` (`id`, `cat`) VALUES
(1, 'Remote Exploits'),
(2, 'Local Exploits'),
(3, 'Shellcode'),
(4, 'Papers'),
(5, 'Web Applications'),
(6, 'DoS/PoC');

-- --------------------------------------------------------

--
-- Tabellenstruktur f�r Tabelle `cms_exploit_platform`
--

DROP TABLE IF EXISTS `cms_exploit_platform`;
CREATE TABLE IF NOT EXISTS `cms_exploit_platform` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=49 ;

--
-- Daten f�r Tabelle `cms_exploit_platform`
--

INSERT INTO `cms_exploit_platform` (`id`, `name`) VALUES
(1, 'aix'),
(2, 'arm'),
(3, 'asp'),
(4, 'bsd'),
(5, 'bsd/ppc'),
(6, 'bsd/x86'),
(7, 'bsdi/x86'),
(8, 'cfm'),
(9, 'cgi'),
(10, 'freebsd'),
(11, 'freebsd/x86'),
(12, 'freebsd/x86-64'),
(13, 'generator'),
(14, 'hardware'),
(15, 'hp-ux'),
(16, 'irix'),
(17, 'jsp'),
(18, 'lin/amd64'),
(19, 'lin/x86'),
(20, 'lin/x86-64'),
(21, 'linux'),
(22, 'linux/mips'),
(23, 'linux/ppc'),
(24, 'linux/sparc'),
(25, 'minix'),
(26, 'multiple'),
(27, 'netbsd/x86'),
(28, 'netware'),
(29, 'novell'),
(30, 'openbsd'),
(31, 'openbsd/x86'),
(32, 'os-x/ppc'),
(33, 'osX'),
(34, 'php'),
(35, 'plan9'),
(36, 'QNX'),
(37, 'sco'),
(38, 'sco/x86'),
(39, 'solaris'),
(40, 'solaris/sparc'),
(41, 'solaris/x86'),
(42, 'tru64'),
(43, 'ultrix'),
(44, 'unix'),
(45, 'unixware'),
(46, 'win32'),
(47, 'win64'),
(48, 'windows');

-- --------------------------------------------------------

--
-- Tabellenstruktur f�r Tabelle `cms_exploit_threads`
--

DROP TABLE IF EXISTS `cms_exploit_threads`;
CREATE TABLE IF NOT EXISTS `cms_exploit_threads` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `catid` int(2) NOT NULL,
  `date` datetime NOT NULL,
  `verifi` int(1) NOT NULL,
  `count` int(10) NOT NULL,
  `platformid` int(2) NOT NULL,
  `authorid` int(10) NOT NULL,
  `geshi` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `catid` (`catid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Daten f�r Tabelle `cms_exploit_threads`
--


-- --------------------------------------------------------

--
-- Tabellenstruktur f�r Tabelle `cms_languages`
--

DROP TABLE IF EXISTS `cms_languages`;
CREATE TABLE IF NOT EXISTS `cms_languages` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `language` varchar(2) NOT NULL,
  `where` varchar(255) NOT NULL,
  `what` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Daten f�r Tabelle `cms_languages`
--

INSERT INTO `cms_languages` (`id`, `language`, `where`, `what`) VALUES
(1, 'de', 'PAGE_TITLE', 'Mein CMS'),
(2, 'en', 'PAGE_TITLE', 'My CMS'),
(3, 'de', 'SITE_NAME', 'Dies ist meine Webseite'),
(4, 'en', 'SITE_NAME', 'This is my website'),
(5, 'de', 'SLOGAN', 'Dies ist mein Motto'),
(6, 'en', 'SLOGAN', 'This is my slogan'),
(7, 'de', 'ERROR_Text', '<h2>Seite nicht gefunden...</h2>\r\n							<p>Entschuldigung, die von Ihnen gesuchte Seite existiert nicht mehr. Sie wurde m�glicherweise verschoben oder gel�scht.</p>\r\n							<br/>\r\n							<ol>\r\n								<li><span>�berpr�fen Sie die Web-Adresse in Ihrem Browser nach Fehlern.</span></li>\r\n								<li><span>Besuchen Sie unten einen Link.</span></li>\r\n							</ol>\r\n												<div id="MenuBarHorizontal">	\r\n								<ul class="MenuBarHorizontal">\r\n									<li class="home"><a href="#">Home</a></li>\r\n									<li class="about"><a href="#">�ber</a></li>\r\n									<li class="contact"><a href="#">Impressum</a></li>\r\n								</ul>\r\n							</div>'),
(8, 'en', 'ERROR_Text', '<h2>Page not found...</h2>\r\n							<p>Sorry, it appears the page you were looking for doesn''t exist anymore, might have been moved or something else.</p>\r\n							<br/>\r\n							<ol>\r\n								<li><span>checking the web address for typos.</span></li>\r\n								<li><span>visiting the website (link to the left).</span></li>\r\n							</ol>\r\n							<br/>\r\n							<div id="MenuBarHorizontal">	\r\n								<ul class="MenuBarHorizontal">\r\n									<li class="home"><a href="#">Home</a></li>\r\n									<li class="about"><a href="#">About</a></li>\r\n									<li class="contact"><a href="#">Imprint</a></li>\r\n								</ul>\r\n							</div>');

-- --------------------------------------------------------

--
-- Tabellenstruktur f�r Tabelle `cms_livesearch`
--

DROP TABLE IF EXISTS `cms_livesearch`;
CREATE TABLE IF NOT EXISTS `cms_livesearch` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(255) NOT NULL,
  `cat_url` text NOT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Daten f�r Tabelle `cms_livesearch`
--


-- --------------------------------------------------------

--
-- Tabellenstruktur f�r Tabelle `cms_modules`
--

DROP TABLE IF EXISTS `cms_modules`;
CREATE TABLE IF NOT EXISTS `cms_modules` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Daten f�r Tabelle `cms_modules`
--

INSERT INTO `cms_modules` (`id`, `name`) VALUES
(1, 'home'),
(2, 'contact'),
(3, 'downloads'),
(4, 'imprint'),
(5, 'news'),
(6, 'polls'),
(7, 'users'),
(8, 'blog'),
(9, 'register');

-- --------------------------------------------------------

--
-- Tabellenstruktur f�r Tabelle `cms_news`
--

DROP TABLE IF EXISTS `cms_news`;
CREATE TABLE IF NOT EXISTS `cms_news` (
  `newsID` int(11) NOT NULL AUTO_INCREMENT,
  `date` int(14) DEFAULT NULL,
  `rubric` int(11) DEFAULT NULL,
  `lang1` char(2) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `headline1` varchar(67) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `content1` text CHARACTER SET latin1 COLLATE latin1_general_ci,
  `poster` int(11) DEFAULT NULL,
  `link1` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `url1` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `window1` int(11) DEFAULT NULL,
  `link2` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `url2` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `window2` int(11) DEFAULT NULL,
  `link3` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `url3` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `window3` int(11) DEFAULT NULL,
  `link4` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `url4` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `window4` int(11) DEFAULT NULL,
  `saved` int(1) DEFAULT NULL,
  `published` int(11) DEFAULT NULL,
  PRIMARY KEY (`newsID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Daten f�r Tabelle `cms_news`
--

INSERT INTO `cms_news` (`newsID`, `date`, `rubric`, `lang1`, `headline1`, `content1`, `poster`, `link1`, `url1`, `window1`, `link2`, `url2`, `window2`, `link3`, `url3`, `window3`, `link4`, `url4`, `window4`, `saved`, `published`) VALUES
(1, 1295377999, 0, '0', '0', '0', 1, '0', '0', 0, '0', '0', 0, '0', '0', 0, '0', '0', 0, 0, 0);

-- --------------------------------------------------------

--
-- Tabellenstruktur f�r Tabelle `cms_news_rubrics`
--

DROP TABLE IF EXISTS `cms_news_rubrics`;
CREATE TABLE IF NOT EXISTS `cms_news_rubrics` (
  `rubricID` int(11) NOT NULL AUTO_INCREMENT,
  `rubric` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `pic` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`rubricID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Daten f�r Tabelle `cms_news_rubrics`
--

INSERT INTO `cms_news_rubrics` (`rubricID`, `rubric`, `pic`) VALUES
(1, 'Allgemein', '');

-- --------------------------------------------------------

--
-- Tabellenstruktur f�r Tabelle `cms_settings`
--

DROP TABLE IF EXISTS `cms_settings`;
CREATE TABLE IF NOT EXISTS `cms_settings` (
  `settingID` int(11) NOT NULL AUTO_INCREMENT,
  `hpurl` varchar(255) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `sitename` varchar(255) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `adminname` varchar(255) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `adminemail` varchar(255) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `news` int(11) NOT NULL DEFAULT '0',
  `newsarchiv` int(11) NOT NULL DEFAULT '0',
  `headlines` int(11) NOT NULL DEFAULT '0',
  `headlineschars` int(11) NOT NULL DEFAULT '0',
  `topics` int(11) NOT NULL DEFAULT '0',
  `posts` int(11) NOT NULL DEFAULT '0',
  `hideboards` int(1) NOT NULL DEFAULT '0',
  `users` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`settingID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=2 ;

--
-- Daten f�r Tabelle `cms_settings`
--

INSERT INTO `cms_settings` (`settingID`, `hpurl`, `sitename`, `adminname`, `adminemail`, `news`, `newsarchiv`, `headlines`, `headlineschars`, `topics`, `posts`, `hideboards`, `users`) VALUES
(1, 'http://www.d-acor.de', 'D''acor', 'Theseus, Haaze', 'l.adore@weibsvolk.org', 5, 300, 7, 20, 10, 10, 1, 60);

-- --------------------------------------------------------

--
-- Tabellenstruktur f�r Tabelle `cms_user`
--

DROP TABLE IF EXISTS `cms_user`;
CREATE TABLE IF NOT EXISTS `cms_user` (
  `userID` int(11) NOT NULL AUTO_INCREMENT,
  `registerdate` int(14) NOT NULL DEFAULT '0',
  `lastlogin` int(14) NOT NULL DEFAULT '0',
  `username` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `password` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `nickname` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `email` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `firstname` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `country` varchar(255) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `avatar` varchar(255) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `usertext` varchar(255) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `userpic` varchar(255) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `hp` varchar(255) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `banned` int(1) NOT NULL DEFAULT '0',
  `ip` varchar(255) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `topics` text COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1079 ;

--
-- Daten f�r Tabelle `cms_user`
--

INSERT INTO `cms_user` (`userID`, `registerdate`, `lastlogin`, `username`, `password`, `nickname`, `email`, `firstname`, `country`, `avatar`, `usertext`, `userpic`, `hp`, `banned`, `ip`, `topics`) VALUES
(1, 1102617722, 1272213681, 'Theseus', '202cb962ac59075b964b07152d234b70', 'Theseus', 'l.adore@weibsvolk.org', 'Lars', 'ca', '1.jpg', 'life, love...regret', '1.jpg', 'www.d-acor.de', 0, '127.0.0.1', '1:1119177424:4:1119173599:2:1119181425:3:1119192816:8:1119180059:7:1119180279');

-- --------------------------------------------------------

--
-- Tabellenstruktur f�r Tabelle `cms_user_groups`
--

DROP TABLE IF EXISTS `cms_user_groups`;
CREATE TABLE IF NOT EXISTS `cms_user_groups` (
  `usgID` int(11) NOT NULL AUTO_INCREMENT,
  `userID` int(11) NOT NULL DEFAULT '0',
  `news` int(1) NOT NULL DEFAULT '0',
  `polls` int(1) NOT NULL DEFAULT '0',
  `forum` int(1) NOT NULL DEFAULT '0',
  `moderator` int(1) NOT NULL DEFAULT '0',
  `internboards` int(1) NOT NULL DEFAULT '0',
  `clanwars` int(1) NOT NULL DEFAULT '0',
  `feedback` int(1) NOT NULL DEFAULT '0',
  `user` int(1) NOT NULL DEFAULT '0',
  `page` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`usgID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

--
-- Daten f�r Tabelle `cms_user_groups`
--


-- --------------------------------------------------------

--
-- Tabellenstruktur f�r Tabelle `pastebin`
--

DROP TABLE IF EXISTS `pastebin`;
CREATE TABLE IF NOT EXISTS `pastebin` (
  `pid` int(11) NOT NULL AUTO_INCREMENT,
  `poster` varchar(16) DEFAULT NULL,
  `posted` datetime DEFAULT NULL,
  `code` text,
  `parent_pid` int(11) DEFAULT '0',
  `format` varchar(16) DEFAULT NULL,
  `codefmt` mediumtext,
  `codecss` text,
  `domain` varchar(255) DEFAULT '',
  `expires` datetime DEFAULT NULL,
  `expiry_flag` enum('d','m','f') NOT NULL DEFAULT 'm',
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Daten f�r Tabelle `pastebin`
--

INSERT INTO `pastebin` (`pid`, `poster`, `posted`, `code`, `parent_pid`, `format`, `codefmt`, `codecss`, `domain`, `expires`, `expiry_flag`) VALUES
(1, 'Test', '2011-06-15 02:25:12', '/**\r\n* default expiry time d (day) m (month) or f (forever)\r\n*/\r\n$CONF[''default_expiry'']=''m'';\r\n\r\n/**\r\n* this is the path to the script - you may want to\r\n* to use / for even shorter urls if the main script\r\n* is renamed to index.php\r\n*/\r\n$CONF[''this_script'']=''http://192.168.178.241:6978/pastebin/public_html/pastebin.php'';\r\n\r\n/**\r\n* what''s the maximum number of posts we want to keep?\r\n* Set this to 0 to have no limit on retained posts\r\n*/\r\n$CONF[''max_posts'']=0;\r\n\r\n/**\r\n* what''s the highlight char?\r\n*/\r\n$CONF[''highlight_prefix'']=''@@'';\r\n\r\n/**\r\n* how many elements in the base domain name? This is used to determine\r\n* what makes a "private" pastebin, i.e. for pastebin.com there are 2\r\n* elements ''pastebin'' and ''com'' - for pastebin.mysite.com there 3. Got it?\r\n* Good!\r\n*/\r\n$CONF[''base_domain_elements'']=2;', 0, 'php', '<div class="php" style="font-family: monospace;"><ol><li class="li1"><div class="de1"><span class="coMULTI">/**</span></div></li>\n<li class="li2"><div class="de2"><span class="coMULTI">* default expiry time d (day) m (month) or f (forever)</span></div></li>\n<li class="li1"><div class="de1"><span class="coMULTI">*/</span></div></li>\n<li class="li2"><div class="de2"><span class="re0">$CONF</span><span class="br0">&#91;</span><span class="st0">''default_expiry''</span><span class="br0">&#93;</span>=<span class="st0">''m''</span>;</div></li>\n<li class="li1"><div class="de1">&nbsp;</div></li>\n<li class="li2"><div class="de2"><span class="coMULTI">/**</span></div></li>\n<li class="li1"><div class="de1"><span class="coMULTI">* this is the path to the script - you may want to</span></div></li>\n<li class="li2"><div class="de2"><span class="coMULTI">* to use / for even shorter urls if the main script</span></div></li>\n<li class="li1"><div class="de1"><span class="coMULTI">* is renamed to index.php</span></div></li>\n<li class="li2"><div class="de2"><span class="coMULTI">*/</span></div></li>\n<li class="li1"><div class="de1"><span class="re0">$CONF</span><span class="br0">&#91;</span><span class="st0">''this_script''</span><span class="br0">&#93;</span>=<span class="st0">''http://192.168.178.241:6978/pastebin/public_html/pastebin.php''</span>;</div></li>\n<li class="li2"><div class="de2">&nbsp;</div></li>\n<li class="li1"><div class="de1"><span class="coMULTI">/**</span></div></li>\n<li class="li2"><div class="de2"><span class="coMULTI">* what''s the maximum number of posts we want to keep?</span></div></li>\n<li class="li1"><div class="de1"><span class="coMULTI">* Set this to 0 to have no limit on retained posts</span></div></li>\n<li class="li2"><div class="de2"><span class="coMULTI">*/</span></div></li>\n<li class="li1"><div class="de1"><span class="re0">$CONF</span><span class="br0">&#91;</span><span class="st0">''max_posts''</span><span class="br0">&#93;</span>=<span class="nu0">0</span>;</div></li>\n<li class="li2"><div class="de2">&nbsp;</div></li>\n<li class="li1"><div class="de1"><span class="coMULTI">/**</span></div></li>\n<li class="li2"><div class="de2"><span class="coMULTI">* what''s the highlight char?</span></div></li>\n<li class="li1"><div class="de1"><span class="coMULTI">*/</span></div></li>\n<li class="li2"><div class="de2"><span class="re0">$CONF</span><span class="br0">&#91;</span><span class="st0">''highlight_prefix''</span><span class="br0">&#93;</span>=<span class="st0">''@@''</span>;</div></li>\n<li class="li1"><div class="de1">&nbsp;</div></li>\n<li class="li2"><div class="de2"><span class="coMULTI">/**</span></div></li>\n<li class="li1"><div class="de1"><span class="coMULTI">* how many elements in the base domain name? This is used to determine</span></div></li>\n<li class="li2"><div class="de2"><span class="coMULTI">* what makes a &quot;private&quot; pastebin, i.e. for pastebin.com there are 2</span></div></li>\n<li class="li1"><div class="de1"><span class="coMULTI">* elements ''pastebin'' and ''com'' - for pastebin.mysite.com there 3. Got it?</span></div></li>\n<li class="li2"><div class="de2"><span class="coMULTI">* Good!</span></div></li>\n<li class="li1"><div class="de1"><span class="coMULTI">*/</span></div></li>\n<li class="li2"><div class="de2"><span class="re0">$CONF</span><span class="br0">&#91;</span><span class="st0">''base_domain_elements''</span><span class="br0">&#93;</span>=<span class="nu0">2</span>; </div></li></ol></div>', '/* GeSHi (c) Nigel McNie 2004 (http://qbnz.com/highlighter) */\n.php .de1, .php .de2 {font-family: ''Courier New'', Courier, monospace; font-weight: normal;}\n.php  {font-family: monospace;}\n.php .imp {font-weight: bold; color: red;}\n.php li {background: #ffffff;}\n.php li.li2 {background: #f8f8f8;}\n.php .kw1 {color: ##000088;}\n.php .kw2 {color: ##000088;}\n.php .kw3 {color: ##000088;}\n.php .co1 {color: #008800;}\n.php .co2 {color: #808080; }\n.php .coMULTI {color: #008800;}\n.php .es0 {color: #000099;}\n.php .br0 {color: #ff0000;}\n.php .st0 {color: #008888;}\n.php .nu0 {color: #cc66cc;}\n.php .me1 {color: #006600;}\n.php .me2 {color: #006600;}\n.php .re0 {color: #000088;}\n', '192.168', '2011-06-16 02:25:12', 'd');

-- --------------------------------------------------------

--
-- Tabellenstruktur f�r Tabelle `recent`
--

DROP TABLE IF EXISTS `recent`;
CREATE TABLE IF NOT EXISTS `recent` (
  `domain` varchar(255) NOT NULL DEFAULT '',
  `pid` int(11) NOT NULL,
  `seq_no` int(11) NOT NULL,
  PRIMARY KEY (`domain`,`seq_no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten f�r Tabelle `recent`
--

INSERT INTO `recent` (`domain`, `pid`, `seq_no`) VALUES
('192.168', 1, 1);








--
-- Tabellenstruktur für Tabelle `cms_exploit`
--

CREATE TABLE IF NOT EXISTS `cms_exploit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `verified` tinyint(1) NOT NULL,
  `hits` int(11) NOT NULL,
  `autor` varchar(255) NOT NULL,
  `code_language` varchar(100) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `file` varchar(255) DEFAULT NULL,
  `category` int(11) NOT NULL,
  `platform` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=160 ;

--
-- Daten für Tabelle `cms_exploit`
--

INSERT INTO `cms_exploit` (`id`, `date`, `verified`, `hits`, `autor`, `code_language`, `title`, `content`, `file`, `category`, `platform`) VALUES
(158, '2011-06-20 12:34:04', 0, 0, 'anonymous', 'bnf', 'Hello World in Brainfuck', '// Hello World in brainfuck \r\n// http://dtors.ath.cx/brainfuck.txt\r\n// Creds to Speedy\r\n&gt;+++++++++[&lt;++++++++&gt;-]&lt;.&gt;+++++++[&lt;++++&gt;-]&lt;+.+++++++..+++.[-]\r\n&gt;++++++++[&lt;++++&gt;-] &lt;.&gt;+++++++++++[&lt;++++++++&gt;-]&lt;-.--------.+++\r\n.------.--------.[-]&gt;++++++++[&lt;++++&gt;- ]&lt;+.[-]++++++++++.', 'upload/02863.jpg', 0, 0),
(159, '2011-06-20 12:34:42', 0, 0, 'anonymous', 'php', 'Hello World in php', '&lt;?php\r\n// PHP \r\n&lt;?= &quot;Hello world\\n&quot;;\r\n?&gt;\r\n\r\nor\r\n\r\n&lt;?=&quot;Hello world\\n&quot; ?&gt; ', 'upload/02925.jpg', 3, 42),
(155, '2011-06-20 12:31:36', 0, 0, 'anonymous', 'bash', 'Hello World in Bash', 'Bash  \r\n#!/bin/bash  \r\necho &quot;Hello world&quot;  ', NULL, 1, 19),
(156, '2011-06-20 12:32:12', 0, 0, 'anonymous', 'perl', 'Hello World in Perl', 'Perl  \r\n#!/usr/bin perl -w  \r\nprint (&quot;hello world&quot;);', 'upload/03044.jpg', 3, 5),
(157, '2011-06-20 12:33:30', 0, 0, 'anonymous', 'cpp', 'Hello World in C++', 'Beschreibung eingeben// C++\r\n#include &lt;iostream.h&gt;\r\nint main(void)\r\n{\r\n    cout &lt;&lt; &quot;Hello World&quot; &lt;&lt; endl;\r\n    return 0;\r\n}', 'upload/02862.jpg', 4, 9);










