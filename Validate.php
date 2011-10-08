<?php
session_start();

include("CONFIG/db.php");
include("CONFIG/mail.php");
mysql_connect($dbloc,$dbuser,$dbpass);
mysql_select_Db($dbname);

$el = mysql_query("SELECT * FROM UserAccounts");
while($row = mysql_fetch_assoc($el)){
$em = $row['Email'];
}

mysql_query("UPDATE UserAccounts SET UserLevel='1'");

mail($em,"Zontreck Systems Confirmation","Your account is confirmed","From: " . $from);
die("<h2>Confirmed!</h2>");
?>

