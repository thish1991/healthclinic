<?php
if (isset($_SESSION["docid"])) {
    ?>
    <div id="column">
        <div class="subnav">
            <h2>Doctros Account</h2>
            <ul>
                <li><a href="doctoraccount.php">Home</a></li>
                <li><a href="docprofile.php">Doctors Profile</a></li>
                <li><a href="docchangepass.php">Change Password</a></li>
                <li><a href="appointmentrecords.php">Appointment Records</a></li>
                <li><a href="docpattreatment.php">Reports</a></li>
                <li><a href="adminprescription.php">Prescription</a></li>
                <li><a href="timings.php">Timings</a></li>
                <li><a href="earnings.php">Earnings</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>
    </div>
    <?php
} else if (isset($_SESSION["adminid"])) {
    ?>
    <div id="column">
        <div class="subnav">
            <h2>Admin Account</h2>
            <ul>
                <li><a href="adminaccount.php">Admin Home</a></li>
                <li><a href="admin.php">Admin Profile</a></li>
                <li><a href="adminappview.php">Appointment</a></li>
                <li><a href="patientrecords.php">Patient Reports</a></li>
                <li><a href="admindoc.php">Doctor</a></li>
                <li><a href="adminemp.php">Employee</a></li>
                <li><a href="employeesalary.php">Salary</a></li>
                <li><a href="expens.php">Expenses</a></li>
                <li><a href="testtype.php">Test Type</a></li>
                <li><a href="adminprescription.php">Prescription</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>
    </div>
    <?php
} else {
    ?>
    <div id="column">
        <div class="subnav">

            </ul>
        </div>
        <div class="holder"></div>
    </div>
    <?php
}
?>