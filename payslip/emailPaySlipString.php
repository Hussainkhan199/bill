
<?php
include_once '../connect_db.php';
include_once '../functions.php';
if (!isset($_SESSION['user_id'])) {
    header("Location:index.php");
}


//if(getEmployeeDetail($emp_id, 'emp_email') == "$emp_email")
//
//
//$to = "employee1@gmail.com";
//$subject = "Salary slip";
//
//
//
//$message = "";
//
//$emp_id = $_GET['emp_id'];
//$month = $_GET['month'];
//
//$result_allow = mysqli_query($con, "SELECT * FROM `pay_slip` WHERE `emp_id` = '$emp_id' AND `month` = '$month' AND `allow_id`!=0 ");
//
//$result_allow2 = mysqli_query($con, "SELECT * FROM `pay_slip` WHERE `emp_id` = '$emp_id' AND `month` = '$month' AND `allow_id`!=0 ");
//
//$result2 = mysqli_query($con, "SELECT * FROM `pay_slip` WHERE `emp_id` = '$emp_id' AND `month` = '$month' AND `deduct_id`!=0  ");
//
//$message .= "<!DOCTYPE html>
//<html>
//    <head>
//        <style>
//            .borderLess{
//                border: none;
//            }
//            .borderLess tr,td,th{
//                border: none;
//            }
//
//            h1, h3, h4 {text-align: center;}
//
//            tr:hover {background-color: #D6EEEE;}
//        </style>
//    </head>
//    <body>
//
//        <div class='contianer'>
//            <div class='row'>
//                <div class='col-md-8 col-md-offset-2' style='border:1px solid #000;'>
//                    <div class='row'>
//                        <div class='col-xs-2 col-sm-2 col-lg-2'><img style='height: 90px; margin-top: 3px;' src='assets/images/small_logo.png' alt='logo'></div>
//                        <div class='col-xs-9 col-sm-9 col-lg-9 '>
//                            <h3><b>UNIVERSITY OF ENGINEERING AND TECHNOLOGY MARDAN</b></h3>
//                        </div>
//                    </div>
//                    <h4 style='margin-top: 0px;'>(Phone No: 0937-9230295, Fox No: 0937-9230296)</h4>
//                    <h4 style='font-weight: bold;'>";
//$message .=  date('F-Y', strtotime($month)); 
//$message .= "</h4><strong><div class='row'>";
//$message .="<div class='col-md-5 col-md-offset-1'>";
//$message .="Name: ".getEmployeeDetail($emp_id, 'emp_name')."<br />";
//$message .="Designation: ".getEmployeeDetail($emp_id, 'emp_designation');
//$message .="</div><div class='col-md-5'>";
//$message .="BPS:".getEmployeeDetail($emp_id, 'emp_scale')."<br />";
//$message .="Department:".getDepartmentDetail(getEmployeeDetail($emp_id, 'emp_dept'), 'dept_title')."</td>";
//
//$message .= "<br>";          
//$message .="<table class = 'pay_tbl table table-bordered' >
//                        <tr>
//                            <th style='width: 400px;'>Allowances</th>
//                            <th>Amount</th>
//                            <th style='width: 400px;'>Allowances</th>
//                            <th>Amount</th>
//                        </tr>
//                        <tr>
//                            <td>Basic Pay</td>
//                            

 echo "Email Send Successfuly";
//                            <td>   ";
//                        if(getEmployeeDetail($emp_id, 'emp_scale') == 'F'){
//                                    $basic_pay  = getEmployeeDetail($emp_id, 'emp_allow16');
//                                }else{
//                                    $allow_16 = getEmployeeDetail($emp_id, 'emp_allow16');
//                                    $basic_pay =  mysqli_fetch_assoc($result_allow2)['basic_pay_amount'];                                    
//                                }
//                                $message .=$basic_pay; 
//           $message .="</td> ";
//                                    
//                $sum = 0;
//                            $deduct_sum = 0;
//                            $i = 1;
//                            while ($row = mysqli_fetch_assoc($result_allow)) {
//                                    if ($i % 2 == 1) {
//                                    $message .="  '<tr>' ";
//                                    } 
                                    
//               $message .= " <td> "'
//                 getAllowDetail($row['allow_id'], 'allow_title') 
//                                   $message .= " </td>"
//                      $message .=  " <td>"
//                  $row['amount'];
//                                 $message .= "   </td>"
//                    
//                                   
//                 if ($i % 2 == 1) {
//                                    $message .= " echo '</tr>'";
//                                    } $sum = $sum + $row['amount'];
//                             $i++;
//                                
//                            }  
//                            $sum = $sum + $basic_pay; 
//                            
//                       $message .= "  </tr> " 
                                    
