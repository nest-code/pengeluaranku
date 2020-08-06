<?php
include 'config.php';

$id = $_GET['id'];
$sql = mysqli_query($config, "delete from tb_transaksi where transection_id='$id'");

if ($sql){
    ?>
    <script type="text/javascript">
         alert("Berhasil Dihapus");
        window.location.href = "?halaman=today"
    </script>
    <?php
      }
  
?>
