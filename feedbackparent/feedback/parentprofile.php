<?php
include "header.php";
include "sidebar.php";
if (isset($_POST['submit'])) {
    $sql = "UPDATE parent SET parentname='" . $_POST['parentname'] . "',rollno='" . $_POST['rollno'] . "',studentname='" . $_POST['studentname'] . "',parent_no='" . $_POST['parent_no'] . "',companyname='" . $_POST['companyname'] . "',companyaddress='" . $_POST['companyaddress'] . "',designation='" . $_POST['designation'] . "',occupation='" . $_POST['occupation'] . "',academicyear='" . $_POST['academicyear'] . "',email_id='" . $_POST['email_id'] . "',`course_id`='" . $_POST['course_id'] . "',`section`='" . $_POST['section'] . "' WHERE parentid='$_SESSION[parentid]'";
    $qsql = mysqli_query($con, $sql);
    echo mysqli_error($con);
    if (mysqli_affected_rows($con) == 1) {
        echo "<script>alert('Parent profile updated successfully...');</script>";
    }
}
?>
<?php
if (isset($_SESSION['parentid'])) {
    //Step 2 : Select statement starts here
    $sqledit = "SELECT * FROM parent WHERE parentid='$_SESSION[parentid]'";
    $qsqledit = mysqli_query($con, $sqledit);
    echo mysqli_error($con);
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
        <form method="post" action="" onsubmit="return confirmvalidation()" enctype="multipart/form-data">
            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Parent Entry</h3>
                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-3">Parent Name</div>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="parentname" id="parentname" value="<?php if (isset($rsedit['parentname'])) {
    echo $rsedit['parentname'];
}?>">
                        </div>
                        <div class="col-md-4"><span class="errmsg flash" id="errparentname" style="color: red;"></span>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-3">Parent Email - id</div>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="email_id" id="email_id" value="<?php if (isset($rsedit['email_id'])) {
    echo $rsedit['email_id'];
}?>">

                        </div>
                        <div class="col-md-4"><span class="errmsg flash" id="errrollno" style="color: red;"></span>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-3">Ward Name</div>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="studentname" id="studentname" value="<?php if (isset($rsedit['studentname'])) {
    echo $rsedit['studentname'];
}?>">
                        </div>
                        <div class="col-md-4"><span class="errmsg flash" id="errparentname" style="color: red;"></span>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-3">Ward Roll No.</div>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="rollno" id="rollno" value="<?php if (isset($rsedit['rollno'])) {
    echo $rsedit['rollno'];
}?>">

                        </div>
                        <div class="col-md-4"><span class="errmsg flash" id="errrollno" style="color: red;"></span>
                        </div>
                    </div>
                    <br>



                    <div class="row">
                        <div class="col-md-3">Ward Course</div>
                        <div class="col-md-5">
                            <select class="form-control" name="course_id" id="course_id">
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
                        <div class="col-md-4"><span class="errmsg flash" id="errcourse_id" style="color: red;"></span>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-3">Ward Section </div>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="section" id="section" value="<?php if (isset($rsedit['section'])) {
    echo $rsedit['section'];
}?>">
                        </div>
                        <div class="col-md-4"><span class="errmsg flash" id="errsection" style="color: red;"></span>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-3">Contact No.</div>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="parent_no" id="parent_no" value="<?php if (isset($rsedit['parent_no'])) {
    echo $rsedit['parent_no'];
}?>">
                        </div>
                        <div class="col-md-4"><span class="errmsg flash" id="errparent_no" style="color: red;"></span>
                        </div>
                    </div>
                    <br>

                    <div class="row">
                        <div class="col-md-3">Company Name</div>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="companyname" id="companyname" value="<?php if (isset($rsedit['companyname'])) {
    echo $rsedit['companyname'];
}?>">
                        </div>
                        <div class="col-md-4"><span class="errmsg flash" id="errfathers_no" style="color: red;"></span>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-3">Company Address</div>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="companyaddress" id="companyaddress" value="<?php if (isset($rsedit['companyaddress'])) {
    echo $rsedit['companyaddress'];
}?>">
                        </div>
                        <div class="col-md-4"><span class="errmsg flash" id="errfathers_no" style="color: red;"></span>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-3">Designation</div>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="designation" id="designation" value="<?php if (isset($rsedit['designation'])) {
    echo $rsedit['designation'];
}?>">
                        </div>
                        <div class="col-md-4"><span class="errmsg flash" id="errfathers_no" style="color: red;"></span>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-3">Occupation</div>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="occupation" id="occupation" value="<?php if (isset($rsedit['occupation'])) {
    echo $rsedit['occupation'];
}?>">
                        </div>
                        <div class="col-md-4"><span class="errmsg flash" id="errfathers_no" style="color: red;"></span>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-3">Academic year</div>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="academicyear" id="academicyear" value="<?php if (isset($rsedit['academicyear'])) {
    echo $rsedit['academicyear'];
}?>">
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
    if (document.getElementById("parentname").value == "") {
        document.getElementById("errparentname").innerHTML = "Original Name should not be empty";
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
        document.getElementById("errconfirmpassword").innerHTML = "Confirm Password  should not be empty";
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

    if (i == 0) {
        return true;
    } else {
        return false;
    }
}
</script>
</body>

</html>