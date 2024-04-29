<?php

include_once '../connect_db.php';
include_once '../functions.php';
if (!isset($_SESSION['user_id'])) {
    header("Location:index.php");
}

if(deleteUser($con, $_GET['user_id'])){
    //message
}else{
    // message
}
header("Location:userHome.php");


