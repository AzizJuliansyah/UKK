<?php
include("koneksi/koneksi.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>
<body>
<div class="row justify-content-center">
    <div class="card col-6">
        <div class="card-body">
            <p style="text-align: center;">Waroenk</p>
            ==============================
            <?php
                $totalharga = 0;
                $sql = $koneksi->query("SELECT * FROM penjualan ORDER BY PenjualanID DESC");
                $data = $sql->fetch_assoc()
            ?>
            <p>ID Pesanan: <?php echo $data['PenjualanID'] ?></p>
            <p>Tanggal Pesanan: <?php echo $data['TanggalPenjualan'] ?></p>
            <?php
                $sql2 = $koneksi->query("SELECT * FROM pelanggan WHERE PelangganID='".$data['PenjualanID']."' ");
                while($data2 = $sql2->fetch_assoc()) { ?>
                <p>Nama Pemesan: <?php echo $data2['NamaPelanggan'] ?></p>
                <p>No Meja: <?php echo $data2['NoMeja'] ?></p>
            <?php } ?>
            ==============================
            <table class="table">
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
            ==============================
            <p style="text-align: center;"><?php echo date("d-m-Y H:i:s") ?></p>
            ==============================
            <p style="text-align: center;">Kritik & Saran Whatsapp: +6285693204615</p>
        </div>
    </div>
    </div>
</body>
<script>
    window.print();
</script>
</html>