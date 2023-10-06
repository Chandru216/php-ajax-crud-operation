<?php
include 'connect.php';

$sql = "select * from leave_table"; 
$result = mysqli_query($con, $sql);      //this method allow us to execute the above query

if (!$result) {
    die(mysqli_error($con));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <style>
          .custom-table {
            border: 2px solid;
            width: 100%; 
            border-collapse: collapse; 
        }

         .custom-table th, .table td {
            border: 1px solid;
            padding: 8px; 
            text-align: center;
        }  
    </style>
    
</head>
<body>

<div class="container">
  <h2>Modal Example</h2>
  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog modal-dialog-centered" style="width:900px; margin-top: 50px;">
    
      <!-- Modal content-->
      <div class="modal-content" style="max-width: 1000px;">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Employee Table</h4>
        </div>
        <div class="modal-body">
        <table class="table table-bordered custom-table mt-4">
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
            
            while ($row = mysqli_fetch_assoc($result)) {  //mysqli_fetch_assoc->used to retrieve a row from a result set obtained 
                echo "<tr>";
                echo "<td>{$row['First_Name']}</td>";    //key->column names // values-> column values
                echo "<td>{$row['Last_Name']}</td>";
                echo "<td>{$row['Emp_Id']}</td>";
                echo "<td>{$row['Department']}</td>";
                echo "<td>{$row['Date']}</td>";
                echo "<td>{$row['Type_of_Absence']}</td>";
                echo "<td>{$row['Reason']}</td>";
                echo "<td>{$row['Absence_From']}</td>";
                echo "<td>{$row['Absence_Through']}</td>";
                echo "<td> <button> <a href='delete.php?deleteid={$row['Emp_Id']}'> Delete </a></button> </td>";
                echo "<td> <button> <a href='update.php?updateid={$row['Emp_Id']}'> Update </a></button> </td>";
                echo "</tr>";
            }
            ?>

</table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>

</body>
</html>
