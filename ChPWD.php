<?php
$p = $_GET['pwd'];
$np = $_GET['npwd'];
session_start();
include("CONFIG/db.php");


mysql_connect($dbloc,$dbuser,$dbpass);
mysql_select_db($dbname);

$res = mysql_query("SELECT * FROM UserAccounts WHERE FirstName='".$_SESSION['zsysFname']."'");
while($row = mysql_fetch_assoc($res))
{
	$princID = $row['PrincipalID'];
}
$res = mysql_query("SELECT * FROM auth WHERE UUID='".$princID."'");
while($row = mysql_fetch_assoc($res))
{
	if($row['passwordHash'] == md5(md5($p).":".$row['passwordSalt']))
	{
		$valid = "true";
	}
}
if($valid == "true")
{
	$pwdsalt = md5(system("uuidgen"));
	$pwdhash = md5(md5($np).":".$pwdsalt);
	mysql_query("UPDATE `auth` SET passwordHash='".$pwdhash."' WHERE UUID='".$princID."';");
	mysql_query("UPDATE `auth` SET passwordSalt='".$pwdsalt."' WHERE UUID='".$princID."';");
	echo("<script type='text/javascript'>window.location = 'index.php';</script>");
} else {
	die("<h2>Unable to change password!</h2>");
}
?>
