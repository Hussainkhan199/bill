
<?php
include_once '../connect_db.php';
include_once '../functions.php';
if (!isset($_SESSION['user_id'])) {
    header("Location:index.php");
}

$emp_id = $_GET['emp_id'];
$month = $_GET['month'];

$result_allow = mysqli_query($con, "SELECT * FROM `pay_slip` WHERE `emp_id` = '$emp_id' AND `month` = '$month' AND `allow_id`!=0 ");

$result_allow2 = mysqli_query($con, "SELECT * FROM `pay_slip` WHERE `emp_id` = '$emp_id' AND `month` = '$month' AND `allow_id`!=0 ");

$result2 = mysqli_query($con, "SELECT * FROM `pay_slip` WHERE `emp_id` = '$emp_id' AND `month` = '$month' AND `deduct_id`!=0  ");

?>
<!DOCTYPE html>
<html>
    <head>
        <base href="http://localhost/paybill/" target="_self">
        <link rel="stylesheet" href="assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
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
    <body style="font-family: emoji;">

        <div class="contianer">
            <div class="row">
                <div class="col-md-8 col-md-offset-2" style="border:1px solid #000;">
                    <div class="row">
                        <div class="col-xs-2 col-sm-2 col-lg-2"><img style="height: 90px; margin-top: 3px;" src="assets/images/small_logo.png" alt="logo"></div>
                        <div class="col-xs-9 col-sm-9 col-lg-9 ">
                            <h3><b>ABDUL WALI KHAN UNIVERSITY </BR> MARDAN</b></h3>
                        </div>
                    </div>
                    <h4 style="margin-top: 0px;">(Phone No: 0937-920866, Fax No: 0937-920866)</h4>
                    <h4 style="font-weight: bold;"><?= date('F-Y', strtotime($month)); ?> </h4>
                    <strong>
                        <div class="row">
                            <?php// $row = mysqli_fetch_array($result); ?>
                            <div class="col-md-5 col-md-offset-1">
                                Name: <?= getEmployeeDetail($emp_id, 'emp_name') ?><br />
                                Designation: <?= getEmployeeDetail($emp_id, 'emp_designation') ?>
                            </div>
                            <div class="col-md-5">
                                BPS: <?= getEmployeeDetail($emp_id, 'emp_scale') ?><br />
                                Department: <?= getDepartmentDetail(getEmployeeDetail($emp_id, 'emp_dept'), 'dept_title')?>

                            </div>
                        </div>
                    </strong>
                    <br>          
<!--                    if emp is fixed-->
                    <table class = "pay_tbl table table-bordered" >
                        <tr>
                            <th style="width: 400px;">Allowances</th>
                            <th>Amount</th>
                            <th style="width: 400px;">Allowances</th>
                            <th>Amount</th>
                        </tr>
                        <tr>
                           <?php if(getEmployeeDetail($emp_id, 'emp_scale') != "F"){?>
                            <td>Basic Pay</td>
                            <td><?php
//                                if(getEmployeeDetail($emp_id, 'emp_scale') == "F"){
//                                    $basic_pay  = getEmployeeDetail($emp_id, 'emp_allow16');
//                                }else{
                                
                                    $allow_16 = getEmployeeDetail($emp_id, 'emp_allow16');
                                    $basic_pay =  mysqli_fetch_assoc($result_allow2)['basic_pay_amount'];                                    
                                
                                echo $basic_pay;
                                }
                                ?> 
                            </td>
                            <?php
                            $sum = 0;
                            $deduct_sum = 0;
                            $i = 1;
                            //echo "<pre/>";
                            while ($row = mysqli_fetch_assoc($result_allow)) {
                               //print_r($row);
                                    if ($i % 2 == 1) {
                                        "<tr>";
                                    }
                                    ?>
                                    <td>
                                        <?= getAllowDetail($row['allow_id'], 'allow_title') ?>
                                    </td>
                                    <td>
                                        <?= $row['amount']; ?>
                                    </td>     
                                    <?php
                                    if ($i % 2 == 1) {
                                        echo "</tr>";
                                    } $sum = $sum + $row['amount'];
                             $i++;
                                
                            }  
                            if(getEmployeeDetail($emp_id, 'emp_scale') != "F") {
                            $sum = $sum + $basic_pay;  }
                            ?>
                        </tr>
                        <tr>
                        <?php if(getEmployeeDetail($emp_id, 'emp_scale') != "F"){?> <td>ARA-2016</td> <?php } ?>
                            <td><?php
                                if(getEmployeeDetail($emp_id, 'emp_scale') != "F"){
                                    echo $allow_16;                            
                                }
                                
                                 ?></td>
                        </tr>
                        <?php 
                         if(getEmployeeDetail($emp_id, 'emp_scale') != "F"){
                        
                        $sum = $sum + $allow_16; }?>
                    </table>
                    <table class="borderLess">
                        <tr style="font-weight: bold;">
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                            <td>Gross Income: </td>
                            <td>&nbsp;&nbsp;<?php echo $sum; ?></td>
                        </tr>
                    </table>
                    <br>
                    
                    
                    
                                        
                    
                    <!--    This is the income tax section and formula -->
    <?php  $income_tax = 0; 
    
    if($sum*12 > 0 && $sum*12 <= 600000){$income_tax = 0;}

    elseif($sum*12 >600000 && $sum*12 <= 1200000){$income_tax = ($sum*12 - 600000)*0.05 ;}

        elseif($sum*12 >1200000 && $sum*12 <= 1800000){$income_tax = ($sum*12 - 1200000)*0.1+30000 ;}

        elseif($sum*12 >1800000 && $sum*12 <= 2500000){$income_tax = ($sum*12 - 1800000)*0.15+90000 ;}
    
        elseif($sum*12 >2500000 && $sum*12 <= 3500000){$income_tax = ($sum*12 - 2500000)*0.175+195000 ;}
    
        elseif($sum*12 >3500000 && $sum*12 <= 5000000){$income_tax = ($sum*12 - 3500000)*0.2+370000 ;}
    
        elseif($sum*12 >5000000 && $sum*12 <= 8000000){$income_tax = ($sum*12 - 5000000)*0.225+670000 ;}
        
        elseif($sum*12 >8000000 && $sum*12 <= 12000000){$income_tax = ($sum*12 - 8000000)*0.25+1345000 ;}
    
        elseif($sum*12 >12000000 && $sum*12 <= 30000000){$income_tax = ($sum*12 - 12000000)*0.275+2345000 ;}
    
        elseif($sum*12 >30000000 && $sum*12 <= 50000000){$income_tax = ($sum*12 - 30000000)*0.3+7295000 ;}
    
        elseif($sum*12 >50000000 && $sum*12 <= 75000000){$income_tax = ($sum*12 - 50000000)*0.325+13295000 ;}
    ?>
                    
                    