//                $message .= "    <td>ARA-2016</td>"
//                            <td>"
//                                if(getEmployeeDetail($emp_id, 'emp_scale') != "F"){
//                                    echo $allow_16;                            
//                                }
//                                
//                                 $message .= " </td>"
//                        </tr>
//                        $sum = $sum + $allow_16; 
//                            </table>
                           
                           
//                   <table class="borderLess">
//                        <tr style='font-weight: bold;'>
//                            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
//                            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
//                            <td>Gross Income: </td>"
                           
//                  $message .= "<td>&nbsp;&nbsp; ". echo $sum; ." </td>
//                        </tr>
//                    </table>
//                    <br> ""

                      
          //$income_tax = 0; 
    
  // <?php   if($sum*12 > 0 && $sum*12 <= 600000){$income_tax = 0;}

//    elseif($sum*12 >600000 && $sum*12 <= 1200000){$income_tax = ($sum*12 - 600000)*0.05 ;}
//
//        elseif($sum*12 >1200000 && $sum*12 <= 1800000){$income_tax = ($sum*12 - 1200000)*0.1+30000 ;}
//
//        elseif($sum*12 >1800000 && $sum*12 <= 2500000){$income_tax = ($sum*12 - 1800000)*0.15+90000 ;}
//    
//        elseif($sum*12 >2500000 && $sum*12 <= 3500000){$income_tax = ($sum*12 - 2500000)*0.175+195000 ;}
//    
//        elseif($sum*12 >3500000 && $sum*12 <= 5000000){$income_tax = ($sum*12 - 3500000)*0.2+370000 ;}
//    
//        elseif($sum*12 >5000000 && $sum*12 <= 8000000){$income_tax = ($sum*12 - 5000000)*0.225+670000 ;}
//        
//        elseif($sum*12 >8000000 && $sum*12 <= 12000000){$income_tax = ($sum*12 - 8000000)*0.25+1345000 ;}
//    
//        elseif($sum*12 >12000000 && $sum*12 <= 30000000){$income_tax = ($sum*12 - 12000000)*0.275+2345000 ;}
//    
//        elseif($sum*12 >30000000 && $sum*12 <= 50000000){$income_tax = ($sum*12 - 30000000)*0.3+7295000 ;}
//    
//        elseif($sum*12 >50000000 && $sum*12 <= 75000000){$income_tax = ($sum*12 - 50000000)*0.325+13295000 ;}
  //

        
        
//         $message .= " <table class="table table-bordered">
//                        <tr>
//                            <th style='width: 400px;'>Deduction</th>
//                            <th>Amount</th>
//                            <th style='width: 400px;'>Deduction</th>
//                            <th>Amount</th>
//                        </tr>"
//        
//                        $c = 1;
//                        while ($row = mysqli_fetch_assoc($result2)) {
//                                ."
//                                
//       if ($c % 2 == 0) {
//                                    '<tr>';
//                                } 
//                                
//        $message .=  "<td> ". getDeductDetail($row['deduct_id'], 'deduct_title')."</td>"
//                                
//        $message .= "<td> ". $row['amount']; ."</td>" 
//
//        $message .= ".  if ($c % 2 == 0) {
//                        echo '</tr>';
//                                }
//                    ."
//                                
//        $message .= ". $deduct_sum = $deduct_sum + $row['amount'];."
//        $message .= ".
//                         $c++;
//                        }
//                        ."
//                        
//         $message .= " <tr>
//                            ". if(getEmployeeDetail($emp_id, 'emp_scale') > '17'){
//                            $tax = $income_tax * (25/100); ." " 
//         $message .= "<td>Income tax </td> <td> ".  echo $emp_tax= round(($income_tax - $tax)/12, 0); ."</td>"
//                                
//         $message .= ". }else{  ."
//        $message .= "<td>Income tax </td><td>". echo $emp_tax= round($income_tax /12, 0); ."</td>"
//         $message .= ".  } ."
//         $message .= "</tr>
// 
//                    </table>"

            
//        $message .= "<table class='borderLess'>
//                    <tr style='font-weight: bold;'>
//                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
//                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>                                <td>Total Deduction Amount: </td> "
//         $message .= " <td>&nbsp;&nbsp; ". echo $deduct_sum = $deduct_sum+$emp_tax;."</td>"
//           $message .= " <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
//                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>                            
//                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
//                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
//                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>                            <td>&nbsp;&nbsp;Net Salary Amount :</td> "
//             
//           $message .= "<td>&nbsp;&nbsp;". echo $net = $sum - $deduct_sum; ."</td>
//                            </tr>
//                        </table>
//                    <br>"
//
//               
//              $message .= " <h5 style="text-align: center; font-style: italic;"> This is computer generated slip.</h5>
//                </div>
//            </div>
//        </div>
//            echo "Email Send Successfully";
//    </body>
//            
//</html>

//<? php
// Always set content-type when sending HTML email
//$headers = "MIME-Version: 1.0" . "\r\n";
//$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
//$headers .= 'From: <paybilluet123@gmail.com>' . "\r\n";

//mail($to,$subject,$message,$headers);
//?>
