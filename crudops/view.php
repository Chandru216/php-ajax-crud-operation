<?php
include 'connect.php';

// Retrieve the employee name from the URL parameter
$employeeId = $_GET['employeeId'];

// Build the SQL query to filter records by employee name
$sql = "SELECT * FROM leave_table WHERE Emp_Id = '$employeeId'";
$result = mysqli_query($con, $sql);

if (!$result) {
    die(mysqli_error($con));
}
?>

<table class="table table-bordered custom-table mt-4" id="view-table">
    <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Employee Id</th>
        <th>Department</th>
        <th>Date</th>
        <th>Type of Absence Request</th>
        <th>Reason</th>
        <th>Absence From</th>
        <th>Absence Through</th>
    </tr>
    <?php
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<tr id='record_{$row['Emp_Id']}'>";
        echo "<td>{$row['First_Name']}</td>";
        echo "<td>{$row['Last_Name']}</td>";
        echo "<td>{$row['Emp_Id']}</td>";
        echo "<td>{$row['Department']}</td>";
        echo "<td>{$row['Date']}</td>";
        echo "<td>{$row['Type_of_Absence']}</td>";
        echo "<td>{$row['Reason']}</td>";
        echo "<td>{$row['Absence_From']}</td>";
        echo "<td>{$row['Absence_Through']}</td>";
        echo "<td>";
        echo "<button class='delete-button' data-employee-id='{$row['Emp_Id']}'>Delete</button>";
        echo "</td>";
        echo "<td>";
        echo "<button class='update-button' data-employee-id='{$row['Emp_Id']}' id='submit' value='submit'>Update</button>";
    echo "</td>";
        echo "</td>";
        echo "</tr>";
    }
    ?>
</table>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<!-- Inside your view.php file, where you want to load update.php content -->
<div id="update-container"></div>

<button id ="back" class="btn btn-primary back-button" onclick="goBack()">Back</button>

<script>
    $(document).ready(function () {
        function back() {
            $('#records-container').hide(); 
          $('#form-container').show();
          
        }    
        // Load and display records when the page loads
        // loadRecords();

        $('#back').click(function (e) {
          back();
          $("#leaveForm")[0].reset();
        });
    })

    
    // Function to delete a record
// Function to delete a record
function deleteRecord(employeeId) {
    $.ajax({
        url: 'delete.php',
        type: 'POST',
        data: { deleteid: employeeId },
        success: function (response) {
            $('#record_' + employeeId).remove();  
        },
        error: function (xhr, status, error) {
            console.log(xhr.responseText);
        },
    });
}


    // Add a click event handler for the "Delete" buttons
    $('.delete-button').click(function () {
        var employeeId = $(this).data('employee-id');
        if (confirm('Are you sure you want to delete this record?')) {
            deleteRecord(employeeId);
        }
    });

    
    function showUpdateForm() {
            $('#view-table').hide();
            $('#update-container').show();
        }

        // Function to load update page
        function loadUpdatePage(employeeId) {
            $.ajax({
                url: 'update.php?updateid=' + employeeId,

                type: 'GET',
                success: function (response) {
                    $('#update-container').html(response);
                    showUpdateForm(); // Show the update form
                },
                error: function (xhr, status, error) {
                    console.log(xhr.responseText);
                },
            });
        }


          // Add a click event handler for the "Update" buttons
          $('.update-button').click(function () {
            var employeeId = $(this).data('employee-id');
            loadUpdatePage(employeeId);
        });

        // // Add a click event handler for the "Back" button to go back to the view table
        // $('#back').click(function () {
        //     showViewTable(); // Show the view table
        //     $("#leaveForm")[0].reset();
        // });
   
</script>




<!-- // function loadUpdatePage(employeeId) {
    //     $.ajax({
    //         url: 'update.php?updateid=' + employeeId, // Pass the employeeId as a query parameter
    //         type: 'GET',
    //         success: function (response) {
    //             $('#update-container').html(response); // Load the response into a container
    //         },
    //         error: function (xhr, status, error) {
    //             console.log(xhr.responseText);
    //         },
    //     });
    // }

    // // Add a click event handler for the "Update" buttons
    // $('.update-button').click(function () {
    //     var employeeId = $(this).data('employee-id');
    //     loadUpdatePage(employeeId);
    //     hideViewTable();
    // });

    // function hideViewTable() {
    //     $('#view-table').hide(); 
    //     $('#update-container').show();
    // } -->