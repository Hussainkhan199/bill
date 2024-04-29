
<?php
include_once '../connect_db.php';
include_once '../functions.php';
if (!isset($_SESSION['user_id'])) {
    header("Location:index.php");
}

$message = "";

$emp_id = $_GET['emp_id'];
$month = $_GET['month'];

$result = mysqli_query($con, "SELECT * FROM `pay_slip` WHERE `emp_id` = '$emp_id' AND `month` = '$month' ");
$result2 = mysqli_query($con, "SELECT * FROM `pay_slip` WHERE `emp_id` = '$emp_id' AND `month` = '$month' ");

$message .= "<!DOCTYPE html>
<html>
    <head>
        <style>
            .borderLess{
                border: none;
            }
            .borderLess tr,td,th{
                border: none;
            }

            h1, h3, h4 {text-align: center;}

            tr:hover {background-color: #D6EEEE;}
        </style>
    </head>
    <body style='font-family: emoji;'>

        <div class='contianer'>
            <div class='row'>
                <div class='col-md-8 col-md-offset-2' style='border:1px solid #000;'>
                    <div class='row'>
                        <div class='col-xs-2 col-sm-2 col-lg-2'><img style='height: 90px; margin-top: 3px;' src='assets/images/small_logo.png' alt='logo'></div>
                        <div class='col-xs-9 col-sm-9 col-lg-9 '>
                            <h3><b>UNIVERSITY OF ENGINEERING AND TECHNOLOGY MARDAN</b></h3>
                        </div>
                    </div>
                    <h4 style='margin-top: 0px;'>(Phone No: 0937-9230295, Fox No: 0937-9230296)</h4>
                    <h4 style='font-weight: bold;'>";
$message .=  date('F-Y', strtotime($month)); 
$message .= "</h4><strong><div class='row'>";
$row = mysqli_fetch_array($result);
$message .="<div class='col-md-5 col-md-offset-1'>";
$message .="Name: ".getEmployeeDetail($emp_id, 'emp_name')."<br />";
$message .="Designation: ".getEmployeeDetail($emp_id, 'emp_designation');
$message .="</div><div class='col-md-5'>";
$message .="BPS:".getEmployeeDetail($emp_id, 'emp_scale')."<br />";
$message .="Department:".getDepartmentDetail(getEmployeeDetail($emp_id, 'emp_dept'), 'dept_title')."</td>";
$message .="</div></div></strong><br /><br /><h5 style='text-align: center; font-style: italic;'> This is computer generated slip.</h5>
                </div>
            </div>
        </div></body>
</html>";

echo $message;