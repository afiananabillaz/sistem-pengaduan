-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Jul 2022 pada 08.55
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistem-pengaduan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `helpdesks`
--

CREATE TABLE `helpdesks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `helpdesks`
--

INSERT INTO `helpdesks` (`id`, `user_id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 1, 'Nurwida Anggraini\r\n', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `layanans`
--

CREATE TABLE `layanans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pegawai_id` bigint(20) UNSIGNED NOT NULL,
  `tanggal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bulan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bukti` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `disposisi` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `layanans`
--

INSERT INTO `layanans` (`id`, `pegawai_id`, `tanggal`, `bulan`, `tahun`, `judul`, `keterangan`, `bukti`, `disposisi`, `created_at`, `updated_at`) VALUES
(1, 1, '03', '06', '2022', 'Printer', 'Printer rusak tidak bisa print segera diperbaiki', 'printer.png', 2, '2022-06-03 10:32:46', '2022-06-03 10:33:29'),
(6, 1, '04', '06', '2022', 'Komputer rusak', 'Segera perbaiki ini mendesak', 'printer.png', 0, '2022-06-04 06:36:14', '2022-06-04 06:36:14'),
(7, 1, '08', '06', '2022', 'AA', 'AA', 'IZIN USAHA.png', 0, '2022-06-08 06:48:36', '2022-06-08 06:48:36');

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
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_03_01_152351_create_helpdesks_table', 1),
(6, '2022_03_01_152411_create_pegawais_table', 1),
(7, '2022_03_01_152423_create_penyedias_table', 1),
(8, '2022_03_01_152435_create_pengaduans_table', 1),
(9, '2022_03_01_152447_create_tanggapans_table', 1),
(10, '2022_04_06_052207_create_tikets_table', 1),
(11, '2022_05_04_131753_create_layanans_table', 1),
(12, '2022_05_07_052441_create_tiket_layanans_table', 1),
(13, '2022_05_15_045649_create_tanggapan_layanans_table', 1);

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
-- Struktur dari tabel `pegawais`
--

CREATE TABLE `pegawais` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `nip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pegawais`
--

