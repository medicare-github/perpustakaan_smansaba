<?php
session_start();
if($_SESSION['status']!="login"){
  header("location:../index.php?pesan=belum_login");
}

include '../connection/connection.php';
$id=$_POST['id'];
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


$query="UPDATE buku SET kode='$kode_buku',judul='$judul_buku',kategori_id='$kategori_id',pengarang='$pengarang_buku',penerbit='$penerbit_buku',isbn='$issbn_buku',tahun='$tahun_buku',jumlah='$jumlah_buku',lokasi='$lokasi',photo='$nama_gambar',kelas_buku='$kelas_buku' WHERE id='$id'";
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
