<section>
  <h1>Pengeluaranmu</h1>
</section>
<section>
    <table class="table">
    <thead>
        <tr>
        <th scope="col">Tanggal</th>
        <th scope="col">Nama</th>
        <th scope="col">Kategori</th>
        <th scope="col">Harga</th>
        </tr>
    </thead>
    <tbody>
        <?php
        include "./model/config.php";

        $sql = mysqli_query ($config, "select *  from tb_transaksi LEFT JOIN tb_kategori on tb_kategori.category_id = tb_transaksi.category_id");
        while ($result = $sql->fetch_assoc()) {
        ?>
            <tr>
                <td><?php echo $result['date']; ?></td>
                <td><?php echo $result['name']; ?></td>
                <td><?php echo $result['category_name']; ?></td>
                <td ><?php echo $result['price']; ?></td>
            </tr>
            <?php }
            ?>
    </tbody>
    </table>
</section>

    <footer class="footer">
      <div class="container">
        <h4>Total Pengeluaran :<?php echo rupiah($data['pengeluaran']) ?></h4>
      </div>
    </footer>

