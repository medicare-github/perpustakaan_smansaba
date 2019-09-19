<?php

  header("Content-type: application/vnd-ms-excel");
  header("Content-Disposition: attachment; filename=semua_data_peminjaman.xls");


 ?>
       <small class="pull-right">Date: <?php echo date('d/m/Y')  ?></small> <br>
       <b>LAPORAN PEMINJAMAN PERPUSTAKAAN SMAN 1 BAYAN</b> <br>
       <b>Rentang waktu :</b> <?php echo $_GET['tgl1'] ?> sampai <?php echo $_GET['tgl2'] ?>
       <br>
       <hr>

        <div class="row">
          <div class="col-xs-12 table-responsive">
            <table class="table table-striped" width="60%" border="1" cellspacing="0" cellpadding="4">
              <thead>
              <tr>
                <th>No</th>
                <th>NIS</th>
                <th>Nama Siswa</th>
                <th>Judul Buku</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
                <th>Jumlah Pinjam</th>
              </tr>
              </thead>
              <tbody>
                <?php
                include_once '../connection/connection.php';
                $query="SELECT * FROM transaksi INNER JOIN siswa ON transaksi.siswa_id=siswa.id_siswa INNER JOIN buku ON transaksi.buku_id=buku.id WHERE tanggal_pinjam BETWEEN '$_GET[tgl1]' AND '$_GET[tgl2]' ";
                $result=mysqli_query($con,$query);
                $no=1;
                while ($data=mysqli_fetch_object($result)):

                 ?>

              <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $data->nis ?></td>
                <td><?php echo $data->nama ?></td>
                <td><?php echo $data->judul ?></td>
                <td><?php echo $data->tanggal_pinjam ?></td>
                <td><?php echo $data->sudah_kembali ?></td>
                <td><?php echo $data->jumlah ?></td>

              </tr>
              <?php
                endwhile;
               ?>

              </tbody>
            </table>
          </div>

        </div>
