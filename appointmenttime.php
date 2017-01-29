<?php 
session_start();
error_reporting(E_ERROR | E_PARSE);
$menu= 1;
	$appdater = date("Y-m-d", strtotime($_POST[dateofbirth]));
include("header.php");
include("dbconnection.php");
include("functions/patient.php");
include("validation/header.php"); 
if(isset($_POST["btnlogin"]))
{
	//patient Login funtion..
$loginvalidation =  loginfuntion($_POST["loginid"],$_POST["password"]);
}
if(isset($_GET["docid"]))
{
	$_SESSION["appdocid"] = $_GET["docid"]; 
	$_SESSION["appdocname"] = $_GET["docname"];
	$_SESSION["appdocsptype"] = $_GET["sptype"];
	header("Location: makeappoint.php");
}

$resDapprec = mysql_query("SELECT * FROM appointment WHERE docid='$_SESSION[appdocid]' AND patid ='$_SESSION[patid]' AND adate='$appdater'");
$appalrdytakn = mysql_num_rows($resDapprec);

$resDapp1 = mysql_query("SELECT * FROM appointment WHERE docid='$_SESSION[appdocid]' AND atime='$wordChunks[$i]' AND adate='$appdater'");
$resDapp = mysql_query("SELECT * FROM timings WHERE docid='$_SESSION[appdocid]'");
$resDapp = mysql_query("SELECT * FROM timings WHERE docid='$_SESSION[appdocid]'");
while($row12 = mysql_fetch_array($resDapp))
  			{
		$timrec = $row12["timings"];
			}
			


$wordChunks = explode(" ", $timrec);
for($i = 0; $i < count($wordChunks); $i++)
{
		$resDapp1 = mysql_query("SELECT * FROM appointment WHERE docid='$_SESSION[appdocid]' AND atime='$wordChunks[$i]' AND adate='$appdater'");
		while($row12t = mysql_fetch_array($resDapp1))
  			{
		$timrect = $row12t["atime"];
			}
		
	if($timrect != $wordChunks[$i])
	{
	$ctime[$i] = $wordChunks[$i] ;
	}
}

if(isset($_POST["btnapp"]))
{
	
 $wordChunks = explode("-", $_POST[appdate]);
for($i = 0; $i < count($wordChunks); $i++)
{
$name[$i] = $wordChunks[$i] ;
}

if(strlen($name[1]) == 1)
{
$name[1] = "0". $name[1];
}

$apptakenrec = mysql_query("SELECT * FROM appointment WHERE docid='$_SESSION[appdocid]'");

$sql="INSERT INTO appointment(patid,atime,adate,docid,status, comment) VALUES ('$_SESSION[patid]','$_POST[radio]', '$name[2]-$name[1]-$name[0]','$_SESSION[appdocid]','Pending','$_POST[comments]')";
if (!mysql_query($sql,$con))
{
die('Error: ' . mysql_error());
}

header("Location: appointmenttaken.php");

	
}
$date1 = date("Y-m-d h:i A"); 
$date2 = date("d-m-Y"); 
	
include("menu.php"); 
 
//$arraytime=array("09:00","09:15","09:30","09:45","10:00","10:15","10:30","10:45","11:00","11:15","11:30","11:45","12:00","12:15","12:30","12:45","01:00","01:15","01:30","01:45","02:00","02:15","02:30","02:45","03:00","03:15","03:30","03:45","04:00","04:15","04:30","04:45","05:00","05:15","05:30","05:45","06:00","06:15","06:30","06:45","07:00","07:15","07:30","07:45");
?>

   
 
<!-- ####################################################################################################### -->
<div id="container">
  <div class="wrapper">
    <div id="content">
      <h1>
        <?php

 echo "Appointment Date : ".$_POST[dateofbirth]. "<br>";

 $datap = strtotime(date("d-m-Y h:i A"));
// echo strtotime(date("d-m-Y h:i"));

