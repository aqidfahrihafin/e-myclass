-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 20, 2024 at 01:11 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-raport`
--

-- --------------------------------------------------------

--
-- Table structure for table `beasiswa`
--

CREATE TABLE `beasiswa` (
  `beasiswa_id` varchar(36) NOT NULL,
  `santri_id` varchar(36) NOT NULL,
  `jenis_beasiswa` varchar(20) DEFAULT NULL,
  `perguruan_tinggi` varchar(255) DEFAULT NULL,
  `negara_tujuan` varchar(255) DEFAULT NULL,
  `skala` enum('Dalam Negri','Luar Negri') DEFAULT NULL,
  `tahun_mulai` varchar(10) DEFAULT NULL,
  `tahun_selesai` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `data_ajar`
--

CREATE TABLE `data_ajar` (
  `data_ajar_id` varchar(36) NOT NULL,
  `kelas_id` varchar(36) NOT NULL,
  `guru_id` varchar(36) NOT NULL,
  `mapel_id` varchar(36) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `guru_id` varchar(36) NOT NULL,
  `niy` varchar(20) DEFAULT NULL,
  `nik` varchar(20) DEFAULT NULL,
  `nama_guru` varchar(100) DEFAULT NULL,
  `tempat_lahir` varchar(30) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jenis_kelamin` varchar(10) DEFAULT NULL,
  `alamat_guru` text DEFAULT NULL,
  `telp_guru` varchar(20) DEFAULT NULL,
  `pendidikan` varchar(20) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `qrcode` varchar(255) NOT NULL,
  `status` enum('aktif','non-aktif') DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`guru_id`, `niy`, `nik`, `nama_guru`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `alamat_guru`, `telp_guru`, `pendidikan`, `photo`, `qrcode`, `status`, `create_at`) VALUES
('aa06822dfb9273d3b3bb1900a71a3851', '123', '123', 'H. Sirojul Arifin Shofa, S.E. M.A', 'sumenep', '2024-02-01', 'L', '3', '0878795013153', 'SMA Sedrajat', 'user.png', '', 'aktif', '2024-02-10 18:30:56'),
('c9a5be7171c0f354b4d4c11e7a2695c6', '202.0.021.01', '3529101701000001', 'Aqid Fahri Hafin, S. Kom', 'Sumenep', '2000-01-19', 'L', 'Gadu Timur', '87879501315', 'Sarjana (S1)', '72c219aa4af1a93b5e228dd06c81435c.jpeg', 'qrcode_guru_c9a5be7171c0f354b4d4c11e7a2695c6.png', 'aktif', '2024-02-09 06:34:29');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `kelas_id` varchar(36) NOT NULL,
  `guru_id` varchar(50) DEFAULT NULL,
  `tahun_ajaran_id` varchar(50) NOT NULL,
  `kode_kelas` varchar(255) DEFAULT NULL,
  `kelas` varchar(255) DEFAULT NULL,
  `jenis_kelas` varchar(255) DEFAULT NULL,
  `target_kelas` varchar(255) DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`kelas_id`, `guru_id`, `tahun_ajaran_id`, `kode_kelas`, `kelas`, `jenis_kelas`, `target_kelas`, `create_at`) VALUES
('ac425a64c6b8644a80f409f2946bd33f', 'aa06822dfb9273d3b3bb1900a71a3851', '03a1a133311dce0605967112b1d8b3f6', 'KL-024712', 'Tahfidz', 'Putra', '2 Juz', '2024-02-19 15:19:31');

-- --------------------------------------------------------

--
-- Table structure for table `kelas_santri`
--

