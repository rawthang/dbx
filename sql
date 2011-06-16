-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Erstellungszeit: 16. Juni 2011 um 02:26
-- Server Version: 5.1.56
-- PHP-Version: 5.3.6

--
-- Do, 16. Juni 11
--
SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Datenbank: `iload`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `cms_blog`
--

DROP TABLE IF EXISTS `cms_blog`;
CREATE TABLE IF NOT EXISTS `cms_blog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` int(14) DEFAULT NULL,
  `rubric` int(11) DEFAULT NULL,
  `headline` varchar(255) DEFAULT NULL,
  `content` text,
  `link1` varchar(255) DEFAULT NULL,
  `url1` varchar(255) DEFAULT NULL,
  `link2` varchar(255) DEFAULT NULL,
  `url2` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Daten für Tabelle `cms_blog`
--

INSERT INTO `cms_blog` (`id`, `date`, `rubric`, `headline`, `content`, `link1`, `url1`, `link2`, `url2`) VALUES
(1, 1119175578, 1, 'Apple-Chef Steve Jobs: Eine Auszeit mit Folgen', '<b>Auch in New York bricht der Kurs der Apple-Aktie nach der Krankmeldung von Steve Jobs ein. Dabei ist noch nicht einmal genau klar, woran der Apple-Chef überhaupt leidet. Börsianer sprechen inzwischen vom „Jobs-Schock“. </b>\r\n\r\nZweiter Akt des Dramas: Die gesundheitlichen Probleme von Apple-Chef Steve Jobs haben die Aktie des iPhone-Herstellers in New York nach unten gedrückt. Im frühen Handels an der Technologiebörse Nasdaq verlor das Papier fast sechs Prozent. Das entspricht einem Börsenwert von mehr als 15 Milliarden Dollar. Im weiteren Verlauf erholte sich die Aktie allerdings wieder.\r\n\r\nJobs hatte zwar schon am Montag eine Auszeit auf unbestimmte Zeit angekündigt. Die US-Börsen hatten jedoch wegen eines Feiertages geschlossen. In Frankfurt hatte die Apple-Aktie am Vortag rund sechs Prozent eingebüßt.', 'fr-online', 'http://www.fr-online.de/wirtschaft/eine-auszeit-mit-folgen/-/1472780/5979502/-/view/asFirstTeaser/-/index.html', NULL, NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `cms_blog_rubrics`
--

DROP TABLE IF EXISTS `cms_blog_rubrics`;
CREATE TABLE IF NOT EXISTS `cms_blog_rubrics` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rubric` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=61 ;

--
-- Daten für Tabelle `cms_blog_rubrics`
--

INSERT INTO `cms_blog_rubrics` (`id`, `rubric`) VALUES
(1, 'Webseiten'),
(2, 'Allgemein'),
(3, 'IT');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `cms_exploit_cat`
--

DROP TABLE IF EXISTS `cms_exploit_cat`;
CREATE TABLE IF NOT EXISTS `cms_exploit_cat` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `cat` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Daten für Tabelle `cms_exploit_cat`
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
-- Tabellenstruktur für Tabelle `cms_exploit_platform`
--

DROP TABLE IF EXISTS `cms_exploit_platform`;
CREATE TABLE IF NOT EXISTS `cms_exploit_platform` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=49 ;

--
-- Daten für Tabelle `cms_exploit_platform`
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
-- Tabellenstruktur für Tabelle `cms_exploit_threads`
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
-- Daten für Tabelle `cms_exploit_threads`
--


-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `cms_languages`
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
-- Daten für Tabelle `cms_languages`
--

INSERT INTO `cms_languages` (`id`, `language`, `where`, `what`) VALUES
(1, 'de', 'PAGE_TITLE', 'Mein CMS'),
(2, 'en', 'PAGE_TITLE', 'My CMS'),
(3, 'de', 'SITE_NAME', 'Dies ist meine Webseite'),
(4, 'en', 'SITE_NAME', 'This is my website'),
(5, 'de', 'SLOGAN', 'Dies ist mein Motto'),
(6, 'en', 'SLOGAN', 'This is my slogan'),
(7, 'de', 'ERROR_Text', '<h2>Seite nicht gefunden...</h2>\r\n							<p>Entschuldigung, die von Ihnen gesuchte Seite existiert nicht mehr. Sie wurde möglicherweise verschoben oder gelöscht.</p>\r\n							<br/>\r\n							<ol>\r\n								<li><span>Überprüfen Sie die Web-Adresse in Ihrem Browser nach Fehlern.</span></li>\r\n								<li><span>Besuchen Sie unten einen Link.</span></li>\r\n							</ol>\r\n												<div id="MenuBarHorizontal">	\r\n								<ul class="MenuBarHorizontal">\r\n									<li class="home"><a href="#">Home</a></li>\r\n									<li class="about"><a href="#">Über</a></li>\r\n									<li class="contact"><a href="#">Impressum</a></li>\r\n								</ul>\r\n							</div>'),
(8, 'en', 'ERROR_Text', '<h2>Page not found...</h2>\r\n							<p>Sorry, it appears the page you were looking for doesn''t exist anymore, might have been moved or something else.</p>\r\n							<br/>\r\n							<ol>\r\n								<li><span>checking the web address for typos.</span></li>\r\n								<li><span>visiting the website (link to the left).</span></li>\r\n							</ol>\r\n							<br/>\r\n							<div id="MenuBarHorizontal">	\r\n								<ul class="MenuBarHorizontal">\r\n									<li class="home"><a href="#">Home</a></li>\r\n									<li class="about"><a href="#">About</a></li>\r\n									<li class="contact"><a href="#">Imprint</a></li>\r\n								</ul>\r\n							</div>');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `cms_livesearch`
--

DROP TABLE IF EXISTS `cms_livesearch`;
CREATE TABLE IF NOT EXISTS `cms_livesearch` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(255) NOT NULL,
  `cat_url` text NOT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Daten für Tabelle `cms_livesearch`
--


-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `cms_modules`
--

DROP TABLE IF EXISTS `cms_modules`;
CREATE TABLE IF NOT EXISTS `cms_modules` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Daten für Tabelle `cms_modules`
--

INSERT INTO `cms_modules` (`id`, `name`) VALUES
(1, 'home'),
(2, 'contact'),
(3, 'downloads'),
(4, 'imprint'),
(5, 'news'),
(6, 'users'),
(7, 'blog'),
(8, 'register');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `cms_settings`
--

DROP TABLE IF EXISTS `cms_settings`;
CREATE TABLE IF NOT EXISTS `cms_settings` (
  `settingID` int(11) NOT NULL AUTO_INCREMENT,
  `hpurl` varchar(255) NOT NULL DEFAULT '',
  `sitename` varchar(255) NOT NULL DEFAULT '',
  `adminname` varchar(255) NOT NULL DEFAULT '',
  `adminemail` varchar(255) NOT NULL DEFAULT '',
  `news` int(11) NOT NULL DEFAULT '0',
  `newsarchiv` int(11) NOT NULL DEFAULT '0',
  `headlines` int(11) NOT NULL DEFAULT '0',
  `headlineschars` int(11) NOT NULL DEFAULT '0',
  `topics` int(11) NOT NULL DEFAULT '0',
  `posts` int(11) NOT NULL DEFAULT '0',
  `hideboards` int(1) NOT NULL DEFAULT '0',
  `users` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`settingID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Daten für Tabelle `cms_settings`
--

INSERT INTO `cms_settings` (`settingID`, `hpurl`, `sitename`, `adminname`, `adminemail`, `news`, `newsarchiv`, `headlines`, `headlineschars`, `topics`, `posts`, `hideboards`, `users`) VALUES
(1, 'URL', 'Name', 'Admin', 'E-Mail', 1, 1, 1, 20, 1, 1, 0, 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `cms_user`
--

DROP TABLE IF EXISTS `cms_user`;
CREATE TABLE IF NOT EXISTS `cms_user` (
  `userID` int(11) NOT NULL AUTO_INCREMENT,
  `registerdate` int(14) NOT NULL DEFAULT '0',
  `lastlogin` int(14) NOT NULL DEFAULT '0',
  `username` varchar(255) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL DEFAULT '',
  `nickname` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL DEFAULT '',
  `firstname` varchar(255) NOT NULL DEFAULT '',
  `lastname` varchar(255) NOT NULL DEFAULT '',
  `sex` char(1) NOT NULL DEFAULT '',
  `country` varchar(255) NOT NULL DEFAULT '',
  `town` varchar(255) NOT NULL DEFAULT '',
  `birthday` int(14) NOT NULL DEFAULT '0',
  `icq` varchar(255) NOT NULL DEFAULT '',
  `avatar` varchar(255) NOT NULL DEFAULT '',
  `usertext` varchar(255) NOT NULL DEFAULT '',
  `userpic` varchar(255) NOT NULL DEFAULT '',
  `clantag` varchar(255) NOT NULL DEFAULT 'N/A',
  `clanname` varchar(255) NOT NULL DEFAULT 'N/A',
  `clanhp` varchar(255) NOT NULL DEFAULT '',
  `clanirc` varchar(255) NOT NULL DEFAULT 'N/A',
  `clanhistory` text,
  `cpu` varchar(255) NOT NULL DEFAULT 'N/A',
  `mainboard` varchar(255) NOT NULL DEFAULT 'N/A',
  `ram` varchar(255) NOT NULL DEFAULT 'N/A',
  `monitor` varchar(255) NOT NULL DEFAULT 'N/A',
  `graphiccard` varchar(255) NOT NULL DEFAULT 'N/A',
  `soundcard` varchar(255) NOT NULL DEFAULT 'N/A',
  `connection` varchar(255) NOT NULL DEFAULT 'N/A',
  `keyboard` varchar(255) NOT NULL DEFAULT 'N/A',
  `mouse` varchar(255) NOT NULL DEFAULT 'N/A',
  `mousepad` varchar(255) NOT NULL DEFAULT 'N/A',
  `newsletter` int(1) NOT NULL DEFAULT '1',
  `about` text NOT NULL,
  `pmgot` int(11) NOT NULL DEFAULT '0',
  `pmsent` int(11) NOT NULL DEFAULT '0',
  `visits` int(11) NOT NULL DEFAULT '0',
  `banned` int(1) NOT NULL DEFAULT '0',
  `ip` varchar(255) NOT NULL DEFAULT '',
  `topics` text NOT NULL,
  `articles` text NOT NULL,
  `comments` tinyint(1) NOT NULL DEFAULT '1',
  `newcomments` int(11) NOT NULL DEFAULT '0',
  `server` varchar(125) NOT NULL DEFAULT 'N/A',
  `rassen` varchar(255) NOT NULL DEFAULT 'N/A',
  `klassen` varchar(255) NOT NULL DEFAULT 'N/A',
  `skill` varchar(10) NOT NULL DEFAULT 'N/A',
  `wowid` varchar(15) NOT NULL DEFAULT '',
  PRIMARY KEY (`userID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Daten für Tabelle `cms_user`
--

INSERT INTO `cms_user` (`userID`, `registerdate`, `lastlogin`, `username`, `password`, `nickname`, `email`, `firstname`, `lastname`, `sex`, `country`, `town`, `birthday`, `icq`, `avatar`, `usertext`, `userpic`, `clantag`, `clanname`, `clanhp`, `clanirc`, `clanhistory`, `cpu`, `mainboard`, `ram`, `monitor`, `graphiccard`, `soundcard`, `connection`, `keyboard`, `mouse`, `mousepad`, `newsletter`, `about`, `pmgot`, `pmsent`, `visits`, `banned`, `ip`, `topics`, `articles`, `comments`, `newcomments`, `server`, `rassen`, `klassen`, `skill`, `wowid`) VALUES
(1, 1102617722, 1272213681, 'Theseus', '202cb962ac59075b964b07152d234b70', 'Theseus', 'l.adore@weibsvolk.org', 'Lars', 'B.', 'm', 'ca', 'Löhne', 454543200, '75354337', '1.jpg', 'life, love...regret', '1.jpg', 'Dacor', 'D''acor', 'www.d-acor.de', '', '[b]CS[/b]: team.hYbrid, dmk, jS, e-lamorz, tra, DkH, brd.union[br][br][b]CoD[/b]: my-r, plan-B, GaB, TlS, DivS, oFe, !n-R, p3g[br][br][b]WoW[/b]: Avalons Krieger, Black Knights', 'Intel Pentium 4 3.2 GHz (Prescott)', 'ASUS P4C800 Deluxe', 'Infinieon 1.5 GB PC2700', 'ADi 715A', 'Terratec Mistify GeForce 5800 Ultra', 'Creative Audigy 2 Platinum', 'Teleos 128 kBit Flatrate', 'Logitech Elite Keyboard', 'Logitech MX 500', 'fUnc SUrface 1030 Blau-Orange', 1, '[b]Norhtcon 2004[/b]: mit !n-R und p3g erster im 5on5 und 3on3 Call of Duty Turnier. ( Grüße an Sunshine [Jens] :D )', 7, 19, 641, 0, '127.0.0.1', '1:1119177424:4:1119173599:2:1119181425:3:1119192816:8:1119180059:7:1119180279', '', 0, 0, 'Blackmoore', 'Mensch', 'Paladin (60), Priest (13)', '(05/10/36)', '158395');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `cms_user_groups`
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Daten für Tabelle `cms_user_groups`
--