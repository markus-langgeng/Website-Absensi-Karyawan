-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Jan 2022 pada 17.59
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `absensi_pegawai`
--
CREATE DATABASE IF NOT EXISTS `absensi_pegawai` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `absensi_pegawai`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `absensi`
--

CREATE TABLE `absensi` (
  `id` int(11) NOT NULL,
  `nip` varchar(12) NOT NULL,
  `tgl` date DEFAULT NULL,
  `status` enum('H','I','S') DEFAULT NULL,
  `waktu` time DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `absensi`
--

INSERT INTO `absensi` (`id`, `nip`, `tgl`, `status`, `waktu`, `foto`) VALUES
(1, 'P0', '2021-11-12', 'H', '10:11:06', NULL),
(2, 'P0', '2021-11-13', 'S', '10:12:36', '6191d0246403e.jpeg'),
(3, 'P1', '2021-11-14', 'I', '10:14:24', '6191d0906fa36.jpeg'),
(5, 'P1', '2021-11-15', 'H', '18:34:35', NULL),
(6, 'P1', '2021-11-15', 'I', '19:01:19', '61924c0fb2ddd.jpg'),
(7, 'P2', '2021-11-15', 'H', '19:57:22', NULL),
(9, 'P3', '2021-11-16', 'H', '08:24:36', NULL),
(10, 'P0', '2021-11-17', 'H', '08:49:19', NULL),
(33, 'P1', '2021-11-17', 'H', '11:22:48', NULL),
(34, 'P1', '2021-11-17', 'H', '11:29:01', NULL),
(35, 'P1', '2021-12-03', 'H', '07:32:39', NULL),
(36, 'P1', '2021-12-03', 'I', '07:33:31', '61a965dbd8c2d.png'),
(37, 'P5', '2021-12-23', 'H', '19:43:25', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `nip` varchar(12) NOT NULL,
  `nama_lengkap` varchar(30) DEFAULT NULL,
  `jK` enum('L','P') DEFAULT NULL,
  `alamat` varchar(40) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `kota` varchar(15) DEFAULT NULL,
  `tgl_gabung` date DEFAULT NULL,
  `no_telp` varchar(15) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `jabatan` varchar(20) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`nip`, `nama_lengkap`, `jK`, `alamat`, `tgl_lahir`, `kota`, `tgl_gabung`, `no_telp`, `email`, `jabatan`, `foto`, `username`, `password`, `level`) VALUES
('P0', 'admin', 'L', 'Jl. Merpati', '1997-11-04', 'Malang', '2019-07-10', '085763424683', 'example@gmail.com', 'admin', '6187b5057e538.jpg', 'admin', 'd65c81cf756151229c67d150eac28fd6', 'admin'),
('P1', 'Burton Boyer', 'L', '135-9348 Facilisi. Avenue', '2000-10-08', 'Gagliano del Ca', '2021-04-11', '(805) 876-2764\"', 'scelerisque.neque@fringilla.co.uk', 'pegawai', '6183c8320a980.jpg', 'user1', '205a7824c99229de38993224c0be4dc1', 'user'),
('P2', 'Harding Anthony', 'L', '5795 Cras Ave', '2000-09-11', 'Chepén', '2021-09-23', '(432) 753-0006', 'vestibulum.massa@orciut.co.uk', 'pegawai', '6183ceb3b0a9c.jpg', 'user2', '2fbcb26fea1aa0abe8d3ec135b105241', 'user'),
('P3', 'Eleanor Meyers', 'P', '677-3499 Fermentum Avenue', '2001-01-07', 'Iowa City', '2021-02-24', '1-663-373-0341', 'tortor.integer@nectempusmauris.org', 'pegawai', '6183bdb4110fb.jpg', 'user3', '109d05b49d1204055ccfd74c408cc7c0', 'user'),
('P4', 'Silas Norris', 'P', '775-9737 Dapibus Avenue', '2000-05-04', 'Curicó', '2021-09-29', '(562) 650-1992', 'euismod.enim.etiam@habitant.edu', 'pegawai', '6183c30348b73.jpg', 'user4', 'b561c4188dfdc4bea917c957962a66cd', 'user'),
('P5', 'Budi ', 'L', 'Jl. Apel No. 05', '1998-11-14', 'Malang', '2020-12-07', '083224382743', 'budi@gmail.com', 'manager', '61c4708e30379.jpg', 'budi', '7ad3f53b50530e1f7ba9b1aa3d319a8d', 'user');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_info`
--

CREATE TABLE `tabel_info` (
  `nm_perusahaan` varchar(50) NOT NULL,
  `logo1` varchar(50) NOT NULL,
  `logo2` varchar(50) NOT NULL,
  `gbr_gedung` varchar(50) NOT NULL,
  `visi` text NOT NULL,
  `misi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tabel_info`
--

INSERT INTO `tabel_info` (`nm_perusahaan`, `logo1`, `logo2`, `gbr_gedung`, `visi`, `misi`) VALUES
('Lokal Mediatama', 'absensi_karyawan2.png', 'absensi_karyawan.png', 'buildings.jpg', ' &lt;p class=&quot;fs-5 text-center&quot;&gt;&quot;Menjadi acuan dalam usaha meningkatkan kebebasan publik untuk berpikir dan berpendapat serta membangun peradaban yang menghargai kecerdasan dan perbedaan.&quot;\r\n&lt;/p&gt;                                           ', ' &lt;ol class=&quot;fs-5&quot;&gt;\r\n\r\n&lt;li&gt;Menghasilkan produk multimedia yang independen dan bebas dari segala tekanan dengan menampung dan menyalurkan secara adil suara yang berbeda-beda.&lt;/li&gt;&lt;li&gt;Menghasilkan produk multimedia bermutu tinggi dan berpegang pada kode etik.&lt;/li&gt;\r\n&lt;li&gt;Menjadi tempat kerja yang sehat dan menyejahterakan serta mencerminkan keragaman Indonesia.&lt;/li&gt;\r\n&lt;li&gt;Memiliki proses kerja yang menghargai dan memberi nilai tambah kepada semua pemangku kepentingan.&lt;/li&gt;\r\n&lt;li&gt;Menjadi lahan kegiatan yang memperkaya khazanah artistik, intelektual, dan dunia bisnis melalui pengingkatan ide-ide baru, bahasa, dan tampilan visual yang baik.&lt;/li&gt;&lt;li&gt;Menjadi pemimpin pasar dalam bisnis multimedia dan pendukungnya.&lt;/li&gt;\r\n\r\n&lt;/ol&gt;                                           ');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nip` (`nip`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`nip`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `absensi`
--
ALTER TABLE `absensi`
  ADD CONSTRAINT `absensi_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `pegawai` (`nip`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
