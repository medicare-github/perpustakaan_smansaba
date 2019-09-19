<?php
  header("Content-type: application/vnd-ms-excel");
  header("Content-Disposition: attachment; filename=rekapan_semua_pinjaman.xlsx");
 ?>
        <small class="pull-right">Date: <?php echo date('d/m/Y')  ?></small> <br>
        <b>REKAPAN SEMUA PINJAMAN  SISWA PERPUSTAKAAN SMAN 1 BAYAN</b><br>
        alamat : JL. RAYA TANJUNG – BAYAN, Anyar, Kec. Bayan Lombok Utara <br>
        Email  : sman1bayan@gmail.com
        <b><hr></b>
        <div class="row">
          <div class="col-xs-12 table-responsive">
            <table class="table table-striped" width="60%" border="1" cellspacing="0" cellpadding="4">
              <thead>
              <tr>
                <th>No</th>
                <th>NISN</th>
                <th>NAMA</th>
                <th>JUDUL BUKU</th>
                <th>JUMLAH PINJAM</th>
                <th>STATUS PENGEMBALIAN</th>



              </tr>
              </thead>
              <tbody>
                <?php
                include_once '../connection/connection.php';
                $query="SELECT * FROM transaksi INNER JOIN siswa ON transaksi.siswa_id=siswa.id_siswa INNER JOIN buku ON transaksi.buku_id=buku.id";
                $result=mysqli_query($con,$query);
                $no=1;
                while ($data=mysqli_fetch_object($result)):

                 ?>

              <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $data->nis ?></td>
                <td><?php echo $data->nama ?></td>
                <td><?php echo $data->judul ?></td>
                <td><?php echo $data->jumlah_pinjam ?></td>
                <td><?php echo $data->status ?></td>



              </tr>
              <?php
                endwhile;
               ?>

              </tbody>
            </table>
          </div>

        </div>
