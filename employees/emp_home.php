<?php
include_once '../connect_db.php';
include_once '../functions.php';
if (!isset($_SESSION['user_id'])) {
    header("Location:index.php");
}

if (isset($_POST['emp_submit'])) {
    $emp_name = $_POST['emp_name'];
    $emp_designation = $_POST['emp_designation'];
    $emp_dept = $_POST['emp_dept'];
    $emp_scale = $_POST['emp_scale'];
    $emp_category = $_POST['emp_category'];
    $emp_status = $_POST['emp_status'];
    $emp_allow = $_POST['emp_allow'];
    $emp_join_date = $_POST['emp_join_date'];
    $emp_basicpay_at_joining = $_POST['emp_basicpay_at_joining'];
    $emp_email = $_POST['emp_email'];
    addEmployee($con, $emp_name, $emp_designation, $emp_dept, $emp_scale, $emp_category, $emp_status, $emp_allow, $emp_join_date, $emp_basicpay_at_joining, $emp_email );
}

if (isset($_POST['emp_update'])) {

    $emp_id = $_POST['emp_id'];
    $emp_name = $_POST['emp_name'];
    $emp_designation = $_POST['emp_designation'];
    $emp_dept = $_POST['emp_dept'];
    $emp_scale = $_POST['emp_scale'];
    $emp_category = $_POST['emp_category'];
    $emp_status = $_POST['emp_status'];
    $emp_allow = $_POST['emp_allow'];
    $emp_join_date = $_POST['emp_join_date'];
    $emp_basicpay_at_joining = $_POST['emp_basicpay_at_joining'];
    $emp_email = $_POST['emp_email'];

    updateEmployee($con, $emp_id, $emp_name, $emp_designation, $emp_dept, $emp_scale, $emp_category, $emp_status, $emp_allow, $emp_join_date, $emp_basicpay_at_joining, $emp_email );
}

if (isset($_POST['emp_allow_submit'])) {
    $emp_id = $_POST['emp_id'];
    $allow_array = array();
    $allow_array[0] = $_POST['emp_House_Rent'];
    $allow_array[1] = $_POST['emp_House_Subsidy'];
    $allow_array[2] = $_POST['emp_Convey_Allowance'];
    $allow_array[3] = $_POST['emp_Charge_Allowance'];
    $allow_array[4] = $_POST['emp_Qualification_Allowance'];
    $allow_array[5] = $_POST['emp_SeniorPost_Allow'];
    $allow_array[6] = $_POST['emp_Medical_Allow'];
    $allow_array[7] = $_POST['emp_Enter_Allow'];
    $allow_array[8] = $_POST['emp_Special_Allow'];
    $allow_array[9] = $_POST['emp_Spec_Allow21'];
    $allow_array[10] = $_POST['emp_Order_allow'];
    $allow_array[11] = $_POST['emp_Order_allowArrear'];
    $allow_array[12] = $_POST['emp_fixed_pay'];
    $allow_array[13] = $_POST['emp_Teach_allow'];
    $allow_array[14] = $_POST['emp_Teach_allow21'];
    $allow_array[15] = $_POST['emp_Comp_allow'];
    $allow_array[16] = $_POST['emp_BrainDrain_allow'];
    $allow_array[17] = $_POST['emp_ARA16_allow'];
    $allow_array[18] = $_POST['emp_ARA17_allow'];
    $allow_array[19] = $_POST['emp_ARA18_allow'];
    $allow_array[20] = $_POST['emp_ARA19_allow'];
    $allow_array[21] = $_POST['emp_ARA21_allow'];
    $allow_array[22] = $_POST['emp_Wash_allow'];
    $allow_array[23] = $_POST['emp_Dress_allow'];
    $allow_array[24] = $_POST['emp_Integ_allow'];
    $allow_array[25] = $_POST['emp_Extra_allow'];
    $allow_array[26] = $_POST['emp_misc_allow'];


//    echo "<pre />";
//    print_r($allow_array);

    submitEmployeeAllowances($con, $emp_id, $allow_array);
}

//employee deduction function

if (isset($_POST['emp_deduct_submit'])) {
    $emp_id = $_POST['emp_id'];
//     echo "<pre />";
//     print_r($emp_id);
    $deduct_array = array();
    $deduct_array[0] = $_POST['emp_houserent'];
    $deduct_array[1] = $_POST['emp_watertax'];
    $deduct_array[2] = $_POST['emp_BF'];
    $deduct_array[3] = $_POST['emp_GPF'];
    $deduct_array[4] = $_POST['emp_upkeep'];
    $deduct_array[5] = $_POST['emp_GI'];
    $deduct_array[6] = $_POST['emp_Trans'];
    $deduct_array[7] = $_POST['emp_Incometax'];
    $deduct_array[8] = $_POST['emp_HB'];
    $deduct_array[9] = $_POST['emp_GPF_advanced'];
    $deduct_array[10] = $_POST['emp_misc_deduct'];
    $deduct_array[11] = $_POST['emp_RR'];

    submitEmployeeDeductions($con, $emp_id, $deduct_array);
}


