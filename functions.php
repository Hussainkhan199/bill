<?php

//++++++++++++++++++++++++++++++++++ USer Login ++++++++++++++++++++++++++++++++++++++++++++=
function checkUserLogin($con, $email, $password) {
    $uPass = md5($password);
    
    $result = mysqli_query($con, "SELECT * FROM `user` WHERE `user_email` = '$email' AND `user_password` = '$uPass'");
    $row = mysqli_fetch_assoc($result);
    return $row['user_id'];
}

//+++++++++++++++++++++++++++++++++++ Department Section+++++++++++++++++++++++++++++++++++++
function addDepartment($con, $dept_title) {
    if (!empty($dept_title)) {
        $dept_title = mysqli_escape_string($con, $dept_title);
        if (mysqli_query($con, "INSERT INTO `department` (`dept_id`, `dept_title`) VALUES (NULL, '$dept_title')")) {
            $_SESSION['operation'] = $_SESSION['message'] = '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Department added successfully</h4>
              </div>';
//            header("Location:dept_home.php");
//            exit();
        } else {
            $_SESSION['operation'] = "failed";
        }
    } else {
        $_SESSION['message'] = '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-waring"></i> Please enter a valid department title</h4>
              </div>';
    }
    header("Location:dept_home.php");
    exit();
}

function getDepartment($con, $dept_id) {
    return mysqli_query($con, "SELECT * FROM `department` WHERE `dept_id` = '$dept_id' ");
}

function getDepartmentName($con, $dept_id) {
    $result = mysqli_query($con, "SELECT * FROM `department` WHERE `dept_id` = '$dept_id' ");
    return mysqli_fetch_assoc($result)['dept_title'];
}

function getDepartments($con) {
    return mysqli_query($con, "SELECT * FROM `department`");
}

function updateDepartment($con, $dept_id, $dept_title) {
    if (!empty($dept_id) && !empty($dept_title)) {
        $dept_id = mysqli_escape_string($con, $dept_id);
        $dept_title = mysqli_escape_string($con, $dept_title);
        if (mysqli_query($con, " UPDATE `department` SET `dept_title`= '$dept_title' WHERE `dept_id` = '$dept_id' ")) {
            $_SESSION['operation'] = $_SESSION['message'] = '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Department updated successfully</h4>
              </div>';
//            header("Location:dept_home.php");
        } else {
            $_SESSION['operation'] = "failed";
        }
    } else {
        $_SESSION['message'] = '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-waring"></i> Please enter a valid department title</h4>
              </div>';
    }
    header("Location:dept_home.php");
    exit();
}

function deleteDepartment($con, $dept_id) {
    if (mysqli_query($con, "DELETE FROM `department` WHERE `dept_id` = '$dept_id' ")) {
        $_SESSION['operation'] = $_SESSION['message'] = '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Department Deleted successfully</h4>
              </div>';
        return TRUE;
    } else {
        return FALSE;
    }
    header("Location:dept_home.php");
    exit();
}

//++++++++++++++++++++++++++++++++++++= Employee Section++++++++++++++++++++++++++++++++++++++++++

function addEmployee($con, $emp_name, $emp_designation, $emp_dept, $emp_scale, $emp_category, $emp_status, $emp_allow, $emp_join_date, $emp_basicpay_at_joining, $emp_email) {
    if (!empty($_POST['emp_name']) && !empty($_POST['emp_designation'])) {
        $emp_name = mysqli_escape_string($con, $_POST['emp_name']);
        $emp_designation = mysqli_escape_string($con, $_POST['emp_designation']);
        $emp_dept = mysqli_escape_string($con, $_POST['emp_dept']);
        $emp_scale = mysqli_escape_string($con, $_POST['emp_scale']);
        $emp_category = mysqli_escape_string($con, $_POST['emp_category']);
        $emp_status = mysqli_escape_string($con, $_POST['emp_status']);
        $emp_allow = mysqli_escape_string($con, $_POST['emp_allow']);
        $emp_join_date = mysqli_escape_string($con, $_POST['emp_join_date']);
        $emp_basicpay_at_joining = mysqli_escape_string($con, $_POST['emp_basicpay_at_joining']);
        $emp_email = mysqli_escape_string($con, $_POST['emp_email']);

        if (mysqli_query($con, "INSERT INTO `employee`(`emp_id`, `emp_name`, `emp_designation`, `emp_dept`, `emp_scale`, `emp_category`, `emp_status`, `emp_allow16`, `emp_joining_date`, `emp_basic_at_joining`, `emp_email` ) VALUES(Null, '$emp_name', '$emp_designation', '$emp_dept', '$emp_scale', '$emp_category', '$emp_status', '$emp_allow', '$emp_join_date', '$emp_basicpay_at_joining', '$emp_email')")) {
            $_SESSION['message'] = '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Employee added successfully</h4>
              </div>';
//            header("Location:emp_home.php");
//            exit();
        } else {
            $_SESSION['message'] = '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-ban"></i> Employee adding failed</h4>
              </div>';
        }
    } else {
        $_SESSION['message'] = '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-waring"></i> Please enter a valid Employee title</h4>
              </div>';
    }
    header("Location:emp_home.php");
    exit();
}

function getEmployee($con, $emp_id) {
    return mysqli_query($con, "SELECT * FROM `employee` WHERE `emp_id` = '$emp_id' ");
}

