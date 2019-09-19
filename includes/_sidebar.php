<section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../Report/img/smansaba.jpeg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Admin Perpustakaan</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                  <i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'dashboard.php'){echo 'active'; }else { echo ''; } ?>">
          <a href="../Dashboard/dashboard.php">
            <i class="glyphicon glyphicon-home"></i> <span>Dashboard</span>
          </a>
        </li>
        <li class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'inputPeminjaman.php'){echo 'active'; }else { echo ''; } ?>">
          <a href="../CrudPeminjaman/inputPeminjaman.php">
            <i class="glyphicon glyphicon-plus"></i> <span>Peminjaman</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">New</small>
            </span>
          </a>
        </li>
        <li class="treeview <?php if(basename($_SERVER['SCRIPT_NAME']) == 'dataBuku.php'){echo 'active'; }elseif(basename($_SERVER['SCRIPT_NAME']) == 'dataSiswa.php') { echo 'active'; }elseif (basename($_SERVER['SCRIPT_NAME']) == 'dataKategori.php') {echo 'active';}elseif (basename($_SERVER['SCRIPT_NAME']) == 'dataKelas.php') {echo 'active';} else {echo '';}?>">
          <a href="#">
            <i class="fa fa-table"></i> <span>Tables Data Master</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'dataBuku.php'){echo 'active'; }else { echo ''; } ?>">
              <a href="../crudBuku/dataBuku.php"><i class="fa fa-circle-o"></i> Data Buku</a>
            </li>
            <li class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'dataSiswa.php'){echo 'active'; }else { echo ''; } ?>">
              <a href="../crudSiswa/dataSiswa.php"><i class="fa fa-circle-o"></i> Data Siswa</a>
            </li>
            <li class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'dataKategori.php'){echo 'active'; }else { echo ''; } ?>">
              <a href="../crudKategori/dataKategori.php"><i class="fa fa-circle-o"></i> Data Kategori Buku</a>
            </li>
            <li class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'dataKelas.php'){echo 'active'; }else { echo ''; } ?>">
              <a href="../crudKelas/dataKelas.php"><i class="fa fa-circle-o"></i> Data Kelas</a>
            </li>
          </ul>
        </li>

        <li class="header">DATA PEMINJAMAN</li>

        <li class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'dataPeminjaman.php'){echo 'active'; }else { echo ''; } ?>">
          <a href="../CrudPeminjaman/dataPeminjaman.php"><i class="fa fa-circle-o text-yellow"></i> <span>Data Peminjaman</span></a>
        </li>
        <li class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'dataPengembalian.php'){echo 'active'; }else { echo ''; } ?>">
          <a href="../CrudPeminjaman/dataPengembalian.php"><i class="fa fa-circle-o text-green"></i> <span>Data Pengembalian</span></a>
        </li>

        <li class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'allPeminjaman.php'){echo 'active'; }else { echo ''; } ?>">
          <a href="../CrudPeminjaman/allPeminjaman.php"><i class="fa fa-circle-o text-light-blue"></i> <span>Semua Data Peminjaman</span></a>
        </li>

        <li class="header">LABELS</li>
        <li class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'home.php'){echo 'active'; }else { echo ''; } ?>">
          <a href="../logout.php"><i class="fa fa-circle-o text-red"></i> <span>Logout</span></a>
        </li>



      </ul>
    </section>
