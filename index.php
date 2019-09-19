<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Perpustakaan | SMAN 1 BAYAN</title>
  <link rel="icon"
      type="image/png"
      href="Report/img/smansaba.jpeg" />
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition lockscreen">

<!-- Automatic element centering -->

<div class="lockscreen-wrapper">
  <div class="lockscreen-logo">
    <a href="#"><b>SMA NEGERI 1 BAYAN</b> </a>
  </div>
  <!-- User name -->
  <div class="lockscreen-name">Admin Perpustakaan</div>

  <!-- START LOCK SCREEN ITEM -->
  <div class="lockscreen-item">
    <!-- lockscreen image -->
    <div class="lockscreen-image">
      <img src="Report/img/smansaba.jpeg" alt="User Image">
    </div>
    <!-- /.lockscreen-image -->

    <!-- lockscreen credentials (contains the form) -->
    <form class="lockscreen-credentials" method="POST" action="prosesLogin.php" enctype="multipart/form-data">
      <input type="hidden" name="user" value="medicare">
      <div class="input-group">
        <input type="password" name="pass" class="form-control" placeholder="password" required autofocus>
        <div class="input-group-btn">
          <button type="submit" class="btn"><i class="fa fa-arrow-right text-muted"></i></button>
        </div>
      </div>
    </form>

    <!-- /.lockscreen credentials -->

  </div>
  <!-- /.lockscreen-item -->
  <div class="help-block text-center">
    Masukan password admin Perpustakaan <br>
    <?php

      if(isset($_GET['pesan'])){
        if($_GET['pesan'] == "gagal"){
          echo " <font color='#ff0000'> password yang anda masukan salah! Coba Lagi!</font> ";
        }else if($_GET['pesan'] == "logout"){
          echo "<font color='blue'> Anda telah berhasil logout</font>";
        }else if($_GET['pesan'] == "belum_login"){
          echo "<font color='#ff0000'>Anda harus login! untuk mengakses halaman admin !!</font>  ";
        }
      }
      ?>
  </div>
  <div class="text-center">
    <b><?php echo date('D d F Y | H:i:s');  ?></b>


  </div>
  <div class="lockscreen-footer text-center">
    Copyright &copy; 2016-2019 <b><a href="https://m4care.wordpress.com"  target="_blank" class="text-black">Medicare</a></b><br>
    All rights reserved
  </div>
</div>
<!-- /.center -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>
