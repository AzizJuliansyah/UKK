<?php
$id = $_GET['id'];

$sql = $koneksi->query("DELETE FROM user WHERE UserID='$id'");
echo "<script>alert('Berhasil Menghapus User');window.location.href='?page=user';</script>";
?>