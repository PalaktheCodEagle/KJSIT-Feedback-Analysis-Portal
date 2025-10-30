<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
error_reporting(0);
if (!isset($_SESSION['adminid']) && !isset($_SESSION['parentid'])) {
    echo "<script>window.location='index.php';</script>";
}
include "database.php";
if (isset($_SESSION['adminid'])) {
    $sqladmin = "SELECT * FROM admin WHERE schoolheadmasterid='$_SESSION[adminid]'";
    $qsqladmin = mysqli_query($con, $sqladmin);
    $rsadmin = mysqli_fetch_array($qsqladmin);
}
if (isset($_SESSION['parentid'])) {
    $sqlparent = "SELECT * FROM parent WHERE parentid='$_SESSION[parentid]'";
    $qsqlparent = mysqli_query($con, $sqlparent);
    $rsparent = mysqli_fetch_array($qsqlparent);
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Parent Panel - Parent Feedback System..</title>
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

                <?php
/*
<li class="nav-item d-none d-sm-inline-block">
<a href="#" class="nav-link">Contact</a>
</li>
 */
?>
            </ul>
            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">



                <li class="nav-item dropdown btn-info">
                    <a class="nav-link" data-toggle="dropdown" href="#"
                        style="color: #001C30 ; background-color: white ">
                        <i class="fa fa-suitcase"></i> <b>My Account </b> &nbsp; <i class="fas fa-angle-left right"
                            style="transform: rotate(-90deg);"></i>
                    </a>

                    <?php
if (isset($_SESSION['parentid'])) {
    ?>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <div class="dropdown-divider"></div>
                        <a href="parentprofile.php" class="dropdown-item">
                            <i class="fas fa-address-book"></i> My Profile
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="parentchangepassword.php" class="dropdown-item">
                            <i class="fas fa fa-unlock-alt"></i> Change Password
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="parentlogout.php" class="dropdown-item">
                            <i class="fa fa-window-close"></i> Logout
                        </a>
                    </div>
                    <?php
}
?>

                </li>

            </ul>
        </nav>
        <!-- /.navbar -->