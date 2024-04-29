<?php

include_once '../connect_db.php';
include_once '../functions.php';
if (!isset($_SESSION['user_id'])) {
    header("Location:index.php");
}


$row = mysqli_fetch_assoc(getPayslip($con, $_GET['ps_id']));
echo json_encode($row);
