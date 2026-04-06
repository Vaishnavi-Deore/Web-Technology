<?php include "db.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Employee Management System</title>
<style>
:root {
    --primary-color: #0056b3;
    --secondary-color: #f4f4f9;
    --text-color: #333;
    --danger-color: #dc3545;
}
body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: var(--secondary-color);
    margin:0;
    padding:20px;
}
h1 { text-align:center; color:var(--primary-color); }
.container { display:flex; gap:20px; max-width:1200px; margin:auto; }
.card { background:white; padding:20px; border-radius:8px; box-shadow:0 4px 6px rgba(0,0,0,0.1); }
.form-section { flex:1; }
.table-section { flex:2; }
.form-group { margin-bottom:15px; }
label { display:block; margin-bottom:5px; font-weight:bold; }
input { width:95%; padding:10px; border:1px solid #ccc; border-radius:4px; }
button { padding:10px 15px; border:none; border-radius:4px; cursor:pointer; color:white; font-weight:bold; text-decoration: none;}
.btn-submit { background:var(--primary-color); width:100%; }
.btn-edit { background:#ffc107; color:black; padding: 6px 10px; border-radius: 4px; text-decoration: none;}
.btn-delete { background:var(--danger-color); padding: 6px 10px; border-radius: 4px; text-decoration: none; color: white;}
table { width:100%; border-collapse:collapse; }
th, td { padding:12px; border-bottom:1px solid #ddd; text-align: left;}
th { background:var(--primary-color); color:white; }
.action-links { display: flex; gap: 5px; }
</style>
</head>
<body>

<h1>Employee Management System</h1>

<div class="container">
    <div class="card form-section">
        <h2>Add New Employee</h2>
        <form method="POST" action="insert.php">
            <div class="form-group">
                <label>Employee ID</label>
                <input type="text" name="emp_id" required placeholder="e.g., EMP101">
            </div>
            <div class="form-group">
                <label>Full Name</label>
                <input type="text" name="name" required>
            </div>
            <div class="form-group">
                <label>Email Address</label>
                <input type="email" name="email" required>
            </div>
            <div class="form-group">
                <label>Job Position</label>
                <input type="text" name="position" required>
            </div>
            <div class="form-group">
                <label>Salary</label>
                <input type="number" name="salary" required>
            </div>
            <button type="submit" class="btn-submit">Save Employee</button>
        </form>
    </div>

    <div class="card table-section">
        <h2>Employee Records</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Position</th>
                    <th>Salary</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $result = mysqli_query($conn,"SELECT * FROM employees");
                while($row = mysqli_fetch_assoc($result)) {
                ?>
                <tr>
                    <td><?php echo $row['emp_id']; ?></td>
                    <td><?php echo $row['emp_name']; ?></td>
                    <td><?php echo $row['emp_email']; ?></td>
                    <td><?php echo $row['emp_position']; ?></td>
                    <td><?php echo $row['emp_salary']; ?></td>
                    <td class="action-links">
                        <a href="edit.php?id=<?php echo $row['emp_id']; ?>" class="btn-edit">Edit</a>
                        <a href="delete.php?id=<?php echo $row['emp_id']; ?>" class="btn-delete" onclick="return confirm('Are you sure you want to delete this employee?');">Delete</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>