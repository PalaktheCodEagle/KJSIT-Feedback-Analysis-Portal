<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Panel - Feedback System </title>
    <link rel="shortcut icon" href="FAVICON1.png" type="image/x-icon">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <link rel="stylesheet" href="plugins/datatables/jquery.dataTables.min.js">
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <style>
    /*Be sure to look into browser prefixes for keyframes and annimations*/
    .flash {
        animation-name: flash;
        animation-duration: 0.2s;
        animation-timing-function: linear;
        animation-iteration-count: infinite;
        animation-direction: alternate;
        animation-play-state: running;
    }

    .navbar-white {
        background-color: #9b2928 !important;
    }

    .dropdown-item {
        color: #001c30;
    }

    .os-content {
        background-color: #001c30;
    }

    .brand-link {
        background-color: #001c30;
    }

    .brand-text {
        color: white;
        font-weight: bolder;
    }

    [class*="sidebar-dark-"] .sidebar a {
        color: white;
    }

    p {
        color: white;
    }

    .card-header {
        background-color: #9b2928;
        color: white;
    }

    .card-title {
        text-transform: uppercase;
        font-weight: bold;
    }

    th {
        color: #9b2928;
        /* display:flex;
        flex-direction:row */
        align-items: center;
        justify-content: center;
    }

    .table th {
        background-color: #FFC4C4;
        /* text-align:center; */
    }

    .table td {
        background-color: #FFECEC;
        /* text-align:center; */
    }

    .table-bordered td,
    .table-bordered th {
        border: 1px solid #9b2928;
    }

    .table {
        /* /vertical-align: bottom;/ */
        border: 2px solid #9b2928;
    }

    .table thead th {
        vertical-align: bottom;
        border-bottom: 1px solid #9b2928;
    }

    .table td a {
        color: #9B2928;
        font-weight: bolder;
    }

    @keyframes flash {
        from {
            color: red;
        }

        to {
            color: black;
        }
    }

    .errmsg {
        display: none;
    }
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"
                            style="color: white;"></i></a>
                </li>
            </ul>
            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">


                <!-- Messages Dropdown Menu -->

                <li class="nav-item dropdown btn-info">
                    <a class="nav-link" data-toggle="dropdown" href="#"
                        style="color: #001C30 ; background-color: white ">
                        <i class="fa fa-suitcase"></i> <b>My Account </b> &nbsp; <i class="fas fa-angle-left right"
                            style="transform: rotate(-90deg)"></i>
                    </a>

                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <div class="dropdown-divider"></div>
                        <a href="adminprofile.php" class="dropdown-item">
                            <i class="fas fa-address-book"></i> My Profile
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="adminchangepassword.php" class="dropdown-item">
                            <i class="fas fa fa-unlock-alt"></i> Change Password
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="adminlogout.php" class="dropdown-item">
                            <i class="fa fa-window-close"></i> Logout
                        </a>
                    </div>

                </li>

            </ul>
        </nav>
        <!-- /.navbar -->
        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="admindashboard.php" class="brand-link">
                <img src="FAVICON1.png" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Feedback Portal</span>
            </a>
            <!-- Sidebar -->
            <div class="sidebar" style="color:#9B2928">

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               <br /> with font-awesome or any other icon font library -->

                        <li class="nav-item has-treeview">
                            <a href="admindashboard.php" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>


                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-table"></i>
                                <p>Feedback
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="feedbacktopicadmin.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>New Feedback Topic</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="viewfeedbacktopicadmin.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>View Feedbacks Topics</p>
                                    </a>
                                </li>
                            </ul>
                        </li>




                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fa fa-user-circle"></i>
                                <p>
                                    Employee
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <!-- <li class="nav-item">
                  <a href="employee.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add employee</p>
                  </a>
                </li> -->
                                <li class="nav-item">
                                    <a href="viewemployee.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>View employee</p>
                                    </a>
                                </li>
                            </ul>
                        </li>




                        <!--
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-table"></i>
                <p>
                  employee
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="employee1.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add employee</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="viewemployee1.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>View employee</p>
                  </a>
                </li>
              </ul>
            </li> -->






                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-table"></i>
                                <p>
                                    Course
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="course.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add Course</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="viewcourse.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>View Course</p>
                                    </a>
                                </li>
                            </ul>
                        </li>


                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fa fa-lock"></i>
                                <p>
                                    Admin
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="admin.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add Admin</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="viewadmin.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>View Admin</p>
                                    </a>
                                </li>
                            </ul>
                        </li>



                        <li class="nav-item has-treeview">
                            <a href="view.php" class="nav-link" target="_blank">
                                <i class="nav-icon fas fa-table"></i>
                                <p>
                                    Submission Status
                                    <!--<i class="fas fa-angle-left right"></i>-->
                                </p>
                            </a>
                        </li>

                        <li class="nav-item has-treeview">
                            <a href="viewanalysisreport.php" class="nav-link">
                                <i class="nav-icon fas fa-table"></i>
                                <p>
                                    Analysis Report
                                    <!--<i class="fas fa-angle-left right"></i>-->
                                </p>
                            </a>
                        </li>



                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside> <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <br>
            <!-- Main content -->
            <section class="content">
                <form method="post" action="">
                    <!-- Default box -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">View Analysis Report</h3>
                        </div>
                        <div class="card-body">
                            <table id="myTable" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Feedback Topic</th>
                                        <th>Report Link</th>
                                    </tr>
                                </thead>
                                <!-- <tbody>
                  <tr>
                    <td>employee Feedback on Curriculum Overall</td>
                    <td><a href="https://app.powerbi.com/reportEmbed?reportId=ea835c9e-61f4-477b-b233-d0060a667639&autoAuth=true&ctid=a64aeab6-f01b-462b-aa9c-44546386ff31" target="_blank">Click Here</a></td>
                  </tr>
                  <tr>
                    <td>employee Feedback on Curriculum Department wise</td>
                    <td><a href="https://app.powerbi.com/reportEmbed?reportId=05ff6cfd-2512-4b16-892e-65c014754c3e&autoAuth=true&ctid=a64aeab6-f01b-462b-aa9c-44546386ff31" target="_blank">Click Here</a></td>
                  </tr>
                  <tr>
                    <td>employee Satisfaction Survey (SSS)</td>
                    <td><a href="https://app.powerbi.com/reportEmbed?reportId=f2800b51-e43b-405f-95f3-0da1e693b8d8&autoAuth=true&ctid=a64aeab6-f01b-462b-aa9c-44546386ff31" target="_blank">Click Here</a></td>
                  </tr>
                  <tr>
                    <td>Program Exit Survey- Comps (To be filled by LY employees)</td>
                    <td><a href="https://app.powerbi.com/reportEmbed?reportId=baec4fe8-0955-44be-9e6b-b389631d8a19&autoAuth=true&ctid=a64aeab6-f01b-462b-aa9c-44546386ff31" target="_blank">Click Here</a></td>
                  </tr>
                  <tr>
                    <td>Program Exit Survey- IT (To be filled by LY employees)</td>
                    <td><a href="https://app.powerbi.com/reportEmbed?reportId=b41ac6d5-32e5-412e-be40-ef32a27f6d91&autoAuth=true&ctid=a64aeab6-f01b-462b-aa9c-44546386ff31" target="_blank">Click Here</a></td>
                  </tr>
                  <tr>
                    <td>Program Exit Survey- ETRX (To be filled by LY employees)</td>
                    <td><a href="https://app.powerbi.com/reportEmbed?reportId=4f38d26c-4632-46b8-9030-61845e4cb2e7&autoAuth=true&ctid=a64aeab6-f01b-462b-aa9c-44546386ff31">Click
                        Here</a></td>
                  </tr>
                  <tr>
                    <td>Program Exit Survey- EXTC (To be filled by LY studunts)</td>
                    <td><a href="https://app.powerbi.com/reportEmbed?reportId=2f482446-57af-4c51-a368-d4334fe3af75&autoAuth=true&ctid=a64aeab6-f01b-462b-aa9c-44546386ff31">Click
                        Here</a></td>
                  </tr>
                </tbody> -->
                            </table>
                        </div>
                        <!-- /.card-body -->

                    </div>
                    <!-- /.card -->
                </form>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer"
            style="display: flex; flex-direction: column; align-items: center; justify-content: center; background-color:#9b2928">

            <!--<strong>Copyright &copy; <?php echo date("Y"); ?> <a href="">Student Feedback System</a>.</strong> All rights reserved.-->
            <strong style="color:white;"> Department of Computer Engineering</strong>
            <strong style="color:white;">Guided by : Prof. Jyoti Wadmare</strong>
            <strong style="color:white;">Developed by : Dakshita Kolte, Kapil Bhatia,</strong>
            <strong style="color:white;"> Palak Desai and Kartikeya Dangat</strong>
        </footer>
        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
    $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="plugins/moment/moment.min.js"></script>
    <script src="plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="dist/js/pages/dashboard.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>


    <script src="dist/js/pages/dashboard3.js"></script>
</body>

</html>
<script src="js/jquery.dataTables.min.js"></script>
<script>
$(document).ready(function() {
    $('#myTable').DataTable();
});
</script>
<script>
function validatedel() {
    if (confirm("Are you sure want to delete this record?") == true) {
        return true;
    } else {
        return false;
    }
}
</script>