// for employee allowances
function getEmployeeAllowances($con, $emp_id) {
    return mysqli_query($con, "SELECT * FROM `employee_allowances` WHERE `emp_id` = '$emp_id' ");
}

// for employee deduction
function getEmployeeDeductions($con, $emp_id) {
    return mysqli_query($con, "SELECT * FROM `employee_deduction` WHERE `emp_id` = '$emp_id' ");
}

function getEmployees($con) {
    return mysqli_query($con, "SELECT * FROM `employee` ");
}

function getHouseRent($con) {
    return mysqli_query($con, "SELECT * FROM `allowance` WHERE `allow_title`='House Rent'");
}

function getHouseSubsidy($con) {
    return mysqli_query($con, "SELECT * FROM `allowance` WHERE `allow_title`='House Subsidy'");
}

function getConveyAllowance($con) {
    return mysqli_query($con, "SELECT * FROM `allowance` WHERE `allow_title`='Convey Allowance'");
}

function getChargeAllowance($con) {
    return mysqli_query($con, "SELECT * FROM `allowance` WHERE `allow_title`='Charge Allowance'");
}

function getQualificationAllowance($con) {
    return mysqli_query($con, "SELECT * FROM `allowance` WHERE `allow_title`='Qualification Allowance'");
}

function getSeniorPostAllowance($con) {
    return mysqli_query($con, "SELECT * FROM `allowance` WHERE `allow_title`='Senior Post Allowance'");
}

function getMedicalAllowance($con) {
    return mysqli_query($con, "SELECT * FROM `allowance` WHERE `allow_title`='Medical Allowance'");
}

function getEntertainmentAllowance($con) {
    return mysqli_query($con, "SELECT * FROM `allowance` WHERE `allow_title`='Entertainment Allowance'");
}

function getSpecialAllowance($con) {
    return mysqli_query($con, "SELECT * FROM `allowance` WHERE `allow_title`='Special Allowance'");
}

function getSpecialAllowance2021($con) {
    return mysqli_query($con, "SELECT * FROM `allowance` WHERE `allow_title`='Special Allowance-2021'");
}

function getOrderlyAllowance($con) {
    return mysqli_query($con, "SELECT * FROM `allowance` WHERE `allow_title`='Orderly Allowance'");
}

function getOrderlyAllowanceArrearwef($con) {
    return mysqli_query($con, "SELECT * FROM `allowance` WHERE `allow_title`='Orderly Allowance Arrear w.e.f'");
}

function getTeachingAllowance($con) {
    return mysqli_query($con, "SELECT * FROM `allowance` WHERE `allow_title`='Teaching Allowance'");
}

function getTeachingAllowance21($con) {
    return mysqli_query($con, "SELECT * FROM `allowance` WHERE `allow_title`='Teaching Allowance-2021'");
}

function getComputerAllowance($con) {
    return mysqli_query($con, "SELECT * FROM `allowance` WHERE `allow_title`='Computer Allowance'");
}

function getBrainDrainAllowance($con) {
    return mysqli_query($con, "SELECT * FROM `allowance` WHERE `allow_title`='Brain Drain'");
}

function getARA2016Allowance($con) {
    return mysqli_query($con, "SELECT * FROM `allowance` WHERE `allow_title`='ARA-2016'");
}

function getARA2017Allowance($con) {
    return mysqli_query($con, "SELECT * FROM `allowance` WHERE `allow_title`='ARA-2017'");
}

function getARA2018Allowance($con) {
    return mysqli_query($con, "SELECT * FROM `allowance` WHERE `allow_title`='ARA-2018'");
}

function getARA2019Allowance($con) {
    return mysqli_query($con, "SELECT * FROM `allowance` WHERE `allow_title`='ARA-2019'");
}

function getARA2021Allowance($con) {
    return mysqli_query($con, "SELECT * FROM `allowance` WHERE `allow_title`='ARA-2021'");
}

function getWashingAllowance($con) {
    return mysqli_query($con, "SELECT * FROM `allowance` WHERE `allow_title`='washing Allowance'");
}

function getDressingAllowance($con) {
    return mysqli_query($con, "SELECT * FROM `allowance` WHERE `allow_title`='Dressing Allowance'");
}

function getIntegratedAllowance($con) {
    return mysqli_query($con, "SELECT * FROM `allowance` WHERE `allow_title`='Integrated Allowance'");
}

function getExtraDutyAllowance($con) {
    return mysqli_query($con, "SELECT * FROM `allowance` WHERE `allow_title`='Extra Duty Allowance'");
}

function getMisAllowance($con) {
    return mysqli_query($con, "SELECT * FROM `allowance` WHERE `allow_title`='Misc Allowance'");
}

function getfixedpay($con) {
    return mysqli_query($con, "SELECT * FROM `allowance` WHERE `allow_title`='Fixed Pay'");
}

