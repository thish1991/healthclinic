<?php 
session_start(); 
error_reporting(E_ERROR | E_PARSE);
$menu= 2;
include("dbconnection.php");
include("header.php");
include("validation/header.php"); 
include("functions/patient.php");

//CHECKS login button is submitted or not

?>
<!-- ####################################################################################################### -->
<?php include("menu.php"); 

if(isset($_POST[dtar]))
{
	$datad = date("Y-m-d", strtotime($_POST[dtar]));
}
else
{
$datad = date("Y-m-d");
}
$resapp = mysql_query("SELECT * FROM appointment where adate ='$datad' AND docid='$_SESSION[docid]'");

$resapp = mysql_query("SELECT * FROM appointment where adate ='$datad' AND docid='$_SESSION[docid]'");

?>



<!-- Patient Login Form####################################################################################################### -->
<div id="container">
  <div class="wrapper">
    <div id="content">
    <a href="doctoraccount.php"> < < Back </a>
<p>&nbsp;</p>
      <h1>Appointments      </h1>
      <p>      <form method="post" action="">
      
      <table width="465" border="1">
        <tr>
          <td width="152"><label for="textfield"><strong>Date :<?php  echo date("d-M-Y", strtotime($datad)); ?></strong></label></td>
          <td width="204"><script src="datetimepicker_css.js"></script>
            <input type="text" id="demo1" maxlength="25" readonly="readonly" size="25" name="dtar" />
          <img src="images2/cal.gif" alt="" width="21" height="22" style="cursor:pointer" onclick="javascript:NewCssCal ('demo1','ddMMyyyy','','','','','')" /></td>
          <td width="87"><input type="submit" name="button" id="button" value="Search" /></td>
        </tr>
      </table></form></p>
      <table width="709" border="1">
      <tr>
            <th width="124" height="42" scope="col">App No.</th>
            <th width="54" scope="col">Patient ID</th>
            <th width="102" scope="col">Patient Name</th>
            <th width="78" scope="col">Date 
            </th>
            <th width="95" scope="col">Appointment Time</th>
            <th width="74" scope="col">Comment</th>
            <th width="136" scope="col"><p>Status</p></th>
          </tr>
          <?php

          while($row1 = mysql_fetch_array($resapp))
  {
	  $respac = mysql_query("SELECT * FROM patient where patid='$row1[patid]'");
	  ?>
          <tr>
            <td height="60">&nbsp;<?php echo $row1["appointid"]; ?></td>
            <td><?php echo $row1["patid"]; ?></td>
            <?php
                while($row26 = mysql_fetch_array($respac))
  {
	  ?>
            <td><?php echo $row26["patfname"]; ?></td>
            <?php
  }
  ?>
            <td>
			<?php echo date("d-m-Y", strtotime($row1["adate"])); ?></td>
            <td>&nbsp;<?php echo $row1["atime"]; ?></td>
            <td>&nbsp;<?php echo $row1["comment"]; ?></td>
            <td align="center"> <p><strong><?php echo $row1["status"]; ?><br /></strong><strong>
            <a href="treatment.php?appid=<?php echo $row1[appointid]; ?>&patid=<?php echo $row1[patid]; ?>&docid=<?php echo $row1[docid]; ?>">Update</a>
            </strong><br />
            <strong>
<?php            
if($row1[status] != "Pending")
{
?>
            <a href="prescriptionadd.php?appid=<?php echo $row1[appointid]; ?>&amp;patid=<?php echo $row1[patid]; ?>&amp;docid=<?php echo $row1[docid]; ?>">Prescription</a></strong>  
<?php
}
?>
</p></td>
          </tr>
          <?php
          }
		  ?>
      </table>
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
