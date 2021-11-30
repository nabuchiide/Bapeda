-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Nov 2021 pada 01.11
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 7.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bappedadb`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggaran`
--

CREATE TABLE `anggaran` (
  `id` int(3) NOT NULL,
  `biaya` int(10) NOT NULL,
  `status` varchar(1) NOT NULL,
  `id_kegiatan` varchar(20) NOT NULL,
  `keterangan` text NOT NULL,
  `potongan` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `anggaran`
--

INSERT INTO `anggaran` (`id`, `biaya`, `status`, `id_kegiatan`, `keterangan`, `potongan`) VALUES
(18, 100000, '1', '5', 'Konsumsi', 10),
(19, 450000, '1', '5', 'Pemateri1', 10),
(20, 1000000, '1', '6', 'Konsumsi', 10),
(21, 5000000, '1', '6', 'transport', 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id` int(11) NOT NULL,
  `nama_kegiatan` varchar(45) NOT NULL,
  `lokasi` text NOT NULL,
  `tanggal` varchar(18) NOT NULL,
  `keterangan` text NOT NULL,
  `status` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kegiatan`
--

INSERT INTO `kegiatan` (`id`, `nama_kegiatan`, `lokasi`, `tanggal`, `keterangan`, `status`) VALUES
(5, 'Rapat Paripurna', 'Karawang', '2021-11-15', 'Testing ', '1'),
(6, 'Rapat Dewan Komisaris', 'Karawang', '2021-10-06', 'oktober', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pajak`
--

CREATE TABLE `pajak` (
  `id` int(5) NOT NULL,
  `biaya` int(10) NOT NULL,
  `id_kegiatan` varchar(20) NOT NULL,
  `id_anggaran` varchar(20) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pajak`
--

INSERT INTO `pajak` (`id`, `biaya`, `id_kegiatan`, `id_anggaran`, `status`) VALUES
(3, 10000, '5', '18', 1),
(4, 45000, '5', '19', 1),
(13, 100000, '6', '20', 1),
(14, 500000, '6', '21', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `id` int(3) NOT NULL,
  `nama_pegawai` varchar(45) NOT NULL,
  `no_pegawai` varchar(45) NOT NULL,
  `bidang` varchar(3) NOT NULL,
  `jabatan` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id`, `nama_pegawai`, `no_pegawai`, `bidang`, `jabatan`) VALUES
(2, 'Musa Hizami', '1510631170065', 'PTR', 'BP'),
(6, 'Lusi TA', '12457820', 'PKS', 'PTK'),
(7, 'Winda Mangang', '021457892', 'PKS', 'KPA'),
(8, 'Hani Agustuni', '0213654789', 'PEK', 'BPP');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `user_name` varchar(45) NOT NULL,
  `password` text NOT NULL,
  `user_type` varchar(2) NOT NULL,
  `no_pegawai` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `user_name`, `password`, `user_type`, `no_pegawai`) VALUES
(3, 'admin', 'admin', 'AD', '1510631170065');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `anggaran`
--
ALTER TABLE `anggaran`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pajak`
--
ALTER TABLE `pajak`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `anggaran`
--
ALTER TABLE `anggaran`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `pajak`
--
ALTER TABLE `pajak`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
