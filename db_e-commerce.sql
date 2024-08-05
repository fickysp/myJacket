-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2023 at 08:50 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_e-commerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `buyings`
--

CREATE TABLE `buyings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `no_telp` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `nama_brg` varchar(255) NOT NULL,
  `harga` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_12_02_074212_create_posts_table', 1),
(6, '2023_12_02_082242_create_buyings_table', 1),
(7, '2023_12_04_122141_create_pesanans_table', 1),
(8, '2023_12_04_130203_create_pesanan_details_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pesanans`
--

CREATE TABLE `pesanans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `status` varchar(255) NOT NULL,
  `jumlah_harga` int(11) NOT NULL,
  `snap_token` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pesanans`
--

INSERT INTO `pesanans` (`id`, `user_id`, `tanggal`, `status`, `jumlah_harga`, `snap_token`, `created_at`, `updated_at`) VALUES
(17, 1, '2023-12-06', '1', 1000000, 'c34ea695-11b8-45ac-ab59-fd73b4c4e338', '2023-12-06 07:39:35', '2023-12-06 07:39:41'),
(18, 1, '2023-12-06', '1', 500000, 'b26f3d0e-c400-496f-bd3c-7aa64908711f', '2023-12-06 07:51:15', '2023-12-06 08:21:42'),
(19, 1, '2023-12-06', '1', 500000, 'ee3bfd1b-e691-43eb-8605-913843e4b7c9', '2023-12-06 16:32:02', '2023-12-06 16:32:10'),
(20, 1, '2023-12-06', '1', 500000, '096b1dd2-0092-43bd-80ce-c250123b4dd9', '2023-12-06 16:46:38', '2023-12-06 16:46:44'),
(22, 1, '2023-12-07', '1', 200000, NULL, '2023-12-06 19:00:57', '2023-12-06 23:24:26');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan_details`
--

CREATE TABLE `pesanan_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `barang_id` int(11) NOT NULL,
  `pesanan_id` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `jumlah_harga` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pesanan_details`
--

INSERT INTO `pesanan_details` (`id`, `barang_id`, `pesanan_id`, `jumlah`, `jumlah_harga`, `created_at`, `updated_at`) VALUES
(24, 2, 15, 2, 1000000, '2023-12-06 06:42:01', '2023-12-06 06:42:01'),
(25, 2, 16, 2, 1000000, '2023-12-06 06:46:44', '2023-12-06 06:46:44'),
(26, 100, 17, 1, 1000000, '2023-12-06 07:39:35', '2023-12-06 07:39:35'),
(27, 2, 18, 1, 500000, '2023-12-06 07:51:15', '2023-12-06 07:51:15'),
(28, 2, 19, 1, 500000, '2023-12-06 16:32:02', '2023-12-06 16:32:02'),
(29, 2, 20, 1, 500000, '2023-12-06 16:46:38', '2023-12-06 16:46:38'),
(32, 102, 22, 2, 200000, '2023-12-06 23:24:21', '2023-12-06 23:24:21');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `desc` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `image`, `title`, `harga`, `stok`, `desc`, `created_at`, `updated_at`) VALUES
(103, 'GPjNzGs30yTafHz1J8uRUKq5Ya1QeKPC3w1on76Z.jpg', 'COUPLE JACKET COLORBOX', 1200000, 10, 'Jaket Couple Colorbox adalah pilihan yang keren untuk pasangan. Mereka terbuat dari bahan berkualitas tinggi yang nyaman dipakai sepanjang hari. Desainnya yang stylish dengan berbagai pilihan warna dan model membuatnya cocok untuk berbagai gaya dan suasana. Jaket ini biasanya terbuat dari bahan yang ringan namun tetap bisa memberikan perlindungan dari angin atau cuaca yang sedikit dingin.', '2023-12-06 23:45:14', '2023-12-06 23:45:14'),
(104, 'DDXGQG98AagIZ8RBZiBhuCuajrwRssGmflgJjVV5.jpg', 'PADDED BOMBER JACKET', 1500000, 12, 'Padded Bomber Jacket adalah jaket yang sangat stylish dan serbaguna. Mereka umumnya memiliki siluet yang ramping dengan lapisan tambahan (padded) di bagian dalamnya, memberikan kehangatan ekstra saat cuaca dingin. Jaket ini biasanya terbuat dari bahan yang ringan seperti nilon atau polyester dengan lapisan dalam berbahan bulu atau bahan hangat lainnya.', '2023-12-06 23:48:16', '2023-12-06 23:48:16'),
(105, '2777lVED2BfFMZWNEBzGVoigf1Y4XblfUnDq2LYB.jpg', 'LEATHER IMPOR JACKET', 1000000, 20, 'Jaket kulit impor adalah produk yang sangat dicari karena kualitas dan gaya yang istimewa. Mereka umumnya terbuat dari kulit asli yang berkualitas tinggi, seperti kulit domba atau sapi, yang memberikan tampilan yang elegan dan tahan lama. Jaket kulit impor seringkali memiliki fitur-fitur seperti resleting atau kancing di bagian depan, kantong-kantong yang bergaya, dan detail jahitan yang rapi.', '2023-12-06 23:49:57', '2023-12-06 23:49:57'),
(106, 'qEZncAPgULFRMcaoUUgP5Q0gNZn5mvZrT11APMpu.jpg', 'BOMBER JACKET NEW ZARA', 450000, 11, 'Jaket Bomber terbaru dari Zara menawarkan gaya yang modern dan inovatif. Mereka seringkali hadir dengan berbagai variasi desain yang mengikuti tren terkini. Zara dikenal karena menggabungkan kenyamanan dengan gaya yang sangat stylish, dan ini tercermin dalam koleksi bomber jacket mereka.', '2023-12-06 23:51:17', '2023-12-06 23:51:17'),
(107, '0hrMw0oJU47pwaGgxoEgFGFSDFYNlia7sPPyUIPH.jpg', 'BASEBALL JACKET H&M', 900000, 17, 'Baseball jacket dari H&M adalah pilihan yang keren dan trendi. Mereka terinspirasi dari desain jaket baseball klasik dengan sentuhan modern yang khas dari merek tersebut. Jaket ini biasanya terbuat dari bahan ringan yang nyaman seperti nilon atau katun dengan warna dan detail yang beragam.', '2023-12-06 23:52:34', '2023-12-06 23:52:34'),
(108, 'IVKlr4B6lkdUn7uOsXeaRgSLjRp3M6Mf81H6FpKw.jpg', 'VARSITY JACKET UNSW', 600000, 12, 'Varsity jacket UNSW adalah pakaian yang merepresentasikan semangat sekolah atau universitas, seringkali menampilkan logo atau inisial institusi pendidikan tersebut. Varsity jacket biasanya terbuat dari bahan wol dengan aksen kulit di bagian kerah, manset, dan bagian kancing.', '2023-12-06 23:53:42', '2023-12-06 23:53:42'),
(111, 'jKT1kqj3GGDHXUIZrkItsuc5e6xEtHqgZUCEBCyI.jpg', 'JACKET SELLY PARKA', 150000, 20, 'Jaket semacam ini sangat cocok untuk digunakan di musim dingin atau saat cuaca sangat dingin, karena mereka mampu memberikan kenyamanan dan perlindungan ekstra ketika Anda berada di luar ruangan.', '2023-12-07 00:25:59', '2023-12-07 00:25:59'),
(113, 'DdqVp0lDcCgesWkFOFK0CS2xkIYZIsJDDgw9Ki21.jpg', 'JACKET EIGER WATERPROOF', 950000, 31, 'Jaket tahan air Eiger biasanya terbuat dari bahan-bahan berkualitas tinggi yang memiliki lapisan luar yang tahan air serta teknologi yang memungkinkan sirkulasi udara agar tetap nyaman saat dipakai. Bahan-bahannya juga sering dirancang agar ringan, tetapi tetap memberikan perlindungan yang baik dari hujan dan angin.', '2023-12-07 00:47:54', '2023-12-07 00:47:54');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `no_hp` varchar(255) DEFAULT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user',
  `verify_key` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `email`, `email_verified_at`, `password`, `alamat`, `no_hp`, `role`, `verify_key`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Ficky sandika', 'fickysp22des@gmail.com', '2023-12-06 00:02:17', '$2y$12$EINYLpfC34h3gS1/ZwkkNOZRGQSe8mmSr5WitMtCVgpL2885jI.SS', NULL, NULL, 'user', '1s56zttZbJCemHbvDLf1Y7B30Wj23pHGNgjuPZIVO9UA0biY4gjAthoOVnsyeFmejY9E54fIgmPXV3OL1bZcSOaEPOgL9MHUHwa8', NULL, '2023-12-06 00:01:46', '2023-12-06 00:02:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buyings`
--
ALTER TABLE `buyings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `pesanans`
--
ALTER TABLE `pesanans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pesanan_details`
--
ALTER TABLE `pesanan_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buyings`
--
ALTER TABLE `buyings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pesanans`
--
ALTER TABLE `pesanans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `pesanan_details`
--
ALTER TABLE `pesanan_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
