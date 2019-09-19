<?php
session_start();
if($_SESSION['status']!="login"){
  header("location:../index.php?pesan=belum_login");
}
include '../connection/connection.php';
//change Transaksi
$id = $_POST['id_transaksi'];
$jumlah_buku = $_POST['jumlah'];
$buku = $_POST['id'];
//Insert Transaksi
// $buku_id=$_POST['buku_id'];
$siswa_id=$_POST['siswa_id'];
$tanggal_pinjam=$_POST['tanggal_pinjam'];
$tanggal_kembali=$_POST['tanggal_kembali'];
$kembali =date('m/d/Y');


$query = "UPDATE transaksi SET jumlah_pinjam = (jumlah_pinjam-$jumlah_buku) WHERE id_transaksi = $id";
$query2="UPDATE `buku` SET jumlah =(jumlah+$jumlah_buku) WHERE id=$buku";
$query3="INSERT INTO `transaksi` (`id_transaksi`, `buku_id`, `siswa_id`, `tanggal_pinjam`, `tanggal_kembali`,`sudah_kembali`,`status`, `jumlah_pinjam`) VALUES (NULL, '$buku', '$siswa_id', '$tanggal_pinjam', '$tanggal_kembali', '$kembali','Sudah Dikembalikan', '$jumlah_buku');";

  if (mysqli_query($con, $query) & (mysqli_query($con,$query2))& (mysqli_query($con,$query3)) ) {
    ?>
    <script language='JavaScript'>
      alert ('Data Berhasil Dikembalikan')

      document.location = 'dataPeminjaman.php'
    </script>

    <?php

  }else {
    ?>
    <script language='JavaScript'>
      alert ('Peyimpanan Gagal')
      // document.location = 'dataPeminjaman.php'
    </script>
    <?php
  }
