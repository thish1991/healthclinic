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
mysql_query("DELETE FROM patient WHERE patid = '$_GET[paid]'");
if(isset($_POST["patidbtn"]))
{
$resapp = mysql_query("SELECT * FROM patient where patid='$_POST[textfield]'");
$_POST[textfield2] ="";
}
else if(isset($_POST["patcontbtn"]))
{
	$resapp = mysql_query("SELECT * FROM patient where contactno='$_POST[textfield2]'");
		$_POST[textfield]="";
}
else
{
	$resapp = mysql_query("SELECT * FROM patient");
}
?>

<!-- Patient Login Form####################################################################################################### -->
<div id="container">
  <div class="wrapper">
    <div id="content">
      <h1>Patient Records      </h1>
    
       <form method="post" action="" id="formID">

     <strong>Search by Patient ID.</strong>
      &nbsp; 
          <input type="text" name="textfield" id="textfield" class="validate[custom[onlyNumberSp]] text-input" value="<?php echo $_POST[textfield]; ?>"/> &nbsp; 
          <input type="submit" name="patidbtn" id="button" value="Search" />
    <br />
          <strong>Search by Contact No.</strong>
  &nbsp; <input type="text" name="textfield2" id="textfield2" class="validate[custom[onlyNumberSp]] text-input" value="<?php echo $_POST[textfield2]; ?>"/> &nbsp;
           <input type="submit" name="patcontbtn" id="button2" value="Search" />

        </form>
 
      <p>&nbsp;</p>
      <table width="1157" border="1">
        <tr>
          <th width="121" height="30" scope="col"><font color="#0000FF">Patient ID</font></th>
          <th width="160" scope="col"><font color="#0000FF">Patient Name</font></th>
          <th width="105" scope="col"><font color="#0000FF">Date of Birth</font></th>
          <th width="130" scope="col"><font color="#0000FF">Gender</font></th>
          <th width="115" scope="col"><font color="#0000FF">Email ID</font></th>
          <th width="112" scope="col"><font color="#0000FF">Contact No</font></th>
          <th width="189" scope="col"><font color="#0000FF">Address</font></th>
          <th width="81" scope="col"><font color="#0000FF">Blood Group</font></th>
          <th colspan="2" scope="col">Action</th>
        </tr>
        <?php
		  
          while($row1 = mysql_fetch_array($resapp))
  {
	 
	  ?> 	 
        <tr>
          <td height="40"><?php echo $row1["patid"]; ?></td>
          <td><?php echo $row1["patfname"]. " ".$row1["patlname"]; ?></td>
          <td><?php echo $row1["dob"]; ?></td>
          <td><?php echo $row1["gender"]; ?></td>
          <td><?php echo $row1["emailid"]; ?></td>
          <td>&nbsp;<?php echo $row1["contactno"]; ?></td>
          <td><?php echo $row1["address"]. "". $row1["city"]. "". $row1["country"]; ?></td>
          <td><?php echo $row1["bloodgroup"]; ?></td>
          <td width="44"><a href="patientmorereport.php?paid=<?php echo $row1[patid]; ?>" ><img src="images/more.jpg" width="40" height="33" /></a></td>
          <td width="36"><a href="patientrecords.php?paid=<?php echo $row1[patid]; ?>" ><img src="images/icons/remove.png" alt="" width="32" height="32" /></a></td>
        </tr>
        <?php
          }
		  ?>
      </table>
      <p align="left">&nbsp;</p>
   
      <p ><a href="adminaccount.php">< < Back</a> </p>
 
      <p>&nbsp;</p>
<!-- Patient Login Form Ends Here####################################################################################################### -->
 <div id="respond"></div>
    </div>
    
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
