<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
error_reporting(0);
include "testmobile.php";
date_default_timezone_set("Asia/Calcutta");
$dttim = date("Y-m-d H:i:s");
$dt = date("Y-m-d");
if (basename($_SERVER['PHP_SELF']) == "admindashboard.php" || basename($_SERVER['PHP_SELF']) == "adminprofile.php" || basename($_SERVER['PHP_SELF']) == "adminchangepassword.php" || basename($_SERVER['PHP_SELF']) == "feedbacktopicadmin.php" || basename($_SERVER['PHP_SELF']) == "viewfeedbacktopicadmin.php" || basename($_SERVER['PHP_SELF']) == "employee.php" || basename($_SERVER['PHP_SELF']) == "viewemployee.php" || basename($_SERVER['PHP_SELF']) == "viewfeedbackreport.php" || basename($_SERVER['PHP_SELF']) == "employee1.php" || basename($_SERVER['PHP_SELF']) == "viewemployee1.php" || basename($_SERVER['PHP_SELF']) == "course.php" || basename($_SERVER['PHP_SELF']) == "viewcourse.php" || basename($_SERVER['PHP_SELF']) == "admin_feedbackquestion_success.php" || basename($_SERVER['PHP_SELF']) == "admin.php" || basename($_SERVER['PHP_SELF']) == "viewadmin.php") {
    $sidemenu = "admin";
    include "adminheader.php";
}
if (basename($_SERVER['PHP_SELF']) == "employeedashboard.php" || basename($_SERVER['PHP_SELF']) == "participatefeedback.php" || basename($_SERVER['PHP_SELF']) == "viewmyfeedback.php" || basename($_SERVER['PHP_SELF']) == "employeeprofile.php" || basename($_SERVER['PHP_SELF']) == "employeechangepassword.php" || basename($_SERVER['PHP_SELF']) == "feedbackpanel.php" || basename($_SERVER['PHP_SELF']) == "feedbackquestion_success.php") {
    $sidemenu = "employee";
    include "employeeheader.php";
}
