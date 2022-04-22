-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2022 at 07:50 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `k3s`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_hasil_klasifikasi`
--

CREATE TABLE `data_hasil_klasifikasi` (
  `id` int(3) NOT NULL,
  `id_siswa` int(3) NOT NULL DEFAULT 0,
  `jenis_kelamin` enum('L','P') DEFAULT NULL,
  `usia` int(11) DEFAULT NULL,
  `sekolah` varchar(100) DEFAULT NULL,
  `jawaban_a` int(11) DEFAULT NULL,
  `jawaban_b` int(11) DEFAULT NULL,
  `jawaban_c` int(11) DEFAULT NULL,
  `jawaban_d` int(11) DEFAULT NULL,
  `kelas_hasil` varchar(100) DEFAULT NULL,
  `nilai_sanguin` double DEFAULT NULL,
  `nilai_koleris` double DEFAULT NULL,
  `nilai_melankolis` double DEFAULT NULL,
  `nilai_plegmatis` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_hasil_klasifikasi`
--

INSERT INTO `data_hasil_klasifikasi` (`id`, `id_siswa`, `jenis_kelamin`, `usia`, `sekolah`, `jawaban_a`, `jawaban_b`, `jawaban_c`, `jawaban_d`, `kelas_hasil`, `nilai_sanguin`, `nilai_koleris`, `nilai_melankolis`, `nilai_plegmatis`) VALUES
(1, 3, 'L', 12, 'Negeri', 7, 4, 25, 4, 'Plegmatis', 0.00000000000679658621, 0.00000000000456516753, 0.00000000000000668419, 0.00000001022810139489);

-- --------------------------------------------------------

--
-- Table structure for table `data_latih`
--

