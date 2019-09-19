<?php
  header("Content-type: application/vnd-ms-excel");
  header("Content-Disposition: attachment; filename=data_buku.xlsx");
 ?>
        <small class="pull-right">Date: <?php echo date('d/m/Y')  ?></small> <br>
        <b>LAPORAN BUKU PERPUSTAKAAN SMAN 1 BAYAN</b><br>
        alamat : JL. RAYA TANJUNG – BAYAN, Anyar, Kec. Bayan Lombok Utara <br>
        Email  : sman1bayan@gmail.com
        <b><hr></b>
        <div class="row">
          <div class="col-xs-12 table-responsive">
            <table class="table table-striped" width="100%" border="1" cellspacing="0" cellpadding="4">
              <thead>
              <tr>
                <th>No</th>
                <th>Kode Buku</th>
                <th>Judul</th>
                <th>Pengarang</th>
                <th>Penerbit</th>
                <th>Kategori</th>
                <th>Kelas</th>
                <th>ISBN</th>
                <th>Tahun</th>
                <th>Jumlah</th>
                <th>Lokasi</th>

              </tr>
              </thead>
              <tbody>
                <?php
                include_once '../connection/connection.php';
                $query="SELECT * FROM buku INNER JOIN kategori ON buku.kategori_id=kategori.id_kategori ORDER BY id DESC";
                $result=mysqli_query($con,$query);
                $no=1;
                while ($data=mysqli_fetch_object($result)):

                 ?>

              <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $data->kode ?></td>
                <td><?php echo $data->judul ?></td>
                <td><?php echo $data->pengarang ?></td>
                <td><?php echo $data->penerbit ?></td>
                <td><?php echo $data->nama_kategori ?></td>
                <td><?php echo $data->kelas_buku ?></td>
                <td><?php echo $data->isbn ?></td>
                <td><?php echo $data->tahun ?></td>
                <td><?php echo $data->jumlah ?></td>
                <td><?php echo $data->lokasi ?></td>

              </tr>
              <?php
                endwhile;
               ?>

              </tbody>
            </table>
          </div>

        </div>
