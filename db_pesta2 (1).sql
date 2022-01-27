-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 30, 2021 at 08:57 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pesta2`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `nama`, `username`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'admin', 'admin@gmail.com', '$2y$10$fE/VEp9u004bHTktqOKeDeSYTfxvOQUlK8x8jVhr6V/4qZ26CLhLC', '2019-07-29 05:10:46', '2019-07-29 05:10:46');

-- --------------------------------------------------------

--
-- Table structure for table `alats`
--

CREATE TABLE `alats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_pemilik` bigint(20) UNSIGNED NOT NULL,
  `id_kategori` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stok` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `tipe` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `alats`
--

INSERT INTO `alats` (`id`, `id_pemilik`, `id_kategori`, `nama`, `slug`, `keterangan`, `gambar`, `stok`, `harga`, `tipe`, `created_at`, `updated_at`) VALUES
(21, 1, 2, 'Kursi Plastik', 'kursi-plastik', 'kursi plastik ringan\r\nharga per 100 kursi', 'alat/o4wMakrK808iNfWtb16GQQOwajp8dz03Dd9qgVgc.png', 500, 5000, 'Alat', '2021-06-10 05:59:09', '2021-06-13 18:38:12'),
(22, 1, 4, 'Tenda Terpal Biasa', 'tenda-terpal-biasa', 'tenda terpal biasa\r\nukuran 2x4', 'alat/xqCCHqyXkVAMxpSA8WcsdM2ZgZ5bBksYGlagp1gd.png', 2, 500000, 'Alat', '2021-06-10 06:00:09', '2021-07-07 14:52:59'),
(23, 1, 4, 'Tenda Terpal Biasa', 'tenda-terpal-biasa', 'tenda terpal biasa\r\nukuran 3x4', 'alat/X40qfZEGpcDuL77GFX85iXJ9jzAcTKRnSyrkA1HG.png', 2, 550000, 'Alat', '2021-06-10 06:00:48', '2021-06-26 13:36:37'),
(24, 1, 4, 'Tenda Terpal Biasa', 'tenda-terpal-biasa', 'tenda terpal biasa\r\nukuran 4x5', 'alat/LOyLTOKlEaQ9CXB8cxnDq9qlbPcNFwZxrEGMwL22.png', 2, 600000, 'Alat', '2021-06-10 06:02:15', '2021-06-10 06:02:15'),
(25, 1, 4, 'Tenda Terpal Biasa', 'tenda-terpal-biasa', 'tenda terpal biiasa \r\nukuran 5x6', 'alat/0YDpwWYAHvg47ocwK0tzgHTCb8BL98XcAGEmpCUm.png', 4, 650000, 'Alat', '2021-06-10 06:02:58', '2021-06-10 06:03:58'),
(26, 1, 4, 'Tenda Terpal Biasa', 'tenda-terpal-biasa', 'tenda terpal biasa\r\nukuran 6x6', 'alat/e9zpROsaLb1emr4R6sQRfiKfQlZgSWxJmhJp6HbY.png', 4, 700000, 'Alat', '2021-06-10 06:03:44', '2021-06-10 06:03:44'),
(27, 1, 4, 'Tenda Semi Spesial', 'tenda-semi-spesial', 'tenda semi spesial\r\nukuran 3x4', 'alat/yhu4QxxT40VSQrxVJjZA8RTc9mdQWCChjQnpRjtj.png', 2, 600000, 'Alat', '2021-06-10 06:05:03', '2021-06-10 06:05:03'),
(28, 1, 4, 'Tenda Semi Spesial', 'tenda-semi-spesial', 'tenda semi spesial\r\nukuran 4x5', 'alat/Li4tG7ssVwQ52rmV3ipB1nW5kaoyTYgRejBpfpY2.png', 2, 700000, 'Alat', '2021-06-10 06:06:07', '2021-07-07 14:52:47'),
(29, 1, 4, 'Paket Komplit  VIP', 'paket-komplit-vip', 'paket komplit vip\r\ntenda ukuran 5x6\r\nkursi 300\r\nsound system besar', 'alat/iA5kIwFxk8ENmRYG8Ft4ZAa5KmtoVe5WXl2Ow2vS.png', 4, 1200000, 'Paketan', '2021-06-10 06:08:07', '2021-06-28 02:31:00'),
(30, 1, 4, 'Paket Komplit VIP', 'paket-komplit-vip', 'paket komplit vip\r\ntenda ukuran 6x6\r\nkursi 400\r\nkarpet\r\nsound system besar', 'alat/AP0sBHwyWFv8EysvFxPYrllo42muyYKqRmXFN5c0.png', 4, 1400000, 'Paketan', '2021-06-10 06:09:19', '2021-07-08 05:35:41');

