<!DOCTYPE html>
<?php
session_start();
if($_SESSION['status']!="login"){
  header("location:../index.php?pesan=belum_login");
}
  include '../connection/connection.php';
?>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Perpustakaan | SMAN 1 BAYAN</title>
  <link rel="icon"
      type="image/png"
      href="../Report/img/smansaba.jpeg" />
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

  <?php include '../includes/_header.php'; ?>
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
        <div class="col-lg-12">
          <a href="../Report/excelPengembalian.php">
            <button type="button" class="btn btn-success pull-left" style="margin-right: 5px;">
              <i class="fa fa-download"></i> Generate to Excel
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


          <div class="box box-primary box-solid">
            <div class="box-header">
              <h4 class="box-title">DATA PENGEMBALIAN PERPUS SMANSABA</h4>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>

                  <th>Nama Siswa</th>
                  <th>Judul Buku Pinjaman</th>
                  <th>Jumlah Buku</th>
                  <th style="width:20px">Tanggal Peminjaman</th>
                  <th style="width:20px">Tanggal Pengembalian</th>
                  <th>status</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                  <?php

                  $query="SELECT * FROM transaksi INNER JOIN siswa ON transaksi.siswa_id=siswa.id_siswa INNER JOIN buku ON transaksi.buku_id=buku.id WHERE status='Sudah Dikembalikan' ORDER BY sudah_kembali ASC";
                  $result=mysqli_query($con,$query);
                  $no=1;
                  while ($data=mysqli_fetch_object($result)):

                   ?>
                <tr>

                  <td><?php echo $data->nama; ?></td>
                  <td><?php echo $data->judul; ?></td>
                  <td><?php echo $data->jumlah_pinjam; ?></td>
                  <td><?php echo $data->tanggal_pinjam; ?></td>
                  <td><?php echo $data->sudah_kembali; ?></td>
                  <td><span class="badge bg-green"><?php echo $data->status; ?></span></td>

                  <td>
                    <form class="" action="changeStatusno.php" method="POST" enctype="multipart/form-data">
                      <input type="hidden" name="id_transaksi" value="<?php echo $data->id_transaksi; ?>">
                      <input type="hidden" name="jumlah_pinjam" value="<?php echo $data->jumlah_pinjam; ?>">
                      <input type="hidden" name="id" value="<?php echo $data->id; ?>">
                      <button type="submit" class="btn btn-warning fa fa-mail-forward" > Batal Kembalikan</button>
                    </form>
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
              <h4 class="modal-title">Info Modal</h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" action="prosesInputBuku.php" method="POST"  enctype="multipart/form-data">
                <div class="box-body">
                  <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Kode Buku</label>
                    <div class="col-sm-10">
                      <input type="text" name="kode" class="form-control" id="inputEmail3" placeholder="Kode Buku">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Judul Buku</label>
                    <div class="col-sm-10">
                      <input type="text" name="judul" class="form-control" id="inputEmail3" placeholder="Judul Buku">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Kategori Buku</label>
                    <div class="col-sm-10">
                      <select class="form-control select2" style="width: 100%;" name="kategori_id">
                        <option>Pilih Kategori</option>
                        <?php

                        $query="SELECT * FROM kategori";
                        $result=mysqli_query($con,$query);
                        while ($datakategori=mysqli_fetch_object($result)):

                         ?>
                        <option value="<?php echo $datakategori->id_kategori; ?>"><?php echo $datakategori->nama_kategori; ?></option>

                        <?php
                          endwhile;
                         ?>

                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Kelas</label>
                    <div class="col-sm-10">
                      <select class="form-control select2" style="width: 100%;" name="kelas_buku">
                        <option>Pilih Kelas</option>
                        <option>X</option>
                        <option>XI</option>
                        <option>XII</option>
                        <option>Umum</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Pengarang</label>
                    <div class="col-sm-10">
                      <input type="text" name="pengarang" class="form-control" id="inputEmail3" placeholder="Pengarang">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="" name="penerbit" class="col-sm-2 control-label">Penerbit</label>
                    <div class="col-sm-10">
                      <input type="text" name="penerbit" class="form-control" id="inputEmail3" placeholder="Penerbit">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Tahun</label>
                    <div class="col-sm-10">
                      <input type="number" name="tahun" class="form-control" id="inputEmail3" placeholder="Tahun">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="" class="col-sm-2 control-label">ISSBN</label>
                    <div class="col-sm-10">
                      <input type="number" name="issbn" class="form-control" id="inputEmail3" placeholder="ISSBN">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Jumlah</label>
                    <div class="col-sm-10">
                      <input type="number" name="jumlah" class="form-control" id="inputEmail3" placeholder="Jumlah">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Lokasi</label>
                    <div class="col-sm-10">
                      <input type="text" name="lokasi" class="form-control" value="" placeholder="ex: Rak 1 - Tingkat 1">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Photo</label>
                    <div class="col-sm-10">
                      <input type="file" class="form-control" name="photo" value="">
                    </div>
                  </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-outline">Save changes</button>
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
