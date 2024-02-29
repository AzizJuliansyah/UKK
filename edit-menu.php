<?php
include("header.php");
include("koneksi/koneksi.php");
?>
<body style="background-color: whitesmoke;">
    
<nav style="background-color: #4863A0;" class="navbar navbar-expand-sm navbar-secondary fixed-top">
        <div class="container-fluid">
            <a href="#" class="navbar-brand text-light">Waroenk</a>
            <div class="navbar-collapse">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="index.php" class="nav-link text-light mx-2">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a href="pilih-menu.php" class="nav-link text-light mx-2">Menu</a>
                    </li>
                    <li class="nav-item">
                        <a href="pesan-menu.php" class="nav-link text-light mx-2">Pesan</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
<div class="p-4 main-content">
    <div class="card" style="background-color: whitesmoke;">
        <div class="card-body">
        <a href="pesanan.php" style="background-color: #4863A0;" class="btn btn-sm text-light float-end mb-3">Kembali</a>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal Pemesanan</th>
                        <th>Nama Pemesan</th>
                        <th>No Meja</th>
                        <th>Menu</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $totalharga = 0;
                        $sql = $koneksi->query("SELECT * FROM penjualan ORDER BY PenjualanID DESC");
                        $data = $sql->fetch_assoc();

                        if (isset($_POST['submit'])) {
                            $menu_jumlah = $_POST['menu'];
                            $jumlah_array = $_POST['jumlah'];
                            $stok = true;
                        
                            foreach ($menu_jumlah as $i => $item) {
                                $parts = explode("|", $item);
                                $produk_id = $parts[0];
                                $harga = $parts[1];
                                $jumlah = $jumlah_array[$i];
                        
                                $sql = $koneksi->query("SELECT Stok FROM produk WHERE ProdukID = '$produk_id'");
                                $row = $sql->fetch_assoc();
                                $stok_produk = $row['Stok'];
                        
                                if ($jumlah > $stok_produk) {
                                    $stok = false;
                                    break;
                                }
                            }
                        
                            if ($stok) {
                                foreach ($menu_jumlah as $i => $item) {
                                    $parts = explode("|", $item);
                                    $produk_id = $parts[0];
                                    $harga = $parts[1];
                                    $jumlah = $jumlah_array[$i];
                                
                                    $sql = $koneksi->query("INSERT INTO detailpenjualan (DetailID, ProdukID, JumlahProduk, Subtotal) VALUES ('".$data['PenjualanID']."', '$produk_id', '$jumlah', '$harga')");
                                    $sql = $koneksi->query("UPDATE produk SET Stok = Stok - $jumlah WHERE ProdukID='$produk_id'");
                                    $sql = $koneksi->query("UPDATE produk SET Terjual = Terjual + $jumlah WHERE ProdukID='$produk_id'");
                                }
                        
                                header("Location: pesanan.php");
                                exit();
                            } else {
                                echo "<script>alert('Maaf, Jumlah pesanan melebihi stok yang tersedia. Silakan periksa kembali pesanan anda')</script>";
                            }
                            
                        }
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
                                        <th>Aksi</th>
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
                                            <td>
                                                <form action="hapus-menu_edit.php" method="post">
                                                    <input type="hidden" value="<?php echo $data3['PenjualanID']; ?>" name="id" id="id">
                                                    <input type="hidden" value="<?php echo $data3['ProdukID']; ?>" name="ProdukID" id="PordukID">
                                                    <input type="hidden" value="<?php echo $data3['JumlahProduk']; ?>" name="Jumlah" id="Jumlah">
                                                    <button type="submit" onclick="return confirm('Apakah anda yakin ingin menghapusnya!!')" href="hapus-menu.php?id=<?= $data3['PenjualanID']; ?>" class="btn btn-sm btn-danger">Hapus</button>
                                                </form>
                                            </td>
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
                    </tr>
                </tbody>
            </table>

            <script>
                function tambahMenu() {
                    var container = document.getElementById("menuContainer");
                    var newMenuInput = document.createElement("div");

                    newMenuInput.innerHTML = `
                    <div class="row">
                                        <div class="form-group col-sm-6">
                                            <label for="menu" class="form-label">No Meja: <span style="color: red;">*</span></label>
                                            <select name="menu[]" onchange="showDetails(this)" id="menu" class="form-control">
                                                <option value="">Pilih Menu</option>
                                                <?php
                                                    $sql = $koneksi->query("SELECT * FROM produk WHERE Stok > 0");
                                                    while ($data = $sql->fetch_assoc()) {
                                                ?>
                                                <option value="<?php echo $data['ProdukID'] . '|' . $data['Harga'] . '|' . $data['Stok'];  ?>"><?php echo $data['NamaProduk']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-3">
                                            <label for="harga" class="form-label">Harga:</label>
                                            <input type="text" name="harga" id="harga" class="form-control harga" disabled>
                                        </div>
                                        <div class="form-group col-sm-3">
                                            <label for="stok" class="form-label">Stok:</label>
                                            <input type="text" name="stok" id="stok" class="form-control stok" disabled>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="jumlah" class="form-label">Jumlah: <span style="color: red;">*</span></label>
                                        <input type="number" min="1" name="jumlah[]" id="jumlah" class="form-control" placeholder="Masukkan jumlah" required>
                                        <button type="button" onclick="hapusMenu(this)" class="btn btn-danger mt-3 col-12">Hapus</button>
                                    </div>
                    `;

                    container.appendChild(newMenuInput);
                }

                function hapusMenu(button) {
                    var divToRemove = button.parentNode.parentNode;
                    divToRemove.remove();
                }

                function showDetails(select) {
                    var menu = select.value;
                    var menuDetails = menu.split('|');
                    var formattedPrice = Number(menuDetails[1]).toLocaleString('id-ID');
                    var parentDiv = select.closest(".row");
                    var hargaInput = parentDiv.querySelector(".harga");
                    var stokInput = parentDiv.querySelector(".stok");
                    hargaInput.value = "Rp. " + formattedPrice;
                    stokInput.value = menuDetails[2];
                }
            </script>

            <div>
                <div class="card">
                    <div class="card-body">
                        <div class="container">
                            <h2>Tambah Pesanan</h2>
                            <form action="" method="post">
                                <div id="menuContainer">
                                    <div class="row">
                                        <div class="form-group col-sm-6">
                                            <label for="menu" class="form-label">No Meja: <span style="color: red;">*</span></label>
                                            <select name="menu[]" onchange="showDetails(this)" id="menu" class="form-control">
                                                <option value="">Pilih Menu</option>
                                                <?php
                                                    $sql = $koneksi->query("SELECT * FROM produk WHERE Stok > 0");
                                                    while ($data = $sql->fetch_assoc()) {
                                                ?>
                                                <option value="<?php echo $data['ProdukID'] . '|' . $data['Harga'] . '|' . $data['Stok'];  ?>"><?php echo $data['NamaProduk']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-3">
                                            <label for="harga" class="form-label">Harga:</label>
                                            <input type="text" name="harga" id="harga" class="form-control harga" disabled>
                                        </div>
                                        <div class="form-group col-sm-3">
                                            <label for="stok" class="form-label">Stok:</label>
                                            <input type="text" name="stok" id="stok" class="form-control stok" disabled>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="jumlah" class="form-label">Jumlah: <span style="color: red;">*</span></label>
                                        <input type="number" min="1" name="jumlah[]" id="jumlah" class="form-control" placeholder="Masukkan jumlah" required>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-warning me-3" onclick="tambahMenu()">+</button>
                                <button type="submit" name="submit" class="btn text-light" style="background-color: #4863A0;">Tambah</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

</body>