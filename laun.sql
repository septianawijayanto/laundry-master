-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Nov 2020 pada 03.54
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laun`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
--

CREATE TABLE `customer` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(115) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(115) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `customer`
--

INSERT INTO `customer` (`id`, `email`, `nama`, `no_hp`, `alamat`, `created_at`, `updated_at`) VALUES
(2, 'septianawijayanto81@gmail.com', 'Septi', '07455527', 'a', '2020-11-09 08:48:05', '2020-11-09 08:48:05'),
(3, 'yessi2@gmail.com', 'Yessi Cantek', '077888', 'a', '2020-11-09 18:33:39', '2020-11-09 18:33:39'),
(5, 'ocak@gmail.com', 'putri', '07455527', 'a', '2020-11-09 09:31:43', '2020-11-09 09:31:43'),
(6, 'eko@gmail.com', 'putri', '07455527', 'b', '2020-11-09 09:55:04', '2020-11-09 09:55:04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_09_29_054722_create_table_paket', 1),
(5, '2020_10_01_044223__create_customer_table', 1),
(6, '2020_10_01_044340__add_role_table', 1),
(7, '2020_10_05_061548_status_pesanan', 1),
(8, '2020_10_19_043811_alter_status', 1),
(9, '2020_10_21_032350_table_status_pembayaran', 1),
(10, '2020_11_09_124925__create_t_pesanan_table', 2),
(11, '2020_11_09_163019__add_avatar_tabel', 3),
(12, '2020_11_10_012857__add_urutan_table', 4),
(13, '2020_11_10_034739__create_nama_usaha_table', 5),
(14, '2020_11_23_023639__add_username_table', 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `nama_usaha`
--

CREATE TABLE `nama_usaha` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `nama_usaha`
--

INSERT INTO `nama_usaha` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Laundry Barokah Cinta', '2020-11-22 19:30:59', '2020-11-22 19:30:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `paket`
--

CREATE TABLE `paket` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(115) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `paket`
--

INSERT INTO `paket` (`id`, `nama`, `harga`, `created_at`, `updated_at`) VALUES
(1, 'ABCD', '1000', '2020-11-09 08:31:52', '2020-11-09 08:31:52'),
(3, 'XYZ', '88', '2020-11-09 09:54:49', '2020-11-09 09:54:49');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `status_pembayaran`
--

CREATE TABLE `status_pembayaran` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(115) COLLATE utf8mb4_unicode_ci NOT NULL,
  `urutan` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `status_pembayaran`
--

INSERT INTO `status_pembayaran` (`id`, `nama`, `urutan`, `created_at`, `updated_at`) VALUES
(1, 'Belum Dibayar', 1, '2020-11-09 18:01:43', '2020-11-09 18:32:46'),
(2, 'Lunas', 2, '2020-11-09 18:01:57', '2020-11-09 18:32:53');

-- --------------------------------------------------------

--
-- Struktur dari tabel `status_pesanan`
--

CREATE TABLE `status_pesanan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(115) COLLATE utf8mb4_unicode_ci NOT NULL,
  `urutan` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `status_pesanan`
--

INSERT INTO `status_pesanan` (`id`, `nama`, `urutan`, `created_at`, `updated_at`) VALUES
(1, 'Baru Diterima', 1, '2020-11-09 18:00:33', '2020-11-09 18:00:33'),
(2, 'Dicuci', 2, '2020-11-09 18:00:45', '2020-11-09 18:00:45'),
(3, 'Dijemur', 3, '2020-11-09 18:00:57', '2020-11-09 18:00:57'),
(4, 'Selesai', 4, '2020-11-09 18:01:08', '2020-11-09 18:01:08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_pesanan`
--

CREATE TABLE `t_pesanan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `paket_id` bigint(20) UNSIGNED NOT NULL,
  `berat` int(11) NOT NULL,
  `grand_total` int(11) NOT NULL,
  `status_pesanan_id` bigint(20) UNSIGNED NOT NULL,
  `status_pembayaran_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `t_pesanan`
--

INSERT INTO `t_pesanan` (`id`, `customer_id`, `paket_id`, `berat`, `grand_total`, `status_pesanan_id`, `status_pembayaran_id`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 10, 10000, 4, 2, '2020-11-09 17:00:00', '2020-11-09 17:00:00'),
(2, 3, 1, 10, 10000, 4, 2, '2020-11-09 17:00:00', '2020-11-09 18:34:29'),
(3, 5, 1, 100, 100000, 1, 1, '2020-11-09 17:00:00', '2020-11-09 17:00:00'),
(4, 2, 1, 1111, 1111000, 1, 1, '2020-11-17 17:00:00', '2020-11-17 17:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `role`, `name`, `avatar`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'rossaelek', NULL, 'Rosaa', 'pp.jpg', 'ocak@gmail.com', NULL, '$2y$10$M/FnPFE868liwsg.HJoYVeJ0I.CI4YFrSQrCawC9zVNRd3/9gNRpq', NULL, '2020-11-09 05:25:37', '2020-11-22 19:44:46'),
(3, 'yessisayang', '1', 'Yessi Novriyani', 'IMG-20201109-WA0015.jpg', 'yessi@gmail.com', NULL, '$2y$10$gxXKxCMGqJt9bX359OS.0eEGh8B9Wq2ogbzzHfQgTBkrqvvtFpQuK', NULL, '2020-11-09 08:30:11', '2020-11-09 21:28:56'),
(4, 'ijah', NULL, 'Ijah', NULL, 'ijah@gmail.com', NULL, '$2y$10$m5yUamSpodWMxm9HCm1qN.iP/522vjKiSkn97p0loGWWYbIOMiGIS', NULL, '2020-11-22 19:43:11', '2020-11-22 19:43:11');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `nama_usaha`
--
ALTER TABLE `nama_usaha`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `paket`
--
ALTER TABLE `paket`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `status_pembayaran`
--
ALTER TABLE `status_pembayaran`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `status_pesanan`
--
ALTER TABLE `status_pesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `t_pesanan`
--
ALTER TABLE `t_pesanan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `t_pesanan_customer_id_foreign` (`customer_id`),
  ADD KEY `t_pesanan_paket_id_foreign` (`paket_id`),
  ADD KEY `t_pesanan_status_pesanan_id_foreign` (`status_pesanan_id`),
  ADD KEY `t_pesanan_status_pembayaran_id_foreign` (`status_pembayaran_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `customer`
--
ALTER TABLE `customer`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `nama_usaha`
--
ALTER TABLE `nama_usaha`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `paket`
--
ALTER TABLE `paket`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `status_pembayaran`
--
ALTER TABLE `status_pembayaran`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `status_pesanan`
--
ALTER TABLE `status_pesanan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `t_pesanan`
--
ALTER TABLE `t_pesanan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `t_pesanan`
--
ALTER TABLE `t_pesanan`
  ADD CONSTRAINT `t_pesanan_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`),
  ADD CONSTRAINT `t_pesanan_paket_id_foreign` FOREIGN KEY (`paket_id`) REFERENCES `paket` (`id`),
  ADD CONSTRAINT `t_pesanan_status_pembayaran_id_foreign` FOREIGN KEY (`status_pembayaran_id`) REFERENCES `status_pembayaran` (`id`),
  ADD CONSTRAINT `t_pesanan_status_pesanan_id_foreign` FOREIGN KEY (`status_pesanan_id`) REFERENCES `status_pesanan` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
