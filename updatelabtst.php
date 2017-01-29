<?php 
session_start();
include("dbconnection.php");
include("header.php");
include("validation/header.php"); 
include("functions/patient.php");
$dt= "$_POST[year]-$_POST[month]-$_POST[date]";

$resultpatientrec = mysql_query("SELECT * FROM labtest where testid='$_GET[testid]'");
while($row = mysql_fetch_array($resultpatientrec)) 
  {
 $testid = $row["testid"];
 $ttypeid = $row["ttypeid"];
 $patid = $row["patid"];
$empid = $row["empid"];
 $treid = $row["treid"];
 $labfee = $row["empid"];
 $date = $row["$dt"];
 $time = $row["time"];
 $comment = $row["comment"];
  }
  
  $resultttype = mysql_query("SELECT * FROM testtype where ttypeid='$ttypeid'");
while($row = mysql_fetch_array($resultttype)) 
  {
 $testnmae = $row["testtype"];
  }
  
  if(isset($_POST["submit"]))
{
	
$dt= date("Y-m-d");
$resrec= mysql_query("UPDATE labtest SET labfee ='$_POST[labfee]', date ='$dt',time='$_POST[time]',comment='$_POST[comment]',empid='$_SESSION[empid]' where testid='$_POST[testid]'");
}

include("menu.php"); 
?>

<!-- Patient Login Form####################################################################################################### -->
<div id="container">
  <div class="wrapper">
    <div id="content">
     <?php 

{
include("validation/header.php");
//retrieve country from database. Table: country
include("dbconnection.php");

?>
      <form action="" method="post" enctype="multipart/form-data" class="formular" id="formID">
<font color="#FF0000"><b> <?php       if(isset($_POST["submit"]))
{
	echo "<h2>Updated Labtest Successfully...</h2>";
		echo "<h2><a href='emplab.php'>Click here to Continue...</a></h2>";
}
?></b></font>
 <div align="center"><strong><u>Laboratory </u></strong></div>
<label for="textfield">Test ID:</label>
      <label>
	<input name="testid" type="text" class="validate[required,custom[onlyNumberSp]] text-input" readonly="readonly" id="testid" value="<?php echo $testid; ?>"/>
	    </label>
            <br />
            Test Type :
            <label>
              <input  class="validate[required] text-input" readonly="readonly" type="text" name="ttypeid" id="ttypeid"  value="<?php echo  $testnmae ; ?>" />
			</label>
<br />
             Patient ID:
             <label>
              <input  class="validate[required,custom[onlyNumberSp]] text-input" readonly="readonly" type="text" name="patlname" id="req1"  value="<?php echo $patid; ?>" />
			</label>
<br />
             Employee ID:
             <label>
              <input  class="validate[required,custom[onlyNumberSp]] text-input" type="text" name="patid" id="patid" readonly="readonly"  value="<?php echo $_SESSION[empid]; ?>" />
            </label>
<br />
             Treatment ID:
             <label>&quot;
               <input  class="validate[required,custom[onlyNumberSp]] text-input" readonly="readonly" type="text" name="treid" id="treid"  value="<?php echo $treid; ?>" />
             </label>
        <br />
Lab Fee:
<label>
  <input  class="validate[required,custom[onlyNumberSp]] text-input" type="text" name="labfee" id="labfee" />
</label>
<br />
            Date:
            <label for="select" class="validate[required]"></label><input  class="validate[required] text-input" type="text" readonly="readonly" name="treiddate" id="treiddate"  value="<?php echo date("d-m-Y"); ?>" /><br />
Time :
<input type="text" name="time" id="time" class="validate[required] text-input" readonly="readonly" value="<?php echo date("h:i:s A"); ?>"/><br />
<br />
      Comment :   
      <textarea name="comment" id="comment" cols="45" rows="5" ><?php echo $date; ?></textarea><br />
      <input name="submit" type="submit" class="submit" id="submit" value="Update Labtest"/><hr/>

      </td>
    </tr>

     </table>
      
</form>
    
 <?php
}
 ?>
 <div id="respond"></div>
    </div>
    <?php
	include("empsidemenu.php");?>
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