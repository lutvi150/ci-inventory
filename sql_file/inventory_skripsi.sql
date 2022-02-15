-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Feb 2022 pada 18.18
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory_skripsi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `id_satuan` int(11) DEFAULT NULL,
  `kode_barang` varchar(64) NOT NULL,
  `nama_barang` varchar(128) NOT NULL,
  `foto_barang` varchar(255) NOT NULL,
  `stok_barang` int(11) NOT NULL,
  `min_stok_barang` int(11) NOT NULL,
  `harga_barang` float NOT NULL,
  `diskripsi_barang` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `id_kategori`, `id_satuan`, `kode_barang`, `nama_barang`, `foto_barang`, `stok_barang`, `min_stok_barang`, `harga_barang`, `diskripsi_barang`, `created_at`) VALUES
(1, 6, 10, 'BRG11062021002', 'Semen Merek 1 Roda', '1.png', 100, 20, 49000, 'Semen', '2022-01-03 07:32:03'),
(3, 6, 10, 'BRG18012022003', 'Semen 9 roda', 'BRG18012022003.png', 300, 0, 70000, 'Semen', '2022-01-18 07:47:58'),
(4, 6, 10, 'BRG18012022004', 'Cat No Drop', 'BRG18012022004.png', 99, 0, 120000, 'ok', '2022-01-18 07:52:53'),
(8, 1, 1, 'BRG18012022008', 'Spidol X', '1.png', 13, 0, 1300000, '', '2022-01-18 09:21:10'),
(9, 6, 9, 'BRG01022022009', 'Movilex', 'BRG01022022009.png', 10, 0, 90000, '', '2022-02-01 08:19:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_keluar`
--

CREATE TABLE `barang_keluar` (
  `id_barangkeluar` int(11) NOT NULL,
  `id_barang` int(11) DEFAULT NULL,
  `id_proyek` int(11) DEFAULT NULL,
  `kode_barangkeluar` varchar(64) NOT NULL,
  `jml_barangkeluar` int(11) NOT NULL,
  `tgl_barangkeluar` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang_keluar`
--

INSERT INTO `barang_keluar` (`id_barangkeluar`, `id_barang`, `id_proyek`, `kode_barangkeluar`, `jml_barangkeluar`, `tgl_barangkeluar`) VALUES
(1, 4, 1, 'BK019201', 1, '2022-02-20 06:56:38'),
(10, 3, 1, 'TRX-K01022022002', 10, '2022-02-01 08:05:12'),
(11, 3, 1, 'TRX-K01022022003', 40, '2022-02-01 08:07:15');

--
-- Trigger `barang_keluar`
--
DELIMITER $$
CREATE TRIGGER `barang_keluar` AFTER INSERT ON `barang_keluar` FOR EACH ROW BEGIN
	UPDATE barang SET stok_barang=stok_barang-NEW.jml_barangkeluar
    WHERE id_barang = NEW.id_barang;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_masuk`
--

CREATE TABLE `barang_masuk` (
  `id_barangmasuk` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `id_pemasok` int(11) NOT NULL,
  `kode_barangmasuk` varchar(64) NOT NULL,
  `jml_barangmasuk` int(11) NOT NULL,
  `tgl_barangmasuk` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang_masuk`
--

INSERT INTO `barang_masuk` (`id_barangmasuk`, `id_barang`, `id_pemasok`, `kode_barangmasuk`, `jml_barangmasuk`, `tgl_barangmasuk`) VALUES
(11, 3, 1, 'TRX-M01022022002', 20, '2022-02-01 06:47:39');

--
-- Trigger `barang_masuk`
--
DELIMITER $$
CREATE TRIGGER `barang_masuk` AFTER INSERT ON `barang_masuk` FOR EACH ROW BEGIN
	UPDATE barang SET stok_barang=stok_barang+NEW.jml_barangmasuk
    WHERE id_barang = NEW.id_barang;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL,
  `diskripsi_kategori` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `diskripsi_kategori`, `created_at`) VALUES
(1, 'Bahan Bangunan', 'Bahan bahan utama', '2022-01-10 05:20:38'),
(6, 'Cat Kayu', 'Bahan Pewarna Kayu', '2022-01-18 05:28:24'),
(7, 'Perkakas', 'Alat', '2022-02-01 08:19:49');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `kode_pelanggan` varchar(64) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `email_pelanggan` varchar(100) NOT NULL,
  `no_pelanggan` char(16) DEFAULT NULL,
  `alamat_pelanggan` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `kode_pelanggan`, `nama_pelanggan`, `email_pelanggan`, `no_pelanggan`, `alamat_pelanggan`, `created_at`) VALUES
(4, 'CUS18012022002', 'Devi Nur Yuliana', 'devi.nur449@gmail.com', '087700263146', 'Juwana', '2022-01-18 07:05:09'),
(5, 'CUS01022022003', 'ALFIN ZAENAL ARIFIN', 'zaenal.za449@gmail.com', '+6287700263146', 'Puri Pati', '2022-02-01 08:21:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemasok`
--

CREATE TABLE `pemasok` (
  `id_pemasok` int(11) NOT NULL,
  `kode_pemasok` varchar(64) NOT NULL,
  `nama_pemasok` varchar(100) NOT NULL,
  `email_pemasok` varchar(100) NOT NULL,
  `no_pemasok` char(16) DEFAULT NULL,
  `alamat_pemasok` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pemasok`
--

INSERT INTO `pemasok` (`id_pemasok`, `kode_pemasok`, `nama_pemasok`, `email_pemasok`, `no_pemasok`, `alamat_pemasok`, `created_at`) VALUES
(1, 'SPL11062021002', 'Muhammad Kusnan', 'muhammad.kuswari10@gmail.com', '081939448487', 'Jl. Bunga Matahari, No.11 Gomong Lama, Mataram.', '2022-01-09 04:07:49'),
(4, 'SPL18012022003', 'Alfin Zaenal Arifin', 'zaenal.za449@gmail.com', '087700263146', 'Puri Pati', '2022-01-18 05:41:56');

-- --------------------------------------------------------

--
-- Struktur dari tabel `proyek`
--

CREATE TABLE `proyek` (
  `id_proyek` int(11) NOT NULL,
  `kode_proyek` varchar(64) NOT NULL,
  `nama_proyek` varchar(100) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `instansi_proyek` varchar(125) NOT NULL,
  `progres` enum('Proses','Selesai','','') DEFAULT NULL,
  `diskripsi` text DEFAULT NULL,
  `total` varchar(100) NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `created_ad` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `proyek`
--

INSERT INTO `proyek` (`id_proyek`, `kode_proyek`, `nama_proyek`, `id_pelanggan`, `instansi_proyek`, `progres`, `diskripsi`, `total`, `tgl_mulai`, `tgl_selesai`, `created_ad`) VALUES
(1, 'Pyk019128', 'Membangun Jembatan', 4, 'Dpu', 'Proses', 'o', '1200000000', '2022-02-16', '2022-02-25', '2022-02-02 07:17:40'),
(9, 'PYK01022022029', 'Pembangunan Jembatan Sungai Juwana', 4, '', 'Proses', NULL, '890000000', '2022-02-09', '2022-02-02', '2022-02-01 08:14:52');

-- --------------------------------------------------------

--
-- Struktur dari tabel `satuan`
--

CREATE TABLE `satuan` (
  `id_satuan` int(11) NOT NULL,
  `nama_satuan` varchar(100) NOT NULL,
  `diskripsi_satuan` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `satuan`
--

INSERT INTO `satuan` (`id_satuan`, `nama_satuan`, `diskripsi_satuan`, `created_at`) VALUES
(1, 'Pcs', NULL, '2022-01-17 04:43:21'),
(9, 'Kg', 'Satuan Massa', '2022-01-18 05:05:26'),
(10, 'Liter', 'Satuan Volume', '2022-01-18 05:08:21'),
(11, 'Karung', '', '2022-02-01 08:20:54');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `email_user` varchar(100) NOT NULL,
  `no_user` char(16) DEFAULT NULL,
  `alamat_user` text DEFAULT NULL,
  `foto_user` varchar(255) DEFAULT 'default.jpg',
  `password_user` varchar(255) NOT NULL,
  `hak_akses` enum('admin','staff') DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `nama_user`, `email_user`, `no_user`, `alamat_user`, `foto_user`, `password_user`, `hak_akses`, `created_at`) VALUES
(1, 'Mas Admin', 'admin@mail.com', '0898877728', 'Pati', 'default.jpg', '$2y$10$/ePeCDWkJXlcHhqjD4vje.zO6r2ejISJTJ4AS4mtLt1JIDBNwoFRu', 'admin', '2022-01-04 03:54:20'),
(3, 'zaenal', 'zaenal.za449@gmail.com', '+6287700263146', 'Puri Pati', '1643704492073.png', '$2y$10$iEnC/Wn7I3VCeGk1SPq0mOfnXDFPcm7CxekbMkoG0TyfIPLzql00y', 'staff', '2022-02-01 08:34:52');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD PRIMARY KEY (`id_barangkeluar`);

--
-- Indeks untuk tabel `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD PRIMARY KEY (`id_barangmasuk`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `pemasok`
--
ALTER TABLE `pemasok`
  ADD PRIMARY KEY (`id_pemasok`);

--
-- Indeks untuk tabel `proyek`
--
ALTER TABLE `proyek`
  ADD PRIMARY KEY (`id_proyek`),
  ADD KEY `id_pelanggan` (`id_pelanggan`);

--
-- Indeks untuk tabel `satuan`
--
ALTER TABLE `satuan`
  ADD PRIMARY KEY (`id_satuan`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `barang_keluar`
--
ALTER TABLE `barang_keluar`
  MODIFY `id_barangkeluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `barang_masuk`
--
ALTER TABLE `barang_masuk`
  MODIFY `id_barangmasuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `pemasok`
--
ALTER TABLE `pemasok`
  MODIFY `id_pemasok` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `proyek`
--
ALTER TABLE `proyek`
  MODIFY `id_proyek` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `satuan`
--
ALTER TABLE `satuan`
  MODIFY `id_satuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
