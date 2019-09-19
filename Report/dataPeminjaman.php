<!DOCTYPE html>
<?php
  include '../connection/connection.php';
?>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Data Tables</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../bower_components/select2/dist/css/select2.min.css">
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">

  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
        <style>
          .example-modal .modal {
            position: relative;
            top: auto;
            bottom: auto;
            right: auto;
            left: auto;
            display: block;
            z-index: 1;
          }

          .example-modal .modal {
            background: transparent !important;
          }
        </style>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="#" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b>LTE</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <?php
    include '../includes/_navbar.php';
     ?>

  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <?php
    include '../includes/_sidebar.php'; ?>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">

      <br>
      <div class="row">
        <!-- <div class="col-lg-3 col-xs-6">

          <div class="small-box bg-green">
            <div class="inner">
              <h3>53</h3>

              <p>Jumlah Buku</p>
            </div>
            <div class="icon">
              <i class="fa fa-book"></i>
            </div>
            <a href="#" class="small-box-footer">
              Input Buku Baru <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">

          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>44</h3>

              <p>jumlah Buku</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">
              Download File <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>

        <div class="clearfix visible-sm-block"></div> -->

        <!-- /.col -->
        <div class="col-lg-9">
          <a href="excelPeminjaman.php">
            <button type="button" class="btn btn-success pull-left" style="margin-right: 5px;">
              <i class="fa fa-download"></i> Generate Excel
            </button>
          </a>
          <a href="">
            <button type="button" class="btn btn-danger pull-left" style="margin-right: 5px;">
              <i class="fa fa-download"></i> Generate Pdf
            </button>
          </a>


        </div>
        <div class="col-lg-3">
          <!-- <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#modal-info" style="margin-right: 5px;">
            <i class="fa fa-plus"></i> Input Buku Baru
          </button> -->
        </div>

      </div>

    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">


          <div class="box">
            <div class="box-header">
              <h3 class="box-title"> <strong>DATA PEMINJAMAN PERPUS SMANSABA</strong></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>

                  <th>Nama Siswa</th>
                  <th>Judul Buku Pinjaman</th>
                  <th style="width:20px">Jumlah Buku</th>
                  <th style="width:20px">Tanggal Peminjaman</th>
                  <th style="width:20px">Tanggal Dikembalikan</th>
                  <th>Terlambat</th>
                  <th>status</th>
                  <th style="width:170px">Pengembalian</th>
                </tr>
                </thead>
                <tbody>
                  <?php

                  $query="SELECT * FROM transaksi INNER JOIN siswa ON transaksi.siswa_id=siswa.id_siswa INNER JOIN buku ON transaksi.buku_id=buku.id WHERE status='Belum Dikembalikan'";
                  $result=mysqli_query($con,$query);
                  $no=1;
                  while ($data=mysqli_fetch_object($result)):

                   ?>
                <tr>

                  <td><?php echo $data->nama; ?></td>
                  <td><?php echo $data->judul; ?></td>
                  <td><?php echo $data->jumlah_pinjam; ?></td>
                  <td><?php echo $data->tanggal_pinjam; ?></td>
                  <td><?php echo $data->tanggal_kembali; ?></td>
                  <td></td>
                  <td><span class="badge bg-yellow"><?php echo $data->status; ?></span></td>

                  <td>
                    <form class="" action="changeStatuskembali.php" method="POST" enctype="multipart/form-data">
                      <input type="hidden" name="id_transaksi" value="<?php echo $data->id_transaksi; ?>">
                      <input type="hidden" name="jumlah_pinjam" value="<?php echo $data->jumlah_pinjam; ?>">
                      <input type="hidden" name="id" value="<?php echo $data->id; ?>">
                      <button type="submit" class="btn btn-success fa fa-mail-reply-all" > Semua</button>
                      <a href="#">
                        <button type="button" data-toggle="modal" data-target="#modal-info" class="btn btn-primary fa fa-mail-reply-all" > Kurang</button>
                      </a>
                    </form>


                  </td>
                </tr>
                <?php
                  endwhile;
                 ?>

                </tbody>
                <tfoot>

                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      <!-- modal -->
      <div class="modal modal-info fade" id="modal-info">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">PENGEMBALIAN BUKU</h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" action="changeJumlahmin.php" method="POST"  enctype="multipart/form-data">
                <div class="box-body">
                  <div class="form-group">
                    <label for="" class="col-sm-12">Jumlah Buku yang Di Kembalikan</label>
                    <div class="col-sm-12">
                      <input type="number" name="jumlah" class="form-control" id="inputEmail3" >
                    </div>
                  </div>
                  <div class="form-group">
                    <?php

                    $query="SELECT * FROM transaksi INNER JOIN siswa ON transaksi.siswa_id=siswa.id_siswa INNER JOIN buku ON transaksi.buku_id=buku.id WHERE status='Belum Dikembalikan'";
                    $result=mysqli_query($con,$query);
                    $no=1;
                    while ($datakembali=mysqli_fetch_object($result)):

                     ?>

                    <div class="col-sm-10">
                      <input type="hidden" name="id_transaksi" class="form-control" id="inputEmail3" value="<?php echo $datakembali->id_transaksi ?>">
                      <input type="hidden" name="id" class="form-control" id="inputEmail3" value="<?php echo $datakembali->id ?>">
                    </div>

                    <?php
                      endwhile;
                     ?>
                  </div>


                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-outline">Simpan</button>
            </div>
          </form>

          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
        <!-- /.modal-dialog -->
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include '../includes/_footer.php'; ?>

  <!-- Control Sidebar -->
  <?php include '../includes/_aside.php'; ?>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
  <!-- modal -->


</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="../bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- DataTables -->
<script src="../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="../plugins/iCheck/icheck.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $('.select2').select2()
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
</body>
</html>
