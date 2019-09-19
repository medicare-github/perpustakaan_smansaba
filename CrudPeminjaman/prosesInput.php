<?php
session_start();
if($_SESSION['status']!="login"){
  header("location:../index.php?pesan=belum_login");
}
require '../connection/connection.php';
$siswa=$_POST['siswa_id'];
$buku=$_POST['buku_id'];
$jumlah_buku=$_POST['jumlah'];
$pinjam=$_POST['tanggal_pinjam'];
$kembali=$_POST['tanggal_kembali'];

$query="SELECT *FROM buku WHERE id=$buku";
$result=mysqli_query($con,$query);
while ($data=mysqli_fetch_object($result)):

  if ($jumlah_buku <= $data->jumlah) {

    $query="INSERT INTO `transaksi` (`id_transaksi`, `buku_id`, `siswa_id`, `tanggal_pinjam`, `tanggal_kembali`, `status`, `jumlah_pinjam`) VALUES (NULL, '$buku', '$siswa', '$pinjam', '$kembali', 'Belum Dikembalikan', '$jumlah_buku');";
    $query2="UPDATE `buku` SET jumlah =(jumlah-$jumlah_buku) WHERE id=$buku";


    if (mysqli_query($con, $query) & (mysqli_query($con,$query2)) ) {
        ?>
    		<script language='JavaScript'>
          alert('Data Peminjaman terbaru Berhasil di simpan')
    			document.location = 'inputPeminjaman.php'
    		</script>

      	<?php

      }else {
    		?>
    		<script language='JavaScript'>
    			alert ('Peyimpanan Gagal')
          document.location = 'inputPeminjaman.php'
    		</script>
    		<?php
      }

    // code...
  }else {
    ?>
    <script language='JavaScript'>
      alert ('Peyimpanan Gagal di Karenakan Stok Kurang')
      document.location = 'inputPeminjaman.php'
    </script>
    <?php
  }
endwhile;

   ?>
