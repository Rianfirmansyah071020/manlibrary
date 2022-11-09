-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql204.epizy.com
-- Generation Time: Jul 31, 2022 at 01:02 PM
-- Server version: 10.3.27-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epiz_32068168_manlibrary`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `bidang` varchar(100) NOT NULL,
  `jekel` enum('pria','wanita') NOT NULL,
  `alamat` longtext NOT NULL DEFAULT 'kosong',
  `nohp` varchar(14) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `tgl_buat` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama`, `bidang`, `jekel`, `alamat`, `nohp`, `gambar`, `tgl_buat`) VALUES
('AD006', 'Trisna', '123', 'Trisna, S.Pd', 'kepala perpustakaan', 'wanita', 'Lubuk Alung', '08223445566', 'trisna.jpg', '2022-06-12 02:32:12');

-- --------------------------------------------------------

--
-- Table structure for table `buku_induk`
--

CREATE TABLE `buku_induk` (
  `id_buku` varchar(30) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `judul` varchar(100) NOT NULL,
  `nourut` varchar(30) NOT NULL,
  `pengarang` varchar(100) NOT NULL,
  `penerbit` varchar(100) NOT NULL,
  `th_terbit` year(4) NOT NULL,
  `bahasa` varchar(100) NOT NULL,
  `jumlah` bigint(20) NOT NULL,
  `sumber` varchar(100) NOT NULL,
  `harga` bigint(20) NOT NULL,
  `keterangan` text NOT NULL,
  `gambar` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buku_induk`
--

INSERT INTO `buku_induk` (`id_buku`, `tgl_masuk`, `judul`, `nourut`, `pengarang`, `penerbit`, `th_terbit`, `bahasa`, `jumlah`, `sumber`, `harga`, `keterangan`, `gambar`) VALUES
('BI000002', '2019-02-03', 'Kimia', '0001', '-', '-', 2017, 'BAHASA INDONESIA', 50, '-', 150000, 'masih ada di perpustakaan', 'IMG_20220715_103526.jpg'),
('BI000003', '2018-01-09', 'Neraka Dunia', '0002', '-', '-', 2016, 'BAHASA INDONESIA', 2, '-', 45000, 'masih ada di perpustakaan', 'IMG_20220715_103647.jpg'),
('BI000004', '2016-02-03', 'Azab kubur yang ternoda', '0003', '-', '-', 2016, 'BAHASA INDONESIA', 2, '-', 45000, 'masih ada di perpustakaan', 'IMG_20220715_103847.jpg'),
('BI000005', '2019-05-15', 'Kimia berbasis eksperimen', '0004', '-', '-', 2019, 'BAHASA INDONESIA', 45, '-', 250000, 'buku masih ada di perpustakaan', 'IMG_20220715_104132.jpg'),
('BI000006', '2019-06-12', 'Menjelajah dunia biologi', '0005', '-', '-', 2019, 'BAHASA INDONESIA', 45, '-', 200000, 'buku masih ada di perpustakaan', 'IMG_20220715_104149.jpg'),
('BI000007', '2019-02-20', 'Bahasa indonesia kebanggaan bangsaku', '-', '-', '-', 2018, 'BAHASA INDONESIA', 40, '-', 200000, 'buku masih ada di perpustakaan', 'IMG_20220715_104120.jpg'),
('BI000008', '2020-01-02', 'Perspektif matematika', '0006', '-', '-', 2020, 'BAHASA INDONESIA', 50, '-', 250000, 'buku masih ada di perpustakaan', 'IMG_20220715_104104.jpg'),
('BI000009', '2017-03-13', 'Langkahkan kakimu', '0008', '-', '-', 2017, 'BAHASA INDONESIA', 2, '-', 35000, 'buku masih ada di perpustakaan', 'IMG_20220715_103957.jpg'),
('BI000010', '2018-05-20', 'Rencana besar', '-', '-', '-', 2018, 'BAHASA INDONESIA', 2, '-', 45000, 'buku masih ada di perpustakaan', 'IMG_20220715_103809.jpg'),
('BI000011', '2016-01-01', 'alquran hadits', '00010', '-', '-', 2016, 'BAHASA INDONESIA', 45, '-', 260000, 'buku masih ada di perpustakaan', 'IMG_20220715_103437.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `history_login`
--

CREATE TABLE `history_login` (
  `id_login` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `level` varchar(30) NOT NULL,
  `tgl_login` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `history_login`
--

INSERT INTO `history_login` (`id_login`, `username`, `level`, `tgl_login`) VALUES
(5, 'admin', 'admin', '2022-06-27'),
(6, 'rian', 'siswa', NULL),
(7, 'trisna', 'pegawai', NULL),
(8, 'rian', 'siswa', '2022-06-27'),
(9, 'trisna', 'pegawai', '2022-06-27'),
(10, 'rian', 'admin', '2022-06-27'),
(11, 'rian', 'siswa', '2022-06-27'),
(12, 'rian', 'admin', '2022-06-27'),
(13, 'rian', 'admin', '2022-06-30'),
(14, 'rian', 'admin', '2022-07-01'),
(15, 'admin', 'admin', '2022-07-05'),
(16, 'admin', 'admin', '2022-07-05'),
(17, 'Admin', 'admin', '2022-07-05'),
(18, 'admin', 'admin', '2022-07-05'),
(19, 'admin', 'admin', '2022-07-05'),
(20, 'admin', 'admin', '2022-07-05'),
(21, 'admin', 'admin', '2022-07-06'),
(22, 'admin', 'admin', '2022-07-11'),
(23, 'admin', 'admin', '2022-07-14'),
(24, 'admin', 'admin', '2022-07-14'),
(25, 'admin', 'admin', '2022-07-14'),
(26, 'admin', 'admin', '2022-07-15'),
(27, 'trisna', 'pegawai', '2022-07-15'),
(28, 'admin', 'admin', '2022-07-16'),
(29, 'trisna', 'pegawai', '2022-07-16'),
(30, 'admin', 'admin', '2022-07-16'),
(31, 'trisna', 'admin', '2022-07-16'),
(32, 'trisna', 'admin', '2022-07-16'),
(33, 'vina', 'siswa', '2022-07-16'),
(34, 'trisna', 'pegawai', '2022-07-16'),
(35, 'trisna', 'admin', '2022-07-16'),
(36, 'trisna', 'admin', '2022-07-16'),
(37, 'Vina', 'siswa', '2022-07-18'),
(38, 'vina', 'siswa', '2022-07-18'),
(39, 'trisna', 'admin', '2022-07-18'),
(40, 'vina', 'siswa', '2022-07-18'),
(41, 'Vina', 'siswa', '2022-07-20'),
(42, 'trisna', 'admin', '2022-07-21'),
(43, 'trisna', 'admin', '2022-07-22'),
(44, 'trisna', 'admin', '2022-07-23'),
(45, 'trisna', 'admin', '2022-07-23'),
(46, 'vina', 'siswa', '2022-07-23'),
(47, 'trisna', 'admin', '2022-07-23'),
(48, 'vina', 'siswa', '2022-07-23'),
(49, 'trisna', 'admin', '2022-07-31'),
(50, 'vina', 'siswa', '2022-07-31'),
(51, 'trisna', 'admin', '2022-07-31'),
(52, 'vina', 'siswa', '2022-07-31'),
(53, 'trisna', 'admin', '2022-07-31'),
(54, 'vina', 'siswa', '2022-08-01'),
(55, 'trisna', 'pegawai', '2022-08-01');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` varchar(30) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `bidang` varchar(100) NOT NULL,
  `jekel` enum('pria','wanita') NOT NULL,
  `alamat` longtext NOT NULL DEFAULT 'kosong',
  `nohp` varchar(14) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `tgl_buat` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `username`, `password`, `nama`, `bidang`, `jekel`, `alamat`, `nohp`, `gambar`, `tgl_buat`) VALUES
