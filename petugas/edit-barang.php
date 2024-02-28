<p></p>
<?php
$id = $_GET['id'];

$sql = $koneksi->query("SELECT * FROM produk WHERE ProdukID = '$id'");
$data = $sql->fetch_assoc();

if (isset($_POST['submit'])) {
    $Nama = $_POST['Nama'];
    $Harga = $_POST['Harga'];
    $Stok = $_POST['Stok'];
    $Terjual = $_POST['Terjual'];
    $target = "../foto./";
    $time = date('dmYHis');
    $type = strtolower(pathinfo($_FILES['Foto']['name'], PATHINFO_EXTENSION));
    $targetfile = $target . $time . '.' . $type;
    $filename = $time . '.' . $type;

    if ($_FILES['Foto']['name'] !='') {
        move_uploaded_file($_FILES['Foto']['tmp_name'], $targetfile);
        $fotlam = $data['Foto'];
        unlink("../foto/".$fotlam);
        $sql = $koneksi->query("UPDATE produk SET NamaProduk='$Nama', Harga='$Harga', Stok='$Stok', Terjual='$Terjual', Foto='$filename' WHERE ProdukID = '$id'");
        echo "<script>alert('Berhasil Mengubah data barang');window.location.href='?page=stok-barang';</script>";
    } else {
        $sql = $koneksi->query("UPDATE produk SET NamaProduk='$Nama', Harga='$Harga', Stok='$Stok', Terjual='$Terjual' WHERE ProdukID = '$id'");
        echo "<script>alert('Berhasil Mengubah data barang');window.location.href='?page=stok-barang';</script>";
    }
    
}
?>
<div class="p-4 main-content">
    <div class="card well">
        <div class="card-body">
            <div class="container mt-5">
                <h2>Edit Barang</h2>
                <form action="" method="post" class="col-md-10" enctype="multipart/form-data">
                <div class="row">
                    <div class="form-group col-sm-6">
                        <label for="Nama" class="form-label">Nama Barang: </label>
                        <input type="text" value="<?php echo $data['NamaProduk'] ?>" name="Nama" id="Nama" class="form-control" placeholder="Masukkan Nama" required>
                    </div>
                    <div class="form-group col-sm-6">
                            <label for="Harga" class="form-label">Harga Barang: </label>
                            <input type="number" min="1" value="<?php echo $data['Harga'] ?>" name="Harga" id="Harga" class="form-control" placeholder="Masukkan Harga" required>
                        </div>
                </div>
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label for="Stok" class="form-label">Stok Barang: </label>
                            <input type="number" min="1" value="<?php echo $data['Stok'] ?>" name="Stok" id="Stok" class="form-control" placeholder="Masukkan Stok" required>
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="Terjual" class="form-label">Barang Yang Terjual: </label>
                            <input type="number" min="0" value="<?php echo $data['Terjual'] ?>" name="Terjual" id="Terjual" class="form-control" placeholder="Masukkan Terjual" required>
                        </div>
                    </div>
                    <div class="">
                        <label for="Foto" class="form-label">Foto: </label>
                        <p><?php echo "<img src='../foto/".$data['Foto']."'  width='70' height='70'></img>"; ?></p>
                        <input type="file" name="Foto" id="Foto" class="form-control">
                        <p style="color: red;">Hanya bisa menginput foto dengan ekstensi JPG, JPEG, PNG, SVG</p>
                    </div>
                    <button type="submit" name="submit" class="btn btn-md btn-primary">Edit</button>
                </form>
            </div>
        </div>
    </div>
</div>

