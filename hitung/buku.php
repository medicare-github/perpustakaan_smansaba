<?php
require '../connection/connection.php';
$query="SELECT * FROM buku";
$result=mysqli_query($con,$query);
$no=1;
$hitung=0;
while ($data=mysqli_fetch_object($result)):

$hitung=$no++;


 ?>
 <?php
 endwhile;
 ?>
