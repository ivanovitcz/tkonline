<?php 
// menghubungkan dengan koneksi
include 'koneksi.php';

// menangkap data yang dikirim dari form
$username = mysqli_real_escape_string($koneksi, $_POST['username']);
$password = mysqli_real_escape_string($koneksi, $_POST['password']);

$login = mysqli_query($koneksi, "SELECT * FROM admingudang WHERE admingudang_username='$username' AND admingudang_password='$password'");
$cek = mysqli_num_rows($login);

if($cek > 0){
	session_start();
	$data = mysqli_fetch_assoc($login);
	$_SESSION['id'] = $data['admingudang_id'];
	$_SESSION['nama'] = $data['admingudang_nama'];
	$_SESSION['username'] = $data['admingudang_username'];
	$_SESSION['status'] = "login";

	header("location:admingudang/");
}else{
	header("location:login2.php?alert=gagal");
}
