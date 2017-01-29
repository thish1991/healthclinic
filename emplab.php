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
<?php 
include("menu.php"); 
$tst="";

if($_POST["testst"] == "Finished")
{
 $tst="Finished";
}
else
{
	$tst="Pending";
}

if($tst == "Finished")
{
$resapp = mysql_query("SELECT * FROM labtest where date <> '0000-00-00'");
}
else
{
	$resapp = mysql_query("SELECT * FROM labtest where date = '0000-00-00'");
}
?>

<!-- Patient Login Form####################################################################################################### -->
<div id="container">
  <div class="wrapper">
    <div id="content">
    <a href="empaccount.php"> < < Back </a>
      <h1>Laboratory      </h1>
  <h6>
    <form method="post" action="">
      <select name="testst">
          <option value="Pending" <?php
		if($tst == "Pending")
		{
		echo "selected";
		}
		?>>Pending</option>
          <option value="Finished"    <?php
		if($tst == "Finished")
		{
		echo "selected";
		}
		?>>Finished</option>
        </select><input name="" type="submit" value="Submit" />
      </form>
       <?php
		if($tst == "Pending")
		{
		?>

     </h6>
       <p> &nbsp; Test Status: <?php echo $tst;?></p>
  <table width="533" border="1">
         <tr>
           <th width="38" height="42" scope="col">App No.</th>
           <th width="86" scope="col">Patient</th>
           <th width="107" scope="col">Test Type</th>
           <th width="69" scope="col">Update Lab Test</th>
         </tr>
         <?php
		  
          while($row1 = mysql_fetch_array($resapp))
  {
	 
	  ?>
      
         <tr>
           <td height="44">&nbsp;<?php echo $row1["testid"]; ?></td>
           <td><?php echo $row1["patid"]; 
			 $respac = mysql_query("SELECT * FROM patient where patid='$row1[patid]'");
			          while($row26 = mysql_fetch_array($respac))
  						{
	 					 echo " : ". $row26["patfname"];
	   					} 
	  			?></td>
           <td><?php
			 $respacdoc = mysql_query("SELECT * FROM testtype where ttypeid='$row1[ttypeid]'");
			          while($row26a = mysql_fetch_array($respacdoc))
  						{
	 					 echo  $row26a["testtype"];
	   					} 
	  			?></td>
           <td>&nbsp;<strong><a href="updatelabtst.php?testid=<?php echo $row1[testid]; ?>">Click Here</a></strong></td>
         </tr>
         <?php
          }
		  ?>
       </table>
<?php
}
else
{
?>
       </h6>
       <p> &nbsp; Test Status: <?php echo $_POST["testst"];?></p>
 <table width="533" border="1">
<tr>
            <th width="31" height="42" scope="col">App No.</th>
            <th width="139" scope="col">Patient</th>
            <th width="98" scope="col">Test Type</th>
            <th width="37" scope="col">Date            </th>
            <th width="34" scope="col"> Time</th>
            <th width="154" scope="col">Comment</th>
        </tr>
          <?php
		  
          while($row1 = mysql_fetch_array($resapp))
  {
	 
	  ?>
          <tr>
            <td height="44">&nbsp;<?php echo $row1["testid"]; ?></td>
            
            <td><?php echo $row1["patid"]; 
			 $respac = mysql_query("SELECT * FROM patient where patid='$row1[patid]'");
			          while($row26 = mysql_fetch_array($respac))
  						{
	 					 echo " : ". $row26["patfname"];
	   					} 
	  			?></td>
           
  			<td><?php
			 $respacdoc = mysql_query("SELECT * FROM testtype where ttypeid='$row1[ttypeid]'");
			          while($row26a = mysql_fetch_array($respacdoc))
  						{
	 					 echo  $row26a["testtype"];
	   					} 
	  			?></td>
          
            <td>&nbsp;<?php echo date("d-m-Y", strtotime($row1[date])); ?></td>
            <td>&nbsp;<?php echo $row1["time"]; ?></td>
            <td>&nbsp;<?php echo $row1["comment"]; ?></td>
          </tr>
          <?php
          }
		  ?>
  </table>
<?php
}
?>
     
     
  <p><br />
          &nbsp;
      </p>
 
      <p>&nbsp;</p>
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
