<?php
$id = $_GET['id'];

$sql = $koneksi->query("DELETE FROM penjualan WHERE PenjualanID='$id'");
echo "<script>alert('Berhasil Menghapus Daftar Transaksi');window.location.href='?page=daftar-transaksi';</script>";
?>