function updateEmployee($con, $emp_id, $emp_name, $emp_designation, $emp_dept, $emp_scale, $emp_category, $emp_status, $emp_allow, $emp_join_date, $emp_basicpay_at_joining, $emp_email) {
    if (!empty($emp_id) && !empty($emp_name)) {
        $emp_id = mysqli_escape_string($con, $emp_id);
        $emp_name = mysqli_escape_string($con, $emp_name);
        $emp_designation = mysqli_escape_string($con, $emp_designation);
        $emp_dept = mysqli_escape_string($con, $emp_dept);
        $emp_scale = mysqli_escape_string($con, $emp_scale);
        $emp_category = mysqli_escape_string($con, $emp_category);
        $emp_status = mysqli_escape_string($con, $emp_status);
        $emp_allow = mysqli_escape_string($con, $emp_allow);
        $emp_join_date = mysqli_escape_string($con, $emp_join_date);
        $emp_basicpay_at_joining = mysqli_escape_string($con, $emp_basicpay_at_joining);
        $emp_email = mysqli_escape_string($con, $emp_email);
        
        if (mysqli_query($con, " UPDATE `employee` SET `emp_name`= '$emp_name', `emp_designation`= '$emp_designation', `emp_dept`= '$emp_dept', `emp_scale`= '$emp_scale', `emp_category`= '$emp_category', `emp_status`= '$emp_status', `emp_allow16`= '$emp_allow', `emp_joining_date`= '$emp_join_date', `emp_basic_at_joining`= '$emp_basicpay_at_joining', `emp_email`= '$emp_email'  WHERE `emp_id` = '$emp_id' ")) {
            $_SESSION['message'] = '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Employee Record Updated  successfully</h4>
              </div>';
//header("Location:emp_home.php");
        } else {
            $_SESSION['message'] = '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                <h4><i class="icon fa fa-waring"></i> Employee Record Updation Failed</h4>
              </div>';
        }
    } else {
        $_SESSION['message'] = '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                <h4><i class="icon fa fa-waring"></i> Please enter a valid Record</h4>
              </div>';
    }
    header("Location:emp_home.php");
    exit();
}

function deleteEmployee($con, $emp_id) {
    if (mysqli_query($con, "DELETE FROM `employee` WHERE `emp_id` = '$emp_id' ")) {
        $_SESSION['message'] = '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                <h4><i class="icon fa fa-waring"></i> Employee Record Deleted Successfuly</h4>
              </div>';
        header("Location:emp_home.php");
        exit();
        return TRUE;
    } else {
        return FALSE;
    }
}

//employee deduction...................

function getHouseRentdeduct($con) {
    return mysqli_query($con, "SELECT * FROM `deduction` WHERE `deduct_title`='House Rent'");
}

function getRoomRentdeduct($con) {
    return mysqli_query($con, "SELECT * FROM `deduction` WHERE `deduct_title`='Room Rent'");
}

function getWaterTaxdeduct($con) {
    return mysqli_query($con, "SELECT * FROM `deduction` WHERE `deduct_title`='Water Tax'");
}

function getBenevolentFundduct($con) {
    return mysqli_query($con, "SELECT * FROM `deduction` WHERE `deduct_title`='Benevolent Fund'");
}

function getGPFdeduct($con) {
    return mysqli_query($con, "SELECT * FROM `deduction` WHERE `deduct_title`='GPF'");
}

function getUpKeepdeduct($con) {
    return mysqli_query($con, "SELECT * FROM `deduction` WHERE `deduct_title`='Up Keep'");
}

function getGroupInsurancededuct($con) {
    return mysqli_query($con, "SELECT * FROM `deduction` WHERE `deduct_title`='Group Insurance'");
}

function getTransportationdeduct($con) {
    return mysqli_query($con, "SELECT * FROM `deduction` WHERE `deduct_title`='Transportation Charg'");
}

function gethousebuildingdeduct($con) {
    return mysqli_query($con, "SELECT * FROM `deduction` WHERE `deduct_title`='House Building'");
}

function getGPFAdvaceddeduct($con) {
    return mysqli_query($con, "SELECT * FROM `deduction` WHERE `deduct_title`='GPF Advanced'");
}

function getIncomeTax($con) {
    return mysqli_query($con, "SELECT * FROM `deduction` WHERE `deduct_title`='Income Tax'");
}

function getotherdeduction($con) {
    return mysqli_query($con, "SELECT * FROM `deduction` WHERE `deduct_title`='Misc'");
}

function deleteExistingAllowncesFromEmployee($con, $emp_id) {
    return mysqli_query($con, "DELETE FROM `employee_allowances` WHERE `emp_id` = '$emp_id'");
}

function submitEmployeeAllowances($con, $emp_id, $allow_array) {
//    echo "<pre />";
//    print_r($allow_array);

    $size = count($allow_array);
    $c = 0;
    if (deleteExistingAllowncesFromEmployee($con, $emp_id)) {
        while ($c < $size) {
            if ($allow_array[$c] != "") {
                $query = mysqli_query($con, "INSERT INTO `employee_allowances` (`emp_allow_id`, `emp_id`, `allow_id`) VALUES ('', '$emp_id', '$allow_array[$c]')");
                $c++;
            } else {
                $c++;
            }
        }
        if ($c == $size) {
            if ($query) {
                $_SESSION['message'] = '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Employee Allownces added successfully</h4>
              </div>';
            } else {
                $_SESSION['message'] = '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Employee Allowinces adding failed</h4>
              </div>';
            }
        }
    } else {
        $_SESSION['message'] = '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Employee Allowinces adding failed</h4>
              </div>';
    }

    header("Location:emp_home.php");
    exit();
}

