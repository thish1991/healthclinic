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
mysql_query("DELETE FROM employee WHERE empid = '$_GET[empid]'");
$resapp = mysql_query("SELECT * FROM employee");
?>

<!-- Patient Login Form####################################################################################################### -->
<div id="container">
  <div class="wrapper">
    <div id="content">
      <h1>Employee Records</h1>
      <p align="left"><a href="employee.php"><font color="#FF0000" face="Arial Black, Gadget, sans-serif" size="3"><b><u>Add New employee</u></b></font></a></p>
      <table width="928" border="1">
        <tr>
            <th width="107" height="42" scope="col"><font color="#0000FF">Emp ID</font>.</th>
            <th width="77" scope="col"><font color="#0000FF">Password</font></th>
            <th width="159" scope="col"><font color="#0000FF">Employee Name</font></th>
            <th width="93" scope="col"><font color="#0000FF">Designation</font> </th>
            <th width="111" scope="col"><font color="#0000FF">Address</font></th>
            <th width="133" scope="col"><font color="#0000FF">Conatact No</font></th>
            <th width="107" scope="col"><font color="#0000FF">Email ID</font></th>
            <th colspan="2" scope="col"><font color="#0000FF">Action</font></th>
        </tr>
          <?php
		  
          while($row1 = mysql_fetch_array($resapp))
  {
	 
	  ?>
          <tr>
            <td height="44"><?php echo $row1["empid"]; ?>
            </td>
            
           
            <td><?php echo $row1["password"]; ?></td>
            <td><?php echo $row1["empname"]; ?></td>
            
             
            <td>&nbsp;<?php echo $row1["designation"]; ?></td>
            <td>&nbsp;<?php echo $row1["address"]; ?></td>
            <td>&nbsp;<?php echo $row1["contactno"]; ?></td>
            <td><?php echo $row1["emailid"]; ?></td>
            <td width="42"><a href="adminempprofile.php?empids=<?php echo $row1[empid]; ?>"><img src="images/icons/Actions-document-edit-icon.png" alt="" width="32" height="32"></a></td>
            <td width="41"><a href="adminemp.php?empid=<?php echo $row1[empid]; ?>" ><img src="images/icons/remove.png" alt="" width="32" height="32"></a></td>
          </tr>
          <?php
          }
		  ?>
      </table>
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
