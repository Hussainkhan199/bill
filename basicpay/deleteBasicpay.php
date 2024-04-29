<?php

include_once '../connect_db.php';
include_once '../functions.php';
if (!isset($_SESSION['user_id'])) {
    header("Location:index.php");
}

if(deleteBasicpay($con, $_GET['bp_id'])){
    //message
}else{
    // message
}
header("Location:bp_home.php");