-- --------------------------------------------------------

--
-- Table structure for table `kategoris`
--

CREATE TABLE `kategoris` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategoris`
--

INSERT INTO `kategoris` (`id`, `nama`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Panggung', 'panggung', '2019-07-29 05:14:09', '2019-07-29 05:14:09'),
(2, 'Meja Kursi', 'meja-kursi', '2019-07-29 05:14:20', '2019-07-29 05:14:20'),
(3, 'Musik & Elektrik', 'musik-elektrik', '2019-07-29 05:14:30', '2019-07-29 05:14:30'),
(4, 'Tenda', 'tenda', '2021-06-09 08:45:38', '2021-06-09 08:45:38');

-- --------------------------------------------------------

--
-- Table structure for table `keranjangs`
--

CREATE TABLE `keranjangs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_penyewa` bigint(20) UNSIGNED NOT NULL,
  `id_alat` bigint(20) UNSIGNED DEFAULT NULL,
  `id_paketan` bigint(20) UNSIGNED DEFAULT NULL,
  `qty` int(10) UNSIGNED NOT NULL,
  `total` int(10) UNSIGNED NOT NULL,
  `durasi` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl_pinjam` timestamp NULL DEFAULT NULL,
  `tgl_kembali` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_07_28_194852_create_admins_table', 1),
