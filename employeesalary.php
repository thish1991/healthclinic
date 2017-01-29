<?php 
session_start();
$menu= 2;
include("dbconnection.php");
include("header.php");
include("validation/header.php"); 
include("functions/patient.php");
include("menu.php"); 
 $dt = date("Y-m-d");
// Insert records to patient table
    $empid1= $_POST['empid'];
	 $sal1= $_POST['sal'];
if ( $_POST['formsubmissionId'] == $_SESSION['nextValidSubmission'])
{
	 $_SESSION['nextValidSubmission'] = rand(1000000,9999999);
		if(isset($_POST["submit"]))
		{	 

    for($i=0; $i<sizeof($empid1); $i++)
	{
  $sql="INSERT INTO salary(date,empid,salaryamt,monthsal)
VALUES
('$dt','$empid1[$i]','$sal1[$i]','$dt')";

if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
    }

		}
}

$resapp = mysql_query("SELECT * FROM employee");
$premonth = mktime(0,0,0,date("m"),date("d")-31,date("Y"));
$pm1 = date("Y-m-01", $premonth);
 $pm2 = date("Y-m-31", $premonth);
$stdate= date("Y-m-01");
$enddate= date("Y-m-31");

$resapp1 = mysql_query("SELECT * FROM salary ");
$resapp21 = mysql_query("SELECT * FROM salary where monthsal BETWEEN '$stdate' AND '$enddate'");
$reccount= mysql_num_rows($resapp21);
?>

<!-- Patient Login Form####################################################################################################### -->
<div id="container">
  <div class="wrapper">
    <div id="content">
      <h1>Employee Salary</h1>
      <p align="left"><strong><a href="salaryreport.php">Click Here to view old salary report</a></strong></p>

      <table width="928" border="1">
      <form method="POST" action="">
      
<input type='hidden' value='<?=$_SESSION['nextValidSubmission']?>' name='formsubmissionId'>
        <tr>
          <th height="42" scope="col"><font color="#0000FF">Date:</font></th>
          <th scope="col"><font color="#FF0000">
            <label for="textfield"></label>
            <input type="text" value="<?php echo date("d-m-Y"); ?>"name="textfield" id="textfield" readonly/>
            </font></th>
          <th scope="col">Salary Month</th>
          <th scope="col"><font color="#FF0000">
            <input type="text" value="<?php echo date("M-Y"); ?>"name="textfield2" id="textfield2" readonly/>
          </font></th>
          </tr>
        <tr>
            <th width="107" height="42" scope="col"><font color="#0000FF">Emp ID</font>.</th>
            <th width="159" scope="col"><font color="#0000FF">Employee Name</font></th>
            <th width="93" scope="col"><font color="#0000FF">Designation</font> </th>
            <th width="93" scope="col"><font color="#0000FF">Salary</font> </th>
      </tr>
          <?php
		  
          while($row1 = mysql_fetch_array($resapp))
  {
	 
	  ?>
          <tr>
            <td height="44"><?php echo $row1["empid"]; ?>
            <input type="hidden" value="<?php echo $row1[empid]; ?>" name="empid[]" id="empid[]">
            </td>
            <td><?php echo $row1["empname"]; ?></td>
            <td>&nbsp;<?php echo $row1["designation"]; ?></td>
     		<td><input type="text" name="sal[]" id="sal[]" class="validate[required] text-input" value="<?php 
			$resapp2 = mysql_query("SELECT * FROM salary where empid='$row1[empid]'  AND  monthsal BETWEEN '$pm1' AND '$pm2'");
			while($row12 = mysql_fetch_array($resapp2))
  			{
	 			echo $row12["salaryamt"]; 
			}
			?>"></td>
      </tr>
         
          <?php
   }
		  ?>
           <tr>
            <td height="34">&nbsp;</td>
            <td>&nbsp;</td>
            <td></td>
            
            <td><p>Total <strong>:
                  <font color="#FF0000">
                <?php 
			$resapp21 = mysql_query("SELECT SUM(salaryamt) FROM salary");
			while($row121 = mysql_fetch_array($resapp21))
  			{
			echo $row121[0]; 
			}
			?>
                  </font>
             </strong></p></td>
        </tr>
           <tr>
             <td height="34">&nbsp;</td>
             <td>&nbsp;</td>
             <td></td>
             <td><strong>
               <input type="submit" name="submit" id="button" 
               <?php
               if($reccount >1)
               {
               echo "value='Salary Already Generated' disabled";
               }
			   else
			   {
				     echo "value='Generate Salary'";
			   }
			   ?>
               />
             </strong></td>
          </tr>
        </form>
      </table>

      <p ><a href="adminaccount.php">< < Back</a> </p>
 
      <p>&nbsp;</p>
<!-- Patient Login Form Ends Here####################################################################################################### -->
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