//echo strtotime(date("d:m:Y  h:i")) - strtotime("12:12:2015 06:10");
?>
      </h1>
      <?php
	  if($appalrdytakn == 0)
	  {
	  ?>
      
      <h1>      Appointment Time
      </h1>
      
    <form id="formID" class="formular1" method="post" action="">
       <input type="hidden" name="comments" value="<?php echo $_POST["comment"]; ?>" />
        <input type="hidden" name="appdate" value="<?php echo $_POST["dateofbirth"]; ?>">

<table width="734" border="1">
  <tr>
    <th width="253" align="center"><strong>Morning</strong></th>
    <th width="186" align="center"><strong>Afternoon</strong></th>
    <th width="273" align="center"><strong>Evening</strong></th>
   </tr>
    <tr> 
<?php


	echo "<td width='253' align='center'>";
	for ($ij=0; count($ctime) > $ij; $ij++)
  		{
	if( (strtotime($date1) < strtotime($_POST[dateofbirth]." ".$ctime[$ij]. "AM")) && ($ctime[$ij] == "09:00" || $ctime[$ij] ==  "09:15" || $ctime[$ij] == "09:30" || $ctime[$ij] == "09:45" || $ctime[$ij] == "10:00" ||$ctime[$ij] ==  "10:15" || $ctime[$ij] == "10:30" || $ctime[$ij] == "10:45" || $ctime[$ij] == "11:00" || $ctime[$ij] == "11:15" || $ctime[$ij] == "11:30" || $ctime[$ij] == "11:45"))
	{	
		echo "  <strong><input type='radio' name='radio' id='radio23' value='$ctime[$ij]'  class='validate[required] radio'/> $ctime[$ij] AM</strong><hr>";
	}
	}
	echo "</td>";
	
    echo "<td width='186' align='center'>";
	for ($ij=0; count($ctime) > $ij; $ij++)
  		{
	if( (strtotime($date1) < strtotime($_POST[dateofbirth]." ".$ctime[$ij]. "PM")) && ($ctime[$ij] == "12:00" || $ctime[$ij] == "12:15" || $ctime[$ij] == "12:30" || $ctime[$ij] == "12:45" || $ctime[$ij] == "01:00" || $ctime[$ij] == "01:15" || $ctime[$ij] == "01:30" || $ctime[$ij] == "01:45" || $ctime[$ij] == "02:00" || $ctime[$ij] == "02:15" || $ctime[$ij] == "02:30" || $ctime[$ij] == "02:45" || $ctime[$ij] == "03:00" || $ctime[$ij] == "03:15" || $ctime[$ij] == "03:30" || $ctime[$ij] == "03:45"))
	{
	echo "<strong><input type='radio' name='radio' id='radio23' value='$ctime[$ij]' class='validate[required] radio' /> $ctime[$ij] PM</strong><hr>";
	}
		}
	echo "</td>";
	
    echo "<td width='273' align='center'>";
	for ($ij=0; count($ctime) > $ij; $ij++)
  		{
	if( (strtotime($date1) < strtotime($_POST[dateofbirth]." ".$ctime[$ij]. "PM")) && ($ctime[$ij] == "04:00" || $ctime[$ij] == "04:15" || $ctime[$ij] == "04:30" || $ctime[$ij] == "04:45" || $ctime[$ij] == "05:00" || $ctime[$ij] == "05:15" || $ctime[$ij] == "05:30" || $ctime[$ij] == "05:45" || $ctime[$ij] == "06:00" || $ctime[$ij] == "06:15" || $ctime[$ij] == "06:30" || $ctime[$ij] == "06:45" || $ctime[$ij] == "07:00" || $ctime[$ij] == "07:15" || $ctime[$ij] == "07:30" || $ctime[$ij] == "07:45"))
	{
	echo "<strong><input type='radio' name='radio' id='radio23' value='$ctime[$ij]'  class='validate[required] radio'/> $ctime[$ij] PM</strong><hr>";
	}
		}
	echo "</td> ";
	
  
 ?>
</tr>
  <tr>
    <th colspan="3" align="center">  
    <input type="hidden" name="appdate" value="<?php echo $_POST[dateofbirth]; ?>">  
     <input type="submit" name="btnapp" id="btnapp" value="Click Here to Continue" /></th>
    </tr>
 </table>
 </form>
 <?php
	  }
	  else
	  {
		  ?>
   <form id="formID1" class="formular11" method="post" action="appointmenttaken.php">
        <table width="734" border="1">
          <tr>
    <th align="center"><strong>Failed</strong><strong></strong></th>
    </tr>
    <tr>
      <th align="center">Sorry!! you can't take more than one appointment for the same doctor on a day</th>
    </tr>
    <tr>
    <th align="center">  
    <input type="hidden" name="appdate" value="<?php echo $_POST[dateofbirth]; ?>">  
     <input type="submit" name="btnapp" id="btnapp" value="Click Here to Check Appointment Records" /></th>
    </tr>
 </table>
  </form>
  <?php
	  }
	  ?>
      <h2>&nbsp;</h2>
</div>
<?php include("sidemenupatient.php"); ?>
    <br class="clear" />
  </div>
</div>
<!-- ####################################################################################################### -->
<?php
include("footer.php");
?>
<!-- ####################################################################################################### -->
<?php 
include("copyright.php");
?>
