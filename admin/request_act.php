<?php 
  include '../koneksi.php';
  if($_POST['simpan'] == 'edit') {
    $id = $_GET['id'];
    $berat = $_POST['berat'];
    $harga = $_POST['harga'];

    mysqli_query($koneksi, "UPDATE request SET request_berat='$berat', request_harga='$harga' WHERE request_id ='$id'");
    header("location:request.php");
    
  }

?>