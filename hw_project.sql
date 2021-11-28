-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 28 Nov 2021 pada 13.09
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
-- Struktur dari tabel `comment_section`
--

CREATE TABLE IF NOT EXISTS `comment_section` (
`id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL,
  `DATE` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `NAME` varchar(100) NOT NULL,
  `comment` varchar(1000) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=7 ;

--
-- Dumping data untuk tabel `comment_section`
--

INSERT INTO `comment_section` (`id`, `task_id`, `DATE`, `NAME`, `comment`) VALUES
(2, 1, '2021-07-22 00:58:12', 'zabil sabri muhammad', 'Apakah ini?'),
(3, 3, '2021-10-29 02:37:49', 'zabil sabri muhammad', 'Salah nomor 1 nya seharusnya 32cm'),
(4, 3, '2021-10-29 02:39:48', 'wahyudi nugraha', 'Edd sudah mi lagi ku kumpul :('),
(5, 3, '2021-10-29 02:40:12', 'wahyudi nugraha', 'test'),
(6, 4, '2021-11-11 06:08:34', 'wahyudi nugraha', 'Ku kira deadlinennya tggl 13 jam 23:59?');

-- --------------------------------------------------------

--
-- Struktur dari tabel `homework`
--

CREATE TABLE IF NOT EXISTS `homework` (
`hw_id` int(11) NOT NULL,
  `TANGGAL` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `NAMA` varchar(100) NOT NULL,
  `MAPEL` varchar(100) NOT NULL,
  `DEADLINE` varchar(100) NOT NULL,
  `KETERANGAN` varchar(1000) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=6 ;

--
-- Dumping data untuk tabel `homework`
--

INSERT INTO `homework` (`hw_id`, `TANGGAL`, `NAMA`, `MAPEL`, `DEADLINE`, `KETERANGAN`) VALUES
(4, '2021-11-11 05:39:13', 'zabil sabri muhammad', 'Matdas', '2021-11-14', 'dua soal ttg integral tentu'),
(5, '2021-11-11 06:03:52', 'wahyudi nugraha', 'Peng. Pemrograman', '2021-11-13T23:59', 'membuat looping tanpa looping');

-- --------------------------------------------------------

--
-- Struktur dari tabel `student_info`
--

CREATE TABLE IF NOT EXISTS `student_info` (
`st_id` int(11) NOT NULL,
  `updated on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `NAMA` varchar(100) NOT NULL,
  `NIS` int(11) NOT NULL,
  `admin_id` int(1) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `student_info`
--

INSERT INTO `student_info` (`st_id`, `updated on`, `NAMA`, `NIS`, `admin_id`) VALUES
(1, '2021-11-10 23:53:49', 'zabil sabri muhammad', 181175, 1),
(2, '2021-07-10 12:40:41', 'wahyudi nugraha', 181174, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `subject`
--

CREATE TABLE IF NOT EXISTS `subject` (
`sb_id` int(11) NOT NULL,
  `DATE` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `NAME` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=6 ;

--
-- Dumping data untuk tabel `subject`
--

INSERT INTO `subject` (`sb_id`, `DATE`, `NAME`, `subject`) VALUES
(3, '2021-10-29 02:28:44', 'zabil sabri muhammad', 'Peng. Pemrograman'),
(4, '2021-10-29 02:29:07', 'zabil sabri muhammad', 'Matdas'),
(5, '2021-10-29 02:29:15', 'zabil sabri muhammad', 'Pancasila');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `uploaded_image`
--

INSERT INTO `uploaded_image` (`img_id`, `id_id`, `DATE`, `NAME`, `image_url`) VALUES
(2, 3, '2021-10-29 02:33:40', 'zabil sabri muhammad', 'PDF-617b5d842033f2.39626830.pdf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment_section`
--
ALTER TABLE `comment_section`
 ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `comment_section`
--
ALTER TABLE `comment_section`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `homework`
--
ALTER TABLE `homework`
MODIFY `hw_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `student_info`
--
ALTER TABLE `student_info`
MODIFY `st_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
MODIFY `sb_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `uploaded_image`
--
ALTER TABLE `uploaded_image`
MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
