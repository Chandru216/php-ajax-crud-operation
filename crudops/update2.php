<?php
include 'connect.php';

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all required fields are set and not empty
    // if (isset($_POST['firstName']) && isset($_POST['lastName']) && isset($_POST['employeeId'])) {
        // Get the submitted form data
        $firstName = "Durga";
        $lastName = $_POST['lastName'];
        $employeeId = $_POST['employeeID'];
        $department = $_POST['department'];
        $requestDate = $_POST['requestDate'];
        $leaveType = implode(", ", $_POST['leaveType']);
        $reason = $_POST['reason'];
        $absenceFrom = $_POST['absenceFrom'];
        $absenceThrough = $_POST['absenceThrough'];
// var_dump($firstName, $lastName, $_POST['employeeID'], $department, $requestDate, $leaveType, $reason, $absenceFrom, $absenceThrough);
        // Update the record in the database
        $sql = "UPDATE leave_table SET First_Name = '$firstName', Last_Name = '$lastName', Department = '$department', Date = '$requestDate', Type_of_Absence = '$leaveType', Reason = '$reason', Absence_From = '$absenceFrom', Absence_Through = '$absenceThrough' WHERE Emp_Id = '$employeeId'";
        
        if (mysqli_query($con, $sql)) {
            header('Location: index.html');   // header('Location: ' . $_SERVER["PHP_SELF"]);
            echo "Details Updated!!!";
        } else {
            echo 'error';
        }
    // } else {
    //     echo 'error';
    // }


// $name="durga";
 echo $firstName;//
 echo $lastName;
?>
