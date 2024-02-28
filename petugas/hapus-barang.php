<?php
$id = $_GET['id'];

$sql = $koneksi->query("DELETE FROM produk WHERE ProdukID='$id'");
echo "<script>alert('Berhasil Menghapus Barang');window.location.href='?page=stok-barang';</script>";
?>