<!DOCTYPE html>
<?php
session_start();
if($_SESSION['status']!="login"){
  header("location:../index.php?pesan=belum_login");
}
  include '../connection/connection.php';

  $tgl_pinjam=date("m/d/Y");
  $days=mktime(0,0,0, date("n"),date("j")+7, date("Y"));
  $kembali=date("m/d/Y",$days);
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
      <!-- Info boxes -->
      <?php
      include '../card/card.php';
       ?>
      <!-- /.row -->

      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">

            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="col-md-2">

              </div>
              <div class="col-md-8">
          <!-- Horizontal Form -->
                <div class="box box-info">
                  <div class="box-header with-border">
                    <h3 class="box-title">Form Peminjaman</h3>
                  </div>
            <!-- /.box-header -->
            <!-- form start -->
                  <form class="form-horizontal" action="prosesInput.php" method="POST" enctype="multipart/form-data">
                    <div class="box-body">
                      <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label" required >Nama Siswa</label>

                        <div class="col-sm-10">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <select class="form-control select2" style="width: 100%;" name="siswa_id" required>
                                <option>Masukan Nama Siswa</option>
                                <?php

                                $query="SELECT * FROM siswa";
                                $result=mysqli_query($con,$query);
                                while ($datasiswa=mysqli_fetch_object($result)):

                                 ?>
                                <option value="<?php echo $datasiswa->id_siswa; ?>"><?php echo $datasiswa->nama; ?></option>

                                <?php
                                  endwhile;
                                 ?>
                            </select>
                          </div>

                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Judul Buku</label>

                        <div class="col-sm-10">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-book"></i></span>
                            <select class="form-control select2" style="width: 100%;" name="buku_id" required>
                                <option>Masukan Judul Buku</option>
                                <?php

                                $query="SELECT * FROM buku";
                                $result=mysqli_query($con,$query);
                                while ($databuku=mysqli_fetch_object($result)):

                                 ?>
                                <option value="<?php echo $databuku->id; ?>"><?php echo $databuku->judul; ?></option>

                                <?php
                                  endwhile;
                                 ?>
                            </select>
                          </div>

                        </div>
                      </div>
                      <div class="form-group">
                        <label for="" class="col-sm-2 control-label">Jumlah</label>
                        <div class="col-sm-10">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa  fa-sort-numeric-asc"></i></span>
                            <input type="number" name="jumlah" class="form-control" required>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Tanggal Peminjaman</label>
                        <div class="col-sm-10">
                          <div class="input-group date">
                            <div class="input-group-addon">
                              <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" name="tanggal_pinjam"  class="form-control pull-right" value="<?php echo "$tgl_pinjam"; ?>" id="datepicker"  >
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Tanggal Kembali</label>
                        <div class="col-sm-10">
                          <div class="input-group date">
                            <div class="input-group-addon">
                              <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" name="tanggal_kembali" class="form-control pull-right" value="<?php echo "$kembali"; ?>" id="datepicker2"  >
                          </div>
                        </div>
                      </div>


                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                      <button type="reset" class="btn btn-default">Cancel</button>
                      <button type="submit"  class="btn btn-info pull-right">Simpan</button>
                    </div>
                    <!-- /.box-footer -->
                  </form>
                </div>

              </div>
              <div class="col-md-2">

              </div>
            </div>
            <!-- /.box-body -->
          </div>

        </div>


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

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="../bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- InputMask -->
<script src="../plugins/input-mask/jquery.inputmask.js"></script>
<script src="../plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="../plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script src="../bower_components/moment/min/moment.min.js"></script>
<script src="../bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="../bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- bootstrap color picker -->
<script src="../bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="../plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- SlimScroll -->
<script src="../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="../plugins/iCheck/icheck.min.js"></script>
<!-- FastClick -->
<script src="../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<!-- Page script -->
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, locale: { format: 'MM/DD/YYYY hh:mm A' }})
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })
    $('#datepicker2').datepicker({
      autoclose: true
    })

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    //Timepicker
    $('.timepicker').timepicker({
      showInputs: false
    })
  })
</script>
</body>
</html>
