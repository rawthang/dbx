<?php
extract($_REQUEST);

echo $title_download;

$ergebnis=safe_query("SELECT * FROM ".PREFIX."download");
if(mysql_num_rows($ergebnis)) {
    $ds=mysql_fetch_array($ergebnis);

        $download=htmloutput($ds[download]);
        $download=toggle($download, 1);

        $bg1=BG_1;
        eval ("\$download = \"".gettemplate("download")."\";");
        echo $download;
}
else echo'No Downloads available!';
?>