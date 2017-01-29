<?php
session_start();

// Login to admin account
function loginfuntion($loginid,$password)
{
	//LOGIN QUERY
$resultlogin = mysql_query("SELECT * FROM admin WHERE adminid ='$loginid' AND password='$password' ");

$resultlogin2 = mysql_query("SELECT * FROM admin WHERE adminid ='$loginid' AND password!='$password' ");
// LOGIN VALIDATON
	if(mysql_num_rows($resultlogin) == 1)
	{
 	$_SESSION["adminid"] =$loginid;
	$_SESSION["usertype"] = "ADMIN";
	}
	
	elseif(mysql_num_rows($resultlogin2) == 1)
	{
		$is="Invalid Password entered.";
		return $is;
	}
	
	else
	{
	$in= "Login ID not Exists. ";
	return $in;
	}
	
while($row = mysql_fetch_array($resultlogin))
  {
$_SESSION["adminname"] =  $row['adminname'] ; 	 	
  }
}

?>
