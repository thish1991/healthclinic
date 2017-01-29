<?php 
session_start();
$menu= 2;
include("dbconnection.php");
error_reporting(E_ERROR | E_PARSE);

include("validation/header.php"); 
include("functions/emp.php");
 $dataa1 = date("Y-m-d"); 
$resultpatientrec = mysql_query("SELECT * FROM patient WHERE patid ='$_GET[patid]'");
while($row = mysql_fetch_array($resultpatientrec))
  {
$patid = 	  $row[patid]; 	
$patfname =	  $row[patfname]; 	
$patlname = 	  $row[patlname];
$pataddress = $row[address];
$patcontact = $row[contactno];
$patemail  =$row[emailid];
$dob = $row[dob];
$gender = $row[gender];
  }
  
  
 $respacdoc = mysql_query("SELECT MAX(appointid) FROM appointment where patid='$_GET[patid]'");
 while($row26a = mysql_fetch_array($respacdoc))
{
$appid = $row26a[0];
}


 	$resp = mysql_query("SELECT * FROM treatment where appointid='$appid'");
 while($rowa = mysql_fetch_array($resp))
	{
	$treid = $rowa["treid"];
	$treatment = $rowa["treatment"];
	$treatfee= $rowa["treatfee"];
	$docid= $rowa["docid"];
	}

$gen = 0;
	$resp = mysql_query("SELECT MAX(billid) FROM billing");
 while($rowa0 = mysql_fetch_array($resp))
	{
 $billno = $rowa0[0];

	}

 $respacdoc = mysql_query("SELECT * FROM labtest where patid='$_GET[patid]'");
 while($row26a = mysql_fetch_array($respacdoc))
{
	$labfee = $row26a["labfee"];
	$testtypeid = $row26a["ttypeid"];
}


?>

<!-- Patient Login Form####################################################################################################### -->
<div id="container">
  <div class="wrapper">
    <div id="content">
  
 <div align="center">
   <p>
     </p>
     <a href="patientreports.php"> < < Back </a> 
   <p><strong><u>AROGYA<br />
   </u></strong>Multi Speciality Clinic<br />
   Falnir Road, Mangalore - 575002<br />
   <strong><br />
     INVOICE</strong></p>
</div>
 <br />

 
 <table width="1000" border="0" align="center">
   <tr>
     <td width="468"><strong>Patient ID :</strong> &nbsp; <?php echo $patid; ?></td>
     <td width="520" align="right">Bill No:<?php echo $billno; ?></td>
   </tr>
   <tr>
     <td><strong>Patient Details:</strong><br />
       <?php echo $patfname; ?> <?php echo $patlname; ?><br />
       <?php echo $pataddress; ?></td>
     <td align="right" valign="top">Date : <?php echo date("d-M-Y"); ?> <br />       Place : Mangalore</td>
     </td>
   </tr>
   <tr>
     <td><strong>Contact No.</strong> <?php echo $patcontact; ?></td>
     <td align="right" valign="top"><strong>Date of Birth :</strong> <?php 
	 $dta = date("d-m-Y", strtotime($dob));
	 if($dta == "01-01-1970")
	 {
	 }
	 else
	 {
		 echo 	 $dta;
	 }
	  ?></td>
   </tr>
   <tr>
     <td><strong>Email ID</strong> <?php echo $patemail; ?></td>
     <td align="right" valign="top"><strong>Sex :</strong> <?php echo $gender; ?></td>
   </tr>
 </table>
 <table width="1000" border="1" align="center">
   <tr>
     <td><strong>Treatment Bill :</strong></td>
     <td width="177"><div align="center"><strong>Total</strong></div></td>
   </tr>
   <?php
   	  $respacdcx = mysql_query("SELECT * FROM billing where patid='$_GET[patid]'");
 while($rowcx = mysql_fetch_array($respacdcx))
{
$ttreid =$rowcx["treid"].$ttreid;
}
	 $wordChunks = explode(",", $ttreid);
