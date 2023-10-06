<?php
include "connect.php";
print_r($_POST);
if (isset($_POST['deleteid'])) {
    $deleteId = $_POST['deleteid'];

    $sql = "DELETE FROM leave_table WHERE Emp_Id = '$deleteId'";
    $result = mysqli_query($con, $sql);

    if ($result) {
        echo "success";
        exit();
    } else {
        echo "error";
        exit();
    }
} else {
    echo "invalid_request";
    exit();
}

?>
