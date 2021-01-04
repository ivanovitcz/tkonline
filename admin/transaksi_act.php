<?php
  include '../koneksi.php';
  $id = $_GET['id'];
  $resi = $_POST['resi'];
  
  mysqli_query($koneksi, "UPDATE invoice SET invoice_resi='$resi' WHERE invoice_id ='$id'");
  header("location:transaksi.php");

?>