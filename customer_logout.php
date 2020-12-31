<?php 

include 'koneksi.php';

session_start();

unset($_SESSION['customer_id']);
unset($_SESSION['customer_status']);
unset($_SESSION['role']);

header("location:index.php");
?>