<?php
session_start();

if($_SESSION["adminid"] != "")
{
?>
<div id="column">
      <div class="subnav">
        <h2>Admin Account</h2>
        <ul>
          <li><a href="adminaccount.php">Admin Home</a></li>
          <li><a href="admin.php">Admin Profile</a></li>
          <li><a href="adminappview.php">Appointment</a> </li>
          <li><a href="patientrecords.php">Patient Reports</a> </li>
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
}
else if($_SESSION["empid"] != "")
{
	?>
<div id="column">
      <div class="subnav">
       <h2>Employee Account</h2>
        <ul>
          <li><a href="empaccount.php">Employee Home</a></li>					         
          <li><a href="empprofile.php">Employee Profile</a></li>
           <li><a href="empchangepass.php">Change Password</a></li>
          <li><a href="empappview.php">Appointment</a> </li>
          <li><a href="emplab.php">Laboratory</a></li>
          <li><a href="patientreports.php">Patient Bill</a> </li>        
          <li><a href="doctimingsview.php">Timings</a></li>
          <li><a href="expens.php">Expenses</a></li>
        
          <li><a href="logout.php">Logout</a></li>
        </ul>
      </div>
    </div>
    <?php
}
else
{
	?>
	    <div id="column">
      <div class="subnav">
        <h2>Login</h2>
        <ul>
         <li><font color="#FF0000"><b>Enter Valid Login ID or Admin ID and Password to Login <b></font></li>         
        </ul>
      </div>
      <div class="holder"></div>
    </div>
    <?php
}
?>