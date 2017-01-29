<?php
session_start();
$menu = 2;
include("dbconnection.php");
include("header.php");
include("validation/header.php");
include("functions/staff.php");
if (isset($_POST["submit"])) {
    $dname = $_POST[docfname] . " " . $_POST[docmname] . " " . $_POST[doclname];
    if (isset($_SESSION["docid"])) {
        $resrec = mysqli_query($con, "UPDATE doctor SET
doctorname='$dname', quali='$_POST[quali]',specialistin='$_POST[specialistin]',contactno ='$_POST[contactno]',emailid='$_POST[emailid]',biodata='$_POST[biodata]' WHERE docid = '$_POST[docid]' ");
    } else {
        $resrec = mysqli_query($con, "UPDATE doctor SET
doctorname='$dname', quali='$_POST[quali]',specialistin='$_POST[specialistin]',contactno ='$_POST[contactno]',emailid='$_POST[emailid]',biodata='$_POST[biodata]' WHERE docid = '$_POST[docid]' ");
    }
    $updrec = "Record Updated Successfully..";
}


$resultpatientrec = mysqli_query($con, "SELECT * FROM doctor WHERE docid ='$_GET[docids]'");

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


include("menu.php");
?>

<!-- Patient Login Form####################################################################################################### -->
<div id="container">
    <div class="wrapper">
        <div id="content">
            <p>
                <?php


                include("validation/header.php");
                //retrieve country from database. Table: country
                include("dbconnection.php");

                ?>

                <a href="admindoc.php"> < < Back </a></p>

            <form id="formID" class="formular" method="post" action="">
                <div align="center"><strong><u>Doctor Profile Page</u></strong></div>
                <br/>
                <font color="#FF0000"><b><?php echo $updrec; ?></b></font>

                <p>
                    <label>Doctor ID
                        <input name="docid" type="text" value="<?php echo $_GET[docids]; ?>" readonly/>
                    </label>
                </p>

                <p>
                    <label> First Name
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
                <input class="validate[required] text-input" type="text" name="quali" id="quali"
                       value="<?php echo $qualification; ?>"/></br>
                Specialist In :
                <input type="text" name="specialistin" class="validate[required] text-input" id="specialistin"
                       value="<?php echo $specialistin; ?>"/><br/>
                Contact No :<input type="text" name="contactno" id="textfield7"
                                   class="validate[required,custom[phone],minSize[10],maxSize[12]] text-input"
                                   value="<?php echo $contactno; ?>"/><br/>
                Email ID :
                <input type="text" name="emailid" id="textfield3"
                       class="validate[required,custom[email]] text-input" value="<?php echo $emailid; ?>"/><br/>

                Biodata :
                <textarea name="biodata" id="textarea" cols="45" rows="5"><?php echo $biodata; ?></textarea><br/>
                <input class="submit" type="submit" value="Update Profile" name="submit"/>
                <hr/>


            </form>

            <?php
            ?>
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
