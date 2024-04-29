<?php

include_once '../connect_db.php';
include_once '../functions.php';
if (!isset($_SESSION['user_id'])) {
    header("Location:index.php");
}

if(deleteAllowance($con, $_GET['allow_id'])){
    //message
}else{
    // message
}
header("Location:allow_home.php");


