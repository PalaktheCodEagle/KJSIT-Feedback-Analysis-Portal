<?php
include "header.php";
include "sidebar.php";
if (isset($_POST['submit'])) {
    $condition = '';
    if (isset($_GET['editid'])) {
        $sql = "UPDATE faculty SET facultyname='" . $_POST['facultyname'] . "',`dateofbirth`='" . $_POST['dateofbirth'] . "',`designation`='" . $_POST['designation'] . "',`industryexp`='" . $_POST['industryexp'] . "',`teachingexp`='" . $_POST['teachingexp'] . "',`course_id`='" . $_POST['facultyclass'] . "',status='" . $_POST['status'] . "'  WHERE facultyid='" . $_GET['editid'] . "'";
        $qsql = mysqli_query($con, $sql);
        echo mysqli_error($con);
        if (mysqli_affected_rows($con) == 1) {
            echo "<script>alert('Faculty Profile updated successfully...');</script>";
        }
    }
}
if (isset($_GET['editid'])) {
    //Step 2 : Select statement starts here
    $sqledit = "SELECT * FROM faculty WHERE facultyid='" . $_GET['editid'] . "'";
    $qsqledit = mysqli_query($con, $sqledit);
    $rsedit = mysqli_fetch_array($qsqledit);
    //Step 2 : Select statement ends here
}
?>
<style>
.content {
    color: #9b2928;
    font-weight: bold;
}

.card-header {
    background-color: #9b2928;
    color: white;
}

.card {
    background-color: #FFECEC;
}

.card-title {
    text-transform: uppercase;
    font-weight: bold;
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
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <br>
    <!-- Main content -->
    <section class="content">
        <form method="post" action="" onsubmit="return confirmvalidation()" enctype="multipart/form-data">
            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Faculty Entry</h3>
                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-3">Full Name</div>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="facultyname" id="facultyname" value="<?php if (isset($rsedit['facultyname'])) {
    echo $rsedit['facultyname'];
}?>">
                        </div>
                        <div class="col-md-4"><span class="errmsg flash" id="errfacultyname" style="color: red;"></span>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-3">Email ID</div>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="email_id" id="email_id" value="<?php if (isset($rsedit['email_id'])) {
    echo $rsedit['email_id'];
}?>">
                        </div>
                        <div class="col-md-4"><span class="errmsg flash" id="erremail_id" style="color: red;"></span>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-3">Date of Birth</div>
                        <div class="col-md-5">
                            <input type="date" class="form-control" name="dateofbirth" id="dateofbirth" value="<?php if (isset($rsedit['dateofbirth'])) {
    echo $rsedit['dateofbirth'];
}?>">
                        </div>
                        <div class="col-md-4"><span class="errmsg flash" id="errdateofbirth" style="color: red;"></span>
                        </div>
                    </div>

                    <br>
                    <div class="row">
                        <div class="col-md-3">Course</div>
                        <div class="col-md-5">
                            <select class="form-control" name="facultyclass" id="facultyclass">
                                <option value="">Select Course</option>
                                <?php
$sql = "SELECT * FROM course where course_status='Active'";
$qsql = mysqli_query($con, $sql);
echo mysqli_error($con);
while ($rs = mysqli_fetch_array($qsql)) {
    if ($rs['course_id'] == $rsedit['course_id']) {
        echo "<option value='$rs[course_id]' selected>$rs[course_title]</option>";
    } else {
        echo "<option value='$rs[course_id]'>$rs[course_title]</option>";
    }
}
?>
                            </select>
                        </div>
                        <div class="col-md-4"><span class="errmsg flash" id="errfacultyclass"
                                style="color: red;"></span></div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-3">Faculty Contact No.</div>
                        <div class="col-md-5">
                            <input type="text" class="form-control" maxlength="10" name="faculty_no" id="faculty_no"
                                value="<?php if (isset($rsedit['faculty_no'])) {
    echo $rsedit['faculty_no'];
}?>">
                        </div>
                        <div class="col-md-4"><span class="errmsg flash" id="errfaculty_no" style="color: red;"></span>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-3">Academic Year</div>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="academicyear" id="academicyear" value="<?php if (isset($rsedit['academicyear'])) {
    echo $rsedit['academicyear'];
}?>">
                        </div>
                        <div class="col-md-4"><span class="errmsg flash" id="erracademicyear"
                                style="color: red;"></span>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-3">Designation</div>

                        <div class="col-md-5">
                            <form name="dropForm">
                                <select name="designation" id="designation" required class="form-control"
                                    onchange="showDropInfo()">
                                    <option value="">Select Option</option>
                                    <option value="Assistant Professor">Assistant Professor</option>
                                    <option value="Associate Professor">Associate Professor</option>
                                    <option value="Professor">Professor</option>
                                    <option value="Others">Others</option>
                                </select>
                            </form>
                        </div>
                        <div class="col-md-3"><input type="text" class="form-control" readonly value="<?php if (isset($rsedit['designation'])) {
    echo $rsedit['designation'];
}?>">
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-md-3">Number of Years of Experience in Teaching</div>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="teachingexp" id="teachingexp" value="<?php if (isset($rsedit['teachingexp'])) {
    echo $rsedit['teachingexp'];
}?>">
                        </div>
                        <div class="col-md-4"><span class="errmsg flash" id="errteachingexp" style="color: red;"></span>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-3">Number of Years of Experience in Industry</div>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="industryexp" id="industryexp" value="<?php if (isset($rsedit['industryexp'])) {
    echo $rsedit['industryexp'];
}?>">
                        </div>
                        <div class="col-md-4"><span class="errmsg flash" id="errteachingexp" style="color: red;"></span>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-3">Status</div>
                        <div class="col-md-5">
                            <select class="form-control" name="status" id="status">
                                <option value=''>Select status</option>
                                <?php
$arr = array("Active", "Inactive");
foreach ($arr as $val) {
    if ($rsedit['status'] == $val) {
        echo "<option value='$val' selected>$val</option>";
    } else {
        echo "<option value='$val'>$val</option>";
    }
}
?>
                            </select>
                        </div>
                        <div class="col-md-4"><span class="errmsg flash" id="errstatus" style="color: red;"></span>
                        </div>
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
    if (document.getElementById("facultyname").value == "") {
        document.getElementById("errfacultyname").innerHTML = "Original Name should not be empty";
        i = 1;
    }

    // if (document.getElementById("rollno").value == "") {
    //     document.getElementById("errrollno").innerHTML = "Email ID should not be empty";
    //     i = 1;
    // }


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
        document.getElementById("errconfirmpassword").innerHTML = "Confirm Password  should not be empty";
        i = 1;
    }
    // if (document.getElementById("section").value == "") {
    //     document.getElementById("errsection").innerHTML = "University Name should not be empty";
    //     i = 1;
    // }
    if (document.getElementById("facultyclass").value == "") {
        document.getElementById("errfacultyclass").innerHTML = "Course should not be empty";
        i = 1;
    }
    if (document.getElementById("status").value == "") {
        document.getElementById("errstatus").innerHTML = "Kindly select the status";
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