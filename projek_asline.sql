-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for projek_asline
CREATE DATABASE IF NOT EXISTS `projek_asline` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `projek_asline`;

-- Dumping structure for table projek_asline.admins
CREATE TABLE IF NOT EXISTS `admins` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `nama_admin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_admins_users` (`user_id`),
  CONSTRAINT `FK_admins_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table projek_asline.admins: ~3 rows (approximately)
DELETE FROM `admins`;
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
INSERT INTO `admins` (`id`, `user_id`, `nama_admin`, `email`, `created_at`, `updated_at`) VALUES
	(17, 29, 'Salma Zulfatul L', 'salma@gmail.com', '2022-11-18 16:40:34', '2022-12-08 11:57:33'),
	(18, 49, 'Imada', 'imada@gmail.com', '2022-12-05 08:46:53', '2022-12-05 08:47:09'),
	(19, 54, 'Lailatul F', 'lailatulF@gmail.com', '2022-12-11 10:18:39', '2022-12-12 02:11:21');
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;

-- Dumping structure for table projek_asline.aslabs
CREATE TABLE IF NOT EXISTS `aslabs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `dosen_id` bigint(20) unsigned NOT NULL,
  `nama_aslab` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_lahir` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_kelamin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_aslabs_users` (`user_id`),
  KEY `FK_aslabs_dosens` (`dosen_id`),
  CONSTRAINT `FK_aslabs_dosens` FOREIGN KEY (`dosen_id`) REFERENCES `dosens` (`id`),
  CONSTRAINT `FK_aslabs_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table projek_asline.aslabs: ~3 rows (approximately)
DELETE FROM `aslabs`;
/*!40000 ALTER TABLE `aslabs` DISABLE KEYS */;
INSERT INTO `aslabs` (`id`, `user_id`, `dosen_id`, `nama_aslab`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `email`, `alamat`, `created_at`, `updated_at`) VALUES
	(1, 39, 11, 'Adisa Dwi Wanti', 'ttt', '2022-11-28', 'Perempuan', 'adisa@gmail.com', 'Sidoarjo Pride', '2022-11-18 18:27:24', '2022-12-08 11:36:46'),
	(2, 45, 12, 'Indah', 'Pasuruan', '2022-12-04', 'Perempuan', 'indah@gmail.com', 'Pasuruan', '2022-12-04 10:53:16', '2022-12-04 10:54:02'),
	(4, 47, 13, 'Fina', NULL, NULL, 'Laki-Laki', NULL, NULL, '2022-12-04 10:54:59', '2022-12-04 10:55:13');
/*!40000 ALTER TABLE `aslabs` ENABLE KEYS */;

-- Dumping structure for table projek_asline.dosens
CREATE TABLE IF NOT EXISTS `dosens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `matkul_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `nama_dosen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_lahir` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_kelamin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `dosens_matkul_id_foreign` (`matkul_id`),
  KEY `FK_dosens_users` (`user_id`),
  CONSTRAINT `FK_dosens_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `dosens_matkul_id_foreign` FOREIGN KEY (`matkul_id`) REFERENCES `matkuls` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table projek_asline.dosens: ~4 rows (approximately)
DELETE FROM `dosens`;
/*!40000 ALTER TABLE `dosens` DISABLE KEYS */;
INSERT INTO `dosens` (`id`, `matkul_id`, `user_id`, `nama_dosen`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `email`, `alamat`, `created_at`, `updated_at`) VALUES
	(11, 1, 32, 'Ahmad Zaki', 'Malang', '2022-11-28', 'Laki-Laki', 'zakiA@gmail.com', 'Malang, Jawa Timur', '2022-11-18 16:47:36', '2022-12-12 02:16:57'),
	(12, 5, 43, 'Andayu', 'Malang', '2022-12-05', 'Perempuan', 'andayu@gmail.com', 'Pasuruan', '2022-12-04 10:47:27', '2022-12-05 02:54:47'),
	(13, 8, 44, 'Amalia Arum Rahmayanti', 'Kediri', '2022-12-05', 'Perempuan', 'amal@gmail.com', 'Kediri', '2022-12-04 10:51:17', '2022-12-08 11:33:47');
/*!40000 ALTER TABLE `dosens` ENABLE KEYS */;

