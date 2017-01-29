<?php
if(isset($_SESSION["empid"]))
{
?>
<div id="column">
      <div class="subnav">
       <h2>Employee Account</h2>
        <ul>
          <li><a href="empaccount.php">Employee Home</a></li>					         <li><a href="empprofile.php">Employee Profile</a></li>
        
          <li><a href="empchangepass.php">Change Password</a></li>
          <li><a href="empappview.php">Appointment</a> </li>
          <li><a href="emplab.php">Laboratory</a></li>
          <li><a href="patientreports.php">Patient Reports</a> </li>
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
        <h2>Receptionist Account</h2>
        <ul>
          <li><font color="#FF0000"><b>Enter Valid Login ID or Employee ID and Password to Login to the Receptionist Account<b></font></li>
          
        </ul>
      </div>
      <div class="holder"></div>
    </div>
<?php
}
?>