//+++++++++++++++++++++++++ employee deduction function section++++++++
function deleteExistingDeductionsFromEmployee($con, $emp_id) {
    return mysqli_query($con, "DELETE FROM `employee_deduction` WHERE `emp_id` = '$emp_id'");
}
function submitEmployeeDeductions($con, $emp_id, $deduct_array) {
//    echo "<pre />";
//    print_r($deduct_array);

    $dduct = count($deduct_array);
    $d = 0;
if (deleteExistingDeductionsFromEmployee($con, $emp_id)){
    while ($d < $dduct) {
        if ($deduct_array [$d] != "") {
// $query = mysqli_query($con, "INSERT INTO `employee_deduction` (`emp_deduct_id`, `emp_id`, `deduct_id`)              //VALUES ('', '$emp_id', '$deduct_array[$d]')");

            $query = mysqli_query($con, "INSERT INTO `employee_deduction` (`emp_deduct_id`, `emp_id`, `deduct_id`) VALUES ('', '$emp_id', '$deduct_array[$d]')");
            $d++;
        } else {
            $d++;
        }
    }

    if ($d == $dduct) {
        if ($query) {
            $_SESSION['message'] = '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Employee Deductions added successfully</h4>
              </div>';
        } else {
            $_SESSION['message'] = '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Employee Deductions adding failed</h4>
              </div>';
        }
    }}else {
        $_SESSION['message'] = '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Employee Deductions adding failed</h4>
              </div>';
    }

    header("Location:emp_home.php");
    exit();
}

//function updateEmployeeAllowances($con, $emp_id, $allow_array, $emp_allow_id) {
////    echo "<pre />";
////    print_r($allow_array);
//
//    $sz = count($allow_array);
//    $e = 0;
//
//    while ($e < $sz) {
//        if ($allow_array[$c] != "") {
//            $query = mysqli_query($con, "UPDATE `employee_allowances` SET `emp_allow_id`='$emp_allow_id',`emp_id`='$emp_id',`allow_id`='$allow_array[$e]' WHERE emp_id = $emp_id')");
//            $c++;
//        } else {
//            $e++;
//        }
//    }
//
//    if ($c == $size) {
//        if ($query) {
//            $_SESSION['message'] = '<div class="alert alert-success alert-dismissible">
//                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
//                <h4><i class="icon fa fa-check"></i> Employee Allownces added successfully</h4>
//              </div>';
//        } else {
//            $_SESSION['message'] = '<div class="alert alert-danger alert-dismissible">
//                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
//                <h4><i class="icon fa fa-check"></i> Employee Allowinces adding failed</h4>
//              </div>';
//        }
//    }
//    header("Location:emp_home.php");
//    exit();
//}
//   $c=0; $a=0;
//   
//   while($c<=count($size)){
//       if($allow_array[$c]!=""){
//           $allow_array[$a]=$allow_array[$c];
//               $a++;
//       }
//       $this->db->insert_batch('employee_allowances',$size);
//   }
//       $c++;
//}
//++++++++++++++++++++++++++++++++++++= Allowinces Section++++++++++++++++++++++++++++++++++++++++++

function addAllowance($con, $allow_title, $allow_type, $allow_scale, $allow_value, $allow_max_limit) {
    if (!empty($_POST['allow_title']) && !empty($_POST['allow_type'])) {
        $allow_title = mysqli_escape_string($con, $allow_title);
        $allow_type = mysqli_escape_string($con, $allow_type);
        $allow_scale = mysqli_escape_string($con, $allow_scale);
        $allow_value = mysqli_escape_string($con, $allow_value);
        $allow_max_limit = mysqli_escape_string($con, $allow_max_limit);

        if (mysqli_query($con, "INSERT INTO `allowance`(`allow_id`, `allow_title`, `allow_type`, `allow_scale`, `allow_value`, `allow_max_limit`) VALUES(NULL,'$allow_title','$allow_type','$allow_scale','$allow_value','$allow_max_limit')")) {

            $_SESSION['message'] = '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Allowances added successfully</h4>
              </div>';
//header("Location:allow_home.php");
        } else {
            $_SESSION['message'] = '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-ban"></i> Allowances adding failed</h4>
              </div>';
        }
    } else {
        $_SESSION['message'] = '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-waring"></i> Please enter a valid Allowance title</h4>
              </div>';
    }
    header("Location:allow_home.php");

    exit();
}

function getAllowances($con) {
    return mysqli_query($con, "SELECT * FROM `allowance`");
}

function getAllowance($con, $allow_id) {
    return mysqli_query($con, "SELECT * FROM `allowance` WHERE `allow_id` = '$allow_id' ");
}

function updateAllowance($con, $allow_id, $allow_title, $allow_type, $allow_scale, $allow_value, $allow_max_limit) {
    if (!empty($allow_id) && !empty($allow_title)) {
        $allow_id = mysqli_escape_string($con, $allow_id);
        $allow_title = mysqli_escape_string($con, $allow_title);
        $allow_type = mysqli_escape_string($con, $allow_type);
        $allow_scale = mysqli_escape_string($con, $allow_scale);
        $allow_value = mysqli_escape_string($con, $allow_value);
        $allow_max_limit = mysqli_escape_string($con, $allow_max_limit);


        if (mysqli_query($con, " UPDATE `allowance` SET `allow_title`= '$allow_title', `allow_type`= '$allow_type', `allow_scale`= '$allow_scale', `allow_value`= '$allow_value',  `allow_max_limit`= '$allow_max_limit' WHERE `allow_id` = '$allow_id' ")) {
            $_SESSION['message'] = '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Allowances Updated successfully</h4>
              </div>';
//header("Location:allow_home.php");
        } else {
            $_SESSION['message'] = '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Allowances Updated Failed</h4>
              </div>';
        }
    } else {
        $_SESSION['message'] = '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-waring"></i> Please enter a valid Allowances title</h4>
              </div>';
    }
    header("Location:allow_home.php");

    exit();
}

