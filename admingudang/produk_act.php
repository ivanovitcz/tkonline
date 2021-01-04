<?php 
include '../koneksi.php';
$kategori = $_POST['kategori'];
$nama  = $_POST['nama'];
$harga = $_POST['harga'];
$jumlah = $_POST['jumlah'];
$panjang = $_POST['panjang'];
$lebar = $_POST['lebar'];
$supplier = $_POST['supplier'];


mysqli_query($koneksi,"INSERT into bahanbaku values (NULL,'$kategori','$nama','$harga','$jumlah','$panjang','$lebar','$supplier')");

header("location:produk.php");
