-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 08 Feb 2022 pada 16.42
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `grade_path`
--

CREATE TABLE IF NOT EXISTS `grade_path` (
`grd_id` int(11) NOT NULL,
  `grd_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `grd_task` int(11) NOT NULL,
  `grd_room` int(11) NOT NULL,
  `grade` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  `KETERANGAN` varchar(1000) NOT NULL,
  `id_room` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `room`
--

CREATE TABLE IF NOT EXISTS `room` (
`id_room` int(11) NOT NULL,
  `creator` varchar(100) NOT NULL,
  `Name_Room` varchar(100) NOT NULL,
  `room_password` varchar(100) NOT NULL,
  `Rules_Room` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `room_path`
--

CREATE TABLE IF NOT EXISTS `room_path` (
`p_id` int(11) NOT NULL,
  `std_id` int(11) NOT NULL,
  `r_id` int(11) NOT NULL,
  `status` varchar(6) NOT NULL,
  `join_room_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `student_info`
--

CREATE TABLE IF NOT EXISTS `student_info` (
`st_id` int(11) NOT NULL,
  `updated on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `NAMA` varchar(100) NOT NULL,
  `NIS` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `uploaded_image`
--

CREATE TABLE IF NOT EXISTS `uploaded_image` (
`img_id` int(11) NOT NULL,
  `id_id` int(11) NOT NULL,
  `sb_name` varchar(100) NOT NULL,
  `DATE` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `NAME` varchar(100) NOT NULL,
  `std_id` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file` mediumblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=1 ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment_section`
--
ALTER TABLE `comment_section`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grade_path`
--
ALTER TABLE `grade_path`
 ADD PRIMARY KEY (`grd_id`);

--
-- Indexes for table `homework`
--
ALTER TABLE `homework`
 ADD PRIMARY KEY (`hw_id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
 ADD PRIMARY KEY (`id_room`);

--
-- Indexes for table `room_path`
--
ALTER TABLE `room_path`
 ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `student_info`
--
ALTER TABLE `student_info`
 ADD PRIMARY KEY (`st_id`) USING BTREE;

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
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `grade_path`
--
ALTER TABLE `grade_path`
MODIFY `grd_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `homework`
--
ALTER TABLE `homework`
MODIFY `hw_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
MODIFY `id_room` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `room_path`
--
ALTER TABLE `room_path`
MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `student_info`
--
ALTER TABLE `student_info`
MODIFY `st_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `uploaded_image`
--
ALTER TABLE `uploaded_image`
MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
