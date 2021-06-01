-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Bulan Mei 2021 pada 03.14
-- Versi server: 10.4.13-MariaDB
-- Versi PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_taproject`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `no` int(10) NOT NULL,
  `kd_brng` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nm_brng` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int(20) NOT NULL,
  `berat` int(11) NOT NULL,
  `satuan` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jmlh` int(11) NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_brng` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`no`, `kd_brng`, `nm_brng`, `kategori`, `harga`, `berat`, `satuan`, `jmlh`, `desc`, `img_brng`, `created_at`, `updated_at`) VALUES
(17, 'BRG000017', 'Kripik Bawang', 'ringan', 12000, 250, 'gr', 10, 'Homemade. Menggunakan kemasan plastik zipper untuk menjamin mutu tetap terjaga.', '1621826276_2f1e4b51f7dda8e62e7ae7187391e625.jpg', '2021-05-15 02:06:40', '2021-05-23 20:17:56'),
(19, 'BRG000018', 'Dendeng kulit singkong', 'pokok', 35000, 250, 'gr', 25, 'Makanan ini terbuat dari kulit singkong yang diolah dengan sedemikian rupa. Rasanya pun tak kalah dari dendeng daging yang mungkin biasa kita makan atau kita jumpai di rumah makan.', '1621828319_IMG_20210509_201902-01_copy_800x533.jpeg', '2021-05-18 02:23:51', '2021-05-23 20:51:59'),
(21, 'BRG000020', 'kembang goyang', 'ringan', 15000, 225, 'gr', 20, 'Cemilan yang satu ini merupakan makanan ringan yang selalu menjadi favorit dari setiap generasi dari masa ke masa, kini hadir dengan kemasan standing pouch sehingga nampak lebih elegan namun dengan harga yang sangat terjangkau.', '1621827376_76cd929be3c735cdd1f8bfbf2981470c.jpg', '2021-05-18 23:49:40', '2021-05-23 20:36:16'),
(22, 'BRG000022', 'egg roll', 'ringan', 30000, 1, 'kg', 30, 'Berbeda dengan kue egg roll yang saat ini banyak beredar di pasaran, egg roll hasil produksi Kampung Cireundeu menggunakan bahan dasar rasi, atau “beras singkong”.', '1621827878_news_30159_1422699916.jpg', '2021-05-19 02:58:04', '2021-05-23 20:44:38'),
(23, 'BRG000023', 'Beras Singkong @5kg', 'pokok', 25000, 5, 'kg', 20, 'Beras singkong (rasi) kualitas terbaik.', '1622080657_beras.jpg', '2021-05-24 03:01:10', '2021-05-28 04:42:47'),
(24, 'BRG000024', 'Pastel', 'ringan', 15000, 250, 'gr', 10, 'Pastel nikmat terbuat dari tepung singkong.', '1622081631_pastel.jpg', '2021-05-26 19:13:51', '2021-05-26 19:13:51'),
(25, 'BRG000025', 'Beras Singkong @2kg', 'pokok', 15000, 2, 'kg', 10, 'Beras Singkong (rasi) terbaik, asli cireundeu.', '1622097212_beras.jpg', '2021-05-26 23:33:32', '2021-05-28 04:43:08'),
(26, 'BRG000026', 'cheese stick singkong', 'ringan', 15000, 250, 'gr', 20, 'olahan yang berbentuk stick hanya saja berbahan dasar singkong. renyah dan gurih.', '1622198942_f8c10-20225896_302074820257078_5673375550014488576_n.jpg', '2021-05-28 03:49:02', '2021-05-28 03:49:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2021_05_06_040259_create_useradmin_table', 1),
(2, '2021_05_14_101821_create_barang_table', 2),
(3, '2021_05_18_103858_create_transaksi_table', 3),
(4, '2021_05_18_104407_create_transaksi_detail_table', 3),
(5, '2021_05_24_065346_create_transaksi_table', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(10) UNSIGNED NOT NULL,
  `kd_psnan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kd_pel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_total` int(20) NOT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `metode` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id`, `kd_psnan`, `kd_pel`, `harga_total`, `status`, `metode`, `created_at`, `updated_at`) VALUES
(1, 'PSN00001', 'CST00002', 45000, 'Sudah dibayar', 'cod', '2021-05-26 21:18:13', '2021-05-29 00:58:42'),
(2, 'PSN00002', 'CST00002', 30000, 'Sudah dibayar', 'transfer', '2021-05-26 21:18:46', '2021-05-29 04:26:22'),
(4, 'PSN00003', 'CST00003', 90000, 'Sudah dibayar', 'transfer', '2021-05-26 23:21:15', '2021-05-27 03:44:24'),
(19, 'PSN00005', 'CST00003', 30000, 'Belum dibayar', 'transfer', '2021-05-29 04:23:45', '2021-05-29 04:23:56');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_detail`
--

CREATE TABLE `transaksi_detail` (
  `id` int(10) UNSIGNED NOT NULL,
  `kd_psnan` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kd_pel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kd_brng` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` int(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `transaksi_detail`
--

INSERT INTO `transaksi_detail` (`id`, `kd_psnan`, `kd_pel`, `nama`, `kd_brng`, `jumlah`, `status`, `total`, `created_at`, `updated_at`) VALUES
(1, 'PSN00001', 'CST00002', 'Pastel', 'BRG000024', 3, '', 45000, '2021-05-26 21:18:13', '2021-05-29 00:49:29'),
(2, 'PSN00002', 'CST00002', 'egg roll', 'BRG000022', 1, '', 30000, '2021-05-26 21:18:46', '2021-05-26 21:19:11'),
(4, 'PSN00003', 'CST00003', 'egg roll', 'BRG000022', 2, '', 60000, '2021-05-26 23:21:15', '2021-05-26 23:26:14'),
(5, 'PSN00003', 'CST00003', 'kembang goyang', 'BRG000020', 2, '', 30000, '2021-05-26 23:21:23', '2021-05-26 23:26:23'),
(26, 'PSN00005', 'CST00003', 'Pastel', 'BRG000024', 2, '', 30000, '2021-05-29 04:23:45', '2021-05-29 04:23:56');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `level` varchar(255) NOT NULL,
  `kd_pel` varchar(255) DEFAULT NULL,
  `forename` varchar(255) NOT NULL,
  `surname` varchar(255) DEFAULT NULL,
  `nik` varchar(255) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `telp` varchar(255) NOT NULL DEFAULT '-',
  `email` varchar(255) NOT NULL,
  `password` varchar(100) DEFAULT NULL,
  `prov_pel` varchar(255) DEFAULT NULL,
  `kot_pel` varchar(255) DEFAULT NULL,
  `kec_pel` varchar(255) DEFAULT NULL,
  `kd_pos` varchar(255) DEFAULT NULL,
  `al_detail` varchar(255) NOT NULL DEFAULT '-',
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `level`, `kd_pel`, `forename`, `surname`, `nik`, `tgl_lahir`, `telp`, `email`, `password`, `prov_pel`, `kot_pel`, `kec_pel`, `kd_pos`, `al_detail`, `image`, `created_at`, `updated_at`) VALUES
(1, 'admin', NULL, 'admin', NULL, NULL, NULL, '042323223434', 'admin@gmail.com', '$2y$10$ARgNNm6/OGxALz9gX8Br/eT/hxuRB8nuo2pscEFU0gI6euvb0XS.q', NULL, NULL, NULL, NULL, 'Jl. Mawar', '1622207866_cool-wallpaper-preview-1 (2).jpg', '2021-05-26 18:44:43', '2021-05-28 06:54:31'),
(2, 'customers', 'CST00002', 'Neifla', 'Sukma Prawira', '1234567890123456', '2021-05-27', '0812345687932', 'user@gmail.com', '$2y$10$BCHsdKyHMksyzM3n4Me.cuIZt6wGvwa58J8.WO28EqITPpyBSnzDW', 'Jawa Barat', 'cimahi', 'Cimahi Selatan', '40522', 'Jl. Cendana', '1622207628_Gaya-Foto-Levitasi.jpg', '2021-05-26 18:52:53', '2021-05-29 04:49:35'),
(3, 'customers', 'CST00003', 'Alfien', 'Sukma Prawira', '1234567890123456', '2021-05-27', '08124353233', 'user2@gmail.com', '$2y$10$EubWrpjweXhk8o1S2G/3/OLxkAUNhC6eyNM4L744FFn.68R/hsukq', 'Jawa Barat', 'bandung', 'Cimahi Selatan', '40622', 'Jl. Melati no. 31', '1622284727_poto.JPG', '2021-05-26 23:08:56', '2021-05-29 03:38:47'),
(4, 'admin', NULL, 'Neifla', NULL, NULL, NULL, '-', 'admin2@gmail.com', '$2y$10$l9K/4xHD3YUOmtaeCMdfK.iKnuIGsx5n5ESkjHMGWWwGz8lxiMPsm', NULL, NULL, NULL, NULL, '-', 'default.png', '2021-05-26 23:31:25', '2021-05-26 23:31:25');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`no`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
