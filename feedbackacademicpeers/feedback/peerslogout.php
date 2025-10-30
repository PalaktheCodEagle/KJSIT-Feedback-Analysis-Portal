<?php
if (session_status() === PHP_SESSION_NONE) {session_start();}
unset($_SESSION['peersid']);
echo "<script>window.location='../../index.php';</script>";