CREATE TABLE `kelas_santri` (
  `kelas_santri_id` varchar(36) NOT NULL,
  `kelas_id` varchar(255) DEFAULT NULL,
  `santri_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas_santri`
--

INSERT INTO `kelas_santri` (`kelas_santri_id`, `kelas_id`, `santri_id`) VALUES
('01e4b106cee5b4c2d879e9e8475a89e4', 'ac425a64c6b8644a80f409f2946bd33f', 'b19232a6f86eb617f16c21431543f2ec'),
('0f22b2e0bbfc8d3912f8779e1497aa41', 'ac425a64c6b8644a80f409f2946bd33f', 'b19232a6f86eb617f16c21431543f2ec');

-- --------------------------------------------------------

--
-- Table structure for table `kkm`
--

CREATE TABLE `kkm` (
  `kkm_id` varchar(36) NOT NULL,
  `kkm` int(3) DEFAULT NULL,
  `kelas_id` varchar(36) NOT NULL,
  `tahun_ajaran_id` varchar(36) NOT NULL,
  `semester` varchar(36) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

CREATE TABLE `mapel` (
  `mapel_id` varchar(36) NOT NULL,
  `kode_mapel` varchar(50) NOT NULL,
  `nama_mapel` varchar(50) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mapel`
--

INSERT INTO `mapel` (`mapel_id`, `kode_mapel`, `nama_mapel`, `create_at`) VALUES
('0394a7268fd43113e57fd691d50df1a3', 'MP-024951', 'Tartil', '2024-02-15 01:13:35'),
('7c58222287b07c054b354782c8e5b34c', 'MP-024625', 'Tahfidz', '2024-02-10 13:08:19');

-- --------------------------------------------------------

--
-- Table structure for table `pesantren`
--

CREATE TABLE `pesantren` (
  `pesantren_id` varchar(32) NOT NULL,
  `nama_lembaga` varchar(255) DEFAULT NULL,
  `nsm` varchar(20) DEFAULT NULL,
  `npsm` varchar(20) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `kecamatan` varchar(50) DEFAULT NULL,
  `kabupaten` varchar(50) DEFAULT NULL,
  `provinsi` varchar(50) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `guru_id` varchar(36) DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pesantren`
--

INSERT INTO `pesantren` (`pesantren_id`, `nama_lembaga`, `nsm`, `npsm`, `alamat`, `kecamatan`, `kabupaten`, `provinsi`, `logo`, `guru_id`, `create_at`) VALUES
('c4ca4238a0b923820dcc509a6f75849b', 'Pesantren Apins Digital', '1234567890', '0987654321', 'Jl. Raya Pesantren No. 123', 'Kota', 'Pamekasan', 'Jawa Timur', 'logo.png', 'c9a5be7171c0f354b4d4c11e7a2695c6', '2024-02-17 14:12:33');

-- --------------------------------------------------------

--
-- Table structure for table `prestasi`
--

CREATE TABLE `prestasi` (
  `prestasi_id` varchar(36) NOT NULL,
  `santri_id` varchar(36) NOT NULL,
  `jenis_prestasi` varchar(20) DEFAULT NULL,
  `tingkat_prestasi` varchar(20) DEFAULT NULL,
  `nama_prestasi` varchar(100) DEFAULT NULL,
  `tahun_prestasi` varchar(10) DEFAULT NULL,
  `penyelenggara` varchar(100) DEFAULT NULL,
  `peringkat` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prestasi`
--

INSERT INTO `prestasi` (`prestasi_id`, `santri_id`, `jenis_prestasi`, `tingkat_prestasi`, `nama_prestasi`, `tahun_prestasi`, `penyelenggara`, `peringkat`) VALUES
('2135caee9f3226975dc074389496afce', 'b19232a6f86eb617f16c21431543f2ec', 'Rangking Kelas', 'Nasional', 'Rangking Kelas', '2025', 'Tahfidz', '1 (satu)'),
('7ce310d72cd2eb5d275839022c65b1a1', 'b19232a6f86eb617f16c21431543f2ec', 'Rangking Kelas', 'Internasional', 'Rangking Kelas', '2026', 'Tahfidz', '1 (satu)'),
('c4b07d2e40e5d52975460a9affe15e4e', 'b19232a6f86eb617f16c21431543f2ec', 'Rangking Kelas', 'Internasional', 'Rangking Kelas', '2025', 'Tahfidz', '1 (satu)'),
('cd58c9077d10a9f13c183a3816d7408d', 'b19232a6f86eb617f16c21431543f2ec', 'Rangking Kelas2', 'Kecamatan', 'Rangking Kelas', '2024', 'Tahfidz2', '2');

-- --------------------------------------------------------

--
-- Table structure for table `santri`
--

CREATE TABLE `santri` (
  `santri_id` varchar(36) NOT NULL,
  `no_induk` varchar(10) DEFAULT NULL,
  `nik` varchar(20) DEFAULT NULL,
  `no_kk` varchar(20) DEFAULT NULL,
  `nama_santri` varchar(100) DEFAULT NULL,
  `tempat_lahir` varchar(30) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jenis_kelamin` varchar(10) DEFAULT NULL,
  `alamat_santri` text DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telp_santri` varchar(20) DEFAULT NULL,
  `nama_ayah` varchar(100) DEFAULT NULL,
  `alamat_ayah` text DEFAULT NULL,
  `pendidikan_ayah` varchar(20) DEFAULT NULL,
  `pekerjaan_ayah` varchar(20) DEFAULT NULL,
  `telp_ayah` varchar(20) DEFAULT NULL,
  `nama_ibu` varchar(100) DEFAULT NULL,
  `alamat_ibu` text DEFAULT NULL,
  `pendidikan_ibu` varchar(20) DEFAULT NULL,
  `pekerjaan_ibu` varchar(20) DEFAULT NULL,
  `telp_ibu` varchar(20) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `status` enum('aktif','keluar','non-aktif') DEFAULT NULL,
  `tahun_ajaran_id` varchar(100) DEFAULT NULL,
  `tanggal_masuk` varchar(100) DEFAULT NULL,
  `tanggal_keluar` varchar(100) DEFAULT NULL,
  `alasan_keluar` varchar(100) DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `santri`
--

INSERT INTO `santri` (`santri_id`, `no_induk`, `nik`, `no_kk`, `nama_santri`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `alamat_santri`, `email`, `telp_santri`, `nama_ayah`, `alamat_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `telp_ayah`, `nama_ibu`, `alamat_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `telp_ibu`, `photo`, `status`, `tahun_ajaran_id`, `tanggal_masuk`, `tanggal_keluar`, `alasan_keluar`, `create_at`) VALUES
('b19232a6f86eb617f16c21431543f2ec', '0909828781', '0000000000000000', '0000000000000000', 'Saifa Putri Terbit Matahari', '3', '2024-03-02', 'P', '3', 'milyanatussaadah@gmail.com', '3', '3', '3', 'SMA Sedrajat', 'Petani', '3', '3', '3', 'SD Sedrajat', 'Petani', '3', 'user.png', 'aktif', '03a1a133311dce0605967112b1d8b3f6', '2024-02-28', NULL, NULL, '2024-02-14 23:55:51'),
('fd61d6db4e8560c6c443c27e34cb5a84', '1025015350', '3529101701000003', '3529101701000871', 'Aqid Fahri Hafin, S.Kom', 'Sumenep', '2024-01-31', 'L', 'Gadu Timur Ganding Sumenep', 'aqidfahrihafin@gmail.com', '087879501315', 'Ahmad Dani', 'Gadu Timur Ganding Sumenep', 'Sarjana (S1)', 'Petani', '087187289876', 'Puan Maharani', 'Gadu Timur Ganding Sumenep', 'SMA Sedrajat', 'Petani', '087178276787', 'user.png', 'aktif', '03a1a133311dce0605967112b1d8b3f6', '2024-03-01', NULL, NULL, '2024-02-10 15:44:17');

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `semester_id` varchar(36) NOT NULL,
  `semester` varchar(36) NOT NULL,
  `tahun_ajaran_id` varchar(36) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`semester_id`, `semester`, `tahun_ajaran_id`, `create_at`) VALUES
('dae4aa32a0a25d2a8bf639429fc7687c', 'Ganjil', '03a1a133311dce0605967112b1d8b3f6', '2024-02-08 22:19:36');

-- --------------------------------------------------------

--
-- Table structure for table `tahun_ajaran`
--

CREATE TABLE `tahun_ajaran` (
  `tahun_ajaran_id` varchar(36) NOT NULL,
  `kode_tahun` varchar(20) NOT NULL,
  `nama_tahun` varchar(100) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` enum('aktif','non-aktif') DEFAULT 'non-aktif'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tahun_ajaran`
--

INSERT INTO `tahun_ajaran` (`tahun_ajaran_id`, `kode_tahun`, `nama_tahun`, `create_at`, `status`) VALUES
('03a1a133311dce0605967112b1d8b3f6', 'SN-024102', '2025 M/1445 H', '2024-02-08 11:31:51', 'aktif');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` varchar(36) NOT NULL,
  `username` varchar(36) NOT NULL,
  `password` varchar(255) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `role` enum('admin','guru','wali','pembimbing') DEFAULT 'guru'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `create_at`, `role`) VALUES
('aa06822dfb9273d3b3bb1900a71a3851', '123', '$2y$10$zOSinFS1BLkFpDZ50OPxXeEusj107rDIPry3I/G.Sbs89MTp1luxC', '2024-02-17 16:45:09', 'pembimbing'),
('b19232a6f86eb617f16c21431543f2ec', '0000000000000000', '$2y$10$eL3fexaxUUsLdThBFWJI8.has/MVybiA0R7hUN/vx1mPRdhZbwQbS', '2024-02-20 00:03:24', 'wali'),
('c9a5be7171c0f354b4d4c11e7a2695c6', '3529101701000001', '$2y$10$M1KsO06.DnOqqLTv7UpRW.CD2rARGrfPOw.qU.FPyzPvdyEfohn.O', '2024-02-17 13:40:58', 'admin'),
('fd61d6db4e8560c6c443c27e34cb5a84', '3529101701000003', '$2y$10$6Eqg6AdiVzc1mW6JA4hxZOJfonNY4qL0GcKx1a7/5iqVtpeDA5Pii', '2024-02-17 13:47:34', 'wali');

-- --------------------------------------------------------

--
-- Table structure for table `users_profile`
--

CREATE TABLE `users_profile` (
  `users_profile_id` varchar(36) NOT NULL,
  `user_id` varchar(36) DEFAULT NULL,
  `guru_id` varchar(36) DEFAULT NULL,
  `santri_id` varchar(36) DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_profile`
--

INSERT INTO `users_profile` (`users_profile_id`, `user_id`, `guru_id`, `santri_id`, `create_at`) VALUES
('8d3f72626f8d0043c12ff53e8384ba4e', 'c9a5be7171c0f354b4d4c11e7a2695c6', 'c9a5be7171c0f354b4d4c11e7a2695c6', NULL, '2024-02-17 13:40:58'),
('ef330949485d63ea29964830b14b902c', 'fd61d6db4e8560c6c443c27e34cb5a84', NULL, 'fd61d6db4e8560c6c443c27e34cb5a84', '2024-02-17 13:47:34'),
('f9ceed115cee126d039fb44c3a22df99', 'b19232a6f86eb617f16c21431543f2ec', NULL, 'b19232a6f86eb617f16c21431543f2ec', '2024-02-20 00:03:24'),
('fb40d9d91bd540a6047da4d7eaca21f0', 'aa06822dfb9273d3b3bb1900a71a3851', 'aa06822dfb9273d3b3bb1900a71a3851', NULL, '2024-02-17 16:45:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `beasiswa`
--
ALTER TABLE `beasiswa`
  ADD PRIMARY KEY (`beasiswa_id`),
  ADD KEY `santri_id` (`santri_id`);

--
-- Indexes for table `data_ajar`
--
ALTER TABLE `data_ajar`
  ADD PRIMARY KEY (`data_ajar_id`),
  ADD KEY `kelas_id` (`kelas_id`),
  ADD KEY `mapel_id` (`mapel_id`),
  ADD KEY `guru_id` (`guru_id`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`guru_id`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`kelas_id`),
  ADD KEY `guru_id` (`guru_id`),
  ADD KEY `tahun_ajaran_id` (`tahun_ajaran_id`);

--
-- Indexes for table `kelas_santri`
--
ALTER TABLE `kelas_santri`
  ADD PRIMARY KEY (`kelas_santri_id`),
  ADD KEY `kelas_id` (`kelas_id`),
  ADD KEY `santri_id` (`santri_id`);

--
-- Indexes for table `kkm`
--
ALTER TABLE `kkm`
  ADD PRIMARY KEY (`kkm_id`),
  ADD KEY `kelas_id` (`kelas_id`),
  ADD KEY `tahun_ajaran_id` (`tahun_ajaran_id`);

--
-- Indexes for table `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`mapel_id`);

--
-- Indexes for table `pesantren`
--
ALTER TABLE `pesantren`
  ADD PRIMARY KEY (`pesantren_id`),
  ADD KEY `guru_id` (`guru_id`);

--
-- Indexes for table `prestasi`
--
ALTER TABLE `prestasi`
  ADD PRIMARY KEY (`prestasi_id`),
  ADD KEY `santri_id` (`santri_id`);

--
-- Indexes for table `santri`
--
ALTER TABLE `santri`
  ADD PRIMARY KEY (`santri_id`),
  ADD KEY `tahun_ajaran_id` (`tahun_ajaran_id`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`semester_id`),
  ADD KEY `tahun_ajaran_id` (`tahun_ajaran_id`);

--
-- Indexes for table `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
  ADD PRIMARY KEY (`tahun_ajaran_id`),
  ADD UNIQUE KEY `idx_tahun_ajaran_kode_tahun` (`kode_tahun`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `users_profile`
--
ALTER TABLE `users_profile`
  ADD PRIMARY KEY (`users_profile_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `guru_id` (`guru_id`),
  ADD KEY `santri_id` (`santri_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `beasiswa`
--
ALTER TABLE `beasiswa`
  ADD CONSTRAINT `beasiswa_ibfk_1` FOREIGN KEY (`santri_id`) REFERENCES `santri` (`santri_id`) ON DELETE CASCADE;

--
-- Constraints for table `data_ajar`
--
ALTER TABLE `data_ajar`
  ADD CONSTRAINT `data_ajar_ibfk_1` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`kelas_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `data_ajar_ibfk_2` FOREIGN KEY (`mapel_id`) REFERENCES `mapel` (`mapel_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `data_ajar_ibfk_3` FOREIGN KEY (`guru_id`) REFERENCES `guru` (`guru_id`) ON DELETE CASCADE;

--
-- Constraints for table `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `kelas_ibfk_1` FOREIGN KEY (`guru_id`) REFERENCES `guru` (`guru_id`) ON DELETE SET NULL,
  ADD CONSTRAINT `kelas_ibfk_2` FOREIGN KEY (`tahun_ajaran_id`) REFERENCES `tahun_ajaran` (`tahun_ajaran_id`) ON DELETE CASCADE;

--
-- Constraints for table `kelas_santri`
--
ALTER TABLE `kelas_santri`
  ADD CONSTRAINT `kelas_santri_ibfk_1` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`kelas_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `kelas_santri_ibfk_2` FOREIGN KEY (`santri_id`) REFERENCES `santri` (`santri_id`) ON DELETE CASCADE;

--
-- Constraints for table `kkm`
--
ALTER TABLE `kkm`
  ADD CONSTRAINT `kkm_ibfk_1` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`kelas_id`),
  ADD CONSTRAINT `kkm_ibfk_2` FOREIGN KEY (`tahun_ajaran_id`) REFERENCES `tahun_ajaran` (`tahun_ajaran_id`) ON DELETE CASCADE;

--
-- Constraints for table `pesantren`
--
ALTER TABLE `pesantren`
  ADD CONSTRAINT `pesantren_ibfk_1` FOREIGN KEY (`guru_id`) REFERENCES `guru` (`guru_id`) ON DELETE SET NULL;

--
-- Constraints for table `prestasi`
--
ALTER TABLE `prestasi`
  ADD CONSTRAINT `prestasi_ibfk_1` FOREIGN KEY (`santri_id`) REFERENCES `santri` (`santri_id`) ON DELETE CASCADE;

--
-- Constraints for table `santri`
--
ALTER TABLE `santri`
  ADD CONSTRAINT `santri_ibfk_1` FOREIGN KEY (`tahun_ajaran_id`) REFERENCES `tahun_ajaran` (`tahun_ajaran_id`);

--
-- Constraints for table `semester`
--
ALTER TABLE `semester`
  ADD CONSTRAINT `semester_ibfk_1` FOREIGN KEY (`tahun_ajaran_id`) REFERENCES `tahun_ajaran` (`tahun_ajaran_id`) ON DELETE CASCADE;

--
-- Constraints for table `users_profile`
--
ALTER TABLE `users_profile`
  ADD CONSTRAINT `users_profile_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_profile_ibfk_2` FOREIGN KEY (`guru_id`) REFERENCES `guru` (`guru_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_profile_ibfk_3` FOREIGN KEY (`santri_id`) REFERENCES `santri` (`santri_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
