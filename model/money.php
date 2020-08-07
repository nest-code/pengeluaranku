<?php
    include "./model/config.php";
    $today = date('Y-m-d');
    $sqljum = mysqli_query ($config, "SELECT SUM(price) as pengeluaran FROM tb_transaksi where date='$today' ");
    $data = $sqljum->fetch_assoc();


    $sqltot = mysqli_query ($config, "SELECT transection_id,date, SUM(price) as pengeluaran FROM tb_transaksi order by date ASC limit 1");
    $datatot = $sqltot->fetch_assoc();

    $saldo = 2000000;  // Saldo Rp 2 Juta
    $pemakaian=$datatot['pengeluaran'];
    $dompet = $saldo-$pemakaian;
    return

    // var_dump($dompet);
    // die();
?>