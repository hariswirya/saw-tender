-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Agu 2023 pada 06.27
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spksaw`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bobot_kriteria`
--

CREATE TABLE `bobot_kriteria` (
  `id_bobotkriteria` int(3) NOT NULL,
  `id_jenistender` int(3) NOT NULL,
  `id_kriteria` int(3) NOT NULL,
  `bobot` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bobot_kriteria`
--

INSERT INTO `bobot_kriteria` (`id_bobotkriteria`, `id_jenistender`, `id_kriteria`, `bobot`) VALUES
(22, 3, 13, 0.15),
(23, 3, 14, 0.15),
(24, 3, 15, 0.15),
(25, 3, 16, 0.15),
(26, 3, 17, 0.4),
(37, 18, 13, 0.2),
(38, 18, 14, 0.2),
(39, 18, 15, 0.1),
(40, 18, 16, 0.1),
(41, 18, 17, 0.4),
(42, 14, 13, 0.2),
(43, 14, 14, 0.2),
(44, 14, 15, 0.1),
(45, 14, 16, 0.1),
(46, 14, 17, 0.4),
(53, 19, 13, 0.2),
(54, 19, 14, 0.2),
(55, 19, 15, 0.1),
(56, 19, 16, 0.1),
(57, 19, 17, 0.4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `hasil`
--

CREATE TABLE `hasil` (
  `id_hasil` int(3) NOT NULL,
  `id_jenistender` int(3) NOT NULL,
  `id_peserta` int(3) NOT NULL,
  `hasil` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `hasil`
--

INSERT INTO `hasil` (`id_hasil`, `id_jenistender`, `id_peserta`, `hasil`) VALUES
(4, 3, 9, 1),
(5, 3, 10, 0.8875),
(6, 3, 11, 0.925),
(7, 3, 12, 0.992),
(8, 3, 13, 1),
(9, 3, 15, 1),
(10, 14, 9, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_tender`
--

CREATE TABLE `jenis_tender` (
  `id_jenistender` int(3) NOT NULL,
  `namaTender` varchar(100) NOT NULL,
  `kode_rup` varchar(30) NOT NULL,
  `satuan_kerja` varchar(50) NOT NULL,
  `jenis_pengadaan` varchar(50) NOT NULL,
  `nilai_hps` varchar(50) NOT NULL,
  `tahun_pembuatan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_tender`
--

INSERT INTO `jenis_tender` (`id_jenistender`, `namaTender`, `kode_rup`, `satuan_kerja`, `jenis_pengadaan`, `nilai_hps`, `tahun_pembuatan`) VALUES
(3, 'Belanja Natura', '38006186', 'DINAS KELAUTAN DAN PERIKANAN PROVINSI RIAU', 'Pengadaan Barang', 'Rp. 878.279.500,00', '2022'),
(14, 'Pengadaan Kapal Perikanan', '38014674', 'DINAS KELAUTAN DAN PERIKANAN PROVINSI RIAU', 'Pengadaan Barang', 'Rp. 2.898.709.500,00', '2023'),
(18, 'Belanja ATK ', '1919191919', 'DINAS KETENAGAKERJAAN', 'Pengadaan Barang', 'Rp. 300.000.000', '2021'),
(19, 'Belanja Askes', '23232323', 'RSUD ARIFIN AHMAD', 'Pengadaan Barang', 'Rp. 1.000.000.000', '2022');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` int(3) NOT NULL,
  `namaKriteria` varchar(50) NOT NULL,
  `sifat` enum('Benefit','Cost') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `namaKriteria`, `sifat`) VALUES
(13, 'Memiliki SDM Tenaga Ahli', 'Benefit'),
(14, 'Memiliki pengalaman pekerjaan', 'Benefit'),
(15, 'Memiliki Kemampuan Menyediakan Peralatan', 'Benefit'),
(16, 'Layanan Purna Jual', 'Benefit'),
(17, 'Perbandingan Penawaran', 'Cost');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai_kriteria`
--

CREATE TABLE `nilai_kriteria` (
  `id_nilaikriteria` int(3) NOT NULL,
  `id_kriteria` int(3) NOT NULL,
  `nilai` float NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `nilai_kriteria`
--

INSERT INTO `nilai_kriteria` (`id_nilaikriteria`, `id_kriteria`, `nilai`, `keterangan`) VALUES
(30, 13, 1, 'Sangat memenuhi'),
(31, 13, 0.8, 'Memenuhi'),
(32, 13, 0.6, 'Cukup Memenuh'),
(33, 13, 0.4, 'Kurang Memenuhi'),
(35, 14, 1, 'Sangat memenuhi'),
(36, 14, 0.8, 'Memenuh'),
(37, 14, 0.6, 'Cukup Memenuh'),
(39, 15, 1, 'Sangat memenuhi'),
(40, 15, 0.8, 'Memenuh'),
(41, 15, 0.6, 'Cukup Memenuh'),
(42, 15, 0.4, 'Kurang Memenuhi'),
(44, 16, 1, 'Sangat memenuhi'),
(45, 16, 0.8, 'Memenuh'),
(46, 16, 0.6, 'Cukup Memenuh'),
(47, 16, 0.4, 'Kurang Memenuh'),
(55, 17, 0.96, '0.96'),
(57, 17, 0.98, '0.98'),
(59, 17, 0.99, '0.99'),
(61, 17, 0.97, '0.97'),
(63, 17, 0.95, '0.95'),
(64, 17, 0.94, '0.94'),
(65, 17, 0.93, '0.93'),
(66, 17, 0.92, '0.92'),
(67, 17, 0.91, '0.91'),
(68, 17, 0.9, '0.9'),
(69, 17, 0.89, '0.89'),
(70, 13, 0.2, 'Sangat Kurang Memenuhi'),
(71, 14, 0.2, 'Sangat Kurang Memenuhi'),
(72, 14, 0.4, 'Kurang Memenuhi'),
(73, 15, 0.2, 'Sangat Kurang Memenuhi'),
(74, 16, 0.2, 'Sangat Kurang Memenuhi'),
(75, 17, 0.88, '0.88'),
(76, 17, 0.87, '0.87'),
(77, 17, 0.86, '0.86'),
(78, 17, 0.85, '0.85');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai_peserta`
--

CREATE TABLE `nilai_peserta` (
  `id_nilaipeserta` int(3) NOT NULL,
  `id_peserta` int(3) NOT NULL,
  `id_jenistender` int(3) NOT NULL,
  `id_kriteria` int(3) NOT NULL,
  `id_nilaikriteria` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `nilai_peserta`
--

INSERT INTO `nilai_peserta` (`id_nilaipeserta`, `id_peserta`, `id_jenistender`, `id_kriteria`, `id_nilaikriteria`) VALUES
(52, 9, 3, 13, 30),
(53, 9, 3, 14, 35),
(54, 9, 3, 15, 39),
(55, 9, 3, 16, 44),
(56, 9, 3, 17, 55),
(57, 10, 3, 13, 32),
(58, 10, 3, 14, 36),
(59, 10, 3, 15, 39),
(60, 10, 3, 16, 44),
(61, 10, 3, 17, 55),
(62, 11, 3, 13, 30),
(63, 11, 3, 14, 35),
(64, 11, 3, 15, 41),
(65, 11, 3, 16, 44),
(66, 11, 3, 17, 55),
(72, 12, 3, 13, 30),
(73, 12, 3, 14, 35),
(74, 12, 3, 15, 39),
(75, 12, 3, 16, 44),
(76, 12, 3, 17, 57),
(77, 13, 3, 13, 30),
(78, 13, 3, 14, 35),
(79, 13, 3, 15, 39),
(80, 13, 3, 16, 44),
(81, 13, 3, 17, 55),
(82, 15, 3, 13, 30),
(83, 15, 3, 14, 35),
(84, 15, 3, 15, 39),
(85, 15, 3, 16, 44),
(86, 15, 3, 17, 55),
(87, 9, 14, 13, 30),
(88, 9, 14, 14, 35),
(89, 9, 14, 15, 39),
(90, 9, 14, 16, 44),
(91, 9, 14, 17, 55);

-- --------------------------------------------------------

--
-- Struktur dari tabel `peserta`
--

CREATE TABLE `peserta` (
  `id_peserta` int(3) NOT NULL,
  `namaPeserta` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `peserta`
--

INSERT INTO `peserta` (`id_peserta`, `namaPeserta`) VALUES
(9, 'PT. Indah Lestari'),
(10, 'PT. BENGKALIS POWER CONSTRUCTI'),
(11, 'CV ANUGERAH SUMBER SARI'),
(12, 'cv riau muda prima'),
(13, 'Tirta Sakti Permai'),
(14, 'PT. MAJU USAHA MANDIRI IND'),
(15, 'CV. PUTRA BHAKTI MANDIRI'),
(18, 'CV MINA ANUGRAH');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pilih_kriteria`
--

CREATE TABLE `pilih_kriteria` (
  `id_pilihkriteria` int(3) NOT NULL,
  `id_jenistender` int(3) NOT NULL,
  `id_kriteria` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pilih_kriteria`
--

INSERT INTO `pilih_kriteria` (`id_pilihkriteria`, `id_jenistender`, `id_kriteria`) VALUES
(1, 18, 13),
(2, 14, 13),
(3, 18, 14),
(4, 18, 15),
(5, 3, 15);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` enum('Admin','Super') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`, `level`) VALUES
(18, 'Andi', 'andi', '$2y$10$5cRB73t3IQup8Wo9R4tOZ.JN03x61VWUMtXlyhUNzzJpJFIjEkdo.', 'Admin'),
(20, 'Mira', 'mira', '$2y$10$/g8ZiRJOc6/t2RZ8yOTuVu9gFb2Ac5IOp5s3UqSsHbV2ASjvKhJSu', 'Super'),
(23, 'Pokja', 'pokja', '$2y$10$WPgR3Kwe/j//MpAVFmBEieRFzZWvPVqp4sU8iqwK5Kt1eMypxH95C', 'Admin'),
(24, 'Haris Wirya', 'callmewirya', '$2y$10$n5YqnJz3kFndljdo.pWPUe.Mse06e9i1ozCg2NHpdQMF4CdV2Nqhe', 'Admin'),
(25, 'Yosai', 'yosai', '$2y$10$d468554LHwhAxKGwcI3Pb.OnXrj37WN1MYDeEhu11Lf50iMGjuBm2', 'Admin'),
(27, 'Usai', 'usai', '$2y$10$YVoSF4JdbgEHSt7OLbPHE.WmodBocAlhQ7r9HluEf9H0nT3/zpOde', 'Admin'),
(28, 'admin', 'admin', '$2y$10$Qrv/z9L1S6XvrTqK0ikJZ.vONwidgktPLpN7vUk6RPHOjfUQCGKgy', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bobot_kriteria`
--
ALTER TABLE `bobot_kriteria`
  ADD PRIMARY KEY (`id_bobotkriteria`),
  ADD KEY `id_jenisbarang` (`id_jenistender`),
  ADD KEY `id_kriteria` (`id_kriteria`);

--
-- Indeks untuk tabel `hasil`
--
ALTER TABLE `hasil`
  ADD PRIMARY KEY (`id_hasil`),
  ADD KEY `id_jenisbarang` (`id_jenistender`),
  ADD KEY `id_supplier` (`id_peserta`);

--
-- Indeks untuk tabel `jenis_tender`
--
ALTER TABLE `jenis_tender`
  ADD PRIMARY KEY (`id_jenistender`);

--
-- Indeks untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indeks untuk tabel `nilai_kriteria`
--
ALTER TABLE `nilai_kriteria`
  ADD PRIMARY KEY (`id_nilaikriteria`),
  ADD KEY `id_kriteria` (`id_kriteria`);

--
-- Indeks untuk tabel `nilai_peserta`
--
ALTER TABLE `nilai_peserta`
  ADD PRIMARY KEY (`id_nilaipeserta`),
  ADD KEY `id_supplier` (`id_peserta`),
  ADD KEY `id_jenisbarang` (`id_jenistender`),
  ADD KEY `id_kriteria` (`id_kriteria`),
  ADD KEY `id_nilaikriteria` (`id_nilaikriteria`);

--
-- Indeks untuk tabel `peserta`
--
ALTER TABLE `peserta`
  ADD PRIMARY KEY (`id_peserta`);

--
-- Indeks untuk tabel `pilih_kriteria`
--
ALTER TABLE `pilih_kriteria`
  ADD PRIMARY KEY (`id_pilihkriteria`),
  ADD KEY `id_jenistender` (`id_jenistender`),
  ADD KEY `id_kriteria` (`id_kriteria`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bobot_kriteria`
--
ALTER TABLE `bobot_kriteria`
  MODIFY `id_bobotkriteria` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT untuk tabel `hasil`
--
ALTER TABLE `hasil`
  MODIFY `id_hasil` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `jenis_tender`
--
ALTER TABLE `jenis_tender`
  MODIFY `id_jenistender` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `nilai_kriteria`
--
ALTER TABLE `nilai_kriteria`
  MODIFY `id_nilaikriteria` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT untuk tabel `nilai_peserta`
--
ALTER TABLE `nilai_peserta`
  MODIFY `id_nilaipeserta` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT untuk tabel `peserta`
--
ALTER TABLE `peserta`
  MODIFY `id_peserta` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `pilih_kriteria`
--
ALTER TABLE `pilih_kriteria`
  MODIFY `id_pilihkriteria` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `bobot_kriteria`
--
ALTER TABLE `bobot_kriteria`
  ADD CONSTRAINT `bobot_kriteria_ibfk_1` FOREIGN KEY (`id_jenistender`) REFERENCES `jenis_tender` (`id_jenistender`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bobot_kriteria_ibfk_2` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`id_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `hasil`
--
ALTER TABLE `hasil`
  ADD CONSTRAINT `hasil_ibfk_1` FOREIGN KEY (`id_jenistender`) REFERENCES `jenis_tender` (`id_jenistender`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hasil_ibfk_2` FOREIGN KEY (`id_peserta`) REFERENCES `peserta` (`id_peserta`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `nilai_kriteria`
--
ALTER TABLE `nilai_kriteria`
  ADD CONSTRAINT `nilai_kriteria_ibfk_1` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`id_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `nilai_peserta`
--
ALTER TABLE `nilai_peserta`
  ADD CONSTRAINT `nilai_peserta_ibfk_1` FOREIGN KEY (`id_jenistender`) REFERENCES `jenis_tender` (`id_jenistender`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nilai_peserta_ibfk_2` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`id_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nilai_peserta_ibfk_3` FOREIGN KEY (`id_peserta`) REFERENCES `peserta` (`id_peserta`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nilai_peserta_ibfk_4` FOREIGN KEY (`id_nilaikriteria`) REFERENCES `nilai_kriteria` (`id_nilaikriteria`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pilih_kriteria`
--
ALTER TABLE `pilih_kriteria`
  ADD CONSTRAINT `pilih_kriteria_ibfk_1` FOREIGN KEY (`id_jenistender`) REFERENCES `jenis_tender` (`id_jenistender`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pilih_kriteria_ibfk_2` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`id_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
