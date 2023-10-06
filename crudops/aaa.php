<?php
include 'connect.php';

$id = $_GET['updateid'];

// Fetch existing data for the specified Emp_Id
$sql_fetch = "SELECT * FROM leave_table WHERE Emp_Id='$id'";
$result_fetch = mysqli_query($con, $sql_fetch);
$row = mysqli_fetch_assoc($result_fetch);

if(isset($POST['updateid'])){

	$id = $_POST['updateid'];
	$firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $employeeId = $_POST['employeeId'];
    $department = $_POST['department'];
    $requestDate = $_POST['requestDate'];
    $leaveType = implode(",", $_POST['leaveType']);
    $reason = $_POST['reason'];
    $absenceFrom = $_POST['absenceFrom'];
    $absenceThrough = $_POST['absenceThrough'];

    // Update the database with new data
    $sql_update = "UPDATE leave_table 
        SET First_Name='$firstName', Last_Name='$lastName', Emp_Id='$id', Department='$department', Date='$requestDate', Type_of_Absence='$leaveType', Reason='$reason', Absence_From='$absenceFrom', Absence_Through='$absenceThrough' 
        WHERE Emp_Id='$id'";

    $result_update = mysqli_query($con, $sql_update);

    if ($result_update) {
        echo 'success';
    } else {
        echo 'error';
    }
    exit; 
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leave Application</title>
    <!-- Link Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Link Font Awesome Icon CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer"
    />
    <!-- Link your custom CSS -->
    <link rel="stylesheet" href="styles.css">
    
</head>

<body>
    <!-- <div class="container header col-md-8">
        <div class="d-flex title-container pr-3">  -pr-3 -> right padding-->  <!-- d-flex-It turns the element into a flex container, allowing its children to be positioned with flex properties.
            <div class="logo-container"><img class="logo" src="images/jorim_logo.png" /></div>
            <div class="ml-auto">
                <h4 class="text-right">Leave Application</h4>
                <h6 class="text-right">Leave Request Form</h6>
            </div>
        </div>
    </div>
    <div class="container col-md-8 p-3 pb-4"> -->
        
        <div class="form-container" id="form-container">
            <form id="leaveForm" method="post" >     <!-- form action-->
                <div class="form-row">

                    <input type="text" class="invisible" id="updateid" name="updateid" value="<?php echo $id; ?>" required>

                    <div class="form-group col-md-6">
                        <label for="firstName">Employee Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="firstName" name="firstName" value="<?php echo $row['First_Name']; ?>" required>
                        <small class="form-text text-muted">First</small>
                    </div>

                    <div class="form-group col-md-6">
                        <label class="invisible">Employee Name</label>
                        <input type="text" class="form-control" id="lastName" name="lastName" value="<?php echo $row['Last_Name']; ?>"required>
                        <small class="form-text text-muted">Last</small>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="employeeId">Employee ID <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="employeeId" name="employeeId" value="<?php echo $row['Emp_Id']; ?>" required>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="department">Department</label>
                        <select class="custom-select" id="department" name="department" value="<?php echo $row['Department']; ?>"required>
                                <option value="Development">Development</option>
                                <option value="HR">HR</option>
                                <option value="Sales">Sales</option>
                                <option value="QA">QA</option>
                                
                            </select>
                    </div>
                    <div class="form-group col-md-4 mb-0">
    <label for="requestDate">Date <span class="text-danger">*</span></label>
    <input type="datetime-local" class="form-control" id="requestDate" name="requestDate"value="<?php echo date('Y-m-d\TH:i', strtotime($row['Date'])); ?>" required>
</div>

                </div>
                <div class="form-group">
    <label>Type of Absence Request <span class="text-danger">*</span></label>
    <div class="row">
        <div class="col-md-4">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="sick" name="leaveType[0]" value="sick"
                <?php if (strpos($row['Type_of_Absence'], 'sick') !== false) echo 'checked'; ?>>
                <label class="form-check-label" for="sick">Sick</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="personal" name="leaveType[1]" value="personal"
                <?php if (strpos($row['Type_of_Absence'], 'personal') !== false) echo 'checked'; ?>>
                <label class="form-check-label" for="personal">Personal Leave</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="bereavement" name="leaveType[2]" value="bereavement"
                <?php if (strpos($row['Type_of_Absence'], 'bereavement') !== false) echo 'checked'; ?>>
                <label class="form-check-label" for="bereavement">Bereavement</label>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="maternityPaternity" name="leaveType[3]" value="maternityPaternity"
                <?php if (strpos($row['Type_of_Absence'], 'maternityPaternity') !== false) echo 'checked'; ?>>
                <label class="form-check-label" for="maternityPaternity">Maternity/Paternity</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="timeOff" name="leaveType[4]" value="timeOff"
                <?php if (strpos($row['Type_of_Absence'], 'timeOff') !== false) echo 'checked'; ?>>
                <label class="form-check-label" for="timeOff">Time off without payment</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="others" name="leaveType[5]" value="others"
                <?php if (strpos($row['Type_of_Absence'], 'others') !== false) echo 'checked'; ?>>
                <label class="form-check-label" for="others">Others</label>
            </div>
        </div>
    </div>
</div>

                <div class="form-group">
                    <label for="reason">Reason</label>
                    <textarea class="form-control" id="reason" name="reason" rows="3" required><?php echo $row['Reason']; ?></textarea>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="absenceFrom">Absence From <span class="text-danger">*</span></label>
                        <input type="datetime-local" class="form-control" id="absenceFrom" name="absenceFrom" value="<?php echo date('Y-m-d\TH:i', strtotime($row['Absence_From'])); ?>" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="absenceThrough">Absence Through <span class="text-danger">*</span></label>
                        <input type="datetime-local" class="form-control" id="absenceThrough" name="absenceThrough" value="<?php echo date('Y-m-d\TH:i', strtotime($row['Absence_Through'])); ?>" required>
                    </div>
                </div>

                <div class="form-group">
                    <div class="container-box">
                        <!-- style="line-height: 0.5;  (use here or external css)-->
                        
                        <p><b>Certification: </b>I hereby request leave/approved absence from duty as indicated above and certify that such leave/absence is requested for the purpose(s) indicated. I understand that flasification on this form may be grounds
                            for disciplinary action.
                        </p>
                    </div>
                </div>

                <div class="captcha-label">
                    <label for="captchaInput">Enter the text in the box below:</label>
                </div>
                <div class="row">
                    <div class="captcha-container pl-3">
                        <img class="captcha" src="images/captcha.png" alt="CAPTCHA Image">
                    </div>
                    <i class="fa fa-refresh ml-3 pt-2"></i>         <!--  icon -->
                    <input type="text" class="form-control col-md-3 ml-3" id="captch-text" name="captcha-text" required>
                    <button type="submit" class="btn btn-primary ml-3" id="submit" value="submit" name="submit">Update</button>
                </div>
                
            </form>
            
        </div>
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
    $(document).ready(function () {
        $('#leaveForm').submit(function (e) {
            e.preventDefault(); // Prevent the form from submitting traditionally

            // Serialize the form data
            var formData = $(this).serialize();

            // Send an AJAX request to update.php
            $.ajax({
                type: 'POST',
                url: 'update.php?updateid=<?php echo $id; ?>',
                data: formData,
                success: function (response) {
                    // Handle the response, e.g., show a success message or handle errors
                    if (response === 'success') {
                        alert("Updated Successfully");
                        window.location = "view.php";
                    } else {
                        alert("Update failed");
                    }
                },
                error: function (xhr, status, error) {
                    console.log(xhr.responseText);
                }
            });
        });
    });
</script>


</body>

</html>