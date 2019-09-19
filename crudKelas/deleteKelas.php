<?php
session_start();
if($_SESSION['status']!="login"){
  header("location:../index.php?pesan=belum_login");
}
require '../connection/connection.php';
if (isset($_GET['kode'])){
	$kode = $_GET['kode'];
	$query = "DELETE FROM kelas WHERE id_kelas='$kode'";

	if (mysqli_query($con, $query)) {
		?>
		<script language='JavaScript'>

			document.location = 'dataKelas.php'
		</script>
		<?php
	}else{
    ?>
		<script language='JavaScript' >
			alert ('Data Gagal di hapus Kerana telah terintegrasi dengan data Siswa')
			document.location = 'dataKelas.php'
		</script>
		<?php
	}
}else{
	header('location: dataKelas.php');
}
