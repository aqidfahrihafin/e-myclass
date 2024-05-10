-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2024 at 02:25 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-learning`
--

-- --------------------------------------------------------

--
-- Table structure for table `diskusi_materi`
--

CREATE TABLE `diskusi_materi` (
  `diskusi_materi_id` varchar(255) NOT NULL,
  `materi_id` varchar(255) DEFAULT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `isi_diskusi` text DEFAULT NULL,
  `tanggal_posting` datetime DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `dosen_id` varchar(36) NOT NULL,
  `prodi_id` varchar(36) DEFAULT NULL,
  `nidn` varchar(20) DEFAULT NULL,
  `no_card` varchar(4) DEFAULT NULL,
  `nama_dosen` varchar(100) DEFAULT NULL,
  `tempat_lahir` varchar(30) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jenis_kelamin` varchar(10) DEFAULT NULL,
  `alamat_dosen` text DEFAULT NULL,
  `telp_dosen` varchar(20) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `pendidikan` varchar(20) DEFAULT NULL,
  `qrcode` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `status` enum('aktif','non-aktif') DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`dosen_id`, `prodi_id`, `nidn`, `no_card`, `nama_dosen`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `alamat_dosen`, `telp_dosen`, `email`, `pendidikan`, `qrcode`, `photo`, `status`, `create_at`) VALUES
('9a4d33996ee1780e0f5c075a7b8173dc', '611d6dafcacd501a1d2260e9cda31cfd', '0981736799', '9517', 'Aqid Fahri Hafin, S. Kom', 'Sumenep ', '2024-04-26', 'L', 'p', '087879501415', 'aqidfahrihafin@gmail.com', 'SD Sedrajat', 'qrcode_dosen_9a4d33996ee1780e0f5c075a7b8173dc.png', '249a31bf05d6850a4ebf2363c0e121c1.jpg', 'aktif', '2024-04-26 10:30:13');

-- --------------------------------------------------------

--
-- Table structure for table `fakultas`
--

