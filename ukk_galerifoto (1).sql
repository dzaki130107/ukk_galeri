-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2024 at 10:13 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ukk_galerifoto`
--

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

CREATE TABLE `album` (
  `album_id` int(11) NOT NULL,
  `nama_album` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `tanggal_di_buat` date NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`album_id`, `nama_album`, `deskripsi`, `tanggal_di_buat`, `user_id`) VALUES
(15, 'superhero', 'supermen\r\n', '2024-11-04', 17),
(18, 'sakit', 'kepala', '2024-11-04', 17),
(19, 'yupi', 'kenyal', '2024-11-06', 19),
(20, 'gadget', 'oppo\r\n', '2024-11-06', 17);

-- --------------------------------------------------------

--
-- Table structure for table `foto`
--

CREATE TABLE `foto` (
  `foto_id` int(11) NOT NULL,
  `judul_foto` varchar(255) NOT NULL,
  `deskripsi_foto` text NOT NULL,
  `tanggal_unggah` date NOT NULL,
  `lokasi_file` varchar(255) NOT NULL,
  `album_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `foto`
--

INSERT INTO `foto` (`foto_id`, `judul_foto`, `deskripsi_foto`, `tanggal_unggah`, `lokasi_file`, `album_id`, `user_id`) VALUES
(42, 'goat', 'goat', '2024-11-05', '1256296505-cristiano-ronaldo-al_2ae2738.jpg', 15, 17),
(43, 'kartun', 'koboy', '2024-11-06', '719733847-toystory.jpg', 15, 17),
(44, 'yupi', 'kenyal', '2024-11-06', '2049394562-vespa.jpg', 19, 19),
(45, 'ceritaku', 'aduh', '2024-11-06', '571030550-mobil edan.jpg', 20, 17),
(46, 'kopi', 'api', '2024-11-06', '4768511-icon.jpg', 18, 17);

-- --------------------------------------------------------

--
-- Table structure for table `komentar_foto`
--

CREATE TABLE `komentar_foto` (
  `komentar_id` int(11) NOT NULL,
  `foto_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `isi_komentar` text NOT NULL,
  `tanggal_komentar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `like_foto`
--

CREATE TABLE `like_foto` (
  `like_id` int(11) NOT NULL,
  `foto_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tanggal_like` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `like_foto`
--

INSERT INTO `like_foto` (`like_id`, `foto_id`, `user_id`, `tanggal_like`) VALUES
(143, 44, 19, '2024-11-06'),
(144, 43, 17, '2024-11-06'),
(145, 42, 17, '2024-11-06'),
(146, 45, 17, '2024-11-06'),
(147, 46, 17, '2024-11-06');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `email`, `nama_lengkap`, `alamat`) VALUES
(1, 'aa', '4124bc0a9335c27f086f24ba207a4912', 'aa@gmail.com', '', 'aa'),
(2, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@gmail.com', '', 'Indonesia'),
(3, 'aa', '4124bc0a9335c27f086f24ba207a4912', 'aa@gmail.com', '', 'aa'),
(16, 'njek', 'njek', 'njek@gmail.com', 'njek', 'njek'),
(17, 'eca', '712ad68b518fb2820aa68e3746035236', 'eca@gmail.com', 'eca', 'eca'),
(19, 'baknus', '53974569ce838219a8fe7e024200aacf', 'baknus@gmail.com', 'baknus', 'indonesia');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`album_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `foto`
--
ALTER TABLE `foto`
  ADD PRIMARY KEY (`foto_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `album_id` (`album_id`);

--
-- Indexes for table `komentar_foto`
--
ALTER TABLE `komentar_foto`
  ADD PRIMARY KEY (`komentar_id`),
  ADD KEY `foto_id` (`foto_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `like_foto`
--
ALTER TABLE `like_foto`
  ADD PRIMARY KEY (`like_id`),
  ADD KEY `foto_id` (`foto_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `album`
--
ALTER TABLE `album`
  MODIFY `album_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `foto`
--
ALTER TABLE `foto`
  MODIFY `foto_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `komentar_foto`
--
ALTER TABLE `komentar_foto`
  MODIFY `komentar_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `like_foto`
--
ALTER TABLE `like_foto`
  MODIFY `like_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `album`
--
ALTER TABLE `album`
  ADD CONSTRAINT `album_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `foto`
--
ALTER TABLE `foto`
  ADD CONSTRAINT `foto_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `foto_ibfk_2` FOREIGN KEY (`album_id`) REFERENCES `album` (`album_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `komentar_foto`
--
ALTER TABLE `komentar_foto`
  ADD CONSTRAINT `komentar_foto_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `komentar_foto_ibfk_2` FOREIGN KEY (`foto_id`) REFERENCES `foto` (`foto_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `like_foto`
--
ALTER TABLE `like_foto`
  ADD CONSTRAINT `like_foto_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `like_foto_ibfk_2` FOREIGN KEY (`foto_id`) REFERENCES `foto` (`foto_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
