<?php
    include "./model/config.php";

    $sql = mysqli_query ($config, "SELECT SUM(price) as pengeluaran FROM tb_transaksi WHERE NOW()");
    $data = $sql->fetch_assoc();
?>