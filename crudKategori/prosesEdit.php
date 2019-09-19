<?php
session_start();
if($_SESSION['status']!="login"){
  header("location:../index.php?pesan=belum_login");
}
// koneksi database
include '../connection/connection.php';



// menangkap data yang di kirim dari form
$id			= $_POST['id'];
$nama		= mysqli_real_escape_string($con, $_POST['nama_kategori']);

// update data ke database
$query="UPDATE `kategori` SET `nama_kategori` = '$nama' WHERE `kategori`.`id_kategori` = $id";
if (mysqli_query($con, $query)) {
  ?>
  <script language='JavaScript'>
    alert ('Data Berhasil Diubah')
    document.location = 'dataKategori.php'

  </script>

  <?php

}else {
  ?>
  <script language='JavaScript'>
    alert ('Peyimpanan Gagal')
    document.location = 'dataKategori.php'

  </script>
  <?php
}
