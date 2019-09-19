<?php
  header("Content-type: application/vnd-ms-excel");
  header("Content-Disposition: attachment; filename=data_siswa.xlsx");
 ?>
          
          <small class="pull-right">Date: <?php echo date('d/m/Y')  ?></small> <br>
          <b>LAPORAN DATA SISWA PERPUSTAKAAN</b><br>
          <b>SMA NEGERI 1 BAYAN</b><br>
          alamat : JL. RAYA TANJUNG – BAYAN, Anyar, Kec. Bayan Lombok Utara <br>
          Email  : sman1bayan@gmail.com <br>
          <hr>


        <div class="row">
          <div class="col-xs-12 table-responsive">
            <table class="table table-striped" width="60%" border="1" cellspacing="0" cellpadding="4">
              <thead>
              <tr>
                <th>No</th>
                <th>NISN</th>
                <th>NAMA</th>
                <th>TEMPAT / TANGGAL LAHIR</th>
                <th>JENIS KELAMIN</th>
                <th>AGAMA</th>
                <th>ALAMAT</th>
                <th>KELAS</th>


              </tr>
              </thead>
              <tbody>
                <?php
                include_once '../connection/connection.php';
                $query="SELECT * FROM siswa INNER JOIN kelas ON siswa.id_kelas=kelas.id_kelas ORDER BY nama_kelas ASC";
                $result=mysqli_query($con,$query);
                $no=1;
                while ($data=mysqli_fetch_object($result)):

                 ?>

              <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $data->nis ?></td>
                <td><?php echo $data->nama ?></td>
                <td><?php echo $data->tempat_lahir ?> - <?php echo $data->tanggal_lahir ?></td>
                <td><?php echo $data->jenis_kelamin ?></td>
                <td><?php echo $data->agama ?></td>
                <td><?php echo $data->alamat ?></td>
                <td><?php echo $data->nama_kelas ?></td>


              </tr>
              <?php
                endwhile;
               ?>

              </tbody>
            </table>
          </div>

        </div>
