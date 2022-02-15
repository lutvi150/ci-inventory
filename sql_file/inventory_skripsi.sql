-- --------------------------------------------------------
-- Host:                         localhost
-- Versi server:                 5.7.24 - MySQL Community Server (GPL)
-- OS Server:                    Win64
-- HeidiSQL Versi:               10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- membuang struktur untuk table inventory_skripsi.barang
CREATE TABLE IF NOT EXISTS `barang` (
  `id_barang` int(11) NOT NULL AUTO_INCREMENT,
  `id_kategori` int(11) DEFAULT NULL,
  `id_satuan` int(11) DEFAULT NULL,
  `kode_barang` varchar(64) NOT NULL,
  `nama_barang` varchar(128) NOT NULL,
  `foto_barang` varchar(255) NOT NULL,
  `stok_barang` int(11) NOT NULL,
  `min_stok_barang` int(11) NOT NULL,
  `harga_barang` float NOT NULL,
  `diskripsi_barang` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_barang`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

-- Membuang data untuk tabel inventory_skripsi.barang: ~5 rows (lebih kurang)
/*!40000 ALTER TABLE `barang` DISABLE KEYS */;
INSERT INTO `barang` (`id_barang`, `id_kategori`, `id_satuan`, `kode_barang`, `nama_barang`, `foto_barang`, `stok_barang`, `min_stok_barang`, `harga_barang`, `diskripsi_barang`, `created_at`) VALUES
	(1, 6, 10, 'BRG11062021002', 'Semen Merek 1 Roda', '1.png', 100, 20, 49000, 'Semen', '2022-01-03 14:32:03'),
	(3, 6, 10, 'BRG18012022003', 'Semen 9 roda', 'BRG18012022003.png', 300, 0, 70000, 'Semen', '2022-01-18 14:47:58'),
	(4, 6, 10, 'BRG18012022004', 'Cat No Drop', 'BRG18012022004.png', 99, 0, 120000, 'ok', '2022-01-18 14:52:53'),
	(8, 1, 1, 'BRG18012022008', 'Spidol X', '1.png', 13, 0, 1300000, '', '2022-01-18 16:21:10'),
	(9, 6, 9, 'BRG01022022009', 'Movilex', 'BRG01022022009.png', 10, 0, 90000, '', '2022-02-01 15:19:09');
/*!40000 ALTER TABLE `barang` ENABLE KEYS */;

-- membuang struktur untuk table inventory_skripsi.barang_keluar
CREATE TABLE IF NOT EXISTS `barang_keluar` (
  `id_barangkeluar` int(11) NOT NULL AUTO_INCREMENT,
  `id_barang` int(11) DEFAULT NULL,
  `id_proyek` int(11) DEFAULT NULL,
  `kode_barangkeluar` varchar(64) NOT NULL,
  `jml_barangkeluar` int(11) NOT NULL,
  `tgl_barangkeluar` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_barangkeluar`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

-- Membuang data untuk tabel inventory_skripsi.barang_keluar: ~3 rows (lebih kurang)
/*!40000 ALTER TABLE `barang_keluar` DISABLE KEYS */;
INSERT INTO `barang_keluar` (`id_barangkeluar`, `id_barang`, `id_proyek`, `kode_barangkeluar`, `jml_barangkeluar`, `tgl_barangkeluar`) VALUES
	(1, 4, 1, 'BK019201', 1, '2022-02-20 13:56:38'),
	(10, 3, 1, 'TRX-K01022022002', 10, '2022-02-01 15:05:12'),
	(11, 3, 1, 'TRX-K01022022003', 40, '2022-02-01 15:07:15');
/*!40000 ALTER TABLE `barang_keluar` ENABLE KEYS */;

-- membuang struktur untuk table inventory_skripsi.barang_masuk
CREATE TABLE IF NOT EXISTS `barang_masuk` (
  `id_barangmasuk` int(11) NOT NULL AUTO_INCREMENT,
  `id_barang` int(11) NOT NULL,
  `id_pemasok` int(11) NOT NULL,
  `kode_barangmasuk` varchar(64) NOT NULL,
  `jml_barangmasuk` int(11) NOT NULL,
  `tgl_barangmasuk` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_barangmasuk`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

-- Membuang data untuk tabel inventory_skripsi.barang_masuk: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `barang_masuk` DISABLE KEYS */;
INSERT INTO `barang_masuk` (`id_barangmasuk`, `id_barang`, `id_pemasok`, `kode_barangmasuk`, `jml_barangmasuk`, `tgl_barangmasuk`) VALUES
	(11, 3, 1, 'TRX-M01022022002', 20, '2022-02-01 13:47:39');
/*!40000 ALTER TABLE `barang_masuk` ENABLE KEYS */;

-- membuang struktur untuk table inventory_skripsi.kategori
CREATE TABLE IF NOT EXISTS `kategori` (
  `id_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(100) NOT NULL,
  `diskripsi_kategori` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

-- Membuang data untuk tabel inventory_skripsi.kategori: ~3 rows (lebih kurang)
/*!40000 ALTER TABLE `kategori` DISABLE KEYS */;
INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `diskripsi_kategori`, `created_at`) VALUES
	(1, 'Bahan Bangunan', 'Bahan bahan utama', '2022-01-10 12:20:38'),
	(6, 'Cat Kayu', 'Bahan Pewarna Kayu', '2022-01-18 12:28:24'),
	(7, 'Perkakas', 'Alat', '2022-02-01 15:19:49');
/*!40000 ALTER TABLE `kategori` ENABLE KEYS */;

-- membuang struktur untuk table inventory_skripsi.pelanggan
CREATE TABLE IF NOT EXISTS `pelanggan` (
  `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT,
  `kode_pelanggan` varchar(64) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `email_pelanggan` varchar(100) NOT NULL,
  `no_pelanggan` char(16) DEFAULT NULL,
  `alamat_pelanggan` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_pelanggan`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- Membuang data untuk tabel inventory_skripsi.pelanggan: ~2 rows (lebih kurang)
/*!40000 ALTER TABLE `pelanggan` DISABLE KEYS */;
INSERT INTO `pelanggan` (`id_pelanggan`, `kode_pelanggan`, `nama_pelanggan`, `email_pelanggan`, `no_pelanggan`, `alamat_pelanggan`, `created_at`) VALUES
	(4, 'CUS18012022002', 'Devi Nur Yuliana', 'devi.nur449@gmail.com', '087700263146', 'Juwana', '2022-01-18 14:05:09'),
	(5, 'CUS01022022003', 'ALFIN ZAENAL ARIFIN', 'zaenal.za449@gmail.com', '+6287700263146', 'Puri Pati', '2022-02-01 15:21:13');
/*!40000 ALTER TABLE `pelanggan` ENABLE KEYS */;

-- membuang struktur untuk table inventory_skripsi.pemasok
CREATE TABLE IF NOT EXISTS `pemasok` (
  `id_pemasok` int(11) NOT NULL AUTO_INCREMENT,
  `kode_pemasok` varchar(64) NOT NULL,
  `nama_pemasok` varchar(100) NOT NULL,
  `email_pemasok` varchar(100) NOT NULL,
  `no_pemasok` char(16) DEFAULT NULL,
  `alamat_pemasok` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_pemasok`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- Membuang data untuk tabel inventory_skripsi.pemasok: ~2 rows (lebih kurang)
/*!40000 ALTER TABLE `pemasok` DISABLE KEYS */;
INSERT INTO `pemasok` (`id_pemasok`, `kode_pemasok`, `nama_pemasok`, `email_pemasok`, `no_pemasok`, `alamat_pemasok`, `created_at`) VALUES
	(1, 'SPL11062021002', 'Muhammad Kusnan', 'muhammad.kuswari10@gmail.com', '081939448487', 'Jl. Bunga Matahari, No.11 Gomong Lama, Mataram.', '2022-01-09 11:07:49'),
	(4, 'SPL18012022003', 'Alfin Zaenal Arifin', 'zaenal.za449@gmail.com', '087700263146', 'Puri Pati', '2022-01-18 12:41:56');
/*!40000 ALTER TABLE `pemasok` ENABLE KEYS */;

-- membuang struktur untuk table inventory_skripsi.proyek
CREATE TABLE IF NOT EXISTS `proyek` (
  `id_proyek` int(11) NOT NULL AUTO_INCREMENT,
  `kode_proyek` varchar(64) NOT NULL,
  `nama_proyek` varchar(100) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `instansi_proyek` varchar(125) NOT NULL,
  `progres` enum('Proses','Selesai','','') DEFAULT NULL,
  `diskripsi` text,
  `total` varchar(100) NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `created_ad` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_proyek`),
  KEY `id_pelanggan` (`id_pelanggan`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

-- Membuang data untuk tabel inventory_skripsi.proyek: ~2 rows (lebih kurang)
/*!40000 ALTER TABLE `proyek` DISABLE KEYS */;
INSERT INTO `proyek` (`id_proyek`, `kode_proyek`, `nama_proyek`, `id_pelanggan`, `instansi_proyek`, `progres`, `diskripsi`, `total`, `tgl_mulai`, `tgl_selesai`, `created_ad`) VALUES
	(1, 'Pyk019128', 'Membangun Jembatan', 4, 'Dpu', 'Proses', 'o', '1200000000', '2022-02-16', '2022-02-25', '2022-02-02 14:17:40'),
	(9, 'PYK01022022029', 'Pembangunan Jembatan Sungai Juwana', 4, '', 'Proses', NULL, '890000000', '2022-02-09', '2022-02-02', '2022-02-01 15:14:52');
/*!40000 ALTER TABLE `proyek` ENABLE KEYS */;

-- membuang struktur untuk table inventory_skripsi.satuan
CREATE TABLE IF NOT EXISTS `satuan` (
  `id_satuan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_satuan` varchar(100) NOT NULL,
  `diskripsi_satuan` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_satuan`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

-- Membuang data untuk tabel inventory_skripsi.satuan: ~4 rows (lebih kurang)
/*!40000 ALTER TABLE `satuan` DISABLE KEYS */;
INSERT INTO `satuan` (`id_satuan`, `nama_satuan`, `diskripsi_satuan`, `created_at`) VALUES
	(1, 'Pcs', NULL, '2022-01-17 11:43:21'),
	(9, 'Kg', 'Satuan Massa', '2022-01-18 12:05:26'),
	(10, 'Liter', 'Satuan Volume', '2022-01-18 12:08:21'),
	(11, 'Karung', '', '2022-02-01 15:20:54');
/*!40000 ALTER TABLE `satuan` ENABLE KEYS */;

-- membuang struktur untuk table inventory_skripsi.users
CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nama_user` varchar(100) NOT NULL,
  `email_user` varchar(100) NOT NULL,
  `no_user` char(16) DEFAULT NULL,
  `alamat_user` text,
  `foto_user` varchar(255) DEFAULT 'default.jpg',
  `password_user` varchar(255) NOT NULL,
  `hak_akses` enum('admin','staff','manager') DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

-- Membuang data untuk tabel inventory_skripsi.users: ~2 rows (lebih kurang)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id_user`, `nama_user`, `email_user`, `no_user`, `alamat_user`, `foto_user`, `password_user`, `hak_akses`, `created_at`) VALUES
	(1, 'Mas Admin', 'admin@mail.com', '0898877728', 'Pati', 'default.jpg', '$2y$10$/ePeCDWkJXlcHhqjD4vje.zO6r2ejISJTJ4AS4mtLt1JIDBNwoFRu', 'admin', '2022-01-04 10:54:20'),
	(3, 'zaenal', 'zaenal.za449@gmail.com', '+6287700263146', 'Puri Pati', '1643704492073.png', '$2y$10$iEnC/Wn7I3VCeGk1SPq0mOfnXDFPcm7CxekbMkoG0TyfIPLzql00y', 'staff', '2022-02-01 15:34:52'),
	(6, 'Budi', 'lutvi1500@gmail.com', '082285498005', 'pADANG\r\nPadang', '1644888972846.png', '$2y$10$cdcMrvP6/l3v7GQqEnG0oeFpbWHB6b41RqWmHQ2Y4ahSV5irewBvm', 'manager', '2022-02-15 08:36:12');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- membuang struktur untuk trigger inventory_skripsi.barang_keluar
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO';
DELIMITER //
CREATE TRIGGER `barang_keluar` AFTER INSERT ON `barang_keluar` FOR EACH ROW BEGIN
	UPDATE barang SET stok_barang=stok_barang-NEW.jml_barangkeluar
    WHERE id_barang = NEW.id_barang;
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- membuang struktur untuk trigger inventory_skripsi.barang_masuk
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO';
DELIMITER //
CREATE TRIGGER `barang_masuk` AFTER INSERT ON `barang_masuk` FOR EACH ROW BEGIN
	UPDATE barang SET stok_barang=stok_barang+NEW.jml_barangmasuk
    WHERE id_barang = NEW.id_barang;
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