<!--                    Deduction  table -->
                    
                    <table class="table table-bordered">
                        <tr>
                            <th style="width: 400px;">Deduction</th>
                            <th>Amount</th>
                            <th style="width: 400px;">Deduction</th>
                            <th>Amount</th>
                        </tr>
                        <?php
                        $c = 1;
                        while ($row = mysqli_fetch_assoc($result2)) {
                                ?>
                                <?php
                                if ($c % 2 == 0) {
                                    "<tr>";
                                }
                                ?>
                                <td><?= getDeductDetail($row['deduct_id'], 'deduct_title') ?></td>
                                <td><?= $row['amount']; ?></td> 

                                <?php
                                if ($c % 2 == 0) {
                                    echo "</tr>";
                                }
                                ?>
                                <?php $deduct_sum = $deduct_sum + $row['amount']; ?>
                                <?php
                         $c++;
                        }
                        ?> 
                        
                        <tr>
                            <?php  if(getEmployeeDetail($emp_id, 'emp_scale') > "17"  and  getEmployeeDetail($emp_id, 'emp_scale') != "F" and  getEmployeeDetail($emp_id, 'emp_dept') != "42"){
                            $tax = $income_tax * (25/100); ?> 
                    <td>Income tax </td> <td><?php  echo $emp_tax= round(($income_tax - $tax)/12, 0); ?></td>
                           <?php }else{  ?>
                            <td>Income tax </td><td><?php echo $emp_tax= round($income_tax /12, 0); ?></td>
                          <?php  } ?>
                        </tr>
                        
<!--
                        <tr>
                            <?php  //$tax = $income_tax * (25/100) ; ?>
                            
                    <td>Income tax </td><td><?php //echo $emp_tax= round(($income_tax - $tax)/12, 0); ?></td>
                        </tr>
-->
                    </table>

                        <table class="borderLess">
                            <tr style="font-weight: bold;">
                                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                <td>Total Deduction Amount: </td>
                                <td>&nbsp;&nbsp;<?php echo $deduct_sum = $deduct_sum+$emp_tax; ?></td>
                                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>                            
                                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                <td>&nbsp;&nbsp;Net Salary Amount :</td>
                                <td>&nbsp;&nbsp;<?php echo $net = $sum - $deduct_sum; ?></td>
                            </tr>
                        </table>
                    <br>
                        <h5 style="text-align: center; font-style: italic;"> This is computer generated slip.</h5>
                </div>
            </div>
        </div>
            
    </body>
              
<!--
        <div class="box-footer">
				<div class="col-sm-offset-3 col-sm-9">
					<button type="button" class="btn btn-primary" onclick="window.print();">Print</button>
				</div>
			</div>
-->

    <!-- jQuery 3 -->
    <script src="assets/bower_components/jquery/dist/jquery.min.js"></script>        
    <!-- jQuery UI 1.11.4 -->
    <script src="assets/bower_components/jquery-ui/jquery-ui.min.js"></script>
</html>