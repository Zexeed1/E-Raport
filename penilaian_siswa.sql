-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Feb 2023 pada 07.37
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `penilaian_siswa`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
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
-- Struktur dari tabel `guru`
--

CREATE TABLE `guru` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(45) DEFAULT NULL,
  `nama` varchar(255) NOT NULL,
  `jk` enum('Laki-laki','Perempuan') NOT NULL,
  `nohp` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `mapel_id` int(11) DEFAULT NULL,
  `agama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `guru`
--

INSERT INTO `guru` (`id`, `user_id`, `nama`, `jk`, `nohp`, `alamat`, `mapel_id`, `agama`, `email`, `avatar`, `created_at`, `updated_at`) VALUES
(1, 15, 'Andra Surya Kurniawan', 'Laki-laki', '+62-813-7192-9161', 'Pekanbaru', 5, 'Islam', 'andra_guru', 'user8-128x128.jpg', '2023-02-15 12:01:24', '2023-02-15 12:01:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kelas` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id`, `kelas`, `created_at`, `updated_at`) VALUES
(1, 'VII - Ikhlas', '2023-02-13 15:08:44', '2023-02-13 15:08:44'),
(2, 'VIII - Taqwa', '2023-02-13 15:08:44', '2023-02-13 15:08:44'),
(3, 'IX - Sabar', '2023-02-13 15:08:44', '2023-02-13 15:08:44');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mapel`
--

CREATE TABLE `mapel` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_mapel` varchar(255) DEFAULT NULL,
  `kd_singkat` varchar(45) NOT NULL,
  `mapel` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `mapel`
--

INSERT INTO `mapel` (`id`, `kode_mapel`, `kd_singkat`, `mapel`, `created_at`, `updated_at`) VALUES
(1, 'MP01', 'MTK', 'Matematika', '2023-02-13 15:08:44', '2023-02-13 15:08:44'),
(2, 'MP02', 'IPA', 'Ilmu Pengetahuan Alam', '2023-02-13 15:08:44', '2023-02-13 15:08:44'),
(3, 'MP03', 'IPS', 'Ilmu Pengetahuan Sosial', '2023-02-13 15:08:44', '2023-02-13 15:08:44'),
(4, 'MP04', 'PAI', 'Pendidikan Agama dan Budi Pekerti', '2023-02-13 15:08:44', '2023-02-13 15:08:44'),
(5, 'MP05', 'B.Ind', 'Bahasa Indonesia', '2023-02-13 15:08:44', '2023-02-13 15:08:44'),
(6, 'MP06', 'B.Ing', 'Bahasa Inggris', '2023-02-13 15:08:44', '2023-02-13 15:08:44'),
(7, 'MP07', 'PKN', 'Pendidikan Kewarganegaraan', '2023-02-13 15:08:44', '2023-02-13 15:08:44'),
(8, 'MP08', 'PJOK', 'Pendidikan Jasmani, Olahraga, dan Kesehatan', '2023-02-13 15:08:44', '2023-02-13 15:08:44'),
(9, 'MP09', 'BMR', 'Budaya Melayu Riau', '2023-02-13 15:08:44', '2023-02-13 15:08:44'),
(10, 'MP10', 'Prak', 'Prakarya', '2023-02-13 15:08:44', '2023-02-13 15:08:44');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mapel_siswa`
--

