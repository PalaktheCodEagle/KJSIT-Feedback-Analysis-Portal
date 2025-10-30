<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
error_reporting(0);
date_default_timezone_set("Asia/Calcutta");
$dttim = date("Y-m-d H:i:s");
$dt = date("Y-m-d");
if (isset($_SESSION['adminid'])) {
    echo "<script>window.location='admindashboard.php';</script>";
}
if (isset($_SESSION['employeeid'])) {
    echo "<script>window.location='employeedashboard.php';</script>";
}
include "database.php";

$url = 'http://' . $_SERVER['HTTP_HOST'];

if (isset($_POST['submit'])) {
    $sql = "INSERT INTO employee SET employeename='" . $_POST['employeename'] . "',email_id='" . $_POST['email_id'] . "',employee_no='" . $_POST['employee_no'] . "',dateofbirth='" . $_POST['dateofbirth'] . "',password='" . $_POST['password'] . "',orgname='" . $_POST['orgname'] . "',experience='" . $_POST['experience'] . "',association='" . $_POST['association'] . "',designation='" . $_POST['designation'] . "',status='Inactive' ";
    $qsql = mysqli_query($con, $sql);
    echo mysqli_error($con);

    $verificationCode = md5(uniqid(rand(), true));

    if (mysqli_affected_rows($con) == 1) {
        //     $message = "Welcome $_POST[employeename],<br>
        // Click the following link to verify your email: <a href='$url/feedbackemployee/feedback/employeeemailverify.php?code=$verificationCode'>Verify Email</a>";
        $message = "Dear $_POST[employeename],<br><br>
    Thank you for registering on the KJSIT Stakeholders Feedback Analysis Portal. We are excited to have you on board and look forward to your valuable contributions. To ensure the security of your account and activate your access, we need to verify your email address.
    <br><br>
    Please click the button below to complete the verification process:
    <br><br>
    <a href='$url/feedbackemployee/feedback/employeeemailverify.php?code=$verificationCode'>Verify Account</a>
    <br><br>
    If you did not register for an account on our portal, or if you believe this email was sent to you in error, please disregard it. There is no further action required.
    <br><br>
    If you encounter any issues during the verification process or have any questions, please feel free to reach out to our support team at vlos.tech@somaiya.edu. We are here to assist you.
    <br><br>
    Thank you for joining us in our commitment to improving KJSIT through valuable feedback. We appreciate your time and effort.
    <br><br>
    Best regards,
    <br>
    KJSIT Stakeholders Feedback Analysis Team.";

        include "phpmailer.php";
        sendmail($_POST['email_id'], $_POST['employeename'], "Account Verification for KJSIT Stakeholders Feedback System", $message);

        $sql = "UPDATE `employee` SET verification_code='" . $verificationCode . "' WHERE `email_id`='" . $_POST['email_id'] . "'";
        mysqli_query($con, $sql);

        echo "<script>alert('Please check your registed email for to verify your account in the employee Feedback Portal. Thank you.');</script>";
        echo "<script>window.location='../../index.php';</script>";
    }
    //}
}
// if (isset($_GET['editid'])) {
//   $sqledit = "SELECT * FROM employee WHERE employeeid='" . $_GET['editid'] . "'";
//   $qsqledit = mysqli_query($con, $sqledit);
//   $rsedit = mysqli_fetch_array($qsqledit);
// }
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Employee Feedback - Employee Registration Window</title>
    <link rel="shortcut icon" href="FAVICON1.png" type="image/x-icon">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- bootstrap icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body>
    <style>
    .error {
        color: red;
        font-size: 90%;
        margin-left: 10px;
    }

    body {
        font-family: 'PT Sans', sans-serif;
        background-image: linear-gradient(#9b2a2841, #00000000), url('greybg.jpg');
        background-size: cover;
        background-attachment: fixed;
        line-height: 1.6;
        margin: 0px;
        padding: 0px;
    }

    .heading {
        margin: auto;
        width: fit-content;
        border-radius: 0.7rem;
        text-align: center;
        background-color: #9b2928;
        color: white;
        padding: 10px;
        font-family: 'PT Sans', sans-serif;
    }

    nav {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        width: 100%;
        align-items: center;
    }

    #logo {
        height: 6rem;
        width: 100%;
    }


    .main1 {

        display: flex;
        align-items: center;
        justify-content: center;
        /* background-color: #FFDEB4; */
    }

    .row {
        display: flex;
        flex-direction: row;
        margin-right: 5px;
    }

    .row a {
        color: black;
        text-decoration: none;
        margin: 0.3rem;
    }

    .row a:hover {
        color: #b7202e;
    }

    #trust {
        height: 50px;
        width: 100px;
    }

    button {
        border: 0.3px solid #000000;
        background-color: transparent;

    }

    .btn-primary {
        color: #fff;
        background-color: #9b2928;
        border-color: #9b2928;
        box-shadow: none;
    }

    .btn-primary:hover {
        color: #fff;
        background-color: #9b2928;
        border-color: #9b2928;
        box-shadow: none;
    }

    .card-footer {
        background-color: #fff;
    }

    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');

    .container {
        max-width: 700px;
        width: 100%;
        background-color: #fff;
        padding: 25px 30px;
        border-radius: 5px;
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.15);
    }

    .container .title::before {
        content: "";
        position: absolute;
        left: 0;
        bottom: 0;
        height: 3px;
        width: 30px;
        border-radius: 5px;
        /* background: #4070f4; */
    }

    .content form .user-details {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        margin: 20px 0 12px 0;
    }

    form .user-details .input-box {
        margin-bottom: 15px;
        width: calc(100% / 2 - 20px);
    }

    form .input-box span.details {
        display: block;
        font-weight: 500;
        margin-bottom: 5px;
    }

    form .input-box label.details1 {
        display: block;
        font-weight: 500;
        margin-bottom: 5px;

    }

    .user-details .input-box input {
        height: 45px;
        width: 100%;
        outline: none;
        font-size: 16px;
        border-radius: 5px;
        padding-left: 15px;
        border: 1px solid #ccc;
        border-bottom-width: 2px;
        transition: all 0.3s ease;
    }

    .user-details .input-box input:focus,
    .user-details .input-box input:valid {
        border-color: #9b59b6;
    }

    form .gender-details .gender-title {
        font-size: 20px;
        font-weight: 500;
    }

    form .category {
        display: flex;
        width: 80%;
        margin: 14px 0;
        justify-content: space-between;
    }

    form .category label {
        display: flex;
        align-items: center;
        cursor: pointer;
    }

    form .category label .dot {
        height: 18px;
        width: 18px;
        border-radius: 50%;
        margin-right: 10px;
        background: #d9d9d9;
        border: 5px solid transparent;
        transition: all 0.3s ease;
    }

    #dot-1:checked~.category label .one,
    #dot-2:checked~.category label .two,
    #dot-3:checked~.category label .three {
        background: #9b59b6;
        border-color: #d9d9d9;
    }

    form input[type="radio"] {
        display: none;
    }

    form .button {
        height: 45px;
        margin: 35px 0
    }

    form .button input {
        height: 100%;
        width: 100%;
        border-radius: 5px;
        border: none;
        color: #fff;
        font-size: 18px;
        font-weight: 500;
        letter-spacing: 1px;
        cursor: pointer;
        transition: all 0.3s ease;
        background: #4070f4;
    }

    form .button input:hover {
        /* transform: scale(0.99); */
        background: #4070f4;
    }

    @media(max-width: 584px) {
        .container {
            max-width: 100%;
        }

        form .user-details .input-box {
            margin-bottom: 15px;
            width: 100%;
        }

        form .category {
            width: 100%;
        }

        .content form .user-details {
            max-height: 300px;
            overflow-y: scroll;
        }

        .user-details::-webkit-scrollbar {
            width: 5px;
        }
    }

    @media(max-width: 459px) {
        .container .content .category {
            flex-direction: column;
        }
    }


    @media (max-width:480px) {
        .icons {
            display: none;
        }

        #logo {
            height: 3rem;
            width: 100%;
        }

        .row {
            display: none;
        }

        #trust {
            width: 50px;
            height: 25px;
        }

        @media (max-width: 850px) {
            .icons {
                display: none;
            }

            .row {

                display: block;
            }

            #trust {
                width: 50px;
                height: 25px;
            }
        }

    }

    .form-control {
        flex: 1;
        padding: -13px;
        border: 1px solid #ebebeb;
        background-color: #ebebeb;
        border-radius: 15px;
        font-size: 16px;
        transition: all 0.2s ease-out;
        color: #000;
        font-weight: 300;
        font-family: 'PT Sans', sans-serif;
    }

    .container {
        background: #fff;
        max-width: 800px;
        width: 100%;
        padding: 30px 44px;
        margin: 10px;
        border: 1px solid #e1e2f0;
        border-radius: 1rem;
        box-shadow: 2px 2px 2px 2px rgba(0, 0, 0, 0.395);
        transition: all 0.3s ease;
    }

    .title {
        text-align: center;
        margin: auto;
        color: #000;
        font-size: xx-large;
        font-family: 'PT Sans', sans-serif;
        font-weight: bolder;
        border-bottom: 1px #9b2928 solid;
    }

    .col-12 {
        margin-top: 15px;
        width: auto;
    }

    .col-md-6 {
        width: 45%;
        display: inline-block;
        margin: 15px;
    }

    footer {
        background: #9B2928;
        height: auto;
        width: 100vw;
        font-family: 'Poppins', sans-serif;
        padding-top: 20px;
        color: white;
        padding-bottom: 10px;

    }

    .footer-content {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        text-align: center;
    }

    .footer-content h6 {

        line-height: 1.5rem;
        font-weight: bold;
        font-size: 17px;
    }

    .footer-content p {

        margin: 10px auto;
        line-height: 30px;

    }

    .footer-content year {
        font-size: 17px;
    }
    </style>

    <!-- navigation bar -->
    <div class="main">
        <div class="nav" style="background-color:#ffffff;">
            <nav>
                <div class="img">

                    <img id="logo" src="images/Somaiya1.png" alt="">

                </div>
                <div class="row">

                    <div class="icons">
                        <button type="button" name="button"> <a href="https://www.somaiya.edu.in/en" target="_blank"
                                style="color: black, !important;">
                                <i class="bi bi-globe"></i> somaiya.edu
                            </a></button>
                        <a href="https://www.facebook.com/kjsieitofficial" target="_blank">
                            <i class="bi bi-facebook style='#000000'"></i>
                        </a>
                        <a href="https://twitter.com/kjsieit1" target="_blank">
                            <i class="bi bi-twitter"></i>
                        </a>
                        <a href="https://www.instagram.com/kjsieit_22/" target="_blank">
                            <i class="bi bi-instagram"></i>
                        </a>
                        <a href="https://www.youtube.com/kjsieitofficial" target="_blank">
                            <i class="bi bi-youtube"></i>
                        </a>
                        <a href="https://www.linkedin.com/authwall?trk=bf&trkInfo=AQGGuSH8KhlwSwAAAYLQ0-lI197THvyK68qNQUCy_45bItZlyVxB3zJIOqkcWsZbXs1Fbm5WsDzldL7D_aRcaijw5KvMXS4IdirAPV3v2BqILFUp5pcJxb0qpO5rUYdLIvVI5aE=&original_referer=&sessionRedirect=https%3A%2F%2Fwww.linkedin.com%2Fin%2Fkjsieit"
                            target="_blank">
                            <i class="bi bi-linkedin"></i>
                        </a>
                        <img id="trust" src="images/Trust.png" alt="">
                    </div>
                </div>
            </nav>
        </div>
        <br>
        <!-- employee Registration Window -->

        <div class="heading">

            <h1 style="font-weight: bold; margin-bottom:0px ">Employee Registration</h1>
        </div>

        <div style=" height:50px">
        </div>

        <!-- Registration Form -->

        <div class="main1">
            <div class="container">
                <div class="title">Registration</div>
                <br>
                <div class="content">
                    <form method="post" action="" onsubmit="return confirmvalidation()" enctype="multipart/form-data"
                        autocomplete="off">
                        <div class="col-12">
                            <label for="inputAddress" class="form-label">Full Name</label>
                            <input type="text" class="form-control" name="employeename" id="employeename"
                                placeholder="Enter Your Full Name" required value="<?php if (isset($rsedit['employeename'])) {
    echo $rsedit['employeename'];
}?>">
                            <span id="employeenameError" class="error" style="display: none;"></span>
                        </div>
                        <br>
                        <!-- <div class="col-12">
                            <label for="inputRollNo" class="form-label">Roll No.</label>
                            <input type="text" class="form-control" name="rollno" id="rollno"
                                placeholder="Enter Your Roll No." value=" -->
                        <?php
