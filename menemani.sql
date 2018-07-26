-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 26 Jul 2018 pada 19.51
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
(1, 'T01', 'Computer Samsung', 'Komputer', 2, '2018-07-04 12:33:39', '2018-07-04 12:33:39');

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
(1, 'AL02', 'We Care', 'Suntikan', 4, 'Ini buat suntik pasien', '2018-07-04 12:30:37', '2018-07-04 12:30:37');

-- --------------------------------------------------------

--
-- Struktur dari tabel `categories`
--

CREATE TABLE `categories` (
  `id` int(3) UNSIGNED NOT NULL,
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
  `id` int(3) NOT NULL,
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

--
-- Dumping data untuk tabel `data_pemeriksaan`
--

INSERT INTO `data_pemeriksaan` (`id_dpemeriksaan`, `id_kategori`, `nama_pemeriksaan`, `created_at`, `updated_at`) VALUES
(1, 3, 'Fisio Theraphy', '2018-07-02 09:30:21', '2018-07-02 09:30:21'),
(2, 4, 'Suntik', '2018-07-02 09:30:30', '2018-07-02 09:30:30'),
(3, 3, 'Cek Tekanan Darah', '2018-07-02 09:30:44', '2018-07-02 09:30:44'),
(4, 4, 'Infus', '2018-07-02 09:30:56', '2018-07-02 09:30:56');

-- --------------------------------------------------------

--
-- Struktur dari tabel `days`
--

CREATE TABLE `days` (
  `id` int(1) UNSIGNED NOT NULL,
  `days` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `id` int(3) UNSIGNED NOT NULL,
  `day_id` int(3) UNSIGNED NOT NULL,
  `petugas_id` int(3) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `day_petugas`
--

INSERT INTO `day_petugas` (`id`, `day_id`, `petugas_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 3, 1, NULL, NULL),
(3, 5, 1, NULL, NULL),
(4, 6, 1, NULL, NULL),
(5, 1, 2, NULL, NULL),
(6, 2, 2, NULL, NULL),
(7, 3, 2, NULL, NULL),
(8, 4, 2, NULL, NULL),
(9, 1, 3, NULL, NULL),
(10, 3, 3, NULL, NULL),
(11, 4, 3, NULL, NULL),
(12, 1, 4, NULL, NULL),
(13, 2, 4, NULL, NULL),
(14, 3, 4, NULL, NULL),
(15, 4, 4, NULL, NULL),
(16, 5, 4, NULL, NULL),
(17, 6, 4, NULL, NULL),
(18, 1, 5, NULL, NULL),
(19, 3, 5, NULL, NULL),
(20, 7, 5, NULL, NULL),
(21, 5, 6, NULL, NULL),
(22, 6, 6, NULL, NULL),
(23, 7, 6, NULL, NULL),
(24, 3, 7, NULL, NULL),
(25, 4, 7, NULL, NULL),
(26, 6, 7, NULL, NULL),
(27, 7, 7, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `donasi_obat`
--

CREATE TABLE `donasi_obat` (
  `id` int(3) NOT NULL,
  `nama_donatur` varchar(50) NOT NULL,
  `cp` varchar(50) NOT NULL,
  `hp` varchar(14) DEFAULT NULL,
  `jns_obt` varchar(50) NOT NULL,
  `jumlah` int(5) NOT NULL,
  `keterangan` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `donasi_obat`
--

INSERT INTO `donasi_obat` (`id`, `nama_donatur`, `cp`, `hp`, `jns_obt`, `jumlah`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'Pharmasi', 'Cindy', '0181881818', 'Tablet', 5, 'Jenis obat tablet', '2018-07-11 08:02:25', '2018-07-11 08:02:25'),
(2, 'World Health Oraganization', 'Jokowi', '08182773', 'Kapsul', 4, 'lorem ipsum dolor sit amet...', '2018-07-11 08:05:44', '2018-07-11 08:05:44'),
(3, 'We care', 'Reni', '01823545463', 'Cair', 6, 'Ini obat buat batuk-batuk', '2018-07-11 08:08:48', '2018-07-11 08:08:48');

-- --------------------------------------------------------

--
-- Struktur dari tabel `donasi_uang`
--

CREATE TABLE `donasi_uang` (
  `id` int(3) NOT NULL,
  `nama_donatur` varchar(50) NOT NULL,
  `cp` varchar(50) NOT NULL,
  `hp` varchar(15) NOT NULL,
  `jml_donasi` bigint(20) NOT NULL,
  `keterangan` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status_akunting` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `donasi_uang`
--

INSERT INTO `donasi_uang` (`id`, `nama_donatur`, `cp`, `hp`, `jml_donasi`, `keterangan`, `created_at`, `updated_at`, `status_akunting`) VALUES
(1, 'World Health Oraganization', 'Jokowi', '081236264027', 6000000, 'Sumbangan untuk infrastruktur klinik', '2018-07-20 04:08:50', '2018-07-20 04:08:50', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `honor`
--

CREATE TABLE `honor` (
  `id` int(3) NOT NULL,
  `tgl` date NOT NULL,
  `category_id` int(3) NOT NULL,
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
  `id` int(3) NOT NULL,
  `kd_jenis` varchar(6) NOT NULL,
  `jenis_obat_id` int(3) NOT NULL,
  `nama_obat` varchar(55) NOT NULL,
  `satuan` varchar(4) NOT NULL,
  `deskripsi` text,
  `harga` bigint(20) NOT NULL,
  `stok` int(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_obat_detail`
--

INSERT INTO `jenis_obat_detail` (`id`, `kd_jenis`, `jenis_obat_id`, `nama_obat`, `satuan`, `deskripsi`, `harga`, `stok`, `created_at`, `updated_at`) VALUES
(1, 'JNS002', 2, 'Kapsul 1', 'kg', 'lorem ipsum dolor sit amet', 100000, 2, '2018-07-14 04:16:49', '2018-07-14 04:16:49'),
(2, 'JNS001', 1, 'Tablet 1', 'mg', 'lorem ipsum dolor sit amet', 150000, 1, '2018-07-14 04:16:49', '2018-07-14 04:16:49');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategoripasien`
--

CREATE TABLE `kategoripasien` (
  `id` int(3) UNSIGNED NOT NULL,
  `nama_kategori` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `id` int(4) UNSIGNED NOT NULL,
  `nama_kecamatan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kota_id` int(4) NOT NULL,
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
(11, 'Tambora', 2, '2018-06-01 16:11:24', '2018-06-01 16:11:24'),
(12, 'Cilandak', 3, '2018-07-26 15:18:59', '2018-07-26 15:18:59'),
(13, 'Jagakarsa', 3, '2018-07-26 15:19:25', '2018-07-26 15:19:25'),
(14, 'Kebayoran Baru', 3, '2018-07-26 15:19:49', '2018-07-26 15:19:49'),
(15, 'Kebayoran Lama', 3, '2018-07-26 15:20:10', '2018-07-26 15:20:10'),
(16, 'Mampang Prapatan', 3, '2018-07-26 15:20:28', '2018-07-26 15:20:28'),
(17, 'Cakung', 4, '2018-07-26 15:26:44', '2018-07-26 15:26:44'),
(18, 'Cipayung', 4, '2018-07-26 15:27:13', '2018-07-26 15:27:13'),
(19, 'Ciracas', 4, '2018-07-26 15:27:41', '2018-07-26 15:27:41'),
(20, 'Duren Sawit', 4, '2018-07-26 15:28:03', '2018-07-26 15:28:03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelurahan`
--

CREATE TABLE `kelurahan` (
  `id` int(4) UNSIGNED NOT NULL,
  `nama_kelurahan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kec_id` int(4) NOT NULL,
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
(64, 'Angke', 11, '2018-06-01 16:21:11', '2018-06-01 16:21:11'),
(65, 'Cilandak Barat', 12, '2018-07-26 15:21:05', '2018-07-26 15:21:05'),
(66, 'Cipete Selatan', 12, '2018-07-26 15:21:27', '2018-07-26 15:21:27'),
(67, 'Gandaria Selatan', 12, '2018-07-26 15:22:03', '2018-07-26 15:22:03'),
(68, 'Lebak Bulus', 12, '2018-07-26 15:22:41', '2018-07-26 15:22:41'),
(69, 'Pondok Labu', 12, '2018-07-26 15:23:04', '2018-07-26 15:23:04'),
(70, 'Ciganjur', 13, '2018-07-26 15:23:33', '2018-07-26 15:23:33'),
(71, 'Cipedak', 13, '2018-07-26 15:24:03', '2018-07-26 15:24:03'),
(72, 'Jagakarsa', 13, '2018-07-26 15:24:26', '2018-07-26 15:24:26'),
(73, 'Lenteng Agung', 13, '2018-07-26 15:25:34', '2018-07-26 15:25:34'),
(74, 'Cakung Barat', 17, '2018-07-26 15:28:23', '2018-07-26 15:28:23'),
(75, 'Cakung Timur', 17, '2018-07-26 15:28:41', '2018-07-26 15:28:41'),
(76, 'Jatinegara', 17, '2018-07-26 15:28:57', '2018-07-26 15:28:57'),
(77, 'Penggilingan', 17, '2018-07-26 15:29:10', '2018-07-26 15:29:10'),
(78, 'Pulogebang', 17, '2018-07-26 15:29:29', '2018-07-26 15:29:29'),
(79, 'Rawaterate', 17, '2018-07-26 15:29:47', '2018-07-26 15:29:47'),
(80, 'Ujung Menteng', 17, '2018-07-26 15:30:06', '2018-07-26 15:30:06'),
(81, 'Bambu Apus', 18, '2018-07-26 15:30:28', '2018-07-26 15:30:28'),
(82, 'Ceger', 18, '2018-07-26 15:30:56', '2018-07-26 15:30:56'),
(83, 'Cilangkap', 18, '2018-07-26 15:31:39', '2018-07-26 15:31:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kota`
--

CREATE TABLE `kota` (
  `id` int(4) UNSIGNED NOT NULL,
  `nama_kota` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
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

--
-- Dumping data untuk tabel `laravel_logger_activity`
--

INSERT INTO `laravel_logger_activity` (`id`, `description`, `userType`, `userId`, `route`, `ipAddress`, `userAgent`, `locale`, `referer`, `methodType`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Logged In', 'Registered', 1, 'http://127.0.0.1/PI-SEM6/public/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1/PI-SEM6/public/login', 'POST', '2018-07-02 06:31:31', '2018-07-02 06:31:31', NULL),
(2, 'Logged In', 'Registered', 1, 'http://localhost/PI-SEM6/public/login', '::1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 'en-US,en;q=0.9', 'http://localhost/PI-SEM6/public/login', 'POST', '2018-07-02 09:25:44', '2018-07-02 09:25:44', NULL),
(3, 'Logged Out', 'Registered', 1, 'http://localhost/PI-SEM6/public/logout', '::1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 'en-US,en;q=0.9', 'http://localhost/PI-SEM6/public/', 'POST', '2018-07-02 09:41:02', '2018-07-02 09:41:02', NULL),
(4, 'Logged In', 'Registered', 1, 'http://localhost/PI-SEM6/public/login', '::1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 'en-US,en;q=0.9', 'http://localhost/PI-SEM6/public/login', 'POST', '2018-07-02 09:43:13', '2018-07-02 09:43:13', NULL),
(5, 'Logged Out', 'Registered', 1, 'http://localhost/PI-SEM6/public/logout', '::1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 'en-US,en;q=0.9', 'http://localhost/PI-SEM6/public/pengaturan/pengguna/create', 'POST', '2018-07-02 09:47:05', '2018-07-02 09:47:05', NULL),
(6, 'Logged In', 'Registered', 1, 'http://localhost/PI-SEM6/public/login', '::1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 'en-US,en;q=0.9', 'http://localhost/PI-SEM6/public/login', 'POST', '2018-07-02 09:47:17', '2018-07-02 09:47:17', NULL),
(7, 'Logged Out', 'Registered', 1, 'http://localhost/PI-SEM6/public/logout', '::1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 'en-US,en;q=0.9', 'http://localhost/PI-SEM6/public/', 'POST', '2018-07-02 09:47:51', '2018-07-02 09:47:51', NULL),
(8, 'Logged In', 'Registered', 1, 'http://localhost/PI-SEM6/public/login', '::1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 'en-US,en;q=0.9', 'http://localhost/PI-SEM6/public/login', 'POST', '2018-07-03 15:00:41', '2018-07-03 15:00:41', NULL),
(9, 'Logged In', 'Registered', 1, 'http://localhost/PI-SEM6/public/login', '::1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 'en-US,en;q=0.9', 'http://localhost/PI-SEM6/public/login', 'POST', '2018-07-04 04:00:11', '2018-07-04 04:00:11', NULL),
(10, 'Logged Out', 'Registered', 1, 'http://localhost/PI-SEM6/public/logout', '::1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 'en-US,en;q=0.9', 'http://localhost/PI-SEM6/public/', 'POST', '2018-07-04 04:00:31', '2018-07-04 04:00:31', NULL),
(11, 'Logged In', 'Registered', 1, 'http://localhost/PI-SEM6/public/login', '::1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 'en-US,en;q=0.9', 'http://localhost/PI-SEM6/public/login', 'POST', '2018-07-04 04:00:39', '2018-07-04 04:00:39', NULL),
(12, 'Logged In', 'Registered', 1, 'http://localhost/PI-SEM6/public/login', '::1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 'en-US,en;q=0.9', 'http://localhost/PI-SEM6/public/login', 'POST', '2018-07-04 12:08:49', '2018-07-04 12:08:49', NULL),
(13, 'Logged Out', 'Registered', 1, 'http://localhost/PI-SEM6/public/logout', '::1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 'en-US,en;q=0.9', 'http://localhost/PI-SEM6/public/pengaturan/pengguna', 'POST', '2018-07-04 13:55:49', '2018-07-04 13:55:49', NULL),
(14, 'Logged In', 'Registered', 3, 'http://localhost/PI-SEM6/public/login', '::1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 'en-US,en;q=0.9', 'http://localhost/PI-SEM6/public/login', 'POST', '2018-07-04 13:56:00', '2018-07-04 13:56:00', NULL),
(15, 'Logged Out', 'Registered', 3, 'http://localhost/PI-SEM6/public/logout', '::1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 'en-US,en;q=0.9', 'http://localhost/PI-SEM6/public/akunting/data_akun', 'POST', '2018-07-04 14:01:45', '2018-07-04 14:01:45', NULL),
(16, 'Logged In', 'Registered', 1, 'http://localhost/PI-SEM6/public/login', '::1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 'en-US,en;q=0.9', 'http://localhost/PI-SEM6/public/login', 'POST', '2018-07-04 14:01:52', '2018-07-04 14:01:52', NULL),
(17, 'Logged Out', 'Registered', 1, 'http://localhost/PI-SEM6/public/logout', '::1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 'en-US,en;q=0.9', 'http://localhost/PI-SEM6/public/perekaman_aktivitas/keuangan/pengeluaran/pembelian', 'POST', '2018-07-04 16:27:47', '2018-07-04 16:27:47', NULL),
(18, 'Logged In', 'Registered', 1, 'http://localhost/PI-SEM6/public/login', '::1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 'en-US,en;q=0.9', 'http://localhost/PI-SEM6/public/login', 'POST', '2018-07-08 06:23:58', '2018-07-08 06:23:58', NULL),
(19, 'Logged Out', 'Registered', 1, 'http://localhost/PI-SEM6/public/logout', '::1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 'en-US,en;q=0.9', 'http://localhost/PI-SEM6/public/pengaturan/pengguna', 'POST', '2018-07-08 08:35:54', '2018-07-08 08:35:54', NULL),
(20, 'Logged In', 'Registered', 4, 'http://localhost/PI-SEM6/public/login', '::1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 'en-US,en;q=0.9', 'http://localhost/PI-SEM6/public/login', 'POST', '2018-07-08 08:36:06', '2018-07-08 08:36:06', NULL),
(21, 'Logged Out', 'Registered', 4, 'http://localhost/PI-SEM6/public/logout', '::1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 'en-US,en;q=0.9', 'http://localhost/PI-SEM6/public/perekaman_aktivitas/medis/pemberian/create', 'POST', '2018-07-08 08:38:33', '2018-07-08 08:38:33', NULL),
(22, 'Logged In', 'Registered', 1, 'http://localhost/PI-SEM6/public/login', '::1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 'en-US,en;q=0.9', 'http://localhost/PI-SEM6/public/login', 'POST', '2018-07-08 08:39:59', '2018-07-08 08:39:59', NULL),
(23, 'Logged Out', 'Registered', 1, 'http://localhost/PI-SEM6/public/logout', '::1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 'en-US,en;q=0.9', 'http://localhost/PI-SEM6/public/pengaturan/pengguna', 'POST', '2018-07-08 08:42:28', '2018-07-08 08:42:28', NULL),
(24, 'Logged In', 'Registered', 3, 'http://localhost/PI-SEM6/public/login', '::1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 'en-US,en;q=0.9', 'http://localhost/PI-SEM6/public/login', 'POST', '2018-07-08 08:42:38', '2018-07-08 08:42:38', NULL),
(25, 'Logged Out', 'Registered', 3, 'http://localhost/PI-SEM6/public/logout', '::1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 'en-US,en;q=0.9', 'http://localhost/PI-SEM6/public/pengaturan/pengguna/edit/3', 'POST', '2018-07-08 08:47:39', '2018-07-08 08:47:39', NULL),
(26, 'Logged In', 'Registered', 1, 'http://localhost/PI-SEM6/public/login', '::1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 'en-US,en;q=0.9', 'http://localhost/PI-SEM6/public/login', 'POST', '2018-07-08 08:47:47', '2018-07-08 08:47:47', NULL),
(27, 'Logged Out', 'Registered', 1, 'http://localhost/PI-SEM6/public/logout', '::1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 'en-US,en;q=0.9', 'http://localhost/PI-SEM6/public/perekaman_aktivitas/medis/pemberian', 'POST', '2018-07-08 08:52:51', '2018-07-08 08:52:51', NULL),
(28, 'Logged In', 'Registered', 1, 'http://localhost/PI-SEM6/public/login', '::1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 'en-US,en;q=0.9', 'http://localhost/PI-SEM6/public/login', 'POST', '2018-07-08 13:31:06', '2018-07-08 13:31:06', NULL),
(29, 'Logged Out', 'Registered', 1, 'http://localhost/PI-SEM6/public/logout', '::1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 'en-US,en;q=0.9', 'http://localhost/PI-SEM6/public/perekaman_aktivitas/medis/pemeriksaan', 'POST', '2018-07-08 13:56:03', '2018-07-08 13:56:03', NULL),
(30, 'Logged In', 'Registered', 4, 'http://localhost/PI-SEM6/public/login', '::1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 'en-US,en;q=0.9', 'http://localhost/PI-SEM6/public/login', 'POST', '2018-07-08 13:56:21', '2018-07-08 13:56:21', NULL),
(31, 'Logged Out', 'Registered', 4, 'http://localhost/PI-SEM6/public/logout', '::1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 'en-US,en;q=0.9', 'http://localhost/PI-SEM6/public/', 'POST', '2018-07-08 13:56:32', '2018-07-08 13:56:32', NULL),
(32, 'Logged In', 'Registered', 1, 'http://localhost/PI-SEM6/public/login', '::1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 'en-US,en;q=0.9', 'http://localhost/PI-SEM6/public/login', 'POST', '2018-07-08 13:56:51', '2018-07-08 13:56:51', NULL),
(33, 'Logged Out', 'Registered', 1, 'http://localhost/PI-SEM6/public/logout', '::1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 'en-US,en;q=0.9', 'http://localhost/PI-SEM6/public/pengaturan/pengguna', 'POST', '2018-07-08 15:10:16', '2018-07-08 15:10:16', NULL),
(34, 'Logged In', 'Registered', 5, 'http://localhost/PI-SEM6/public/login', '::1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 'en-US,en;q=0.9', 'http://localhost/PI-SEM6/public/login', 'POST', '2018-07-08 15:11:36', '2018-07-08 15:11:36', NULL),
(35, 'Logged Out', 'Registered', 5, 'http://localhost/PI-SEM6/public/logout', '::1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 'en-US,en;q=0.9', 'http://localhost/PI-SEM6/public/akunting/transaksi/create', 'POST', '2018-07-08 15:12:56', '2018-07-08 15:12:56', NULL),
(36, 'Logged In', 'Registered', 1, 'http://localhost/PI-SEM6/public/login', '::1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 'en-US,en;q=0.9', 'http://localhost/PI-SEM6/public/login', 'POST', '2018-07-08 15:13:05', '2018-07-08 15:13:05', NULL),
(37, 'Logged In', 'Registered', 1, 'http://localhost/PI-SEM6/public/login', '::1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 'en-US,en;q=0.9', 'http://localhost/PI-SEM6/public/login', 'POST', '2018-07-09 03:49:14', '2018-07-09 03:49:14', NULL),
(38, 'Logged In', 'Registered', 1, 'http://127.0.0.1/PI-SEM6/public/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1/PI-SEM6/public/login', 'POST', '2018-07-09 05:32:52', '2018-07-09 05:32:52', NULL),
(39, 'Logged In', 'Registered', 1, 'http://localhost/PI-SEM6/public/login', '::1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 'en-US,en;q=0.9', 'http://localhost/PI-SEM6/public/login', 'POST', '2018-07-11 07:36:51', '2018-07-11 07:36:51', NULL),
(40, 'Logged In', 'Registered', 1, 'http://localhost/PI-SEM6/public/login', '::1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 'en-US,en;q=0.9', 'http://localhost/PI-SEM6/public/login', 'POST', '2018-07-12 01:41:05', '2018-07-12 01:41:05', NULL),
(41, 'Logged In', 'Registered', 1, 'http://127.0.0.1/PI-SEM6/public/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1/PI-SEM6/public/login', 'POST', '2018-07-12 09:39:38', '2018-07-12 09:39:38', NULL),
(42, 'Logged In', 'Registered', 1, 'http://127.0.0.1/PI-SEM6/public/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1/PI-SEM6/public/login', 'POST', '2018-07-13 03:25:28', '2018-07-13 03:25:28', NULL),
(43, 'Logged In', 'Registered', 1, 'http://127.0.0.1/PI-SEM6/public/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1/PI-SEM6/public/login', 'POST', '2018-07-14 04:14:48', '2018-07-14 04:14:48', NULL),
(44, 'Logged In', 'Registered', 1, 'http://127.0.0.1/PI-SEM6/public/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1/PI-SEM6/public/login', 'POST', '2018-07-14 07:28:51', '2018-07-14 07:28:51', NULL),
(45, 'Logged In', 'Registered', 1, 'http://localhost/PI-SEM6/public/login', '::1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 'en-US,en;q=0.9', 'http://localhost/PI-SEM6/public/login', 'POST', '2018-07-14 14:02:01', '2018-07-14 14:02:01', NULL),
(46, 'Logged In', 'Registered', 1, 'http://localhost/PI-SEM6/public/login', '::1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 'en-US,en;q=0.9', 'http://localhost/PI-SEM6/public/login', 'POST', '2018-07-14 17:02:02', '2018-07-14 17:02:02', NULL),
(47, 'Logged Out', 'Registered', 1, 'http://localhost/PI-SEM6/public/logout', '::1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 'en-US,en;q=0.9', 'http://localhost/PI-SEM6/public/masterdata/petugasmedis/jadwal', 'POST', '2018-07-14 17:02:43', '2018-07-14 17:02:43', NULL),
(48, 'Logged In', 'Registered', 1, 'http://127.0.0.1/PI-SEM6/public/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1/PI-SEM6/public/login', 'POST', '2018-07-15 08:54:07', '2018-07-15 08:54:07', NULL),
(49, 'Logged In', 'Registered', 1, 'http://127.0.0.1/PI-SEM6/public/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1/PI-SEM6/public/login', 'POST', '2018-07-15 14:08:00', '2018-07-15 14:08:00', NULL),
(50, 'Logged In', 'Registered', 1, 'http://127.0.0.1/PI-SEM6/public/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1/PI-SEM6/public/login', 'POST', '2018-07-16 00:44:31', '2018-07-16 00:44:31', NULL),
(51, 'Logged In', 'Registered', 1, 'http://127.0.0.1/PI-SEM6/public/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1/PI-SEM6/public/login', 'POST', '2018-07-17 15:37:33', '2018-07-17 15:37:33', NULL),
(52, 'Logged In', 'Registered', 1, 'http://127.0.0.1/PI-SEM6/public/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1/PI-SEM6/public/login', 'POST', '2018-07-19 11:44:11', '2018-07-19 11:44:11', NULL),
(53, 'Logged Out', 'Registered', 1, 'http://127.0.0.1/PI-SEM6/public/logout', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1/PI-SEM6/public/pengaturan/pengguna', 'POST', '2018-07-19 12:33:50', '2018-07-19 12:33:50', NULL),
(54, 'Failed Login Attempt', 'Guest', NULL, 'http://127.0.0.1/PI-SEM6/public/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1/PI-SEM6/public/login', 'POST', '2018-07-19 12:34:00', '2018-07-19 12:34:00', NULL),
(55, 'Logged In', 'Registered', 7, 'http://127.0.0.1/PI-SEM6/public/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1/PI-SEM6/public/login', 'POST', '2018-07-19 12:34:08', '2018-07-19 12:34:08', NULL),
(56, 'Logged Out', 'Registered', 7, 'http://127.0.0.1/PI-SEM6/public/logout', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1/PI-SEM6/public/', 'POST', '2018-07-19 12:35:10', '2018-07-19 12:35:10', NULL),
(57, 'Logged In', 'Registered', 1, 'http://127.0.0.1/PI-SEM6/public/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1/PI-SEM6/public/login', 'POST', '2018-07-19 12:35:18', '2018-07-19 12:35:18', NULL),
(58, 'Logged Out', 'Registered', 1, 'http://127.0.0.1/PI-SEM6/public/logout', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1/PI-SEM6/public/pengaturan/pengguna/edit/1', 'POST', '2018-07-19 12:45:36', '2018-07-19 12:45:36', NULL),
(59, 'Logged In', 'Registered', 6, 'http://127.0.0.1/PI-SEM6/public/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1/PI-SEM6/public/login', 'POST', '2018-07-19 12:45:46', '2018-07-19 12:45:46', NULL),
(60, 'Logged Out', 'Registered', 6, 'http://127.0.0.1/PI-SEM6/public/logout', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1/PI-SEM6/public/', 'POST', '2018-07-19 12:45:59', '2018-07-19 12:45:59', NULL),
(61, 'Failed Login Attempt', 'Guest', NULL, 'http://127.0.0.1/PI-SEM6/public/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1/PI-SEM6/public/login', 'POST', '2018-07-19 12:46:14', '2018-07-19 12:46:14', NULL),
(62, 'Logged In', 'Registered', 7, 'http://127.0.0.1/PI-SEM6/public/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1/PI-SEM6/public/login', 'POST', '2018-07-19 12:46:23', '2018-07-19 12:46:23', NULL),
(63, 'Logged Out', 'Registered', 7, 'http://127.0.0.1/PI-SEM6/public/logout', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1/PI-SEM6/public/perekaman_aktivitas/keuangan/penerimaan/donasi_obat', 'POST', '2018-07-19 13:01:08', '2018-07-19 13:01:08', NULL),
(64, 'Logged In', 'Registered', 1, 'http://127.0.0.1/PI-SEM6/public/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1/PI-SEM6/public/login', 'POST', '2018-07-20 02:51:32', '2018-07-20 02:51:32', NULL),
(65, 'Logged Out', 'Registered', 1, 'http://127.0.0.1/PI-SEM6/public/logout', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1/PI-SEM6/public/laporan/akunting/detail_akun/01-01-2018/20-07-2018/all/all/pdf', 'POST', '2018-07-20 04:14:52', '2018-07-20 04:14:52', NULL),
(66, 'Logged In', 'Registered', 1, 'http://127.0.0.1/PI-SEM6/public/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1/PI-SEM6/public/login', 'POST', '2018-07-23 03:40:11', '2018-07-23 03:40:11', NULL),
(67, 'Logged In', 'Registered', 1, 'http://localhost/PI-SEM6/public/login', '::1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 'en-US,en;q=0.9', 'http://localhost/PI-SEM6/public/login', 'POST', '2018-07-25 14:06:22', '2018-07-25 14:06:22', NULL),
(68, 'Logged In', 'Registered', 1, 'http://127.0.0.1/PI-SEM6/public/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1/PI-SEM6/public/login', 'POST', '2018-07-25 16:18:08', '2018-07-25 16:18:08', NULL),
(69, 'Logged In', 'Registered', 1, 'http://localhost/PI-SEM6/public/login', '::1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.75 Safari/537.36', 'en-US,en;q=0.9', 'http://localhost/PI-SEM6/public/login', 'POST', '2018-07-26 13:40:27', '2018-07-26 13:40:27', NULL),
(70, 'Logged Out', 'Registered', 1, 'http://localhost/PI-SEM6/public/logout', '::1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.75 Safari/537.36', 'en-US,en;q=0.9', 'http://localhost/PI-SEM6/public/', 'POST', '2018-07-26 13:46:38', '2018-07-26 13:46:38', NULL),
(71, 'Logged In', 'Registered', 1, 'http://localhost/PI-SEM6/public/login', '::1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.75 Safari/537.36', 'en-US,en;q=0.9', 'http://localhost/PI-SEM6/public/login', 'POST', '2018-07-26 13:48:24', '2018-07-26 13:48:24', NULL),
(72, 'Logged Out', 'Registered', 1, 'http://localhost/PI-SEM6/public/logout', '::1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.75 Safari/537.36', 'en-US,en;q=0.9', 'http://localhost/PI-SEM6/public/', 'POST', '2018-07-26 13:48:44', '2018-07-26 13:48:44', NULL),
(73, 'Logged In', 'Registered', 1, 'http://127.0.0.1/PI-SEM6/public/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.75 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1/PI-SEM6/public/login', 'POST', '2018-07-26 14:17:23', '2018-07-26 14:17:23', NULL),
(74, 'Logged Out', 'Registered', 1, 'http://127.0.0.1/PI-SEM6/public/logout', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.75 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1/PI-SEM6/public/', 'POST', '2018-07-26 14:20:27', '2018-07-26 14:20:27', NULL),
(75, 'Logged In', 'Registered', 1, 'http://localhost/PI-SEM6/public/login', '::1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.75 Safari/537.36', 'en-US,en;q=0.9', 'http://localhost/PI-SEM6/public/login', 'POST', '2018-07-26 14:33:22', '2018-07-26 14:33:22', NULL),
(76, 'Logged Out', 'Registered', 1, 'http://localhost/PI-SEM6/public/logout', '::1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.75 Safari/537.36', 'en-US,en;q=0.9', 'http://localhost/PI-SEM6/public/laporan/akunting/detail_akun/01-01-2018/26-07-2018/all/all/pdf', 'POST', '2018-07-26 14:43:34', '2018-07-26 14:43:34', NULL),
(77, 'Logged In', 'Registered', 1, 'http://localhost/PI-SEM6/public/login', '::1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.75 Safari/537.36', 'en-US,en;q=0.9', 'http://localhost/PI-SEM6/public/login', 'POST', '2018-07-26 14:46:45', '2018-07-26 14:46:45', NULL),
(78, 'Logged In', 'Registered', 1, 'http://127.0.0.1/PI-SEM6/public/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.75 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1/PI-SEM6/public/login', 'POST', '2018-07-26 15:12:45', '2018-07-26 15:12:45', NULL),
(79, 'Logged In', 'Registered', 1, 'http://localhost/PI-SEM6/public/login', '::1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.75 Safari/537.36', 'en-US,en;q=0.9', 'http://localhost/PI-SEM6/public/login', 'POST', '2018-07-26 17:24:07', '2018-07-26 17:24:07', NULL),
(80, 'Logged In', 'Registered', 1, 'http://127.0.0.1/PI-SEM6/public/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; rv:60.0) Gecko/20100101 Firefox/60.0', 'id,en-US;q=0.7,en;q=0.3', 'http://127.0.0.1/PI-SEM6/public/login', 'POST', '2018-07-26 17:34:36', '2018-07-26 17:34:36', NULL),
(81, 'Logged In', 'Registered', 1, 'http://127.0.0.1/PI-SEM6/public/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.75 Safari/537.36', 'en-US,en;q=0.9', 'http://127.0.0.1/PI-SEM6/public/login', 'POST', '2018-07-26 17:43:22', '2018-07-26 17:43:22', NULL);

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
  `id_akun` int(4) NOT NULL,
  `id_tipe` int(1) NOT NULL,
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

--
-- Dumping data untuk tabel `operasional`
--

INSERT INTO `operasional` (`id`, `tgl`, `keterangan`, `jumlah`, `total`, `created_at`, `updated_at`, `status_akunting`) VALUES
(1, '2018-07-04', 'Biaya operasional tgl 4 juli\'18', 225000, 225000, '2018-07-20 03:10:51', '2018-07-20 03:10:51', 1),
(2, '2018-07-20', 'bayar operasional pdam tgl 20 july', 100000, 156000, '2018-07-20 04:04:34', '2018-07-20 04:04:34', 1),
(3, '2018-07-20', 'bayar lain-lain', 56000, 156000, '2018-07-20 04:04:34', '2018-07-20 04:04:34', 1),
(4, '2018-07-21', 'biaya operasioanl lain-lain', 320000, 320000, '2018-07-20 03:21:15', '2018-07-20 03:21:15', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasien`
--

CREATE TABLE `pasien` (
  `id` int(3) UNSIGNED NOT NULL,
  `no_rm` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_pasien` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategoripasien_id` int(3) NOT NULL,
  `golongan_darah` char(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_kelamin` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `kota_id` int(4) NOT NULL,
  `kec_id` int(4) NOT NULL,
  `kel_id` int(4) NOT NULL,
  `kontak` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pekerjaan` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_pernikahan` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_kk` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `namaIbuKandung` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `namaAyahKandung` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TanggalLahir` date NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pasien`
--

INSERT INTO `pasien` (`id`, `no_rm`, `nama_pasien`, `kategoripasien_id`, `golongan_darah`, `jenis_kelamin`, `alamat`, `kota_id`, `kec_id`, `kel_id`, `kontak`, `pekerjaan`, `status_pernikahan`, `no_kk`, `namaIbuKandung`, `namaAyahKandung`, `TanggalLahir`, `created_at`, `updated_at`) VALUES
(1, '0001', 'Aulia Racmania', 1, 'A', 'Perempuan', 'perumahan abc', 2, 10, 46, '(0181) 8272-727', '-', 'Menikah', '1010122292', 'Lulu Romani', 'Josua Teriyanto', '1990-06-06', '2018-07-02', '2018-07-02 09:27:18'),
(2, '0002', 'Alan Delon Tarigan', 1, 'B', 'Laki-laki', 'perumahan depok novo', 2, 10, 46, '(0181) 8182-929', '-', 'Belum Menikah', '223334445566677', 'Dewi', 'Ruslan Tarigan', '2002-08-20', '2018-07-13', '2018-07-13 04:17:36'),
(3, '0003', 'Amsal delima', 1, 'A', 'Laki-laki', 'perumahan abc', 1, 1, 2, '(0101) 8182-829', '-', 'Belum Menikah', '2223334455566', 'Angel Elizabeth', 'Valerian', '2009-11-06', '2018-07-15', '2018-07-15 14:44:37'),
(4, '0004', 'Taufik Hidayat', 2, 'B', 'Laki-laki', 'perumahan asri jakarta', 1, 2, 9, '(0101) 1181-829', 'Buruh', 'Menikah', '111122233388876', 'Nonon', 'Suwandi', '1987-06-25', '2018-07-15', '2018-07-15 15:49:02'),
(5, '0005', 'Waluyo Suroboyo', 1, 'AB', 'Laki-laki', 'jl. kebun jeruk purut no.14', 2, 11, 57, '(0119) 1818-292', 'Petani', 'Menikah', NULL, 'Romani', 'Rumowo', '1973-05-16', '2018-07-15', '2018-07-15 15:50:56'),
(6, '0006', 'Nining Yuliani', 1, 'B', 'Perempuan', 'perumahan graha jakpus', 1, 4, 21, '(0816) 2525-337', 'Ibu Rumah Tangga', 'Menikah', '3334445522111', 'Fatmawati', 'Farhan', '1990-06-21', '2018-07-15', '2018-07-15 16:07:29'),
(7, '0007', 'Wiwik windayani', 2, 'O', 'Perempuan', 'perumahan abcd', 2, 10, 53, '(0821) 8282-920', 'Akunting', 'Menikah', '2223333221111', 'Verona', 'Yono', '1991-03-07', '2018-07-15', '2018-07-15 15:55:33'),
(8, '0008', 'Ardi Sudratjat', 2, 'B', 'Laki-laki', 'perumahan graha asir', 1, 9, 44, '(0101) 8181-811', 'Wiraswasta', 'Menikah', '3555333322111', 'Yuni', 'Yanang', '1968-07-19', '2018-07-15', '2018-07-15 15:59:01'),
(9, '0009', 'Umi Rahayu', 1, 'A', 'Perempuan', 'jl. graha selatan , jakpus no.19', 1, 2, 7, '(0101) 8118-181', 'Ibu Rumah Tangga', 'Menikah', '112344456432111', 'Suzana', 'Sukanto', '1989-07-19', '2018-07-15', '2018-07-15 16:02:05'),
(10, '0010', 'Eswanto', 2, 'A', 'Laki-laki', 'perumahan bendungan no.17', 1, 9, 44, '(0181) 8229-292', 'It consultant', 'Menikah', '191912882818', 'Suyati', 'Syah ahmda', '1975-10-21', '2018-07-15', '2018-07-15 16:06:45'),
(11, '0011', 'Troy Eben', 1, 'A', 'Laki-laki', 'perumahan gandaria residence blok f4/29, jakarta sealatan no.18', 3, 12, 68, '(0101) 8282-929', '-', 'Belum Menikah', '112333445566', 'Esther', 'Johan', '2004-07-28', '2018-07-26', '2018-07-26 15:34:17');

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
  `vendor_id` int(3) NOT NULL,
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
  `id` int(3) NOT NULL,
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

--
-- Dumping data untuk tabel `pemberian_obat`
--

INSERT INTO `pemberian_obat` (`id`, `tgl`, `no_pend`, `pasien_id`, `jenis_id`, `obat_id`, `jumlah`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, '2018-07-12', '0001', 1, 2, 1, 4, 'lorem ipsum dolor sit amet', '2018-07-12', '2018-07-14'),
(2, '2018-07-14', '0002', 2, 1, 2, 5, 'lorem ipsum dolor sit amet', '2018-07-14', '2018-07-14'),
(3, '2018-07-26', '0011', 3, 2, 1, 3, 'minum sebelum makan', '2018-07-26', '2018-07-26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemeriksaan`
--

CREATE TABLE `pemeriksaan` (
  `id_pemeriksaan` int(4) NOT NULL,
  `id_kpemeriksaan` int(3) NOT NULL,
  `id_dpemeriksaan` int(3) NOT NULL,
  `reservasi_id` int(4) NOT NULL,
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

--
-- Dumping data untuk tabel `pemeriksaan`
--

INSERT INTO `pemeriksaan` (`id_pemeriksaan`, `id_kpemeriksaan`, `id_dpemeriksaan`, `reservasi_id`, `tgl`, `no_faktur`, `tarif`, `disc`, `total`, `disc_result`, `disc_dokter`, `disc_dokter_result`, `disc_klinik`, `disc_klinik_result`, `u_id`, `created_at`, `updated_at`, `status_akunting`) VALUES
(1, 4, 4, 1, '2018-07-09', '1807090001', 100000, 0, 100000, 0, 0, 0, 100, 100000, 1, '2018-07-20 04:05:21', '2018-07-20 04:05:21', 1),
(2, 3, 1, 6, '2018-07-26', '180726002', 130000, 0, 130000, 0, 30, 39000, 70, 91000, 1, '2018-07-26 15:43:11', '2018-07-26 15:43:11', 1),
(3, 4, 2, 3, '2018-07-26', '18072603', 100000, 50, 50000, 50000, 40, 20000, 60, 30000, 1, '2018-07-26 15:37:06', '2018-07-26 15:37:06', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
--

CREATE TABLE `petugas` (
  `id` int(3) UNSIGNED NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `spesialisasi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `kota` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_telp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl_mulai_praktek` date NOT NULL,
  `img` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'user_default.png',
  `category_id` int(3) NOT NULL,
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
(1, 'DR.Juan Valerian Delima', 'Jantung', 'perumahan gmm bekasi', 'Bekasi', '(0182) 8727-8211', '(0181) 8182-7272', 'juanvaleriand@gmail.com', '2018-07-02', '9925-user_default.png', 1, '08:20:00', '19:00:00', NULL, NULL, '07:10:00', '17:00:00', NULL, NULL, '08:00:00', '20:00:00', '10:00:00', '16:00:00', NULL, NULL, '2018-07-02 09:29:09', '2018-07-08 08:31:03'),
(2, 'Silvia Harlena', 'Kulit', 'perumahan asri depok, no 17', 'Depok', '(0101) 9929-2929', '(0101) 0182-8282', 'silvia@mail.com', '2018-07-13', '7575-user_default.png', 1, '08:00:00', '22:10:00', '09:00:00', '21:00:00', '10:29:00', '16:00:00', '10:29:00', '20:14:00', NULL, NULL, NULL, NULL, NULL, NULL, '2018-07-13 03:27:10', '2018-07-13 03:29:30'),
(3, 'Bastian Delima', 'It network', 'perumahan gmm blok c1 no 12', 'Bekasi', '(0181) 8181-9292', '(0117) 1718-2828', 'bastiand@mail.com', '2018-07-17', '2375-alaligo-float.png', 2, '07:15:00', '20:00:00', NULL, NULL, '10:00:00', '21:30:00', '08:48:00', '22:48:00', NULL, NULL, NULL, NULL, '22:48:00', NULL, '2018-07-17 15:39:20', '2018-07-17 15:48:46'),
(4, 'Suwanto', 'Gigi', 'Perumahan villa asri no.19', 'Jakarta Barat', '(0171) 7182-8292', '(0171) 7182-8292', 'suwanto@mail.com', '2018-07-24', '', 1, '08:20:00', '20:00:00', '09:00:00', '19:49:00', '22:49:00', '19:49:00', '10:00:00', '20:49:00', '13:50:00', '20:50:00', '08:50:00', '16:00:00', NULL, NULL, '2018-07-17 15:40:24', '2018-07-17 15:50:57'),
(5, 'Chrsti', 'THT', 'perumahan simprug blok a1/no 10', 'Tanggerang', '(0181) 8127-2722', '(0181) 7162-6272', 'christi@mail.com', '2018-07-17', '5782-1511088192291.jpg', 1, '07:30:00', '21:30:00', NULL, NULL, '08:00:00', '20:30:00', NULL, NULL, NULL, NULL, NULL, NULL, '10:53:00', '21:00:00', '2018-07-17 15:42:11', '2018-07-17 15:53:34'),
(6, 'Dewi sandra', 'Mata', 'perumahan jakarta asri blok f8//10', 'Jakarta Utara', '(0191) 8181-8182', '(0191) 9192-2929', 'dewis@mail.com', '2018-07-17', '1155-CIMG0191.JPG', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '10:00:00', '19:30:00', '09:30:00', '20:00:00', '10:30:00', '21:00:00', '2018-07-17 15:44:52', '2018-07-17 15:55:37'),
(7, 'Agisha Riyani', 'Gigi', 'perumahan bogor astri blok a7/no 9', 'Bogor', '(0101) 0288-2282', '(0019) 9230-4109', 'agisha@mail.com', '2018-07-17', '8499-1511088192291.jpg', 1, NULL, NULL, NULL, NULL, '08:00:00', '17:00:00', '10:30:00', '21:00:00', NULL, NULL, '10:00:00', '20:00:00', '10:30:00', '16:30:00', '2018-07-17 15:46:40', '2018-07-17 16:00:13');

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

INSERT INTO `rekam_medis` (`id_rm`, `res_id`, `tgl`, `rmkeluhan`, `rmpemeriksaan`, `rmalergiobat`, `rmterapi`, `rmresep`, `rmkesimpulan`, `rmdiagnosa`, `kondisi_pasien`, `u_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2018-07-09', 'sering sesak nafas kalo liat mntan jalan sama pacar baru', 'scan x-ray pada jantung', 'tidak ada', 'jangan mikirin dia terus', 'menyusul', 'semangat yaa badai pasti berlalu', 'Sakit jantung', 'DALAM PROSES PENYEMBUHAN', 1, '2018-07-12 10:29:50', '2018-07-12 10:29:50'),
(2, 2, '2018-07-13', 'sering gatal kalo kena udara dingin', 'jangan kena udara dingin', 'tidak ada', 'minum es', 'menyusul', '-', 'gatal-gatal', 'DALAM PROSES PENYEMBUHAN', 1, '2018-07-14 08:56:38', '2018-07-14 08:56:38'),
(3, 6, '2018-07-26', 'sering nyeri kalo gigit es batu', 'periksan gusi gigi', 'tidak ada', 'jangan terlalu makan es berlebihan', 'menyusul', '-', 'gigi nyeri', 'DALAM PROSES PENYEMBUHAN', 1, '2018-07-26 15:39:45', '2018-07-26 15:39:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `reservasi`
--

CREATE TABLE `reservasi` (
  `id_res` int(4) NOT NULL,
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

--
-- Dumping data untuk tabel `reservasi`
--

INSERT INTO `reservasi` (`id_res`, `kd_res`, `poli_id`, `pasien_id`, `dokter_id`, `status_res`, `no_urut`, `no_rm`, `u_id`, `created_at`, `updated_at`) VALUES
(1, '180709001', 5, 1, 1, 'Sudah', '001', '0001', 1, '2018-07-09', '2018-07-12 10:29:50'),
(2, '180713002', 2, 2, 2, 'Sudah', '002', '0002', 1, '2018-07-13', '2018-07-14 08:56:38'),
(3, '180715003', 5, 10, 2, 'Belum', '003', '0010', 1, '2018-07-15', '2018-07-15 16:08:41'),
(4, '180715004', 2, 4, 1, 'Belum', '004', '0004', 1, '2018-07-15', '2018-07-15 16:09:20'),
(5, '180715005', 2, 7, 2, 'Belum', '005', '0007', 1, '2018-07-15', '2018-07-15 16:10:08'),
(6, '180726006', 6, 11, 7, 'Sudah', '006', '0011', 1, '2018-07-26', '2018-07-26 15:39:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tipe_akun`
--

CREATE TABLE `tipe_akun` (
  `id_tipe` int(1) NOT NULL,
  `nama_tipe` varchar(13) NOT NULL,
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
  `id_tipe` int(1) NOT NULL,
  `tgl` date NOT NULL,
  `keterangan` text,
  `pengeluaran` bigint(20) NOT NULL,
  `pemasukan` bigint(20) NOT NULL,
  `nominal` bigint(20) NOT NULL,
  `jumlah` int(3) NOT NULL,
  `u_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `id_pemeriksaan` int(3) DEFAULT NULL,
  `id_donasi_uang` int(3) DEFAULT NULL,
  `id_honor` int(3) DEFAULT NULL,
  `id_pembelian` int(3) DEFAULT NULL,
  `id_operasional` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_akun`, `id_tipe`, `tgl`, `keterangan`, `pengeluaran`, `pemasukan`, `nominal`, `jumlah`, `u_id`, `created_at`, `updated_at`, `id_pemeriksaan`, `id_donasi_uang`, `id_honor`, `id_pembelian`, `id_operasional`) VALUES
(1, 1, 1, '2018-07-02', 'Kas harian klinik', 0, 500000, 500000, 1, 1, '2018-07-02 09:32:11', '2018-07-02 09:32:11', NULL, NULL, NULL, NULL, NULL),
(3, 5, 4, '2018-07-02', 'Pembayaran PLN tgl 2 juli\'18', 75000, 0, 75000, 1, 1, '2018-07-02 09:36:16', '2018-07-02 09:36:16', NULL, NULL, NULL, NULL, NULL),
(4, 3, 2, '2018-07-02', 'Modal awal klinik', 0, 1000000, 1000000, 1, 1, '2018-07-02 09:37:43', '2018-07-02 09:37:43', NULL, NULL, NULL, NULL, NULL),
(6, 5, 4, '2018-07-13', 'pembayaran PLN tgl 13 july', 175000, 0, 175000, 1, 1, '2018-07-13 04:12:11', '2018-07-13 04:12:11', NULL, NULL, NULL, NULL, NULL),
(7, 1, 1, '2018-07-13', 'kas harian keluar tgl 13 july', 120000, 0, 120000, 1, 1, '2018-07-13 04:15:05', '2018-07-13 04:12:50', NULL, NULL, NULL, NULL, NULL),
(8, 1, 1, '2018-07-17', 'beli ball point sebungkus tgl 17 july', 120000, 0, 120000, 1, 1, '2018-07-17 16:29:23', '2018-07-17 16:29:23', NULL, NULL, NULL, NULL, NULL),
(10, 11, 4, '2018-07-20', 'pembayaran operasional', 225000, 0, 225000, 1, 1, '2018-07-20 03:10:51', '2018-07-20 03:10:51', NULL, NULL, NULL, NULL, 1),
(11, 5, 4, '2018-07-20', 'pembayaran PLN tgl 20 juli\'18', 350000, 0, 350000, 1, 1, '2018-07-20 04:03:26', '2018-07-20 04:03:26', NULL, NULL, NULL, NULL, NULL),
(12, 11, 4, '2018-07-20', 'pembayaran operasioanl tgl 20 juli\'18', 156000, 0, 156000, 1, 1, '2018-07-20 04:04:34', '2018-07-20 04:04:34', NULL, NULL, NULL, NULL, 2),
(13, 4, 3, '2018-07-20', '[1807090001] pemeriksaan Aulia Racmania - POLI JANTUNG', 0, 100000, 100000, 1, 1, '2018-07-20 04:05:21', '2018-07-20 04:05:21', 1, NULL, NULL, NULL, NULL),
(14, 1, 1, '2018-07-20', 'kas harian masuk tgl 20 juli\'18', 0, 1200000, 1200000, 1, 1, '2018-07-20 04:07:08', '2018-07-20 04:07:08', NULL, NULL, NULL, NULL, NULL),
(15, 8, 3, '2018-07-20', 'Sumbangan untuk infrastruktur klinik', 0, 6000000, 6000000, 1, 1, '2018-07-20 04:08:49', '2018-07-20 04:08:49', NULL, 1, NULL, NULL, NULL),
(16, 4, 3, '2018-07-26', '[180726002] - pemeriksaan Troy Eben - POLI ANAK', 0, 130000, 130000, 1, 1, '2018-07-26 15:43:11', '2018-07-26 15:43:11', 2, NULL, NULL, NULL, NULL);

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
  `datapemeriksaan` int(1) NOT NULL,
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

INSERT INTO `users` (`id`, `username`, `first_name`, `last_name`, `password`, `img`, `admin`, `petugasmedis`, `vendorobat`, `daftarobat`, `datapoli`, `datapemeriksaan`, `pasien`, `peralatan`, `rekmedis`, `rekkeuangan`, `akunting`, `lpmedis`, `lpakunting`, `setuser`, `sethonor`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Administrator', 'admin', '$2y$10$QltuGMUkUyg3ZRiQ7oIVj.iIhplXbzeXfSLN8KvsHhLhzeS5UMvtK', '6516-leon-page@2x.jpg', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 'vyQE62Q63BIgIIC865AajfDvA2ADTLtoLsI2rJHExGfNQgZ6sew7nyCExLOg', '2018-04-23 00:34:08', '2018-06-19 10:31:20'),
(4, 'dr_juanvaleriand', 'Dr. Juan Valerian', 'Delima', '$2y$10$KYQeZpi4QL7tivnx9yrs5uTIwLM.OyKPI8RVn5AsJuULsUl50cpJO', '7991-user_default.png', 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 'LuupGRPcJFckmik0rcM85HsIERk4oHPGf6LlNBnMuHI98BDycL5NRWeKEl9D', '2018-07-08 08:35:48', '2018-07-08 08:35:48'),
(5, 'keuangan', 'Agatha', 'Chealsea', '$2y$10$Lq2lTHNpvfAAubYs8j9hzuoeX9famI5PrpiedOd2/5i/QCMLy/xHS', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 'abS8q4MYVpF13en7WLZSXSNvhjVqNu6HBaMH6QVfjL82IJFDI82ddnS0CV12', '2018-07-08 15:10:09', '2018-07-08 15:10:09'),
(6, 'joko', 'Joko', 'Susanto', '$2y$10$qCvkFJq4ne4k6rWGxkj95.tf5scJsh6X0vxpk2/c5rb.Wg2GBzzVe', '3690-iconmonstr-user-6-240.png', 0, 1, 1, 1, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 'GkcFYEMiSlN8laFAIQTBhEpDUU7PmDlIQk5Wh5Q531AzoL2g2BXNA0VEloFI', '2018-07-19 12:30:11', '2018-07-19 12:30:11'),
(7, 'maria', 'Maria', 'Shandi', '$2y$10$D6AyFgf/WMpL1yvPg6q6ke8vWYvDSOsRvnL5ZL7dR6p1M6BlTdYrq', '3595-maria.jpg', 0, 1, 0, 0, 0, 0, 1, 0, 0, 1, 1, 0, 1, 0, 0, 'OoxEmZlyFwoKiQJwRI62U5DI90mPsrgsvmyKdHtSCLQjMNhNKqg28ohXtDgq', '2018-07-19 12:32:21', '2018-07-19 12:33:47');

-- --------------------------------------------------------

--
-- Struktur dari tabel `vendor_obat`
--

CREATE TABLE `vendor_obat` (
  `id` int(3) NOT NULL,
  `nama_vendor` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(12) NOT NULL,
  `no_hp` varchar(12) DEFAULT NULL,
  `pic` varchar(50) NOT NULL,
  `email` varchar(25) DEFAULT NULL,
  `deskripsi` text,
  `obat_id` int(3) NOT NULL,
  `catatan` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `vendor_obat`
--

INSERT INTO `vendor_obat` (`id`, `nama_vendor`, `alamat`, `no_telp`, `no_hp`, `pic`, `email`, `deskripsi`, `obat_id`, `catatan`, `created_at`, `updated_at`) VALUES
(1, 'Cyntia', 'perumahan abc', '081727262424', '081727252522', 'Delima', 'cytia@mail.com', 'lorem ipsum dolor', 1, 'lorem ipsum dolor sit amet', '2018-07-14 04:19:55', '2018-07-14 04:19:55'),
(2, 'Cyntia', 'perumahan abc', '081727262424', '081727252522', 'Delima', 'cytia@mail.com', 'lorem ipsum dolor', 2, 'lorem ipsum dolor sit amet', '2018-07-14 04:19:55', '2018-07-14 04:19:55');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `alat_medis`
--
ALTER TABLE `alat_medis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `conf_honor`
--
ALTER TABLE `conf_honor`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `data_pemeriksaan`
--
ALTER TABLE `data_pemeriksaan`
  MODIFY `id_dpemeriksaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `days`
--
ALTER TABLE `days`
  MODIFY `id` int(1) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `day_petugas`
--
ALTER TABLE `day_petugas`
  MODIFY `id` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `donasi_obat`
--
ALTER TABLE `donasi_obat`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `donasi_uang`
--
ALTER TABLE `donasi_uang`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `honor`
--
ALTER TABLE `honor`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jenis_obat`
--
ALTER TABLE `jenis_obat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jenis_obat_detail`
--
ALTER TABLE `jenis_obat_detail`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kategoripasien`
--
ALTER TABLE `kategoripasien`
  MODIFY `id` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kategori_pemeriksaan`
--
ALTER TABLE `kategori_pemeriksaan`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `id` int(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `kelurahan`
--
ALTER TABLE `kelurahan`
  MODIFY `id` int(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `kota`
--
ALTER TABLE `kota`
  MODIFY `id` int(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `laravel_logger_activity`
--
ALTER TABLE `laravel_logger_activity`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `nama_akun`
--
ALTER TABLE `nama_akun`
  MODIFY `id_akun` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `operasional`
--
ALTER TABLE `operasional`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pemberian_obat`
--
ALTER TABLE `pemberian_obat`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pemeriksaan`
--
ALTER TABLE `pemeriksaan`
  MODIFY `id_pemeriksaan` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `poli`
--
ALTER TABLE `poli`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `rekam_medis`
--
ALTER TABLE `rekam_medis`
  MODIFY `id_rm` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `reservasi`
--
ALTER TABLE `reservasi`
  MODIFY `id_res` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tipe_akun`
--
ALTER TABLE `tipe_akun`
  MODIFY `id_tipe` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `vendor_obat`
--
ALTER TABLE `vendor_obat`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
