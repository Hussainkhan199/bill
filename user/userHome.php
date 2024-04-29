<?php
include_once '../connect_db.php';
include_once '../functions.php';
if (!isset($_SESSION['user_id'])) {
    header("Location:index.php");
}
if (isset($_POST['submit_user'])) {
    $user_name = $_POST['user_name'];
    $user_email = $_POST['user_email'];
    echo $user_password = md5($_POST['user_password']);
    $user_role = $_POST['user_role'];

    addUser($con, $user_name, $user_email, $user_password, $user_role);
}

if (isset($_POST['user_update'])) {

    $user_id = $_POST['user_id'];
    $user_name = $_POST['user_name'];
    $user_email = $_POST['user_email'];
    $user_password = md5($_POST['user_password']);
    $user_role = $_POST['user_role'];
    updateUser($con, $user_id, $user_name, $user_email, $user_password, $user_role);
}
$result = getUsers($con);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>User| Pay Bill MIS</title>
    <base href="http://localhost/paybill/" target="_self">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="assets/bower_components/Ionicons/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="assets/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="assets/dist/css/skins/_all-skins.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <script src="assets/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="assets/bower_components/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <!-- Bootstrap 3.3.7 -->
    <script src="assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script>
        // ajax call for update   
        $(document).ready(function() {
            $('.update_link').click(function(event) {
                event.preventDefault();
                $.ajax({
                    url: $(this).attr('href'),
                    dataType: "JSON",
                    success: function(response) {
                        $('#modal-update').modal('show');
                        // alert(response.emp_name and others);
                        $('#update_user_id').val(response.user_id);
                        $('#update_user_name').val(response.user_name);
                        $('#update_user_email').val(response.user_email);
                        $('#update_user_password').val(response.user_password);
                        $('#update_user_role').val(response.user_role);

                    }
                });
                return false; // for good measure
            });
        });
    </script>

</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">


        <!-- header and aside code-->

        <?php include_once '../header.php'; ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    User
                </h1>
                <ol class="breadcrumb">
                    <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="#">Tables</a></li>
                    <li class="active">User</li>
                </ol>
            </section>

            <!-- Main content -->



            <section class="content">
                <div class="row">
                    <div class="col-xs-12">

                        <div class="box">
                            <div class="box-header">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                    Add New User
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">

                                            <div class="modal-body">

                                                <!-- general form elements -->
                                                <!-- /.box-header -->
                                                <!-- form start -->
                                                <form role="form" action="user/userHome.php" method="POST">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span></button>
                                                        <h4 class="modal-title">Add User</h4>
                                                    </div>
                                                    <div class="box-body">
                                                        <div class="form-group">
                                                            <label for="user_name">Name</label>
                                                            <input type="text" class="form-control" id="user_name" name="user_name" placeholder="Enter Name">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="user_email">Email</label>
                                                            <input type="text" class="form-control" id="user_email" name="user_email" placeholder="Enter Email">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="user_password">Password</label>
                                                            <input type="password" class="form-control" id="user_password" name="user_password" placeholder="Enter Password">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="user_role">Role</label>
                                                            <input type="text" class="form-control" id="user_role" name="user_role" placeholder="Enter Role">
                                                        </div>

                                                    </div>
                                                    <!-- /.box-body -->
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary" name="submit_user" id="submit_user">Submit</button>
                                                    </div>
                                                </form>

                                                <!-- /.box -->

                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>

                            <!-- /.box-header -->
                            <div class="box-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>Edit</th>
                                            <th>Delete</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php while ($row = mysqli_fetch_array($result)) { ?>
                                            <tr>
                                                <td><?= $row['user_id'] ?></td>
                                                <td><?= $row['user_name'] ?></td>
                                                <td><?= $row['user_email'] ?></td>
                                                <td><?= $row['user_role'] ?></td>
                                                <td><a href="user/getUser.php?user_id=<?= $row['user_id'] ?>" class="update_link text-success" data-target="#edituser"><button><i class="fa fa-edit"></i></button></a></td>
                                                <td><a href="user/deleteUser.php?user_id=<?= $row['user_id'] ?>" class="text-danger" onClick="return confirm('Arer you sure to delete the record')"><button><i class="fa fa-trash-o"></i></button></a></td>
                                                
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>


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

        <!-- Add the sidebar's background. This div must be placed
                 immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->

    <!--<div class="modal fade" id="editEmployee">-->
    <div class="modal fade" id="modal-update" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- form start -->
                <form role="form" method="post" action="user/userHome.php">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Update User</h4>
                    </div>
                    <div class="modal-body">
                        <div class="box-body">
                            <input type="hidden" id="update_user_id" name="user_id" value="">
                            <div class="form-group">
                                <label for="update_user_name">Name</label>
                                <input type="text" class="form-control" id="update_user_name" name="user_name" value="">
                            </div>
                            <div class="form-group">
                                <label for="update_user_email">Email</label>
                                <input type="text" class="form-control" id="update_user_email" name="user_email" value="">
                            </div>

                            <div class="form-group">
                                <label for="update_user_password">Password</label>
                                <input type="text" class="form-control" id="update_user_password" name="user_password" value="">
                            </div>
                            <div class="form-group">
                                <label for="update_user_role">Role</label>
                                <input type="text" class="form-control" id="update_user_role" name="user_role" value="">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="user_update" id="user_update">Update</button>
                    </div>
                </form>
                <!-- /.form -->
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.add modal -->
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