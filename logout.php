<?php 
session_start();
$menu= 1;
include("dbconnection.php");
include("header.php");
include("validation/header.php"); 
include("functions/patient.php");
include("menu.php"); 
?>

<!-- Patient Login Form####################################################################################################### -->
<div id="container">
  <div class="wrapper">
    <div id="content">
     <?php 
 if(isset($_SESSION["empid"]) || isset($_SESSION["docid"]) || isset($_SESSION["patid"])|| isset($_SESSION["adminid"]) )
{
	session_destroy();
	?>
      <h1>Login Account</h1>
      <p>&nbsp;</p>
     
      
      <form method="post"  id="formID1" class="formular" >
       <p>
<b>Logged out Successfully..</b><br><b><a href="index.php"> Click here to Home Page..</a></b><br>

        <p>
&nbsp;<br />&nbsp;
      </p>
      </form>
      <p>&nbsp;</p>
    <?php
}

?>

      
<h2>&nbsp;</h2>
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
