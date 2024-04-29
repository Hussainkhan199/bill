<?php

include_once '../connect_db.php';
include_once '../functions.php';
if (!isset($_SESSION['user_id'])) {
    header("Location:index.php");
}

if(deletePayslip($con, $_GET['ps_month'])){
    //message
}else{
    // message
}
header("Location:payslipHome.php");