-- Dumping structure for table projek_asline.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table projek_asline.failed_jobs: ~0 rows (approximately)
DELETE FROM `failed_jobs`;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Dumping structure for table projek_asline.laporans
CREATE TABLE IF NOT EXISTS `laporans` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `mahasiswa_id` bigint(20) unsigned NOT NULL,
  `matkul_id` bigint(20) unsigned NOT NULL,
  `dosen_id` bigint(20) unsigned DEFAULT NULL,
  `aslab_id` bigint(20) unsigned DEFAULT NULL,
  `materi_id` bigint(20) unsigned NOT NULL,
  `tgl_upload` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `laporan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nilai` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `komentar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `laporans_mahasiswa_id_foreign` (`mahasiswa_id`),
  KEY `FK_laporans_materis` (`materi_id`),
  KEY `FK_laporans_matkuls` (`matkul_id`),
  KEY `FK_laporans_dosens` (`dosen_id`),
  KEY `FK_laporans_aslabs` (`aslab_id`),
  CONSTRAINT `FK_laporans_aslabs` FOREIGN KEY (`aslab_id`) REFERENCES `aslabs` (`id`),
  CONSTRAINT `FK_laporans_dosens` FOREIGN KEY (`dosen_id`) REFERENCES `dosens` (`id`),
  CONSTRAINT `FK_laporans_materis` FOREIGN KEY (`materi_id`) REFERENCES `materis` (`id`),
  CONSTRAINT `FK_laporans_matkuls` FOREIGN KEY (`matkul_id`) REFERENCES `matkuls` (`id`),
  CONSTRAINT `laporans_mahasiswa_id_foreign` FOREIGN KEY (`mahasiswa_id`) REFERENCES `mahasiswas` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table projek_asline.laporans: ~4 rows (approximately)
DELETE FROM `laporans`;
/*!40000 ALTER TABLE `laporans` DISABLE KEYS */;
INSERT INTO `laporans` (`id`, `mahasiswa_id`, `matkul_id`, `dosen_id`, `aslab_id`, `materi_id`, `tgl_upload`, `laporan`, `nilai`, `komentar`, `created_at`, `updated_at`) VALUES
	(11, 3, 1, 11, 1, 26, '2022-12-08', 'files/TcdOOJ7Epu9xs0NXQebQ1PVs7KWwdwDpaR7D4Id0.pdf', '90', 'sip sudah betul', '2022-12-08 11:40:05', '2022-12-08 11:50:20'),
	(12, 3, 5, 12, 2, 25, '2022-12-08', 'files/k9mjuJuLg9yA7HHXUdR6t5TfXICAHQqvAOyJscwS.pdf', '90', NULL, '2022-12-08 11:43:09', '2022-12-08 11:51:58'),
	(13, 3, 8, 13, 4, 28, '2022-12-08', 'files/03HSm1rv6CvaGHeYx3XicI5DScscMbosg1kPIZET.pdf', '95', NULL, '2022-12-08 11:45:30', '2022-12-08 11:52:44'),
	(14, 3, 5, 12, 2, 24, '2022-12-08', 'files/JIjXeqdTQUoFeKcUMx4w7GyCs7C9tPexKiBK34RN.pdf', '70', NULL, '2022-12-08 12:04:37', '2022-12-12 02:27:08'),
	(15, 7, 5, 12, 2, 24, '2022-12-12', 'files/Om3EnLFgk1rrwzYymTT2RyNWtC06ilcJ0vFK0Com.pdf', NULL, NULL, '2022-12-12 02:19:49', '2022-12-12 02:19:49');
/*!40000 ALTER TABLE `laporans` ENABLE KEYS */;

-- Dumping structure for table projek_asline.mahasiswas
CREATE TABLE IF NOT EXISTS `mahasiswas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL DEFAULT '0',
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_lahir` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_kelamin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_mahasiswas_users` (`user_id`),
  CONSTRAINT `FK_mahasiswas_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table projek_asline.mahasiswas: ~3 rows (approximately)
DELETE FROM `mahasiswas`;
/*!40000 ALTER TABLE `mahasiswas` DISABLE KEYS */;
INSERT INTO `mahasiswas` (`id`, `user_id`, `nama`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `email`, `alamat`, `created_at`, `updated_at`) VALUES
	(3, 41, 'Alfiyatus Zuhro', 'Pasuruan', '2001-02-24', 'Perempuan', 'fifi@gmail.com', 'Pasuruan', '2022-11-19 07:25:24', '2022-12-08 11:41:40'),
	(4, 48, 'Shila', 'Pasuruan', '2022-12-05', 'Perempuan', 'shila@gmail.com', 'Pasuruan', '2022-12-04 10:55:51', '2022-12-05 02:57:24'),
	(5, 53, 'Zafran Abidzar', 'Jombang', '90001-12-12', 'Laki-Laki', 'zafran@gmail.com', 'Jombang', '2022-12-05 09:01:26', '2022-12-05 09:15:40'),
	(6, 57, 'Fahmi', NULL, NULL, 'Laki-Laki', NULL, NULL, '2022-12-11 10:25:32', '2022-12-11 10:25:52'),
	(7, 60, 'Aliya Ahmad', 'Gresik', '2022-12-12', 'Perempuan', 'aliya@gmail.com', 'Gresik', '2022-12-12 02:10:24', '2022-12-12 02:22:37');
/*!40000 ALTER TABLE `mahasiswas` ENABLE KEYS */;

-- Dumping structure for table projek_asline.materis
CREATE TABLE IF NOT EXISTS `materis` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `aslab_id` bigint(20) unsigned NOT NULL,
  `dosen_id` bigint(20) unsigned NOT NULL,
  `matkul_id` bigint(20) unsigned NOT NULL,
  `judul_materi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `materi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl_deadline` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl_upload` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `materis_dosen_id_foreign` (`aslab_id`),
  KEY `FK_materis_matkuls` (`matkul_id`),
  KEY `FK_materis_dosens` (`dosen_id`),
  CONSTRAINT `FK_materis_dosens` FOREIGN KEY (`dosen_id`) REFERENCES `dosens` (`id`),
  CONSTRAINT `FK_materis_matkuls` FOREIGN KEY (`matkul_id`) REFERENCES `matkuls` (`id`),
  CONSTRAINT `materis_dosen_id_foreign` FOREIGN KEY (`aslab_id`) REFERENCES `aslabs` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table projek_asline.materis: ~6 rows (approximately)
DELETE FROM `materis`;
/*!40000 ALTER TABLE `materis` DISABLE KEYS */;
INSERT INTO `materis` (`id`, `aslab_id`, `dosen_id`, `matkul_id`, `judul_materi`, `keterangan`, `materi`, `tgl_deadline`, `tgl_upload`, `created_at`, `updated_at`) VALUES
	(24, 2, 12, 5, 'Laravel', 'Framework Laravel 9', 'LAMPIRAN.pdf', '2022-12-07', '2022-12-08', '2022-12-08 11:23:54', '2022-12-08 11:25:56'),
	(25, 2, 12, 5, 'Codeigniter', 'Autoroute pada Framework CI', 'Data_Preparation_for_Data_Mining.pdf', NULL, '2022-12-08', '2022-12-08 11:26:56', '2022-12-08 11:26:56'),
	(26, 1, 11, 1, 'HTML', 'Pengenalan HTML dan praktek', 'applsci-12-10893.pdf', '2022-12-17', '2022-12-08', '2022-12-08 11:29:51', '2022-12-08 11:29:51'),
	(27, 1, 11, 1, 'PHP', 'Pengenalan PHP', '177-Article Text-551-1-10-20200228.pdf', '2022-12-07', '2022-12-08', '2022-12-08 11:30:35', '2022-12-12 02:16:33'),
	(28, 4, 13, 8, 'ROC', 'Langkah dalam pembobotan ROC', 'Data_Preparation_for_Data_Mining.pdf', NULL, '2022-12-08', '2022-12-08 11:31:56', '2022-12-08 11:31:56'),
	(29, 4, 13, 8, 'SPK', 'Mencari permasalahan', 'applsci-12-10893.pdf', NULL, '2022-12-08', '2022-12-08 11:32:56', '2022-12-08 11:32:56'),
	(30, 1, 11, 1, 'CSS', 'pengenalan CSS', 'Threshold_dan_Nai_ve_Bayes.pdf', '2022-12-19', '2022-12-12', '2022-12-12 02:16:17', '2022-12-12 02:16:18');
/*!40000 ALTER TABLE `materis` ENABLE KEYS */;

-- Dumping structure for table projek_asline.matkuls
CREATE TABLE IF NOT EXISTS `matkuls` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `matkul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table projek_asline.matkuls: ~3 rows (approximately)
DELETE FROM `matkuls`;
/*!40000 ALTER TABLE `matkuls` DISABLE KEYS */;
INSERT INTO `matkuls` (`id`, `matkul`, `foto`, `url`, `created_at`, `updated_at`) VALUES
	(1, 'Web Programming', 'web.jpg', '/mk/web', '2022-11-27 22:07:07', '2022-12-09 02:38:54'),
	(5, 'Framework Programming', 'fr.jpg', '/mk/fr', '2022-11-18 11:23:43', '2022-12-09 02:39:39'),
	(8, 'Sistem Informasi', 'si.jpg', '/mk/si', '2022-11-28 22:20:47', '2022-12-09 02:39:51');