for($i = 0; $i < count($wordChunks); $i++)
{
$name[$i] = $wordChunks[$i] ;
}
   $respabc1 = mysql_query("SELECT * FROM appointment where patid='$_GET[patid]' AND adate='$dataa1'");
 $ip =0;
 $treatfee =0;
 $treidid="";
 while($rowabc = mysql_fetch_array($respabc1))
	{
	 $appids[$ip] = $rowabc[appointid];
	 $ip++;
	}
	
   for($ips=0; $ips<$ip; $ips++)
   {
 	$respabc2 = mysql_query("SELECT * FROM treatment where appointid='$appids[$ips]'");
 	while($rowxyz = mysql_fetch_array($respabc2))
	{
	$treid = $rowxyz["treid"];
	$treidid = $rowxyz["treid"].",".$treidid;
	$treatment = $rowxyz["treatment"];
	$treatfee= $treatfee + $rowxyz["treatfee"];
	$docid= $rowxyz["docid"];

	for($chktre=0; $chktre<$i; $chktre++)
   	{
		$tdid =1;
	     if($name[$chktre] == $treid)
	   {
			$tdid =0;
		  break;
	   }
	}
	   
	   if($tdid == 1)
	   {

?>
   <tr>
     <td><?php  
 $respacdoc = mysql_query("SELECT * FROM doctor where docid='$docid'");
 while($row26ab = mysql_fetch_array($respacdoc))
{
$docname = $row26ab["doctorname"];
}
		echo "Treatment ID -". $treid. "<br>Doctor  - ". $docname. "<br>Treatment - " .$treatment;
		 $treidids = $treid +$treidids;
	 ?></td>
     <td>&nbsp;
     <?php
	$treatfee1 = $treatfee1 + $rowxyz["treatfee"];
		echo "Rs. ".$rowxyz["treatfee"]. ".00";
		 
	 ?></td>
   </tr>
   <?php
	}
   }
	}
	?>



   <tr>
     <td><strong>Laboratory Bill :<br /><hr /> Test Type</strong></td>
     <td>&nbsp;</td>
   </tr>
    <?php
    $totalfee=0;
		
		   $kabrec= mysql_query("SELECT * FROM labtest where patid='$_GET[patid]' AND date = '$dataa1'");
          while($rowlab = mysql_fetch_array($kabrec))
  {
	  
	  for($chktre=0; $chktre<$i; $chktre++)
   	{
		
		$tdid =1;
	     if($rowlab[treid] == $treid)
	   {
			$tdid =0;
		  	break;
	   }
	}
	   
	  	   if($tdid != 1)
	   {

	?>
   <tr>
     <td>&nbsp;	<?php	
$labfee = 0;
	  $restype = mysql_query("SELECT * FROM testtype where ttypeid 	='$rowlab[ttypeid]'");
	 while($roweb = mysql_fetch_array($restype))
		{
		$testtype = $roweb["testtype"];
		}
	 echo  " &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; ". $testtype; ?>
     </td>
     <td>&nbsp;<?php echo "Rs. ". $rowlab["labfee"] . ".00"; 
 $labfee = $labfee + $rowlab["labfee"]
	 ?></td>
   </tr>
   <?php
	   }
  }
  ?>
   <tr>
     <td><div align="right"><strong>Grand Total :</strong></div></td>
     <td>&nbsp;<?php echo "Rs. ". $totfee= $labfee + $treatfee1 . ".00"; ?></td>
   </tr>
   <tr>
     <td colspan="2">&nbsp;
     <?php
     $res90 = mysql_query("SELECT * FROM billing where treid ='$treidids'");
$trd = mysql_num_rows($res90);
if($trd>0)
{
	echo "<b>Duplicate Report : Invoice already generated..</b>";
}
?>
</td>
     </tr>
 </table>
<center><FORM>
<INPUT TYPE="button" onClick="window.print()" value="Print Report">
</FORM></center></p>
 <hr/>

      <div id="respond"></div>
    </div>
    <br class="clear" />
  </div>
</div>
<!-- ####################################################################################################### -->
<?php

if($trd==0)
{

// Insert records to patient table
$sql="INSERT INTO billing(patid,totamt,treid,docid)
VALUES
('$patid','$totfee','$treidids','$docid')";

if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
}


?>
<!-- ####################################################################################################### -->
