-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 20 Mei 2018 pada 10.49
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
-- Struktur dari tabel `akun`
--

CREATE TABLE `akun` (
  `id_akun` int(3) NOT NULL,
  `nama_akun` varchar(25) NOT NULL,
  `tipe_akun` varchar(12) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `akun`
--

INSERT INTO `akun` (`id_akun`, `nama_akun`, `tipe_akun`, `created_at`, `updated_at`) VALUES
(1, 'Kas Harian', 'AKTIVA', '2018-05-20 08:04:04', '2018-05-20 08:04:04'),
(3, 'Modal', 'PASIVA', '2018-05-20 08:04:48', '2018-05-20 08:04:48'),
(4, 'PLN', 'PENGELUARAN', '2018-05-20 08:05:51', '2018-05-20 08:05:51'),
(5, 'Pemeriksaan', 'PEMASUKAN', '2018-05-20 08:36:24', '2018-05-20 08:36:24');

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
(1, 'K001', 'Panasonic LCD', 'TV LCD', 1, '2018-05-20 08:22:43', '2018-05-20 08:22:43');

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
-- Struktur dari tabel `biaya_pendaftaran`
--

CREATE TABLE `biaya_pendaftaran` (
  `id` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `no_pend` varchar(5) NOT NULL,
  `pasien_id` int(3) NOT NULL,
  `jumlah` bigint(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `biaya_pendaftaran`
--

INSERT INTO `biaya_pendaftaran` (`id`, `tgl`, `no_pend`, `pasien_id`, `jumlah`, `created_at`, `updated_at`) VALUES
(1, '2018-05-14', '0001', 1, 30000, '2018-05-14 13:51:07', '2018-05-14 13:51:07'),
(2, '2018-05-15', '0002', 2, 50000, '2018-05-14 13:51:23', '2018-05-14 13:51:23'),
(3, '2018-05-14', '0003', 3, 25000, '2018-05-14 13:51:41', '2018-05-14 13:51:41'),
(4, '2018-05-15', '0004', 4, 200000, '2018-05-15 04:33:58', '2018-05-15 04:33:58');

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

--
-- Dumping data untuk tabel `conf_honor`
--

INSERT INTO `conf_honor` (`id`, `tgl`, `petugas_id`, `honor`, `created_at`, `updated_at`) VALUES
(2, '2018-05-12', 7, 15000, '2018-05-12 07:55:35', '2018-05-12 07:55:35'),
(3, '2018-05-13', 6, 30000, '2018-05-17 16:28:00', '2018-05-17 16:28:00'),
(4, '2018-05-17', 8, 35000, '2018-05-17 16:26:16', '2018-05-17 16:26:16');

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

--
-- Dumping data untuk tabel `day_petugas`
--

INSERT INTO `day_petugas` (`id`, `day_id`, `petugas_id`, `created_at`, `updated_at`) VALUES
(1, 1, 7, NULL, NULL),
(2, 3, 7, NULL, NULL),
(3, 1, 6, NULL, NULL),
(4, 1, 8, NULL, NULL),
(5, 4, 8, NULL, NULL);

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

--
-- Dumping data untuk tabel `donasi_obat`
--

INSERT INTO `donasi_obat` (`id`, `nama_donatur`, `cp`, `hp`, `jns_obt`, `jumlah`, `keterangan`, `created_at`, `updated_at`) VALUES
(2, 'Kimia Farma Updated', 'Juan Valerian Delima', '08127272', 'Cair', 2, 'lorem ipsum dolor sit amet updated', '2018-04-26 10:59:00', '2018-04-26 10:59:00'),
(3, 'Pharmasi Update', 'Cornel', '081236264027', 'Tablet', 2, 'lorem ipsum', '2018-04-27 12:44:42', '2018-04-27 12:44:42');

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
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `donasi_uang`
--

INSERT INTO `donasi_uang` (`id`, `nama_donatur`, `cp`, `hp`, `jml_donasi`, `keterangan`, `created_at`, `updated_at`) VALUES
(5, 'Juan Valerian Delima', 'Bastian Delima', '081236264027', 400000000000000000, 'lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit amet', '2018-04-25 01:21:54', '2018-04-25 01:21:54'),
(6, 'Cindy C', 'Cornel', '081818182', 3500000000, 'lorem ipsum dolor sit amet', '2018-04-25 01:22:25', '2018-04-25 01:22:25');

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
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `honor`
--

INSERT INTO `honor` (`id`, `tgl`, `category_id`, `petugas_id`, `confhonor_id`, `jam`, `total`, `created_at`, `updated_at`) VALUES
(1, '2018-05-17', 1, 6, 3, 2, 40000, '2018-05-17 16:27:06', '2018-05-17 16:27:06');

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

--
-- Dumping data untuk tabel `jenis_obat_detail`
--

INSERT INTO `jenis_obat_detail` (`id`, `kd_jenis`, `jenis_obat_id`, `nama_obat`, `satuan`, `deskripsi`, `harga`, `stok`, `created_at`, `updated_at`) VALUES
(1, 'JNS002', 2, 'Cair 1', 'mg', 'lorem ipsum dolor sit amet', 2000000, 2, '2018-04-26 10:52:09', '2018-04-26 10:52:09'),
(2, 'JNS003', 3, 'Tablet 1', 'mg', 'lorem ipsum dolor sit amet', 1000000, 3, '2018-04-26 10:52:09', '2018-04-26 10:52:09'),
(4, 'JNS003', 3, 'Panadol Extra', 'mg', 'lorem ipsum dolor sit amet', 21000, 5, '2018-05-12 09:20:47', '2018-05-12 09:20:47');

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
(8, 'Test', '2018-03-21 14:52:43', '2018-03-21 14:52:43'),
(9, 'Kategori 1', '2018-04-27 12:41:25', '2018-04-27 12:41:25');

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
(5, 'Glodok', 7, '2018-03-31 01:22:35', '2018-03-31 01:22:35'),
(6, 'Batu gunung', 8, '2018-05-10 01:15:48', '2018-05-10 01:15:48');

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
(7, 'Bojong Gede', 5, '2018-03-31 01:24:12', '2018-03-31 01:24:12'),
(8, 'Setu', 2, '2018-04-16 09:45:26', '2018-04-16 09:45:26'),
(9, 'Cimahi', 6, '2018-05-10 01:16:22', '2018-05-10 01:16:22');

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
(7, 'Jakarta', '2018-03-22 17:25:57', '2018-03-22 17:25:57'),
(8, 'Bandung', '2018-05-10 01:15:30', '2018-05-10 01:15:30');

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
(24, 'Logged In', 'Registered', 1, 'http://127.0.0.1:8000/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1:8000/login', 'POST', '2018-04-15 06:41:18', '2018-04-15 06:41:18', NULL),
(25, 'Logged In', 'Registered', 1, 'http://127.0.0.1:8000/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1:8000/login', 'POST', '2018-04-16 00:48:35', '2018-04-16 00:48:35', NULL),
(26, 'Logged In', 'Registered', 1, 'http://127.0.0.1:8000/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1:8000/login', 'POST', '2018-04-16 05:28:54', '2018-04-16 05:28:54', NULL),
(27, 'Logged In', 'Registered', 1, 'http://127.0.0.1:8000/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1:8000/login', 'POST', '2018-04-16 09:36:40', '2018-04-16 09:36:40', NULL),
(28, 'Logged Out', 'Registered', 1, 'http://127.0.0.1:8000/logout', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1:8000/kelurahan', 'POST', '2018-04-16 09:42:57', '2018-04-16 09:42:57', NULL),
(29, 'Logged In', 'Registered', 1, 'http://127.0.0.1:8000/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1:8000/login', 'POST', '2018-04-16 09:44:01', '2018-04-16 09:44:01', NULL),
(30, 'Logged Out', 'Registered', 1, 'http://127.0.0.1:8000/logout', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1:8000/users/create', 'POST', '2018-04-16 09:51:51', '2018-04-16 09:51:51', NULL),
(31, 'Logged In', 'Registered', 1, 'http://127.0.0.1:8000/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1:8000/login', 'POST', '2018-04-16 09:52:44', '2018-04-16 09:52:44', NULL),
(32, 'Logged Out', 'Registered', 1, 'http://127.0.0.1:8000/logout', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1:8000/', 'POST', '2018-04-16 09:53:49', '2018-04-16 09:53:49', NULL),
(33, 'Logged In', 'Registered', 1, 'http://127.0.0.1:8000/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1:8000/login', 'POST', '2018-04-16 10:09:35', '2018-04-16 10:09:35', NULL),
(34, 'Logged In', 'Registered', 1, 'http://127.0.0.1:8000/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1:8000/login', 'POST', '2018-04-16 12:58:07', '2018-04-16 12:58:07', NULL),
(35, 'Logged In', 'Registered', 1, 'http://127.0.0.1:8000/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1:8000/login', 'POST', '2018-04-16 14:55:54', '2018-04-16 14:55:54', NULL),
(36, 'Logged In', 'Registered', 1, 'http://127.0.0.1:8000/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1:8000/login', 'POST', '2018-04-17 04:26:12', '2018-04-17 04:26:12', NULL),
(37, 'Logged In', 'Registered', 1, 'http://127.0.0.1:8000/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1:8000/login', 'POST', '2018-04-18 00:56:47', '2018-04-18 00:56:47', NULL),
(38, 'Logged In', 'Registered', 1, 'http://127.0.0.1:8000/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1:8000/login', 'POST', '2018-04-18 11:46:05', '2018-04-18 11:46:05', NULL),
(39, 'Logged In', 'Registered', 1, 'http://127.0.0.1:8000/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1:8000/login', 'POST', '2018-04-19 12:08:05', '2018-04-19 12:08:05', NULL),
(40, 'Logged In', 'Registered', 1, 'http://127.0.0.1:8000/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1:8000/login', 'POST', '2018-04-19 14:56:56', '2018-04-19 14:56:56', NULL),
(41, 'Logged In', 'Registered', 1, 'http://127.0.0.1:8000/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1:8000/login', 'POST', '2018-04-20 01:07:44', '2018-04-20 01:07:44', NULL),
(42, 'Logged In', 'Registered', 1, 'http://127.0.0.1:8000/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1:8000/login', 'POST', '2018-04-20 10:56:20', '2018-04-20 10:56:20', NULL),
(43, 'Logged In', 'Registered', 1, 'http://127.0.0.1:8000/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; rv:59.0) Gecko/20100101 Firefox/59.0', 'id,en-US;q=0.7,en;q=0.3', 'http://127.0.0.1:8000/login', 'POST', '2018-04-20 13:59:09', '2018-04-20 13:59:09', NULL),
(44, 'Logged In', 'Registered', 1, 'http://127.0.0.1:8000/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1:8000/login', 'POST', '2018-04-21 00:51:34', '2018-04-21 00:51:34', NULL),
(45, 'Logged In', 'Registered', 1, 'http://127.0.0.1:8000/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1:8000/login', 'POST', '2018-04-21 13:44:35', '2018-04-21 13:44:35', NULL),
(46, 'Logged In', 'Registered', 1, 'http://127.0.0.1:8000/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1:8000/login', 'POST', '2018-04-21 16:49:44', '2018-04-21 16:49:44', NULL),
(47, 'Logged In', 'Registered', 1, 'http://127.0.0.1:8000/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1:8000/login', 'POST', '2018-04-22 00:46:11', '2018-04-22 00:46:11', NULL),
(48, 'Logged In', 'Registered', 1, 'http://127.0.0.1:8000/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1:8000/login', 'POST', '2018-04-22 01:03:57', '2018-04-22 01:03:57', NULL),
(49, 'Logged In', 'Registered', 1, 'http://127.0.0.1:8000/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1:8000/login', 'POST', '2018-04-22 06:34:17', '2018-04-22 06:34:17', NULL),
(50, 'Logged In', 'Registered', 1, 'http://127.0.0.1:8000/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; rv:59.0) Gecko/20100101 Firefox/59.0', 'id,en-US;q=0.7,en;q=0.3', 'http://127.0.0.1:8000/login', 'POST', '2018-04-22 22:17:05', '2018-04-22 22:17:05', NULL),
(51, 'Logged Out', 'Registered', 1, 'http://127.0.0.1:8000/logout', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; rv:59.0) Gecko/20100101 Firefox/59.0', 'id,en-US;q=0.7,en;q=0.3', 'http://127.0.0.1:8000/pengaturan/user/data', 'POST', '2018-04-22 23:52:39', '2018-04-22 23:52:39', NULL),
(52, 'Logged In', 'Registered', 2, 'http://127.0.0.1:8000/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; rv:59.0) Gecko/20100101 Firefox/59.0', 'id,en-US;q=0.7,en;q=0.3', 'http://127.0.0.1:8000/login', 'POST', '2018-04-22 23:52:54', '2018-04-22 23:52:54', NULL),
(53, 'Logged Out', 'Registered', 2, 'http://127.0.0.1:8000/logout', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; rv:59.0) Gecko/20100101 Firefox/59.0', 'id,en-US;q=0.7,en;q=0.3', 'http://127.0.0.1:8000/masterdata/daftarobat/create', 'POST', '2018-04-22 23:54:21', '2018-04-22 23:54:21', NULL),
(54, 'Logged In', 'Registered', 1, 'http://127.0.0.1:8000/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; rv:59.0) Gecko/20100101 Firefox/59.0', 'id,en-US;q=0.7,en;q=0.3', 'http://127.0.0.1:8000/login', 'POST', '2018-04-22 23:54:33', '2018-04-22 23:54:33', NULL),
(55, 'Logged Out', 'Registered', 1, 'http://127.0.0.1:8000/logout', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; rv:59.0) Gecko/20100101 Firefox/59.0', 'id,en-US;q=0.7,en;q=0.3', 'http://127.0.0.1:8000/pengaturan/user/data/edit/2', 'POST', '2018-04-23 00:09:46', '2018-04-23 00:09:46', NULL),
(56, 'Failed Login Attempt', 'Guest', NULL, 'http://127.0.0.1:8000/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; rv:59.0) Gecko/20100101 Firefox/59.0', 'id,en-US;q=0.7,en;q=0.3', 'http://127.0.0.1:8000/login', 'POST', '2018-04-23 00:10:00', '2018-04-23 00:10:00', NULL),
(57, 'Failed Login Attempt', 'Guest', NULL, 'http://127.0.0.1:8000/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; rv:59.0) Gecko/20100101 Firefox/59.0', 'id,en-US;q=0.7,en;q=0.3', 'http://127.0.0.1:8000/login', 'POST', '2018-04-23 00:10:12', '2018-04-23 00:10:12', NULL),
(58, 'Failed Login Attempt', 'Guest', NULL, 'http://127.0.0.1:8000/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; rv:59.0) Gecko/20100101 Firefox/59.0', 'id,en-US;q=0.7,en;q=0.3', 'http://127.0.0.1:8000/login', 'POST', '2018-04-23 00:10:26', '2018-04-23 00:10:26', NULL),
(59, 'Failed Login Attempt', 'Guest', NULL, 'http://127.0.0.1:8000/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; rv:59.0) Gecko/20100101 Firefox/59.0', 'id,en-US;q=0.7,en;q=0.3', 'http://127.0.0.1:8000/login', 'POST', '2018-04-23 00:10:36', '2018-04-23 00:10:36', NULL),
(60, 'Failed Login Attempt', 'Guest', NULL, 'http://127.0.0.1:8000/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; rv:59.0) Gecko/20100101 Firefox/59.0', 'id,en-US;q=0.7,en;q=0.3', 'http://127.0.0.1:8000/login', 'POST', '2018-04-23 00:11:50', '2018-04-23 00:11:50', NULL),
(61, 'Logged In', 'Registered', 1, 'http://127.0.0.1:8000/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; rv:59.0) Gecko/20100101 Firefox/59.0', 'id,en-US;q=0.7,en;q=0.3', 'http://127.0.0.1:8000/login', 'POST', '2018-04-23 00:23:39', '2018-04-23 00:23:39', NULL),
(62, 'Logged Out', 'Registered', 1, 'http://127.0.0.1:8000/logout', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; rv:59.0) Gecko/20100101 Firefox/59.0', 'id,en-US;q=0.7,en;q=0.3', 'http://127.0.0.1:8000/pengaturan/user/data', 'POST', '2018-04-23 00:26:50', '2018-04-23 00:26:50', NULL),
(63, 'Failed Login Attempt', 'Guest', NULL, 'http://127.0.0.1:8000/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; rv:59.0) Gecko/20100101 Firefox/59.0', 'id,en-US;q=0.7,en;q=0.3', 'http://127.0.0.1:8000/login', 'POST', '2018-04-23 00:27:01', '2018-04-23 00:27:01', NULL),
(64, 'Logged In', 'Registered', 1, 'http://127.0.0.1:8000/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; rv:59.0) Gecko/20100101 Firefox/59.0', 'id,en-US;q=0.7,en;q=0.3', 'http://127.0.0.1:8000/login', 'POST', '2018-04-23 00:34:42', '2018-04-23 00:34:42', NULL),
(65, 'Logged Out', 'Registered', 1, 'http://127.0.0.1:8000/logout', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; rv:59.0) Gecko/20100101 Firefox/59.0', 'id,en-US;q=0.7,en;q=0.3', 'http://127.0.0.1:8000/pengaturan/user/data', 'POST', '2018-04-23 00:42:01', '2018-04-23 00:42:01', NULL),
(66, 'Logged In', 'Registered', 2, 'http://127.0.0.1:8000/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; rv:59.0) Gecko/20100101 Firefox/59.0', 'id,en-US;q=0.7,en;q=0.3', 'http://127.0.0.1:8000/login', 'POST', '2018-04-23 00:43:18', '2018-04-23 00:43:18', NULL),
(67, 'Logged Out', 'Registered', 2, 'http://127.0.0.1:8000/logout', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; rv:59.0) Gecko/20100101 Firefox/59.0', 'id,en-US;q=0.7,en;q=0.3', 'http://127.0.0.1:8000/', 'POST', '2018-04-23 00:44:28', '2018-04-23 00:44:28', NULL),
(68, 'Logged In', 'Registered', 2, 'http://127.0.0.1:8000/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; rv:59.0) Gecko/20100101 Firefox/59.0', 'id,en-US;q=0.7,en;q=0.3', 'http://127.0.0.1:8000/login', 'POST', '2018-04-23 00:45:09', '2018-04-23 00:45:09', NULL),
(69, 'Logged Out', 'Registered', 2, 'http://127.0.0.1:8000/logout', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; rv:59.0) Gecko/20100101 Firefox/59.0', 'id,en-US;q=0.7,en;q=0.3', 'http://127.0.0.1:8000/', 'POST', '2018-04-23 00:51:00', '2018-04-23 00:51:00', NULL),
(70, 'Logged In', 'Registered', 1, 'http://127.0.0.1:8000/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; rv:59.0) Gecko/20100101 Firefox/59.0', 'id,en-US;q=0.7,en;q=0.3', 'http://127.0.0.1:8000/login', 'POST', '2018-04-23 00:51:13', '2018-04-23 00:51:13', NULL),
(71, 'Logged Out', 'Registered', 1, 'http://127.0.0.1:8000/logout', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; rv:59.0) Gecko/20100101 Firefox/59.0', 'id,en-US;q=0.7,en;q=0.3', 'http://127.0.0.1:8000/pengaturan/user/data', 'POST', '2018-04-23 00:59:51', '2018-04-23 00:59:51', NULL),
(72, 'Logged In', 'Registered', 2, 'http://127.0.0.1:8000/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; rv:59.0) Gecko/20100101 Firefox/59.0', 'id,en-US;q=0.7,en;q=0.3', 'http://127.0.0.1:8000/login', 'POST', '2018-04-23 01:00:02', '2018-04-23 01:00:02', NULL),
(73, 'Logged Out', 'Registered', 2, 'http://127.0.0.1:8000/logout', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; rv:59.0) Gecko/20100101 Firefox/59.0', 'id,en-US;q=0.7,en;q=0.3', 'http://127.0.0.1:8000/pengaturan/user/data/create', 'POST', '2018-04-23 01:42:24', '2018-04-23 01:42:24', NULL),
(74, 'Logged In', 'Registered', 1, 'http://127.0.0.1:8000/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; rv:59.0) Gecko/20100101 Firefox/59.0', 'id,en-US;q=0.7,en;q=0.3', 'http://127.0.0.1:8000/login', 'POST', '2018-04-23 01:43:21', '2018-04-23 01:43:21', NULL),
(75, 'Logged In', 'Registered', 1, 'http://127.0.0.1:8000/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1:8000/login', 'POST', '2018-04-23 14:18:15', '2018-04-23 14:18:15', NULL),
(76, 'Logged In', 'Registered', 1, 'http://127.0.0.1:8000/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1:8000/login', 'POST', '2018-04-24 13:38:30', '2018-04-24 13:38:30', NULL),
(77, 'Logged In', 'Registered', 1, 'http://127.0.0.1:8000/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1:8000/login', 'POST', '2018-04-25 00:14:45', '2018-04-25 00:14:45', NULL),
(78, 'Logged In', 'Registered', 1, 'http://127.0.0.1:8000/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1:8000/login', 'POST', '2018-04-25 10:54:23', '2018-04-25 10:54:23', NULL),
(79, 'Logged In', 'Registered', 1, 'http://127.0.0.1:8000/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1:8000/login', 'POST', '2018-04-25 13:46:11', '2018-04-25 13:46:11', NULL),
(80, 'Logged In', 'Registered', 1, 'http://127.0.0.1:8000/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1:8000/login', 'POST', '2018-04-26 10:48:42', '2018-04-26 10:48:42', NULL),
(81, 'Logged In', 'Registered', 1, 'http://127.0.0.1:8000/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1:8000/login', 'POST', '2018-04-27 00:46:17', '2018-04-27 00:46:17', NULL),
(82, 'Logged In', 'Registered', 1, 'http://127.0.0.1:8000/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1:8000/login', 'POST', '2018-04-27 12:24:30', '2018-04-27 12:24:30', NULL),
(83, 'Logged In', 'Registered', 1, 'http://127.0.0.1:8000/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1:8000/login', 'POST', '2018-04-28 00:50:03', '2018-04-28 00:50:03', NULL),
(84, 'Logged In', 'Registered', 1, 'http://127.0.0.1:8000/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1:8000/login', 'POST', '2018-04-28 13:59:54', '2018-04-28 13:59:54', NULL),
(85, 'Logged In', 'Registered', 1, 'http://127.0.0.1:8000/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1:8000/login', 'POST', '2018-04-29 03:44:40', '2018-04-29 03:44:40', NULL),
(86, 'Logged In', 'Registered', 1, 'http://127.0.0.1:8000/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1:8000/login', 'POST', '2018-04-30 14:11:52', '2018-04-30 14:11:52', NULL),
(87, 'Logged In', 'Registered', 1, 'http://127.0.0.1:8000/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1:8000/login', 'POST', '2018-05-01 03:27:04', '2018-05-01 03:27:04', NULL),
(88, 'Logged In', 'Registered', 1, 'http://127.0.0.1:8000/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1:8000/login', 'POST', '2018-05-01 07:11:35', '2018-05-01 07:11:35', NULL),
(89, 'Logged Out', 'Registered', 1, 'http://127.0.0.1:8000/logout', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1:8000/pengaturan/pengguna/edit/2', 'POST', '2018-05-01 09:43:36', '2018-05-01 09:43:36', NULL),
(90, 'Logged In', 'Registered', 2, 'http://127.0.0.1:8000/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1:8000/login', 'POST', '2018-05-01 09:43:50', '2018-05-01 09:43:50', NULL),
(91, 'Logged Out', 'Registered', 2, 'http://127.0.0.1:8000/logout', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1:8000/masterdata/daftarobat', 'POST', '2018-05-01 09:47:48', '2018-05-01 09:47:48', NULL),
(92, 'Logged In', 'Registered', 1, 'http://127.0.0.1:8000/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1:8000/login', 'POST', '2018-05-01 09:48:00', '2018-05-01 09:48:00', NULL),
(93, 'Logged In', 'Registered', 1, 'http://127.0.0.1:8000/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1:8000/login', 'POST', '2018-05-02 00:32:30', '2018-05-02 00:32:30', NULL),
(94, 'Logged In', 'Registered', 1, 'http://127.0.0.1:8000/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.139 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1:8000/login', 'POST', '2018-05-03 13:16:39', '2018-05-03 13:16:39', NULL),
(95, 'Logged In', 'Registered', 1, 'http://127.0.0.1:8000/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.139 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1:8000/login', 'POST', '2018-05-04 00:09:05', '2018-05-04 00:09:05', NULL),
(96, 'Logged In', 'Registered', 1, 'http://127.0.0.1:8000/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.139 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1:8000/login', 'POST', '2018-05-04 11:48:58', '2018-05-04 11:48:58', NULL),
(97, 'Logged In', 'Registered', 1, 'http://127.0.0.1:8000/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.139 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1:8000/login', 'POST', '2018-05-05 13:08:28', '2018-05-05 13:08:28', NULL),
(98, 'Logged In', 'Registered', 1, 'http://127.0.0.1:8000/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.139 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1:8000/login', 'POST', '2018-05-06 02:40:37', '2018-05-06 02:40:37', NULL),
(99, 'Logged In', 'Registered', 1, 'http://127.0.0.1:8000/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.139 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1:8000/login', 'POST', '2018-05-06 07:37:25', '2018-05-06 07:37:25', NULL),
(100, 'Logged In', 'Registered', 1, 'http://127.0.0.1:8000/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.139 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1:8000/login', 'POST', '2018-05-07 05:12:27', '2018-05-07 05:12:27', NULL),
(101, 'Logged Out', 'Registered', 1, 'http://127.0.0.1:8000/logout', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.139 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1:8000/pengaturan/pengguna', 'POST', '2018-05-07 05:20:19', '2018-05-07 05:20:19', NULL),
(102, 'Logged In', 'Registered', 2, 'http://127.0.0.1:8000/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.139 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1:8000/login', 'POST', '2018-05-07 05:20:34', '2018-05-07 05:20:34', NULL),
(103, 'Logged Out', 'Registered', 2, 'http://127.0.0.1:8000/logout', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.139 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1:8000/pengaturan/honor', 'POST', '2018-05-07 05:21:36', '2018-05-07 05:21:36', NULL),
(104, 'Logged In', 'Registered', 1, 'http://127.0.0.1:8000/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.139 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1:8000/login', 'POST', '2018-05-07 05:21:50', '2018-05-07 05:21:50', NULL),
(105, 'Logged Out', 'Registered', 1, 'http://127.0.0.1:8000/logout', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.139 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1:8000/pengaturan/pengguna', 'POST', '2018-05-07 05:23:17', '2018-05-07 05:23:17', NULL),
(106, 'Logged In', 'Registered', 3, 'http://127.0.0.1:8000/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.139 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1:8000/login', 'POST', '2018-05-07 05:23:30', '2018-05-07 05:23:30', NULL),
(107, 'Logged In', 'Registered', 1, 'http://127.0.0.1:8000/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; rv:59.0) Gecko/20100101 Firefox/59.0', 'id,en-US;q=0.7,en;q=0.3', 'http://127.0.0.1:8000/login', 'POST', '2018-05-09 02:53:41', '2018-05-09 02:53:41', NULL),
(108, 'Logged In', 'Registered', 1, 'http://127.0.0.1:8000/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.139 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1:8000/login', 'POST', '2018-05-09 04:28:18', '2018-05-09 04:28:18', NULL),
(109, 'Logged In', 'Registered', 1, 'http://127.0.0.1:8000/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.139 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1:8000/login', 'POST', '2018-05-09 12:28:39', '2018-05-09 12:28:39', NULL),
(110, 'Logged In', 'Registered', 1, 'http://127.0.0.1:8000/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.139 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1:8000/login', 'POST', '2018-05-10 01:00:02', '2018-05-10 01:00:02', NULL),
(111, 'Logged In', 'Registered', 1, 'http://127.0.0.1:8000/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.139 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1:8000/login', 'POST', '2018-05-11 15:30:14', '2018-05-11 15:30:14', NULL),
(112, 'Logged In', 'Registered', 1, 'http://127.0.0.1:8000/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.139 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1:8000/login', 'POST', '2018-05-12 01:51:23', '2018-05-12 01:51:23', NULL),
(113, 'Logged Out', 'Registered', 1, 'http://127.0.0.1:8000/logout', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.139 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1:8000/masterdata/petugasmedis/datapetugasmedis', 'POST', '2018-05-12 04:12:57', '2018-05-12 04:12:57', NULL),
(114, 'Logged In', 'Registered', 1, 'http://127.0.0.1:8000/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.139 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1:8000/login', 'POST', '2018-05-12 07:13:45', '2018-05-12 07:13:45', NULL),
(115, 'Logged Out', 'Registered', 1, 'http://127.0.0.1:8000/logout', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.139 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1:8000/pengaturan/pengguna', 'POST', '2018-05-12 07:22:40', '2018-05-12 07:22:40', NULL),
(116, 'Logged In', 'Registered', 1, 'http://127.0.0.1:8000/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.139 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1:8000/login', 'POST', '2018-05-12 07:22:52', '2018-05-12 07:22:52', NULL),
(117, 'Logged Out', 'Registered', 1, 'http://127.0.0.1:8000/logout', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.139 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1:8000/pengaturan/pengguna', 'POST', '2018-05-12 07:47:54', '2018-05-12 07:47:54', NULL),
(118, 'Logged In', 'Registered', 2, 'http://127.0.0.1:8000/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.139 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1:8000/login', 'POST', '2018-05-12 07:48:06', '2018-05-12 07:48:06', NULL),
(119, 'Logged Out', 'Registered', 2, 'http://127.0.0.1:8000/logout', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.139 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1:8000/pengaturan/honor/create', 'POST', '2018-05-12 07:48:33', '2018-05-12 07:48:33', NULL),
(120, 'Logged In', 'Registered', 1, 'http://127.0.0.1:8000/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.139 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1:8000/login', 'POST', '2018-05-12 07:48:44', '2018-05-12 07:48:44', NULL),
(121, 'Logged Out', 'Registered', 1, 'http://127.0.0.1:8000/logout', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.139 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1:8000/', 'POST', '2018-05-12 08:32:34', '2018-05-12 08:32:34', NULL),
(122, 'Logged In', 'Registered', 2, 'http://127.0.0.1:8000/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.139 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1:8000/login', 'POST', '2018-05-12 08:32:55', '2018-05-12 08:32:55', NULL),
(123, 'Logged Out', 'Registered', 2, 'http://127.0.0.1:8000/logout', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.139 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1:8000/', 'POST', '2018-05-12 08:34:33', '2018-05-12 08:34:33', NULL),
(124, 'Logged In', 'Registered', 1, 'http://127.0.0.1:8000/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.139 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1:8000/login', 'POST', '2018-05-12 08:34:43', '2018-05-12 08:34:43', NULL),
(125, 'Logged Out', 'Registered', 1, 'http://127.0.0.1:8000/logout', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.139 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1:8000/', 'POST', '2018-05-12 09:55:05', '2018-05-12 09:55:05', NULL),
(126, 'Logged In', 'Registered', 2, 'http://127.0.0.1:8000/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.139 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1:8000/login', 'POST', '2018-05-12 09:55:40', '2018-05-12 09:55:40', NULL),
(127, 'Logged Out', 'Registered', 2, 'http://127.0.0.1:8000/logout', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.139 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1:8000/', 'POST', '2018-05-12 10:04:17', '2018-05-12 10:04:17', NULL),
(128, 'Logged In', 'Registered', 1, 'http://127.0.0.1:8000/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.139 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1:8000/login', 'POST', '2018-05-13 00:05:01', '2018-05-13 00:05:01', NULL),
(129, 'Logged Out', 'Registered', 1, 'http://127.0.0.1:8000/logout', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.139 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1:8000/', 'POST', '2018-05-13 00:37:38', '2018-05-13 00:37:38', NULL),
(130, 'Logged In', 'Registered', 2, 'http://127.0.0.1:8000/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.139 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1:8000/login', 'POST', '2018-05-13 00:37:53', '2018-05-13 00:37:53', NULL),
(131, 'Logged Out', 'Registered', 2, 'http://127.0.0.1:8000/logout', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.139 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1:8000/pengaturan/pengguna/edit/2', 'POST', '2018-05-13 00:57:00', '2018-05-13 00:57:00', NULL),
(132, 'Logged In', 'Registered', 2, 'http://127.0.0.1:8000/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.139 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1:8000/login', 'POST', '2018-05-13 00:57:12', '2018-05-13 00:57:12', NULL),
(133, 'Logged Out', 'Registered', 2, 'http://127.0.0.1:8000/logout', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.139 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1:8000/', 'POST', '2018-05-13 00:57:27', '2018-05-13 00:57:27', NULL),
(134, 'Logged In', 'Registered', 1, 'http://127.0.0.1:8000/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.139 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1:8000/login', 'POST', '2018-05-13 00:57:47', '2018-05-13 00:57:47', NULL),
(135, 'Logged Out', 'Registered', 1, 'http://127.0.0.1:8000/logout', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.139 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1:8000/pengaturan/pengguna', 'POST', '2018-05-13 01:06:56', '2018-05-13 01:06:56', NULL),
(136, 'Logged In', 'Registered', 2, 'http://127.0.0.1:8000/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.139 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1:8000/login', 'POST', '2018-05-13 01:07:15', '2018-05-13 01:07:15', NULL),
(137, 'Logged Out', 'Registered', 2, 'http://127.0.0.1:8000/logout', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.139 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1:8000/pengaturan/pengguna/edit/2', 'POST', '2018-05-13 01:20:04', '2018-05-13 01:20:04', NULL),
(138, 'Logged In', 'Registered', 1, 'http://127.0.0.1:8000/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.139 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1:8000/login', 'POST', '2018-05-13 01:20:18', '2018-05-13 01:20:18', NULL),
(139, 'Logged Out', 'Registered', 1, 'http://127.0.0.1:8000/logout', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.139 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1:8000/pengaturan/pengguna', 'POST', '2018-05-13 01:25:09', '2018-05-13 01:25:09', NULL),
(140, 'Logged In', 'Registered', 3, 'http://127.0.0.1:8000/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.139 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1:8000/login', 'POST', '2018-05-13 01:25:20', '2018-05-13 01:25:20', NULL),
(141, 'Logged Out', 'Registered', 3, 'http://127.0.0.1:8000/logout', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.139 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1:8000/pengaturan/pengguna', 'POST', '2018-05-13 01:28:19', '2018-05-13 01:28:19', NULL),
(142, 'Logged In', 'Registered', 1, 'http://127.0.0.1:8000/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.139 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1:8000/login', 'POST', '2018-05-13 01:29:00', '2018-05-13 01:29:00', NULL),
(143, 'Logged Out', 'Registered', 1, 'http://127.0.0.1:8000/logout', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.139 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1:8000/pengaturan/pengguna/edit/2', 'POST', '2018-05-13 01:29:28', '2018-05-13 01:29:28', NULL),
(144, 'Logged In', 'Registered', 2, 'http://127.0.0.1:8000/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.139 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1:8000/login', 'POST', '2018-05-13 01:29:39', '2018-05-13 01:29:39', NULL),
(145, 'Logged Out', 'Registered', 2, 'http://127.0.0.1:8000/logout', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.139 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1:8000/pengaturan/pengguna/edit/2', 'POST', '2018-05-13 01:32:40', '2018-05-13 01:32:40', NULL),
(146, 'Logged In', 'Registered', 3, 'http://127.0.0.1:8000/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.139 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1:8000/login', 'POST', '2018-05-13 01:32:56', '2018-05-13 01:32:56', NULL),
(147, 'Logged Out', 'Registered', 3, 'http://127.0.0.1:8000/logout', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.139 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1:8000/pengaturan/pengguna/create', 'POST', '2018-05-13 02:29:13', '2018-05-13 02:29:13', NULL),
(148, 'Logged In', 'Registered', 1, 'http://127.0.0.1:8000/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.139 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1:8000/login', 'POST', '2018-05-13 02:29:34', '2018-05-13 02:29:34', NULL),
(149, 'Logged Out', 'Registered', 1, 'http://127.0.0.1:8000/logout', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.139 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1:8000/', 'POST', '2018-05-13 02:34:39', '2018-05-13 02:34:39', NULL),
(150, 'Logged In', 'Registered', 5, 'http://127.0.0.1:8000/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.139 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1:8000/login', 'POST', '2018-05-13 02:34:56', '2018-05-13 02:34:56', NULL),
(151, 'Logged Out', 'Registered', 5, 'http://127.0.0.1:8000/logout', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.139 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1:8000/pengaturan/pengguna/edit/5', 'POST', '2018-05-13 02:35:30', '2018-05-13 02:35:30', NULL),
(152, 'Logged In', 'Registered', 1, 'http://127.0.0.1:8000/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.139 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1:8000/login', 'POST', '2018-05-13 09:47:34', '2018-05-13 09:47:34', NULL),
(153, 'Logged In', 'Registered', 1, 'http://127.0.0.1:8000/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.139 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1:8000/login', 'POST', '2018-05-14 12:23:00', '2018-05-14 12:23:00', NULL),
(154, 'Logged In', 'Registered', 1, 'http://127.0.0.1:8000/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.139 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1:8000/login', 'POST', '2018-05-15 03:43:44', '2018-05-15 03:43:44', NULL),
(155, 'Logged In', 'Registered', 1, 'http://127.0.0.1:8000/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.139 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1:8000/login', 'POST', '2018-05-15 15:55:33', '2018-05-15 15:55:33', NULL),
(156, 'Logged In', 'Registered', 1, 'http://127.0.0.1:8000/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.139 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1:8000/login', 'POST', '2018-05-15 16:38:07', '2018-05-15 16:38:07', NULL),
(157, 'Logged In', 'Registered', 1, 'http://127.0.0.1:8000/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.139 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1:8000/login', 'POST', '2018-05-16 03:10:11', '2018-05-16 03:10:11', NULL),
(158, 'Logged Out', 'Registered', 1, 'http://127.0.0.1:8000/logout', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.139 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1:8000/', 'POST', '2018-05-16 03:19:07', '2018-05-16 03:19:07', NULL),
(159, 'Logged In', 'Registered', 1, 'http://127.0.0.1:8000/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.139 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1:8000/login', 'POST', '2018-05-16 03:19:26', '2018-05-16 03:19:26', NULL),
(160, 'Logged In', 'Registered', 1, 'http://127.0.0.1:8000/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.139 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1:8000/login', 'POST', '2018-05-17 14:42:29', '2018-05-17 14:42:29', NULL),
(161, 'Logged Out', 'Registered', 1, 'http://127.0.0.1:8000/logout', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.139 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1:8000/pengaturan/pengguna', 'POST', '2018-05-17 16:31:07', '2018-05-17 16:31:07', NULL),
(162, 'Logged In', 'Registered', 4, 'http://127.0.0.1:8000/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.139 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1:8000/login', 'POST', '2018-05-17 16:31:20', '2018-05-17 16:31:20', NULL),
(163, 'Logged In', 'Registered', 1, 'http://127.0.0.1:8000/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1:8000/login', 'POST', '2018-05-18 09:53:14', '2018-05-18 09:53:14', NULL),
(164, 'Logged In', 'Registered', 1, 'http://127.0.0.1:8000/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1:8000/login', 'POST', '2018-05-19 01:59:27', '2018-05-19 01:59:27', NULL),
(165, 'Logged In', 'Registered', 1, 'http://127.0.0.1:8000/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1:8000/login', 'POST', '2018-05-19 06:27:48', '2018-05-19 06:27:48', NULL),
(166, 'Logged In', 'Registered', 1, 'http://127.0.0.1:8000/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1:8000/login', 'POST', '2018-05-19 13:45:08', '2018-05-19 13:45:08', NULL),
(167, 'Logged In', 'Registered', 1, 'http://127.0.0.1:8000/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1:8000/login', 'POST', '2018-05-20 07:27:08', '2018-05-20 07:27:08', NULL);

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
-- Struktur dari tabel `operasional`
--

CREATE TABLE `operasional` (
  `id` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `keterangan` text,
  `jumlah` bigint(20) NOT NULL,
  `total` bigint(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `operasional`
--

INSERT INTO `operasional` (`id`, `tgl`, `keterangan`, `jumlah`, `total`, `created_at`, `updated_at`) VALUES
(27, '2018-05-01', 'lorem ipsum dolor sit amet', 100000, 680000, '2018-05-04 12:17:07', '2018-05-04 12:17:07'),
(28, '2018-05-01', 'ini keterangan', 450000, 680000, '2018-05-04 12:17:07', '2018-05-04 12:17:07'),
(29, '2018-05-01', 'lorem ipsum dolor sit amet', 130000, 680000, '2018-05-04 12:17:07', '2018-05-04 12:17:07'),
(30, '2018-04-30', 'lorem ipsum dolor sit amet', 20000, 60000, '2018-05-17 15:00:18', '2018-05-17 15:00:18'),
(31, '2018-04-30', NULL, 40000, 60000, '2018-05-17 15:00:18', '2018-05-17 15:00:18');

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

INSERT INTO `pasien` (`id`, `no_rm`, `nama_pasien`, `kategoripasien_id`, `golongan_darah`, `jenis_kelamin`, `alamat`, `kota_id`, `kec_id`, `kel_id`, `kontak`, `pekerjaan`, `status_pernikahan`, `no_kk`, `namaIbuKandung`, `namaAyahKandung`, `TanggalLahir`, `created_at`, `updated_at`) VALUES
(1, '0001', 'Cindy Cornelia Delima', 1, 'B', 'Perempuan', 'perumahan graha mustika media blok f8/27', 2, 2, 2, '(0818) 2772-7262', 'Akunting', 'Menikah', '1111222334455666778', 'Roosye lidayan leander', 'Joventius delima', '2000-03-06', '2018-05-04 13:10:33', '2018-05-04 13:10:33'),
(2, '0002', 'Agatha Chelsea Teriyanto', 1, 'O', 'Perempuan', 'bandung jawabarat', 8, 6, 9, '(0018) 1872-7272', 'Artist', 'Belum Menikah', '111222333445556', 'Christi teriyanto', 'Yohanes teriyanto', '2001-12-18', '2018-05-10 01:24:25', '2018-05-10 01:24:25'),
(3, '0003', 'Roosye Lidayan Leander', 1, 'A', 'Perempuan', 'perumahan graha mustika media', 2, 2, 2, '(0817) 2726-2525', 'Ibu Rumah Tangga', 'Menikah', '665544332211', 'Meryy coppens', 'William leander', '1985-03-06', '2018-05-12 09:36:00', '2018-05-12 09:36:00'),
(4, '0004', 'Amsal delima', 1, 'A', 'Laki-laki', 'bandung jawa barat', 8, 6, 9, '(0181) 8277-2727', 'It consultant', 'Belum Menikah', '081818272726', 'Chelsea', 'Juan', '2018-05-15', '2018-05-15 03:59:23', '2018-05-15 03:59:23');

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
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembelian`
--

INSERT INTO `pembelian` (`id`, `tgl`, `vendor_id`, `obat_id`, `jumlah`, `harga`, `total`, `created_at`, `updated_at`) VALUES
(3, '2018-05-01', '12', '1', 2, 2000000, 4000000, '2018-05-04 00:47:42', '2018-05-04 00:47:42'),
(5, '2018-05-06', '8', '2', 3, 1000000, 3000000, '2018-05-07 05:26:50', '2018-05-07 05:26:50');

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
  `reservasi_id` int(2) NOT NULL,
  `tgl` date NOT NULL,
  `no_faktur` varchar(10) NOT NULL,
  `nama_pemeriksaan` varchar(25) NOT NULL,
  `tarif` bigint(20) NOT NULL,
  `jml` int(11) NOT NULL,
  `total` bigint(20) NOT NULL,
  `disc` int(11) NOT NULL,
  `subtotal` bigint(20) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pemeriksaan`
--

INSERT INTO `pemeriksaan` (`id_pemeriksaan`, `reservasi_id`, `tgl`, `no_faktur`, `nama_pemeriksaan`, `tarif`, `jml`, `total`, `disc`, `subtotal`, `created_at`, `updated_at`) VALUES
(1, 1, '2018-05-19', '180519001', 'Biaya Poli', 35000, 2, 70000, 50, 35000, 2018, 2018);

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

--
-- Dumping data untuk tabel `petugas`
--

INSERT INTO `petugas` (`id`, `nama`, `spesialisasi`, `alamat`, `kota`, `no_hp`, `no_telp`, `alamat_email`, `tgl_mulai_praktek`, `img`, `category_id`, `senin1`, `senin2`, `selasa1`, `selasa2`, `rabu1`, `rabu2`, `kamis1`, `kamis2`, `jumat1`, `jumat2`, `sabtu1`, `sabtu2`, `minggu1`, `minggu2`, `created_at`, `updated_at`) VALUES
(6, 'Dr. Juan Delima', 'Jantung', 'Perum gmm, bekasi, jawa barat', 'bekasi', '(0101) 9929-9299', '(0101) 9929-9299', 'juanvaleriand@gmail.com', '2018-05-12', '4255-step-05-original@2x.jpg', 1, '06:21:00', '15:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-05-12 03:20:36', '2018-05-12 07:51:09'),
(7, 'Bastian Delima', 'IT Support', 'perum gmm bekasi jawabarat', 'bekasi', '(2122) 1221-2121', '(2121) 2121-2121', 'bastiand@mail.com', '2018-05-12', '9139-1511088192291.jpg', 2, '07:14:00', '19:00:00', NULL, NULL, '08:00:00', '21:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-05-12 04:05:00', '2018-05-12 07:50:11'),
(8, 'Joventius Delima', 'Kulit', 'perumahan graha mustika media', 'Bekasi', '(1122) 3344-5566', '(1122) 3344-5566', 'joven@mail.com', '2018-05-14', '8324-CIMG0182.JPG', 1, '08:30:00', '20:00:00', NULL, NULL, NULL, NULL, '10:30:00', '19:00:00', NULL, NULL, NULL, NULL, NULL, NULL, '2018-05-14 12:44:05', '2018-05-19 14:23:29');

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
(2, 'UMUM', '2018-04-06 11:33:15', '2018-05-09 09:14:17');

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

--
-- Dumping data untuk tabel `rekam_medis`
--

INSERT INTO `rekam_medis` (`id_rm`, `res_id`, `tgl`, `rmkeluhan`, `rmpemeriksaan`, `rmpp`, `rmalergiobat`, `rmterapi`, `rmresep`, `rmkesimpulan`, `rmdiagnosa`, `kondisi_pasien`, `u_id`, `created_at`, `updated_at`) VALUES
(1, 2, '2018-05-19', 'sering gatal-gatal kalau abis pakai bedak', 'cek kelainan kuliat', NULL, 'axoxilins', 'jangan kena udara dingin', '-', '-', 'Gatal-gatal', 'DALAM PROSES PENYEMBUHAN', 1, '2018-05-19 07:14:38', '2018-05-19 07:14:38'),
(2, 1, '2018-05-19', 'sering sesak nafas ketika beraktifitas berlebihan', 'cek jantung', NULL, 'tidak', 'jangan terlalu cape dan harus pakai masker', '-', '-', 'sesak nafas', 'DALAM PROSES PENYEMBUHAN', 1, '2018-05-19 08:57:19', '2018-05-19 08:57:19'),
(3, 4, '2018-05-19', 'sering gatal-gatal ketika mandi', 'cek kulit dan darah', NULL, 'tidak ada', 'diusahakan mandi air hangat', 'menyusul', 'jangan sering kena udara dingin, seperti AC', 'gatal-gatal', 'DALAM PROSES PENYEMBUHAN', 1, '2018-05-19 14:28:33', '2018-05-19 14:28:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `reservasi`
--

CREATE TABLE `reservasi` (
  `id_res` int(11) NOT NULL,
  `kd_res` varchar(11) NOT NULL,
  `poli_id` int(3) NOT NULL,
  `pasien_id` int(3) NOT NULL,
  `dokter_id` int(3) NOT NULL,
  `status_res` varchar(5) DEFAULT 'Sudah',
  `no_urut` varchar(4) NOT NULL,
  `no_rm` varchar(4) NOT NULL,
  `u_id` int(2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `reservasi`
--

INSERT INTO `reservasi` (`id_res`, `kd_res`, `poli_id`, `pasien_id`, `dokter_id`, `status_res`, `no_urut`, `no_rm`, `u_id`, `created_at`, `updated_at`) VALUES
(1, '180519001', 1, 2, 6, 'Sudah', '001', '0002', 1, '2018-05-19 08:57:19', '2018-05-19 08:57:19'),
(2, '180519002', 2, 1, 8, 'Sudah', '002', '0001', 1, '2018-05-19 07:14:38', '2018-05-19 07:14:38'),
(3, '180519003', 1, 4, 6, 'Belum', '003', '0004', 1, '2018-05-19 07:11:22', '2018-05-19 07:11:22'),
(4, '180519004', 2, 3, 8, 'Sudah', '004', '0003', 1, '2018-05-19 14:28:33', '2018-05-19 14:28:33');

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
(1, 'admin', 'Administrator', 'admin', '$2y$10$QltuGMUkUyg3ZRiQ7oIVj.iIhplXbzeXfSLN8KvsHhLhzeS5UMvtK', '6516-leon-page@2x.jpg', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 'P8WhAypUb4ibxvGq9kMpnu0bbK7gIBmh32s7yHzIP7Po4wenArdeHFPI8zR9', '2018-04-23 00:34:08', '2018-05-19 17:33:06'),
(2, 'bastiandelima', 'Bastian', 'Delima', '$2y$10$MX0FwItwtvesreMfypb9BOmVy7IRtVbZuJhGrI15EDXOv4qifO2Ka', '1517-download.jpg', 0, 1, 1, 1, 0, 0, 0, 0, 0, 1, 1, 1, 0, 1, 'a1Wjef3e3G1sTHwmVvPELfb7kZwftDmgcGQuQcGKXzVa42oO7hjwL1EEdD8Y', '2018-04-23 00:41:52', '2018-05-19 17:32:21'),
(3, 'juanvaleriand', 'Juan Valerian', 'Delima', '$2y$10$VoLJniA5PkKUP6zAcn/5Ou6uOQdUyPUnN/0mQHaRg786LFRwfLE.q', '5887-iconmonstr-github-1-240.png', 0, 0, 0, 0, 0, 1, 1, 1, 1, 0, 0, 0, 1, 0, 'FjUJPjHds0Si4VTFtv0lyMiVkC6CZhqnUfwOdbzbqsojyNHDx9DCxtAIAW1B', '2018-05-07 05:23:12', '2018-05-16 03:40:48');

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
-- Dumping data untuk tabel `vendor_obat`
--

INSERT INTO `vendor_obat` (`id`, `nama_vendor`, `alamat`, `no_telp`, `no_hp`, `pic`, `email`, `deskripsi`, `obat_id`, `catatan`, `created_at`, `updated_at`) VALUES
(8, 'Bastian Delima', 'Perum GMM', '08181272727', '0119182727', 'Juan', 'bastiandelima@email.com', 'lorem ipsum dolor', 1, 'lorem ipsum dolor sit amet', '2018-04-21 02:51:17', '2018-04-21 02:51:17'),
(9, 'Bastian Delima', 'Perum GMM', '08181272727', '0119182727', 'Juan', 'bastiandelima@email.com', 'lorem ipsum dolor', 2, 'lorem ipsum dolor sit amet', '2018-04-21 02:51:18', '2018-04-21 02:51:18'),
(10, 'Bastian Delima', 'Perum GMM', '08181272727', '0119182727', 'Juan', 'bastiandelima@email.com', 'lorem ipsum dolor', 1, 'lorem ipsum dolor sit amet', '2018-04-21 02:51:18', '2018-04-21 02:51:18'),
(11, 'Bastian Delima', 'Perum GMM', '08181272727', '0119182727', 'Juan', 'bastiandelima@email.com', 'lorem ipsum dolor', 1, 'lorem ipsum dolor sit amet', '2018-04-21 02:51:18', '2018-04-21 02:51:18'),
(12, 'Juan Valerian Delima', 'lorem ipsum dolor sit amet', '081727262424', '0181818727', 'delima', 'juanvaleriand@gmail.com', 'lorem ipsum dolor sit amet lorem ipsum dolor sit amet', 2, 'lorem ipsum dolor sit amet lorem ipsum dolor sit amet', '2018-05-04 00:43:26', '2018-05-04 00:43:26'),
(13, 'Juan Valerian Delima', 'lorem ipsum dolor sit amet', '081727262424', '0181818727', 'delima', 'juanvaleriand@gmail.com', 'lorem ipsum dolor sit amet lorem ipsum dolor sit amet', 1, 'lorem ipsum dolor sit amet', '2018-05-04 00:43:26', '2018-05-04 00:43:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id_akun`);

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
-- Indexes for table `biaya_pendaftaran`
--
ALTER TABLE `biaya_pendaftaran`
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
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_slug_unique` (`slug`);

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
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `id_akun` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `alat_kantor`
--
ALTER TABLE `alat_kantor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `alat_medis`
--
ALTER TABLE `alat_medis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `biaya_pendaftaran`
--
ALTER TABLE `biaya_pendaftaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `conf_honor`
--
ALTER TABLE `conf_honor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `days`
--
ALTER TABLE `days`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `day_petugas`
--
ALTER TABLE `day_petugas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `donasi_obat`
--
ALTER TABLE `donasi_obat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `donasi_uang`
--
ALTER TABLE `donasi_uang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `honor`
--
ALTER TABLE `honor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jenis_obat`
--
ALTER TABLE `jenis_obat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jenis_obat_detail`
--
ALTER TABLE `jenis_obat_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kategoripasien`
--
ALTER TABLE `kategoripasien`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kelurahan`
--
ALTER TABLE `kelurahan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `kota`
--
ALTER TABLE `kota`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `laravel_logger_activity`
--
ALTER TABLE `laravel_logger_activity`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=168;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `operasional`
--
ALTER TABLE `operasional`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pemberian_obat`
--
ALTER TABLE `pemberian_obat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pemeriksaan`
--
ALTER TABLE `pemeriksaan`
  MODIFY `id_pemeriksaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `poli`
--
ALTER TABLE `poli`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rekam_medis`
--
ALTER TABLE `rekam_medis`
  MODIFY `id_rm` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `reservasi`
--
ALTER TABLE `reservasi`
  MODIFY `id_res` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vendor_obat`
--
ALTER TABLE `vendor_obat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

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
