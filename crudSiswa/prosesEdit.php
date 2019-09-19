<?php
session_start();
if($_SESSION['status']!="login"){
  header("location:../index.php?pesan=belum_login");
}
// koneksi database
  include '../connection/connection.php';

$id=$_POST['id'];
$nis=$_POST['nis'];
$nama=mysqli_real_escape_string($con,$_POST['nama']);
$tempat_lahir=mysqli_real_escape_string($con,$_POST['tempat_lahir']);
$tanggal_lahir=mysqli_real_escape_string($con,$_POST['tanggal_lahir']);
$jenis_kelamin=$_POST['jenis_kelamin'];
$alamat=mysqli_real_escape_string($con,$_POST['alamat']);
$agama=$_POST['agama'];
$kelas=$_POST['id_kelas'];

$query="update siswa set nis='$nis',nama='$nama',alamat='$alamat',id_kelas='$kelas',tempat_lahir='$tempat_lahir',tanggal_lahir='$tanggal_lahir',jenis_kelamin='$jenis_kelamin',agama='$agama' WHERE `siswa`.`id_siswa` ='$id'";
if (mysqli_query($con, $query)) {
  ?>
  <script language='JavaScript'>
    alert ('Data Berhasil Diubah')
    document.location = 'dataSiswa.php'
  </script>

  <?php

}else {
  ?>
  <script language='JavaScript'>
    alert ('Peyimpanan Gagal')
    // document.location = 'dataSiswa.php'
  </script>
  <?php
}
