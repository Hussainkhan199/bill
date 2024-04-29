<?php

include_once '../connect_db.php';
include_once '../functions.php';
if (!isset($_SESSION['user_id'])) {
    header("Location:index.php");
}

if(deleteDepartment($con, $_GET['dept_id'])){
    //message
}else{
    // message
}
header("Location:dept_home.php");


