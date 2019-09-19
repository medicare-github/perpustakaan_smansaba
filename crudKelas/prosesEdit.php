<?php
session_start();
if($_SESSION['status']!="login"){
  header("location:../index.php?pesan=belum_login");
}
// koneksi database
include '../connection/connection.php';



// menangkap data yang di kirim dari form
$id			= $_POST['id_kelas'];
$nama_kelas			= mysqli_real_escape_string($con, $_POST['nama_kelas']);
$des		= mysqli_real_escape_string($con, $_POST['deskripsi']);

// update data ke database
$query="UPDATE `kelas` SET `nama_kelas` = '$nama_kelas',`deskripsi` = '$des' WHERE `kelas`.`id_kelas` = $id";
if (mysqli_query($con, $query)) {
  ?>
  <script language='JavaScript'>
    alert ('Data Berhasil Diubah')
    document.location = 'dataKelas.php'

  </script>

  <?php

}else {
  ?>
  <script language='JavaScript'>
    alert ('Peyimpanan Gagal')
    // document.location = 'dataKelas.php'

  </script>
  <?php
}
