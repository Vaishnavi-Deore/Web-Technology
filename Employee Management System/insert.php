<?php
include 'db.php';

// Using mysqli_real_escape_string to handle special characters safely
$emp_id = mysqli_real_escape_string($conn, $_POST['emp_id']);
$name = mysqli_real_escape_string($conn, $_POST['name']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$position = mysqli_real_escape_string($conn, $_POST['position']);
$salary = mysqli_real_escape_string($conn, $_POST['salary']);

// Check if ID already exists
$check_query = "SELECT * FROM employees WHERE emp_id = '$emp_id'";
$check_result = mysqli_query($conn, $check_query);

if(mysqli_num_rows($check_result) > 0) {
    echo "<script>alert('Error: Employee ID already exists!'); window.location.href='Registration_Page.php';</script>";
} else {
    $sql = "INSERT INTO employees(emp_id, emp_name, emp_email, emp_position, emp_salary)
            VALUES('$emp_id', '$name', '$email', '$position', '$salary')";

    mysqli_query($conn, $sql);
    header("Location: Registration_Page.php");
}
?>