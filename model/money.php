<?php
    include "./model/config.php";

    $sqljum = mysqli_query ($config, "SELECT SUM(price) as pengeluaran FROM tb_transaksi WHERE NOW()");
    $data = $sqljum->fetch_assoc();
?>