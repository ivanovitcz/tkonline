<?php 
include '../koneksi.php';
date_default_timezone_set("Asia/Jakarta");

if($_POST['simpan'] == 'Tambah') {

  $kategori = $_POST['kategori'];
  $nama  = $_POST['nama'];
  $harga = $_POST['harga'];
  $jumlah = $_POST['jumlah'];
  $panjang = $_POST['panjang'];
  $lebar = $_POST['lebar'];
  $supplier = $_POST['supplier'];
  $tanggal = date("Y-m-d H:i:s");

  mysqli_query($koneksi,"INSERT into bahanbaku values (NULL,'$kategori','$nama','$harga','$jumlah','$panjang','$lebar','$supplier')");
  mysqli_query($koneksi,"INSERT into transaksi_bahanbaku values (NULL,'$kategori','$nama','$supplier','$jumlah','$harga','$panjang','$lebar','$tanggal')");
  header("location:produk.php");

}

if($_POST['simpan'] == 'Tambah Stok') {

  $id = $_GET['id'];
  $bbaku = mysqli_query($koneksi, "select * from bahanbaku where bahanbaku_id='$id'");
  $i = mysqli_fetch_assoc($bbaku);
  $kategori = $i['bahanbaku_kategori'];
  $total = $i['bahanbaku_jumlah'] + $_POST['jumlah'];
  $panjang = $i['bahanbaku_panjang'];
  $lebar = $i['bahanbaku_lebar'];

  $nama  = $_POST['nama'];
  $harga = $_POST['harga'];
  $jumlah = $_POST['jumlah'];
  $supplier = $_POST['supplier'];
  $tanggal = date("Y-m-d H:i:s");

  mysqli_query($koneksi,"UPDATE bahanbaku SET bahanbaku_nama='$nama', bahanbaku_jumlah='$total', bahanbaku_suplier='$supplier', bahanbaku_harga='$harga' WHERE bahanbaku_id='$id'");
  mysqli_query($koneksi,"INSERT into transaksi_bahanbaku values (NULL,'$kategori','$nama','$supplier','$jumlah','$harga','$panjang','$lebar','$tanggal')");
  header("location:produk.php");

}
