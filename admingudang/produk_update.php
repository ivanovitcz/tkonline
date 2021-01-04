<?php 
include '../koneksi.php';
$id = $_GET['id'];
$kategori = $_POST['kategori'];
$nama  = $_POST['nama'];
$harga = $_POST['harga'];
$jumlah = $_POST['jumlah'];
$panjang = $_POST['panjang'];
$lebar = $_POST['lebar'];
$supplier = $_POST['supplier'];


mysqli_query($koneksi,"UPDATE bahanbaku SET bahanbaku_kategori='$kategori',bahanbaku_nama='$nama',bahanbaku_harga='$harga',bahanbaku_jumlah='$jumlah',bahanbaku_panjang='$panjang',bahanbaku_lebar='$lebar',bahanbaku_suplier='$supplier' WHERE bahanbaku_id='$id'");

header("location:produk.php");

