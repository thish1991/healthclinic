<?php 
session_start();
$menu= 1;
include("dbconnection.php");
include("header.php");
include("validation/header.php"); 
include("functions/patient.php");

//CHECKS login button is submitted or not

?>
<!-- ####################################################################################################### -->
<?php 
include("menu.php");
mysql_query("DELETE FROM appointment where appointid='$_GET[appiddel]'");
$resapp = mysql_query("SELECT * FROM appointment where patid='$_SESSION[patid]'");
?>

<!-- Patient Login Form####################################################################################################### -->
<div id="container">
  <div class="wrapper">
    <div id="content">

      <h1>Appointments</h1>
      <table width="605" border="1">
      <tr>
            <th width="40" height="58" scope="col">App No.</th>
            <th width="53" scope="col">Date<br />
Time</th>
            <th width="85" scope="col"><p>Appointment<br />
Date</p></th>
            <th width="89" scope="col">Appointment Time</th>
            <th width="51" scope="col"><p>Doctor Name</p></th>
            <th width="148" scope="col">Comment</th>
            <th width="42" scope="col">Status</th>
            <th width="45" scope="col">Delete</th>
          </tr>
          <?php
		  
          while($row1 = mysql_fetch_array($resapp))
  {
	  ?>
          <tr>
            <td>&nbsp;<?php echo $row1["appointid"]; ?></td>
            <td>&nbsp;<?php echo date("d-m-Y h:i:s", strtotime($row1[datetime])) ; ?></td>
            <td>&nbsp;<?php echo date("d-m-Y", strtotime($row1[adate])); ?></td>
            <td>&nbsp;<?php echo $row1["atime"]; ?></td>
            <td>&nbsp;<?php 
			 $respacdoc = mysql_query("SELECT * FROM doctor where docid='$row1[docid]'");
 while($row26ab = mysql_fetch_array($respacdoc))
{
echo $docname = $row26ab["doctorname"];
}
			?></td>
            <td>&nbsp;<?php echo $row1["comment"]; ?></td>
            <td><?php echo $row1["status"]; ?></td>
            <td><div align="center">
            <?php 
			if($row1["status"] == "Pending") {?>
            <a href="appointmenttaken.php?appiddel=<?php echo $row1["appointid"] ; ?>"><img src="images/delete-icon.png" width="16" height="16" /></a></div></td>
             <?php } ?>
          </tr>
          <?php
          }
		  ?>
        </table>
        
        <a href="patientaccount.php"> < < Back </a>
        <p><br />
        &nbsp;</p>
 
      <p>&nbsp;</p>
<!-- Patient Login Form Ends Here####################################################################################################### -->
 
<h2>&nbsp;</h2>
<div id="respond"></div>
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
