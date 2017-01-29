<?php
session_start();
?>


<Script Language=Javascript>
    function CheckDate() {
        var str1 = document.getElementById("demo1");
        var str2 = document.getElementById("todate");
        var string1 = str1.value;
        var string2 = str2.value;

        var arrfromdate = string1.split("-");
        var fdate = arrfromdate[0];
        var fmonth = arrfromdate[1];
        var fyear = arrfromdate[2];

        var arrtodate = string2.split("/");
        var tdate = arrtodate[0];
        var tmonth = arrtodate[1];
        var tyear = arrtodate[2];

        var date1 = new Date(fyear, fmonth, fdate);
        var date2 = new Date(tyear, tmonth, tdate);
        var dayNames = new Array("Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday");


        var dmonth = fmonth - 1;

        var date3 = new Date(fyear, dmonth, fdate);
        var dayname = dayNames[date3.getDay()];

        if (date1 > date2) {
            alert("You cant take appointment for this date..");
            document.getElementById("demo1").style.backgroundColor = "#FFFFE0";
            document.getElementById("demo1").value = "";
            return false;
        }
        else if (dayname == "Sunday") {
            alert("Sunday is Holiday..");
            document.getElementById("demo1").style.backgroundColor = "#FFFFE0";
            document.getElementById("demo1").value = "";
            return false;
        }
    }
</Script>
<?php
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
<?php
include("menu.php");
?>

<!-- Patient Login Form####################################################################################################### -->
<div id="container">
    <div class="wrapper">
        <div id="content">
            <?php

            if(isset($_SESSION["patid"]))
            {
                $enable ="true";
            $dt= "$_POST[year]-$_POST[month]-$_POST[date]"; ?>
            <form id="formID" class="formular" method="post" action="appointmenttime.php">


                 <div align="center"><strong>Make An Appointment</strong></div>

              <p>Patient ID

                <input type="text" name="patid" id="textfield" class="validate[required,custom[onlyNumberSp]] text-input" readonly="readonly" value=<?php echo $_SESSION["patid"]; ?>>

              Patient Name
              <input type="text" name="patname" id="textfield2" class="validate[required,custom[onlyLetterSp]] text-input"
             readonly="readonly" value="<?php echo $_SESSION["patname"]; ?>"/>
              <label for="select"></label>

              Doctor Name
              <input type="hidden" name="docid" id="docid" class="validate[required,custom[onlyLetterSp]] text-input"
              value="<?php echo $_SESSION["appdocid"]; ?>" />
              <input type="text" name="docname" id="textfield3"  class="validate[required,custom[onlyLetterSp]] text-input"  readonly="readonly" value="<?php echo $_SESSION["appdocname"]; ?>"/>
               Specialist Type :
                <input type="text" name="sptype" id="textfield4" class="validate[required] text-input" readonly="readonly" value="<?php echo $_SESSION[appdocsptype];?>"/>
            <?php
            $tomorrow = mktime(0,0,0,date("m")+1,date("d"),date("Y"));
             $tdate= date("d/m/Y", $tomorrow);

            ?>
                <input type="hidden" name="todate" id="todate" value="<?php echo $tdate; ?>">
                  Appointment Date :<label for="select"></label><script type="text/javascript">
            function show_alert()
            {
                alert("Please select Date Time Picker");
            }
            </script>
                <script src="datetimepicker_css.js"></script>

                <input type="Text" id="demo1" maxlength="25" size="25" onclick="show_alert()" name="dateofbirth" readonly  class="validate[required]"  onchange="CheckDate()"/>
                    <img src="images/cal.gif" onclick="javascript:NewCssCal ('demo1','ddMMyyyy','','','','','future')"  style="cursor:pointer"/>
              <br />


                Comment
                <label for="textarea"></label>
                <textarea name="comment" id="comment" cols="45" rows="5"></textarea>
              </p>
                 <div align="center">

                 <input type="submit" name="button" id="button" value="Make An Appointment" />
                 </div>

                  </form>



            <?php
            $sql="INSERT INTO appointment (patid, datetime,atime, adate, comment)
            VALUES
            ('$_POST[patid]','$dt','$_POST[atime]','$_POST[adate]','$_POST[adate]')";

            }
            else
            {
            ?>
                  <h1>Patient Login</h1>
                  <p>&nbsp;</p>
                <?php
                if(isset($_GET["apptaken"]))
                {
            echo "<form method=post action='' id='formID' class='formular' >";
                }
            else
            {
                echo "<form method=post action='patientaccount.php' id='formID' class='formular' >";
            }
                ?>


                  <p>
                  <center>  <img src="images/demo/patient-man-in-pain-thumb14255893.jpg" alt="" width="230" height="150" /></center></p>
                 <p>Please enter Login ID and Password...</p>
                 <p><font color="#FF0000"><?php echo $_SESSION[loginvalidation]; ?></font></p>
                 <p>Login ID :
                   <input type="text" name="loginid"  id="loginid" class="validate[required,custom[onlyNumberSp]] text-input"  value="" size="22" />
                </p>
                  <p>
                    Password : <input type="password" name="password" id="password"  class="validate[required] text-input" value="" size="22" />
                  </p>
                  <p><a href="forgotpass.php">Forgot Password</a><br />
                    <input name="btnlogin" type="submit" id="submit" value="Login"  class="submit"/>
                  </p>
              <p>&nbsp;<br />&nbsp;</p>
                  </form>

                  <form method="post" action="register.php" id="formID1" class="formular" >
                   <p>
            <b>New User</b>
                  </p>
                   <input name="btnlogin" type="submit" id="submit" value="Click here to Register"  class="submit"/>
              <p>&nbsp;<br />&nbsp;</p>
                  <p>
            &nbsp;<br />&nbsp;
                  </p>
                  </form>
                  <p>&nbsp;</p>
            <!-- Patient Login Form Ends Here####################################################################################################### -->
             <?php
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
