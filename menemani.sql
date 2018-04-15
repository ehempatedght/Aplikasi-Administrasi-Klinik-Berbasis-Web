-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 15 Apr 2018 pada 13.34
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

--
-- Dumping data untuk tabel `alat_kantor`
--

INSERT INTO `alat_kantor` (`id`, `kd_alat`, `nm_alat`, `jenis_alat`, `jumlah`, `created_at`, `updated_at`) VALUES
(1, 'S01', 'Computer Samsung', 'LCD', 2, '2018-04-02 14:57:54', '2018-04-02 14:57:54'),
(2, 'K01', 'LG Cool', 'Kulkas', 1, '2018-04-02 14:42:18', '2018-04-02 14:42:18');

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

--
-- Dumping data untuk tabel `alat_medis`
--

INSERT INTO `alat_medis` (`id`, `kd_alat`, `nm_alat`, `jenis_alat`, `jumlah`, `description`, `created_at`, `updated_at`) VALUES
(1, 'kd001', 'Care01', 'Suntikan', 3, 'Ini buat suntik anak bayi', '2018-04-02 14:01:18', '2018-04-02 14:01:18'),
(2, 'AL02', 'ALOWED', 'Pompa tekanan darah', 1, 'test', '2018-04-02 14:11:40', '2018-04-02 14:11:40'),
(3, 'xR01', 'Xray scann', 'scanner', 2, 'Test', '2018-04-02 14:07:50', '2018-04-02 14:07:50');

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
(1, 'Dokter', '2018-03-19 15:37:11', '2018-03-19 15:37:11'),
(3, 'Pegawai', '2018-03-19 15:37:11', '2018-03-19 15:37:11');

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
(1, 'Senin', '2018-03-19 15:37:11', '2018-03-19 15:37:11'),
(2, 'Selasa', '2018-03-19 15:37:11', '2018-03-19 15:37:11'),
(3, 'Rabu', '2018-03-19 15:37:11', '2018-03-19 15:37:11'),
(4, 'Kamis', '2018-03-19 15:37:11', '2018-03-19 15:37:11'),
(5, 'Jumat', '2018-03-19 15:37:11', '2018-03-19 15:37:11'),
(6, 'Sabtu', '2018-03-19 15:37:12', '2018-03-19 15:37:12'),
(7, 'Minggu', '2018-03-19 15:37:12', '2018-03-19 15:37:12');

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
-- Struktur dari tabel `jenis_obat`
--

