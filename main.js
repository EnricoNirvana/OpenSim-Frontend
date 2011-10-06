function load(signed,loggedin,regions,userfname,userlname)
{
	var CompanyName = "Zontreck Systems";
	var Version = "0.5";
	document.write("<body bgcolor='16c2a4'>");
  	document.write("<center><div id='header' style='background:white;color:green;width:350;height:30'><h2>" + CompanyName + " Frontend " + Version + "</h2></div></center>");
	document.write("<div id='users' style='background:white;width:350;height:200'>Total Users: " + signed + "<br/>Users signed in: " + loggedin + "<br/>Total Regions: " + regions + "</div>");
	document.write("<div id='username' style='background:white;width:200;height:50'>Username: " + userfname + " " + userlname + "</div>");
}
