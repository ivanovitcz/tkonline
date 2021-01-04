<?php 
include '../koneksi.php';
$id = $_GET['id'];

mysqli_query($koneksi, "delete from bahanbaku where bahanbaku_id='$id'");

header("location:produk.php");
