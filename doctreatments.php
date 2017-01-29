<?php 
session_start();
$menu= 2;
include("dbconnection.php");
include("header.php");
include("validation/header.php"); 
include("functions/patient.php");

//CHECKS login button is submitted or not

?>
<!-- ####################################################################################################### -->
<?php include("menu.php"); 
$resapp = mysqli_query($con,"SELECT * FROM treatment where docid='$_SESSION[docid]'");
?>

<!-- Patient Login Form####################################################################################################### -->
<div id="container">
  <div class="wrapper">
    <div id="content">

<a href="doctoraccount.php"> < < Back </a>
      <h1>Treatment Reports</h1>
      <table width="510" border="1">
        <tr>
            <th width="116" height="58" scope="col">Treatment No.</th>
            <th width="73" scope="col">Patient ID</th>
            <th width="73" scope="col">Appointment No.</th>
            <th width="61" scope="col"><p>Treatment</p></th>
            <th width="62" scope="col">Date</th>
            <th width="89" scope="col">Time</th>
        </tr>
          <?php
		  
          while($row1 = mysqli_fetch_array($resapp))
  {
	  ?>
          <tr>
            <td>&nbsp;<?php echo $row1["appointid"]; ?></td>
            <td>&nbsp;<?php 
			$respatrec = mysqli_query($con,"SELECT * FROM appointment where appointid='$row1[appointid]'");
			while($row12 = mysqli_fetch_array($respatrec))
 			 {
			echo $row12["patid"]; 
			 }
			?></td>
            <td><?php echo $row1["docid"]; ?></td>
            <td><?php echo $row1["treatment"]; ?></td>
            <td><?php echo $row1["date"]; ?></td>
            <td>&nbsp;<?php echo $row1["time"]; ?></td>
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

