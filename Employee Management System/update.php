<?php
include 'db.php';

$emp_id = mysqli_real_escape_string($conn, $_POST['emp_id']);
$name = mysqli_real_escape_string($conn, $_POST['name']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$position = mysqli_real_escape_string($conn, $_POST['position']);
$salary = mysqli_real_escape_string($conn, $_POST['salary']);

$sql = "UPDATE employees 
        SET emp_name='$name', emp_email='$email', emp_position='$position', emp_salary='$salary' 
        WHERE emp_id='$emp_id'";

mysqli_query($conn, $sql);

header("Location: Registration_Page.php");
?>