//                                 if (isset($rsedit['rollno'])) {
//     echo $rsedit['rollno'];
// }
?>
                        <!-- "> -->
                        <!-- <span id="rollnoError" class="error" style="display: none;"></span>
                        </div><br> -->
                        <div class="col-md-12">
                            <label for="inputEmail4" class="form-label">Email</label>
                            <input type="text" class="form-control" name="email_id" required
                                placeholder="Enter Your Email Id" id="email_id" value="<?php if (isset($rsedit['email_id'])) {
    echo $rsedit['email_id'];
}?>">
                            <span id="emailError" class="error" style="display: none;"></span>
                        </div><br>
                        <!-- <div class="col-md-12">
                            <label for="inputContact" class="form-label">Mother's Contact</label>
                            <input type="text" class="form-control" name="mothers_no" maxlength="10"
                                placeholder="Mother Contact" id="mothers_no" value=" -->
                        <?php
// if (isset($rsedit['mothers_no']))
// {
// echo $rsedit['mothers_no'];
// }
?>
                        <!-- "> -->
                        <!-- <span id="mothersnoError" class="error" style="display: none;"></span>
                        </div><br>
                        <div class="col-md-12">
                            <label for="inputContact" class="form-label">Father's Contact</label>
                            <input type="text" class="form-control" name="fathers_no" maxlength="10"
                                placeholder="Father Contact" id="fathers_no" value=" -->
                        <?php