CREATE TABLE `mapel_siswa` (
  `id` int(40) NOT NULL,
  `siswa_id` int(40) NOT NULL,
  `mapel_id` int(40) NOT NULL,
  `kuis` int(40) NOT NULL,
  `ulangan` int(40) NOT NULL,
  `uts` int(40) NOT NULL,
  `performance` int(40) NOT NULL,
  `project` int(40) NOT NULL,
  `product` int(40) NOT NULL,
  `sikap` int(40) NOT NULL,
  `note` varchar(1000) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `mapel_siswa`
--

INSERT INTO `mapel_siswa` (`id`, `siswa_id`, `mapel_id`, `kuis`, `ulangan`, `uts`, `performance`, `project`, `product`, `sikap`, `note`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 90, 90, 98, 90, 90, 90, 90, 'Terampil dalam melakukan operasi bilangan bulat, menentukan himpunan suatu objek, dan melakukan operasi hitung aljabar.', '2023-02-20 23:54:08', '2023-02-22 18:03:06'),
(2, 1, 2, 82, 86, 89, 88, 82, 90, 98, 'Memahami dengan baik materi tentang klasifikasi makhluk hidup, zat dan karateristiknya serta memahami dengan baik tentang materi unsur, senyawa dan campuran.', '2023-02-20 23:54:35', '2023-02-22 02:15:54'),
(3, 1, 3, 87, 98, 94, 78, 65, 90, 82, 'Cukup memahami konsep ruang dan interaksi antarruang di Indonesia serta pengaruhnya terhadap kehidupan manusia dalam aspek ekonomi, sosial, budaya, dan pendidikan. Serta interaksi sosial dalam ruang dan pengaruhnya terhadap kehidupan sosial, ekonomi, dan budaya dalam nilai dan norma serta kelembagaan sosial budaya.', '2023-02-21 05:35:51', '2023-02-22 02:18:00'),
(5, 1, 4, 80, 90, 80, 78, 89, 76, 81, 'Terampil Baik dalam memahami dan menyajikan dalam memahami makna iman kepada malaikat berdasarkan dalil naqli. Memahami makna perilaku jujur, amanah, dan istiqomah. Memahami makna hormat dan patuh kepada orang tua dan guru serta empati terhadap sesama. Memahami ketentuan bersuci dari hadas besar berdasarkan ketentuan syariat Islam.', '2023-02-22 02:22:59', '2023-02-22 02:22:59'),
(6, 1, 5, 89, 97, 56, 87, 65, 0, 88, 'Memahami dan menguasai dengan baik materi teks prosedur, teks laporan hasil observasi, literasi buku fiksi dan nonfiksi. Namun, perlu ditingkatkan lagi pemahaman mengenai materi teks deskripsi dan teks narasi.', '2023-02-22 02:24:09', '2023-02-22 02:24:09'),
(7, 1, 6, 78, 76, 80, 80, 75, 87, 80, 'Terampil baik dalam mengerjakan tugas dan mempraktekan di writing, speaking dan reading dengan materi yang dipelajari yaitu Greeting dan Leave-takings, Expressing Gratitude dan Apology, People Around Me (Family Members), Things At School ( There is/are), Telling Time dan Article ( a, an dan the).', '2023-02-22 02:26:02', '2023-02-22 02:26:02'),
(8, 1, 7, 98, 82, 80, 78, 75, 70, 81, 'Terampil Amat baik  dalam memahami makna perumusan dan pengesahan UUD Negara Republik Indonesia Tahun 1945.', '2023-02-22 02:27:39', '2023-02-22 18:13:22'),
(9, 1, 8, 90, 89, 90, 88, 72, 0, 90, 'Baik dalam memahami materi olahraga,baik praktek mau pun teori, sepak bola, voli, basket, kasti, dan badminton.', '2023-02-22 03:27:37', '2023-02-22 03:27:37'),
(10, 1, 9, 85, 88, 90, 78, 82, 80, 94, 'Sangat terampil dalam menyimpulkan ekologi sosial, mengidentifikasi tunjuk ajar Melayu Riau, dan mengumpulkan informasi tentang praktik adat Melayu setempat.', '2023-02-22 03:29:43', '2023-02-22 03:29:43'),
(11, 1, 10, 90, 90, 90, 92, 94, 87, 86, 'Terampil Baik dalam memahami materi prakarya baik praktek mau pun teori.', '2023-02-22 03:31:32', '2023-02-22 03:31:32'),
(12, 4, 1, 76, 90, 90, 90, 90, 80, 90, 'baik', '2023-02-22 04:09:51', '2023-02-22 04:10:17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mapel_siswa2`
--

CREATE TABLE `mapel_siswa2` (
  `id` bigint(45) NOT NULL,
  `siswa_id` int(11) NOT NULL,
  `mapel_id` int(11) NOT NULL,
  `uh1` int(45) DEFAULT NULL,
  `uh2` int(45) DEFAULT NULL,
  `t1` int(45) DEFAULT NULL,
  `t2` int(45) DEFAULT NULL,
  `t3` int(45) DEFAULT NULL,
  `t4` int(45) DEFAULT NULL,
  `uts` int(45) DEFAULT NULL,
  `uas` int(45) DEFAULT NULL,
  `desk_p` varchar(1000) DEFAULT NULL,
  `proses` int(45) DEFAULT NULL,
  `produk` int(45) DEFAULT NULL,
  `pro1` int(45) DEFAULT NULL,
  `pro2` int(45) DEFAULT NULL,
  `desk_k` varchar(1000) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `mapel_siswa2`
--

INSERT INTO `mapel_siswa2` (`id`, `siswa_id`, `mapel_id`, `uh1`, `uh2`, `t1`, `t2`, `t3`, `t4`, `uts`, `uas`, `desk_p`, `proses`, `produk`, `pro1`, `pro2`, `desk_k`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 90, 85, 87, 82, 98, 90, 98, 85, 'Memahami dengan baik materi tentang klasifikasi makhluk hidup, zat dan karateristiknya serta memahami dengan baik tentang materi unsur, senyawa dan campuran', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 2, 1, 90, 89, 92, 86, 97, 95, 60, 90, 'Memahami dengan baik materi tentang klasifikasi makhluk hidup, zat dan karateristiknya serta memahami dengan baik tentang materi unsur, senyawa dan campuran', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_02_07_003201_create_siswa', 1),
(6, '2023_02_07_003741_create_kelas', 1),
(7, '2023_02_08_104246_create_semester', 1),
(8, '2023_02_08_110657_create_guru', 1),
(9, '2023_02_08_134128_create_mapel', 1),
(10, '2023_02_14_220143_create_permission_tables', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 4),
(2, 'App\\Models\\User', 5),
(3, 'App\\Models\\User', 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai`
--

CREATE TABLE `nilai` (
  `siswa_id` int(11) NOT NULL,
  `mapel_id` int(11) NOT NULL,
  `pa` int(11) NOT NULL,
  `dp` varchar(255) NOT NULL,
  `ka` int(11) NOT NULL,
  `dk` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `nilai`
--

INSERT INTO `nilai` (`siswa_id`, `mapel_id`, `pa`, `dp`, `ka`, `dk`, `created_at`, `updated_at`) VALUES
(1, 1, 72, 'Cukup baik dalam memahami materi bilangan bulat, himpunan, dan aljabar.', 85, 'Cukup terampil dalam melakukan operasi bilangan bulat, menentukan himpunan suatu objek, dan melakukan operasi hitung aljabar.', '2023-02-21 13:58:09', '2023-02-21 08:26:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
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
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'web', '2023-02-14 15:20:13', '2023-02-14 15:20:13'),
(2, 'Guru', 'web', '2023-02-14 15:20:13', '2023-02-14 15:20:13'),
(3, 'Siswa', 'web', '2023-02-14 15:20:13', '2023-02-14 15:20:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `semester`
--

CREATE TABLE `semester` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tahun_ajar` varchar(255) DEFAULT NULL,
  `semester` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `semester`
--

INSERT INTO `semester` (`id`, `tahun_ajar`, `semester`, `created_at`, `updated_at`) VALUES
(1, 'TA.2022/2023', 'Ganjil', '2023-02-13 15:08:44', '2023-02-13 15:08:44'),
(2, 'TA.2023/2024', 'Genap', '2023-02-13 15:08:44', '2023-02-13 15:08:44');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nis` int(11) NOT NULL,
  `jk` enum('Laki-laki','Perempuan') NOT NULL,
  `kelas_id` varchar(255) NOT NULL,
  `agama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `spiritual` varchar(255) DEFAULT NULL,
  `sosial` varchar(255) DEFAULT NULL,
  `izin` int(11) DEFAULT NULL,
  `sakit` int(11) DEFAULT NULL,
  `alpha` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id`, `nama`, `nis`, `jk`, `kelas_id`, `agama`, `email`, `alamat`, `avatar`, `spiritual`, `sosial`, `izin`, `sakit`, `alpha`, `created_at`, `updated_at`) VALUES
(1, 'Ahmad Nasution', 1809599001, 'Laki-laki', '1', 'Islam', 'ahmad_siswa', 'Pekanbaru', 'avatar5.png', 'Selalu bersyukur, selalu berdoa sebelum melakukan kegiatan,dan ketaatan beribadah mulai berkembang.', 'Sudah menunjukkan sikap santun. Tapi perlu ditingkatkan lagi sikap disiplin, tanggung jawab dan percaya diri.', 3, 0, 0, '2023-02-15 12:33:05', '2023-02-22 04:11:13'),
(2, 'Ananda Firmawan', 1809599002, 'Laki-laki', '1', 'Islam', 'nanda_siswa', 'Pekanbaru', 'avatar4.png', 'Selalu bersyukur, selalu berdoa sebelum melakukan kegiatan,dan ketaatan beribadah mulai berkembang.', 'Sudah menunjukkan sikap disiplin dan santun . Tapi perlu ditingkatkan lagi sikap percaya diri,dan tanggung jawab.', 2, 2, 0, '2023-02-15 13:01:16', '2023-02-22 02:31:43'),
(4, 'Rehan Syahputra', 1809599003, 'Laki-laki', '2', 'Islam', 'rehan_siswa', 'Pekanbaru', 'avatar.png', NULL, NULL, NULL, NULL, NULL, '2023-02-22 04:04:00', '2023-02-22 18:18:47');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(45) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `role`, `avatar`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'Admin', 'default.png', 'Tata Usaha', 'TU-superuser', '2023-02-14 15:19:26', '$2y$10$RgZ9LKpvWWRf3NQlgY.r1uds7EgZoxv7O0REANrjicBKXXaJrEyLW', 'HNhbSCC3ZZhArTTUPLJVOO8WRDGkpQwLotkvcE4Pqb1my2ziZVB6sdoNWo5z', '2023-02-14 15:19:26', '2023-02-14 15:19:26'),
(15, 'Guru', 'user8-128x128.jpg', 'Andra Surya Kurniawan', 'andra_guru', NULL, '$2y$10$qfSEm9ymVlSfzn1FiLWlluXSIDqnC9mj3Dzzw4EkfbJbfXilu3UVO', 'vWPCEBE6p5F2RWw47DbHnP4LPgzDm5NhFdc8S1mLXuLBkGCjJxO0ZbItRj0X', '2023-02-15 12:01:24', '2023-02-15 12:01:24'),
(20, 'Siswa', 'avatar5.png', 'Ahmad Nasution', 'ahmad_siswa', NULL, '$2y$10$Wu0HBB6SHiZ26qZyZE/dc.Jbu9L2XIuxuz2ZFKrtMxBr.X9LEWSam', 'h4Tl4UrB9MfnLqDn08gsXhz6Ga7wMEIU8EEnmTZZTH0kPF8wNqvIMVu2dlVD', '2023-02-15 12:33:05', '2023-02-15 12:33:05'),
(21, 'Siswa', 'avatar4.png', 'Ananda Firmawan', 'nanda_siswa', NULL, '$2y$10$8CngIchM7PLT.qEFawYPA.0Jf5t/zp3jpKke2YSja4U1WVUOaqyji', 'RKZs1PJ5kaFSjJ6Q4kNDnB0sJWISc0CqtSIdxSMDLVit1zWuIxeOMDoxki3y', '2023-02-15 13:01:16', '2023-02-15 13:01:16'),
(24, 'Siswa', 'avatar.png', 'Rehan Syahputra', 'rehan_siswa', NULL, '$2y$10$lZ48LNBMK2WllewzDHJbueJjsuLPkAG/WZ56N5.ezu3RcCUic3X3q', 'j28xaaTbE7jH5VW2B1rtKmvZ3X7bx52gXIgAjDKRn42SadBxINam70uCkNzA', '2023-02-22 04:04:00', '2023-02-22 04:04:00');

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `vkelas7`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `vkelas7` (
`nama` varchar(255)
,`kelas_id` varchar(255)
,`kelas` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `vkelas8`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `vkelas8` (
`nama` varchar(255)
,`kelas_id` varchar(255)
,`kelas` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `vkelas9`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `vkelas9` (
`nama` varchar(255)
,`kelas_id` varchar(255)
,`kelas` varchar(255)
);

-- --------------------------------------------------------

--
-- Struktur untuk view `vkelas7`
--
DROP TABLE IF EXISTS `vkelas7`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vkelas7`  AS SELECT `siswa`.`nama` AS `nama`, `siswa`.`kelas_id` AS `kelas_id`, `kelas`.`kelas` AS `kelas` FROM (`siswa` join `kelas`) WHERE `kelas`.`id` = `siswa`.`kelas_id` AND `siswa`.`kelas_id` = 11  ;

-- --------------------------------------------------------

--
-- Struktur untuk view `vkelas8`
--
DROP TABLE IF EXISTS `vkelas8`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vkelas8`  AS SELECT `siswa`.`nama` AS `nama`, `siswa`.`kelas_id` AS `kelas_id`, `kelas`.`kelas` AS `kelas` FROM (`siswa` join `kelas`) WHERE `kelas`.`id` = 2 AND `siswa`.`kelas_id` = 22  ;

-- --------------------------------------------------------

--
-- Struktur untuk view `vkelas9`
--
DROP TABLE IF EXISTS `vkelas9`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vkelas9`  AS SELECT `siswa`.`nama` AS `nama`, `siswa`.`kelas_id` AS `kelas_id`, `kelas`.`kelas` AS `kelas` FROM (`siswa` join `kelas`) WHERE `kelas`.`id` = 3 AND `siswa`.`kelas_id` = 33  ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mapel_siswa`
--
ALTER TABLE `mapel_siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mapel_siswa2`
--
ALTER TABLE `mapel_siswa2`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indeks untuk tabel `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indeks untuk tabel `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`siswa_id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indeks untuk tabel `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indeks untuk tabel `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `guru`
--
ALTER TABLE `guru`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `mapel`
--
ALTER TABLE `mapel`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `mapel_siswa`
--
ALTER TABLE `mapel_siswa`
  MODIFY `id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `mapel_siswa2`
--
ALTER TABLE `mapel_siswa2`
  MODIFY `id` bigint(45) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `nilai`
--
ALTER TABLE `nilai`
  MODIFY `siswa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `semester`
--
ALTER TABLE `semester`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
