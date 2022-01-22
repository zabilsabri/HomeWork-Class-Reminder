-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Jan 2022 pada 15.51
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
-- Struktur dari tabel `comment_section`
--

CREATE TABLE `comment_section` (
  `id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL,
  `DATE` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `NAME` varchar(100) NOT NULL,
  `comment` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `comment_section`
--

INSERT INTO `comment_section` (`id`, `task_id`, `DATE`, `NAME`, `comment`) VALUES
(1, 2, '2022-01-22 12:33:07', 'wahyudi nugraha', 'Hi'),
(2, 2, '2022-01-22 12:34:35', 'wahyudi nugraha', 'Hi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `homework`
--

CREATE TABLE `homework` (
  `hw_id` int(11) NOT NULL,
  `TANGGAL` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `NAMA` varchar(100) NOT NULL,
  `MAPEL` varchar(100) NOT NULL,
  `DEADLINE` varchar(100) NOT NULL,
  `KETERANGAN` varchar(1000) NOT NULL,
  `id_room` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `homework`
--

INSERT INTO `homework` (`hw_id`, `TANGGAL`, `NAMA`, `MAPEL`, `DEADLINE`, `KETERANGAN`, `id_room`) VALUES
(1, '2022-01-21 15:34:29', 'zabil sabri muhammad', 'MATEMATIKA', '2022-01-22T23:59', 'Pembuktian Integral', 1),
(2, '2022-01-22 12:29:31', 'wahyudi nugraha', 'B. INGGRIS', '2022-01-22T20:29', 'test', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `room`
--

CREATE TABLE `room` (
  `id_room` int(11) NOT NULL,
  `creator` varchar(100) NOT NULL,
  `Name_Room` varchar(100) NOT NULL,
  `room_password` varchar(100) NOT NULL,
  `Rules_Room` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `room`
--

INSERT INTO `room` (`id_room`, `creator`, `Name_Room`, `room_password`, `Rules_Room`) VALUES
(1, 'zabil sabri muhammad', 'Sisfor A', '$2y$10$p8maSJWoXcsIgpwKm7w33eF.4YvSjCS.X0631SIzF4Dsmv6QVOT1O', 1),
(2, 'zabil sabri muhammad', 'Sisfor B', '$2y$10$DdlMerc9loOxRo2lJBj.sO2IcYz6WfHtRNVmCctPP9jnYUTVmcaei', 1),
(3, 'wahyudi nugraha', 'Sisfor C', '$2y$10$KDAKD838vbM/ckAEmqJfku5nejc3Ftl4ovZBChF58I1b.PzMATOrS', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `room_path`
--

CREATE TABLE `room_path` (
  `p_id` int(11) NOT NULL,
  `std_id` int(11) NOT NULL,
  `r_id` int(11) NOT NULL,
  `status` varchar(6) NOT NULL,
  `join_room_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `room_path`
--

INSERT INTO `room_path` (`p_id`, `std_id`, `r_id`, `status`, `join_room_time`) VALUES
(7, 1, 2, 'admin', '2022-01-22 13:04:30'),
(8, 1, 1, 'admin', '2022-01-22 14:15:07'),
(9, 2, 1, 'member', '2022-01-22 14:16:22'),
(12, 1, 3, 'member', '2022-01-22 14:24:19'),
(13, 2, 3, 'admin', '2022-01-22 14:25:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `student_info`
--

CREATE TABLE `student_info` (
  `st_id` int(11) NOT NULL,
  `updated on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `NAMA` varchar(100) NOT NULL,
  `NIS` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `student_info`
--

INSERT INTO `student_info` (`st_id`, `updated on`, `NAMA`, `NIS`) VALUES
(1, '2022-01-21 15:28:01', 'zabil sabri muhammad', '$2y$10$vPBYIrO/OTonfNhlEDPpEuvaZx.qPpJi85jBmUSemaTFTMPESDYOm'),
(2, '2022-01-21 15:35:32', 'wahyudi nugraha', '$2y$10$5regqESMHgmU7fPS6QYgsutDWsX0LnKPLEFpqVW5ZsE8EXgKCOrZ2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `subject`
--

CREATE TABLE `subject` (
  `sb_id` int(11) NOT NULL,
  `DATE` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `NAME` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `id_room` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `subject`
--

INSERT INTO `subject` (`sb_id`, `DATE`, `NAME`, `subject`, `id_room`) VALUES
(1, '2022-01-21 15:33:21', 'zabil sabri muhammad', 'MATEMATIKA', 1),
(2, '2022-01-22 12:17:43', 'wahyudi nugraha', 'B. INGGRIS', 2),
(5, '2022-01-22 14:28:30', 'wahyudi nugraha', 'PKN', 3),
(6, '2022-01-22 14:28:32', 'wahyudi nugraha', 'B. INDO', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `uploaded_image`
--

CREATE TABLE `uploaded_image` (
  `img_id` int(11) NOT NULL,
  `id_id` int(11) NOT NULL,
  `DATE` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `NAME` varchar(100) NOT NULL,
  `image_url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `comment_section`
--
ALTER TABLE `comment_section`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `homework`
--
ALTER TABLE `homework`
  ADD PRIMARY KEY (`hw_id`);

--
-- Indeks untuk tabel `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id_room`);

--
-- Indeks untuk tabel `room_path`
--
ALTER TABLE `room_path`
  ADD PRIMARY KEY (`p_id`);

--
-- Indeks untuk tabel `student_info`
--
ALTER TABLE `student_info`
  ADD PRIMARY KEY (`st_id`) USING BTREE;

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
-- AUTO_INCREMENT untuk tabel `comment_section`
--
ALTER TABLE `comment_section`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `homework`
--
ALTER TABLE `homework`
  MODIFY `hw_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `room`
--
ALTER TABLE `room`
  MODIFY `id_room` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `room_path`
--
ALTER TABLE `room_path`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `student_info`
--
ALTER TABLE `student_info`
  MODIFY `st_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `subject`
--
ALTER TABLE `subject`
  MODIFY `sb_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `uploaded_image`
--
ALTER TABLE `uploaded_image`
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