INSERT INTO `pegawais` (`id`, `user_id`, `nip`, `nama`, `created_at`, `updated_at`) VALUES
(1, 3, '198701192020122007', 'NADIA ASRI,ST', '2022-06-03 10:01:58', '2022-06-03 10:01:58'),
(2, 4, '199406192020121011', 'ALIT PERDANA PUTRA,ST', '2022-06-03 10:05:11', '2022-06-03 10:05:11'),
(3, 5, '196404061996031002', 'TRIMO SETIYONO AH,M.Si', '2022-06-03 10:11:32', '2022-06-03 10:11:32'),
(4, 6, '197809012006041004', 'JEFRIDEN, SE, M.Si', '2022-06-03 10:11:54', '2022-06-03 10:11:54'),
(5, 7, '196809212006042001', 'NURHAYATI, ST, M.Si', '2022-06-03 10:12:16', '2022-06-03 10:12:16'),
(6, 8, '197806232006041001', 'HARRY SETIADI,MH', '2022-06-03 10:12:41', '2022-06-03 10:12:41'),
(7, 9, '198205232011022001', 'NENNY SUWITA SARI,SH', '2022-06-03 10:13:03', '2022-06-03 10:13:03'),
(8, 10, '197207011996032002', 'YULI HAFIZAH,SE', '2022-06-03 10:14:20', '2022-06-03 10:14:20'),
(9, 11, '196708131989031008', 'RIDUAN SORITAON HARAHAP,A.Md', '2022-06-03 10:14:48', '2022-06-03 10:14:48'),
(10, 12, '197203191998031003', 'GUNAWAN AGUS RIYANTO,MT', '2022-06-03 10:15:11', '2022-06-03 10:15:11'),
(11, 13, '197801062005011005', 'YADHY HARTAWIJAYA, S.T', '2022-06-03 10:15:36', '2022-06-03 10:15:36'),
(12, 14, '197709262009031001', 'RAIHANUL ASHRI,ST, M.Si', '2022-06-03 10:16:00', '2022-06-03 10:16:00'),
(13, 15, '197312182000031004', 'WIDODO,ST', '2022-06-03 10:16:20', '2022-06-03 10:16:20'),
(14, 16, '197112051998031003', 'DELFA EDISON, SKM', '2022-06-03 10:16:47', '2022-06-03 10:16:47'),
(15, 17, '197811062011021002', 'FERI SAPUTRA,M.Si', '2022-06-03 10:17:10', '2022-06-03 10:17:10'),
(16, 18, '197608122010012014', 'DEWI LEDYANA, ST', '2022-06-03 10:17:33', '2022-06-03 10:17:33'),
(17, 19, '197601132009022002', 'HIJRA NELVITA, ST', '2022-06-03 10:18:02', '2022-06-03 10:18:02'),
(18, 20, '197201222009022001', 'HERIYANIS,ST', '2022-06-03 10:18:39', '2022-06-03 10:18:39'),
(19, 21, '197704112007011003', 'HENKI IRAWAN,S.Sos', '2022-06-03 10:18:59', '2022-06-03 10:18:59'),
(20, 22, '198204272010011021', 'HARTA YUAPRIZAL, SE', '2022-06-03 10:19:18', '2022-06-03 10:19:18'),
(21, 23, '198412182009031004', 'HASBI ABDUH, SE', '2022-06-03 10:19:42', '2022-06-03 10:19:42'),
(22, 24, '197706232007012005', 'ELFINA,S.Sos', '2022-06-03 10:20:00', '2022-06-03 10:20:00'),
(23, 25, '198112102005012006', 'SUSI DESWITA,S.Sos', '2022-06-03 10:20:21', '2022-06-03 10:20:21'),
(24, 26, '198402122010011027', 'ADI SARIYANTO, SE', '2022-06-03 10:21:01', '2022-06-03 10:21:01'),
(25, 27, '196611081988032002', 'RAJA DEWI ILYANI, S.Sos', '2022-06-03 10:21:27', '2022-06-03 10:21:27'),
(26, 28, '197103181994031002', 'DRS. MOHAMMAD SALIM', '2022-06-03 10:21:51', '2022-06-03 10:21:51'),
(27, 29, '197705092008011016', 'EFENDI,ST', '2022-06-03 10:22:10', '2022-06-03 10:22:10'),
(28, 30, '198203022008011011', 'HILMI MUKHTASIB,ST,MT', '2022-06-03 10:22:34', '2022-06-03 10:22:34'),
(29, 31, '197808102008011016', 'HEFRI DASMAN, ST', '2022-06-03 10:22:55', '2022-06-03 10:22:55'),
(30, 32, '198101292011021001', 'DONY SARTIKA, SE', '2022-06-03 10:23:18', '2022-06-03 10:23:18'),
(31, 33, '197809282009021004', 'FIRMAN ADJIS,ST', '2022-06-03 10:23:56', '2022-06-03 10:23:56'),
(32, 34, '198606072010031001', 'RADHIAN RAPANI,S.IP', '2022-06-03 10:24:16', '2022-06-03 10:24:16'),
(33, 35, '198210272009021005', 'BOBBY SUKRIYA,S.S.A.P', '2022-06-03 10:24:38', '2022-06-03 10:24:38'),
(34, 36, '197804102010011015', 'MAMAT RAHMAT,ST', '2022-06-03 10:24:57', '2022-06-03 10:24:57'),
(35, 37, '197607122003121006', 'ANDY FUAD,ST', '2022-06-03 10:25:21', '2022-06-03 10:25:21'),
(36, 38, '198003082010012020', 'YESSY NAZRIAL,ST', '2022-06-03 10:25:42', '2022-06-03 10:25:42'),
(37, 39, '197010092002121002', 'M.NURUL ISRAK,ST,M.Si', '2022-06-03 10:26:14', '2022-06-03 10:26:14'),
(38, 40, '197703122003121005', 'MUHAMMAD WAHYUDI,S.Sos', '2022-06-03 10:26:32', '2022-06-03 10:26:32'),
(39, 41, '197408111993111001', 'FAIZAL AHMADIN,AP,M.Si', '2022-06-03 10:26:48', '2022-06-03 10:26:48'),
(40, 42, '198504292015031004', 'RIDHO PIRMANDA, ST', '2022-06-03 10:27:05', '2022-06-03 10:27:05'),
(41, 43, '199001182019032015', 'YENI RORITA,S.S.T', '2022-06-03 10:27:23', '2022-06-03 10:27:23'),
(42, 44, '196504291985031004', 'RESTYA VENRA A.Md', '2022-06-03 10:27:42', '2022-06-03 10:27:42'),
(43, 45, '196510061989031002', 'MAIR', '2022-06-03 10:28:03', '2022-06-03 10:28:03'),
(44, 46, '197705152006042013', 'HERA ROZIAH', '2022-06-03 10:28:19', '2022-06-03 10:28:19'),
(45, 47, '197307161992122001', 'LENNY ARSANTI, SKM', '2022-06-03 10:28:37', '2022-06-03 10:28:37'),
(46, 48, '197602081997031003', 'RAJA SAFELORAS', '2022-06-03 10:29:06', '2022-06-03 10:29:06'),
(47, 49, '197609012008011006', 'DEDI WARMAN', '2022-06-03 10:29:27', '2022-06-03 10:29:27'),
(48, 50, '197208242003121003', 'ABDUL RAHMAN', '2022-06-03 10:29:45', '2022-06-03 10:29:45'),
(49, 51, '197708132010012012', 'SUWARNI', '2022-06-03 10:30:05', '2022-06-03 10:30:05'),
(50, 52, '198503182010011001', 'ABDUL GAFUR', '2022-06-03 10:30:23', '2022-06-03 10:30:23'),
(51, 53, '196410121994031004', 'MUFTI RIZAL', '2022-06-03 10:30:38', '2022-06-03 10:30:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengaduans`
--

CREATE TABLE `pengaduans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `penyedia_id` bigint(20) UNSIGNED NOT NULL,
  `tanggal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bulan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bukti` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `disposisi` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pengaduans`
--

INSERT INTO `pengaduans` (`id`, `penyedia_id`, `tanggal`, `bulan`, `tahun`, `judul`, `keterangan`, `bukti`, `disposisi`, `created_at`, `updated_at`) VALUES
(1, 1, '03', '06', '2022', 'PERUBAHAN DATA NPWP', 'PERUBAHAN DATA NPWP', 'npwp.jpg', 0, '2022-06-03 09:59:54', '2022-06-04 05:52:45'),
(4, 2, '03', '06', '2022', 'Akun tidak bisa dibuka', 'Tidak bisa login di LPSE Kab. Rokan Hilir', 'GAGAL LOGIN LPSE.png', 1, '2022-06-03 10:39:05', '2022-06-03 10:40:05'),
(10, 4, '09', '06', '2022', 'ganti email lpse', 'ganti email lpse', 'EMAIL.png', 1, '2022-06-08 20:52:27', '2022-06-08 20:54:56');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penyedias`
--

CREATE TABLE `penyedias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `npwp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `penyedias`
--

INSERT INTO `penyedias` (`id`, `user_id`, `npwp`, `nama`, `no_hp`, `created_at`, `updated_at`) VALUES
(1, 2, '808346324216000', 'PT. ERA LIARDY HAFZA', '0761-679179', '2022-06-03 09:59:03', '2022-06-03 09:59:03'),
(2, 54, '19694983216000', 'CV. MENARA MAS', '0761-28222', '2022-06-03 10:38:21', '2022-06-03 10:38:21'),
(4, 77, '827596776211000', 'CV ANNAYA SHAKIELA KONTRAKTOR', '0761-28228', '2022-06-08 20:51:25', '2022-06-08 20:51:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tanggapans`
--

CREATE TABLE `tanggapans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pengaduan_id` bigint(20) UNSIGNED NOT NULL,
  `pegawai_id` bigint(20) UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `status` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `dokumen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tanggapans`
--

INSERT INTO `tanggapans` (`id`, `pengaduan_id`, `pegawai_id`, `tanggal`, `status`, `dokumen`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2022-06-03', 'NPWP sudah diperbaharui', 'npwp.jpg', '2022-06-03 10:03:12', '2022-06-03 10:03:12'),
(5, 4, 1, '2022-06-03', 'Akun sudah digunakan kembali silahkan masukkan password dan username lama', 'LOGIN BERHASIL.png', '2022-06-03 10:41:09', '2022-06-03 10:41:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tanggapan_layanans`
--

CREATE TABLE `tanggapan_layanans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `layanan_id` bigint(20) UNSIGNED NOT NULL,
  `pegawai_id` bigint(20) UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `status` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `dokumen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tanggapan_layanans`
--

INSERT INTO `tanggapan_layanans` (`id`, `layanan_id`, `pegawai_id`, `tanggal`, `status`, `dokumen`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '2022-06-03', 'Printer sudah selesai diperbaiki', 'printerbagus.png', '2022-06-03 10:34:09', '2022-06-03 10:34:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tikets`
--

CREATE TABLE `tikets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pengaduan_id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` enum('belum diproses','sedang diproses','diterima','ditolak') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tikets`
--

INSERT INTO `tikets` (`id`, `pengaduan_id`, `kode`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 1, 'BPJ-0001', 'belum diproses', '2022-06-03 09:59:54', '2022-06-03 09:59:54'),
(2, 1, 'BPJ-0001', 'sedang diproses', '2022-06-03 10:02:09', '2022-06-03 10:02:09'),
(3, 1, 'BPJ-0001', 'diterima', '2022-06-03 10:03:12', '2022-06-03 10:03:12'),
(11, 4, 'BPJ-0002', 'belum diproses', '2022-06-03 10:39:05', '2022-06-03 10:39:05'),
(12, 4, 'BPJ-0002', 'sedang diproses', '2022-06-03 10:40:05', '2022-06-03 10:40:05'),
(13, 4, 'BPJ-0002', 'diterima', '2022-06-03 10:41:09', '2022-06-03 10:41:09'),
(23, 10, 'BPJ-0003', 'belum diproses', '2022-06-08 20:52:27', '2022-06-08 20:52:27'),
(25, 10, 'BPJ-0003', 'sedang diproses', '2022-06-08 20:54:56', '2022-06-08 20:54:56');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tiket_layanans`
--

CREATE TABLE `tiket_layanans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `layanan_id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` enum('belum diproses','sedang diproses','diterima','ditolak') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tiket_layanans`
--

INSERT INTO `tiket_layanans` (`id`, `layanan_id`, `kode`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 1, 'LBJ-0001', 'belum diproses', '2022-06-03 10:32:46', '2022-06-03 10:32:46'),
(2, 1, 'LBJ-0001', 'sedang diproses', '2022-06-03 10:33:29', '2022-06-03 10:33:29'),
(3, 1, 'LBJ-0001', 'diterima', '2022-06-03 10:34:09', '2022-06-03 10:34:09'),
(10, 6, 'LBJ-0002', 'belum diproses', '2022-06-04 06:36:14', '2022-06-04 06:36:14'),
(11, 7, 'LBJ-0003', 'belum diproses', '2022-06-08 06:48:36', '2022-06-08 06:48:36');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('helpdesk','pegawai','penyedia') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'helpdesk@gmail.com', '2022-06-03 10:00:55', '$2y$10$E2h1atYMGy.wdL5wD4VNpOLGOCT4Dd.vJHJjQ3xC9a/oGokihd3em', 'helpdesk', 'qETttf3dpKzp4AcHNfAAu0vEj5JI5sJmRiFDKZLCsWZausWQnov4JNwdJnmS', NULL, '2022-06-03 10:00:55'),
(2, 'eraliardyhafza@yahoo.co.id', '2022-06-03 09:59:23', '$2y$10$YYEcFv.jHkxyHvLKIWnzHeVdQlv/M3O.NZgb.8gNHUEeKojTuihee', 'penyedia', NULL, '2022-06-03 09:59:03', '2022-06-03 09:59:23'),
(3, 'nonanadia@gmail.com', '2022-06-03 10:02:33', '$2y$10$kgQNxl8hzjKuuFBecCQRlehYVzZOpOxeWhqczA./y9LQgiCvDCPHe', 'pegawai', NULL, '2022-06-03 10:01:58', '2022-06-03 10:02:33'),
(4, 'alitperdana@gmail.com', '2022-06-03 10:05:32', '$2y$10$qJARnFuzhju5hl1BA3Wgae4xm0zMnW1J6ZipRQKU1M0W4HsenoBNS', 'pegawai', NULL, '2022-06-03 10:05:11', '2022-06-03 10:05:32'),
(5, 'trimo@gmail.com', NULL, '$2y$10$b32xKf23MtXPkAaLnm94tu7kRyg4Lpzf3NRb1eDuXJgiD1jnBZdlS', 'pegawai', NULL, '2022-06-03 10:11:32', '2022-06-03 10:11:32'),
(6, 'jefriden@gmail.com', NULL, '$2y$10$WOmdmneSJD9D0/WtxPRoe.7J6wUv9g1lfZaRTxVD5c3uzMyZeFNQW', 'pegawai', NULL, '2022-06-03 10:11:54', '2022-06-03 10:11:54'),
(7, 'nurhayati@gmail.com', NULL, '$2y$10$Xev0vtVwiaMJJzZJdHsQneCPWkS.AX/XTXlyMcfpMnpBKqtd6Urc6', 'pegawai', NULL, '2022-06-03 10:12:16', '2022-06-03 10:12:16'),
(8, 'harry@gmail.com', NULL, '$2y$10$RI1scParUzCY6.3E/opvbu6cB4DcJVZeZF4XNvXaKztDveMzlEZim', 'pegawai', NULL, '2022-06-03 10:12:41', '2022-06-03 10:12:41'),
(9, 'nenny@gmail.com', NULL, '$2y$10$NvZiNap7l2DGdcvWX1JSF.IKhGTJIUXzdQZb2vYrGONByJrflllqi', 'pegawai', NULL, '2022-06-03 10:13:03', '2022-06-03 10:13:03'),
(10, 'yuli@gmail.com', NULL, '$2y$10$d79BVRVfYYDl2KBM9w1lTOTWhoT.2cQiVq1ZBz1fyNSd875uyBw/q', 'pegawai', NULL, '2022-06-03 10:14:20', '2022-06-03 10:14:20'),
(11, 'riduan@gmail.com', NULL, '$2y$10$/y7R75p9DuXDYG8FBHQ50.gno9YYnS1L.dvP38KLkJzynoB7306ZS', 'pegawai', NULL, '2022-06-03 10:14:48', '2022-06-03 10:14:48'),
(12, 'gunawan@gmail.com', NULL, '$2y$10$swGZXPloOHNTq074FE0RWeLFhpENg7qT/rVrmM6FcrTGMzKVa.uZW', 'pegawai', NULL, '2022-06-03 10:15:11', '2022-06-03 10:15:11'),
(13, 'yadhy@gmail.com', NULL, '$2y$10$ZLydyMxPO5DRVS06pPwuF.Cx5kueKT0nhVWCrvP/3mgmCPy2KpSxy', 'pegawai', NULL, '2022-06-03 10:15:36', '2022-06-03 10:15:36'),
(14, 'raihanul@gmail.com', NULL, '$2y$10$Fx/ekGXFcM5lJM6RHZAvBugY4mfo/3hkt6111IXF0YvAKiHuVctL.', 'pegawai', NULL, '2022-06-03 10:16:00', '2022-06-03 10:16:00'),
(15, 'widodo@gmail.com', NULL, '$2y$10$eSnKH6F6tgDv8/sRzKxkQukKAjJJsmSgChSQyqGzJv28NvjSxiS4e', 'pegawai', NULL, '2022-06-03 10:16:20', '2022-06-03 10:16:20'),
(16, 'delfa@gmail.com', NULL, '$2y$10$JjaFxzCkxRpkbNdEv/muVerMUZnC8g0ALZxCFFmaWgJlKSpXk/wPG', 'pegawai', NULL, '2022-06-03 10:16:47', '2022-06-03 10:16:47'),
(17, 'feri@gmail.com', NULL, '$2y$10$ZhzbvxkdgxgcuxXSjUn4V.GDptw.cZEUKeQBEBXm7r5VFOKzs503S', 'pegawai', NULL, '2022-06-03 10:17:10', '2022-06-03 10:17:10'),
(18, 'dewi@gmail.com', NULL, '$2y$10$A5nfO03qEHQZCGx8cHdKUeBsl2d6IJbBiJrvdjXuFXBfTEdoQvCa.', 'pegawai', NULL, '2022-06-03 10:17:33', '2022-06-03 10:17:33'),
(19, 'hijra@gmail.com', NULL, '$2y$10$g4rjwCwcHQ50Gs0ccrcl4OFTfR8Hn/8bsgErfRIBATMBveUTPg2.q', 'pegawai', NULL, '2022-06-03 10:18:01', '2022-06-03 10:18:01'),
(20, 'heriyanis@gmail.com', NULL, '$2y$10$kICCslCsFl92aZftN36yvOBUsprkvaYf/pTtqf0Zzs3zMom4vMY2u', 'pegawai', NULL, '2022-06-03 10:18:39', '2022-06-03 10:18:39'),
(21, 'henki@gmail.com', NULL, '$2y$10$7nSRiAvS0OFyVduichT1OebC1d7CwhoWPIhfa0sVWvljwZaHs7alq', 'pegawai', NULL, '2022-06-03 10:18:58', '2022-06-03 10:18:58'),
(22, 'harta@gmail.com', NULL, '$2y$10$hXdSFPQL9qzS/aEKmYNUPe483M48oz9oScgIBsszlQmbIthR2q4JS', 'pegawai', NULL, '2022-06-03 10:19:18', '2022-06-03 10:19:18'),
(23, 'hasbi@gmail.com', NULL, '$2y$10$IltWq2QSCtBRtGbPE4SNFOodQdz/7D6r4ylVRqKu/vnQH21n/9UBG', 'pegawai', NULL, '2022-06-03 10:19:42', '2022-06-03 10:19:42'),
(24, 'elfina@gmail.com', NULL, '$2y$10$le9kREuT.SqnA4bLedoe5.m0pPWeHAa4LuBvAiUq44q17rvlrOQBy', 'pegawai', NULL, '2022-06-03 10:20:00', '2022-06-03 10:20:00'),
(25, 'susi@gmail.com', NULL, '$2y$10$ZH5dt90tC1EJ5IFoiW3N5u7dtx.IczU8sjxvc4uz47.XBOwECuyTm', 'pegawai', NULL, '2022-06-03 10:20:21', '2022-06-03 10:20:21'),
(26, 'adi@gmail.com', NULL, '$2y$10$RL./qtTcu7dNmmj6LYtvnenjWpcWTeYjkjFRohSepVTgJaVwHZu8i', 'pegawai', NULL, '2022-06-03 10:21:01', '2022-06-03 10:21:01'),
(27, 'raja@gmail.com', NULL, '$2y$10$uMkqPiH.nml/5PODi7TyjOwW9t9typ8FTsUDweTB97xJ.IzaAPE6a', 'pegawai', NULL, '2022-06-03 10:21:27', '2022-06-03 10:21:27'),
(28, 'mohammadsalim@gmail.com', NULL, '$2y$10$f6cdlZLqeDbOLzUGHmYvWOAxRuPaObfFN9ErsepuLn6KhycBQwEKa', 'pegawai', NULL, '2022-06-03 10:21:51', '2022-06-03 10:21:51'),
(29, 'efendi@gmail.com', NULL, '$2y$10$q887z6z91pp7cVNF3tSI/uNy29BgVC0iJXiKbMNiIMSmZ3grafqce', 'pegawai', NULL, '2022-06-03 10:22:10', '2022-06-03 10:22:10'),
(30, 'hilmi@gmail.com', NULL, '$2y$10$4usMPXdbUVQWCtbTdgWBM.IPE6gK5xOJUKHynV3f9TpQVUHQIScmu', 'pegawai', NULL, '2022-06-03 10:22:34', '2022-06-03 10:22:34'),
(31, 'hefri@gmail.com', NULL, '$2y$10$itie5hBiN6d/sk0BV8QSieo1VB6KzjmOfXwuWacmR/z/y.OcaStt2', 'pegawai', NULL, '2022-06-03 10:22:55', '2022-06-03 10:22:55'),
(32, 'dony@gmail.com', NULL, '$2y$10$2g2iBQPEUa1yqz.26lSqK.4Yz0tjYMKgVOyWiV5kWJ2FfJzsc.Dea', 'pegawai', NULL, '2022-06-03 10:23:18', '2022-06-03 10:23:18'),
(33, 'firman@gmail.com', NULL, '$2y$10$jk0unhFKHGYNAfRrXybQ6eWQE2aDFDv.tWQujaD8kIrL0JwrFC8EC', 'pegawai', NULL, '2022-06-03 10:23:56', '2022-06-03 10:23:56'),
(34, 'radhian@gmail.com', NULL, '$2y$10$LWM2rNo79X8eOlIGIJCRfO4KV/LR4jAwR45YNSkCpePBOD/61IweS', 'pegawai', NULL, '2022-06-03 10:24:16', '2022-06-03 10:24:16'),
(35, 'bobby@gmail.com', NULL, '$2y$10$LTzCOyTtvT8FexACi7J.S.RPgKc/hWVtz7D3yZ9LFRVS3c61zlxYK', 'pegawai', NULL, '2022-06-03 10:24:38', '2022-06-03 10:24:38'),
(36, 'mamat@gmail.com', NULL, '$2y$10$psXGJHYYg3wZ63/ju2zO3.YtTass0qD5zuiqXFS2.CTKGONArfoBe', 'pegawai', NULL, '2022-06-03 10:24:57', '2022-06-03 10:24:57'),
(37, 'andy@gmail.com', NULL, '$2y$10$bjOcbhVTJfQQjzWMFjuvdObSnETwL9EboFBP0F9h3dzSNxgLz5M1.', 'pegawai', NULL, '2022-06-03 10:25:21', '2022-06-03 10:25:21'),
(38, 'yessy@gmail.com', NULL, '$2y$10$2L9.8OlUgnK3XX3Y9Jto5e.D83M7AtX0omBZBjDzCAr9ZU8ml74cO', 'pegawai', NULL, '2022-06-03 10:25:42', '2022-06-03 10:25:42'),
(39, 'nurul@gmail.com', NULL, '$2y$10$6icbwbNGHT7bd7OMZX4dfOS4X7RGRnJ4yuC/Uc1MzYioFJh1mZm32', 'pegawai', NULL, '2022-06-03 10:26:14', '2022-06-03 10:26:14'),
(40, 'wahyudi@gmail.com', NULL, '$2y$10$YmYzQ70NMEvKMj9oKKdqAO75EZgdVUSJfchmsVugeSZrhTth7F04S', 'pegawai', NULL, '2022-06-03 10:26:32', '2022-06-03 10:26:32'),
(41, 'faizal@gmail.com', NULL, '$2y$10$AbqYx8J1gFE48z9CgYBaBeOxJcWBeJu2nFWRyNqet8GQ5BVALUHpS', 'pegawai', NULL, '2022-06-03 10:26:48', '2022-06-03 10:26:48'),
(42, 'ridho@gmail.com', NULL, '$2y$10$k5m.rLNeO77sNm4Ua06sCuCDvMoiXsbru7gwlOmsGKg85JFeHE5Me', 'pegawai', NULL, '2022-06-03 10:27:05', '2022-06-03 10:27:05'),
(43, 'yeni@gmail.com', NULL, '$2y$10$zNPcmbzeh649FjIWuYZJkuRzCTg4iuouo0v0tJ.CvtaQMXx5oLvCO', 'pegawai', NULL, '2022-06-03 10:27:23', '2022-06-03 10:27:23'),
(44, 'restya@gmail.com', NULL, '$2y$10$vTEM0Z0YtsoskJUOLXBId.TZBVLD0t/0q5xn7kT6k0dcKL3usWD3G', 'pegawai', NULL, '2022-06-03 10:27:42', '2022-06-03 10:27:42'),
(45, 'mair@gmail.com', NULL, '$2y$10$rO1cnIsZ5QK7XXScPwIDTOKcpmiV6r7353IZ6lbNjcMdNxvmxdfP6', 'pegawai', NULL, '2022-06-03 10:28:03', '2022-06-03 10:28:03'),
(46, 'hera@gmail.com', NULL, '$2y$10$n.UKJ2/heJj0NJphjZgx9.nGeTjH3PUP8U9jwIcmPZB4HKbWt9Mzm', 'pegawai', NULL, '2022-06-03 10:28:19', '2022-06-03 10:28:19'),
(47, 'lenny@gmail.com', NULL, '$2y$10$FUwqZwmm2QcpI4.EitRWdOHsuJjQRNflMNRo6TGoHABprjiAOjiX6', 'pegawai', NULL, '2022-06-03 10:28:37', '2022-06-03 10:28:37'),
(48, 'rajasafeloras@gmail.com', NULL, '$2y$10$hsKuDBNbsqcEuIuuVa0biOlTUCUlEL10liCMuTd/MsL1EhM/f.qMG', 'pegawai', NULL, '2022-06-03 10:29:06', '2022-06-03 10:29:06'),
(49, 'dedi@gmail.com', NULL, '$2y$10$ImBRpkGrFmGdGa7OD5jgBuROZ9UM64d/mv5UhDs4TxZykw0dYinTq', 'pegawai', NULL, '2022-06-03 10:29:27', '2022-06-03 10:29:27'),
(50, 'abdul@gmail.com', NULL, '$2y$10$FxNAKuN66XN3aOLk6ZCGg.w7XzY6asvtxc73J7kG2sZJxX8gULIpu', 'pegawai', NULL, '2022-06-03 10:29:45', '2022-06-03 10:29:45'),
(51, 'suwarni@gmail.com', NULL, '$2y$10$EK/aHAc2vVq6wxayAheax.W696V83CNTM693RAbuBK6N3PHEZ1Kma', 'pegawai', NULL, '2022-06-03 10:30:05', '2022-06-03 10:30:05'),
(52, 'abdulgafur@gmail.com', NULL, '$2y$10$cUzQKu/Waz1mi/ZTHU.p3.jQrswrbN8DZapJe87I.eb4yUfDBFnKi', 'pegawai', NULL, '2022-06-03 10:30:23', '2022-06-03 10:30:23'),
(53, 'mufti@gmail.com', NULL, '$2y$10$myoRvJ0HuVLHEz7VwLy01.VGWJ/zrO0wj3Q.ov/DDJEMMWbg8Vr8.', 'pegawai', NULL, '2022-06-03 10:30:38', '2022-06-05 07:45:58'),
(54, 'cv_menaramas@yahoo.co.id', '2022-06-03 10:38:37', '$2y$10$lqWtqEhRY6WrdfG6RkUuX.ABvwJGMmN2NvJX1kJQ3wmRTuFOZE.yC', 'penyedia', NULL, '2022-06-03 10:38:21', '2022-06-03 10:38:37'),
(77, 'annayashakiela@yahoo.co.id', '2022-06-08 20:51:50', '$2y$10$dHbn/ffkpByEkp2rIAFhbeD81iWd0Ab0eaEtjwjP/UQ3SjOKj7icm', 'penyedia', NULL, '2022-06-08 20:51:25', '2022-06-08 20:51:50');

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
-- Indeks untuk tabel `helpdesks`
--
ALTER TABLE `helpdesks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `helpdesks_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `layanans`
--
ALTER TABLE `layanans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `layanans_pegawai_id_foreign` (`pegawai_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `pegawais`
--
ALTER TABLE `pegawais`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pegawais_nip_unique` (`nip`),
  ADD KEY `pegawais_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `pengaduans`
--
ALTER TABLE `pengaduans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pengaduans_penyedia_id_foreign` (`penyedia_id`);

--
-- Indeks untuk tabel `penyedias`
--
ALTER TABLE `penyedias`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `penyedias_npwp_unique` (`npwp`),
  ADD KEY `penyedias_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `tanggapans`
--
ALTER TABLE `tanggapans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tanggapans_pengaduan_id_foreign` (`pengaduan_id`),
  ADD KEY `tanggapans_pegawai_id_foreign` (`pegawai_id`);

--
-- Indeks untuk tabel `tanggapan_layanans`
--
ALTER TABLE `tanggapan_layanans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tanggapan_layanans_layanan_id_foreign` (`layanan_id`),
  ADD KEY `tanggapan_layanans_pegawai_id_foreign` (`pegawai_id`);

--
-- Indeks untuk tabel `tikets`
--
ALTER TABLE `tikets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tikets_pengaduan_id_foreign` (`pengaduan_id`);

--
-- Indeks untuk tabel `tiket_layanans`
--
ALTER TABLE `tiket_layanans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tiket_layanans_layanan_id_foreign` (`layanan_id`);

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
-- AUTO_INCREMENT untuk tabel `helpdesks`
--
ALTER TABLE `helpdesks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `layanans`
--
ALTER TABLE `layanans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `pegawais`
--
ALTER TABLE `pegawais`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT untuk tabel `pengaduans`
--
ALTER TABLE `pengaduans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `penyedias`
--
ALTER TABLE `penyedias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tanggapans`
--
ALTER TABLE `tanggapans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tanggapan_layanans`
--
ALTER TABLE `tanggapan_layanans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tikets`
--
ALTER TABLE `tikets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `tiket_layanans`
--
ALTER TABLE `tiket_layanans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `helpdesks`
--
ALTER TABLE `helpdesks`
  ADD CONSTRAINT `helpdesks_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `layanans`
--
ALTER TABLE `layanans`
  ADD CONSTRAINT `layanans_pegawai_id_foreign` FOREIGN KEY (`pegawai_id`) REFERENCES `pegawais` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pegawais`
--
ALTER TABLE `pegawais`
  ADD CONSTRAINT `pegawais_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pengaduans`
--
ALTER TABLE `pengaduans`
  ADD CONSTRAINT `pengaduans_penyedia_id_foreign` FOREIGN KEY (`penyedia_id`) REFERENCES `penyedias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `penyedias`
--
ALTER TABLE `penyedias`
  ADD CONSTRAINT `penyedias_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tanggapans`
--
ALTER TABLE `tanggapans`
  ADD CONSTRAINT `tanggapans_pegawai_id_foreign` FOREIGN KEY (`pegawai_id`) REFERENCES `pegawais` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tanggapans_pengaduan_id_foreign` FOREIGN KEY (`pengaduan_id`) REFERENCES `pengaduans` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tanggapan_layanans`
--
ALTER TABLE `tanggapan_layanans`
  ADD CONSTRAINT `tanggapan_layanans_layanan_id_foreign` FOREIGN KEY (`layanan_id`) REFERENCES `layanans` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tanggapan_layanans_pegawai_id_foreign` FOREIGN KEY (`pegawai_id`) REFERENCES `pegawais` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tikets`
--
ALTER TABLE `tikets`
  ADD CONSTRAINT `tikets_pengaduan_id_foreign` FOREIGN KEY (`pengaduan_id`) REFERENCES `pengaduans` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tiket_layanans`
--
ALTER TABLE `tiket_layanans`
  ADD CONSTRAINT `tiket_layanans_layanan_id_foreign` FOREIGN KEY (`layanan_id`) REFERENCES `layanans` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
