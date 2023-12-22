-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Des 2023 pada 08.26
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sispenduk`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_anggota`
--

CREATE TABLE `tb_anggota` (
  `id_anggota` int(11) NOT NULL,
  `id_kk` int(11) NOT NULL,
  `id_pend` int(11) NOT NULL,
  `hubungan` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tb_anggota`
--

INSERT INTO `tb_anggota` (`id_anggota`, `id_kk`, `id_pend`, `hubungan`) VALUES
(5, 2, 4, 'Anak'),
(6, 2, 1, 'Kepala Keluarga'),
(7, 2, 2, 'Istri'),
(8, 2, 3, 'Anak'),
(9, 3, 5, 'Kepala Keluarga'),
(10, 3, 6, 'Istri'),
(11, 3, 7, 'Anak'),
(12, 3, 9, 'Anak'),
(13, 3, 10, 'Menantu'),
(14, 4, 11, 'Kepala Keluarga'),
(15, 4, 12, 'Istri'),
(16, 4, 13, 'Anak'),
(17, 4, 14, 'Orang Tua'),
(20, 5, 15, 'Kepala Keluarga'),
(21, 5, 16, 'Istri'),
(22, 5, 17, 'Anak'),
(23, 5, 18, 'Anak'),
(24, 6, 19, 'Kepala Keluarga'),
(25, 6, 20, 'Istri'),
(26, 6, 21, 'Anak'),
(27, 6, 22, 'Anak'),
(28, 7, 23, 'Kepala Keluarga'),
(29, 7, 24, 'Istri'),
(30, 7, 25, 'Anak'),
(31, 7, 26, 'Anak'),
(32, 8, 27, 'Kepala Keluarga'),
(33, 8, 28, 'Istri'),
(34, 8, 29, 'Anak'),
(35, 8, 30, 'Anak'),
(36, 8, 31, 'Menantu'),
(37, 9, 32, 'Kepala Keluarga'),
(38, 9, 33, 'Istri'),
(39, 9, 34, 'Anak'),
(41, 9, 35, 'Anak');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_datang`
--

CREATE TABLE `tb_datang` (
  `id_datang` int(11) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `nama_datang` varchar(20) NOT NULL,
  `jekel` enum('LK','PR') NOT NULL,
  `tgl_datang` date NOT NULL,
  `pelapor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tb_datang`
--

INSERT INTO `tb_datang` (`id_datang`, `nik`, `nama_datang`, `jekel`, `tgl_datang`, `pelapor`) VALUES
(1, '352311100011111', 'Ahmad Hidayat', 'LK', '2023-11-27', 1),
(2, '352311100011112', 'Sabil Saputra', 'LK', '2023-12-13', 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kk`
--

CREATE TABLE `tb_kk` (
  `id_kk` int(11) NOT NULL,
  `no_kk` varchar(30) NOT NULL,
  `kepala` varchar(20) NOT NULL,
  `desa` varchar(20) NOT NULL,
  `rt` varchar(5) NOT NULL,
  `rw` varchar(5) NOT NULL,
  `kec` varchar(20) NOT NULL,
  `kab` varchar(20) NOT NULL,
  `prov` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tb_kk`
--

INSERT INTO `tb_kk` (`id_kk`, `no_kk`, `kepala`, `desa`, `rt`, `rw`, `kec`, `kab`, `prov`) VALUES
(2, '352311100012345', 'Agus Setiawan', 'Paserean', '05', '005', 'Labang', 'Bangkalan', 'Jawa Timur'),
(3, '352311100012346', 'Cahyo Wibowo', 'Buddan', '01', '003', 'Labang', 'Bangkalan', 'Jawa Timur'),
(4, '352311100012347', 'Arief Setiawan', 'Paserean', '10', '005', 'Labang', 'Bangkalan', 'Jawa Timur'),
(5, '352311100012348', 'Rudi Perdana', 'Paserean', '06', '002', 'Labang', 'Bangkalan', 'Jawa Timur'),
(6, '352311100012348', 'Aldi Ramadhan', 'Kampung Langgar', '11', '004', 'Labang', 'Bangkalan', 'Jawa Timur'),
(7, '352311100012349', 'Agus Santoso', 'Kejawan', '03', '005', 'Labang', 'Bangkalan', 'Jawa Timur'),
(8, '352311100012350', 'Joko Suryadi', 'Buddan', '07', '004', 'Labang', 'Bangkalan', 'Jawa Timur'),
(9, '352311100012351', 'Bayu Wijaya', 'Pongbaru', '02', '003', 'Labang', 'Bangkalan', 'Jawa Timur');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_lahir`
--

CREATE TABLE `tb_lahir` (
  `id_lahir` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `tgl_lh` date NOT NULL,
  `jekel` enum('LK','PR') NOT NULL,
  `id_kk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tb_lahir`
--

INSERT INTO `tb_lahir` (`id_lahir`, `nama`, `tgl_lh`, `jekel`, `id_kk`) VALUES
(1, 'Irfan Dwi Samudra', '2004-09-08', 'LK', 2),
(2, 'Muhammad Shafy Gunawan', '2005-02-23', 'LK', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_mendu`
--

CREATE TABLE `tb_mendu` (
  `id_mendu` int(11) NOT NULL,
  `id_pdd` int(11) NOT NULL,
  `tgl_mendu` date NOT NULL,
  `sebab` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tb_mendu`
--

INSERT INTO `tb_mendu` (`id_mendu`, `id_pdd`, `tgl_mendu`, `sebab`) VALUES
(1, 4, '2023-11-27', 'Serangan jantung'),
(2, 14, '2023-12-03', 'Kanker Kulit');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pdd`
--

CREATE TABLE `tb_pdd` (
  `id_pend` int(11) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `tempat_lh` varchar(15) NOT NULL,
  `tgl_lh` date NOT NULL,
  `jekel` enum('LK','PR') NOT NULL,
  `desa` varchar(15) NOT NULL,
  `rt` varchar(4) NOT NULL,
  `rw` varchar(4) NOT NULL,
  `agama` varchar(15) NOT NULL,
  `kawin` varchar(15) NOT NULL,
  `pekerjaan` varchar(30) NOT NULL,
  `status` enum('Ada','Meninggal','Pindah') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tb_pdd`
--

INSERT INTO `tb_pdd` (`id_pend`, `nik`, `nama`, `tempat_lh`, `tgl_lh`, `jekel`, `desa`, `rt`, `rw`, `agama`, `kawin`, `pekerjaan`, `status`) VALUES
(1, '123456789', 'Agus Setiawan', 'Bangkalan', '1990-05-15', 'LK', 'Paserean', '05', '005', 'Islam', 'Belum', 'Pegawai Swasta', 'Ada'),
(2, '987654321', 'Ratna Sari', 'Bangkalan', '1992-08-20', 'PR', 'Paserean', '03', '001', 'Kristen', 'Sudah', 'Wiraswasta', 'Ada'),
(3, '345678912', 'Budi Pratama', 'Bangkalan', '1985-03-10', 'LK', 'Buddan', '02', '004', 'Hindu', 'Belum', 'Pegawai Negeri Sipil', 'Ada'),
(4, '789123456', 'Siti Rahma', 'Bangkalan', '1995-11-22', 'PR', 'Morleke', '04', '002', 'Islam', 'Belum', 'Pegawai Negeri Sipil', 'Meninggal'),
(5, '456789123', 'Cahyo Wibowo', 'Bangkalan', '1988-07-01', 'LK', 'Buddan', '01', '003', 'Buddha', 'Sudah', 'Wiraswasta', 'Ada'),
(6, '1122334455', 'Linda Wijaya', 'Bangkalan', '1994-07-20', 'PR', 'Morleke', '07', '005', 'Islam', 'Belum', 'Wiraswasta', 'Ada'),
(7, '5566778899', 'Rudi Santoso', 'Bangkalan', '1989-04-10', 'LK', 'Morleke', '06', '003', 'Kristen', 'Sudah', 'Pegawai Negeri Sipil', 'Ada'),
(8, '9900112233', 'Sinta Kusuma', 'Bangkalan', '1993-11-15', 'PR', 'Kejawan', '08', '001', 'Buddha', 'Belum', 'Wiraswasta', 'Pindah'),
(9, '3344556677', 'Fikri Ramadhan', 'Bangkalan', '1998-02-28', 'LK', 'Kejawan', '05', '004', 'Islam', 'Belum', 'Mahasiswa', 'Ada'),
(10, '7788990011', 'Dina Fitriani', 'Bangkalan', '1996-09-01', 'PR', 'Pongbaru', '04', '002', 'Hindu', 'Sudah', 'Pegawai Swasta', 'Pindah'),
(11, '1122334466', 'Arief Setiawan', 'Bangkalan', '1993-02-12', 'LK', 'Paserean', '10', '005', 'Islam', 'Belum', 'Wiraswasta', 'Ada'),
(12, '5566778900', 'Dewi Anggraini', 'Bangkalan', '1990-09-25', 'PR', 'Kejawan', '09', '003', 'Hindu', 'Sudah', 'Pegawai Negeri Sipil', 'Ada'),
(13, '9900112244', 'Firman Prasetyo', 'Bangkalan', '1988-06-18', 'LK', 'Pongbaru', '08', '001', 'Kristen', 'Sudah', 'Pegawai Negeri Sipil', 'Ada'),
(14, '3344556688', 'Lina Wijaya', 'Bangkalan', '1995-12-30', 'PR', 'Kampung Langgar', '07', '004', 'Buddha', 'Belum', 'Mahasiswa', 'Meninggal'),
(15, '7788990022', 'Rudi Perdana', 'Bangkalan', '1997-04-05', 'LK', 'Paserean', '06', '002', 'Kristen', 'Belum', 'Pegawai Swasta', 'Ada'),
(16, '1122334499', 'Sari Wulandari', 'Bangkalan', '1992-10-08', 'PR', 'Buddan', '11', '005', 'Islam', 'Sudah', 'Pegawai Negeri Sipil', 'Ada'),
(17, '5566778911', 'Dodi Santoso', 'Bangkalan', '1987-07-21', 'LK', 'Pongbaru', '11', '003', 'Hindu', 'Sudah', 'Wiraswasta', 'Ada'),
(18, '9900112266', 'Rina Kusuma', 'Bangkalan', '1991-01-14', 'PR', 'Kampung Langgar', '11', '001', 'Buddha', 'Belum', 'Mahasiswa', 'Ada'),
(19, '3344556699', 'Aldi Ramadhan', 'Bangkalan', '1994-05-28', 'LK', 'Kampung Langgar', '11', '004', 'Islam', 'Belum', 'Wiraswasta', 'Ada'),
(20, '7788990033', 'Nina Fitriani', 'Bangkalan', '1989-11-03', 'PR', 'Buddan', '11', '002', 'Hindu', 'Sudah', 'Pegawai Swasta', 'Ada'),
(21, '891043287651', 'Bambang Susilo', 'Bangkalan', '1990-03-15', 'LK', 'Paserean', '01', '001', 'Islam', 'Sudah', 'Pegawai Negeri Sipil', 'Ada'),
(22, '567890123456', 'Rini Setiawan', 'Bangkalan', '1995-07-22', 'PR', 'Buddan', '02', '003', 'Kristen', 'Belum', 'Swasta', 'Ada'),
(23, '234567890123', 'Agus Santoso', 'Bangkalan', '1988-11-04', 'LK', 'Kejawan', '03', '005', 'Katolik', 'Cerai Mati', 'Wiraswasta', 'Ada'),
(24, '789012345678', 'Maya Putriani', 'Bangkalan', '1992-05-10', 'PR', 'Morleke', '04', '002', 'Hindu', 'Belum', 'Petani', 'Ada'),
(25, '123456789012', 'Irfan Pratama', 'Bangkalan', '1998-09-28', 'LK', 'Pongbaru', '05', '005', 'Buddha', 'Sudah', 'Guru', 'Ada'),
(26, '901234567890', 'Dewi Cahyani', 'Bangkalan', '1996-01-18', 'PR', 'Kampung Langgar', '06', '001', 'Islam', 'Belum', 'Dokter', 'Ada'),
(27, '345678901234', 'Joko Suryadi', 'Bangkalan', '1989-08-12', 'LK', 'Buddan', '07', '004', 'Kristen', 'Cerai Hidup', 'Mahasiswa', 'Ada'),
(28, '678901234567', 'Siti Rahmawati', 'Bangkalan', '1991-12-30', 'PR', 'Paserean', '08', '002', 'Katolik', 'Belum', 'Pelajar', 'Ada'),
(29, '456789012345', 'Rudi Hermawan', 'Bangkalan', '1999-04-06', 'LK', 'Morleke', '09', '003', 'Hindu', 'Sudah', 'Pensiunan', 'Ada'),
(30, '210987654321', 'Dian Nugroho', 'Bangkalan', '1994-06-25', 'PR', 'Kejawan', '10', '005', 'Buddha', 'Belum', 'Pegawai Swasta', 'Ada'),
(31, '876543210987', 'Rina Kusuma', 'Bangkalan', '1987-10-08', 'PR', 'Kampung Langgar', '01', '002', 'Islam', 'Cerai Mati', 'Pegawai Negeri Sipil', 'Ada'),
(32, '543210987654', 'Bayu Wijaya', 'Bangkalan', '1997-02-14', 'LK', 'Pongbaru', '02', '003', 'Kristen', 'Belum', 'Swasta', 'Ada'),
(33, '109876543210', 'Lia Ramadhani', 'Bangkalan', '1993-11-19', 'PR', 'Kejawan', '03', '005', 'Katolik', 'Sudah', 'Wiraswasta', 'Ada'),
(34, '765432109876', 'Fajar Saputra', 'Bangkalan', '2000-08-03', 'LK', 'Buddan', '04', '002', 'Hindu', 'Belum', 'Petani', 'Ada'),
(35, '432109876543', 'Ani Fitriani', 'Bangkalan', '1988-04-29', 'PR', 'Paserean', '05', '004', 'Buddha', 'Cerai Hidup', 'Guru', 'Ada'),
(36, '987654321098', 'Dika Wibowo', 'Bangkalan', '1996-12-17', 'LK', 'Morleke', '06', '001', 'Islam', 'Belum', 'Dokter', 'Ada'),
(37, '654321098765', 'Nita Purnama', 'Bangkalan', '1992-09-05', 'PR', 'Kampung Langgar', '07', '003', 'Kristen', 'Sudah', 'Mahasiswa', 'Ada'),
(38, '321098765432', 'Yanto Budiman', 'Bangkalan', '1990-02-20', 'LK', 'Pongbaru', '08', '004', 'Katolik', 'Belum', 'Pelajar', 'Ada'),
(39, '890765432109', 'Rina Anggraini', 'Bangkalan', '1998-07-01', 'PR', 'Kejawan', '09', '001', 'Hindu', 'Cerai Mati', 'Pensiunan', 'Ada'),
(40, '456321098765', 'Dani Hidayat', 'Bangkalan', '1995-05-26', 'LK', 'Buddan', '10', '004', 'Buddha', 'Belum', 'Pegawai Swasta', 'Ada'),
(41, '123890765432', 'Nina Handayani', 'Bangkalan', '1991-03-09', 'PR', 'Paserean', '01', '005', 'Islam', 'Sudah', 'Pegawai Negeri Sipil', 'Ada'),
(42, '987654123098', 'Yudi Pranata', 'Bangkalan', '1989-06-13', 'LK', 'Morleke', '02', '001', 'Kristen', 'Belum', 'Swasta', 'Ada'),
(43, '654321890765', 'Desi Wahyuni', 'Bangkalan', '1997-10-31', 'PR', 'Kampung Langgar', '03', '002', 'Katolik', 'Cerai Hidup', 'Wiraswasta', 'Ada'),
(44, '321098456321', 'Eko Kurniawan', 'Bangkalan', '1994-01-07', 'LK', 'Pongbaru', '04', '004', 'Hindu', 'Belum', 'Petani', 'Ada'),
(45, '890765123890', 'Rini Indahsari', 'Bangkalan', '1999-11-11', 'PR', 'Kejawan', '05', '002', 'Buddha', 'Sudah', 'Guru', 'Ada'),
(46, '456321890765', 'Budi Santoso', 'Bangkalan', '1993-08-02', 'LK', 'Buddan', '06', '003', 'Islam', 'Belum', 'Dokter', 'Ada'),
(47, '123890456321', 'Maya Lestari', 'Bangkalan', '1988-09-16', 'PR', 'Paserean', '07', '005', 'Kristen', 'Cerai Mati', 'Mahasiswa', 'Ada'),
(48, '987654567890', 'Didik Hermanto', 'Bangkalan', '1996-06-07', 'LK', 'Morleke', '08', '001', 'Katolik', 'Belum', 'Pelajar', 'Ada'),
(49, '654321678901', 'Sari Damayanti', 'Bangkalan', '1990-03-15', 'PR', 'Kampung Langgar', '09', '003', 'Hindu', 'Sudah', 'Pensiunan', 'Ada'),
(50, '321098789012', 'Iwan Susanto', 'Bangkalan', '1994-06-25', 'LK', 'Pongbaru', '10', '004', 'Kong Hu Cu', 'Belum', 'Pegawai Swasta', 'Ada'),
(51, '123456789', 'Agus Setiawan', 'Bangkalan', '1990-05-15', 'LK', 'Paserean', '05', '005', 'Islam', 'Belum', 'Pegawai Swasta', 'Ada'),
(52, '987654321', 'Ratna Sari', 'Bangkalan', '1992-08-20', 'PR', 'Paserean', '03', '001', 'Kristen', 'Sudah', 'Wiraswasta', 'Ada'),
(53, '345678912', 'Budi Pratama', 'Bangkalan', '1985-03-10', 'LK', 'Buddan', '02', '004', 'Hindu', 'Belum', 'Pegawai Negeri Sipil', 'Ada'),
(54, '321098789012', 'Iwan Susanto', 'Bangkalan', '1994-06-25', 'LK', 'Pongbaru', '10', '004', 'Kong Hu Cu', 'Belum', 'Pegawai Swasta', 'Ada'),
(55, '111222333444', 'Rini Sulistiani', 'Bangkalan', '1993-04-18', 'PR', 'Kejawan', '01', '002', 'Islam', 'Sudah', 'Pegawai Negeri Sipil', 'Ada'),
(56, '222333444555', 'Eko Satrio', 'Bangkalan', '1991-09-05', 'LK', 'Paserean', '02', '005', 'Kristen', 'Cerai Mati', 'Wiraswasta', 'Ada'),
(57, '333444555666', 'Siti Maryam', 'Bangkalan', '1996-12-12', 'PR', 'Pongbaru', '03', '001', 'Islam', 'Belum', 'Mahasiswa', 'Ada'),
(58, '444555666777', 'Yoga Prakoso', 'Bangkalan', '1990-07-30', 'LK', 'Buddan', '04', '003', 'Buddha', 'Sudah', 'Pegawai Swasta', 'Ada'),
(59, '555666777888', 'Dewi Nurjanah', 'Bangkalan', '1988-02-22', 'PR', 'Kampung Langgar', '05', '004', 'Islam', 'Belum', 'Pegawai Swasta', 'Ada'),
(60, '666777888999', 'Rizki Hermawan', 'Bangkalan', '1995-05-01', 'LK', 'Kejawan', '06', '002', 'Kristen', 'Belum', 'Wiraswasta', 'Ada'),
(61, '777888999000', 'Maya Lestari', 'Bangkalan', '1992-10-15', 'PR', 'Paserean', '07', '005', 'Islam', 'Sudah', 'Pegawai Negeri Sipil', 'Ada'),
(62, '888999000111', 'Aldi Ramadhan', 'Bangkalan', '1998-03-28', 'LK', 'Pongbaru', '08', '001', 'Hindu', 'Belum', 'Wiraswasta', 'Ada'),
(63, '999000111222', 'Nina Fitriani', 'Bangkalan', '1987-08-09', 'PR', 'Buddan', '09', '003', 'Kristen', 'Sudah', 'Pegawai Swasta', 'Ada'),
(64, '123456789012', 'Arief Setiawan', 'Bangkalan', '1994-11-20', 'LK', 'Morleke', '10', '004', 'Islam', 'Belum', 'Mahasiswa', 'Ada'),
(65, '112233445566', 'Siti Aisyah', 'Bangkalan', '1996-02-14', 'PR', 'Paserean', '01', '002', 'Islam', 'Belum', 'Pelajar', 'Ada'),
(66, '223344556677', 'Ahmad Fauzi', 'Bangkalan', '1991-07-22', 'LK', 'Kejawan', '02', '003', 'Islam', 'Sudah', 'Wiraswasta', 'Ada'),
(67, '334455667788', 'Rini Susanti', 'Bangkalan', '1988-09-30', 'PR', 'Pongbaru', '03', '004', 'Kristen', 'Cerai Hidup', 'Pegawai Negeri Sipil', 'Ada'),
(68, '445566778899', 'Yoga Prasetyo', 'Bangkalan', '1993-04-12', 'LK', 'Kampung Langgar', '04', '005', 'Hindu', 'Sudah', 'Wiraswasta', 'Ada'),
(69, '556677889900', 'Sinta Rahayu', 'Bangkalan', '1990-11-18', 'PR', 'Morleke', '05', '001', 'Islam', 'Cerai Mati', 'Pegawai Swasta', 'Ada'),
(70, '667788990011', 'Budi Kusumo', 'Bangkalan', '1997-06-25', 'LK', 'Paserean', '06', '002', 'Buddha', 'Belum', 'Mahasiswa', 'Ada'),
(71, '778899001122', 'Dewi Susilawati', 'Bangkalan', '1992-01-05', 'PR', 'Pongbaru', '07', '003', 'Islam', 'Sudah', 'Pegawai Negeri Sipil', 'Ada'),
(72, '889900112233', 'Aldo Setiawan', 'Bangkalan', '1989-08-20', 'LK', 'Buddan', '08', '004', 'Kristen', 'Cerai Hidup', 'Pelajar', 'Ada'),
(73, '990011223344', 'Nina Astuti', 'Bangkalan', '1995-03-15', 'PR', 'Kejawan', '09', '005', 'Islam', 'Belum', 'Guru', 'Ada'),
(74, '112233445566', 'Rizki Pratama', 'Bangkalan', '1998-12-01', 'LK', 'Paserean', '10', '001', 'Hindu', 'Sudah', 'Swasta', 'Ada'),
(75, '223344556677', 'Sari Kusuma', 'Bangkalan', '1994-09-28', 'PR', 'Kampung Langgar', '11', '002', 'Kristen', 'Cerai Mati', 'Wiraswasta', 'Ada'),
(76, '334455667788', 'Yogi Hermawan', 'Bangkalan', '1987-04-10', 'LK', 'Morleke', '01', '003', 'Islam', 'Belum', 'Pegawai Negeri Sipil', 'Ada'),
(77, '445566778899', 'Maya Wijaya', 'Bangkalan', '1991-10-15', 'PR', 'Pongbaru', '02', '004', 'Katolik', 'Sudah', 'Mahasiswa', 'Ada'),
(78, '556677889900', 'Agus Setiawan', 'Bangkalan', '1996-07-22', 'LK', 'Paserean', '03', '005', 'Buddha', 'Belum', 'Pegawai Swasta', 'Ada'),
(79, '667788990011', 'Rina Anggraeni', 'Bangkalan', '1993-02-18', 'PR', 'Buddan', '04', '001', 'Islam', 'Sudah', 'Wiraswasta', 'Ada'),
(80, '778899001122', 'Dedi Hermanto', 'Bangkalan', '1990-11-30', 'LK', 'Kejawan', '05', '002', 'Kristen', 'Belum', 'Guru', 'Ada'),
(81, '889900112233', 'Ratna Sari', 'Bangkalan', '1995-06-05', 'PR', 'Pongbaru', '06', '003', 'Hindu', 'Sudah', 'Pegawai Negeri Sipil', 'Ada'),
(82, '990011223344', 'Fahri Ramadhan', 'Bangkalan', '1998-03-18', 'LK', 'Paserean', '07', '004', 'Islam', 'Cerai Hidup', 'Wiraswasta', 'Ada'),
(83, '112233445566', 'Siti Nurjanah', 'Bangkalan', '1992-09-12', 'PR', 'Kampung Langgar', '08', '005', 'Kristen', 'Sudah', 'Mahasiswa', 'Ada'),
(84, '223344556677', 'Eko Suryadi', 'Bangkalan', '1997-04-05', 'LK', 'Morleke', '09', '001', 'Islam', 'Belum', 'Swasta', 'Ada'),
(85, '112233445501', 'Dina Fitriani', 'Bangkalan', '1994-02-20', 'PR', 'Paserean', '01', '002', 'Islam', 'Belum', 'Pegawai Negeri Sipil', 'Ada'),
(86, '223344556602', 'Rudi Santoso', 'Bangkalan', '1989-07-15', 'LK', 'Kejawan', '02', '003', 'Hindu', 'Sudah', 'Wiraswasta', 'Ada'),
(87, '334455667703', 'Maya Wijaya', 'Bangkalan', '1995-10-01', 'PR', 'Pongbaru', '03', '004', 'Kristen', 'Cerai Hidup', 'Pegawai Swasta', 'Ada'),
(88, '445566778804', 'Yoga Prasetyo', 'Bangkalan', '1990-05-12', 'LK', 'Kampung Langgar', '04', '005', 'Islam', 'Belum', 'Wiraswasta', 'Ada'),
(89, '556677889905', 'Siti Rahma', 'Bangkalan', '1988-12-18', 'PR', 'Morleke', '05', '001', 'Buddha', 'Sudah', 'Pegawai Negeri Sipil', 'Ada'),
(90, '667788990106', 'Aldo Setiawan', 'Bangkalan', '1997-07-25', 'LK', 'Paserean', '06', '002', 'Islam', 'Belum', 'Mahasiswa', 'Ada'),
(91, '778899001207', 'Dewi Susilawati', 'Bangkalan', '1992-02-05', 'PR', 'Pongbaru', '07', '003', 'Kristen', 'Sudah', 'Pegawai Swasta', 'Ada'),
(92, '889900112308', 'Rizki Pratama', 'Bangkalan', '1989-09-20', 'LK', 'Buddan', '08', '004', 'Hindu', 'Cerai Mati', 'Pelajar', 'Ada'),
(93, '990011223409', 'Nina Astuti', 'Bangkalan', '1995-04-15', 'PR', 'Kejawan', '09', '005', 'Islam', 'Sudah', 'Wiraswasta', 'Ada'),
(94, '112233445510', 'Rina Anggraeni', 'Bangkalan', '1998-12-05', 'LK', 'Paserean', '10', '001', 'Kristen', 'Belum', 'Guru', 'Ada'),
(95, '223344556611', 'Sari Kusuma', 'Bangkalan', '1994-10-28', 'PR', 'Kampung Langgar', '11', '002', 'Hindu', 'Sudah', 'Pegawai Negeri Sipil', 'Ada'),
(96, '334455667712', 'Yogi Hermawan', 'Bangkalan', '1987-05-10', 'LK', 'Morleke', '01', '003', 'Islam', 'Belum', 'Pelajar', 'Ada'),
(97, '445566778813', 'Maya Wijaya', 'Bangkalan', '1991-11-15', 'PR', 'Pongbaru', '02', '004', 'Kristen', 'Cerai Mati', 'Pegawai Negeri Sipil', 'Ada'),
(98, '556677889914', 'Agus Setiawan', 'Bangkalan', '1996-08-22', 'LK', 'Paserean', '03', '005', 'Hindu', 'Belum', 'Wiraswasta', 'Ada'),
(99, '667788990015', 'Rina Anggraeni', 'Bangkalan', '1993-03-18', 'PR', 'Buddan', '04', '001', 'Islam', 'Sudah', 'Guru', 'Ada'),
(100, '778899001116', 'Dedi Hermanto', 'Bangkalan', '1990-12-30', 'LK', 'Kejawan', '05', '002', 'Kristen', 'Cerai Hidup', 'Wiraswasta', 'Ada'),
(101, '889900112217', 'Ratna Sari', 'Bangkalan', '1995-07-05', 'PR', 'Pongbaru', '06', '003', 'Hindu', 'Sudah', 'Pegawai Swasta', 'Ada'),
(102, '990011223318', 'Fahri Ramadhan', 'Bangkalan', '1998-04-18', 'LK', 'Paserean', '07', '004', 'Islam', 'Belum', 'Mahasiswa', 'Ada'),
(103, '112233445419', 'Siti Nurjanah', 'Bangkalan', '1992-10-12', 'PR', 'Kampung Langgar', '08', '005', 'Buddha', 'Sudah', 'Pegawai Negeri Sipil', 'Ada'),
(104, '223344556520', 'Eko Suryadi', 'Bangkalan', '1997-05-05', 'LK', 'Morleke', '09', '001', 'Islam', 'Belum', 'Wiraswasta', 'Ada');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pengguna`
--

CREATE TABLE `tb_pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `nama_pengguna` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `level` enum('Administrator','Kepala Desa') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tb_pengguna`
--

INSERT INTO `tb_pengguna` (`id_pengguna`, `nama_pengguna`, `username`, `password`, `level`) VALUES
(1, 'Admin', 'admin', 'admin', 'Administrator'),
(2, 'Kepdes', 'kepdes', 'kepdes', 'Kepala Desa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pindah`
--

CREATE TABLE `tb_pindah` (
  `id_pindah` int(11) NOT NULL,
  `id_pdd` int(11) NOT NULL,
  `tgl_pindah` date NOT NULL,
  `alasan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tb_pindah`
--

INSERT INTO `tb_pindah` (`id_pindah`, `id_pdd`, `tgl_pindah`, `alasan`) VALUES
(1, 8, '2023-11-27', 'Bekerja di luar kota'),
(2, 10, '2023-12-03', 'Menjadi TKW');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_anggota`
--
ALTER TABLE `tb_anggota`
  ADD PRIMARY KEY (`id_anggota`),
  ADD KEY `tb_anggota_ibfk_1` (`id_pend`),
  ADD KEY `id_kk` (`id_kk`);

--
-- Indeks untuk tabel `tb_datang`
--
ALTER TABLE `tb_datang`
  ADD PRIMARY KEY (`id_datang`),
  ADD KEY `pelapor` (`pelapor`);

--
-- Indeks untuk tabel `tb_kk`
--
ALTER TABLE `tb_kk`
  ADD PRIMARY KEY (`id_kk`);

--
-- Indeks untuk tabel `tb_lahir`
--
ALTER TABLE `tb_lahir`
  ADD PRIMARY KEY (`id_lahir`),
  ADD KEY `id_kk` (`id_kk`);

--
-- Indeks untuk tabel `tb_mendu`
--
ALTER TABLE `tb_mendu`
  ADD PRIMARY KEY (`id_mendu`),
  ADD KEY `id_pdd` (`id_pdd`);

--
-- Indeks untuk tabel `tb_pdd`
--
ALTER TABLE `tb_pdd`
  ADD PRIMARY KEY (`id_pend`);

--
-- Indeks untuk tabel `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indeks untuk tabel `tb_pindah`
--
ALTER TABLE `tb_pindah`
  ADD PRIMARY KEY (`id_pindah`),
  ADD KEY `id_pdd` (`id_pdd`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_anggota`
--
ALTER TABLE `tb_anggota`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT untuk tabel `tb_datang`
--
ALTER TABLE `tb_datang`
  MODIFY `id_datang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_kk`
--
ALTER TABLE `tb_kk`
  MODIFY `id_kk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tb_lahir`
--
ALTER TABLE `tb_lahir`
  MODIFY `id_lahir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_mendu`
--
ALTER TABLE `tb_mendu`
  MODIFY `id_mendu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_pdd`
--
ALTER TABLE `tb_pdd`
  MODIFY `id_pend` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT untuk tabel `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_pindah`
--
ALTER TABLE `tb_pindah`
  MODIFY `id_pindah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_anggota`
--
ALTER TABLE `tb_anggota`
  ADD CONSTRAINT `tb_anggota_ibfk_1` FOREIGN KEY (`id_pend`) REFERENCES `tb_pdd` (`id_pend`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_anggota_ibfk_2` FOREIGN KEY (`id_kk`) REFERENCES `tb_kk` (`id_kk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_datang`
--
ALTER TABLE `tb_datang`
  ADD CONSTRAINT `tb_datang_ibfk_1` FOREIGN KEY (`pelapor`) REFERENCES `tb_pdd` (`id_pend`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_lahir`
--
ALTER TABLE `tb_lahir`
  ADD CONSTRAINT `tb_lahir_ibfk_1` FOREIGN KEY (`id_kk`) REFERENCES `tb_kk` (`id_kk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_mendu`
--
ALTER TABLE `tb_mendu`
  ADD CONSTRAINT `tb_mendu_ibfk_1` FOREIGN KEY (`id_pdd`) REFERENCES `tb_pdd` (`id_pend`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_pindah`
--
ALTER TABLE `tb_pindah`
  ADD CONSTRAINT `tb_pindah_ibfk_1` FOREIGN KEY (`id_pdd`) REFERENCES `tb_pdd` (`id_pend`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
