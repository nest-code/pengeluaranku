<?php

  $halaman = @$_GET['halaman'];
  $aksi = @$_GET['aksi'];

if ($halaman =="beranda") {
        if ($aksi == "") {
          include_once './view/beranda.php';
        }elseif ($aksi == "select_pengumuman") {
          include 'data/select_sampah.php';
        }

}elseif ($halaman =="cek"){
      if ($aksi== "") {
        include './view/data.php';
      }elseif ($aksi == "all") {
        include './view/data_all.php';
      }

}elseif ($halaman =="today"){
      if ($aksi== "") {
        include './view/data_today.php';
      }elseif ($aksi == "add") {
        include 'model/add_data.php';
      }elseif ($aksi == "hapus") {
        include 'model/delete_data.php';
      }

}elseif ($halaman =="laporan"){
  if ($aksi== "") {
    include './view/laporan.php';
  }elseif ($aksi == "select_") {
    include 'data/jenis_select.php';
  }

}elseif ($halaman ==""){
    if ($aksi== "") {
      include 'view/beranda.php';
    }
   
}

?>
