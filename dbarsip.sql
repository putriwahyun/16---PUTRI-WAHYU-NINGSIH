-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 25, 2021 at 11:40 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbarsip`
--

-- --------------------------------------------------------

--
-- Table structure for table `arsipsurat`
--

CREATE TABLE `arsipsurat` (
  `idsurat` int(5) NOT NULL,
  `nosurat` varchar(30) NOT NULL,
  `kategori` varchar(20) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `waktuarsipan` timestamp NOT NULL DEFAULT current_timestamp(),
  `filesurat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `arsipsurat`
--

INSERT INTO `arsipsurat` (`idsurat`, `nosurat`, `kategori`, `judul`, `waktuarsipan`, `filesurat`) VALUES
(7, '03/DIR/SE/2021', 'Pemberitahuan', 'Pelaksanaan Perkualiahan Semester Ganjil', '2021-10-25 01:14:00', 'Pelaksanaan Perkualiahan Semester Ganjil.pdf'),
(9, '54/PUDIR.I/KM/2021', 'Pengumuman', 'Bantuan Link Aja UAS', '2021-10-25 09:26:47', 'Bantuan Link Aja UAS.pdf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `arsipsurat`
--
ALTER TABLE `arsipsurat`
  ADD PRIMARY KEY (`idsurat`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `arsipsurat`
--
ALTER TABLE `arsipsurat`
  MODIFY `idsurat` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
