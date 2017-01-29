<?php
if(isset($_SESSION["patid"]))
{
?>
<div id="column">
      <div class="subnav">
        <h2>Patient Account </h2>
        <p><strong>Patient ID : <?php echo $_SESSION["patid"]; ?><br />
        Name : <?php echo $_SESSION["patname"]; ?></strong></p>
        <ul>
          <li><a href="patientaccount.php">Patient Account</a></li>
          <li><a href="profile.php">Patient Profile</a></li>
          <li><a href="changepass.php">Change Password</a></li>
          <li><a href="appointmenttaken.php">Appointments</a> </li>
          <li><a href="pattreatment.php">Treatment Details</a></li>
          <li><a href="patreports.php">Lab Test Reports</a></li>
          <li><a href="logout.php">Logout</a></li>
        </ul>
      </div>
    </div>
<?php
}

?>