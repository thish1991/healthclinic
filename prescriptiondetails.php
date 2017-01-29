<?php 
session_start();
include("dbconnection.php");
include("header.php");
include("validation/header.php"); 
include("functions/patient.php");

$menu= 2;
if(isset($_GET["patid"]))
{
	$patids = $_GET["patid"];
	$apid= $_GET["appid"];
	
  $resultac = mysql_query("SELECT * FROM treatment where appointid='$apid'");
while($rowd = mysql_fetch_array($resultac))
  {
$treid= $rowd["treid"];
  }
}
else
{
	$patids = $_POST["patid"]; 
	$treid = $_POST["treid"];
	
   

	if(isset($_POST["button"]))
	{
	//mysql_query("UPDATE prescription SET medicine = ( medicine,  ' $_POST[med]') WHERE treid = '$_POST[treid]'");
$abd =   "<td>&nbsp;" . $_POST["med"] ."</td><td>&nbsp;" . $_POST["day"]. "</td><td>&nbsp;" . $_POST["dos"] . "</td>";

$sql="INSERT INTO prescription(patid,treid,medicine) VALUES ('$patids','$treid','$abd')";
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
 	}
}
  if(isset($_GET["presdelid"]))
	{
		$patids = $_GET["patid"]; 
	$treid = $_GET["treid"];
	mysql_query("DELETE FROM prescription WHERE presid='$_GET[presdelid]'");
	}
?>
<!-- ####################################################################################################### -->
<?php include("menu.php"); ?>
<!-- ####################################################################################################### -->
<!-- ####################################################################################################### -->
<div id="container">
  <div class="wrapper">
    <div id="content">
      <h1>View Prescription</h1>
      <p>&nbsp;</p>
 
  
<form id="formID"  method="post" action="prescriptionadd.php">


<table width="561" border="1">
  <tr>
    <td colspan="2"><div align="center"><strong><b>Prescription</b></strong></div></td>
    </tr>
  <tr>
    <td width="130"><label for="day">Patient ID:</label></td>
    <td width="639"><input type="text" name="patid" id="patid" class="validate[required] text-input" value="<?php echo $patids;?>" disabled/></td>
  </tr>
  <tr>
    <td>Treatment ID:</td>
    <td><input type="text" name="treid" id="treid" class="validate[required] text-input" value="<?php echo $_GET[treid];?>"  disabled/></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2"><table width="775" border="1">
      <tr>
        <td width="329">Medicine Name</td>
        <td width="114">Days</td>
        <td width="254">Dosage</td>
<?php
if(isset($_SESSION[patid]))
{
}
else
{
?>
        <td width="50">Delete</td>
        <?php
}
?>
        </tr>
      <?php
	   $resultcs = mysql_query("SELECT * FROM prescription where patid='$_SESSION[patid]' AND treid='$_GET[treid]'");
	 // echo $_SESSION["abd"];
	  while($rowdq = mysql_fetch_array($resultcs))
  {
		echo "<tr>".	 $rowdq["medicine"];
if(isset($_SESSION[patid]))
{
}
else
{
         echo "<td><a href='prescriptionadd.php?presdelid=$rowdq[presid]&patid=".$patids."&treid=". $treid ."'><img src='images/delete-icon.png' width='16' height='16' /></a></td></tr>";
       }
	    }
		?>
      </table></td>
  </tr>
  <tr>
    <td colspan="2">
  </tr>
</table>
</form>

      <p>&nbsp;</p>

      <div id="respond">
    </div>
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
