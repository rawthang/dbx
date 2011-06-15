DROP TABLE IF EXISTS `cms_title`;
CREATE TABLE IF NOT EXISTS `cms_title` (
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



 DROP TABLE IF EXISTS `cms_cat`;
CREATE TABLE IF NOT EXISTS `cms_cat` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `cat` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
  
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


INSERT INTO `cms_cat` (`id`, `cat`) VALUES
(1, 'Remote Exploits'),
(2, 'Local Exploits'),
(3, 'Shellcode'),
(4, 'Papers'),
(5, 'Web Applications'),
(6, 'DoS/PoC');

DROP TABLE IF EXISTS `cms_platform`;
CREATE TABLE `cms_platform` (
`id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`name` VARCHAR( 255 ) NOT NULL
) ENGINE =MYISAM CHARACTER SET utf8 COLLATE utf8_general_ci;



INSERT INTO `cms_platform` (`name`) VALUES
('aix'),
('arm'),
('asp'),
('bsd'),
('bsd/ppc'),
('bsd/x86'),
('bsdi/x86'),
('cfm'),
('cgi'),
('freebsd'),
('freebsd/x86'),
('freebsd/x86-64'),
('generator'),
('hardware'),
('hp-ux'),
('irix'),
('jsp'),
('lin/amd64'),
('lin/x86'),
('lin/x86-64'),
('linux'),
('linux/mips'),
('linux/ppc'),
('linux/sparc'),
('minix'),
('multiple'),
('netbsd/x86'),
('netware'),
('novell'),
('openbsd'),
('openbsd/x86'),
('os-x/ppc'),
('osX'),
('php'),
('plan9'),
('QNX'),
('sco'),
('sco/x86'),
('solaris'),
('solaris/sparc'),
('solaris/x86'),
('tru64'),
('ultrix'),
('unix'),
('unixware'),
('win32'),
('win64'),
('windows');