CREATE TABLE `fakultas` (
  `fakultas_id` varchar(36) NOT NULL,
  `kode_fakultas` varchar(50) NOT NULL,
  `nama_fakultas` varchar(50) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fakultas`
--

INSERT INTO `fakultas` (`fakultas_id`, `kode_fakultas`, `nama_fakultas`, `create_at`) VALUES
('48a72c016db3c96730d095d82aa2c698', 'T99021', 'Teknik', '2024-03-30 22:54:10'),
('72ac598e6a3170335fd54dc8a5578b6e', 'T99021s', 'Mipa', '2024-03-31 12:32:52');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `kelas_id` varchar(255) NOT NULL,
  `prodi_id` varchar(255) DEFAULT NULL,
  `tahun_ajaran_id` varchar(255) DEFAULT NULL,
  `nama_kelas` varchar(255) DEFAULT NULL,
  `kode_kelas` varchar(50) DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`kelas_id`, `prodi_id`, `tahun_ajaran_id`, `nama_kelas`, `kode_kelas`, `create_at`) VALUES
('83864f78c07f1fe0e54147e1722fef48', '611d6dafcacd501a1d2260e9cda31cfd', '673362946eb9aaafb2dd70370d9cf833', 'THP\'22', 'RnafNDaK', '2024-05-07 14:30:56'),
('8806801ae892ec83e987ba4d35f43814', '758d83883991a03cbcba614ca88047d9', '673362946eb9aaafb2dd70370d9cf833', 'TIA\'22', 'yfOccUJy', '2024-05-07 11:31:08');

-- --------------------------------------------------------

--
-- Table structure for table `lembaga`
--

CREATE TABLE `lembaga` (
  `lembaga_id` varchar(32) NOT NULL,
  `nama_lembaga` varchar(255) DEFAULT NULL,
  `nsm` varchar(20) DEFAULT NULL,
  `npsm` varchar(20) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `kecamatan` varchar(50) DEFAULT NULL,
  `kabupaten` varchar(50) DEFAULT NULL,
  `provinsi` varchar(50) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `dosen_id` varchar(36) DEFAULT NULL,
  `pimpinan` varchar(255) DEFAULT NULL,
  `nip` varchar(20) DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lembaga`
--

INSERT INTO `lembaga` (`lembaga_id`, `nama_lembaga`, `nsm`, `npsm`, `alamat`, `kecamatan`, `kabupaten`, `provinsi`, `logo`, `dosen_id`, `pimpinan`, `nip`, `create_at`) VALUES
('c4ca4238a0b923820dcc509a6f75849b', 'LPPM Universitas Annuqayah', '1234567890', '0987654321', 'Jl. Raya lembaga No. 123', 'Ganding', 'Sumenep', 'Jawa Timur', '69e1576af3a29ba0078c15a35d01cf9f.png', '9a4d33996ee1780e0f5c075a7b8173dc', 'Nama Pimpinan', '12345', '2024-03-28 14:13:38');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `mahasiswa_id` varchar(36) NOT NULL,
  `prodi_id` varchar(255) DEFAULT NULL,
  `nim` varchar(10) DEFAULT NULL,
  `no_card` varchar(4) DEFAULT NULL,
  `nama_mahasiswa` varchar(100) DEFAULT NULL,
  `tempat_lahir` varchar(30) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jenis_kelamin` varchar(10) DEFAULT NULL,
  `alamat_mahasiswa` text DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telp_mahasiswa` varchar(20) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `qrcode` varchar(255) NOT NULL,
  `status` enum('aktif','lulus','non-aktif') DEFAULT NULL,
  `tahun_ajaran_id` varchar(100) DEFAULT NULL,
  `tanggal_masuk` varchar(100) DEFAULT NULL,
  `tanggal_keluar` varchar(100) DEFAULT NULL,
  `alasan_keluar` varchar(100) DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa_kelas`
--

CREATE TABLE `mahasiswa_kelas` (
  `mahasiswa_kelas_id` varchar(255) NOT NULL,
  `mahasiswa_id` varchar(255) DEFAULT NULL,
  `kelas_id` varchar(255) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `matakuliah`
--

CREATE TABLE `matakuliah` (
  `matakuliah_id` varchar(255) NOT NULL,
  `kelas_id` varchar(255) DEFAULT NULL,
  `dosen_id` varchar(255) DEFAULT NULL,
  `nama_matakuliah` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `jumlah_sks` int(11) DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `materi`
--

CREATE TABLE `materi` (
  `materi_id` varchar(255) NOT NULL,
  `kelas_id` varchar(255) DEFAULT NULL,
  `matakuliah_id` varchar(255) DEFAULT NULL,
  `judul_materi` varchar(255) DEFAULT NULL,
  `isi_materi` text DEFAULT NULL,
  `dokumen` varchar(255) DEFAULT NULL,
  `tanggal_upload` date DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE `prodi` (
  `prodi_id` varchar(36) NOT NULL,
  `fakultas_id` varchar(50) NOT NULL,
  `kode_prodi` varchar(255) DEFAULT NULL,
  `nama_prodi` varchar(255) DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prodi`
--

INSERT INTO `prodi` (`prodi_id`, `fakultas_id`, `kode_prodi`, `nama_prodi`, `create_at`) VALUES
('611d6dafcacd501a1d2260e9cda31cfd', '48a72c016db3c96730d095d82aa2c698', 'sda', 'Teknologi Hasil Pertanian', '2024-04-07 23:28:46'),
('758d83883991a03cbcba614ca88047d9', '48a72c016db3c96730d095d82aa2c698', 'P9878s', 'Teknologi Informasi', '2024-04-08 05:46:13');

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `semester_id` varchar(36) NOT NULL,
  `semester` varchar(36) NOT NULL,
  `tahun_ajaran_id` varchar(36) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`semester_id`, `semester`, `tahun_ajaran_id`, `create_at`) VALUES
('18f7b7cca69177b5e32c8872f2d5dc68', 'Ganjil', '673362946eb9aaafb2dd70370d9cf833', '2024-05-04 13:50:00');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tahun_ajaran`
--

INSERT INTO `tahun_ajaran` (`tahun_ajaran_id`, `kode_tahun`, `nama_tahun`, `create_at`, `status`) VALUES
('673362946eb9aaafb2dd70370d9cf833', 'TA-024212', '2024/1446', '2024-04-22 08:13:16', 'aktif'),
('91286286f5a2107356f60f0c0e25132f', 'TA-024230', '2024/2025', '2024-03-31 01:54:32', 'aktif');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` varchar(36) NOT NULL,
  `username` varchar(36) NOT NULL,
  `password` varchar(255) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `role` enum('admin','bmsi','dosen','mahasiswa') DEFAULT 'mahasiswa'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `create_at`, `role`) VALUES
