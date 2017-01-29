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
	
if ( $_POST['formsubmissionId'] == $_SESSION['nextValidSubmission'])
{
	 $_SESSION['nextValidSubmission'] = rand(1000000,9999999);
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
      <h1>Adding Prescription</h1>
      <p>&nbsp;</p>
 
  
<form id="formID"  method="post" action="prescriptionadd.php">

<input type='hidden' value='<?=$_SESSION['nextValidSubmission']?>' name='formsubmissionId'>
<table width="561" border="1">
  <tr>
    <td colspan="2"><div align="center"><strong><b>Prescription</b></strong></div></td>
    </tr>
  <tr>
    <td width="130"><label for="day">Patient ID:</label></td>
    <td width="639"><input type="text" name="patid" id="patid" readonly="readonly" value="<?php echo $patids;?>" /></td>
  </tr>
  <tr>
    <td>Treatment ID:</td>
    <td><input type="text" name="treid" id="treid" readonly="readonly" value="<?php echo $treid;?>" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="32">Medicine:</td>
    <td>Name
      <?php
         $res123 = mysql_query("SELECT * FROM medicine");
		 ?>
      <select name="med" id="med" class="validate[required] text-input" >
        <option value="">Select</option>
     <?php  
     while($rowf = mysql_fetch_array($res123))
  	{
echo "<option value='$rowf[medicine]'>$rowf[medicine]</option>";
 	}
	?>
      &nbsp;&nbsp;Days
      <input name="day" type="text" class="validate[required,custom[onlyNumberSp]] text-input" id="day" size="5" />
      <select name="dos" id="dos" class="validate[required] text-input" >
        <option value="">Select</option>
        <option value="0-0-1">0-0-1</option>
        <option value="0-1-0">0-1-0</option>
        <option value="0-1-1">0-1-1</option>
        <option value="1-0-0">1-0-0</option>
        <option value="1-0-1">1-0-1</option>
        <option value="1-1-0">1-1-0</option>
        <option value="1-1-1">1-1-1</option>
      </select>
      <input type="submit" name="button" id="button" value="Add"   class="submit"/></td>
  </tr>
  <tr>
    <td colspan="2"><table width="775" border="1">
      <tr>
        <td width="329">Medicine Name</td>
        <td width="114">Days</td>
        <td width="254">Dosage</td>
        <td width="50">Delete</td>
      </tr>
      <?php
	   $resultcs = mysql_query("SELECT * FROM prescription where patid='$patids' AND treid='$treid'");
	 // echo $_SESSION["abd"];
	  while($rowdq = mysql_fetch_array($resultcs))
  {
		echo "<tr>".	 $rowdq["medicine"];
         echo "<td><a href='prescriptionadd.php?presdelid=$rowdq[presid]&patid=".$patids."&treid=". $treid ."'><img src='images/delete-icon.png' width='16' height='16' /></a></td></tr>";
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
    <?php include("doctorssidemenu.php"); ?>
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
