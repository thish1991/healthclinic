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
?>

<!-- Patient Login Form####################################################################################################### -->
<div id="container">
    <div class="wrapper">
        <div id="content">

            <a href="doctoraccount.php"> < < Back</a>

            <p>&nbsp;</p>

            <h1>Patient Report </h1>
            <?php
            $resapp = mysqli_query($con, "SELECT * FROM patient where patid='$_POST[patid]'");
            while ($row11a = mysqli_fetch_array($resapp)) {
                $patientfname = $row11a["patfname"];
                $patlname = $row11a["patlname"];
            }
            ?>
            <form method="post" action="" id="formID">
                Enter Patient ID :
                <label for="textfield"></label>
                <input type="text" name="patid" id="patid" class="validate[custom[onlyNumberSp]] text-input">
                <input name="" type="submit" value="Submit"/>
            </form>
            <p> Patient ID : <?php echo $_POST["patid"]; ?></p>

            <p> First Name : <?php echo $patientfname; ?></p>

            <p> Last Name : <?php echo $patlname; ?></p>

            <p><strong> Treatment: </strong></p>
            <table width="533" border="1">
                <tr>
                    <th width="38" height="42" scope="col">Treatment No.</th>
                    <th width="107" scope="col">Appointment ID</th>
                    <th width="113" scope="col">Doctor</th>
                    <th width="77" scope="col">Date</th>
                    <th width="89" scope="col"> Time</th>
                    <th width="69" scope="col">Treatment Fee</th>
                </tr>
                <?php
                $resapprec = mysqli_query($con,"SELECT * FROM appointment where patid='$_POST[patid]'");
                $ik = 0;
                while ($row11b = mysqli_fetch_array($resapprec)) {
                    $appids[$ik] = $row11b["appointid"];
                    $ik++;
                }
                for ($kk = 0; $kk < $ik; $kk++) {
                    $restrek = mysqli_query($con,"SELECT * FROM treatment where appointid ='$appids[$kk]'");
                    while ($row1b = mysqli_fetch_array($restrek)) {

                        ?>
                        <tr>
                            <td height="44">&nbsp;<?php echo $row1b["treid"]; ?></td>

                            <td><?php echo $row1b["appointid"]; ?>
                            <td>&nbsp;<?php echo $row1b["docid"];
                                $respacdoc = mysqli_query($con,"SELECT * FROM doctor where docid='$row1b[docid]'");
                                while ($row26a = mysqli_fetch_array($respacdoc)) {
                                    echo " : " . $row26a["doctorname"];
                                }
                                ?> </td>

                            <td><?php echo date("d-m-Y", strtotime($row1b["date"])); ?></td>

                            <td>&nbsp;<?php echo $row1b["time"]; ?></td>
                            <td>&nbsp;<?php
                                echo $row1b["treatfee"];
                                ?></td>
                            >
                        </tr>
                        <?php
                    }
                }
                ?>
            </table>
            <p><strong>Laboratory Test :</strong></p>
            <table width="533" border="1">
                <tr>
                    <th width="38" height="42" scope="col">Test ID.</th>
                    <th width="107" scope="col">Treatment ID</th>
                    <th width="113" scope="col">Test Type</th>
                    <th width="77" scope="col">Date</th>
                    <th width="89" scope="col">Time</th>
                    <th width="69" scope="col">Lab Fee</th>
                </tr>
                <?php
                $kabrec = mysqli_query($con,"SELECT * FROM labtest where patid='$_POST[patid]'");
                while ($rowlab = mysqli_fetch_array($kabrec)) {

                    ?>
                    <tr>
                        <td height="44">&nbsp;<?php echo $rowlab["testid"]; ?></td>
                        <td><?php echo $rowlab["treid"]; ?></td>
                        <td><?php
                            $respac = mysqli_query($con,"SELECT * FROM testtype where ttypeid ='$rowlab[ttypeid]'");
                            while ($row26 = mysqli_fetch_array($respac)) {
                                echo $row26["testtype"];
                            }
                            ?></td>
                        <td>&nbsp;<?php echo date("d-m-Y", strtotime($rowlab["date"])); ?></td>
                        <td>&nbsp;<?php echo $rowlab["time"]; ?></td>
                        <td><?php
                            echo $rowlab["labfee"];
                            ?></td>
                    </tr>
                    <?php
                }
                ?>
            </table>
            <center>
            </center>
            <br/>
            &nbsp;
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
