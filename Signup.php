<?php
session_start();
$f = $_GET['f'];
$l = $_GET['l'];
$em = $_GET['email'];
$pwd = $_GET['pwd'];
$scope = "00000000-0000-0000-0000-000000000000";
$serv = "HomeURI= GatekeeperURI= InventoryServerURI= AssetServerURI= ";
$uuid = system("uuidgen");
include("CONFIG/mail.php");
include("CONFIG/db.php");
mysql_connect($dbloc,$dbuser,$dbpass);

mysql_select_db($dbname);

// Create the account
mysql_query("INSERT INTO UserAccounts VALUES('".$uuid."','".$scope."','".$f."','".$l."','".$eml."','".'".$serv."','".time()."','".'-1','0','Resident');");
$pwdsalt = md5(system("uuidgen"));
$pwdhash = md5(md5($pwd).":".$pwdsalt);
mysql_query("INSERT INTO auth VALUES('".$uuid."','".$pwdhash."','".$pwdsalt."','".$scope."','UserAccount');");

					$inv_template = array('Calling Cards' =>  2,
							      'Objects' =>  6,
							      'Landmarks' =>  3,
							      'Clothing' =>  5,
							      'Gestures' => 21,
							      'Body Parts' => 13,
							      'Textures' =>  0,
							      'Scripts' => 10,
							      'Photo Album' => 15,
							      'Lost And Found' => 16,
							      'Trash' => 14,
							      'Notecards' =>  7,
							      'My Inventory' =>  9,
							      'Sounds' =>  1,
							      'Animations' => 20
					);;

$master = system("uuidgen");

foreach($inv_template as $invfolder => $invtype)
{
	$invfldr = system("uuidgen");
	if($invtype == 9){
		$invfldr = $master;
		$parent = $scope;
	} else {
		$parent = $master;
	}
	mysql_query("INSERT INTO `inventoryFolders` VALUES('".$invfolder."','".$invtype."','1','".$invfldr."','".$uuid."','".$parent."');");
}
mail($em,"Zontreck Systems Confirmation","We need you to confirm your account: " . $f . " " . $l." .... Heres the link to your account confirmation. http://" . $domain . "/Validate.php","From: " . $from);
echo("<script type='text/javascript'>window.location = 'index.php';</script>");

?>
