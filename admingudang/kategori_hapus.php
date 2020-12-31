<?php 
include '../koneksi.php';
$id = $_GET['id'];

mysqli_query($koneksi, "delete from kategori2 where kategori_id='$id'");


mysqli_query($koneksi,"update bahanbaku set bahanbaku_kategori='1' where bahanbaku_kategori='$id'");

header("location:kategori.php");
