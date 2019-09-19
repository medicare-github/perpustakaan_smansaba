
<?php
session_start();
if($_SESSION['status']!="login"){
  header("location:../index.php?pesan=belum_login");
}
require '../connection/connection.php';
$nama_kelas=mysqli_real_escape_string($con, $_POST['nama_kelas']);
$deskripsi=mysqli_real_escape_string($con, $_POST['deskripsi']);


$query="INSERT INTO `kelas` (`id_kelas`, `nama_kelas`, `deskripsi`) VALUES (NULL, '$nama_kelas', '$deskripsi');";
  if (mysqli_query($con, $query)) {
    ?>
		<script language='JavaScript'>
			alert ('Data Berhasil Disimpan')
      document.location = 'dataKelas.php'

		</script>

  	<?php

  }else {
		?>
		<script language='JavaScript'>
			alert ('Peyimpanan Gagal')

		</script>
		<?php
  }
