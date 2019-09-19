<?php
session_start();
if($_SESSION['status']!="login"){
  header("location:../index.php?pesan=belum_login");
}

require '../connection/connection.php';
$kode_buku=mysqli_real_escape_string($con,$_POST['kode']);
$judul_buku=mysqli_real_escape_string($con,$_POST['judul']);
$kategori_id=$_POST['kategori_id'];
$pengarang_buku=mysqli_real_escape_string($con,$_POST['pengarang']);
$penerbit_buku=mysqli_real_escape_string($con,$_POST['penerbit']);
$issbn_buku=$_POST['issbn'];
$tahun_buku=$_POST['tahun'];
$jumlah_buku=$_POST['jumlah'];
$kelas_buku=$_POST['kelas_buku'];
$lokasi=mysqli_real_escape_string($con,$_POST['lokasi']);
//upload photo
$nama_gambar=$_FILES['photo']['name'];
$tmp=$_FILES['photo']['tmp_name'];
$folder="imgbuku/";
$target_file=$folder.$nama_gambar;
$proses=move_uploaded_file($tmp,$target_file);


$query="INSERT INTO `buku` (`id`, `kode`, `judul`,`kategori_id`, `pengarang`, `penerbit`, `tahun`, `isbn`, `jumlah`,`kelas_buku`,`lokasi`,`photo`) VALUES (NULL, '$kode_buku', '$judul_buku','$kategori_id', '$penerbit_buku', '$pengarang_buku', '$tahun_buku', '$issbn_buku', '$jumlah_buku','$kelas_buku','$lokasi','$target_file')";
  if (mysqli_query($con, $query)) {
    ?>
		<script language='JavaScript'>
			alert ('Data Berhasil Disimpan')
			document.location = 'dataBuku.php'
		</script>

  	<?php

  }else {
		?>
		<script language='JavaScript'>
			alert ('Peyimpanan Gagal')
      	document.location = 'dataBuku.php'
		</script>
		<?php
  }
