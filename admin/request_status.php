<?php 
include '../koneksi.php';
$request  = $_POST['request'];
$status  = $_POST['status'];

mysqli_query($koneksi, "update request set request_status='$status' where request_id='$request'");

header("location:request.php");