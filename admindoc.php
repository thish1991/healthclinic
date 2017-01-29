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
mysqli_query($con, "DELETE FROM doctor WHERE docid = '$_GET[docid]'");
$resapp = mysqli_query($con, "SELECT * FROM doctor");
?>

<!-- Patient Login Form####################################################################################################### -->
<div id="container">
    <div class="wrapper">
        <div id="content">
            <h1>Doctor Records</h1>

            <p align="left"><a href="doctors.php"><font color="#FF0000" face="Arial Black, Gadget, sans-serif" size="3"><b><u>Add
                                New Doctor</u></b></font></a></p>
            <table width="1009" border="1">
                <tr>
                    <th width="103" height="42" scope="col"><font color="#0000FF">Doc ID</font>.</th>
                    <th width="75" scope="col"><font color="#0000FF">Password</font></th>
                    <th width="181" scope="col"><font color="#0000FF">Doctor Name</font></th>
                    <th width="64" scope="col"><font color="#0000FF">Specialist</font></th>
                    <th width="91" scope="col"><font color="#0000FF">Qualification</font></th>
                    <th width="129" scope="col"><font color="#0000FF">Conatact No</font></th>
                    <th width="122" scope="col"><font color="#0000FF">Email ID</font></th>
                    <th width="63" scope="col"><font color="#0000FF">Bio-data</font></th>
                    <th colspan="2" scope="col"><font color="#0000FF">Action</font></th>
                </tr>
                <?php

                while ($row1 = mysqli_fetch_array($resapp)) {

                    ?>
                    <tr>
                        <td height="44"><?php echo $row1["docid"]; ?></td>
                        <td><?php echo $row1["password"]; ?></td>
                        <td><?php echo $row1["doctorname"]; ?></td>
                        <td><?php echo $row1["specialistin"]; ?></td>
                        <td><?php echo $row1["quali"]; ?></td>
                        <td>&nbsp;<?php echo $row1["contactno"]; ?></td>
                        <td><?php echo $row1["emailid"]; ?></td>
                        <td align="center"><strong><a href="admindocbiodata.php?docid=<?php echo $row1["docid"]; ?>">View</a></strong>
                        </td>
                        <td width="57"><a href="admindocprofile.php?docids=<?php echo $row1[docid]; ?>"><img
                                    src="images/icons/Actions-document-edit-icon.png" alt="" width="32" height="32"></a>
                        </td>
                        <td width="60"><a href="admindoc.php?docid=<?php echo $row1[docid]; ?>"><img
                                    src="images/icons/remove.png" alt="" width="32" height="32"></a></td>
                    </tr>
                    <?php
                }
                ?>
            </table>
            <p align="left">&nbsp;</p>

            <p><a href="adminaccount.php">< < Back</a></p>

            <p>&nbsp;</p>
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