(4, '2019_07_28_194915_create_owners_table', 1),
(5, '2019_07_29_013900_create_tokos_table', 1),
(6, '2019_07_29_034059_create_kategoris_table', 1),
(7, '2019_07_29_042517_create_alats_table', 1),
(8, '2019_07_29_092133_create_paketans_table', 1),
(10, '2019_07_29_092211_create_keranjangs_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `owners`
--

CREATE TABLE `owners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `telp` char(13) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_rek` varchar(16) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `owners`
--

INSERT INTO `owners` (`id`, `nama`, `foto`, `email`, `username`, `email_verified_at`, `password`, `status`, `telp`, `no_rek`, `alamat`, `bank`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Sugiarto', '', 'medaengjaya@gamail.com', 'sugiarto', '2021-06-12 09:45:35', '$2y$10$fE/VEp9u004bHTktqOKeDeSYTfxvOQUlK8x8jVhr6V/4qZ26CLhLC', 1, '083892360652', '7894256451245875', 'Jl, Imam Bonjol, Medaeng, Waru, Sidoarjo', NULL, NULL, '2019-07-29 05:17:55', '2019-07-29 05:17:55'),
(2, 'aan', 'foto/hUmU4qhO0gUyh9O1A7WIPldVlax7lZf9IfrIkGkn.png', 'aan@gmail.com', 'aan', '2021-06-08 06:42:44', '$2y$10$fE/VEp9u004bHTktqOKeDeSYTfxvOQUlK8x8jVhr6V/4qZ26CLhLC', 1, '083892360650', '1111254135269875', 'sidoarjooooooo', 'BRI', NULL, '2021-06-08 06:23:36', '2021-06-08 17:06:11'),
(5, 'hapis', 'foto/8cUabbzhVheL3s7fPz7cwSxAnoaEwNC2dP8nMO22.png', 'hapis@gmail.com', 'hapis', '2021-06-08 04:40:32', '$2y$10$YQUdqvbNXSQueQCc8LLtIOeBw5Layl0RuM7cmsmEnm6aihtP52Ivy', 1, '088213564852', '1111236525645546', 'surabayaaaaaaaaaa', 'BRI', NULL, '2021-06-08 16:40:19', '2021-06-08 16:43:31');

-- --------------------------------------------------------

--
-- Table structure for table `paketans`
--

CREATE TABLE `paketans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_pemilik` bigint(20) UNSIGNED NOT NULL,
  `id_kategori` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stok` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `tipe` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `paketans`
--

INSERT INTO `paketans` (`id`, `id_pemilik`, `id_kategori`, `nama`, `slug`, `keterangan`, `gambar`, `stok`, `harga`, `tipe`, `created_at`, `updated_at`) VALUES
(1, 2, 3, 'Paket Lengkap Full', 'paket_lengkap', 'Paket Lengkap', '1', 1, 1000000, 'Paketan', '2021-06-08 07:18:44', '2021-06-08 07:18:44');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pembayarans`
--

CREATE TABLE `pembayarans` (
  `id` int(10) NOT NULL,
  `id_penyewa` varchar(10) NOT NULL,
  `no_transaksi` varchar(15) NOT NULL,
  `id_alat` varchar(10) DEFAULT NULL,
  `id_paketan` varchar(10) DEFAULT NULL,
  `qty` varchar(10) NOT NULL,
  `nama` varchar(15) DEFAULT NULL,
  `jumlah` varchar(50) DEFAULT NULL,
  `harga` varchar(50) DEFAULT NULL,
  `total` varchar(50) NOT NULL,
  `tgl_pinjam` varchar(20) NOT NULL,
  `tgl_kembali` varchar(20) NOT NULL,
  `durasi` varchar(5) NOT NULL,
  `nama_pemilik` varchar(15) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `transaction_status` varchar(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `bukti_user` varchar(100) DEFAULT NULL,
  `bukti_admin` varchar(100) DEFAULT NULL,
  `denda` varchar(10) DEFAULT NULL,
  `keterangan_denda` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembayarans`
--

INSERT INTO `pembayarans` (`id`, `id_penyewa`, `no_transaksi`, `id_alat`, `id_paketan`, `qty`, `nama`, `jumlah`, `harga`, `total`, `tgl_pinjam`, `tgl_kembali`, `durasi`, `nama_pemilik`, `updated_at`, `transaction_status`, `created_at`, `status`, `bukti_user`, `bukti_admin`, `denda`, `keterangan_denda`) VALUES
(21, '3', 'MJ-7947', '23', NULL, '1', NULL, NULL, NULL, '550000', '24 Jun 2021', '26 Jun 2021', '2', NULL, '2021-06-26 13:28:24', 'pending', '2021-06-23 03:57:52', 3, 'bukti/yArhuhjfKCZ5ymmwrovio0M2M7VF7SHZSnyghmnw.png', NULL, '50000', 'rusak'),
(22, '3', 'MJ-9765', '23', NULL, '1', NULL, NULL, NULL, '550000', '24 Jun 2021', '26 Jun 2021', '2', NULL, '2021-06-26 13:36:37', 'pending', '2021-06-23 03:59:17', 3, 'bukti/zxZzxsvPB4piUEx58LqX8m9UVpZLl1inbYPN6qL3.png', NULL, NULL, NULL),
(23, '3', 'MJ-6092', '22', NULL, '2', NULL, NULL, NULL, '4000000', '27 Jun 2021', '29 Jun 2021', '2', NULL, '2021-07-07 14:52:59', 'pending', '2021-06-26 10:56:29', 3, NULL, NULL, '0', '-'),
(24, '3', 'MJ-1413', '29', NULL, '1', NULL, NULL, NULL, '2400000', '27 Jun 2021', '29 Jun 2021', '2', NULL, '2021-06-26 13:55:14', 'pending', '2021-06-26 13:40:04', 3, NULL, NULL, NULL, NULL),
(40, '3', 'MJ-655', '30', NULL, '1', NULL, NULL, NULL, '2800000', '09 Jul 2021', '11 Jul 2021', '2', NULL, '2021-07-07 20:09:01', NULL, '2021-07-07 20:08:19', 3, NULL, NULL, NULL, NULL),
(61, '3', 'MJ-8942', '30', NULL, '1', NULL, NULL, NULL, '2800000', '09 Jul 2021', '11 Jul 2021', '2', NULL, '2021-07-07 20:27:06', NULL, '2021-07-07 20:26:15', 3, NULL, NULL, NULL, NULL),
(62, '3', 'MJ-2254', '30', NULL, '1', NULL, NULL, NULL, '2800000', '09 Jul 2021', '11 Jul 2021', '2', NULL, '2021-07-12 18:33:43', NULL, '2021-07-08 04:26:06', 2, NULL, NULL, '0', '100000'),
(74, '7', 'MJ-7199', '30', NULL, '2', NULL, NULL, NULL, '8400000', '11 Jul 2021', '14 Jul 2021', '3', NULL, '2021-07-12 18:33:38', NULL, '2021-07-08 05:33:05', 1, NULL, NULL, '0', '-');

-- --------------------------------------------------------

--
-- Table structure for table `pemesanans`
--

CREATE TABLE `pemesanans` (
  `id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tokos`
--

CREATE TABLE `tokos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telp` char(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_pemilik` bigint(20) UNSIGNED NOT NULL,
  `foto_toko` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tokos`
--

INSERT INTO `tokos` (`id`, `nama`, `slug`, `alamat`, `telp`, `keterangan`, `id_pemilik`, `foto_toko`, `created_at`, `updated_at`) VALUES
(1, 'Medaeng Jaya', 'medaeng-jaya', 'Jl Srikandi no 7 rt 03 rw 05 Desa Lengkong', '083861356658', 'Medaeng Jaya', 1, 'toko/o6AbpBf4Zc7ZKB4V6GZp6lsCmj4YOCe9Psi7Q6OW.png', '2019-07-29 05:20:20', '2021-07-04 19:36:34'),
(2, 'Medaeng Jaya', 'medaeng-jaya', 'Medaeng', '083892360650', 'Menyediakan Alat Pesta', 2, 'toko/rxWLvANlwGd4dvReXAFLgerajl20CRrIQ9t6Y47x.png', '2021-06-08 06:48:48', '2021-06-08 17:06:54'),
(3, 'Wage Indah', 'wage-indah', NULL, NULL, 'Penyedia Alat Pesta', 5, 'toko/lqaVL5zwrVyFRfHU4PjLWU2Y2VlIyqIyFCASSJLh.png', '2021-06-08 16:45:48', '2021-06-08 16:45:48');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `telp` char(13) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `member` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `username`, `email_verified_at`, `password`, `status`, `telp`, `alamat`, `member`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Ade Lutfi', 'adelutfi@gmail.com', 'adelutfi', NULL, '$2y$10$hL6h/TPEEJMUeYJuxFoYfOPzYr.cHurCAL9RIkhsxbFbC4W2/2pNu', 1, NULL, NULL, NULL, NULL, '2019-07-29 05:32:17', '2019-07-29 05:32:17'),
(3, 'abi', 'abi@gmail.com', 'abi', '2021-06-08 07:32:00', '$2y$10$mDIj01fPpUss54XPUan7feS5YqM3JFflNlRLtV3t8yPQGOEaoSKmW', 1, '083892360650', 'SIDOARJO', '1', NULL, '2021-06-08 06:27:09', '2021-06-15 07:33:46'),
(4, 'zam', 'zam@gmail.com', 'zam', '2021-06-08 09:35:35', '$2y$10$zk47rlfvLlJLtgbRd3tD7O4URkYGn4TWRsexNMse7WMEd1tpZisca', 1, '083892360658', 'sidoarjoooooooooooo', NULL, NULL, '2021-06-08 09:31:36', '2021-06-09 14:03:06'),
(5, 'hab', 'hab@gmail.com', 'hab', '2021-06-08 09:36:38', '$2y$10$3jXnk4FsyXWON6IwlnLSYOzq7w3G2zutqEX5OAJi2jkF8RpxMdapK', 1, NULL, NULL, NULL, NULL, '2021-06-08 09:32:27', '2021-06-08 09:32:27'),
(6, 'paino', 'paino@gmail.com', 'paino', NULL, '$2y$10$5SQbmXKfPP6HhD2c7JgZleDpxKo3vm.GS/qY65ryVLh4sFU1F7CKC', 1, NULL, NULL, NULL, NULL, '2021-06-15 07:22:52', '2021-06-15 07:22:52'),
(7, 'cer', 'cer@gmail.com', 'cer', '2021-06-28 01:52:11', '$2y$10$5OU5rtQGDmOxCc8UE0U5peCiFpJMX2PH/sQKipbUZQoAkgQe.YXyW', 1, '083892360652', 'ketintang baru, surabaya', NULL, NULL, '2021-06-28 01:46:23', '2021-07-08 05:05:38'),
(8, 'subhan', 'subhan@gmail.com', 'subhan', '2021-06-28 02:16:15', '$2y$10$tyuWc0WOzT7PM71NdxnLoeXuQg.YBNpi3LASpOFU7dKfySyGMqyiW', 1, '083892360655', 'jl teuku umar medaeng sidoarjo', NULL, NULL, '2021-06-28 02:15:57', '2021-06-28 02:21:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `alats`
--
ALTER TABLE `alats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `alats_id_pemilik_foreign` (`id_pemilik`),
  ADD KEY `alats_id_kategori_foreign` (`id_kategori`);

--
-- Indexes for table `kategoris`
--
ALTER TABLE `kategoris`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keranjangs`
--
ALTER TABLE `keranjangs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `keranjangs_id_penyewa_foreign` (`id_penyewa`),
  ADD KEY `keranjangs_id_alat_foreign` (`id_alat`),
  ADD KEY `keranjangs_id_paketan_foreign` (`id_paketan`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `owners`
--
ALTER TABLE `owners`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `owners_email_unique` (`email`),
  ADD UNIQUE KEY `owners_username_unique` (`username`),
  ADD UNIQUE KEY `owners_telp_unique` (`telp`),
  ADD KEY `nama` (`nama`);

--
-- Indexes for table `paketans`
--
ALTER TABLE `paketans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `paketans_id_pemilik_foreign` (`id_pemilik`),
  ADD KEY `paketans_id_kategori_foreign` (`id_kategori`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pembayarans`
--
ALTER TABLE `pembayarans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pemesanans`
--
ALTER TABLE `pemesanans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tokos`
--
ALTER TABLE `tokos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tokos_telp_unique` (`telp`),
  ADD KEY `tokos_id_pemilik_foreign` (`id_pemilik`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_telp_unique` (`telp`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `alats`
--
ALTER TABLE `alats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `kategoris`
--
ALTER TABLE `kategoris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `keranjangs`
--
ALTER TABLE `keranjangs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `owners`
--
ALTER TABLE `owners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `paketans`
--
ALTER TABLE `paketans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pembayarans`
--
ALTER TABLE `pembayarans`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `pemesanans`
--
ALTER TABLE `pemesanans`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tokos`
--
ALTER TABLE `tokos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `alats`
--
ALTER TABLE `alats`
  ADD CONSTRAINT `alats_id_kategori_foreign` FOREIGN KEY (`id_kategori`) REFERENCES `kategoris` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `alats_id_pemilik_foreign` FOREIGN KEY (`id_pemilik`) REFERENCES `owners` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `keranjangs`
--
ALTER TABLE `keranjangs`
  ADD CONSTRAINT `keranjangs_id_alat_foreign` FOREIGN KEY (`id_alat`) REFERENCES `alats` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `keranjangs_id_paketan_foreign` FOREIGN KEY (`id_paketan`) REFERENCES `paketans` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `keranjangs_id_penyewa_foreign` FOREIGN KEY (`id_penyewa`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `paketans`
--
ALTER TABLE `paketans`
  ADD CONSTRAINT `paketans_id_kategori_foreign` FOREIGN KEY (`id_kategori`) REFERENCES `kategoris` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `paketans_id_pemilik_foreign` FOREIGN KEY (`id_pemilik`) REFERENCES `owners` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tokos`
--
ALTER TABLE `tokos`
  ADD CONSTRAINT `tokos_id_pemilik_foreign` FOREIGN KEY (`id_pemilik`) REFERENCES `owners` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
