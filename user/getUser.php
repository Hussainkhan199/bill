<?php

include_once '../connect_db.php';
include_once '../functions.php';
if (!isset($_SESSION['user_id'])) {
    header("Location:index.php");
}


$row = mysqli_fetch_assoc(getUser($con, $_GET['user_id']));
echo json_encode($row);
