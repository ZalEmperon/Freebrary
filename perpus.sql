-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Nov 2021 pada 09.03
-- Versi server: 10.4.10-MariaDB
-- Versi PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpus`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(5) NOT NULL,
  `judul` varchar(60) NOT NULL,
  `pengarang` varchar(60) NOT NULL,
  `penerbit` varchar(60) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `genre` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`id_buku`, `judul`, `pengarang`, `penerbit`, `gambar`, `genre`) VALUES
(70, 'Tenggelamnya Kapal van der Wijck', 'Hamka', 'Nusantara', 'Tenggelamnya Kapal van der Wijck-15112021060106.jpg', 'Bildungsroman; Fiksi petualangan; Fantasi'),
(73, 'Bumi Earth', 'Hidalgo', 'Nusantara ', 'Bumi-15112021114017.jpg', 'Bildungsroman; Fiksi petualangan; Fantasi'),
(74, 'Iglesiera', 'abid', 'Gramedia', 'Iglesiera-16112021050912.jpg', 'Bildungsroman; Fiksi petualangan; Fantasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` int(5) NOT NULL,
  `email` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `email`, `username`, `password`, `status`) VALUES
(1, 'padreterra@gmail.com', 'Hidalgo', 'juanel', 'Admin'),
(2, 'sierramadre@gmail.com', 'Sierra Gracia', 'prove', 'User'),
(3, 'laverdad@gmail.mx', 'Seranos', 'verdad', 'User'),
(4, 'boldgar99@gmail.jp', 'Edgar', 'eternal', 'User'),
(5, 'bruh@gmail.com', 'Bruh', 'bruh', 'User'),
(6, 'bimaadi@gmail.com', 'Bima', 'bima1', 'User');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT untuk tabel `sessions`
--
ALTER TABLE `sessions`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
