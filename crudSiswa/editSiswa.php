<?php
session_start();
if($_SESSION['status']!="login"){
  header("location:../index.php?pesan=belum_login");
} ?>
<!DOCTYPE html>
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
        <div class="col-md-8">
          <div class="box box-primary box-solid">

              <div class="box-header">
                <h4 style="text-align:center;">Edit Data Siswa</h4>

              </div>

            <form class="form-horizontal" action="prosesEdit.php" method="POST"  enctype="multipart/form-data">
              <div class="box-body">
                <?php
                include_once '../connection/connection.php';
                $id=$_GET["kode"];
                $query="SELECT *FROM siswa WHERE id_siswa=$id";
                $result=mysqli_query($con,$query);
                while ($data=mysqli_fetch_object($result)):

                 ?>
                 <div class="form-group">
                   <div class="col-sm-10">
                     <input type="hidden" name="id" class="form-control" id="inputEmail3" value="<?php echo $data->id_siswa; ?>">
                   </div>
                </div>
                <div class="form-group">
                  <label for="" class="col-sm-2 control-label">NISN</label>
                  <div class="col-sm-10">
                    <input type="text" name="nis" class="form-control" id="inputEmail3" value="<?php echo $data->nis; ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="" class="col-sm-2 control-label">Nama</label>
                  <div class="col-sm-10">
                    <input type="text" name="nama" class="form-control" id="inputEmail3" value="<?php echo $data->nama; ?>">
                  </div>
                </div>

                <div class="form-group">
                  <label for="" class="col-sm-2 control-label">Kelas</label>
                  <div class="col-sm-10">
                    <select class="form-control select2" style="width: 100%;" name="id_kelas" >
                      <option>Pilih Kelas</option>
                      <?php
                        $query="SELECT * FROM kelas";
                        $result=mysqli_query($con,$query);
                        while ($datakelas=mysqli_fetch_object($result)):
                       ?>
                       <?php
                          if ($data->id_kelas==$datakelas->id_kelas) {
                            echo "<option value='$datakelas->id_kelas' selected>$datakelas->nama_kelas</option>";
                          }else {
                            echo "<option value='$datakelas->id_kelas'>$datakelas->nama_kelas</option>";
                          }
                        ?>

                       <?php
                        endwhile;
                       ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="" class="col-sm-2 control-label">Tempat Lahir</label>
                  <div class="col-sm-10">
                    <input type="text" name="tempat_lahir" class="form-control" id="inputEmail3" value="<?php echo $data->tempat_lahir; ?>" >
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Tanggal Lahir</label>
                  <div class="col-sm-10">
                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" name="tanggal_lahir" class="form-control pull-right" id="datepicker" value="<?php echo $data->tanggal_lahir; ?>">
                    </div>
                  </div>
                </div>
                  <!-- /.input group -->
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Jenis Kelamin</label>
                    <div class="col-sm-10">
                      <select class="form-control select2" style="width: 100%;" name="jenis_kelamin">
                        <option>Pilih Jenis Kelamin</option>
                        <?php if ($data->jenis_kelamin=='Laki-laki'){
                          echo "<option value='Laki-laki' selected>Laki-laki</option>";
                        }else {
                          echo "<option value='Laki-laki'>Laki-laki</option>;";
                        }
                         ?>
                         <?php if ($data->jenis_kelamin=='Perempuan'){
                           echo "<option value='Perempuan' selected>Perempuan</option>";
                         }else {
                           echo "<option value='Perempuan'>Perempuan</option>;";
                         }
                          ?>
                      </select>
                    </div>
                </div>
                <div class="form-group">
                  <label for="" class="col-sm-2 control-label">Agama</label>
                  <div class="col-sm-10">

                      <?php if ($data->agama=='Islam'){
                        echo "<input type='radio' name='agama' id='Islam' value='Islam' class='minimal' checked > Islam";
                      }else {
                        echo "<input type='radio' name='agama' id='Islam' value='Islam' class='minimal' > Islam";
                      } ?>
                      <?php if ($data->agama=='Hindu'){
                        echo "<input type='radio' name='agama' id='Hindu' value='Hindu' class='minimal' checked > Hindu";
                      }else {
                        echo "<input type='radio' name='agama' id='Hindu' value='Hindu' class='minimal' > Hindu";
                      } ?>
                      <?php if ($data->agama=='Kristen'){
                        echo "<input type='radio' name='agama' id='Kristen' value='Kristen' class='minimal' checked > Kristen";
                      }else {
                        echo "<input type='radio' name='agama' id='Kristen' value='Kristen' class='minimal' > Kristen";
                      } ?>
                      <?php if ($data->agama=='Katolik'){
                        echo "<input type='radio' name='agama' id='Katolik' value='Katolik' class='minimal' checked > Katolik";
                      }else {
                        echo "<input type='radio' name='agama' id='Katolik' value='Katolik' class='minimal' > Katolik";
                      } ?>
                      <?php if ($data->agama=='Lainya'){
                        echo "<input type='radio' name='agama' id='Lainya' value='Lainya' class='minimal' checked > Lainya";
                      }else {
                        echo "<input type='radio' name='agama' id='Lainya' value='Lainya' class='minimal' > Lainya";
                      } ?>



                  </div>
                </div>

                <div class="form-group">
                  <label for="" class="col-sm-2 control-label">Alamat</label>
                  <div class="col-sm-10">
                    <textarea name="alamat" class="form-control" rows="3" cols="80"><?php echo $data->alamat; ?></textarea>
                  </div>
                </div>
                <?php
                  endwhile;
                 ?>
              </div>
              <div class="box-footer">
                <a href="dataSiswa.php">
                  <button type="button" class="btn btn-default">Batal</button>
                </a>

                <button type="submit" class="btn btn-warning pull-right">Ubah</button>
              </div>
            </form>

          </div>

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

</script></body>
</html>
