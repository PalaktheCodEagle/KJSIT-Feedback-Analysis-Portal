<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
error_reporting(0);
date_default_timezone_set("Asia/Calcutta");
$dttim = date("Y-m-d H:i:s");
$dt = date("Y-m-d");
include "database.php";
$url = 'http://' . $_SERVER['HTTP_HOST'];

if (isset($_SESSION['peersid'])) {
    echo "<script>window.location='peersdashboard.php';</script>";
}
//###
if (isset($_POST['btnsubmit'])) {
    $sql = "SELECT * FROM peers WHERE email_id='$_POST[email]' and status='Active'";
    $qsql = mysqli_query($con, $sql);
    //print_r($sql); die();
    echo mysqli_error($con);
    if (mysqli_num_rows($qsql) >= 1) {

        //$rs = mysqli_fetch_array($qsql);
        $_SESSION['resetid'] = rand();
        $rspro = mysqli_fetch_array($qsql);

        // $message = "Hello $rspro[peersname],<br>
		// You have sent request to recover password. Kindly press below link to reset password...<br><br>
		// Visit Link - <b><a href='$url/feedbackpeers/feedback/peersresetpassword.php?resetid=$_SESSION[resetid]&id=$rspro[0]'>Click here</a></b><br>
		// ";
        //echo $rspro['rollno'];

        $message = "Dear $rspro[peersname],<br>
            <br>
            We have received a request to recover your password for your account. To proceed with resetting your password, kindly follow the link below:
            <br><br>
            Reset Password:<b><a href='$url/feedbackpeers/feedback/peersresetpassword.php?resetid=$_SESSION[resetid]&id=$rspro[0]'>Click here</a></b>
            <br><br>
            By clicking on the provided link, you will be redirected to a secure page where you can set a new password for your account.
            <br><br>
            Please note that for security purposes, this password recovery link will expire after 24 hours. If you do not reset your password within the specified time frame, you will need to initiate the recovery process again.
            <br><br>
            If you did not request a password recovery, please disregard this email. Your account remains secure, and no action is required.
            <br><br>
            Should you encounter any difficulties or have any questions, please don't hesitate to reach out to our support team at vlos.tech@somaiya.edu We are available to assist you.
            <br><br>
            Thank you for your cooperation.
            <br><br>
            Best regards,
            <br>
            KJSIT Stakeholders Feedback Team";
        include "phpmailer.php";

        sendmail($rspro['email_id'], $rspro['peersname'], "Password Recovery Mail", $message);

        echo "<script>alert('Password reset link sent to your Email ID..');</script>";
        echo "<script>window.location='../../index.php';</script>";
    } else {
        echo "<script>alert('You have entered invalid login credentials..');</script>";
    }
}
//###
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>peers Feedback System - peers Forgot Password Window</title>
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

