<?php
if (session_status() === PHP_SESSION_NONE) {session_start();}
unset($_SESSION['facultyid']);
echo "<script>window.location='../../index.php';</script>";