function deleteAllowance($con, $allow_id) {
    if (mysqli_query($con, "DELETE FROM `allowance` WHERE `allow_id` = '$allow_id' ")) {
        $_SESSION['message'] = '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Allowances Deleted successfully</h4>
              </div>';
        return TRUE;
    } else {
        return FALSE;
    }
    header("Location:allow_home.php");
    exit();
}

//+++++++++++++++++++++++++++++++++++++++++++++BASIC PAY SECTION +++++++++++++++++++++++++++++++++++++

function addBasicpay($con, $bp_year, $bp_incr, $bp_scale, $bp_value) {
    if (!empty($_POST['bp_year']) && !empty($_POST['bp_incr'])) {
        $bp_year = mysqli_escape_string($con, $bp_year);
        $bp_incr = mysqli_escape_string($con, $bp_incr);
        $bp_scale = mysqli_escape_string($con, $bp_scale);
        $bp_value = mysqli_escape_string($con, $bp_value);

        if (mysqli_query($con, "INSERT INTO `basicpay`(`bp_id`, `bp_year`, `bp_incr`, `bp_scale`, `bp_value`) VALUES(NULL,'$bp_year','$bp_incr','$bp_scale','$bp_value')")) {

            $_SESSION['message'] = '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Basic Pay added successfully</h4>
              </div>';
            header("Location:bp_home.php");
        } else {
            $_SESSION['message'] = '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-ban"></i> Basic Pay adding failed</h4>
              </div>';
        }
    } else {
        $_SESSION['message'] = '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-waring"></i> Please enter a valid Basic Pay title</h4>
              </div>';
    }
    header("Location:bp_home.php");

    exit();
}

function getBasicpays($con) {
    return mysqli_query($con, "SELECT * FROM `basicpay`");
}

function getBasicpay($con, $bp_id) {
    return mysqli_query($con, "SELECT * FROM `basicpay` WHERE `bp_id` = '$bp_id' ");
}

function updateBasicpay($con, $bp_id, $bp_year, $bp_incr, $bp_scale, $bp_value) {
    if (!empty($bp_id) && !empty($bp_year)) {
        $bp_id = mysqli_escape_string($con, $bp_id);
        $bp_year = mysqli_escape_string($con, $bp_year);
        $bp_incr = mysqli_escape_string($con, $bp_incr);
        $bp_scale = mysqli_escape_string($con, $bp_scale);
        $bp_value = mysqli_escape_string($con, $bp_value);

        if (mysqli_query($con, " UPDATE `basicpay` SET `bp_year`= '$bp_year', `bp_incr`= '$bp_incr', `bp_scale`= '$bp_scale', `bp_value`= '$bp_value' WHERE `bp_id` = '$bp_id' ")) {
            $_SESSION['message'] = '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-waring"></i> Basic Pay Updated successfully</h4>
              </div>';
//header("Location:bp_home.php");
        } else {
            $_SESSION['message'] = '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-waring"></i> Basic Pay Updation Failed</h4>
              </div>';
        }
    } else {
        $_SESSION['message'] = '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-waring"></i> Please enter a valid department title</h4>
              </div>';
    }
    header("Location:bp_home.php");

    exit();
}

function deleteBasicpay($con, $bp_id) {
    if (mysqli_query($con, "DELETE FROM `basicpay` WHERE `bp_id` = '$bp_id' ")) {
        $_SESSION['message'] = '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-waring"></i> Basic Pay Deleted successfully</h4>
              </div>';
        return TRUE;
    } else {
        return FALSE;
    }
    header("Location:bp_home.php");
    exit();
}

//+++++++++++++++++++++++++++++++++++ User Section+++++++++++++++++++++++++++++++++++++

function addUser($con, $user_name, $user_email, $user_password, $user_role) {
    if (!empty($_POST['user_email']) && !empty($_POST['user_password'])) {
        $user_name = mysqli_escape_string($con, $user_name);
        $user_email = mysqli_escape_string($con, $_POST['user_email']);
        $user_password = mysqli_escape_string($con, $user_password);
        $user_role = mysqli_escape_string($con, $_POST['user_role']);

        if (mysqli_query($con, "INSERT INTO `user`(`user_id`, `user_name`, `user_email`, `user_password`, `user_role`) VALUES(Null, '$user_name', '$user_email', '$user_password', '$user_role')")) {
            $_SESSION['message'] = '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> User added successfully</h4>
              </div>';
//header("Location:userHome.php");
        } else {
            $_SESSION['message'] = '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-ban"></i> User adding failed</h4>
              </div>';
        }
    } else {
        $_SESSION['message'] = '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-waring"></i> Please enter a valid user title</h4>
              </div>';
    }
    header("Location:userHome.php");

    exit();
}

function getUser($con, $user_id) {
    return mysqli_query($con, "SELECT * FROM `user` WHERE `user_id` = '$user_id' ");
}

function getUsers($con) {
    return mysqli_query($con, "SELECT * FROM `user`");
}