('PG001', 'Amrizon', '123', 'Amrizon, S.Pd, M.PdI', 'matematika', 'pria', 'sungai sarik', '2147483647', '197001051996031001.jpg', '2022-05-12 05:42:49'),
('PG002', 'Sakirman', '123', 'Sakirman, S.Pd.M.Si', 'fisika', 'pria', 'padang', '2147483647', 'sakirman.jpg', '2022-05-12 05:53:20'),
('PG003', 'Murliati', '123', 'Dra. Murliati', 'kimia', 'wanita', 'sintoga', '2147483647', 'murliati.jpg', '2022-05-12 05:54:49'),
('PG004', 'Eridasmi', '123', 'Eridasmi, S.Pd', 'ppkn', 'pria', 'batang tapakis', '2147483647', 'eridasmi.jpg', '2022-05-12 05:56:32'),
('PG005', 'Bukhary Masnur', '123', 'Drs. Bukhary Masnur', 'fiqih', 'pria', 'padang', '2147483647', 'bukhary.jpg', '2022-05-12 05:58:19'),
('PG006', 'Cendrawati', '123', 'Dra. Cendrawati', 'ekonomi', 'wanita', 'aie tajun', '2147483647', 'chendra.jpg', '2022-05-12 06:00:03'),
('PG007', 'Isfa Aidawati', '123', 'Dra. Isfa Aidawati', 'kimia', 'wanita', 'padang', '2147483647', 'isfa.jpg', '2022-05-12 06:01:44'),
('PG008', 'Fitri Yani', '123', 'Dra. Fitri Yani', 'fisika', 'wanita', 'padang', '2147483647', 'fitri yani.jpg', '2022-05-12 06:09:40'),
('PG009', 'Ratna Dewi', '123', 'Ratna Dewi, S.Pd, M.Si', 'biologi', 'wanita', 'pauh kambar', '2147483647', 'de.jpg', '2022-05-12 06:12:00'),
('PG010', 'Asrita Yani', '123', 'Asrita Yani, M.P.Kim', 'kimia', 'wanita', 'padang', '2147483647', 'yani.jpg', '2022-05-12 06:13:24'),
('PG011', 'Riza Marlina', '123', 'Riza Marlina, M.Pd', 'bahasa inggris', 'wanita', 'batusangkar', '2147483647', 'riza.jpg', '2022-05-12 06:15:16'),
('PG012', 'Dewi Fitri Yanti', '123', 'Dewi Fitri Yanti, S.Pd', 'bahasa inggris', 'wanita', 'lubuk alung', '2147483647', 'dewi fitri.jpg', '2022-05-12 06:16:48'),
('PG013', 'Alman Fauzi', '123', 'Alman Fauzi, S.Ag', 'bahasa arab', 'pria', 'rimbo dadok', '2147483647', 'alman.jpg', '2022-05-12 06:18:29'),
('PG014', 'Nelhasrati', '123', 'Nelhasrati, S.Ag', 'bahasa arab', 'wanita', 'tanjung aur', '2147483647', 'nelhasrati.jpg', '2022-05-12 06:19:58'),
('PG015', 'Yanti Desmiza', '123', 'Yanti Desmiza ,S.Pd', 'sejarah indonesia', 'wanita', 'padang', '2147483647', 'yanti desmiza.jpg', '2022-05-12 06:21:29'),
('PG016', 'Trisna', '123', 'Trisna, S.Pd', 'ppkn', 'wanita', 'lubuk alung', '08223344332', 'trisna.jpg', '2022-07-31 18:07:50'),
('PG017', 'Agustiwal Yenti', '123', 'Agustiwal Yenti, S.Pd', 'ekonomi', 'wanita', 'rimbo panjang', '0812334455667', 'agustiwal.jpg', '2022-05-12 14:48:28'),
('PG018', 'Herlina Yunis', '123', 'Herlina Yunis, S.Pd', 'matematika', 'wanita', 'ringan-ringan', '2147483647', 'herlina.jpg', '2022-05-12 06:26:49'),
('PG019', 'Ali Nurdin', '123', 'Ali Nurdin, S.Ag , MA', 'sejarah kebudayaan islam', 'pria', 'pariaman', '2147483647', 'ali.jpg', '2022-05-12 06:27:54'),
('PG020', 'Rince Nurhatrini', '123', 'Rince Nurhatrini, SS', 'bahasa inggris', 'wanita', 'padang', '2147483647', 'rince.jpg', '2022-05-12 06:29:26'),
('PG021', 'Windiana Fitria', '123', 'Windiana Fitria, S.Si', 'matematika', 'wanita', 'kota pariaman', '2147483647', 'windiana.jpg', '2022-05-12 06:30:44'),
('PG022', 'Yurmawati', '123', 'Yurmawati, S.Pd', 'sejarah indonesia', 'wanita', 'Rimbo Karanggo Sintuk', '2147483647', 'yurmawati.jpg', '2022-05-12 06:38:32'),
('PG023', 'Muhammad Isnaini', '123', 'Muhammad Isnaini, S.PdI', 'akidah akhlak', 'pria', 'padang alai', '2147483647', 'isnaini.jpg', '2022-05-12 06:41:39'),
('PG024', 'Dewi Darmayanti', '123', 'Dewi Darmayanti, S.Pd', 'sejarah indonesia', 'wanita', 'padang', '2147483647', 'dewi darma.jpg', '2022-05-12 06:51:18'),
('PG025', 'Nurlela', '123', 'Nurlela, S.Ag', 'alquran hadist', 'wanita', 'padang', '2147483647', 'nurlela.jpg', '2022-05-12 06:56:44'),
('PG026', 'Marlis Marsetli', '123', 'Marlis Marsetli, M.Ag', 'alquran hadist', 'wanita', 'lubuk alung', '2147483647', 'marlis.jpg', '2022-05-12 06:57:44'),
('PG027', 'Rozali', '123', 'Rozali, M.Pd', 'matematika', 'pria', 'Toboh Siintuk Toboh Gadang', '2147483647', 'rozali.jpg', '2022-05-12 06:59:06'),
('PG028', 'Murniati', '123', 'Murniati, S.Pd', 'geografi', 'wanita', 'lubuk alung', '2147483647', 'murniati.jpg', '2022-05-12 07:01:09'),
('PG029', 'Riky Vorera', '123', 'Riky Vorera, S.Pd', 'penjas orkes', 'pria', 'baso agam', '2147483647', 'riky.jpg', '2022-05-12 07:02:31'),
('PG030', 'Fajrio,', '123', 'Fajrio, S.Pd', 'penjas orkes', 'pria', 'Perumnas Batang Tapakis', '2147483647', 'fajrio.jpg', '2022-05-12 07:14:54'),
('PG031', 'Yuli Hasnida', '123', 'Yuli Hasnida, S.Pd.I', 'sejarah kebudayaan islam', 'wanita', 'padang', '2147483647', 'yuli.jpg', '2022-05-12 07:18:38'),
('PG032', 'Husni Mulyawati', '123', 'Husni Mulyawati, S.S.I', 'sejarah kebudayaan islam', 'wanita', 'Perumnas Batang Tapakis', '2147483647', 'husni.jpg', '2022-05-12 07:20:17'),
('PG033', 'Risa Rahmi', '123', 'Risa Rahmi, S.Pd', 'matematika', 'wanita', 'Perumnas Batang Tapakis', '2147483647', 'risa.jpg', '2022-05-12 07:21:50'),
('PG034', 'Liza Soffiani', '123', 'Liza Soffiani, S.Pd', 'matematika', 'wanita', 'Perumnas Batang Tapakis', '2147483647', 'liza.jpg', '2022-05-12 07:25:46'),
('PG035', 'Novi Dlafitri', '123', 'Novi Dlafitri, S.Pd', 'sejarah indonesia', 'wanita', 'padang', '2147483647', 'novi.jpg', '2022-05-12 07:27:10'),
('PG036', 'Devitrah Halim', '123', 'Devitrah Halim, S.Pd', 'sejarah indonesia', 'pria', 'kota pariaman', '2147483647', 'devit.jpg', '2022-05-12 07:28:25'),
('PG037', 'Emi Wraneli', '123', 'Emi Wraneli, S.PdI', 'sejarah indonesia', 'wanita', 'Perumnas Batang Tapakis', '2147483647', 'emi.jpg', '2022-05-12 07:29:45'),
('PG038', 'Delvianti', '123', 'Delvianti, S.Pd', 'matematika', 'wanita', 'lubuk alung', '2147483647', 'delfianti.jpg', '2022-05-12 07:31:04'),
('PG039', 'Oktonofia', '123', 'Oktonofia, S.PdI', 'sejarah kebudayaan islam', 'pria', 'tanjung aur', '2147483647', 'okto.jpg', '2022-05-12 07:33:21'),
('PG040', 'Lispa Nelli', '123', 'Lispa Nelli, S.Pd', 'ppkn', 'wanita', 'Bukittinggi', '2147483647', 'lispa.jpg', '2022-05-12 07:34:29'),
('PG041', 'pegawai', '123', 'pegawai', 'sejarah kebudayaan islam', 'pria', 'lubuk alung', '08125433454321', 'blank-profile-picture-973460.png', '2022-05-28 10:08:22');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` varchar(30) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jurusan` varchar(100) NOT NULL,
  `kelas` enum('X','XI','XII') DEFAULT NULL,
  `jekel` enum('pria','wanita') NOT NULL,
  `alamat` longtext NOT NULL DEFAULT 'kosong',
  `nohp` varchar(14) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `tgl_buat` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `username`, `password`, `nama`, `jurusan`, `kelas`, `jekel`, `alamat`, `nohp`, `gambar`, `tgl_buat`) VALUES
