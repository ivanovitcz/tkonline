<?php 
include '../koneksi.php';
$kategori = $_POST['kategori'];
$nama  = $_POST['nama'];
$harga = $_POST['harga'];
$jumlah = $_POST['jumlah'];
$jumlah = $_POST['panjang'];
$jumlah = $_POST['lebar'];


$rand = rand();

mysqli_query($koneksi, "insert into produk values (NULL,'$kategori','$nama','$harga','$jumlah','$panjang','$lebar')");


header("location:produk.php");