/*!40000 ALTER TABLE `matkuls` ENABLE KEYS */;

-- Dumping structure for table projek_asline.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table projek_asline.migrations: ~11 rows (approximately)
DELETE FROM `migrations`;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(12, '2014_10_12_000000_create_users_table', 1),
	(13, '2014_10_12_100000_create_password_resets_table', 1),
	(14, '2019_08_19_000000_create_failed_jobs_table', 1),
	(15, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(16, '2022_11_14_033942_create_matkuls_table', 1),
	(17, '2022_11_14_035431_create_dosens_table', 1),
	(18, '2022_11_14_035510_create_materis_table', 1),
	(19, '2022_11_14_040127_create_aslabs_table', 1),
	(20, '2022_11_14_040438_create_mahasiswas_table', 1),
	(21, '2022_11_14_040624_create_admins_table', 1),
	(22, '2022_12_14_034149_create_laporans_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table projek_asline.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table projek_asline.password_resets: ~0 rows (approximately)
DELETE FROM `password_resets`;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table projek_asline.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table projek_asline.personal_access_tokens: ~0 rows (approximately)
DELETE FROM `personal_access_tokens`;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;

-- Dumping structure for table projek_asline.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table projek_asline.users: ~14 rows (approximately)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `username`, `password`, `level`, `created_at`, `updated_at`) VALUES
	(29, 'admin1', '$2y$10$Jz8sL8ROL3mVQZlpiP8FmOvnurssma5.YBC7s39GwsmMvpFh14oUu', 'Admin', '2022-11-18 16:40:34', '2022-12-05 09:04:11'),
	(32, '19650022', '$2y$10$WkfF/IOYqoagj92ec8iD1ONU7HSAcOT8OdXsS5oe4Y9xMhJlxNWJm', 'Dosen', '2022-11-18 16:47:36', '2022-12-12 02:17:48'),
	(39, '19650011', '$2y$10$PV80eeG6/zaoJMc2SyRXV.pY2uW0/lzG2xTN.O2IxhKo4E0WCOPWS', 'Asisten Praktikum', '2022-11-18 18:27:24', '2022-12-08 11:37:54'),
	(41, '19650001', '$2y$10$z03J1LCeB5cyth6q955DUugIf0f/3YkGRRF6K1EFPMm0fl0X.Fp8i', 'Mahasiswa', '2022-11-19 07:25:24', '2022-12-08 11:55:54'),
	(43, '19650021', '$2y$10$muBYvg6Ddz7.upMupJzJuemQmtz.eUkqdU9f/bcbof9TsdftW8xMC', 'Dosen', '2022-12-04 10:47:27', '2022-12-04 10:47:27'),
	(44, '19650023', '$2y$10$kz4ShahZrUeXCp07n9TufuycxfWwZq.GTTpqxfZnBPvEIVyMqrJCm', 'Dosen', '2022-12-04 10:51:17', '2022-12-08 11:34:57'),
	(45, '19650012', '$2y$10$5r0m8vh2UOy6nCZb0K9ftek86V.ZwBSYhb8k2t2IfJEPfjGYNY4Ua', 'Asisten Praktikum', '2022-12-04 10:53:16', '2022-12-12 02:28:25'),
	(47, '19650013', '$2y$10$.ib5ZhHdFvyjdunjZAH9e.FPEWNcXHcV.MTJoZiZHTfCqP7WVoHAO', 'Asisten Praktikum', '2022-12-04 10:54:59', '2022-12-04 10:54:59'),
	(48, '19650002', '$2y$10$izOZw.sSyGHEA2AXkZUoV.UAQ.caS5akCMIM1BVzHIXigv7E44Vx.', 'Mahasiswa', '2022-12-04 10:55:51', '2022-12-04 10:55:51'),
	(49, 'admin2', '$2y$10$6.rp1ColRneboGgGPL4fsuAHCB.bNY9sjWbTpHUP5Fbhhxtd3G1Oq', 'Admin', '2022-12-05 08:46:53', '2022-12-05 08:47:36'),
	(53, '19650003', '$2y$10$i.eBIesMQSM2x2LOOcoX4.ARTpSVyqx6dR3jEQhPUKyGBk8PTxluK', 'Mahasiswa', '2022-12-05 09:01:26', '2022-12-05 09:16:33'),
	(54, 'admin3', '$2y$10$5Azhhfs5BlvPHQW99RZWG.8/HjulQiLKCEDrZFG2C9tv/C0bsCxcu', 'Admin', '2022-12-11 10:18:39', '2022-12-12 02:18:35'),
	(57, '19650004', '$2y$10$6JG5tyixGS4Zgn7lgeKWfuHCpVct99qxdXFTjSkXx0JbsnFCVE0iC', 'Mahasiswa', '2022-12-11 10:25:32', '2022-12-11 10:25:32'),
	(60, '19650006', '$2y$10$6nhEDty8redJHIfqJ11sTOzSJcb/TsTzNBP/9Q4EZaVwfqxV34pgS', 'Mahasiswa', '2022-12-12 02:10:24', '2022-12-12 02:23:45');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
