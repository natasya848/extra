-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2026 at 03:58 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ekstra`
--

-- --------------------------------------------------------

--
-- Table structure for table `absen`
--

CREATE TABLE `absen` (
  `id_absen` int(11) NOT NULL,
  `siswa` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `status` varchar(50) NOT NULL,
  `id_ekstra` int(11) NOT NULL,
  `semester` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `persen` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `absen`
--

INSERT INTO `absen` (`id_absen`, `siswa`, `tanggal`, `status`, `id_ekstra`, `semester`, `tahun`, `persen`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 121, '2025-06-03', 'H', 36, 2, 6, '2', '2025-06-03 11:30:17', '2025-06-03 12:57:15', NULL),
(2, 123, '2025-06-03', 'H', 36, 2, 6, '2', '2025-06-03 11:30:17', '2025-06-03 12:57:15', NULL),
(3, 121, '2025-06-04', 'A', 36, 2, 6, '2', '2025-06-03 11:42:42', NULL, NULL),
(4, 121, '2025-06-10', 'I', 36, 2, 6, '1', '2025-06-10 10:53:25', '2025-06-10 10:53:40', NULL),
(5, 123, '2025-06-10', 'H', 36, 2, 6, '2', '2025-06-10 10:53:25', '2025-06-10 10:53:40', NULL),
(6, 121, '2025-06-12', 'TK', 36, 2, 6, '0', '2025-06-12 08:39:35', '2025-06-12 09:01:09', NULL),
(7, 123, '2025-06-12', 'TK', 36, 2, 6, '0', '2025-06-12 08:39:35', '2025-06-12 09:01:09', NULL),
(8, 123, '2025-06-13', 'H', 36, 2, 6, '2', '2025-06-13 14:38:02', '2025-06-13 14:39:10', NULL),
(9, 121, '2025-06-13', 'H', 36, 2, 6, '2', '2025-06-13 14:38:02', '2025-06-13 14:39:10', NULL),
(11, 121, '2026-01-07', 'S', 1, 2, 6, '1', '2026-01-07 18:00:26', '2026-01-07 18:00:49', NULL),
(12, 121, '2026-01-08', 'H', 1, 2, 6, '2', '2026-01-08 02:28:25', '2026-01-08 02:28:25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ekstra`
--

