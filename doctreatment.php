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
$resapp = mysqli_query($con,"SELECT * FROM appointment where docid='$_SESSION[docid]'");
?>

<!-- Patient Login Form####################################################################################################### -->
<div id="container">
    <div class="wrapper">
        <div id="content">

            <h1>Treatment</h1>
            <table width="707" border="1">
                <tr>
                    <th width="116" height="58" scope="col">Appointment No.</th>
                    <th width="73" scope="col">Patient ID</th>
                    <th width="73" scope="col">Date
                        Time
                    </th>
                    <th width="125" scope="col"><p>Appointment<br/>
                            Date</p></th>
                    <th width="89" scope="col">Appointment Time</th>
                    <th width="69" scope="col">Comment</th>
                    <th width="69" scope="col">Status</th>
                    <th width="69" scope="col"><p>Generate<br/>
                            Report</p></th>
                </tr>
                <?php

                while ($row1 = mysqli_fetch_array($resapp)) {
                    ?>
                    <tr>
                        <td>&nbsp;<?php echo $row1["appointid"]; ?></td>
                        <td><?php echo $row1["docid"]; ?></td>
                        <td>&nbsp;<?php echo $row1["datetime"]; ?></td>
                        <td>&nbsp;<?php echo $row1["adate"]; ?></td>
                        <td>&nbsp;<?php echo $row1["atime"]; ?></td>
                        <td>&nbsp;<?php echo $row1["comment"]; ?></td>
                        <td><?php echo $row1["status"]; ?></td>
                        <td align="center"><strong><a href="treatment.php">Click Here</a></strong></td>
                    </tr>
                    <?php
                }
                ?>
            </table>
            <p><br/>
                &nbsp;
            </p>

            <p>&nbsp;</p>
            <!-- Patient Login Form Ends Here####################################################################################################### -->

            <h2>&nbsp;</h2>

            <div id="respond"></div>
        </div>
        <?php include("doctorssidemenu.php"); ?>
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