$result = getEmployees($con);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Pay Bill| Data Tables</title>
        <base href="http://localhost/paybill/" target="_self">
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="assets/bower_components/font-awesome/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="assets/bower_components/Ionicons/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="assets/dist/css/AdminLTE.min.css">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="assets/dist/css/skins/_all-skins.min.css">
        <!-- Morris chart -->
        <link rel="stylesheet" href="assets/bower_components/morris.js/morris.css">
        <!-- jvectormap -->
        <link rel="stylesheet" href="assets/bower_components/jvectormap/jquery-jvectormap.css">
        <!-- DataTables -->
        <link rel="stylesheet" href="assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
        <!-- Date Picker -->
        <link rel="stylesheet" href="assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
        <!-- Daterange picker -->
        <link rel="stylesheet" href="assets/bower_components/bootstrap-daterangepicker/daterangepicker.css">
        <!-- bootstrap wysihtml5 - text editor -->
        <link rel="stylesheet" href="assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Google Font -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
        <!-- jQuery 3 -->
        <script src="assets/bower_components/jquery/dist/jquery.min.js"></script>        
        <!-- jQuery UI 1.11.4 -->
        <script src="assets/bower_components/jquery-ui/jquery-ui.min.js"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <!-- Bootstrap 3.3.7 -->
        <script src="assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <script>
            // ajax call for update   
            $(document).ready(function () {
                $('.update_link').click(function (event) {
                    event.preventDefault();
                    $.ajax({
                        url: $(this).attr('href'),
                        dataType: "JSON",
                        success: function (response) {
                            $('#modal-update').modal('show');
                            // alert(response.emp_name and others);
                            $('#update_emp_id').val(response.emp_id);
                            $('#update_emp_name').val(response.emp_name);
                            $('#update_emp_designation').val(response.emp_designation);
                            $('#update_emp_dept').val(response.emp_dept);
                            $('#update_emp_scale').val(response.emp_scale);
                            $('#update_emp_category').val(response.emp_category);
                            $('#update_emp_status').val(response.emp_status);
                            $('#update_emp_allow').val(response.emp_allow16);
                            $('#update_emp_join_date').val(response.emp_joining_date);
                            $('#update_emp_basicpay_at_joining').val(response.emp_basic_at_joining);
                            $('#update_emp_email').val(response.emp_email);
                            //alert(response.emp_joining_date);
                        }
                    });
                    return false; // for good measure
                });
            });
//            
            //   for employee allowances update or get 

            $(document).ready(function () {
                $("#example1").on("click", ".emp_allow", function () {
                    event.preventDefault();                    
                    var emp_id = $(this).data('id');                    
                    $.ajax({
                        url: $(this).attr('href'),
                        dataType: "JSON",
                        success: function (response) {
                            $('#empallowance').modal('show');
                            console.log(emp_id);
                            $("#empIdForAllownce").val(emp_id);
                            if (response.length !== 0) {
                                for (var i = 0; i < response.length; i++) {
                                    if ($("[value='" + response[i] + "']")) {
                                        $("[value='" + response[i] + "']").prop('selected', true);                                        
                                    }
                                }
                            }else{
                                $("[value='']").prop('selected', true);
                            }

                        }
                    });
                    return false; // for good measure
                });
            });
            
            $(document).ready(function () {
                $("#example1").on("click", ".emp_deduct", function () {
                    event.preventDefault();                    
                    var emp_id = $(this).data('id');                    
                    $.ajax({
                        url: $(this).attr('href'),
                        dataType: "JSON",
                        success: function (response) {
                            $('#empdeduction').modal('show');
                            console.log(emp_id);
                            $("#emp_deduct_id").val(emp_id);
                            if (response.length !== 0) {
                                for (var i = 0; i < response.length; i++) {
                                    if ($("[value='" + response[i] + "']")) {
                                        $("[value='" + response[i] + "']").prop('selected', true);                                        
                                    }
                                }
                            }else{
                                $("[value='']").prop('selected', true);
                            }

                        }
                    });
                    return false; // for good measure
                });
            });
            
            //+++++++ javascript function used for hidden input emp id ++++++
//            $(document).ready(function () {
//                $('.emp_allow').click(function (event) {
//                    var emp_id = $(this).data('id');
//                    $("#emp_id").val(emp_id);
//                    //alert(emp_id);
//                });
//            });


