<?php
session_start();
if($_SESSION['status']!="login"){
  header("location:../index.php?pesan=belum_login");
} ?>
<!DOCTYPE html>
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
  <link rel="stylesheet" href="../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../bower_components/select2/dist/css/select2.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
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

    <section class="content">

      <div class="row">
        <div class="col-md-3">
          <?php
          include_once '../connection/connection.php';
          $id=$_GET["kode"];
          $query="SELECT * FROM siswa WHERE id_siswa=$id";
          $result=mysqli_query($con,$query);
          while ($data=mysqli_fetch_object($result)):

           ?>

          <!-- Profile Image -->
          <div class="box box-primary">

            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="imgSiswa/users.jpg" alt="User profile picture">

              <h3 class="profile-username text-center"><?php echo $data->nama ?></h3>

              <p class="text-muted text-center"></p>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">About Buku</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-book margin-r-5"></i> Nomor Induk Sekolah</strong>


                  <p class="text-muted">
                    <strong>
                      <?php echo $data->nis ?>
                    </strong>
                  </p>



              <hr>

              <strong><i class="fa fa-map-marker margin-r-5"></i> Alamat</strong>

              <p class="text-muted"><?php echo $data->alamat ?></p>
            </div>
            <!-- /.box-body -->
          </div>
          <?php
           endwhile;
          ?>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">Belum Dikembalikan</a></li>
              <li><a href="#timeline" data-toggle="tab">History Peminjaman</a></li>

            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <table id="example1" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th style="width:10px">No</th>
                    <th>Judul Buku</th>
                    <th style="width:50px">Jumlah</th>
                    <th style="width:100px">Batas Pinjam</th>
                    <th >Telat</th>
                    <th style="width:180px" >Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    include_once '../connection/connection.php';
                    $id=$_GET["kode"];
                    $query="SELECT * FROM transaksi INNER JOIN siswa ON transaksi.siswa_id=siswa.id_siswa INNER JOIN buku ON transaksi.buku_id=buku.id WHERE siswa.id_siswa='$id' AND status='Belum Dikembalikan'";
                    $result=mysqli_query($con,$query);
                    while ($data1=mysqli_fetch_object($result)):

                     ?>

                  <tr>
                    <td>1</td>
                    <td><?php echo $data1->judul; ?></td>
                    <td><?php echo $data1->jumlah_pinjam; ?></td>
                    <td><?php echo $data1->tanggal_kembali; ?></td>
                    <td></td>

                    <td>
                      <form class="" action="../CrudPeminjaman/changeStatuskembali.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id_transaksi" value="<?php echo $data1->id_transaksi; ?>">
                        <input type="hidden" name="jumlah_pinjam" value="<?php echo $data1->jumlah_pinjam; ?>">
                        <input type="hidden" name="id" value="<?php echo $data1->id; ?>">
                        <button type="submit" class="btn btn-success fa fa-mail-reply-all" > Semua</button>
                        <a href="#">
                          <button type="button" data-toggle="modal" data-target="#modal-info" class="btn btn-primary fa fa-mail-reply-all" > Kurang</button>
                        </a>
                      </form>
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
              <div class="tab-pane" id="timeline">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th style="width:10px">No</th>
                    <th>Judul Buku</th>
                    <th style="width:50px">Jumlah</th>

                    <th style="width:150px" >Status Peminjaman</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    include_once '../connection/connection.php';
                    $id=$_GET["kode"];
                    $no=1;
                    $query="SELECT * FROM transaksi INNER JOIN siswa ON transaksi.siswa_id=siswa.id_siswa INNER JOIN buku ON transaksi.buku_id=buku.id WHERE siswa.id_siswa='$id'";
                    $result=mysqli_query($con,$query);
                    while ($data1=mysqli_fetch_object($result)):

                     ?>

                  <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $data1->judul; ?></td>
                    <td><?php echo $data1->jumlah_pinjam; ?></td>
                    <?php
                    if ($data1->status=='Sudah Dikembalikan') {
                      // code...
                      echo " <td>
                        <span class='badge bg-green'>$data1->status</span>
                      </td>";
                    }else {
                      echo " <td>
                      <span class='badge bg-yellow'>$data1->status</span>
                      </td>";
                    }
                     ?>


                  </tr>
                  <?php
                    endwhile;
                   ?>


                  </tbody>
                  <tfoot>

                  </tfoot>
                </table>
              </div>

              <!-- /.tab-pane -->
            </div>

            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                <p>New phone +1(800)555-1234</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                <p>Execution time 5 seconds</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Allow mail redirect
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Other sets of options are available
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Expose author name in posts
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Allow the user to show his name in blog posts
            </p>
          </div>
          <!-- /.form-group -->

          <h3 class="control-sidebar-heading">Chat Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Show me as online
              <input type="checkbox" class="pull-right" checked>
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Turn off notifications
              <input type="checkbox" class="pull-right">
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Delete chat history
              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
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
<script src="../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- FastClick -->
<script src="../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
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
