-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Feb 2021 pada 13.59
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 8.0.0

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
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `nip` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`nip`, `nama`) VALUES
('21060117130070', 'Samaya'),
('admin', 'Superadmin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `assign_proposal_penelitian`
--

CREATE TABLE `assign_proposal_penelitian` (
  `id` bigint(10) NOT NULL,
  `id_proposal` bigint(10) NOT NULL,
  `reviewer` varchar(30) NOT NULL,
  `reviewer2` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `assign_proposal_penelitian`
--

INSERT INTO `assign_proposal_penelitian` (`id`, `id_proposal`, `reviewer`, `reviewer2`) VALUES
(1, 2, 'reviewer1', 'reviewer2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `assign_proposal_pengabdian`
--

CREATE TABLE `assign_proposal_pengabdian` (
  `id` bigint(10) NOT NULL,
  `id_proposal` bigint(10) NOT NULL,
  `reviewer` varchar(30) NOT NULL,
  `reviewer2` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `assign_proposal_pengabdian`
--

INSERT INTO `assign_proposal_pengabdian` (`id`, `id_proposal`, `reviewer`, `reviewer2`) VALUES
(1, 1, 'reviewer1', 'reviewer2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_nilai_proposal_pengabdian`
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
-- Dumping data untuk tabel `detail_nilai_proposal_pengabdian`
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
-- Struktur dari tabel `dosen`
--

CREATE TABLE `dosen` (
  `nip` varchar(20) NOT NULL,
  `nomor_induk` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jabatan` varchar(20) NOT NULL,
  `pendidikan` varchar(20) NOT NULL,
  `status_kepegawaian` varchar(20) NOT NULL,
  `program_studi` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`nip`, `nomor_induk`, `nama`, `jabatan`, `pendidikan`, `status_kepegawaian`, `program_studi`) VALUES
('0001016903', '196901011997021001', 'Dr.Ing. Wisnu Pradoto, S.T., M.T.', 'Lektor', 'S3', 'PNS', 'Departemen Perencanaan Wilayah'),
('0001037105', '197103011998031001', 'Ika Bagus Priyambada, S.T., M.Eng.', 'Asisten Ahli', 'S2', 'PNS', 'Departemen Teknik Lingkungan'),
('0001037106', '197103011997021001', 'Prof. Dr. Istadi, S.T., M.T.', 'Guru Besar', 'S3', 'PNS', 'Departemen Teknik Kimia'),
('0001046704', '196704011999032001', 'Dr. Ir. Anik Sarminingsih, M.T., IPM.', 'Asisten Ahli', 'S3', 'PNS', 'Departemen Teknik Lingkungan'),
('0001056008', '196005011986031003', 'Prof.Dr.Ir. Bakti Jos, DEA', 'Guru Besar', 'S3', 'PNS', 'Departemen Teknik Kimia'),
('0001057104', '197105011997021001', 'Dr. Ir. Luqman Buchori, S.T., M.T., IPM.', 'Lektor Kepala', 'S3', 'PNS', 'Departemen Teknik Kimia'),
('0001058302', '198305012012121003', 'Sariffuddin, S.T., M.T.', 'Lektor', 'S2', 'PNS', 'Departemen Perencanaan Wilayah'),
('0001065609', '195606011986021001', 'Ir. Irawan Wisnu Wardhana, M.S.', 'Asisten Ahli', 'S2', 'PNS', 'Departemen Teknik Lingkungan'),
('0001067702', '197706012003121004', 'Dr.Eng. Munadi, S.T., M.T.', 'Lektor', 'S3', 'PNS', 'Departemen Teknik Mesin'),
('0001076202', '196207011990031003', 'Ir. Arif Hidayat, CES, M.T.', 'Lektor Kepala', 'S2', 'PNS', 'Departemen Teknik Sipil'),
('0001096603', '196609011998021001', 'Junaidi, S.T., M.T.', 'Lektor', 'S2', 'PNS', 'Departemen Teknik Lingkungan'),
('0002015803', '195801021986031002', 'Dr. Ir. Sumar Hadi Suryo, M.T.', 'Lektor', 'S3', 'PNS', 'Departemen Teknik Mesin'),
('0002066010', '196006021986021001', 'Prof. Dr. Ir. Sriyana, M.S.', 'Guru Besar', 'S3', 'PNS', 'Departemen Teknik Sipil'),
('0002066403', '196406021991021001', 'Ir. Rudi Yuniarto Adi, M.T.', 'Lektor', 'S2', 'PNS', 'Departemen Teknik Sipil'),
('0002075907', '195907021987032001', 'Ir. Frida Kistiani, M.T.', 'Lektor', 'S2', 'PNS', 'Departemen Teknik Sipil'),
('0002077303', '197307021999031001', 'Dr.Eng. Achmad Widodo, S.T., M.T.', 'Lektor Kepala', 'S3', 'PNS', 'Departemen Teknik Mesin'),
('0002106902', '196910021994032003', 'Dr.T. Aji Prasetyaningrum, S.T., M.Si.', 'Lektor Kepala', 'S3', 'PNS', 'Departemen Teknik Kimia'),
('0002107304', '197310022000121001', 'Dr. Okto Risdianto Manullang, S.T., M.T.', 'Lektor', 'S3', 'PNS', 'Departemen Perencanaan Wilayah'),
('0002107903', '197910022009122001', 'Dr. Oky Dwi Nurhayati, S.T., M.T.', 'Lektor', 'S3', 'PNS', 'Departemen Teknik Komputer'),
('0002126403', '196412021999032001', 'Ir. Dwi Siwi Handayani, M.Si.', 'Asisten Ahli', 'S2', 'PNS', 'Departemen Teknik Lingkungan'),
('0003037805', '197803032010122001', 'Titik Istirokhatun, S.T., M.Sc.', 'Lektor Kepala', 'S2', 'PNS', 'Departemen Teknik Lingkungan'),
('0003046203', '196204031993031003', 'Ir. Agung Sugiri, S.T., M.P.St.', 'Lektor Kepala', 'S2', 'PNS', 'Departemen Perencanaan Wilayah'),
('0003058302', '198305032010122002', 'Dr. Anak Agung Sagung Manik Mahachandra Jayanthi M', 'Lektor', 'S3', 'PNS', 'Departemen Teknik Industri'),
('0003087407', '197408032008011008', 'Widjonarko, S.T., M.T.', 'Lektor', 'S2', 'PNS', 'Departemen Perencanaan Wilayah'),
('0003107703', '197710032000121001', 'Dr. Purnawan Adi Wicaksono, S.T., M.T.', 'Lektor Kepala', 'S3', 'PNS', 'Departemen Teknik Industri'),
('0003118402', '198411032008121004', 'Dr. Eng. Samuel, S.T., M.T.', 'Lektor', 'S3', 'PNS', 'Departemen Teknik Perkapalan'),
('0003127004', '197012031997021001', 'Imam Santoso, S.T., M.T.', 'Lektor', 'S2', 'PNS', 'Departemen Teknik Elektro'),
('0004027303', '197302041997021001', 'Aghus Sofwan, S.T., M.T., Ph.D.', 'Lektor', 'S3', 'PNS', 'Departemen Teknik Elektro'),
('0004036105', '196103041993032001', 'Dr. Ir. Retno Widjajanti, M.T.', 'Lektor Kepala', 'S3', 'PNS', 'Departemen Perencanaan Wilayah'),
('0004037403', '197403042000121001', 'Prof. Dr. Jamari, S.T., M.T.', 'Guru Besar', 'S3', 'PNS', 'Departemen Teknik Mesin'),
('0004046704', '196704041998022001', 'Prof. Dr. Ir. Erni Setyowati, M.T.', 'Guru Besar', 'S3', 'PNS', 'Departemen Teknik Arsitektur'),
('0004058504', '198505042018031001', 'Rinal Khaidar Ali, S.T., M.Eng.', 'Asisten Ahli', 'S2', 'PNS', 'Departemen Teknik Geologi'),
('0004059202', '199205042019032023', 'Masyiana Arifah Alfia Riza, S.T., M.Arch.', 'Pengajar', 'S2', 'PNS', 'Departemen Teknik Arsitektur'),
('0004068907', 'H.7.1989060420180710', 'Yudi Eko Windarto, S.T., M.Kom.', 'Asisten Ahli', 'S2', 'Pegawai Undip Non AS', 'Departemen Teknik Komputer'),
('0004086404', '196408041991021002', 'Dr. Ir. Budi Sudarwanto, M.T.', 'Lektor Kepala', 'S3', 'PNS', 'Departemen Teknik Arsitektur'),
('0004087601', '197608042000121002', 'Prof. Dr.Ing. Suherman, S.T., M.T.', 'Guru Besar', 'S3', 'PNS', 'Departemen Teknik Kimia'),
('0004099105', 'H.7.1991090420180710', 'Kuntoro Adi Nugroho, S.T., M.Eng.', 'Asisten Ahli', 'S2', 'Pegawai Undip Non AS', 'Departemen Teknik Komputer'),
('0005015907', '195901051987031002', 'Ir. Agung Nugroho, M.Kom., IPM.', 'Lektor Kepala', 'S2', 'PNS', 'Departemen Teknik Elektro'),
('0005025702', '195702051986031003', 'Ir. Djoko Suwandono, M.Sp.', 'Lektor Kepala', 'S2', 'PNS', 'Departemen Perencanaan Wilayah'),
('0005037304', '197303051997021001', 'Muchammad, S.T., M.T.', 'Lektor Kepala', 'S2', 'PNS', 'Departemen Teknik Mesin'),
('0005037606', '197603052000122001', 'Dr.Ing. Wakhidah Kurniawati, S.T., M.T.', 'Lektor Kepala', 'S3', 'PNS', 'Departemen Perencanaan Wilayah'),
('0005055205', '195205051980111001', 'Prof.Ir. Totok Rusmanto, M.Eng.', 'Guru Besar', 'S2', 'PNS', 'Departemen Teknik Arsitektur'),
('0005056908', '196905051995122001', 'Dr. Artiningsih, S.T., M.Si.', 'Lektor', 'S3', 'PNS', 'Departemen Perencanaan Wilayah'),
('0005106606', '196610051992031003', 'Dr. Ir. Hari Nugroho, M.T.', 'Lektor', 'S3', 'PNS', 'Departemen Teknik Sipil'),
('0006027801', '197802062010121003', 'Bandi Sasmito, S.T., M.T.', 'Lektor', 'S2', 'PNS', 'Departemen Teknik Geodesi'),
('0006037502', '197503062000121001', 'Dr.rer.oec. Arfan Bakhtiar, S.T., M.T.', 'Lektor Kepala', 'S3', 'PNS', 'Departemen Teknik Industri'),
('0006048803', '198804062015041002', 'Good Rindo, S.T., M.T.', 'Asisten Ahli', 'S2', 'PNS', 'Departemen Teknik Perkapalan'),
('0006056605', '196605061995121001', 'Dr. Jawoto Sih Setyono, S.T., MDP', 'Lektor Kepala', 'S3', 'PNS', 'Departemen Perencanaan Wilayah'),
('0006057105', '197106061995121003', 'Agung Budi Prasetijo, S.T., M.I.T., Ph.D.', 'Lektor', 'S3', 'PNS', 'Departemen Teknik Komputer'),
('0006067205', '197206061999031001', 'Darjat, S.T., M.T.', 'Lektor Kepala', 'S2', 'PNS', 'Departemen Teknik Elektro'),
('0006087002', '197008061998021001', 'Yusuf Umardani, S.T., M.T.', 'Lektor', 'S2', 'PNS', 'Departemen Teknik Mesin'),
('0006095910', '195909061988031003', 'Ir. Supriyono, M.T.', 'Lektor', 'S2', 'PNS', 'Departemen Teknik Sipil'),
('0006117302', '197311061998022001', 'Rani Rumita, S.T., M.T.', 'Asisten Ahli', 'S2', 'PNS', 'Departemen Teknik Industri'),
('0006126902', '196912061999031002', 'Samsul Ma\'rif, S.P., M.T.', 'Lektor Kepala', 'S2', 'PNS', 'Departemen Perencanaan Wilayah'),
('0006128402', '198412062010122008', 'Ike Pertiwi Windasari, S.T., M.T.', 'Lektor', 'S2', 'PNS', 'Departemen Teknik Komputer'),
('0007027104', '197102071995121001', 'Prof. Dr. Moh. Djaeni, S.T., M.Eng.', 'Guru Besar', 'S3', 'PNS', 'Departemen Teknik Kimia'),
('0007048506', 'H.7.1985040720180710', 'Dr. Anang Wahyu Sejati, S.T., M.T.', 'Lektor', 'S3', 'Pegawai Undip Non AS', 'Departemen Perencanaan Wilayah'),
('0007057301', '197305072002122002', 'Dr. Naniek Utami Handayani, S.Si., M.T.', 'Lektor', 'S3', 'PNS', 'Departemen Teknik Industri'),
('0007085804', '195808071987031001', 'Ir. Mochtar Hadiwidodo, M.Si.', 'Lektor Kepala', 'S2', 'PNS', 'Departemen Teknik Lingkungan'),
('0007115805', '195811071988031001', 'Prof. Dr. Ir. Syafrudin, CES, M.T.', 'Guru Besar', 'S3', 'PNS', 'Departemen Teknik Lingkungan'),
('0007115909', '195911071987032001', 'Dr. Ir. Ismiyati, M.S.', 'Lektor', 'S3', 'PNS', 'Departemen Teknik Sipil'),
('0007118202', '198211072005012001', 'Dr.Ing. Novie Susanto, S.T., M.Eng.', 'Lektor Kepala', 'S3', 'PNS', 'Departemen Teknik Industri'),
('0008015711', '195701081986021001', 'Ir. Salamun, M.T.', 'Lektor', 'S2', 'PNS', 'Departemen Teknik Sipil'),
('0008026702', '196702081994031005', 'Prof. Ir. Mochamad Agung Wibowo, M.M., M.Sc., Ph.D', 'Guru Besar', 'S3', 'PNS', 'Departemen Teknik Sipil'),
('0008037405', '197403081999031005', 'Syaiful, S.T., M.T., Ph.D.', 'Lektor', 'S3', 'PNS', 'Departemen Teknik Mesin'),
('0008056802', '196805081999031002', 'Dr. Wilma Amiruddin, S.T., M.T.', 'Lektor', 'S3', 'PNS', 'Departemen Teknik Perkapalan'),
('0008067505', '197506082005011001', 'Eko Handoyo, S.T., M.T.', 'Lektor', 'S2', 'PNS', 'Departemen Teknik Elektro'),
('0008089101', 'H.7.1991080820180720', 'Hana Sugiastu Firdaus, S.T., M.T.', 'Asisten Ahli', 'S2', 'Pegawai Undip Non AS', 'Departemen Teknik Geodesi'),
('0008097504', '197509081999031002', 'Dr. Aris Triwiyatno, S.T., M.T.', 'Lektor', 'S3', 'PNS', 'Departemen Teknik Elektro'),
('0008115504', '195511081983031002', 'Prof.Ir. Edy Darmawan, M.Eng.', 'Guru Besar', 'S2', 'PNS', 'Departemen Teknik Arsitektur'),
('0008116405', '196411081990011001', 'Dr. Ir. Eddy Prianto, CES, DEA', 'Lektor Kepala', 'S3', 'PNS', 'Departemen Teknik Arsitektur'),
('0008128604', 'H.7.1986120820180720', 'Devina Trisnawati, S.T., M.Eng.', 'Asisten Ahli', 'S2', 'Pegawai Undip Non AS', 'Departemen Teknik Geologi'),
('0009015905', '195901091987031001', 'Dr.Ir. Djoko Indrosaptono, M.T.', 'Lektor Kepala', 'S3', 'PNS', 'Departemen Teknik Arsitektur'),
('0009037705', '197703092008121001', 'Dr. L.M. Sabri, S.T., M.T.', 'Lektor', 'S3', 'PNS', 'Departemen Teknik Geodesi'),
('0009047403', '197404092008012010', 'Diah Intan Kusumo Dewi, S.T., M.Eng.', 'Asisten Ahli', 'S2', 'PNS', 'Departemen Perencanaan Wilayah'),
('0009067204', '197206091998031001', 'Prof. Dr. Ir. Widayat, S.T., M.T., IPM.', 'Guru Besar', 'S3', 'PNS', 'Departemen Teknik Kimia'),
('0009076905', '196907091997021001', 'Karnoto, S.T., M.T.', 'Lektor Kepala', 'S2', 'PNS', 'Departemen Teknik Elektro'),
('0009086207', '196208091988031001', 'Ir. Toni Prahasto, MAsc., Ph.D.', 'Lektor', 'S3', 'PNS', 'Departemen Teknik Mesin'),
('0009095912', '195909091987031001', 'Ir. Wahju Krisna Hidajat, M.T.', 'Asisten Ahli', 'S2', 'PNS', 'Departemen Teknik Geologi'),
('0009098506', 'H.7.1985090920180810', 'Dr.-Ing. Paryanto, S.T., M.T.', 'Lektor', 'S3', 'Pegawai Undip Non AS', 'Departemen Teknik Mesin'),
('0009115601', '195611091985032002', 'Prof. Dr. Ir. Han Ay Lie, M.Eng.', 'Guru Besar', 'S3', 'PNS', 'Departemen Teknik Sipil'),
('0009118605', 'H.7.1986110920180720', 'Novia Sari Ristianti, S.T., M.T.', 'Asisten Ahli', 'S2', 'Pegawai Undip Non AS', 'Departemen Perencanaan Wilayah'),
('0010016210', '196201101989021001', 'Dr. Ir. Agung Dwiyanto, M.T.', 'Lektor Kepala', 'S3', 'PNS', 'Departemen Teknik Arsitektur'),
('0010057203', '197205102001121001', 'Bagus Hario Setiadji, S.T., M.T., Ph.D.', 'Lektor Kepala', 'S3', 'PNS', 'Departemen Teknik Sipil'),
('0010105814', '195810101986021001', 'Ir. Robert Johanes Kodoatie, M.Eng., Ph.D.', 'Lektor', 'S3', 'PNS', 'Departemen Teknik Sipil'),
('0010116707', '196711101994031003', 'Holi Bina Wijaya, S.T., MUM', 'Lektor Kepala', 'S2', 'PNS', 'Departemen Perencanaan Wilayah'),
('0010116804', '196811102005011001', 'Joga Dharma Setiawan, B.Sc., M.Sc., Ph.D.', 'Lektor', 'S3', 'PNS', 'Departemen Teknik Mesin'),
('0010117603', '197611102000121003', 'Mohammad Sahid Indraswara, S.T., M.T.', 'Lektor', 'S2', 'PNS', 'Departemen Teknik Arsitektur'),
('0010125907', '195912101987031002', 'Ir. Wahyudi Kushardjoko, M.T.', 'Lektor', 'S2', 'PNS', 'Departemen Teknik Sipil'),
('0011036905', '196903111997021001', 'Susatyo Nugroho Widyo Pramono, S.T., M.M.', 'Lektor', 'S2', 'PNS', 'Departemen Teknik Industri'),
('0011058805', 'H.7.1988051120180720', 'Nurakhmi Qadaryati, S.T., M.Eng.', 'Asisten Ahli', 'S2', 'Pegawai Undip Non AS', 'Departemen Teknik Geologi'),
('0011069003', '199006112018031001', 'Grandy Loranessa Wungo, S.T., M.T', 'Asisten Ahli', 'S2', 'PNS', 'Departemen Perencanaan Wilayah'),
('0011076303', '196307111991021002', 'Ir. Purwanto, M.T., M.Eng.', 'Lektor Kepala', 'S2', 'PNS', 'Departemen Teknik Sipil'),
('0011076304', '196307111990012001', 'Dr.Ars. Ir. Wijayanti, M.Eng.', 'Lektor', 'S3', 'PNS', 'Departemen Teknik Arsitektur'),
('0011076805', '196807111997021001', 'Yuli Christyono, S.T., M.T.', 'Lektor Kepala', 'S2', 'PNS', 'Departemen Teknik Elektro'),
('0011087503', '197508112000121001', 'Dr.Eng. Maryono, S.T., M.T.', 'Lektor', 'S3', 'PNS', 'Departemen Perencanaan Wilayah'),
('0011087806', '197808112008121003', 'Ferry Hermawan, S.T., M.T., Ph.D.', 'Lektor', 'S3', 'PNS', 'Departemen Teknik Sipil'),
('0011097602', '197609112002121001', 'Septana Bagus Pribadi, S.T., M.T.', 'Asisten Ahli', 'S2', 'PNS', 'Departemen Teknik Arsitektur'),
('0011116801', '196811111994121001', 'Ir. Sumardi, S.T., M.T., IPM.', 'Lektor Kepala', 'S2', 'PNS', 'Departemen Teknik Elektro'),
('0011127705', '197712112005011002', 'Dr.rer.nat. Thomas Triadi Putranto, S.T., M.Eng.', 'Lektor Kepala', 'S3', 'PNS', 'Departemen Teknik Geologi'),
('0011128005', '198012112010121001', 'Enda Wista Sinuraya, S.T., M.T.', 'Lektor', 'S2', 'PNS', 'Departemen Teknik Elektro'),
('0011128402', '198412112010122005', 'Dessy Ariyanti, S.T., M.T., Ph.D.', 'Lektor', 'S3', 'PNS', 'Departemen Teknik Kimia'),
('0011129301', 'H.7.1993121120180720', 'Desyta Ulfiana, S.T., M.T.', 'Asisten Ahli', 'S2', 'Pegawai Undip Non AS', 'Departemen Teknik Sipil'),
('0012017301', '197301121998032001', 'Wido Prananing Tyas, S.T., MDP, Ph.D.', 'Lektor Kepala', 'S3', 'PNS', 'Departemen Perencanaan Wilayah'),
('0012035205', '195203121975011004', 'Prof. Dr. Ir. Bambang Pramudono, MS.', 'Guru Besar', 'S3', 'PNS', 'Departemen Teknik Kimia'),
('0012046008', '196004121986032001', 'Dr. Ir. Ratnawati, M.T.', 'Lektor Kepala', 'S3', 'PNS', 'Departemen Teknik Kimia'),
('0012066904', '196906121994031001', 'Dr. Wahyudi, S.T., M.T.', 'Lektor Kepala', 'S3', 'PNS', 'Departemen Teknik Elektro'),
('0012075806', '195807121983031032', 'Ir. Slamet Priyanto, M.S.', 'Lektor Kepala', 'S2', 'PNS', 'Departemen Teknik Kimia'),
('0012076106', '196107121988031003', 'Ir. Djoeli Satrijo, M.T.', 'Lektor Kepala', 'S2', 'PNS', 'Departemen Teknik Mesin'),
('0012087601', '197608121999031002', 'Rukuh Setiadi, S.T., MEM.,Ph.D.', 'Lektor', 'S3', 'PNS', 'Departemen Perencanaan Wilayah'),
('0012087611', '197608122010121002', 'Dr. Dian Agus Widiarso, S.T., M.T.', 'Lektor', 'S3', 'PNS', 'Departemen Teknik Geologi'),
('0012097402', '197409122000121002', 'Sriyanto, S.T., M.T.', 'Lektor Kepala', 'S2', 'PNS', 'Departemen Teknik Industri'),
('0012098905', '198909122019032012', 'Risma Septiana, S.T., M.Eng.', 'Pengajar', 'S2', 'PNS', 'Departemen Teknik Komputer'),
('0012127002', '197012121998022001', 'Dr. Dyah Ari Wulandari, S.T., M.T.', 'Lektor', 'S3', 'PNS', 'Departemen Teknik Sipil'),
('0013036507', '196503131991021001', 'Ir. Budi Setiyana, M.T.', 'Lektor Kepala', 'S2', 'PNS', 'Departemen Teknik Mesin'),
('0013095704', '195709131986031001', 'Ir. Bambang Sudarsono, M.S.', 'Lektor Kepala', 'S2', 'PNS', 'Departemen Teknik Geodesi'),
('0013098101', '198109132003121002', 'Ary Arvianto, S.T., M.T.', 'Lektor', 'S2', 'PNS', 'Departemen Teknik Industri'),
('0013108903', '198910132015042002', 'Dania Eridani, S.T., M.Eng.', 'Lektor', 'S2', 'PNS', 'Departemen Teknik Komputer'),
('0013109008', 'H.7.1990101320180710', 'Yosua Alvin Adi Soetrisno, S.T., M.Eng.', 'Asisten Ahli', 'S2', 'Pegawai Undip Non AS', 'Departemen Teknik Elektro'),
('0013116504', '196509131998032001', 'Prof. Dr. Ir. Atik Suprapti, MTA.', 'Guru Besar', 'S3', 'PNS', 'Departemen Teknik Arsitektur'),
('0014026405', '196402141991022002', 'Ir. Kristinah Haryani, M.T.', 'Lektor Kepala', 'S2', 'PNS', 'Departemen Teknik Kimia'),
('0014027401', '197402141999031002', 'Ir. Haryono Setiyo Huboyo, S.T., M.T., Ph.D., IPM.', 'Lektor', 'S3', 'PNS', 'Departemen Teknik Lingkungan'),
('0014027402', '197402142000121001', 'Parlindungan Manik, S.T., M.T.', 'Lektor Kepala', 'S2', 'PNS', 'Departemen Teknik Perkapalan'),
('0014057803', '197805142005011001', 'Dr. Ir. Budi Prasetyo Samadikun, S.T., M.Si., IPM.', 'Lektor', 'S3', 'PNS', 'Departemen Teknik Lingkungan'),
('0014069202', '199206142018032001', 'Undayani Cita Sari, S.T, M.T.', 'Asisten Ahli', 'S2', 'PNS', 'Departemen Teknik Sipil'),
('0014075904', '195907141987031001', 'Ir. Muhrozi, M.S.', 'Lektor', 'S2', 'PNS', 'Departemen Teknik Sipil'),
('0014076902', '196907141997021001', 'Sukiswo, S.T., M.T.', 'Lektor', 'S2', 'PNS', 'Departemen Teknik Elektro'),
('0014086805', '196808141999031002', 'Dr.Eng. Sukamta, S.T., M.T.', 'Lektor', 'S3', 'PNS', 'Departemen Teknik Sipil'),
('0014095408', '196309141988031012', 'Prof. Dr. Ir. Suharyanto, M.Sc.', 'Guru Besar', 'S3', 'PNS', 'Departemen Teknik Sipil'),
('0014108705', 'H.7.1987101420180720', 'Jenian Marin, S.T.,M.Eng.', 'Asisten Ahli', 'S2', 'Pegawai Undip Non AS', 'Departemen Teknik Geologi'),
('0014116702', '196711141993031001', 'Prof. Ir. Didi Dwi Anggoro, M.Eng., Ph.D.', 'Guru Besar', 'S3', 'PNS', 'Departemen Teknik Kimia'),
('0014129003', '199012142019031014', 'Muhammad Iqbal, S.T., M.T.', 'Asisten Ahli', 'S2', 'PNS', 'Departemen Teknik Perkapalan'),
('0015016005', '196001151988101001', 'Ir. Hantoro Satriadi, M.T.', 'Lektor', 'S2', 'PNS', 'Departemen Teknik Kimia'),
('0015018601', '198601152010122004', 'Noer Abyor Handayani (Noera), S.T., M.T.', 'Lektor', 'S2', 'PNS', 'Departemen Teknik Kimia'),
('0015036004', '196003151987031001', 'Dr. Ir Heru Prastawa, DEA', 'Lektor Kepala', 'S3', 'PNS', 'Departemen Teknik Industri'),
('0015047110', '197105152000031014', 'Zainal Fanani Rosyada, S.T., M.T.', 'Asisten Ahli', 'S2', 'PNS', 'Departemen Teknik Industri'),
('0015067710', '197706152008011011', 'Rinta Kridalukmana, S.Kom., M.T.', 'Lektor', 'S2', 'PNS', 'Departemen Teknik Komputer'),
('0015075803', '195807151986021001', 'Ir. EPF Eko Yuli Priyono, M.S.', 'Lektor', 'S2', 'PNS', 'Departemen Teknik Sipil'),
('0015097503', '197509152000121001', 'Dr.nat.tech. Siswo Sumardiono, S.T., M.T.', 'Lektor Kepala', 'S3', 'PNS', 'Departemen Teknik Kimia'),
('0016027606', '197602162009121001', 'Dr. techn. Khoiri Rozi, S.T., M.T.', 'Asisten Ahli', 'S3', 'PNS', 'Departemen Teknik Mesin'),
('0016036304', '196303161991031002', 'Dr. Ir. Nuroji, M.T.', 'Lektor Kepala', 'S3', 'PNS', 'Departemen Teknik Sipil'),
('0016037401', '197403162001121001', 'Dr. Singgih Saptadi, S.T., M.T.', 'Lektor', 'S3', 'PNS', 'Departemen Teknik Industri'),
('0016047603', '197604161999032002', 'Dr. Aprilina Purbasari, S.T., M.T.', 'Lektor Kepala', 'S3', 'PNS', 'Departemen Teknik Kimia'),
('0016056203', '196205161990011001', 'Ir. Parang Sabdono, M.Eng.', 'Lektor', 'S2', 'PNS', 'Departemen Teknik Sipil'),
('0016066104', '196106161993031002', 'Ir. Bambang Winardi, M.Kom.', 'Lektor', 'S2', 'PNS', 'Departemen Teknik Elektro'),
('0016067104', '197106161999031003', 'Mochammad Facta, S.T., M.T., Ph.D.', 'Lektor Kepala', 'S3', 'PNS', 'Departemen Teknik Elektro'),
('0016067304', '197306161999031001', 'Bharoto, S.T., M.T.', 'Lektor', 'S2', 'PNS', 'Departemen Teknik Arsitektur'),
('0016078205', '198207162012121004', 'Dr. Kresno Wikan Sadono, S.T., M.Eng.', 'Pengajar', 'S3', 'PNS', 'Departemen Teknik Sipil'),
('0016106202', '196210161988031003', 'Ir. Indriastjario, M.Eng.', 'Lektor Kepala', 'S2', 'PNS', 'Departemen Teknik Arsitektur'),
('0016127402', '197412162000122001', 'Dr.Ing. Ir. Silviana, S.T., M.T., IPM., ASEAN Eng.', 'Lektor Kepala', 'S3', 'PNS', 'Departemen Teknik Kimia'),
('0017017502', '197501172000032001', 'Prof. Nita Aryanti, S.T., M.T., Ph.D.', 'Guru Besar', 'S3', 'PNS', 'Departemen Teknik Kimia'),
('0017026008', '196002171987032001', 'Dra. Bitta Pigawati, Dipl.GE, M.T.', 'Lektor Kepala', 'S2', 'PNS', 'Departemen Perencanaan Wilayah'),
('0017027002', '197002171994121001', 'Dr. Susilo Adi Widyanto, S.T., M.T.', 'Lektor Kepala', 'S3', 'PNS', 'Departemen Teknik Mesin'),
('0017028401', '198402172006042002', 'Nia Budi Puspitasari, S.T., M.T.', 'Lektor', 'S2', 'PNS', 'Departemen Teknik Industri'),
('0017036804', '196803171997022002', 'Retno Susanti, S.T., M.T.', 'Lektor Kepala', 'S2', 'PNS', 'Departemen Perencanaan Wilayah'),
('0017037303', '197303171999031001', 'Ojo Kurdi, S.T., M.T., Ph.D.', 'Lektor Kepala', 'S3', 'PNS', 'Departemen Teknik Mesin'),
('0017049107', 'H.7.1991041720180710', 'Hadha Afrisal, S.T., M.Sc.', 'Asisten Ahli', 'S2', 'Pegawai Undip Non AS', 'Departemen Teknik Elektro'),
('0017049108', 'H.7.1991041720180710', 'Denis, S.T., M.Eng.', 'Asisten Ahli', 'S2', 'Pegawai Undip Non AS', 'Departemen Teknik Elektro'),
('0017058702', '198705172014042001', 'Arnis Rochma Harani, S.T., M.T.', 'Lektor', 'S2', 'PNS', 'Departemen Teknik Arsitektur'),
('0017067206', '197206172000121001', 'Dr. Yudi Basuki, S.T., M.T.', 'Lektor', 'S3', 'PNS', 'Departemen Perencanaan Wilayah'),
('0017067906', '197906172005011003', 'Yoga Aribowo, S.T., M.T.', 'Lektor', 'S2', 'PNS', 'Departemen Teknik Geologi'),
('0017075408', '195407171982032001', 'Prof. Dr.Ir. Nany Yuliastuti, MSP', 'Guru Besar', 'S3', 'PNS', 'Departemen Perencanaan Wilayah'),
('0017096205', '196209171991021001', 'Ir. Sulistyo, M.T., Ph.D.', 'Lektor Kepala', 'S3', 'PNS', 'Departemen Teknik Mesin'),
('0017097904', '197909172008121004', 'Tri Winarno, S.T., M.Eng.', 'Lektor', 'S2', 'PNS', 'Departemen Teknik Geologi'),
('0017107301', '197310172000121001', 'Eko Sasmito Hadi, S.T., M.T.', 'Lektor', 'S2', 'PNS', 'Departemen Teknik Perkapalan'),
('0017116105', '196111171988031001', 'Ir. Tejo Sukmadi, M.T.', 'Lektor Kepala', 'S2', 'PNS', 'Departemen Teknik Elektro'),
('0017126106', '196112171987031001', 'Dr. Ir. Nazaruddin Sinaga, M.S.', 'Lektor Kepala', 'S3', 'PNS', 'Departemen Teknik Mesin'),
('0017127302', '197312172000121001', 'Dr.Eng. Deddy Chrismianto, S.T., M.T.', 'Lektor', 'S3', 'PNS', 'Departemen Teknik Perkapalan'),
('0018015903', '195901181987102001', 'Ir. Diah Susetyo Retnowati, M.T.', 'Lektor Kepala', 'S2', 'PNS', 'Departemen Teknik Kimia'),
('0018017503', '197501181999031001', 'Sri Nugroho, S.T., M.T., Ph.D.', 'Lektor', 'S3', 'PNS', 'Departemen Teknik Mesin'),
('0018067403', '197406181999031002', 'Untung Budiarto, S.T., M.T.', 'Lektor', 'S2', 'PNS', 'Departemen Teknik Perkapalan'),
('0018076004', '196007181989031001', 'Ir. Kiryanto, M.T.', 'Lektor Kepala', 'S2', 'PNS', 'Departemen Teknik Perkapalan'),
('0018078004', '198007162008011017', 'Dr. Rifky Ismail, S.T., M.T.', 'Lektor', 'S3', 'PNS', 'Departemen Teknik Mesin'),
('0018085604', '195608181986031005', 'Ir. Abdul Malik, MSArs', 'Lektor', 'S2', 'PNS', 'Departemen Teknik Arsitektur'),
('0018087103', '197108181997021001', 'Dr. Agus Suprihanto, S.T, M.T.', 'Lektor Kepala', 'S3', 'PNS', 'Departemen Teknik Mesin'),
('0018118802', '198811182014041002', 'Abdi Sukmono, S.T., M.T.', 'Asisten Ahli', 'S2', 'PNS', 'Departemen Teknik Geodesi'),
('0018119004', 'H.7.1990111820180710', 'Ahmad Syauqi Hidayatillah, S.T., M.T.', 'Asisten Ahli', 'S2', 'Pegawai Undip Non AS', 'Departemen Teknik Geologi'),
('0018127102', '197112181995121001', 'Dr. Wahyul Amien Syafei, S.T., M.T.', 'Lektor Kepala', 'S3', 'PNS', 'Departemen Teknik Elektro'),
('0019027901', '197902192003122001', 'Diana Puspita Sari, S.T., M.T.', 'Lektor Kepala', 'S2', 'PNS', 'Departemen Teknik Industri'),
('0019038304', '198303192010121002', 'Kurniawan Teguh Martono, S.T., M.T.', 'Lektor', 'S2', 'PNS', 'Departemen Teknik Komputer'),
('0019038603', '198603192012121002', 'Wiwik Budiawan, S.T., M.T.', 'Lektor', 'S2', 'PNS', 'Departemen Teknik Industri'),
('0019065904', '195906191985111001', 'Ir. Sudjadi, M.T.', 'Lektor Kepala', 'S2', 'PNS', 'Departemen Teknik Elektro'),
('0019077103', '197107191998022001', 'Ajub Ajulian Zahra Macrina, S.T., M.T.', 'Lektor Kepala', 'S2', 'PNS', 'Departemen Teknik Elektro'),
('0019085301', '195308191983031001', 'Prof.Dr.Ing.Ir. Gagoek Hardiman', 'Guru Besar', 'S3', 'PNS', 'Departemen Teknik Arsitektur'),
('0019096704', '196709191999031003', 'Ir. Winardi Dwi Nugraha, M.Si.', 'Asisten Ahli', 'S2', 'PNS', 'Departemen Teknik Lingkungan'),
('0020018203', '198201202008011005', 'Ganjar Samudro, S.T., M.T.', 'Lektor', 'S2', 'PNS', 'Departemen Teknik Lingkungan'),
('0020026602', '196602201991021001', 'Prof. Dr. Ir. Budiyono, M.Si.', 'Guru Besar', 'S3', 'PNS', 'Departemen Teknik Kimia'),
('0020047102', '197104201998021001', 'Dr. Sulardjaka, S.T., M.T.', 'Lektor', 'S3', 'PNS', 'Departemen Teknik Mesin'),
('0020048703', '198704202014012001', 'Pertiwi Andarani, S.T., M.T.', 'Lektor', 'S2', 'PNS', 'Departemen Teknik Lingkungan'),
('0020056203', '196205201989021001', 'Prof.Dr.rer.nat. Ir. Athanasius Priharyoto Bayusen', 'Guru Besar', 'S3', 'PNS', 'Departemen Teknik Mesin'),
('0020057004', '197005201999031002', 'Rusnaldy, S.T., M.T., Ph.D.', 'Lektor Kepala', 'S3', 'PNS', 'Departemen Teknik Mesin'),
('0020058102', '198105202003121002', 'Dr. Mohammad Tauviqirrahman, S.T., M.T.', 'Lektor Kepala', 'S3', 'PNS', 'Departemen Teknik Mesin'),
('0020065904', '195906201987031003', 'Ir. Bambang Yunianto, M.Sc.', 'Lektor Kepala', 'S2', 'PNS', 'Departemen Teknik Mesin'),
('0020077403', '197407201998032001', 'Dr.Ars. Anita Ratnasari Rakhmatulloh, S.T., M.T.', 'Lektor', 'S3', 'PNS', 'Departemen Perencanaan Wilayah'),
('0020106308', '196310201991021001', 'Dr.Ir. Agung Budi Sardjono, M.T.', 'Lektor Kepala', 'S3', 'PNS', 'Departemen Teknik Arsitektur'),
('0020107401', '197410202000121001', 'Sukawi, S.T., M.T.', 'Lektor Kepala', 'S2', 'PNS', 'Departemen Teknik Arsitektur'),
('0020107707', '197710202005011001', 'Najib, S.T., M.Eng., Ph.D.', 'Lektor', 'S3', 'PNS', 'Departemen Teknik Geologi'),
('0021028107', '198102212008121001', 'Norman Iskandar, S.T., M.T.', 'Asisten Ahli', 'S2', 'PNS', 'Departemen Teknik Mesin'),
('0021037603', '197603212000122001', 'Amelia Kusuma Indriastuti, S.T., M.T.', 'Lektor', 'S2', 'PNS', 'Departemen Teknik Sipil'),
('0021047108', '197104211999031003', 'Mohamad Said Kartono Tony Suryo Utomo, S.T., M.T.,', 'Lektor', 'S3', 'PNS', 'Departemen Teknik Mesin'),
('0021056604', '196605212006041010', 'Dr.Ing. Ir. Ismoyo Haryanto, M.T.', 'Lektor', 'S3', 'PNS', 'Departemen Teknik Mesin'),
('0021057010', '197005212000121001', 'Budi Setiyono, S.T., M.T.', 'Lektor', 'S2', 'PNS', 'Departemen Teknik Elektro'),
('0021067301', '197306211997021001', 'Prof. Tutuk Djoko Kusworo, S.T., M.Eng., Ph.D.', 'Guru Besar', 'S3', 'PNS', 'Departemen Teknik Kimia'),
('0021068701', '198706212012121001', 'Asep Muhamad Samsudin, S.T., M.T.', 'Asisten Ahli', 'S2', 'PNS', 'Departemen Teknik Kimia'),
('0021078202', '198207212003122001', 'Dr.Ing. Santy Paulla Dewi, S.T., M.T.', 'Lektor', 'S3', 'PNS', 'Departemen Perencanaan Wilayah'),
('0021087404', '197408212005011001', 'Moehammad Awaluddin, S.T., M.T.', 'Lektor', 'S2', 'PNS', 'Departemen Teknik Geodesi'),
('0021097404', '197409212000031002', 'Dr.Ing Prihadi Nugroho, S.T., M.T.', 'Lektor', 'S3', 'PNS', 'Departemen Perencanaan Wilayah'),
('0021106008', '196010211990032002', 'Ir. Hermin Werdiningsih, M.T.', 'Lektor', 'S2', 'PNS', 'Departemen Teknik Arsitektur'),
('0021107502', '197510211999031004', 'Dr.Eng. Hartono Yudo, S.T., M.T.', 'Lektor Kepala', 'S3', 'PNS', 'Departemen Teknik Perkapalan'),
('0021125803', '195812211987032001', 'Ir. Dwi Kurniani, M.S.', 'Lektor', 'S2', 'PNS', 'Departemen Teknik Sipil'),
('0021126905', '196912211995121001', 'Achmad Hidayatno, S.T., M.T.', 'Lektor Kepala', 'S2', 'PNS', 'Departemen Teknik Elektro'),
('0021127303', '197312211999031002', 'Dr. Denny Nurkertamanda, S.T., M.T.', 'Lektor Kepala', 'S3', 'PNS', 'Departemen Teknik Industri'),
('0022017502', '197501222000121001', 'Dr.Eng. Ahmad Fauzan Zakki, S.T., M.T.', 'Lektor Kepala', 'S3', 'PNS', 'Departemen Teknik Perkapalan'),
('0022018302', '198301222006041002', 'Fahrudin, S.T., M.T.', 'Lektor', 'S2', 'PNS', 'Departemen Teknik Geologi'),
('0022045710', '195704221986031001', 'Dr. Ir. Bambang Purwanggono Sukarsono, M.Eng.', 'Lektor Kepala', 'S3', 'PNS', 'Departemen Teknik Industri'),
('0022047201', '197204221999031004', 'Dr. Abdul Syakur, S.T., M.T.', 'Lektor Kepala', 'S3', 'PNS', 'Departemen Teknik Elektro'),
('0022055903', '195905221988121001', 'Ir. Sarjito Jokosisworo, M.Si.', 'Lektor Kepala', 'S2', 'PNS', 'Departemen Teknik Perkapalan'),
('0022067709', '197706222010121001', 'Teguh Prakoso, S.T., M.T., Ph.D.', 'Lektor', 'S3', 'PNS', 'Departemen Teknik Elektro'),
('0022075906', '195907221987031003', 'Prof. Dr. Dipl.Ing. Ir. Berkah Fajar Tamtomo Kiono', 'Guru Besar', 'S3', 'PNS', 'Departemen Teknik Mesin'),
('0022076105', '196107221986021001', 'Ir. Himawan Indarto, M.S.', 'Lektor Kepala', 'S2', 'PNS', 'Departemen Teknik Sipil'),
('0022086606', '196608221997022001', 'Dr.Ars. Ir. Rina Kurniati, M.T.', 'Lektor Kepala', 'S3', 'PNS', 'Departemen Perencanaan Wilayah'),
('0022097503', '197509222003122002', 'Maya Damayanti, S.T., M.A., Ph.D.', 'Lektor', 'S3', 'PNS', 'Departemen Perencanaan Wilayah'),
('0022106109', '196110221988031002', 'Dr.T. Ir. Indro Sumantri, M.Eng.', 'Lektor Kepala', 'S3', 'PNS', 'Departemen Teknik Kimia'),
('0022125705', '195712221987031001', 'Ir. Dhanoe Iswanto, M.T.', 'Lektor', 'S2', 'PNS', 'Departemen Teknik Arsitektur'),
('0022126303', '196312221990011003', 'Dr.Ir. Hadi Wahyono, M.A.', 'Lektor Kepala', 'S3', 'PNS', 'Departemen Perencanaan Wilayah'),
('0023016705', '196701231994012001', 'Ir. Sri Hartuti Wahyuningrum, M.T.', 'Lektor', 'S2', 'PNS', 'Departemen Teknik Arsitektur'),
('0023026003', '196002231986021001', 'Dr. Ir. Hermawan, DEA', 'Lektor Kepala', 'S3', 'PNS', 'Departemen Teknik Elektro'),
('0023027404', '197402231997021001', 'Edward Endrianto Pandelaki, S.T., M.T., Ph.D.', 'Lektor', 'S3', 'PNS', 'Departemen Teknik Arsitektur'),
('0023035909', '195903231988032001', 'Ir. Hary Budieny, M.T.', 'Lektor', 'S2', 'PNS', 'Departemen Teknik Sipil'),
('0023036005', '196003231990011001', 'Ir. Bambang Pardoyo, CES., M.T.', 'Lektor', 'S2', 'PNS', 'Departemen Teknik Sipil'),
('0023036603', '196603231999031008', 'Ir. Sawitri Subiyanto, M.Si.', 'Lektor', 'S2', 'PNS', 'Departemen Teknik Geodesi'),
('0023046204', '196204231987031003', 'Dr. Ir. Dwi Basuki Wibowo, M.S.', 'Lektor Kepala', 'S3', 'PNS', 'Departemen Teknik Mesin'),
('0023047003', '197004231995121001', 'Prof. Dr. I Nyoman Widiasa, S.T., M.T.', 'Guru Besar', 'S3', 'PNS', 'Departemen Teknik Kimia'),
('0023047905', '197904232006041001', 'Dr. Yudo Prasetyo, S.T., M.T.', 'Lektor', 'S3', 'PNS', 'Departemen Teknik Geodesi'),
('0023057403', '197405231998021001', 'Prof. Dr. Andri Cahyo Kumoro, S.T., M.T.', 'Guru Besar', 'S3', 'PNS', 'Departemen Teknik Kimia'),
('0023077103', '197107231998022001', 'Dr. Yulita Arni Priastiwi, S.T., M.T.', 'Lektor', 'S3', 'PNS', 'Departemen Teknik Sipil'),
('0023107101', '197110231998022001', 'Sri Rahayu, S.Si., M.Si.', 'Lektor', 'S2', 'PNS', 'Departemen Perencanaan Wilayah'),
('0023108804', 'H.7.1988102320180710', 'Reddy Setyawan, S.T., M.T.', 'Asisten Ahli', 'S2', 'Pegawai Undip Non AS', 'Departemen Teknik Geologi'),
('0023117005', '197011231998021001', 'Dr. Eng. Gunawan Dwi Haryadi, S.T., M.T.', 'Lektor Kepala', 'S3', 'PNS', 'Departemen Teknik Mesin'),
('0023117006', '197011231995121001', 'Prof. Dr.rer.nat. Imam Buchori, S.T.', 'Guru Besar', 'S3', 'PNS', 'Departemen Perencanaan Wilayah'),
('0024039202', '199203242019031016', 'Bimastyaji Surya Ramadan, S.T., M.T.', 'Asisten Ahli', 'S2', 'PNS', 'Departemen Teknik Lingkungan'),
('0024046904', '196904291998021006', 'Hardi Wibowo, S.T., M.Eng.', 'Lektor', 'S2', 'PNS', 'Departemen Teknik Sipil'),
('0024057703', '197705242003122001', 'Landung Esariti, S.T., MPS', 'Lektor', 'S2', 'PNS', 'Departemen Perencanaan Wilayah'),
('0024065706', '195706241985031001', 'Ir. Yohannes Inigo Wicaksono, M.S.', 'Lektor', 'S2', 'PNS', 'Departemen Teknik Sipil'),
('0024077103', '197107241997021001', 'Dr. Ing. Asnawi, S.T.', 'Lektor Kepala', 'S3', 'PNS', 'Departemen Perencanaan Wilayah'),
('0024088102', '198108242006042001', 'Sri Hapsari Budisulistiorini, S.T., M.Eng.Sc., Ph.', 'Asisten Ahli', 'S3', 'PNS', 'Departemen Teknik Lingkungan'),
('0024107302', '197310242000031001', 'Wiharyanto Oktiawan, S.T., M.T.', 'Lektor', 'S2', 'PNS', 'Departemen Teknik Lingkungan'),
('0024117101', '197111241998031002', 'Mohammad Muktiali, S.E., M.Si., M.T.', 'Lektor Kepala', 'S2', 'PNS', 'Departemen Perencanaan Wilayah'),
('0025016004', '196001251987031001', 'Ir. Sugiyanto, DEA', 'Lektor Kepala', 'S2', 'PNS', 'Departemen Teknik Mesin'),
('0025017402', '197401252006041001', 'Bambang Darmo Yuwono, S.T., M.T.', 'Lektor', 'S2', 'PNS', 'Departemen Teknik Geodesi'),
('0025018501', '198501252012121005', 'Arwan Putra Wijaya, S.T., M.T.', 'Asisten Ahli', 'S2', 'PNS', 'Departemen Teknik Geodesi'),
('0025027601', '197602252000121001', 'Ilham Nurhuda, S.T., M.T., Ph.D.', 'Lektor Kepala', 'S3', 'PNS', 'Departemen Teknik Sipil'),
('0025028801', '198802252012121003', 'Arya Rezagama, S.T., M.T.', 'Lektor', 'S2', 'PNS', 'Departemen Teknik Lingkungan'),
('0025037505', '197503252003121002', 'Ari Wibawa Budi Santosa, S.T., M.Si.', 'Lektor', 'S2', 'PNS', 'Departemen Teknik Perkapalan'),
('0025057601', '197605252000122001', 'Dr. Ing. Wiwandari Handayani, S.T., M.T., MPS', 'Lektor Kepala', 'S3', 'PNS', 'Departemen Perencanaan Wilayah'),
('0025067003', '197006252002122001', 'Dr Sri Hartini, S.T., M.T.', 'Lektor Kepala', 'S3', 'PNS', 'Departemen Teknik Industri'),
('0025106012', '196010251998021001', 'Ir. Imam Pujo Mulyatno, M.T.', 'Lektor', 'S2', 'PNS', 'Departemen Teknik Perkapalan'),
('0025117805', '197811252008121001', 'Andri Suprayogi, S.T., M.T.', 'Lektor', 'S2', 'PNS', 'Departemen Teknik Geodesi'),
('0026027301', '197302261998021001', 'Dr. Adian Fatchur Rochim, S.T., M.T.', 'Lektor Kepala', 'S3', 'PNS', 'Departemen Teknik Komputer'),
('0026038401', '198403262006042001', 'Dyah Ika Rinawati, S.T., M.T.', 'Lektor', 'S2', 'PNS', 'Departemen Teknik Industri'),
('0026047402', '197404262000121001', 'Darminto Pujotomo, S.T., M.T.', 'Lektor Kepala', 'S2', 'PNS', 'Departemen Teknik Industri'),
('0026056003', '196005261987101001', 'Ir. Djoko Purwanto, M.S.', 'Lektor', 'S2', 'PNS', 'Departemen Teknik Sipil'),
('0026056407', '196405261989031002', 'Dr. Ir. Jaka Windarta, M.T.', 'Lektor Kepala', 'S3', 'PNS', 'Departemen Teknik Elektro'),
('0026057302', '197305262000121001', 'Dr. Susatyo Handoko, S.T., M.T.', 'Lektor', 'S3', 'PNS', 'Departemen Teknik Elektro'),
('0026057713', '197705262010121001', 'Eko Didik Widianto, S.T., M.T.', 'Lektor', 'S2', 'PNS', 'Departemen Teknik Komputer'),
('0026058501', '198505262010121005', 'Andi Trimulyono, S.T., M.T., Ph.D.', 'Lektor', 'S3', 'PNS', 'Departemen Teknik Perkapalan'),
('0026076805', '196807261997021001', 'Mardwi Rahdriawan, S.T., M.T.', 'Lektor', 'S2', 'PNS', 'Departemen Perencanaan Wilayah'),
('0026087703', '197708262006041001', 'Munawar Agus Riyadi, S.T., M.T., Ph.D.', 'Lektor', 'S3', 'PNS', 'Departemen Teknik Elektro'),
('0026088601', '198608262010121005', 'Berlian Arswendo Adietya, S.T., M.T.', 'Lektor', 'S2', 'PNS', 'Departemen Teknik Perkapalan'),
('0026097304', '197309262000121001', 'Dr. Iwan Setiawan, S.T., M.T.', 'Lektor Kepala', 'S3', 'PNS', 'Departemen Teknik Elektro'),
('0026115604', '195611261987031002', 'Prof. Dr. Ir. Hargono, M.T.', 'Guru Besar', 'S3', 'PNS', 'Departemen Teknik Kimia'),
('0026126104', '196112261988031001', 'Dr. Ir. Setia Budi Sasongko, DEA.', 'Lektor Kepala', 'S3', 'PNS', 'Departemen Teknik Kimia'),
('0027018112', 'H.7.1981012720180710', 'Adnan Fauzi, S.T., M.Kom.', 'Pengajar', 'S2', 'Pegawai Undip Non AS', 'Departemen Teknik Komputer'),
('0027036203', '196203271991022001', 'Dr. Ir. Nur Rokhati, M.T.', 'Lektor Kepala', 'S3', 'PNS', 'Departemen Teknik Kimia'),
('0027036204', '196203271988031004', 'Ir. Satrio Nugroho, M.Si.', 'Lektor', 'S2', 'PNS', 'Departemen Teknik Arsitektur'),
('0027037104', '197103271999032002', 'Prof. Dr. Aries Susanty, S.T., M.T.', 'Guru Besar', 'S3', 'PNS', 'Departemen Teknik Industri'),
('0027037404', '197403271999031002', 'Dr.sc.agr. Iwan Rudiarto, S.T., M.Sc.', 'Lektor Kepala', 'S3', 'PNS', 'Departemen Perencanaan Wilayah'),
('0027046004', '196004271987031001', 'Prof. Dr. Ir. Suripin, M.Eng.', 'Guru Besar', 'S3', 'PNS', 'Departemen Teknik Sipil'),
('0027067003', '197006271998031005', 'Dr. Mussadun, S.T., M.Si.', 'Lektor', 'S3', 'PNS', 'Departemen Perencanaan Wilayah'),
('0027067403', '197406271999031002', 'Dr. Maman Somantri, S.T., M.T.', 'Lektor', 'S3', 'PNS', 'Departemen Teknik Elektro'),
('0027068402', '198406272012121003', 'Resza Riskiyanto, S.T., M.T.', 'Lektor', 'S2', 'PNS', 'Departemen Teknik Arsitektur'),
('0027077008', '197007272000121001', 'Dr. Ir. R. Rizal Isnanto, S.T., M.M., M.T., IPM', 'Lektor Kepala', 'S3', 'PNS', 'Departemen Teknik Komputer'),
('0027096302', '196309271993032001', 'Ir. Nurini, M.T.', 'Lektor Kepala', 'S2', 'PNS', 'Departemen Perencanaan Wilayah'),
('0027098602', '198609272014042001', 'Anis Kurniasih, S.T., M.T.', 'Asisten Ahli', 'S2', 'PNS', 'Departemen Teknik Geologi'),
('0027108012', '198010272015041001', 'Yusuf Widharto, S.T., M.Eng.', 'Asisten Ahli', 'S2', 'PNS', 'Departemen Teknik Industri'),
('0028028506', '198502282015041001', 'Mochammad Ariyanto, S.T.,M.T.', 'Lektor', 'S2', 'PNS', 'Departemen Teknik Mesin'),
('0028038705', '198703282015041002', 'Riqi Radian Khasani, S.T., M.T.', 'Asisten Ahli', 'S2', 'PNS', 'Departemen Teknik Sipil'),
('0028047501', '197504281999031001', 'Jati Utomo Dwi Hatmoko, S.T., M.M., M.Sc., Ph.D.', 'Lektor Kepala', 'S3', 'PNS', 'Departemen Teknik Sipil'),
('0028055911', '195905281988031001', 'Ir. Indrastono Dwi Atmanto, M.Ing.', 'Lektor Kepala', 'S2', 'PNS', 'Departemen Teknik Sipil'),
('0028056209', '196204281990012001', 'Ir. Eflita Yohana, M.T., Ph.D.', 'Lektor Kepala', 'S3', 'PNS', 'Departemen Teknik Mesin'),
('0028057601', '197605282000122001', 'Dyah Hesti Wardhani, S.T., M.T., Ph.D.', 'Lektor Kepala', 'S3', 'PNS', 'Departemen Teknik Kimia'),
('0028066802', '196806281998022001', 'Dr. Ir. R. Siti Rukayah, M.T.', 'Lektor Kepala', 'S3', 'PNS', 'Departemen Teknik Arsitektur'),
('0028107503', '197510281999031004', 'Prof. Dr. Ir. Hadiyanto, S.T., M.Sc., IPU', 'Guru Besar', 'S3', 'PNS', 'Departemen Teknik Kimia'),
('0028125613', '195612281985031003', 'Dr.Ir. Ragil Haryanto, M.SP.', 'Lektor Kepala', 'S3', 'PNS', 'Departemen Perencanaan Wilayah'),
('0028126103', '196112281986031004', 'Prof. Dr. Ir. Purwanto, DEA', 'Guru Besar', 'S3', 'PNS', 'Departemen Teknik Kimia'),
('0029018403', '198401292009121003', 'Dr.Eng. Bangun Indrakusumo Radityo Harsritanto, S.', 'Lektor', 'S3', 'PNS', 'Departemen Teknik Arsitektur'),
('0029045805', '195804291986021001', 'Ir. Nugroho Agus Darmanto, M.T.', 'Lektor', 'S2', 'PNS', 'Departemen Teknik Elektro'),
('0029046703', '196704291994032002', 'Dr. Sunarti, S.T., M.T.', 'Lektor Kepala', 'S3', 'PNS', 'Departemen Perencanaan Wilayah'),
('0029046902', '196904292002121001', 'Dr. Hery Suliantoro, S.T., M.T.', 'Lektor Kepala', 'S3', 'PNS', 'Departemen Teknik Industri'),
('0029047102', '197104291998021001', 'Priyo Nugroho Parmantoro, S.T., M.Eng.', 'Lektor', 'S2', 'PNS', 'Departemen Teknik Sipil'),
('0029057502', '197505291998021001', 'Prof. Dr.rer.nat. Heru Susanto, S.T., M.M., M.T.', 'Guru Besar', 'S3', 'PNS', 'Departemen Teknik Kimia'),
('0029095805', '195809291986021001', 'Dr. Ir. Windu Partono, M.Sc.', 'Lektor Kepala', 'S3', 'PNS', 'Departemen Teknik Sipil'),
('0029096908', '196909291997021001', 'Dr. Fadjar Hari Mardiansjah, S.T., M.T., MDP', 'Lektor', 'S3', 'PNS', 'Departemen Perencanaan Wilayah'),
('0030017303', '197301302000032001', 'Ir. Nurandani Hardyanti, S.T., M.T., IPM.', 'Lektor Kepala', 'S2', 'PNS', 'Departemen Teknik Lingkungan'),
('0030037103', '197103301998022001', 'Dr.Ling., Ir. Sri Sumiyati, S.T., M.Si., IPM.', 'Lektor', 'S3', 'PNS', 'Departemen Teknik Lingkungan'),
('0030039004', 'H.7.1990033020180710', 'Satriya Wahyu Firmandhani, S.T., M.T.', 'Asisten Ahli', 'S2', 'Pegawai Undip Non AS', 'Departemen Teknik Arsitektur'),
('0030045403', '195404301981032001', 'Prof. Dr. Ir. Sri Prabandiyani Retno Wardani, M.Sc', 'Guru Besar', 'S3', 'PNS', 'Departemen Teknik Sipil'),
('0030046702', '196704301992032002', 'Dr. Ir. Suzanna Ratih Sari, M.M., M.A.', 'Lektor Kepala', 'S3', 'PNS', 'Departemen Teknik Arsitektur'),
('0030058102', '198105302006041001', 'Arief Laila Nugraha, S.T., M.Eng.', 'Lektor', 'S2', 'PNS', 'Departemen Teknik Geodesi'),
('0030058503', 'H.7.1985053020180720', 'Mada Sophianingrum, S.T., M.T., M.Sc.', 'Pengajar', 'S2', 'Pegawai Undip Non AS', 'Departemen Perencanaan Wilayah'),
('0030067203', '197206302000121001', 'Trias Andromeda, S.T., M.T., Ph.D.', 'Lektor', 'S3', 'PNS', 'Departemen Teknik Elektro'),
('0030087201', '197208302000031001', 'Dr. Ir. Badrus Zaman, S.T., M.T., IPM.', 'Lektor Kepala', 'S3', 'PNS', 'Departemen Teknik Lingkungan'),
('0030097402', '197409302001121002', 'Mochamad Arief Budihardjo, S.T., M.Eng.Sc, Env.Eng', 'Lektor Kepala', 'S3', 'PNS', 'Departemen Teknik Lingkungan'),
('0031017402', '197401311999031003', 'Dr. Ing. Sudarno, S.T., M.Sc.', 'Lektor', 'S3', 'PNS', 'Departemen Teknik Lingkungan'),
('0031018206', '198201312010121003', 'Wahyu Caesarendra, S.T., M.Eng., Ph.D.', 'Lektor', 'S3', 'PNS', 'Departemen Teknik Mesin'),
('0031057204', '197205312000031001', 'Kami Hari Basuki, S.T., M.T.', 'Lektor', 'S2', 'PNS', 'Departemen Teknik Sipil'),
('0031085707', '195708311986021002', 'Ir. Endro Sutrisno, M.S.', 'Lektor', 'S2', 'PNS', 'Departemen Teknik Lingkungan'),
('0031125513', '195512311983031014', 'Prof.Ir. Abdullah, M.S., Ph.D.', 'Guru Besar', 'S3', 'PNS', 'Departemen Teknik Kimia'),
('0031126321', '196312311990031022', 'Prof. Dr. Ir. Edi Purwanto, M.T.', 'Guru Besar', 'S3', 'PNS', 'Departemen Teknik Arsitektur'),
('0031127203', '197212311998022001', 'Dr. Ir. Ratna Purwaningsih, S.T., M.T., IPM.', 'Lektor Kepala', 'S3', 'PNS', 'Departemen Teknik Industri'),
('015018804', 'H.7.1988011520180710', 'Fauzi Janu Amarrohman, S.T., M.Eng.', 'Asisten Ahli', 'S2', 'Pegawai Undip Non AS', 'Departemen Teknik Geodesi'),
('022118903', 'H.7.1989112220180710', 'Nurhadi Bashit, S.T., M.Eng.', 'Asisten Ahli', 'S2', 'Pegawai Undip Non AS', 'Departemen Teknik Geodesi'),
('0617088402', '98408172015041002', 'M. Arfan, S.Kom., M.Eng.', 'Asisten Ahli', 'S2', 'PNS', 'Departemen Teknik Elektro'),
('9990202241', '195303091981031005', 'Prof. Dr. Ir. Sri Tudjono, M.S.', 'Guru Besar', 'S3', 'PNS', 'Departemen Teknik Sipil'),
('9990371185', '195409301980032001', 'Prof. Dr. Ir. Sri Sangkawati, M.S.', 'Guru Besar', 'S3', 'PNS', 'Departemen Teknik Sipil'),
('admin', 'admin', 'Admin', '', '', '', ''),
('pengusul', 'pengusul', 'pengusul', 'Rektor', 'S3', 'Bos Besar', 'Teknik Elektro'),
('reviewer1', 'reviewer1', 'reviewer1', 'reviewer', 'reviewer', 'reviewer', 'Teknik Elektro'),
('reviewer2', 'reviewer2', 'reviewer2', 'reviewer', 'reviewer', 'reviewer', 'Teknik Elektro');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dsn_penelitian`
--

CREATE TABLE `dsn_penelitian` (
  `id` int(10) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `id_proposal` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dsn_penelitian`
--

INSERT INTO `dsn_penelitian` (`id`, `nip`, `id_proposal`) VALUES
(51, '0001016903', 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dsn_pengabdian`
--

CREATE TABLE `dsn_pengabdian` (
  `id` int(10) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `id_proposal` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dsn_pengabdian`
--

INSERT INTO `dsn_pengabdian` (`id`, `nip`, `id_proposal`) VALUES
(1, '195612281985031003', 1),
(24, '0001016903', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal_penelitian`
--

CREATE TABLE `jadwal_penelitian` (
  `id` int(3) NOT NULL,
  `keterangan` varchar(1000) NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_monev` date NOT NULL,
  `tgl_akhir` date NOT NULL,
  `tgl_selesai` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jadwal_penelitian`
--

INSERT INTO `jadwal_penelitian` (`id`, `keterangan`, `tgl_mulai`, `tgl_monev`, `tgl_akhir`, `tgl_selesai`) VALUES
(14, 'Periode1', '2021-02-01', '2021-02-25', '2021-02-26', '2021-03-30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal_pengabdian`
--

CREATE TABLE `jadwal_pengabdian` (
  `id` int(3) NOT NULL,
  `keterangan` varchar(1000) NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_akhir` date NOT NULL,
  `tgl_selesai` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jadwal_pengabdian`
--

INSERT INTO `jadwal_pengabdian` (`id`, `keterangan`, `tgl_mulai`, `tgl_akhir`, `tgl_selesai`) VALUES
(7, 'coba', '2021-02-14', '2021-02-18', '2021-02-28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenispenelitian`
--

CREATE TABLE `jenispenelitian` (
  `id` int(11) NOT NULL,
  `jenis` varchar(30) NOT NULL,
  `tgl` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jenispenelitian`
--

INSERT INTO `jenispenelitian` (`id`, `jenis`, `tgl`) VALUES
(1, 'Skema Penelitian', 2020);

-- --------------------------------------------------------

--
-- Struktur dari tabel `komponen_nilai_pengabdian`
--

CREATE TABLE `komponen_nilai_pengabdian` (
  `id` int(5) NOT NULL,
  `id_skema_pengabdian` int(5) NOT NULL,
  `komponen_penilaian` varchar(1000) NOT NULL,
  `bobot` int(35) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `komponen_nilai_pengabdian`
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
-- Struktur dari tabel `komp_penilaian_penelitian`
--

CREATE TABLE `komp_penilaian_penelitian` (
  `id` int(11) NOT NULL,
  `id_jenis` int(5) NOT NULL,
  `komponen` varchar(1000) NOT NULL,
  `bobot` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `komp_penilaian_penelitian`
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
-- Struktur dari tabel `laporan_akhir_penelitian`
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

--
-- Dumping data untuk tabel `laporan_akhir_penelitian`
--

INSERT INTO `laporan_akhir_penelitian` (`id`, `id_proposal`, `nip`, `tgl_upload`, `file1`, `file2`, `file3`, `file4`, `catatan`, `status`) VALUES
(1, 2, 'pengusul', '2021-02-14', 'f7f6237ede0e41bdbc7ba564166cccbc.pdf', '7fdd27307c06021e2b420f8a9e869359.pdf', '70696014e82939372a9ae2907261c99e.pdf', '08833f175e0944b3e02de419f010ccc9.pdf', ' dsfs', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan_akhir_pengabdian`
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
-- Struktur dari tabel `laporan_monev_penelitian`
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

--
-- Dumping data untuk tabel `laporan_monev_penelitian`
--

INSERT INTO `laporan_monev_penelitian` (`id`, `id_proposal`, `nip`, `tgl_upload`, `file1`, `file2`, `file3`, `catatan`, `status`) VALUES
(1, 2, 'pengusul', '2021-02-14', '6a0f9f2684495c3575de98c45f6580bf.pdf', '98fbd5e87f98a074e6d921e085e580bf.pdf', '2a10898f8fa086c07a4d2885a5031c8b.pdf', ' dfsdfds', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `luaran`
--

CREATE TABLE `luaran` (
  `id` int(11) NOT NULL,
  `luaran` varchar(20) NOT NULL,
  `tgl` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `luaran`
--

INSERT INTO `luaran` (`id`, `luaran`, `tgl`) VALUES
(3, '', 0000),
(4, '', 0000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `luaran_penelitian`
--

CREATE TABLE `luaran_penelitian` (
  `id` int(11) NOT NULL,
  `luaran` varchar(40) NOT NULL,
  `tgl` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `luaran_penelitian`
--

INSERT INTO `luaran_penelitian` (`id`, `luaran`, `tgl`) VALUES
(1, 'Tools / Aplikasi', 2021),
(2, 'Coba coba', 2021),
(3, 'coba', 2021);

-- --------------------------------------------------------

--
-- Struktur dari tabel `luaran_pengabdian`
--

CREATE TABLE `luaran_pengabdian` (
  `id` int(11) NOT NULL,
  `luaran` varchar(40) NOT NULL,
  `tgl` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `luaran_pengabdian`
--

INSERT INTO `luaran_pengabdian` (`id`, `luaran`, `tgl`) VALUES
(1, 'Proposal', 2021),
(7, 'coba', 2021);

-- --------------------------------------------------------

--
-- Struktur dari tabel `luaran_prop_penelitian`
--

CREATE TABLE `luaran_prop_penelitian` (
  `id` int(20) NOT NULL,
  `id_luaran` int(20) NOT NULL,
  `id_proposal` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `luaran_prop_penelitian`
--

INSERT INTO `luaran_prop_penelitian` (`id`, `id_luaran`, `id_proposal`) VALUES
(37, 0, 2),
(38, 7, 2),
(40, 2, 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `luaran_prop_pengabdian`
--

CREATE TABLE `luaran_prop_pengabdian` (
  `id` int(20) NOT NULL,
  `id_luaran` int(20) NOT NULL,
  `id_proposal` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `luaran_prop_pengabdian`
--

INSERT INTO `luaran_prop_pengabdian` (`id`, `id_luaran`, `id_proposal`) VALUES
(15, 7, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
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
-- Struktur dari tabel `mhs_penelitian`
--

CREATE TABLE `mhs_penelitian` (
  `id` int(10) NOT NULL,
  `nim` varchar(14) NOT NULL,
  `nama` varchar(70) NOT NULL,
  `id_proposal` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mhs_penelitian`
--

INSERT INTO `mhs_penelitian` (`id`, `nim`, `nama`, `id_proposal`) VALUES
(1, '12345', 'nama', 2),
(2, '21060117130082', 'irza', 3),
(3, '21060117130082', 'irza', 4),
(4, '21060117130082', 'irza', 5),
(5, '21060117130082', 'irza', 6),
(6, '21060117130082', 'irza', 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mhs_pengabdian`
--

CREATE TABLE `mhs_pengabdian` (
  `id` int(10) NOT NULL,
  `nim` varchar(14) NOT NULL,
  `nama` varchar(70) NOT NULL,
  `id_proposal` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mhs_pengabdian`
--

INSERT INTO `mhs_pengabdian` (`id`, `nim`, `nama`, `id_proposal`) VALUES
(1, '214523', 'sdadsawsadd', 1),
(2, '21060117130082', 'irza', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mitra`
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

--
-- Dumping data untuk tabel `mitra`
--

INSERT INTO `mitra` (`id`, `nama_instansi`, `penanggung_jwb`, `no_telp`, `email`, `alamat`, `username`, `status`, `file_persetujuan`) VALUES
(2, 'Universitas Diponegoro', 'asdas', '08977290923', 'Irzadexter@gmail.com', 'desa tawangsari, kecamatan Teras', 'irza', 0, ''),
(3, 'Universitas Diponegoro', 'asdas', '08977290923', 'Irzadexter@gmail.com', 'desa tawangsari, kecamatan Teras', 'nur', 0, ''),
(4, 'Universitas Diponegoro', 'Penanggung jawab', '08977290923', 'Irzadexter@gmail.com', 'desa tawangsari, kecamatan Teras', 'irza', 0, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai_penelitian`
--

CREATE TABLE `nilai_penelitian` (
  `id` int(11) NOT NULL,
  `id_proposal` int(10) NOT NULL,
  `id_komponen` int(10) NOT NULL,
  `skor` int(3) NOT NULL,
  `nilai` int(10) NOT NULL,
  `reviewer` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `nilai_penelitian`
--

INSERT INTO `nilai_penelitian` (`id`, `id_proposal`, `id_komponen`, `skor`, `nilai`, `reviewer`) VALUES
(1, 2, 1, 5, 100, 'reviewer1'),
(2, 2, 2, 5, 50, 'reviewer1'),
(3, 2, 3, 5, 50, 'reviewer1'),
(4, 2, 4, 5, 100, 'reviewer1'),
(5, 2, 5, 5, 50, 'reviewer1'),
(6, 2, 6, 5, 100, 'reviewer1'),
(7, 2, 7, 5, 50, 'reviewer1'),
(8, 2, 8, 5, 100, 'reviewer1'),
(9, 2, 1, 5, 100, 'reviewer2'),
(10, 2, 2, 5, 50, 'reviewer2'),
(11, 2, 3, 5, 50, 'reviewer2'),
(12, 2, 4, 5, 100, 'reviewer2'),
(13, 2, 5, 5, 50, 'reviewer2'),
(14, 2, 6, 5, 100, 'reviewer2'),
(15, 2, 7, 5, 50, 'reviewer2'),
(16, 2, 8, 5, 100, 'reviewer2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai_proposal_penelitian`
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

--
-- Dumping data untuk tabel `nilai_proposal_penelitian`
--

INSERT INTO `nilai_proposal_penelitian` (`id`, `id_proposal`, `komentar`, `cr_monev`, `nilai`, `komentar2`, `cr_monev2`, `nilai2`) VALUES
(1, 2, 'adsadas', '', 600, 'dwede', '', 600);

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai_proposal_pengabdian`
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
-- Dumping data untuk tabel `nilai_proposal_pengabdian`
--

INSERT INTO `nilai_proposal_pengabdian` (`id`, `id_proposal`, `komentar`, `nilai`, `komentar2`, `nilai2`) VALUES
(1, 1, 'ded', 500, 'sadasd', 500);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id` int(11) NOT NULL,
  `berita` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengumuman`
--

INSERT INTO `pengumuman` (`id`, `berita`) VALUES
(1, '<p>kldasnlkdjxm;a</p>\r\n'),
(2, '<p>kjdancnskjcns</p>\r\n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `proposal_penelitian`
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
  `mitra` varchar(100) NOT NULL,
  `id_jadwal` int(3) NOT NULL,
  `tgl_upload` date NOT NULL,
  `file` varchar(1000) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `proposal_penelitian`
--

INSERT INTO `proposal_penelitian` (`id`, `id_jenis`, `nip`, `judul`, `abstrak`, `lokasi`, `lama_pelaksanaan`, `biaya`, `id_sumberdana`, `mitra`, `id_jadwal`, `tgl_upload`, `file`, `status`) VALUES
(7, 1, 'pengusul', 'Penelitian A', ' sadsadsadsa', 'solo', '12', '120000', 8, 'AKu', 14, '2021-02-21', '82150592f417427b4dbb1108d06210d8.pdf', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `proposal_pengabdian`
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
  `id_jadwal` int(3) NOT NULL,
  `tgl_upload` date NOT NULL,
  `file` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL,
  `id_luaran` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `proposal_pengabdian`
--

INSERT INTO `proposal_pengabdian` (`id`, `nip`, `id_mitra`, `judul`, `abstrak`, `lokasi`, `lama_pelaksanaan`, `biaya`, `id_skema`, `id_sumberdana`, `id_jadwal`, `tgl_upload`, `file`, `status`, `id_luaran`) VALUES
(2, 'pengusul', 4, 'Penelitian A', 'sdad', 'solo', '12', '12000000', 1, 8, 7, '2021-02-21', 'Kuis_Valentina_Samaya_Sari_Dewi_210601171300762.pdf', '', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `reviewer_penelitian`
--

CREATE TABLE `reviewer_penelitian` (
  `nip` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `reviewer_penelitian`
--

INSERT INTO `reviewer_penelitian` (`nip`, `nama`) VALUES
('reviewer1', 'reviewer1'),
('reviewer2', 'reviewer2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `reviewer_pengabdian`
--

CREATE TABLE `reviewer_pengabdian` (
  `nip` varchar(25) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `reviewer_pengabdian`
--

INSERT INTO `reviewer_pengabdian` (`nip`, `nama`) VALUES
('reviewer1', 'reviewer1'),
('reviewer2', 'reviewer2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role`
--

CREATE TABLE `role` (
  `id` int(1) NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `role`
--

INSERT INTO `role` (`id`, `role`) VALUES
(1, 'Admin'),
(2, 'Reviewer'),
(3, 'Dosen'),
(4, 'Mitra');

-- --------------------------------------------------------

--
-- Struktur dari tabel `skema_pengabdian`
--

CREATE TABLE `skema_pengabdian` (
  `id` int(5) NOT NULL,
  `jenis_pengabdian` varchar(40) NOT NULL,
  `tgl` year(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `skema_pengabdian`
--

INSERT INTO `skema_pengabdian` (`id`, `jenis_pengabdian`, `tgl`) VALUES
(1, 'Pengabdian Inovatif', 2021);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sumberdana`
--

CREATE TABLE `sumberdana` (
  `id` int(3) NOT NULL,
  `sumberdana` varchar(40) NOT NULL,
  `tgl` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sumberdana`
--

INSERT INTO `sumberdana` (`id`, `sumberdana`, `tgl`) VALUES
(5, 'Sumbangan', 2020),
(8, 'Hibah', 2021);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `role`) VALUES
(1, 'admin', '5f4dcc3b5aa765d61d8327deb882cf99', 1),
(2, '0008115504', '0ea891a052b821186eced1647cdad4c2', 3),
(3, '0012035205', '6ab8739276287267937c74d41ca812c3', 3),
(4, '0005055205', '815abbd0db8a6dfb5f9990712d4de276', 3),
(5, '0030045403', 'ea6a22982bf90198586bd1c574e29858', 3),
(6, '0028126103', 'e2970e91719331fd2344ea26fcc68e9b', 3),
(7, '0017075408', 'cb5d7aaff7a40d9560037eeacc0c512a', 3),
(8, '9990371185', 'db1ead60020a7a27bfbb65575b9f64ce', 3),
(9, '0009115601', 'e241fc433f5186b9a24b933ef78c2b7b', 3),
(10, '0019085301', 'b549393653248ce88f1fb0a3276b483b', 3),
(11, '0023046204', '9a98e33c9dc932ef897b2d57e9b7e758', 3),
(12, '0001056008', 'ad079a8c80583da18efeaf215d7f5135', 3),
(13, '0022045710', 'e9dab5b23c16ab2778685229022cf294', 3),
(14, '0031125513', '5c90fc4fe7bbe591b0c337fac7dfe6f2', 3),
(15, '0009015905', 'b371d0c3bb6aa9b7a14c9d1ed7e02d8a', 3),
(16, '0022106109', 'a02fdc24a624fcf200aa913165e98016', 3),
(17, '0020026602', '55437f3daf0ea00716c982b55cde58ee', 3),
(18, '0012066904', '32a14998f83591611c058b181876f57e', 3),
(19, '0005015907', '479e432411e442bd746bb0e1a50dca84', 3),
(20, '0015036004', 'e2b1aabfb0f68261484526db6ad10f41', 3),
(21, '0022055903', 'b76abcc70244cbbaf5c1a0cd9cbcd470', 3),
(22, '0007115805', 'a3b033c59ee95b0d24f3947a6c9d1c0c', 3),
(23, '0027046004', '0c1eb59012800abfd476f42b2a06e734', 3),
(24, '0017096205', '3ee25fa8b5485d0eead6c0c4667545f3', 3),
(25, '0026115604', '962eb0f999577ec02eeb024b2908ddee', 3),
(26, '0001057104', 'da1449ff7dcecd581061572d2e5413a5', 3),
(27, '0012046008', 'e3f1b85fa8740b6c4a29020222289bd7', 3),
(28, '0011116801', '2bcb9691259afd4f4b2dac23abd74e92', 3),
(29, '0020056203', 'fc3192bfcec8aa8074930a54c41c87a9', 3),
(30, '0012075806', 'fdbddfda5851af9dd001c8498d957145', 3),
(31, '0002066010', '0766eb3db79df8daaa79ca740003ee8f', 3),
(32, '0031126321', 'a4becf80d6e0a1f1c33d628cb631f69f', 3),
(33, '0028055911', '275acf50812f00511f2c92d525ed828e', 3),
(34, '0012076106', 'c6dc2b008ac4e77b4479de326e14b134', 3),
(35, '0013095704', '982b4819cf35acc38ea54c760dd8b4a0', 3),
(36, '0018076004', '37c43f05d68a52513402eeb7b9a11794', 3),
(37, '0019065904', 'c97f0d870376466742ddc1c56ebca277', 3),
(38, '0020065904', '0a7ddfdc7f16cee177c011093c584c77', 3),
(39, '0017026008', 'e8473e6f90545327a4e5774579ba0e9a', 3),
(40, '9990202241', '0753848d274b6c0882f946ffe157c593', 3),
(41, '0016106202', '10417ff5de994550155670b0abeb574f', 3),
(42, '0026056407', 'cf3e96462cfd93430d7b71a33db39b57', 3),
(43, '0002106902', '956f75c719d00e0734a00136f6085b0e', 3),
(44, '0028125613', '3781cfcf4436acf3726e820ffe50f5c8', 3),
(45, '0017126106', '282660d1b1a1b580d8e4d3e94053dd3d', 3),
(46, '0008116405', 'f107a5c3a0a656b171e79198603807bd', 3),
(47, '0023026003', '584af5c9e1ade659d063ef53a6c91eeb', 3),
(48, '0011076303', '06075e8d302461bbe86c0372d3b6fcb6', 3),
(49, '0027036203', '090302727c65741037edb618ae322daf', 3),
(50, '0001076202', 'a3baa4cc5c04251fb9e05a8a66ea6327', 3),
(51, '0022047201', '4e7420efdb6c94f50ce4f21bcc1fa496', 3),
(52, '0009067204', 'c1199e6b748c4911a75d99d37a923bbe', 3),
(53, '0016067104', '8052c0911c27e2f7448227b401dcfe63', 3),
(54, '0020106308', 'e08395185e4edf7d640ed782f723f802', 3),
(55, '0027096302', '47e9caa43aba185a71ee3a50a128c445', 3),
(56, '0031127203', 'bec0a2e2e8629b33e42bb22444b19663', 3),
(57, '0018087103', '3e67ce974b332845951ebaf2fe5b4198', 3),
(58, '0010116707', 'b6f3029112788a975f7b47333b6a341a', 3),
(59, '0022126303', '817aab34917a0d51063360f347e68a4d', 3),
(60, '0005037304', 'ef4c39c1aa4b8e52227e93ba79079722', 3),
(61, '0014095408', '03d23e4c8ffd4b48d188f19a03c6a20b', 3),
(62, '0022075906', '19759489590be722041f6c9f0f7c63cd', 3),
(63, '0005025702', 'cbb1885cc4a48ca13e137244d7f16871', 3),
(64, '0029046703', 'aede2ea59f3bfcd9f627236abf8c197c', 3),
(65, '0026126104', 'e019e749edcdebaa0e0cbdba74346154', 3),
(66, '0008026702', 'b4c4d4d624489ffbb64f0bd64454c233', 3),
(67, '0007085804', '3ae116823ff6e2c7bbf777a9d382856f', 3),
(68, '0017036804', '0b2db5efab112b94713c9144faf862b0', 3),
(69, '0021126905', '6b9c608482158be135a6f5e6ac3ffb0f', 3),
(70, '0016047603', 'f74430ee3fd75e2fced4267d20dbb72a', 3),
(71, '0023117006', '2dee41eead011f2bf84304ca12e5f0ee', 3),
(72, '0019077103', 'fb428e6f84602f7a1df2d9465ee8a1e1', 3),
(73, '0022086606', '280526c80c0703fd6b7ad214d4ad2186', 3),
(74, '0026027301', '7a7f04fde21a7a941982ae2837e45654', 3),
(75, '0017027002', '4bd5f8d56edcc980e07c38921a89d176', 3),
(76, '0006067205', 'b1be4dd3eb1165fecb591d05d5c7c459', 3),
(77, '0024065706', '55ad5db2cfd4c51aa86f11d498b13c7c', 3),
(78, '0002015803', '7ab6128560e256374719d62fba1def15', 3),
(79, '0022076105', '68f9887d618a695c482d4abc0ef85257', 3),
(80, '0008015711', 'ca366e9fa183266b2d705be2a2fc221f', 3),
(81, '0007115909', '8efbde619de7adec6c607fbf4e7f3dda', 3),
(82, '0030046702', '2432fcb7ad314578f3ae9ecc698b04bc', 3),
(83, '0014026405', 'f5a89dca696a58d8dd9aaed03e9321ad', 3),
(84, '0028066802', '7f4eb88c2fc5b8ac9e381868880c8bd5', 3),
(85, '0014116702', 'dd77277cf3e58fe784eb777dd6ce96c2', 3),
(86, '0016056203', '946cb0a37a62ed9d612a5ca13cfbe064', 3),
(87, '0004027303', '319e9412db0a0504be08dca204d30772', 3),
(88, '0024046904', 'a64095e7693dbf4d804a93ed271a3eda', 3),
(89, '0016036304', '4ca413d9c3b0b4acb60e811b6fbff41f', 3),
(90, '0023117005', 'f4297ba0e2ff7a30bcd790db967f1e13', 3),
(91, '0031085707', 'fff701efa7dc52af44bf81f091d01f7c', 3),
(92, '0018015903', 'c30264a788cfa1c514883542b821a147', 3),
(93, '0030087201', 'e3ce9b90c8c48b4ff4f1362d692fb30e', 3),
(94, '0017037303', '98ac20cff6d4d70cf4d4a9a38c9b8e66', 3),
(95, '0023047003', 'a03b3eec83387d873fb2bbdb548b5963', 3),
(96, '0021107502', '9d57702b4e8b17d0cb89a54b97b94869', 3),
(97, '0025016004', '0a1041b37f5a7151bbdce2dea34fc76b', 3),
(98, '0012127002', '16da39147405bf590731f0edc400de04', 3),
(99, '0013036507', '4c2a8e30fe14755331fc873a22f6a5e2', 3),
(100, '0011076805', '73f4a7ad067d2215838fc6f8fca711f7', 3),
(101, '0004086404', '45b4edc129b30fb1ab89997a3319278e', 3),
(102, '0004036105', '36c37b2922bdaa6e491d4deafb36d901', 3),
(103, '0006037502', '9ca15cddefd758d1b857a07428211759', 3),
(104, '0014027402', '64c33c4778f9256ef240a48a71288422', 3),
(105, '0003107703', 'd05b1df54b1d687fd386e6fc26aac1f6', 3),
(106, '0007027104', '3f45efc13621a86606a822508015565f', 3),
(107, '0006056605', 'e35d1774aafc25cd5472b4937fdfabb4', 3),
(108, '0001037106', '24b4b551d5c5f7adb0d4e17cfac465d4', 3),
(109, '0021127303', '633541040111600a347fc0c2cb50529c', 3),
(110, '0027077008', '4978019e677dcb664fd2cb4b4bb50909', 3),
(111, '0026047402', 'f5607d36d9dee3df159e0983bb968717', 3),
(112, '0026097304', '48b8b3939586ec2679d3940985beacf2', 3),
(113, '0008037405', '8d676cc327917c9217118f1351249eda', 3),
(114, '0030097402', '59c27766da6114f3e86e35206debba26', 3),
(115, '0010016210', '65d3d549de93518c3be40e7d06a977c7', 3),
(116, '0009076905', 'f514f7e8bc24ad37586034ef7faf45e9', 3),
(117, '0025067003', '95461a5cfeaabb3e8b81afc9b2dc7917', 3),
(118, '0020107401', 'bab4e300eff8eff98fba6b050ea5921d', 3),
(119, '0002077303', 'a143cb89850db7aeaa456f2e8980740e', 3),
(120, '0024077103', '333b2b9f1664a58e8e28dcaa409fa33a', 3),
(121, '0029057502', '9fc36d078ae5b027b779e6aabfec394e', 3),
(122, '0014027401', '8bfe824129772ed679ef558737881808', 3),
(123, '0028047501', '49cdc7afd56f2ad43b543a5ac1f43f3c', 3),
(124, '0028107503', '926c3dc96034e0603262e5b807e9bbb5', 3),
(125, '0017017502', 'c403b39cff15fec8d4151e48f48d78a4', 3),
(126, '0010105814', '7f687507073b5a38b2d3583902f62c2f', 3),
(127, '0018085604', 'a77fca76b46da9b5b73bb0105ca93e1d', 3),
(128, '0026056003', '1c6d56ce9c169ee434fadcfb880522ad', 3),
(129, '0014075904', 'edfc2e31790205f5cf3ad92cde427b02', 3),
(130, '0017116105', '149828b59b9f734a9e670bea623f377f', 3),
(131, '0029095805', '2779d4725202fb3cec3fa8d6a655062f', 3),
(132, '0009086207', 'cee188af04d4bc563c0b9fdb6a6984dd', 3),
(133, '0015016005', '34428e4ebe6cb773ceeaef63311f3559', 3),
(134, '0029045805', '923adefe41860d0b8eb09edf1b822c11', 3),
(135, '0028056209', '2c3faa658fd038b472fcacfd9fe6753b', 3),
(136, '0010116804', 'd61ad6f973dc5e30a0731163f4340f97', 3),
(137, '0011076304', 'd1b032dcffa380be35cd1698d808ae3a', 3),
(138, '0027036204', 'f3bc01abba924210745d058c52f4e566', 3),
(139, '0023035909', 'feb53a22752c1d8efc529e461718e221', 3),
(140, '0005106606', '97c2e19b28d6b0db18808c5a397ef30e', 3),
(141, '0022125705', '76b974b3434f91c265f23071907e2287', 3),
(142, '0021056604', '0c72a77508b16394e2f3dc41a3aaa991', 3),
(143, '0018127102', '45342778eae99ed1e20e4fd433faecf9', 3),
(144, '0006057105', 'cf93d8cac828c7f918a84bda9c833a83', 3),
(145, '0020047102', '0da504b0875248615133259072071b59', 3),
(146, '0013116504', '6ebb0055a0d2c4876040363c9630c74f', 3),
(147, '0021125803', 'eb10b08d1ff7d295bb5fb7fd3feefe0e', 3),
(148, '0020057004', 'fdbf15c375b450889854a1f62461c801', 3),
(149, '0023027404', '339b6406822e0776239b4dde0ac65d9f', 3),
(150, '0007057301', 'bf37fae3481e6b3d300e3332bdb0bb0d', 3),
(151, '0004046704', '0b18f95a0a68a605dde9318db4a02b12', 3),
(152, '0023077103', '44109ebc578bc1ae2565a78bafac047f', 3),
(153, '0030017303', '1915f5fa49c7fa83c6fcb21192fcc2b6', 3),
(154, '0029096908', 'ef679b62a3006d554d022d141608ea69', 3),
(155, '0016066104', 'e0104b8bf5a11600d37644cea2bec2ed', 3),
(156, '0027067403', '2258b9bbab70aa2de74381eb2b062109', 3),
(157, '0003127004', '81f399ddd2518486489c644068e9d43a', 3),
(158, '0008056802', '37cce59c9e8a591b4839f71e6d436f82', 3),
(159, '0022017502', '84793d0984d50f634d20423d0825ee61', 3),
(160, '0017127302', '941f9e4a6b2e85b320259fe65c214146', 3),
(161, '0029046902', '01709973466f7f86a5458faa81b021f4', 3),
(162, '0012017301', '2084db375cea1bbe9d5d8f11944d4423', 3),
(163, '0020077403', '5ca24997ab662d712de84eb3360c492d', 3),
(164, '0021047108', 'ed6092eb38d63b31dbbc63546111eca6', 3),
(165, '0018067403', 'a4151d128c75df5b5c220c6b915df391', 3),
(166, '0015097503', '83f88309d614887d919cc2dd6bc6dfe6', 3),
(167, '0002075907', '7299b0ea9a524357f70e96152b643f92', 3),
(168, '0026076805', '2df0292246b0b712478e04905284daff', 3),
(169, '0017107301', '7bbbb7c80c3888c495611d46ba1c9b10', 3),
(170, '0001096603', 'e8ad53258c0201bfef8e3725d1de56f4', 3),
(171, '0027037404', '6ac0c0165befaeb7ad902b1f6232969d', 3),
(172, '0027067003', 'c94aee2a1300c020c1b8f6b726a68cde', 3),
(173, '0012087601', '94f240cd3ca57b3175a483d967fe3a1e', 3),
(174, '0024117101', '144d3eb723b2d03b8c15e80f51195e1e', 3),
(175, '0016127402', '0b3a264626b51ad6a81bc56531f8c962', 3),
(176, '0011087503', '98d0f79ee2353384962c2e1d007f70d4', 3),
(177, '0005056908', '855cff3d347632c35fd332560cda6eaa', 3),
(178, '0001016903', '63adeb478fbf9662f4a5e9384ddb8560', 3),
(179, '0025057601', 'a05afad929b251226df5e505511d81b1', 3),
(180, '0014086805', '01127356d4769b6165b3336003af3acd', 3),
(181, '0022097503', 'a194e941b62cc31f9f006fcbf3a45afd', 3),
(182, '0024057703', '6cb2cbe7a4966bb5fe49efbee5890e9f', 3),
(183, '0008067505', '2dce1060a2e5f9b4e17b8a34f33bf5c3', 3),
(184, '0012097402', 'fa4f25b2637360abccfca7c03588bce5', 3),
(185, '0016037401', 'e1ecba33af4b0f11c24937c4e749614f', 3),
(186, '0024107302', '5ad52c34793129b5ada0894219664c52', 3),
(187, '0026057302', '22073a09563cefe0f947bd8dbf2f01b9', 3),
(188, '0005037606', '77c7505828c7bd8dd1a5fb5f12827c0d', 3),
(189, '0025027601', '4ed21434a56e7db1063c93fc4f550715', 3),
(190, '0002107304', '96b6b5994218e02f4a8ffaa184b4e1a6', 3),
(191, '0028057601', '8a7533d1167d548a172509489c89db41', 3),
(192, '0019027901', '2855d7fabe236151a1da8053b284e1fb', 3),
(193, '0027037104', '829011de736ad773da2ecc1cc79fca85', 3),
(194, '0023057403', '5a4eb0ea615854c5c2d5edeb73ff8e3a', 3),
(195, '0023107101', 'efb3d414e997e988a201c51e40926a15', 3),
(196, '0004037403', 'c151c029d9058156d274ccc043379d87', 3),
(197, '0013098101', '71459901567a4650814dc27a8ebfbc36', 3),
(198, '0014076902', '1d7ba01f3f044e3dce22c8bfb8b425fe', 3),
(199, '0025106012', '793205aa9d2cf22670344398eefcbbfe', 3),
(200, '0021037603', 'fc57b3a526227f9e491aba697fdab4c7', 3),
(201, '0017028401', '69882774bc023b2ae1edf7c191937e1d', 3),
(202, '0026038401', '964a421c1dfac489b9394c8b65c4ba30', 3),
(203, '0015067710', '7a69fa3146c4950a01c61d586039cfe6', 3),
(204, '0006095910', '84796cc922a4d8d07bb8393634d9d140', 3),
(205, '0015075803', '90246d5dcf3829ccb3eba7950746f892', 3),
(206, '0021106008', 'b24c6e703a2a1c58303a12b6538f8360', 3),
(207, '0001065609', 'a72a7c230b72734f4bed34f55d59f673', 3),
(208, '0009095912', '634ffdf1d16677e25a740e8a3f38594f', 3),
(209, '0010125907', 'f6f8beb637b8f20ca4a62b6b6d1580b3', 3),
(210, '0010057203', '7c558634650f210dc721e18c5dfd0704', 3),
(211, '0011097602', '2b32dc717d1d85a603eb3b17013cc3e8', 3),
(212, '0021067301', '382049b553ed2e88a0265e1ebdfdc9ad', 3),
(213, '0014057803', '676060f7af30cc6675531cef0a67f89b', 3),
(214, '0006087002', '3ac53ffc9a7587804f4b45aebba01cac', 3),
(215, '0026087703', 'c54ef8a472a7ef35512f23f3bf5bca71', 3),
(216, '0031017402', '29a439c23696ef33acc3fb0772f86492', 3),
(217, '0018078004', 'ef98a2ff7454b10aa24d2b72853990a2', 3),
(218, '0009047403', '861aee21250ddbd984a9385b5616ef1c', 3),
(219, '0003087407', '02d641bb872445b2c070dc49ade4e1a8', 3),
(220, '0020018203', 'b37384376c94c6f926cdd6a3a35bb0a3', 3),
(221, '0011087806', 'b3afd210e9b25d0fe184a181add795e9', 3),
(222, '0009037705', '396b9de4f062c814bb41529a41c1c0c2', 3),
(223, '0025117805', '60f8b76596656326c69ea636a043c341', 3),
(224, '0002107903', '59edbfa0c89262c26553de898c5923aa', 3),
(225, '0016027606', '8c4a3ab97929656e38b65f9052763bf1', 3),
(226, '0029018403', '8ab98eae840cb38ba735ff0fc4b5dc23', 3),
(227, '0004087601', '847179b0ef433f4697f22c1d6c7eca42', 3),
(228, '0030037103', '4b0790e0139433dd39dc4d61456b90c3', 3),
(229, '0006126902', '7ddaf6ee8a605cb68332ed528d7d13e7', 3),
(230, '0021097404', '9c89efc0759880559c080b22b08dab98', 3),
(231, '0017067206', 'fc4b848ca61641b50364c5ba6ef66be4', 3),
(232, '0021057010', '834138259309d979496d8f3720f4daa6', 3),
(233, '0021078202', 'd3fdb24a0053bc8419abe6011818f954', 3),
(234, '0025037505', 'dc2dce42938408973813f22b967a2b90', 3),
(235, '0003046203', '103da8ed82e951333e9da6b4c0f8c85b', 3),
(236, '0026057713', '3227fccdc6bc0998073a2df1a7bfb5f0', 3),
(237, '0022067709', '78c0e5349d99bd5e89cc82b6a2802909', 3),
(238, '0006027801', '9f5d7e574b592a9b0b5c1e9ba96f9d8f', 3),
(239, '0019038304', '1dcd7092f70dd9ee1133f663a8274c95', 3),
(240, '0006128402', 'ed27ee8fcb4eb22de0c27e638f748995', 3),
(241, '0011128402', '2da2f0a2e4b25ff3a65e1ffab2a698e2', 3),
(242, '0012087611', 'a32d8ce11ac7c02e921cc1c5bef78bf8', 3),
(243, '0003037805', 'e0d7a6e852ea36ee3c55b2668969f832', 3),
(244, '0011128005', '30b0d018cb654c5be6df67ca79a8a951', 3),
(245, '0031018206', 'd6b463349abe3c934640b0f5fe1aa66d', 3),
(246, '0026058501', '03ef708c912a8ab3b66170d6e0ad8928', 3),
(247, '0015018601', 'ad073643aa92cf7ce024a050bda8ac0b', 3),
(248, '0026088601', 'af17d346e8be63bc11d4fc4247fba19c', 3),
(249, '0007118202', '6559cd0a494428528332928cdc143d6d', 3),
(250, '0011127705', '9dab7d01ea26354bcdb64e2246f6d622', 3),
(251, '0002066403', '551c515511c8ddd2bb2a305feaea6141', 3),
(252, '0001058302', 'ae4d4dbb2aafdfa60006ef9a7605dea5', 3),
(253, '0027068402', '68d7e3df24f7e54b6b6c3c6a80e784d0', 3),
(254, '0016078205', 'f8cf3c34e92812d65bc62db4d713d924', 3),
(255, '0025018501', '906008ec7cc91a6c40a710eee6a63784', 3),
(256, '0019038603', '9f630ae99604bce0364a1c8745726cc2', 3),
(257, '0021068701', 'e2d0d4f63ff99d0fc6abe3b8a760954a', 3),
(258, '0025028801', '580ea5dce402ca1abb30d4f663033730', 3),
(259, '0008097504', '123dac1d1eca0262645ebfc832bdacd0', 3),
(260, '0022018302', '96b7dd5420e20fd5175dd83a45cb1e94', 3),
(261, '0016067304', '506d5431d337af72bd1f6993bcf2bf21', 3),
(262, '0023016705', '22327d4152ae0aba999565d5faf394af', 3),
(263, '0011036905', '73ab11897ad1132f4949c030d8d8d03b', 3),
(264, '0029047102', 'cc9f7930c9ac0b783d78486013f15cac', 3),
(265, '0006117302', '9a3263558eeba60ab9c369fe116f06e0', 3),
(266, '0001037105', 'c0059ab51077fccdfa3c2e6c45d1fcbd', 3),
(267, '0018017503', '9c3422a077bcdfe047196c2471af7078', 3),
(268, '0001046704', '24b2dd736ca33014c172477a934f678f', 3),
(269, '0019096704', '327bc62fb5fabed8a2b96f7c113a7071', 3),
(270, '0023036603', '0adf445e0b66ec0721ab7a5fb0d9989f', 3),
(271, '0002126403', '71c99dee3b7593d3cd9da3f0ce54bb03', 3),
(272, '0031057204', '99aa4561f7be5731adc78b4071ff09bf', 3),
(273, '0015047110', 'd55f09c7e11cecb00a189ad8b4182dd6', 3),
(274, '0010117603', '7e7cb9096337e46d8188272f44b92e0a', 3),
(275, '0030067203', 'cae9b2f1a4dd68ebd340271db86d8ee1', 3),
(276, '0020058102', '5845709453367998bd9d1b6e935fc47b', 3),
(277, '0001067702', '896aa41775d39e2377ca2579587d7cd7', 3),
(278, '0021087404', 'bf174cd1ac48a51958eed62ee2390d1c', 3),
(279, '0017067906', 'acf8f266a150b5c47afb21ba6d2c36a2', 3),
(280, '0020107707', 'c166f94bee31db46264cecd16989eca2', 3),
(281, '0023047905', '227c34fc847d9332bc32b5e7e642dc58', 3),
(282, '0025017402', 'c5ea51f0b9fec9c450da67915e5f3b01', 3),
(283, '0030058102', 'b55ea6df2a43b712233df3daf277d6d3', 3),
(284, '0024088102', '3cffdc31a907935a36099bc7e7630356', 3),
(285, '0003118402', '412160d116fe8239594c6b2c3d0d70c4', 3),
(286, '0017097904', 'd6651304e2ad7efedb0d079bb7ece37a', 3),
(287, '0021028107', '75de4feffdd0929753ea8c119a76d02d', 3),
(288, '0023036005', 'd42fe2462f8a619cb794a5919fcfc3ca', 3),
(289, '0020048703', '819cc5abf6ef0bc64cd408237bb127c3', 3),
(290, '0017058702', 'b7da30cea2285c4951e73a7e0573082d', 3),
(291, '0027098602', '4bf3200fa328622ea76e23c50d2b8022', 3),
(292, '0018118802', '19ab2350dd45d81d66edf30f5ce2ccd9', 3),
(293, '0027108012', 'a85168869e700318790533dacc1bdcc2', 3),
(294, '0006048803', '34e0544d496374b3c1687934437f985a', 3),
(295, '0013108903', '6086a867a53cd8229e360435f8e71474', 3),
(296, '0028038705', 'e24c125323c753f85f7c3992f65f6827', 3),
(297, '0028028506', '5eaac8ad884a0b0cc128981a52f224c8', 3),
(298, '0617088402', '6fd73879f98c584bb0ed4877ff604b69', 3),
(299, '', 'd41d8cd98f00b204e9800998ecf8427e', 3),
(300, '0003058302', 'fe3d0c44007689dd8c7484637fca0580', 3),
(301, '0014069202', 'a2785465dc84ddc78e913496f069c900', 3),
(302, '0004058504', 'be544324ed1375f125feecb4e79cb7a6', 3),
(303, '0011069003', '049f93c48acbc300e13c6eac75bd3100', 3),
(304, '0011129301', 'c8f1dc88da9cbca897c9480e4c90ec62', 3),
(305, '0030039004', 'af2bc35b4064920ff077f29e427333f8', 3),
(306, '0030058503', 'aa5f075b112b9fb3d1778a4eaa20b242', 3),
(307, '0007048506', 'ffb840bffc0889d8673550d388494b09', 3),
(308, '0009118605', '9375dfca8ccb015a03d17d31354ca561', 3),
(309, '0014108705', '39a6caba7581486685947548b4f08120', 3),
(310, '0018119004', '99733c832859a66288dee2393e90ef2b', 3),
(311, '0023108804', 'bcba8e2ccdadf60f0fa4956d3790c1dc', 3),
(312, '0011058805', 'd9a77ee7cdc6988d59d619e34dae44a7', 3),
(313, '0008128604', 'bea1164df321a47f8fc53ee34baeef67', 3),
(314, '0008089101', '862164ba622210c1b6cb632004d1dbb8', 3),
(315, '015018804', 'fcf4ab07c591ea0c2effad132158880e', 3),
(316, '022118903', '3398adb19dac8533e73985f5d7d3e3bd', 3),
(317, '0004099105', 'e47a1caa12df270d1e6e967cf235d79e', 3),
(318, '0004068907', 'cbf1646f31a3780e0cf561f1a0bd18fd', 3),
(319, '0017049108', '48bdd6c393a9acc34f2a25cfa3ef30ee', 3),
(320, '0017049107', '7e01362f966a99f87279c9e25c2a8c98', 3),
(321, '0027018112', '033a442214bff4220f8afdb4b90bf5d5', 3),
(322, '0013109008', '30c0c837a458d4c3c7c5639315ebab60', 3),
(323, '0009098506', 'cdfb4c9ff1a2b715357d5e5500674b96', 3),
(324, '0014129003', '25c72ef1194ee8cf6d26da3052a13ca2', 3),
(325, '0004059202', 'ba5db9795ac34daedfe39e19dd8db067', 3),
(326, '0024039202', '4f8bee67dbfbe52f34a47cdb33a3f068', 3),
(327, '0012098905', '1eb08870ab2e491342e2ec90e73aeca6', 3),
(334, 'pengusul', 'password', 0),
(335, 'pengusul', '5f4dcc3b5aa765d61d8327deb882cf99', 3),
(336, 'reviewer1', '5f4dcc3b5aa765d61d8327deb882cf99', 3),
(337, 'reviewer2', '5f4dcc3b5aa765d61d8327deb882cf99', 3),
(338, 'irza', '5f4dcc3b5aa765d61d8327deb882cf99', 4);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`nip`);

--
-- Indeks untuk tabel `assign_proposal_penelitian`
--
ALTER TABLE `assign_proposal_penelitian`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `assign_proposal_pengabdian`
--
ALTER TABLE `assign_proposal_pengabdian`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `detail_nilai_proposal_pengabdian`
--
ALTER TABLE `detail_nilai_proposal_pengabdian`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`nip`);

--
-- Indeks untuk tabel `dsn_penelitian`
--
ALTER TABLE `dsn_penelitian`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `dsn_pengabdian`
--
ALTER TABLE `dsn_pengabdian`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jadwal_penelitian`
--
ALTER TABLE `jadwal_penelitian`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jadwal_pengabdian`
--
ALTER TABLE `jadwal_pengabdian`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jenispenelitian`
--
ALTER TABLE `jenispenelitian`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `komponen_nilai_pengabdian`
--
ALTER TABLE `komponen_nilai_pengabdian`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `komp_penilaian_penelitian`
--
ALTER TABLE `komp_penilaian_penelitian`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `laporan_akhir_penelitian`
--
ALTER TABLE `laporan_akhir_penelitian`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `laporan_akhir_pengabdian`
--
ALTER TABLE `laporan_akhir_pengabdian`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `laporan_monev_penelitian`
--
ALTER TABLE `laporan_monev_penelitian`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `luaran`
--
ALTER TABLE `luaran`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `luaran_penelitian`
--
ALTER TABLE `luaran_penelitian`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `luaran_pengabdian`
--
ALTER TABLE `luaran_pengabdian`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `luaran_prop_penelitian`
--
ALTER TABLE `luaran_prop_penelitian`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `luaran_prop_pengabdian`
--
ALTER TABLE `luaran_prop_pengabdian`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mhs_penelitian`
--
ALTER TABLE `mhs_penelitian`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mhs_pengabdian`
--
ALTER TABLE `mhs_pengabdian`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mitra`
--
ALTER TABLE `mitra`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `nilai_penelitian`
--
ALTER TABLE `nilai_penelitian`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `nilai_proposal_penelitian`
--
ALTER TABLE `nilai_proposal_penelitian`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `nilai_proposal_pengabdian`
--
ALTER TABLE `nilai_proposal_pengabdian`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `proposal_penelitian`
--
ALTER TABLE `proposal_penelitian`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `proposal_pengabdian`
--
ALTER TABLE `proposal_pengabdian`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `reviewer_penelitian`
--
ALTER TABLE `reviewer_penelitian`
  ADD PRIMARY KEY (`nip`);

--
-- Indeks untuk tabel `reviewer_pengabdian`
--
ALTER TABLE `reviewer_pengabdian`
  ADD PRIMARY KEY (`nip`);

--
-- Indeks untuk tabel `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `skema_pengabdian`
--
ALTER TABLE `skema_pengabdian`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sumberdana`
--
ALTER TABLE `sumberdana`
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
-- AUTO_INCREMENT untuk tabel `assign_proposal_penelitian`
--
ALTER TABLE `assign_proposal_penelitian`
  MODIFY `id` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `assign_proposal_pengabdian`
--
ALTER TABLE `assign_proposal_pengabdian`
  MODIFY `id` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `detail_nilai_proposal_pengabdian`
--
ALTER TABLE `detail_nilai_proposal_pengabdian`
  MODIFY `id` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `dsn_penelitian`
--
ALTER TABLE `dsn_penelitian`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT untuk tabel `dsn_pengabdian`
--
ALTER TABLE `dsn_pengabdian`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `jadwal_penelitian`
--
ALTER TABLE `jadwal_penelitian`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `jadwal_pengabdian`
--
ALTER TABLE `jadwal_pengabdian`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `jenispenelitian`
--
ALTER TABLE `jenispenelitian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `komponen_nilai_pengabdian`
--
ALTER TABLE `komponen_nilai_pengabdian`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `komp_penilaian_penelitian`
--
ALTER TABLE `komp_penilaian_penelitian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `laporan_akhir_penelitian`
--
ALTER TABLE `laporan_akhir_penelitian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `laporan_akhir_pengabdian`
--
ALTER TABLE `laporan_akhir_pengabdian`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `laporan_monev_penelitian`
--
ALTER TABLE `laporan_monev_penelitian`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `luaran`
--
ALTER TABLE `luaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `luaran_penelitian`
--
ALTER TABLE `luaran_penelitian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `luaran_pengabdian`
--
ALTER TABLE `luaran_pengabdian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `luaran_prop_penelitian`
--
ALTER TABLE `luaran_prop_penelitian`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT untuk tabel `luaran_prop_pengabdian`
--
ALTER TABLE `luaran_prop_pengabdian`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `mhs_penelitian`
--
ALTER TABLE `mhs_penelitian`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `mhs_pengabdian`
--
ALTER TABLE `mhs_pengabdian`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `mitra`
--
ALTER TABLE `mitra`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `nilai_penelitian`
--
ALTER TABLE `nilai_penelitian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `nilai_proposal_penelitian`
--
ALTER TABLE `nilai_proposal_penelitian`
  MODIFY `id` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `nilai_proposal_pengabdian`
--
ALTER TABLE `nilai_proposal_pengabdian`
  MODIFY `id` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `proposal_penelitian`
--
ALTER TABLE `proposal_penelitian`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `proposal_pengabdian`
--
ALTER TABLE `proposal_pengabdian`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `role`
--
ALTER TABLE `role`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `skema_pengabdian`
--
ALTER TABLE `skema_pengabdian`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `sumberdana`
--
ALTER TABLE `sumberdana`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=339;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
