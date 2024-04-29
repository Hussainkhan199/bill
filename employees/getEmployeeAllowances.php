<?php

include_once '../connect_db.php';
include_once '../functions.php';
if (!isset($_SESSION['user_id'])) {
    header("Location:index.php");
}

$result = getEmployeeAllowances($con, $_GET['emp_id']);
$data = array();
$c =0;
while($row = mysqli_fetch_assoc($result)){
   $data[$c++] = $row['allow_id'];
}


echo json_encode($data);
