<?php
include "db.php";

$id = mysqli_real_escape_string($conn, $_GET['id']);

mysqli_query($conn,"DELETE FROM employees WHERE emp_id='$id'");

header("Location: Registration_Page.php");
?>