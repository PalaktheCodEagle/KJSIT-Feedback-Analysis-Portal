<?php
include "header.php";
include "sidebar.php";
unset($_SESSION['feedbacktopicid']);
unset($_SESSION['date']);
if (isset($_GET['feedbacktopicid'])) {
    $sqledit = "SELECT * FROM feedbacktopic where feedbacktopicid='$_GET[feedbacktopicid]'";
    $qsqledit = mysqli_query($con, $sqledit);
    $rsedit = mysqli_fetch_array($qsqledit);
    //######
    $sqlparent = "SELECT * FROM parent WHERE parentid='$_GET[parentid]'";
    $qsqlparent = mysqli_query($con, $sqlparent);
    $rsparent = mysqli_fetch_array($qsqlparent);
    //######
}
?>
<style>
.align {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px;
}

.print-only {
    display: none;

}

@media print {
    .print-only {
        display: flex;
        flex-direction: row;
        align-items: center;
    }
}

.page-break {
    page-break-after: always;
}

.footer {
    position: fixed;
    bottom: 0;
    width: 100%;
    text-align: center;
    font-size: 12px;
    font-style: italic;
    color: #999;
}

.answercomment {
    background-color: rgba(0, 0, 0, 0.2);
    color: white;
    white-space: nowrap;
    position: absolute;
    right: 10px;
    top: 10px;
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
    /* align-items: center;
        justify-content:center; */
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
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <br>
    <section class="content">
        <form method="post" action="" onsubmit="return confirmvalidation()" enctype="multipart/form-data">
            <!-- Default box -->
            <div class="align">
                <img class="print-only" src="images\Somaiya1.png" alt="Logo" style="width: 100%; max-width: 500px;">
                <img class="print-only" src="images\Trust.png" alt="Logo" style="width: 100%; max-width: 120px;">
            </div>

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><?php $sidemenu;?> Parent Detail</h3>
                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-bordered">

                                <tr>
                                    <th style="width: 250px;">Parent Name:</th>
                                    <td><?php echo $rsparent['parentname']; ?></td>
                                </tr>
                                <tr>
                                    <th>Ward Roll no. :</th>
                                    <td><?php echo $rsparent['rollno']; ?></td>
                                </tr>
                                <tr>
                                    <th>Ward Class:</th>
                                    <td><?php
$sqlcourse = "SELECT * FROM course where course_id='$rsparent[course_id]'";
$qsqlcourse = mysqli_query($con, $sqlcourse);
$rscourse = mysqli_fetch_array($qsqlcourse);
echo $rscourse['course_title'];?> (<?php echo $rsparent['section']; ?>) </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </form>
    </section>
    <!-- Main content -->
    <section class="content">
        <form method="post" action="" onsubmit="return confirmvalidation()" enctype="multipart/form-data">
            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Feedback Detail</h3>
                </div>
                <div class="card-body">

                    <?php
if (isset($_GET['feedbacktopicid'])) {
    ?>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-bordered">

                                <tr>
                                    <th style="width: 250px;">FeedBack Topic:</th>
                                    <td><?php echo $rsedit['feedback_topic']; ?></td>
                                </tr>
                                <?php
if ($rsedit['course_id'] != 0) {
        ?>
                                <tr>
                                    <th>Ward Course:</th>
                                    <td><?php echo $rscourse['course_title']; ?></td>
                                </tr>
                                <?php
}
    ?>
                                <tr>
                                    <th>FeedBack Detail:</th>
                                    <td><?php echo $rsedit['feedbacktopic_detail']; ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <?php
}
?>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </form>
    </section>
    <!-- /.content -->
    <!-- /.content -->

    <?php
if (isset($_GET['feedbacktopicid'])) {
    ?>

    <!-- Main content -->
    <section class="content">
        <form method="post" action="" onsubmit="return confirmvalidation2()" enctype="multipart/form-data">
            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">View FeedBack Question and Answers</h3>
                </div>
                <div class="card-body">

                    <table id="tblquestionviewer" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th style="height: 0px;">
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
$sqlqz = "SELECT feedbackquestion_result.*, feedbackquestion.question,feedbackquestion.option1,feedbackquestion.option2,feedbackquestion.option3,feedbackquestion.option4,feedbackquestion.option5,feedbackquestion.option6,feedbackquestion.option7,feedbackquestion.option8,feedbackquestion.option9,feedbackquestion.option10,feedbackquestion.img FROM `feedbackquestion_result` LEFT JOIN feedbackquestion ON feedbackquestion_result.feedbackquestionid=feedbackquestion.feedbackquestionid WHERE feedbackquestion_result.feedbacktopicid='$_GET[feedbacktopicid]' AND  feedbackquestion_result.parentid='$_GET[parentid]' ORDER BY feedbackquestion_result.feedbackquestion_resultid";
    $qsqlqz = mysqli_query($con, $sqlqz);
    $qno = 1;
    while ($rsqz = mysqli_fetch_array($qsqlqz)) {
        ?>
                            <tr>
                                <td>

                                    <input type="hidden" name="edtestseriesid" id="edtestseriesid"
                                        value="<?php echo $rsqz[0]; ?>">

                                    <table style='width: 100%;'>
                                        <tr>
                                            <td>

                                                <b>Question No. <?php echo $qno; ?>: </b>
                                                <?php echo $rsqz['question']; ?>
                                            </td>
                                        </tr>

                                        <?php
if (file_exists("imgquestion/" . $rsqz['img'])) {
            ?>
                                        <tr>
                                            <td>
                                                <img src="imgquestion/<?php echo $rsqz['img']; ?>"
                                                    style='height: 200px;'>
                                            </td>
                                        </tr>
                                        <?php
}
        ?>
                                        <tr>
                                            <td>
                                                <b>Answer:</b> <?php
if ($rsqz['selectedanswer'] == "") {
            echo "Unanswered";
        } else {
            echo $rsqz['selectedanswer'];
        }
        ?>
                                            </td>
                                        </tr>
                                    </table>


                                </td>
                            </tr>
                            <?php
$qno = $qno + 1;
    }
    ?>
                        </tbody>
                    </table>

                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </form>
    </section>
    <!-- /.content -->
    <?php
}
?>



    <section class="content">
        <form method="post" action="" onsubmit="return confirmvalidation()" enctype="multipart/form-data">
            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">FeedBack detail</h3>
                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-bordered">

                                <tr>
                                    <th style="width: 250px;">Total Questions:</th>
                                    <td><?php echo mysqli_num_rows($qsqlqz); ?></td>
                                </tr>
                                <tr>
                                    <th>Answered Questions:</th>
                                    <td><?php
$sqlqz = "SELECT * FROM feedbackquestion_result WHERE feedbacktopicid='$_GET[feedbacktopicid]' AND parentid='$_GET[parentid]' and selectedanswer != ''";
$qsqlqz = mysqli_query($con, $sqlqz);
echo mysqli_num_rows($qsqlqz);
?></td>
                                </tr>
                                <tr>
                                    <th>UnAnswered Questions:</th>
                                    <td><?php
$sqlqz = "SELECT * FROM feedbackquestion_result WHERE feedbacktopicid='$_GET[feedbacktopicid]' AND parentid='$_GET[parentid]' and selectedanswer = ''";
$qsqlqz = mysqli_query($con, $sqlqz);
echo mysqli_num_rows($qsqlqz);
?></td>
                                </tr>
                            </table>
                        </div>
                    </div>

                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

    </section>
    <!-- /.content -->


    <section class="content">
        <form method="post" action="" onsubmit="return confirmvalidation()" enctype="multipart/form-data">
            <!-- Default box -->
            <div class="card">
                <div class="card-body">
                    <center><input type="button" name="button" class="btn btn-info" value="Print"
                            onclick="window.print()"></center>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

    </section>

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

<script src="js/jquery.dataTables.min.js"></script>
<script>
$(document).ready(function() {
    $('#tblquestionviewer').DataTable({
        "pageLength": 1000,
        "bPaginate": false,
        "bLengthChange": false,
        "bFilter": true,
        "bInfo": false,
        "bAutoWidth": false,
        "sortb": x,
    });
});
</script>
<div class="page-break"></div>
<div class="footer print-only">K J Somaiya Intitute of Information Technology, Sion, Mumbai 400 002</div>
</body>

</html>