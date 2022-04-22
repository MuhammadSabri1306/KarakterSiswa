-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2022 at 04:01 PM
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
-- Database: `naivebayes`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_hasil_klasifikasi`
--

CREATE TABLE `data_hasil_klasifikasi` (
  `id` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL DEFAULT 0,
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
(1, 1, 'L', 15, 'Swasta', 5, 16, 11, 8, 'Koleris', 0.000000024963117963092, 0.001938411237094, 0.0000098277325228176, 0.000000011191472403955),
(2, 2, 'L', 14, 'Swasta', 13, 5, 9, 13, 'Plegmatis', 0.000010308760137311, 0.0000016423451856772, 0.00000003174376601882, 0.000010840414090197),
(3, 3, 'L', 24, 'Negeri', 14, 10, 13, 3, 'Plegmatis', 2.5992087290489e-185, 1.0279178043673e-81, 4.9002053226894e-104, 1.8866271690136e-67);

-- --------------------------------------------------------

--
-- Table structure for table `data_latih`
--

CREATE TABLE `data_latih` (
  `id` int(11) NOT NULL,
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
  `id` int(11) NOT NULL,
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
(2, 'Siswa 1', '12345678', 'L', 14, 'Swasta', 25, 'Orang Tua 1', '0888888888'),
(3, 'Siswa 2', '22345678', 'L', 24, 'Negeri', 26, 'Orang Tua 2', '08888888899'),
(5, 'Muhammad Sabri', '32345678', 'L', 12, 'Negeri', 45, 'Drs. Makdis Tappu, MM', '085299303229');

-- --------------------------------------------------------

--
-- Table structure for table `data_soal`
--

CREATE TABLE `data_soal` (
  `id` int(11) NOT NULL,
  `pilihan_a` text DEFAULT NULL,
  `pilihan_b` text DEFAULT NULL,
  `pilihan_c` text DEFAULT NULL,
  `pilihan_d` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_soal`
--

