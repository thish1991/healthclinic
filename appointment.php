<?php 
session_start();
$menu= 1;
include("header.php");
include("dbconnection.php");
if(isset($_GET["docid"]))
{
	$_SESSION["appdocid"] = $_GET["docid"]; 
	$_SESSION["appdocname"] = $_GET["docname"];
	$_SESSION["appdocsptype"] = $_GET["sptype"];
	header("Location: makeappoint.php?apptaken=yes");
}

//	if(isset($_SESSION["patid"]))
	{
//		header("Location: patientaccount.php");
	}
?>
<!-- ####################################################################################################### -->
<?php include("menu.php"); ?>
<!-- ####################################################################################################### --><!-- ####################################################################################################### -->
<div id="container">
  <div class="wrapper">
    <div id="content">
      <h1>Appointment </h1>
      <h2>Doctors Record</h2>
      <table summary="Summary Here" cellpadding="0" cellspacing="0">
        <thead>
          <tr>
            <th>Name</th>
            <th>Specialist in</th>
            <th>Timings</th>
            <th>Appointment</th>
          </tr>
        </thead>
        <tbody>
          
            <?php 
		
			$result = mysql_query("SELECT * FROM doctor");

while($row = mysql_fetch_array($result))
  {
	echo "<tr>";
    echo "<td> &nbsp;".$row['doctorname']."</td>";
    echo "<td> &nbsp;".$row['specialistin']."</td>";
	echo "<td>";
	
	$resDapp = mysql_query("SELECT * FROM timings WHERE docid='$row[docid]'");
while($row12 = mysql_fetch_array($resDapp))
  			{
			 $timrec = $row12["timings"];
			 
			 			
$wordChunks = explode(" ", $timrec);
for($i = 0; $i < count($wordChunks); $i++)
{
$time[$i] = $wordChunks[$i] ;
}

//Morning
for($j = 0; $j < $i; $j++)
{
if($time[$j] == "09:00" || $time[$j] == "09:15" || $time[$j] == "09:30" || $time[$j] == "09:45" || $time[$j] == "10:00" || $time[$j] == "10:15" || $time[$j] == "10:30" || $time[$j] == "10:45" || $time[$j] == "11:00" || $time[$j] == "11:15" || $time[$j] == "11:30" || $time[$j] == "11:45")
{
	echo $time[$j]. " AM TO ";
	break;
}

}
for($j = $i; $j >= 0; $j--)
{

if($time[$j] == "11:45" || $time[$j] == "11:30" || $time[$j] == "11:15" || $time[$j] == "11:00" || $time[$j] == "10:45" || $time[$j] == "10:30" || $time[$j] == "10:15" || $time[$j] == "10:00" || $time[$j] == "09:45" || $time[$j] == "09:30" || $time[$j] == "09:15" || $time[$j] == "09:00")
{
	echo $time[$j]. " AM<br>";
	break;
}
}
//afternoon12:00 12:15 12:30 12:45 01:00 01:15 01:30 01:45 02:00 02:15 02:30 02:45 03:00 03:15 03:30 03:45
for($j = 0; $j < $i; $j++)
{
if($time[$j] == "12:00" || $time[$j] == "12:15" || $time[$j] == "12:30" || $time[$j] == "12:45" || $time[$j] == "01:00" || $time[$j] == "01:15" || $time[$j] == "01:30" || $time[$j] == "01:45" || $time[$j] == "02:00" || $time[$j] == "02:15" || $time[$j] == "02:30" || $time[$j] == "02:45" || $time[$j] == "03:00" || $time[$j] == "03:15" || $time[$j] == "03:30" || $time[$j] == "03:45")
{
	echo $time[$j]. " PM TO ";
	break;
}

}
for($j = $i; $j >= 0; $j--)
{
if($time[$j] == "03:45" || $time[$j] == "03:30" || $time[$j] == "03:15" || $time[$j] == "03:00" || $time[$j] == "02:45" || $time[$j] == "02:30" || $time[$j] == "02:15" || $time[$j] == "02:00" || $time[$j] == "01:45" || $time[$j] == "01:30" || $time[$j] == "01:15" || $time[$j] == "01:00" || $time[$j] == "12:45" || $time[$j] == "12:30" || $time[$j] == "12:15" || $time[$j] == "12:00")
{
	echo $time[$j]. " PM<br>";
	break;
}
}

//evening04:00 04:15 04:30 04:45 05:50 05:15 05:30 05:45 06:00 06:15 06:30 06:45 07:00 07:15 07:30 07:45 
for($j = 0; $j < $i; $j++)
{
if($time[$j] == "04:00" || $time[$j] == "04:15" || $time[$j] == "04:30" || $time[$j] == "04:45" || $time[$j] == "05:00" || $time[$j] == "05:15" || $time[$j] == "05:30" || $time[$j] == "05:45" || $time[$j] == "06:00" || $time[$j] == "06:15" || $time[$j] == "06:30" || $time[$j] == "06:45" || $time[$j] == "07:00" || $time[$j] == "07:15" || $time[$j] == "07:30" || $time[$j] == "07:45")
{
	echo $time[$j]. " PM TO ";
	break;
}
}
for($j = $i; $j >= 0; $j--)
{
if($time[$j] == "07:45" || $time[$j] == "07:30" || $time[$j] == "07:15" || $time[$j] == "07:00" || $time[$j] == "06:45" || $time[$j] == "06:30" || $time[$j] == "06:15" || $time[$j] == "06:00" || $time[$j] == "05:45" || $time[$j] == "05:30" || $time[$j] == "05:15" || $time[$j] == "05:00" || $time[$j] == "04:45" || $time[$j] == "04:30" || $time[$j] == "04:15" || $time[$j] == "04:00")
{
	echo $time[$j]. " PM";
	break;
}
}
//echo "&nbsp;". $time[1]." to ". $time[$i] ." <br>";
	

//time loop ends here

echo "</td>";
    echo "<td><a href='appointment.php?docid=$row[docid]&docname=$row[doctorname]&sptype=$row[specialistin]'>Make an Appointment</a></td>";
	echo "</tr>";
			}

  }
  ?>
           
        
          
        </tbody>
      </table>
      <h2>&nbsp;</h2>
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
