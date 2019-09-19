<?php
session_start();
if($_SESSION['status']!="login"){
  header("location:../index.php?pesan=belum_login");
}
require '../connection/connection.php';
if (isset($_GET['kode'])){
	$kode = $_GET['kode'];
	$query = "DELETE FROM kategori WHERE id_kategori='$kode'";

	if (mysqli_query($con, $query)) {
		?>
		<script language='JavaScript'>
			alert ('Data Berhasil Dihapus')
			document.location = 'dataKategori.php'
		</script>
		<?php
	}else{
    ?>
		<script language='JavaScript' >
			alert ('Data Gagal di hapus')
			document.location = 'dataKategori.php'
		</script>
		<?php
	}
}else{
	header('location: dataKategori.php');
}
