<?php
session_start();

// Login to employee account
function loginfuntion($loginid,$password)
{
	//LOGIN QUERY
$resultlogin = mysql_query("SELECT * FROM employee WHERE empid ='$loginid' AND password='$password' ");

$resultlogin2 = mysql_query("SELECT * FROM employee WHERE empid ='$loginid' AND password!='$password' ");
// LOGIN VALIDATON
	if(mysql_num_rows($resultlogin) == 1)
	{
 	$_SESSION["empid"] =$loginid;
	$_SESSION["usertype"] = "EMPLOYEE";
	}

	elseif(mysql_num_rows($resultlogin2) == 1)
	{
		$is= "Invalid Password entered";
		return $is;
	}
	else
	{
	$in= "Login ID not exists.";
	return $in;
	}
}
$resultpro = mysql_query("SELECT * FROM employee WHERE empid ='$_SESSION[empid]'");

while($row = mysql_fetch_array($resultpro))
  {
$_SESSION["empname"] =  $row['empfname']. " ".$row['empmname']. " ".$row['emplname'] ; 

	 	
  }
?>