// if (isset($rsedit['fathers_no']))
// {
// echo $rsedit['fathers_no'];
// }
?>
                        <!-- "> -->
                        <!-- <span id="fathersnoError" class="error" style="display: none;"></span>
                        </div><br> -->
                        <div class="col-12">
                            <label for="inputAddress" class="form-label">Organization Name</label>
                            <input type="text" class="form-control" name="orgname" id="orgname"
                                placeholder="Enter Your Full Name" required value="<?php if (isset($rsedit['orgname'])) {
    echo $rsedit['orgname'];
}?>">
                            <span id="orgnameError" class="error" style="display: none;"></span>
                        </div>
                        <br>
                        <div class="col-md-12">
                            <label for="inputContact" class="form-label">Employee's Contact</label>
                            <input type="text" class="form-control" name="employee_no" maxlength="10"
                                placeholder="Employee Contact" id="employee_no" required value="<?php if (isset($rsedit['employee_no'])) {
    echo $rsedit['employee_no'];
}?>">
                            <span id="employeesnoError" class="error" style="display: none;"></span>
                        </div>
                        <br>
                        <div class="col-md-12">
                            <label for="inputContact" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password"
                                placeholder="Enter Your Password" id="password" required autocomplete="new-password"
                                value="<?php if (isset($rsedit['password'])) {
    echo $rsedit['password'];
}?>">
                            <span id="passwordError" class="error" style="display: none;"></span>
                        </div><br>
                        <div class="col-md-12">
                            <label for="inputPassword4" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" name="confirmpassword"
                                placeholder="Confirm Your Password" id="confirmpassword" required value="<?php if (isset($rsedit['password'])) {
    echo $rsedit['password'];
}?>">
                            <span id="confirmpasswordError" class="error" style="display: none;"></span>
                        </div><br>
                        <div class="col-md-12">
                            <label for="designation" class="form-label">Designation</label>
                            <input type="text" class="form-control" name="designation"
                                placeholder="Employee Designation" id="designation" required value="<?php if (isset($rsedit['designation'])) {
    echo $rsedit['designation'];
}?>">
                            <!-- <select class="form-control" name="designation" id="designation" required>
                                <option value="">Select Option</option>
                                <option value="Assistant Professor">Assistant Professor</option>
                                <option value="Associate Professor">Associate Professor</option>
                                <option value="Professor">Professor</option>
                                <option value="Others">Others</option>
                            </select> -->
                            <span id="courseError" class="error" style="display: none;"></span>

                        </div><br>
                        <div class="col-md-12">
                            <label for="experience" class="form-label">Years of Experience</label>
                            <input type="text" class="form-control" name="experience" maxlength="3" required
                                placeholder="Enter Number of Years of Experience" id="experience" value="<?php if (isset($rsedit['experience'])) {
    echo $rsedit['experience'];
}?>">
                            <span id="experienceError" class="error" style="display: none;"></span>
                        </div><br>
                        <div class="col-md-12">
                            <label for="association" class="form-label">Association with KJSIT (in years)</label>
                            <input type="text" class="form-control" name="association" maxlength="3" required
                                placeholder="Enter association with KJSIT (in years)" id="association" value="<?php if (isset($rsedit['association'])) {
    echo $rsedit['association'];
}?>">
                            <span id="associationError" class="error" style="display: none;"></span>
                        </div><br>
                        <div class="col-md-12">
                            <label for="inputDOB" class="form-label">Current Year</label>
                            <input type="date" class="form-control" name="dateofbirth" required id="dateofbirth" value="<?php if (isset($rsedit['dateofbirth'])) {
    echo $rsedit['dateofbirth'];
}?>">
                            <span id="dateofbirthError" class="error" style="display: none;"></span>
                        </div><br>
                        <!-- <div class="col-md-12" style="height: auto;">
                            <label for="inputDOB" class="form-label">Course</label>
                            <div class="col-md-3">Course</div>
                            <select class="form-control" name="course" id="course" required>
                                <option value="">Select Course</option>
                                <?php
