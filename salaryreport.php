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
	
	 $stdate =$_POST['name3'] ."-". $_POST['name2']."-01";
	 $enddate = $_POST['name3'] ."-". $_POST['name2']."-31";

$resapp1 = mysql_query("SELECT * FROM salary ");
$resapp21 = mysql_query("SELECT * FROM salary where monthsal BETWEEN '$stdate' AND '$enddate'");

?>

<!-- Patient Login Form####################################################################################################### -->
<div id="container">
  <div class="wrapper">
    <div id="content">
      <h1>Salary Report</h1>
      <table width="524" border="1">
      <form method="post" action="">
        <tr>
          <td width="245">
		  <?php
			//include this to check future date
			$tomorrow = mktime(0,0,0,date("m"),date("d"),date("Y"));
 			$tdate= date("31/m/Y", $tomorrow);
			//future date ends here
			?>    <input type="hidden" name="todate" id="todate" value="<?php echo $tdate; ?>">
		  <script src="datetimepicker_css.js"></script>
            <strong>Month  :
            <select name="name2" id="name2"  onchange="CheckDate()">
			<option value="01" 
            <?php
			if($_POST['name2'] == 01)
			{
				echo "selected";
			}
			?>
            >Jan</option>
      		<option value="02"  <?php
			if($_POST['name2'] == 02)
			{
				echo "selected";
			}
			?>>Feb</option>
            <option value="03"  <?php
			if($_POST['name2'] == 03)
			{
				echo "selected";
			}
			?>>Mar</option>
            <option value="04"  <?php
			if($_POST['name2'] == 04)
			{
				echo "selected";
			}
			?>>Apr</option>
            <option value="05"  <?php
			if($_POST['name2'] == 05)
			{
				echo "selected";
			}
			?>>May</option>
            <option value="06"  <?php
			if($_POST['name2'] == 06)
			{
				echo "selected";
			}
			?>>Jun</option>
      		<option value="07"  <?php
			if($_POST['name2'] == 07)
			{
				echo "selected";
			}
			?>>Jul</option>
            <option value="08"  <?php
			if($_POST['name2'] == 08)
			{
				echo "selected";
			}
			?>>Aug</option>
            <option value="09"  <?php
			if($_POST['name2'] == 09)
			{
				echo "selected";
			}
			?>>Sep</option>
            <option value="10"  <?php
			if($_POST['name2'] == 10)
			{
				echo "selected";
			}
			?>>Oct</option>
            <option value="11"  <?php
			if($_POST['name2'] == 11)
			{
				echo "selected";
			}
			?>>Nov</option>
            <option value="12"  <?php
			if($_POST['name2'] == 12)
			{
				echo "selected";
			}
			?>>Dec</option>
            </select>
            Year : 
            <select name="name3" id="name3" onchange="CheckDate()">
              <?php
        for($jdt=2010; $jdt<2015; $jdt++)
		{
           echo  "<option value='$jdt' ";
		   if($jdt == 2012)
		   {
			   echo "selected";
			}
			echo ">$jdt</option>";
		}    
 ?>
            </select>
            </strong></td>
          <td width="102"><input type="submit" name="button" id="button" value="Search" disabled="disabled" /></td>
        </tr>
        </form>
      </table>
      <br />
      <table width="928" border="1">
        <form method="POST" action="">
            <tr>
          <th height="42" scope="col"><font color="#0000FF">Month:</font></th>
          <th scope="col"><font color="#FF0000">
            <label for="textfield"></label>
            <input type="text" value="<?php echo date("M-Y"); ?>"name="textfield2" id="textfield2" readonly/>
          </font></th>
          <th scope="col">&nbsp;</th>
          <th scope="col">&nbsp;</th>
          </tr>
        <tr>
            <th width="107" height="42" scope="col"><font color="#0000FF">Emp ID</font>.</th>
            <th width="159" scope="col"><font color="#0000FF">Employee Name</font></th>
            <th width="93" scope="col"><font color="#0000FF">Designation</font> </th>
            <th width="93" scope="col"><font color="#0000FF">Salary</font> </th>
      </tr>
          <?php
		  
          while($row1 = mysql_fetch_array($resapp21))
  {
	 
	  ?>
          <tr>
            <td height="44"><?php echo $row1["empid"]; ?>
            <input type="hidden" value="<?php echo $row1[empid]; ?>" name="empid[]" id="empid[]">
            </td>
            <td><?php 
			$resapp2 = mysql_query("SELECT * FROM employee where empid='$row1[empid]'");
			while($row12 = mysql_fetch_array($resapp2))
  			{
			echo $row12["empname"];
			?>
			</td>
            <td>&nbsp;<?php echo $row12["designation"];
			} ?></td>
     		<td> 
			<?php
	 			echo $row1["salaryamt"]; 
				
			?></td>
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
			$resapp21 = mysql_query("SELECT SUM(salaryamt) FROM salary  where monthsal BETWEEN '$stdate' AND '$enddate'");
			while($row121 = mysql_fetch_array($resapp21))
  			{
			echo $row121[0]; 
			}
			?>
                  </font>
             </strong></p></td>
        </tr>
        </form>
    </table>

      <p ><a href="employeesalary.php">< < Back</a> </p>
 
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
<Script Language=Javascript>
	 function CheckDate()
  {
var str1  = document.getElementById("name2");
var str2  = document.getElementById("todate");
var str3  = document.getElementById("name3");
var string1 = str1.value;
var string2 = str2.value;
var string3 = str3.value;

var fdate = 31;
var fmonth = string1;
var fyear = string3; 

var arrtodate = string2.split("/");
var tdate = 31;
var tmonth= arrtodate[1];
var tyear = arrtodate[2];

var date1 = new Date(fyear, fmonth, fdate); 
var date2 = new Date(tyear, tmonth, tdate);
var dayNames = new Array("Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday");


var dmonth = fmonth-1;

var date3 = new Date(fyear, dmonth, fdate); 
var dayname  = dayNames[date3.getDay()];

 if(date1 > date2)
 {
  alert("you cant search record from this date..");
		document.getElementById("button").disabled = true;
 return false;
 }
 else
 {
	 	document.getElementById("button").disabled = false;
 }

 }
    </Script>