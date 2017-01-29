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
<?php include("menu.php"); 
$resapp123 = mysql_query("SELECT * FROM labtest where patid  ='$_SESSION[patid]'");
?>

<!-- Patient Login Form####################################################################################################### -->
<div id="container">
  <div class="wrapper">
    <div id="content">

      <h1>Laboratory Report</h1>
      <table width="707" border="1">
        <tr>
            <th width="116" height="32" scope="col">Test No.</th>
            <th width="73" scope="col">Lab Assistant</th>
            <th width="73" scope="col">Date</th>
            <th width="89" scope="col">Time</th>
            <th width="33" scope="col">Treatment No.</th>
            <th width="34" scope="col">Comment</th>
        </tr>
          <?php
		  
          while($row1 = mysql_fetch_array($resapp123))
  {
	  ?>
          <tr>
            <td>&nbsp;<?php echo $row1["testid"]; ?></td>
            <?php
            $resapp1234 = mysql_query("SELECT * FROM employee where empid   ='$row1[empid]'");
			 while($row12 = mysql_fetch_array($resapp1234))
  			 {
 				echo "<td>&nbsp;$row12[empname]</td> ";
 			 }
			?>
            <td>&nbsp;<?php echo $row1["date"]; ?></td>
            <td>&nbsp;<?php echo $row1["time"]; ?></td>
            <td>&nbsp;<?php echo $row1["treid"]; ?></td>
            <td><?php echo $row1["comment"]; ?></td>
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