INSERT INTO `data_soal` (`id`, `pilihan_a`, `pilihan_b`, `pilihan_c`, `pilihan_d`) VALUES
(1, 'Penuh kehidupan, sering menggunakan isyarat tangan, lengan, dan wajah secara hidup.(Animated)', 'Orang yang mau melakukan sesuatu hal yang baru dan berani bertekad untuk me-nguasainya.(Adventurous)', 'Suka menyelidiki bagian - bagian yang logis. (Analitical)', 'Mudah menyesuaikan diri dan senang dalam setiap situasi. (Adaptable)'),
(2, 'Penuh kesenangan dan selera humor yang baik. (Playful)', 'Meyakinkan se-seorang dengan logika dan fakta, bukan dengan pesona / kekuasaan. (Persuasive)', 'Melakukan sesuatu sampai selesai sebelum memulai yang lain. (Persistent)', 'Tampak tidak ter-ganggu dan tenang serta menghindari setiap bentuk ke-kacauan. (Peaceful)'),
(3, 'Orang yang memandang bersama orang lain sebagai kesempatan untuk bersikap manis dan menghibur, bukannya sebagai tantangan / kesempatan bisnis. (Sociable)', 'Orang yang yakin dengan caranya sendiri. (Strong-Willed)', 'Bersedia mengorban-kan dirinya untuk memenuhi kebutuhan orang lain.', 'Dengan mudah menerima pandang-an / keinginan orang lain tanpa perlu banyak meng-ungkapkan pendapat sendiri. (Submissive)'),
(4, 'Bisa merebut hati orang lain melalui pesona kepribadian. (Convicing)', 'Mengubah setiap situasi, kejadian atau permainan sebagai sebuah kontes dan selalu bermain untuk menang. (Competitive)', 'Menghargai keperluan dan perasaan orang lain. (Considerate)', 'Mempunyai perasaan emosional tapi jarang memperlihatkannya. (Controlled)'),
(5, 'Memperbaharui dan membantu membuat orang lain merasa senang. (Refreshing)', 'Bisa bertindak cepat dan efektif dalam semua situasi. (Resourceful)', 'Memperlakukan orang lain dengan segan sebagai penghormatan dan penghargaan. (Respectfull)', 'Menahan diri dalam menunjukkan emosi atau antusiasme. (Reserved)'),
(6, 'Penuh gairah dalam kehidupan. (Spirited)', 'Orang mandiri yang bisa sepenuhnya mengandal-kan kemampuan dan sumber dayanya sendiri. (Self-Reliant)', 'Secara intensif memperhatikan orang lain maupun hal apapun yang terjadi di sekitar. (Sensitive)', 'Orang yang mudah menerima keadaan atau situasi apa saja. (Satisfied)'),
(7, 'Dapat mendorong atau memaksa orang lain mengikuti dan bergabung melalui pesona kepribadian-nya. (Promoter)', 'Mengetahui segalanya akan beres bila kita yang memimpin. (Positive)', 'Memilih mempersiap-kan aturan yang terinci sebelumnya dalam menyelesaikan suatu proyek dan lebih menyukai keterlibatan dalam tahap-tahap perencanaan dan produk jadi, bukan dalam melaksanakan tugas. (Planner)', 'Tidak terpengaruh oleh penundaan. Tetap tenang dan toleran. (Patient)'),
(8, 'Memilih agar semua kehidupan adalah kegiatan yang impulsif, tidak dipikirkan terlebih dahulu dan tidak terhambat oleh rencana.(Spontaneous)', 'Yakin, tidak ragu-ragu. (Sure)', 'Membuat dan meng-hayati hidup menurut rencana sehari-hari. Tidak menyukai bila rencananya terganggu.(Scheduled)', 'Pendiam, tidak mudah terseret dalam per-cakapan. (Shy)'),
(9, 'Orang yang riang dan dapat meyakinkan diri sendiri & orang lain bahwa semuanya akan beres. (Optimistic)', 'Bicara terang-terangan dan terkadang tidak menahan diri. (Outspoken)', 'Orang yang mengatur segala-galanya secara sistematis dan metodis. (Orderly)', 'menerima apa saja, cepat melakukan sesuatu bahkan dengan cara orang lain. (Obliging)'),
(10, 'Punya rasa humor yang cemerlang dan bisa membuat cerita apa saja menjadi peristiwa yang menyenangkan. (Funny)', 'Pribadi yang mendominasi dan mampu menyebabkan orang lain ragu - ragu untuk melawannya. (Forceful)', 'Secara konsisten dapat diandalkan, teguh, setia, dan mengabdi, bahkan terkadang tanpa alasan. (Faithful)', 'Orang yang menang-gapi. Bukan orang yang punya inisiatif untuk memulai per-cakapan. (Friendly)'),
(11, 'Orang yang me-nyenangkan sebagai teman. (Delightful)', 'Bersedia mengambil resiko tanpa kenal takut. (Daring)', 'Melakukan segala sesuatu secara ber-urutan dengan ingatan yang jernih akan segala hal yang terjadi. (Detailed)', 'Berurusan dengan orang lain secara penuh siasat, perasa, dan sabar. (Diplomatic)'),
(12, 'Secara konsisten memiliki semangat yang tinggi dan suka membagkan ke-bahagiaan kepada orang lain. (Cheerful)', 'Percaya diri dan yakin akan kemampuan dan kesuksesannya sendiri. (Confifent)', 'Orang yang perhatiannya melibat-kan sesuatu yang berhubungan dengan intelektual dan artistik. (Cultured)', 'Tetap memiliki ke-seimbangan secara emosional, me-nanggapi sebagaimana yang diharapkan orang lain. (Consisten)'),
(13, 'Mendorong orang lain untuk bekerja dan ter-libat serta membuat seluruhnya menyenangkan. (Inspiring)', 'Memenuhi diri sendiri, mandiri, penuh percaya diri dan nampak tidak begitu memerlukan bantuan. (Independent)', 'Memvisualisasikan hal-hal dalam bentuk yang sempurna dan perlu memenuhi standar itu sendiri. (Idealistic)', 'Tidak pernah me-ngatakan atau me-nyebabkan apapun yang tidak me-nyenangkan atau menimbulkan rasa keberatan. (Inoffensive)'),
(14, 'Terang-terangan me-nyatakan emosi terutama rasa sayang dan tidak ragu menyentuh ketika berbicara dengan orang lain. (Demonstrative)', 'Orang yang mempunyai kemampuan membuat penilaian yang cepat dan tuntas. (Decisive)', 'Intensif dan introspektif tanpa rasa senang pada percakapan dan pengajaran yang pulasan. (Deep)', 'Memperlihatkan ke-pandaian bicara yang mengigit\'. Biasanya kalimat satu baris yang sifatnya sarkastik. (Dryhumor)'),
(15, 'Menyukai pesta dan tidak bisa menunggu untuk bertemu setiap orang dalam ruangan, tidak pernah meng-anggap orang lain asing. (Mixes-easily)', 'Terdorong oleh keperluan untuk produktif, pemimpin yang dituruti orang lain. (Mover)', 'Punya apresiasi mendalam untuk musik, punya komitmen kepada musik sebagai bentuk seni, bukan hanya kesenangan pertunjukan. (Musical)', 'Secara konsisten mencari peranan merukunkan pertikaian supaya bisa meng-hindari konflik. (Mediator)'),
(16, 'Terus-menerus ber-bicara, biasanya men-ceritakan kisah lucu yang dapat menghibur setiap orang di sekitar-nya, merasa perlu mengisi kesunyian agar orang lain merasa senang. (Talker)', 'Memegang teguh dengan keras kepala dan tidak mau melepaskan hingga tujuan tercapai. (Tenacious)', 'Orang yang tanggap dan mengingat setiap kesempatan istimewa, cepat memberi isyarat yang baik. (Thoightful)', 'Mudah menerima pemikiran dan cara orang lain tanpa perlu tidak menyetujuinya. (Tolerant)'),
(17, 'Penuh kehidupan, kuat, dan penuh semangat. (Lively)', 'Pemberi pengarahan karena pembawaan yang terdorong untuk memimpin dan sering merasa sulit mem-percayai bahwa orang lain bisa melakukan pekerjaan dengan sama baiknya. (Leader)', 'Setia pada seseorang, gagasan, dan pekerja-an, terkadang dapat melampaui alasan. (Loyal)', 'Selalu bersedia men-dengarkan apa yang orang lain katakan. (Listener)'),
(18, 'Tak ternilai harganya, dicintai, pusat perhatian. (Cute)', 'Memegang ke-pemimpinan dan meng-harapkan orang lain mengikuti. (Chief)', 'Mengatur kehidupan, tugas, dan pemecahan masalah dengan membuat daftar. (Chartmaker)', 'Mudah puas dengan apa yang dimiliki, jarang iri hati. (Contented)'),
(19, 'Orang yang suka menghidupkan pesta sebagai diinginkan orang sebagai tamu pesta. (Populer)', 'Harus terus-menerus bekerja atau mencapai sesuatu, sering merasa sulit ber-istirahat. (Productive)', 'Menempatkan standar tinggi pada dirinya maupun orang lain. Menginginkan segala-galanya pada urutan semestinya.(Perfectionist)', 'Mudah bergaul, bersifat terbuka, mudah diajak bicara. (Pleasant)'),
(20, 'Kepribadian yang hidup, berlebihan, penuh tenaga. (Bouncy)', 'Tidak kenal takut, berani, terus terang, tidak takut akan resiko. (Bold)', 'Secara konsisten ingin membawa diri di dalam batas-batas apa yang dirasakan semestinya. (Behafed)', 'Kepribadian yang stabil dan berada di tengah-tengah. (Balanced)'),
(21, 'Memperlihatkan sedikit emosi / mimik. (Blank)', 'Menghindari perhatian akibat rasa malu. (Bashful)', 'Suka pamer, mem-perlihatkan apa yang gemerlap dan kuat, terlalu bersuara. (Brassy)', 'Suka memerintah, mendominasi, kadang-kadang mengesalkan antar hubungan orang dewasa. (Bossy)'),
(22, 'Kurang teraturan-nya mempengaruhi hampir semua bidang ke-hidupannya. (Undisipline)', 'Merasa sulit mengenali masalah dan perasaan orang lain. (Unsympathetic)', 'Sulit memaafkan dan melupakan sakit hati yang pernah dilakukan, biasa mendendam. (Unforgiving)', 'Cenderung tidak ber-gairah, sering merasa bahwa bagaimana-pun sesuatu tidak akan berhasil. (Unenthusiastic)'),
(23, 'Suka menceritakan kembali suatu kisah tanpa menyadari bahwa cerita tersebut pernah diceritakan sebelumnya, selalu perlu sesuatu untuk dikatakan. (Repetitious)', 'Berjuang, melawan untuk menerima cara lain yang tidak sesuai dengan cara yang diinginkan. (Resistant)', 'Sering memendam rasa tidak senang akibat merasa tersinggung oleh sesuatu. (Resenful)', 'Tidak bersedia ikut terlibat terutama bila rumit. (Reticent)'),
(24, 'Punya ingatan kurang kuat, biasa-nya berkaitan dengan kurang disiplin dan tidak mau repot-repot mencatat hal-hal yang tidak menyenangkan. (Forgetful)', 'Langsung, blak-blakan, tidak sungkan mengatakan apa yang dipikirkan. (Farank)', 'Bersikeras tentang persoalan sepele, minta perhatian besar pada persoalan yang tidak penting. (Fussy)', 'Sering merasa sangat khawatir, sedih, dan gelisah. (Fearful)'),
(25, 'Lebih banyak bicara daripada mendengar-kan, bila sudah bicara sulit berhenti. (Interrupts)', 'Sulit bertahan untuk menghadapi kekesal-an. (Impatient)', 'Kurang percaya diri. (Insecure)', 'Sulit dalam membuat keputusan. (Indesecive)'),
(26, 'Bisa bergairah sesaat dan sedih pada saat berikutnya. Bersedia membantu kemudian menghilang. Berjanji akan datang tapi kemudian lupa untuk muncul. (Unpredictable)', 'Merasa sulit mem-perlihatkan kasih sayang dengan terbuka. (Unaffectionate)', 'Tuntutannya akan kesempurnaan terlalu tinggi dan dapat membuat orang lain menjauhinya. (Unpopular)', 'Tidak tertarik pada perkumpulan atau kelompok. (Uninfolved)'),
(27, 'Tidak punya cara yang konsisten untuk melakukan banyak hal. (Haphazard)', 'Bersikeras memaksa-kan caranya sendiri. (Headstrong)', 'Standar yang ditetapkan begitu tinggi sehingga orang lain sulit memuaskannya. (Hard to Please)', 'Lambat dalam bergerak dan sulit untuk ikut terlibat. (Hesitant)'),
(28, 'Memperbolehkan orang lain, termasuk anak-anak untuk melakukan apa saja sesukanya untuk menghindari diri kita tidak disukai. (Permissive)', 'Punya harga diri tinggi dan menganggap diri selalu benar dan yang terbaik dalam pekerja-an. (Proud)', 'Dalam mengharapkan yang terbaik, biasanya melihat sisi buruk sesuatu terlebih dahulu. (Pessimistic)', 'Memiliki kepribadian yang biasa saja dan tidak suka mem-perlihatkan banyak emosi. (Plain)'),
(29, 'Memiliki perangai seperti anak-anak yang mengutarakan diri dengan ngambek dan berbuat ber-lebihan tetapi kemudian melupakan-nya seketika. (Angered-Easily)', 'Mudah merasa ter-asing dari orang lain dikarenakan rasa tidak aman atau takut jangan-jangan orang lain tidak merasa senang bersamanya. (Alienated)', 'Mengobarkan per-debatan karena biasanya selalu benar dan terkadang tidak peduli bagaimana situasi saat itu. (Argumentative)', 'Bukan orang yang suka menetapkan tujuan dan tidak berharap menjadi orang yang seperti itu. (Aimless)'),
(30, 'Memiliki perspektif yang sederhana dan kekanak-kanakan, kurang pengertian terhadap tingkat kehidupan yang lebih mendalam. (Naive)', 'Penuh keyakinan, semangat, dan keberanian (sering dalam pengertian negatif). (Nervy)', 'Sikapnya jarang positif dan sering hanya melihat sisi buruk dari setiap situasi. (Negative-Atitude)', 'Mudah bergaul, tidak peduli, dan masa bodoh. (Nonchalat)'),
(31, 'Merasa senang mendapat pengharga-an dari orang lain. Sebagai penghibur menyukai tepuk tangan, tawa, dan penerimaan penonton. (Wants-Credit)', 'Menetapkan tujuan secara agresif serta harus terus produktif, merasa bersalah bila beristirahat, bukan ter-dorong oleh keinginan untuk sempurna melainkan imbalan. (Workaholic)', 'Suka menarik diri dan memerlukan banyak waktu untuk sendirian atau mengasingkan diri. (Withdrawn)', 'Secara konsisten merasa terganggu atau resah. (Worrier)'),
(32, 'Suka berbicara dan sulit mendengarkan. (Talkative)', 'Kadang-kadang me-nyatakan diri dengan cara yang agak menyinggung perasaan dan kurang per-timbangan. (Tactless)', 'Terlalu introspektif dan mudah tersinggung kalau disalahpahami. (Too Sensitive)', 'Lebih suka mundur dari situasi sulit. (Timid)'),
(33, 'Kurang memiliki ke-mampuan dalam membuat kehidupan menjadi teratur. (Disorganized)', 'Dengan paksa mengambil kontrol atas situasi atau orang lain, biasanya dengan mengatakan apa yang harus dilakukan. (Domineering)', 'Hampir sepanjang waktu merasa tertekan. (Depressed)', 'Mempunyai ciri khas selalu tidak tetap dan kurang keyakinan bahwa suatu hal akan berhasil. (Doubtful)'),
(34, 'Tidak menentu, serba berlawanan dengan tindakan dan emosi yang tidak berdasar-kan logika. (Inconsistant)', 'Tampaknya tidak bisa menerima sikap, pandangan, dan cara orang lain. (Intolerant)', 'Pemikiran dan perhatian ditujukan ke dalam, hidup di dalam diri sendiri. (Introvert)', 'Merasa bahwa ke-banyakan hal tidak penting dalam suatu cara atau cara yang lain. (Indifferent)'),
(35, 'Hidup dalam keadaan tidak teratur, tidak dapat menemukan banyak benda. (Messy)', 'Mempengaruhi dengan cerdik dan penuh tipu untuk kepentingan sendiri; dengan suatu cara dapat memaksakan kehendak. (Manipulative)', 'Bicara pelan kalau didesak, tidak mau repot-repot bicara dengan jelas. (Mumbles)', 'Tidak punya emosi yang tinggi, tetapi biasanya semangatnya merosot sekali, apalagi bila merasa tidak dihargai. (Moody)'),
(36, 'Perlu menjadi pusat perhatian, ingin dilihat. (Show Off)', 'Bertekad memaksakan kehendaknya, tidak mudah dibujuk, keras kepala. (Stubborn)', 'Tidak mudah percaya, mempertanyakan motif di balik suatu perkataan. (Skeptical)', 'Tidak sering bertindak atau berpikir cepat, sangat mengganggu. (Slow)'),
(37, 'Tawa dan suaranya dapat didengar di atas suara lainnya di di dalam ruangan. (Loud)', 'Tidak ragu-ragu mengatakan benar dan dapat memegang kendali. (Lord Over)', 'Memerlukan banyak waktu pribadi dan cenderung meng-hindari orang lain. (Loner)', 'Menilai pekerjaan dan kegiatan dengan ukuran berapa banyak tenaga yang dibutuhkan. (Lazy)'),
(38, 'Tidak punya kekuatan untuk berkonsentrasi atau menaruh per-hatian pada sesuatu. (Scatterbrained)', 'Punya kemarahan yang menuntut berdasarkan ketidak-sabaran. Kemarahan yang dinyatakan saat orang lain tak bergerak cukup cepat atau tidak menyelesaikan apa yang diperintahkan. (Short-Tempered)', 'Cenderung mencurigai atau tidak mempercayai gagasan orang lain. (Suspicious)', 'Lambat untuk me-mulai, perlu dorongan yang kuat untuk termotivasi. (Sluggish)'),
(39, 'Menyukai kegiatan baru terus-menerus karena tidak merasa senang melakukan hal yang sama sepanjang waktu. (Restless)', 'Bisa bertindak tergesa-gesa tanpa memikirkan dengan tuntas terlebih dahulu, biasanya karena ketidaksabaran. (Rash)', 'Secara sadar maupun tidak mendendam, menghukum orang yang melanggar, diam-diam menahan persahabatan /kasih sayang. (Revengeful)', 'Tidak bersedia untuk ikut terlibat dalam suatu hal. (Reluctant)'),
(40, 'Rentang perhatian kekanak-kanakan dan pendek, butuh banyak perubahan dan variasi supaya tak merasa bosan. (Changeable)', 'Cerdik, orang yang selalu bisa menemu-kan cara untuk mencapai tujuan yang diinginkan. (Crafty)', 'Selalu mengevaluasi dan membuat penilaian, sering memikirkan dan menyatakan reaksi negatif. (Critical)', 'Sering mengendur kan pendiriannya, bahkan ketika merasa benar untuk menghindari terjadinya konflik. (Comrimissing)');

