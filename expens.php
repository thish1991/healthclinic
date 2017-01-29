<?php 
session_start();
$menu= 2;
?>

<?php
include("dbconnection.php");
include("header.php");
include("validation/header.php"); 
include("functions/patient.php");

//CHECKS login button is submitted or not
if(isset($_POST[dtar]))
{
	 $datad = date("Y-m-d", strtotime($_POST[dtar]));
}
else
{
$datad = date("Y-m-d");
}

include("menu.php");
	
	 $stdate =$_POST['name3'] ."-". $_POST['name2']."-01";
	 $enddate = $_POST['name3'] ."-". $_POST['name2']."-31";
mysql_query("DELETE FROM expenses WHERE expensetype='$_GET[expensetype]' AND quantity ='$_GET[quantity]' AND date='$_GET[date]'");
$resapp = mysql_query("SELECT * FROM expenses where date  BETWEEN '$stdate' AND '$enddate'");
?>

<!-- Patient Login Form####################################################################################################### -->
<div id="container">
  <div class="wrapper">
    <div id="content">
      <h1>Expenses</h1>
      <p align="left"><a href="addexpenses.php"><font color="#FF0000" face="Arial Black, Gadget, sans-serif" size="3"><b><u>Add Expense Record</u></b></font></a></p>
      <form method="post" action="">
        <table width="524" border="1">
          <tr>
            <td width="245"><?php
			//include this to check future date
			$tomorrow = mktime(0,0,0,date("m"),date("d"),date("Y"));
 			$tdate= date("31/m/Y", $tomorrow);
			//future date ends here
			?>
              <input type="hidden" name="todate" id="todate" value="<?php echo $tdate; ?>" />
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
            <td width="102"><input type="submit" name="buttona" id="buttona" value="Search" disabled="disabled" /></td>
          </tr>
        </table>
      </form>
      <table width="676" border="1">
        <tr>
            <th width="107" height="42" scope="col"><font color="#0000FF">Expense Type</font></th>
            <th width="77" scope="col"><font color="#0000FF">Quantity</font></th>
            <th width="159" scope="col"><font color="#0000FF">Expense Amount</font></th>
            <th width="93" scope="col"><font color="#0000FF">Date</font> </th>
            <th width="111" scope="col"><font color="#0000FF">Comment</font></th>
            <th scope="col"><font color="#0000FF">Action</font></th>
        </tr>
          <?php
		  
          while($row1 = mysql_fetch_array($resapp))
  {
	 
	  ?>
          <tr>
            <td height="44"><?php echo $row1["expensetype"]; ?>
            </td>
            
           
            <td><?php echo $row1["quantity"]; ?></td>
            <td><?php echo $row1["expamt"]; ?></td>
            
             
            <td>&nbsp;<?php echo date("d-m-Y h:i:s", strtotime($row1[date])); ?></td>
            <td>&nbsp;<?php echo $row1["comment"]; ?></td>
            <td width="41"><a href="expens.php?expensetype=<?php echo $row1[expensetype];?>&quantity=<?php echo $row1[quantity];?>&date=<?php echo $row1[date];?>" ><img src="images/icons/remove.png" alt="" width="32" height="32"></a></td>
          </tr>
          <?php
          }
		  ?>
    </table>
      <p>&nbsp;<a href="adminaccount.php"> << Back</a></p>
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
		document.getElementById("buttona").disabled = true;
 return false;
 }
 else
 {
	 	document.getElementById("buttona").disabled = false;
 }

 }
    </Script>