// $sql = "SELECT * FROM course where course_status='Active' and course_title != 'All'";
// $qsql = mysqli_query($con, $sql);
// echo mysqli_error($con);
// while ($rs = mysqli_fetch_array($qsql)) {
//     if ($rs['course_id'] == $rsedit['course_id']) {
//         echo "<option value='$rs[course_id]' selected>$rs[course_title]</option>";
//     } else {
//         echo "<option value='$rs[course_id]'>$rs[course_title]</option>";
//     }
// }
?>
                            </select>
                            <span id="courseError" class="error" style="display: none;"></span>
                        </div> -->
                        <!--
                        <br>
                        <div class="col-md-12">
                            <label for="input year">Course Year</label>
                            <select class="form-control" name="courseyear" id="courseyear">
                                <option value="">Select Course Year</option> -->
                        <?php
// $sql2 = "SELECT * FROM years where years_status='Active' and years_title !='All'";
// $qsql = mysqli_query($con, $sql2);
// echo mysqli_error($con);
// while ($rs = mysqli_fetch_array($qsql)) {
//     if ($rs['years_id'] == $rsedit['years_id']) {
//         echo "<option value='$rs[years_id]' selected>$rs[years_description]</option>";
//     } else {
//         echo "<option value='$rs[years_id]'>$rs[years_description]</option>";
//     }
// }
?>
                        <!-- </select>
                            <span id="courseyearError" class="error" style="display: none;"></span>
                        </div> -->

                        <!-- <br>
                        <div class="col-md-12">
                            <label for="input section"> Section</label>
                            <input type="text" class="form-control" name="section" id="section"
                                placeholder="Enter Your Section" value=" -->
                        <?php
