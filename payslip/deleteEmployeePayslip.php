<?php

include_once '../connect_db.php';
include_once '../functions.php';
if (!isset($_SESSION['user_id'])) {
    header("Location:index.php");
}

if(deleteEmployeePayslip($con, $_GET['emp_id'], $_GET['month'])){
    //message
}else{
    // message
}
header("Location:pay.php");


