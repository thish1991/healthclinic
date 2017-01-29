<?php 
session_start();
$menu= 2;
include("dbconnection.php");
include("header.php");
include("validation/header.php"); 
include("functions/patient.php");

$resresc1 = mysql_query("SELECT MAX(treid) FROM treatment");
while($rown = mysql_fetch_array($resresc1))
  	{
$countrec = $rown[0];
if($rown[0] ==0)
{
	$countrec = 1;
	}
 	}

if(isset($_POST["button"]))
{
//CHECKS login button is submitted or not`treid` ,
$dt=date("Y-m-d");
$sql="INSERT INTO treatment (docid, treatfee, treatment, date, time, appointid)
VALUES
('$_SESSION[docid]','$_POST[trefee]','$_POST[treatment]','$dt','$_POST[time]','$_POST[appid]')";
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }

$resresc = mysql_query("SELECT MAX(treid) FROM treatment");
while($row = mysql_fetch_array($resresc))
  	{
	$treid =   $row[0];
 	}
	
	if($_POST["select2"] == "Yes")
	{
		$checkbox = $_POST['ttype'];
    $countCheck = count($_POST['ttype']);

    for($i=0;$i<$countCheck;$i++) {
        $del_id = $checkbox[$i];

  		$sql="INSERT INTO labtest (`ttypeid` ,`patid`  ,`treid` )VALUES('$del_id','$_POST[patid]','$treid')";
		if (!mysql_query($sql,$con))
  		{
  		die('Error: ' . mysql_error());
  		}
		
    }
		
		
	}
	
$dt=date("d-m-Y");
mysql_query("UPDATE appointment SET status='$dt' WHERE patid='$_POST[patid]' ");
header("Location: appointmentrecords.php");
}
?>
<!-- ####################################################################################################### -->
<?php include("menu.php"); 

?>

<!-- Patient Login Form####################################################################################################### -->
<div id="container">
  <div class="wrapper">
    <div id="content">

      <h1>Treatment</h1>
<form id="formID" class="formular" method="post" action="">
<font color="#FF0000"><b> <?php if(isset($_POST["button"]))
{
	echo "<h2>Updated Treatment Successfully...</h2>";
		echo "<h2><a href='appointmentrecords.php'>Click here to Continue...</a></h2>";
}
?></b></font>
<div align="center"><strong><b> Treatment</b></strong></div>
    <input type="hidden" name="appid" id="appid" class="validate[required] text-input" value="<?php echo  $_GET["appid"]; ?>"/>
    
    <strong>Treatment ID
<input name="testid" type="text" class="validate[required] text-input" id="textfield" value="<?php echo $countrec; ?>" readonly="readonly"/>
  </p>
    </strong>
    <p><strong>Patient ID 
    <input name="patid" type="text" class="validate[required]" id="textfield2" value="<?php echo $_GET["patid"]; ?>" readonly="readonly" />
    </strong></p>
  <p><strong>  Date  
    <input name="date" type="text" id="date" value="<?php echo date("d-M-Y"); ?>" readonly="readonly"/>
  </strong></p>
  <p><strong> Time 
    <input type="text" name="time" id="time"  readonly="readonly"value="<?php echo date("h:i:s"); ?>"/>
  </strong></p>
  <p><strong>Lab Test Required  
      <select name="select2" id="select2">
        <option value="No">No</option>
        <option value="Yes">Yes</option>
      </select>
  </strong></p>
  <p><strong>Lab Test Type
      (if required)
      <?php
         $res123 = mysql_query("SELECT * FROM testtype");
		 ?>
      <select name="ttype[]" id="select" size="5" multiple>
     <?php  
     while($rowf = mysql_fetch_array($res123))
  	{
echo "<option value='$rowf[ttypeid]'>$rowf[testtype]</option>";
 	}
	?>
      </select>
      
      (Press Ctrl + to select multiple values.)
  </strong></p>
  <p><strong>Treatment Fee
      <input type="text" name="trefee" id="trefee" class="validate[required,custom[onlyNumberSp]] text-input"/>
  </strong></p>
  <p><strong>Comment</strong>
    <textarea name="treatment" id="treatment" cols="45" rows="5"></textarea>
  </p>
  <p>
    <input type="submit" name="button" id="button" value="Update Treatment Report">
    <input type="reset" name="button2" id="button2" value="Reset">
</p>
</form>

<p><br />
          &nbsp;
      </p>
 
      <p>&nbsp;</p>
<!-- Patient Login Form Ends Here####################################################################################################### -->
 
<h2>&nbsp;</h2>
<div id="respond"></div>
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