CREATE TABLE `jenis_obat` (
  `id` int(11) NOT NULL,
  `kd_jenis` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_obat_detail`
--

CREATE TABLE `jenis_obat_detail` (
  `id` int(11) NOT NULL,
  `jenis_obat_id` int(11) NOT NULL,
  `nama_obat` varchar(55) NOT NULL,
  `satuan` varchar(4) NOT NULL,
  `deskripsi` varchar(255) DEFAULT NULL,
  `harga` double NOT NULL,
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
(7, 'UGD', '2018-03-20 16:07:35', '2018-03-20 16:07:35'),
(8, 'Test', '2018-03-21 14:52:43', '2018-03-21 14:52:43');

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
(1, 'Pondok Cina', 1, '2018-03-22 14:21:50', '2018-03-22 14:21:50'),
(2, 'Lubang Buaya', 2, '2018-03-22 14:22:54', '2018-03-22 14:22:54'),
(4, 'Kecamatan 1', 6, '2018-03-22 17:19:48', '2018-03-22 17:19:48'),
(5, 'Glodok', 7, '2018-03-31 01:22:35', '2018-03-31 01:22:35');

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
(2, 'Cijengkol', 2, '2018-03-22 14:23:09', '2018-03-22 17:58:30'),
(6, 'POCIN', 1, '2018-03-22 18:17:44', '2018-03-22 18:17:44'),
(7, 'Bojong Gede', 5, '2018-03-31 01:24:12', '2018-03-31 01:24:12');

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
(1, 'Depok', '2018-03-22 14:21:11', '2018-03-22 14:21:11'),
(2, 'Bekasi', '2018-03-22 14:22:34', '2018-03-22 14:22:34'),
(6, 'Tanggerang', '2018-03-22 17:10:55', '2018-03-22 17:10:55'),
(7, 'Jakarta', '2018-03-22 17:25:57', '2018-03-22 17:25:57');

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

--
-- Dumping data untuk tabel `laravel_logger_activity`
--

INSERT INTO `laravel_logger_activity` (`id`, `description`, `userType`, `userId`, `route`, `ipAddress`, `userAgent`, `locale`, `referer`, `methodType`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Logged In', 'Registered', 1, 'http://127.0.0.1:8000/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/64.0.3282.186 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1:8000/login', 'POST', '2018-03-19 15:48:33', '2018-03-19 15:48:33', NULL),
(2, 'Logged In', 'Registered', 1, 'http://127.0.0.1:8000/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/64.0.3282.186 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1:8000/login', 'POST', '2018-03-20 03:07:21', '2018-03-20 03:07:21', NULL),
(3, 'Logged In', 'Registered', 1, 'http://127.0.0.1:8000/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; rv:59.0) Gecko/20100101 Firefox/59.0', 'id,en-US;q=0.7,en;q=0.3', 'http://127.0.0.1:8000/login', 'POST', '2018-03-20 14:27:52', '2018-03-20 14:27:52', NULL),
(4, 'Logged In', 'Registered', 1, 'http://127.0.0.1:8000/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; rv:59.0) Gecko/20100101 Firefox/59.0', 'id,en-US;q=0.7,en;q=0.3', 'http://127.0.0.1:8000/login', 'POST', '2018-03-21 14:13:43', '2018-03-21 14:13:43', NULL),
(5, 'Logged In', 'Registered', 1, 'http://127.0.0.1:8000/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; rv:59.0) Gecko/20100101 Firefox/59.0', 'id,en-US;q=0.7,en;q=0.3', 'http://127.0.0.1:8000/login', 'POST', '2018-03-22 14:06:26', '2018-03-22 14:06:26', NULL),
(6, 'Logged In', 'Registered', 1, 'http://127.0.0.1:8000/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1:8000/login', 'POST', '2018-03-23 13:39:43', '2018-03-23 13:39:43', NULL),
(7, 'Logged In', 'Registered', 1, 'http://127.0.0.1:8000/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1:8000/login', 'POST', '2018-04-01 13:42:49', '2018-04-01 13:42:49', NULL),
(8, 'Logged In', 'Registered', 1, 'http://127.0.0.1:8000/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1:8000/login', 'POST', '2018-04-02 06:08:41', '2018-04-02 06:08:41', NULL),
(9, 'Logged Out', 'Registered', 1, 'http://127.0.0.1:8000/logout', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1:8000/kelurahan', 'POST', '2018-04-02 06:30:49', '2018-04-02 06:30:49', NULL),
(10, 'Logged In', 'Registered', 1, 'http://127.0.0.1:8000/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1:8000/login', 'POST', '2018-04-02 13:25:08', '2018-04-02 13:25:08', NULL),
(11, 'Logged Out', 'Registered', 1, 'http://127.0.0.1:8000/logout', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1:8000/pasien/ubah/3', 'POST', '2018-04-02 15:16:57', '2018-04-02 15:16:57', NULL),
(12, 'Logged In', 'Registered', 1, 'http://127.0.0.1:8000/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; rv:59.0) Gecko/20100101 Firefox/59.0', 'id,en-US;q=0.7,en;q=0.3', 'http://127.0.0.1:8000/login', 'POST', '2018-04-03 05:22:26', '2018-04-03 05:22:26', NULL),
(13, 'Logged In', 'Registered', 1, 'http://127.0.0.1:8000/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1:8000/login', 'POST', '2018-04-06 11:19:13', '2018-04-06 11:19:13', NULL),
(14, 'Logged In', 'Registered', 1, 'http://127.0.0.1:8000/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1:8000/login', 'POST', '2018-04-06 15:01:28', '2018-04-06 15:01:28', NULL),
(15, 'Logged In', 'Registered', 1, 'http://127.0.0.1:8000/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1:8000/login', 'POST', '2018-04-07 12:56:56', '2018-04-07 12:56:56', NULL),
(16, 'Logged In', 'Registered', 1, 'http://127.0.0.1:8000/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1:8000/login', 'POST', '2018-04-10 03:17:04', '2018-04-10 03:17:04', NULL),
(17, 'Logged In', 'Registered', 1, 'http://127.0.0.1:8000/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1:8000/login', 'POST', '2018-04-10 12:56:50', '2018-04-10 12:56:50', NULL),
(18, 'Logged In', 'Registered', 1, 'http://127.0.0.1:8000/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1:8000/login', 'POST', '2018-04-11 11:42:26', '2018-04-11 11:42:26', NULL),
(19, 'Logged In', 'Registered', 1, 'http://127.0.0.1:8000/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1:8000/login', 'POST', '2018-04-12 13:39:51', '2018-04-12 13:39:51', NULL),
(20, 'Logged In', 'Registered', 1, 'http://127.0.0.1:8000/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1:8000/login', 'POST', '2018-04-13 01:05:50', '2018-04-13 01:05:50', NULL),
(21, 'Logged In', 'Registered', 1, 'http://127.0.0.1:8000/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1:8000/login', 'POST', '2018-04-13 13:07:36', '2018-04-13 13:07:36', NULL),
(22, 'Logged In', 'Registered', 1, 'http://127.0.0.1:8000/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1:8000/login', 'POST', '2018-04-14 02:37:58', '2018-04-14 02:37:58', NULL),
(23, 'Logged In', 'Registered', 1, 'http://127.0.0.1:8000/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1:8000/login', 'POST', '2018-04-14 10:57:17', '2018-04-14 10:57:17', NULL),
(24, 'Logged In', 'Registered', 1, 'http://127.0.0.1:8000/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1:8000/login', 'POST', '2018-04-15 06:41:18', '2018-04-15 06:41:18', NULL);

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
-- Struktur dari tabel `pasien`
--

CREATE TABLE `pasien` (
  `id` int(10) UNSIGNED NOT NULL,
  `no_urut` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_pasien` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategoripasien_id` int(11) NOT NULL,
  `golongan_darah` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_kelamin` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `kota_id` int(11) NOT NULL,
  `kec_id` int(11) NOT NULL,
  `kel_id` int(11) NOT NULL,
  `kontak` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pekerjaan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_pernikahan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_kk` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `namaIbuKandung` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `namaAyahKandung` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TanggalLahir` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pasien`
--

INSERT INTO `pasien` (`id`, `no_urut`, `nama_pasien`, `kategoripasien_id`, `golongan_darah`, `jenis_kelamin`, `alamat`, `kota_id`, `kec_id`, `kel_id`, `kontak`, `pekerjaan`, `status_pernikahan`, `no_kk`, `namaIbuKandung`, `namaAyahKandung`, `TanggalLahir`, `created_at`, `updated_at`) VALUES
(1, 'rm001', 'Juan Valerian Delima', 1, 'A', 'Laki-laki', 'Perum GMM Blok F8/27', 2, 2, 2, '(0812) 3626-4027', 'IT Consultant', 'Menikah', '11999288171662', 'Roosye Lidyana', 'Joventius', '1996-06-06', '2018-03-23 13:50:25', '2018-03-23 13:50:25'),
(3, 'RM002', 'Bastian Clearesta', 1, 'A', 'Laki-laki', 'Perum gmm', 1, 1, 6, '(0119) 1918-1818', 'IT Consultan', 'Menikah', '11982882827', 'Roosye', 'Jovent', '2012-10-25', '2018-03-31 01:20:41', '2018-03-31 01:20:41');

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
-- Struktur dari tabel `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `slug`, `description`, `model`, `created_at`, `updated_at`) VALUES
(1, 'Can View Users', 'view.users', 'Can view users', 'Permission', '2018-03-19 15:37:07', '2018-03-19 15:37:07'),
(2, 'Can Create Users', 'create.users', 'Can create new users', 'Permission', '2018-03-19 15:37:07', '2018-03-19 15:37:07'),
(3, 'Can Edit Users', 'edit.users', 'Can edit users', 'Permission', '2018-03-19 15:37:07', '2018-03-19 15:37:07'),
(4, 'Can Delete Users', 'delete.users', 'Can delete users', 'Permission', '2018-03-19 15:37:07', '2018-03-19 15:37:07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `permission_role`
--

CREATE TABLE `permission_role` (
  `id` int(10) UNSIGNED NOT NULL,
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `permission_role`
--

INSERT INTO `permission_role` (`id`, `permission_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2018-03-19 15:37:08', '2018-03-19 15:37:08'),
(2, 2, 1, '2018-03-19 15:37:08', '2018-03-19 15:37:08'),
(3, 3, 1, '2018-03-19 15:37:08', '2018-03-19 15:37:08'),
(4, 4, 1, '2018-03-19 15:37:09', '2018-03-19 15:37:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `permission_user`
--

CREATE TABLE `permission_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `permission_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `img` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user_default.png',
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

--
-- Dumping data untuk tabel `petugas`
--

INSERT INTO `petugas` (`id`, `nama`, `spesialisasi`, `alamat`, `kota`, `no_hp`, `no_telp`, `alamat_email`, `tgl_mulai_praktek`, `img`, `category_id`, `senin1`, `senin2`, `selasa1`, `selasa2`, `rabu1`, `rabu2`, `kamis1`, `kamis2`, `jumat1`, `jumat2`, `sabtu1`, `sabtu2`, `minggu1`, `minggu2`, `created_at`, `updated_at`) VALUES
(3, 'Juan Valerian Delima', 'Penyakit Dalam', 'Perum Graha Mustika Blok F8/27', 'Bekasi', '(0817) 2725-2522', '(0817) 2726-2424', 'juanvaleriand@gmail.com', '2018-04-11', 'user_default.png', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-04-11 12:13:57', '2018-04-11 12:13:57');

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
(1, 'ANAK', '2018-04-06 11:32:14', '2018-04-06 11:32:14'),
(2, 'UMUM', '2018-04-06 11:33:15', '2018-04-10 05:39:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `name`, `slug`, `level`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', 0, '2018-03-19 15:37:07', '2018-03-19 15:37:07'),
(2, 'Staff', 'staff', 1, '2018-03-19 15:37:07', '2018-03-19 15:37:07'),
(3, 'Keuangan', 'keuangan', 2, '2018-03-19 15:37:07', '2018-03-19 15:37:07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role_user`
--

CREATE TABLE `role_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `role_user`
--

INSERT INTO `role_user` (`id`, `role_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2018-03-19 15:37:11', '2018-03-19 15:37:11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `first_name`, `last_name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Administrator', 'admin', 'admin@admin.com', '$2y$10$ztWehRf7ZGbRSlL5nPjKgupW/DPVK.DKts4YMhJ.QjwPleNwe3wL.', 'bKPInZM0bOM1RmYDoWi5XsW7bNIbjKYM27s1dHHe4P8iLmiUuIpQnBHL2QdM', '2018-03-19 15:37:10', '2018-03-19 15:37:10');

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
  `deskriptsi` text,
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
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_slug_unique` (`slug`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permission_role_permission_id_index` (`permission_id`),
  ADD KEY `permission_role_role_id_index` (`role_id`);

--
-- Indexes for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permission_user_permission_id_index` (`permission_id`),
  ADD KEY `permission_user_user_id_index` (`user_id`);

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
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_slug_unique` (`slug`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_user_role_id_index` (`role_id`),
  ADD KEY `role_user_user_id_index` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `alat_medis`
--
ALTER TABLE `alat_medis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kelurahan`
--
ALTER TABLE `kelurahan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `kota`
--
ALTER TABLE `kota`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `laravel_logger_activity`
--
ALTER TABLE `laravel_logger_activity`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `permission_role`
--
ALTER TABLE `permission_role`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `permission_user`
--
ALTER TABLE `permission_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `poli`
--
ALTER TABLE `poli`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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

--
-- Ketidakleluasaan untuk tabel `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `permission_user`
--
ALTER TABLE `permission_user`
  ADD CONSTRAINT `permission_user_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
