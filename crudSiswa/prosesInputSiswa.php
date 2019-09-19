<?php
session_start();
if($_SESSION['status']!="login"){
  header("location:../index.php?pesan=belum_login");
}
require '../connection/connection.php';
$nis=$_POST['nis'];
$nama=mysqli_real_escape_string($con,$_POST['nama']);
$tempat_lahir=mysqli_real_escape_string($con,$_POST['tempat_lahir']);
$tanggal_lahir=mysqli_real_escape_string($con,$_POST['tanggal_lahir']);
$jenis_kelamin=$_POST['jenis_kelamin'];
$agama=$_POST['agama'];
$alamat=mysqli_real_escape_string($con,$_POST['alamat']);
$id_kelas=$_POST['id_kelas'];

$query="INSERT INTO `siswa` (`id_siswa`, `nis`, `nama`,`tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `agama`, `alamat`, `id_kelas`) VALUES (NULL, '$nis', '$nama','$tempat_lahir', '$tanggal_lahir','$jenis_kelamin','$agama', '$alamat',  '$id_kelas')";
  if (mysqli_query($con, $query)) {
    ?>
		<script language='JavaScript'>
			alert ('Data Berhasil Disimpan')
			document.location = 'dataSiswa.php'
		</script>

  	<?php

  }else {
		?>
		<script language='JavaScript'>
			alert ('Peyimpanan Gagal')
		</script>
		<?php
  }
