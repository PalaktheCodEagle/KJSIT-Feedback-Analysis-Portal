<?php
include "header.php";
include "sidebar.php";
if (isset($_POST['submit'])) {
    $sql = "UPDATE student SET studentname='" . $_POST['studentname'] . "',rollno='" . $_POST['rollno'] . "',email_id='" . $_POST['email_id'] . "',`dateofbirth`='" . $_POST['dateofbirth'] . "',mothers_no='" . $_POST['mothers_no'] . "',fathers_no='" . $_POST['fathers_no'] . "',student_no='" . $_POST['student_no'] . "',`course_id`='" . $_POST['course_id'] . "',`section`='" . $_POST['section'] . "',`academicyear`='2023-24' WHERE studentid='$_SESSION[studentid]'";
    $qsql = mysqli_query($con, $sql);
    echo mysqli_error($con);
    if (mysqli_affected_rows($con) == 1) {
        echo "<script>alert('Student profile updated successfully...');</script>";
    }
}
?>
<?php
if (isset($_SESSION['studentid'])) {
    //Step 2 : Select statement starts here
    $sqledit = "SELECT * FROM student WHERE studentid='$_SESSION[studentid]'";
    $qsqledit = mysqli_query($con, $sqledit);
    echo mysqli_error($con);
    $rsedit = mysqli_fetch_array($qsqledit);
    //Step 2 : Select statement ends here
}
?>
<style>
 .content{
       color:#9b2928;
       font-weight:bold;
    }
    .card-header{
        background-color:#9b2928;
        color:white;
    }
    .card{
        background-color:#FFECEC;
    }
     .btn-primary {
    color: #fff;
    background-color: #9b2928;
    border-color: #9b2928;
    box-shadow: none;
}
     .btn-primary:hover{
         background-color:#630606;
          border-color:#630606;
     }
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">
        <form method="post" action="" onsubmit="return confirmvalidation()" enctype="multipart/form-data">
            <!-- Default box -->
            <br>
            <br>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><b>STUDENT ENTRY</b></h3>
                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-3">Original Name</div>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="studentname" id="studentname"
                                value="<?php if (isset($rsedit['studentname'])) {echo $rsedit['studentname'];}?>">
                        </div>
                        <div class="col-md-4"><span class="errmsg flash" id="errstudentname" style="color: red;"></span>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-3">Roll No.</div>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="rollno" id="rollno" maxlength="3"
                                value="<?php if (isset($rsedit['rollno'])) {echo $rsedit['rollno'];}?>">

                        </div>
                        <div class="col-md-4"><span class="errmsg flash" id="errrollno" style="color: red;"></span>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-3">Email - id</div>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="email_id" id="email_id"
                                value="<?php if (isset($rsedit['email_id'])) {echo $rsedit['email_id'];}?>">

                        </div>
                        <div class="col-md-4"><span class="errmsg flash" id="errrollno" style="color: red;"></span>
                        </div>
                    </div>
                    <br>

                    
                    <div class="row">
                        <div class="col-md-3">Date of Birth</div>
                        <div class="col-md-5">
                            <input type="date" class="form-control" name="dateofbirth" id="dateofbirth"
                                value="<?php if (isset($rsedit['dateofbirth'])) {echo $rsedit['dateofbirth'];}?>">

                        </div>
                        <div class="col-md-4"><span class="errmsg flash" id="errdateofbirth" style="color: red;"></span>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-3">Course</div>
                        <div class="col-md-5">
                            <select class="form-control" name="course_id" id="course_id">
                                <?php
$sql = "SELECT * FROM course where course_title != 'All' AND course_status='Active'";
$qsql = mysqli_query($con, $sql);
echo mysqli_error($con);
while ($rs = mysqli_fetch_array($qsql)) {
    if ($rs['course_id'] == $rsedit['course_id']) {
        echo "<option value='$rs[course_id]' selected>$rs[course_title]</option>";
    }else {
        echo "<option value='$rs[course_id]'>$rs[course_title]</option>";
    }
}
?>
                            </select>

                        </div>
                        <div class="col-md-4"><span class="errmsg flash" id="errcourse_id" style="color: red;"></span>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-3">Division</div>
    <div class="col-md-5">
        <select class="form-control" name="section" id="section">
            <option value="">Select Division</option>
            <option value="A" <?php if (isset($rsedit['section']) && $rsedit['section'] == 'A') echo 'selected'; ?>>A</option>
            <option value="B" <?php if (isset($rsedit['section']) && $rsedit['section'] == 'B') echo 'selected'; ?>>B</option>
           <option value="C" <?php if (isset($rsedit['section']) && $rsedit['section'] == 'C') echo 'selected'; ?>>C</option>
            <option value="D" <?php if (isset($rsedit['section']) && $rsedit['section'] == 'D') echo 'selected'; ?>>D</option>
            <option value="E" <?php if (isset($rsedit['section']) && $rsedit['section'] == 'E') echo 'selected'; ?>>E</option>
            <option value="F" <?php if (isset($rsedit['section']) && $rsedit['section'] == 'F') echo 'selected'; ?>>F</option>
            <option value="G" <?php if (isset($rsedit['section']) && $rsedit['section'] == 'G') echo 'selected'; ?>>G</option>
            <option value="H" <?php if (isset($rsedit['section']) && $rsedit['section'] == 'H') echo 'selected'; ?>>H</option>
        </select>
    </div>
    <div class="col-md-4">
       <span class="errmsg flash" id="errsection" style="color: red;"></span>
    </div>
