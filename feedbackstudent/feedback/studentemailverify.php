<?php
include "database.php";

$sql1 = "select * from student where verification_code = '$_GET[code]'";

if ($result1 = mysqli_query($con, $sql1)) {
    $rowcount = mysqli_num_rows($result1);
}
if ($rowcount > 0) {
    $sql = "UPDATE `student` SET verification_code='', status='Active'  WHERE verification_code='$_GET[code]'";
    mysqli_query($con, $sql);
    if (mysqli_affected_rows($con) == 1) {
        echo "<script>alert('Account Verified successfully...');</script>";
        echo "<script>window.location='../../index.php';</script>";
    }
}
