<?php
include("header.php");
include("sidebar.php");
if (isset($_POST['submit'])) {
    $sql = "UPDATE faculty SET password='$_POST[npassword]' WHERE facultyid='$_SESSION[facultyid]' and password='$_POST[opassword]'";
    $qsql = mysqli_query($con, $sql);
    echo mysqli_error($con);
    if (mysqli_affected_rows($con) == 1) {
        echo "<script>alert('Faculty password Updated successfully...');</script>";
        echo "<script>window.location='facultychangepassword.php';</script>";
    } else {
        echo "<script>alert('Entered password is not valid...');</script>";
    }
}
?>
<style>
.card-header {
    background-color: #9b2928;
    color: white;
}

.col-md-3 {
    color: #9b2928;
    font-weight: bolder;
}

.card {
    background-color: #FFECEC;
}

.btn-primary {
    color: #fff;
    background-color: #9b2928;
    border-color: #9b2928;
    box-shadow: none;
}

.btn-primary:hover {
    background-color: #630606;
    border-color: #630606;
}

.card-title {
    text-transform: uppercase;
    font-weight: bold;
}
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <br>
    <!-- Main content -->
    <section class="content">
        <form method="post" action="" enctype="multipart/form-data">
            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Faculty Password</h3>
                </div>
                <div class="card-body">


                    <div class="row">
                        <div class="col-md-3">Old Password</div>
                        <div class="col-md-5">
                            <input type="Password" class="form-control" name="opassword" id="opassword">
                        </div>
                        <div class="col-md-4"></div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-3">New Password</div>
                        <div class="col-md-5">
                            <input type="Password" class="form-control" name="npassword" id="npassword">
                        </div>
                        <div class="col-md-4"></div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-3">Confirm New Password</div>
                        <div class="col-md-5">
                            <input type="Password" class="form-control" name="cpassword" id="cpassword">
                        </div>
                        <div class="col-md-4"></div>
                    </div>
                    <br>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">

                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-5">
                            <input class="form-control btn btn-primary" type="submit" name="submit" id="submit"
                                value="Submit">
                        </div>
                        <div class="col-md-4"></div>
                    </div>
                </div>
                <!-- /.card-footer-->
            </div>
            <!-- /.card -->
        </form>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php
include("footer.php");
?>


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