<?php

include_once '../connect_db.php';
include_once '../functions.php';
if (!isset($_SESSION['user_id'])) {
    header("Location:index.php");
}

//
//echo "<pre/>";
//print_r(getDepartment($con, $_GET['dept_id']));

$row = mysqli_fetch_assoc(getEmployee($con, $_GET['emp_id']));
echo json_encode($row);
