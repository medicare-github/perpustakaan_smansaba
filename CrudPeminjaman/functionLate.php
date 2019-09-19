<?php
function Terlambat($tgl_dateline, $tgl_kembali)
{
  $tgl_dateline_pecah=explode("/",$tgl_dateline);
  // $tgl_dateline_pecah=$tgl_dateline_pecah[2]."/".$tgl_dateline_pecah[1]."/".$tgl_dateline_pecah[0];
  $tgl_kembali_pecah=explode("/",$tgl_kembali);
  // $tgl_kembali_pecah=$tgl_kembali_pecah[2]."/".$tgl_kembali_pecah[1]."/".$tgl_kembali_pecah[0];
  $selisih=strtotime($tgl_kembali_pecah[0].'/'.$tgl_kembali_pecah[1].'/'.$tgl_kembali_pecah[2])-strtotime($tgl_dateline_pecah[0].'/'.$tgl_dateline_pecah[1].'/'.$tgl_dateline_pecah[2]);
  // $selisih1=strtotime('08/27/2019');
  $selisih=$selisih/86400;
  if ($selisih>=1) {
    $hasil_tgl=floor($selisih);
  }else {

    $hasil_tgl=0;
  }
  return $hasil_tgl;
// echo $tgl_kembali_pecah[0];
// echo $tgl_kembali_pecah[1];
// echo $tgl_kembali_pecah[2];
echo $hasil_tgl;
// echo $selisih1;


}

 ?>