CREATE TABLE `ekstra` (
  `id_ekstra` int(11) NOT NULL,
  `nama_ekstra` varchar(255) NOT NULL,
  `pembina` int(11) DEFAULT NULL,
  `hari` enum('Senin','Selasa','Rabu','Kamis','Jumat','Sabtu') NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `keterangan` text DEFAULT NULL,
  `status` enum('Aktif','Tidak Aktif') NOT NULL DEFAULT 'Aktif',
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `ekstra`
--

INSERT INTO `ekstra` (`id_ekstra`, `nama_ekstra`, `pembina`, `hari`, `jam_mulai`, `jam_selesai`, `keterangan`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Design Grafis', 2, 'Senin', '15:30:00', '17:00:00', 'Wow', 'Aktif', '2025-06-10 08:19:24', '2026-01-08 00:22:02'),
(3, 'Badminton', 5, 'Jumat', '10:00:00', '12:00:00', 'Keren', 'Aktif', '2025-07-26 14:30:49', '2026-01-08 00:21:21'),
(4, 'Model', 3, 'Selasa', '15:30:00', '17:00:00', 'Bagus', 'Aktif', '2026-01-07 13:06:14', '2026-01-08 00:20:51'),
(5, 'Vocal', 3, 'Selasa', '15:30:00', '17:00:00', 'Waw', 'Aktif', '2026-01-08 00:22:49', NULL),
(6, 'English Club', 5, 'Kamis', '15:30:00', '17:00:00', 'Jago', 'Aktif', '2026-01-08 00:23:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id_guru` int(11) NOT NULL,
  `nik` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `rombel` int(11) DEFAULT NULL,
  `user` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id_guru`, `nik`, `nama`, `rombel`, `user`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '8001', 'Pak Dedi', 40, 6, '2024-04-19 11:47:23', NULL, NULL),
(2, '8002', 'Pak If', 36, 17, '2024-04-19 19:22:59', NULL, NULL),
(3, '8003', 'Bu Rosita', 39, 18, '2024-04-19 20:39:48', NULL, NULL),
(4, '8004', 'Pak Beni', 38, 19, '2024-04-19 20:40:45', NULL, NULL),
(5, '8005', 'Pak Ray', 37, 23, '2024-04-21 09:50:19', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jabatan_guru`
--

CREATE TABLE `jabatan_guru` (
  `id_jabatan` int(11) NOT NULL,
  `nama_jabatan` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `jabatan_guru`
--

INSERT INTO `jabatan_guru` (`id_jabatan`, `nama_jabatan`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Kesiswaan', '2024-04-19 10:43:35', NULL, NULL),
(2, 'Instruktur', '2024-04-19 10:43:35', NULL, NULL),
(3, 'Guru', '2024-04-19 10:43:35', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jenjang`
--

CREATE TABLE `jenjang` (
  `id_jenjang` int(11) NOT NULL,
  `nama_jenjang` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `jenjang`
--

INSERT INTO `jenjang` (`id_jenjang`, `nama_jenjang`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'SMP', '2023-10-02 23:01:48', NULL, NULL),
(2, 'SMK', '2023-10-02 23:01:59', NULL, NULL),
(5, 'Tidak Mengajar', '2024-04-20 15:08:43', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` int(11) NOT NULL,
  `nama_jurusan` varchar(255) NOT NULL,
  `jurusan_detail` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `nama_jurusan`, `jurusan_detail`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'Rekayasa Perangkat Lunak', 'RPL', '2023-10-02 10:56:57', NULL, NULL),
(3, 'Akuntansi Lembaga Keuangan', 'AKL', '2023-10-02 11:18:54', NULL, NULL),
(4, 'Bisnis Daring Pemasaran', 'BDP', '2023-10-03 01:42:21', NULL, NULL),
(5, 'SMP ', 'SMP', '2023-10-03 01:44:43', NULL, NULL),
(6, 'Tidak Mengajar\r\n', NULL, '2024-04-20 15:06:17', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(255) NOT NULL,
  `maker_kelas` text DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`, `maker_kelas`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, '12', '', '2026-01-06 15:08:04', NULL, NULL),
(5, '11', '', '2023-10-03 01:41:46', NULL, NULL),
(7, '10', '', '2023-10-03 01:41:57', NULL, NULL),
(8, '9', '', '2023-10-03 01:42:02', NULL, NULL),
(9, '8', '', '2023-10-03 01:43:32', NULL, NULL),
(14, '7', '', '2023-10-03 01:43:57', NULL, NULL),
(15, 'Tidak Mengajar', NULL, '2024-04-20 15:04:10', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `nilai_ekstra`
--

CREATE TABLE `nilai_ekstra` (
  `id` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_ekstra` int(11) NOT NULL,
  `nilai` varchar(10) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `id_tahun` int(11) NOT NULL,
  `id_semester` int(11) NOT NULL,
  `input_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `nilai_ekstra`
--

INSERT INTO `nilai_ekstra` (`id`, `id_siswa`, `id_ekstra`, `nilai`, `keterangan`, `id_tahun`, `id_semester`, `input_by`, `created_at`) VALUES
(1, 123, 1, 'A', 'Bagus dalam mengikuti arahan design', 5, 2, 2, '2025-06-11 15:37:48'),
(4, 121, 4, 'B', 'ok ', 6, 2, 0, '2026-01-07 15:21:36'),
(5, 123, 1, 'A', 'keren', 6, 2, 0, '2026-01-07 15:35:16'),
(6, 121, 6, 'A', 'ok', 6, 2, 0, '2026-01-07 18:59:24');

-- --------------------------------------------------------

--
-- Table structure for table `nilai_sikap`
--

CREATE TABLE `nilai_sikap` (
  `id` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_tahun` int(11) NOT NULL,
  `id_semester` int(11) NOT NULL,
  `sikap_spiritual` varchar(20) DEFAULT NULL,
  `sikap_sosial` varchar(20) DEFAULT NULL,
  `catatan_wali` text DEFAULT NULL,
  `input_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `nilai_sikap`
--

INSERT INTO `nilai_sikap` (`id`, `id_siswa`, `id_tahun`, `id_semester`, `sikap_spiritual`, `sikap_sosial`, `catatan_wali`, `input_by`, `created_at`) VALUES
(1, 121, 5, 2, 'Baik', 'Cukup', 'Bagus \nOke', 0, '2025-06-02 05:00:39'),
(2, 123, 5, 2, '', '', '-', 0, '2025-06-02 05:00:39'),
(3, 123, 5, 2, 'Cukup', 'Baik', 'Ok', 0, '2025-06-11 15:28:18'),
(4, 121, 5, 2, 'Cukup', 'Baik', 'BAGUS', 0, '2025-06-11 15:32:48'),
(5, 123, 6, 2, 'Cukup', 'Baik', NULL, 0, '2026-01-07 15:22:45'),
(6, 121, 6, 2, 'Cukup', 'Baik', '-', 0, '2026-01-07 15:24:21'),
(7, 122, 6, 2, 'Baik', 'Baik', NULL, 0, '2026-01-07 15:35:45');

-- --------------------------------------------------------

--
-- Table structure for table `rombel`
--

CREATE TABLE `rombel` (
  `id_rombel` int(11) NOT NULL,
  `nama_r` varchar(255) NOT NULL,
  `kelas` int(11) NOT NULL,
  `jurusan` int(11) DEFAULT NULL,
  `jenjang` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `alumni` tinyint(4) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `rombel`
--

INSERT INTO `rombel` (`id_rombel`, `nama_r`, `kelas`, `jurusan`, `jenjang`, `created_at`, `updated_at`, `deleted_at`, `alumni`) VALUES
(24, 'A', 14, 5, 1, '2025-05-25 19:14:18', NULL, NULL, 0),
(25, 'B', 14, 5, 1, '2025-05-25 19:14:31', NULL, NULL, 0),
(26, 'C', 14, 5, 1, '2025-05-25 19:14:42', NULL, NULL, 0),
(27, 'A', 9, 5, 1, '2025-05-25 19:14:52', NULL, NULL, 0),
(28, 'B', 9, 5, 1, '2025-05-25 19:15:06', NULL, NULL, 0),
(29, 'C', 9, 5, 1, '2025-05-25 19:15:18', NULL, NULL, 0),
(30, 'A', 8, 5, 1, '2025-05-25 19:15:34', NULL, NULL, 1),
(31, 'B', 8, 5, 1, '2025-05-25 19:15:44', NULL, NULL, 1),
(32, 'C', 8, 5, 1, '2025-05-25 19:15:54', NULL, NULL, 1),
(33, 'A', 7, 2, 2, '2025-05-25 19:16:04', NULL, NULL, 0),
(34, 'A', 7, 3, 2, '2025-05-25 19:16:15', NULL, NULL, 0),
(35, 'A', 7, 4, 2, '2025-05-25 19:16:26', NULL, NULL, 0),
(36, 'A', 5, 2, 2, '2025-05-25 19:16:38', NULL, NULL, 0),
(37, 'B', 5, 2, 2, '2025-05-25 19:16:51', NULL, NULL, 0),
(38, 'A', 5, 3, 2, '2025-05-25 19:17:05', NULL, NULL, 0),
(39, 'A', 5, 4, 2, '2025-05-25 19:17:19', NULL, NULL, 0),
(40, 'Tidak Mengajar', 15, 6, 5, '2025-05-25 19:29:21', NULL, NULL, 0),
(41, 'A', 2, 3, 2, '2025-05-27 10:00:05', NULL, NULL, 1),
(42, 'A', 2, 4, 2, '2025-05-27 10:00:06', NULL, NULL, 1),
(43, 'A', 2, 2, 2, '2025-05-27 10:00:07', NULL, NULL, 1),
(44, 'B', 2, 2, 2, '2025-05-27 10:00:22', NULL, NULL, 1),
(45, 'BDP', 16, 0, 0, '2025-05-28 11:00:24', NULL, NULL, 0),
(46, 'AKL', 16, 0, 0, '2025-05-28 11:00:32', NULL, NULL, 0),
(47, 'RPL', 16, 0, 0, '2025-05-28 11:00:38', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `nis` varchar(255) NOT NULL,
  `nama_siswa` varchar(255) NOT NULL,
  `rombel` int(11) NOT NULL,
  `jurusan` int(11) NOT NULL,
  `id_periode` int(11) DEFAULT NULL,
  `tahun_lulusan` varchar(255) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `tempat_lahir` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `no_hp` varchar(255) DEFAULT NULL,
  `user` int(11) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `jenis_kelamin` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nis`, `nama_siswa`, `rombel`, `jurusan`, `id_periode`, `tahun_lulusan`, `tanggal_lahir`, `tempat_lahir`, `alamat`, `no_hp`, `user`, `created_at`, `updated_at`, `deleted_at`, `jenis_kelamin`) VALUES
(3, '1001', 'Kevin Fernando', 6, 2, NULL, NULL, '2005-08-12', 'Batam', NULL, '089734672638', 11, '2024-04-19 15:28:24', '2025-06-01 22:41:19', NULL, 1),
(4, '1002', 'Jofinson', 21, 3, NULL, NULL, NULL, NULL, NULL, NULL, 12, '2024-04-19 15:31:30', NULL, NULL, NULL),
(5, '1003', 'Kelsey', 22, 4, NULL, NULL, NULL, NULL, NULL, NULL, 13, '2024-04-19 15:31:57', NULL, NULL, NULL),
(6, '1004', 'Darrell', 6, 2, NULL, NULL, NULL, NULL, NULL, NULL, 14, '2024-04-19 17:32:44', '2024-04-21 23:35:48', NULL, NULL),
(7, '1005', 'Richard', 21, 3, NULL, NULL, NULL, NULL, NULL, NULL, 15, '2024-04-19 17:33:34', NULL, NULL, NULL),
(8, '1006', 'Yanda', 22, 4, NULL, NULL, NULL, NULL, NULL, NULL, 16, '2024-04-19 17:34:02', NULL, NULL, NULL),
(9, '1007', 'Hansen Purnama', 14, 0, NULL, NULL, NULL, NULL, NULL, NULL, 24, '2024-04-21 16:41:07', NULL, NULL, NULL),
(10, '1007', 'Ariel Nah', 14, 0, NULL, NULL, NULL, NULL, NULL, NULL, 27, '2024-04-21 22:51:05', NULL, NULL, NULL),
(11, '22161001', 'Aldrian', 41, 3, NULL, '2025', '2006-08-06', 'Batam, Kota Batam', 'Taman Sari A/84', '', 28, '2025-05-27 08:54:47', NULL, NULL, NULL),
(12, '22161003', 'Angel', 41, 3, NULL, '2025', '2007-01-07', 'Batam', 'Crown Hill. Blok E, No 17 Belian Batam', '', 29, '2025-05-27 08:54:47', NULL, NULL, NULL),
(13, '22161010', 'CERRINE', 41, 3, NULL, '2025', '2007-04-18', 'BATAM', 'Baloi Kusuma Indah Blok C No 18', '', 30, '2025-05-27 08:54:47', NULL, NULL, NULL),
(14, '22161011', 'Cindy Septiani', 41, 3, NULL, '2025', '2007-09-03', 'Dumai', 'Jl. Sotong Ujung No.5/F', '', 31, '2025-05-27 08:54:47', NULL, NULL, NULL),
(15, '23161056', 'Jeniffer', 41, 3, NULL, '2025', '2006-04-17', 'Batam', 'Cahaya Garden Blok C No 2', '', 32, '2025-05-27 08:54:47', NULL, NULL, NULL),
(16, '22161030', 'Joyce Liew Hwe Xin', 41, 3, NULL, '2025', '2007-02-22', 'Batam', 'Belian Residen Blok K N0.12 A', '', 33, '2025-05-27 08:54:47', NULL, NULL, NULL),
(17, '22161035', 'LISA', 41, 3, NULL, '2025', '2006-10-01', 'BATAM', 'Anggrek Permai Blok P 29', '', 34, '2025-05-27 08:54:47', NULL, NULL, NULL),
(18, '22161045', 'Taufik NG', 41, 3, NULL, '2025', '2006-11-05', 'Batam', 'Marbella Blk G6 No 6', '', 35, '2025-05-27 08:54:47', NULL, NULL, NULL),
(19, '22161005', 'AULIA STEFHANIE', 42, 4, NULL, '2025', '2007-09-11', 'Selatpanjang', 'Garden Point 2 blok D no 28', '', 36, '2025-05-27 08:54:47', NULL, NULL, NULL),
(20, '22161015', 'DEWI', 42, 4, NULL, '2025', '2006-09-06', 'DURI ', 'Komp. Baloi View Blok D1 No.20', '', 37, '2025-05-27 08:54:47', NULL, NULL, NULL),
(21, '22161016', 'Dina Otapia', 42, 4, NULL, '2025', '2005-10-27', 'Batam', 'BALOI MAS PERMAI BLOK A NO 33', '', 38, '2025-05-27 08:54:47', NULL, NULL, NULL),
(22, '22161020', 'FARIEL FEBRIAN', 42, 4, NULL, '2025', '2007-07-14', 'BATAM', 'BALOI MAS ', '', 39, '2025-05-27 08:54:47', NULL, NULL, NULL),
(23, '22161024', 'JACKLYN', 42, 4, NULL, '2025', '2007-04-08', 'BATAM', 'komplek batam indah blok f 11', '', 40, '2025-05-27 08:54:47', NULL, NULL, NULL),
(24, '22161025', 'Jason Lam Febriansyah', 42, 4, NULL, '2025', '2007-02-16', 'Batam', 'KOMLEK VILLA MARINA', '', 41, '2025-05-27 08:54:47', NULL, NULL, NULL),
(25, '22161026', 'JESSICA', 42, 4, NULL, '2025', '2006-06-23', 'BATAM', 'Pulon', '', 42, '2025-05-27 08:54:47', NULL, NULL, NULL),
(26, '22161027', 'Jessly Alvina', 42, 4, NULL, '2025', '2008-06-30', 'Tembilahan', '.', '', 43, '2025-05-27 08:54:47', NULL, NULL, NULL),
(27, '22161032', 'Kiara Salsabila Sari', 42, 4, NULL, '2025', '2006-07-16', 'Batam, Kota Batam', 'Tiban Permata Biru Blok B No. 14', '', 44, '2025-05-27 08:54:47', NULL, NULL, NULL),
(28, '22161036', 'Muhammad Hasbi Ramdhani', 42, 4, NULL, '2025', '2006-09-23', 'Batam', 'Bengkong Indah Swadebi Blok J No 06', '', 45, '2025-05-27 08:54:47', NULL, NULL, NULL),
(29, '22161049', 'WILLIAM TAN', 42, 4, NULL, '2025', '2007-02-08', 'BATAM', 'BATU BATAM INDAH BLOK C NO 27', '085179818918', 46, '2025-05-27 08:54:47', NULL, NULL, NULL),
(30, '22161052', 'Yohana Rumapea', 42, 4, NULL, '2025', '2007-03-19', 'Batam', 'Sei Tering 2', '', 47, '2025-05-27 08:54:47', NULL, NULL, NULL),
(31, '221610023', 'AMANDA BR TAMBUNAN', 43, 2, NULL, '2025', '2007-02-09', 'BATAM', 'BELIAN', '', 48, '2025-05-27 08:54:47', '2025-06-03 21:17:42', '2025-06-03 21:56:50', NULL),
(32, '22161004', 'Aria Savana Jing Wen', 43, 2, NULL, '2025', '2007-07-06', 'Batam', 'Winner Kencana Blok A No 8 Q', '', 49, '2025-05-27 08:54:47', NULL, '2025-06-03 21:36:49', NULL),
(33, '22161006', 'Bryan', 43, 2, NULL, '2025', '2006-10-31', 'Batam', 'Tiban Raya Lestari Blok A No.8', '', 50, '2025-05-27 08:54:47', NULL, NULL, NULL),
(34, '22161007', 'Budhi Jayanto', 43, 2, NULL, '2025', '2007-05-30', 'Batam', 'Mitra Raya Blok E No. 33 A', '', 51, '2025-05-27 08:54:47', NULL, NULL, NULL),
(35, '22161013', 'DENNIS', 43, 2, NULL, '2025', '2007-08-14', 'BATAM', 'LUCKY ESTATE', '', 52, '2025-05-27 08:54:47', NULL, NULL, NULL),
(36, '22161017', 'Elly Gou', 43, 2, NULL, '2025', '2006-12-23', 'Batam', 'Winner Kencana Blok A-8i', '', 53, '2025-05-27 08:54:47', NULL, NULL, NULL),
(37, '22161018', 'Elvan', 43, 2, NULL, '2025', '2007-11-11', 'Batam', 'Taman Kota Baloi F3.2a', '', 54, '2025-05-27 08:54:47', NULL, NULL, NULL),
(38, '22161019', 'ERWIN LIE', 43, 2, NULL, '2025', '2007-11-30', 'BATAM', 'Komplek Paradise Centre Blok C No.2', '', 55, '2025-05-27 08:54:47', NULL, NULL, NULL),
(39, '22161021', 'FELIX BENEDIK WIJAYA', 43, 2, NULL, '2025', '2007-06-21', 'MEDAN', 'Garden Poin indah Blok D No.6', '', 56, '2025-05-27 08:54:47', NULL, NULL, NULL),
(40, '22161038', 'Morgen Taw', 43, 2, NULL, '2025', '2007-02-19', 'Batam', 'Royal Grand 2 A11', '', 57, '2025-05-27 08:54:47', NULL, NULL, NULL),
(41, '22161039', 'Ng Widiang', 43, 2, NULL, '2025', '2007-04-27', 'Bengkalis', 'Villa Pesona Asri Blok A5 No.13A', '', 58, '2025-05-27 08:54:47', NULL, NULL, NULL),
(42, '22161043', 'Robin Wongso', 43, 2, NULL, '2025', '2006-12-07', 'Batam', 'Orchid Garden A7 Baloi Mas', '', 59, '2025-05-27 08:54:47', NULL, NULL, NULL),
(43, '22161031', 'Julio Laiberto', 43, 2, NULL, '2025', '2006-07-26', 'Batam', 'Perumhan Orchid Park Blok D No.27', '', 60, '2025-05-27 08:54:47', NULL, NULL, NULL),
(44, '22161046', 'Tiffany', 43, 2, NULL, '2025', '2007-08-14', 'Batam', 'LUCKY ESTATE', '', 61, '2025-05-27 08:54:47', NULL, NULL, NULL),
(45, '22161008', 'CAHYA NELSON', 44, 2, NULL, '2025', '2007-03-29', 'Batam', 'Pancur', '', 62, '2025-05-27 08:54:47', NULL, NULL, NULL),
(46, '22161009', 'Cecilia Fansisca', 44, 2, NULL, '2025', '2007-05-29', 'Batam', 'Kampung Seraya', '', 63, '2025-05-27 08:54:47', NULL, NULL, NULL),
(47, '22161014', 'Desta Piola', 44, 2, NULL, '2025', '2005-12-19', 'Pangkal Pinang ', 'Tiban III', '', 64, '2025-05-27 08:54:47', NULL, NULL, NULL),
(48, '22161022', 'Floura Exveleransa', 44, 2, NULL, '2025', '2006-09-06', 'Batam', 'BALOI POINT', '', 65, '2025-05-27 08:54:47', NULL, NULL, NULL),
(49, '22161023', 'INZAGHI ANUGGRAHA', 44, 2, NULL, '2025', '2006-12-24', 'Batam', 'Kampung Dalam', '', 66, '2025-05-27 08:54:47', NULL, NULL, NULL),
(50, '22161028', 'Jessycha', 44, 2, NULL, '2025', '2007-07-06', 'Batam', 'Legenda Malaka Blok C4 No 010', '', 67, '2025-05-27 08:54:47', NULL, NULL, NULL),
(51, '22161029', 'Jimmy Alisando', 44, 2, NULL, '2025', '2006-10-10', 'Batam', 'Bengkong Garden Blok A No.3', '', 68, '2025-05-27 08:54:47', NULL, NULL, NULL),
(52, '22161034', 'Leonardo Jaylenson', 44, 2, NULL, '2025', '2007-08-07', 'Batam', 'Sandona Carissa 3 No 20', '082183318338', 69, '2025-05-27 08:54:47', NULL, NULL, NULL),
(53, '22161040', 'Nicholas Pratama', 44, 2, NULL, '2025', '2006-03-21', 'Batam', 'Jl Ladang kecil', '', 70, '2025-05-27 08:54:47', NULL, NULL, NULL),
(54, '22161041', 'RAMON LORENZO NG', 44, 2, NULL, '2025', '2006-11-11', 'Batam', 'Pulo Mas Pesidence Blok A No 11', '', 71, '2025-05-27 08:54:47', NULL, NULL, NULL),
(55, '22161044', 'SHEVIRA OKTA VIANI', 44, 2, NULL, '2025', '2007-10-29', 'Purbalingga', 'Batu Batam Indah', '', 72, '2025-05-27 08:54:47', NULL, NULL, NULL),
(56, '22161047', 'TINARDO', 44, 2, NULL, '2025', '2006-05-25', 'Tanjungmedang', 'Sei Gayung', '', 73, '2025-05-27 08:54:47', NULL, NULL, NULL),
(57, '22161048', 'Van Darren', 44, 2, NULL, '2025', '2006-12-29', 'Batam', 'Nagoya permai B no. 14', '', 74, '2025-05-27 08:54:47', NULL, NULL, NULL),
(58, '22161050', 'Yoga Gautama', 44, 2, NULL, '2025', '2007-02-18', 'Batam', 'Golden Land Blok F No.35', '', 75, '2025-05-27 08:54:47', NULL, NULL, NULL),
(59, '22161051', 'Yuro Stoner', 44, 2, NULL, '2025', '2007-10-11', 'Batam', 'Happy Valley Garden Blok K No.120', '', 76, '2025-05-27 08:54:47', NULL, NULL, NULL),
(60, '22141002', 'ARIANTO', 30, 5, NULL, '2025', '2010-04-22', 'BATAM', 'TAMAN DUTA INDAH BLOK F NO 25', '', 77, '2025-05-27 08:54:47', NULL, NULL, NULL),
(61, '23141039', 'BRUCE LEONARDO', 30, 5, NULL, '2025', '2010-09-25', 'Batam', 'Komplek Perumahan mitra Raya H1 22', '', 78, '2025-05-27 08:54:47', NULL, NULL, NULL),
(62, '22141005', 'Celine Wong', 30, 5, NULL, '2025', '2010-04-19', 'Batam', 'Cahaya Garden Blok H No 12A', '', 79, '2025-05-27 08:54:47', NULL, NULL, NULL),
(63, '22141009', 'Elis', 30, 5, NULL, '2025', '2009-10-28', 'Batam', 'Taman Sari Hijau Blok F312A', '', 80, '2025-05-27 08:54:47', NULL, NULL, NULL),
(64, '22141010', 'FRANCES', 30, 5, NULL, '2025', '2010-07-25', 'BATAM', 'PERMATA BALOI BLOK B6 NO 5', '', 81, '2025-05-27 08:54:47', NULL, NULL, NULL),
(65, '22141013', 'JAZRIEL ANTONIUS', 30, 5, NULL, '2025', '2009-04-07', 'GARUT', 'TIBAN LAMA', '', 82, '2025-05-27 08:54:47', NULL, NULL, NULL),
(66, '22141014', 'Joyce Pundarika Zhen', 30, 5, NULL, '2025', '2009-11-18', 'Batam', 'Permata Baloi Blok H3/23', '', 83, '2025-05-27 08:54:47', NULL, NULL, NULL),
(67, '22141016', 'KELVIN', 30, 5, NULL, '2025', '2009-10-04', 'Batam', 'PERUM SANDONA MINAZOO III/I', '', 84, '2025-05-27 08:54:47', NULL, NULL, NULL),
(68, '22141019', 'Lydia Ashley Wijaya', 30, 5, NULL, '2025', '2010-09-13', 'Batam', 'MARINA BUSINES CENTER BLK A NO 02', '', 85, '2025-05-27 08:54:47', NULL, NULL, NULL),
(69, '22141022', 'Michael Octa Nathanael', 30, 5, NULL, '2025', '2010-10-09', 'Batam', 'SanDona Blok Carissa 6 No.25', '', 86, '2025-05-27 08:54:47', NULL, NULL, NULL),
(70, '22141023', 'NOVRILIA LOVELY RERUNG', 30, 5, NULL, '2025', '2009-11-20', 'BATAM', 'Villa Diamond Blok B 1 No. 41', '', 87, '2025-05-27 08:54:47', NULL, NULL, NULL),
(71, '22141024', 'Pricilia Daviana Wong', 30, 5, NULL, '2025', '2010-08-23', 'Batam', 'Tiban GPI Cendana Blok E no 3', '', 88, '2025-05-27 08:54:47', NULL, NULL, NULL),
(72, '22141020', 'SHAWA HENSON', 30, 5, NULL, '2025', '2010-02-25', 'BATAM', 'PERMATA REGENCY BLOK C. NO 26', '', 89, '2025-05-27 08:54:47', NULL, NULL, NULL),
(73, '22141026', 'SHERENE CALLYSTA', 30, 5, NULL, '2025', '2010-06-18', 'Batam', 'Nagoya Permai Blok B 14', '', 90, '2025-05-27 08:54:47', NULL, NULL, NULL),
(74, '22141029', 'VELORINE JELVIANA', 30, 5, NULL, '2025', '2010-10-23', 'BATAM', 'BALOI MAS ASRI BLOK E NO.1', '', 91, '2025-05-27 08:54:47', NULL, NULL, NULL),
(75, '22141033', 'Yanto Cong', 30, 5, NULL, '2025', '2009-11-28', 'Batam', 'Anggrek Mas 1 Blok L 08', '', 92, '2025-05-27 08:54:47', NULL, NULL, NULL),
(76, '22141001', 'ANGELINE TAN', 31, 5, NULL, '2025', '2009-08-29', 'SINTANG', 'JL. AJI MELAYU', '', 93, '2025-05-27 08:54:47', NULL, NULL, NULL),
(77, '22141004', 'BARRY PHAN', 31, 5, NULL, '2025', '2010-06-01', 'BATAM', 'BALOI MAS GARDEN', '', 94, '2025-05-27 08:54:47', NULL, NULL, NULL),
(78, '22141006', 'CHRIS CHELLA', 31, 5, NULL, '2025', '2010-07-15', 'Tanjung Balai Karimun', 'Jl.Taman Puri GG.Pujasera No.46', '', 95, '2025-05-27 08:54:47', NULL, NULL, NULL),
(79, '22141008', 'Edelyn', 31, 5, NULL, '2025', '2008-10-02', 'Tanjung Pinang', 'Taman Baloi Mas Blok K No. 3A', '', 96, '2025-05-27 08:54:47', NULL, NULL, NULL),
(80, '22141012', 'Gracia Silviana Sihombing', 31, 5, NULL, '2025', '2010-09-03', 'Garut', 'Perum Bumi Malayu Asri Blok C26', '', 97, '2025-05-27 08:54:47', NULL, NULL, NULL),
(81, '22141015', 'Keisya Abelia Ramadhani', 31, 5, NULL, '2025', '2010-08-09', 'Tanjung Morawa', 'Tiban Lama no 10', '', 98, '2025-05-27 08:54:47', NULL, NULL, NULL),
(82, '22141017', 'KENZIE HARA', 31, 5, NULL, '2025', '2010-02-09', 'BATAM', 'TIBAN INDAH PERMAI', '', 99, '2025-05-27 08:54:47', NULL, NULL, NULL),
(83, '22141018', 'LIONA ASHA ADIKA NICHOLAS', 31, 5, NULL, '2025', '2010-09-22', 'KOTO BARU', 'TAMAN KANAAN INDAH', '', 100, '2025-05-27 08:54:47', NULL, NULL, NULL),
(84, '22141021', 'MADELINE', 31, 5, NULL, '2025', '2010-05-03', 'BATAM', 'BALOI MAS ANGGREK', '', 101, '2025-05-27 08:54:47', NULL, NULL, NULL),
(85, '21141041', 'MICHAEL KEVIN LEO', 31, 5, NULL, '2025', '2008-12-18', 'BATAM', 'PERUM MARCHELIA BLOK B NO. 225', '', 102, '2025-05-27 08:54:47', NULL, NULL, NULL),
(86, '22141025', 'SELLY', 31, 5, NULL, '2025', '2010-06-26', 'BATAM', 'Komp. Bukit Mas', '', 103, '2025-05-27 08:54:47', NULL, NULL, NULL),
(87, '22141027', 'VALENTIA GOTAMI TAN', 31, 5, NULL, '2025', '2010-04-23', 'Batam', 'Sunset Road 66', '', 104, '2025-05-27 08:54:47', NULL, NULL, NULL),
(88, '22141028', 'VANESSA THO', 31, 5, NULL, '2025', '2010-01-30', 'BATAM', 'PELITA', '', 105, '2025-05-27 08:54:47', NULL, NULL, NULL),
(89, '22141030', 'VIVIANA LESTARI', 31, 5, NULL, '2025', '2010-05-11', 'BATAM', 'WINNER KENCANA', '', 106, '2025-05-27 08:54:47', NULL, NULL, NULL),
(90, '22141031', 'WILLY ELHANSEN', 31, 5, NULL, '2025', '2010-08-05', 'BATAM', 'BALOI MAS GARDEN', '', 107, '2025-05-27 08:54:47', NULL, NULL, NULL),
(91, '22141032', 'Winna Karenhapucs Alexandria', 31, 5, NULL, '2025', '2010-10-20', 'Batam', 'Anggrek Mas Blok I No. 115', '', 108, '2025-05-27 08:54:47', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(92, '22141035', 'YULITA', 31, 5, NULL, '2025', '2010-03-20', 'BATAM', 'BATU BATAM PERMAI', '', 109, '2025-05-27 08:54:47', NULL, NULL, NULL),
(93, '22242001', 'ARSHAVIN TEVES', 32, 5, NULL, '2025', '2009-07-08', 'Batam', 'Permata Baloi Blok GI Nomor 30', '', 110, '2025-05-27 08:54:47', NULL, NULL, NULL),
(94, '22242002', 'DELSEN TAN', 32, 5, NULL, '2025', '2010-09-08', 'BATAM', 'GARDEN POINT', '082289013559', 111, '2025-05-27 08:54:47', NULL, NULL, NULL),
(95, '22242003', 'DESICA', 32, 5, NULL, '2025', '2009-12-02', 'BATAM', 'KOMP ANGGREK PERMAI', '', 112, '2025-05-27 08:54:47', NULL, NULL, NULL),
(96, '22242004', 'ELLYSSA CHEN', 32, 5, NULL, '2025', '2010-09-24', 'BATAM', 'KOMP NUSA JAYA BLOK K NO 7', '', 113, '2025-05-27 08:54:47', NULL, NULL, NULL),
(97, '22242005', 'FELICIA KANG', 32, 5, NULL, '2025', '2010-04-15', 'BATAM', 'RUKO BATU BATAM PERMAI', '', 114, '2025-05-27 08:54:47', NULL, NULL, NULL),
(98, '22242006', 'GRACE FRANCESCA', 32, 5, NULL, '2025', '2010-10-22', 'BATAM', 'TAMAN BALOI MAS BLOK E NO 15', '', 115, '2025-05-27 08:54:47', NULL, NULL, NULL),
(99, '22242007', 'IYAN', 32, 5, NULL, '2025', '2009-11-12', 'JAKARTA', 'BALOI POINT B 2', '', 116, '2025-05-27 08:54:47', NULL, NULL, NULL),
(100, '24141627', 'JACKLY', 32, 5, NULL, '2025', '2009-06-07', 'SELATPANJANG', 'JL. BANGLAS', '', 117, '2025-05-27 08:54:47', NULL, NULL, NULL),
(101, '22242008', 'JANNEL VANESSA', 32, 5, NULL, '2025', '2010-01-23', 'BATAM', 'BALOI MAS GARDEN', '', 118, '2025-05-27 08:54:47', NULL, NULL, NULL),
(102, '22242009', 'JASVENNO', 32, 5, NULL, '2025', '2010-09-17', 'BATAM', 'CAHAYA GARDEN', '', 119, '2025-05-27 08:54:47', NULL, NULL, NULL),
(103, '22242010', 'Juwita Vanessa', 32, 5, NULL, '2025', '2010-04-15', 'Batam', 'DIP Blok Akasia V No/7', '', 120, '2025-05-27 08:54:47', NULL, NULL, NULL),
(104, '22242011', 'Meylisa', 32, 5, NULL, '2025', '2010-09-23', 'Batam', 'Kavling Bida Kabil Blok Kembang Sari 1 No.49', '', 121, '2025-05-27 08:54:47', NULL, NULL, NULL),
(106, '22242013', 'SHEREN', 32, 5, NULL, '2025', '2009-07-14', 'BATAM', 'BATU BATAM PERMAI', '', 123, '2025-05-27 08:54:47', NULL, NULL, NULL),
(107, '22242014', 'VIONA ENJELINA', 32, 5, NULL, '2025', '2009-03-06', 'BATAM', 'MARINA BUSSINESS CENTER', '', 124, '2025-05-27 08:54:47', NULL, NULL, NULL),
(110, '22242012', 'M.nuh', 32, 5, NULL, '2025', '2010-02-15', 'Batam', 'Anggrek permai b/15', '087777219726', 125, '2025-05-27 08:54:47', NULL, NULL, NULL),
(111, '23465743', 'Amelia Cahya', 45, 4, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2025-05-28 10:59:42', NULL, NULL, NULL),
(121, '23161004', 'Natasha Gotami', 36, 2, NULL, NULL, NULL, NULL, NULL, NULL, 127, '2025-05-29 16:37:38', NULL, NULL, NULL),
(122, '23161014', 'Engeline Chairine', 37, 2, NULL, NULL, '2008-10-16', 'Batam', NULL, '085668499103', 128, '2025-05-29 16:38:16', '2025-06-02 00:15:00', NULL, 2),
(123, '23161008', 'Meyliana', 36, 2, NULL, NULL, NULL, NULL, NULL, NULL, 129, '2025-05-29 16:39:11', NULL, NULL, NULL),
(124, '1012', 'test', 28, 2, NULL, NULL, NULL, NULL, NULL, NULL, 130, '2025-06-01 18:33:27', NULL, NULL, NULL),
(125, '4759232', 'apel', 0, 0, NULL, '2025', '2025-06-03', 'Batamm', 'istana', '08958294102', 0, '2025-06-03 08:01:30', NULL, NULL, NULL),
(126, '4759232', 'apel', 0, 0, NULL, '2025', '2025-06-03', 'Batamm', 'istana', '08958294102', 0, '2025-06-03 08:02:04', NULL, NULL, NULL),
(127, '4759232', 'apel', 0, 0, NULL, '2025', '2025-06-03', 'Batamm', 'istana', '08958294102', 0, '2025-06-03 08:02:40', NULL, NULL, NULL),
(128, '4759232', 'apel', 0, 5, NULL, '2025', '2025-06-03', 'Batam', 'batam', '089572759193', 0, '2025-06-03 08:15:34', NULL, NULL, NULL),
(129, '4759232', 'apel', 0, 5, NULL, '2025', '2025-06-03', 'Batam', 'batam', '089572759193', 0, '2025-06-03 08:15:34', NULL, NULL, NULL),
(130, '4759232', 'apel', 32, 4, NULL, '2025', '2025-06-03', 'batam', 'istana', '08372942322', 0, '2025-06-03 08:55:30', NULL, NULL, NULL),
(131, '4759232', 'apel', 32, 4, NULL, '2025', '2025-06-03', 'batam', 'istana', '08372942322', 0, '2025-06-03 08:55:30', NULL, NULL, NULL),
(132, '23421322', 'yera', 43, 2, NULL, '2024/2025', '2025-06-03', 'Batam', 'istanaa', '085829492113', 132, '2025-06-03 10:03:11', NULL, NULL, NULL),
(133, '12342321', 'viera', 43, 2, NULL, '2024/2025', '2025-06-03', 'Batam', 'istana', '085829492113', 133, '2025-06-03 10:05:08', NULL, NULL, NULL),
(134, '23103211', 'Kalila', 42, 4, NULL, '2024', '0000-00-00', 'Batam', 'istana', '89231932112', 136, '2025-06-09 18:08:34', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `level` int(11) NOT NULL,
  `foto` text NOT NULL,
  `jenjang` int(11) DEFAULT NULL,
  `jabatan` int(11) DEFAULT NULL,
  `pendaftaran` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `status_delete` tinyint(4) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`, `email`, `level`, `foto`, `jenjang`, `jabatan`, `pendaftaran`, `created_at`, `updated_at`, `deleted_at`, `status_delete`) VALUES
(1, NULL, 'Superadmin SMP', 'c4ca4238a0b923820dcc509a6f75849b', NULL, 1, 'default.png', 1, NULL, NULL, '2024-04-16 15:24:07', NULL, NULL, 0),
(2, NULL, 'Superadmin SMK', 'c4ca4238a0b923820dcc509a6f75849b', 'anna', 1, 'user_2.png', 2, NULL, NULL, '2024-04-16 15:24:07', '2024-04-21 22:54:31', NULL, 0),
(6, NULL, 'Pak Dedi', 'c4ca4238a0b923820dcc509a6f75849b', NULL, 3, 'default.png', NULL, 1, NULL, '2024-04-19 11:47:23', '2024-04-21 18:08:12', NULL, 0),
(8, NULL, 'Pak Haris', 'c4ca4238a0b923820dcc509a6f75849b', NULL, 6, 'default.png', NULL, NULL, NULL, '2024-04-19 13:39:14', NULL, NULL, 0),
(11, 'Kevin Fernando', '1001', 'c4ca4238a0b923820dcc509a6f75849b', 'test@gmail.com', 4, 'default.png', 2, NULL, NULL, '2024-04-19 15:28:24', NULL, NULL, 0),
(12, 'Jofinson', '1002', 'c4ca4238a0b923820dcc509a6f75849b', NULL, 4, 'default.png', 2, NULL, NULL, '2024-04-19 15:31:30', NULL, NULL, 0),
(13, 'Kelsey', '1003', 'c4ca4238a0b923820dcc509a6f75849b', NULL, 4, 'default.png', 2, NULL, NULL, '2024-04-19 15:31:57', NULL, NULL, 0),
(14, 'Darrell', '1004', 'c4ca4238a0b923820dcc509a6f75849b', NULL, 5, 'default.png', 2, NULL, NULL, '2024-04-19 17:32:44', NULL, NULL, 0),
(15, 'Richard', '1005', 'c4ca4238a0b923820dcc509a6f75849b', NULL, 4, 'default.png', 2, NULL, NULL, '2024-04-19 17:33:34', NULL, NULL, 0),
(16, 'Yanda', '1006', 'c4ca4238a0b923820dcc509a6f75849b', NULL, 4, 'default.png', 2, NULL, NULL, '2024-04-19 17:34:02', NULL, NULL, 0),
(17, NULL, 'Pak If', 'c4ca4238a0b923820dcc509a6f75849b', 'pakif', 3, 'default.png', 2, 2, NULL, '2024-04-19 19:22:59', NULL, NULL, 0),
(18, NULL, 'Bu Rosita', 'c4ca4238a0b923820dcc509a6f75849b', 'rosita', 3, 'default.png', 2, 2, NULL, '2024-04-19 20:39:48', NULL, NULL, 0),
(19, NULL, 'Pak Beni', 'c4ca4238a0b923820dcc509a6f75849b', NULL, 3, 'default.png', 2, 3, NULL, '2024-04-19 20:40:45', NULL, NULL, 0),
(20, NULL, 'Pak Tono', 'c4ca4238a0b923820dcc509a6f75849b', NULL, 6, 'default.png', NULL, NULL, NULL, '2024-04-19 22:59:42', NULL, NULL, 0),
(21, NULL, 'Admin SMK', 'c4ca4238a0b923820dcc509a6f75849b', NULL, 2, 'default.png', 2, NULL, NULL, '2024-04-20 14:50:42', NULL, NULL, 0),
(22, NULL, 'Admin SMP', 'c4ca4238a0b923820dcc509a6f75849b', NULL, 2, 'default.png', 1, NULL, NULL, '2024-04-20 14:50:42', NULL, NULL, 0),
(23, NULL, 'Pak Ray', 'c4ca4238a0b923820dcc509a6f75849b', '1', 3, 'default.png', 2, 2, NULL, '2024-04-21 09:50:19', NULL, NULL, 0),
(27, NULL, '1007', 'd7322ed717dedf1eb4e6e52a37ea7bcd', NULL, 4, 'default.png', 2, NULL, 2, '2024-04-21 22:51:05', NULL, NULL, 0),
(127, 'Natasha Gotami', '23161004', 'c4ca4238a0b923820dcc509a6f75849b', 'nat', 4, '63ba3ac4-1cbf-4d0d-8bd6-567453a853b0.jpeg', 2, 8, NULL, '2025-05-29 16:37:37', NULL, NULL, 0),
(128, 'Engeline Chairine', '23161014', 'c4ca4238a0b923820dcc509a6f75849b', 'kurumidafox@gmail.com', 4, 'BELOVED.jpg', 2, NULL, NULL, '2025-05-29 16:38:16', '2025-06-02 10:38:37', NULL, 0),
(129, 'Meyliana', '23161008', 'c4ca4238a0b923820dcc509a6f75849b', NULL, 4, 'fe7d5105-2be2-4228-88d5-9d2f3a134245.jpeg', 2, NULL, NULL, '2025-05-29 16:39:11', NULL, NULL, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absen`
--
ALTER TABLE `absen`
  ADD PRIMARY KEY (`id_absen`) USING BTREE;

--
-- Indexes for table `ekstra`
--
ALTER TABLE `ekstra`
  ADD PRIMARY KEY (`id_ekstra`) USING BTREE;

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id_guru`) USING BTREE;

--
-- Indexes for table `jabatan_guru`
--
ALTER TABLE `jabatan_guru`
  ADD PRIMARY KEY (`id_jabatan`) USING BTREE;

--
-- Indexes for table `jenjang`
--
ALTER TABLE `jenjang`
  ADD PRIMARY KEY (`id_jenjang`) USING BTREE;

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`) USING BTREE;

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`) USING BTREE;

--
-- Indexes for table `nilai_ekstra`
--
ALTER TABLE `nilai_ekstra`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `nilai_sikap`
--
ALTER TABLE `nilai_sikap`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `rombel`
--
ALTER TABLE `rombel`
  ADD PRIMARY KEY (`id_rombel`) USING BTREE;

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`) USING BTREE;

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absen`
--
ALTER TABLE `absen`
  MODIFY `id_absen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `ekstra`
--
ALTER TABLE `ekstra`
  MODIFY `id_ekstra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `jabatan_guru`
--
ALTER TABLE `jabatan_guru`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jenjang`
--
ALTER TABLE `jenjang`
  MODIFY `id_jenjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `nilai_ekstra`
--
ALTER TABLE `nilai_ekstra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `nilai_sikap`
--
ALTER TABLE `nilai_sikap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `rombel`
--
ALTER TABLE `rombel`
  MODIFY `id_rombel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
