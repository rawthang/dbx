<?php if($access<5) { echo $noacc; } else { 
include("system/clanlev.php");
$sel="selected=\"selected\"";
$jid=$_GET['jid'];
if(!empty($jid)) {
$sql="SELECT * FROM joinus WHERE id='$jid'";
$data=mysql_query($sql, $db);
while ($joinus = mysql_fetch_object ($data)) {
$jnick=$joinus->nick; $jemail=$joinus->email;
$jicq=$joinus->icq; $jplace=$joinus->place; 
$jcountry=$joinus->country; } } ?>
<table style="width:90%" border="0" cellspacing="2" cellpadding="0">
<tr><td class="left"><strong>users &gt;&gt;</strong></td></tr></table><br />
<table style="width:90%" border="0" cellspacing="2" cellpadding="0"><tr><td class="main">
<form method="post" action="index.php?show=usersaction&amp;action=add" name="theform">
<table style="width:90%"><tr><td>Land</td><td class="left">
<?php include ("system/country.php"); countryselect($jcountry,"country","change1"); ?>
</td></tr><tr><td>Nick</td><td class="left">
<input type="text" name="nick" class="form" size="20" maxlength="40" value="<?php echo $jnick; ?>" />
</td></tr><tr><td>Email</td><td class="left">
<input type="text" name="email" class="form" size="30" maxlength="80" value="<?php echo $jemail; ?>" />
</td></tr><tr><td>ICQ</td><td class="left">
<input type="text" name="icq" class="form" size="15" maxlength="20" value="<?php echo $jicq; ?>" />
</td></tr><tr><td>Zugriff</td><td class="left">
<select class="form" id="axxme" name="axxme">
<option value="2">2 - Community</option>
<option value="3"<?php if(!empty($jid)) { echo $sel; } ?>>3 - Member</option>
<option value="4">4 - Admin</option>
<option value="5">5 - Webmaster</option>
</select>
</td></tr><tr><td>Clan</td><td class="left">
<select class="form" id="clanid" name="clanid">
<option value="">----</option>
<?php $sql="SELECT * FROM clans ORDER BY clan";
$data=mysql_query($sql, $db);
while ($clan = mysql_fetch_object ($data)) {
print "<option value=\"$clan->id\">$clan->clan</option>"; } ?>
</select>
</td></tr><tr><td>Eintritt <strong>*</strong></td><td class="left">
<select name="day" class="form">
<option value="">----</option>
<?php $cday=1;
while($cday<32) { print "<option value=\"$cday\">$cday</option>"; $cday++; } ?>
</select> 
<select name="month" class="form">
<option value="">----</option>
<?php $cmonth=1;
while($cmonth<13) { print "<option value=\"$cmonth\">$cmonth</option>"; $cmonth++; } ?>
</select> 
<select name="year" class="form">
<option value="">----</option>
<?php $cyear=1970; $end=date(Y) + 1;
while($cyear<$end) { print "<option value=\"$cyear\">$cyear</option>"; $cyear++; } ?>
</select>
</td></tr><tr><td>Squad</td><td class="left">
<select class="form" id="squad" name="squad">
<option value="">----</option>
<?php $sql="SELECT * FROM squads ORDER BY id";
$data=mysql_query($sql, $db);
while ($squad = mysql_fetch_object ($data)) {
print "<option value=\"$squad->short\">$squad->name</option>"; } ?>
</select>
</td></tr><tr><td>Rang</td><td class="left">
<select class="form" id="clanax" name="clanax">
<option value="">----</option>
<option value="8"><?php echo $lev1 ?></option>
<option value="7"><?php echo $lev2 ?></option>
<option value="6"><?php echo $lev3 ?></option>
<option value="5"><?php echo $lev4 ?></option>
<option value="4"><?php echo $lev5 ?></option>
<option value="3"><?php echo $lev6 ?></option>
<option value="2"><?php echo $lev7 ?></option>
<option value="1"><?php echo $lev8 ?></option>
</select>
</td></tr><tr><td>Squad2</td><td class="left">
<select class="form" id="squad2" name="squad2">
<option value="">----</option>
<?php $sql="SELECT * FROM squads ORDER BY id";
$data=mysql_query($sql, $db);
while ($squad = mysql_fetch_object ($data)) { 
print "<option value=\"$squad->short\">$squad->name</option>"; } ?>
</select>
</td></tr><tr><td>Rang2</td><td class="left">
<select class="form" id="clanax2" name="clanax2">
<option value="">----</option>
<option value="8"><?php echo $lev1 ?></option>
<option value="7"><?php echo $lev2 ?></option>
<option value="6"><?php echo $lev3 ?></option>
<option value="5"><?php echo $lev4 ?></option>
<option value="4"><?php echo $lev5 ?></option>
<option value="3"><?php echo $lev6 ?></option>
<option value="2"><?php echo $lev7 ?></option>
<option value="1"><?php echo $lev8 ?></option>
</select>
</td></tr><tr><td>Optionen</td><td class="left"> 
<input type="submit" class="form" value="Absenden" />
<input type="reset" class="form" value="Nochmal" />
</td></tr></table><br />
* &nbsp; Tag - Monat - Jahr<br />
</td></tr></table></form>
<?php } ?>