CREATE TABLE `data_latih` (
  `id` int(3) NOT NULL,
  `nama` varchar(200) DEFAULT NULL,
  `jenis_kelamin` enum('L','P') DEFAULT NULL,
  `usia` int(11) DEFAULT NULL,
  `sekolah` varchar(100) DEFAULT NULL,
  `jawaban_a` int(11) DEFAULT NULL,
  `jawaban_b` int(11) DEFAULT NULL,
  `jawaban_c` int(11) DEFAULT NULL,
  `jawaban_d` int(11) DEFAULT NULL,
  `kelas_asli` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_latih`
--

INSERT INTO `data_latih` (`id`, `nama`, `jenis_kelamin`, `usia`, `sekolah`, `jawaban_a`, `jawaban_b`, `jawaban_c`, `jawaban_d`, `kelas_asli`) VALUES
(1, 'Asher Fawwazadzka', 'L', 13, 'Swasta', 19, 4, 5, 12, 'Sanguin'),
(2, 'Wafda Mukrom Q.F', 'L', 13, 'Swasta', 15, 9, 9, 7, 'Sanguin'),
(3, 'Zulham \'Ali Fikri', 'L', 14, 'Swasta', 5, 6, 12, 17, 'Plegmatis'),
(4, 'Qosholis S Al-Usama', 'L', 15, 'Swasta', 13, 8, 9, 10, 'Sanguin'),
(5, 'Muhammad Shodiq', 'L', 15, 'Swasta', 20, 9, 5, 6, 'Sanguin'),
(6, 'Hilmy Aziz M', 'L', 14, 'Swasta', 10, 12, 13, 5, 'Melankolis'),
(7, 'Rafif', 'L', 14, 'Swasta', 13, 7, 12, 8, 'Sanguin'),
(8, 'Muhammad F Attaqi', 'L', 14, 'Swasta', 8, 11, 17, 4, 'Melankolis'),
(9, 'M. Najib Erdyansya', 'L', 13, 'Swasta', 10, 13, 6, 11, 'Koleris'),
(10, 'Moh. Inas Ramadhan', 'L', 13, 'Swasta', 16, 12, 7, 5, 'Sanguin'),
(11, 'Akmal Thoriq M', 'L', 15, 'Swasta', 9, 14, 10, 7, 'Koleris'),
(12, 'Abdullah Yusuf F R', 'L', 13, 'Swasta', 8, 6, 11, 15, 'Plegmatis'),
(13, 'Akhdan Muhammad F', 'L', 13, 'Swasta', 12, 11, 9, 8, 'Sanguin'),
(14, 'Faris Saifullah', 'L', 14, 'Swasta', 15, 8, 10, 7, 'Sanguin'),
(15, 'M Riza A.K', 'L', 13, 'Swasta', 16, 6, 7, 11, 'Sanguin'),
(16, 'M. Lazuardy F', 'L', 13, 'Swasta', 12, 8, 10, 10, 'Sanguin'),
(17, 'M Zidan Al Baihaqi', 'L', 14, 'Swasta', 9, 4, 5, 22, 'Plegmatis'),
(18, 'Abdul Allam', 'L', 15, 'Swasta', 10, 3, 12, 15, 'Plegmatis'),
(19, 'Sauqi Hilmi M', 'L', 14, 'Swasta', 11, 2, 6, 21, 'Plegmatis'),
(20, 'Ahzami Asy-Syhadi', 'L', 13, 'Swasta', 9, 9, 10, 12, 'Plegmatis'),
(21, 'Nashrul Fatih Y', 'L', 13, 'Swasta', 13, 6, 9, 12, 'Sanguin'),
(22, 'Qomaruddin Zaki', 'L', 14, 'Swasta', 8, 12, 10, 10, 'Koleris'),
(23, 'Ichsanul A Sholeh', 'L', 13, 'Swasta', 15, 2, 8, 15, 'Sanguin'),
(24, 'Syahaq', 'L', 13, 'Swasta', 10, 9, 9, 12, 'Plegmatis'),
(25, 'Betelgeuse W F K', 'L', 14, 'Swasta', 12, 14, 9, 5, 'Koleris'),
(26, 'Dian Izza Nadiya', 'P', 15, 'Swasta', 10, 8, 15, 7, 'Melankolis'),
(27, 'Ivana Thynaba Nareza', 'P', 14, 'Swasta', 5, 4, 11, 20, 'Plegmatis'),
(28, 'Cia', 'P', 14, 'Swasta', 24, 10, 2, 4, 'Sanguin'),
(29, 'Rahmadita Nurdian K', 'P', 14, 'Swasta', 16, 11, 6, 7, 'Sanguin'),
(30, 'Shofiyyah R Aisy', 'P', 13, 'Swasta', 5, 2, 17, 16, 'Melankolis'),
(31, 'Sabrina Salsa Oktavia', 'P', 14, 'Swasta', 14, 11, 6, 9, 'Sanguin'),
(32, 'Anis', 'P', 14, 'Swasta', 8, 2, 8, 22, 'Plegmatis'),
(33, 'Khansa F Nirwasita', 'P', 13, 'Swasta', 21, 8, 5, 6, 'Sanguin'),
(34, 'Aisyah Regina P', 'P', 15, 'Swasta', 8, 10, 9, 13, 'Plegmatis'),
(35, 'Syafina M Firdaus', 'P', 13, 'Swasta', 12, 11, 10, 7, 'Sanguin'),
(36, 'M Yasmin', 'P', 13, 'Swasta', 6, 15, 8, 11, 'Koleris'),
(37, 'Umu Latifatul Jannah', 'P', 13, 'Swasta', 14, 5, 6, 15, 'Plegmatis'),
(38, 'Amara Rida Z', 'P', 15, 'Swasta', 7, 8, 12, 13, 'Plegmatis'),
(39, 'Shofiatur Rahmah', 'P', 15, 'Swasta', 5, 20, 10, 5, 'Koleris'),
(40, 'Urfi Zukhrufa', 'P', 13, 'Swasta', 12, 1, 12, 15, 'Plegmatis'),
(41, 'Namira Aaiilah S', 'P', 13, 'Swasta', 8, 4, 15, 13, 'Melankolis'),
(42, 'Putri Annisa Aura D', 'P', 14, 'Swasta', 9, 4, 9, 18, 'Plegmatis'),
(43, 'Aisyah Lailai Habibah Firdausi', 'P', 14, 'Swasta', 17, 4, 7, 12, 'Sanguin'),
(44, 'Deffanie Aulia R', 'P', 15, 'Swasta', 10, 10, 14, 6, 'Melankolis'),
(45, 'Khanita Najla Nazhifa', 'P', 13, 'Swasta', 9, 11, 7, 13, 'Plegmatis'),
(46, 'Rosy Fatati qonita', 'P', 15, 'Swasta', 9, 4, 10, 17, 'Plegmatis'),
(47, 'Bilqis Belvana Enesia', 'P', 15, 'Swasta', 7, 11, 10, 12, 'Plegmatis'),
(48, 'Rr. Mahira Muntaz', 'P', 13, 'Swasta', 14, 6, 11, 9, 'Sanguin'),
(49, 'Nabila Salsabila', 'P', 13, 'Swasta', 7, 6, 15, 12, 'Melankolis'),
(50, 'Syahidatul Izzah A', 'P', 13, 'Swasta', 17, 11, 6, 6, 'Sanguin'),
(51, 'M. Syarifuddin N. R', 'L', 13, 'Negeri', 9, 9, 10, 12, 'Plegmatis'),
(52, 'S. Agung Setiawan', 'L', 13, 'Negeri', 8, 6, 11, 15, 'Plegmatis'),
(53, 'Bagas Septian P', 'L', 13, 'Negeri', 10, 10, 14, 6, 'Melankolis'),
(54, 'M. Ramadhan', 'L', 13, 'Negeri', 12, 4, 13, 11, 'Melankolis'),
(55, 'Dwi Agus Wijayanto', 'L', 13, 'Negeri', 9, 5, 10, 16, 'Plegmatis'),
(56, 'Septian Priana A', 'L', 13, 'Negeri', 10, 13, 5, 12, 'Koleris'),
(57, 'M. Rifan N', 'L', 14, 'Negeri', 9, 5, 6, 20, 'Plegmatis'),
(58, 'Akbar Bagus P', 'L', 13, 'Negeri', 10, 15, 6, 9, 'Koleris'),
(59, 'Miftachul Arista M.', 'L', 13, 'Negeri', 10, 10, 13, 7, 'Melankolis'),
(60, 'Miracle Nathanael P', 'L', 14, 'Negeri', 7, 6, 8, 19, 'Plegmatis'),
(61, 'Andika Aji P', 'L', 13, 'Negeri', 10, 11, 9, 10, 'Koleris'),
(62, 'M Naufal Adib H', 'L', 13, 'Negeri', 6, 11, 14, 9, 'Melankolis'),
(63, 'Kevin Alifiano Bassam', 'L', 13, 'Negeri', 13, 9, 8, 10, 'Sanguin'),
(64, 'M Ilham Nur Rahmi', 'L', 13, 'Negeri', 15, 5, 9, 11, 'Sanguin'),
(65, 'Ach.Fahrudin N', 'L', 13, 'Negeri', 15, 9, 10, 6, 'Sanguin'),
(66, 'Nifa Lazwardy S', 'L', 13, 'Negeri', 15, 12, 5, 8, 'Sanguin'),
(67, 'Rido Dimas Permadi', 'L', 14, 'Negeri', 12, 14, 10, 4, 'Koleris'),
(68, 'M. Daffa Amrullah', 'L', 14, 'Negeri', 5, 14, 10, 11, 'Koleris'),
(69, 'Moch.Rico Zaenoni', 'L', 14, 'Negeri', 15, 12, 6, 7, 'Sanguin'),
(70, 'Amsal A Setyono', 'L', 14, 'Negeri', 14, 5, 8, 13, 'Sanguin'),
(71, 'Khoirul Anam', 'L', 15, 'Negeri', 6, 12, 6, 16, 'Plegmatis'),
(72, 'Muhammad Adam F', 'L', 13, 'Negeri', 14, 8, 8, 10, 'Sanguin'),
(73, 'Yudistira Dimas S', 'L', 13, 'Negeri', 10, 10, 8, 12, 'Plegmatis'),
(74, 'Muhammad S', 'L', 14, 'Negeri', 12, 9, 5, 14, 'Plegmatis'),
(75, 'M. Abdullah Ilham A', 'L', 14, 'Negeri', 13, 6, 9, 12, 'Sanguin'),
(76, 'Yati Nur Azizah', 'P', 13, 'Negeri', 13, 7, 8, 12, 'Sanguin'),
(77, 'Berlian Sabilillah R', 'P', 13, 'Negeri', 14, 7, 10, 9, 'Sanguin'),
(78, 'Safira Putri Frandika', 'P', 14, 'Negeri', 11, 14, 7, 8, 'Koleris'),
(79, 'Fasta Itfina', 'P', 14, 'Negeri', 12, 7, 13, 8, 'Melankolis'),
(80, 'Putri Sofiyana N', 'P', 14, 'Negeri', 5, 12, 15, 8, 'Melankolis'),
(81, 'Arni Nur Unaifah', 'P', 13, 'Negeri', 14, 18, 5, 3, 'Koleris'),
(82, 'Kharisma Yogi C', 'P', 13, 'Negeri', 7, 15, 10, 8, 'Koleris'),
(83, 'Nandy Lava B. Utomo', 'P', 13, 'Negeri', 12, 2, 16, 10, 'Melankolis'),
(84, 'Emilia Nur Rohmah', 'P', 13, 'Negeri', 10, 4, 14, 12, 'Melankolis'),
(85, 'Racgmalia Nur Fitri', 'P', 14, 'Negeri', 9, 6, 7, 18, 'Plegmatis'),
(86, 'Zillanatus V Aaliyah', 'P', 13, 'Negeri', 4, 11, 11, 14, 'Plegmatis'),
(87, 'Rahma Nilam Cahya', 'P', 13, 'Negeri', 8, 9, 14, 9, 'Melankolis'),
(88, 'Denok Handayani', 'P', 13, 'Negeri', 6, 8, 16, 10, 'Melankolis'),
(89, 'Tiara Fauzul Islam', 'P', 13, 'Negeri', 7, 12, 13, 8, 'Melankolis'),
(90, 'Cici Farida A. P', 'P', 13, 'Negeri', 4, 4, 17, 15, 'Plegmatis'),
(91, 'Adhelia Putri P', 'P', 13, 'Negeri', 12, 5, 6, 17, 'Plegmatis'),
(92, 'Arinta Agustine', 'P', 14, 'Negeri', 13, 11, 10, 6, 'Sanguin'),
(93, 'Ameliatur Zahro', 'P', 14, 'Negeri', 18, 9, 6, 7, 'Sanguin'),
(94, 'Elsandra Nur Maidah', 'P', 14, 'Negeri', 17, 4, 11, 8, 'Sanguin'),
(95, 'Citra Indiana Putri', 'P', 13, 'Negeri', 9, 9, 8, 14, 'Plegmatis'),
(96, 'Ayu Febri Wulandari', 'P', 13, 'Negeri', 6, 5, 8, 21, 'Plegmatis'),
(97, 'Fischa Aditiyah W', 'P', 14, 'Negeri', 13, 10, 7, 10, 'Sanguin'),
(98, 'Isma Marista Riyanti', 'P', 13, 'Negeri', 13, 12, 8, 7, 'Sanguin'),
(99, 'Khodijah Febriyanti', 'P', 13, 'Negeri', 12, 8, 11, 9, 'Sanguin'),
(100, 'Citra Tsabitan A', 'P', 13, 'Negeri', 18, 9, 8, 5, 'Sanguin');

-- --------------------------------------------------------

--
-- Table structure for table `data_siswa`
--

CREATE TABLE `data_siswa` (
  `id` int(3) NOT NULL,
  `nama_siswa` varchar(50) DEFAULT NULL,
  `nis` char(8) DEFAULT NULL,
  `jenis_kelamin` enum('L','P') DEFAULT NULL,
  `usia` int(11) DEFAULT NULL,
  `sekolah` varchar(6) DEFAULT NULL,
  `id_user` int(11) NOT NULL DEFAULT 0,
  `nama_orgtua` varchar(50) DEFAULT NULL,
  `telp_orgtua` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_siswa`
--

INSERT INTO `data_siswa` (`id`, `nama_siswa`, `nis`, `jenis_kelamin`, `usia`, `sekolah`, `id_user`, `nama_orgtua`, `telp_orgtua`) VALUES
(2, 'Dedy Kasriadi', '12345678', 'L', 12, 'Negeri', 2, 'Orang Tua 1', '085144392944'),
(3, 'Muhammad Sabri', '12345679', 'L', 12, 'Negeri', 4, 'Drs. Makdis Tappu, MM', '085299303229');

-- --------------------------------------------------------

--
-- Table structure for table `data_soal`
--

CREATE TABLE `data_soal` (
  `id` int(3) NOT NULL,
  `keyword` varchar(50) NOT NULL,
  `tipe_karakter` varchar(10) NOT NULL,
  `kategori` varchar(10) NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_soal`
--

INSERT INTO `data_soal` (`id`, `keyword`, `tipe_karakter`, `kategori`, `keterangan`) VALUES
(1, 'Animated', 'Sanguin', 'Kelebihan', 'Sering menggunakan isyarat tangan, wajah, dll'),
(2, 'Playful', 'Sanguin', 'Kelebihan', 'Menyenangkan dan humoris'),
(3, 'Sociable', 'Sanguin', 'Kelebihan', 'Mudah bersimpati'),
(4, 'Convicing', 'Sanguin', 'Kelebihan', 'Mudah mendapatkan kepercayaan orang'),
(5, 'Refreshing', 'Sanguin', 'Kelebihan', 'Membuat suasana jadi menyenangkan'),
(6, 'Spirited', 'Sanguin', 'Kelebihan', 'Bersemangat'),
(7, 'Promoter', 'Sanguin', 'Kelebihan', 'Mudah mengajak orang secara menyenangkan'),
(8, 'Spontaneous', 'Sanguin', 'Kelebihan', 'Melakukan sesuatu secara spontan'),
(9, 'Optimistic', 'Sanguin', 'Kelebihan', 'Optimis'),
(10, 'Funny', 'Sanguin', 'Kelebihan', 'Suka melucu'),
(11, 'Delightful', 'Sanguin', 'Kelebihan', 'Dianggap sebagai teman yang menyenangkan'),
(12, 'Cheerful', 'Sanguin', 'Kelebihan', 'Periang'),
(13, 'Inspiring', 'Sanguin', 'Kelebihan', 'Menjadi contoh baik bagi teman-teman'),
(14, 'Demonstrative', 'Sanguin', 'Kelebihan', 'Terbiasa menyentuh lawan bicara'),
(15, 'Mixes-easily', 'Sanguin', 'Kelebihan', 'Mudah bergaul'),
(16, 'Talker', 'Sanguin', 'Kelebihan', 'Banyak/suka bicara'),
(17, 'Lively', 'Sanguin', 'Kelebihan', 'Lincah dan pekerja keras'),
(18, 'Cute', 'Sanguin', 'Kelebihan', 'Berhati lembut'),
(19, 'Popular', 'Sanguin', 'Kelebihan', 'Anak yang populer di lingkungan'),
(20, 'Bouncy', 'Sanguin', 'Kelebihan', 'Responsif'),
(21, 'Adventurous', 'Koleris', 'Kelebihan', 'Suka melakukan hal baru'),
(22, 'Persuasive', 'Koleris', 'Kelebihan', 'Ucapannya mudah diterima'),
(23, 'Strong-Willed', 'Koleris', 'Kelebihan', 'Berkemauan keras'),
(24, 'Competitive', 'Koleris', 'Kelebihan', 'Suka tantangan'),
(25, 'Resourceful', 'Koleris', 'Kelebihan', 'Cepat dalam berpikir dan bertindak'),
(26, 'Self-reliant', 'Koleris', 'Kelebihan', 'Mengandalkan kemampuan diri sendiri'),
(27, 'Positive', 'Koleris', 'Kelebihan', 'Percaya diri dalam memimpin orang lain'),
(28, 'Sure', 'Koleris', 'Kelebihan', 'Yakin dalam memutuskan sesuatu'),
(29, 'Outspoken', 'Koleris', 'Kelebihan', 'Lebih suka berterus terang'),
(30, 'Forceful', 'Koleris', 'Kelebihan', 'Mampu mendominasi dalam pergaulan'),
(31, 'Daring', 'Koleris', 'Kelebihan', 'Berani mengambil resiko'),
(32, 'Confident', 'Koleris', 'Kelebihan', 'Punya kepercayaan diri'),
(33, 'Independent', 'Koleris', 'Kelebihan', 'Mandiri'),
(34, 'Decisive', 'Koleris', 'Kelebihan', 'Mudah dalam mengambil keputusan'),
(35, 'Mover', 'Koleris', 'Kelebihan', 'Mampu jadi penggerak'),
(36, 'Tenacious', 'Koleris', 'Kelebihan', 'Gigih dalam mencapai sesuatu'),
(37, 'Leader', 'Koleris', 'Kelebihan', 'Punya tipikal pemimpin'),
(38, 'Chief', 'Koleris', 'Kelebihan', 'Mampu mengajak teman untuk mengikut'),
(39, 'Productive', 'Koleris', 'Kelebihan', 'Tidak suka berdiam diri'),
(40, 'Bold', 'Koleris', 'Kelebihan', 'Berani'),
(41, 'Analitical', 'Melankolis', 'Kelebihan', 'Suka mencari tahu/menyelidiki'),
(42, 'Persistent', 'Melankolis', 'Kelebihan', 'Tekun pada hal yang disukai'),
(43, 'Self-Sacrificing', 'Melankolis', 'Kelebihan', 'Rela berkorban'),
(44, 'Considerate', 'Melankolis', 'Kelebihan', 'Menghargai perasaan teman'),
(45, 'Respectful', 'Melankolis', 'Kelebihan', 'Menghormati orang lain'),
(46, 'Sensitive', 'Melankolis', 'Kelebihan', 'Sensitif'),
(47, 'Planner', 'Melankolis', 'Kelebihan', 'Berencana sebelum bertindak'),
(48, 'Scheduled', 'Melankolis', 'Kelebihan', 'Suka membuat jadwal sehari-hari'),
(49, 'Orderly', 'Melankolis', 'Kelebihan', 'Terbiasa mengerjakan sesuatu berurutan'),
(50, 'Faithful', 'Melankolis', 'Kelebihan', 'Gampang percaya ke teman'),
(51, 'Detailed', 'Melankolis', 'Kelebihan', 'Detail dalam memperhatikan'),
(52, 'Cultured', 'Melankolis', 'Kelebihan', 'Tertarik dengan seni dan budaya'),
(53, 'Idealistic', 'Melankolis', 'Kelebihan', 'Melakukan sesuatu dengan sempurna'),
(54, 'Deep', 'Melankolis', 'Kelebihan', 'Tidak kekanak-kanakan'),
(55, 'Musical', 'Melankolis', 'Kelebihan', 'Senang mengulik di bidang musik'),
(56, 'Thoughtful', 'Melankolis', 'Kelebihan', 'Berpikir sebelum bertindak'),
(57, 'Loyal', 'Melankolis', 'Kelebihan', 'Setia'),
(58, 'Chartmaker', 'Melankolis', 'Kelebihan', 'Berpikir sistematis'),
(59, 'Perfectionist', 'Melankolis', 'Kelebihan', 'Perfeksionis'),
(60, 'Behaved', 'Melankolis', 'Kelebihan', 'Mengindari kenakalan'),
(61, 'Adaptable', 'Plegmatis', 'Kelebihan', 'Mudah beradaptasi'),
(62, 'Peaceful', 'Plegmatis', 'Kelebihan', 'Tenang dalam segala kondisi'),
(63, 'Submissive', 'Plegmatis', 'Kelebihan', 'Mudah menerima pendapat orang'),
(64, 'Controlled', 'Plegmatis', 'Kelebihan', 'Mampu mengontrol emosi'),
(65, 'Reserved', 'Plegmatis', 'Kelebihan', 'Pendiam'),
(66, 'Satisfied', 'Plegmatis', 'Kelebihan', 'Gampang bersukur'),
(67, 'Patient', 'Plegmatis', 'Kelebihan', 'Tenang dan penyabar'),
(68, 'Shy', 'Plegmatis', 'Kelebihan', 'Pemalu'),
(69, 'Obliging', 'Plegmatis', 'Kelebihan', 'Koperatif dan penurut'),
(70, 'Friendly', 'Plegmatis', 'Kelebihan', 'Lebih suka menanggapi'),
(71, 'Diplomatic', 'Plegmatis', 'Kelebihan', 'Hati-hati dalam berbicara'),
(72, 'Consistent', 'Plegmatis', 'Kelebihan', 'Bertindak sesuai yang perkataan'),
(73, 'Inoffensive', 'Plegmatis', 'Kelebihan', 'Tidak suka membuat orang marah'),
(74, 'Dry humor', 'Plegmatis', 'Kelebihan', 'Mudah dibuat tertawa'),
(75, 'Mediator', 'Plegmatis', 'Kelebihan', 'Bisa menengahi pertengkaran'),
(76, 'Tolerant', 'Plegmatis', 'Kelebihan', 'Toleran ke orang lain'),
(77, 'Listener', 'Plegmatis', 'Kelebihan', 'Pendengar yang baik'),
(78, 'Contented', 'Plegmatis', 'Kelebihan', 'Tidak suka berekspektasi tinggi'),
(79, 'Pleasant', 'Plegmatis', 'Kelebihan', 'Mampu berbasa-basi'),
(80, 'Balanced', 'Plegmatis', 'Kelebihan', 'Sering mengambil jalan tengah'),
(81, 'Blank', 'Sanguin', 'Kekurangan', 'Ekspresi (muka) datar'),
(82, 'Undisciplined', 'Sanguin', 'Kekurangan', 'Tidak disiplin'),
(83, 'Repetitious', 'Sanguin', 'Kekurangan', 'Suka membicarakan kebaikannya'),
(84, 'Forgetful', 'Sanguin', 'Kekurangan', 'Gampang lupa'),
(85, 'Interrupts', 'Sanguin', 'Kekurangan', 'Suka menginterupsi'),
(86, 'Unpredictable', 'Sanguin', 'Kekurangan', 'Labil'),
(87, 'Haphazard', 'Sanguin', 'Kekurangan', 'Kurang berhati-hati'),
(88, 'Permissive', 'Sanguin', 'Kekurangan', '\"Asal kau bahagia\" ke orang lain'),
(89, 'Angered-easily', 'Sanguin', 'Kekurangan', 'Gampang ngambek'),
(90, 'Naive', 'Sanguin', 'Kekurangan', 'Kekanak-kanakan'),
(91, 'Wants-credit', 'Sanguin', 'Kekurangan', 'Ingin dihargai sama semua orang'),
(92, 'Talkative', 'Sanguin', 'Kekurangan', 'Terlalu suka bicara'),
(93, 'Disorganized', 'Sanguin', 'Kekurangan', 'Tidak suka diatur-atur'),
(94, 'Inconsistent', 'Sanguin', 'Kekurangan', 'Tidak konsisten'),
(95, 'Messy', 'Sanguin', 'Kekurangan', 'Hidup tidak teratur'),
(96, 'Show off', 'Sanguin', 'Kekurangan', 'Suka pamer'),
(97, 'Loud', 'Sanguin', 'Kekurangan', 'Berisik'),
(98, 'Scatterbrained', 'Sanguin', 'Kekurangan', 'Susah konsentrasi'),
(99, 'Restless', 'Sanguin', 'Kekurangan', 'Tidak bisa diam'),
(100, 'Changeable', 'Sanguin', 'Kekurangan', 'Gampang berubah-ubah pendirian'),
(101, 'Bashful', 'Koleris', 'Kekurangan', 'Canggung'),
(102, 'Unsympathetic', 'Koleris', 'Kekurangan', 'Cuek ke orang lain'),
(103, 'Resistant', 'Koleris', 'Kekurangan', 'Suka melawan'),
(104, 'Frank', 'Koleris', 'Kekurangan', 'Bicara blak-blakan'),
(105, 'Impatient', 'Koleris', 'Kekurangan', 'Tidak sabaran'),
(106, 'Unaffectionate', 'Koleris', 'Kekurangan', 'Kurang peduli sama orang lain'),
(107, 'Headstrong', 'Koleris', 'Kekurangan', 'Keras kepala'),
(108, 'Proud', 'Koleris', 'Kekurangan', 'Sombong dan arogan'),
(109, 'Alienated', 'Koleris', 'Kekurangan', 'Lebih suka menyendiri'),
(110, 'Nervy', 'Koleris', 'Kekurangan', 'Sering bertindak tidak sopan'),
(111, 'Workaholic', 'Koleris', 'Kekurangan', 'Melakukan sesuatu untuk imbalan'),
(112, 'Tactless', 'Koleris', 'Kekurangan', 'Gampang bikin orang tersinggung'),
(113, 'Domineering', 'Koleris', 'Kekurangan', 'Suka mendominasi'),
(114, 'Intolerant', 'Koleris', 'Kekurangan', 'Susah terbuka sama pemikiran orang'),
(115, 'Manipulative', 'Koleris', 'Kekurangan', 'Manipulatif ke orang lain'),
(116, 'Stubborn', 'Koleris', 'Kekurangan', 'Susah dinasehati'),
(117, 'Lord over', 'Koleris', 'Kekurangan', 'Suka menganggap remeh orang'),
(118, 'Short-tempered', 'Koleris', 'Kekurangan', 'Gampang marah ke teman yang tidak mau diatur'),
(119, 'Rash', 'Koleris', 'Kekurangan', 'Gegabah dan suka terburu-buru'),
(120, 'Crafty', 'Koleris', 'Kekurangan', 'Licik'),
(121, 'Brassy', 'Melankolis', 'Kekurangan', 'Suka sok hebat'),
(122, 'Unforgiving', 'Melankolis', 'Kekurangan', 'Susah memaafkan orang lain'),
(123, 'Resentful', 'Melankolis', 'Kekurangan', 'Suka marah-marah'),
(124, 'Fussy', 'Melankolis', 'Kekurangan', 'Membesar-besarkan masalah sepele'),
(125, 'Insecure', 'Melankolis', 'Kekurangan', 'Nggak percaya diri'),
(126, 'Unpopular', 'Melankolis', 'Kekurangan', 'Dijauhi karena tidak peduli kata orang'),
(127, 'Hard to please', 'Melankolis', 'Kekurangan', 'Susah puas sama kinerja orang lain'),
(128, 'Pessimistic', 'Melankolis', 'Kekurangan', 'Gampang pesimis'),
(129, 'Argumentative', 'Melankolis', 'Kekurangan', 'Suka benar sendiri'),
(130, 'Negative attitude', 'Melankolis', 'Kekurangan', 'Mudah bikin orang kesal'),
(131, 'Withdrawn', 'Melankolis', 'Kekurangan', 'Ansos (anti sosial)'),
(132, 'Too sensitive', 'Melankolis', 'Kekurangan', 'Gampang tersinggung'),
(133, 'Depressed', 'Melankolis', 'Kekurangan', 'Mudah merasa tertekan'),
(134, 'Introvert', 'Melankolis', 'Kekurangan', 'Introvert'),
(135, 'Mumbles', 'Melankolis', 'Kekurangan', 'Kebiasaan bicara pelan'),
(136, 'Skeptical', 'Melankolis', 'Kekurangan', 'Susah percaya (skeptis) ke orang lain'),
(137, 'Loner', 'Melankolis', 'Kekurangan', 'Penyendiri'),
(138, 'Suspicious', 'Melankolis', 'Kekurangan', 'Gampang curiga sama orang'),
(139, 'Revengeful', 'Melankolis', 'Kekurangan', 'Dendaman dan membalas diam-diam'),
(140, 'Critical', 'Melankolis', 'Kekurangan', 'Gampang negatif ke orang'),
(141, 'Bossy', 'Plegmatis', 'Kekurangan', 'Suka memerintah'),
(142, 'Unenthusiastic', 'Plegmatis', 'Kekurangan', 'Tidak antusias sama yang dikerjakan'),
(143, 'Reticent', 'Plegmatis', 'Kekurangan', 'Susah punya komitmen'),
(144, 'Fearful', 'Plegmatis', 'Kekurangan', 'Gampang overthinking dan takut banyak hal'),
(145, 'Indecisive', 'Plegmatis', 'Kekurangan', 'Sulit mengambil keputusan'),
(146, 'Uninvolved', 'Plegmatis', 'Kekurangan', 'Susah punya ketertarikan'),
(147, 'Hesitant', 'Plegmatis', 'Kekurangan', 'Suka ragu-ragu'),
(148, 'Plain', 'Plegmatis', 'Kekurangan', 'Terlalu polos'),
(149, 'Aimless', 'Plegmatis', 'Kekurangan', 'Tidak punya tujuan'),
(150, 'Nonchalat', 'Plegmatis', 'Kekurangan', 'Suka acuh tak acuh sama sekitar'),
(151, 'Worrier', 'Plegmatis', 'Kekurangan', 'Sering khawatir secara berlebihan'),
(152, 'Timid', 'Plegmatis', 'Kekurangan', 'Lebih suka mundur dari situasi sulit'),
(153, 'Doubtful', 'Plegmatis', 'Kekurangan', 'Selalu merasa tidak yakin dengan segala sesuat'),
(154, 'Indifferent', 'Plegmatis', 'Kekurangan', 'Merasa tidakn akan berhasil dengan berbagai cara'),
(155, 'Moody', 'Plegmatis', 'Kekurangan', 'Melakukan sesuatu sesuai mood'),
(156, 'Slow', 'Plegmatis', 'Kekurangan', 'Lambat loading'),
(157, 'Lazy', 'Plegmatis', 'Kekurangan', 'Cenderung pemalas'),
(158, 'Sluggish', 'Plegmatis', 'Kekurangan', 'Suka menunda-nunda'),
(159, 'Reluctant', 'Plegmatis', 'Kekurangan', 'Susah diajak terlibat'),
(160, 'Compromising', 'Plegmatis', 'Kekurangan', 'Terlalu sering kompromi');

-- --------------------------------------------------------

--
-- Table structure for table `data_uji`
--

CREATE TABLE `data_uji` (
  `id` int(3) NOT NULL,
  `id_siswa` int(3) NOT NULL,
  `nama` varchar(200) DEFAULT NULL,
  `jenis_kelamin` enum('L','P') DEFAULT NULL,
  `usia` int(11) DEFAULT NULL,
  `sekolah` varchar(100) DEFAULT NULL,
  `jawaban_a` int(11) DEFAULT NULL,
  `jawaban_b` int(11) DEFAULT NULL,
  `jawaban_c` int(11) DEFAULT NULL,
  `jawaban_d` int(11) DEFAULT NULL,
  `kelas_asli` varchar(100) DEFAULT NULL,
  `kelas_hasil` varchar(100) DEFAULT NULL,
  `nilai_sanguin` double DEFAULT NULL,
  `nilai_koleris` double DEFAULT NULL,
  `nilai_melankolis` double DEFAULT NULL,
  `nilai_plegmatis` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_uji`
--

INSERT INTO `data_uji` (`id`, `id_siswa`, `nama`, `jenis_kelamin`, `usia`, `sekolah`, `jawaban_a`, `jawaban_b`, `jawaban_c`, `jawaban_d`, `kelas_asli`, `kelas_hasil`, `nilai_sanguin`, `nilai_koleris`, `nilai_melankolis`, `nilai_plegmatis`) VALUES
(1, 3, 'Muhammad Sabri', 'L', 12, 'Negeri', 7, 4, 25, 4, 'Plegmatis', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jawaban_kuisioner`
--

CREATE TABLE `jawaban_kuisioner` (
  `id` int(3) NOT NULL,
  `id_user` int(3) NOT NULL DEFAULT 0,
  `id_siswa` int(3) NOT NULL DEFAULT 0,
  `id_soal` int(3) NOT NULL DEFAULT 0,
  `jawaban` char(1) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jawaban_kuisioner`
--

INSERT INTO `jawaban_kuisioner` (`id`, `id_user`, `id_siswa`, `id_soal`, `jawaban`) VALUES
(1, 4, 3, 41, 'C'),
(2, 4, 3, 42, 'C'),
(3, 4, 3, 43, 'C'),
(4, 4, 3, 44, 'C'),
(5, 4, 3, 45, 'C'),
(6, 4, 3, 46, 'C'),
(7, 4, 3, 47, 'C'),
(8, 4, 3, 48, 'C'),
(9, 4, 3, 49, 'C'),
(10, 4, 3, 50, 'C'),
(11, 4, 3, 51, 'C'),
(12, 4, 3, 52, 'C'),
(13, 4, 3, 54, 'C'),
(14, 4, 3, 55, 'C'),
(15, 4, 3, 56, 'C'),
(16, 4, 3, 57, 'C'),
(17, 4, 3, 58, 'C'),
(18, 4, 3, 60, 'C'),
(19, 4, 3, 78, 'D'),
(20, 4, 3, 80, 'D'),
(21, 4, 3, 81, 'A'),
(22, 4, 3, 82, 'A'),
(23, 4, 3, 84, 'A'),
(24, 4, 3, 87, 'A'),
(25, 4, 3, 88, 'A'),
(26, 4, 3, 94, 'A'),
(27, 4, 3, 95, 'A'),
(28, 4, 3, 101, 'B'),
(29, 4, 3, 118, 'B'),
(30, 4, 3, 119, 'B'),
(31, 4, 3, 120, 'B'),
(32, 4, 3, 122, 'C'),
(33, 4, 3, 125, 'C'),
(34, 4, 3, 127, 'C'),
(35, 4, 3, 133, 'C'),
(36, 4, 3, 134, 'C'),
(37, 4, 3, 135, 'C'),
(38, 4, 3, 137, 'C'),
(39, 4, 3, 153, 'D'),
(40, 4, 3, 155, 'D');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(3) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` text DEFAULT NULL,
  `level` char(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nama`, `username`, `password`, `level`) VALUES
(1, 'Admin', 'admin', '$2y$10$zwMqE/tqI0FFDVYkv/BSn.pKmXZcxp0r05cJFj4d55s3jJj2QuqGe', '1'),
(2, 'Dedy Kasriadi', 'dedy', '$2y$10$gnfNW0276NKmuKq1puHGGO0.AZQyDUgDOvZ4polycj55JXgGQptjG', '2'),
(3, 'Abdul Haris', 'haris123', '$2y$10$6xt8HpivQ5MJWh.6DE9eB.TsK4JapT2JY.mzcozVnp4WZD0jyuttW', '3'),
(4, 'Muhammad Sabri', 'sabri', '$2y$10$Ktt/aD3cFGqD7vVJ9KzRiOEqExKrL5lCp31zdK.1m8cyZWymFf0NG', '2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_hasil_klasifikasi`
--
ALTER TABLE `data_hasil_klasifikasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_latih`
--
ALTER TABLE `data_latih`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_siswa`
--
ALTER TABLE `data_siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_soal`
--
ALTER TABLE `data_soal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_uji`
--
ALTER TABLE `data_uji`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jawaban_kuisioner`
--
ALTER TABLE `jawaban_kuisioner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_hasil_klasifikasi`
--
ALTER TABLE `data_hasil_klasifikasi`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `data_latih`
--
ALTER TABLE `data_latih`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `data_siswa`
--
ALTER TABLE `data_siswa`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `data_soal`
--
ALTER TABLE `data_soal`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;

--
-- AUTO_INCREMENT for table `data_uji`
--
ALTER TABLE `data_uji`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jawaban_kuisioner`
--
ALTER TABLE `jawaban_kuisioner`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
