-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Jul 2019 pada 11.51
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siakad`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `ambil_mapel`
--

CREATE TABLE `ambil_mapel` (
  `id_siswa` int(11) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `semester_1` int(11) NOT NULL,
  `semester_2` int(11) NOT NULL,
  `semester_3` int(11) NOT NULL,
  `semester_4` int(11) NOT NULL,
  `semester_5` int(11) NOT NULL,
  `semester_6` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ambil_mapel`
--

INSERT INTO `ambil_mapel` (`id_siswa`, `id_guru`, `semester_1`, `semester_2`, `semester_3`, `semester_4`, `semester_5`, `semester_6`) VALUES
(3, 2, 2, 0, 0, 0, 0, 0),
(3, 2, 2, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `guru`
--

CREATE TABLE `guru` (
  `id_guru` int(11) NOT NULL,
  `nip` int(20) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `tgl_lahir` varchar(40) NOT NULL,
  `jenis_kelamin` varchar(40) NOT NULL,
  `kewarganegaraan` varchar(40) NOT NULL,
  `id_mapel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `guru`
--

INSERT INTO `guru` (`id_guru`, `nip`, `nama`, `tgl_lahir`, `jenis_kelamin`, `kewarganegaraan`, `id_mapel`) VALUES
(1, 12312313, 'Vi', '', 'perempuan', 'indonesia', 1),
(2, 213213, 'Nanx Shaw', '2019-07-06', 'laki - laki', 'Indonesia', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mapel`
--

CREATE TABLE `mapel` (
  `id_mapel` int(11) NOT NULL,
  `kode_mapel` varchar(30) NOT NULL,
  `nama_mapel` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mapel`
--

INSERT INTO `mapel` (`id_mapel`, `kode_mapel`, `nama_mapel`) VALUES
(1, 'Mat', 'matematika'),
(2, 'IPS', 'IPS');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai`
--

CREATE TABLE `nilai` (
  `id_siswa` int(11) NOT NULL,
  `semester_1` int(11) NOT NULL,
  `semester_2` int(11) NOT NULL,
  `semester_3` int(11) NOT NULL,
  `semester_4` int(11) NOT NULL,
  `semester_5` int(11) NOT NULL,
  `semester_6` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `nilai`
--

INSERT INTO `nilai` (`id_siswa`, `semester_1`, `semester_2`, `semester_3`, `semester_4`, `semester_5`, `semester_6`) VALUES
(3, 12, 21, 0, 0, 0, 0),
(4, 22, 25, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai_mapel`
--

CREATE TABLE `nilai_mapel` (
  `id_nilai_mapel` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `nilai` int(11) NOT NULL,
  `semester` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `nilai_mapel`
--

INSERT INTO `nilai_mapel` (`id_nilai_mapel`, `id_siswa`, `id_mapel`, `nilai`, `semester`) VALUES
(12, 3, 1, 70, 1),
(13, 3, 2, 90, 1),
(21, 3, 1, 100, 2),
(22, 4, 1, 80, 1),
(23, 4, 1, 80, 1),
(24, 4, 2, 80, 1),
(25, 4, 1, 90, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `nis` int(20) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `tgl_lahir` varchar(20) NOT NULL,
  `kewarganegaraan` varchar(20) NOT NULL,
  `alamat` varchar(40) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nis`, `nama`, `tgl_lahir`, `kewarganegaraan`, `alamat`, `jenis_kelamin`) VALUES
(3, 12313213, 'Rio', '1997-07-05', 'Indonesia', 'jl. surabaya ', 'laki - laki'),
(4, 123213, 'Rina', '1996-07-26', 'Indonesia', 'Jl. jakarta no 5', 'perempuan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `email`, `no_hp`, `date`) VALUES
(1, 'admin', 'admin', 'admin@admin.com', '0888', '2019-07-18 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indeks untuk tabel `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indeks untuk tabel `nilai_mapel`
--
ALTER TABLE `nilai_mapel`
  ADD PRIMARY KEY (`id_nilai_mapel`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `guru`
--
ALTER TABLE `guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `mapel`
--
ALTER TABLE `mapel`
  MODIFY `id_mapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `nilai_mapel`
--
ALTER TABLE `nilai_mapel`
  MODIFY `id_nilai_mapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
