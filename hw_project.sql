-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Jul 2021 pada 17.13
-- Versi server: 10.4.19-MariaDB
-- Versi PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hw_project`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `homework`
--

CREATE TABLE `homework` (
  `hw_id` int(11) NOT NULL,
  `DATE` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `NAMA` varchar(100) NOT NULL,
  `MAPEL` varchar(100) NOT NULL,
  `DEADLINE` varchar(100) NOT NULL,
  `KETERANGAN` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `homework`
--

INSERT INTO `homework` (`hw_id`, `DATE`, `NAMA`, `MAPEL`, `DEADLINE`, `KETERANGAN`) VALUES
(2, '2021-07-11 14:33:49', 'zabil sabri muhammad', 'PKN', '11/07/2021', 'button'),
(3, '2021-07-12 11:02:36', 'wahyudi nugraha', 'MATEMATIKA', '13/07/2021', 'TEST'),
(4, '2021-07-12 11:02:55', 'wahyudi nugraha', 'B. INDO', '17/07/2021', 'TEST'),
(5, '2021-07-12 13:14:48', 'zabil sabri muhammad', 'MATEMATIKA', '11/07/2021', 'HAL 7 - 10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `student_info`
--

CREATE TABLE `student_info` (
  `st_id` int(11) NOT NULL,
  `updated on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `NAMA` varchar(100) NOT NULL,
  `NIS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `student_info`
--

INSERT INTO `student_info` (`st_id`, `updated on`, `NAMA`, `NIS`) VALUES
(1, '2021-07-10 12:40:27', 'zabil sabri muhammad', 181175),
(2, '2021-07-10 12:40:41', 'wahyudi nugraha', 181174);

-- --------------------------------------------------------

--
-- Struktur dari tabel `subject`
--

CREATE TABLE `subject` (
  `sb_id` int(11) NOT NULL,
  `DATE` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `NAME` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `subject`
--

INSERT INTO `subject` (`sb_id`, `DATE`, `NAME`, `subject`) VALUES
(4, '2021-07-11 13:13:44', 'zabil sabri muhammad', 'MATEMATIKA'),
(5, '2021-07-11 14:17:55', 'wahyudi nugraha', 'PKN'),
(6, '2021-07-11 14:18:01', 'wahyudi nugraha', 'B. INGGRIS'),
(7, '2021-07-11 14:18:05', 'wahyudi nugraha', 'B. INDO');

-- --------------------------------------------------------

--
-- Struktur dari tabel `uploaded_image`
--

CREATE TABLE `uploaded_image` (
  `img_id` int(11) NOT NULL,
  `id_id` int(11) NOT NULL,
  `image_url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `homework`
--
ALTER TABLE `homework`
  ADD PRIMARY KEY (`hw_id`);

--
-- Indeks untuk tabel `student_info`
--
ALTER TABLE `student_info`
  ADD PRIMARY KEY (`st_id`,`NIS`);

--
-- Indeks untuk tabel `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`sb_id`);

--
-- Indeks untuk tabel `uploaded_image`
--
ALTER TABLE `uploaded_image`
  ADD PRIMARY KEY (`img_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `homework`
--
ALTER TABLE `homework`
  MODIFY `hw_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `student_info`
--
ALTER TABLE `student_info`
  MODIFY `st_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `subject`
--
ALTER TABLE `subject`
  MODIFY `sb_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `uploaded_image`
--
ALTER TABLE `uploaded_image`
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
