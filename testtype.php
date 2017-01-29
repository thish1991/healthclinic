<?php 
session_start();
$menu= 1;
include("dbconnection.php");
include("header.php");
include("validation/header.php"); 
include("functions/admin.php");
if(isset($_GET["presdelid"]))
{
	mysql_query("DELETE FROM testtype WHERE ttypeid = '$_GET[presdelid]'");
}
if(isset($_POST["button"]))
{
$sql="INSERT INTO testtype (testtype ,descript) VALUES ( '$_POST[abc1]', '$_POST[abc3]')";

if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
}
//CHECKS login button is submitted or not
if(isset($_POST["btnlogin"]))
{
	//patient Login funtion..
$loginvalidation =  loginfuntion($_POST["loginid"],$_POST["password"]);
}
?>
<!-- ####################################################################################################### -->
<?php include("menu.php"); 
?>

<!-- Patient Login Form####################################################################################################### -->
<div id="container">
  <div class="wrapper">
    <div id="content">
<a href="adminaccount.php"> << Back</a>
<form id="formID" class="formular" method="post" action=''>
  <div align="center"><strong><b> <u>Test Types</u></b></strong></div>
 <p> Test Type 
  <label for="textfield"></label>
<input type="text" name="abc1" id="abc1" class="validate[required] text-input">



Description 
  <label for="textarea"></label>
  <textarea name="abc3" id="textarea" cols="45" rows="5"></textarea>

  <p>
    <input type="submit" name="button" id="button" value="Add">
    
   <a href="adminaccount.php"> <input type="reset" name="button3" id="button3" value="Reset"></a>
  </form><br />
<table width="1000" border="1">
  <tr bgcolor="#FFFFFF">
    <td width="350"><font color="#0033FF"><b>Test Type</b></font></td>
    
    <td width="500"><font color="#0033FF"><b>Description</b></font></td>
    <td width="128"><font color="#0033FF"><b>Delete</b></font></td>
  </tr>
  <?php
  $resresc = mysql_query("SELECT * FROM testtype");
while($row = mysql_fetch_array($resresc))
  	{	 
echo " <tr>";
echo "    <td>&nbsp; $row[testtype]</td>";
echo "    <td>&nbsp; $row[descript]</td>";
echo "    <td><a href='testtype.php?presdelid=$row[ttypeid]'><img src='images/delete-icon.png' width='16' height='16' /></a></td>";
echo "  </tr>";
	}
	?>
</table>


<table width="1000" border="1">
</table>

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

