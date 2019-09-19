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
              <h3 class="box-title">Data Kelas Buku Perpustakaan SMAN 1 BAYAN</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-striped table-hover">
                <thead>
                <tr>
                  <th style="width:10px" >No</th>
                  <th style="width:80px">Nama Kelas</th>
                  <th>Nama Deskripsi</th>
                  <th style="width:80px">Aksi</th>
                </tr>
                </thead>
                <tbody>
                  <?php

                  $query="SELECT * FROM kelas ORDER BY nama_kelas ASC";
                  $result=mysqli_query($con,$query);
                  $no=1;
                  while ($data=mysqli_fetch_object($result)):

                   ?>
                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $data->nama_kelas; ?></td>
                  <td><?php echo $data->deskripsi; ?></td>

                  <td>
                    <a href="editKelas.php?kode=<?php echo $data->id_kelas?>"class="btn btn-warning fa fa-edit" title="edit Kelas" ></a>
                    <a href="deleteKelas.php?kode=<?php echo $data->id_kelas?>" id="tombol" class="btn btn-danger btn-sm fa fa-trash-o" title="hapus Kelas" ></a>

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
              <h4 class="modal-title">Input Data Baru Kelas Buku</h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" action="prosesInputKelas.php" method="POST"  enctype="multipart/form-data">
                <div class="box-body">
                  <div class="form-group">
                    <label for="" class="col-sm-4 control-label">Nama Kelas</label>
                    <div class="col-sm-8">
                      <input type="text" name="nama_kelas" class="form-control" id="inputEmail3" placeholder="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="" class="col-sm-4 control-label">Deskripsi</label>
                    <div class="col-sm-8">
                      <textarea name="deskripsi" rows="4" cols="80" class="form-control"></textarea>
                    </div>
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
<script src="../bower_components/swal2/sweetalert2.min.js"></script>
<script>
  const tombol=document.querySelector('#tombol');
  tombol.addEventListener('click', function(){
    swal({
      title:'hello',
      text:'permanently delete',
      cancel:true,
      confirm:true,
      type:'success'
    });
  });
</script>
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
