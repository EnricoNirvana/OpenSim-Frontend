<?
session_start();
echo("<script type='text/javascript' src='main.js'></script>");
include("CONFIG/db.php");

//Connect 
mysql_connect($dbloc,$dbuser,$dbpass);
mysql_Select_db($dbname);

//Run standardized query!

$users = mysql_query("SELECT * FROM UserAccounts");

$usertotal = mysql_num_rows($users);

$loggedin = mysql_query("SELECT * FROM Presence");
$logged = mysql_num_rows($loggedin);

$reg = mysql_query("SELECT * FROM regions");
$regions = mysql_num_rows($reg);

//Create the webpage
echo("<body onload='load(\"" . $usertotal . "\",\"" . $logged . "\",\"" . $regions . "\",\"" . $_SESSION['zsysfrontendFname'] . "\",\"" . $_SESSION['zsysfronendLname'] . "\")'>");

?>
