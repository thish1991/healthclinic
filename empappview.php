<?php 
session_start(); 
error_reporting(E_ERROR | E_PARSE);
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
if(isset($_POST[dtar]))
{
	$datad = date("Y-m-d", strtotime($_POST[dtar]));
}
else
{
$datad = date("Y-m-d");
}
	
$resapp = mysql_query("SELECT * FROM appointment where adate ='$datad' AND docid='$_POST[name]'");
?>

<!-- Patient Login Form####################################################################################################### -->
<div id="container">
  <div class="wrapper">
    <div id="content">


      <h1>Appointments </h1>
      <p> 
      <form method="post" action="adminappview.php">
      
      <table width="465" border="1">
        <tr>
          <td width="155"><strong>Name :
       <?php
	    $resdcapp = mysql_query("SELECT * FROM doctor");
        ?>
            <select name="name" id="name">
 <?php
            while($row26z = mysql_fetch_array($resdcapp))
  						{
           echo  "<option value='$row26z[docid]'>$row26z[doctorname]</option>";
                        }
 ?>          
            </select>
          </strong></td>
          <td width="201"><script src="datetimepicker_css.js"></script>
            <strong>Date :</strong>
            <input type="text" id="demo1" maxlength="25" readonly="readonly" size="25" name="dtar"/>
          <img src="images2/cal.gif" alt="" width="21" height="22" style="cursor:pointer" onclick="javascript:NewCssCal ('demo1','ddMMyyyy','','','','','')" /></td>
          <td width="87"><input type="submit" name="button" id="button" value="Search" /></td>
        </tr>
        <tr>
          <td><strong>Date :</strong></td>
          <td colspan="2">&nbsp;<?php  echo date("d-M-Y", strtotime($datad)); ?></td>
          </tr>
      </table>
      </form>
      <table width="608" border="1">
        <tr>
            <th width="31" height="42" scope="col">App No.</th>
            <th width="114" scope="col">Patient</th>
            <th width="157" scope="col">Doctor</th>
            <th width="33" scope="col">Date</th>
            <th width="89" scope="col">Appointment Time</th>
            <th width="95" scope="col">Comment</th>
            <th width="43" scope="col">Action</th>
        </tr>
          <?php
		  
          while($row1 = mysql_fetch_array($resapp))
  {
	 
	  ?>
          <tr>
            <td height="44">&nbsp;<?php echo $row1["appointid"]; ?></td>
            
            <td><?php echo $row1["patid"]; 
			 $respac = mysql_query("SELECT * FROM patient where patid='$row1[patid]'");
			          while($row26 = mysql_fetch_array($respac))
  						{
	 					 echo " : ". $row26["patfname"];
	   					} 
	  			?></td>
           
  			<td><?php echo $row1["docid"]; 
			 $respacdoc = mysql_query("SELECT * FROM doctor where docid='$row1[docid]'");
			          while($row26a = mysql_fetch_array($respacdoc))
  						{
	 					 echo " : ". $row26a["doctorname"];
	   					} 
	  			?></td>
          
            <td>&nbsp;<?php echo date("d-m-Y", strtotime($row1["adate"])); ?></td>
            <td>&nbsp;<?php echo $row1["atime"]; ?></td>
            <td><?php echo $row1["comment"]; ?></td>
             <td width="43"><a href="empappview.php?adate=<?php echo $row1[appointid];?>" ><img src="images/icons/remove.png" alt="" width="32" height="32" /></a><a href="empappview.php?adate=<?php echo $row1[appointid];?>" ></a></td>
          
          </tr>
          <?php
          }
		  ?>
</table>
        <p><br />
      <a href="empaccount.php"> < < Back </a></p>
 
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