('SW00007', 'andini', '123', 'Andini Cantika', 'IPA', 'X', 'wanita', 'lubuk alung', '31212131131213', 'blank-profile-picture-973460.png', '2022-07-15 19:10:58'),
('SW00008', 'Putri', '123', 'Putri Dwi Sari', 'IPA', 'XI', '', 'lubuk alung', '1213131344555', 'blank-profile-picture-973460.png', '2022-07-15 19:11:43'),
('SW00009', 'rido', '123', 'Muhammad rido', 'IPS', 'XI', 'pria', 'lubuk alung', '134555231212', 'blank-profile-picture-973460.png', '2022-07-15 19:12:52'),
('SW00010', 'Rizki', '123', 'Muhammad rizki', 'IPK', 'X', 'pria', 'lubuk alung', '091281281281', 'blank-profile-picture-973460.png', '2022-07-15 19:13:40'),
('SW00011', 'Deni', '123', 'Deni Yusmani', 'IPS', 'X', 'pria', 'lubuk alung', '0901911282', 'blank-profile-picture-973460.png', '2022-07-15 19:14:37'),
('SW00012', 'vina', '123', 'Vina putri amanda', 'IPA', 'XII', 'pria', 'lubuk alung', '0877665544', 'blank-profile-picture-973460.png', '2022-07-15 19:15:42'),
('SW00013', 'Sandri', '123', 'Sandriana', 'IPS', 'XI', 'wanita', 'lubuk alung', '08638238237', 'blank-profile-picture-973460.png', '2022-07-15 19:16:47');

