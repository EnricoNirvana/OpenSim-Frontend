function load(signed,loggedin,regions,userfname,userlname)
{
	var CompanyName = "Zontreck Systems";
	var Version = "0.5";
	document.write("<body bgcolor='16c2a4'>");
  	document.write("<center><div id='header' style='background:white;color:green;width:350;height:30'><h2>" + CompanyName + " Frontend " + Version + "</h2></div></center>");
	document.write("<div id='users' style='background:white;width:350;height:60'>Total Users: " + signed + "<br/>Users signed in: " + loggedin + "<br/>Total Regions: " + regions + "</div>");
	document.write("<center><div id='username' style='background:white;width:250;height:20'>Username: " + userfname + " " + userlname + "</div></center>");
	if(userfname == ""){
		document.write("<div id='menu' style='background:white;width:1000;height:20'>");
		document.write("<a onclick='login()'>Login</a> ");
		document.write("<a onclick='signup()'>Signup</a> ");
	}
}
function login()
{
	var userfname = prompt("User firstname");
	var userlname = prompt("User lastname");
	window.location = "Login.php?f=" + userfname + "&l=" + userlname;
}
function signup()
{
	var userfname = prompt("Desired Avatar firstname");
	var userlname = prompt("Desired Avatar lastname");
	var password = prompt("Desired password");
	var passwordConf = prompt("Confirm");
	if(password == passwordConf){
		window.location = "Signup.php?f=" + userfname + "&l=" + userlname + "&pwd=" + password;
	}
}
