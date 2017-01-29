<?php
session_start();
$menu = 2;
include("dbconnection.php");
include("header.php");
include("validation/header.php");
include("functions/staff.php");

if (isset($_POST["submit"])) {
    $dname = $_POST[docfname] . " " . $_POST[docmname] . " " . $_POST[doclname];
    if (isset($_SESSION[docid])) {
        $resrec = mysqli_query($con, "UPDATE doctor SET
doctorname='$dname', quali='$_POST[quali]',specialistin='$_POST[specialistin]',contactno ='$_POST[contactno]',emailid='$_POST[emailid]',biodata='$_POST[biodata]' WHERE docid = '$_SESSION[docid]' ");
    } else {
        $resrec = mysqli_query($con, "UPDATE doctor SET
doctorname='$dname', quali='$_POST[quali]',specialistin='$_POST[specialistin]',contactno ='$_POST[contactno]',emailid='$_POST[emailid]',biodata='$_POST[biodata]' WHERE docid = '$_SESSION[docid]' ");
    }

    $updrec = "Record Updated Successfully..";
}

$resultpatientrec = mysqli_query($con, "SELECT * FROM doctor WHERE docid ='$_SESSION[docid]'");
while ($row = mysqli_fetch_array($resultpatientrec)) {

    $wordChunks = explode(" ", $row[doctorname]);
    for ($i = 0; $i < count($wordChunks); $i++) {
        $name[$i] = $wordChunks[$i];
    }

    //$doctorname2 =  array($doctorname1);
    $qualification = $row["quali"];
    $specialistin = $row["specialistin"];
    $contactno = $row["contactno"];
    $emailid = $row["emailid"];
    $biodata = $row["biodata"];

}


//CHECKS login button is submitted or not
if (isset($_POST["btnlogin"])) {
    //patient Login funtion..
    $loginvalidation = loginfuntion($_POST["loginid"], $_POST["password"]);
}
include("menu.php");
?>

<!-- Patient Login Form####################################################################################################### -->
<div id="container">
    <div class="wrapper">
        <div id="content">
            <p>
                <?php
                if (isset($_SESSION["docid"]))
                {
                include("validation/header.php");
                //retrieve country from database. Table: country
                include("dbconnection.php");

                ?>

                <a href="doctoraccount.php"> < < Back </a></p>

            <form id="formID" class="formular" method="post" action="">
                <div align="center"><strong><u>Doctor Profile Page</u></strong></div>
                <br/>
                <font color="#FF0000"><b><?php echo $updrec; ?></b></font>

                <p>
                    <label for="textfield">First Name :</label>
                    <label>
                        <input name="docfname" type="text" class="validate[required,custom[onlyLetterSp]] text-input"
                               id="req" value="<?php echo $name[0]; ?>"/>
                    </label>
                </p>

                <p>Middle Name
                    <label>
                        <input class="validate[required,custom[onlyLetterSp]] text-input" type="text" name="docmname"
                               id="req2" value="<?php echo $name[1]; ?>"/>
                    </label>
                </p>

                <p>Last Name
                    <label>
                        <input class="validate[required,custom[onlyLetterSp]] text-input" type="text" name="doclname"
                               id="req1" value="<?php echo $name[2]; ?>"/>
                    </label>
                </p>
                <br/>
                Qualification
                <input class="validate[required] text-input" text-input" type="text" name="quali" id="quali"
                value="<?php echo $qualification; ?>" /></br>
                Specialist In :
                <input type="text" name="specialistin" id="specialistin" class="validate[required] text-input"
                       value="<?php echo $specialistin; ?>"/><br/>
                Contact No :<input type="text" name="contactno" id="textfield7"
                                   class="validate[required,custom[phone],minSize[10],maxSize[12]] text-input"
                                   value="<?php echo $contactno; ?>"/><br/>
                Email ID :
                <input type="text" name="emailid" id="textfield3" class="validate[required,custom[email]] text-input"
                       value="<?php echo $emailid; ?>"/><br/>

                Biodata :
                <textarea name="biodata" id="textarea" cols="45" rows="5"><?php echo $biodata; ?></textarea><br/>
                <input class="submit" type="submit" value="Update Profile" name="submit"/>
                <hr/>


            </form>

            <?php
            }
            ?>
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
