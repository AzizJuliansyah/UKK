<p></p>
<form action="" method="post">
    <div class="row">
        <div class="form-group col-sm-10">
            <input type="date" name="search" placeholder="Cari Transaksi..." class="form-control input-sm">
        </div>
        <div class="form-group col-sm-2">
            <button type="submit" class="btn btn-primary btn-sm">Cari daftar transaksi</button>
        </div>
    </div>
</form>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Tanggal Pemesanan</th>
            <th>Nama Pemesan</th>
            <th>No Meja</th>
            <th>Menu</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
            if (isset($_POST['search'])) {
                $tanggal = $_POST['search'];
                $totalharga = 0;
                $sql = $koneksi->query("SELECT * FROM penjualan WHERE TanggalPenjualan LIKE '%$tanggal%'");
                    if ($sql->num_rows > 0) { ?>
                        <a href="?page=daftar-transaksi" class="btn btn-primary">kembali</a>
                        <p></p>
                    <?php
                        while ($data = $sql->fetch_assoc()) {
                    ?>
                    <tr>
                        <td><?php echo $data['PenjualanID'] ?></td>
                        <td><?php echo $data['TanggalPenjualan'] ?></td>
                    <?php
                        $sql2 = $koneksi->query("SELECT * FROM pelanggan WHERE PelangganID='".$data['PenjualanID']."' ");
                        while($data2 = $sql2->fetch_assoc()) { ?>
                        <td><?php echo $data2['NamaPelanggan'] ?></td>
                        <td><?php echo $data2['NoMeja'] ?></td>
                    <?php } ?>
                        <td>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Nama Barang</th>
                                        <th>Jumlah</th>
                                        <th>Harga</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    <?php
                                        $sql3 = $koneksi->query("SELECT * FROM detailpenjualan WHERE DetailID='".$data['PenjualanID']."' ");
                                        while($data3 = $sql3->fetch_assoc()) { ?>
                                        <?php
                                            $sql4 = $koneksi->query("SELECT * FROM produk WHERE ProdukID='".$data3['ProdukID']."' ");
                                            while($data4 = $sql4->fetch_assoc()) { ?>
                                            <td><?php echo $data4['NamaProduk'] ?></td>
                                        <?php } ?>
                                            <td><?php echo $data3['JumlahProduk'] ?></td>
                                            <td>Rp. <?php echo number_format($data3['Subtotal']) ?></td>
                                            
                                        </tr>
                                    <?php
                                        $totalproduk = $data3['JumlahProduk'] * $data3['Subtotal'];
                                        $totalharga += $totalproduk;
                                        }
                                    ?>
                                    <tr>
                                        <td colspan="2"><strong>Total Harga: </strong></td>
                                        <td colspan="2"><strong>Rp. <?php echo number_format("$totalharga") ?></strong></td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                        <td><a onclick="return confirm('Apakah anda yakin ingin menghapusnya!!')" href="?page=hapus-daftar-transaksi&id=<?= $data['PenjualanID']; ?>" class="btn btn-sm btn-danger">Hapus</a></td>
                    </tr>
                    <?php } 
                    } else{ ?>
                        <table>
                            <p style="text-align: center;">Tidak ada daftar transaksi yang ditemukan. <a href="?page=daftar-transaksi">kembali</a></p>
                        </table>
                    <?php }
                    } else {
                    
                        $totalharga = 0;
                        $sql = $koneksi->query("SELECT * FROM penjualan ORDER BY PenjualanID DESC");
                        while ($data = $sql->fetch_assoc()) {
                    ?>
                    <tr>
                        <td><?php echo $data['PenjualanID'] ?></td>
                        <td><?php echo $data['TanggalPenjualan'] ?></td>
                    <?php
                        $sql2 = $koneksi->query("SELECT * FROM pelanggan WHERE PelangganID='".$data['PenjualanID']."' ");
                        while($data2 = $sql2->fetch_assoc()) { ?>
                        <td><?php echo $data2['NamaPelanggan'] ?></td>
                        <td><?php echo $data2['NoMeja'] ?></td>
                    <?php } ?>
                        <td>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Nama Barang</th>
                                        <th>Jumlah</th>
                                        <th>Harga</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    <?php
                                        $sql3 = $koneksi->query("SELECT * FROM detailpenjualan WHERE DetailID='".$data['PenjualanID']."' ");
                                        while($data3 = $sql3->fetch_assoc()) { ?>
                                        <?php
                                            $sql4 = $koneksi->query("SELECT * FROM produk WHERE ProdukID='".$data3['ProdukID']."' ");
                                            while($data4 = $sql4->fetch_assoc()) { ?>
                                            <td><?php echo $data4['NamaProduk'] ?></td>
                                        <?php } ?>
                                            <td><?php echo $data3['JumlahProduk'] ?></td>
                                            <td>Rp. <?php echo number_format($data3['Subtotal']) ?></td>
                                            
                                        </tr>
                                    <?php
                                        $totalproduk = $data3['JumlahProduk'] * $data3['Subtotal'];
                                        $totalharga += $totalproduk;
                                        }
                                    ?>
                                    <tr>
                                        <td colspan="2"><strong>Total Harga: </strong></td>
                                        <td colspan="2"><strong>Rp. <?php echo number_format("$totalharga") ?></strong></td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                        <td><a onclick="return confirm('Apakah anda yakin ingin menghapusnya!!')" href="?page=hapus-daftar-transaksi&id=<?= $data['PenjualanID']; ?>" class="btn btn-sm btn-danger">Hapus</a></td>
                    </tr>
                    <?php } } ?>
    </tbody>
</table>