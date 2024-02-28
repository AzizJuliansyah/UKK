<?php
include("koneksi/koneksi.php");
$id = $_POST['id'];
$produk_id = $_POST['ProdukID'];
$jumlah = $_POST['Jumlah'];

$sql1 = $koneksi->query("DELETE FROM detailpenjualan WHERE PenjualanID='$id'");
$sql2 = $koneksi->query("UPDATE produk SET Stok = Stok + $jumlah WHERE ProdukID='$produk_id'");
$sql3 = $koneksi->query("UPDATE produk SET Terjual = Terjual - $jumlah WHERE ProdukID='$produk_id'");

header("Location: pesanan.php")
?>