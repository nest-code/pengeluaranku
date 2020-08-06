<?php
include 'config.php';

$nama = $_POST['nama'];
$tanggal = $_POST['tanggal'];
$kategori = $_POST['kategori'];
$price = $_POST['harga'];
$information = $_POST['ket'];

$sql = "INSERT INTO tb_transaksi (transection_id, date, name, category_id, price, information) VALUES ('','$tanggal','$nama','$kategori','$price','$information')";
$db=mysqli_query($config,$sql);

if ($db){
    ?>
    <script type="text/javascript">
         alert("Berhasil Disimpan");
        window.location.href = "?halaman=today"
    </script>
    <?php
      }
  
?>
