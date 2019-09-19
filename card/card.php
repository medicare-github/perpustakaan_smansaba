<div class="row">
  <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-blue"><i class="glyphicon glyphicon-book"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">BUKU</span>
        <span class="info-box-number"><?php require '../hitung/buku.php'; echo $hitung;?></span>
      </div>
      <div class="info-box-content">
        <a href="../Report/bukuReport.php">
          <span class="badge bg-blue pull-left">
            <i class="fa fa-download"> Download Excel</i>
          </span>
        </a>



      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->
  <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-red"><i class="ion ion-ios-people-outline"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">SISWA</span>
        <span class="info-box-number"><?php require '../hitung/siswa.php'; echo $hitung;?></span>
      </div>
      <div class="info-box-content">
        <a href="../Report/siswaReport.php">
          <span class="badge bg-red pull-left">
            <i class="fa fa-download"> Download Excel</i>
          </span>
        </a>


      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->

  <!-- fix for small devices only -->
  <div class="clearfix visible-sm-block"></div>

  <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-green"><i class="fa fa-history"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">SEMUA PINJAMAN</span>
        <span class="info-box-number"><?php require '../hitung/all.php'; echo $hitung;?></span>
      </div>
      <div class="info-box-content">
        <a href="../Report/allHistoryPinjam.php">
          <span class="badge bg-green pull-left">
            <i class="fa fa-download"> Download Excel</i>
          </span>
        </a>
        <!-- <a href="#">
          <span class="label label-danger pull-right">
            <i class="fa fa-download"> PDF</i>
          </span>
        </a> -->

      </div>
      <!-- /.info-box-content -->
    </div>

    <!-- /.info-box -->
  </div>
  <!-- /.col -->
  <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-yellow"><i class="fa fa-download"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">LAPORAN CUSTOME</span>
        <span class="info-box-number">-</span>
      </div>
      <div class="info-box-content">
        <a href="../Report/customePeminjamanReport.php">
          <span class="badge bg-yellow">
            <i class="fa fa-edit"> Buat Laporan</i>
          </span>
        </a>

      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->
</div>
