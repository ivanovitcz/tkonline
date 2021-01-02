<?php 
  include('koneksi.php');
  session_start();

  function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
  }

  if($_POST['simpan'] == 'create') {
    $id = $_SESSION['customer_id'];
    $id_kategori = $_POST['kategori'];
    $keterangan = $_POST['keterangan'];
    $jumlah = $_POST['jumlah'];

    $gambar = $_FILES['gambar']['name'];
    $ext = pathinfo($gambar, PATHINFO_EXTENSION);
    $target_dir = "gambar/request/";
    $filename = generateRandomString().".".$ext;
    $target_file = $target_dir . $filename ;
    move_uploaded_file($_FILES['gambar']['tmp_name'],$target_dir.$filename);

    mysqli_query($koneksi, "INSERT INTO `request` (`request_id`, `request_kategori`, `request_customer`, `request_gambar`, `request_status`, `request_keterangan`, `request_harga`, `request_jumlah`) VALUES (NULL, '$id_kategori', '$id', '$filename', 'Tunggu', '$keterangan', NULL, '$jumlah')");

	  header("location:request.php");

  }
?>