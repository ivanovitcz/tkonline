<?php 
include '../koneksi.php';
$id = $_GET['id'];

mysqli_query($koneksi, "delete from request where request_id='$id'");

mysqli_query($koneksi,"delete from transaksi where transaksi_request='$id'");

header("location:request.php");