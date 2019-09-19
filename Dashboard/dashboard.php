<?php
session_start();
if($_SESSION['status']!="login"){
  header("location:../index.php?pesan=belum_login");
} ?>
<!DOCTYPE html>
<?php

  include '../connection/connection.php';
?>
<html>
<?php include '../includes/_head.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">

    <!-- Logo -->
    <a href="dashboard.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini">
        <i class="fa fa-book"></i>
      </span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">
        <i class="fa fa-book"> Perpus smansaba</i>
      </span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <?php
    include '../includes/_navbar.php';
     ?>

    </header>
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
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Report Library </h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <div class="btn-group">
                  <button type="button" class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-wrench"></i></button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li class="divider"></li>
                    <li><a href="#">Separated link</a></li>
                  </ul>
                </div>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-8">
                  <p class="text-center">
                    <strong>Sales: 1 Jan, 2014 - 30 Jul, 2014</strong>
                  </p>

                  <div class="chart">
                    <!-- Sales Chart Canvas -->
                    <canvas id="salesChart" style="height: 180px;"></canvas>
                  </div>
                  <!-- /.chart-responsive -->
                </div>
                <!-- /.col -->
                <div class="col-md-4">
                  <div class="box-header with-border">
                    <h3 class="box-title">Browser Usage</h3>

                    <div class="box-tools pull-right">
                      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                      </button>
                      <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                  </div>
                  <div class="box-body">
                    <div class="row">
                      <div class="col-md-8">
                        <div class="chart-responsive">
                          <canvas id="pieChart" height="150"></canvas>
                        </div>
                        <!-- ./chart-responsive -->
                      </div>
                      <!-- /.col -->
                      <div class="col-md-4">
                        <ul class="chart-legend clearfix">
                          <li><i class="fa fa-circle-o text-red"></i> Chrome</li>
                          <li><i class="fa fa-circle-o text-green"></i> IE</li>
                          <li><i class="fa fa-circle-o text-yellow"></i> FireFox</li>
                          <li><i class="fa fa-circle-o text-aqua"></i> Safari</li>
                          <li><i class="fa fa-circle-o text-light-blue"></i> Opera</li>
                          <li><i class="fa fa-circle-o text-gray"></i> Navigator</li>
                        </ul>
                      </div>
                      <!-- /.col -->
                    </div>
                    <!-- /.row -->
                  </div>

                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- ./box-body -->

            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>


    </section>


    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php
  include '../includes/_footer.php';
   ?>

  <!-- Control Sidebar -->
  <?php
  include '../includes/_aside.php';
   ?>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>

</div>
<!-- ./wrapper -->
<?php include '../includes/_script.php'; ?>

</body>
</html>
