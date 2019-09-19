
<?php
session_start();
if($_SESSION['status']!="login"){
  header("location:../index.php?pesan=belum_login");
}

require '../connection/connection.php';
$nama=mysqli_real_escape_string($con,$_POST['nama_kategori']);


$query="INSERT INTO `kategori` (`nama_kategori`) VALUES ('$nama')";
  if (mysqli_query($con, $query)) {
    ?>
		<script language='JavaScript'>
			alert ('Data Berhasil Disimpan')
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
