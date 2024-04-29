<?php

include_once '../connect_db.php';
include_once '../functions.php';
if (!isset($_SESSION['user_id'])) {
    header("Location:index.php");
}

if(deleteDeduction($con, $_GET['deduct_id'])){
    //message
}else{
    // message
}
header("Location:deduct_home.php");


