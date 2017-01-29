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


$result = mysql_query("SELECT MAX(empid) FROM employee");
while($row = mysql_fetch_array($result))
  {
$maxpatid = $row[0];
$maxpatid++;
  }

//insert employee record
if(isset($_POST["button"]))
{

	 	

$sql="INSERT INTO employee(empid, password, empname, designation, address, contactno, emailid)
VALUES
('$_POST[efn2]','$_POST[password]','$_POST[efn] $_POST[emn] $_POST[eln]' ,'$_POST[desig]','$_POST[add]','$_POST[contact]','$_POST[emailid]')";

	if (!mysql_query($sql,$con))
	  {
	  die('Error: ' . mysql_error());
	  }
	  
}
?>
<div id="container">
  <div class="wrapper">
    <div id="content">  
<font color="#FF0000"><?php
if(isset($_POST["button"]))
{
	$result = mysql_query("SELECT MAX(empid) FROM employee");
while($row = mysql_fetch_array($result))
  {
$maxpatid = $row[0];
  }
	$docrec = mysql_query("SELECT * FROM employee where empid ='$maxpatid'");
while($row = mysql_fetch_array($docrec))
  	{
   
	echo "<form id='formID1' class='formular' method='post' enctype='multipart/form-data'>";
	echo "<b>Employee Record inserted successfully.. <br><br>";
	//image code ends here
	 echo "Employee ID is : $row[empid]<br><br>";
	 echo "Employee Name : $row[empname]<br><br>";
	 echo "Designation : $row[designation]<br><br>";
	  echo "Address : $row[address]<br><br>";
	   echo "Contact No : $row[contactno]<br><br>";
	    echo "Email ID : $row[emailid]<br><br>";
		

	
echo "</b></form>";
 	}
	
}
else
{
?> </font>
    
<form id="formID" class="formular" method="post"  enctype="multipart/form-data">
  
    <div align="center"><strong>Add New Employee</strong></div>

  
  <p>Employee ID
      <label for="efn2"></label>
      <input type="text" name="efn2" id="efn2"  class="validate[required,custom[onlyNumberSp]] text-input" readonly value="<?php echo $maxpatid; ?>"/>
      <label for="textfield4">Password</label>
      <input type="password" name="password" id="password"  class="validate[[required],minSize[6]] text-input"/>
      <label for="textfield3"> </label>
Confirm Password
<input type="password" name="textfield5" id="textfield5" class="validate[required,equals[password]] text-input" />
First Name
<label for="efn"></label>
      <input type="text" name="efn" id="efn"  class="validate[required,custom[onlyLetterSp]] text-input">
      
      
      Middle Name
      <input type="text" name="emn" id="emn"  class="validate[required,custom[onlyLetterSp]] text-input">
      
      
      Last Name
      <input type="text" name="eln" id="eln"  class="validate[required,custom[onlyLetterSp]] text-input">
      
      
      
      Designation 
      <input type="text" name="desig" id="desig"  class="validate[required] text-input">
    Address
<input type="text" name="add" id="add" class="validate[required] text-input"/>
      <label for="spid"></label>
      
      Contact No
      <input type="text" name="contact" id="contact" class="validate[required,custom[phone],minSize[10],maxSize[12]] text-input">
      
      
      Email ID
      <input type="text" name="emailid" id="emailid" class="validate[required,custom[email]] text-input">
  </p>
  <div align="center">
    <input type="submit" name="button" id="button" value="Add"  class="submit">
       &nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" name="button2" id="button2" value="Reset"  class="submit">
</div><br /><br />
</form>
<a href="adminemp.php">< < Back</a>
 <?php

}
?>
       
<!-- Patient Login Form Ends Here####################################################################################################### -->
 
<h2>&nbsp;</h2>
<div id="respond"></div>
    </div>
   <?php include("adminsidemenu.php"); ?>
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

