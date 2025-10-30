<?php
include "header.php";
include "sidebar.php";
?>
<style>
 h3{
        text-align:center;
    }
    p{
        text-align:center;
    }
    .content-wrapper {
  background: linear-gradient(#E4DCCF, white);

    }
    </style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark" style="color:#001C30 !important; font-weight:bold">Dashboard - Faculty Feedback System</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">

                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">



            <!-- Small boxes (Stat box) -->
            <div class="row">


                <!-- ./col -->
                <div class="col-lg-4 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success" style="background-color:#005baa !important; box-shadow: 5px 10px #CFD2CF;">
                        <div class="inner">
                            <h3>
                                <?php
$sql = "SELECT * FROM `feedbacktopic` WHERE course_id in ( ( select course_id from faculty where facultyid = '$_SESSION[facultyid]' ), ( select course_id from course where course_title = 'All' ) );";
$qsql = mysqli_query($con, $sql);
echo $tot = mysqli_num_rows($qsql);
?>
                            </h3>
                            <p>Total Number of Feedback Topics</p>
                        </div>
                        <!-- <div class="icon">
                            <i class="fa fa-question"></i>
                        </div> -->
                    </div>
                </div>



                <!-- ./col -->
                <div class="col-lg-4 col-6">
                    <!-- small box -->
                    <div class="small-box bg-primary" style="background-color:#005baa !important; box-shadow: 5px 10px #CFD2CF;">
                        <div class="inner">
                            <h3><?php
$sql = "SELECT * FROM feedbackquestion_result WHERE facultyid='$_SESSION[facultyid]' GROUP BY date";
$qsql = mysqli_query($con, $sql);
echo $ans = mysqli_num_rows($qsql);
?></h3>
                            <p>Feedbacks answered</p>
                        </div>
                        <!-- <div class="icon">
                            <i class="fa fa-question-circle"></i>
                        </div> -->
                    </div>
                </div>


                <!-- ./col -->
                <div class="col-lg-4 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger" style="background-color:#005baa !important; box-shadow: 5px 10px #CFD2CF;">
                        <div class="inner">
                            <h3><?php
echo $tot - $ans;
?></h3>
                            <p>Feedbacks Unanswered</p>
                        </div>
                        <!-- <div class="icon">
                            <i class="fa fa-question-circle"></i>
                        </div> -->
                    </div>
                </div>



                <!-- ./col -->
            </div>
            <!-- /.row -->





        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php
include "footer.php";
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