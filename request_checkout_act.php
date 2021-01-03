<?php 
include 'koneksi.php';

session_start();

$id_customer = $_SESSION['customer_id'];

$tanggal = date('Y-m-d');

$nama = $_POST['nama'];
$hp = $_POST['hp'];
$alamat = $_POST['alamat'];

$provinsi = $_POST['provinsi2'];
$kabupaten = $_POST['kabupaten2'];

$kurir = $_POST['kurir'] ." - ". $_POST['service'];
$berat = $_POST['berat'];

$ongkir = $_POST['ongkir2'];

$total_bayar = $_POST['total_bayar']+$ongkir;

mysqli_query($koneksi,"insert into invoice values(NULL,'$tanggal','$id_customer','$nama','$hp','$alamat','$provinsi','$kabupaten','$kurir','$berat','$ongkir','$total_bayar','0','','')")or die(mysqli_error($koneksi));

$last_id = mysqli_insert_id($koneksi);


// transaksi
$invoice = $last_id;


$request = $_POST['request_id'];
$jumlah = $_POST['jumlah'];
$harga = $_POST['total_bayar'];

mysqli_query($koneksi,"insert into transaksi values(NULL,'$invoice','$request',NULL,'$jumlah','$harga')");


//update status request

mysqli_query($koneksi, "UPDATE request SET request_status='Invoice Sudah Diisi' WHERE request_id ='$request'");

header("location:customer_pesanan.php?alert=sukses");