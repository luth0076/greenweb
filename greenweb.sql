-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2023 at 04:22 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `greenweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_approve`
--

CREATE TABLE `tb_approve` (
  `id_approve` int(11) NOT NULL,
  `id_request` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_approve`
--

INSERT INTO `tb_approve` (`id_approve`, `id_request`, `id_user`, `status`, `created_at`, `updated_at`) VALUES
(1, 6, 15, 'Sukses', '2023-11-14 18:12:21', '2023-11-14 18:12:21'),
(2, 6, 15, 'Sukses', '2023-11-14 18:13:49', '2023-11-14 18:13:49');

-- --------------------------------------------------------

--
-- Table structure for table `tb_guru`
--

CREATE TABLE `tb_guru` (
  `id_guru` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nip` int(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_guru`
--

INSERT INTO `tb_guru` (`id_guru`, `id_user`, `nip`, `created_at`, `updated_at`) VALUES
(1, 15, 2147483647, '2023-11-12 16:50:56', '2023-11-12 16:50:56'),
(2, 21, 0, '2023-11-16 08:21:54', '2023-11-16 08:21:54'),
(3, 22, 0, '2023-11-16 08:22:11', '2023-11-16 08:22:11');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jabatan`
--

CREATE TABLE `tb_jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `jabatan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_jabatan`
--

INSERT INTO `tb_jabatan` (`id_jabatan`, `jabatan`) VALUES
(1, 'Admin'),
(2, 'Guru'),
(3, 'Siswa');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori_quest`
--

CREATE TABLE `tb_kategori_quest` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kategori_quest`
--

INSERT INTO `tb_kategori_quest` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Main'),
(2, 'Side'),
(3, 'Event');

-- --------------------------------------------------------

--
-- Table structure for table `tb_quest`
--

CREATE TABLE `tb_quest` (
  `id_quest` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_quest` varchar(255) NOT NULL,
  `poin` int(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_quest`
--

INSERT INTO `tb_quest` (`id_quest`, `id_kategori`, `nama_quest`, `poin`, `deskripsi`, `gambar`, `created_at`, `updated_at`) VALUES
(7, 1, 'Petualangan Penyelamat Lingkungan', 5, 'Halo pahlawan lingkungan kecil! Selamat datang di Petualangan Penyelamat Lingkungan. Tugas kalian adalah menyelamatkan planet kita yang indah dengan memahami cara membuang sampah dengan benar. Ikuti petunjuk di bawah ini dan buktikan bahwa kalian adalah Pahlawan Lingkungan yang tangguh!', '655105193aeac.jpg', '2023-11-11 15:32:34', '2023-11-12 17:02:17'),
(9, 2, 'Misi Taman Bunga Ceria', 10, 'Pahlawan Lingkungan harus menjelajahi taman sekolah. Merawat tanaman, menyiram, dan membersihkan area taman. Menyusun rencana sederhana untuk merawat tanaman di sekitar rumah.', '6553a5ab63b2a.png', '2023-11-14 16:51:55', '2023-11-16 11:29:16'),
(10, 2, 'Misi Hemat Energi', 5, 'Pahlawan Lingkungan harus menjelajahi kelas dan ruang umum di sekolah. Menyelamatkan energi dengan mematikan lampu dan perangkat listrik yang tidak digunakan. Membuat daftar kebiasaan hemat energi yang dapat dilakukan di rumah.', '6555fd769d666.jpg', '2023-11-16 11:31:02', '2023-11-16 11:31:02'),
(11, 2, 'Misi Air Bersih', 5, 'Pahlawan Lingkungan berpartisipasi dalam misi untuk menjaga kebersihan air. Mereka mempelajari pentingnya tidak membuang sampah di saluran air, dan bagaimana perilaku sederhana dapat mempengaruhi ketersediaan air bersih untuk kehidupan sehari-hari.', '6555fe2696754.jpg', '2023-11-16 11:33:58', '2023-11-16 11:35:36'),
(12, 2, 'Petualangan Recycle Ranger', 5, 'Dalam quest ini, Pahlawan Lingkungan menjadi Recycle Rangers yang berpetualang untuk mengumpulkan barang bekas di sekitar rumah mereka. Mereka belajar cara mendaur ulang benda-benda tersebut menjadi karya seni atau barang berguna lainnya, menggali kreativitas sambil membantu menyelamatkan lingkungan.', '6555fe61d4098.png', '2023-11-16 11:34:43', '2023-11-16 11:35:27');

-- --------------------------------------------------------

--
-- Table structure for table `tb_request`
--

CREATE TABLE `tb_request` (
  `id_request` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_quest` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_request`
--

INSERT INTO `tb_request` (`id_request`, `id_siswa`, `id_quest`, `status`, `created_at`, `updated_at`) VALUES
(5, 5, 7, 'Rejected', '2023-11-14 17:30:45', '2023-11-14 18:09:51'),
(6, 6, 9, 'Success', '2023-11-14 18:12:13', '2023-11-14 18:13:49'),
(7, 6, 7, 'Pending', '2023-11-14 18:15:10', '2023-11-14 18:15:10'),
(8, 6, 9, 'Pending', '2023-11-14 18:15:16', '2023-11-14 18:15:16'),
(9, 6, 7, 'Pending', '2023-11-14 18:15:21', '2023-11-14 18:15:21'),
(10, 6, 9, 'Pending', '2023-11-15 12:51:45', '2023-11-15 12:51:45'),
(11, 6, 7, 'Pending', '2023-11-15 12:51:53', '2023-11-15 12:51:53'),
(14, 3, 11, 'Pending', '2023-11-16 11:45:49', '2023-11-16 11:45:49');

-- --------------------------------------------------------

--
-- Table structure for table `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `id_siswa` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nis` int(11) NOT NULL,
  `sekolah` varchar(255) NOT NULL,
  `poin` int(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_siswa`
--

INSERT INTO `tb_siswa` (`id_siswa`, `id_user`, `nis`, `sekolah`, `poin`, `created_at`, `updated_at`) VALUES
(3, 14, 181910237, 'SDN 12 Depok', 1105, '2023-11-12 14:21:03', '2023-11-16 07:36:29'),
(5, 16, 181910233, 'SDN 1 Padang', 1000, '2023-11-12 18:11:23', '2023-11-14 16:52:37'),
(6, 17, 181910287, 'SDN 1 Bogor', 25, '2023-11-12 18:12:26', '2023-11-14 18:13:49'),
(10, 20, 181910212, '', 0, '2023-11-16 08:19:27', '2023-11-16 08:19:27');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `nama`, `password`, `id_jabatan`, `foto`, `created_at`, `updated_at`) VALUES
(2, 'admin', 'Salwarud', 'suadmin', 1, '', '2023-11-11 12:18:13', '2023-11-11 16:21:53'),
(14, '181910237', 'Ananda Eldin Eldinar', 'ananda', 3, '', '2023-11-12 14:21:03', '2023-11-16 14:34:24'),
(15, 'aesde', 'Luthfi Mubarok', 'asu', 2, '', '2023-11-12 16:50:56', '2023-11-14 17:34:03'),
(16, '181910233', 'Ridho Wananda', 'rido', 3, '', '2023-11-12 18:11:23', '2023-11-12 18:11:23'),
(17, '181910287', 'Muhamad Salwarud', 'salwa', 3, '', '2023-11-12 18:12:26', '2023-11-12 18:12:26'),
(20, '181910212', 'Ade Arif Ikhwani', 'ade', 3, '', '2023-11-16 08:19:27', '2023-11-16 08:19:27'),
(21, 'guru1', 'Guru Pertama', 'asd', 2, '', '2023-11-16 08:21:54', '2023-11-16 08:21:54'),
(22, 'guru2', 'Guru Kedua', 'asd', 2, '', '2023-11-16 08:22:11', '2023-11-16 08:22:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_approve`
--
ALTER TABLE `tb_approve`
  ADD PRIMARY KEY (`id_approve`),
  ADD KEY `id_request` (`id_request`,`id_user`),
  ADD KEY `userapprove` (`id_user`);

--
-- Indexes for table `tb_guru`
--
ALTER TABLE `tb_guru`
  ADD PRIMARY KEY (`id_guru`),
  ADD KEY `id_user` (`id_user`) USING BTREE;

--
-- Indexes for table `tb_jabatan`
--
ALTER TABLE `tb_jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `tb_kategori_quest`
--
ALTER TABLE `tb_kategori_quest`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tb_quest`
--
ALTER TABLE `tb_quest`
  ADD PRIMARY KEY (`id_quest`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `tb_request`
--
ALTER TABLE `tb_request`
  ADD PRIMARY KEY (`id_request`),
  ADD KEY `id_siswa` (`id_siswa`,`id_quest`),
  ADD KEY `quest` (`id_quest`);

--
-- Indexes for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD KEY `id_user` (`id_user`) USING BTREE;

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_jabatan` (`id_jabatan`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_approve`
--
ALTER TABLE `tb_approve`
  MODIFY `id_approve` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_guru`
--
ALTER TABLE `tb_guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_jabatan`
--
ALTER TABLE `tb_jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_kategori_quest`
--
ALTER TABLE `tb_kategori_quest`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_quest`
--
ALTER TABLE `tb_quest`
  MODIFY `id_quest` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_request`
--
ALTER TABLE `tb_request`
  MODIFY `id_request` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_approve`
--
ALTER TABLE `tb_approve`
  ADD CONSTRAINT `request` FOREIGN KEY (`id_request`) REFERENCES `tb_request` (`id_request`),
  ADD CONSTRAINT `userapprove` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`);

--
-- Constraints for table `tb_guru`
--
ALTER TABLE `tb_guru`
  ADD CONSTRAINT `user2` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE;

--
-- Constraints for table `tb_quest`
--
ALTER TABLE `tb_quest`
  ADD CONSTRAINT `kategori` FOREIGN KEY (`id_kategori`) REFERENCES `tb_kategori_quest` (`id_kategori`);

--
-- Constraints for table `tb_request`
--
ALTER TABLE `tb_request`
  ADD CONSTRAINT `quest` FOREIGN KEY (`id_quest`) REFERENCES `tb_quest` (`id_quest`),
  ADD CONSTRAINT `siswa` FOREIGN KEY (`id_siswa`) REFERENCES `tb_siswa` (`id_siswa`);

--
-- Constraints for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD CONSTRAINT `user` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE;

--
-- Constraints for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD CONSTRAINT `jabatan` FOREIGN KEY (`id_jabatan`) REFERENCES `tb_jabatan` (`id_jabatan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
