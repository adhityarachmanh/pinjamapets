-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             9.5.0.5332
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for faiz
DROP DATABASE IF EXISTS `id10380815_faiz`;
CREATE DATABASE IF NOT EXISTS `id10380815_faiz` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `id10380815_faiz`;

-- Dumping structure for table faiz.admins
DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table faiz.admins: ~1 rows (approximately)
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
REPLACE INTO `admins` (`id`, `name`, `job_title`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Faiz Ananda', 'Mahasiswa', 'faizananda@yahoo.com', NULL, '$2y$10$3MJj0PFbyMLMojF8SZZaUeY8OhFWaxrZo43OXt0LaBQeV1mLVO/n2', 'NMItFTSExLxIKECMH9CAMHt5TS3jc2ZVI4JPKtHF6P5F5carQAxSgzQXgSOJ', '2019-02-04 13:21:38', '2019-02-04 13:21:38');
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;

-- Dumping structure for table faiz.barangs
DROP TABLE IF EXISTS `barangs`;
CREATE TABLE IF NOT EXISTS `barangs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `quantity` int(10) DEFAULT '0',
  `tersewa` int(10) DEFAULT '0',
  `dilihat` int(10) DEFAULT '0',
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `merk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kategori` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `harga` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keyword` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deskripsi` varchar(10000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `barangs_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table faiz.barangs: ~14 rows (approximately)
/*!40000 ALTER TABLE `barangs` DISABLE KEYS */;
REPLACE INTO `barangs` (`id`, `quantity`, `tersewa`, `dilihat`, `nama`, `slug`, `merk`, `kategori`, `harga`, `gambar`, `keyword`, `deskripsi`, `created_at`, `updated_at`) VALUES
	(13, 5, 2, 4, 'ACT Lite 75+10', 'ACT-Lite-75-10', 'Deuter', 'Carrier', '25000', 'ACT-Lite-75-10.gif', NULL, NULL, '2019-06-27 19:39:28', '2019-08-01 20:38:55'),
	(14, 2, 0, 3, 'Futura Vario 50+10', 'Futura-Vario-50-10', 'Deuter', 'Carrier', '20000', 'Futura-Vario-50-10.jpg', NULL, NULL, '2019-06-27 19:40:44', '2019-07-16 07:06:08'),
	(15, 1, 0, 2, 'Flysheet 3x4', 'Flysheet-3x4', 'JWS', 'Camping-Equipment', '7000', 'FLYSHEET-3x4.jpg', NULL, NULL, '2019-06-27 19:41:56', '2019-08-02 00:42:35'),
	(16, 1, 0, 0, 'Flysheet 4x5', 'Flysheet-4x5', 'JWS', 'Camping-Equipment', '8000', 'FLYSHEET-4x5.jpg', NULL, NULL, '2019-06-27 19:43:21', '2019-06-27 19:55:15'),
	(17, 3, 1, 2, 'Tenda 2-3 Orang', 'Tenda-2-3-Orang', 'CONSINA', 'Camping-Equipment', '30000', '2-3-ORANG.jpg', NULL, NULL, '2019-06-27 19:44:12', '2019-07-18 12:05:28'),
	(20, 5, 0, 1, 'Tenda 4-5 Orang', 'Tenda-4-5-Orang', 'LAFUMA', 'Camping-Equipment', '35000', '4-5.jpg', NULL, NULL, '2019-06-27 19:46:09', '2019-07-16 04:45:01'),
	(21, 20, 0, 0, 'Matras', 'Matras', 'EIGER', 'Camping-Equipment', '5000', 'Matras.png', NULL, NULL, '2019-06-27 19:46:53', '2019-06-27 19:53:56'),
	(22, 10, 0, 0, 'Sleeping Bag', 'Sleeping-Bag', 'FORCLAZ', 'Camping-Equipment', '5000', 'Sleeping-Bag.jpg', NULL, NULL, '2019-06-27 19:47:40', '2019-06-27 19:53:50'),
	(23, 11, 0, 0, 'Headlamp', 'Headlamp', 'PETZL', 'Hiking-Equipment', '7000', 'Headlamp.jpg', NULL, NULL, '2019-06-27 19:49:26', '2019-06-27 19:53:35'),
	(24, 6, 1, 2, 'Jaket Splash Proof', 'Jaket-Splash-Proof', 'BERGHAUS', 'Hiking-Equipment', '10000', 'Jaket-Splash-Proof.jpg', NULL, NULL, '2019-06-27 19:49:57', '2019-07-18 12:17:16'),
	(25, 9, 0, 0, 'Kompor', 'Kompor', 'Butterfly', 'Hiking-Equipment', '7000', 'Kompor.jpg', NULL, NULL, '2019-06-27 19:50:16', '2019-06-27 19:53:22'),
	(26, 7, 0, 0, 'Sepatu', 'Sepatu', 'SALOMON', 'Hiking-Equipment', '10000', 'Sepatu-Ukuran.jpg', NULL, NULL, '2019-06-27 19:50:58', '2019-06-27 20:18:21'),
	(27, 6, 0, 1, 'Senter', 'Senter', 'COZMEED', 'Hiking-Equipment', '5000', 'Senter.jpg', NULL, NULL, '2019-06-27 19:51:22', '2019-07-15 12:20:03'),
	(28, 13, 0, 1, 'Sarung Tangan', 'Sarung-Tangan', 'SALOMON', 'Hiking-Equipment', '5000', 'Sarung-Tangan.jpg', NULL, NULL, '2019-06-27 19:52:30', '2019-07-16 06:48:07');
/*!40000 ALTER TABLE `barangs` ENABLE KEYS */;

-- Dumping structure for table faiz.kategoris
DROP TABLE IF EXISTS `kategoris`;
CREATE TABLE IF NOT EXISTS `kategoris` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table faiz.kategoris: ~3 rows (approximately)
/*!40000 ALTER TABLE `kategoris` DISABLE KEYS */;
REPLACE INTO `kategoris` (`id`, `nama`, `slug`, `created_at`, `updated_at`) VALUES
	(8, 'Carrier', 'Carrier', '2019-06-27 19:37:01', '2019-06-27 19:37:15'),
	(9, 'Camping Equipment', 'Camping-Equipment', '2019-06-27 19:37:43', '2019-06-27 19:37:43'),
	(10, 'Hiking Equipment', 'Hiking-Equipment', '2019-06-27 19:38:06', '2019-06-27 19:38:06');
/*!40000 ALTER TABLE `kategoris` ENABLE KEYS */;

-- Dumping structure for table faiz.migrations
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table faiz.migrations: ~7 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
REPLACE INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_02_02_014729_buat_table_kategori', 1),
	(4, '2019_02_04_125206_buat_tabel_barang', 1),
	(5, '2019_02_04_132249_buat_tabel_admin', 2),
	(10, '2019_02_09_052801_buat_table_sewa', 3),
	(13, '2019_02_12_204947_buat_table_chat', 4);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table faiz.password_resets
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table faiz.password_resets: ~0 rows (approximately)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table faiz.pesans
DROP TABLE IF EXISTS `pesans`;
CREATE TABLE IF NOT EXISTS `pesans` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `untuk` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dari` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subjek` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isi` varchar(10000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_user` int(11) NOT NULL DEFAULT '0',
  `status` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table faiz.pesans: ~12 rows (approximately)
/*!40000 ALTER TABLE `pesans` DISABLE KEYS */;
REPLACE INTO `pesans` (`id`, `untuk`, `dari`, `subjek`, `isi`, `slug`, `id_user`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'admin', 'Adit', 'mau tanya min', '<p>pesananbla</p>', 'mau-tanya-min', 1, 'read', '2019-02-18 07:16:06', '2019-02-18 07:16:13'),
	(2, 'Adit', 'admin', 'mau tanya min', '<p>tes</p>', 'mau-tanya-min', 1, 'read', '2019-02-18 07:17:59', '2019-02-18 13:08:30'),
	(3, 'Adit', 'admin', 'mau tanya min', '<p>tes kawan</p>', 'mau-tanya-min', 1, 'read', '2019-02-19 00:20:46', '2019-02-19 00:20:59'),
	(4, 'admin', 'Adit', 'mau tanya min', '<p>afasfa</p>', 'mau-tanya-min', 1, 'read', '2019-02-19 00:21:10', '2019-02-19 00:21:10'),
	(5, 'Adit', 'admin', 'mau tanya min', '<p>asfsaf</p>', 'mau-tanya-min', 1, 'read', '2019-02-19 00:21:36', '2019-02-19 00:23:42'),
	(6, 'admin', 'Adit', 'mau tanya min', '<p>asfasf</p>', 'mau-tanya-min', 1, 'read', '2019-02-19 00:23:43', '2019-02-19 00:23:44'),
	(7, 'admin', 'Adit', 'mau tanya min', '<p>asfa</p>', 'mau-tanya-min', 1, 'read', '2019-02-19 00:23:51', '2019-02-19 00:23:59'),
	(8, 'Adit', 'admin', 'mau tanya min', '<p>dsfsafasfasfas</p>', 'mau-tanya-min', 1, 'read', '2019-02-23 11:19:36', '2019-02-23 11:19:47'),
	(9, 'admin', 'adhitya rachman', 'tes', '<h2><em><strong>tess</strong></em></h2>', 'tes', 4, 'read', '2019-05-14 15:11:19', '2019-05-14 15:11:31'),
	(10, 'adhitya rachman', 'admin', 'tes', '<p>a</p>', 'tes', 4, 'read', '2019-05-14 15:11:36', '2019-05-14 15:11:51'),
	(11, 'admin', 'adhitya rachman', 'tes', '<p>sadas</p>', 'tes', 4, 'read', '2019-05-14 15:11:57', '2019-05-14 15:11:57'),
	(12, 'admin', 'faiz ananda', 'test', '<p>test kirim pesan</p>', 'test', 13, 'unread', '2019-07-31 23:21:46', '2019-07-31 23:21:46');
/*!40000 ALTER TABLE `pesans` ENABLE KEYS */;

-- Dumping structure for table faiz.sewas
DROP TABLE IF EXISTS `sewas`;
CREATE TABLE IF NOT EXISTS `sewas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_barang` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_user` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kodesewa` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `harga` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `struk` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_pengiriman` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jangka_waktu` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `batas_upload_struk` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table faiz.sewas: ~7 rows (approximately)
/*!40000 ALTER TABLE `sewas` DISABLE KEYS */;
REPLACE INTO `sewas` (`id`, `id_barang`, `id_user`, `kodesewa`, `harga`, `alamat`, `phone`, `struk`, `status`, `status_pengiriman`, `jangka_waktu`, `bank`, `batas_upload_struk`, `created_at`, `updated_at`) VALUES
	(8, '13', '9', 'GaizYUuQAnkFn1R0wxCkDPJz9DCQLqLBw3GYLYLIieNspKbl7T', '131250', 'jl pariamana', '085746979484', 'struk8.jpg', 'verified', NULL, '7', 'bca', '2019-07-16 14:19:03', '2019-07-15 14:19:03', '2019-07-18 11:38:17'),
	(9, '13', '10', '9Vs0KtiFs8RjAq7WSrJURikhy53yMu9gtdgAcDLS3g6A9RxjkH', '25000', 'Jl Pariaman No 3a RT/3 RW/10', '1282831996', 'struk9.jpg', 'verified', '1', '1', 'bca', '2019-07-17 05:16:30', '2019-07-16 05:16:30', '2019-07-16 05:19:19'),
	(10, '17', '10', 'JX1ZunpgAsnhfVipyENlqUzP0MMPLOUPxbOq8AI4vy73Y2j4WV', '85500', 'Jl Pariaman No 3a RT/3 RW/10', '1282831996', 'struk10.jpg', 'verified', NULL, '3', 'bca', '2019-07-17 07:39:49', '2019-07-16 07:39:49', '2019-07-16 07:42:03'),
	(11, '24', '9', 'fwKK8EJJJtddtF5MbTbtXDeRBRH4tDjmnelOJobV791X04cTCQ', '28500', 'asdasd', '968435486468', 'struk11.jpg', 'verified', NULL, '3', 'mandiri', '2019-07-19 12:07:02', '2019-07-18 12:07:02', '2019-07-18 12:17:16'),
	(12, '13', '9', 'Z7MGr14AWvFlOeINgaxDv94sfbaDAqyrJoT5SjU3OIPiYGUw0E', '25000', NULL, NULL, NULL, 'unverified', NULL, '1', 'bca', '2019-07-19 14:03:14', '2019-07-18 14:03:14', '2019-07-18 14:03:14'),
	(13, '13', '9', 'JeqlJmwRJaAmWWq7X6gNKM1JXQFzqev14KX00SwfIDPCKkyV2M', '25000', 'asdasd', '2321321321', 'struk13.jpg', 'unverified', NULL, '1', 'bca', '2019-07-19 14:03:25', '2019-07-18 14:03:25', '2019-07-18 14:04:45'),
	(14, '13', '13', 'ki95ZxZsMvbJV5AmKqUPEuPORDY1mltqozdIbVmzov001jBxXH', NULL, NULL, NULL, 'struk14.jpg', 'unverified', NULL, '1', 'bca', '2019-08-02 20:38:55', '2019-08-01 20:38:55', '2019-08-01 20:50:49');
/*!40000 ALTER TABLE `sewas` ENABLE KEYS */;

-- Dumping structure for table faiz.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dilihat` varchar(10000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_login` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `visit_perhari` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `login` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table faiz.users: ~5 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
REPLACE INTO `users` (`id`, `name`, `foto`, `email`, `dilihat`, `status_login`, `alamat`, `phone`, `visit_perhari`, `email_verified_at`, `password`, `remember_token`, `login`, `created_at`, `updated_at`) VALUES
	(9, 'Febryan 13', 'https://lh4.googleusercontent.com/--mlBZE-QEvM/AAAAAAAAAAI/AAAAAAAAAAA/ACHi3rcM4JcwyIfk9ckwvf7EeULDqYq4jg/photo.jpg', 'febryanarmanda13@gmail.com', '27,14,15,13,17,24', 'google', NULL, NULL, '2,2019-07-18 12:04:02', NULL, '$2y$10$EqWJL8vdoe.fpeLFzTA4We5WE9EsJlR9J/Ih0CMQaR2UqdGSa8ZI.', 'NbJSilJNL8slXSwfgiJPXQGUYJJDgTzmc2J2r2nKjTAObRHBlQjwiHtpXKrb', '2019-07-18 14:44:40', '2019-07-15 12:19:31', '2019-07-18 14:44:40'),
	(10, 'Muhammad Faiz Ananda B', 'https://graph.facebook.com/v3.0/10213895818296657/picture?type=normal', 'faizananda@yahoo.com', '20,13,28,14,24,17,15', 'facebook', 'Jl Pariaman No 3a RT/3 RW/10', '1282831996', '4,2019-08-02 00:34:28', NULL, '$2y$10$fm.MNtc/GNn2eW4DVKyDfeydShuOUBc04tLp4LvfKcB5lNzJCx1ce', 'lXk95pM8KWTnwwTCa57aMAQiDDhRbShU5ggyoSIoCTMujl4dHuj4GlEMNnVg', '2019-08-02 00:34:28', '2019-07-16 04:45:01', '2019-08-02 00:42:35'),
	(11, 'Faiz Ananda', 'https://lh3.googleusercontent.com/-kGAjJRdW2D0/AAAAAAAAAAI/AAAAAAAAAAA/ACHi3rcgOz659cZP5Y2J5JBEsawl8lc1NA/photo.jpg', 'fzannd27@gmail.com', NULL, 'google', NULL, NULL, '1,2019-07-19 15:30:09', NULL, '$2y$10$VpeJ1PLAsK621UxMZm8Jcu9zguodFI68aHr4ch8lr3NTto2eukNaW', NULL, '2019-07-19 15:30:09', '2019-07-19 15:30:09', '2019-07-19 15:30:09'),
	(12, 'faiz ananda', 'https://lh6.googleusercontent.com/-OniIrpF3c8A/AAAAAAAAAAI/AAAAAAAAAAA/ACHi3rfKv27B4BLWpgo5sswQHaQpEjmP7Q/photo.jpg', 'faizanndpy27@gmail.com', NULL, 'google', NULL, NULL, '1,2019-07-24 22:50:48', NULL, '$2y$10$24stjZ8KKmPeBDBDsEDbeu0KYFPk4CbLXYscDhuIUZsCweVj2urai', NULL, '2019-07-24 22:50:48', '2019-07-24 22:50:48', '2019-07-24 22:50:48'),
	(13, 'faiz ananda', 'https://lh4.googleusercontent.com/-mPR2aT0ph8s/AAAAAAAAAAI/AAAAAAAAAAA/ACHi3rc-lHaZKHBF1dd3tgynj4DhHntjLQ/photo.jpg', 'faizdhea27@gmail.com', '13', 'google', NULL, NULL, '2,2019-08-01 19:53:40', NULL, '$2y$10$zg/iEWbqMRz9K6pBhARF.OPpHtni8WiKxcM2tQly0eisdpx8e37Ra', NULL, '2019-08-01 19:53:42', '2019-07-31 23:21:09', '2019-08-01 19:53:45');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
