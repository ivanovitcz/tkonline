<?php 
include '../koneksi.php';
$id = $_GET['id'];
$data = mysqli_query($koneksi, "select * from admingudang where admingudang_id='$id'");
$d = mysqli_fetch_assoc($data);
$foto = $d['admingudang_foto'];
unlink("../gambar/user/$foto");
mysqli_query($koneksi, "delete from admingudang where admingudang_id='$id'");
header("location:admin.php");
