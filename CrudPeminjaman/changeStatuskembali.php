    <?php
    session_start();
    if($_SESSION['status']!="login"){
      header("location:../index.php?pesan=belum_login");
    }
    include '../connection/connection.php';
    $tgl=date('m/d/Y');
  	$id = $_POST['id_transaksi'];
  	$jumlah_buku = $_POST['jumlah_pinjam'];
  	$buku = $_POST['id'];


    $query = "UPDATE transaksi SET status = 'Sudah Dikembalikan', sudah_kembali='$tgl' WHERE id_transaksi = $id";
  	$query2="UPDATE `buku` SET jumlah =(jumlah+$jumlah_buku) WHERE id=$buku";

      if (mysqli_query($con, $query) & (mysqli_query($con,$query2)) ) {
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
          document.location = 'dataPeminjaman.php'
    		</script>
    		<?php
      }
