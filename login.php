<?php
include_once './connect_db.php';
include_once './functions.php';
if(isset($_POST['login_submit'])){
//    echo "<pre />";
//    print_r($_POST);
    $email = mysqli_escape_string($con, $_POST['user_email']);
    $password = mysqli_escape_string($con, $_POST['user_password']);
    
    if(empty($email) || empty($password)){
        $_SESSION['error'] = "Empty Email or Password";
        header("Location:index.php");
    }else{
        $user_id = checkUserLogin($con, $email,$password);      
        if($user_id == ""){
            $_SESSION['error'] = "Incorrect Email or Password";
            header("Location:index.php");
        }else{
            $_SESSION['user_id'] = $user_id;
            header("Location:home.php");
        }
    }
    
}

