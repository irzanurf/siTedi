-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2021 at 05:57 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `si_pp`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `nip` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`nip`, `nama`) VALUES
('21060117130070', 'Samaya'),
('admin', 'Superadmin');

-- --------------------------------------------------------

--
-- Table structure for table `assign_proposal_penelitian`
--

CREATE TABLE `assign_proposal_penelitian` (
  `id` bigint(10) NOT NULL,
  `id_proposal` bigint(10) NOT NULL,
  `reviewer` varchar(30) NOT NULL,
  `reviewer2` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `assign_proposal_pengabdian`
--

CREATE TABLE `assign_proposal_pengabdian` (
  `id` bigint(10) NOT NULL,
  `id_proposal` bigint(10) NOT NULL,
  `reviewer` varchar(30) NOT NULL,
  `reviewer2` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assign_proposal_pengabdian`
--

INSERT INTO `assign_proposal_pengabdian` (`id`, `id_proposal`, `reviewer`, `reviewer2`) VALUES
(1, 1, 'reviewer1', 'reviewer2');

-- --------------------------------------------------------

--
-- Table structure for table `detail_nilai_proposal_pengabdian`
--

CREATE TABLE `detail_nilai_proposal_pengabdian` (
  `id` bigint(10) NOT NULL,
  `id_proposal` bigint(10) NOT NULL,
  `reviewer` varchar(30) NOT NULL,
  `id_komponen_nilai` int(5) NOT NULL,
  `skor` varchar(3) NOT NULL,
  `nilai` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_nilai_proposal_pengabdian`
--

INSERT INTO `detail_nilai_proposal_pengabdian` (`id`, `id_proposal`, `reviewer`, `id_komponen_nilai`, `skor`, `nilai`) VALUES
(1, 1, 'reviewer1', 1, '5', '125'),
(2, 1, 'reviewer1', 2, '5', '125'),
(3, 1, 'reviewer1', 3, '5', '125'),
(4, 1, 'reviewer1', 4, '5', '75'),
(5, 1, 'reviewer1', 5, '5', '50'),
(6, 1, 'reviewer2', 1, '5', '125'),
(7, 1, 'reviewer2', 2, '5', '125'),
(8, 1, 'reviewer2', 3, '5', '125'),
(9, 1, 'reviewer2', 4, '5', '75'),
(10, 1, 'reviewer2', 5, '5', '50');

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `nip` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `golongan` varchar(5) NOT NULL,
  `jabatan` varchar(20) NOT NULL,
  `pendidikan` varchar(20) NOT NULL,
  `th_lulus` year(4) NOT NULL,
  `kepakaran` varchar(50) NOT NULL,
  `status_bekerja` varchar(50) NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `status_kepegawaian` varchar(20) NOT NULL,
  `fakultas` varchar(30) NOT NULL,
  `departemen` varchar(60) NOT NULL,
  `program_studi` varchar(30) NOT NULL,
  `jenis_kelamin` varchar(9) NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`nip`, `nama`, `golongan`, `jabatan`, `pendidikan`, `th_lulus`, `kepakaran`, `status_bekerja`, `jenis`, `status_kepegawaian`, `fakultas`, `departemen`, `program_studi`, `jenis_kelamin`, `no_telp`, `email`) VALUES
('195203121975011004', 'Prof. Dr. Ir. Bambang Pramudono, MS.', 'IV/e', 'Guru Besar', 'S3', 2005, 'Teknik Separasi', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Kimia', 'Teknik Kimia S1', '', '', ''),
('195205051980111001', 'Prof.Ir. Totok Rusmanto, M.Eng.', 'IV/e', 'Guru Besar', 'S2', 1988, 'Teori & Sejarah Ars.', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Arsitektur', 'Arsitektur S1', '', '', ''),
('195303091981031005', 'Prof. Dr. Ir. Sri Tudjono, M.S.', 'IV/b', 'Guru Besar', 'S3', 2005, 'Struktur', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Sipil', 'Teknik Sipil S1', '', '', ''),
('195308191983031001', 'Prof.Dr.Ing.Ir. Gagoek Hardiman', 'IV/e', 'Guru Besar', 'S3', 1992, 'Fisika Bangunan', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Arsitektur', 'Ilmu Arsitektur dan Perkotaan ', '', '', ''),
('195404301981032001', 'Prof. Dr. Ir. Sri Prabandiyani Retno Wardani, M.Sc', 'IV/d', 'Guru Besar', 'S3', 1999, 'Geoteknik', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Sipil', 'Teknik Sipil S3', '', '', ''),
('195407171982032001', 'Prof. Dr.Ir. Nany Yuliastuti, MSP', 'IV/d', 'Guru Besar', 'S3', 2015, 'Ilmu Perancangan Wilayah dan Kota', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Perencanaan Wilayah dan Kota', 'Perencanaan Wilayah dan Kota S', '', '', ''),
('195409301980032001', 'Prof. Dr. Ir. Sri Sangkawati, M.S.', 'IV/d', 'Guru Besar', 'S3', 2013, 'Keairan', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Sipil', 'Teknik Sipil S1', '', '', ''),
('195507271986031008', 'Ir. Yurianto, M.T.', 'IV/a', 'Lektor Kepala', 'S2', 2005, 'Hydrolic Machine', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Mesin', 'Teknik Mesin S1', '', '', ''),
('195508211983031002', 'Ir. Agus Hadiyarto, M.T.', 'IV/a', 'Lektor Kepala', 'S2', 1994, 'T. Pengolahan Limbah & Lingkungan', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Kimia', 'Teknik Kimia S1', '', '', ''),
('195510161985031001', 'Dr. Ir. Parfi Khadiyanta, M.S.', 'IV/a', 'Lektor Kepala', 'S3', 2019, 'Perencanaan Lingkungan', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Perencanaan Wilayah dan Kota', 'Perencanaan Wilayah dan Kota S', '', '', ''),
('195511081983031002', 'Prof.Ir. Edy Darmawan, M.Eng.', 'IV/e', 'Guru Besar', 'S2', 1988, 'Perancangan Kota', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Arsitektur', 'Arsitektur S1', '', '', ''),
('195512311983031014', 'Prof.Ir. Abdullah, M.S., Ph.D.', 'IV/d', 'Guru Besar', 'S3', 2002, 'Bioteknologi', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Kimia', 'Teknik Kimia S1', '', '', ''),
('195606011986021001', 'Ir. Irawan Wisnu Wardhana, M.S.', 'III/b', 'Asisten Ahli', 'S2', 1992, 'Air Bersih Dan Air Buangan', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Lingkungan', 'Teknik Lingkungan S1', '', '', ''),
('195608181986031005', 'Ir. Abdul Malik, MSArs', 'III/c', 'Lektor', 'S2', 1991, 'Teori dan Kritik Arsitektur', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Arsitektur', 'Arsitektur S1', '', '', ''),
('195611091985032002', 'Prof. Dr. Ir. Han Ay Lie, M.Eng.', 'IV/d', 'Guru Besar', 'S3', 2013, 'Ilmu Teknik Sipil', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Sipil', 'Teknik Sipil S3', '', '', ''),
('195611261987031002', 'Dr. Ir. Hargono, M.T.', 'IV/c', 'Lektor Kepala', 'S3', 2018, 'Teknik Separasi', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Kimia', 'Teknik Kimia S1', '', '', ''),
('195612281985031003', 'Dr.Ir. Ragil Haryanto, M.SP.', 'IV/a', 'Lektor Kepala', 'S3', 2017, 'Manajemen Kota', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Perencanaan Wilayah dan Kota', 'Perencanaan Wilayah dan Kota S', '', '', ''),
('195701081986021001', 'Ir. Salamun, M.T.', 'III/d', 'Lektor', 'S2', 1997, 'Keairan', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Sipil', 'Teknik Sipil S1', '', '', ''),
('195702051986031003', 'Ir. Djoko Suwandono, M.Sp.', 'IV/a', 'Lektor Kepala', 'S2', 1988, 'Perenc Wil Kota', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Perencanaan Wilayah dan Kota', 'Perencanaan Wilayah dan Kota S', '', '', ''),
('195704221986031001', 'Dr. Ir. Bambang Purwanggono Sukarsono, M.Eng.', 'IV/c', 'Lektor Kepala', 'S3', 2014, 'Sistem Produksi', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Industri', 'Teknik Industri S1', '', '', ''),
('195706241985031001', 'Ir. Yohannes Inigo Wicaksono, M.S.', 'III/d', 'Lektor', 'S2', 1989, 'Transportasi', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Sipil', 'Teknik Sipil S1', '', '', ''),
('195708311986021002', 'Ir. Endro Sutrisno, M.S.', 'III/d', 'Lektor', 'S2', 1992, 'Dsda Mekanik Fluida', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Lingkungan', 'Teknik Lingkungan S1', '', '', ''),
('195709131986031001', 'Ir. Bambang Sudarsono, M.S.', 'IV/a', 'Lektor Kepala', 'S2', 1989, 'Geodesi', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Geodesi', 'Teknik Geodesi S1', '', '', ''),
('195712221987031001', 'Ir. Dhanoe Iswanto, M.T.', 'III/c', 'Lektor', 'S2', 2003, 'Perancangan Kota', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Arsitektur', 'Arsitektur S1', '', '', ''),
('195801021986031002', 'Ir. Sumar Hadi Suryo, M.T.', 'III/d', 'Lektor', 'S2', 2013, 'Production & Proses', 'Ijin Belajar', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Mesin', 'Teknik Mesin S1', '', '', ''),
('195804291986021001', 'Ir. Nugroho Agus Darmanto, M.T.', 'III/c', 'Lektor', 'S2', 2000, 'Ketenagaan', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Elektro', 'Teknik Elektro S1', '', '', ''),
('195807121983031032', 'Ir. Slamet Priyanto, M.S.', 'IV/a', 'Lektor Kepala', 'S2', 1990, 'Tekologi Energi', 'Ijin Belajar', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Kimia', 'Teknik Kimia S1', '', '', ''),
('195807151986021001', 'Ir. EPF Eko Yuli Priyono, M.S.', 'III/c', 'Lektor', 'S2', 1992, 'Transportasi', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Sipil', 'Teknik Sipil S1', '', '', ''),
('195808071987031001', 'Ir. Mochtar Hadiwidodo, M.Si.', 'IV/a', 'Lektor Kepala', 'S2', 2010, 'Buangan Padat, Penyediaan Air Bersih', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Lingkungan', 'Teknik Lingkungan S1', '', '', ''),
('195809291986021001', 'Dr.Ir. Windu Partono, M.Sc.', 'III/c', 'Lektor', 'S3', 2015, 'Struktur', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Sipil', 'Teknik Sipil S1', '', '', ''),
('195810101986021001', 'Ir. Robert Johanes Kodoatie, M.Eng., Ph.D.', 'III/c', 'Lektor', 'S3', 2000, 'Keairan', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Sipil', 'Teknik Sipil S1', '', '', ''),
('195811071988031001', 'Prof. Dr. Ir. Syafrudin, CES, M.T.', 'IV/c', 'Guru Besar', 'S3', 2014, 'Ilmu Teknik Lingkungan', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Lingkungan', 'Teknik Lingkungan S1', '', '', ''),
('195811111987031002', 'Ir. Fitri Yusman, M.SP.', 'III/c', 'Lektor', 'S2', 1991, 'Perumahan', 'Non Aktif', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Perencanaan Wilayah dan Kota', 'Perencanaan Wilayah dan Kota S', '', '', ''),
('195812211987032001', 'Ir. Dwi Kurniani, M.S.', 'III/d', 'Lektor', 'S2', 1991, 'Keairan', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Sipil', 'Teknik Sipil S1', '', '', ''),
('195901051987031002', 'Ir. Agung Nugroho, M.Kom.', 'IV/c', 'Lektor Kepala', 'S2', 2010, 'Biomedik', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Elektro', 'Teknik Elektro S1', '', '', ''),
('195901091987031001', 'Dr.Ir. Djoko Indrosaptono, M.T.', 'IV/b', 'Lektor Kepala', 'S3', 2016, 'Perancangan Arsitektur', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Arsitektur', 'Arsitektur S1', '', '', ''),
('195901181987102001', 'Ir. Diah Susetyo Retnowati, M.T.', 'IV/a', 'Lektor Kepala', 'S2', 1995, 'T. Reaksi Kimia', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Kimia', 'Teknik Kimia S1', '', '', ''),
('195903231988032001', 'Ir. Hary Budieny, M.T.', 'III/c', 'Lektor', 'S2', 2001, 'Keairan', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Sipil', 'Teknik Sipil S1', '', '', ''),
('195905221988121001', 'Ir. Sarjito Jokosisworo, M.Si.', 'IV/b', 'Lektor Kepala', 'S2', 1995, 'Ilmu Material', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Perkapalan', 'Teknik Perkapalan S1', '', '', ''),
('195905281988031001', 'Ir. Indrastono Dwi Atmanto, M.Ing.', 'IV/a', 'Lektor Kepala', 'S2', 1993, 'Breeding Reproduksi', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Sipil', 'Teknik Sipil S1', '', '', ''),
('195906191985111001', 'Ir. Sudjadi, M.T.', 'IV/a', 'Lektor Kepala', 'S2', 1998, 'Elektro,Telkom,Kontrol,Robotika,Mikro', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Elektro', 'Teknik Elektro S1', '', '', ''),
('195906201987031003', 'Ir. Bambang Yunianto, M.Sc.', 'IV/b', 'Lektor Kepala', 'S2', 1993, 'Heat Transfer', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Mesin', 'Teknik Mesin S1', '', '', ''),
('195907021987032001', 'Ir. Frida Kistiani, M.T.', 'III/c', 'Lektor', 'S2', 2010, 'Manaj. Konstruksi', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Sipil', 'Teknik Sipil S1', '', '', ''),
('195907141987031001', 'Ir. Muhrozi, M.S.', 'III/c', 'Lektor', 'S2', 1991, 'geoteknik', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Sipil', 'Teknik Sipil S1', '', '', ''),
('195907221987031003', 'Dr. Ir. Berkah Fajar Tamtomo Kiono, Dipl.Ing.', 'IV/b', 'Lektor Kepala', 'S3', 2002, 'Fluid Mechanic', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Mesin', 'Teknik Mesin S1', '', '', ''),
('195909061988031003', 'Ir. Supriyono, M.T.', 'III/b', 'Lektor', 'S2', 2010, 'Transportasi', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Sipil', 'Teknik Sipil S1', '', '', ''),
('195909091987031001', 'Ir. Wahju Krisna Hidajat, M.T.', 'III/b', 'Asisten Ahli', 'S2', 1999, 'Hidrogeologi', 'Ijin Belajar', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Geologi', 'Teknik Geologi S1', '', '', ''),
('195911071987032001', 'Dr. Ir. Ismiyati, M.S.', 'III/d', 'Lektor', 'S3', 2011, 'Transportasi', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Sipil', 'Teknik Sipil S1', '', '', ''),
('195912101987031002', 'Ir. Wahyudi Kushardjoko, M.T.', 'III/b', 'Lektor', 'S2', 2001, 'Transportasi', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Sipil', 'Teknik Sipil S1', '', '', ''),
('196001151988101001', 'Ir. Hantoro Satriadi, M.T.', 'III/c', 'Lektor', 'S2', 1998, 'Agro Kimia', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Kimia', 'Teknik Kimia S1', '', '', ''),
('196001251987031001', 'Ir. Sugiyanto, DEA', 'IV/a', 'Lektor Kepala', 'S2', 1993, 'Struktural Dynamic', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Mesin', 'Teknik Mesin S1', '', '', ''),
('196002171987032001', 'Dra. Bitta Pigawati, Dipl.GE, M.T.', 'IV/b', 'Lektor Kepala', 'S2', 2001, 'Perencanaan Wil & Kota Tata Guna Lahan', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Perencanaan Wilayah dan Kota', 'Perencanaan Wilayah dan Kota S', '', '', ''),
('196002231986021001', 'Dr. Ir. Hermawan, DEA', 'IV/a', 'Lektor Kepala', 'S3', 1995, 'Analisis Sitem Tenaga Listrik, Kestabilan Listrik', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Elektro', 'Teknik Elektro S2', '', '', ''),
('196003151987031001', 'Dr. Ir Heru Prastawa, DEA', 'IV/b', 'Lektor Kepala', 'S3', 2019, 'Sistem Produksi', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Industri', 'Teknik Industri S1', '', '', ''),
('196004121986032001', 'Dr. Ir. Ratnawati, M.T.', 'IV/b', 'Lektor Kepala', 'S3', 2005, 'Teknologi Energi', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Kimia', 'Teknik Kimia S1', '', '', ''),
('196004271987031001', 'Prof. Dr. Ir. Suripin, M.Eng.', 'IV/d', 'Guru Besar', 'S3', 1998, 'Keairan', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Sipil', 'Teknik Sipil S3', '', '', ''),
('196005011986031003', 'Prof.Dr.Ir. Bakti Jos, DEA', 'IV/d', 'Guru Besar', 'S3', 1993, 'Tenik Energi Dan Separasi', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Kimia', 'Teknik Kimia S1', '', '', ''),
('196005261987101001', 'Ir. Djoko Purwanto, M.S.', 'III/c', 'Lektor', 'S2', 1992, 'Transportasi', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Sipil', 'Teknik Sipil S1', '', '', ''),
('196006021986021001', 'Prof. Dr. Ir. Sriyana, M.S.', 'IV/a', 'Guru Besar', 'S3', 2007, 'Keairan', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Sipil', 'Teknik Sipil S1', '', '', ''),
('196007181989031001', 'Ir. Kiryanto, M.T.', 'IV/a', 'Lektor Kepala', 'S2', 2000, 'Teknik Energi', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Perkapalan', 'Teknik Perkapalan S1', '', '', ''),
('196010211990032002', 'Ir. Hermin Werdiningsih, M.T.', 'III/d', 'Lektor', 'S2', 2004, 'Peranc. Arsitektur', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Arsitektur', 'Arsitektur S1', '', '', ''),
('196010251998021001', 'Ir. Imam Pujo Mulyatno, M.T.', 'III/d', 'Lektor', 'S2', 2002, 'Teknik Produksi & Material Kelautan', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Perkapalan', 'Teknik Perkapalan S1', '', '', ''),
('196103041993032001', 'Dr. Ir. Retno Widjajanti, M.T.', 'IV/a', 'Lektor Kepala', 'S3', 2015, 'Perec Kota Pwk', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Perencanaan Wilayah dan Kota', 'Perencanaan Wilayah dan Kota S', '', '', ''),
('196106161993031002', 'Ir. Bambang Winardi, M.Kom.', 'III/d', 'Lektor', 'S2', 2013, 'Kependudukan', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Elektro', 'Teknik Elektro S1', '', '', ''),
('196107121988031003', 'Ir. Djoeli Satrijo, M.T.', 'IV/a', 'Lektor Kepala', 'S2', 1998, 'Stress Analysis', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Mesin', 'Teknik Mesin S1', '', '', ''),
('196107221986021001', 'Ir. Himawan Indarto, M.S.', 'IV/a', 'Lektor Kepala', 'S2', 1990, 'Struktur', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Sipil', 'Teknik Sipil S1', '', '', ''),
('196110221988031002', 'Dr.T. Ir. Indro Sumantri, M.Eng.', 'IV/b', 'Lektor Kepala', 'S3', 2019, 'T. Pengolahan Limbah', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Kimia', 'Teknik Kimia S1', '', '', ''),
('196111171988031001', 'Ir. Tejo Sukmadi, M.T.', 'IV/a', 'Lektor Kepala', 'S2', 2002, 'Ketenagaan', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Elektro', 'Teknik Elektro S1', '', '', ''),
('196112171987031001', 'Dr. Ir. Nazaruddin Sinaga, M.S.', 'IV/a', 'Lektor Kepala', 'S3', 2004, 'Heat Transfer', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Mesin', 'Teknik Mesin S1', '', '', ''),
('196112261988031001', 'Dr. Ir. Setia Budi Sasongko, DEA.', 'IV/a', 'Lektor Kepala', 'S3', 2001, 'Tekn. Sistem Proses; Komputasi Proses', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Kimia', 'Teknik Kimia S1', '', '', ''),
('196112281986031004', 'Prof. Dr. Ir. Purwanto, DEA', 'IV/e', 'Guru Besar', 'S3', 1994, 'T. Sistem Proses & T. Reaksi Kimia', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Kimia', 'Teknik Kimia S1', '', '', ''),
('196201101989021001', 'Dr. Ir. Agung Dwiyanto, M.T.', 'IV/a', 'Lektor Kepala', 'S3', 2019, 'Teknologi Bangunan', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Arsitektur', 'Arsitektur S1', '', '', ''),
('196203271988031004', 'Ir. Satrio Nugroho, M.Si.', 'III/c', 'Lektor', 'S2', 1996, 'Manajemen Industri', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Arsitektur', 'Arsitektur S1', '', '', ''),
('196203271991022001', 'Dr. Ir. Nur Rokhati, M.T.', 'IV/a', 'Lektor Kepala', 'S3', 2019, 'Tek. Batu Bara', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Kimia', 'Teknik Kimia S1', '', '', ''),
('196204031993031003', 'Ir. Agung Sugiri, S.T., M.P.St.', 'IV/a', 'Lektor Kepala', 'S2', 1999, 'Transfortasi Pemb Kerkelanjutan', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Perencanaan Wilayah dan Kota', 'Perencanaan Wilayah dan Kota S', '', '', ''),
('196204231987031003', 'Dr. Ir. Dwi Basuki Wibowo, M.S.', 'IV/c', 'Lektor Kepala', 'S3', 2019, 'Struktural Dynamic', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Mesin', 'Teknik Mesin S1', '', '', ''),
('196204281990012001', 'Ir. Eflita Yohana, M.T., Ph.D.', 'III/c', 'Lektor Kepala', 'S3', 2011, 'Energy Conservasion', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Mesin', 'Teknik Mesin S2', '', '', ''),
('196205161990011001', 'Ir. Parang Sabdono, M.Eng.', 'III/d', 'Lektor', 'S2', 2003, 'Struktur', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Sipil', 'Teknik Sipil S1', '', '', ''),
('196205201989021001', 'Prof.Dr.rer.nat. Ir. Athanasius Priharyoto Bayusen', 'IV/d', 'Guru Besar', 'S3', 2006, 'Ceramic Processing and Characterization', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Mesin', 'Teknik Mesin S2', '', '', ''),
('196207011990031003', 'Ir. Arif Hidayat, CES, M.T.', 'IV/a', 'Lektor Kepala', 'S2', 2003, 'Struktur', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Sipil', 'Teknik Sipil S1', '', '', ''),
('196208091988031001', 'Ir. Toni Prahasto, MAsc., Ph.D.', 'III/c', 'Lektor', 'S3', 1999, 'Geometric Modeling', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Mesin', 'Teknik Mesin S1', '', '', ''),
('196209171991021001', 'Ir. Sulistyo, M.T., Ph.D.', 'IV/b', 'Lektor Kepala', 'S3', 2013, 'Metallurgy Dan Corrosion', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Mesin', 'Teknik Mesin S1', '', '', ''),
('196210161988031003', 'Ir. Indriastjario, M.Eng.', 'IV/a', 'Lektor Kepala', 'S2', 1997, 'Peranc. Kota & Perum.', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Arsitektur', 'Arsitektur S1', '', '', ''),
('196303161991031002', 'Dr. Ir. Nuroji, M.T.', 'IV/a', 'Lektor Kepala', 'S3', 2004, 'Teknik Struktur/Analisa Struktur 2', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Sipil', 'Teknik Sipil S2', '', '', ''),
('196307111990012001', 'Dr.Ars. Ir. Wijayanti, M.Eng.', 'III/c', 'Lektor', 'S3', 2018, 'Peranc. Kota & Perum.', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Arsitektur', 'Arsitektur S1', '', '', ''),
('196307111991021002', 'Ir. Purwanto, M.T., M.Eng.', 'IV/a', 'Lektor Kepala', 'S2', 2003, 'Struktur', 'Ijin Belajar', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Sipil', 'Teknik Sipil S1', '', '', ''),
('196309141988031012', 'Dr. Ir. Suharyanto, M.Sc.', 'IV/c', 'Lektor Kepala', 'S3', 2003, 'Keairan', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Sipil', 'Teknik Sipil S2', '', '', ''),
('196309271993032001', 'Ir. Nurini, M.T.', 'IV/a', 'Lektor Kepala', 'S2', 2002, 'Perenc Kota Pwk', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Perencanaan Wilayah dan Kota', 'Perencanaan Wilayah dan Kota S', '', '', ''),
('196310201991021001', 'Dr.Ir. Agung Budi Sardjono, M.T.', 'IV/a', 'Lektor Kepala', 'S3', 2016, 'Perancangan Arsitektur', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Arsitektur', 'Arsitektur S1', '', '', ''),
('196312221990011003', 'Dr.Ir. Hadi Wahyono, M.A.', 'IV/a', 'Lektor Kepala', 'S3', 2015, 'Perencanaan Wilayah Dan Kota', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Perencanaan Wilayah dan Kota', 'Perencanaan Wilayah dan Kota S', '', '', ''),
('196312311990031022', 'Prof. Dr. Ir. Edi Purwanto, M.T.', 'IV/b', 'Guru Besar', 'S3', 2007, 'Ilmu Perancangan Arsitektur dan Kota', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Arsitektur', 'Arsitektur S2', '', '', ''),
('196402141991022002', 'Ir. Kristinah Haryani, M.T.', 'IV/a', 'Lektor Kepala', 'S2', 1998, 'Tek. Membran', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Kimia', 'Teknik Kimia S1', '', '', ''),
('196405261989031002', 'Dr. Ir. Jaka Windarta, M.T.', 'IV/a', 'Lektor Kepala', 'S3', 2009, 'Ketenagaan', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Elektro', 'Teknik Elektro S2', '', '', ''),
('196406021991021001', 'Ir. Rudi Yuniarto Adi, M.T.', 'III/c', 'Lektor', 'S2', 2007, 'Struktur', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Sipil', 'Teknik Sipil S1', '', '', ''),
('196408041991021002', 'Dr. Ir. Budi Sudarwanto, M.Si.', 'IV/a', 'Lektor Kepala', 'S3', 2019, 'Studi Pembangunan', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Arsitektur', 'Arsitektur S1', '', '', ''),
('196411081990011001', 'Dr. Ir. Eddy Prianto, CES, DEA', 'IV/a', 'Lektor Kepala', 'S3', 2002, 'Fisika Bangunan', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Arsitektur', 'Arsitektur S2', '', '', ''),
('196412021999032001', 'Ir. Dwi Siwi Handayani, M.Si.', 'III/a', 'Asisten Ahli', 'S2', 1990, 'Penyediaaan Air Bersih, Manajemen Lingk.', 'Ijin Belajar', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Lingkungan', 'Teknik Lingkungan S1', '', '', ''),
('196503131991021001', 'Ir. Budi Setiyana, M.T.', 'IV/a', 'Lektor Kepala', 'S2', 1996, 'Stress Analysis', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Mesin', 'Teknik Mesin S1', '', '', ''),
('196509131998032001', 'Dr. Ir. Atik Suprapti, MTA.', 'IV/a', 'Lektor Kepala', 'S3', 2012, 'Perancangan Kota', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Arsitektur', 'Arsitektur S2', '', '', ''),
('196602201991021001', 'Prof. Dr. Ir. Budiyono, M.Si.', 'IV/d', 'Guru Besar', 'S3', 2010, 'T. Pengolahan Air', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Kimia', 'Teknik Kimia S1', '', '', ''),
('196603231999031008', 'Ir. Sawitri Subiyanto, M.Si.', 'III/c', 'Lektor', 'S2', 2006, 'Geodesi', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Geodesi', 'Teknik Geodesi S1', '', '', ''),
('196605061995121001', 'Dr. Jawoto Sih Setyono, S.T., MDP', 'IV/a', 'Lektor Kepala', 'S3', 2017, 'Pwk Sustainable Development', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Perencanaan Wilayah dan Kota', 'Perencanaan Wilayah dan Kota S', '', '', ''),
('196605212006041010', 'Dr.Ing. Ir. Ismoyo Haryanto, M.T.', 'III/c', 'Lektor', 'S3', 2005, 'Getaran Mekanik', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Mesin', 'Teknik Mesin S1', '', '', ''),
('196608221997022001', 'Dr.Ars. Ir. Rina Kurniati, M.T.', 'IV/a', 'Lektor Kepala', 'S3', 2018, 'Perencanaan Kota Pwk', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Perencanaan Wilayah dan Kota', 'Perencanaan Wilayah dan Kota S', '', '', ''),
('196609011998021001', 'Junaidi, S.T., M.T.', 'III/c', 'Lektor', 'S2', 2011, 'Air Limbah', 'Ijin Belajar', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Lingkungan', 'Teknik Lingkungan S1', '', '', ''),
('196610051992031003', 'Dr. Ir. Hari Nugroho, M.T.', 'III/c', 'Lektor', 'S3', 2019, 'Keairan', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Sipil', 'Teknik Sipil S1', '', '', ''),
('196701231994012001', 'Ir. Sri Hartuti Wahyuningrum, M.T.', 'III/b', 'Lektor', 'S2', 2007, 'Perancangan Kota', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Arsitektur', 'Arsitektur S1', '', '', ''),
('196702081994031005', 'Prof. Ir. Mochamad Agung Wibowo, M.M., M.Sc., Ph.D', 'IV/c', 'Guru Besar', 'S3', 2004, 'Teknik Sipil (Manajemen Konstruksi)', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Sipil', 'Teknik Sipil S3', '', '', ''),
('196704011999032001', 'Dr. Ir. Anik Sarminingsih, M.T.', 'III/a', 'Asisten Ahli', 'S3', 2015, 'Penyediaan Air Bersih', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Lingkungan', 'Teknik Lingkungan S1', '', '', ''),
('196704041998022001', 'Prof. Dr. Ir. Erni Setyowati, M.T.', 'IV/a', 'Guru Besar', 'S3', 2011, 'Fisika Bangunan', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Arsitektur', 'Arsitektur S1', '', '', ''),
('196704291994032002', 'Dr. Sunarti, S.T., M.T.', 'IV/b', 'Lektor Kepala', 'S3', 2016, 'Perumahan Perenc & Perenc Kota', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Perencanaan Wilayah dan Kota', 'Perencanaan Wilayah dan Kota S', '', '', ''),
('196704301992032002', 'Dr. Ir. Suzanna Ratih Sari, M.M., M.A.', 'IV/a', 'Lektor Kepala', 'S3', 2014, 'Manajemen', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Arsitektur', 'Arsitektur S1', '', '', ''),
('196709191999031003', 'Ir. Winardi Dwi Nugraha, M.Si.', 'III/a', 'Asisten Ahli', 'S2', 2005, 'Pengelolalingkungan Kualitas Air', 'Ijin Belajar', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Lingkungan', 'Teknik Lingkungan S1', '', '', ''),
('196711101994031003', 'Holi Bina Wijaya, S.T., MUM', 'IV/b', 'Lektor Kepala', 'S2', 1999, 'Sistem Informasi Perenc Urban Manaj Tata Guna Laha', 'Ijin Belajar', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Perencanaan Wilayah dan Kota', 'Perencanaan Wilayah dan Kota S', '', '', ''),
('196711141993031001', 'Prof. Ir. Didi Dwi Anggoro, M.Eng., Ph.D.', 'IV/c', 'Guru Besar', 'S3', 2004, 'Zeolite', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Kimia', 'Teknik Kimia S1', '', '', ''),
('196803171997022002', 'Retno Susanti, S.T., M.T.', 'IV/a', 'Lektor Kepala', 'S2', 2001, 'Perencanaan Kota Pariwisata', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Perencanaan Wilayah dan Kota', 'Perencanaan Wilayah dan Kota S', '', '', ''),
('196805081999031002', 'Dr. Wilma Amiruddin, S.T., M.T.', 'III/c', 'Lektor', 'S3', 2012, 'Teknik Managemen Pantai', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Perkapalan', 'Teknik Perkapalan S1', '', '', ''),
('196806281998022001', 'Dr. Ir. R. Siti Rukayah, M.T.', 'IV/a', 'Lektor Kepala', 'S3', 2010, 'Perancangan Arsitektur', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Arsitektur', 'Arsitektur S2', '', '', ''),
('196807111997021001', 'Yuli Christyono, S.T., M.T.', 'IV/a', 'Lektor Kepala', 'S2', 2003, 'Telekokunikasi Dan Informasi', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Elektro', 'Teknik Elektro S1', '', '', ''),
('196807261997021001', 'Mardwi Rahdriawan, S.T., M.T.', 'III/c', 'Lektor', 'S2', 2001, 'Perenc Kota', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Perencanaan Wilayah dan Kota', 'Perencanaan Wilayah dan Kota S', '', '', ''),
('196808141999031002', 'Dr.Eng. Sukamta, S.T., M.T.', 'III/d', 'Lektor', 'S3', 2008, 'Struktur', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Sipil', 'Teknik Sipil S3', '', '', ''),
('196811102005011001', 'Joga Dharma Setiawan, B.Sc., M.Sc., Ph.D.', 'III/c', 'Lektor', 'S3', 2001, 'Rotor Dinamics', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Mesin', 'Teknik Mesin S1', '', '', ''),
('196811111994121001', 'Sumardi, S.T., M.T.', 'IV/b', 'Lektor Kepala', 'S2', 1998, 'Sistem Instrumentasi dan Kontrol', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Elektro', 'Teknik Elektro S1', '', '', ''),
('196901011997021001', 'Dr.Ing. Wisnu Pradoto, S.T., M.T.', 'III/c', 'Lektor', 'S3', 2012, 'Perencaan Kota Pwk', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Perencanaan Wilayah dan Kota', 'Perencanaan Wilayah dan Kota S', '', '', ''),
('196903111997021001', 'Susatyo Nugroho Widyo Pramono, S.T., M.M.', 'III/a', 'Lektor', 'S2', 1999, 'Sistem Produksi', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Industri', 'Teknik Industri S1', '', '', ''),
('196904291998021006', 'Hardi Wibowo, S.T., M.Eng.', 'III/d', 'Lektor', 'S2', 2004, 'Struktur', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Sipil', 'Teknik Sipil S1', '', '', ''),
('196904292002121001', 'Dr. Hery Suliantoro, S.T., M.T.', 'III/c', 'Lektor Kepala', 'S3', 2012, 'Teknik Industri', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Industri', 'Teknik Industri S1', '', '', ''),
('196905051995122001', 'Dr. Artiningsih, S.T., M.Si.', 'III/c', 'Lektor', 'S3', 2018, 'Pernec Wil &Kota Manajemen Kota', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Perencanaan Wilayah dan Kota', 'Perencanaan Wilayah dan Kota S', '', '', ''),
('196906121994031001', 'Dr. Wahyudi, S.T., M.T.', 'IV/b', 'Lektor Kepala', 'S3', 2015, 'Teknik Elektro', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Elektro', 'Teknik Elektro S1', '', '', ''),
('196907091997021001', 'Karnoto, S.T., M.T.', 'IV/a', 'Lektor Kepala', 'S2', 2006, 'Ketenagaan', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Elektro', 'Teknik Elektro S1', '', '', ''),
('196907141997021001', 'Sukiswo, S.T., M.T.', 'III/d', 'Lektor', 'S2', 2007, 'Elektronika,Telekomunikasi', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Elektro', 'Teknik Elektro S1', '', '', ''),
('196909291997021001', 'Dr. Fadjar Hari Mardiansjah, S.T., M.T., MDP', 'III/c', 'Lektor', 'S3', 2014, 'Tata Guna Lahan Pwk', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Perencanaan Wilayah dan Kota', 'Perencanaan Wilayah dan Kota S', '', '', ''),
('196910021994032003', 'Dr.T. Aji Prasetyaningrum, S.T., M.Si.', 'IV/b', 'Lektor Kepala', 'S3', 2018, 'Teknik Separasi', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Kimia', 'Teknik Kimia S1', '', '', ''),
('196912061999031002', 'Samsul Ma\'rif, S.P., M.T.', 'IV/a', 'Lektor Kepala', 'S2', 1998, 'Ek Wil Kota Perenc Wil', 'Ijin Belajar', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Perencanaan Wilayah dan Kota', 'Perencanaan Wilayah dan Kota S', '', '', ''),
('196912211995121001', 'Achmad Hidayatno, S.T., M.T.', 'IV/a', 'Lektor Kepala', 'S2', 2002, 'Pengolahan Sinyal Digital', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Elektro', 'Teknik Elektro S1', '', '', ''),
('197002171994121001', 'Dr. Susilo Adi Widyanto, S.T., M.T.', 'IV/b', 'Lektor Kepala', 'S3', 2009, 'Production &Automatic', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Mesin', 'Teknik Mesin S2', '', '', ''),
('197004231995121001', 'Prof. Dr. I Nyoman Widiasa, S.T., M.T.', 'IV/d', 'Guru Besar', 'S3', 2005, 'Teknologi Membran', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Kimia', 'Teknik Kimia S1', '', '', ''),
('197005201999031002', 'Rusnaldy, S.T., M.T., Ph.D.', 'IV/a', 'Lektor Kepala', 'S3', 2008, 'Proses Produksi', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Mesin', 'Teknik Mesin S2', '', '', ''),
('197005212000121001', 'Budi Setiyono, S.T., M.T.', 'III/c', 'Lektor', 'S2', 2003, 'Kontrol', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Elektro', 'Teknik Elektro S1', '', '', ''),
('197006252002122001', 'Sri Hartini, S.T., M.T.', 'IV/a', 'Lektor Kepala', 'S2', 2000, 'Sistem Produksi', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Industri', 'Teknik Industri S1', '', '', ''),
('197006271998031005', 'Dr. Mussadun, S.T., M.Si.', 'III/c', 'Lektor', 'S3', 2012, 'Pengembangan Wil Pesisir Dan Kelautan', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Perencanaan Wilayah dan Kota', 'Perencanaan Wilayah dan Kota S', '', '', ''),
('197007272000121001', 'Dr. Ir. R. Rizal Isnanto, S.T., M.M., M.T., IPM', 'IV/a', 'Lektor Kepala', 'S3', 2013, 'Informasi Dan Komputer', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Komputer', 'Teknik Komputer S1', '', '', ''),
('197008061998021001', 'Yusuf Umardani, S.T., M.T.', 'III/d', 'Lektor', 'S2', 2003, 'Metallurgy Dan Casting', 'Ijin Belajar', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Mesin', 'Teknik Mesin S1', '', '', ''),
('197011231995121001', 'Prof. Dr.rer.nat. Imam Buchori, S.T.', 'IV/d', 'Guru Besar', 'S3', 2005, 'Perenc Wil & Kota Aplikasi Geomatika', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Perencanaan Wilayah dan Kota', 'Perencanaan Wilayah dan Kota S', '', '', ''),
('197011231998021001', 'Dr.Eng. Gunawan Dwi Haryadi, S.T., M.T.', 'III/d', 'Lektor Kepala', 'S3', 2012, 'Material Handling', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Mesin', 'Teknik Mesin S1', '', '', ''),
('197012031997021001', 'Imam Santoso, S.T., M.T.', 'III/c', 'Lektor', 'S2', 2003, 'Telekomunikasi', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Elektro', 'Teknik Elektro S1', '', '', ''),
('197012121998022001', 'Dr. Dyah Ari Wulandari, S.T., M.T.', 'III/d', 'Lektor', 'S3', 2016, 'Keairan', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Sipil', 'Teknik Sipil S1', '', '', ''),
('197102071995121001', 'Prof. Dr. Moh. Djaeni, S.T., M.Eng.', 'IV/c', 'Guru Besar', 'S3', 2007, 'Energi Tek (Drying) Pengeringan', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Kimia', 'Teknik Kimia S1', '', '', ''),
('197103011997021001', 'Prof. Dr. Istadi, S.T., M.T.', 'IV/c', 'Guru Besar', 'S3', 2006, 'Ilmu Teknik Kimia/Thermodinamika', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Kimia', 'Teknik Kimia S1', '', '', ''),
('197103011998031001', 'Ika Bagus Priyambada, S.T., M.Eng.', 'III/a', 'Asisten Ahli', 'S2', 1997, 'Buangan Padat, Amdal', 'Ijin Belajar', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Lingkungan', 'Teknik Lingkungan S1', '', '', ''),
('197103271999032002', 'Prof. Dr. Aries Susanty, S.T., M.T.', 'IV/a', 'Guru Besar', 'S3', 2008, 'Teknik Industri', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Industri', 'Teknik Industri S1', '', '', ''),
('197103301998022001', 'Dr.Ling Sri Sumiyati, S.T., M.Si.', 'III/c', 'Lektor', 'S3', 2019, 'Kes. Lingk. Biologi Dan Mikrobiologi', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Lingkungan', 'Teknik Lingkungan S1', '', '', ''),
('197104201998021001', 'Dr. Sulardjaka, S.T., M.T.', 'III/c', 'Lektor', 'S3', 2011, 'Engenering Mechanical', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Mesin', 'Teknik Mesin S1', '', '', ''),
('197104211999031003', 'Mohamad Said Kartono Tony Suryo Utomo, S.T., M.T.,', 'III/c', 'Lektor', 'S3', 2008, 'Teknik Sistem & Pengendalian Kelautan', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Mesin', 'Teknik Mesin S1', '', '', ''),
('197104291998021001', 'Priyo Nugroho Parmantoro, S.T., M.Eng.', 'III/c', 'Lektor', 'S2', 2003, 'Keairan', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Sipil', 'Teknik Sipil S1', '', '', ''),
('197105011997021001', 'Dr. Luqman Buchori, S.T., M.T.', 'IV/c', 'Lektor Kepala', 'S3', 2018, 'Komputasi Dinamika Fluida', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Kimia', 'Teknik Kimia S1', '', '', ''),
('197106061995121003', 'Agung Budi Prasetijo, S.T., M.I.T., Ph.D.', 'III/c', 'Lektor', 'S3', 2016, 'Sistem Komputer Dan Informasi', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Komputer', 'Teknik Komputer S1', '', '', ''),
('197106161999031003', 'Mochammad Facta, S.T., M.T., Ph.D.', 'IV/a', 'Lektor Kepala', 'S3', 2012, 'Teknik Tenaga Listrik', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Elektro', 'Teknik Elektro S2', '', '', ''),
('197107191998022001', 'Ajub Ajulian Zahra Macrina, S.T., M.T.', 'IV/a', 'Lektor Kepala', 'S2', 2005, 'Telekomunikasi', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Elektro', 'Teknik Elektro S1', '', '', ''),
('197107231998022001', 'Dr. Yulita Arni Priastiwi, S.T., M.T.', 'III/c', 'Lektor', 'S3', 2016, 'Struktur', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Sipil', 'Teknik Sipil S1', '', '', ''),
('197107241997021001', 'Dr. Ing. Asnawi, S.T.', 'IV/a', 'Lektor Kepala', 'S3', 2005, 'Perencanaan Kota Pwk', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Perencanaan Wilayah dan Kota', 'Perencanaan Wilayah dan Kota S', '', '', ''),
('197108181997021001', 'Dr. Agus Suprihanto, S.T, M.T.', 'IV/b', 'Lektor Kepala', 'S3', 2001, 'Failure Analisis', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Mesin', 'Teknik Mesin S1', '', '', ''),
('197110231998022001', 'Sri Rahayu, S.Si., M.Si.', 'III/c', 'Lektor', 'S2', 2005, 'Geografi Kota Sistem Informasi Perenc', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Perencanaan Wilayah dan Kota', 'Perencanaan Wilayah dan Kota S', '', '', ''),
('197111241998031002', 'Mohammad Muktiali, S.E., M.Si., M.T.', 'IV/a', 'Lektor Kepala', 'S2', 2006, 'Sintesis Biomaterial Untuk Implantasi Ulang', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Perencanaan Wilayah dan Kota', 'Perencanaan Wilayah dan Kota S', '', '', ''),
('197112181995121001', 'Dr. Wahyul Amien Syafei, S.T., M.T.', 'IV/a', 'Lektor Kepala', 'S3', 2010, 'Telekomunikasi', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Elektro', 'Teknik Elektro S2', '', '', ''),
('197204221999031004', 'Dr. Abdul Syakur, S.T., M.T.', 'IV/a', 'Lektor Kepala', 'S3', 2015, 'Teknik Tenaga Listrik', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Elektro', 'Teknik Elektro S1', '', '', ''),
('197205102001121001', 'Bagus Hario Setiadji, S.T., M.T., Ph.D.', 'IV/a', 'Lektor Kepala', 'S3', 2010, 'Transportasi', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Sipil', 'Teknik Sipil S3', '', '', ''),
('197205312000031001', 'Kami Hari Basuki, S.T., M.T.', 'III/a', 'Lektor', 'S2', 2001, 'Transportasi', 'Ijin Belajar', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Sipil', 'Teknik Sipil S1', '', '', ''),
('197206061999031001', 'Darjat, S.T., M.T.', 'IV/a', 'Lektor Kepala', 'S2', 2005, 'Elektronika', 'Ijin Belajar', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Elektro', 'Teknik Elektro S1', '', '', ''),
('197206091998031001', 'Prof. Dr. Widayat, S.T., M.T.', 'IV/b', 'Guru Besar', 'S3', 2011, 'Ilmu Sistem Proses Kimia', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Kimia', 'Teknik Kimia S1', '', '', ''),
('197206172000121001', 'Dr. Yudi Basuki, S.T., M.T.', 'III/c', 'Lektor', 'S3', 2002, 'Perec Wil &Kota Perec Transformasi', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Perencanaan Wilayah dan Kota', 'Perencanaan Wilayah dan Kota S', '', '', ''),
('197208302000031001', 'Dr. Badrus Zaman, S.T., M.T.', 'IV/a', 'Lektor Kepala', 'S3', 2015, 'Pengelolaan Wilayah Pesisir, Pengelolaan Kualitas ', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Lingkungan', 'Teknik Lingkungan S1', '', '', ''),
('197212311998022001', 'Dr. Ratna Purwaningsih, S.T., M.T.', 'IV/a', 'Lektor Kepala', 'S3', 2013, 'Sistem modelling dan Industry Sustainability', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Industri', 'Teknik Industri S1', '', '', ''),
('197301121998032001', 'Wido Prananing Tyas, S.T., MDP, Ph.D.', 'IV/a', 'Lektor Kepala', 'S3', 2015, 'Perenc Wil & Kota Manajemen Kota', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Perencanaan Wilayah dan Kota', 'Perencanaan Wilayah dan Kota S', '', '', ''),
('197301302000032001', 'Nurandani Hardyanti, S.T., M.T.', 'IV/a', 'Lektor Kepala', 'S2', 2013, 'Pengelolaan Limbah Cair dan Udara', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Lingkungan', 'Teknik Lingkungan S1', '', '', ''),
('197302041997021001', 'Aghus Sofwan, S.T., M.T., Ph.D.', 'III/d', 'Lektor', 'S3', 2012, 'Sistem Komputer Dan Informasi', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Elektro', 'Teknik Elektro S1', '', '', ''),
('197302261998021001', 'Dr. Adian Fatchur Rochim, S.T., M.T.', 'IV/a', 'Lektor Kepala', 'S3', 2019, 'Network System', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Komputer', 'Teknik Komputer S1', '', '', ''),
('197303051997021001', 'Muchammad, S.T., M.T.', 'IV/a', 'Lektor Kepala', 'S2', 2003, 'Presurre Vessel Technology', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Mesin', 'Teknik Mesin S1', '', '', ''),
('197303171999031001', 'Ojo Kurdi, S.T., M.T., Ph.D.', 'IV/a', 'Lektor Kepala', 'S3', 2002, 'Dynamic Of Vehicle', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Mesin', 'Teknik Mesin S1', '', '', ''),
('197305072002122002', 'Dr. Naniek Utami Handayani, S.Si., M.T.', 'III/c', 'Lektor', 'S3', 2013, 'Teknik Industri', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Industri', 'Teknik Industri S1', '', '', ''),
('197305262000121001', 'Dr. Susatyo Handoko, S.T., M.T.', 'III/c', 'Lektor', 'S3', 2015, 'Ketenagaan', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Elektro', 'Teknik Elektro S1', '', '', ''),
('197306161999031001', 'Bharoto, S.T., M.T.', 'III/c', 'Lektor', 'S2', 2010, 'Sejarah, Teori & Kritik Arsitektur', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Arsitektur', 'Arsitektur S1', '', '', ''),
('197306211997021001', 'Prof. Tutuk Djoko Kusworo, S.T., M.Eng., Ph.D.', 'IV/b', 'Guru Besar', 'S3', 2008, 'Teknologi Membran', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Kimia', 'Teknik Kimia S1', '', '', ''),
('197307021999031001', 'Dr.Eng. Achmad Widodo, S.T., M.T.', 'IV/a', 'Lektor Kepala', 'S3', 2007, 'Nodal Analysis', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Mesin', 'Teknik Mesin S1', '', '', ''),
('197309262000121001', 'Dr. Iwan Setiawan, S.T., M.T.', 'IV/a', 'Lektor Kepala', 'S3', 2016, 'Teknik Elektro', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Elektro', 'Teknik Elektro S1', '', '', ''),
('197310022000121001', 'Dr. Okto Risdianto Manullang, S.T., M.T.', 'III/c', 'Lektor', 'S3', 2016, 'Transportasi', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Perencanaan Wilayah dan Kota', 'Perencanaan Wilayah dan Kota S', '', '', ''),
('197310172000121001', 'Eko Sasmito Hadi, S.T., M.T.', 'III/c', 'Lektor', 'S2', 2002, 'Sistem Perkapalan', 'Ijin Belajar', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Perkapalan', 'Teknik Perkapalan S1', '', '', ''),
('197310242000031001', 'Wiharyanto Oktiawan, S.T., M.T.', 'III/c', 'Lektor', 'S2', 2000, 'Air Bersih Dan Air Buangan', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Lingkungan', 'Teknik Lingkungan S1', '', '', ''),
('197311061998022001', 'Rani Rumita, S.T., M.T.', 'III/a', 'Asisten Ahli', 'S2', 2005, 'Teknik Industri', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Industri', 'Teknik Industri S1', '', '', ''),
('197312172000121001', 'Dr.Eng. Deddy Chrismianto, S.T., M.T.', 'III/c', 'Lektor', 'S3', 2013, 'Teknik Produksi & Material Kelautan', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Perkapalan', 'Teknik Perkapalan S1', '', '', ''),
('197312211999031002', 'Dr. Denny Nurkertamanda, S.T., M.T.', 'IV/a', 'Lektor Kepala', 'S3', 2018, 'Teknik Industri', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Industri', 'Teknik Industri S1', '', '', ''),
('197401311999031003', 'Dr. Ing. Sudarno, S.T., M.Sc.', 'III/d', 'Lektor', 'S3', 2011, 'Buangan B3, Pencemaran Tanah', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Lingkungan', 'Teknik Lingkungan S1', '', '', ''),
('197402141999031002', 'Haryono Setiyo Huboyo, S.T., M.T., Ph.D.', 'III/d', 'Lektor', 'S3', 2013, 'Pencemaran Udara', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Lingkungan', 'Teknik Lingkungan S1', '', '', ''),
('197402142000121001', 'Parlindungan Manik, S.T., M.T.', 'IV/a', 'Lektor Kepala', 'S2', 2002, 'Manajemen Operasional', 'Ijin Belajar', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Perkapalan', 'Teknik Perkapalan S1', '', '', ''),
('197402231997021001', 'Edward Endrianto Pandelaki, S.T., M.T., Ph.D.', 'III/c', 'Lektor', 'S3', 2010, 'Perancangan Arsitektur', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Arsitektur', 'Ilmu Arsitektur dan Perkotaan ', '', '', ''),
('197403042000121001', 'Prof. Dr. Jamari, S.T., M.T.', 'III/d', 'Guru Besar', 'S3', 2006, 'Tribologi', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Mesin', 'Teknik Mesin S2', '', '', ''),
('197403081999031005', 'Syaiful, S.T., M.T., Ph.D.', 'III/d', 'Lektor', 'S3', 2010, 'Internal Combution Engine', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Mesin', 'Teknik Mesin S2', '', '', ''),
('197403162001121001', 'Dr. Singgih Saptadi, S.T., M.T.', 'III/c', 'Lektor', 'S3', 2016, 'Teknik Industri', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Industri', 'Teknik Industri S1', '', '', ''),
('197403271999031002', 'Dr.sc.agr. Iwan Rudiarto, S.T., M.Sc.', 'IV/a', 'Lektor Kepala', 'S3', 2010, 'Manajemen Sumber Daya Manusia', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Perencanaan Wilayah dan Kota', 'Perencanaan Wilayah dan Kota S', '', '', ''),
('197404092008012010', 'Diah Intan Kusumo Dewi, S.T., M.Eng.', 'III/b', 'Asisten Ahli', 'S2', 2004, 'Perenc Wil & Kota', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Perencanaan Wilayah dan Kota', 'Perencanaan Wilayah dan Kota S', '', '', ''),
('197404262000121001', 'Darminto Pujotomo, S.T., M.T.', 'IV/a', 'Lektor Kepala', 'S2', 2002, 'Manajemen Industri', 'Tugas Belajar LN', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Industri', 'Teknik Industri S1', '', '', ''),
('197405231998021001', 'Prof. Dr. Andri Cahyo Kumoro, S.T., M.T.', 'IV/b', 'Guru Besar', 'S3', 2007, 'Ilmu Fenomena Perpindahan', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Kimia', 'Teknik Kimia S1', '', '', ''),
('197406181999031002', 'Untung Budiarto, S.T., M.T.', 'III/c', 'Lektor', 'S2', 2003, 'Teknik Sistem & Pengendalian Kelautan', 'Ijin Belajar', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Perkapalan', 'Teknik Perkapalan S1', '', '', ''),
('197406271999031002', 'Dr. Maman Somantri, S.T., M.T.', 'III/c', 'Lektor', 'S3', 2015, 'Rekayasa Perangkat Lunak, IT Management, Sistem In', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Elektro', 'Teknik Elektro S1', '', '', ''),
('197407201998032001', 'Dr.Ars. Anita Ratnasari Rakhmatulloh, S.T., M.T.', 'III/c', 'Lektor', 'S3', 2018, 'Perenc Wil & Kota Perenc Transportasi', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Perencanaan Wilayah dan Kota', 'Perencanaan Wilayah dan Kota S', '', '', ''),
('197408032008011008', 'Widjonarko, S.T., M.T.', 'III/c', 'Lektor', 'S2', 2007, 'Manaj & Rekayasa Infrastruktur', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Perencanaan Wilayah dan Kota', 'Perencanaan Wilayah dan Kota S', '', '', ''),
('197409122000121002', 'Sriyanto, S.T., M.T.', 'IV/a', 'Lektor Kepala', 'S2', 2002, 'Teknik Industri', 'Tugas Belajar LN', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Industri', 'Teknik Industri S1', '', '', ''),
('197409212000031002', 'Dr.Ing Prihadi Nugroho, S.T., M.T.', 'III/c', 'Lektor', 'S3', 2014, 'Perenc Wil &Kota Ekonomi Wilayah', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Perencanaan Wilayah dan Kota', 'Perencanaan Wilayah dan Kota S', '', '', '');
INSERT INTO `dosen` (`nip`, `nama`, `golongan`, `jabatan`, `pendidikan`, `th_lulus`, `kepakaran`, `status_bekerja`, `jenis`, `status_kepegawaian`, `fakultas`, `departemen`, `program_studi`, `jenis_kelamin`, `no_telp`, `email`) VALUES
('197409302001121002', 'Mochamad Arief Budihardjo, S.T., M.Eng.Sc, Env.Eng', 'III/d', 'Lektor Kepala', 'S3', 2015, 'Manajemen Lingkungan', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Lingkungan', 'Teknik Lingkungan S1', '', '', ''),
('197410202000121001', 'Sukawi, S.T., M.T.', 'IV/a', 'Lektor Kepala', 'S2', 2002, 'Perancangan Arsitektur', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Arsitektur', 'Arsitektur S1', '', '', ''),
('197412162000122001', 'Dr.Ing. Silviana, S.T., M.T.', 'III/c', 'Lektor', 'S3', 2014, 'Teknik Separasi', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Kimia', 'Teknik Kimia S1', '', '', ''),
('197501172000032001', 'Nita Aryanti, S.T., M.T., Ph.D.', 'IV/a', 'Lektor Kepala', 'S3', 2009, 'Teknologi Membran Emulsi', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Kimia', 'Teknik Kimia S1', '', '', ''),
('197501181999031001', 'Sri Nugroho, S.T., M.T., Ph.D.', 'III/d', 'Lektor', 'S3', 2009, 'Material Science', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Mesin', 'Teknik Mesin S1', '', '', ''),
('197501222000121001', 'Dr.Eng. Ahmad Fauzan Zakki, S.T., M.T.', 'III/c', 'Lektor Kepala', 'S3', 2012, 'Struktur Kapal dan FSI Analysis', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Perkapalan', 'Teknik Perkapalan S1', '', '', ''),
('197503062000121001', 'Dr.rer.oec. Arfan Bakhtiar, S.T., M.T.', 'IV/a', 'Lektor Kepala', 'S3', 2014, 'Manajemen Industri', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Industri', 'Teknik Industri S1', '', '', ''),
('197503252003121002', 'Ari Wibawa Budi Santosa, S.T., M.Si.', 'III/d', 'Lektor', 'S2', 2005, 'Managemen Sumber Daya Pantai', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Perkapalan', 'Teknik Perkapalan S1', '', '', ''),
('197504281999031001', 'Jati Utomo Dwi Hatmoko, S.T., M.M., M.Sc., Ph.D.', 'III/d', 'Lektor', 'S3', 2008, 'Manajemen Konstruksi', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Sipil', 'Teknik Sipil S2', '', '', ''),
('197505291998021001', 'Prof. Dr.rer.nat. Heru Susanto, S.T., M.M., M.T.', 'IV/c', 'Guru Besar', 'S3', 2007, 'Tek. Membran', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Kimia', 'Teknik Kimia S1', '', '', ''),
('197506082005011001', 'Eko Handoyo, S.T., M.T.', 'III/d', 'Lektor', 'S2', 2003, 'Komputer', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Elektro', 'Teknik Elektro S1', '', '', ''),
('197508112000121001', 'Dr.Eng. Maryono, S.T., M.T.', 'III/c', 'Lektor', 'S3', 2015, 'Perencanaan Manjemen Lingkungan', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Perencanaan Wilayah dan Kota', 'Perencanaan Wilayah dan Kota S', '', '', ''),
('197509081999031002', 'Dr. Aris Triwiyatno, S.T., M.T.', 'III/c', 'Lektor', 'S3', 2012, 'Kecerdasan Buatan, Software Engineering', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Elektro', 'Teknik Elektro S1', '', '', ''),
('197509152000121001', 'Dr.nat.tech. Siswo Sumardiono, S.T., M.T.', 'III/d', 'Lektor Kepala', 'S3', 2005, 'Modifikasi Starch', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Kimia', 'Teknik Kimia S1', '', '', ''),
('197509222003122002', 'Maya Damayanti, S.T., M.A., Ph.D.', 'III/c', 'Lektor', 'S3', 2014, 'Manajemen Kota Ek Wil Kota', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Perencanaan Wilayah dan Kota', 'Perencanaan Wilayah dan Kota S', '', '', ''),
('197510211999031004', 'Dr.Eng. Hartono Yudo, S.T., M.T.', 'IV/a', 'Lektor Kepala', 'S3', 2014, 'Perancangan Teknik Teknik Mesin', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Perkapalan', 'Teknik Perkapalan S1', '', '', ''),
('197510281999031004', 'Prof. Dr. Hadiyanto, S.T., M.Sc.', 'IV/a', 'Guru Besar', 'S3', 2007, 'Ilmu Teknik Kimia', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Kimia', 'Teknik Kimia S1', '', '', ''),
('197602162009121001', 'Dr. techn. Khoiri Rozi, S.T., M.T.', 'III/b', 'Asisten Ahli', 'S3', 2019, 'Sistem Cerdas', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Mesin', 'Teknik Mesin S1', '', '', ''),
('197602252000121001', 'Ilham Nurhuda, S.T., M.T., Ph.D.', 'III/d', 'Lektor Kepala', 'S3', 2011, 'Struktur', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Sipil', 'Teknik Sipil S1', '', '', ''),
('197603052000122001', 'Dr.Ing. Wakhidah Kurniawati, S.T., M.T.', 'IV/a', 'Lektor Kepala', 'S3', 2018, 'Perenc & Perenc Kota', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Perencanaan Wilayah dan Kota', 'Perencanaan Wilayah dan Kota S', '', '', ''),
('197603212000122001', 'Amelia Kusuma Indriastuti, S.T., M.T.', 'III/d', 'Lektor', 'S2', 2002, 'Sipil Transportasi', 'Ijin Belajar', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Sipil', 'Teknik Sipil S1', '', '', ''),
('197604161999032002', 'Dr. Aprilina Purbasari, S.T., M.T.', 'IV/a', 'Lektor Kepala', 'S3', 2018, 'T. Kimia', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Kimia', 'Teknik Kimia S1', '', '', ''),
('197605252000122001', 'Dr. Ing. Wiwandari Handayani, S.T., M.T., MPS', 'IV/a', 'Lektor Kepala', 'S3', 2011, 'Pernc Ekonomi Wilayah', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Perencanaan Wilayah dan Kota', 'Perencanaan Wilayah dan Kota S', '', '', ''),
('197605282000122001', 'Dyah Hesti Wardhani, S.T., M.T., Ph.D.', 'III/d', 'Lektor Kepala', 'S3', 2009, 'Pangan Fungsional', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Kimia', 'Teknik Kimia S1', '', '', ''),
('197608042000121002', 'Dr. Ing. Suherman, S.T., M.T.', 'IV/a', 'Lektor Kepala', 'S3', 2007, 'Teknik Reaksi', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Kimia', 'Teknik Kimia S1', '', '', ''),
('197608121999031002', 'Rukuh Setiadi, S.T., MEM.,Ph.D.', 'III/c', 'Lektor', 'S3', 2017, 'Perencanaan Wil Kota Majemen Lingkungan', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Perencanaan Wilayah dan Kota', 'Perencanaan Wilayah dan Kota S', '', '', ''),
('197608122010121002', 'Dr. Dian Agus Widiarso, S.T., M.T.', 'III/b', 'Asisten Ahli', 'S3', 2020, 'Ilmu Kesehatan Anak', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Geologi', 'Teknik Geologi S1', '', '', ''),
('197609112002121001', 'Septana Bagus Pribadi, S.T., M.T.', 'III/b', 'Asisten Ahli', 'S2', 2001, 'Perancangan Arsitektur', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Arsitektur', 'Arsitektur S1', '', '', ''),
('197703092008121001', 'Dr. L.M. Sabri, S.T., M.T.', 'III/b', 'Lektor', 'S3', 2018, 'Geodesi', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Geodesi', 'Teknik Geodesi S1', '', '', ''),
('197705242003122001', 'Landung Esariti, S.T., MPS', 'III/c', 'Lektor', 'S2', 2005, 'Perenc Wil & Kota Properti', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Perencanaan Wilayah dan Kota', 'Perencanaan Wilayah dan Kota S', '', '', ''),
('197705262010121001', 'Eko Didik Widianto, S.T., M.T.', 'III/c', 'Lektor', 'S2', 2004, 'Sistem Komputer', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Komputer', 'Teknik Komputer S1', '', '', ''),
('197706152008011011', 'Rinta Kridalukmana, S.Kom., M.T.', 'III/d', 'Lektor', 'S2', 2007, 'Teknologi Informasi', 'Tugas Belajar LN', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Komputer', 'Teknik Komputer S1', '', '', ''),
('197706222010121001', 'Teguh Prakoso, S.T., M.T., Ph.D.', 'III/c', 'Lektor', 'S3', 2014, 'Medan Elektro Magnetik', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Elektro', 'Teknik Elektro S2', '', '', ''),
('197708262006041001', 'Munawar Agus Riyadi, S.T., M.T., Ph.D.', 'III/d', 'Lektor', 'S3', 2012, 'Elektronika', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Elektro', 'Teknik Elektro S2', '', '', ''),
('197710032000121001', 'Dr. Purnawan Adi Wicaksono, S.T., M.T.', 'IV/a', 'Lektor Kepala', 'S3', 2018, 'Manajemen Operasional', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Industri', 'Teknik Industri S1', '', '', ''),
('197712112005011002', 'Dr.rer.nat. Thomas Triadi Putranto, S.T., M.Eng.', 'III/c', 'Lektor Kepala', 'S3', 2014, 'Geoteknik', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Geologi', 'Teknik Geologi S1', '', '', ''),
('197802062010121003', 'Bandi Sasmito, S.T., M.T.', 'III/c', 'Lektor', 'S2', 2008, 'Penginderaan Jauh', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Geodesi', 'Teknik Geodesi S1', '', '', ''),
('197803032010122001', 'Titik Istirokhatun, S.T., M.Sc.', 'III/d', 'Lektor Kepala', 'S2', 2009, 'Teknologi Pengelolaan Lingkungan', 'Tugas Belajar LN', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Lingkungan', 'Teknik Lingkungan S1', '', '', ''),
('197805142005011001', 'Dr. Budi Prasetyo Samadikun, S.T., M.Si.', 'III/b', 'Lektor', 'S3', 2015, 'Manajemen Lingkungan', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Lingkungan', 'Teknik Lingkungan S1', '', '', ''),
('197808112008121003', 'Ferry Hermawan, S.T., M.T., Ph.D.', 'III/c', 'Lektor', 'S3', 2015, 'Geodesi', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Sipil', 'Teknik Sipil S1', '', '', ''),
('197811252008121001', 'Andri Suprayogi, S.T., M.T.', 'III/c', 'Lektor', 'S2', 2008, 'Geodesi', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Geodesi', 'Teknik Geodesi S1', '', '', ''),
('197902192003122001', 'Diana Puspita Sari, S.T., M.T.', 'IV/a', 'Lektor Kepala', 'S2', 2008, 'Teknik Industri', 'Tugas Belajar DN', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Industri', 'Teknik Industri S1', '', '', ''),
('197910022009122001', 'Dr. Oky Dwi Nurhayati, S.T., M.T.', 'III/c', 'Lektor', 'S3', 2011, 'Software Engineering', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Komputer', 'Teknik Komputer S1', '', '', ''),
('198007162008011017', 'Dr. Rifky Ismail, S.T., M.T.', 'III/d', 'Lektor', 'S3', 2013, 'Perenc Wil & Kota', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Mesin', 'Teknik Mesin S1', '', '', ''),
('198012112010121001', 'Enda Wista Sinuraya, S.T., M.T.', 'III/c', 'Lektor', 'S2', 2010, 'Teknik Komputer', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Elektro', 'Teknik Elektro S1', '', '', ''),
('198109132003121002', 'Ary Arvianto, S.T., M.T.', 'III/c', 'Lektor', 'S2', 2009, 'Teknik Industri Scm', 'Tugas Belajar DN', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Industri', 'Teknik Industri S1', '', '', ''),
('198201202008011005', 'Ganjar Samudro, S.T., M.T.', 'III/d', 'Lektor', 'S2', 2007, 'Bioenergi dan Sanitasi Lingkungan', 'Tugas Belajar LN', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Lingkungan', 'Teknik Lingkungan S1', '', '', ''),
('198201312010121003', 'Wahyu Caesarendra, S.T., M.Eng., Ph.D.', 'III/c', 'Lektor', 'S3', 2015, 'MEKATRONIKA', 'Non Aktif', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Mesin', 'Teknik Mesin S1', '', '', ''),
('198207162012121004', 'Dr. Kresno Wikan Sadono, S.T., M.Eng.', 'III/b', 'Pengajar', 'S3', 2019, 'Geoteknik', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Sipil', 'Teknik Sipil S1', '', '', ''),
('198207212003122001', 'Dr.Ing. Santy Paulla Dewi, S.T., M.T.', 'III/c', 'Lektor', 'S3', 2017, 'Perenc Transportasi', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Perencanaan Wilayah dan Kota', 'Perencanaan Wilayah dan Kota S', '', '', ''),
('198211072005012001', 'Dr.Ing. Novie Susanto, S.T., M.Eng.', 'III/c', 'Lektor', 'S3', 2015, 'Ilmu Perancangan Sistem Kerja dan Ergonomi', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Industri', 'Teknik Industri S1', '', '', ''),
('198301222006041002', 'Fahrudin, S.T., M.T.', 'III/c', 'Lektor', 'S2', 2011, 'Geoteknik', 'Tugas Belajar LN', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Geologi', 'Teknik Geologi S1', '', '', ''),
('198303192010121002', 'Kurniawan Teguh Martono, S.T., M.T.', 'III/c', 'Lektor', 'S2', 2009, 'Human Computer Interaction, Komputer Grafik, Game ', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Komputer', 'Teknik Komputer S1', '', '', ''),
('198305012012121003', 'Sariffuddin, S.T., M.T.', 'III/c', 'Lektor', 'S2', 2009, 'Manajemen bencana', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Perencanaan Wilayah dan Kota', 'Perencanaan Wilayah dan Kota S', '', '', ''),
('198401292009121003', 'Dr.Eng. Bangun Indrakusumo Radityo Harsritanto, S.', 'III/c', 'Lektor', 'S3', 2016, 'universal desain', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Arsitektur', 'Arsitektur S1', '', '', ''),
('198402172006042002', 'Nia Budi Puspitasari, S.T., M.T.', 'III/c', 'Lektor', 'S2', 2009, 'Teknik Industri', 'Ijin Belajar', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Industri', 'Teknik Industri S1', '', '', ''),
('198403262006042001', 'Dyah Ika Rinawati, S.T., M.T.', 'III/c', 'Lektor', 'S2', 2010, 'Teknik Industri', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Industri', 'Teknik Industri S1', '', '', ''),
('198406272012121003', 'Resza Riskiyanto, S.T., M.T.', 'III/c', 'Lektor', 'S2', 2010, 'Perancangan Arsitektur', 'Tugas Belajar DN', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Arsitektur', 'Arsitektur S1', '', '', ''),
('198412062010122008', 'Ike Pertiwi Windasari, S.T., M.T.', 'III/b', 'Lektor', 'S2', 2009, 'Teknik', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Komputer', 'Teknik Komputer S1', '', '', ''),
('198412112010122005', 'Dessy Ariyanti, S.T., M.T., Ph.D.', 'III/b', 'Lektor', 'S3', 2018, 'Teknik Kimia', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Kimia', 'Teknik Kimia S1', '', '', ''),
('198501252012121005', 'Arwan Putra Wijaya, S.T., M.T.', 'III/b', 'Asisten Ahli', 'S2', 2011, 'Geomatika, Pertanahan dan Sistem Informasi Geograf', 'Tugas Belajar LN', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Geodesi', 'Teknik Geodesi S1', '', '', ''),
('198505262010121005', 'Dr. Eng. Andi Trimulyono, S.T., M.T.', 'III/b', 'Asisten Ahli', 'S3', 2010, 'Teknik perkapalan', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Perkapalan', 'Teknik Perkapalan S1', '', '', ''),
('198601152010122004', 'Noer Abyor Handayani (Noera), S.T., M.T.', 'III/c', 'Lektor', 'S2', 2010, 'Teknik Kimia', 'Tugas Belajar DN', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Kimia', 'Teknik Kimia S1', '', '', ''),
('198603192012121002', 'Wiwik Budiawan, S.T., M.T.', 'III/c', 'Lektor', 'S2', 2011, 'Teknik Industri, IT for Ergonomics', 'Tugas Belajar LN', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Industri', 'Teknik Industri S1', '', '', ''),
('198608262010121005', 'Berlian Arswendo Adietya, S.T., M.T.', 'III/d', 'Lektor', 'S2', 2010, 'Teknik Kelautan', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Perkapalan', 'Teknik Perkapalan S1', '', '', ''),
('198706212012121001', 'Asep Muhamad Samsudin, S.T., M.T.', 'III/b', 'Asisten Ahli', 'S2', 2011, 'Teknologi Membran', 'Tugas Belajar LN', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Kimia', 'Teknik Kimia S1', '', '', ''),
('198802252012121003', 'Arya Rezagama, S.T., M.T.', 'III/b', 'Asisten Ahli', 'S2', 2012, 'Akun Biaya & Manaj. Bisnis', 'Aktif Bekerja', 'Tenaga Dosen', 'PNS', 'Fakultas Teknik', 'Departemen Teknik Lingkungan', 'Teknik Lingkungan S1', '', '', ''),
('pengusul', 'Dosen', '', '', '', 0000, '', '', '', '', '', '', 'Teknik Elektro', 'Laki-laki', '0853722847', 'pengusul@test.com'),
('reviewer1', 'reviewer1', '4', '', '', 0000, '', '', '', '', 'teknik', 'elektro', 'elektro', 'laki laki', '', ''),
('reviewer2', 'reviewer2', '4', '', '', 0000, '', '', '', '', 'teknik', 'elektro', 'elektro', 'laki laki', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `dsn_penelitian`
--

CREATE TABLE `dsn_penelitian` (
  `id` int(10) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `id_proposal` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dsn_pengabdian`
--

CREATE TABLE `dsn_pengabdian` (
  `id` int(10) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `id_proposal` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dsn_pengabdian`
--

INSERT INTO `dsn_pengabdian` (`id`, `nip`, `id_proposal`) VALUES
(1, '195612281985031003', 1);

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id` int(3) NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_selesai` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_penelitian`
--

CREATE TABLE `jadwal_penelitian` (
  `id` int(3) NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_monev` date NOT NULL,
  `tgl_akhir` date NOT NULL,
  `tgl_selesai` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal_penelitian`
--

INSERT INTO `jadwal_penelitian` (`id`, `tgl_mulai`, `tgl_monev`, `tgl_akhir`, `tgl_selesai`) VALUES
(14, '2021-02-01', '2021-02-09', '2021-02-19', '2021-03-12');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_pengabdian`
--

CREATE TABLE `jadwal_pengabdian` (
  `id` int(3) NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_akhir` date NOT NULL,
  `tgl_selesai` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jenispenelitian`
--

CREATE TABLE `jenispenelitian` (
  `id` int(11) NOT NULL,
  `jenis` varchar(30) NOT NULL,
  `tgl` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenispenelitian`
--

INSERT INTO `jenispenelitian` (`id`, `jenis`, `tgl`) VALUES
(1, 'Skema Penelitian', 2020);

-- --------------------------------------------------------

--
-- Table structure for table `komponen_nilai_pengabdian`
--

CREATE TABLE `komponen_nilai_pengabdian` (
  `id` int(5) NOT NULL,
  `id_skema_pengabdian` int(5) NOT NULL,
  `komponen_penilaian` varchar(1000) NOT NULL,
  `bobot` int(35) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `komponen_nilai_pengabdian`
--

INSERT INTO `komponen_nilai_pengabdian` (`id`, `id_skema_pengabdian`, `komponen_penilaian`, `bobot`) VALUES
(1, 1, 'Perumusan Masalah :\r\n                                <ol>\r\n                                    <li>Ketajaman rumusan masalah</li>\r\n                                    <li>Tujuan Pengabdian</li>\r\n                                    <li>Kesesuaian masalah yang dirumuskan dengan tujuan pengabdian</li>\r\n                                </ol>', 25),
(2, 1, 'Metode : <br>\r\n                            Ketepatan dan kesesuaian metode yang digunakan dengan permasalahan dan tujuan pengabdian', 25),
(3, 1, 'Luaran : <br>\r\n                        Rasionalitas luaran, dan keterukuran hasil yang dicapai', 25),
(4, 1, 'Tinjauan Pustaka : \r\n                            <ol>\r\n                                <li>Relevansi</li>\r\n                                <li>Penyusunan Daftar Pustaka</li>\r\n                            </ol>', 15),
(5, 1, 'Kelayakan Pengabdian : \r\n                            <ol>\r\n                                <li>Kesesuaian waktu</li>\r\n                                <li>Kesesuaian biaya</li>\r\n                                <li>Kesesuaian personalia</li>\r\n                            </ol>', 10),
(6, 2, 'kesimpulan', 50),
(7, 2, 'abstrak', 30),
(8, 3, 'adsad', 20);

-- --------------------------------------------------------

--
-- Table structure for table `komp_penilaian_penelitian`
--

CREATE TABLE `komp_penilaian_penelitian` (
  `id` int(11) NOT NULL,
  `id_jenis` int(5) NOT NULL,
  `komponen` varchar(1000) NOT NULL,
  `bobot` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `komp_penilaian_penelitian`
--

INSERT INTO `komp_penilaian_penelitian` (`id`, `id_jenis`, `komponen`, `bobot`) VALUES
(1, 1, 'Keterkaitan antara proposal dengan RIP/ Bidang Unggulan/ PIP Undip<br>', 20),
(2, 1, 'ejelasan perumusan masalah', 10),
(3, 1, 'eutuhan peta jalan (peta jalan) penelitian', 10),
(4, 1, 'im Peneliti:<br>a. Komitmen dan kesungguhan<br>b. Rekam jejak', 20),
(5, 1, 'Kesesuaian penelitian dengan rekam jejak', 10),
(6, 1, 'Potensi tercapainya luaran: Publikasi internasional (terindeks Scopus/ Clarivate Analitics)<br>', 20),
(7, 1, 'Kewajaran RAB', 10),
(8, 1, 'Kesesuaian jadwal pelaksanaan penelitian ', 20);

-- --------------------------------------------------------

--
-- Table structure for table `koordinator`
--

CREATE TABLE `koordinator` (
  `nip` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `laporan_akhir_penelitian`
--

CREATE TABLE `laporan_akhir_penelitian` (
  `id` int(11) NOT NULL,
  `id_proposal` int(6) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `tgl_upload` date NOT NULL,
  `file1` varchar(50) NOT NULL,
  `file2` varchar(50) NOT NULL,
  `file3` varchar(50) NOT NULL,
  `file4` varchar(50) NOT NULL,
  `catatan` varchar(300) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `laporan_akhir_pengabdian`
--

CREATE TABLE `laporan_akhir_pengabdian` (
  `id` int(6) NOT NULL,
  `id_proposal` int(6) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `laporan_akhir` varchar(100) DEFAULT NULL,
  `belanja` varchar(100) DEFAULT NULL,
  `logbook` varchar(100) DEFAULT NULL,
  `luaran` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `laporan_monev_penelitian`
--

CREATE TABLE `laporan_monev_penelitian` (
  `id` int(6) NOT NULL,
  `id_proposal` int(6) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `tgl_upload` date NOT NULL,
  `file1` varchar(50) NOT NULL,
  `file2` varchar(50) NOT NULL,
  `file3` varchar(50) NOT NULL,
  `catatan` varchar(300) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `luaran`
--

CREATE TABLE `luaran` (
  `id` int(11) NOT NULL,
  `luaran` varchar(40) NOT NULL,
  `tgl` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `luaran`
--

INSERT INTO `luaran` (`id`, `luaran`, `tgl`) VALUES
(3, 'A', 2020),
(4, 'B', 2020);

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` varchar(14) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `program_studi` varchar(30) NOT NULL,
  `angkatan` year(4) NOT NULL,
  `jenis_kelamin` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mhs_penelitian`
--

CREATE TABLE `mhs_penelitian` (
  `id` int(10) NOT NULL,
  `nim` varchar(14) NOT NULL,
  `nama` varchar(70) NOT NULL,
  `id_proposal` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mhs_pengabdian`
--

CREATE TABLE `mhs_pengabdian` (
  `id` int(10) NOT NULL,
  `nim` varchar(14) NOT NULL,
  `nama` varchar(70) NOT NULL,
  `id_proposal` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mhs_pengabdian`
--

INSERT INTO `mhs_pengabdian` (`id`, `nim`, `nama`, `id_proposal`) VALUES
(1, '214523', 'sdadsawsadd', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mitra`
--

CREATE TABLE `mitra` (
  `id` int(6) NOT NULL,
  `nama_instansi` varchar(30) NOT NULL,
  `penanggung_jwb` varchar(30) NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `email` varchar(30) NOT NULL,
  `alamat` varchar(40) NOT NULL,
  `username` varchar(20) NOT NULL,
  `status` int(1) NOT NULL,
  `file_persetujuan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `nilai_penelitian`
--

CREATE TABLE `nilai_penelitian` (
  `id` int(11) NOT NULL,
  `id_proposal` int(10) NOT NULL,
  `id_komponen` int(10) NOT NULL,
  `skor` int(3) NOT NULL,
  `nilai` int(10) NOT NULL,
  `reviewer` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `nilai_proposal_penelitian`
--

CREATE TABLE `nilai_proposal_penelitian` (
  `id` bigint(10) NOT NULL,
  `id_proposal` bigint(10) NOT NULL,
  `komentar` varchar(1000) DEFAULT NULL,
  `cr_monev` varchar(1000) NOT NULL,
  `nilai` int(4) DEFAULT NULL,
  `komentar2` varchar(1000) DEFAULT NULL,
  `cr_monev2` varchar(1000) NOT NULL,
  `nilai2` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `nilai_proposal_pengabdian`
--

CREATE TABLE `nilai_proposal_pengabdian` (
  `id` bigint(10) NOT NULL,
  `id_proposal` bigint(10) NOT NULL,
  `komentar` varchar(1000) DEFAULT NULL,
  `nilai` int(4) DEFAULT NULL,
  `komentar2` varchar(1000) DEFAULT NULL,
  `nilai2` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai_proposal_pengabdian`
--

INSERT INTO `nilai_proposal_pengabdian` (`id`, `id_proposal`, `komentar`, `nilai`, `komentar2`, `nilai2`) VALUES
(1, 1, 'ded', 500, 'sadasd', 500);

-- --------------------------------------------------------

--
-- Table structure for table `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id` int(11) NOT NULL,
  `berita` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengumuman`
--

INSERT INTO `pengumuman` (`id`, `berita`) VALUES
(1, ''),
(2, '');

-- --------------------------------------------------------

--
-- Table structure for table `proposal_penelitian`
--

CREATE TABLE `proposal_penelitian` (
  `id` int(6) NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `abstrak` varchar(1000) NOT NULL,
  `lokasi` varchar(40) NOT NULL,
  `lama_pelaksanaan` varchar(20) NOT NULL,
  `biaya` varchar(12) NOT NULL,
  `id_sumberdana` int(3) NOT NULL,
  `id_luaran` int(2) NOT NULL,
  `mitra` varchar(100) NOT NULL,
  `id_jadwal` int(3) NOT NULL,
  `tgl_upload` date NOT NULL,
  `file` varchar(1000) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `proposal_pengabdian`
--

CREATE TABLE `proposal_pengabdian` (
  `id` int(6) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `id_mitra` int(10) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `abstrak` varchar(1000) NOT NULL,
  `lokasi` varchar(40) NOT NULL,
  `lama_pelaksanaan` varchar(20) NOT NULL,
  `biaya` varchar(12) NOT NULL,
  `id_skema` int(5) NOT NULL,
  `id_sumberdana` int(3) NOT NULL,
  `id_luaran` int(2) NOT NULL,
  `id_jadwal` int(3) NOT NULL,
  `tgl_upload` date NOT NULL,
  `file` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reviewer_penelitian`
--

CREATE TABLE `reviewer_penelitian` (
  `nip` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reviewer_penelitian`
--

INSERT INTO `reviewer_penelitian` (`nip`, `nama`) VALUES
('reviewer1', 'reviewer1'),
('reviewer2', 'reviewer2');

-- --------------------------------------------------------

--
-- Table structure for table `reviewer_pengabdian`
--

CREATE TABLE `reviewer_pengabdian` (
  `nip` varchar(25) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reviewer_pengabdian`
--

INSERT INTO `reviewer_pengabdian` (`nip`, `nama`) VALUES
('reviewer1', 'reviewer1'),
('reviewer2', 'reviewer2');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(1) NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `role`) VALUES
(1, 'Admin'),
(2, 'Reviewer'),
(3, 'Dosen'),
(4, 'Mitra');

-- --------------------------------------------------------

--
-- Table structure for table `skema_pengabdian`
--

CREATE TABLE `skema_pengabdian` (
  `id` int(5) NOT NULL,
  `jenis_pengabdian` varchar(40) NOT NULL,
  `tgl` year(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skema_pengabdian`
--

INSERT INTO `skema_pengabdian` (`id`, `jenis_pengabdian`, `tgl`) VALUES
(1, 'Pengabdian Inovatif', 2021);

-- --------------------------------------------------------

--
-- Table structure for table `sumberdana`
--

CREATE TABLE `sumberdana` (
  `id` int(3) NOT NULL,
  `sumberdana` varchar(40) NOT NULL,
  `tgl` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sumberdana`
--

INSERT INTO `sumberdana` (`id`, `sumberdana`, `tgl`) VALUES
(5, 'Sumbangan', 2020),
(8, 'Hibah', 2021);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `role`) VALUES
(1, '195511081983031002', 'c3292d1e1f58bae36b2e003a60db748d', 3),
(2, '195203121975011004', 'ffacc75394c81d12e8f30d8fb0a7dae3', 3),
(3, '195205051980111001', '7e857e8e9c4a1c8e38070a1448a3099b', 3),
(4, '195404301981032001', 'dacfb384cb9e18a0b4cf7a34ff97a2f3', 3),
(5, '196112281986031004', 'f78ecc933eb7106f60001ca5f56f66d6', 3),
(6, '195407171982032001', '801c4e7eaa04d9ffb9f17da820071b6f', 3),
(7, '195409301980032001', 'e1b2df831dda7d64f2eec509daa2075e', 3),
(8, '195611091985032002', '6a90d452ad43acac4d0fdab9a1c52cc1', 3),
(9, '195308191983031001', '7ee8e54e4c7c4a95c8869ba37bf47439', 3),
(10, '196204231987031003', 'e5eb5511b0a23e39b62edfbfcf7f203b', 3),
(11, '196005011986031003', 'eb4d48a31adfc06c3989b20c1b452641', 3),
(12, '195704221986031001', 'f31fca0c538ec22636cb5c1b596abed9', 3),
(13, '195512311983031014', 'e2b1e92326445e91c58b9a8278555ac0', 3),
(14, '195901091987031001', '8a7733e9d583fe2f8fd141cd7a38ca5a', 3),
(15, '196110221988031002', '66ad2412696fcd49b166f0019f67c555', 3),
(16, '196602201991021001', '609db0feffe2c4c48285ac961d92a307', 3),
(17, '196906121994031001', '8ad782f425f17a957909b2b3fb224059', 3),
(18, '195901051987031002', 'c23cc7938769550357f499458525658f', 3),
(19, '196003151987031001', 'efcf8323f5e6f6c29009c4d25749dae3', 3),
(20, '195905221988121001', 'd5f13da63288e0cb3dac3c5f8927113a', 3),
(21, '195811071988031001', '7c413e000526b800675871dc9cb37277', 3),
(22, '196004271987031001', 'f0393f5b8147fec0522a5d4c6b2541e1', 3),
(23, '196209171991021001', '296dfe6786effe7263bfd20f9067613f', 3),
(24, '195611261987031002', '69e8819f8c8e15adb2709b74fa529a6e', 3),
(25, '197105011997021001', '7b5e91aac14db02ab8f86bd9bcf36b56', 3),
(26, '196004121986032001', '6205935ec01ddd7680234e50e73cae81', 3),
(27, '196811111994121001', '84ae9366588e670bd89a6dcee061266b', 3),
(28, '196205201989021001', '3f8a4551767f29231af267d87d3d10b1', 3),
(29, '195807121983031032', 'ccc33a2dc0d03472141865d0b8fb7a1a', 3),
(30, '196006021986021001', '88c2a8f717a2029f493d8f2ca781558e', 3),
(31, '196312311990031022', 'b715168ab87a93c664e70d6cb7d19159', 3),
(32, '195905281988031001', '80abc44ba6cb7cd8b89cef42c1cb1c6f', 3),
(33, '195508211983031002', '29c9bd0aa42aec21656cde5953e2ea95', 3),
(34, '196107121988031003', '35b6fa6feaa96815d1e924dbe6234f62', 3),
(35, '195709131986031001', '158ed88538cc5fcaadb702e0dc7b679a', 3),
(36, '196007181989031001', '7f097293e8981fbcf7f8193bf2e06392', 3),
(37, '195906191985111001', '8afd0ae57f2d7e8a0540c3ff96259e9b', 3),
(38, '195906201987031003', '9626bd2aa424080d5543d7604740034e', 3),
(39, '196002171987032001', '07a4eea935fd16712120c3a04bf5ff61', 3),
(40, '195303091981031005', '827355b48185db31b632904246043859', 3),
(41, '195507271986031008', 'f84914fe020ae207ca6c01f1164b328a', 3),
(42, '196210161988031003', '16f6b2aec50e500dc0ea81a3b8fdb719', 3),
(43, '196405261989031002', '8bd14dbfebe63e85e025d1957fb2a7f9', 3),
(44, '196910021994032003', '8434c8b2c6e034f6a026874300166cae', 3),
(45, '195612281985031003', '4a943601c15d362d82bd3f4b7d13cd0c', 3),
(46, '196112171987031001', 'ad177745cb1f85d8ad8c30a57f9b01b6', 3),
(47, '196411081990011001', '5cd942598b4b919fb01e1b56d2646dbb', 3),
(48, '196002231986021001', 'a77530cee6bc7501cd0f6078eb38ef8a', 3),
(49, '196307111991021002', '88470cdcd80ef13daee2d1142f93fa5a', 3),
(50, '196203271991022001', '9b29e60fd7e9f3a8d541c8d3a7ae07c9', 3),
(51, '196207011990031003', '02d91c363d41f16855c68db292cf0181', 3),
(52, '197204221999031004', '178425ab2d0b6a206ac1ef07aa8ac544', 3),
(53, '197206091998031001', 'fda7b8b756b45c62414e1b4f50d8d23c', 3),
(54, '197106161999031003', '8a6784ab920fd3f86bb062e409994842', 3),
(55, '196310201991021001', 'd7c70589f63eb9d84942b0b743f6ff51', 3),
(56, '196309271993032001', '36e5b98f81cf537ca4b94cd6b1691573', 3),
(57, '197212311998022001', 'daf98a76e43e0d656e874cd44f1ea1d7', 3),
(58, '197108181997021001', 'ee4d4ce5c522be085983d7438680b43a', 3),
(59, '196711101994031003', '5bf5e89517cf0ace4bf3baf1caf343a4', 3),
(60, '196312221990011003', 'f82a425c9ad08f4334f7607cd52fb7b3', 3),
(61, '197303051997021001', '7fdf0283c6e1efbcb500165aeff76795', 3),
(62, '196309141988031012', 'fcf80f0dc1d606714b4890fc0e2a1c77', 3),
(63, '195907221987031003', '4dec23e36e6d854e2b56d1c84f252be1', 3),
(64, '195702051986031003', '3dfff37c662156bbec3c3ba802303431', 3),
(65, '196704291994032002', 'e6cbe43bc2a3802427b36b0d16e39ab0', 3),
(66, '196112261988031001', '713a59aa41078c17c65669d35e2c33a5', 3),
(67, '196702081994031005', 'ba3278c5edc10f6f69f35438923e4d4c', 3),
(68, '195808071987031001', '8e5f856132635048b5afea4fc8ae08e9', 3),
(69, '196803171997022002', '07d86e3aa069bb00357a31cc3106c846', 3),
(70, '196912211995121001', 'ffdacfe695bb19af28795d1e163fe1c1', 3),
(71, '197604161999032002', '7e793b49acbea68ffcc3586db32a34c0', 3),
(72, '197011231995121001', '8bd48d070cc640fec7e33e802433e1e8', 3),
(73, '197107191998022001', '8dbb9be3e5917582e264eeb8b2e74dd5', 3),
(74, '196608221997022001', '2afb95906d39dbb5c433dc8f39821b8a', 3),
(75, '197302261998021001', '95ee975deaaf78340c587d81f149c28e', 3),
(76, '197002171994121001', '8d3da70575ce60bcebe23668c8248f6c', 3),
(77, '197206061999031001', '9b4f89fd3747707586246c376f675603', 3),
(78, '195706241985031001', '02419e68d7b5127cb37995d50ed7bbf1', 3),
(79, '195801021986031002', '1c60878d5968e99de72577a48a919392', 3),
(80, '196107221986021001', '885ec516a20540f6af38bf278477140e', 3),
(81, '195701081986021001', '51802760b2651cb03dad9becd14a922a', 3),
(82, '195510161985031001', 'e44b1aea756fcb32b906cfd852838bf9', 3),
(83, '195911071987032001', 'e910f29c0ded4999e13c847ea19f27d9', 3),
(84, '196704301992032002', 'ac2491a9e3fd3916af19305a6797a2e9', 3),
(85, '196402141991022002', 'fe740e8bb013fc125f682b8c25f9074a', 3),
(86, '196806281998022001', '732143ad3c28fdcaf44e6e42ba2c6583', 3),
(87, '196711141993031001', '2a98ea3b30847242388e4ae02a9b2e2b', 3),
(88, '196205161990011001', 'ab5a71f3e1c594d363a8731f8312a3e2', 3),
(89, '197302041997021001', 'b8cc9e0807e040f1dfc2e810651b7ed1', 3),
(90, '196904291998021006', '6a7eb2f24af91e8696cb9e0b848063f6', 3),
(91, '196303161991031002', '737eb97b667d85727dd07b358a18a3d6', 3),
(92, '197011231998021001', '8751cbd2dcc9bf61da56db9324e3c65e', 3),
(93, '195708311986021002', 'd9e20679fb480418ed2d8034f0a35c06', 3),
(94, '195901181987102001', '39ecccb1374f9a765153f0ed07ff6abd', 3),
(95, '197208302000031001', '1632284f31cc6792ad61e195ebcec213', 3),
(96, '197303171999031001', '0d914bda259380cd5a8c22d91a885ffd', 3),
(97, '197004231995121001', 'e758af8c475e2dfe83f99f5b647b578b', 3),
(98, '197510211999031004', 'ae76e83d59edfe717af27ae381ba1bf5', 3),
(99, '196001251987031001', '08396ac3d49fbaf8f7514c8ce365c23b', 3),
(100, '197012121998022001', '24d2044f1fe82170c6895763aec062a7', 3),
(101, '196503131991021001', '77a88eb35e92ec8ec7cf29df1083a999', 3),
(102, '196807111997021001', '9826101093c0c2596058d3025f4cdad5', 3),
(103, '196408041991021002', '5f2cbe233456aa7b36d1e6dc2bb31eea', 3),
(104, '196103041993032001', 'f031d951f93c6711386bd5ee3a1911c9', 3),
(105, '197503062000121001', '4d8b8e65a905c4d52fa4204ace4a173c', 3),
(106, '197402142000121001', '93c59c2f6b063407b62cbabc5207ae81', 3),
(107, '197710032000121001', '4ee3fea8b9468291326d2c2a5934f9ee', 3),
(108, '197102071995121001', '922ea59ce34d40783bcec32bbc28a716', 3),
(109, '196605061995121001', 'c099706bcb773579cf6e60a78103919c', 3),
(110, '197103011997021001', '3ac98e173b7e116530039915d55f856a', 3),
(111, '197312211999031002', '438ecf8933d0482f419e110c15f04d58', 2),
(112, '197007272000121001', '702b1754b59ab11367c3592c78ca2bf5', 3),
(113, '197404262000121001', 'f98673dd2c27950a3bfd6168d1080a1d', 3),
(114, '197309262000121001', '9e444d2ff6f919c062eee7ff88f793d5', 3),
(115, '197403081999031005', '2dd319965283724487868ef910642f41', 3),
(116, '197409302001121002', 'c192688ca39360964c534095315b454f', 3),
(117, '196201101989021001', '58b1066518019464a3e1234e57620fef', 3),
(118, '196907091997021001', '56be5bdfb28a2f9951c9742916b67e46', 3),
(119, '197006252002122001', '452358600489f7d93348dd707f7cff3d', 3),
(120, '197410202000121001', '5b8cb601ea14997e0498082805715515', 3),
(121, '197307021999031001', '2e7e87c9520ce1a3d33eb05839f909c9', 3),
(122, '197107241997021001', 'e5522955cbff458567730e7fbacb0960', 3),
(123, '197505291998021001', '23745cbff1d02fd95fcf73110d359d24', 3),
(124, '197402141999031002', '5c2ae479f0ee4658ecd77aeb3761c3e3', 3),
(125, '197504281999031001', 'eac8d7ab8de5f03d4a7ff2689d1a6514', 3),
(126, '197510281999031004', '32d6e287b12df9e13279fcf6a6bf2f99', 3),
(127, '197501172000032001', 'f373ff84b7dc9525e3a03148655f1b7e', 3),
(128, '195810101986021001', '26c3ad852162c6a6b398aed7ff691c57', 3),
(129, '195608181986031005', 'f367ccc36f649b7840b68000ceeba766', 3),
(130, '196005261987101001', '967b0d8522c1d0d588f286ec6022fbe1', 3),
(131, '195907141987031001', '2403788edb1ca2cd99a5776e8d13b10f', 3),
(132, '196111171988031001', '202b006ba3f398a9d5d1be324a32e567', 3),
(133, '195809291986021001', 'a93d9a6574beb3afd913749dd1303536', 3),
(134, '196208091988031001', '86b0961cec3c06a4f9c09229ef0c753d', 3),
(135, '196001151988101001', 'bebfb57eead42b184093cda226cf9eaf', 3),
(136, '195804291986021001', 'c91f039457cb5492d613a77edcf63a48', 3),
(137, '196204281990012001', '91a7420152e8ea16291dc12a357fd058', 3),
(138, '196811102005011001', '85bab712b5fb3d361bd2e0012ccdc371', 3),
(139, '196307111990012001', '0f9708bd1f05cf8dc3a2d740b7bc1120', 3),
(140, '196203271988031004', '52d587ce563a7971ce9982c3cca2275f', 3),
(141, '195903231988032001', '3cc03089f651db2880ee34a0c1132427', 3),
(142, '196610051992031003', 'e0c05a0c5942e5dd7f58b76d28d1035a', 3),
(143, '195712221987031001', '1f4d1ad68a3352ac0c0466787a6866e2', 3),
(144, '196605212006041010', '4d936bbd3cdc2d3e92cddb9e8459e592', 3),
(145, '197112181995121001', '58ff94d8f25dccfe13ec3b04e388162e', 3),
(146, '197106061995121003', 'b2743b5c206d63d2ae1c2f903ef41ef3', 3),
(147, '197104201998021001', 'f0fdcee03e568c0680db2937f06c7ebe', 3),
(148, '196509131998032001', '8765a7dc8883985c7613793bbf4a478c', 3),
(149, '195812211987032001', 'da5dacac96f595ede33832b0a1f84166', 3),
(150, '197005201999031002', '5dc84b13c7b0108611bcdbc45f10d994', 3),
(151, '197402231997021001', '792aa36d5e61290a36fbd4486c583820', 3),
(152, '197305072002122002', '354e9f4be8b6e770105ab113a635db5c', 3),
(153, '196704041998022001', '7cbdfad88c4d6792ca953de732fb4ea6', 3),
(154, '197107231998022001', '557f87228784c9f21c0d3fcb895b92fa', 3),
(155, '197301302000032001', 'a93d47c529772d8d1eb97659939b7821', 3),
(156, '196909291997021001', '1162596def5b89481a65122717d6daf0', 3),
(157, '196106161993031002', '4c8adf3881d74fffb08d8217a6a6a432', 3),
(158, '197406271999031002', 'ea24868f3f097a47e057087b600097c4', 3),
(159, '197012031997021001', 'f15dfc97b0bf4d614c775da1f26c37b6', 3),
(160, '196805081999031002', '06e2e5554953ac6a3bcb709e3bed670d', 3),
(161, '197501222000121001', '6c5a212e6b50f8985659321207753cfa', 3),
(162, '197312172000121001', 'e0b8dea6d4b81918cf65381195f89176', 3),
(163, '196904292002121001', '301410aa29bfa579a2bff90562ad2028', 3),
(164, '197301121998032001', 'cef7d141919712f1199d126c317d4ca7', 3),
(165, '197407201998032001', 'db3d71160f625044c72e3c34ac5b9cc7', 3),
(166, '197104211999031003', 'dfc1f8971735201cb1fd79684a721ec5', 3),
(167, '197406181999031002', '07e2bad455c12ebe90d2c9aab1abf9d0', 3),
(168, '197509152000121001', '7541897600b143093dc97cc36763e86d', 3),
(169, '195907021987032001', '8cb144243aca0f6a3df17c40f52b3dd0', 3),
(170, '196807261997021001', '09089aa068d57fd4a463da97ac5a6a29', 3),
(171, '197310172000121001', '80b556e9542f9b09cf31abce36a01032', 3),
(172, '196609011998021001', '58147868657ff2f6c3b61050a168dfff', 3),
(173, '197403271999031002', '772bee4b65e5670b613ae4fc5cdaad92', 3),
(174, '197006271998031005', 'a49cd2968c86011568f68cc0571a75cd', 3),
(175, '197608121999031002', 'ee93ba3180ae74e06270fbf362ccb568', 3),
(176, '197111241998031002', 'd78280e860fde11f39850fb8ef1d8ec0', 3),
(177, '197412162000122001', '0c1240e6a8f83953b1aa40ae4d7ba877', 3),
(178, '197508112000121001', '63280acc0ad2a92f58ff1b452ed769ae', 3),
(179, '196905051995122001', 'cdc03aebda98e35f7e194f4420d53143', 3),
(180, '196901011997021001', '5cd6428d6e6d7dd30f0194187e7d4929', 3),
(181, '197605252000122001', 'acd89c7cbeec9e63c36685154b0e60f6', 3),
(182, '196808141999031002', '19ecfb31228ee9b07a0d6bffa743209e', 3),
(183, '197509222003122002', '420ab9e1eebdebb0ae85a849bb2ed6c3', 3),
(184, '197705242003122001', '889688cbd61aea08a323af4fc1870ba0', 3),
(185, '197506082005011001', '4af9a97492c4eaf60b103389bdec5a90', 3),
(186, '197409122000121002', 'a35140fae48709f21a6ecaaeb68c40aa', 3),
(187, '197403162001121001', '0d65f6a246efd8c639380dce1d3b1541', 3),
(188, '195811111987031002', '48df26311c763c46c19fb957aa794cf7', 3),
(189, '197310242000031001', '3c1fba9018cc7f2b1d3a8f2a60db544e', 3),
(190, '197305262000121001', '382ef4c0a0051e491c0b028d5363cfa1', 3),
(191, '197603052000122001', '6d9a4ee0b3fbe4824d520a287c4e17af', 3),
(192, '197602252000121001', '9665068ab1bad7f573c07a552dc99369', 3),
(193, '197310022000121001', 'b22c2db536391921a8697626e3336a41', 3),
(194, '197605282000122001', 'c1d8417ee63a58927f947a7d0609bc46', 3),
(195, '197902192003122001', 'b14f65e4bf7655aef7cce5828a56ed7b', 3),
(196, '197103271999032002', 'c9afccd7d16049dd23dac0c8089f0a1a', 3),
(197, '197405231998021001', '7d909440bc46fa2218fc2191ff9a3507', 3),
(198, '197110231998022001', 'a49a3f487432832c75349df6c356d50d', 3),
(199, '197403042000121001', '5210db841a403ba2d122fef766cd2e5f', 3),
(200, '198109132003121002', 'c187e6b8915e92e20fff7b8b78a41f54', 3),
(201, '196907141997021001', 'f75d005addef27f5a9361d4b6db90749', 3),
(202, '196010251998021001', 'f2f3b08b74509614c6b2bdcf16b9fcc2', 3),
(203, '197603212000122001', '964d45227df29fd09358414cba57be98', 3),
(204, '198402172006042002', 'a720599884774cddd3ea81e4ae459643', 3),
(205, '198403262006042001', 'bf37db03984338aa68bcab8ccd06845f', 3),
(206, '197706152008011011', '07040ecd36558d3ac4aedc703f790621', 3),
(207, '195909061988031003', 'be27351facee0d3987fd22169e6a3578', 3),
(208, '195807151986021001', '72a99d2bd486be5c4018857866f8cd85', 3),
(209, '196010211990032002', 'de11c2933b2f95cbcf01f45ecd2fe843', 3),
(210, '195606011986021001', '3d2a03cbe369bc99ee42628d69ebb07e', 3),
(211, '195909091987031001', '29380d7164dbfe696e67b8acc733ebc7', 3),
(212, '195912101987031002', '0b8224a5a221abfcd5b362333ba840f6', 3),
(213, '197205102001121001', 'df43b4376e3590900576130abea57d3e', 3),
(214, '197609112002121001', 'd62db557f3e3368136b7094b249fcc0a', 3),
(215, '197306211997021001', '208c4c45577d17a0da95b92340b1c9cc', 3),
(216, '197805142005011001', '2f125808b0c4bb0b262ace3f320d8f7e', 3),
(217, '197008061998021001', '2cb1d142c87237d516674dab595560de', 3),
(218, '197708262006041001', 'b25dc985341ad53515a3ddc99bee966f', 3),
(219, '197401311999031003', '168552c3a5002c6ad059fe6e343dc1de', 3),
(220, '198007162008011017', 'dbf346b2079e2d2fd3017e3aa577cf92', 3),
(221, '197404092008012010', 'dd742196d6d087d887856c8f8582b00d', 3),
(222, '197408032008011008', 'f26981265d394d7ffd31f9e5b0a28554', 3),
(223, '198201202008011005', '96c95cb292f96893aea194b0645123a8', 3),
(224, '197808112008121003', 'b6906c0d136c850ba6010ef9bab1d6a3', 3),
(225, '197703092008121001', '28f0ec85a30210f4f0597f924ccacea3', 3),
(226, '197811252008121001', 'f228886ee89d1077112f6399bcf64aa0', 3),
(227, '197910022009122001', 'f59fb12de2a3cd8a204c7bc77b4bdcbe', 3),
(228, '197602162009121001', '67c1aa2fed88d9813c34c28b4a55c5c1', 3),
(229, '198401292009121003', '6be7baaf22666c2da8f3dd79c7ad0135', 3),
(230, '197608042000121002', '7d974bf4a0fb6da446b9107d68a546a6', 3),
(231, '197103301998022001', 'c319a224fda091581bb259ffee29f9be', 3),
(232, '196912061999031002', 'c0dca637095e9158aea4f9a7974c7971', 3),
(233, '197409212000031002', '02470b019dd450fd7351148f793b8ac1', 3),
(234, '197206172000121001', 'd4ffed5bb8521db00a8b1d26500dd8ca', 3),
(235, '197005212000121001', 'cbcae459fedce7e3d7fd9487cdbd68d1', 3),
(236, '198207212003122001', '6f85b85ba043d0ef4b62cdb326b8d2bd', 3),
(237, '197503252003121002', 'eeeabd4cb1b078cbccc83095e922583e', 3),
(238, '196204031993031003', 'da592fb115002a31d159614a6a5cf683', 3),
(239, '197705262010121001', '0e98587e9c06219bc7413a63f3672a4b', 3),
(240, '197706222010121001', '41a8b225ed28c23ea13985b13de7d731', 3),
(241, '197802062010121003', '1cb56b20a70d5ef6f7ec832598b2f068', 3),
(242, '198303192010121002', '0db95e006019d4ffe0fa018c4d4e2734', 3),
(243, '198412062010122008', 'dbb69d4ff33887b20816902a6f2c60ac', 3),
(244, '198412112010122005', 'a2f299b46776db31a0f4439fe9c9620a', 3),
(245, '197608122010121002', 'c11a47a53df795d6354f5fd328084b50', 3),
(246, '197803032010122001', 'aa4ef0af512f2578207b606306f028f6', 3),
(247, '198012112010121001', 'cf7c3f1a9da4db77694c23e0bec4fd95', 3),
(248, '198201312010121003', '6fe0d9fc91015b1fb2d4e3320dee57a6', 3),
(249, '198505262010121005', 'dfa9b8252cd706dd9c6885bccb8558dd', 3),
(250, '198601152010122004', '2b7b55c0385fa256c4f1b47411fd28f0', 3),
(251, '198608262010121005', '2d418fd1df3dd32ddbbaa3ebfd3c606b', 3),
(252, '198211072005012001', '5d9019dc5d994a5ed8aca9adcf9af26b', 3),
(253, '197712112005011002', 'b96595e98316d6aaff0cbed23c5c301d', 3),
(254, '196406021991021001', 'd19df95b0cb3b962bfcd121be9d0ab71', 3),
(255, '198305012012121003', '2983a02a1d88e8b709d07192f00ce8c2', 3),
(256, '198406272012121003', '6e450f06d7470abe6594332096a92da8', 3),
(257, '198207162012121004', 'c57f2aa3b4f0c9d6b44de94992185f0f', 3),
(258, '198501252012121005', 'e1bec56bc327a0e9a0f2062547440ea2', 3),
(259, '198603192012121002', '5a2cf99f51168071ef9802001c074eb9', 3),
(260, '198706212012121001', 'b8cdac409da5f6f563f3df47b5657d07', 3),
(261, '198802252012121003', '7230317c34ff8061bd8b4fab16c82ea0', 3),
(262, '197509081999031002', '6f78817129ad8b1c254252f25f5d88e3', 3),
(263, '198301222006041002', '91c3cf0c9eb92c26c69047ec358b499c', 3),
(264, '197306161999031001', 'b0d018edab9bad7e0bd5d0a27b43651c', 3),
(265, '196701231994012001', '41b69a0215d099291f1d0b8392ccbada', 3),
(266, '196903111997021001', '4d88935cc23b89fef5dbd248c3d102ca', 3),
(267, '197104291998021001', '08add90212bd97fbc7b3b2aa62cb9f08', 3),
(268, '197311061998022001', '2a82749d0fb13e7445f8889403d264c7', 3),
(269, '197103011998031001', '027a38bfd8bf9156c653f5b223fc7103', 3),
(270, '197501181999031001', '2c73545deb40f63b048b4a1cf4cfee7c', 3),
(271, '196704011999032001', '4864020908853bf225cb100e42a22201', 3),
(272, '196709191999031003', 'ab0f7146e0c3b57663612b0a34b50b4a', 3),
(273, '196603231999031008', '903bcc076150e4cc2cbb9a5cf5280d0d', 3),
(274, '196412021999032001', '639d4c5297e3a8c15c0a06ff2c4faae6', 3),
(275, '197205312000031001', '51e02ac8bf3bc8620060c6ac32e56d0f', 3),
(276, '197105152000031014', '6645291350904de326da91fddc013de2', 3),
(277, '197611102000121003', '6ec4996d83b95d2914accb1ef0b87002', 3),
(278, '197206302000121001', 'd444ea687772c179bfa8b7f804ae150a', 3),
(279, '198105202003121002', '02086af3fe82ce9d4a3d22d8d5017eb1', 3),
(280, '197706012003121004', '740a463f4bd4624a0e78386947beefb5', 3),
(281, '197408212005011001', '640035fa54356f6bb316ef7fe087bff5', 3),
(282, '197906172005011003', 'b20cd73cecbc0ce3f232e69658fd2056', 3),
(283, '197710202005011001', '1dcb2affa72a32dd510366f5ee3788ee', 3),
(284, '197904232006041001', 'f8fc4d3a440ce34d5ea656ede130fc91', 3),
(285, '197401252006041001', '8da675f6f22fcc1b66ff58f8f5437d87', 3),
(286, '198105302006041001', '5d7b8fcaf4754f21a12080240a572e37', 3),
(287, '198108242006042001', '6c48e294bbaf9c3c029ff0700414fe37', 3),
(288, '198411032008121004', 'e93dee22c880bc44a56ee9311611352e', 3),
(289, '197909172008121004', 'cc0d0c197390b13a110547812538bea6', 3),
(290, '198102212008121001', 'eff27875052dd8fca7439cf4dd385e24', 3),
(291, '196003231990011001', '12b11c87417e82f6dfedcf2ad58988d9', 3),
(292, '198704202014012001', '45ce28d8b44077e958c05dd344372660', 3),
(293, '198705172014042001', 'c66486c7186097005631f055b80b9412', 3),
(294, '198609272014042001', '7f3210e2fd6094346130481ed39d9ed0', 3),
(295, '198811182014041002', '0f3b05ea4564eecb92f17cd7f9dbda74', 3),
(296, '198010272015041001', '1e11a0756394ef982886c58f814ca5ec', 3),
(297, '198804062015041002', '04cd66c54c3741dc428423effb31d703', 3),
(298, '198910132015042002', '4d2506c2a210844cbf26e0f4d464127d', 3),
(299, '198703282015041002', '9383f01ee015e6496e8f140c32d356fb', 3),
(300, '198502282015041001', '46cc3fa664d6fe08c60209247d7329dc', 3),
(301, '198408172015041002', '88c8aec560e24e241afe7af8733e9cef', 3),
(302, '198807160115012044', 'e860c1f9fcf67ced566954b807c43260', 3),
(303, '198305032010122002', '6760024d55609e45d990ea56d74612d7', 3),
(304, '199206142018032001', '923b1f419e080a64808686ed4ea15c11', 3),
(305, '198505042018031001', '8da35c60126fa5a014bd792bd4425b85', 3),
(306, '199006112018031001', '6342ca69b4425257d09de2d10cd12181', 3),
(307, 'H.7.1993121120180720', 'fb971f6c7c85c981f0ce659ecf1523cf', 3),
(308, 'H.7.1990033020180710', '0b065a5176e29dc7cbcb0f03c6c5199e', 3),
(309, 'H.7.1985053020180720', '85b4a36fc8fcf324ab9263e43c5fd46f', 3),
(310, 'H.7.1985040720180710', '1e755704b9abcff151614151036ce114', 3),
(311, 'H.7.1986110920180720', '7fbbb48e2f5a797a8068d468a066815b', 3),
(312, 'H.7.1987101420180720', '331007a3134452af5e8372029ac77d35', 3),
(313, 'H.7.1990111820180710', '622fd7917384ea2badb7ac980e94acda', 3),
(314, 'H.7.1988102320180710', '761127ec9f23672fd5bc10be2194df81', 3),
(315, 'H.7.1988051120180720', '6c1effcbeb4292b9df822d15911050d2', 3),
(316, 'H.7.1986120820180720', 'f0ae83bfa63c26cb77298a9a728fc7bc', 3),
(317, 'H.7.1991080820180720', 'ce7b3cf32d1969bd4bc7f8e08c053fe7', 3),
(318, 'H.7.1988011520180710', '48065ef72b9c74a31e6d4abc9ccbc796', 3),
(319, 'H.7.1989112220180710', '216e5b7281e885b0dfc48efbebd952ab', 3),
(320, 'H.7.1991090420180710', 'd9c96e3c1a1811f0ab3d3403c87f7ad5', 3),
(321, 'H.7.1989060420180710', '00b11a89d717452daa00dd71dc29d25a', 3),
(322, 'H.7.1991041720180710', 'e03de52ad111053633613fbb4d3ea8f1', 3),
(323, 'H.7.1991041720180710', '79b656c170965dca889a06a1dc393eb3', 3),
(324, 'H.7.1981012720180710', 'f2b5ccd26a49f4364084b904e602d293', 3),
(325, 'H.7.1990101320180710', '588974ba2e4f75b49afb097c87d3b3e9', 3),
(326, 'H.7.1985090920180810', '53c9e59d8b8a910be92ed359f9a8e75e', 3),
(327, '199012142019031014', '03a0111e55f2b18f4de5e5c38d39c787', 3),
(328, '199205042019032023', '453349096d736e22a340ba08d3c82932', 3),
(329, '199203242019031016', '67032b0ae5ce086b35118ede8f768cac', 3),
(330, '198909122019032012', '06ee333ce671bebb207222ff2b33a1ba', 3),
(331, '198902220119111108', 'a3939cb110f5f1c300aa9818d924febc', 3),
(332, '197512210119111107', '8026431368810cefcfb3845785c45fc6', 3),
(336, 'pengusul', '5f4dcc3b5aa765d61d8327deb882cf99', 3),
(338, 'admin', '827ccb0eea8a706c4c34a16891f84e7b', 1),
(359, 'reviewer1', '5f4dcc3b5aa765d61d8327deb882cf99', 2),
(360, 'reviewer2', '5f4dcc3b5aa765d61d8327deb882cf99', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `assign_proposal_penelitian`
--
ALTER TABLE `assign_proposal_penelitian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assign_proposal_pengabdian`
--
ALTER TABLE `assign_proposal_pengabdian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_nilai_proposal_pengabdian`
--
ALTER TABLE `detail_nilai_proposal_pengabdian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `dsn_penelitian`
--
ALTER TABLE `dsn_penelitian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dsn_pengabdian`
--
ALTER TABLE `dsn_pengabdian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jadwal_penelitian`
--
ALTER TABLE `jadwal_penelitian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jadwal_pengabdian`
--
ALTER TABLE `jadwal_pengabdian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenispenelitian`
--
ALTER TABLE `jenispenelitian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `komponen_nilai_pengabdian`
--
ALTER TABLE `komponen_nilai_pengabdian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `komp_penilaian_penelitian`
--
ALTER TABLE `komp_penilaian_penelitian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `koordinator`
--
ALTER TABLE `koordinator`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `laporan_akhir_penelitian`
--
ALTER TABLE `laporan_akhir_penelitian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laporan_akhir_pengabdian`
--
ALTER TABLE `laporan_akhir_pengabdian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laporan_monev_penelitian`
--
ALTER TABLE `laporan_monev_penelitian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `luaran`
--
ALTER TABLE `luaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mhs_penelitian`
--
ALTER TABLE `mhs_penelitian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mhs_pengabdian`
--
ALTER TABLE `mhs_pengabdian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mitra`
--
ALTER TABLE `mitra`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilai_penelitian`
--
ALTER TABLE `nilai_penelitian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilai_proposal_penelitian`
--
ALTER TABLE `nilai_proposal_penelitian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilai_proposal_pengabdian`
--
ALTER TABLE `nilai_proposal_pengabdian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `proposal_penelitian`
--
ALTER TABLE `proposal_penelitian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `proposal_pengabdian`
--
ALTER TABLE `proposal_pengabdian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviewer_penelitian`
--
ALTER TABLE `reviewer_penelitian`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `reviewer_pengabdian`
--
ALTER TABLE `reviewer_pengabdian`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skema_pengabdian`
--
ALTER TABLE `skema_pengabdian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sumberdana`
--
ALTER TABLE `sumberdana`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assign_proposal_penelitian`
--
ALTER TABLE `assign_proposal_penelitian`
  MODIFY `id` bigint(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `assign_proposal_pengabdian`
--
ALTER TABLE `assign_proposal_pengabdian`
  MODIFY `id` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `detail_nilai_proposal_pengabdian`
--
ALTER TABLE `detail_nilai_proposal_pengabdian`
  MODIFY `id` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `dsn_penelitian`
--
ALTER TABLE `dsn_penelitian`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dsn_pengabdian`
--
ALTER TABLE `dsn_pengabdian`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jadwal_penelitian`
--
ALTER TABLE `jadwal_penelitian`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `jadwal_pengabdian`
--
ALTER TABLE `jadwal_pengabdian`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `jenispenelitian`
--
ALTER TABLE `jenispenelitian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `komponen_nilai_pengabdian`
--
ALTER TABLE `komponen_nilai_pengabdian`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `komp_penilaian_penelitian`
--
ALTER TABLE `komp_penilaian_penelitian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `laporan_akhir_penelitian`
--
ALTER TABLE `laporan_akhir_penelitian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `laporan_akhir_pengabdian`
--
ALTER TABLE `laporan_akhir_pengabdian`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `laporan_monev_penelitian`
--
ALTER TABLE `laporan_monev_penelitian`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `luaran`
--
ALTER TABLE `luaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `mhs_penelitian`
--
ALTER TABLE `mhs_penelitian`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mhs_pengabdian`
--
ALTER TABLE `mhs_pengabdian`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mitra`
--
ALTER TABLE `mitra`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `nilai_penelitian`
--
ALTER TABLE `nilai_penelitian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nilai_proposal_penelitian`
--
ALTER TABLE `nilai_proposal_penelitian`
  MODIFY `id` bigint(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nilai_proposal_pengabdian`
--
ALTER TABLE `nilai_proposal_pengabdian`
  MODIFY `id` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `proposal_penelitian`
--
ALTER TABLE `proposal_penelitian`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `proposal_pengabdian`
--
ALTER TABLE `proposal_pengabdian`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `skema_pengabdian`
--
ALTER TABLE `skema_pengabdian`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sumberdana`
--
ALTER TABLE `sumberdana`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=364;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
