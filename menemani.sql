-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 02 Jul 2018 pada 06.40
-- Versi Server: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `menemani`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `alat_kantor`
--

CREATE TABLE `alat_kantor` (
  `id` int(11) NOT NULL,
  `kd_alat` varchar(8) NOT NULL,
  `nm_alat` varchar(55) NOT NULL,
  `jenis_alat` varchar(55) DEFAULT NULL,
  `jumlah` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `alat_medis`
--

CREATE TABLE `alat_medis` (
  `id` int(11) NOT NULL,
  `kd_alat` varchar(8) NOT NULL,
  `nm_alat` varchar(55) NOT NULL,
  `jenis_alat` varchar(55) DEFAULT NULL,
  `jumlah` int(11) NOT NULL,
  `description` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_kategori` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `categories`
--

INSERT INTO `categories` (`id`, `nama_kategori`, `created_at`, `updated_at`) VALUES
(1, 'Dokter', '2018-05-12 03:00:39', '2018-05-12 03:00:39'),
(2, 'Pegawai', '2018-05-12 03:00:39', '2018-05-12 03:00:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `conf_honor`
--

CREATE TABLE `conf_honor` (
  `id` int(11) NOT NULL,
  `tgl` date DEFAULT NULL,
  `petugas_id` int(3) DEFAULT NULL,
  `honor` bigint(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_pemeriksaan`
--

CREATE TABLE `data_pemeriksaan` (
  `id_dpemeriksaan` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_pemeriksaan` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `days`
--

CREATE TABLE `days` (
  `id` int(10) UNSIGNED NOT NULL,
  `days` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `days`
--

INSERT INTO `days` (`id`, `days`, `created_at`, `updated_at`) VALUES
(1, 'SENIN', '2018-04-22 17:34:08', '2018-04-22 17:34:00'),
(2, 'SELASA', '2018-04-22 17:34:08', '2018-04-22 17:34:00'),
(3, 'RABU', '2018-04-22 17:34:08', '2018-04-22 17:34:00'),
(4, 'KAMIS', '2018-04-22 17:34:08', '2018-04-22 17:34:00'),
(5, 'JUMAT', '2018-04-22 17:34:08', '2018-04-22 17:34:00'),
(6, 'SABTU', '2018-04-22 17:34:08', '2018-04-22 17:34:00'),
(7, 'MINGGU', '2018-04-22 17:34:08', '2018-04-22 17:34:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `day_petugas`
--

CREATE TABLE `day_petugas` (
  `id` int(10) UNSIGNED NOT NULL,
  `day_id` int(10) UNSIGNED NOT NULL,
  `petugas_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `donasi_obat`
--

CREATE TABLE `donasi_obat` (
  `id` int(11) NOT NULL,
  `nama_donatur` varchar(50) NOT NULL,
  `cp` varchar(50) NOT NULL,
  `hp` varchar(14) DEFAULT NULL,
  `jns_obt` varchar(50) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `keterangan` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `donasi_uang`
--

CREATE TABLE `donasi_uang` (
  `id` int(11) NOT NULL,
  `nama_donatur` varchar(50) NOT NULL,
  `cp` varchar(50) NOT NULL,
  `hp` varchar(15) NOT NULL,
  `jml_donasi` bigint(20) NOT NULL,
  `keterangan` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status_akunting` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `honor`
--

CREATE TABLE `honor` (
  `id` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `category_id` int(11) NOT NULL,
  `petugas_id` int(3) NOT NULL,
  `confhonor_id` int(3) NOT NULL,
  `jam` int(11) NOT NULL,
  `total` bigint(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status_akunting` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_obat`
--

CREATE TABLE `jenis_obat` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_obat_detail`
--

CREATE TABLE `jenis_obat_detail` (
  `id` int(11) NOT NULL,
  `kd_jenis` varchar(6) NOT NULL,
  `jenis_obat_id` int(11) NOT NULL,
  `nama_obat` varchar(55) NOT NULL,
  `satuan` varchar(4) NOT NULL,
  `deskripsi` text,
  `harga` bigint(20) NOT NULL,
  `stok` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategoripasien`
--

CREATE TABLE `kategoripasien` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_kategori` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kategoripasien`
--

INSERT INTO `kategoripasien` (`id`, `nama_kategori`, `created_at`, `updated_at`) VALUES
(1, 'Umum', '2018-03-20 05:26:18', '2018-03-20 16:07:02'),
(2, 'BPJS', '2018-06-11 07:01:31', '2018-06-11 07:01:31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_pemeriksaan`
--

CREATE TABLE `kategori_pemeriksaan` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(13) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori_pemeriksaan`
--

INSERT INTO `kategori_pemeriksaan` (`id_kategori`, `nama_kategori`, `created_at`, `updated_at`) VALUES
(3, 'PEMERIKSAAN', '2018-06-06 09:51:06', '2018-06-06 09:51:06'),
(4, 'TINDAKAN', '2018-06-06 09:51:06', '2018-06-06 09:51:06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kecamatan`
--

CREATE TABLE `kecamatan` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_kecamatan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kota_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kecamatan`
--

INSERT INTO `kecamatan` (`id`, `nama_kecamatan`, `kota_id`, `created_at`, `updated_at`) VALUES
(1, 'Gambir', 1, '2018-06-01 15:37:42', '2018-06-01 15:37:42'),
(2, 'Tanah Abang', 1, '2018-06-01 15:41:16', '2018-06-01 15:41:16'),
(3, 'Menteng', 1, '2018-06-01 15:44:23', '2018-06-01 15:44:23'),
(4, 'Senen', 1, '2018-06-01 15:48:23', '2018-06-01 15:48:23'),
(5, 'Cempaka Putih', 1, '2018-06-01 15:50:51', '2018-06-01 15:50:51'),
(7, 'Johar Baru', 1, '2018-06-01 15:54:39', '2018-06-01 15:54:39'),
(8, 'Kemayoran', 1, '2018-06-01 15:59:10', '2018-06-01 15:59:10'),
(9, 'Sawah Besar', 1, '2018-06-01 16:03:39', '2018-06-01 16:03:39'),
(10, 'Tamansari', 2, '2018-06-01 16:06:45', '2018-06-01 16:06:45'),
(11, 'Tambora', 2, '2018-06-01 16:11:24', '2018-06-01 16:11:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelurahan`
--

CREATE TABLE `kelurahan` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_kelurahan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kec_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kelurahan`
--

INSERT INTO `kelurahan` (`id`, `nama_kelurahan`, `kec_id`, `created_at`, `updated_at`) VALUES
(1, 'Gambir', 1, '2018-06-01 15:38:02', '2018-06-01 15:38:02'),
(2, 'Kebon Kelapa', 1, '2018-06-01 15:38:46', '2018-06-01 15:38:46'),
(3, 'Petojo Utara', 1, '2018-06-01 15:39:11', '2018-06-01 15:39:11'),
(4, 'Duri Pulo', 1, '2018-06-01 15:39:49', '2018-06-01 15:39:49'),
(5, 'Cideng', 1, '2018-06-01 15:40:06', '2018-06-01 15:40:06'),
(6, 'Petojo Selatan', 1, '2018-06-01 15:40:25', '2018-06-01 15:40:25'),
(7, 'Bendungan Hilir', 2, '2018-06-01 15:41:33', '2018-06-01 15:41:33'),
(8, 'Karet Tengsin', 2, '2018-06-01 15:41:55', '2018-06-01 15:41:55'),
(9, 'Kebon Melati', 2, '2018-06-01 15:42:13', '2018-06-01 15:42:13'),
(10, 'Kebon Kacang', 2, '2018-06-01 15:42:34', '2018-06-01 15:42:34'),
(11, 'Kampung Bali', 2, '2018-06-01 15:43:05', '2018-06-01 15:43:05'),
(12, 'Petamburan', 2, '2018-06-01 15:43:21', '2018-06-01 15:43:21'),
(13, 'Gelora', 2, '2018-06-01 15:43:37', '2018-06-01 15:43:37'),
(14, 'Menteng', 3, '2018-06-01 15:44:39', '2018-06-01 15:44:39'),
(15, 'Pegangsaan', 3, '2018-06-01 15:45:00', '2018-06-01 15:45:00'),
(16, 'Cikini', 3, '2018-06-01 15:45:43', '2018-06-01 15:45:43'),
(17, 'Kebon Sirih', 3, '2018-06-01 15:46:33', '2018-06-01 15:46:33'),
(18, 'Gondangdia', 3, '2018-06-01 15:47:18', '2018-06-01 15:47:18'),
(19, 'Senen', 4, '2018-06-01 15:48:35', '2018-06-01 15:48:35'),
(20, 'Kwitang', 4, '2018-06-01 15:48:58', '2018-06-01 15:48:58'),
(21, 'Kenari', 4, '2018-06-01 15:49:12', '2018-06-01 15:49:12'),
(22, 'Paseban', 4, '2018-06-01 15:49:35', '2018-06-01 15:49:35'),
(23, 'Kramat', 4, '2018-06-01 15:49:57', '2018-06-01 15:49:57'),
(24, 'Bungur', 4, '2018-06-01 15:50:23', '2018-06-01 15:50:23'),
(25, 'Cempaka Putih Timur', 5, '2018-06-01 15:53:37', '2018-06-01 15:53:37'),
(26, 'Cempaka Putih Barat', 5, '2018-06-01 15:54:14', '2018-06-01 15:54:14'),
(27, 'Galur', 7, '2018-06-01 15:54:59', '2018-06-01 15:54:59'),
(29, 'Kampung Rawa', 7, '2018-06-01 15:56:33', '2018-06-01 15:56:33'),
(30, 'Johar Baru', 7, '2018-06-01 15:56:58', '2018-06-01 15:56:58'),
(31, 'Rawasari', 5, '2018-06-01 15:58:09', '2018-06-01 15:58:09'),
(32, 'Gunung Sahari Selatan', 8, '2018-06-01 15:59:27', '2018-06-01 15:59:27'),
(33, 'Kemayoran', 8, '2018-06-01 15:59:52', '2018-06-01 15:59:52'),
(34, 'Kebon Kosong', 8, '2018-06-01 16:00:23', '2018-06-01 16:00:23'),
(35, 'Cempaka Baru', 8, '2018-06-01 16:00:45', '2018-06-01 16:00:45'),
(36, 'Harapan Mulya', 8, '2018-06-01 16:01:03', '2018-06-01 16:01:03'),
(37, 'Sumur Batu', 8, '2018-06-01 16:01:17', '2018-06-01 16:01:17'),
(38, 'Serdang', 8, '2018-06-01 16:01:36', '2018-06-01 16:01:36'),
(40, 'Utan Panjang', 8, '2018-06-01 16:02:58', '2018-06-01 16:02:58'),
(41, 'Pasar Baru', 9, '2018-06-01 16:04:13', '2018-06-01 16:04:13'),
(42, 'Gunung Sahari Utara', 9, '2018-06-01 16:04:29', '2018-06-01 16:04:29'),
(43, 'Mangga Dua Selatan', 9, '2018-06-01 16:04:48', '2018-06-01 16:04:48'),
(44, 'Karang Anyar', 9, '2018-06-01 16:05:23', '2018-06-01 16:05:23'),
(45, 'Kartini', 9, '2018-06-01 16:05:59', '2018-06-01 16:05:59'),
(46, 'Pinangsia', 10, '2018-06-01 16:07:08', '2018-06-01 16:07:08'),
(47, 'Glodok', 10, '2018-06-01 16:07:49', '2018-06-01 16:07:49'),
(48, 'Keagungan', 10, '2018-06-01 16:08:11', '2018-06-01 16:08:11'),
(49, 'Krukut', 10, '2018-06-01 16:08:32', '2018-06-01 16:08:32'),
(50, 'Tamansari', 10, '2018-06-01 16:08:50', '2018-06-01 16:08:50'),
(51, 'Maphar', 10, '2018-06-01 16:09:56', '2018-06-01 16:09:56'),
(52, 'Tangki', 10, '2018-06-01 16:10:09', '2018-06-01 16:10:09'),
(53, 'Mangga Besar', 10, '2018-06-01 16:10:26', '2018-06-01 16:10:26'),
(54, 'Tanah Sareal', 11, '2018-06-01 16:11:56', '2018-06-01 16:11:56'),
(57, 'Pekojan', 11, '2018-06-01 16:15:27', '2018-06-01 16:15:27'),
(59, 'Krendang', 11, '2018-06-01 16:17:56', '2018-06-01 16:17:56'),
(60, 'Duri Selatan', 11, '2018-06-01 16:18:56', '2018-06-01 16:18:56'),
(61, 'Duri Utara', 11, '2018-06-01 16:19:24', '2018-06-01 16:19:24'),
(62, 'Kalianyar', 11, '2018-06-01 16:19:46', '2018-06-01 16:19:46'),
(63, 'Jembatan Besi', 11, '2018-06-01 16:20:17', '2018-06-01 16:20:17'),
(64, 'Angke', 11, '2018-06-01 16:21:11', '2018-06-01 16:21:11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kota`
--

CREATE TABLE `kota` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_kota` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kota`
--

INSERT INTO `kota` (`id`, `nama_kota`, `created_at`, `updated_at`) VALUES
(1, 'Jakarta Pusat', '2018-06-01 15:37:15', '2018-06-01 15:37:15'),
(2, 'Jakarta Barat', '2018-06-01 15:51:06', '2018-06-01 15:51:06'),
(3, 'Jakarta Selatan', '2018-06-01 15:51:26', '2018-06-01 15:51:26'),
(4, 'Jakarta Timur', '2018-06-01 15:51:45', '2018-06-01 15:51:45'),
(5, 'Jakarta Utara', '2018-06-01 15:52:04', '2018-06-01 15:52:04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `laravel_logger_activity`
--

CREATE TABLE `laravel_logger_activity` (
  `id` int(10) UNSIGNED NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `userType` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `route` longtext COLLATE utf8mb4_unicode_ci,
  `ipAddress` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `userAgent` text COLLATE utf8mb4_unicode_ci,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `referer` longtext COLLATE utf8mb4_unicode_ci,
  `methodType` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_11_04_103444_create_laravel_logger_activity_table', 1),
(4, '2018_01_15_105324_create_roles_table', 1),
(5, '2018_01_15_114412_create_role_user_table', 1),
(6, '2018_01_26_115212_create_permissions_table', 1),
(7, '2018_01_26_115523_create_permission_role_table', 1),
(8, '2018_02_09_132439_create_permission_user_table', 1),
(9, '2018_03_07_124856_create_petugas_table', 1),
(10, '2018_03_07_134727_create_kategori_table', 1),
(11, '2018_03_07_140508_create_hari_table', 1),
(12, '2018_03_07_144702_hari_petugas_table', 1),
(13, '2018_03_13_160622_create_poli_table', 1),
(14, '2018_03_19_202005_create_kota_table', 1),
(15, '2018_03_19_204340_create_kelurahan_table', 1),
(16, '2018_03_19_204448_create_kecamatan_table', 1),
(17, '2018_03_19_212237_create_pasien_table', 1),
(18, '2018_03_19_212631_create_kategoripasien_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `nama_akun`
--

CREATE TABLE `nama_akun` (
  `id_akun` int(11) NOT NULL,
  `id_tipe` int(11) NOT NULL,
  `nama_akun` varchar(30) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `nama_akun`
--

INSERT INTO `nama_akun` (`id_akun`, `id_tipe`, `nama_akun`, `created_at`, `updated_at`) VALUES
(1, 1, 'Kas harian', '2018-05-28 05:15:57', '2018-05-28 05:15:57'),
(3, 2, 'Modal', '2018-05-28 10:24:36', '2018-05-28 10:24:36'),
(4, 3, 'Pemeriksaan', '2018-05-28 10:24:48', '2018-05-28 10:24:48'),
(5, 4, 'PLN', '2018-05-28 10:24:59', '2018-05-28 10:24:59'),
(7, 4, 'PDAM', '2018-05-31 11:09:52', '2018-05-31 11:09:52'),
(8, 3, 'Donasi Uang', '2018-05-31 11:16:50', '2018-05-31 11:16:50'),
(9, 4, 'Honor', '2018-06-30 00:34:28', '2018-06-30 00:34:28'),
(10, 4, 'Pembelian Obat', '2018-06-30 00:34:48', '2018-06-30 00:34:48'),
(11, 4, 'Operasional', '2018-06-30 00:35:27', '2018-06-30 00:35:27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `operasional`
--

CREATE TABLE `operasional` (
  `id` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `keterangan` text,
  `jumlah` bigint(20) NOT NULL,
  `total` bigint(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status_akunting` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasien`
--

CREATE TABLE `pasien` (
  `id` int(10) UNSIGNED NOT NULL,
  `no_rm` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_pasien` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategoripasien_id` int(11) NOT NULL,
  `golongan_darah` char(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_kelamin` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `kota_id` int(11) NOT NULL,
  `kec_id` int(11) NOT NULL,
  `kel_id` int(11) NOT NULL,
  `kontak` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pekerjaan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_pernikahan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_kk` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `namaIbuKandung` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `namaAyahKandung` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TanggalLahir` date NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `id` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `vendor_id` varchar(3) NOT NULL,
  `obat_id` varchar(3) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` bigint(20) NOT NULL,
  `total` bigint(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status_akunting` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemberian_obat`
--

CREATE TABLE `pemberian_obat` (
  `id` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `no_pend` varchar(6) NOT NULL,
  `pasien_id` int(3) NOT NULL,
  `jenis_id` int(3) NOT NULL,
  `obat_id` int(3) NOT NULL,
  `jumlah` int(2) NOT NULL,
  `keterangan` text,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemeriksaan`
--

CREATE TABLE `pemeriksaan` (
  `id_pemeriksaan` int(11) NOT NULL,
  `id_kpemeriksaan` int(3) NOT NULL,
  `id_dpemeriksaan` int(3) NOT NULL,
  `reservasi_id` varchar(2) NOT NULL,
  `tgl` date NOT NULL,
  `no_faktur` varchar(10) NOT NULL,
  `tarif` bigint(20) NOT NULL,
  `disc` int(11) NOT NULL,
  `total` bigint(20) NOT NULL,
  `disc_result` bigint(20) NOT NULL,
  `disc_dokter` int(3) NOT NULL,
  `disc_dokter_result` bigint(20) NOT NULL,
  `disc_klinik` int(3) NOT NULL,
  `disc_klinik_result` bigint(20) NOT NULL,
  `u_id` int(2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status_akunting` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
--

CREATE TABLE `petugas` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `spesialisasi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `kota` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_telp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl_mulai_praktek` date NOT NULL,
  `img` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'user_default.png',
  `category_id` int(11) NOT NULL,
  `senin1` time DEFAULT NULL,
  `senin2` time DEFAULT NULL,
  `selasa1` time DEFAULT NULL,
  `selasa2` time DEFAULT NULL,
  `rabu1` time DEFAULT NULL,
  `rabu2` time DEFAULT NULL,
  `kamis1` time DEFAULT NULL,
  `kamis2` time DEFAULT NULL,
  `jumat1` time DEFAULT NULL,
  `jumat2` time DEFAULT NULL,
  `sabtu1` time DEFAULT NULL,
  `sabtu2` time DEFAULT NULL,
  `minggu1` time DEFAULT NULL,
  `minggu2` time DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `poli`
--

CREATE TABLE `poli` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_poli` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `poli`
--

INSERT INTO `poli` (`id`, `nama_poli`, `created_at`, `updated_at`) VALUES
(2, 'POLI UMUM', '2018-04-06 11:33:15', '2018-06-06 08:46:14'),
(5, 'POLI JANTUNG', '2018-06-19 05:12:22', '2018-06-19 05:12:22'),
(6, 'POLI ANAK', '2018-06-19 05:12:28', '2018-06-19 05:12:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rekam_medis`
--

CREATE TABLE `rekam_medis` (
  `id_rm` int(3) NOT NULL,
  `res_id` int(2) NOT NULL,
  `tgl` date NOT NULL,
  `rmkeluhan` varchar(100) DEFAULT NULL,
  `rmpemeriksaan` varchar(100) DEFAULT NULL,
  `rmpp` varchar(100) DEFAULT NULL,
  `rmalergiobat` varchar(100) DEFAULT NULL,
  `rmterapi` varchar(100) DEFAULT NULL,
  `rmresep` varchar(100) DEFAULT NULL,
  `rmkesimpulan` varchar(100) DEFAULT NULL,
  `rmdiagnosa` varchar(100) DEFAULT NULL,
  `kondisi_pasien` varchar(25) NOT NULL,
  `u_id` int(2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `reservasi`
--

CREATE TABLE `reservasi` (
  `id_res` int(11) NOT NULL,
  `kd_res` varchar(11) NOT NULL,
  `poli_id` int(3) NOT NULL,
  `pasien_id` int(3) NOT NULL,
  `dokter_id` int(3) DEFAULT NULL,
  `status_res` varchar(5) DEFAULT 'Sudah',
  `no_urut` varchar(4) NOT NULL,
  `no_rm` varchar(4) NOT NULL,
  `u_id` int(2) NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tipe_akun`
--

CREATE TABLE `tipe_akun` (
  `id_tipe` int(11) NOT NULL,
  `nama_tipe` varchar(15) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tipe_akun`
--

INSERT INTO `tipe_akun` (`id_tipe`, `nama_tipe`, `created_at`, `updated_at`) VALUES
(1, 'AKTIVA', '2018-04-26 10:52:09', '2018-04-26 10:52:09'),
(2, 'PASIVA', '2018-04-26 10:52:09', '2018-04-26 10:52:09'),
(3, 'PEMASUKAN', '2018-04-26 10:52:09', '2018-04-26 10:52:09'),
(4, 'PENGELUARAN', '2018-04-26 10:52:09', '2018-04-26 10:52:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(3) NOT NULL,
  `id_akun` int(3) NOT NULL,
  `id_tipe` int(2) NOT NULL,
  `tgl` date NOT NULL,
  `keterangan` text,
  `pengeluaran` bigint(20) NOT NULL,
  `pemasukan` bigint(20) NOT NULL,
  `nominal` bigint(20) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `id_pemeriksaan` int(3) DEFAULT NULL,
  `id_donasi_uang` int(3) DEFAULT NULL,
  `id_honor` int(3) DEFAULT NULL,
  `id_pembelian` int(3) DEFAULT NULL,
  `id_operasional` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin` int(1) NOT NULL,
  `petugasmedis` int(1) NOT NULL,
  `vendorobat` int(1) NOT NULL,
  `daftarobat` int(1) NOT NULL,
  `datapoli` int(1) NOT NULL,
  `pasien` int(1) NOT NULL,
  `peralatan` int(1) NOT NULL,
  `rekmedis` int(1) NOT NULL,
  `rekkeuangan` int(1) NOT NULL,
  `akunting` int(1) NOT NULL,
  `lpmedis` int(1) NOT NULL,
  `lpakunting` int(1) NOT NULL,
  `setuser` int(1) NOT NULL,
  `sethonor` int(1) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `first_name`, `last_name`, `password`, `img`, `admin`, `petugasmedis`, `vendorobat`, `daftarobat`, `datapoli`, `pasien`, `peralatan`, `rekmedis`, `rekkeuangan`, `akunting`, `lpmedis`, `lpakunting`, `setuser`, `sethonor`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Administrator', 'admin', '$2y$10$QltuGMUkUyg3ZRiQ7oIVj.iIhplXbzeXfSLN8KvsHhLhzeS5UMvtK', '6516-leon-page@2x.jpg', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '4soIqzucMuEeU0f0UBv3w5GehgQ4zImzUI83oc8yejznX17o7SeBWLWMKLnt', '2018-04-23 00:34:08', '2018-06-19 10:31:20'),
(2, 'bastiandelima', 'Bastian', 'Delima', '$2y$10$DCRyO6WbTv0bQp6kzcyuAOHz2GPDpwWTQWg0YAjY8oVOusI2Oruz2', '1517-download.jpg', 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 1, 1, 1, 1, 'NTBor4rbtG6lq680oM94H5q0Hhq11JX6RYPrEed356SAJABihtHLui0SlLb8', '2018-04-23 00:41:52', '2018-06-05 17:13:52');

-- --------------------------------------------------------

--
-- Struktur dari tabel `vendor_obat`
--

CREATE TABLE `vendor_obat` (
  `id` int(11) NOT NULL,
  `nama_vendor` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(12) NOT NULL,
  `no_hp` varchar(12) DEFAULT NULL,
  `pic` varchar(50) NOT NULL,
  `email` varchar(25) DEFAULT NULL,
  `deskripsi` text,
  `obat_id` int(11) NOT NULL,
  `catatan` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alat_kantor`
--
ALTER TABLE `alat_kantor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `alat_medis`
--
ALTER TABLE `alat_medis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `conf_honor`
--
ALTER TABLE `conf_honor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_pemeriksaan`
--
ALTER TABLE `data_pemeriksaan`
  ADD PRIMARY KEY (`id_dpemeriksaan`);

--
-- Indexes for table `days`
--
ALTER TABLE `days`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `day_petugas`
--
ALTER TABLE `day_petugas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `day_petugas_day_id_index` (`day_id`),
  ADD KEY `day_petugas_petugas_id_index` (`petugas_id`);

--
-- Indexes for table `donasi_obat`
--
ALTER TABLE `donasi_obat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donasi_uang`
--
ALTER TABLE `donasi_uang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `honor`
--
ALTER TABLE `honor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_obat`
--
ALTER TABLE `jenis_obat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_obat_detail`
--
ALTER TABLE `jenis_obat_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategoripasien`
--
ALTER TABLE `kategoripasien`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori_pemeriksaan`
--
ALTER TABLE `kategori_pemeriksaan`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelurahan`
--
ALTER TABLE `kelurahan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kota`
--
ALTER TABLE `kota`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laravel_logger_activity`
--
ALTER TABLE `laravel_logger_activity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nama_akun`
--
ALTER TABLE `nama_akun`
  ADD PRIMARY KEY (`id_akun`);

--
-- Indexes for table `operasional`
--
ALTER TABLE `operasional`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pemberian_obat`
--
ALTER TABLE `pemberian_obat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pemeriksaan`
--
ALTER TABLE `pemeriksaan`
  ADD PRIMARY KEY (`id_pemeriksaan`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `poli`
--
ALTER TABLE `poli`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rekam_medis`
--
ALTER TABLE `rekam_medis`
  ADD PRIMARY KEY (`id_rm`);

--
-- Indexes for table `reservasi`
--
ALTER TABLE `reservasi`
  ADD PRIMARY KEY (`id_res`);

--
-- Indexes for table `tipe_akun`
--
ALTER TABLE `tipe_akun`
  ADD PRIMARY KEY (`id_tipe`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- Indexes for table `vendor_obat`
--
ALTER TABLE `vendor_obat`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alat_kantor`
--
ALTER TABLE `alat_kantor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `alat_medis`
--
ALTER TABLE `alat_medis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `conf_honor`
--
ALTER TABLE `conf_honor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `data_pemeriksaan`
--
ALTER TABLE `data_pemeriksaan`
  MODIFY `id_dpemeriksaan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `days`
--
ALTER TABLE `days`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `day_petugas`
--
ALTER TABLE `day_petugas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `donasi_obat`
--
ALTER TABLE `donasi_obat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `donasi_uang`
--
ALTER TABLE `donasi_uang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `honor`
--
ALTER TABLE `honor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jenis_obat`
--
ALTER TABLE `jenis_obat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jenis_obat_detail`
--
ALTER TABLE `jenis_obat_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategoripasien`
--
ALTER TABLE `kategoripasien`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kategori_pemeriksaan`
--
ALTER TABLE `kategori_pemeriksaan`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `kelurahan`
--
ALTER TABLE `kelurahan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `kota`
--
ALTER TABLE `kota`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `laravel_logger_activity`
--
ALTER TABLE `laravel_logger_activity`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `nama_akun`
--
ALTER TABLE `nama_akun`
  MODIFY `id_akun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `operasional`
--
ALTER TABLE `operasional`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pemberian_obat`
--
ALTER TABLE `pemberian_obat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pemeriksaan`
--
ALTER TABLE `pemeriksaan`
  MODIFY `id_pemeriksaan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `poli`
--
ALTER TABLE `poli`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `rekam_medis`
--
ALTER TABLE `rekam_medis`
  MODIFY `id_rm` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reservasi`
--
ALTER TABLE `reservasi`
  MODIFY `id_res` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tipe_akun`
--
ALTER TABLE `tipe_akun`
  MODIFY `id_tipe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vendor_obat`
--
ALTER TABLE `vendor_obat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `day_petugas`
--
ALTER TABLE `day_petugas`
  ADD CONSTRAINT `day_petugas_day_id_foreign` FOREIGN KEY (`day_id`) REFERENCES `days` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `day_petugas_petugas_id_foreign` FOREIGN KEY (`petugas_id`) REFERENCES `petugas` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
