<?php
// update.php
include 'connect.php';


    $updateId = $_GET['updateid'];
    
    $sql = "SELECT * FROM leave_table WHERE Emp_Id = '$updateId'";
    $result = mysqli_query($con, $sql);
    
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        
        // Load the update form with existing data
        echo "<form id='updateForm'>";
        echo "<input type='hidden' id='updateId' value='{$row['Emp_Id']}'>";
        echo "<input type='text' id='updatedFirstName' value='{$row['First_Name']}'>";
        echo "<input type='text' id='updatedLastName' value='{$row['Last_Name']}'>";
        // Add more form fields for other data
        
        echo "<button type='submit'>Update</button>";
        echo "</form>";
    } else {
        echo "Record not found";
    }



?>