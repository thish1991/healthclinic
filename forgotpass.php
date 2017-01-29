
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

?>

<!-- Patient Login Form####################################################################################################### -->
<div id="container">
  <div class="wrapper">
    <div id="content">&nbsp;
      <p>
        <?php 
	  if(isset($_POST["btnlogin"]))
  {
	$datad = date("Y-m-d", strtotime($_POST[chdate]));	
    $sql = mysql_query("SELECT * FROM patient WHERE patid = '$_POST[loginid]' AND emailid='$_POST[emailid]' AND dob='$datad'");
	$count =  mysql_num_rows($sql);

	  echo"Invalid Information";
	
  }
  if(isset($_POST["btnlogin"]) && $count==1)
  {
  ?>
      </p>
      <p>&nbsp;<a href="forgotpass.php"> << Back </a> </p>
      <form id="formID" class="formular" method="post">
        <div align="center"><strong><b> Change Password</b></strong></div> <p><p> Login ID 
  <label for="textfield"></label>
<input type="text" name="loginid1" id="textfield" class="validate[required,custom[onlyNumberSp]] text-input"  value="<?php echo $_POST[loginid]; ?>" readonly> 
Enter New Password 
  <input type="password" name="newpass" id="textfield2"   class="validate[[required],minSize[6]] text-input">
  Confirm Password
  <input type="password" name="cnewpass" id="textfield3"  class="validate[required,equals[password]] text-input"/>
  <p>
    
    
    
  <input type="submit" name="btnupdate" id="button" value="Change Password">
    
</form>
  <p>
    <?php
  }
  elseif(isset($_POST["btnupdate"]))
  {
	  
mysql_query("UPDATE patient SET password = '$_POST[newpass]'
 WHERE patid ='$_POST[loginid1]'");
	  echo "<h2>Password Updated Successfully..</h2>";
	   echo "<h2><a href='makeappoint.php'>Click here to Login..</a></h2>";
  }
  else
  {
	  ?>
  </p>
  <p>&nbsp;<a href="makeappoint.php"> << Back </a></p>
  <form id="formID" class="formular" method="post" action="">
    <div align="center"><strong><b> Forgot Password</b></strong></div> <p><p> Login ID 
  <label for="textfield"></label>
<input type="text" name="loginid" id="textfield" class="validate[required,custom[onlyNumberSp]] text-input" >

Email ID 
  <input type="text" name="emailid" id="textfield2" class="validate[required,custom[email]] text-input" >
  Date of Birth:
  <label for="select" class="validate[required]"></label>
    <script src="datetimepicker_css.js"></script>

    <input type="Text" id="demo1" maxlength="25" size="25" name="chdate" readonly/>
        <img src="images/cal.gif" onclick="javascript:NewCssCal ('demo1','ddMMyyyy','','','','','')"  style="cursor:pointer"/>  
  <p>
    
    
    
  <input type="submit" name="btnlogin" id="button" value="Recover Password">
    <input type="reset" name="button2" id="button2" value="Reset">
    
</form>
  
  <?php 
  }
  ?>

<h2></h2>
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