-- --------------------------------------------------------

--
-- Table structure for table `stok_buku_koleksi`
--

CREATE TABLE `stok_buku_koleksi` (
  `id_buku_koleksi` varchar(20) NOT NULL,
  `no_rak` varchar(50) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `pengarang` varchar(100) NOT NULL,
  `penerbit` varchar(100) DEFAULT 'Tidak Ada',
  `jenis_koleksi` enum('TEXT','FIKSI','NON FIKSI') NOT NULL,
  `hal` int(11) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `jumlah` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stok_buku_koleksi`
--

INSERT INTO `stok_buku_koleksi` (`id_buku_koleksi`, `no_rak`, `judul`, `pengarang`, `penerbit`, `jenis_koleksi`, `hal`, `gambar`, `jumlah`) VALUES
('BK000001', 'K002', 'Langkahkan kakimu', '-', '-', 'TEXT', 70, 'IMG_20220715_103957.jpg', 1),
('BK000002', 'F002', 'Ayah pemilik cinta yang terlupakan', '-', '-', 'TEXT', 50, 'IMG_20220715_103618.jpg', 1),
('BK000003', 'F002', 'Neraka dunia', '-', '-', 'TEXT', 30, 'IMG_20220715_103647.jpg', 1),
('BK000004', 'F002', 'Si Anak Cahaya', '-', '-', 'FIKSI', 35, 'IMG_20220715_103730.jpg', 2),
('BK000005', 'F002', 'Rencana Besar', '-', '-', 'TEXT', 45, 'IMG_20220715_103809.jpg', 1),
('BK000006', 'F002', 'Ziarah Kubur Yang Ternoda', '-', '-', 'TEXT', 35, 'IMG_20220715_103847.jpg', 1),
('BK000007', 'F002', 'The Why To Win', '-', '-', 'TEXT', 45, 'IMG_20220715_103902.jpg', 1),
('BK000008', 'F002', 'Sengsara Membawa Nikmat', '-', '-', 'TEXT', 50, 'IMG_20220715_104004.jpg', 1),
('BK000009', 'F002', 'Marmut Merah Jambu', 'Raditya Dika', '-', 'TEXT', 50, 'IMG_20220715_103751.jpg', 1),
('BK000010', 'F002', 'Success Matery', '-', '-', 'TEXT', 50, 'IMG_20220715_103705.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `stok_buku_umum`
--

CREATE TABLE `stok_buku_umum` (
  `id_buku_umum` varchar(20) NOT NULL,
  `no_klasifikasi` int(12) NOT NULL,
  `no_rak` varchar(50) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `kelas` enum('X','XI','XII') NOT NULL,
  `jurusan` enum('IPA','IPS','IPK') NOT NULL,
  `tingkatan` varchar(100) DEFAULT 'SMA/MA',
  `penulis` varchar(200) NOT NULL,
  `lokasi_penerbit` varchar(100) NOT NULL,
  `penerbit` varchar(200) NOT NULL,
  `tahun_terbit` year(4) NOT NULL,
  `bibliografi` int(10) NOT NULL,
  `isbn` varchar(50) NOT NULL,
  `indeks` varchar(100) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `jumlah` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stok_buku_umum`
--

INSERT INTO `stok_buku_umum` (`id_buku_umum`, `no_klasifikasi`, `no_rak`, `judul`, `kelas`, `jurusan`, `tingkatan`, `penulis`, `lokasi_penerbit`, `penerbit`, `tahun_terbit`, `bibliografi`, `isbn`, `indeks`, `gambar`, `jumlah`) VALUES
('BU000001', 574, 'B001', 'Biologi', 'XII', 'IPA', 'SMA/MA', '-', '-', '-', 2019, 322, '321', '3212', 'IMG_20220715_104149.jpg', 10),
('BU000002', 429, 'A001', 'Sejarah Kebudayaan Islam', 'X', 'IPK', 'SMA/MA', '-', '-', '-', 2019, 1221, 'k213', '112', 'IMG_20220715_103459.jpg', 50),
('BU000003', 574, 'A001', 'Pendidikan kewarga negaraan', 'XI', 'IPA', 'SMA/MA', '-', '-', '-', 2018, 312, '121', '312', 'IMG_20220715_103556.jpg', 50),
('BU000004', 574, 'A001', 'Kimia', 'XI', 'IPA', 'SMA/MA', '-', '-', '-', 2017, 111, '111', '111', 'IMG_20220715_103526.jpg', 50),
('BU000005', 574, 'A002', 'Kimia', 'XII', 'IPA', 'SMA/MA', '-', '-', '-', 2017, 1111, '1111', '1111', 'IMG_20220715_104132.jpg', 49),
('BU000006', 574, 'B001', 'Biologi', 'XII', 'IPA', 'SMA/MA', '-', '-', '-', 2021, 1111, '1111', '1111', 'IMG_20220715_104149.jpg', 38),
('BU000007', 900, 'C001', 'Pendidikan pancasila dan kewarganegaraan', 'XI', 'IPS', 'SMA/MA', '-', '-', '-', 2019, 1111, '1111', '111', 'IMG_20220715_104146.jpg', 50),
('BU000008', 574, 'C002', 'Perspektif matematika', 'XI', 'IPA', 'SMA/MA', '-', '-', '-', 2019, 111, '111', '111', 'IMG_20220715_104052.jpg', 23),
('BU000009', 574, 'D001', 'Perspektif Matematika', 'XII', 'IPA', 'SMA/MA', '-', '-', '-', 2020, 1111, '1111', '1111', 'IMG_20220715_104104.jpg', 40),
('BU000010', 900, 'D002', 'Sejarah', 'XI', 'IPS', 'SMA/MA', '-', '-', '-', 2017, 111, '111', '111', 'IMG_20220715_104112.jpg', 45);

-- --------------------------------------------------------

--
-- Table structure for table `tb_buku_digital`
--

CREATE TABLE `tb_buku_digital` (
  `id_bd` varchar(20) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `kategori` enum('Pelajaran','Koleksi') NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `file` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_buku_digital`
--

INSERT INTO `tb_buku_digital` (`id_bd`, `judul`, `kategori`, `gambar`, `file`) VALUES
('BD000001', 'Langkahkan Kakimu', 'Koleksi', 'IMG_20220715_103957.jpg', 'BAB 1 Rian Firmansyah_181100030.pdf'),
('BD000002', 'Si anak cahaya', 'Koleksi', 'IMG_20220715_103730.jpg', 'BAB 1 Rian Firmansyah_181100030.pdf'),
('BD000003', 'Neraka Dunia', 'Koleksi', 'IMG_20220715_103647.jpg', 'BAB 1 Rian Firmansyah_181100030.pdf'),
('BD000004', 'Ayah pemilik cinta yang terlupakan', 'Koleksi', 'IMG_20220715_103618.jpg', 'BAB 1 Rian Firmansyah_181100030.pdf'),
('BD000005', 'Pendidikan pancasila dan kewarganegaraan', 'Pelajaran', 'IMG_20220715_103556.jpg', 'BAB 1 Rian Firmansyah_181100030.pdf'),
('BD000006', 'Rencana Besar', 'Koleksi', 'IMG_20220715_103809.jpg', 'BAB 1 Rian Firmansyah_181100030.pdf'),
('BD000007', 'Sejarah kebudayaan islam', 'Pelajaran', 'IMG_20220715_103459.jpg', 'BAB 1 Rian Firmansyah_181100030.pdf'),
('BD000008', 'Sejarah', 'Pelajaran', 'IMG_20220715_104112.jpg', 'BAB 1 Rian Firmansyah_181100030.pdf'),
('BD000009', 'Bahasa Indonesia kebanggaan bangsaku', 'Pelajaran', 'IMG_20220715_104120.jpg', 'BAB 1 Rian Firmansyah_181100030.pdf'),
('BD000010', 'Menjelajah dunia biologi', 'Pelajaran', 'IMG_20220715_104149.jpg', 'BAB 1 Rian Firmansyah_181100030.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pinjam_koleksi_pegawai`
--

CREATE TABLE `tb_pinjam_koleksi_pegawai` (
  `id_pkoleksi` varchar(20) NOT NULL,
  `id_buku_koleksi` varchar(20) NOT NULL,
  `id_pegawai` varchar(20) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `jumlah` bigint(20) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `status` enum('Diajukan','Disetujui') DEFAULT NULL,
  `pengembalian` varchar(100) NOT NULL DEFAULT 'Belum',
  `tgl_kembali` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pinjam_koleksi_pegawai`
--

INSERT INTO `tb_pinjam_koleksi_pegawai` (`id_pkoleksi`, `id_buku_koleksi`, `id_pegawai`, `judul`, `jumlah`, `tanggal`, `status`, `pengembalian`, `tgl_kembali`) VALUES
('PK00001', 'BK000002', 'PG016', 'Ayah pemilik cinta yang terlupakan', 1, '2022-07-16', 'Disetujui', 'Belum', '2022-07-23'),
('PK00002', 'BK000001', 'PG016', 'Langkahkan kakimu', 1, '2022-07-16', 'Disetujui', 'Belum', '2022-07-23');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pinjam_koleksi_siswa`
--

CREATE TABLE `tb_pinjam_koleksi_siswa` (
  `id_pkoleksi` varchar(20) NOT NULL,
  `id_buku_koleksi` varchar(20) NOT NULL,
  `id_siswa` varchar(20) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `jumlah` bigint(20) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `status` enum('Diajukan','Disetujui') DEFAULT NULL,
  `pengembalian` varchar(100) NOT NULL DEFAULT 'Belum',
  `tgl_kembali` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pinjam_koleksi_siswa`
--

INSERT INTO `tb_pinjam_koleksi_siswa` (`id_pkoleksi`, `id_buku_koleksi`, `id_siswa`, `judul`, `jumlah`, `tanggal`, `status`, `pengembalian`, `tgl_kembali`) VALUES
('PK00001', 'BK000001', 'SW00012', 'Langkahkan kakimu', 1, '2022-07-16', 'Disetujui', 'Belum', '2022-07-23'),
('PK00002', 'BK000003', 'SW00012', 'Neraka dunia', 1, '2022-07-16', 'Disetujui', 'Belum', '2022-07-23');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pinjam_umum_pegawai`
--

CREATE TABLE `tb_pinjam_umum_pegawai` (
  `id_pumum` varchar(20) NOT NULL,
  `id_buku_umum` varchar(20) NOT NULL,
  `id_pegawai` varchar(20) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `jumlah` bigint(20) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `status` enum('Diajukan','Disetujui') DEFAULT NULL,
  `pengembalian` varchar(100) DEFAULT 'Belum',
  `tgl_kembali` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pinjam_umum_pegawai`
--

INSERT INTO `tb_pinjam_umum_pegawai` (`id_pumum`, `id_buku_umum`, `id_pegawai`, `judul`, `jumlah`, `tanggal`, `status`, `pengembalian`, `tgl_kembali`) VALUES
('PU00001', 'BU000005', 'PG016', 'Kimia', 1, '2022-07-16', 'Disetujui', 'Belum', '2022-07-23'),
('PU00002', 'BU000006', 'PG016', 'Biologi', 1, '2022-07-16', 'Disetujui', 'Belum', '2022-07-23');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pinjam_umum_siswa`
--

CREATE TABLE `tb_pinjam_umum_siswa` (
  `id_pumum` varchar(20) NOT NULL,
  `id_buku_umum` varchar(20) NOT NULL,
  `id_siswa` varchar(20) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `jumlah` bigint(20) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `status` enum('Diajukan','Disetujui') DEFAULT NULL,
  `tgl_kembali` date NOT NULL,
  `pengembalian` varchar(100) DEFAULT 'Belum'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pinjam_umum_siswa`
--

INSERT INTO `tb_pinjam_umum_siswa` (`id_pumum`, `id_buku_umum`, `id_siswa`, `judul`, `jumlah`, `tanggal`, `status`, `tgl_kembali`, `pengembalian`) VALUES
('PU00001', 'BU000001', 'SW00012', 'Biologi', 1, '2022-07-16', 'Disetujui', '2022-07-23', 'Disetujui'),
('PU00002', 'BU000006', 'SW00012', 'Biologi', 1, '2022-07-16', 'Disetujui', '2022-07-23', 'Belum'),
('PU00003', 'BU000001', 'SW00012', 'Biologi', 2, '2022-07-23', 'Diajukan', '2022-07-30', 'Belum'),
('PU00004', 'BU000001', 'SW00012', 'Biologi', 50, '2022-07-31', 'Disetujui', '2022-08-07', 'Belum');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `buku_induk`
--
ALTER TABLE `buku_induk`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `history_login`
--
ALTER TABLE `history_login`
  ADD PRIMARY KEY (`id_login`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD UNIQUE KEY `username_unique` (`username`);

--
-- Indexes for table `stok_buku_koleksi`
--
ALTER TABLE `stok_buku_koleksi`
  ADD PRIMARY KEY (`id_buku_koleksi`);

--
-- Indexes for table `stok_buku_umum`
--
ALTER TABLE `stok_buku_umum`
  ADD PRIMARY KEY (`id_buku_umum`);

--
-- Indexes for table `tb_buku_digital`
--
ALTER TABLE `tb_buku_digital`
  ADD PRIMARY KEY (`id_bd`);

--
-- Indexes for table `tb_pinjam_koleksi_pegawai`
--
ALTER TABLE `tb_pinjam_koleksi_pegawai`
  ADD PRIMARY KEY (`id_pkoleksi`),
  ADD KEY `id_buku_koleksi` (`id_buku_koleksi`,`id_pegawai`),
  ADD KEY `id_pegawai` (`id_pegawai`);

--
-- Indexes for table `tb_pinjam_koleksi_siswa`
--
ALTER TABLE `tb_pinjam_koleksi_siswa`
  ADD PRIMARY KEY (`id_pkoleksi`),
  ADD KEY `id_buku_koleksi` (`id_buku_koleksi`,`id_siswa`),
  ADD KEY `id_siswa` (`id_siswa`);

--
-- Indexes for table `tb_pinjam_umum_pegawai`
--
ALTER TABLE `tb_pinjam_umum_pegawai`
  ADD PRIMARY KEY (`id_pumum`),
  ADD KEY `id_buku_umum` (`id_buku_umum`,`id_pegawai`),
  ADD KEY `id_pegawai` (`id_pegawai`);

--
-- Indexes for table `tb_pinjam_umum_siswa`
--
ALTER TABLE `tb_pinjam_umum_siswa`
  ADD PRIMARY KEY (`id_pumum`),
  ADD KEY `id_buku_umum` (`id_buku_umum`,`id_siswa`),
  ADD KEY `id_siswa` (`id_siswa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `history_login`
--
ALTER TABLE `history_login`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_pinjam_koleksi_pegawai`
--
ALTER TABLE `tb_pinjam_koleksi_pegawai`
  ADD CONSTRAINT `tb_pinjam_koleksi_pegawai_ibfk_1` FOREIGN KEY (`id_buku_koleksi`) REFERENCES `stok_buku_koleksi` (`id_buku_koleksi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_pinjam_koleksi_pegawai_ibfk_2` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_pinjam_koleksi_siswa`
--
ALTER TABLE `tb_pinjam_koleksi_siswa`
  ADD CONSTRAINT `tb_pinjam_koleksi_siswa_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_pinjam_koleksi_siswa_ibfk_2` FOREIGN KEY (`id_buku_koleksi`) REFERENCES `stok_buku_koleksi` (`id_buku_koleksi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_pinjam_umum_pegawai`
--
ALTER TABLE `tb_pinjam_umum_pegawai`
  ADD CONSTRAINT `tb_pinjam_umum_pegawai_ibfk_1` FOREIGN KEY (`id_buku_umum`) REFERENCES `stok_buku_umum` (`id_buku_umum`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_pinjam_umum_pegawai_ibfk_2` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_pinjam_umum_siswa`
--
ALTER TABLE `tb_pinjam_umum_siswa`
  ADD CONSTRAINT `tb_pinjam_umum_siswa_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_pinjam_umum_siswa_ibfk_2` FOREIGN KEY (`id_buku_umum`) REFERENCES `stok_buku_umum` (`id_buku_umum`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