('9a4d33996ee1780e0f5c075a7b8173dc', '0981736799', '$2y$10$UKqI0WJmB5Z6Mm81aXjmNeZLqzq953AfEwh0iTnSU4gahxXr/Pz8C', '2024-05-01 09:54:40', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `users_profile`
--

CREATE TABLE `users_profile` (
  `users_profile_id` varchar(36) NOT NULL,
  `user_id` varchar(36) DEFAULT NULL,
  `dosen_id` varchar(36) DEFAULT NULL,
  `mahasiswa_id` varchar(36) DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users_profile`
--

INSERT INTO `users_profile` (`users_profile_id`, `user_id`, `dosen_id`, `mahasiswa_id`, `create_at`) VALUES
('3ea89f9f92769b92b0d15ec8d2bba595', '9a4d33996ee1780e0f5c075a7b8173dc', '9a4d33996ee1780e0f5c075a7b8173dc', NULL, '2024-05-01 09:54:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `diskusi_materi`
--
ALTER TABLE `diskusi_materi`
  ADD PRIMARY KEY (`diskusi_materi_id`),
  ADD KEY `materi_id` (`materi_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`dosen_id`),
  ADD KEY `prodi_id` (`prodi_id`);

--
-- Indexes for table `fakultas`
--
ALTER TABLE `fakultas`
  ADD PRIMARY KEY (`fakultas_id`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`kelas_id`),
  ADD KEY `prodi_id` (`prodi_id`),
  ADD KEY `tahun_ajaran_id` (`tahun_ajaran_id`);

--
-- Indexes for table `lembaga`
--
ALTER TABLE `lembaga`
  ADD PRIMARY KEY (`lembaga_id`),
  ADD KEY `dosen_id` (`dosen_id`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`mahasiswa_id`),
  ADD KEY `prodi_id` (`prodi_id`),
  ADD KEY `tahun_ajaran_id` (`tahun_ajaran_id`);

--
-- Indexes for table `mahasiswa_kelas`
--
ALTER TABLE `mahasiswa_kelas`
  ADD PRIMARY KEY (`mahasiswa_kelas_id`),
  ADD KEY `mahasiswa_id` (`mahasiswa_id`),
  ADD KEY `kelas_id` (`kelas_id`);

--
-- Indexes for table `matakuliah`
--
ALTER TABLE `matakuliah`
  ADD PRIMARY KEY (`matakuliah_id`),
  ADD KEY `kelas_id` (`kelas_id`),
  ADD KEY `dosen_id` (`dosen_id`);

--
-- Indexes for table `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`materi_id`),
  ADD KEY `kelas_id` (`kelas_id`),
  ADD KEY `matakuliah_id` (`matakuliah_id`);

--
-- Indexes for table `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`prodi_id`),
  ADD KEY `fakultas_id` (`fakultas_id`);

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
  ADD KEY `guru_id` (`dosen_id`),
  ADD KEY `mahasiswa_id` (`mahasiswa_id`) USING BTREE;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `diskusi_materi`
--
ALTER TABLE `diskusi_materi`
  ADD CONSTRAINT `diskusi_materi_ibfk_1` FOREIGN KEY (`materi_id`) REFERENCES `materi` (`materi_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `diskusi_materi_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `dosen`
--
ALTER TABLE `dosen`
  ADD CONSTRAINT `dosen_ibfk_1` FOREIGN KEY (`prodi_id`) REFERENCES `prodi` (`prodi_id`);

--
-- Constraints for table `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `kelas_ibfk_1` FOREIGN KEY (`prodi_id`) REFERENCES `prodi` (`prodi_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `kelas_ibfk_2` FOREIGN KEY (`tahun_ajaran_id`) REFERENCES `tahun_ajaran` (`tahun_ajaran_id`) ON DELETE CASCADE;

--
-- Constraints for table `lembaga`
--
ALTER TABLE `lembaga`
  ADD CONSTRAINT `lembaga_ibfk_1` FOREIGN KEY (`dosen_id`) REFERENCES `dosen` (`dosen_id`) ON DELETE SET NULL;

--
-- Constraints for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `mahasiswa_ibfk_1` FOREIGN KEY (`prodi_id`) REFERENCES `prodi` (`prodi_id`),
  ADD CONSTRAINT `mahasiswa_ibfk_2` FOREIGN KEY (`tahun_ajaran_id`) REFERENCES `tahun_ajaran` (`tahun_ajaran_id`);

--
-- Constraints for table `mahasiswa_kelas`
--
ALTER TABLE `mahasiswa_kelas`
  ADD CONSTRAINT `mahasiswa_kelas_ibfk_1` FOREIGN KEY (`mahasiswa_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `mahasiswa_kelas_ibfk_2` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`kelas_id`) ON DELETE CASCADE;

--
-- Constraints for table `matakuliah`
--
ALTER TABLE `matakuliah`
  ADD CONSTRAINT `matakuliah_ibfk_1` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`kelas_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `matakuliah_ibfk_2` FOREIGN KEY (`dosen_id`) REFERENCES `dosen` (`dosen_id`) ON DELETE CASCADE;

--
-- Constraints for table `materi`
--
ALTER TABLE `materi`
  ADD CONSTRAINT `materi_ibfk_1` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`kelas_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `materi_ibfk_2` FOREIGN KEY (`matakuliah_id`) REFERENCES `matakuliah` (`matakuliah_id`) ON DELETE CASCADE;

--
-- Constraints for table `prodi`
--
ALTER TABLE `prodi`
  ADD CONSTRAINT `prodi_ibfk_1` FOREIGN KEY (`fakultas_id`) REFERENCES `fakultas` (`fakultas_id`) ON DELETE CASCADE;

--
-- Constraints for table `semester`
--
ALTER TABLE `semester`
  ADD CONSTRAINT `semester_ibfk_1` FOREIGN KEY (`tahun_ajaran_id`) REFERENCES `tahun_ajaran` (`tahun_ajaran_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
