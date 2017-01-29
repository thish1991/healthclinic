<?php 
session_start();
$menu= 1;
include("dbconnection.php");
include("header.php");
include("validation/header.php"); 
include("functions/admin.php");
?>
<!-- ####################################################################################################### -->
<?php include("menu.php");
if(isset($_POST[btnupdate]))
{
$sql = mysql_query("SELECT * FROM patient WHERE patid = '$_POST[loginid1]' AND password='$_POST[password]'");
$count =  mysql_num_rows($sql);
	if($count == 1)
	{
	$resrec= mysql_query("UPDATE patient SET password='$_POST[newpass]' WHERE patid = '$_POST[loginid1]' ");
	$success= "Password is Changed successfully...";
	}
	else
	{
		$validcheck = "Old password is not valid..";
	}
}
?>

<!-- Patient Login Form####################################################################################################### -->
<div id="container">
  <div class="wrapper">
    <div id="content">&nbsp;
      <p>&nbsp;</p>
      <p>&nbsp;<a href="patientaccount.php"> << Back </a></p>
      <p>
      
</p>
      <form id="formID" class="formular" method="post" action="">
        <div align="center"><strong><b> Change Password</b></strong>  </div> 
       <p><font color="#FF0000"><b><?php echo $validcheck; ?><?php echo $success; ?></b></font><p> Login ID 
  <label for="textfield"></label>
<input type="text" name="loginid1" id="textfield" class="validate[required,custom[onlyNumberSp]] text-input" value="<?php echo $_SESSION["patid"]; ?>" readonly>

Enter old Password 
  <input type="password" name="password" id="password"  class="validate[[required],minSize[6]] text-input"  ?>
  Enter New Password 
  <input type="password" name="newpass" id="newpass"  class="validate[[required],minSize[6]] text-input" >
  Confirm Password
  <input type="password" name="cnewpass" id="cnewpass"  class="validate[required,equals[newpass]] text-input" />
  <p>
    
    
    
  <input type="submit" name="btnupdate" id="button" value="Change Password">
    
</form>
      <p>
 <?php
  
 ?> 
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

