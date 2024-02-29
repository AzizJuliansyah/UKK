-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Feb 2024 pada 07.14
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ukk`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detailpenjualan`
--

CREATE TABLE `detailpenjualan` (
  `DetailID` int(11) NOT NULL,
  `PenjualanID` int(11) NOT NULL,
  `ProdukID` int(11) NOT NULL,
  `JumlahProduk` int(11) NOT NULL,
  `Subtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `detailpenjualan`
--

INSERT INTO `detailpenjualan` (`DetailID`, `PenjualanID`, `ProdukID`, `JumlahProduk`, `Subtotal`) VALUES
(4, 8, 1, 1, 25000),
(5, 9, 1, 1, 25000),
(5, 10, 3, 2, 8000),
(6, 11, 5, 6, 20000),
(7, 12, 1, 2, 25000),
(7, 13, 3, 3, 8000),
(7, 14, 4, 2, 25000),
(7, 15, 5, 2, 20000),
(8, 16, 9, 2, 10000),
(8, 17, 8, 3, 13000),
(10, 20, 9, 2, 10000),
(11, 24, 7, 4, 15000),
(12, 25, 3, 2, 8000),
(13, 27, 3, 1, 8000),
(14, 28, 3, 1, 8000),
(15, 29, 3, 1, 8000),
(16, 30, 3, 1, 8000),
(17, 31, 5, 2, 20000),
(17, 32, 4, 4, 25000),
(18, 33, 5, 1, 20000),
(18, 34, 12, 2, 17000),
(18, 35, 6, 1, 35000),
(18, 36, 3, 1, 8000),
(19, 37, 8, 129, 13000),
(20, 38, 5, 2, 20000),
(21, 39, 5, 2, 20000),
(21, 40, 6, 1, 35000),
(22, 41, 12, 9, 17000),
(23, 42, 8, 889, 13000),
(24, 43, 4, 2, 25000),
(24, 45, 12, 2, 17000),
(25, 46, 4, 1, 25000),
(26, 47, 13, 1, 7000),
(27, 48, 12, 2, 17000),
(27, 49, 5, 7, 20000),
(27, 51, 6, 2, 35000),
(28, 52, 4, 2, 25000),
(28, 53, 6, 1, 35000),
(29, 54, 3, 9, 8000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `PelangganID` int(11) NOT NULL,
  `NamaPelanggan` varchar(255) NOT NULL,
  `NoMeja` int(11) NOT NULL,
  `NomorTelepon` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`PelangganID`, `NamaPelanggan`, `NoMeja`, `NomorTelepon`) VALUES
(4, 'AZIZ JULIANSYAH', 2, 0),
(5, 'AZIZ JULIANSYAH', 2, 0),
(6, 'Ahmad Zacky Ibnu Husin', 3, 0),
(7, 'Spaghetti', 2, 0),
(8, 'bbayowu', 2, 0),
(9, 'Spaghetti', 2, 0),
(10, 'Spaghetti', 2, 0),
(11, 'bayou', 6, 0),
(12, 'AZIZ JULIANSYAH', 3, 0),
(13, 'Ahmad Zacky Ibnu Husin', 2, 0),
(14, 'Ahmad Zacky Ibnu Husin', 2, 0),
(15, 'Ahmad Zacky Ibnu Husin', 2, 0),
(16, 'Ahmad Zacky Ibnu Husin', 2, 0),
(17, 'beler ganteng', 24, 0),
(18, 'iyan kun', 9, 0),
(19, 'Agus subroto', 5, 0),
(20, 'mbotten', 4, 0),
(21, 'mbotten', 4, 0),
(22, 'beler kun', 22, 0),
(23, 'andika', 8, 0),
(24, 'Ahmad Zacky Ibnu Husin', 1, 0),
(25, 'dinda', 12, 0),
(26, 'cccc', 111, 0),
(27, 'AZIZ JULIANSYAH', 3, 0),
(28, 'mas bram', 3, 0),
(29, 'saskia', 3, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `PenjualanID` int(11) NOT NULL,
  `TanggalPenjualan` datetime NOT NULL,
  `TotalHarga` int(11) NOT NULL,
  `PelangganID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `penjualan`
--

INSERT INTO `penjualan` (`PenjualanID`, `TanggalPenjualan`, `TotalHarga`, `PelangganID`) VALUES
(4, '0000-00-00 00:00:00', 0, 0),
(5, '0000-00-00 00:00:00', 0, 0),
(6, '0000-00-00 00:00:00', 0, 0),
(7, '0000-00-00 00:00:00', 0, 0),
(8, '0000-00-00 00:00:00', 0, 0),
(9, '2024-02-26 00:00:00', 0, 0),
(10, '2024-02-26 00:00:00', 0, 0),
(11, '0000-00-00 00:00:00', 0, 0),
(12, '0000-00-00 00:00:00', 0, 0),
(13, '0000-00-00 00:00:00', 0, 0),
(14, '0000-00-00 00:00:00', 0, 0),
(15, '2024-02-27 15:18:03', 0, 0),
(16, '2024-02-28 15:18:03', 0, 0),
(17, '2024-02-27 17:37:42', 0, 0),
(18, '2024-02-27 17:41:21', 0, 0),
(19, '2024-02-27 17:47:16', 0, 0),
(20, '2024-02-28 02:48:47', 0, 0),
(21, '2024-02-28 02:48:47', 0, 0),
(22, '2024-02-28 02:49:18', 0, 0),
(23, '2024-02-28 02:51:18', 0, 0),
(24, '2024-02-28 03:13:23', 0, 0),
(25, '2024-02-28 03:59:27', 0, 0),
(26, '2024-02-28 04:11:38', 0, 0),
(27, '2024-02-28 10:43:02', 0, 0),
(28, '2024-02-28 10:45:40', 0, 0),
(29, '2024-02-28 11:56:47', 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `ProdukID` int(11) NOT NULL,
  `NamaProduk` varchar(255) NOT NULL,
  `Harga` int(11) NOT NULL,
  `Stok` int(11) NOT NULL,
  `Terjual` int(11) NOT NULL,
  `Foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`ProdukID`, `NamaProduk`, `Harga`, `Stok`, `Terjual`, `Foto`) VALUES
(3, 'Coca Cola', 8000, 971, 28, '26022024043833.jpg'),
(4, 'Nasi Goreng', 25000, 2339, 16, '26022024045359.jpeg'),
(5, 'Mochachino', 20000, 475, 25, '26022024045450.jpg'),
(6, 'Burger', 35000, 119, 5, '26022024080051.jpg'),
(7, 'Mie Yamin', 15000, 983, 4, '26022024080114.jpg'),
(8, 'Kentang Goreng', 13000, 4111, 1021, '26022024080242.jpg'),
(9, 'Es Milo', 10000, 629, 4, '26022024080310.jpg'),
(12, 'Pudding', 17000, 485, 15, '27022024013834.jpg'),
(13, 'cocaaa', 7000, 998, 1, '28022024044738.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `UserID` int(11) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Level` enum('Admin','Petugas','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`UserID`, `Username`, `Password`, `Level`) VALUES
(2, 'petugas', '202cb962ac59075b964b07152d234b70', 'Petugas'),
(4, 'admin', '202cb962ac59075b964b07152d234b70', 'Admin'),
(6, 'admin2', '202cb962ac59075b964b07152d234b70', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `detailpenjualan`
--
ALTER TABLE `detailpenjualan`
  ADD PRIMARY KEY (`PenjualanID`),
  ADD KEY `DetailID` (`DetailID`,`ProdukID`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`PelangganID`);

--
-- Indeks untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`PenjualanID`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`ProdukID`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `detailpenjualan`
--
ALTER TABLE `detailpenjualan`
  MODIFY `PenjualanID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `PelangganID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `PenjualanID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `ProdukID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detailpenjualan`
--
ALTER TABLE `detailpenjualan`
  ADD CONSTRAINT `detailpenjualan_ibfk_1` FOREIGN KEY (`DetailID`) REFERENCES `penjualan` (`PenjualanID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD CONSTRAINT `pelanggan_ibfk_1` FOREIGN KEY (`PelangganID`) REFERENCES `penjualan` (`PenjualanID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
