-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 10 Jul 2021 pada 03.59
-- Versi Server: 5.5.39
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hw_project`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `homework`
--

CREATE TABLE IF NOT EXISTS `homework` (
`hw_id` int(11) NOT NULL,
  `DATE` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `NAMA` varchar(100) NOT NULL,
  `MAPEL` varchar(50) NOT NULL,
  `DEADLINE` varchar(50) NOT NULL,
  `KETERANGAN` varchar(1000) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `homework`
--

INSERT INTO `homework` (`hw_id`, `DATE`, `NAMA`, `MAPEL`, `DEADLINE`, `KETERANGAN`) VALUES
(1, '2021-07-10 01:57:47', 'zabil sabri muhammad', 'AGAMA', '2021/05/10', 'HAL 4-7');

-- --------------------------------------------------------

--
-- Struktur dari tabel `student_info`
--

CREATE TABLE IF NOT EXISTS `student_info` (
`st_id` int(11) NOT NULL,
  `updated on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `NAMA` varchar(100) NOT NULL,
  `NIS` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `student_info`
--

INSERT INTO `student_info` (`st_id`, `updated on`, `NAMA`, `NIS`) VALUES
(1, '2021-07-10 01:00:23', 'zabil sabri muhammad', 181175);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `homework`
--
ALTER TABLE `homework`
 ADD PRIMARY KEY (`hw_id`);

--
-- Indexes for table `student_info`
--
ALTER TABLE `student_info`
 ADD PRIMARY KEY (`st_id`,`NIS`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `homework`
--
ALTER TABLE `homework`
MODIFY `hw_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1;
--
-- AUTO_INCREMENT for table `student_info`
--
ALTER TABLE `student_info`
MODIFY `st_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
