<section>
    <div class="row">
        <div class="col-4">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title"><?php echo rupiah($data['pengeluaran']) ?></h5>
                    <p class="card-text">Pengeluaran Hari Ini</p>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    Tambah
                    </button>
                </div>
            </div>
        </div>

        <div class="col-4">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title"><?php echo rupiah($datatot['pengeluaran']) ?></h5>
                    <p class="card-text">Pengeluaran dari tanggal : </p>
                        <b> <?php echo $datatot['date'];?> - <?php echo date('Y-m-d');?> </b> 
                </div>
            </div>
        </div>

    </div>
</section>


<section>
    <table class="table">
    <thead>
        <tr>
            <th scope="col">Tanggal</th>
            <th scope="col">Nama</th>
            <th scope="col">Kategori</th>
            <th scope="col">Harga</th>
            <th style="text-align:center">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        include "model/config.php";
        date_default_timezone_set('Asia/Jakarta');
        $today = date('Y-m-d');
        $sqltoday = mysqli_query ($config, "select *  from tb_transaksi LEFT JOIN tb_kategori on tb_kategori.category_id = tb_transaksi.category_id where tb_transaksi.date='$today' order by tb_transaksi.date asc");
        while ($result = $sqltoday->fetch_assoc()) {
        ?>
            <tr>
                <td><?php echo $result['date']; ?></td>
                <td><?php echo $result['name']; ?></td>
                <td><?php echo $result['category_name']; ?></td>
                <td ><?php echo rupiah($result['price']) ?></td>
                <td style="text-align:center">
                    <a href="?halaman=today&aksi=hapus&id=<?php echo $result ['transection_id']; ?>" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"><i class="fa fa-trash fa-sm text-white-50"></i> Hapus</a>    
                </td>
            </tr>
            <?php }
            ?>
    </tbody>
    </table>
</section>


<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Pengeluaran</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="?halaman=today&aksi=add" method="POST"> 
            <div class="form-group">
                <label>Tanggal</label>
                <input type="date" class="form-control" name="tanggal" value="<?php echo date('Y-m-d') ?>">
            </div>

            <div class="form-group">
                <label>Nama</label>
                <input type="text" class="form-control" name="nama" required  >
            </div>

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

            <div class="form-group">
                <label>Jumlah</label>
                <input type="text" class="form-control" name="harga" required >
            </div>

            <div class="form-group">
                <label>Keterangan</label>
            <textarea name="ket" class="form-control" ></textarea>
            </div>
        
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>


