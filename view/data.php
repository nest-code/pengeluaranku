<section>
  <h1>Pengeluaranmu <a href="?halaman=cek&aksi=all" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"> Lihat Semua</a></h1> 
 
</section>
<section>
    <table class="table">
    <thead>
        <tr>
        <th scope="col">Tanggal</th>
        <th scope="col">Jumlah Transaksi</th>
        <th scope="col">Sub  Transaksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        include "./model/config.php";
        $sql = mysqli_query ($config, "SELECT DATE_FORMAT(date,'%Y/%m/%d') AS tahun_bulan, COUNT(*) AS Tanggal_Transaksi, SUM(price) as total
        FROM tb_transaksi GROUP BY DATE_FORMAT(date,'%Y/%m/%d') ASC");
        while ($result = $sql->fetch_assoc()) {
        ?>
            <tr>
                <td><?php echo $result['tahun_bulan']; ?></td>
                <td><?php echo $result['Tanggal_Transaksi']; ?></td>
                <td> <?php $tot=$result['total']; echo rupiah($tot);?></td>
            </tr>
            <?php }
            ?>
    </tbody>
    </table>
</section>

    <footer class="footer">
      <div class="container">
        <div class="right" align="right"> 
          <h4>Total Pengeluaran :<?php echo rupiah($datatot['pengeluaran']) ?></h4>
        </div>  
      </div>
    </footer>