// if (isset($rsedit['section']))
// {
//     echo $rsedit['section'];
// }
?>
                        <!-- "> -->
                        <!-- <span id="sectionError" class="error" style="display: none;"></span>
                        </div> -->
                        <br>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">

                    <!-- /.social-auth-links -->
                    <div class="social-auth-links text-center mb-3">
                        <input type="submit" class="btn btn-primary" name="submit" id="submit"
                            value=" Click Here to Register ">
                    </div>
                    <!-- /.social-auth-links -->

                </div>
                <!-- /.login-card-body -->
            </div>
        </div>

        </form>



    </div>

    <div style="height:50px"></div>
    <footer>
        <div class="footer-content">
            <h6>Department Of Computer Engineering</h6>
            <h6 class="year"><i class="bi bi-c-circle"></i> 2022-23</h6>
            <a href="../../aboutus.php" style="color:white !important">
                <h6>Guided by : Prof. Jyoti Wadmare</h6>
                <h6>Developed by : Dakshita Kolte, Kapil Bhatia, Palak Desai, Kartikeya Dangat</h6>
            </a>
        </div>
    </footer>
    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <!-- <script src="dist/js/adminlte.min.js"></script> -->

    <script>
    var phoneRegexOnlyNo = /^[0-9+]+$/;
    var phoneRegexMax10Degit = /^\d{10}$/;

    document.getElementById('employeenameError').textContent = '';
    document.getElementById('employeenameError').style.display = 'none';
    // document.getElementById('rollnoError').textContent = '';
    // document.getElementById('rollnoError').style.display = 'none';
    document.getElementById('emailError').textContent = '';
    document.getElementById('emailError').style.display = 'none';
    // document.getElementById('mothersnoError').textContent = '';
    // document.getElementById('mothersnoError').style.display = 'none';
    document.getElementById('employeesnoError').textContent = '';
    document.getElementById('employeesnoError').style.display = 'none';
    // document.getElementById('fathersnoError').textContent = '';
    // document.getElementById('fathersnoError').style.display = 'none';
    document.getElementById('passwordError').textContent = '';
    document.getElementById('passwordError').style.display = 'none';
    document.getElementById('confirmpasswordError').textContent = '';
    document.getElementById('confirmpasswordError').style.display = 'none';
    document.getElementById('dateofbirthError').textContent = '';
    document.getElementById('dateofbirthError').style.display = 'none';
    document.getElementById('courseError').textContent = '';
    document.getElementById('courseError').style.display = 'none';
    // document.getElementById('courseyearError').textContent = '';
    // document.getElementById('courseyearError').style.display = 'none';
    // document.getElementById('sectionError').textContent = '';
    // document.getElementById('sectionError').style.display = 'none';
    document.getElementById('experienceError').textContent = '';
    document.getElementById('experienceError').style.display = 'none';
    document.getElementById('associationError').textContent = '';
    document.getElementById('associationError').style.display = 'none';

    function confirmvalidation() {
        var isValid = true;

        if (document.getElementById('employeename').value === '') {
            fieldValidation();
            document.getElementById('employeename').focus();
            document.getElementById('employeename').scrollIntoView({
                behavior: 'smooth'
            });
            isValid = false;
        }
        // else if (document.getElementById('rollno').value === '') {
        //     fieldValidation();
        //     document.getElementById('rollno').focus();
        //     document.getElementById('rollno').scrollIntoView({
        //         behavior: 'smooth'
        //     });
        //     isValid = false;
        // }
        else if (document.getElementById('email_id').value === '') {
            fieldValidation();
            document.getElementById('email_id').focus();
            document.getElementById('email_id').scrollIntoView({
                behavior: 'smooth'
            });
            isValid = false;
        } else if (!document.getElementById('email_id').value.endsWith('.com')) {
            fieldValidation();
            document.getElementById('email_id').focus();
            document.getElementById('email_id').scrollIntoView({
                behavior: 'smooth'
            });
            isValid = false;
        }
        // else if (document.getElementById('mothers_no').value === '') {
        //     fieldValidation();
        //     document.getElementById('mothers_no').focus();
        //     document.getElementById('mothers_no').scrollIntoView({
        //         behavior: 'smooth'
        //     });
        //     isValid = false;
        // } else if (!document.getElementById('mothers_no').value.match(phoneRegexOnlyNo)) {
        //     fieldValidation();
        //     document.getElementById('mothers_no').focus();
        //     document.getElementById('mothers_no').scrollIntoView({
        //         behavior: 'smooth'
        //     });
        //     isValid = false;
        // } else if (!document.getElementById('mothers_no').value.match(phoneRegexMax10Degit)) {
        //     fieldValidation();
        //     document.getElementById('mothers_no').focus();
        //     document.getElementById('mothers_no').scrollIntoView({
        //         behavior: 'smooth'
        //     });
        //     isValid = false;
        // } else if (document.getElementById('fathers_no').value === '') {
        //     fieldValidation();
        //     document.getElementById('fathers_no').focus();
        //     document.getElementById('fathers_no').scrollIntoView({
        //         behavior: 'smooth'
        //     });
        //     isValid = false;
        // } else if (!document.getElementById('fathers_no').value.match(phoneRegexOnlyNo)) {
        //     fieldValidation();
        //     document.getElementById('fathers_no').focus();
        //     document.getElementById('fathers_no').scrollIntoView({
        //         behavior: 'smooth'
        //     });
        //     isValid = false;
        // } else if (!document.getElementById('fathers_no').value.match(phoneRegexMax10Degit)) {
        //     fieldValidation();
        //     document.getElementById('fathers_no').focus();
        //     document.getElementById('fathers_no').scrollIntoView({
        //         behavior: 'smooth'
        //     });
        //     isValid = false;
        // }
        else if (document.getElementById('employee_no').value === '') {
            fieldValidation();
            document.getElementById('employee_no').focus();
            document.getElementById('employee_no').scrollIntoView({
                behavior: 'smooth'
            });
            isValid = false;
        } else if (!document.getElementById('employee_no').value.match(phoneRegexOnlyNo)) {
            fieldValidation();
            document.getElementById('employee_no').focus();
            document.getElementById('employee_no').scrollIntoView({
                behavior: 'smooth'
            });
            isValid = false;
        } else if (!document.getElementById('employee_no').value.match(phoneRegexMax10Degit)) {
            fieldValidation();
            document.getElementById('employee_no').focus();
            document.getElementById('employee_no').scrollIntoView({
                behavior: 'smooth'
            });
            isValid = false;
        } else if (document.getElementById('password').value === '') {
            fieldValidation();
            document.getElementById('password').focus();
            document.getElementById('password').scrollIntoView({
                behavior: 'smooth'
            });
            isValid = false;
        } else if ((document.getElementById('password').value.length < 8) ||
            (!/[A-Z]/.test(document.getElementById('password').value)) ||
            (!/[a-z]/.test(document.getElementById('password').value)) ||
            (!/[!@#$%^&*()\-=_+[\]{};':"\\|,.<>/?]+/.test(document.getElementById('password').value)) ||
            (!/\d/.test(document.getElementById('password').value))) {
            fieldValidation();
            document.getElementById('password').focus();
            document.getElementById('password').scrollIntoView({
                behavior: 'smooth'
            });
            isValid = false;
        } else if (document.getElementById('confirmpassword').value === '') {
            fieldValidation();
            document.getElementById('confirmpassword').focus();
            document.getElementById('confirmpassword').scrollIntoView({
                behavior: 'smooth'
            });
            isValid = false;
        } else if (document.getElementById("confirmpassword").value != document.getElementById("password").value) {
            fieldValidation();
            document.getElementById('confirmpassword').focus();
            document.getElementById('confirmpassword').scrollIntoView({
                behavior: 'smooth'
            });
            isValid = false;
        } else if (document.getElementById('dateofbirth').value === '') {
            fieldValidation();
            document.getElementById('dateofbirth').focus();
            document.getElementById('dateofbirth').scrollIntoView({
                behavior: 'smooth'
            });
            isValid = false;
        } else if (document.getElementById('course').value === '') {
            fieldValidation();
            document.getElementById('course').focus();
            document.getElementById('course').scrollIntoView({
                behavior: 'smooth'
            });
            isValid = false;
        } else if (document.getElementById('teachexp').value === '') {
            fieldValidation();
            document.getElementById('teachexp').focus();
            document.getElementById('teachexp').scrollIntoView({
                behavior: 'smooth'
            });
            isValid = false;
        } else if (document.getElementById('association').value === '') {
            fieldValidation();
            document.getElementById('association').focus();
            document.getElementById('association').scrollIntoView({
                behavior: 'smooth'
            });
            isValid = false;
        }
        // else if (document.getElementById('courseyear').value === '') {
        //     fieldValidation();
        //     document.getElementById('courseyear').focus();
        //     document.getElementById('courseyear').scrollIntoView({
        //         behavior: 'smooth'
        //     });
        //     isValid = false;
        // }
        //  else if (document.getElementById('section').value === '') {
        //     fieldValidation();
        //     document.getElementById('section').focus();
        //     document.getElementById('section').scrollIntoView({
        //         behavior: 'smooth'
        //     });
        //     isValid = false;
        // }

        return isValid;
    }


    function validateemployeename() {
        if (document.getElementById('employeename').value === '') {
            document.getElementById('employeenameError').textContent = 'Original Name should not be empty.';
            document.getElementById('employeenameError').style.display = 'block';
        } else {
            document.getElementById('employeenameError').textContent = '';
            document.getElementById('employeenameError').style.display = 'none';
        }

    }

    // function validateRollno() {
    //     if (document.getElementById('rollno').value === '') {
    //         document.getElementById('rollnoError').textContent = 'Roll no should not be empty';
    //         document.getElementById('rollnoError').style.display = 'block';
    //     } else {
    //         document.getElementById('rollnoError').textContent = '';
    //         document.getElementById('rollnoError').style.display = 'none';
    //     }
    // }

    function validateEmail() {
        if (document.getElementById('email_id').value === '') {
            document.getElementById('emailError').textContent = 'Email ID should not be empty';
            document.getElementById('emailError').style.display = 'block';
        } else if (!document.getElementById('email_id').value.endsWith('.com')) {
            document.getElementById('emailError').textContent = 'Invalid Email ID';
            document.getElementById('emailError').style.display = 'block';
        } else {
            document.getElementById('emailError').textContent = '';
            document.getElementById('emailError').style.display = 'none';
        }
    }

    // function validateMotherNo() {
    //     if (document.getElementById('mothers_no').value === '') {
    //         document.getElementById('mothersnoError').textContent = 'Mothers no should not be empty';
    //         document.getElementById('mothersnoError').style.display = 'block';
    //     } else if (!document.getElementById('mothers_no').value.match(phoneRegexOnlyNo)) {
    //         document.getElementById('mothersnoError').textContent =
    //             'Please enter a valid phone number (digits and + only).';
    //         document.getElementById('mothersnoError').style.display = 'block';
    //     } else if (!document.getElementById('mothers_no').value.match(phoneRegexMax10Degit)) {
    //         document.getElementById('mothersnoError').textContent = 'Please enter a valid 10-digit phone number.';
    //         document.getElementById('mothersnoError').style.display = 'block';
    //     } else {
    //         document.getElementById('mothersnoError').textContent = '';
    //         document.getElementById('mothersnoError').style.display = 'none';
    //     }
    // }

    // function validateFatherNo() {
    //     if (document.getElementById('fathers_no').value === '') {
    //         document.getElementById('fathersnoError').textContent = 'Fathers no should not be empty';
    //         document.getElementById('fathersnoError').style.display = 'block';
    //     } else if (!document.getElementById('fathers_no').value.match(phoneRegexOnlyNo)) {
    //         document.getElementById('fathersnoError').textContent =
    //             'Please enter a valid phone number (digits and + only).';
    //         document.getElementById('fathersnoError').style.display = 'block';
    //     } else if (!document.getElementById('fathers_no').value.match(phoneRegexMax10Degit)) {
    //         document.getElementById('fathersnoError').textContent = 'Please enter a valid 10-digit phone number.';
    //         document.getElementById('fathersnoError').style.display = 'block';
    //     } else {
    //         document.getElementById('fathersnoError').textContent = '';
    //         document.getElementById('fathersnoError').style.display = 'none';
    //     }
    // }

    function validateemployeeNo() {
        if (document.getElementById('employee_no').value === '') {
            document.getElementById('employeesnoError').textContent = 'employee No should not be empty';
            document.getElementById('employeesnoError').style.display = 'block';
        } else if (!document.getElementById('employee_no').value.match(phoneRegexOnlyNo)) {
            document.getElementById('employeesnoError').textContent =
                'Please enter a valid phone number (digits and + only).';
            document.getElementById('employeesnoError').style.display = 'block';
        } else if (!document.getElementById('employee_no').value.match(phoneRegexMax10Degit)) {
            document.getElementById('employeesnoError').textContent = 'Please enter a valid 10-digit phone number.';
            document.getElementById('employeesnoError').style.display = 'block';
        } else {
            document.getElementById('employeesnoError').textContent = '';
            document.getElementById('employeesnoError').style.display = 'none';
        }
    }

    function validatePassword() {
        if (document.getElementById('password').value === '') {
            document.getElementById('passwordError').textContent = 'Password should not be empty';
            document.getElementById('passwordError').style.display = 'block';
        } else if (document.getElementById('password').value.length < 8) {
            document.getElementById('passwordError').textContent = 'Password should be at least 8 characters long.';
            document.getElementById('passwordError').style.display = 'block';
        } else if (!/[A-Z]/.test(document.getElementById('password').value)) {
            document.getElementById('passwordError').textContent =
                'Password should contain at least one uppercase letter.';
            document.getElementById('passwordError').style.display = 'block';
        } else if (!/[a-z]/.test(document.getElementById('password').value)) {
            document.getElementById('passwordError').textContent =
                'Password should contain at least one lowercase letter.';
            document.getElementById('passwordError').style.display = 'block';
        } else if (!/[!@#$%^&*()\-=_+[\]{};':"\\|,.<>/?]+/.test(document.getElementById('password').value)) {
            document.getElementById('passwordError').textContent =
                'Password should contain at least one special character.';
            document.getElementById('passwordError').style.display = 'block';
        } else if (!/\d/.test(document.getElementById('password').value)) {
            document.getElementById('passwordError').textContent = 'Password should contain at least one number.';
            document.getElementById('passwordError').style.display = 'block';
        } else {
            document.getElementById('passwordError').textContent = '';
            document.getElementById('passwordError').style.display = 'none';
        }
    }

    function validateConfirmPassword() {
        if (document.getElementById('confirmpassword').value === '') {
            document.getElementById('confirmpasswordError').textContent = 'Password should not be empty';
            document.getElementById('confirmpasswordError').style.display = 'block';
        } else if (document.getElementById("confirmpassword").value !== document.getElementById("password").value) {
            document.getElementById('confirmpasswordError').textContent = 'Password and Confirm password not matching';
            document.getElementById('confirmpasswordError').style.display = 'block';
        } else {
            document.getElementById('confirmpasswordError').textContent = '';
            document.getElementById('confirmpasswordError').style.display = 'none';
        }
    }

    function validateDob() {
        if (document.getElementById('dateofbirth').value === '') {
            document.getElementById('dateofbirthError').textContent = 'Date of Birth should not be empty';
            document.getElementById('dateofbirthError').style.display = 'block';
        } else {
            document.getElementById('dateofbirthError').textContent = '';
            document.getElementById('dateofbirthError').style.display = 'none';
        }
    }

    function validateCourse() {
        if (document.getElementById('course').value === '') {
            document.getElementById('courseError').textContent = 'Course should not be empty';
            document.getElementById('courseError').style.display = 'block';
        } else {
            document.getElementById('courseError').textContent = '';
            document.getElementById('courseError').style.display = 'none';
        }
    }

    function validateexperience() {
        if (document.getElementById('teachexp').value === '') {
            document.getElementById('experienceError').textContent = 'Teaching Experience should not be empty';
            document.getElementById('experienceError').style.display = 'block';
        } else {
            document.getElementById('experienceError').textContent = '';
            document.getElementById('experienceError').style.display = 'none';
        }
    }

    function validateassociation() {
        if (document.getElementById('association').value === '') {
            document.getElementById('associationError').textContent = 'Industry Experience should not be empty';
            document.getElementById('associationError').style.display = 'block';
        } else {
            document.getElementById('associationError').textContent = '';
            document.getElementById('associationError').style.display = 'none';
        }
    }

    // function validateCourseYear() {
    //     if (document.getElementById('courseyear').value === '') {
    //         document.getElementById('courseyearError').textContent = 'Course Year should not be empty';
    //         document.getElementById('courseyearError').style.display = 'block';
    //     } else {
    //         document.getElementById('courseyearError').textContent = '';
    //         document.getElementById('courseyearError').style.display = 'none';
    //     }
    // }

    // function validateSection() {
    //     if (document.getElementById('section').value === '') {
    //         document.getElementById('sectionError').textContent = 'Section should not be empty';
    //         document.getElementById('sectionError').style.display = 'block';
    //     } else {
    //         document.getElementById('sectionError').textContent = '';
    //         document.getElementById('sectionError').style.display = 'none';
    //     }
    // }






    document.getElementById('employeename').addEventListener('change', validateemployeename);
    // document.getElementById('rollno').addEventListener('change', validateRollno);
    document.getElementById('email_id').addEventListener('change', validateEmail);
    // document.getElementById('mothers_no').addEventListener('change', validateMotherNo);
    // document.getElementById('fathers_no').addEventListener('change', validateFatherNo);
    document.getElementById('employee_no').addEventListener('change', validateemployeeNo);
    document.getElementById('password').addEventListener('change', validatePassword);
    document.getElementById('password').addEventListener('blur', validateConfirmPassword);
    document.getElementById('confirmpassword').addEventListener('change', validateConfirmPassword);
    document.getElementById('confirmpassword').addEventListener('blur', validateConfirmPassword);
    document.getElementById('dateofbirth').addEventListener('change', validateDob);
    document.getElementById('course').addEventListener('change', validateCourse);
    // document.getElementById('courseyear').addEventListener('change', validateCourseYear);
    // document.getElementById('section').addEventListener('change', validateSection);
    document.getElementById('teachexp').addEventListener('change', validateexperience);
    document.getElementById('association').addEventListener('change', validateassociation);






    function fieldValidation() {
        validateemployeename();
        // validateRollno();
        validateEmail();
        // validateMotherNo();
        // validateFatherNo();
        validateemployeeNo();
        validatePassword();
        validateConfirmPassword();
        validateDob();
        validateCourse();
        validateexperience();
        validateassociation();
        // validateCourseYear();
        // validateSection();
    }
    </script>
</body>


</html>