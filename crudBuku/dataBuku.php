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
              <h3 class="box-title">Data Buku Perpustakaan SMAN 1 BAYAN</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th class="th-color">No</th>
                  <th>Kode Buku</th>
                  <th>Judul</th>
                  <th>Kategori</th>
                  <th>Kelas</th>
                  <th>Tahun</th>
                  <th>Jumlah</th>
                  <th>Lokasi</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                  <?php

                  $query="SELECT id,kode,judul,nama_kategori,kelas_buku,tahun,jumlah,lokasi FROM buku INNER JOIN kategori ON buku.kategori_id=kategori.id_kategori ORDER BY judul ASC";
                  $result=mysqli_query($con,$query);
                  $no=1;
                  while ($data=mysqli_fetch_object($result)):

                   ?>
                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $data->kode; ?></td>
                  <td><?php echo $data->judul; ?></td>
                  <td><?php echo $data->nama_kategori; ?></td>
                  <td><?php echo $data->kelas_buku; ?></td>
                  <td><?php echo $data->tahun; ?></td>
                  <td><?php echo $data->jumlah; ?></td>
                  <td><?php echo $data->lokasi; ?></td>
                  <td>
                    <a href="editBuku.php?kode=<?php echo $data->id?>"class="btn btn-warning fa fa-edit" title="edit buku" ></a>
                    <a href="deleteBuku.php?kode=<?php echo $data->id?>" onclick="return confirm('Anda Ingin Menghapus Data Buku?')" class="btn btn-danger btn-sm fa fa-trash-o" title="hapus Buku" ></a>
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
              <h4 class="modal-title">Info Modal</h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" action="prosesInputBuku.php" method="POST"  enctype="multipart/form-data">
                <div class="box-body">
                  <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Kode Buku</label>
                    <div class="col-sm-10">
                      <input type="text" name="kode" class="form-control" id="inputEmail3" placeholder="Kode Buku" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Judul Buku</label>
                    <div class="col-sm-10">
                      <input type="text" name="judul" class="form-control" id="inputEmail3" placeholder="Judul Buku" required>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Kategori Buku</label>
                    <div class="col-sm-10">
                      <select class="form-control select2" style="width: 100%;" name="kategori_id" required>
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
                      <select class="form-control select2" style="width: 100%;" name="kelas_buku" required>
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
                      <input type="text" name="pengarang" class="form-control" id="inputEmail3" placeholder="Pengarang" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="" name="penerbit" class="col-sm-2 control-label">Penerbit</label>
                    <div class="col-sm-10">
                      <input type="text" name="penerbit" class="form-control" id="inputEmail3" placeholder="Penerbit" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Tahun</label>
                    <div class="col-sm-10">
                      <input type="number" name="tahun" class="form-control" id="inputEmail3" placeholder="Tahun" required>
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
                      <input type="number" name="jumlah" class="form-control" id="inputEmail3" placeholder="Jumlah" required>
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
  <?php
  include '../includes/_footer.php'; ?>

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
