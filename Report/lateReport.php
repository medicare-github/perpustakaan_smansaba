<!DOCTYPE html>
<?php include '../CrudPeminjaman/functionLate.php'; ?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Perpustakaan | SMAN 1 BAYAN</title>
    <link rel="icon"
        type="image/png"
        href="img/smansaba.jpeg" />
    <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <title></title>
  </head>
  <body>

    <div class="info-box">
      <section class="invoice">
        <!-- title row -->
        <div class="row">
          <div class="col-xs-12">
            <h2 class="page-header">
              <img  src="img/smansaba.jpeg" width="40px" height="40px" >
              BAGIAN PERPUSTAKAAN SMAN 1 BAYAN
              <small class="pull-right">Date: <?php echo date('d/m/Y')  ?></small>
            </h2>
          </div>
          <!-- /.col -->
        </div>

        <b><h2 style="text-align:center;">PENGUMUMAN</h2></b>
        <p style="text-align:center;">DAFTAR SISWA YANG BELUM MENGEMBALIKAN BUKU PINJAMAN</p>
        <p style="text-align:center;">SILAHKAN MENGEMBALIKAN SECEPATNYA <b>SEBELUM DI KENAKAN SANKSI</b></p> <br><br>

        <!-- Table row -->
        <div class="row">
          <div class="col-xs-12 table-responsive">
            <table class="table table-striped">
              <thead>
              <tr>
                <th style="width:10px">No</th>
                <th style="width:100px">NIS</th>
                <th style="width:200px">Nama Siswa</th>
                <th style="width:400px">JudulBuku</th>
                <th style="width:150px">Tanggal Pinjam</th>
                <th style="width:150px">Tanggal Kembali</th>
                <th style="width:150px">Telambat</th>
                <th style="width:150px">Jumlah Pinjam</th>
              </tr>
              </thead>
              <tbody>
                <?php
                include_once '../connection/connection.php';
                $query="SELECT * FROM transaksi INNER JOIN siswa ON transaksi.siswa_id=siswa.id_siswa INNER JOIN buku ON transaksi.buku_id=buku.id WHERE status='Belum Dikembalikan' ORDER BY nama ASC ";
                $result=mysqli_query($con,$query);
                $no=1;
                while ($data=mysqli_fetch_object($result)):

                 ?>

              <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $data->nis ?></td>
                <td><?php echo $data->nama ?></td>
                <td><?php echo $data->judul ?></td>
                <td><?php echo $data->tanggal_pinjam ?></td>
                <td><?php echo $data->tanggal_kembali ?></td>
                <td>
                  <?php

                  $tgl_dateline=$data->tanggal_kembali;
                  $tgl_kembali=date('m/d/Y');
                  $lambat=Terlambat($tgl_dateline,$tgl_kembali);
                  if ($lambat<=0) {
                    echo "Tidak";
                  }else {
                    echo "<font color='red'> $lambat hari</font>";
                  }
                   ?>
                </td>
                <td><?php echo $data->jumlah_pinjam ?></td>


              </tr>
              <?php
            endwhile;
               ?>


              </tbody>
            </table>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- /.row -->

        <!-- this row will not appear when printing -->

        <div class="row no-print">
          <div class="col-xs-12">
            <a href="#" target="_blank" class="btn btn-info" onclick="window.print();" ><i class="fa fa-print"></i> Lanjutkan Cetak</a>
        </div>
        </div>
        </div>

        <strong class="pull-right">Bayan, <?php echo date('d F Y')  ?></strong> <br>
        <strong class="pull-right">Bagian Perpustakaan</strong><br><br><br><br>
        <strong class="pull-right">NAMA PETUGAS</strong>
      </section>
    </div>






    <script src="../bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../bower_components/fastclick/lib/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../dist/js/demo.js"></script>
  </body>
</html>
