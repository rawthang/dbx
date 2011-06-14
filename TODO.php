<?php
/*****
 *In der Readme steht auch noch was 
 * 
 * PHP
 * @todo: formulare
 * 		  Für Exploit und Category wird jeweils 1 Formular benötigt. Das wird zum Erzeugen und Ändern von Einträgen verwendet. 
 * 		  Falls ein Eintrag modifiziert wird, senden wir einfach über <input type="hidden" name="id... die Datenbank id mit. 
 * 
 * 
 *@todo: listen
 *		  was sollen wir auf der startseite alles anzeigen? für jede Kategorie die aktuellsten exploits wie bei ex*db.com? Die aktuellsten aus jeden bereich?
 *		  Sachen die oft angesehen wurden? Die aktuellsten aus allen Bereichen?
 * 		  ich mach das immer so: ich lade über select* alle Einträge in ein array und kack die dann über angepasste arr_sort() funktion aus. Sollen wir einen 
 * 		  RSS feed anbieten?
 * 
 *@todo: Kategorien und Plattformen 
 * 		In der Kategorie "Local Exploits" gibt es z.b. die Plattformen linux, multiple, windows usw. Das müßten wir auch noch reinschaufeln /tabellen anlegen.
 * 		Sollen wir eine Beziehung zw. Platform und Kategorie anlegen? Ich wär dagegen, weil es z.b Remote Exploits, DoS / PoC, Local Exploits usw. für windows UND linux gibt :)
 * 		Hab die Tabelle mal angelegt, weiß aber nicht, ob da noch was fehlt...
 * 
 * @todo: Suche
 * 		Wo sollen wir überall suchen? sollen wir exploits verschlagworten - sprich tags verwenden?
 * 
 * @todo: mod-rewrite
 * 		Sollen wir das Apache Modul verwenden? Damit könnten wir semantische urls wie http://www.meine-tolle-seite.de/dos/fingerbaengs-untergang/ anlegen
 * 		
 * MYSQL
 *    @todo: wofür ist das feld cms_cat.catid gut? ich hab die mal ausgeklammert weil unique
 *    @todo: die Klasse Exploit samt Tabelle müßten wir überarbeiten....
 *    @todo: Testdaten
 * 		Habe ich mal für Kategorie und Plattform angelegt / von der exploit-seite übernommen :)
 *		
 * 
 * 
 */