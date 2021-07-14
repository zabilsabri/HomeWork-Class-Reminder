-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 14 Jul 2021 pada 04.45
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `homework`
--

INSERT INTO `homework` (`hw_id`, `DATE`, `NAMA`, `MAPEL`, `DEADLINE`, `KETERANGAN`) VALUES
(1, '2021-07-12 22:16:52', 'zabil sabri muhammad', 'PKN', '2021/05/10', 'TEST'),
(2, '2021-07-11 22:25:58', 'zabil sabri muhammad', 'B. INGGRIS', '11/07/2021', 'TEST'),
(3, '2021-07-11 23:30:22', 'wahyudi nugraha', 'B. INDO', '11/07/2021', 'TEST');

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
(1, '2021-07-10 01:00:23', 'zabil sabri muhammad', 181175),
(2, '2021-07-10 08:08:05', 'wahyudi nugraha', 181174);

-- --------------------------------------------------------

--
-- Struktur dari tabel `subject`
--

CREATE TABLE IF NOT EXISTS `subject` (
`sb_id` int(11) NOT NULL,
  `DATE` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `NAME` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `subject`
--

INSERT INTO `subject` (`sb_id`, `DATE`, `NAME`, `subject`) VALUES
(1, '2021-07-11 22:22:58', 'zabil sabri muhammad', 'MATEMATIKA'),
(2, '2021-07-11 22:23:03', 'zabil sabri muhammad', 'PKN'),
(3, '2021-07-11 22:23:08', 'zabil sabri muhammad', 'B. INDO'),
(4, '2021-07-11 22:23:12', 'zabil sabri muhammad', 'B. INGGRIS');

-- --------------------------------------------------------

--
-- Struktur dari tabel `uploaded_image`
--

CREATE TABLE IF NOT EXISTS `uploaded_image` (
`img_id` int(11) NOT NULL,
  `id_id` int(11) NOT NULL,
  `DATE` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `NAME` varchar(100) NOT NULL,
  `image_url` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `uploaded_image`
--

INSERT INTO `uploaded_image` (`img_id`, `id_id`, `DATE`, `NAME`, `image_url`) VALUES
(1, 3, '2021-07-14 01:56:26', 'zabil sabri muhammad', 'IMG-60ee444a3f30e9.35828690.pdf');

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
-- Indexes for table `subject`
--
ALTER TABLE `subject`
 ADD PRIMARY KEY (`sb_id`);

--
-- Indexes for table `uploaded_image`
--
ALTER TABLE `uploaded_image`
 ADD PRIMARY KEY (`img_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `homework`
--
ALTER TABLE `homework`
MODIFY `hw_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `student_info`
--
ALTER TABLE `student_info`
MODIFY `st_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
MODIFY `sb_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `uploaded_image`
--
ALTER TABLE `uploaded_image`
MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
