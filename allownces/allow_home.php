<?php
include_once '../connect_db.php';
include_once '../functions.php';
if (!isset($_SESSION['user_id'])) {
    header("Location:index.php");
}
if (isset($_POST['submit_allow'])) {
    $allow_title = $_POST['allow_title'];
    $allow_type = $_POST['allow_type'];
    $allow_scale = $_POST['allow_scale'];
    $allow_value = $_POST['allow_value'];
    $allow_max_limit = $_POST['allow_max_limit'];

    addAllowance($con, $allow_title, $allow_type, $allow_scale, $allow_value, $allow_max_limit);
}

if (isset($_POST['allow_update'])) {
    $allow_id = $_POST['allow_id'];
    $allow_title = $_POST['allow_title'];
    $allow_type = $_POST['allow_type'];
    $allow_scale = $_POST['allow_scale'];
    $allow_value = $_POST['allow_value'];
    $allow_max_limit = $_POST['allow_max_limit'];
    updateAllowance($con, $allow_id, $allow_title, $allow_type, $allow_scale, $allow_value, $allow_max_limit);
}
$result = getAllowances($con);
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
        $(document).ready(function() {
            $('.update_link').click(function(event) {
                event.preventDefault();
                $.ajax({
                    url: $(this).attr('href'),
                    dataType: "JSON",
                    success: function(response) {
                        $('#modal-update').modal('show');
                        $('#update_allow_id').val(response.allow_id);
                        $('#update_allow_title').val(response.allow_title);
                        $('#update_allow_type').val();
                        if(response.allow_type=="Fixed"){
                            $('#update_allow_type_fixed').attr('checked', 'checked');
                        }else if(response.allow_type=="Current"){
                            $('#update_allow_type_current').attr('checked', 'checked');
                        }else if(response.allow_type=="Initial"){
                            $('#update_allow_type_initial').attr('checked', 'checked');
                        }
                        
//                        $('#update_allow_type').val(response.allow_type);
                        $('#update_allow_scale').val(response.allow_scale);
                        $('#update_allow_value').val(response.allow_value);
                        $('#update_allow_max_limit').val(response.allow_max_limit);

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
                    Allowances
                </h1>
                <ol class="breadcrumb">
                    <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="allownces/allow_home.php">Allowance</a></li>
                    <li class="active">other Allowance</li>
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
                                    Add New Allowance
                                </button>


                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">

                                            <div class="modal-body">

                                                <!-- general form elements -->
                                                <!-- /.box-header -->
                                                <!-- form start -->
                                                <form role="form" action="allownces/allow_home.php" method="POST">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span></button>
                                                        <h4 class="modal-title">Add Allowance</h4>
                                                    </div>
                                                    <div class="box-body">
                                                        <div class="form-group">
                                                            <label for="allow_title">Title</label>
                                                            <input type="text" class="form-control" id="allow_title" name="allow_title" placeholder="Enter Title">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="allow_type">Type :</label><br>
                                                            <input type="radio" id="allow_type" name="allow_type" value="Fixed"/>FIXED
                                                            <input type="radio" id="allow_type" name="allow_type" value="Current"/>CURRENT
                                                            <input type="radio" id="allow_type" name="allow_type" value="Initial"/>INITIAL<br>
<!--
                                                            <label for="allow_type">Type</label>
                                                            <input type="radio-inline" class="form-control" id="allow_type" name="allow_type" placeholder="Enter type">
-->
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="allow_scale">scale</label>
                                                            <input type="text" class="form-control" id="allow_scale" name="allow_scale" placeholder="Enter scale">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="allow_value">Value</label>
                                                            <input type="text" class="form-control" id="allow_value" name="allow_value" placeholder="Enter value">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="allow_max_limit">Max_Limit</label>
                                                            <input type="text" class="form-control" id="allow_max_limit" name="allow_max_limit" placeholder="Enter maximum limit">
                                                        </div>

                                                    </div>
                                                    <!-- /.box-body -->
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary" name="submit_allow" id="submit_allow">Submit</button>
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
                                            <th>Title</th>
                                            <th>Type</th>
                                            <th>Scale</th>
                                            <th>Value</th>
                                            <th>Max_Limit</th>
                                            <th>Edit</th>
                                            <th>Delete</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php while ($row = mysqli_fetch_array($result)) { ?>
                                            <tr>
                                                <td><?= $row['allow_title'] ?></td>
                                                <td><?= $row['allow_type'] ?></td>
                                                <td><?= $row['allow_scale'] ?></td>
                                                <td><?= $row['allow_value'] ?></td>
                                                <td><?= $row['allow_max_limit'] ?></td>
                                                <td><a href="allownces/getAllowance.php?allow_id=<?= $row['allow_id'] ?>" class="update_link text-success" data-target="#editAllowance"><button class="btn  btn-success"><i class="fa fa-edit"></i></button></a></td>
                                                <td><a href="allownces/deleteAllowance.php?allow_id=<?= $row['allow_id'] ?>" class="text-danger" onClick="return confirm('Arer you sure to delete the record')"><button class="btn  btn-danger"><i class="fa fa-trash-o"></i></button></a></td>
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
                <form role="form" method="post" action="allownces/allow_home.php">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Update Allowance</h4>
                    </div>
                    <div class="modal-body">
                        <div class="box-body">
                            <input type="hidden" id="update_allow_id" name="allow_id" value="">
                            <div class="form-group">
                                <label for="update_allow_title">Title</label>
                                <input type="text" class="form-control" id="update_allow_title" name="allow_title" value="">
                            </div>
                            <div class="form-group">
                                <label for="update_allow_type">Type</label><br>
                        <input type="radio" id="update_allow_type_fixed" name="allow_type" value="Fixed"/>FIXED
                        <input type="radio" id="update_allow_type_current" name="allow_type" value="Current"/>CURRENT
                        <input type="radio" id="update_allow_type_initial" name="allow_type" value="Initial"/>INITIAL<br>
                                
<!--
                                <label for="update_allow_type">Type</label>
                                <input type="text" class="form-control" id="update_allow_type" name="allow_type" value="">
-->
                            </div>

                            <div class="form-group">
                                <label for="update_allow_scale">Scale</label>
                                <input type="text" class="form-control" id="update_allow_scale" name="allow_scale" value="">
                            </div>
                            <div class="form-group">
                                <label for="update_allow_value">Value</label>
                                <input type="text" class="form-control" id="update_allow_value" name="allow_value" value="">
                            </div>

                            <div class="form-group">
                                <label for="update_allow_max_limit">allow_max_limit</label>
                                <input type="text" class="form-control" id="update_allow_max_limit" name="allow_max_limit" value="">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="allow_update" id="allow_update">Update</button>
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
        <!-- AdminLTE for demo purposes -->
        <script src="assets/dist/js/demo.js"></script>
        <!-- sweet alert msg -->
        <script src="assets/js/sweetalert.min.js"></script>

       
<!--<script src="assets/plugins/jquery/jquery.min.js"></script>-->
<!-- Bootstrap 4 -->
<!--<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>-->
<!-- DataTables  & Plugins -->
<!--
<script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="assets/plugins/jszip/jszip.min.js"></script>
<script src="assets/plugins/pdfmake/pdfmake.min.js"></script>
<script src="assets/plugins/pdfmake/vfs_fonts.js"></script>
<script src="assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
-->
<!-- AdminLTE App -->
<!--
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
-->

    
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