</div>
                    <br>
                    <div class="row">
                        <div class="col-md-3">Years</div>
                        <div class="col-md-5">
                            <select class="form-control" name="years_id" id="years_id">
                                <?php
$sql = "SELECT * FROM years where years_title != 'All' AND years_status='Active'";
$qsql = mysqli_query($con, $sql);
echo mysqli_error($con);
while ($rs = mysqli_fetch_array($qsql)) {
    if ($rs['years_id'] == $rsedit['years_id']) {
        echo "<option value='$rs[years_id]' selected>$rs[years_title]</option>";
    }else {
        echo "<option value='$rs[years_id]'>$rs[years_title]</option>";
    }
}
?>
                            </select>
                        </div>
                        <div class="col-md-4"><span class="errmsg flash" id="erryears_id" style="color: red;"></span>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-3">Student's Contact No.</div>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="student_no" id="student_no" maxlength="10"
                                value="<?php if (isset($rsedit['student_no'])) {echo $rsedit['student_no'];}?>">
                        </div>
                        <div class="col-md-4"><span class="errmsg flash" id="errstudent_no" style="color: red;"></span>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-3">Mother's Contact No.</div>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="mothers_no" id="mothers_no" maxlength="10"
                                value="<?php if (isset($rsedit['mothers_no'])) {echo $rsedit['mothers_no'];}?>">
                        </div>
                        <div class="col-md-4"><span class="errmsg flash" id="errmothers_no" style="color: red;"></span>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-3">Fathers's Contact No.</div>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="fathers_no" id="fathers_no" maxlength="10"
                                value="<?php if (isset($rsedit['fathers_no'])) {echo $rsedit['fathers_no'];}?>">
                        </div>
                        <div class="col-md-4"><span class="errmsg flash" id="errfathers_no" style="color: red;"></span>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-3">Academic year</div>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="academicyear" id="academicyear"
                                value="<?php if (isset($rsedit['academicyear'])) {echo $rsedit['academicyear'];}?>" disabled>
                        </div>
                        <div class="col-md-4"><span class="errmsg flash" id="erracademicyear"
                                style="color: red;"></span></div>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">

                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-5">
                            <input class="btn btn-primary btn-block" type="submit" name="submit" id="submit"
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
    <br>
    <br>
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

<script>
function confirmvalidation() {
    var i = 0;
    $('.errmsg').html('');
    if (document.getElementById("studentname").value == "") {
        document.getElementById("errstudentname").innerHTML = "Original Name should not be empty";
        i = 1;
    }

    if (document.getElementById("rollno").value == "") {
        document.getElementById("errrollno").innerHTML = "Email ID should not be empty";
        i = 1;
    }


    if (document.getElementById("password").value.length < 6) {
        document.getElementById("errpassword").innerHTML = "Password should contain more than 6 characters";
        i = 1;
    }
    if (document.getElementById("password").value == "") {
        document.getElementById("errpassword").innerHTML = "Password code should not be empty";
        i = 1;
    }
    if (document.getElementById("confirmpassword").value != document.getElementById("password").value) {
        document.getElementById("errconfirmpassword").innerHTML = "Password and Confirm password not matching";
        i = 1;
    }
    if (document.getElementById("confirmpassword").value == "") {
        document.getElementById("errconfirmpassword").innerHTML = "Confirm Password should not be empty";
        i = 1;
    }
    if (document.getElementById("section").value == "") {
        document.getElementById("errsection").innerHTML = "University Name should not be empty";
        i = 1;
    }
    if (document.getElementById("course_id").value == "") {
        document.getElementById("errcourse_id").innerHTML = "Qualification should not be empty";
        i = 1;
    }
    if (document.getElementById("years_id").value == "") {
        document.getElementById("erryears_id").innerHTML = "Qualification should not be empty";
        i = 1;
    }

    if (i == 0) {
        return true;
    } else {
        return false;
    }
}
</script>
</body>

</html>