function updateUser($con, $user_id, $user_name, $user_email, $user_password, $user_role) {
    if (!empty($user_id) && !empty($user_name)) {
        $user_id = mysqli_escape_string($con, $user_id);
        $user_name = mysqli_escape_string($con, $user_name);
        $user_email = mysqli_escape_string($con, $user_email);
        $user_password = mysqli_escape_string($con, $user_password);
        $user_role = mysqli_escape_string($con, $user_role);

        if (mysqli_query($con, " UPDATE `user` SET `user_name`= '$user_name', `user_email`= '$user_email', `user_password`= '$user_password', `user_role`= '$user_role' WHERE `user_id` = '$user_id' ")) {
            $_SESSION['message'] = '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> User Updated successfully</h4>
              </div>';
//header("Location:userHome.php");
        } else {
            $_SESSION['message'] = '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> User adding Failed</h4>
              </div>';
        }
    } else {
        $_SESSION['message'] = '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-waring"></i> Please enter a valid User title</h4>
              </div>';
    }
    header("Location:userHome.php");

    exit();
}

function deleteUser($con, $user_id) {
    if (mysqli_query($con, "DELETE FROM `user` WHERE `user_id` = '$user_id' ")) {
        $_SESSION['message'] = '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> User Deleted successfully</h4>
              </div>';
        return TRUE;
    } else {
        $_SESSION['message'] = '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> User Deletion Failed</h4>
              </div>';
        return FALSE;
    }
    header("Location:userHome.php");
    exit();
}

//++++++++++++++++++++++++++++++++++++= Deduction Section++++++++++++++++++++++++++++++++++++++++++

function addDeduction($con, $deduct_title, $deduct_type, $deduct_scale, $deduct_value, $deduct_max_limit) {
    if (!empty($_POST['deduct_title']) && !empty($_POST['deduct_type'])) {
        $deduct_title = mysqli_escape_string($con, $deduct_title);
        $deduct_type = mysqli_escape_string($con, $deduct_type);
        $deduct_scale = mysqli_escape_string($con, $deduct_scale);
        $deduct_value = mysqli_escape_string($con, $deduct_value);
        $deduct_max_limit = mysqli_escape_string($con, $deduct_max_limit);

        if (mysqli_query($con, "INSERT INTO `deduction`(`deduct_id`, `deduct_title`, `deduct_type`, `deduct_scale`, `deduct_value`, `deduct_max_limit`) VALUES(NULL,'$deduct_title','$deduct_type','$deduct_scale','$deduct_value','$deduct_max_limit')")) {

            $_SESSION['message'] = '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Deduction added successfully</h4>
              </div>';
//header("Location:deduct_home.php");
        } else {
            $_SESSION['message'] = '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-ban"></i> Deduction adding failed</h4>
              </div>';
        }
    } else {
        $_SESSION['message'] = '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-waring"></i> Please enter a valid Deduction title</h4>
              </div>';
    }
    header("Location:deduct_home.php");

    exit();
}

function getDeductions($con) {
    return mysqli_query($con, "SELECT * FROM `deduction`");
}

