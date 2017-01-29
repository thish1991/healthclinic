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
<?php
include("menu.php"); 
$resapp1 = mysql_query("SELECT * FROM appointment where patid  ='$_SESSION[patid]'");
$i = 0;
 while($row2 = mysql_fetch_array($resapp1))
  {
$trec[$i] = $row2["appointid"];
	  $i++;
  }
?>

<!-- Patient Login Form####################################################################################################### -->
<div id="container">
  <div class="wrapper">
    <div id="content">

      <h1>Treatment</h1>
      <table width="707" border="1">
        <tr>
            <th width="74" height="58" scope="col">Treatment No.</th>
             <th width="89" scope="col">Appointment No.</th>
            <th width="281" scope="col">Doctor Name</th>
            <th width="150" scope="col">Treatment</th>
            <th width="33" scope="col">Date</th>
            <th width="40" scope="col">Time</th>
           
        </tr>
          <?php
for($j = 0; $j<$i; $j++)
{
		  $resapp1 = mysql_query("SELECT * FROM treatment where appointid='$trec[$j]'");
          while($row2 = mysql_fetch_array($resapp1))
		{
	  ?>
          <tr>
            <td>&nbsp;<?php echo $row2["treid"]; ?></td>
            <td><?php echo $row2["appointid"]; ?></td>
            <?php
            $resapp1 = mysql_query("SELECT * FROM doctor where docid='$row2[docid]'");
          		while($row3 = mysql_fetch_array($resapp1))
				{
			?>
            <td>&nbsp;<?php echo $row3["doctorname"]; ?></td>
            <?php
				}
			?>
            <td align="center">&nbsp;<?php echo $row2["treatment"]; ?><br />
              <a href="prescriptiondetails.php?patid=<?php echo $_SESSION[patid]; ?>&treid=<?php echo $row2["treid"]; ?>">Prescriptions</a></td>
            <td>&nbsp;<?php echo date("d-m-Y", strtotime($row2["date"])); ?></td>
            <td>&nbsp;<?php echo $row2["time"]; ?></td>
           </tr>
          <?php
          }
}		  
		  ?>
      </table>
      
      <a href="patientaccount.php"> < < Back </a>
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
