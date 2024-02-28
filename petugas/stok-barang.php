<div class="row">
    <div class="col-lg-12 grid-margin sretch-card">
        <div class="card">
            <h4>Daftar Barang</h4>
            <div class="row">
                <div class="form-group col-sm-6">
                    <a href="?page=tambah-barang" class="btn btn-sm btn-primary">Tambah barang +</a>
                </div>
                <form action="?page=cari-barang" method="post">
                    <div class="form-group col-sm-6">
                        <input type="text" name="search" placeholder="Cari Barang..." class="form-control input-sm">
                    </div>
                </form>
            </div>
            <div class="table-responsive">
                <table class="table" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Foto</th>
                            <th>Nama Produk</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Terjual</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no = 1;
                            $sql = $koneksi->query("SELECT * FROM produk ORDER BY ProdukID DESC");
                            while ($data = $sql->fetch_assoc()) {
                        ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo "<img src='../foto/".$data['Foto']."'  width='70' height='70'></img>"; ?></td>
                            <td><?php echo $data['NamaProduk'] ?></td>
                            <td>Rp. <?php echo number_format($data['Harga']) ?></td>
                            <td><?php echo $data['Stok'] ?></td>
                            <td><?php echo $data['Terjual'] ?></td>
                            <td><a href="?page=edit-barang&id=<?= $data['ProdukID'] ?>" class="btn btn-sm btn-warning">Edit</a> <a onclick="return confirm('Apakah anda yakin ingin menghapusnya!!')" href="?page=hapus-barang&id=<?= $data['ProdukID'] ?>" class="btn btn-sm btn-danger">Delete</a></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>