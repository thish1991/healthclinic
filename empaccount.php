<?php
session_start();
$menu = 1;
include("dbconnection.php");
include("header.php");
include("validation/header.php");
include("functions/emp.php");

//CHECKS login button is submitted or not
if (isset($_POST["btnlogin"])) {
    //patient Login funtion..
    $loginvalidation = loginfuntion($_POST["loginid"], $_POST["password"]);
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
            if (isset($_SESSION["empid"]) && $_SESSION["usertype"] == "EMPLOYEE") {

                echo "<h2>Welcome to Receptionist Account </h2> ";


            } else {
                ?>
                <h1>Receptionist Login</h1>
                <p>&nbsp;</p>

                <form method="post" action="" id="formID" class="formular">
                    <p>
                    <center><img src="images/demo/receptionist (2).jpg" alt="" width="280" height="183"/></center>
                    </p>
                    <p><font color="#FF0000"><?php echo $loginvalidation; ?></font></p>

                    <p>Login ID :
                        <input type="text" name="loginid" id="textfield"
                               class="validate[required,custom[onlyNumberSp]] text-input" value="" size="22"/>
                    </p>

                    <p>
                        Password : <input type="password" name="password" id="password"
                                          class="validate[required] text-input" value="" size="22"/>
                    </p>

                    <br/>
                    <input name="btnlogin" type="submit" id="submit" value="Login" class="submit"/>

                    </p>
                    <p>&nbsp;

                    </p>
                </form>

                <!-- Patient Login Form Ends Here####################################################################################################### -->
                <?php
            }
            ?>


            <h2>&nbsp;</h2>

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
