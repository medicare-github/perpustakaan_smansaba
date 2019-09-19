<?php
session_start();
if($_SESSION['status']!="login"){
  header("location:../index.php?pesan=belum_login");
} ?>
<!DOCTYPE html>
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
              <h3 class="box-title">Horizontal Form</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="prosesEdit.php" method="POST">
              <div class="box-body">
                <?php
                include_once '../connection/connection.php';
                $id=$_GET["kode"];
                $query="SELECT *FROM kategori WHERE id_kategori=$id";
                $result=mysqli_query($con,$query);
                while ($data=mysqli_fetch_object($result)):

                 ?>
                <div class="form-group">


                  <div class="col-sm-9">
                    <input type="hidden" name="id" value="<?php echo $data->id_kategori; ?>" class="form-control" id="inputEmail3" >
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-3 control-label">Nama Kategori</label>

                  <div class="col-sm-9">
                    <input type="text" name="nama_kategori" value="<?php echo $data->nama_kategori; ?>" class="form-control" id="inputPassword3" >
                  </div>
                </div>
                <?php
                  endwhile;
                 ?>

              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="reset" class="btn btn-default">Reset</button>
                <button type="submit" class="btn btn-warning pull-right">Ubah</button>
              </div>
              <!-- /.box-footer -->
            </form>
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
<?php include '../includes/_footer.php'; ?>

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
