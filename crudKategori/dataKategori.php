<!DOCTYPE html>
<?php
session_start();
if($_SESSION['status']!="login"){
  header("location:../index.php?pesan=belum_login");
}
  include '../connection/connection.php';
?>
<html>
<?php include '../includes/_head.php'; ?>
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
        <div class="col-lg-3">
          <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#modal-info" style="margin-right: 5px;">
            <i class="fa fa-plus"></i> Input Buku Baru
          </button>
        </div>

      </div>

    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">


          <div class="box box-primary box-solid">
            <div class="box-header">
              <h3 class="box-title">Data Kategori Buku Perpustakaan SMAN 1 BAYAN</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th style="width:10px" >No</th>
                  <th>Nama Kategori Pelajaran</th>
                  <th style="width:80px">Aksi</th>
                </tr>
                </thead>
                <tbody>
                  <?php

                  $query="SELECT * FROM kategori ORDER BY id_kategori DESC";
                  $result=mysqli_query($con,$query);
                  $no=1;
                  while ($data=mysqli_fetch_object($result)):

                   ?>
                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $data->nama_kategori; ?></td>
                  <td>
                    <a href="editKategori.php?kode=<?php echo $data->id_kategori?>"class="btn btn-warning fa fa-edit" title="edit buku" ></a>
                    <a href="deleteKategori.php?kode=<?php echo $data->id_kategori?>" onclick="return confirm('Anda Ingin Menghapus Data Buku?')" class="btn btn-danger btn-sm fa fa-trash-o" title="hapus Buku" ></a>

                  </td>
                </tr>
                <?php
                  endwhile;
                 ?>
                </tbody>
                <tfoot>
                <tr>

                </tr>
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
              <h4 class="modal-title">Input Data Baru Kategori Buku</h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" action="prosesInputKategori.php" method="POST"  enctype="multipart/form-data">
                <div class="box-body">
                  <div class="form-group">
                    <label for="" class="col-sm-4 control-label">Nama Kategori Pelajaran</label>
                    <div class="col-sm-8">
                      <input type="text" name="nama_kategori" class="form-control" id="inputEmail3" placeholder="">
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
