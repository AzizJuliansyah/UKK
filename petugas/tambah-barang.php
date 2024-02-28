<p></p>
<div class="p-4 main-content">
    <div class="card well">
        <div class="card-body">
            <div class="container mt-5">
                <h2>Tambah Produk baru</h2>
                <form action="" method="post" class="col-md-10" enctype="multipart/form-data">
                    <div class="">
                        <label for="Nama" class="form-label">Nama Barang: <span style="color: red;">*</span></label>
                        <input type="text" name="Nama" id="Nama" class="form-control" placeholder="Masukkan Nama" required>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label for="Harga" class="form-label">Harga Barang: <span style="color: red;">*</span></label>
                            <input type="number" min="1" name="Harga" id="Harga" class="form-control" placeholder="Rp." required>
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="Stok" class="form-label">Stok Barang: <span style="color: red;">*</span></label>
                            <input type="number" min="1" name="Stok" id="Stok" class="form-control" placeholder="Masukkan Stok" required>
                        </div>
                    </div>
                    <div class="">
                        <label for="Foto" class="form-label">Foto: <span style="color: red;">*</span></label>
                        <input type="file" name="Foto" id="Foto" class="form-control" placeholder="Masukkan Foto" required>
                        <p style="color: red;">Hanya bisa menginput foto dengan ekstensi JPG, JPEG, PNG, SVG</p>
                    </div>
                    <button type="submit" name="submit" class="btn btn-md btn-primary">Tambah</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
if (isset($_POST['submit'])) {
    $Nama = $_POST['Nama'];
    $Harga = $_POST['Harga'];
    $Stok = $_POST['Stok'];
    $target = "../foto./";
    $time = date('dmYHis');
    $type = strtolower(pathinfo($_FILES['Foto']['name'], PATHINFO_EXTENSION));
    $targetfile = $target . $time . '.' . $type;
    $filename = $time . '.' . $type;

    if (move_uploaded_file($_FILES['Foto']['tmp_name'], $targetfile)) {
        $sql = $koneksi->query("INSERT INTO produk (NamaProduk, Harga, Stok, Foto) VALUES ('$Nama', '$Harga', '$Stok', '$filename')");
        echo "<script>alert('Berhasil Menambahkan Barang');window.location.href='?page=stok-barang';</script>";
    } else {
        echo "Maaf, terjadi kesalahan saat mengupload gambar";
    }
    
}
?>