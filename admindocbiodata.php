<?php
session_start();
$menu = 2;
include("dbconnection.php");
include("header.php");
include("validation/header.php");
include("functions/patient.php");

//CHECKS login button is submitted or not

?>
<!-- ####################################################################################################### -->
<?php include("menu.php");
$resapp = mysqli_query($con, "SELECT * FROM doctor where docid='$_GET[docid]'");
?>

<!-- Patient Login Form####################################################################################################### -->
<div id="container">
    <div class="wrapper">
        <div id="content">
            <h1>Doctor Records </h1>
            <table width="547" border="1">
                <tr>
                    <th height="42" colspan="2" scope="col"><font color="#0000FF">Bio Data</font></th>
                </tr>
                <?php

                while ($row1 = mysql_fetch_array($resapp)) {

                    ?>
                    <tr>
                        <td width="259" height="26">&nbsp; <strong>Doctor ID : <?php echo $row1["docid"]; ?></strong>
                        </td>
                        <td width="272"><strong>Doctor Name : <?php echo $row1["doctorname"]; ?></strong></td>
                    </tr>
                    <tr>
                        <td height="27" colspan="2">&nbsp;<strong> Qualification
                                : <?php echo $row1["quali"]; ?></strong></td>
                    </tr>
                    <tr>
                        <td height="25" colspan="2">&nbsp;<strong> Specialist in
                                : <?php echo $row1["specialistin"]; ?></strong></td>
                    </tr>
                    <tr>
                        <td height="30"><strong>&nbsp;Email ID : <?php echo $row1["emailid"]; ?></strong></td>
                        <td height="30"><strong>&nbsp; Contact No. <?php echo $row1["contactno"]; ?></strong></td>
                    </tr>
                    <tr>
                        <td height="44" colspan="2">&nbsp; <strong>Bio Data :</strong> <?php echo $row1["biodata"]; ?>
                        </td>
                    </tr>
                    <tr>
                        <td height="44" colspan="2" align="center"><strong><a href="admindoc.php">
                                    &lt;&lt;Back</a></strong></td>
                    </tr>
                    <?php
                }
                ?>
            </table>
            <!-- Patient Login Form Ends Here####################################################################################################### -->
            <div id="respond"></div>
        </div>

        <br class="clear"/>
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
