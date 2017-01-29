<?php
session_start();

// Login to doctors account
function loginfuntion($loginid,$password)
{
	//LOGIN QUERY
$resultlogin = mysql_query("SELECT * FROM doctor WHERE docid ='$loginid' AND password='$password' ");

$resultlogin2 = mysql_query("SELECT * FROM doctor WHERE docid ='$loginid' AND password!='$password' ");
// LOGIN VALIDATON
	if(mysql_num_rows($resultlogin) == 1)
	{
 	$_SESSION["docid"] =$loginid;
	$_SESSION["usertype"] = "DOCTOR";
	}
	
	elseif(mysql_num_rows($resultlogin2) == 1)
	{
		$is= "Invalid Password entered.";
		return $is;
	}
	else
	{
	$in= "Login ID not Exists. ";
	return $in;
	}
}
$resultpro = mysql_query("SELECT * FROM doctor WHERE docid ='$_SESSION[docid]'");

while($row = mysql_fetch_array($resultpro))
  {
$_SESSION["doctorname"] =  $row['docfname']. " ".$row['docmname']. " ".$row['doclname'] ; 	 	
  }
?>
