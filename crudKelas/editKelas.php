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


        <!-- /.col -->
        <div class="col-lg-9">

        </div>

      </div>

    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-2">

        </div>
        <div class="col-xs-8">


          <div class="box box-primary box-solid">
            <div class="box-header">
              <h4 style="text-align:center;">EDIT DATA SISWA</h4>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form class="form-horizontal" action="prosesEdit.php" method="POST"  enctype="multipart/form-data">
                <div class="box-body">
                  <?php
                  $id=$_GET['kode'];
                  $query="SELECT * FROM kelas WHERE id_kelas='$id'";
                  $result=mysqli_query($con,$query);
                  $no=1;
                  while ($data=mysqli_fetch_object($result)):

                   ?>
                  <div class="form-group">
                    <input type="hidden" name="id_kelas" value="<?php echo $data->id_kelas ?>">
                    <label for="" class="col-sm-2 control-label">Nama Kelas</label>
                    <div class="col-sm-10">
                      <input type="text" name="nama_kelas" class="form-control" id="inputEmail3" placeholder="" value="<?php echo $data->nama_kelas ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Deskripsi</label>
                    <div class="col-sm-10">
                      <textarea name="deskripsi" rows="4" cols="80" class="form-control"><?php echo $data->deskripsi ?></textarea>
                    </div>
                  </div>
                <?php endwhile; ?>
                  <div class="box-footer">
                    <a href="dataKelas.php">
                      <button type="button" class="btn btn-default">Cancel</button>
                    </a>
                    <button type="submit" class="btn btn-warning pull-right">Ubah</button>
                  </div>
                  <!-- /.box-footer -->

                </div>
              </form>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-xs-2">

        </div>
      </div>
      <!-- /.row -->
      <!-- modal -->
      <div class="modal modal-info fade" id="modal-info">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Input Data Baru Kelas Buku</h4>
            </div>
            <div class="modal-body">

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
<!-- DataTables -->
<script src="../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
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
