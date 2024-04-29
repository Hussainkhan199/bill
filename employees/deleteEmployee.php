<?php

include_once '../connect_db.php';
include_once '../functions.php';
if (!isset($_SESSION['user_id'])) {
    header("Location:index.php");
}

if(deleteEmployee($con, $_GET['emp_id'])){
    //message
}else{
    // message
}
header("Location:emp_home.php");


