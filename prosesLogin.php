<?php
// aktif session
session_start();
include "connection/connection.php";

$username	= ($_POST['user']);
$password	= ($_POST['pass']);

$data = mysqli_query($con,"select * from user where username='$username' and password='$password'");

// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($data);

if($cek > 0){
	$_SESSION['username'] = $username;
	$_SESSION['status'] = "login";
	header("location:Dashboard/dashboard.php");
}else{
	header("location:index.php?pesan=gagal");
}
?>
