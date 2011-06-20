-- phpMyAdmin SQL Dump
-- version 3.3.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Erstellungszeit: 20. Juni 2011 um 17:46
-- Server Version: 5.1.54
-- PHP-Version: 5.3.5-1ubuntu7.2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Datenbank: `exploit`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `cms_cat`
--

CREATE TABLE IF NOT EXISTS `cms_cat` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `cat` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Daten für Tabelle `cms_cat`
--

INSERT INTO `cms_cat` (`id`, `cat`) VALUES
(2, 'Local Exploits'),
(3, 'Shellcode'),
(4, 'Papers'),
(5, 'Web Applications'),
(6, 'DoS/PoC');

-- --------------------------------------------------------

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=162 ;

--
-- Daten für Tabelle `cms_exploit`
--

INSERT INTO `cms_exploit` (`id`, `date`, `verified`, `hits`, `autor`, `code_language`, `title`, `content`, `file`, `category`, `platform`) VALUES
(158, '2011-06-20 17:36:42', 0, 0, 'anonymous', 'bnf', 'Hello World in Brainfuck', '// Hello World in brainfuck \r\n// http://dtors.ath.cx/brainfuck.txt\r\n// Creds to Speedy\r\n&gt;+++++++++[&lt;++++++++&gt;-]&lt;.&gt;+++++++[&lt;++++&gt;-]&lt;+.+++++++..+++.[-]\r\n&gt;++++++++[&lt;++++&gt;-] &lt;.&gt;+++++++++++[&lt;++++++++&gt;-]&lt;-.--------.+++\r\n.------.--------.[-]&gt;++++++++[&lt;++++&gt;- ]&lt;+.[-]++++++++++.', 'upload/02863.jpg', 3, 43),
(160, '0000-00-00 00:00:00', 0, 0, 'anonymous', 'csharp', 'Kategory LocalExploits Windows csharp', 'Beschreibung eingeben', NULL, 1, 47),
(159, '2011-06-20 17:39:18', 1, 0, 'anonymous', 'php', 'Hello World in php', '&lt;?php\r\n// PHP \r\n&lt;?= &quot;Hello world\\n&quot;;\r\n?&gt;\r\n\r\nor\r\n\r\n&lt;?=&quot;Hello world\\n&quot; ?&gt; ', NULL, 1, 1),
(155, '2011-06-20 12:31:36', 0, 0, 'anonymous', 'bash', 'Hello World in Bash', 'Bash  \r\n#!/bin/bash  \r\necho &quot;Hello world&quot;  ', NULL, 1, 19),
(156, '2011-06-20 12:32:12', 0, 0, 'anonymous', 'perl', 'Hello World in Perl', 'Perl  \r\n#!/usr/bin perl -w  \r\nprint (&quot;hello world&quot;);', 'upload/03044.jpg', 3, 5),
(157, '2011-06-20 12:33:30', 0, 0, 'anonymous', 'cpp', 'Hello World in C++', 'Beschreibung eingeben// C++\r\n#include &lt;iostream.h&gt;\r\nint main(void)\r\n{\r\n    cout &lt;&lt; &quot;Hello World&quot; &lt;&lt; endl;\r\n    return 0;\r\n}', 'upload/02862.jpg', 4, 9);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `cms_platform`
--

CREATE TABLE IF NOT EXISTS `cms_platform` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=49 ;

--
-- Daten für Tabelle `cms_platform`
--

INSERT INTO `cms_platform` (`id`, `name`) VALUES
(2, 'Spielautomat'),
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
-- Tabellenstruktur für Tabelle `cms_title`
--

CREATE TABLE IF NOT EXISTS `cms_title` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `catid` int(100) NOT NULL,
  `date` datetime NOT NULL,
  `verifi` int(1) NOT NULL,
  `count` int(10) NOT NULL,
  `platform` varchar(255) NOT NULL,
  `authorid` int(10) NOT NULL,
  `geshi` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `catid` (`catid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Daten für Tabelle `cms_title`
--
