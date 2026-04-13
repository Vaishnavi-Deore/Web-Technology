<?php
include "db.php";

$id = mysqli_real_escape_string($conn, $_GET['id']);
$result = mysqli_query($conn, "SELECT * FROM employees WHERE emp_id='$id'");
$row = mysqli_fetch_assoc($result);

if(!$row) {
    die("Employee not found!");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Edit Employee</title>
<style>
    body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f4f4f9; padding:20px; }
    .card { background:white; padding:30px; border-radius:8px; box-shadow:0 4px 6px rgba(0,0,0,0.1); max-width: 500px; margin: auto; }
    .form-group{ margin-bottom:15px; }
    label{ display:block; margin-bottom:5px; font-weight:bold; }
    input{ width:95%; padding:10px; border:1px solid #ccc; border-radius:4px; }
    .readonly-input { background-color: #e9ecef; cursor: not-allowed; }
    button{ padding:10px 15px; border:none; border-radius:4px; cursor:pointer; color:white; font-weight:bold; width: 100%; background: #0056b3; margin-top: 10px;}
    .back-link { display: block; text-align: center; margin-top: 15px; text-decoration: none; color: #333; }
</style>
</head>
<body>

<div class="card">
    <h2>Edit Employee</h2>
    <form method="POST" action="update.php">
        
        <div class="form-group">
            <label>Employee ID (Cannot be changed)</label>
            <input type="text" name="emp_id" value="<?php echo $row['emp_id']; ?>" class="readonly-input" readonly>
        </div>

        <div class="form-group">
            <label>Full Name</label>
            <input type="text" name="name" value="<?php echo $row['emp_name']; ?>" required>
        </div>

        <div class="form-group">
            <label>Email Address</label>
            <input type="email" name="email" value="<?php echo $row['emp_email']; ?>" required>
        </div>

        <div class="form-group">
            <label>Job Position</label>
            <input type="text" name="position" value="<?php echo $row['emp_position']; ?>" required>
        </div>

        <div class="form-group">
            <label>Salary</label>
            <input type="number" name="salary" value="<?php echo $row['emp_salary']; ?>" required>
        </div>

        <button type="submit">Update Employee</button>
        <a href="Registration_Page.php" class="back-link">Cancel and Go Back</a>
    </form>
</div>

</body>
</html>