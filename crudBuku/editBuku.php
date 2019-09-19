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


    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-2">

        </div>

        <!-- right column -->
        <div class="col-md-8">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title" >Form Edit Data Buku</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="prosesEdit.php" method="POST"  enctype="multipart/form-data">
              <div class="box-body">
                <?php
                include_once '../connection/connection.php';
                $id=$_GET["kode"];
                $query="SELECT *FROM buku WHERE id=$id";
                $result=mysqli_query($con,$query);
                while ($data=mysqli_fetch_object($result)):

                 ?>
                <div class="form-group">
                   <div class="col-sm-10">
                     <input type="hidden" name="id" class="form-control" id="inputEmail3" value="<?php echo $data->id; ?>">
                   </div>
                </div>
                <div class="form-group">
                  <label for="" class="col-sm-2 control-label">Kode Buku</label>
                  <div class="col-sm-10">
                    <input type="text" name="kode" class="form-control" id="inputEmail3" value="<?php echo $data->kode; ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="" class="col-sm-2 control-label">Judul Buku</label>
                  <div class="col-sm-10">
                    <input type="text" name="judul" class="form-control" id="inputEmail3" value="<?php echo $data->judul; ?>">
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
                      <?php
                          if ($data->kategori_id==$datakategori->id_kategori) {
                            // code...
                            echo "<option value='$datakategori->id_kategori' selected >$datakategori->nama_kategori</option>";
                          }else {
                            echo "<option value='$datakategori->id_kategori'>$datakategori->nama_kategori</option>";
                          }
                       ?>
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
                      <?php if ($data->kelas_buku=='X'){
                        echo "<option value='X' selected >X</option>";
                      }else {
                        // code...
                        echo "<option value='X'>X</option>";
                      }?>
                      <?php if ($data->kelas_buku=='XI'){
                        echo "<option value='XI' selected >XI</option>";
                      }else {
                        // code...
                        echo "<option value='XII'>XII</option>";
                      }?>
                      <?php if ($data->kelas_buku=='XII'){
                        echo "<option value='XII' selected >XII</option>";
                      }else {
                        // code...
                        echo "<option value='XII'>XII</option>";
                      }?>
                      <?php if ($data->kelas_buku=='Umum'){
                        echo "<option value='Umum' selected >Umum</option>";
                      }else {
                        // code...
                        echo "<option value='Umum'>Umum</option>";
                      }?>

                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="" class="col-sm-2 control-label">Pengarang</label>
                  <div class="col-sm-10">
                    <input type="text" name="pengarang" class="form-control" id="inputEmail3" value="<?php echo $data->pengarang; ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="" name="penerbit" class="col-sm-2 control-label">Penerbit</label>
                  <div class="col-sm-10">
                    <input type="text" name="penerbit" class="form-control" id="inputEmail3" value="<?php echo $data->penerbit; ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="" class="col-sm-2 control-label">Tahun</label>
                  <div class="col-sm-10">
                    <input type="number" name="tahun" class="form-control" id="inputEmail3" value="<?php echo $data->tahun; ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="" class="col-sm-2 control-label">ISSBN</label>
                  <div class="col-sm-10">
                    <input type="number" name="issbn" class="form-control" id="inputEmail3" value="<?php echo $data->isbn; ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="" class="col-sm-2 control-label">Jumlah</label>
                  <div class="col-sm-10">
                    <input type="number" name="jumlah" class="form-control" id="inputEmail3" value="<?php echo $data->jumlah; ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="" class="col-sm-2 control-label">Lokasi</label>
                  <div class="col-sm-10">
                    <input type="text" name="lokasi" class="form-control" value="<?php echo $data->lokasi; ?>" >
                  </div>
                </div>
                <div class="form-group">
                  <label for="" class="col-sm-2 control-label">Photo</label>
                  <div class="col-sm-10">
                    <input type="file" class="form-control" name="photo" value="">
                  </div>
                </div>
                <div class="box-footer">
                  <button type="reset" class="btn btn-default">Reset</button>
                  <button type="submit" class="btn btn-warning pull-right">Ubah</button>
                </div>
              </div>

              <?php
                endwhile;
               ?>
          </div>

          <!-- /.box -->
          <!-- general form elements disabled -->

          <!-- /.box -->
        </div>
        <div class="col-md-2">

        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
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
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
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
