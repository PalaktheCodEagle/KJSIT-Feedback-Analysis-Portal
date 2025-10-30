<?php
include "header.php";
include "sidebar.php";
if (isset($_POST['submit'])) {
    $condition = '';
    if (isset($_GET['editid'])) {
        $sql = "UPDATE peers SET peersname='" . $_POST['peersname'] . "',email_id='" . $_POST['email_id'] . "',dateofbirth='" . $_POST['dateofbirth'] . "',peers_no='" . $_POST['peers_no'] . "',research='" . $_POST['research'] . "',subtaught='" . $_POST['subtaught'] . "',colname='" . $_POST['colname'] . "',teachingexp='" . $_POST['teachingexp'] . "',designation='" . $_POST['designation'] . "',status='" . $_POST['status'] . "' WHERE peersid='" . $_GET['editid'] . "'";
        $qsql = mysqli_query($con, $sql);
        echo mysqli_error($con);
        if (mysqli_affected_rows($con) == 1) {
            echo "<script>alert('peers Profile updated successfully...');</script>";
        }
    }
    // else
    // {
    //     $sql ="INSERT INTO peers SET peersname='".$_POST['peersname']."',`dateofbirth`='".$_POST['dateofbirth']."',`password`='".$_POST['password']."',`course_id`='".$_POST['peersclass']."',`section`='".$_POST['section']."',status='".$_POST['status']."'   ";
    //     $qsql = mysqli_query($con,$sql);
    //         echo mysqli_error($con);
    //     if(mysqli_affected_rows($con) ==1)
    //     {
    //         $insid=mysqli_insert_id($con);
    //         echo "<script>alert('peers Profile inserted successfully...');</script>";
    //         echo "<script>window.location='peers.php';</script>";
    //     }
    // }
}
if (isset($_GET['editid'])) {
    //Step 2 : Select statement starts here
    $sqledit = "SELECT * FROM peers WHERE peersid='" . $_GET['editid'] . "'";
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

.card-title {
    font-weight: bold;
    text-transform: uppercase;
}

.card {
    background-color: #FFECEC;
}

.card-footer {
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
                    <h3 class="card-title">peers Entry</h3>
                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-3">Full Name</div>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="peersname" id="peersname" value="<?php if (isset($rsedit['peersname'])) {
    echo $rsedit['peersname'];
}?>">
                        </div>
                        <div class="col-md-4"><span class="errmsg flash" id="errpeersname" style="color: red;"></span>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-3">Email - id</div>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="email_id" id="email_id" value="<?php if (isset($rsedit['email_id'])) {
    echo $rsedit['email_id'];
}?>">

                        </div>
                        <div class="col-md-4"><span class="errmsg flash" id="erremail" style="color: red;"></span>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-3">peers's Contact No.</div>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="peers_no" maxlength="10" id="peers_no" value="<?php if (isset($rsedit['peers_no'])) {
    echo $rsedit['peers_no'];
}?>">
                        </div>
                        <div class="col-md-4"><span class="errmsg flash" id="errpeers_no" style="color: red;"></span>
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
                        <div class="col-md-4"><span class="errmsg flash" id="errdesignation" style="color: red;"></span>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-3">College Name</div>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="colname" id="colname" value="<?php if (isset($rsedit['colname'])) {
    echo $rsedit['colname'];
}?>">
                        </div>
                        <div class="col-md-4"><span class="errmsg flash" id="errcolname" style="color: red;"></span>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-3">Teaching Experience</div>
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
                        <div class="col-md-3">Area Of research</div>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="research" id="research" value="<?php if (isset($rsedit['research'])) {
    echo $rsedit['research'];
}?>">
                        </div>
                        <div class="col-md-4"><span class="errmsg flash" id="errresearch" style="color: red;"></span>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-3">Subjects Taught</div>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="subtaught" id="subtaught" value="<?php if (isset($rsedit['subtaught'])) {
    echo $rsedit['subtaught'];
}?>">
                        </div>
                        <div class="col-md-4"><span class="errmsg flash" id="errsubtaught" style="color: red;"></span>
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
    if (document.getElementById("peersname").value == "") {
        document.getElementById("errpeersname").innerHTML = "Original Name should not be empty";
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
    if (document.getElementById("section").value == "") {
        document.getElementById("errsection").innerHTML = "University Name should not be empty";
        i = 1;
    }
    if (document.getElementById("peersclass").value == "") {
        document.getElementById("errstudentclass").innerHTML = "Course should not be empty";
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