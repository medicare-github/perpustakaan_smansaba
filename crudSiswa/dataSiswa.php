<!DOCTYPE html>
<?php
session_start();
if($_SESSION['status']!="login"){
  header("location:../index.php?pesan=belum_login");
}
  include '../connection/connection.php';
?>
<html>
<!-- head -->
<?php include '../includes/_head.php'; ?>
<!-- tutup head -->
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
              <h3 class="box-title">Data Nama Siswa SMAN 1 BAYAN</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-hover">
                <thead  >
                <tr>
                  <th style="width:10px;">No</th>
                  <th>NIS</th>
                  <th>Nama</th>
                  <th>Kelas</th>
                  <th>Tempat/Tgl Lahir</th>
                  <th>Jenis Kelamin</th>
                  <th>Agama</th>
                  <th>Alamat</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                  <?php

                  $query="SELECT id_siswa,nis,nama,nama_kelas,tempat_lahir,tanggal_lahir,jenis_kelamin,agama,alamat FROM siswa INNER JOIN kelas ON siswa.id_kelas=kelas.id_kelas ORDER BY nis ASC";
                  $result=mysqli_query($con,$query);
                  $no=1;
                  while ($data=mysqli_fetch_object($result)):

                   ?>
                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $data->nis; ?></td>
                  <td><?php echo $data->nama; ?></td>
                  <td><?php echo $data->nama_kelas; ?></td>
                  <td><?php echo $data->tempat_lahir; ?> - <?php echo $data->tanggal_lahir; ?></td>
                  <td><?php echo $data->jenis_kelamin; ?></td>
                  <td><?php echo $data->agama; ?></td>
                  <td><?php echo $data->alamat; ?></td>
                  <td>
                    <a href="detailSiswa.php?kode=<?php echo $data->id_siswa?>"class="btn btn-info fa  fa-info-circle"  title="history Peminjaman"></a>
                    <a href="editSiswa.php?kode=<?php echo $data->id_siswa?>"class="btn btn-warning fa fa-edit" title="edit siswa" ></a>
                    <a href="deleteSiswa.php?kode=<?php echo $data->id_siswa?>" onclick="return confirm('Anda Ingin Menghapus Data Siswa?')" class="btn btn-danger btn-sm fa fa-trash-o" title="hapus Siswa" ></a>
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
              <h4 class="modal-title">Form Input Data Siswa</h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" action="prosesInputSiswa.php" method="POST"  enctype="multipart/form-data">
                <div class="box-body">
                  <div class="form-group">
                    <label for="" class="col-sm-2 control-label">NISN</label>
                    <div class="col-sm-10">
                      <input type="number" name="nis" class="form-control" id="inputEmail3" placeholder="NISN">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Nama</label>
                    <div class="col-sm-10">
                      <input type="text" name="nama" class="form-control" id="inputEmail3" placeholder="Nama Siswa">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Kelas</label>
                    <div class="col-sm-10">
                      <select class="form-control select2" style="width: 100%;" name="id_kelas">
                        <option>Pilih Kelas</option>
                        <?php

                        $query="SELECT * FROM kelas";
                        $result=mysqli_query($con,$query);
                        while ($datakelas=mysqli_fetch_object($result)):

                         ?>
                        <option value="<?php echo $datakelas->id_kelas; ?>"><?php echo $datakelas->nama_kelas; ?></option>

                        <?php
                          endwhile;
                         ?>

                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Tempat Lahir</label>
                    <div class="col-sm-10">
                      <input type="text" name="tempat_lahir" class="form-control" id="inputEmail3" placeholder="Tempat Lahir">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Tanggal Lahir</label>
                    <div class="col-sm-10">
                      <div class="input-group date">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" name="tanggal_lahir" class="form-control pull-right" id="datepicker" >
                      </div>
                    </div>
                  </div>
                    <!-- /.input group -->
                  <div class="form-group">
                      <label for="" class="col-sm-2 control-label">Jenis Kelamin</label>
                      <div class="col-sm-10">
                        <select class="form-control select2" style="width: 100%;" name="jenis_kelamin">
                          <option>Pilih Jenis Kelamin</option>
                          <option value="Laki-laki">Laki-Laki</option>
                          <option value="Perempuan">Perempuan</option>
                        </select>
                      </div>
                  </div>
                  <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Agama</label>
                    <div class="col-sm-10">
                      <label>
                        <input type="radio" name="agama" id="islam" value="Islam" class="minimal" checked>
                        Islam
                      </label>
                      <label>
                        <input type="radio" name="agama" id="Hindu" value="Hindu" class="minimal" >
                        Hindu
                      </label>
                      <label>
                        <input type="radio" name="agama" id="Kristen" value="Kristen" class="minimal" >
                        Kristen
                      </label>
                      <label>
                        <input type="radio" name="agama" id="Katolik" value="Katolik" class="minimal" >
                        Katolik
                      </label>
                      <label>
                        <input type="radio" name="agama" id="Lainya" value="Lainya" class="minimal" >
                        Lainya
                      </label>

                    </div>
                  </div>

                  <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Alamat</label>
                    <div class="col-sm-10">
                      <textarea name="alamat" class="form-control" rows="3" cols="80"></textarea>
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
<script src="../plugins/input-mask/jquery.inputmask.js"></script>
<script src="../bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="../bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
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
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('[data-mask]').inputmask()

    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })

    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })

    $('#datepicker').datepicker({
      autoclose: true
    })
  })

</script>
</body>
</html>
