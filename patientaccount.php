 <?php
session_start();
$menu = 1;
include("dbconnection.php");
include("header.php");
include("validation/header.php");
include("functions/patient.php");

//CHECKS login button is submitted or not
if (isset($_POST["btnlogin"])) {
    //patient Login funtion..
    $_SESSION[loginvalidation] = loginfuntion($_POST["loginid"], $_POST["password"]);
}
?>
<!-- ####################################################################################################### -->
<?php include("menu.php");
?>


<!-- Patient Login Form####################################################################################################### -->
<div id="container">
    <div class="wrapper">
        <div id="content">
            <?php
            if (isset($_SESSION["patid"])) {
                $enable = "true";


            } else {
                header("Location: makeappoint.php");
            }
            ?>


            <h2>&nbsp;</h2>

            <div id="respond"></div>
        </div>
        <?php include("sidemenupatient.php"); ?>
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