//            $(document).ready(function () {
//                $('.emp_deduct').click(function (event) {
//                    var emp_id = $(this).data('id');
//                    $("#emp_deduct_id").val(emp_id);
//                    //alert(emp_id);
//                });
//            });

        </script>

    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">


            <!-- header and aside code-->
            <!-- header file  -->
            <?php include_once '../header.php'; ?>
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Employees
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="employees/emp_home.php">Employee Tables</a></li>

                    </ol>
                </section>
                <!-- Main content -->
                <section class="content">
                    <?php
                    if (isset($_SESSION['message'])) {
                        echo $_SESSION['message'];
                    }
                    unset($_SESSION['message']);
                    ?>

                    <div class="row">
                        <div class="col-xs-12" >

                            <div class="box">
                                <div class="box-header">
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#exampleModal" >
                                        Add New Employee
                                    </button>
                                    <!-- Modal -->
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <div class="table-responsive">
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Designation</th>
                                                    <th>Department </th>
                                                    <th>Scale</th>
                                                    <th>Category</th>
                                                    <th>Status</th>
                                                    <th>ARA-2016 Allowance</th>
                                                    <th>Joining Date</th>
                                                    <th>Basic at Joining</th>
                                                    <th>Email</th>
                                                    <th>Allowances</th>
                                                    <th>Deduction</th>
                                                    <th>Edit</th>
                                                    <th>Delete</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php while ($row = mysqli_fetch_array($result)) { ?>
                                                    <tr>
                                                        <td><?= $row['emp_name'] ?></td>
                                                        <td><?= $row['emp_designation'] ?></td>
                                                        <td><?= getDepartmentName($con, $row['emp_dept']); ?></td>
                                                        <td><?= $row['emp_scale'] ?></td>
                                                        <td><?= $row['emp_category'] ?></td>
                                                        <td><?= $row['emp_status'] ?></td>
                                                        <td><?= $row['emp_allow16'] ?></td>
                                                        <td><?= $row['emp_joining_date'] ?></td>
                                                        <td><?= $row['emp_basic_at_joining'] ?></td>
                                                        <td><?= $row['emp_email'] ?></td>

                                                                <!--<td><a class="emp_allow" data-toggle="modal" data-target="#empallowance" data-id="<?= $row['emp_id'] ?>" ><i class="fa fa-pencil"></i> </a></td>-->
                                                        <td><a class="emp_allow" href="employees/getEmployeeAllowances.php?emp_id=<?= $row['emp_id'] ?>" data-id="<?= $row['emp_id'] ?>" ><button class="btn  btn-primary"><i class="fa fa-pencil"></i></button> </a></td>

                                                       
                                                        <td><a  class="emp_deduct" href="employees/getEmployeeDeductions.php?emp_id=<?= $row['emp_id'] ?>"  data-toggle="modal" data-target="#empdeduction" data-id="<?= $row['emp_id'] ?>" ><button class="btn  btn-primary"><i class="fa fa-pencil" class="btn  btn-primary"></i></button> </a></td>


                                                        <td><a href="employees/getEmployee.php?emp_id=<?= $row['emp_id'] ?>" class="update_link text-success" data-target="#editEmployee"><button class="btn  btn-success"><i class="fa fa-edit"></i></button></a></td>
                                                        
                                                        <td><a href="employees/deleteEmployee.php?emp_id=<?= $row['emp_id'] ?>" class="text-danger" onClick="return confirm('Arer you sure to delete the record')"><button class="btn  btn-danger"><i class="fa fa-trash-o"></i></button></a></td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- /.box-body -->
                            </div>
                            <!-- /.box -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper footer -->
            <?php include_once '../footer.php'; ?>
            <!--add employee record data-->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <!-- form start -->
                        <form role="form" method="POST" action="employees/emp_home.php">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">Add Employee</h4>
                            </div>
                            <div class="modal-body">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="emp_name">Name</label>
                                        <input type="text" class="form-control" id="emp_name" name="emp_name" placeholder="Enter Employee name">
                                    </div>
                                    <div class="form-group">
                                        <label for="emp_designation">Designation</label>
                                        <input type="text" class="form-control" id="emp_designation" name="emp_designation" placeholder="Enter designation">
                                    </div>
                                    <div class="form-group">
                                        <label for="emp_dept">Department</label>
                                        <select name="emp_dept" id="emp_dept" class="form-control">
                                            <option value="">Select Department</option>
                                            <?php
                                            $result = getDepartments($con);
                                            while ($row = mysqli_fetch_array($result)) {
                                                ?>
                                                <option value="<?= $row['dept_id'] ?>"><?= $row['dept_title'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="emp_scale">Scale</label>
                                        <input type="text" class="form-control" id="emp_scale" name="emp_scale" placeholder="Enter scale">
                                    </div>
                                    <div class="form-group">
                                        <label for="emp_category">Category</label>
                                        <input type="text" class="form-control" id="emp_category" name="emp_category" placeholder="Enter Category">
                                    </div>
                                    <div class="form-group">
                                        <label for="emp_status">Status</label>
                                        <input type="text" class="form-control" id="emp_status" name="emp_status" placeholder="Enter Status">
                                    </div>
                                    <div class="form-group">
                                        <label for="emp_allow16">ARA 2016 Allowance</label>
                                        <input type="text" class="form-control" id="emp_allow" name="emp_allow" placeholder="Enter ARA 2016 allowances ">
                                    </div>

                                    <div class="form-group">
                                        <label for="emp_join_date">Employee Joining Date </label>
                                        <input type="date" class="form-control" id="emp_join_date" name="emp_join_date" placeholder="Enter Employee Joining Date please">
                                    </div>

                                    <div class="form-group">
                                        <label for="emp_basicpay_at_joining">Employee Basic Pay Joining </label>
                                        <input type="text" class="form-control" id="emp_basicpay_at_joining" name="emp_basicpay_at_joining" placeholder="Enter Employee Basic Pay Joining">
                                    </div>

                                    <div class="form-group">
                                        <label for="emp_email">Employee Email Address </label>
                                        <input type="email" class="form-control" id="emp_email" name="emp_email" placeholder="Enter Employee Email Address">
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" name="emp_submit" id="emp_submit">Submit</button>
                            </div>
                        </form>
                        <!-- /.form -->
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.add modal -->
        </div>

        <!--update empployee <div class="modal fade" id="editEmployee">-->
        <div class="modal fade" id="modal-update" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- form start -->
                    <form role="form" method="post" action="employees/emp_home.php">
                        <input type="hidden" id="update_ps_id" name="ps_id" value="">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Update Employee</h4>
                        </div>
                        <div class="modal-body">
                            <div class="box-body">
                                <input type="hidden" id="update_emp_id" name="emp_id" value="">
                                <div class="form-group">
                                    <label for="update_emp_name">Name</label>
                                    <input type="text" class="form-control" id="update_emp_name" name="emp_name" value="">
                                </div>
                                <div class="form-group">
                                    <label for="update_emp_designation">Designation</label>
                                    <input type="text" class="form-control" id="update_emp_designation" name="emp_designation" value="">
                                </div>
                                <div class="form-group">
                                    <label for="update_emp_dept">Department</label>
                                    <select name="emp_dept" id="update_emp_dept" class="form-control" >
                                        <option value="">Select Department</option>
                                        <?php
                                        $result = getDepartments($con);
                                        while ($row = mysqli_fetch_array($result)) {
                                            ?>
                                            <option value="<?= $row['dept_id'] ?>"><?= $row['dept_title'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="update_emp_scale">Scale</label>
                                    <input type="text" class="form-control" id="update_emp_scale" name="emp_scale" value="">
                                </div>
                                <div class="form-group">
                                    <label for="update_emp_category">Category</label>
                                    <input type="text" class="form-control" id="update_emp_category" name="emp_category" value="">
                                </div>
                                <div class="form-group">
                                    <label for="update_emp_status">Status</label>
                                    <input type="text" class="form-control" id="update_emp_status" name="emp_status" value="">
                                </div>
                                <div class="form-group">
                                    <label for="update_emp_allow">ARA 2016 Allowance</label>
                                    <input type="text" class="form-control" id="update_emp_allow" name="emp_allow" value="">
                                </div>

                                <div class="form-group">
                                    <label for="update_emp_join_date">Employee Joining Date </label>
                                    <input type="date" class="form-control" id="update_emp_join_date" name="emp_join_date" value="">
                                </div>

                                <div class="form-group">
                                    <label for="update_emp_basicpay_at_joining">Employee Basic Pay Joining </label>
                                    <input type="text" class="form-control" id="update_emp_basicpay_at_joining" name="emp_basicpay_at_joining" value="">

                                </div>
                                
                                <div class="form-group">
                                    <label for="update_emp_email">Employee Email Address </label>
                                    <input type="email" class="form-control" id="update_emp_email" name="emp_email" value="">

                                </div>
                                
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="emp_update" id="emp_update">Update</button>
                        </div>
                    </form>
                    <!-- /.form -->
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.add modal -->

        <!-- Add Employee allowances modal -->
        <div  class="modal fade" id="empallowance" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" style="width: 60%;">
                <div class="modal-content">
                    <!-- form start -->
                    <form role="form" method="POST" action="employees/emp_home.php">
                        <input type="hidden" id="empIdForAllownce" name="emp_id" value="" />
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Employee Allowances</h4>
                        </div>
                        <div class="modal-body">
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="emp_House_Rent">House Rent</label>
                                            <select name="emp_House_Rent" id="emp_House_Rent" class="form-control">
                                                <option value="">Select House Rent</option>
                                                <?php
                                                $result = getHouseRent($con);
                                                while ($row = mysqli_fetch_array($result)) {
                                                    ?>
                                                    <option value="<?= $row['allow_id'] ?>"><?= $row['allow_title'] ?> | <?= $row['allow_scale'] ?> |<?= $row['allow_value'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="emp_House_Subsidy">House Subsidy</label>
                                            <select name="emp_House_Subsidy" id="emp_House_Subsidy" class="form-control">
                                                <option value="">Select House Subsidy </option>
                                                <?php
                                                $result = getHouseSubsidy($con);
                                                while ($row = mysqli_fetch_array($result)) {
                                                    ?>
                                                    <option value="<?= $row['allow_id'] ?>"><?= $row['allow_title'] ?> | <?= $row['allow_scale'] ?> |<?= $row['allow_value'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="emp_Convey_Allowance">Convey Allowance</label>
                                            <select name="emp_Convey_Allowance" id="emp_Convey_Allowance" class="form-control">
                                                <option value="">Select Convey Allowance </option>
                                                <?php
                                                $result = getConveyAllowance($con);
                                                while ($row = mysqli_fetch_array($result)) {
                                                    ?>
                                                    <option value="<?= $row['allow_id'] ?>"><?= $row['allow_title'] ?> | <?= $row['allow_scale'] ?> |<?= $row['allow_value'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="emp_Charge_Allowance">Charge Allowance</label>
                                            <select name="emp_Charge_Allowance" id="emp_Charge_Allowance" class="form-control">
                                                <option value="">Select Charge Allowance </option>
                                                <?php
                                                $result = getChargeAllowance($con);
                                                while ($row = mysqli_fetch_array($result)) {
                                                    ?>
                                                    <option value="<?= $row['allow_id'] ?>"><?= $row['allow_title'] ?> | <?= $row['allow_scale'] ?> |<?= $row['allow_value'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="emp_Qualification_Allowance">Qualification Allowance</label>
                                            <select name="emp_Qualification_Allowance" id="emp_Qualification_Allowance" class="form-control">
                                                <option value="">Select Qualification Allowance </option>
                                                <?php
                                                $result = getQualificationAllowance($con);
                                                while ($row = mysqli_fetch_array($result)) {
                                                    ?>
                                                    <option value="<?= $row['allow_id'] ?>"><?= $row['allow_title'] ?> | <?= $row['allow_scale'] ?> |<?= $row['allow_value'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="emp_SeniorPost_Allow">Senior Post Allowance</label>
                                            <select name="emp_SeniorPost_Allow" id="emp_SeniorPost_Allow" class="form-control">
                                                <option value="">Select Senior Post Allowance </option>
                                                <?php
                                                $result = getSeniorPostAllowance($con);
                                                while ($row = mysqli_fetch_array($result)) {
                                                    ?>
                                                    <option value="<?= $row['allow_id'] ?>"><?= $row['allow_title'] ?> | <?= $row['allow_scale'] ?> |<?= $row['allow_value'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="emp_Medical_Allow">Medical Allowance</label>
                                            <select name="emp_Medical_Allow" id="emp_Medical_Allow" class="form-control">
                                                <option value="">Select Medical Allowance </option>
                                                <?php
                                                $result = getMedicalAllowance($con);
                                                while ($row = mysqli_fetch_array($result)) {
                                                    ?>
                                                    <option value="<?= $row['allow_id'] ?>"><?= $row['allow_title'] ?> | <?= $row['allow_scale'] ?> |<?= $row['allow_value'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="emp_Enter_Allow">Entertainment Allowance</label>
                                            <select name="emp_Enter_Allow" id="emp_Enter_Allow" class="form-control">
                                                <option value="">Select Entertainment Allowance </option>
                                                <?php
                                                $result = getEntertainmentAllowance($con);
                                                while ($row = mysqli_fetch_array($result)) {
                                                    ?>
                                                    <option value="<?= $row['allow_id'] ?>"><?= $row['allow_title'] ?> | <?= $row['allow_scale'] ?> |<?= $row['allow_value'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="emp_Special_Allow">Special Allowance</label>
                                            <select name="emp_Special_Allow" id="emp_Special_Allow" class="form-control">
                                                <option value="">Select Special Allowance </option>
                                                <?php
                                                $result = getSpecialAllowance($con);
                                                while ($row = mysqli_fetch_array($result)) {
                                                    ?>
                                                    <option value="<?= $row['allow_id'] ?>"><?= $row['allow_title'] ?> | <?= $row['allow_scale'] ?> |<?= $row['allow_value'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="emp_Spec_Allow21">Special Allowance 2021</label>
                                            <select name="emp_Spec_Allow21" id="emp_Spec_Allow21" class="form-control">
                                                <option value="">Select Special Allowance 2021</option>
                                                <?php
                                                $result = getSpecialAllowance2021($con);
                                                while ($row = mysqli_fetch_array($result)) {
                                                    ?>
                                                    <option value="<?= $row['allow_id'] ?>"><?= $row['allow_title'] ?> | <?= $row['allow_scale'] ?> |<?= $row['allow_value'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="emp_Order_allow">Orderly Allowance</label>
                                            <select name="emp_Order_allow" id="emp_Order_allow" class="form-control">
                                                <option value="">Select Orderly Allowance </option>
                                                <?php
                                                $result = getOrderlyAllowance($con);
                                                while ($row = mysqli_fetch_array($result)) {
                                                    ?>
                                                    <option value="<?= $row['allow_id'] ?>"><?= $row['allow_title'] ?> | <?= $row['allow_scale'] ?> |<?= $row['allow_value'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="emp_Order_allowArrear">Orderly Allowance Arrear w.e.f</label>
                                            <select name="emp_Order_allowArrear" id="emp_Order_allowArrear" class="form-control">
                                                <option value="">Select Orderly Allowance Arrear w.e.f </option>
                                                <?php
                                                $result = getOrderlyAllowanceArrearwef($con);
                                                while ($row = mysqli_fetch_array($result)) {
                                                    ?>
                                                    <option value="<?= $row['allow_id'] ?>"><?= $row['allow_title'] ?> | <?= $row['allow_scale'] ?> |<?= $row['allow_value'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="emp_misc_allow">other Allowance</label>
                                            <select name="emp_misc_allow" id="emp_misc_allow" class="form-control">
                                                <option value="">Select other miscelaneous allowances </option>
                                                <?php
                                                $result = getMisAllowance($con);
                                                while ($row = mysqli_fetch_array($result)) {
                                                    ?>
                                                    <option value="<?= $row['allow_id'] ?>"><?= $row['allow_title'] ?> | <?= $row['allow_scale'] ?> |<?= $row['allow_value'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="emp_fixed_pay">Fixed Basic Pay</label>
                                            <select name="emp_fixed_pay" id="emp_fixed_pay" class="form-control">
                                                <option value="">Select Fixed Basic Pay </option>
                                                <?php
                                                $result = getfixedpay($con);
                                                while ($row = mysqli_fetch_array($result)) {
                                                    ?>
                                                    <option value="<?= $row['allow_id'] ?>"><?= $row['allow_title'] ?> | <?= $row['allow_scale'] ?> |<?= $row['allow_value'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        
                                        
                                        <div class="form-group">
                                            <label for="emp_Teach_allow">Teaching Allowance</label>
                                            <select name="emp_Teach_allow" id="emp_Teach_allow" class="form-control">
                                                <option value="">Select Teaching Allowance </option>
                                                <?php
                                                $result = getTeachingAllowance($con);
                                                while ($row = mysqli_fetch_array($result)) {
                                                    ?>
                                                    <option value="<?= $row['allow_id'] ?>"><?= $row['allow_title'] ?> | <?= $row['allow_scale'] ?> |<?= $row['allow_value'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="emp_Teach_allow21">Teaching Allowance 2021</label>
                                            <select name="emp_Teach_allow21" id="emp_Teach_allow21" class="form-control">
                                                <option value="">Select Teaching Allowance 2021</option>
                                                <?php
                                                $result = getTeachingAllowance21($con);
                                                while ($row = mysqli_fetch_array($result)) {
                                                    ?>
                                                    <option value="<?= $row['allow_id'] ?>"><?= $row['allow_title'] ?> | <?= $row['allow_scale'] ?> |<?= $row['allow_value'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="emp_Comp_allow">Computer Allowance</label>
                                            <select name="emp_Comp_allow" id="emp_Comp_allow" class="form-control">
                                                <option value="">Select Computer Allowance </option>
                                                <?php
                                                $result = getComputerAllowance($con);
                                                while ($row = mysqli_fetch_array($result)) {
                                                    ?>
                                                    <option value="<?= $row['allow_id'] ?>"><?= $row['allow_title'] ?> | <?= $row['allow_scale'] ?> |<?= $row['allow_value'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="emp_BrainDrain_allow">Brain Drain Allowance</label>
                                            <select name="emp_BrainDrain_allow" id="emp_BrainDrain_allow" class="form-control">
                                                <option value="">Select Brain Drain Allowance </option>
                                                <?php
                                                $result = getBrainDrainAllowance($con);
                                                while ($row = mysqli_fetch_array($result)) {
                                                    ?>
                                                    <option value="<?= $row['allow_id'] ?>"><?= $row['allow_title'] ?> | <?= $row['allow_scale'] ?> |<?= $row['allow_value'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>                                    

                                        <div class="form-group">
                                            <label for="emp_ARA16_allow">ARA-2016 Allowance</label>
                                            <select name="emp_ARA16_allow" id="emp_ARA16_allow" class="form-control">
                                                <option value="">Select ARA-2016 Allowance </option>
                                                <?php
                                                $result = getARA2016Allowance($con);
                                                while ($row = mysqli_fetch_array($result)) {
                                                    ?>
                                                    <option value="<?= $row['allow_id'] ?>"><?= $row['allow_title'] ?> | <?= $row['allow_scale'] ?> |<?= $row['allow_value'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="emp_ARA17_allow">ARA-2017 Allowance</label>
                                            <select name="emp_ARA17_allow" id="emp_ARA17_allow" class="form-control">
                                                <option value="">Select ARA-2017 Allowance </option>
                                                <?php
                                                $result = getARA2017Allowance($con);
                                                while ($row = mysqli_fetch_array($result)) {
                                                    ?>
                                                    <option value="<?= $row['allow_id'] ?>"><?= $row['allow_title'] ?> | <?= $row['allow_scale'] ?> |<?= $row['allow_value'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="emp_ARA18_allow">ARA-2018 Allowance</label>
                                            <select name="emp_ARA18_allow" id="emp_ARA18_allow" class="form-control">
                                                <option value="">Select ARA-2018 Allowance </option>
                                                <?php
                                                $result = getARA2018Allowance($con);
                                                while ($row = mysqli_fetch_array($result)) {
                                                    ?>
                                                    <option value="<?= $row['allow_id'] ?>"><?= $row['allow_title'] ?> | <?= $row['allow_scale'] ?> |<?= $row['allow_value'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="emp_ARA19_allow">ARA-2019 Allowance</label>
                                            <select name="emp_ARA19_allow" id="emp_ARA19_allow" class="form-control">
                                                <option value="">Select ARA-2019 Allowance </option>
                                                <?php
                                                $result = getARA2019Allowance($con);
                                                while ($row = mysqli_fetch_array($result)) {
                                                    ?>
                                                    <option value="<?= $row['allow_id'] ?>"><?= $row['allow_title'] ?> | <?= $row['allow_scale'] ?> |<?= $row['allow_value'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="emp_ARA21_allow">ARA-2021 Allowance</label>
                                            <select name="emp_ARA21_allow" id="emp_ARA21_allow" class="form-control">
                                                <option value="">Select ARA-2021 Allowance </option>
                                                <?php
                                                $result = getARA2021Allowance($con);
                                                while ($row = mysqli_fetch_array($result)) {
                                                    ?>
                                                    <option value="<?= $row['allow_id'] ?>"><?= $row['allow_title'] ?> | <?= $row['allow_scale'] ?> |<?= $row['allow_value'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="emp_Wash_allow">Washing Allowance</label>
                                            <select name="emp_Wash_allow" id="emp_Wash_allow" class="form-control">
                                                <option value="">Select Washing Allowance </option>
                                                <?php
                                                $result = getWashingAllowance($con);
                                                while ($row = mysqli_fetch_array($result)) {
                                                    ?>
                                                    <option value="<?= $row['allow_id'] ?>"><?= $row['allow_title'] ?> | <?= $row['allow_scale'] ?> |<?= $row['allow_value'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="emp_Dress_allow">Dressing Allowance</label>
                                            <select name="emp_Dress_allow" id="emp_Dress_allow" class="form-control">
                                                <option value="">Select Dressing Allowance </option>
                                                <?php
                                                $result = getDressingAllowance($con);
                                                while ($row = mysqli_fetch_array($result)) {
                                                    ?>
                                                    <option value="<?= $row['allow_id'] ?>"><?= $row['allow_title'] ?> | <?= $row['allow_scale'] ?> |<?= $row['allow_value'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="emp_Integ_allow">Integrated Allowance</label>
                                            <select name="emp_Integ_allow" id="emp_Integ_allow" class="form-control">
                                                <option value="">Select Integrated Allowance </option>
                                                <?php
                                                $result = getIntegratedAllowance($con);
                                                while ($row = mysqli_fetch_array($result)) {
                                                    ?>
                                                    <option value="<?= $row['allow_id'] ?>"><?= $row['allow_title'] ?> | <?= $row['allow_scale'] ?> |<?= $row['allow_value'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="emp_Extra_allow">Extra Duty Allowance</label>
                                            <select name="emp_Extra_allow" id="emp_Extra_allow" class="form-control">
                                                <option value="">Select Extra Duty Allowance </option>
                                                <?php
                                                $result = getExtraDutyAllowance($con);
                                                while ($row = mysqli_fetch_array($result)) {
                                                    ?>
                                                    <option value="<?= $row['allow_id'] ?>"><?= $row['allow_title'] ?> | <?= $row['allow_scale'] ?> |<?= $row['allow_value'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="emp_allow_submit" id="emp_allow_submit">Submit</button>
                        </div>
                    </form>
                    <!-- /.form -->
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- Employee Deduction modal -->

        <!-- Add Employee Deduction modal -->
        <div class="modal fade" id="empdeduction" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" style="width: 50%;">
                <div class="modal-content">
<!--                    form start -->
                    <form role="form" method="POST" action="employees/emp_home.php">
                        <input type="hidden" id="emp_deduct_id" name="emp_id" value="" />
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Employee Deduction</h4>
                        </div>
                        <div class="modal-body">
                            <div class="box-body">

                                <div class="form-group">
                                    <label for="emp_houserent">House Rent</label>
                                    <select name="emp_houserent" id="emp_houserent" class="form-control">
                                        <option value="">Select House Rent</option>
                                        <?php
                                        $result = getHouseRentdeduct($con);
                                        while ($row = mysqli_fetch_array($result)) {
                                            ?>
                                            <option value="<?= $row['deduct_id'] ?>"><?= $row['deduct_title'] ?> | <?= $row['deduct_scale'] ?> |<?= $row['deduct_value'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label for="emp_RR">Room Rent</label>
                                    <select name="emp_RR" id="emp_RR" class="form-control">
                                        <option value="">Select Room Rent</option>
                                        <?php
                                        $result = getRoomRentdeduct($con);
                                        while ($row = mysqli_fetch_array($result)) {
                                            ?>
                                            <option value="<?= $row['deduct_id'] ?>"><?= $row['deduct_title'] ?> | <?= $row['deduct_scale'] ?> |<?= $row['deduct_value'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label for="emp_watertax">Water Tax</label>
                                    <select name="emp_watertax" id="emp_watertax" class="form-control">
                                        <option value="">Select House Rent</option>
                                        <?php
                                        $result = getWaterTaxdeduct($con);
                                        while ($row = mysqli_fetch_array($result)) {
                                            ?>
                                            <option value="<?= $row['deduct_id'] ?>"><?= $row['deduct_title'] ?> | <?= $row['deduct_scale'] ?> |<?= $row['deduct_value'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="emp_BF">Benevolent Fund</label>
                                    <select name="emp_BF" id="emp_BF" class="form-control">
                                        <option value="">Select Benevolent Fund</option>
                                        <?php
                                        $result = getBenevolentFundduct($con);
                                        while ($row = mysqli_fetch_array($result)) {
                                            ?>
                                            <option value="<?= $row['deduct_id'] ?>"><?= $row['deduct_title'] ?> | <?= $row['deduct_scale'] ?> |<?= $row['deduct_value'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="emp_GPF">GP Fund</label>
                                    <select name="emp_GPF" id="emp_GPF" class="form-control">
                                        <option value="">Select GP Fund</option>
                                        <?php
                                        $result = getGPFdeduct($con);
                                        while ($row = mysqli_fetch_array($result)) {
                                            ?>
                                            <option value="<?= $row['deduct_id'] ?>"><?= $row['deduct_title'] ?> | <?= $row['deduct_scale'] ?> |<?= $row['deduct_value'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label for="emp_GPF_advanced">GPF Advanced</label>
                                    <select name="emp_GPF_advanced" id="emp_GPF_advanced" class="form-control">
                                        <option value="">Select GPF Advanced</option>
                                        <?php
                                        $result = getGPFAdvaceddeduct($con);
                                        while ($row = mysqli_fetch_array($result)) {
                                            ?>
                                            <option value="<?= $row['deduct_id'] ?>"><?= $row['deduct_title'] ?> | <?= $row['deduct_scale'] ?> |<?= $row['deduct_value'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label for="emp_upkeep">Up Keep</label>
                                    <select name="emp_upkeep" id="emp_upkeep" class="form-control">
                                        <option value="">Select Up Keep</option>
                                        <?php
                                        $result = getUpKeepdeduct($con);
                                        while ($row = mysqli_fetch_array($result)) {
                                            ?>
                                            <option value="<?= $row['deduct_id'] ?>"><?= $row['deduct_title'] ?> | <?= $row['deduct_scale'] ?> |<?= $row['deduct_value'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="emp_GI">Group Insurance</label>
                                    <select name="emp_GI" id="emp_GI" class="form-control">
                                        <option value="">Select Group Insurance</option>
                                        <?php
                                        $result = getGroupInsurancededuct($con);
                                        while ($row = mysqli_fetch_array($result)) {
                                            ?>
                                            <option value="<?= $row['deduct_id'] ?>"><?= $row['deduct_title'] ?> | <?= $row['deduct_scale'] ?> |<?= $row['deduct_value'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="emp_Trans">Transportation </label>
                                    <select name="emp_Trans" id="emp_Trans" class="form-control">
                                        <option value="">Select Transportation </option>
                                        <?php
                                        $result = getTransportationdeduct($con);
                                        while ($row = mysqli_fetch_array($result)) {
                                            ?>
                                            <option value="<?= $row['deduct_id'] ?>"><?= $row['deduct_title'] ?> | <?= $row['deduct_scale'] ?> |<?= $row['deduct_value'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label for="emp_HB">House Building </label>
                                    <select name="emp_HB" id="emp_HB" class="form-control">
                                        <option value="">Select House Building </option>
                                        <?php
                                        $result = gethousebuildingdeduct($con);
                                        while ($row = mysqli_fetch_array($result)) {
                                            ?>
                                            <option value="<?= $row['deduct_id'] ?>"><?= $row['deduct_title'] ?> | <?= $row['deduct_scale'] ?> |<?= $row['deduct_value'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                
                                  <div class="form-group">
                                    <label for="emp_Incometax">Income Tax </label>
                                    <select name="emp_Incometax" id="emp_Incometax" class="form-control">
                                        <option value="">Select Income Tax </option>
                                        <?php
                                        $result = getIncomeTax($con);
                                        while ($row = mysqli_fetch_array($result)) {
                                            ?>
                                            <option value="<?= $row['deduct_id'] ?>"><?= $row['deduct_title'] ?> | <?= $row['deduct_scale'] ?> |<?= $row['deduct_value'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label for="emp_misc_deduct">Misc </label>
                                    <select name="emp_misc_deduct" id="emp_misc_deduct" class="form-control">
                                        <option value="">Select Misc </option>
                                        <?php
                                        $result = getotherdeduction($con);
                                        while ($row = mysqli_fetch_array($result)) {
                                            ?>
                                            <option value="<?= $row['deduct_id'] ?>"><?= $row['deduct_title'] ?> | <?= $row['deduct_scale'] ?> |<?= $row['deduct_value'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="emp_deduct_submit" id="emp_deduct_submit">Submit</button>
                        </div>
                    </form>
                    <!--                     /.form -->
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- ./wrapper -->

        <!-- ./wrapper -->
        <script>
            $.widget.bridge('uibutton', $.ui.button);
        </script>

        <!-- Morris.js charts -->
        <script src="assets/bower_components/raphael/raphael.min.js"></script>
        <script src="assets/bower_components/morris.js/morris.min.js"></script>
        <!-- Sparkline -->
        <script src="assets/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
        <!-- jvectormap -->
        <script src="assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
        <script src="assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
        <!-- jQuery Knob Chart -->
        <script src="assets/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
        <!-- daterangepicker -->
        <script src="assets/bower_components/moment/min/moment.min.js"></script>
        <script src="assets/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
        <!-- datepicker -->
        <script src="assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
        <!-- Bootstrap WYSIHTML5 -->
        <script src="assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
        <!-- Slimscroll -->
        <script src="assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>

        <!-- DataTables -->
        <script src="assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
        <!-- FastClick -->
        <script src="assets/bower_components/fastclick/lib/fastclick.js"></script>
        <!-- AdminLTE App -->
        <script src="assets/dist/js/adminlte.min.js"></script>
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="assets/dist/js/pages/dashboard.js"></script>
        <!-- Select2 -->

        <!-- AdminLTE for demo purposes -->
        <script src="assets/dist/js/demo.js"></script>
        <!-- sweet alert msg -->
        <script src="assets/js/sweetalert.min.js"></script>
        <script src="assets/bower_components/select2/dist/js/select2.full.min.js"></script>

        <!-- Select multiple option  -->

        <?php if (isset($_SESSION['operation']) && $_SESSION['operation'] == "success") { ?>
            <script>////swal({
            ////                    title: "Record Added Successfully!",
            ////                    icon: "success",
            //////                    button: "OK!",
            //                });
            </script>
            <?php
            // $_SESSION['operation'] = "";
        } elseif (isset($_SESSION['operation']) && $_SESSION['operation'] == "failed") {
            ?>
            <script>//swal({
                //                    title: "Record Adding Failed!",
                //                    icon: "error",
                //                    button: "OK!",
                //                });
            </script>
            <?php
            //$_SESSION['operation'] = "";
        }
        ?>



        <script>
            $(function () {
                $('#example1').DataTable()
                $('#example2').DataTable({
                    'paging': true,
                    'lengthChange': false,
                    'searching': false,
                    'ordering': true,
                    'info': true,
                    'autoWidth': false
                })
            })

        </script>
    </body>
</html>
<?php unset($_SESSION['message']); ?>