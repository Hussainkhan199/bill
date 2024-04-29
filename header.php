
  <header class="main-header">
    <!-- Logo -->
    <a href="home.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b>MIS</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="assets/images/admin_icon.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs">Pay Bill Admin</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                  <img src="assets/images/admin_icon.jpg" class="img-circle" alt="User Image">
                <p>
                  Pay Bill Admin
                  <small>2024</small>
                </p>
              </li>
              <!-- Menu Body -->
             
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="user/userHome.php" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
            <img src="assets/images/admin_icon.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Pay Bill Admin</p>
          
        </div>
      </div>
      
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header" >Main Module</li>
        
          
        <li class="active"><a href="home.php"><i class="fa fa-circle-o"></i> Dashboard</a></li>
        <li><a href="employees/emp_home.php"><i class="fa fa-users"></i> Employees</a></li>              
        <!-- <li><a href="allownces/allow_home.php"><i class="fa fa-credit-card"></i> Allowances</a></li> -->
          <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Allowances</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
                
            </span>
          </a>
          <ul class="treeview-menu">             
            <li><a href="basicpay/bp_home.php"><i class="fa fa-money"></i> Basic Pay</a></li>
            <li><a href="allownces/allow_home.php"><i class="fa fa-credit-card"></i> other Allowances</a></li>
          </ul>
        </li>
        <li><a href="departments/dept_home.php"><i class="fa fa-building"></i> Departments</a></li>
        <li><a href="deduction/deduct_home.php"><i class="fa fa-money"></i> Deduction</a></li>
        <li><a href="payslip/payslipHome.php"><i class="fa fa-file-text-o"></i> PaySlip</a></li>
        <li><a href="user/userHome.php"><i class="fa fa-user"></i> Users</a></li>
             
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