<body style="background-image: linear-gradient(#9b2a286b,#00000000), url(greybg.jpg); background-size: cover;">
    <style>
    .heading {

        text-align: center;
        font-weight: bolder;
        background-color: #9b2928;
        color: white;
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

    .card {

        border: 1px solid red;
        box-shadow: 5px 5px 8px white;
    }

    .login-box {

        border-radius: 15px;
    }

    @media (max-width:640px) {
        #trust {
            width: 50px;
            height: 25px;
        }
    }

    @media (max-width:789px) {
        #trust {
            width: 50px;
            height: 25px;
        }
    }

    @media (min-width: 768px) {
        .col-md-3 {
            -ms-flex: 0 0 25%;
            flex: 0 0 25%;
            max-width: fit-content;

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

    /* ===== Google Font Import - Poformsins ===== */
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

    .main {
        display: flex;
        align-items: center;
        justify-content: center;
    }


    .container {
        position: relative;
        max-width: 430px;
        width: 100%;
        background: #fff;
        border-radius: 10px;
        box-shadow: 2px 2px 2px 2px rgba(0, 0, 0, 0.395);
        overflow: hidden;
        margin: 0 20px;

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
    .container .forms {
        display: flex;
        align-items: center;
        /* height: 440px; */
        width: 200%;
        transition: height 0.2s ease;

    }

    .forms {
        box-shadow: 10px 10px 10px red;
    }

    .container .form {
        width: 50%;
        padding: 30px;
        background-color: #fff;
        transition: margin-left 0.18s ease;
    }

    .container.active .login {
        margin-left: -50%;
        opacity: 0;
        transition: margin-left 0.18s ease, opacity 0.15s ease;
    }

    .container .signup {
        opacity: 0;
        transition: opacity 0.09s ease;
    }

    .container.active .signup {
        opacity: 1;
        transition: opacity 0.2s ease;
    }

    .container.active .forms {
        height: 600px;
    }

    .container .form .title {
        position: relative;
        font-size: 27px;
        font-weight: 600;
    }

    .form .title::before {
        content: '';
        position: absolute;
        left: 0;
        bottom: 0;
        height: 3px;
        width: 30px;
        border-radius: 25px;
    }

    .form .input-field {
        position: relative;
        height: 50px;
        width: 100%;
        margin-top: 30px;
    }

    .input-field input {
        position: absolute;
        height: 100%;
        width: 100%;
        padding: 0 35px;
        border: none;
        outline: none;
        font-size: 16px;
        border-bottom: 2px solid #ccc;
        border-top: 2px solid transparent;
        transition: all 0.2s ease;
    }

    .input-field input:is(:focus, :valid) {
        border-bottom-color: #4070f4;
    }

    .input-field i {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        color: #999;
        font-size: 23px;
        transition: all 0.2s ease;
    }

    .input-field input:is(:focus, :valid)~i {
        color: #4070f4;
    }

    .input-field i.icon {
        left: 0;
    }

    .input-field i.showHidePw {
        right: 0;
        cursor: pointer;
        padding: 10px;
    }

    .form .checkbox-text {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-top: 20px;
    }

    .checkbox-text .checkbox-content {
        display: flex;
        align-items: center;
    }

    .checkbox-content input {
        margin-right: 10px;
        accent-color: #4070f4;
    }

    .form .text {
        color: #333;
        font-size: 14px;
    }

    .form a.text {
        color: #9b2928;
        text-decoration: none;
    }

    .form a:hover {
        text-decoration: underline;
    }

    .form .button {
        margin-top: 35px;
    }

    .form .button input {
        background-color: #9b2928;
        border: none;
        color: #fff;
        font-size: 17px;
        font-weight: 500;
        letter-spacing: 1px;
        border-radius: 6px;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .button input:hover {
        background-color: #9b2928;

    }

    .form .login-signup {
        margin-top: 30px;
        text-align: center;
    }

    .heading {
        border-radius: 0.5rem;
        text-align: center;
        margin: auto;
        color: #000;
        font-size: xx-large;
        font-family: 'PT Sans', sans-serif;
        font-weight: 700;

    }

    .inputs {
        display: flex;
        flex-direction: column;
        margin-bottom: 20px;
        margin: auto;
        margin-top: 25px;
    }

    .inputs label {
        font-size: 13px;
        color: #000000;
        font-weight: 600;
        font-size: medium;
        font-family: 'PT Sans', sans-serif;
    }

    .inputs input {
        flex: 1;
        padding: 13px;
        border: 1px solid #ebebeb;
        background-color: #ebebeb;
        border-radius: 20px;
        font-size: 16px;
        transition: all 0.2s ease-out;
        color: #000;
        font-weight: 300;
        font-family: 'PT Sans', sans-serif;
    }

    .form-check {
        margin-top: 10px;
        display: inline-block;
    }

    .form-check .forgot {
        text-decoration: none;
        color: #9b2928;
        /* margin-left: 10px;  */
        font-weight: 600;
        float: left;
        margin-right: 100px;
    }

    .inputs label {
        font-size: 13px;
        color: #000000;
        font-weight: 600;
        font-size: medium;
        font-family: 'PT Sans', sans-serif;
    }

    .forgot {
        float: right;
    }

    .forgot a {
        color: #9b2928;
        text-decoration: none;
        font-family: 'PT Sans', sans-serif;
        font-weight: 600;
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

    @media (min-width:317px)and (max-width:445px) {
        .rememberme {
            margin: 0px;
            position: relative;
            justify-content: center;

        }

        .form-check .forgot {
            text-decoration: none;
            color: #9b2928;
            /* margin-left: 10px;  */
            font-weight: 600;
            float: left;
            margin-right: 100px;
        }

        .forgot {
            position: relative;
        }
    }

    @media (min-width:180px)and (max-width:329px) {
        .icons {
            margin-left: 10px;
        }
    }

    @media (min-width:220px)and (max-width:332px) {
        .forgot {
            display: block;
            float: left;
        }
    }

    @media (min-width:325px)and (max-width:395px) {
        .icons {
            margin-left: 10px;
        }
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
    <br>
        <br>
        <br>
        <div class="main">
            <div class="container">
                
                <!-- /.login-logo -->
                <div class="forms">
                    <div class="form login">
                        <p class="login-box-msg"><b>RECOVER PASSWORD</b></p>
                        <form action="" method="post">
                            <div class="input-group mb-3">
                                <input type="email" name="email" id="email" class="form-control"
                                    placeholder="Enter Email ID">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-envelope"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="social-auth-links text-center mb-3">
                                <input type="submit" class="btn btn-block btn-primary"
                                    value=" Click here to Recover Password " name="btnsubmit">
                            </div>
                            <hr>
                            <!-- /.social-auth-links -->
                        </form>
                    </div>
                    <!-- /.login-card-body -->
                </div>
            </div>
        </div>
            <br>
        <br>
        <br>
        <br>
   
    <!-- /.login-box -->
    <footer>
        <div class="footer-content">
            <h6>Department Of Computer Engineering</h6>
            <h6 style="font-size: 16px;"><i class="bi bi-c-circle"></i> 2022-23</h6>
            <a href="../../aboutus.php" style="color:white !important">
                <h6>Guided by : Prof. Jyoti Wadmare</h6>
                <h6>Developed by : Dakshita Kolte, Kapil Bhatia, Palak Desai, Kartikeya Dangat</h6>
            </a>
        </div>
    </footer>


        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>

</body>

</html>