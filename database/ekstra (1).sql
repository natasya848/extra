-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2026 at 03:10 AM
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
  `rombel` int(11) NOT NULL,
  `blok` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `persen` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `absen`
--

INSERT INTO `absen` (`id_absen`, `siswa`, `tanggal`, `status`, `rombel`, `blok`, `tahun`, `persen`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 121, '2025-06-03', 'H', 36, 8, 5, '2', '2025-06-03 11:30:17', '2025-06-03 12:57:15', NULL),
(2, 123, '2025-06-03', 'H', 36, 8, 5, '2', '2025-06-03 11:30:17', '2025-06-03 12:57:15', NULL),
(3, 121, '2025-06-04', 'A', 36, 8, 5, '2', '2025-06-03 11:42:42', NULL, NULL),
(4, 121, '2025-06-10', 'I', 36, 8, 5, '1', '2025-06-10 10:53:25', '2025-06-10 10:53:40', NULL),
(5, 123, '2025-06-10', 'H', 36, 8, 5, '2', '2025-06-10 10:53:25', '2025-06-10 10:53:40', NULL),
(6, 121, '2025-06-12', 'TK', 36, 8, 5, '0', '2025-06-12 08:39:35', '2025-06-12 09:01:09', NULL),
(7, 123, '2025-06-12', 'TK', 36, 8, 5, '0', '2025-06-12 08:39:35', '2025-06-12 09:01:09', NULL),
(8, 123, '2025-06-13', 'H', 36, 8, 5, '2', '2025-06-13 14:38:02', '2025-06-13 14:39:10', NULL),
(9, 121, '2025-06-13', 'H', 36, 8, 5, '2', '2025-06-13 14:38:02', '2025-06-13 14:39:10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ekstra`
--

CREATE TABLE `ekstra` (
  `id_ekstra` int(11) NOT NULL,
  `nama_ekstra` varchar(255) NOT NULL,
  `pembina` varchar(255) DEFAULT NULL,
  `hari` enum('Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu') NOT NULL,
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
(1, 'Design Grafis', '5', 'Jumat', '10:00:00', '11:30:00', 'iya', 'Tidak Aktif', '2025-06-10 08:19:24', '2025-07-26 14:47:38'),
(3, 'Badminton', '3', 'Jumat', '10:00:00', '11:30:00', 'hooh', 'Aktif', '2025-07-26 14:30:49', NULL);

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
(2, '8002', 'Pak If', 44, 17, '2024-04-19 19:22:59', NULL, NULL),
(3, '8003', 'Bu Rosita', 39, 18, '2024-04-19 20:39:48', NULL, NULL),
(4, '8004', 'Pak Beni', 34, 19, '2024-04-19 20:40:45', NULL, NULL),
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
(2, 'Kajur', '2024-04-19 10:43:35', NULL, NULL),
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
  `id_blok` int(11) NOT NULL,
  `input_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `nilai_ekstra`
--

INSERT INTO `nilai_ekstra` (`id`, `id_siswa`, `id_ekstra`, `nilai`, `keterangan`, `id_tahun`, `id_blok`, `input_by`, `created_at`) VALUES
(1, 123, 1, 'A', 'Bagus dalam mengikuti arahan design', 5, 8, 2, '2025-06-11 15:37:48');

-- --------------------------------------------------------

--
-- Table structure for table `nilai_sikap`
--

CREATE TABLE `nilai_sikap` (
  `id` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_tahun` int(11) NOT NULL,
  `id_blok` int(11) NOT NULL,
  `sikap_spiritual` varchar(20) DEFAULT NULL,
  `sikap_sosial` varchar(20) DEFAULT NULL,
  `catatan_wali` text DEFAULT NULL,
  `input_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `nilai_sikap`
--

INSERT INTO `nilai_sikap` (`id`, `id_siswa`, `id_tahun`, `id_blok`, `sikap_spiritual`, `sikap_sosial`, `catatan_wali`, `input_by`, `created_at`) VALUES
(1, 121, 5, 9, 'Baik', 'Cukup', 'Bagus \nOke', 0, '2025-06-02 05:00:39'),
(2, 123, 5, 9, '', '', '-', 0, '2025-06-02 05:00:39'),
(3, 123, 5, 8, 'Cukup', 'Baik', 'Ok', 0, '2025-06-11 15:28:18'),
(4, 121, 5, 8, 'Cukup', 'Baik', 'BAGUS', 0, '2025-06-11 15:32:48');

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
  `status_pendidikan` enum('SMA','SMK','Kuliah','Tidak') DEFAULT NULL,
  `tempat_pendidikan` varchar(255) DEFAULT NULL,
  `bekerja` enum('Iya','Tidak') DEFAULT NULL,
  `tempat_bekerja` varchar(255) DEFAULT NULL,
  `user` int(11) NOT NULL,
  `instruktur` int(11) DEFAULT NULL,
  `jadwal_piket` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `nama_pt` varchar(255) DEFAULT NULL,
  `guru_pembimbing` int(11) DEFAULT NULL,
  `kajur` int(11) DEFAULT NULL,
  `jenis_kelamin` int(11) DEFAULT NULL,
  `status_delete` tinyint(4) DEFAULT 0,
  `osis` tinyint(4) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nis`, `nama_siswa`, `rombel`, `jurusan`, `id_periode`, `tahun_lulusan`, `tanggal_lahir`, `tempat_lahir`, `alamat`, `no_hp`, `status_pendidikan`, `tempat_pendidikan`, `bekerja`, `tempat_bekerja`, `user`, `instruktur`, `jadwal_piket`, `created_at`, `updated_at`, `deleted_at`, `nama_pt`, `guru_pembimbing`, `kajur`, `jenis_kelamin`, `status_delete`, `osis`) VALUES
(3, '1001', 'Kevin Fernando', 6, 2, NULL, NULL, '2005-08-12', 'Batam', NULL, '089734672638', NULL, NULL, NULL, NULL, 11, 8, NULL, '2024-04-19 15:28:24', '2025-06-01 22:41:19', NULL, 'Batam Coding', 23, 17, 1, 0, 0),
(4, '1002', 'Jofinson', 21, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 12, NULL, NULL, '2024-04-19 15:31:30', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(5, '1003', 'Kelsey', 22, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 13, NULL, NULL, '2024-04-19 15:31:57', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(6, '1004', 'Darrell', 6, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 14, 8, NULL, '2024-04-19 17:32:44', '2024-04-21 23:35:48', NULL, NULL, NULL, NULL, NULL, 0, 0),
(7, '1005', 'Richard', 21, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 15, NULL, NULL, '2024-04-19 17:33:34', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(8, '1006', 'Yanda', 22, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 16, NULL, NULL, '2024-04-19 17:34:02', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(9, '1007', 'Hansen Purnama', 14, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 24, NULL, NULL, '2024-04-21 16:41:07', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(10, '1007', 'Ariel Nah', 14, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 27, NULL, NULL, '2024-04-21 22:51:05', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(11, '22161001', 'Aldrian', 41, 3, NULL, '2025', '2006-08-06', 'Batam, Kota Batam', 'Taman Sari A/84', '', 'Kuliah', 'Universitas Putera Batam', 'Tidak', NULL, 28, NULL, NULL, '2025-05-27 08:54:47', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(12, '22161003', 'Angel', 41, 3, NULL, '2025', '2007-01-07', 'Batam', 'Crown Hill. Blok E, No 17 Belian Batam', '', 'Kuliah', 'Universitas Universal/Manajemen', 'Tidak', NULL, 29, NULL, NULL, '2025-05-27 08:54:47', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(13, '22161010', 'CERRINE', 41, 3, NULL, '2025', '2007-04-18', 'BATAM', 'Baloi Kusuma Indah Blok C No 18', '', 'Kuliah', '-', 'Tidak', NULL, 30, NULL, NULL, '2025-05-27 08:54:47', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(14, '22161011', 'Cindy Septiani', 41, 3, NULL, '2025', '2007-09-03', 'Dumai', 'Jl. Sotong Ujung No.5/F', '', 'Kuliah', 'Universitas putra batam', 'Tidak', NULL, 31, NULL, NULL, '2025-05-27 08:54:47', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(15, '23161056', 'Jeniffer', 41, 3, NULL, '2025', '2006-04-17', 'Batam', 'Cahaya Garden Blok C No 2', '', 'Kuliah', 'Manajemen bisnis', 'Tidak', NULL, 32, NULL, NULL, '2025-05-27 08:54:47', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(16, '22161030', 'Joyce Liew Hwe Xin', 41, 3, NULL, '2025', '2007-02-22', 'Batam', 'Belian Residen Blok K N0.12 A', '', 'Kuliah', 'PSB Academy', 'Tidak', NULL, 33, NULL, NULL, '2025-05-27 08:54:47', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(17, '22161035', 'LISA', 41, 3, NULL, '2025', '2006-10-01', 'BATAM', 'Anggrek Permai Blok P 29', '', 'Kuliah', 'Universitas Universal/ Manajemen', 'Tidak', NULL, 34, NULL, NULL, '2025-05-27 08:54:47', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(18, '22161045', 'Taufik NG', 41, 3, NULL, '2025', '2006-11-05', 'Batam', 'Marbella Blk G6 No 6', '', 'SMK', 'Universitas Politeknik Batam', 'Tidak', NULL, 35, NULL, NULL, '2025-05-27 08:54:47', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(19, '22161005', 'AULIA STEFHANIE', 42, 4, NULL, '2025', '2007-09-11', 'Selatpanjang', 'Garden Point 2 blok D no 28', '', 'Kuliah', '-', 'Iya', 'PT Rezindo Jaya Mandiri', 36, NULL, NULL, '2025-05-27 08:54:47', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(20, '22161015', 'DEWI', 42, 4, NULL, '2025', '2006-09-06', 'DURI ', 'Komp. Baloi View Blok D1 No.20', '', 'Tidak', '', 'Tidak', NULL, 37, NULL, NULL, '2025-05-27 08:54:47', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(21, '22161016', 'Dina Otapia', 42, 4, NULL, '2025', '2005-10-27', 'Batam', 'BALOI MAS PERMAI BLOK A NO 33', '', 'Kuliah', 'universitas putera batam', 'Tidak', NULL, 38, NULL, NULL, '2025-05-27 08:54:47', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(22, '22161020', 'FARIEL FEBRIAN', 42, 4, NULL, '2025', '2007-07-14', 'BATAM', 'BALOI MAS ', '', NULL, NULL, 'Tidak', NULL, 39, NULL, NULL, '2025-05-27 08:54:47', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(23, '22161024', 'JACKLYN', 42, 4, NULL, '2025', '2007-04-08', 'BATAM', 'komplek batam indah blok f 11', '', 'Kuliah', '-', 'Tidak', NULL, 40, NULL, NULL, '2025-05-27 08:54:47', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(24, '22161025', 'Jason Lam Febriansyah', 42, 4, NULL, '2025', '2007-02-16', 'Batam', 'KOMLEK VILLA MARINA', '', NULL, '-', 'Tidak', NULL, 41, NULL, NULL, '2025-05-27 08:54:47', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(25, '22161026', 'JESSICA', 42, 4, NULL, '2025', '2006-06-23', 'BATAM', 'Pulon', '', NULL, 'Sekolah permata harapan batu batam ', 'Tidak', NULL, 42, NULL, NULL, '2025-05-27 08:54:47', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(26, '22161027', 'Jessly Alvina', 42, 4, NULL, '2025', '2008-06-30', 'Tembilahan', '.', '', NULL, '', 'Tidak', NULL, 43, NULL, NULL, '2025-05-27 08:54:47', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(27, '22161032', 'Kiara Salsabila Sari', 42, 4, NULL, '2025', '2006-07-16', 'Batam, Kota Batam', 'Tiban Permata Biru Blok B No. 14', '', NULL, '', 'Tidak', NULL, 44, NULL, NULL, '2025-05-27 08:54:47', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(28, '22161036', 'Muhammad Hasbi Ramdhani', 42, 4, NULL, '2025', '2006-09-23', 'Batam', 'Bengkong Indah Swadebi Blok J No 06', '', 'Kuliah', 'poltek', 'Iya', 'Onrework', 45, NULL, NULL, '2025-05-27 08:54:47', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(29, '22161049', 'WILLIAM TAN', 42, 4, NULL, '2025', '2007-02-08', 'BATAM', 'BATU BATAM INDAH BLOK C NO 27', '085179818918', NULL, 'Sekolah Permata Harapan 2', 'Tidak', NULL, 46, NULL, NULL, '2025-05-27 08:54:47', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(30, '22161052', 'Yohana Rumapea', 42, 4, NULL, '2025', '2007-03-19', 'Batam', 'Sei Tering 2', '', NULL, '', 'Tidak', NULL, 47, NULL, NULL, '2025-05-27 08:54:47', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(31, '221610023', 'AMANDA BR TAMBUNAN', 43, 2, NULL, '2025', '2007-02-09', 'BATAM', 'BELIAN', '', 'Tidak', '-', 'Tidak', '-', 48, NULL, NULL, '2025-05-27 08:54:47', '2025-06-03 21:17:42', '2025-06-03 21:56:50', NULL, NULL, NULL, NULL, 1, 0),
(32, '22161004', 'Aria Savana Jing Wen', 43, 2, NULL, '2025', '2007-07-06', 'Batam', 'Winner Kencana Blok A No 8 Q', '', NULL, NULL, NULL, NULL, 49, NULL, NULL, '2025-05-27 08:54:47', NULL, '2025-06-03 21:36:49', NULL, NULL, NULL, NULL, 1, 0),
(33, '22161006', 'Bryan', 43, 2, NULL, '2025', '2006-10-31', 'Batam', 'Tiban Raya Lestari Blok A No.8', '', 'Kuliah', 'Universitas Universal / Sistem Informasi', 'Tidak', NULL, 50, NULL, NULL, '2025-05-27 08:54:47', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(34, '22161007', 'Budhi Jayanto', 43, 2, NULL, '2025', '2007-05-30', 'Batam', 'Mitra Raya Blok E No. 33 A', '', 'Kuliah', 'UNIVERSITAS INTERNASIONAL BATAM(UIB) -Sistem Informasi', 'Tidak', NULL, 51, NULL, NULL, '2025-05-27 08:54:47', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(35, '22161013', 'DENNIS', 43, 2, NULL, '2025', '2007-08-14', 'BATAM', 'LUCKY ESTATE', '', 'Kuliah', 'Universitas Internasional Batam / Sistem Informasi', 'Tidak', NULL, 52, NULL, NULL, '2025-05-27 08:54:47', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(36, '22161017', 'Elly Gou', 43, 2, NULL, '2025', '2006-12-23', 'Batam', 'Winner Kencana Blok A-8i', '', 'Kuliah', 'Institut Teknologi Batam / Sistem Informasi ', 'Tidak', NULL, 53, NULL, NULL, '2025-05-27 08:54:47', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(37, '22161018', 'Elvan', 43, 2, NULL, '2025', '2007-11-11', 'Batam', 'Taman Kota Baloi F3.2a', '', 'Kuliah', 'Universitas Internasional Batam / Sistem Informasi', 'Iya', 'PT SGEEDE (Jalan Imperium Blok B51 & B52) Sebelah Apartment Queen Victoria', 54, NULL, NULL, '2025-05-27 08:54:47', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(38, '22161019', 'ERWIN LIE', 43, 2, NULL, '2025', '2007-11-30', 'BATAM', 'Komplek Paradise Centre Blok C No.2', '', 'Kuliah', 'Universitas Internasional Batam / Manajemen', 'Iya', 'CV DIESEL SERVICE', 55, NULL, NULL, '2025-05-27 08:54:47', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(39, '22161021', 'FELIX BENEDIK WIJAYA', 43, 2, NULL, '2025', '2007-06-21', 'MEDAN', 'Garden Poin indah Blok D No.6', '', 'Kuliah', 'Universitas Universal (Uvers)', 'Tidak', NULL, 56, NULL, NULL, '2025-05-27 08:54:47', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(40, '22161038', 'Morgen Taw', 43, 2, NULL, '2025', '2007-02-19', 'Batam', 'Royal Grand 2 A11', '', 'Kuliah', 'Universitas Internasional Batam/Sistem Informasi', 'Tidak', NULL, 57, NULL, NULL, '2025-05-27 08:54:47', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(41, '22161039', 'Ng Widiang', 43, 2, NULL, '2025', '2007-04-27', 'Bengkalis', 'Villa Pesona Asri Blok A5 No.13A', '', 'Kuliah', 'Universitas Internasional Batam / Sistem Informasi', 'Tidak', NULL, 58, NULL, NULL, '2025-05-27 08:54:47', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(42, '22161043', 'Robin Wongso', 43, 2, NULL, '2025', '2006-12-07', 'Batam', 'Orchid Garden A7 Baloi Mas', '', 'Kuliah', 'Universitas Indonesia Batam (UIB)', 'Iya', 'ZeusX Pte. Ltd.', 59, NULL, NULL, '2025-05-27 08:54:47', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(43, '22161031', 'Julio Laiberto', 43, 2, NULL, '2025', '2006-07-26', 'Batam', 'Perumhan Orchid Park Blok D No.27', '', 'Kuliah', 'Uvers, Teknologi Informatika', 'Tidak', NULL, 60, NULL, NULL, '2025-05-27 08:54:47', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(44, '22161046', 'Tiffany', 43, 2, NULL, '2025', '2007-08-14', 'Batam', 'LUCKY ESTATE', '', NULL, 'Universitas Internasional Batam / Sistem Informasi ', 'Tidak', NULL, 61, NULL, NULL, '2025-05-27 08:54:47', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(45, '22161008', 'CAHYA NELSON', 44, 2, NULL, '2025', '2007-03-29', 'Batam', 'Pancur', '', 'Kuliah', 'Iteba / dkv', 'Tidak', NULL, 62, NULL, NULL, '2025-05-27 08:54:47', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(46, '22161009', 'Cecilia Fansisca', 44, 2, NULL, '2025', '2007-05-29', 'Batam', 'Kampung Seraya', '', NULL, NULL, 'Tidak', NULL, 63, NULL, NULL, '2025-05-27 08:54:47', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(47, '22161014', 'Desta Piola', 44, 2, NULL, '2025', '2005-12-19', 'Pangkal Pinang ', 'Tiban III', '', 'Tidak', '', 'Tidak', NULL, 64, NULL, NULL, '2025-05-27 08:54:47', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(48, '22161022', 'Floura Exveleransa', 44, 2, NULL, '2025', '2006-09-06', 'Batam', 'BALOI POINT', '', 'Kuliah', 'IIB ', 'Tidak', NULL, 65, NULL, NULL, '2025-05-27 08:54:47', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(49, '22161023', 'INZAGHI ANUGGRAHA', 44, 2, NULL, '2025', '2006-12-24', 'Batam', 'Kampung Dalam', '', NULL, 'SMK Permata Harapan', 'Tidak', NULL, 66, NULL, NULL, '2025-05-27 08:54:47', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(50, '22161028', 'Jessycha', 44, 2, NULL, '2025', '2007-07-06', 'Batam', 'Legenda Malaka Blok C4 No 010', '', 'Kuliah', 'Uvers', 'Tidak', NULL, 67, NULL, NULL, '2025-05-27 08:54:47', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(51, '22161029', 'Jimmy Alisando', 44, 2, NULL, '2025', '2006-10-10', 'Batam', 'Bengkong Garden Blok A No.3', '', NULL, '', 'Tidak', NULL, 68, NULL, NULL, '2025-05-27 08:54:47', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(52, '22161034', 'Leonardo Jaylenson', 44, 2, NULL, '2025', '2007-08-07', 'Batam', 'Sandona Carissa 3 No 20', '082183318338', 'Kuliah', 'Universitas Internasional Batam / Sistem Informasi', 'Tidak', NULL, 69, NULL, NULL, '2025-05-27 08:54:47', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(53, '22161040', 'Nicholas Pratama', 44, 2, NULL, '2025', '2006-03-21', 'Batam', 'Jl Ladang kecil', '', 'Tidak', NULL, 'Tidak', NULL, 70, NULL, NULL, '2025-05-27 08:54:47', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(54, '22161041', 'RAMON LORENZO NG', 44, 2, NULL, '2025', '2006-11-11', 'Batam', 'Pulo Mas Pesidence Blok A No 11', '', 'Tidak', NULL, 'Tidak', NULL, 71, NULL, NULL, '2025-05-27 08:54:47', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(55, '22161044', 'SHEVIRA OKTA VIANI', 44, 2, NULL, '2025', '2007-10-29', 'Purbalingga', 'Batu Batam Indah', '', 'Kuliah', 'Institut Teknologi Batam / Bisnis Digital', 'Tidak', NULL, 72, NULL, NULL, '2025-05-27 08:54:47', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(56, '22161047', 'TINARDO', 44, 2, NULL, '2025', '2006-05-25', 'Tanjungmedang', 'Sei Gayung', '', 'Kuliah', 'institut teknologi batam iteba / Sistem Informasi', 'Tidak', NULL, 73, NULL, NULL, '2025-05-27 08:54:47', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(57, '22161048', 'Van Darren', 44, 2, NULL, '2025', '2006-12-29', 'Batam', 'Nagoya permai B no. 14', '', 'Kuliah', 'Universitas Universal / Manajemen', 'Tidak', NULL, 74, NULL, NULL, '2025-05-27 08:54:47', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(58, '22161050', 'Yoga Gautama', 44, 2, NULL, '2025', '2007-02-18', 'Batam', 'Golden Land Blok F No.35', '', 'Kuliah', 'China University of Mining and Technology ', 'Tidak', NULL, 75, NULL, NULL, '2025-05-27 08:54:47', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(59, '22161051', 'Yuro Stoner', 44, 2, NULL, '2025', '2007-10-11', 'Batam', 'Happy Valley Garden Blok K No.120', '', 'Kuliah', 'Universitas Universal / Manajemen', 'Tidak', NULL, 76, NULL, NULL, '2025-05-27 08:54:47', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(60, '22141002', 'ARIANTO', 30, 5, NULL, '2025', '2010-04-22', 'BATAM', 'TAMAN DUTA INDAH BLOK F NO 25', '', NULL, 'Sekolah Permata Harapan ', 'Tidak', NULL, 77, NULL, NULL, '2025-05-27 08:54:47', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(61, '23141039', 'BRUCE LEONARDO', 30, 5, NULL, '2025', '2010-09-25', 'Batam', 'Komplek Perumahan mitra Raya H1 22', '', NULL, 'Sekolah Permata Harapan Batu Batam', 'Tidak', NULL, 78, NULL, NULL, '2025-05-27 08:54:47', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(62, '22141005', 'Celine Wong', 30, 5, NULL, '2025', '2010-04-19', 'Batam', 'Cahaya Garden Blok H No 12A', '', 'SMK', 'Sekolah Permata Harapan ', 'Tidak', NULL, 79, NULL, NULL, '2025-05-27 08:54:47', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(63, '22141009', 'Elis', 30, 5, NULL, '2025', '2009-10-28', 'Batam', 'Taman Sari Hijau Blok F312A', '', 'SMK', 'SMK Permata Harapan ', 'Tidak', NULL, 80, NULL, NULL, '2025-05-27 08:54:47', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(64, '22141010', 'FRANCES', 30, 5, NULL, '2025', '2010-07-25', 'BATAM', 'PERMATA BALOI BLOK B6 NO 5', '', 'SMK', 'akl', 'Tidak', NULL, 81, NULL, NULL, '2025-05-27 08:54:47', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(65, '22141013', 'JAZRIEL ANTONIUS', 30, 5, NULL, '2025', '2009-04-07', 'GARUT', 'TIBAN LAMA', '', 'SMK', 'SMK Maitreyawira', 'Tidak', NULL, 82, NULL, NULL, '2025-05-27 08:54:47', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(66, '22141014', 'Joyce Pundarika Zhen', 30, 5, NULL, '2025', '2009-11-18', 'Batam', 'Permata Baloi Blok H3/23', '', NULL, '', 'Tidak', NULL, 83, NULL, NULL, '2025-05-27 08:54:47', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(67, '22141016', 'KELVIN', 30, 5, NULL, '2025', '2009-10-04', 'Batam', 'PERUM SANDONA MINAZOO III/I', '', NULL, '-', 'Tidak', NULL, 84, NULL, NULL, '2025-05-27 08:54:47', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(68, '22141019', 'Lydia Ashley Wijaya', 30, 5, NULL, '2025', '2010-09-13', 'Batam', 'MARINA BUSINES CENTER BLK A NO 02', '', 'SMK', 'Bdp', 'Tidak', NULL, 85, NULL, NULL, '2025-05-27 08:54:47', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(69, '22141022', 'Michael Octa Nathanael', 30, 5, NULL, '2025', '2010-10-09', 'Batam', 'SanDona Blok Carissa 6 No.25', '', NULL, '-', 'Tidak', NULL, 86, NULL, NULL, '2025-05-27 08:54:47', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(70, '22141023', 'NOVRILIA LOVELY RERUNG', 30, 5, NULL, '2025', '2009-11-20', 'BATAM', 'Villa Diamond Blok B 1 No. 41', '', NULL, '', 'Tidak', NULL, 87, NULL, NULL, '2025-05-27 08:54:47', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(71, '22141024', 'Pricilia Daviana Wong', 30, 5, NULL, '2025', '2010-08-23', 'Batam', 'Tiban GPI Cendana Blok E no 3', '', 'SMK', 'smk permata harapan (rpl)', 'Tidak', NULL, 88, NULL, NULL, '2025-05-27 08:54:47', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(72, '22141020', 'SHAWA HENSON', 30, 5, NULL, '2025', '2010-02-25', 'BATAM', 'PERMATA REGENCY BLOK C. NO 26', '', NULL, '', 'Tidak', NULL, 89, NULL, NULL, '2025-05-27 08:54:47', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(73, '22141026', 'SHERENE CALLYSTA', 30, 5, NULL, '2025', '2010-06-18', 'Batam', 'Nagoya Permai Blok B 14', '', 'SMK', 'SMK Permata Harapan/AKL', 'Tidak', NULL, 90, NULL, NULL, '2025-05-27 08:54:47', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(74, '22141029', 'VELORINE JELVIANA', 30, 5, NULL, '2025', '2010-10-23', 'BATAM', 'BALOI MAS ASRI BLOK E NO.1', '', NULL, '', 'Tidak', NULL, 91, NULL, NULL, '2025-05-27 08:54:47', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(75, '22141033', 'Yanto Cong', 30, 5, NULL, '2025', '2009-11-28', 'Batam', 'Anggrek Mas 1 Blok L 08', '', 'SMK', 'advent jurusan rpl', 'Tidak', NULL, 92, NULL, NULL, '2025-05-27 08:54:47', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(76, '22141001', 'ANGELINE TAN', 31, 5, NULL, '2025', '2009-08-29', 'SINTANG', 'JL. AJI MELAYU', '', 'SMK', 'Sekolah Permata Harapan jurusan BDP', 'Tidak', NULL, 93, NULL, NULL, '2025-05-27 08:54:47', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(77, '22141004', 'BARRY PHAN', 31, 5, NULL, '2025', '2010-06-01', 'BATAM', 'BALOI MAS GARDEN', '', NULL, '', 'Tidak', NULL, 94, NULL, NULL, '2025-05-27 08:54:47', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(78, '22141006', 'CHRIS CHELLA', 31, 5, NULL, '2025', '2010-07-15', 'Tanjung Balai Karimun', 'Jl.Taman Puri GG.Pujasera No.46', '', 'SMK', 'AKL Permata Harapan ', 'Tidak', NULL, 95, NULL, NULL, '2025-05-27 08:54:47', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(79, '22141008', 'Edelyn', 31, 5, NULL, '2025', '2008-10-02', 'Tanjung Pinang', 'Taman Baloi Mas Blok K No. 3A', '', 'SMK', '-', 'Tidak', NULL, 96, NULL, NULL, '2025-05-27 08:54:47', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(80, '22141012', 'Gracia Silviana Sihombing', 31, 5, NULL, '2025', '2010-09-03', 'Garut', 'Perum Bumi Malayu Asri Blok C26', '', NULL, '', 'Tidak', NULL, 97, NULL, NULL, '2025-05-27 08:54:47', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(81, '22141015', 'Keisya Abelia Ramadhani', 31, 5, NULL, '2025', '2010-08-09', 'Tanjung Morawa', 'Tiban Lama no 10', '', 'SMK', 'Permata Harapan ', 'Tidak', NULL, 98, NULL, NULL, '2025-05-27 08:54:47', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(82, '22141017', 'KENZIE HARA', 31, 5, NULL, '2025', '2010-02-09', 'BATAM', 'TIBAN INDAH PERMAI', '', NULL, NULL, 'Tidak', NULL, 99, NULL, NULL, '2025-05-27 08:54:47', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(83, '22141018', 'LIONA ASHA ADIKA NICHOLAS', 31, 5, NULL, '2025', '2010-09-22', 'KOTO BARU', 'TAMAN KANAAN INDAH', '', 'SMA', 'sma Kartini / sma negri 1', 'Tidak', NULL, 100, NULL, NULL, '2025-05-27 08:54:47', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(84, '22141021', 'MADELINE', 31, 5, NULL, '2025', '2010-05-03', 'BATAM', 'BALOI MAS ANGGREK', '', 'SMK', 'SMK permata harapan jurusan akuntansi', 'Tidak', NULL, 101, NULL, NULL, '2025-05-27 08:54:47', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(85, '21141041', 'MICHAEL KEVIN LEO', 31, 5, NULL, '2025', '2008-12-18', 'BATAM', 'PERUM MARCHELIA BLOK B NO. 225', '', NULL, '', 'Tidak', NULL, 102, NULL, NULL, '2025-05-27 08:54:47', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(86, '22141025', 'SELLY', 31, 5, NULL, '2025', '2010-06-26', 'BATAM', 'Komp. Bukit Mas', '', 'SMK', 'Smp permata harapan ', 'Tidak', NULL, 103, NULL, NULL, '2025-05-27 08:54:47', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(87, '22141027', 'VALENTIA GOTAMI TAN', 31, 5, NULL, '2025', '2010-04-23', 'Batam', 'Sunset Road 66', '', NULL, '-', 'Tidak', NULL, 104, NULL, NULL, '2025-05-27 08:54:47', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(88, '22141028', 'VANESSA THO', 31, 5, NULL, '2025', '2010-01-30', 'BATAM', 'PELITA', '', 'SMK', 'Sekolah Permata Harapan / Akuntansi', 'Tidak', NULL, 105, NULL, NULL, '2025-05-27 08:54:47', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(89, '22141030', 'VIVIANA LESTARI', 31, 5, NULL, '2025', '2010-05-11', 'BATAM', 'WINNER KENCANA', '', 'SMA', 'Maitreyawira', 'Tidak', NULL, 106, NULL, NULL, '2025-05-27 08:54:47', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(90, '22141031', 'WILLY ELHANSEN', 31, 5, NULL, '2025', '2010-08-05', 'BATAM', 'BALOI MAS GARDEN', '', NULL, '', 'Tidak', NULL, 107, NULL, NULL, '2025-05-27 08:54:47', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(91, '22141032', 'Winna Karenhapucs Alexandria', 31, 5, NULL, '2025', '2010-10-20', 'Batam', 'Anggrek Mas Blok I No. 115', '', NULL, '', 'Tidak', NULL, 108, NULL, NULL, '2025-05-27 08:54:47', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, 0, 0),
(92, '22141035', 'YULITA', 31, 5, NULL, '2025', '2010-03-20', 'BATAM', 'BATU BATAM PERMAI', '', 'SMK', 'SMK Maitreya wira /Akuntansi', 'Tidak', NULL, 109, NULL, NULL, '2025-05-27 08:54:47', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(93, '22242001', 'ARSHAVIN TEVES', 32, 5, NULL, '2025', '2009-07-08', 'Batam', 'Permata Baloi Blok GI Nomor 30', '', NULL, '', 'Tidak', NULL, 110, NULL, NULL, '2025-05-27 08:54:47', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(94, '22242002', 'DELSEN TAN', 32, 5, NULL, '2025', '2010-09-08', 'BATAM', 'GARDEN POINT', '082289013559', 'SMK', 'belum tau', 'Tidak', NULL, 111, NULL, NULL, '2025-05-27 08:54:47', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(95, '22242003', 'DESICA', 32, 5, NULL, '2025', '2009-12-02', 'BATAM', 'KOMP ANGGREK PERMAI', '', 'SMK', 'sekolah permata harapan ', 'Tidak', NULL, 112, NULL, NULL, '2025-05-27 08:54:47', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(96, '22242004', 'ELLYSSA CHEN', 32, 5, NULL, '2025', '2010-09-24', 'BATAM', 'KOMP NUSA JAYA BLOK K NO 7', '', 'SMK', 'Maitreyawira jurusan akutansi', 'Tidak', NULL, 113, NULL, NULL, '2025-05-27 08:54:47', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(97, '22242005', 'FELICIA KANG', 32, 5, NULL, '2025', '2010-04-15', 'BATAM', 'RUKO BATU BATAM PERMAI', '', 'SMK', 'sekolah permata harapan, jurusan rpl', 'Tidak', NULL, 114, NULL, NULL, '2025-05-27 08:54:47', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(98, '22242006', 'GRACE FRANCESCA', 32, 5, NULL, '2025', '2010-10-22', 'BATAM', 'TAMAN BALOI MAS BLOK E NO 15', '', NULL, '', 'Tidak', NULL, 115, NULL, NULL, '2025-05-27 08:54:47', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(99, '22242007', 'IYAN', 32, 5, NULL, '2025', '2009-11-12', 'JAKARTA', 'BALOI POINT B 2', '', NULL, '', 'Tidak', NULL, 116, NULL, NULL, '2025-05-27 08:54:47', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(100, '24141627', 'JACKLY', 32, 5, NULL, '2025', '2009-06-07', 'SELATPANJANG', 'JL. BANGLAS', '', 'SMK', 'Sekolah Permata Harapan', 'Tidak', NULL, 117, NULL, NULL, '2025-05-27 08:54:47', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(101, '22242008', 'JANNEL VANESSA', 32, 5, NULL, '2025', '2010-01-23', 'BATAM', 'BALOI MAS GARDEN', '', NULL, '', 'Tidak', NULL, 118, NULL, NULL, '2025-05-27 08:54:47', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(102, '22242009', 'JASVENNO', 32, 5, NULL, '2025', '2010-09-17', 'BATAM', 'CAHAYA GARDEN', '', 'SMK', 'Sekolah Maitreya', 'Tidak', NULL, 119, NULL, NULL, '2025-05-27 08:54:47', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(103, '22242010', 'Juwita Vanessa', 32, 5, NULL, '2025', '2010-04-15', 'Batam', 'DIP Blok Akasia V No/7', '', 'SMK', 'SMK Permata Harapan', 'Tidak', NULL, 120, NULL, NULL, '2025-05-27 08:54:47', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(104, '22242011', 'Meylisa', 32, 5, NULL, '2025', '2010-09-23', 'Batam', 'Kavling Bida Kabil Blok Kembang Sari 1 No.49', '', 'SMK', 'Permata harapan (akl)', 'Tidak', NULL, 121, NULL, NULL, '2025-05-27 08:54:47', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(106, '22242013', 'SHEREN', 32, 5, NULL, '2025', '2009-07-14', 'BATAM', 'BATU BATAM PERMAI', '', NULL, 'Sekolah Permata Harapan', 'Tidak', NULL, 123, NULL, NULL, '2025-05-27 08:54:47', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(107, '22242014', 'VIONA ENJELINA', 32, 5, NULL, '2025', '2009-03-06', 'BATAM', 'MARINA BUSSINESS CENTER', '', 'SMK', 'sekolah permata harapan', 'Tidak', NULL, 124, NULL, NULL, '2025-05-27 08:54:47', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(110, '22242012', 'M.nuh', 32, 5, NULL, '2025', '2010-02-15', 'Batam', 'Anggrek permai b/15', '087777219726', NULL, 'Sekolah kartini ', 'Tidak', '-', 125, NULL, NULL, '2025-05-27 08:54:47', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(111, '23465743', 'Amelia Cahya', 45, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2025-05-28 10:59:42', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(121, '23161004', 'Natasha Gotami', 36, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 127, NULL, NULL, '2025-05-29 16:37:38', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(122, '23161014', 'Engeline Chairine', 37, 2, NULL, NULL, '2008-10-16', 'Batam', NULL, '085668499103', NULL, NULL, NULL, NULL, 128, 131, NULL, '2025-05-29 16:38:16', '2025-06-02 00:15:00', NULL, NULL, NULL, 17, 2, 0, 0),
(123, '23161008', 'Meyliana', 36, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 129, NULL, NULL, '2025-05-29 16:39:11', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(124, '1012', 'test', 28, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 130, NULL, NULL, '2025-06-01 18:33:27', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(125, '4759232', 'apel', 0, 0, NULL, '2025', '2025-06-03', 'Batamm', 'istana', '08958294102', 'Tidak', '-', 'Tidak', '-', 0, NULL, NULL, '2025-06-03 08:01:30', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(126, '4759232', 'apel', 0, 0, NULL, '2025', '2025-06-03', 'Batamm', 'istana', '08958294102', 'Tidak', '-', 'Tidak', '-', 0, NULL, NULL, '2025-06-03 08:02:04', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(127, '4759232', 'apel', 0, 0, NULL, '2025', '2025-06-03', 'Batamm', 'istana', '08958294102', 'Tidak', '-', 'Tidak', '-', 0, NULL, NULL, '2025-06-03 08:02:40', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(128, '4759232', 'apel', 0, 5, NULL, '2025', '2025-06-03', 'Batam', 'batam', '089572759193', 'Tidak', '-', 'Tidak', '-', 0, NULL, NULL, '2025-06-03 08:15:34', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(129, '4759232', 'apel', 0, 5, NULL, '2025', '2025-06-03', 'Batam', 'batam', '089572759193', 'Tidak', '-', 'Tidak', '-', 0, NULL, NULL, '2025-06-03 08:15:34', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(130, '4759232', 'apel', 32, 4, NULL, '2025', '2025-06-03', 'batam', 'istana', '08372942322', 'Tidak', '-', 'Tidak', '-', 0, NULL, NULL, '2025-06-03 08:55:30', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(131, '4759232', 'apel', 32, 4, NULL, '2025', '2025-06-03', 'batam', 'istana', '08372942322', 'Tidak', '-', 'Tidak', '-', 0, NULL, NULL, '2025-06-03 08:55:30', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(132, '23421322', 'yera', 43, 2, NULL, '2024/2025', '2025-06-03', 'Batam', 'istanaa', '085829492113', 'Tidak', '-', 'Tidak', '-', 132, NULL, NULL, '2025-06-03 10:03:11', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(133, '12342321', 'viera', 43, 2, NULL, '2024/2025', '2025-06-03', 'Batam', 'istana', '085829492113', 'Tidak', '-', 'Tidak', '-', 133, NULL, NULL, '2025-06-03 10:05:08', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(134, '23103211', 'Kalila', 42, 4, NULL, '2024', '0000-00-00', 'Batam', 'istana', '89231932112', NULL, NULL, NULL, NULL, 136, NULL, NULL, '2025-06-09 18:08:34', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0);

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
(2, NULL, 'Superadmin SMK', 'c4ca4238a0b923820dcc509a6f75849b', 'annabladzherin@gmail.co', 1, 'user_2.png', 2, NULL, NULL, '2024-04-16 15:24:07', '2024-04-21 22:54:31', NULL, 0),
(6, NULL, 'Pak Dedi', 'c4ca4238a0b923820dcc509a6f75849b', NULL, 3, 'default.png', NULL, 1, NULL, '2024-04-19 11:47:23', '2024-04-21 18:08:12', NULL, 0),
(8, NULL, 'Pak Haris', 'c4ca4238a0b923820dcc509a6f75849b', NULL, 6, 'default.png', NULL, NULL, NULL, '2024-04-19 13:39:14', NULL, NULL, 0),
(11, 'Kevin Fernando', '1001', 'c4ca4238a0b923820dcc509a6f75849b', 'test@gmail.com', 4, 'default.png', 2, NULL, NULL, '2024-04-19 15:28:24', NULL, NULL, 0),
(12, 'Jofinson', '1002', 'c4ca4238a0b923820dcc509a6f75849b', NULL, 4, 'default.png', 2, NULL, NULL, '2024-04-19 15:31:30', NULL, NULL, 0),
(13, 'Kelsey', '1003', 'c4ca4238a0b923820dcc509a6f75849b', NULL, 4, 'default.png', 2, NULL, NULL, '2024-04-19 15:31:57', NULL, NULL, 0),
(14, 'Darrell', '1004', 'c4ca4238a0b923820dcc509a6f75849b', NULL, 5, 'default.png', 2, NULL, NULL, '2024-04-19 17:32:44', NULL, NULL, 0),
(15, 'Richard', '1005', 'c4ca4238a0b923820dcc509a6f75849b', NULL, 4, 'default.png', 2, NULL, NULL, '2024-04-19 17:33:34', NULL, NULL, 0),
(16, 'Yanda', '1006', 'c4ca4238a0b923820dcc509a6f75849b', NULL, 4, 'default.png', 2, NULL, NULL, '2024-04-19 17:34:02', NULL, NULL, 0),
(17, NULL, 'Pak If', 'c4ca4238a0b923820dcc509a6f75849b', NULL, 3, 'default.png', 2, 2, NULL, '2024-04-19 19:22:59', NULL, NULL, 0),
(18, NULL, 'Bu Rosita', 'c4ca4238a0b923820dcc509a6f75849b', NULL, 3, 'default.png', 2, 2, NULL, '2024-04-19 20:39:48', NULL, NULL, 0),
(19, NULL, 'Pak Beni', 'c4ca4238a0b923820dcc509a6f75849b', NULL, 3, 'default.png', 2, 2, NULL, '2024-04-19 20:40:45', NULL, NULL, 0),
(20, NULL, 'Pak Tono', 'c4ca4238a0b923820dcc509a6f75849b', NULL, 6, 'default.png', NULL, NULL, NULL, '2024-04-19 22:59:42', NULL, NULL, 0),
(21, NULL, 'Admin SMK', 'c4ca4238a0b923820dcc509a6f75849b', NULL, 2, 'default.png', 2, NULL, NULL, '2024-04-20 14:50:42', NULL, NULL, 0),
(22, NULL, 'Admin SMP', 'c4ca4238a0b923820dcc509a6f75849b', NULL, 2, 'default.png', 1, NULL, NULL, '2024-04-20 14:50:42', NULL, NULL, 0),
(23, NULL, 'Pak Ray', 'c4ca4238a0b923820dcc509a6f75849b', NULL, 3, 'default.png', 2, 3, NULL, '2024-04-21 09:50:19', NULL, NULL, 0),
(27, NULL, '1007', 'd7322ed717dedf1eb4e6e52a37ea7bcd', NULL, 4, 'default.png', 2, NULL, 2, '2024-04-21 22:51:05', NULL, NULL, 0),
(28, NULL, '22161001', '$2y$10$HVKWSs33F7pKvHLBLVHaCOupDGcXgsywHEVpUvgTnpkj9OrLM9PQG', 'aldrian483@gmail.com', 14, '1747990855_IMG-20250523-WA0004.jpg', NULL, NULL, NULL, '2025-05-27 09:46:39', NULL, NULL, 0),
(29, NULL, '22161003', '$2y$10$wQUw78ZiQ6AN19jNxVmGmuHf7vszZ89imcPEZ3iSDlQ991EH2hOrC', 'angelfu.722@gmail.com', 14, '1747990716_IMG_4377a-3x4-a_2.png', NULL, NULL, NULL, '2025-05-27 09:46:39', NULL, NULL, 0),
(30, NULL, '22161010', '$2y$10$xzM.Qyf.hCrx1/Ft9p0TXeFWhNTH7TCpqq4B4oM5wlMpvIq2ZvPUe', 'cerrinetan07@gmail.com', 14, 'user_85.jpg', NULL, NULL, NULL, '2025-05-27 09:46:39', NULL, NULL, 0),
(31, NULL, '22161011', '$2y$10$mxovRpHVI66Yn/J9y8yKae7W.UlCM8B3TXYHgfzEjRLN4Xl.6KcYW', 'cindyseptiani53@gmail.com', 14, 'IMG-20250520-WA0009.jpg', NULL, NULL, NULL, '2025-05-27 09:46:39', NULL, NULL, 0),
(32, NULL, '23161056', '$2y$10$GRmS3KIe.ybAGzDrkyi4Tuma1N4ze8dx70TdLnAMcXAbWV6fgdm9S', 'jenifferchen07@gmail.com', 14, '1748267318_1000041125.jpg', NULL, NULL, NULL, '2025-05-27 09:46:39', NULL, NULL, 0),
(33, NULL, '22161030', '$2y$10$V84sZRCALkLjUK4ntfZKne2v2QQr5eVknBl.BgmGNtWJ2fpAgWAA6', 'Joyceliewhx@gmail.com', 14, '1747970677_IMG_8802.jpeg', NULL, NULL, NULL, '2025-05-27 09:46:39', NULL, NULL, 0),
(34, NULL, '22161035', '$2y$10$Mm9mPjuEUCGpfXt60lv23.fINlrjh/7.7B8msKp3VlMLjrmOXCv26', 'lisachong2006@gmail.com', 14, '1747990118_IMG_0022.JPG', NULL, NULL, NULL, '2025-05-27 09:46:39', NULL, NULL, 0),
(35, NULL, '22161045', '$2y$10$qw.ItePnbYqUZ3FJzo.d0O7vWZQKX9bGEc887t1aLSDJeAvHtkHWO', 'taufikng206@gmail.com', 14, '1747987384_20250409_201650-dnscaled.png', NULL, NULL, NULL, '2025-05-27 09:46:39', NULL, NULL, 0),
(36, NULL, '22161005', '$2y$10$SmiTavwNpjXMFhAwihi0aefbwpu2GrcN5b3lCtlDJj0X3EZjDoIjK', 'auliastephanie197@gmail.com', 14, '1748267947_IMG-20250526-WA0025.jpg', NULL, NULL, NULL, '2025-05-27 09:46:39', NULL, NULL, 0),
(37, NULL, '22161015', '$2y$10$btYOn.c1zE3Xi8BBeCyQtOlz6eD3SNpng.JQlM7HcRGdqUL7al0Hi', 'dewiwide08@gmail.com', 14, 'user_92.png', NULL, NULL, NULL, '2025-05-27 09:46:39', NULL, NULL, 0),
(38, NULL, '22161016', '$2y$10$/qL4hfSCiwS9Y3TNKRqqcOAppEj8UPXx.SZmRSHNaJA1DV434CTj6', 'dinaoktapia76@gmail.com', 14, '1747791125_IMG-20250520-WA0004.jpg', NULL, NULL, NULL, '2025-05-27 09:46:39', NULL, NULL, 0),
(39, NULL, '22161020', '$2y$10$KCjTxmhl1s48jRPxRS7Nduear39D5aOk3ik0NHaOS2LB9mJt2wWW6', '17menf@gmail.com', 14, 'Untitled_design.png', NULL, NULL, NULL, '2025-05-27 09:46:39', NULL, NULL, 0),
(40, NULL, '22161024', '$2y$10$NvfqKIk.91hm8f46xXAN/.wHlsePivv2XUhfoTiipSNQqH5EQwmOe', 'jacklyn726@gmail.com', 14, '20250415_093252_0000.png', NULL, NULL, NULL, '2025-05-27 09:46:39', NULL, NULL, 0),
(41, NULL, '22161025', '$2y$10$Zd10M7gPAp8RBr9pVpWFr.dn7246o9saRFc9FFtu5ar8RXgq5yvcy', '', 14, '1747982695_IMG_0815.jpeg', NULL, NULL, NULL, '2025-05-27 09:46:39', NULL, NULL, 0),
(42, NULL, '22161026', '$2y$10$02kSzWiuK7pzmlkHL8RYkO9ugIPrM2OpZSETjxGQJkTrYMtA4pVZ6', 'tanjesika696@gmail.com', 14, '1747983600_IMG_20250514_094505.jpg', NULL, NULL, NULL, '2025-05-27 09:46:39', NULL, NULL, 0),
(43, NULL, '22161027', '$2y$10$2KclSDF5xb5C/5608qHPQO.kgbRXqfSbGTEqTkZub6n6CLuLX4i3q', 'jesslyalvina02@gmail.com', 14, '1748282659_Untitled_(3_x_4_cm).jpg', NULL, NULL, NULL, '2025-05-27 09:46:39', NULL, NULL, 0),
(44, NULL, '22161032', '$2y$10$y6ezgvsbZx7jBQfcnDODOe295.ZxeLN9VAXmQVcNy6P4K2Ju0K5De', '', 14, 'https://drive.google.com/uc?export=view&id=', NULL, NULL, NULL, '2025-05-27 09:46:39', NULL, NULL, 0),
(45, NULL, '22161036', '$2y$10$ndHc4IDpkedzXqr5Gy7d9O6u38dlDMtUCZVWPe2uwbAT0sVPXCB9O', 'muhamadhasbi2309@gmail.com', 14, 'user_100.png', NULL, NULL, NULL, '2025-05-27 09:46:39', NULL, NULL, 0),
(46, NULL, '22161049', '$2y$10$GaFwGdnNrQFeAlCAXonr2eu2EEfZFJMj4r2W8n2XXweuJAJPnAkBS', 'williamtan888w@gmail.com', 14, '1748130878_Foto_Graduation_.jpg', NULL, NULL, NULL, '2025-05-27 09:46:39', NULL, NULL, 0),
(47, NULL, '22161052', '$2y$10$kn.z3IxVi6UVaO8pFAVp9u2T9V54jHW6D2ijkvBrRezyWzWTj3qXS', '', 14, 'https://drive.google.com/uc?export=view&id=', NULL, NULL, NULL, '2025-05-27 09:46:39', NULL, NULL, 0),
(48, NULL, '22161002', '$2y$10$A9UMJD87tloju0Um0WaD1.CYblvwOHvoo2XsR5WdFcn2lWauO20H2', 'choronikaamanda@gmail.com', 14, '1000128099.jpg', NULL, NULL, NULL, '2025-05-27 09:46:39', '2025-06-03 21:17:43', '2025-06-03 21:56:50', 1),
(49, NULL, '22161004', '$2y$10$IA/LEnZ37sKpnfKVmur/huBqXICifuafN6wzUCt4OSh7M0mNZ1PXG', '', 14, 'https://drive.google.com/uc?export=view&id=', NULL, NULL, NULL, '2025-05-27 09:46:39', '2025-06-03 21:09:15', '2025-06-03 21:36:49', 1),
(50, NULL, '22161006', '$2y$10$ha1YtpQk/5pT2JKGsmKX8euobsfz/VaEFOhbPOxKUUfUZaPVu50zK', 'bryanhuang3110@gmail.com', 14, '1000011732.jpg', NULL, NULL, NULL, '2025-05-27 09:46:39', NULL, NULL, 0),
(51, NULL, '22161007', '$2y$10$GcOKvxZ.69Oc6Ol5vM6w4.bYPPEiCvOaJL5xVH07SotqNzrP244mO', 'budijayanto174@gmail.com', 14, '1747986506_white_budi-removebg2.jpg', NULL, NULL, NULL, '2025-05-27 09:46:39', NULL, NULL, 0),
(52, NULL, '22161013', '$2y$10$PuKDsm9hkAmFJo3GKKCDSOR0H2LylkSx7lYh61RFw71IFx5VMQbc2', 'DennisZhang917@Gmail.com', 14, 'user_107.jpg', NULL, NULL, NULL, '2025-05-27 09:46:39', NULL, NULL, 0),
(53, NULL, '22161017', '$2y$10$s847ULKM3FQ.3wvq4tPkp.sgiLvSSfhYLLKl4w2MBoTa0C8oEXFBy', 'ellygou1223@gmail.com', 14, '1747985420_IMG_20240606_220139_397.jpg', NULL, NULL, NULL, '2025-05-27 09:46:39', NULL, NULL, 0),
(54, NULL, '22161018', '$2y$10$jA2RkoVUY1Jhf3ORyTDNVOmHwiGtp35CeRX6fXO.txA7JiJOCQl4a', 'elvanchua1@gmail.com', 14, '1747986161_3x4.png', NULL, NULL, NULL, '2025-05-27 09:46:39', NULL, NULL, 0),
(55, NULL, '22161019', '$2y$10$dyDxL2KdYhuKTnxyhoMT1uAcqm26bgqpX1jt35whP8GyW0otZ0W3q', 'lieerwin514@gmail.com', 14, '1000042240.jpg', NULL, NULL, NULL, '2025-05-27 09:46:39', NULL, NULL, 0),
(56, NULL, '22161021', '$2y$10$Q3977LfN636Yl2zLnAglN.rEFCimKGYWiXbB2rAwy1swOkCqT10zy', 'benedikwijayaf@gmail.com', 14, 'user_1111.png', NULL, NULL, NULL, '2025-05-27 09:46:39', NULL, NULL, 0),
(57, NULL, '22161038', '$2y$10$WKMiEQjIVNg8BgyWcFlKWetdIMDrBfuAmS0c5UYlyX/joAp1oJjB6', 'tawmorgen@gmail.com', 14, 'foto_(6).png', NULL, NULL, NULL, '2025-05-27 09:46:39', NULL, NULL, 0),
(58, NULL, '22161039', '$2y$10$uPQM4IRuYMFrrVOju2JwG.iSdn3B/pg60fB1xmy.kZ7Y6YNiXdZd2', 'widiangx@gmail.com', 14, 'IMG_2181-removebg-preview.jpg', NULL, NULL, NULL, '2025-05-27 09:46:39', NULL, NULL, 0),
(59, NULL, '22161043', '$2y$10$.CW07.lJ0y4erXDxxD76auuTdzj.nFY2EqUSBwuYu.fVwzzd7Rtg2', 'robinwongso149@gmail.com', 14, '3x4_new.png', NULL, NULL, NULL, '2025-05-27 09:46:39', NULL, NULL, 0),
(60, NULL, '22161031', '$2y$10$TgSKSGP6n4VSjbNLJU1Np.tGiuDtmq0GBiTE4NijSrCzcWT1uKDC6', 'juliolaiberto26@gmail.com', 14, 'user_115.png', NULL, NULL, NULL, '2025-05-27 09:46:39', NULL, NULL, 0),
(61, NULL, '22161046', '$2y$10$HcMHKe59yPRjMvldjnHTtuFtGqzbFKNeweataIBQTjj4G.FgP7Fau', 'tiffanyz2128@gmail.com', 14, 'user_116.png', NULL, NULL, NULL, '2025-05-27 09:46:39', NULL, NULL, 0),
(62, NULL, '22161008', '$2y$10$si9wwkMMm4lH3.krfNqra.z8V1TWpvpj1oLMW8WsYlHV4rnJV47p.', 'charaxeris@gmail.com', 14, 'user_117.png', NULL, NULL, NULL, '2025-05-27 09:46:39', NULL, NULL, 0),
(63, NULL, '22161009', '$2y$10$JAyRYOnYFmT2czwh5OXIEOqpqiDKzr9S6FW6TxAkJOpzA197PjKRa', 'ceciliafansisca29@gmail.com', 14, '1747811716_25aff860-5551-4b1d-9831-65f77430a56e.jpeg', NULL, NULL, NULL, '2025-05-27 09:46:39', NULL, NULL, 0),
(64, NULL, '22161014', '$2y$10$PNypq6TlhpCzfaRyLQ2cee9i.BGJVg3iHS.nx7wxHWwOjamkUOMXC', 'destapiola10@gmail.com', 14, 'user_119.png', NULL, NULL, NULL, '2025-05-27 09:46:39', NULL, NULL, 0),
(65, NULL, '22161022', '$2y$10$hjwtOEk7JRSMJrHm8Ds9s.YWia.JFiMeu3kfdn2wvv/0Ecn8AZCXe', 'flouraexveleransa@gmail.com', 14, 'user_120.png', NULL, NULL, NULL, '2025-05-27 09:46:39', NULL, NULL, 0),
(66, NULL, '22161023', '$2y$10$u1TLJWZOfMbVeWMx3ICbwOkn5ccet5biuWbQPP1732tBmV1Zo9tNm', 'anugrahinzaghi58@gmail.com', 14, '1747816827_1000028883-removebg-preview.png', NULL, NULL, NULL, '2025-05-27 09:46:39', NULL, NULL, 0),
(67, NULL, '22161028', '$2y$10$0/Jo1iwhwtMemNGpx982ZezdfwelEr1T0Fu1qNAVFMrr7SmCyQniK', 'lanzhanstan@gmail.com', 14, '1747995192_IMG_20250523_171257.jpg', NULL, NULL, NULL, '2025-05-27 09:46:39', NULL, NULL, 0),
(68, NULL, '22161029', '$2y$10$FBJtYcwdIbM3fes9u6WoZOhMCTUULqqkDSDI6lrsXw6TXgwHLnAX2', '', 14, 'https://drive.google.com/uc?export=view&id=', NULL, NULL, NULL, '2025-05-27 09:46:39', NULL, NULL, 0),
(69, NULL, '22161034', '$2y$10$BNPvvNRoedyEO2p4Li9aO..sb8N6BS5Tpt6zHbNZQ57VbjqRT5y86', 'Leonardojaylenson28@gmail.com', 14, '1000152552.jpg', NULL, NULL, NULL, '2025-05-27 09:46:39', NULL, NULL, 0),
(70, NULL, '22161040', '$2y$10$9McG0pugW1TzHf5vXjIX2ubHhZtntuP4P7cCogpmvRELcAlaFfgWm', 'cbrakai7@gmail.com', 14, 'user_125.png', NULL, NULL, NULL, '2025-05-27 09:46:39', NULL, NULL, 0),
(71, NULL, '22161041', '$2y$10$0LKQ8N.E0qDAaFe4CG.4.ea/NunNPO9kQPQzq.0VZf2ZiwpqVjty6', 'ramonlorenzong@gmail.com', 14, 'WhatsApp_Image_2025-05-20_at_17_35_25.jpeg', NULL, NULL, NULL, '2025-05-27 09:46:39', NULL, NULL, 0),
(72, NULL, '22161044', '$2y$10$XO9OdAFFQ2HOzcT2silrCOgyJlO7YiPh8A/ltjfhgTK.eg5f8JnDG', 'sheviraoktaviani29@gmail.con', 14, 'user_127.png', NULL, NULL, NULL, '2025-05-27 09:46:39', NULL, NULL, 0),
(73, NULL, '22161047', '$2y$10$0uGKupwIkGSQTi1BYeeynuz2iqpXdKz3iIRrDJqdzodtJaJuibV7e', 'tinardotay07@gmail.com', 14, 'user_1281.png', NULL, NULL, NULL, '2025-05-27 09:46:39', NULL, NULL, 0),
(74, NULL, '22161048', '$2y$10$iBHOMWk6TYbTwuckDncWZ.8UrAKteBV95XKHvI8fQlGAYztHvZ7ES', 'vandarren29@gmail.com', 14, 'user_1291.png', NULL, NULL, NULL, '2025-05-27 09:46:39', NULL, NULL, 0),
(75, NULL, '22161050', '$2y$10$awUI34u70Q1cgQmbGB1Ji.3a3fZacBazN5LsKVXe21K4rCG8L.GXW', 'yogagautama12@gmail.com', 14, 'user_130.png', NULL, NULL, NULL, '2025-05-27 09:46:39', NULL, NULL, 0),
(76, NULL, '22161051', '$2y$10$hDi1vC2BifInJ5Cl70Jvhe8xhPgVIGKytKc5YPajGwy541M.YJdIK', 'Yuserfpool@gmail.com', 14, 'user_131.png', NULL, NULL, NULL, '2025-05-27 09:46:39', NULL, NULL, 0),
(77, NULL, '22141002', '$2y$10$CG8jtcnBxsIPbFMUpCNk1.fKhaW6EzUhTvgkMfjT4avQ7JvI/qK7m', 'yangarianto4@gmail.com', 14, '1748008927_1000005619.jpg', NULL, NULL, NULL, '2025-05-27 09:46:39', NULL, NULL, 0),
(78, NULL, '23141039', '$2y$10$vyZMfFYArb6NtPXQlB4dZ.f0H33ux.NXDSAw4E1Uiw7nb6tYo.YFq', 'bruceleonardo259@gmail.com', 14, '1748267793_foto-removebg.png', NULL, NULL, NULL, '2025-05-27 09:46:39', NULL, NULL, 0),
(79, NULL, '22141005', '$2y$10$hmlEEK3/0J9uD.21Lh8/BOVrzRReYgPkH5HsPSxvTDxfX.Qq3uZXq', 'celinewong249@gmail.com', 14, '1748236422_1000035833.jpg', NULL, NULL, NULL, '2025-05-27 09:46:39', NULL, NULL, 0),
(80, NULL, '22141009', '$2y$10$W2czBlNOwDfUtmLc6wiJQO7TRJHWK6P5VycfPrhvTQRoF8JTSrqDS', 'elis2810e@gmail.com', 14, 'user_135.png', NULL, NULL, NULL, '2025-05-27 09:46:39', NULL, NULL, 0),
(81, NULL, '22141010', '$2y$10$BbDzKZAOpyQVgELI8m03P.UR2cD0f4y.px9Tx32OYW6yMDgcZwiC6', 'francestio32@gmail.com', 14, '1748242698_Untitled10_20250526135507.jpg', NULL, NULL, NULL, '2025-05-27 09:46:39', NULL, NULL, 0),
(82, NULL, '22141013', '$2y$10$VoIWn.3/wGaGcTu3SbimkOYxsr4r/1.1CpODMnn5ge/s97P/Bi80q', 'antoniusjazriel@gmail.com', 14, 'user_137.png', NULL, NULL, NULL, '2025-05-27 09:46:39', NULL, NULL, 0),
(83, NULL, '22141014', '$2y$10$H5NNGq8R3kX1yJUcey9qI..nioqA1bY72Z3.xI/Pg48.EaYgUbSwe', '', 14, '1748236186_IMG-20250520-WA0033.jpg', NULL, NULL, NULL, '2025-05-27 09:46:39', NULL, NULL, 0),
(84, NULL, '22141016', '$2y$10$f.Zz7yQvW5.LqY/fPVZbfeyZw1a8HI/Ng7ImS6QxTfobn7Z/GPWAu', '', 14, '1747994188_1000115250.png', NULL, NULL, NULL, '2025-05-27 09:46:39', NULL, NULL, 0),
(85, NULL, '22141019', '$2y$10$C1Ejgd5A6qS2NNFUXBwb3udnlRQiGM3ZLtUwb2B5tCtsIGDWsxsQq', 'meilydia86', 14, '1748235806_1000013059.jpg', NULL, NULL, NULL, '2025-05-27 09:46:39', NULL, NULL, 0),
(86, NULL, '22141022', '$2y$10$379JK3cO5yohl3XFdcVpAO4QOcEUYWJCZJ0HZbvqUyM4MLHBOpaHO', 'michaeloctna@gmail.com', 14, '1748008932_IMG-20250523-WA0006.jpg', NULL, NULL, NULL, '2025-05-27 09:46:39', NULL, NULL, 0),
(87, NULL, '22141023', '$2y$10$EOLgGzwoAV6drrA0fztwQe3XUdZoji4Zi/tU9LgLLRKaxBc.jWD1y', '', 14, 'https://drive.google.com/uc?export=view&id=', NULL, NULL, NULL, '2025-05-27 09:46:39', NULL, NULL, 0),
(88, NULL, '22141024', '$2y$10$EeVIWoYTE/pm8.NnzNtjluDSPISKoFuNLvl1zXjcM/npTGqJsIf3G', 'priciliaaci@gmail.com', 14, '1748236417_IMG-20250524-WA0035.jpg', NULL, NULL, NULL, '2025-05-27 09:46:39', NULL, NULL, 0),
(89, NULL, '22141020', '$2y$10$H.qvKyFn7H4bXvUGAbeTOO4P/5bA2APnRjFfO5gnaIHvuqdkhn9hW', '', 14, 'https://drive.google.com/uc?export=view&id=', NULL, NULL, NULL, '2025-05-27 09:46:39', NULL, NULL, 0),
(90, NULL, '22141026', '$2y$10$N96EI/IOXUHFhYtNZ3ojXO4Tdd44u1VVzQs5eNQ.PCirA4QoH29.G', 'sherenecallysta11@gmail.com', 14, 'user_145.png', NULL, NULL, NULL, '2025-05-27 09:46:39', NULL, NULL, 0),
(91, NULL, '22141029', '$2y$10$8eyTBy.EFgDPBvsBCb.Wde1vGhFuPaVa28pCB6MhL8BQs3MnSyoMi', '', 14, 'https://drive.google.com/uc?export=view&id=', NULL, NULL, NULL, '2025-05-27 09:46:39', NULL, NULL, 0),
(92, NULL, '22141033', '$2y$10$LhoIBQRYu8v6SY1LALg7.OhtJRAGQv7N5FgF/H8Mskb2lxhdLXR4e', 'yantocong23@gmail.com', 14, 'user_147.png', NULL, NULL, NULL, '2025-05-27 09:46:39', NULL, NULL, 0),
(93, NULL, '22141001', '$2y$10$xyWpo/SeLnQctvS4t2y7mOxYh4E6.FChAppo8HimwJ7W4KEA0ki5G', 'Angeline Tan', 14, '1748247549_MEITU_20250526_151651068.jpg', NULL, NULL, NULL, '2025-05-27 09:46:39', NULL, NULL, 0),
(94, NULL, '22141004', '$2y$10$N9VVJDUp1kzAmnXk8jx8KeLaksjDgzEBi7TWoc86Ho.jGZsMzCKDm', '', 14, '1748325449_1000119185.jpg', NULL, NULL, NULL, '2025-05-27 09:46:39', NULL, NULL, 0),
(95, NULL, '22141006', '$2y$10$Xpn4w3Z9gP6/HS2X/Ml7fevpGMsA2u8yTABAMHxOxqyyRJHJp.43i', 'chrischella188@gmail.com', 14, 'user_150.png', NULL, NULL, NULL, '2025-05-27 09:46:39', NULL, NULL, 0),
(96, NULL, '22141008', '$2y$10$G98/Kt4fB5RBNqbGa/GjW.ni9FkRu.2OpppAM3XvWBsdCf11unmaS', 'edelyn.lim88@gmail.com', 14, 'user_151.png', NULL, NULL, NULL, '2025-05-27 09:46:39', NULL, NULL, 0),
(97, NULL, '22141012', '$2y$10$o1dbeCVa21MgbLK25CVKfe2JVNuHCwGnaP1s.Bf9qBYImZY253rEm', '', 14, 'https://drive.google.com/uc?export=view&id=', NULL, NULL, NULL, '2025-05-27 09:46:39', NULL, NULL, 0),
(98, NULL, '22141015', '$2y$10$wiQNZ/gfe8093kFf6IOiO.zyu.FhP3uTFWXfXr1Dto9/vqNab8ARq', 'Keisya Abelia Ramadhani ', 14, 'user_153.png', NULL, NULL, NULL, '2025-05-27 09:46:39', NULL, NULL, 0),
(99, NULL, '22141017', '$2y$10$aVQLnMmY2OmHnu7Fptkmr..H/mdO9hbMD6aBe48.32dF/JtjRzr7i', 'Kenziehara1@gmail.com', 14, '1748332592_Desain_tanpa_judul.jpg', NULL, NULL, NULL, '2025-05-27 09:46:39', NULL, NULL, 0),
(100, NULL, '22141018', '$2y$10$ua99cn1gt1j2q39KXCdpe.ZNEulNw8kaIWKfivkspxNAI0nejg29C', 'wilsonnicholaslim10@gmail.com', 14, '1747998940_MEITU_20250414_160635581.jpg', NULL, NULL, NULL, '2025-05-27 09:46:39', NULL, NULL, 0),
(101, NULL, '22141021', '$2y$10$n5MRLHgTlc6u4K9q/NaWw.cQpqKaee9TJ83baCiaxwUnd7qcJp6D.', 'madheline3@gmail.com', 14, 'user_156.png', NULL, NULL, NULL, '2025-05-27 09:46:39', NULL, NULL, 0),
(102, NULL, '21141041', '$2y$10$LzPIDPHPm1Hs7Eo5lmv9K.Pk6cs0alPOLiNebKFvS5uxc0r6a2ykS', '', 14, 'https://drive.google.com/uc?export=view&id=', NULL, NULL, NULL, '2025-05-27 09:46:39', NULL, NULL, 0),
(103, NULL, '22141025', '$2y$10$HTu/ZOtGESwccD5p8jI6aekDIL46y5sCgU2cTqOQAuKCik/gRLT8u', 'sellylm29@gmail.com', 14, '1748236559_52e875f8-7d6f-4a88-ba05-a9a46a4f0cd9.jpeg', NULL, NULL, NULL, '2025-05-27 09:46:39', NULL, NULL, 0),
(104, NULL, '22141027', '$2y$10$gTHQJiI2RpIj5Nz2XX9.PexFIvX80P6bF7H9Loh9q6QhqoLBwvNE2', 'valentiatan88@gmail.com', 14, '1748080902_Untitled_design_20250524_170106_0000.png', NULL, NULL, NULL, '2025-05-27 09:46:39', NULL, NULL, 0),
(105, NULL, '22141028', '$2y$10$4ZyWso.9ktQRLpDnMRVEP.pnG1lmY47GYtMjkHulQ/C98G/Crunz2', 'thovanessa6@gmail.com', 14, '1747814678_1000173635.png', NULL, NULL, NULL, '2025-05-27 09:46:39', NULL, NULL, 0),
(106, NULL, '22141030', '$2y$10$8/EMjUDyc6c5s9Wd5ZYsf.dnAgbfKg191TkDUW//TFsmiDBNsRK0e', 'vivian4sch@gmail.com', 14, '1748246399_17867.png', NULL, NULL, NULL, '2025-05-27 09:46:39', NULL, NULL, 0),
(107, NULL, '22141031', '$2y$10$7WV3SVTTmDsphbPUfpydJ.b0aLgy7Ht0gZm2HB3FmjcolltHxM7Jm', '', 14, 'user_162.png', NULL, NULL, NULL, '2025-05-27 09:46:39', NULL, NULL, 0),
(108, NULL, '22141032', '$2y$10$pXb4ImLaaqqgP/wYRokZy.J.dEIs5kU0.bEfzr8QPSfli5kWhemdq', '', 14, 'https://drive.google.com/uc?export=view&id=', NULL, NULL, NULL, '2025-05-27 09:46:39', NULL, NULL, 0),
(109, NULL, '22141035', '$2y$10$RPKLYwBvQJiL1S913JDVw.KhRF5fFCDk8ZEbpQ/fJNFF7t8rIXMtO', 'yulita200310@gmail.com', 14, '1748082681_IMG_20250524_173101.jpg', NULL, NULL, NULL, '2025-05-27 09:46:39', NULL, NULL, 0),
(110, NULL, '22242001', '$2y$10$S3tYOh7Sj/2GhnRC0Mg8ve2hgBST7L7W3yPjxJs0hjU.5CzIgSRRW', '', 14, 'https://drive.google.com/uc?export=view&id=', NULL, NULL, NULL, '2025-05-27 09:46:39', NULL, NULL, 0),
(111, NULL, '22242002', '$2y$10$PkjwVLI828r0a6watav0OuXywj.M9YPZx1galnc1wYr9SXbWT..By', 'delsentan@gmail.com', 14, '1748231241_IMG_6369.jpeg', NULL, NULL, NULL, '2025-05-27 09:46:39', NULL, NULL, 0),
(112, NULL, '22242003', '$2y$10$NiOBlnQ5bjW8Wrskg/ZhLuP77o8cHyuRWCZr/XaY7/Bc9LV2ZEWzW', 'des021501@gmail.com', 14, '1748241654_IMG-20250526-WA0022.jpg', NULL, NULL, NULL, '2025-05-27 09:46:39', NULL, NULL, 0),
(113, NULL, '22242004', '$2y$10$qWYFofbLtoygVeYmyIXDeeMtZX6OvqfnHtUbtkKRimMf8eIKXqVES', 'Chenellyssa54@gmail.com', 14, 'user_168.png', NULL, NULL, NULL, '2025-05-27 09:46:39', NULL, NULL, 0),
(114, NULL, '22242005', '$2y$10$1lKyJBiQFYYq34trn.DVB.GxnrLHzKScp1d5RlZdV6Nj9wOhpGGaK', 'feliciakang97@gmail.com', 14, '1748241683_IMG-20250526-WA0041.jpg', NULL, NULL, NULL, '2025-05-27 09:46:39', NULL, NULL, 0),
(115, NULL, '22242006', '$2y$10$wYapdzDJjlPT0IsO3hmZx.TUbQIoTqaGAPiPHDHWf/qt10zuqMhga', '', 14, '1748253150_F5E5E0A2-5759-4312-B0BD-3AC91DC2F7C3.jpeg', NULL, NULL, NULL, '2025-05-27 09:46:39', NULL, NULL, 0),
(116, NULL, '22242007', '$2y$10$O2fQm37QL0X7l1cj9J7meuELJ4nMshXzScA0gxIegiy70xI5j86We', '', 14, 'https://drive.google.com/uc?export=view&id=', NULL, NULL, NULL, '2025-05-27 09:46:39', NULL, NULL, 0),
(117, NULL, '24141627', '$2y$10$6A7yiD2KXjRjQuyiFrWXKeQqacfb9FU69eIzq.sBplR.o30.SGyvy', 'jackly76@smp.belajar.id', 14, 'user_172.png', NULL, NULL, NULL, '2025-05-27 09:46:39', NULL, NULL, 0),
(118, NULL, '22242008', '$2y$10$OLLbN7YpYa2.dGyWa.KG7eKjqu/mSekFU9z1VHpXpYw804hr6LvWi', '', 14, 'https://drive.google.com/uc?export=view&id=', NULL, NULL, NULL, '2025-05-27 09:46:39', NULL, NULL, 0),
(119, NULL, '22242009', '$2y$10$lgCKIk6k6EKNQakHhxnki.wJvGMX2gudUOc2jvsTmf0Ik6X5Fmt.K', 'tsejasveno@gmail.com', 14, 'user_174.png', NULL, NULL, NULL, '2025-05-27 09:46:39', NULL, NULL, 0),
(120, NULL, '22242010', '$2y$10$ly6/En9XH2P3pFpiduxG7eIybhP1dAMKdje.K9BidjUkOPEGadaq.', 'Juwitavanessa37@gmail.com', 14, '1748240801_Screenshot_20250526-132618_Gallery.jpg', NULL, NULL, NULL, '2025-05-27 09:46:39', NULL, NULL, 0),
(121, NULL, '22242011', '$2y$10$M98IDU1FgHeRWkeXeWLhI.Gm.LI2puEEUL2EUtFIAcuRucyMTnwWy', 'leemeylisa68@gmail.com', 14, 'user_176.png', NULL, NULL, NULL, '2025-05-27 09:46:39', NULL, NULL, 0),
(123, NULL, '22242013', '$2y$10$tVXhygkPjVLGo/CXC2UdM.8.k2KzIygOfjQDWYGPOvj3Djv630iHO', 'sherenkho251@gmail.com', 14, '1748254023_IMG-20250526-WA0023.jpg', NULL, NULL, NULL, '2025-05-27 09:46:39', NULL, NULL, 0),
(124, NULL, '22242014', '$2y$10$2V4DHj3jyVG4hArcY2Uo1OXF5BKAk6tKCzKWDreLi54JlKFgCTsim', '@Angelinaviona537@Gmail.Com', 14, '1748222300_IMG-20250523-WA0005.jpg', NULL, NULL, NULL, '2025-05-27 09:46:39', NULL, NULL, 0),
(125, NULL, '22242012', '$2y$10$pSQxNpJKgL4rjpE2/nn1ru6vZ3PbqUO9r9m2X4IvAtU0ZNQo91utm', 'daan22842@gmail.com', 14, 'cropped22.png', NULL, NULL, NULL, '2025-05-27 09:51:07', NULL, NULL, 0),
(126, NULL, 'amel', 'c4ca4238a0b923820dcc509a6f75849b', 'annabladzherin@gmail.com', 4, '680efea8bc793.jpg', NULL, 1, NULL, '2025-05-29 14:21:34', NULL, NULL, 0),
(127, 'Natasha Gotami', '23161004', 'c4ca4238a0b923820dcc509a6f75849b', NULL, 5, '63ba3ac4-1cbf-4d0d-8bd6-567453a853b0.jpeg', 2, 8, NULL, '2025-05-29 16:37:37', NULL, NULL, 0),
(128, 'Engeline Chairine', '23161014', 'c4ca4238a0b923820dcc509a6f75849b', 'kurumidafox@gmail.com', 4, 'BELOVED.jpg', 2, NULL, NULL, '2025-05-29 16:38:16', '2025-06-02 10:38:37', NULL, 0),
(129, 'Meyliana', '23161008', 'c4ca4238a0b923820dcc509a6f75849b', NULL, 4, 'fe7d5105-2be2-4228-88d5-9d2f3a134245.jpeg', 2, NULL, NULL, '2025-05-29 16:39:11', NULL, NULL, 0),
(130, 'test', '1012', '202cb962ac59075b964b07152d234b70', NULL, 4, 'screencapture-localhost-wordpress-2025-05-30-20_26_14.png', 2, NULL, NULL, '2025-06-01 18:33:27', NULL, NULL, 0),
(131, NULL, 'Sherlina', 'c4ca4238a0b923820dcc509a6f75849b', NULL, 6, 'default.png', NULL, NULL, NULL, '2025-06-01 23:47:23', NULL, NULL, 0),
(132, 'yera', 'yera', '$2y$10$8b1UKgBlnsHhjaFsTZna/uFwufj34ToWJuhqWmWgSJa8nu4.QgZky', 'annabladzherin@gmail.com', 14, '1748919791_1862d412bf777ddc6f2c.png', 0, 0, 0, '2025-06-03 10:03:11', NULL, NULL, 0),
(133, 'viera', 'viera', '$2y$10$Rl2gTkf5c9Sf6EADa.adD.JMjt1jkrL8TjPzd5VHfBEF9mc5.9QnC', 'annabladzherin@gmail.com', 14, '1748919908_35d39efe54f68b06bfdc.png', 0, 0, 0, '2025-06-03 10:05:08', '2025-06-03 21:15:44', NULL, 0),
(134, NULL, 'mey', '$2y$10$WWvbEtAc/Q1XY7ME6zZHIOgpMbz3KKuJJ1fI0HmICnJV.4lbyvArq', 'annabladzherin@gmail.com', 1, '1748966759_e44644a6792e3c71cf91.jpg', NULL, NULL, NULL, '2025-06-03 23:05:59', NULL, NULL, 0),
(135, 'Kalila', 'kalila', '$2y$10$9PSWh/xwCFmHQJC/knhK4uKyMdxi39uKPKMOh/jy7cdqo.XBcgEHa', 'kalila@gmail.com', 14, 'https://drive.google.com/uc?export=view&id=', NULL, NULL, NULL, '2025-06-09 18:01:26', NULL, NULL, 0),
(136, 'Kalila', 'kalila', '$2y$10$FKXGgnn2cElAve6Yz9SUyOzKs5ohf7rSb2PcEpRDOW1erIkRu5.ia', 'kalila@gmail.com', 14, 'https://drive.google.com/uc?export=view&id=', NULL, NULL, NULL, '2025-06-09 18:08:34', NULL, NULL, 0);

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
  MODIFY `id_absen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `ekstra`
--
ALTER TABLE `ekstra`
  MODIFY `id_ekstra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `nilai_sikap`
--
ALTER TABLE `nilai_sikap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `rombel`
--
ALTER TABLE `rombel`
  MODIFY `id_rombel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
