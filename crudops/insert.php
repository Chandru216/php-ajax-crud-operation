<?php
include 'connect.php';   //connecting database

// print_r($_POST);

  $firstName=$_POST['firstName'];       //post ->used to send data to a server 
  $lastName=$_POST['lastName'];         //get ->used to request data from a specified resource.
  $employeeId=$_POST['employeeId'];
  $department=$_POST['department'];
  $requestDate=$_POST['requestDate'];
  $leaveType= implode(",",$_POST['leaveType']);    // CHECKBOX
  $reason=$_POST['reason'];
  $absenceFrom=$_POST['absenceFrom'];
  $absenceThrough=$_POST['absenceThrough'];
  


$sql ="insert into leave_table (First_Name,Last_Name,Emp_Id,Department,Date,Type_of_Absence,Reason,Absence_From, Absence_Through) values('$firstName','$lastName','$employeeId','$department',' $requestDate','$leaveType',' $reason','$absenceFrom','$absenceThrough')";

$result =mysqli_query($con,$sql);   //this method allow us to execute the above query

if ($result) {
  echo 'Submitted Successfully';
} else {
  echo 'Submission Failed';
}


?>