-- --------------------------------------------------------

--
-- Table structure for table `data_uji`
--

CREATE TABLE `data_uji` (
  `id` int(11) NOT NULL,
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

INSERT INTO `data_uji` (`id`, `nama`, `jenis_kelamin`, `usia`, `sekolah`, `jawaban_a`, `jawaban_b`, `jawaban_c`, `jawaban_d`, `kelas_asli`, `kelas_hasil`, `nilai_sanguin`, `nilai_koleris`, `nilai_melankolis`, `nilai_plegmatis`) VALUES
(1, 'Asher Fawwazadzka', 'L', 13, 'Swasta', 19, 4, 5, 12, 'Sanguin', 'Sanguin', 0.00001059519421744268, 0.00000026493414282362, 0.00000000000079876173, 0.00000110564478009853),
(2, 'Wafda Mukrom Q.F', 'L', 13, 'Swasta', 15, 9, 9, 7, 'Sanguin', 'Sanguin', 0.00001903492030379254, 0.00000301460088708832, 0.00000003014105117788, 0.00000260043216982275),
(3, 'Zulham \'Ali Fikri', 'L', 14, 'Swasta', 5, 6, 12, 17, 'Plegmatis', 'Plegmatis', 0.00000178996307563081, 0.00000099270725068085, 0.00000110363434772627, 0.00000418843183622943),
(4, 'Qosholis S Al-Usama', 'L', 15, 'Swasta', 13, 8, 9, 10, 'Sanguin', 'Plegmatis', 0.00000000591068756891, 0.00000027899234049122, 0.00000000048991992649, 0.00000382206255687877),
(5, 'Muhammad Shodiq', 'L', 15, 'Swasta', 20, 9, 5, 6, 'Sanguin', 'Plegmatis', 0.00000000388717365618, 0.00000010109583018843, 0.00000000000000643782, 0.00000071499212686107),
(6, 'Hilmy Aziz M', 'L', 14, 'Swasta', 10, 12, 13, 5, 'Melankolis', 'Sanguin', 0.00000494706332717647, 0.00000475626299234548, 0.00000317370924404462, 0.00000301171224753789),
(7, 'Rafif', 'L', 14, 'Swasta', 13, 7, 12, 8, 'Sanguin', 'Sanguin', 0.00000974167641104062, 0.00000233874971727034, 0.00000146709840420155, 0.0000034808171959302),
(8, 'Muhammad F Attaqi', 'L', 14, 'Swasta', 8, 11, 17, 4, 'Melankolis', 'Plegmatis', 0.00000107790681803043, 0.00000075586760550857, 0.00000169997813357659, 0.0000019861011315023),
(9, 'M. Najib Erdyansya', 'L', 13, 'Swasta', 10, 13, 6, 11, 'Koleris', 'Sanguin', 0.00001090759652693024, 0.00000566174137713691, 0.00000000007785737511, 0.00000348562537539991),
(10, 'Moh. Inas Ramadhan', 'L', 13, 'Swasta', 16, 12, 7, 5, 'Sanguin', 'Sanguin', 0.00001461218027499003, 0.00000382928976784085, 0.00000000037231480239, 0.00000168396271220445),
(11, 'Akmal Thoriq M', 'L', 15, 'Swasta', 9, 14, 10, 7, 'Koleris', 'Plegmatis', 0.00000000287876936377, 0.00000063976040274307, 0.00000000275481538298, 0.00000319416129220567),
(12, 'Abdullah Yusuf F R', 'L', 13, 'Swasta', 8, 6, 11, 15, 'Plegmatis', 'Sanguin', 0.00000630352158633451, 0.00000109678368182606, 0.00000079861288531428, 0.00000499332360837274),
(13, 'Akhdan Muhammad F', 'L', 13, 'Swasta', 12, 11, 9, 8, 'Sanguin', 'Sanguin', 0.00001665958846800149, 0.00000534105422702991, 0.00000004881920123964, 0.00000356396041015018),
(14, 'Faris Saifullah', 'L', 14, 'Swasta', 15, 8, 10, 7, 'Sanguin', 'Sanguin', 0.00001319998634912161, 0.00000355271028444462, 0.00000011424339482865, 0.00000273529615442323),
(15, 'M Riza A.K', 'L', 13, 'Swasta', 16, 6, 7, 11, 'Sanguin', 'Sanguin', 0.00001757600163829249, 0.00000115440961407501, 0.00000000041611468677, 0.00000244282835515955),
(16, 'M. Lazuardy F', 'L', 13, 'Swasta', 12, 8, 10, 10, 'Sanguin', 'Sanguin', 0.00001655630075181644, 0.00000278250454300212, 0.00000023837297833623, 0.00000415684649919988),
(17, 'M Zidan Al Baihaqi', 'L', 14, 'Swasta', 9, 4, 5, 22, 'Plegmatis', 'Plegmatis', 0.00000098657393340503, 0.00000030340110155376, 0.00000000000156781372, 0.00000400574016241667),
(18, 'Abdul Allam', 'L', 15, 'Swasta', 10, 3, 12, 15, 'Plegmatis', 'Plegmatis', 0.00000000168922347765, 0.00000002933676998825, 0.00000002045543291744, 0.00000439197820273233),
(19, 'Sauqi Hilmi M', 'L', 14, 'Swasta', 11, 2, 6, 21, 'Plegmatis', 'Plegmatis', 0.00000142748780695322, 0.00000017858301617388, 0.00000000002528552973, 0.00000379852749625048),
(20, 'Ahzami Asy-Syhadi', 'L', 13, 'Swasta', 9, 9, 10, 12, 'Plegmatis', 'Sanguin', 0.00001155042259372606, 0.00000344370121125799, 0.00000027323979990799, 0.00000484791976481836),
(21, 'Nashrul Fatih Y', 'L', 13, 'Swasta', 13, 6, 9, 12, 'Sanguin', 'Sanguin', 0.00001591983756091421, 0.00000151161881339225, 0.00000004168750073038, 0.00000400372064381808),
(22, 'Qomaruddin Zaki', 'L', 14, 'Swasta', 8, 12, 10, 10, 'Koleris', 'Koleris', 0.00000731612972043473, 0.00000905107216745413, 0.00000021529634348897, 0.0000041855667456655),
(23, 'Ichsanul A Sholeh', 'L', 13, 'Swasta', 15, 2, 8, 15, 'Sanguin', 'Sanguin', 0.00000864152347258954, 0.00000022055718208251, 0.0000000034465605782, 0.0000027701434254744),
(24, 'Syahaq', 'L', 13, 'Swasta', 10, 9, 9, 12, 'Plegmatis', 'Sanguin', 0.00001370219570979321, 0.00000370843836523681, 0.00000005617939648387, 0.0000047820052330384),
(25, 'Betelgeuse W F K', 'L', 14, 'Swasta', 12, 14, 9, 5, 'Koleris', 'Koleris', 0.00000817539720939177, 0.00000985142971273055, 0.00000003255085880656, 0.00000265805097241224),
(26, 'Dian Izza Nadiya', 'P', 15, 'Swasta', 10, 8, 15, 7, 'Melankolis', 'Plegmatis', 0.00000000136301897299, 0.00000004392039543461, 0.00000013627133716906, 0.00000310846864983354),
(27, 'Ivana Thynaba Nareza', 'P', 14, 'Swasta', 5, 4, 11, 20, 'Plegmatis', 'Plegmatis', 0.00000080540598697309, 0.00000021997810472716, 0.00000060146010134487, 0.00000405373048342957),
(28, 'Cia', 'P', 14, 'Swasta', 24, 10, 2, 4, 'Sanguin', 'Sanguin', 0.00000209671102792624, 0.00000016514195902648, 4.79e-18, 0.00000012586809563691),
(29, 'Rahmadita Nurdian K', 'P', 14, 'Swasta', 16, 11, 6, 7, 'Sanguin', 'Sanguin', 0.00001035877648191036, 0.00000289290563597011, 0.00000000005431908001, 0.00000191413629082649),
(30, 'Shofiyyah R Aisy', 'P', 13, 'Swasta', 5, 2, 17, 16, 'Melankolis', 'Melankolis', 0.00000039320542229956, 0.00000001186770099996, 0.00000270494899473884, 0.00000218033005019083),
(31, 'Sabrina Salsa Oktavia', 'P', 14, 'Swasta', 14, 11, 6, 9, 'Sanguin', 'Sanguin', 0.00001063657051261204, 0.00000358498202244937, 0.00000000008553981332, 0.00000280224967119771),
(32, 'Anis', 'P', 14, 'Swasta', 8, 2, 8, 22, 'Plegmatis', 'Plegmatis', 0.00000073262322626823, 0.00000009768166235779, 0.00000000503993927182, 0.00000426006467546875),
(33, 'Khansa F Nirwasita', 'P', 13, 'Swasta', 21, 8, 5, 6, 'Sanguin', 'Sanguin', 0.00000948183373698269, 0.0000003731095396158, 0.00000000000077950735, 0.00000054316879750358),
(34, 'Aisyah Regina P', 'P', 15, 'Swasta', 8, 10, 9, 13, 'Plegmatis', 'Plegmatis', 0.00000000265249428929, 0.00000022760079758559, 0.00000000120859377902, 0.00000478037210898487),
(35, 'Syafina M Firdaus', 'P', 13, 'Swasta', 12, 11, 10, 7, 'Sanguin', 'Sanguin', 0.00001286775683703776, 0.00000271737539142014, 0.000000453998109073, 0.00000341472632275595),
(36, 'M Yasmin', 'P', 13, 'Swasta', 6, 15, 8, 11, 'Koleris', 'Sanguin', 0.00000477487839240176, 0.00000345256579805321, 0.00000001379345345944, 0.00000297276555996681),
(37, 'Umu Latifatul Jannah', 'P', 13, 'Swasta', 14, 5, 6, 15, 'Plegmatis', 'Sanguin', 0.00000891634499148059, 0.0000003928867043127, 0.00000000008727405784, 0.00000328633715436397),
(38, 'Amara Rida Z', 'P', 15, 'Swasta', 7, 8, 12, 13, 'Plegmatis', 'Plegmatis', 0.00000000169019345699, 0.0000000965517807594, 0.00000004906362919877, 0.00000455051937594708),
(39, 'Shofiatur Rahmah', 'P', 15, 'Swasta', 5, 20, 10, 5, 'Koleris', 'Plegmatis', 0.00000000040860414476, 0.00000016086506155214, 0.00000000280398841477, 0.00000120080075763666),
(40, 'Urfi Zukhrufa', 'P', 13, 'Swasta', 12, 1, 12, 15, 'Plegmatis', 'Sanguin', 0.00000405425384194823, 0.00000006165011601977, 0.00000290213487132715, 0.00000350555336728246),
(41, 'Namira Aaiilah S', 'P', 13, 'Swasta', 8, 4, 15, 13, 'Melankolis', 'Melankolis', 0.00000239074284914197, 0.00000010884105036149, 0.00001110880843897848, 0.00000355479818589003),
(42, 'Putri Annisa Aura D', 'P', 14, 'Swasta', 9, 4, 9, 18, 'Plegmatis', 'Plegmatis', 0.00000277012613209194, 0.00000043223559450415, 0.00000005803402533701, 0.00000510211376814556),
(43, 'Aisyah Lailai Habibah Firdausi', 'P', 14, 'Swasta', 17, 4, 7, 12, 'Sanguin', 'Sanguin', 0.00000884327623183143, 0.00000042344693287053, 0.00000000047439525475, 0.00000204549745616763),
(44, 'Deffanie Aulia R', 'P', 15, 'Swasta', 10, 10, 14, 6, 'Melankolis', 'Plegmatis', 0.00000000169194814762, 0.00000009474731932829, 0.00000013047987771586, 0.00000311985670883279),
(45, 'Khanita Najla Nazhifa', 'P', 13, 'Swasta', 9, 11, 7, 13, 'Plegmatis', 'Sanguin', 0.00000900350834903195, 0.00000264276405718611, 0.00000000189912465097, 0.0000043766784521393),
(46, 'Rosy Fatati qonita', 'P', 15, 'Swasta', 9, 4, 10, 17, 'Plegmatis', 'Plegmatis', 0.00000000135452729768, 0.00000002802677014763, 0.00000000419664807742, 0.00000495870312110264),
(47, 'Bilqis Belvana Enesia', 'P', 15, 'Swasta', 7, 11, 10, 12, 'Plegmatis', 'Plegmatis', 0.00000000224327579715, 0.00000025017354929394, 0.00000000561515679628, 0.00000434696481892764),
(48, 'Rr. Mahira Muntaz', 'P', 13, 'Swasta', 14, 6, 11, 9, 'Sanguin', 'Sanguin', 0.00001310732100782738, 0.00000068589192303598, 0.00000122136351352073, 0.00000321490744538587),
(49, 'Nabila Salsabila', 'P', 13, 'Swasta', 7, 6, 15, 12, 'Melankolis', 'Melankolis', 0.00000259473371270862, 0.00000022556712616743, 0.00001157430745267052, 0.00000353270131183181),
(50, 'Syahidatul Izzah A', 'P', 13, 'Swasta', 17, 11, 6, 6, 'Sanguin', 'Sanguin', 0.0000130106017920741, 0.00000155818851527673, 0.00000000005063292236, 0.00000146206916924312),
(51, 'M. Syarifuddin N. R', 'L', 13, 'Negeri', 9, 9, 10, 12, 'Plegmatis', 'Sanguin', 0.00000981785920466715, 0.00000459160161501065, 0.00000042937682842684, 0.00000427757626307502),
(52, 'S. Agung Setiawan', 'L', 13, 'Negeri', 8, 6, 11, 15, 'Plegmatis', 'Sanguin', 0.00000535799334838433, 0.00000146237824243475, 0.00000125496310549387, 0.0000044058737720936),
(53, 'Bagas Septian P', 'L', 13, 'Negeri', 10, 10, 14, 6, 'Melankolis', 'Melankolis', 0.00000532499524292961, 0.00000231244975541686, 0.00000925735183500084, 0.00000274153905548139),
(54, 'M. Ramadhan', 'L', 13, 'Negeri', 12, 4, 13, 11, 'Melankolis', 'Sanguin', 0.00000694546035782134, 0.00000055891426439202, 0.00000571852317484616, 0.00000319884646862929),
(55, 'Dwi Agus Wijayanto', 'L', 13, 'Negeri', 9, 5, 10, 16, 'Plegmatis', 'Sanguin', 0.00000549034663223887, 0.00000110790764822048, 0.00000033237289618229, 0.00000448350800317785),
(56, 'Septian Priana A', 'L', 13, 'Negeri', 10, 13, 5, 12, 'Koleris', 'Sanguin', 0.00000777722466131709, 0.00000610199753335099, 0.00000000000725439066, 0.00000292450522290655),
(57, 'M. Rifan N', 'L', 14, 'Negeri', 9, 5, 6, 20, 'Plegmatis', 'Plegmatis', 0.00000176372688694114, 0.00000097978822942498, 0.00000000005443973072, 0.00000407357279158743),
(58, 'Akbar Bagus P', 'L', 13, 'Negeri', 10, 15, 6, 9, 'Koleris', 'Koleris', 0.00000776229766853936, 0.0000081953861228461, 0.00000000011511735097, 0.00000246308175055287),
(59, 'Miftachul Arista M.', 'L', 13, 'Negeri', 10, 10, 13, 7, 'Melankolis', 'Sanguin', 0.00000718645620672348, 0.00000327533428843464, 0.0000069776492904843, 0.00000309848789792896),
(60, 'Miracle Nathanael P', 'L', 14, 'Negeri', 7, 6, 8, 19, 'Plegmatis', 'Plegmatis', 0.00000201023912447594, 0.00000176963227150668, 0.0000000063042653181, 0.00000440106710139568),
(61, 'Andika Aji P', 'L', 13, 'Negeri', 10, 11, 9, 10, 'Koleris', 'Sanguin', 0.00001202697045353845, 0.0000074253372221521, 0.00000008985338588734, 0.00000374157152877401),
(62, 'M Naufal Adib H', 'L', 13, 'Negeri', 6, 11, 14, 9, 'Melankolis', 'Melankolis', 0.00000328874793036376, 0.00000251441655390525, 0.00000872126783117315, 0.00000272903860492025),
(63, 'Kevin Alifiano Bassam', 'L', 13, 'Negeri', 13, 9, 8, 10, 'Sanguin', 'Sanguin', 0.00001610946557658753, 0.00000479931927518624, 0.00000001073296678531, 0.00000324485218968637),
(64, 'M Ilham Nur Rahmi', 'L', 13, 'Negeri', 15, 5, 9, 11, 'Sanguin', 'Sanguin', 0.00001418435276687215, 0.00000127153574231911, 0.00000004608953147826, 0.00000263169865198003),
(65, 'Ach.Fahrudin N', 'L', 13, 'Negeri', 15, 9, 10, 6, 'Sanguin', 'Sanguin', 0.00001437562749319239, 0.00000363147185386801, 0.00000021773001659518, 0.00000218854002654495),
(66, 'Nifa Lazwardy S', 'L', 13, 'Negeri', 15, 12, 5, 8, 'Sanguin', 'Sanguin', 0.00001211017342852499, 0.00000465756154698125, 0.00000000000408597383, 0.00000176619460985555),
(67, 'Rido Dimas Permadi', 'L', 14, 'Negeri', 12, 14, 10, 4, 'Koleris', 'Koleris', 0.00000590281202339799, 0.00001155021471449248, 0.00000022981910919666, 0.00000221696817426675),
(68, 'M. Daffa Amrullah', 'L', 14, 'Negeri', 5, 14, 10, 11, 'Koleris', 'Koleris', 0.00000307427493743896, 0.00001120803774947354, 0.0000002479242404126, 0.00000276720509136791),
(69, 'Moch.Rico Zaenoni', 'L', 14, 'Negeri', 15, 12, 6, 7, 'Sanguin', 'Sanguin', 0.0000097555090935445, 0.00000867980632222909, 0.00000000005255725381, 0.00000188901427996095),
(70, 'Amsal A Setyono', 'L', 14, 'Negeri', 14, 5, 8, 13, 'Sanguin', 'Sanguin', 0.00000914820643140081, 0.00000204104673213877, 0.00000000649273467681, 0.0000032104280145512),
(71, 'Khoirul Anam', 'L', 15, 'Negeri', 6, 12, 6, 16, 'Plegmatis', 'Plegmatis', 0.00000000111757626246, 0.0000004400867519694, 0.000000000000984344, 0.0000032362849663017),
(72, 'Muhammad Adam F', 'L', 13, 'Negeri', 14, 8, 8, 10, 'Sanguin', 'Sanguin', 0.00001667328116086912, 0.00000356119941123575, 0.00000000913890712115, 0.00000294432365115427),
(73, 'Yudistira Dimas S', 'L', 13, 'Negeri', 10, 10, 8, 12, 'Plegmatis', 'Sanguin', 0.00001162394969491424, 0.00000604423495391103, 0.00000001353538633802, 0.00000402947149893619),
(74, 'Muhammad S', 'L', 14, 'Negeri', 12, 9, 5, 14, 'Plegmatis', 'Sanguin', 0.00000689405003514721, 0.00000478827919731556, 0.00000000000490831554, 0.00000339069263461159),
(75, 'M. Abdullah Ilham A', 'L', 14, 'Negeri', 13, 6, 9, 12, 'Sanguin', 'Sanguin', 0.00001000426302173338, 0.00000320508721271908, 0.00000005230179270182, 0.00000365811847159751),
(76, 'Yati Nur Azizah', 'P', 13, 'Negeri', 13, 7, 8, 12, 'Sanguin', 'Sanguin', 0.00001221133963616466, 0.00000153020257343227, 0.00000002051147950154, 0.00000349322622965029),
(77, 'Berlian Sabilillah R', 'P', 13, 'Negeri', 14, 7, 10, 9, 'Sanguin', 'Sanguin', 0.00001295226970517003, 0.00000141378561419048, 0.00000055930653215675, 0.00000291234228734747),
(78, 'Safira Putri Frandika', 'P', 14, 'Negeri', 11, 14, 7, 8, 'Koleris', 'Koleris', 0.00000642344904035182, 0.00000792035200459786, 0.00000000215948450062, 0.0000027215744839086),
(79, 'Fasta Itfina', 'P', 14, 'Negeri', 12, 7, 13, 8, 'Melankolis', 'Melankolis', 0.00000546670191127145, 0.00000141213547051604, 0.00000978298752993984, 0.00000317033973153429),
(80, 'Putri Sofiyana N', 'P', 14, 'Negeri', 5, 12, 15, 8, 'Melankolis', 'Melankolis', 0.00000120286660141047, 0.00000157885487029878, 0.00001212676836205676, 0.00000216125214096587),
(81, 'Arni Nur Unaifah', 'P', 13, 'Negeri', 14, 18, 5, 3, 'Koleris', 'Sanguin', 0.00000309056711694241, 0.00000209705039557411, 0.00000000000608561413, 0.0000009055391946691),
(82, 'Kharisma Yogi C', 'P', 13, 'Negeri', 7, 15, 10, 8, 'Koleris', 'Koleris', 0.00000456780938360678, 0.00000463881871138368, 0.00000072530044218334, 0.00000256639803172692),
(83, 'Nandy Lava B. Utomo', 'P', 13, 'Negeri', 12, 2, 16, 10, 'Melankolis', 'Melankolis', 0.00000203751132071083, 0.00000004286129253306, 0.00001087648520740597, 0.00000212867575696179),
(84, 'Emilia Nur Rohmah', 'P', 13, 'Negeri', 10, 4, 14, 12, 'Melankolis', 'Melankolis', 0.00000371533049798481, 0.00000022858083774489, 0.00001777217766785427, 0.00000336757186597536),
(85, 'Racgmalia Nur Fitri', 'P', 14, 'Negeri', 9, 6, 7, 18, 'Plegmatis', 'Plegmatis', 0.00000269787128609431, 0.00000113134377176674, 0.00000000167284596461, 0.00000447304324179295),
(86, 'Zillanatus V Aaliyah', 'P', 13, 'Negeri', 4, 11, 11, 14, 'Plegmatis', 'Plegmatis', 0.00000261439799303911, 0.00000210892498759517, 0.00000181908114112115, 0.0000030070908757714),
(87, 'Rahma Nilam Cahya', 'P', 13, 'Negeri', 8, 9, 14, 9, 'Melankolis', 'Melankolis', 0.00000403064993871056, 0.0000010894121285354, 0.00002012800539695039, 0.00000321141997776157),
(88, 'Denok Handayani', 'P', 13, 'Negeri', 6, 8, 16, 10, 'Melankolis', 'Melankolis', 0.00000156706489504709, 0.00000034287184045075, 0.00001313821826658687, 0.00000249178031500411),
(89, 'Tiara Fauzul Islam', 'P', 13, 'Negeri', 7, 12, 13, 8, 'Melankolis', 'Melankolis', 0.00000391043448276314, 0.000002277817986704, 0.0000133565448089861, 0.00000286046760410855),
(90, 'Cici Farida A. P', 'P', 13, 'Negeri', 4, 4, 17, 15, 'Plegmatis', 'Melankolis', 0.0000003991085339037, 0.00000003752219795211, 0.00000425391895467155, 0.00000188446872076815),
(91, 'Adhelia Putri P', 'P', 13, 'Negeri', 12, 5, 6, 17, 'Plegmatis', 'Sanguin', 0.00000505180370500137, 0.00000048600659813955, 0.00000000015688832796, 0.00000357696577238957),
(92, 'Arinta Agustine', 'P', 14, 'Negeri', 13, 11, 10, 6, 'Sanguin', 'Sanguin', 0.00000807259209518993, 0.00000530776705728106, 0.00000048593332837866, 0.00000272500800699989),
(93, 'Ameliatur Zahro', 'P', 14, 'Negeri', 18, 9, 6, 7, 'Sanguin', 'Sanguin', 0.00000883927851071271, 0.00000209025855618923, 0.00000000004975787627, 0.00000121044993255027),
(94, 'Elsandra Nur Maidah', 'P', 14, 'Negeri', 17, 4, 11, 8, 'Sanguin', 'Sanguin', 0.00000702692300714264, 0.00000051437209870383, 0.00000072726626367221, 0.00000165199395672136),
(95, 'Citra Indiana Putri', 'P', 13, 'Negeri', 9, 9, 8, 14, 'Plegmatis', 'Sanguin', 0.0000075420987625498, 0.00000246397139468943, 0.00000002567028511098, 0.00000435186830180738),
(96, 'Ayu Febri Wulandari', 'P', 13, 'Negeri', 6, 5, 8, 21, 'Plegmatis', 'Plegmatis', 0.00000112332145767807, 0.00000030626485917837, 0.0000000112007823016, 0.00000381921762658425),
(97, 'Fischa Aditiyah W', 'P', 14, 'Negeri', 13, 10, 7, 10, 'Sanguin', 'Sanguin', 0.00000965515247883701, 0.00000487307546924626, 0.00000000192594058649, 0.00000314910241619933),
(98, 'Isma Marista Riyanti', 'P', 13, 'Negeri', 13, 12, 8, 7, 'Sanguin', 'Sanguin', 0.00001177005451614877, 0.0000041924175123709, 0.00000002001931718905, 0.00000257431643571841),
(99, 'Khodijah Febriyanti', 'P', 13, 'Negeri', 12, 8, 11, 9, 'Sanguin', 'Sanguin', 0.00001086509106501601, 0.00000182341268739985, 0.00000261233795130499, 0.00000348005949244108),
(100, 'Citra Tsabitan A', 'P', 13, 'Negeri', 18, 9, 8, 5, 'Sanguin', 'Sanguin', 0.00001157992020900208, 0.00000144065572508708, 0.00000000615485358484, 0.00000116291911208385),
(101, 'Siswa 2', 'L', 24, 'Negeri', 14, 10, 13, 3, 'Plegmatis', 'Plegmatis', 0, 0, 0, 0.00000007308767763645);

-- --------------------------------------------------------

--
-- Table structure for table `jawaban_kuisioner`
--

CREATE TABLE `jawaban_kuisioner` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL DEFAULT 0,
  `id_siswa` int(11) NOT NULL DEFAULT 0,
  `id_soal` int(11) NOT NULL DEFAULT 0,
  `jawaban` char(1) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jawaban_kuisioner`
--

INSERT INTO `jawaban_kuisioner` (`id`, `id_user`, `id_siswa`, `id_soal`, `jawaban`) VALUES
(1, 2, 1, 1, 'B'),
(2, 2, 1, 2, 'C'),
(3, 2, 1, 3, 'C'),
(4, 2, 1, 4, 'C'),
(5, 2, 1, 5, 'C'),
(6, 2, 1, 6, 'C'),
(7, 2, 1, 7, 'B'),
(8, 2, 1, 8, 'B'),
(9, 2, 1, 9, 'B'),
(10, 2, 1, 10, 'B'),
(11, 2, 1, 11, 'B'),
(12, 2, 1, 12, 'C'),
(13, 2, 1, 13, 'A'),
(14, 2, 1, 14, 'A'),
(15, 2, 1, 15, 'A'),
(16, 2, 1, 16, 'D'),
(17, 2, 1, 17, 'D'),
(18, 2, 1, 18, 'D'),
(19, 2, 1, 19, 'A'),
(20, 2, 1, 20, 'B'),
(21, 2, 1, 21, 'A'),
(22, 2, 1, 22, 'C'),
(23, 2, 1, 23, 'C'),
(24, 2, 1, 24, 'C'),
(25, 2, 1, 25, 'D'),
(26, 2, 1, 26, 'C'),
(27, 2, 1, 27, 'C'),
(28, 2, 1, 28, 'B'),
(29, 2, 1, 29, 'B'),
(30, 2, 1, 30, 'D'),
(31, 2, 1, 31, 'B'),
(32, 2, 1, 32, 'B'),
(33, 2, 1, 33, 'B'),
(34, 2, 1, 34, 'B'),
(35, 2, 1, 35, 'D'),
(36, 2, 1, 36, 'B'),
(37, 2, 1, 37, 'D'),
(38, 2, 1, 38, 'B'),
(39, 2, 1, 39, 'B'),
(40, 2, 1, 40, 'D'),
(41, 25, 2, 1, 'B'),
(42, 25, 2, 2, 'C'),
(43, 25, 2, 3, 'C'),
(44, 25, 2, 4, 'C'),
(45, 25, 2, 5, 'D'),
(46, 25, 2, 6, 'D'),
(47, 25, 2, 7, 'A'),
(48, 25, 2, 8, 'A'),
(49, 25, 2, 9, 'A'),
(50, 25, 2, 10, 'A'),
(51, 25, 2, 11, 'D'),
(52, 25, 2, 12, 'A'),
(53, 25, 2, 13, 'B'),
(54, 25, 2, 14, 'D'),
(55, 25, 2, 15, 'D'),
(56, 25, 2, 16, 'A'),
(57, 25, 2, 17, 'A'),
(58, 25, 2, 18, 'C'),
(59, 25, 2, 19, 'D'),
(60, 25, 2, 20, 'D'),
(61, 25, 2, 21, 'C'),
(62, 25, 2, 22, 'C'),
(63, 25, 2, 23, 'C'),
(64, 25, 2, 24, 'A'),
(65, 25, 2, 25, 'D'),
(66, 25, 2, 26, 'A'),
(67, 25, 2, 27, 'D'),
(68, 25, 2, 28, 'D'),
(69, 25, 2, 29, 'D'),
(70, 25, 2, 30, 'B'),
(71, 25, 2, 31, 'B'),
(72, 25, 2, 32, 'B'),
(73, 25, 2, 33, 'D'),
(74, 25, 2, 34, 'C'),
(75, 25, 2, 35, 'A'),
(76, 25, 2, 36, 'C'),
(77, 25, 2, 37, 'D'),
(78, 25, 2, 38, 'A'),
(79, 25, 2, 39, 'A'),
(80, 25, 2, 40, 'A'),
(81, 26, 3, 1, 'B'),
(82, 26, 3, 2, 'C'),
(83, 26, 3, 3, 'C'),
(84, 26, 3, 4, 'C'),
(85, 26, 3, 5, 'C'),
(86, 26, 3, 6, 'C'),
(87, 26, 3, 7, 'C'),
(88, 26, 3, 8, 'A'),
(89, 26, 3, 9, 'B'),
(90, 26, 3, 10, 'C'),
(91, 26, 3, 11, 'A'),
(92, 26, 3, 12, 'B'),
(93, 26, 3, 13, 'D'),
(94, 26, 3, 14, 'C'),
(95, 26, 3, 15, 'C'),
(96, 26, 3, 16, 'B'),
(97, 26, 3, 17, 'B'),
(98, 26, 3, 18, 'B'),
(99, 26, 3, 19, 'A'),
(100, 26, 3, 20, 'C'),
(101, 26, 3, 21, 'A'),
(102, 26, 3, 22, 'C'),
(103, 26, 3, 23, 'C'),
(104, 26, 3, 24, 'D'),
(105, 26, 3, 25, 'B'),
(106, 26, 3, 26, 'B'),
(107, 26, 3, 27, 'C'),
(108, 26, 3, 28, 'A'),
(109, 26, 3, 29, 'A'),
(110, 26, 3, 30, 'A'),
(111, 26, 3, 31, 'A'),
(112, 26, 3, 32, 'B'),
(113, 26, 3, 33, 'D'),
(114, 26, 3, 34, 'A'),
(115, 26, 3, 35, 'A'),
(116, 26, 3, 36, 'A'),
(117, 26, 3, 37, 'A'),
(118, 26, 3, 38, 'A'),
(119, 26, 3, 39, 'A'),
(120, 26, 3, 40, 'B');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
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
(25, 'Siswa 1', 'user', '$2y$10$6nJWEdQF/leNKnLyUR.7S.nKgS5jok2DGLu07CkuOkw.zNP5cOSFC', '2'),
(26, 'Siswa 2', 'siswa2', '$2y$10$iK3EUPLP9vNX78tQ.JfhF.c8Z5c6Ac4YF8E8d4Omzm4lZ9OxzkzKO', '2'),
(45, 'Muhammad Sabri', 'sabri', '$2y$10$YNkNWhehT.fMPtbfUtJgBuvrZVyJVr19HqFbYCS4pZbX5Jb26C5q.', '2');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `data_latih`
--
ALTER TABLE `data_latih`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `data_siswa`
--
ALTER TABLE `data_siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `data_soal`
--
ALTER TABLE `data_soal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `data_uji`
--
ALTER TABLE `data_uji`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `jawaban_kuisioner`
--
ALTER TABLE `jawaban_kuisioner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