function getDeduction($con, $deduct_id) {
    return mysqli_query($con, "SELECT * FROM `deduction` WHERE `deduct_id` = '$deduct_id

' ");
}

function updateDeduction($con, $deduct_id, $deduct_title, $deduct_type, $deduct_scale, $deduct_value, $deduct_max_limit) {
    if (!empty($deduct_id) && !empty($deduct_title)) {
        $deduct_id = mysqli_escape_string($con, $deduct_id);
        $deduct_title = mysqli_escape_string($con, $deduct_title);
        $deduct_type = mysqli_escape_string($con, $deduct_type);
        $deduct_scale = mysqli_escape_string($con, $deduct_scale);
        $deduct_value = mysqli_escape_string($con, $deduct_value);
        $deduct_max_limit = mysqli_escape_string($con, $deduct_max_limit);


        if (mysqli_query($con, " UPDATE `deduction` SET `deduct_title`= '$deduct_title', `deduct_type`= '$deduct_type', `deduct_scale`= '$deduct_scale', `deduct_value`= '$deduct_value', `deduct_max_limit`= '$deduct_max_limit' WHERE `deduct_id` = '$deduct_id' ")) {
            $_SESSION['message'] = '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Deduction Updated successfully</h4>
              </div>';
//header("Location:deduct_home.php");
        } else {
            $_SESSION['message'] = '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Deduction Updated Failed</h4>
              </div>';
        }
    } else {
        $_SESSION['message'] = '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-waring"></i> Please enter a valid Deduction title</h4>
              </div>';
    }
    header("Location:deduct_home.php");

    exit();
}

function deleteDeduction($con, $deduct_id) {
    if (mysqli_query($con, "DELETE FROM `deduction` WHERE `deduct_id` = '$deduct_id' ")) {
        $_SESSION['message'] = '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Deduction Deleted successfully</h4>
              </div>';
        return TRUE;
    } else {
        $_SESSION['message'] = '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Deduction Updation Failed</h4>
              </div>';
        return FALSE;
    }
    header("Location:deduct_home.php");
    exit();
}

//+++++++++++++++++++++++++++++++++++++++++++++PaySlip section++++++++++++++++++++++++

function addAllowncesToPaySlip($con, $ps_month, $emp_id, $current_basic_pay, $emp_basic_at_joining) {
    $sql3 = "SELECT * FROM `employee_allowances` JOIN `allowance` WHERE employee_allowances.allow_id = allowance.allow_id AND `employee_allowances`.`emp_id` = $emp_id ";
    $result3 = mysqli_query($con, $sql3);

    while ($row3 = mysqli_fetch_assoc($result3)) {
        $allow_id = $row3 ['allow_id'];
        $allow_value = $row3['allow_value'];
        if ($row3['allow_type'] == "Current") {
            $allow_value = $row3['allow_value'] * $current_basic_pay / 100;
             if ($allow_value > $row3['allow_max_limit'] && $row3['allow_max_limit'] !=0) {
                $allow_value = $row3['allow_max_limit'];
            }
            
        } elseif ($row3['allow_type'] == "Fixed") {
            $allow_value = $row3['allow_value'];
            if ($allow_value > $row3['allow_max_limit']) {
                $allow_value = $row3['allow_max_limit'];
            }
        } elseif ($row3['allow_type'] = "Initial") {
            $allow_value = $row3['allow_value'] * $emp_basic_at_joining / 100;
//            if ($allow_value > $row3['allow_max_limit']) {
//                $allow_value = $row3['allow_max_limit'];
//            }
        }

// echo "initial:".$emp_basic_at_joining."<br /> current ".$current_basic_pay."<br />";
//     echo "id:".$row3 ['allow_id']." <br /> type".$row3['allow_type']."" ;
//   echo $allow_value;
//     exit();

        $result = mysqli_query($con, "INSERT INTO `pay_slip` (`payslip_id`, `month`, `emp_id`, `basic_pay_amount`, `allow_id`, `amount`, `deduct_id`) VALUES (NULL, '$ps_month', '$emp_id', '$current_basic_pay', '$allow_id', '$allow_value', '0')");

        if ($result) {
            $_SESSION['message'] = $_SESSION['message'] = '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Payslip Allownces added successfully</h4>
              </div>';
        } else {
            $_SESSION['message'] = $_SESSION['message'] = '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Payslip Allownces adding failed</h4>
              </div>';
        }
    }
}

function addDeductionsToPaySlip($con, $ps_month, $emp_id, $current_basic_pay, $emp_basic_at_joining) {
    $sql4 = "SELECT * FROM `employee_deduction` JOIN `deduction` WHERE employee_deduction.deduct_id = deduction.deduct_id AND `employee_deduction`.`emp_id` = $emp_id ";
    $result4 = mysqli_query($con, $sql4);

    while ($row4 = mysqli_fetch_assoc($result4)) {
        $deduct_id = $row4 ['deduct_id'];
        $deduct_value = $row4['deduct_value'];
        if ($row4['deduct_type'] == "Current") {
            $deduct_value = $row4['deduct_value'] * $current_basic_pay / 100;
        } elseif ($row4['deduct_type'] == "Fixed") {
            $deduct_value = $row4['deduct_value'];
// if($deduct_value > $row4['deduct_max_limit']){
//     $deduct_value = $row4['deduct_max_limit'];
// }
        } elseif ($row3['deduct_type'] = "Initial") {
            $deduct_value = $row4['deduct_value'] * $emp_basic_at_joining / 100;
            if ($deduct_value > $row4['deduct_max_limit']) {
                $deduct_value = $row4['deduct_max_limit'];
            }
        }

//            while($row4 = mysqli_fetch_assoc($result4)){
//            $deduct_id = $row4 ['deduct_id'];
//            $deduct_value = $row4['deduct_value'];
//                if($row4['deduct_type'] == "Current"){
//                    $deduct_value = $row4['deduct_value']*$current_basic_pay/100;
//                }elseif($row4['deduct_type'] == "Fixed"){
//                    $deduct_value = $row4['deduct_value'];
//                }elseif($row4['deduct_type'] = "Initial"){
//                    $deduct_value = $row4['deduct_value']*$emp_basic_at_joining/100;
//                }
//
//                if($deduct_value > $row4['deduct_max_limit']){
//                    $deduct_value = $row4['deduct_max_limit'];
//                }
// while($row4 = mysqli_fetch_assoc($result4)){
// $deduct_id = $row4 ['deduct_id'];
// $deduct_value = $row4['deduct_value'];

        $result = mysqli_query($con, "INSERT INTO `pay_slip` (`payslip_id`, `month`, `emp_id`, `basic_pay_amount`, `allow_id`, `amount`, `deduct_id`) VALUES (NULL, '$ps_month', '$emp_id', '$current_basic_pay', '0', '$deduct_value', '$deduct_id')");
        if ($result) {
            $_SESSION['message'] = $_SESSION['message'] = '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Payslip Deduction added successfully</h4>
              </div>';
        } else {
            $_SESSION['message'] = $_SESSION['message'] = '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Payslip deduction adding failed</h4>
              </div>';
        }
    }
}

function addPayslip($con, $ps_month) {
    if (!empty($ps_month)) {
        $ps_month = mysqli_escape_string($con, $ps_month);
// seelct all empolyess
        $sql = "SELECT * FROM `employee`";
        $result = mysqli_query($con, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $emp_id = $row ['emp_id'];
            $emp_scale = $row ['emp_scale'];
            $emp_allow16 = $row['emp_allow16'];
            $emp_joining_date = $row['emp_joining_date'];
            $emp_basic_at_joining = $row['emp_basic_at_joining'];
//++++++++++++++++++++++BAsic pay record+++++++++++++++++++++++++++            
            $sql2 = "SELECT * FROM `basicpay` WHERE `bp_scale` = '$emp_scale' ";
            $result2 = mysqli_query($con, $sql2);
            $row2 = mysqli_fetch_assoc($result2);
            $basic_pay_increment = $row2 ['bp_incr'];

            $datetime1 = date_create($emp_joining_date);
            $datetime2 = date_create();

// Calculates the difference between DateTime objects
            $interval = date_diff($datetime1, $datetime2);
            $years = $interval->format('%R%y');
            $current_basic_pay = $emp_basic_at_joining + ($basic_pay_increment * $years);
//++++++++++++++++++++++Allowance record+++++++++++++++++++++++++++ 
            addAllowncesToPaySlip($con, $ps_month, $emp_id, $current_basic_pay, $emp_basic_at_joining);

//++++++++++++++++++++++Deduction record+++++++++++++++++++++++++++ 
            addDeductionsToPaySlip($con, $ps_month, $emp_id, $current_basic_pay, $emp_basic_at_joining);



//exit();
        }
    }
    header("Location:payslipHome.php");
    exit();
//selelct paysicpay form --- where ()
}

function getPayslips($con) {
    return mysqli_query($con, "SELECT DISTINCT(`month`) FROM `pay_slip` ");
}

function getPayslip($con, $ps_id) {
    return mysqli_query($con, "SELECT * FROM `pay_slip` WHERE `payslip_id` = '$ps_id' ");
}

function deletePayslip($con, $ps_month) {
    if (mysqli_query($con, "DELETE FROM `pay_slip` WHERE `month` = '$ps_month' ")) {
        $_SESSION['message'] = '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Payslip Deleted successfully</h4>
              </div>';
        return TRUE;
    } else {
        $_SESSION['message'] = '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Payslip Updation Failed</h4>
              </div>';
        return FALSE;
    }
    header("Location:payslipHome.php");

    exit();
}

function getEmployeesforMonth($con, $month) {
    return mysqli_query($con, "SELECT * FROM `pay_slip` WHERE `month`='$month' GROUP BY `emp_id` ");
}

function getEmployeeDetail($emp_id, $column) {
// write query and return only emp name
    global $con;
    $query = mysqli_query($con, "SELECT $column FROM employee WHERE emp_id='$emp_id'");
    if (mysqli_num_rows($query) > 0) {
        $result = mysqli_fetch_assoc($query);
        return $result[$column];
    } else {
        return '';
    }
}

function getDepartmentDetail($dept_id, $column) {
// write query and return only emp name
    global $con;
    $query = mysqli_query($con, "SELECT $column FROM department WHERE dept_id='$dept_id'");
    if (mysqli_num_rows($query) > 0) {
        $result = mysqli_fetch_assoc($query);
        return $result[$column];
    } else {
        return '';
    }
}

function deleteEmployeePayslip($con, $emp_id, $month) {
    if (mysqli_query($con, "DELETE FROM `pay_slip` WHERE `emp_id` = '$emp_id' AND `month` = '$month' ")) {
        $_SESSION['message'] = '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Payslip Deleted successfully</h4>
              </div>';
        return TRUE;
    } else {
        $_SESSION['message'] = '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Payslip Updation Failed</h4>
              </div>';
        return FALSE;
    }
    header("Location:pay.php");

    exit();
}

function getAllowancesforEmployee($con, $emp_id) {

    return mysqli_query($con, "SELECT * FROM `pay_slip` WHERE `emp_id`='$emp_id

' GROUP BY `allow_id`");
}

function getDeductionforEmployee($con, $emp_id) {

    return mysqli_query($con, "SELECT * FROM `pay_slip` WHERE `emp_id`='$emp_id

' GROUP BY `deduct_id`");
}

function getEmployeeAllow($con, $emp_id) {
// write query and return only emp name
    $query = mysqli_query($con, "SELECT emp_name FROM employee WHERE emp_id='$emp_id'");
    if (mysqli_num_rows($query) > 0) {
        $result = mysqli_fetch_assoc($query);
        return $result['emp_name'];
    } else {
        return '';
    }
}

function getAllowDetail($allow_id, $column) {
    global $con;
// write query and return only emp name
    $query = mysqli_query($con, "SELECT $column FROM allowance WHERE allow_id='$allow_id'");
    if (mysqli_num_rows($query) > 0) {
        $result = mysqli_fetch_assoc($query);
        return $result[$column];
    } else {
        return '';
    }
}

function getAllowpayDetail($payslip_id, $column) {
    global $con;
// write query and return only emp name
    $query = mysqli_query($con, "SELECT $column FROM pay_slip WHERE payslip_id='$payslip_id'");
    if (mysqli_num_rows($query) > 0) {
        $result = mysqli_fetch_assoc($query);
        return $result[$column];
    } else {
        return '';
    }
}

function getDeductpayDetail($payslip_id, $column) {
    global $con;
// write query and return only emp name
    $query = mysqli_query($con, "SELECT $column FROM pay_slip WHERE payslip_id='$payslip_id'");
    if (mysqli_num_rows($query) > 0) {
        $result = mysqli_fetch_assoc($query);
        return $result[$column];
    } else {
        return '';
    }
}

function getDeductDetail($deduct_id, $column) {
    global $con;
// write query and return only emp name
    $query = mysqli_query($con, "SELECT $column FROM deduction WHERE deduct_id='$deduct_id'");
    if (mysqli_num_rows($query) > 0) {
        $result = mysqli_fetch_assoc($query);
        return $result[$column];
    } else {
        return '';
    }
}

function getEmpBasicPay($bp_scale, $column) {
    global $con;
// write query and return only emp name
    $query = mysqli_query($con, "SELECT $column FROM basicpay WHERE bp_scale='$bp_scale'");
    if (mysqli_num_rows($query) > 0) {
        $result = mysqli_fetch_assoc($query);
        return $result[$column];
    } else {
        return '';
    }
}
