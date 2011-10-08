<?php

//Start session
session_start();

//Process login
$f = $_GET['f'];
$l = $_GET['l'];
$pwd = $_GET['pwd'];

// Use that info to login
echo("If this page does not disappear, Then either javascript is disabled or userlogin failed");

include("CONFIG/db.php");
mysql_connect($dbloc,$dbuser,$dbpass);
mysql_select_db($dbname);

$res = mysql_query("SELECT * FROM UserAccounts WHERE `FirstName`='" . $f . "' AND `LastName`='" . $l."'");

while($row = mysql_fetch_assoc($res))
{
	$_SESSION['zsysFname'] = $row['FirstName'];
	$_SESSION['zsysLname'] = $row['LastName'];
	$_SESSION['zsysUUID'] = $row['PrincipalID'];
	$uuid = $row['PrincipalID'];
}

$res = mysql_query("SELECT * FROM auth WHERE `UUID`='" . $uuid . "'");

while($row = mysql_fetch_assoc($res))
{
	$pwdhash = $row['passwordHash'];
	$pwdsalt = $row['passwordSalt'];
}
//echo("<script type='text/javascript'>alert('".$pwdhash . " " . md5(md5($pwd).":".$pwdsalt)."');</script>");
if(md5(md5($pwd) . ":".$pwdsalt) == $pwdhash)
{
	$_SESSION['zsysValid'] = "TRUE";
} else {
	session_destroy();
}
echo("<script type='text/javascript'>window.location = 'index.php';</script>");
?>

