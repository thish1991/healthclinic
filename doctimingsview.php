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
<?php
include("menu.php");
$resapp1 = mysqli_query($con, "SELECT * FROM doctor where docid='$_POST[docid]'");
while ($rowa1 = mysqli_fetch_array($resapp1)) {
    $docname = $rowa1["doctorname"];
    $docsp = $rowa1["specialistin"];
}
?>

<!-- Patient Login Form####################################################################################################### -->
<div id="container">
    <div class="wrapper">
        <div id="content">

            <a href="empaccount.php"> < < Back </a>

            <h1>Doctor Timings </h1>

            <form method="post" action="" id="formID"/>
            Enter Doctor ID :
            <label for="textfield"></label>
            <input type="text" name="docid" id="docid" class="validate[custom[onlyNumberSp]] text-input">
            <input name="submit" type="submit" value="Submit"/>
            </form>
            <p> Doctor ID : <?php echo $_POST["docid"]; ?></p>

            <p> Doctor Name : <?php echo $docname; ?></p>

            <p> Specialist In : <?php echo $docsp; ?></p>

            <p><strong>Timings :</strong></p>
            <?php
            $resDapp = mysqli_query($con, "SELECT * FROM timings WHERE docid='$_POST[docid]'");
            while ($row12 = mysqli_fetch_array($resDapp)) {
                $timrec = $row12["timings"];
            }

            $wordChunks = explode(" ", $timrec);
            for ($i = 0; $i < count($wordChunks); $i++) {
                $time[$i] = $wordChunks[$i];
            }


            ?>


            <form method="post" action="">
                <table width="734" border="1" bgcolor="#FFFFFF">
                    <tr>
                        <th width="253" align="center"><strong>Morning</strong></th>
                        <th width="186" align="center"><strong>Afternoon</strong></th>
                        <th width="273" align="center"><strong>Evening</strong></th>
                    </tr>
                    <tr>
                        <th align="center"><input type="checkbox" disabled name="timings[]" id="radio" value="09:00"
                                <?php
                                for ($j = 0; $j < $i; $j++) {
                                    if ($time[$j] == "09:00") {
                                        echo "checked";
                                    }
                                }
                                ?>
                            />
                            09:00
                            AM
                        </th>
                        <th align="center"><input type="checkbox" disabled name="timings[]" id="09:15:00"
                                                  value="12:00" <?php
                            for ($j = 0; $j < $i; $j++) {
                                if ($time[$j] == "12:00") {
                                    echo "checked";
                                }
                            }
                            ?>/>
                            12:00 PM
                        </th>
                        <th align="center"><input type="checkbox" disabled name="timings[]" id="09:30:00"
                                                  value="04:00" <?php
                            for ($j = 0; $j < $i; $j++) {
                                if ($time[$j] == "04:00") {
                                    echo "checked";
                                }
                            }
                            ?>/>
                            04:00 PM
                        </th>
                    </tr>
                    <tr>
                        <th align="center"><input type="checkbox" disabled name="timings[]" id="09:45:00"
                                                  value="09:15" <?php
                            for ($j = 0; $j < $i; $j++) {
                                if ($time[$j] == "09:15") {
                                    echo "checked";
                                }
                            }
                            ?> />
                            09:15
                            <label for="radio12"></label>
                            AM
                        </th>
                        <th align="center"><input type="checkbox" disabled name="timings[]" id="10:00:00"
                                                  value="12:15" <?php
                            for ($j = 0; $j < $i; $j++) {
                                if ($time[$j] == "12:15") {
                                    echo "checked";
                                }
                            }
                            ?>/>
                            12:15 PM
                        </th>
                        <th align="center"><input type="checkbox" disabled name="timings[]" id="10:15:00"
                                                  value="04:15" <?php
                            for ($j = 0; $j < $i; $j++) {
                                if ($time[$j] == "04:15") {
                                    echo "checked";
                                }
                            }
                            ?>/>
                            04:15 PM
                        </th>
                    </tr>
                    <tr>
                        <th align="center"><input type="checkbox" disabled name="timings[]" id="09:45:00"
                                                  value="09:30" <?php
                            for ($j = 0; $j < $i; $j++) {
                                if ($time[$j] == "09:30") {
                                    echo "checked";
                                }
                            }
                            ?>/>
                            09:30
                            <label for="radio3"></label>
                            AM
                        </th>
                        <th align="center"><input type="checkbox" disabled name="timings[]" id="10:45:00"
                                                  value="12:30" <?php
                            for ($j = 0; $j < $i; $j++) {
                                if ($time[$j] == "12:30") {
                                    echo "checked";
                                }
                            }
                            ?>/>
                            12:30 PM
                        </th>
                        <th align="center"><input type="checkbox" disabled name="timings[]" id="11:00:00"
                                                  value="04:30" <?php
                            for ($j = 0; $j < $i; $j++) {
                                if ($time[$j] == "04:30") {
                                    echo "checked";
                                }
                            }
                            ?>/>
                            04:30 PM
                        </th>
                    </tr>
                    <tr>
                        <th align="center"><input type="checkbox" disabled name="timings[]" id="10:30:00"
                                                  value="09:45" <?php
                            for ($j = 0; $j < $i; $j++) {
                                if ($time[$j] == "09:45") {
                                    echo "checked";
                                }
                            }
                            ?>/>
                            09:45
                            <label for="radio4"></label>
                            AM
                        </th>
                        <th align="center"><input type="checkbox" disabled name="timings[]" id="11:30:00"
                                                  value="12:45" <?php
                            for ($j = 0; $j < $i; $j++) {
                                if ($time[$j] == "12:45") {
                                    echo "checked";
                                }
                            }
                            ?>/>
                            12:45 PM
                        </th>
                        <th align="center"><input type="checkbox" disabled name="timings[]" id="11:45:00"
                                                  value="04:45" <?php
                            for ($j = 0; $j < $i; $j++) {
                                if ($time[$j] == "04:45") {
                                    echo "checked";
                                }
                            }
                            ?>/>
                            04:45 PM
                        </th>
                    </tr>
                    <tr>
                        <th align="center"><input type="checkbox" disabled name="timings[]" id="11:15:00"
                                                  value="10:00" <?php
                            for ($j = 0; $j < $i; $j++) {
                                if ($time[$j] == "10:00") {
                                    echo "checked";
                                }
                            }
                            ?>/>
                            10:00
                            <label for="radio5"></label>
                            AM
                        </th>
                        <th align="center"><input type="checkbox" disabled name="timings[]" id="12:15:00"
                                                  value="01:00" <?php
                            for ($j = 0; $j < $i; $j++) {
                                if ($time[$j] == "01:00") {
                                    echo "checked";
                                }
                            }
                            ?>/>
                            01:00 PM
                        </th>
                        <th align="center"><input type="checkbox" disabled name="timings[]" id="12:30:00"
                                                  value="05:50" <?php
                            for ($j = 0; $j < $i; $j++) {
                                if ($time[$j] == "05:50") {
                                    echo "checked";
                                }
                            }
                            ?>/>
                            05:00 PM
                        </th>
                    </tr>
                    <tr>
                        <th align="center"><input type="checkbox" disabled name="timings[]" id="12:00:00"
                                                  value="10:15" <?php
                            for ($j = 0; $j < $i; $j++) {
                                if ($time[$j] == "10:15") {
                                    echo "checked";
                                }
                            }
                            ?>/>
                            10:15
                            <label for="radio6"></label>
                            AM
                        </th>
                        <th align="center"><input type="checkbox" disabled name="timings[]" id="radio18"
                                                  value="01:15" <?php
                            for ($j = 0; $j < $i; $j++) {
                                if ($time[$j] == "01:15") {
                                    echo "checked";
                                }
                            }
                            ?> />
                            01:15 PM
                        </th>
                        <th align="center"><input type="checkbox" disabled name="timings[]" id="radio18"
                                                  value="05:15" <?php
                            for ($j = 0; $j < $i; $j++) {
                                if ($time[$j] == "05:15") {
                                    echo "checked";
                                }
                            }
                            ?>/>
                            05:15 PM
                        </th>
                    </tr>
                    <tr>
                        <th align="center"><input type="checkbox" disabled name="timings[]" id="radio6"
                                                  value="10:30" <?php
                            for ($j = 0; $j < $i; $j++) {
                                if ($time[$j] == "10:30") {
                                    echo "checked";
                                }
                            }
                            ?>/>
                            10:30
                            <label for="radio6"></label>
                            AM
                        </th>
                        <th align="center"><input type="checkbox" disabled name="timings[]" id="radio19"
                                                  value="01:30" <?php
                            for ($j = 0; $j < $i; $j++) {
                                if ($time[$j] == "01:30") {
                                    echo "checked";
                                }
                            }
                            ?>/>
                            01:30 PM
                        </th>
                        <th align="center"><input type="checkbox" disabled name="timings[]" id="radio19"
                                                  value="05:30" <?php
                            for ($j = 0; $j < $i; $j++) {
                                if ($time[$j] == "05:30") {
                                    echo "checked";
                                }
                            }
                            ?>/>
                            05:30 PM
                        </th>
                    </tr>
                    <tr>
                        <th align="center"><input type="checkbox" disabled name="timings[]" id="radio7"
                                                  value="10:45" <?php
                            for ($j = 0; $j < $i; $j++) {
                                if ($time[$j] == "10:45") {
                                    echo "checked";
                                }
                            }
                            ?>/>
                            10:45
                            <label for="radio7"></label>
                            AM
                        </th>
                        <th align="center"><input type="checkbox" disabled name="timings[]" id="radio20"
                                                  value="01:45" <?php
                            for ($j = 0; $j < $i; $j++) {
                                if ($time[$j] == "01:45") {
                                    echo "checked";
                                }
                            }
                            ?>/>
                            01:45 PM
                        </th>
                        <th align="center"><input type="checkbox" disabled name="timings[]" id="radio20"
                                                  value="05:45" <?php
                            for ($j = 0; $j < $i; $j++) {
                                if ($time[$j] == "05:45") {
                                    echo "checked";
                                }
                            }
                            ?>/>
                            05:45 PM
                        </th>
                    </tr>
                    <tr>
                        <th align="center"><input type="checkbox" disabled name="timings[]" id="radio8"
                                                  value="11:00" <?php
                            for ($j = 0; $j < $i; $j++) {
                                if ($time[$j] == "11:00") {
                                    echo "checked";
                                }
                            }
                            ?>/>
                            11:00
                            <label for="radio8"></label>
                            AM
                        </th>
                        <th align="center"><input type="checkbox" disabled name="timings[]" id="radio21"
                                                  value="02:00" <?php
                            for ($j = 0; $j < $i; $j++) {
                                if ($time[$j] == "02:00") {
                                    echo "checked";
                                }
                            }
                            ?>/>
                            02:00 PM
                        </th>
                        <th align="center"><input type="checkbox" disabled name="timings[]" id="radio21"
                                                  value="06:00" <?php
                            for ($j = 0; $j < $i; $j++) {
                                if ($time[$j] == "06:00") {
                                    echo "checked";
                                }
                            }
                            ?>/>
                            06:00 PM
                        </th>
                    </tr>
                    <tr>
                        <th align="center"><input type="checkbox" disabled name="timings[]" id="radio9"
                                                  value="11:15" <?php
                            for ($j = 0; $j < $i; $j++) {
                                if ($time[$j] == "11:15") {
                                    echo "checked";
                                }
                            }
                            ?>/>
                            11:15
                            <label for="radio9"></label>
                            AM
                        </th>
                        <th align="center"><input type="checkbox" disabled name="timings[]" id="radio22"
                                                  value="02:15" <?php
                            for ($j = 0; $j < $i; $j++) {
                                if ($time[$j] == "02:15") {
                                    echo "checked";
                                }
                            }
                            ?>/>
                            02:15 PM
                        </th>
                        <th align="center"><input type="checkbox" disabled name="timings[]" id="radio22"
                                                  value="06:15" <?php
                            for ($j = 0; $j < $i; $j++) {
                                if ($time[$j] == "06:15") {
                                    echo "checked";
                                }
                            }
                            ?>/>
                            06:15 PM
                        </th>
                    </tr>
                    <tr>
                        <th align="center"><input type="checkbox" disabled name="timings[]" id="radio10"
                                                  value="11:30" <?php
                            for ($j = 0; $j < $i; $j++) {
                                if ($time[$j] == "11:30") {
                                    echo "checked";
                                }
                            }
                            ?> />
                            11:30
                            <label for="radio10"></label>
                            AM
                        </th>
                        <th align="center"><input type="checkbox" disabled name="timings[]" id="radio23"
                                                  value="02:30" <?php
                            for ($j = 0; $j < $i; $j++) {
                                if ($time[$j] == "02:30") {
                                    echo "checked";
                                }
                            }
                            ?>/>
                            02:30 PM
                        </th>
                        <th align="center"><input type="checkbox" disabled name="timings[]" id="radio23"
                                                  value="06:30" <?php
                            for ($j = 0; $j < $i; $j++) {
                                if ($time[$j] == "06:30") {
                                    echo "checked";
                                }
                            }
                            ?>/>
                            06:30 PM
                        </th>
                    </tr>
                    <tr>
                        <th align="center"><input type="checkbox" disabled name="timings[]" id="radio11"
                                                  value="11:45" <?php
                            for ($j = 0; $j < $i; $j++) {
                                if ($time[$j] == "11:45") {
                                    echo "checked";
                                }
                            }
                            ?>/>
                            11:45
                            <label for="radio11"></label>
                            AM
                        </th>
                        <th align="center"><input type="checkbox" disabled name="timings[]" id="radio24"
                                                  value="02:45" <?php
                            for ($j = 0; $j < $i; $j++) {
                                if ($time[$j] == "02:45") {
                                    echo "checked";
                                }
                            }
                            ?>/>
                            02:45 PM
                        </th>
                        <th align="center"><input type="checkbox" disabled name="timings[]" id="radio24"
                                                  value="06:45" <?php
                            for ($j = 0; $j < $i; $j++) {
                                if ($time[$j] == "06:45") {
                                    echo "checked";
                                }
                            }
                            ?>/>
                            06:45 PM
                        </th>
                    </tr>
                    <tr>
                        <th align="center">&nbsp;</th>
                        <th align="center"><input type="checkbox" disabled name="timings[]" id="radio25"
                                                  value="03:00" <?php
                            for ($j = 0; $j < $i; $j++) {
                                if ($time[$j] == "03:00") {
                                    echo "checked";
                                }
                            }
                            ?>/>
                            03:00 PM
                        </th>
                        <th align="center"><input type="checkbox" disabled name="timings[]" id="radio25"
                                                  value="07:00" <?php
                            for ($j = 0; $j < $i; $j++) {
                                if ($time[$j] == "07:00") {
                                    echo "checked";
                                }
                            }
                            ?>/>
                            07:00 PM
                        </th>
                    </tr>
                    <tr>
                        <th align="center">&nbsp;</th>
                        <th align="center"><input type="checkbox" disabled name="timings[]" id="radio26"
                                                  value="03:15" <?php
                            for ($j = 0; $j < $i; $j++) {
                                if ($time[$j] == "03:15") {
                                    echo "checked";
                                }
                            }
                            ?>/>
                            03:15 PM
                        </th>
                        <th align="center"><input type="checkbox" disabled name="timings[]" id="radio26"
                                                  value="07:15" <?php
                            for ($j = 0; $j < $i; $j++) {
                                if ($time[$j] == "07:15") {
                                    echo "checked";
                                }
                            }
                            ?>/>
                            07:15 PM
                        </th>
                    </tr>
                    <tr>
                        <th align="center">&nbsp;</th>
                        <th align="center"><input type="checkbox" disabled name="timings[]" id="radio27"
                                                  value="03:30" <?php
                            for ($j = 0; $j < $i; $j++) {
                                if ($time[$j] == "03:30") {
                                    echo "checked";
                                }
                            }
                            ?>/>
                            03:30PM
                        </th>
                        <th align="center"><input type="checkbox" disabled name="timings[]" id="radio27"
                                                  value="07:30" <?php
                            for ($j = 0; $j < $i; $j++) {
                                if ($time[$j] == "07:30") {
                                    echo "checked";
                                }
                            }
                            ?>/>
                            07:30PM
                        </th>
                    </tr>
                    <tr>
                        <th align="center">&nbsp;</th>
                        <th align="center"><input type="checkbox" disabled name="timings[]" id="radio28"
                                                  value="03:45" <?php
                            for ($j = 0; $j < $i; $j++) {
                                if ($time[$j] == "03:45") {
                                    echo "checked";
                                }
                            }
                            ?>/>
                            03:45 PM
                        </th>
                        <th align="center"><input type="checkbox" disabled name="timings[]" id="radio16"
                                                  value="07:45" <?php
                            for ($j = 0; $j < $i; $j++) {
                                if ($time[$j] == "07:45") {
                                    echo "checked";
                                }
                            }
                            ?> />
                            07:45PM
                        </th>
                    </tr>
                    <tr>
                        <th colspan="3" align="center"></th>
                    </tr>
                </table>
            </form>


            <div id="respond"></div>
        </div>
        <?php include("adminsidemenu.php"); ?>
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
