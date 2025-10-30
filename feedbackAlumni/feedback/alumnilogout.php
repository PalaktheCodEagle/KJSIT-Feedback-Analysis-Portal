<?php
if (session_status() === PHP_SESSION_NONE) {session_start();}
unset($_SESSION['alumniid']);
echo "<script>window.location='../../index.php';</script>";
