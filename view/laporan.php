<section>
<form action="" method="POST">
  <div class="row">
    <div class="col-4">
        <div class="form-group">
            <label>Nama </label>
            <input type="text" name="name" class="form-control">
        </div>
    </div>
    <div class="col-4">
    <div class="form-group">
                <label>Kategori</label>
                <select name="kategori" class="form-control">
                    <option value="">-Pilih-</option>
                <?php
                    include "./model/config.php";
                    $sqlkategori = mysqli_query ($config, "SELECT * FROM tb_kategori group by category_name asc");
                    while ($kategori = $sqlkategori->fetch_assoc()) {
                    ?>
                    <option value="<?php echo $kategori['category_id'];?>"><?php echo $kategori['category_name'];?></option>
                    <?php }
                    ?>
                </select>
            </div>
    </div>

    <div class="col-3">
    <label>.</label>
        <div class="form-group">
                <button type="submit" name="kirim" value="kirim"  class="btn btn-primary" > Kirim</button>
        </div>
    </div>
  </div>
  
</form>
</section>


<?php

if(isset($_POST["kirim"]) == 'kirim'){?>


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
        $kategori =$_POST['kategori'];
        $name =$_POST['name'];
  
        if($name == '' ){
            $sql = mysqli_query ($config, "SELECT *  FROM tb_transaksi LEFT JOIN tb_kategori on tb_kategori.category_id = tb_transaksi.category_id WHERE  tb_kategori.category_id = '$kategori'");
        }else{
            $sql = mysqli_query ($config, "SELECT *  FROM tb_transaksi LEFT JOIN tb_kategori on tb_kategori.category_id = tb_transaksi.category_id WHERE  tb_transaksi.name LIKE '%$name%' ");
        }

        while ($result = $sql->fetch_assoc()) {
        ?>
            <tr>
                <td><?php echo $result['date']; ?></td>
                <td><?php echo $result['name']; ?></td>
                <td><?php echo $result['category_name']; ?></td>
                <td ><?php echo rupiah($result['price']) ?></td>
            </tr>
            <?php }
            ?>
    </tbody>
    </table>
</section>

<?php }?>

