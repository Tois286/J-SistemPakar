-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2024 at 08:25 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spkburung`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `nama_lengkap` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`, `nama_lengkap`) VALUES
('admin', 'admin', 'Administrator1');

-- --------------------------------------------------------

--
-- Table structure for table `basis_pengetahuan`
--

CREATE TABLE `basis_pengetahuan` (
  `kode_pengetahuan` int(11) NOT NULL,
  `kode_penyakit` int(11) NOT NULL,
  `kode_gejala` int(11) NOT NULL,
  `mb` double(11,1) NOT NULL,
  `md` double(11,1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `basis_pengetahuan`
--

INSERT INTO `basis_pengetahuan` (`kode_pengetahuan`, `kode_penyakit`, `kode_gejala`, `mb`, `md`) VALUES
(2, 1, 1, 0.8, 0.0),
(3, 1, 2, 0.8, 0.2),
(4, 1, 21, 0.8, 0.2),
(5, 2, 7, 0.6, 0.2),
(6, 2, 6, 8.0, 0.0),
(7, 2, 9, 0.8, 0.2),
(8, 2, 8, 0.8, 0.2),
(9, 3, 13, 0.6, 0.2),
(10, 3, 14, 0.6, 0.2),
(11, 3, 10, 0.8, 0.2),
(12, 3, 11, 1.0, 0.0),
(13, 4, 15, 0.1, 0.0),
(14, 4, 6, 0.8, 0.2),
(15, 4, 16, 0.6, 0.2),
(16, 4, 17, 0.6, 0.2),
(17, 4, 18, 0.8, 0.2),
(107, 8, 33, 0.8, 0.2),
(19, 5, 19, 1.0, 0.2),
(20, 5, 20, 0.8, 0.2),
(21, 5, 21, 0.8, 0.2),
(22, 5, 9, 0.8, 0.2),
(23, 6, 22, 0.8, 0.2),
(24, 6, 23, 0.6, 0.2),
(25, 6, 24, 0.8, 0.2),
(26, 6, 5, 0.8, 0.2),
(27, 6, 25, 0.6, 0.2),
(28, 7, 26, 1.0, 0.0),
(29, 7, 27, 0.8, 0.2),
(30, 7, 28, 0.8, 0.2),
(31, 7, 29, 0.8, 0.2),
(32, 8, 30, 0.8, 0.2),
(33, 8, 31, 1.0, 0.0),
(34, 8, 32, 0.8, 0.2),
(35, 9, 34, 0.8, 0.2),
(36, 9, 35, 0.6, 0.2),
(56, 13, 34, 0.6, 0.2),
(37, 9, 36, 0.8, 0.0),
(38, 9, 37, 0.8, 0.2),
(39, 10, 38, 1.0, 0.0),
(40, 10, 39, 0.8, 0.2),
(41, 10, 5, 0.8, 0.2),
(42, 10, 40, 0.6, 0.2),
(43, 11, 2, 0.8, 0.2),
(44, 11, 36, 1.0, 0.2),
(45, 11, 37, 1.0, 0.0),
(46, 11, 42, 1.0, 0.0),
(47, 12, 1, 0.4, 0.2),
(48, 12, 17, 0.8, 0.2),
(49, 12, 35, 0.8, 0.0),
(50, 12, 43, 1.0, 0.0),
(51, 13, 7, 0.8, 0.2),
(52, 13, 8, 1.0, 0.0),
(53, 13, 26, 0.8, 0.2),
(54, 13, 27, 0.8, 0.2),
(55, 13, 33, 0.4, 0.2),
(103, 1, 4, 0.8, 0.2),
(104, 1, 5, 0.8, 0.2),
(105, 2, 5, 0.8, 0.2),
(106, 3, 12, 0.8, 0.2),
(108, 9, 5, 0.8, 0.2),
(109, 10, 41, 0.6, 0.2);

-- --------------------------------------------------------

--
-- Table structure for table `gejala`
--

CREATE TABLE `gejala` (
  `kode_gejala` int(11) NOT NULL,
  `nama_gejala` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `gejala`
--

INSERT INTO `gejala` (`kode_gejala`, `nama_gejala`) VALUES
(1, 'Kotoran berwarna putih.'),
(2, 'Kesulitan membuang kotoran.'),
(3, 'Bulu mengembung.'),
(4, 'Burung tidak aktif.'),
(5, 'Napsu makan menurun'),
(6, 'Kotoran berbentuk cair '),
(7, 'Kotoran berwarna kekuningan atau keruh'),
(8, 'Kotoran mengeluarkan bau yang tidak sedap'),
(9, 'Burung tidak berkicau'),
(10, 'Penglihatan burung terganggu'),
(11, 'Terdapat bitnik putih pada bagian Tengah mata.'),
(12, 'Prilaku burung berubah.'),
(13, 'sering menggaruk-garuk mata pada tangkringan.'),
(14, 'mata sering menutup.'),
(15, 'Burung terlihat kurus walau nafsu makan stabil.'),
(16, 'Burung sering mengantuk pada siang hari.'),
(17, 'terlihat lesu sambil mengembangkan bulu'),
(18, 'jika kondisi cacingan sudah parah, mengalami keron'),
(19, 'Terdapat kutu disekitar bulu.'),
(20, 'mengigit-gigit bulu hingga menyebabkan bulu rusak'),
(21, 'mengalami bulu tidak rapih.'),
(22, 'Sulit bernafas'),
(23, 'Burung mengalami bersin-bersin.'),
(24, 'Hidung Berlendir bercampur darah.'),
(25, 'Burung mendengkur pada malam hari.'),
(26, 'kuku tumbuh terus memanjang.'),
(27, 'kulit pada telapak kaki menebal'),
(28, 'sisik pada kaki melebar'),
(29, 'kulit pada kaki menumpuk tebal'),
(30, 'sayap turun lemas. '),
(31, 'kepala berputar melipat.'),
(32, 'badan gemetar'),
(33, 'burung mengalami kehilangan keseimbangan.'),
(34, 'burung sakit tenggorokan dan susah  menelan Extra '),
(35, 'Suara burung terdengar parau.'),
(36, 'Suara burung mengecil dan akhiran suaranya hilang '),
(37, 'Nafas burung terdengar ngorok.'),
(38, 'Mata mengalami bengkak.'),
(39, 'Hidung Berlendir.'),
(40, 'burung bersin-bersin.'),
(41, 'Mendengkur pada malam hari.');

-- --------------------------------------------------------

--
-- Table structure for table `hasil`
--

CREATE TABLE `hasil` (
  `id_hasil` int(11) NOT NULL,
  `tanggal` varchar(50) NOT NULL DEFAULT '0',
  `penyakit` text NOT NULL,
  `gejala` text NOT NULL,
  `hasil_id` int(11) NOT NULL,
  `hasil_nilai` varchar(16) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `hasil`
--

INSERT INTO `hasil` (`id_hasil`, `tanggal`, `penyakit`, `gejala`, `hasil_id`, `hasil_nilai`) VALUES
(1, '2024-05-30 02:35:33', 'a:3:{i:1;s:6:\"0.8000\";i:3;s:6:\"0.4800\";i:9;s:6:\"0.2273\";}', 'a:8:{i:1;s:1:\"1\";i:3;s:1:\"7\";i:7;s:1:\"5\";i:10;s:1:\"2\";i:16;s:1:\"5\";i:24;s:1:\"6\";i:35;s:1:\"2\";i:37;s:1:\"5\";}', 1, '0.8000'),
(2, '2024-05-30 05:18:10', 'a:5:{i:2;s:6:\"6.4000\";i:4;s:6:\"0.6672\";i:3;s:6:\"0.2400\";i:6;s:6:\"0.1600\";i:1;s:6:\"0.0588\";}', 'a:6:{i:1;s:1:\"6\";i:4;s:1:\"3\";i:6;s:1:\"2\";i:10;s:1:\"4\";i:18;s:1:\"3\";i:25;s:1:\"4\";}', 2, '6.4000'),
(3, '2024-05-30 09:59:28', 'a:1:{i:1;s:6:\"0.6996\";}', 'a:8:{i:1;s:1:\"3\";i:2;s:1:\"4\";i:3;s:1:\"2\";i:4;s:1:\"4\";i:7;s:1:\"9\";i:10;s:1:\"6\";i:16;s:1:\"7\";i:22;s:1:\"5\";}', 1, '0.6996'),
(4, '2024-05-30 10:00:41', 'a:4:{i:1;s:6:\"0.6000\";i:4;s:6:\"0.4000\";i:5;s:6:\"0.3200\";i:10;s:6:\"0.2400\";}', 'a:7:{i:4;s:1:\"1\";i:17;s:1:\"1\";i:19;s:1:\"4\";i:24;s:1:\"7\";i:29;s:1:\"5\";i:34;s:1:\"6\";i:40;s:1:\"3\";}', 1, '0.6000'),
(5, '2024-05-30 10:01:45', 'a:2:{i:6;s:6:\"0.6000\";i:4;s:6:\"0.5920\";}', 'a:5:{i:16;s:1:\"2\";i:17;s:1:\"1\";i:19;s:1:\"8\";i:22;s:1:\"1\";i:28;s:1:\"7\";}', 6, '0.6000'),
(6, '2024-05-30 11:10:54', 'a:7:{i:2;s:6:\"2.5565\";i:3;s:6:\"0.8995\";i:8;s:6:\"0.8487\";i:10;s:6:\"0.7381\";i:4;s:6:\"0.7359\";i:9;s:6:\"0.5345\";i:5;s:6:\"0.0545\";}', 'a:41:{i:1;s:1:\"8\";i:2;s:1:\"9\";i:3;s:1:\"6\";i:4;s:1:\"4\";i:5;s:1:\"3\";i:6;s:1:\"3\";i:7;s:1:\"3\";i:8;s:1:\"6\";i:9;s:1:\"3\";i:10;s:1:\"4\";i:11;s:1:\"3\";i:12;s:1:\"3\";i:13;s:1:\"3\";i:14;s:1:\"2\";i:15;s:1:\"3\";i:16;s:1:\"3\";i:17;s:1:\"3\";i:18;s:1:\"4\";i:19;s:1:\"3\";i:20;s:1:\"9\";i:21;s:1:\"5\";i:22;s:1:\"9\";i:23;s:1:\"9\";i:24;s:1:\"9\";i:25;s:1:\"6\";i:26;s:1:\"9\";i:27;s:1:\"4\";i:28;s:1:\"2\";i:29;s:1:\"3\";i:30;s:1:\"2\";i:31;s:1:\"3\";i:32;s:1:\"5\";i:33;s:1:\"3\";i:34;s:1:\"3\";i:35;s:1:\"4\";i:36;s:1:\"5\";i:37;s:1:\"5\";i:38;s:1:\"3\";i:39;s:1:\"3\";i:40;s:1:\"5\";i:41;s:1:\"8\";}', 2, '2.5565'),
(7, '2024-05-30 11:25:55', 'a:4:{i:5;s:6:\"0.6400\";i:3;s:6:\"0.4000\";i:4;s:6:\"0.3744\";i:6;s:6:\"0.2400\";}', 'a:6:{i:14;s:1:\"1\";i:15;s:1:\"2\";i:16;s:1:\"2\";i:19;s:1:\"2\";i:22;s:1:\"4\";i:26;s:1:\"6\";}', 5, '0.6400'),
(8, '2024-05-31 00:35:22', 'a:3:{i:1;s:6:\"0.4091\";i:4;s:6:\"0.3880\";i:5;s:6:\"0.3600\";}', 'a:6:{i:1;s:1:\"3\";i:5;s:1:\"5\";i:8;s:1:\"5\";i:15;s:1:\"1\";i:17;s:1:\"2\";i:20;s:1:\"3\";}', 1, '0.4091'),
(9, '2024-05-31 11:29:54', 'a:5:{i:1;s:6:\"0.7264\";i:2;s:6:\"0.2400\";i:6;s:6:\"0.2400\";i:9;s:6:\"0.2400\";i:10;s:6:\"0.2400\";}', 'a:3:{i:1;s:1:\"2\";i:3;s:1:\"6\";i:5;s:1:\"4\";}', 1, '0.7264'),
(10, '2024-05-31 15:41:41', 'a:1:{i:5;s:6:\"0.2400\";}', 'a:4:{i:1;s:1:\"3\";i:4;s:1:\"7\";i:5;s:1:\"6\";i:9;s:1:\"4\";}', 5, '0.2400'),
(11, '2024-06-03 20:36:21', 'a:3:{i:1;s:6:\"0.3200\";i:3;s:6:\"0.2381\";i:4;s:6:\"0.0600\";}', 'a:6:{i:1;s:1:\"4\";i:3;s:1:\"4\";i:7;s:1:\"6\";i:10;s:1:\"3\";i:14;s:1:\"6\";i:15;s:1:\"3\";}', 1, '0.3200');

-- --------------------------------------------------------

--
-- Table structure for table `kondisi`
--

CREATE TABLE `kondisi` (
  `id` int(11) NOT NULL,
  `kondisi` varchar(64) NOT NULL,
  `ket` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `kondisi`
--

INSERT INTO `kondisi` (`id`, `kondisi`, `ket`) VALUES
(1, 'Pasti ya', ''),
(2, 'Hampir pasti ya', ''),
(3, 'Kemungkinan besar ya', ''),
(4, 'Mungkin ya', ''),
(5, 'Tidak tahu', ''),
(6, 'Mungkin tidak', ''),
(7, 'Kemungkinan besar tidak', ''),
(8, 'Hampir pasti tidak', ''),
(9, 'Pasti tidak', '');

-- --------------------------------------------------------

--
-- Table structure for table `penyakit`
--

CREATE TABLE `penyakit` (
  `kode_penyakit` int(11) NOT NULL,
  `nama_penyakit` varchar(50) NOT NULL,
  `det_penyakit` varchar(500) NOT NULL,
  `srn_penyakit` varchar(500) NOT NULL,
  `gambar` varchar(500) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `penyakit`
--

INSERT INTO `penyakit` (`kode_penyakit`, `nama_penyakit`, `det_penyakit`, `srn_penyakit`, `gambar`) VALUES
(1, 'berak kapur', '', '1.	Pisahkan burung yang terjangkit penyakit dengan burung kontes lainnya.\r\n2.	Berikan obat khusus penyakit Berak kapur yang mengandung amoxicillin trihydrate.\r\n3.	Pemberikan obat Super-N diberikan selama 5 hari berturut-turut pagi, siang dan sore sebanyak 3-4 tetes untuk burung besar.\r\n4.	membersihkan selalu sangkar pagi dan sore hari teratur termasuk tempat makan dan minum.\r\n5.	Pemberian pakan yang sesuai dan air minum yang bersih.', 'berak kapur (2).jpg'),
(2, 'Mencret', '', '1.	Pisahkan burung yang terjangkit penyakit dengan burung kontes lainnya.\r\n2.	Berikan obat khusus penyakit mencret yang mengandung metronidazole.\r\n3.	Pemberikan obat Super-N diberikan selama 5 hari berturut-turut pagi, siang dan sore sebanyak 3-4 tetes untuk burung besar.\r\n4.	membersihkan selalu sangkar pagi dan sore hari teratur termasuk tempat makan dan minum.\r\n5.	Pemberian pakan yang sesuai dan air minum yang bersih.\r\n', 'mencret.jpg'),
(3, 'Katarak', '', '1.	Pisahkan burung yang terjangkit penyakit dengan burung kontes lainnya.\r\n2.	Berikan Obat khusus penyakit katarak yang mengandung ekstrak kitolot.\r\n3.	jangan melakukan penjemuran terlalu lama, usahakan 30 menit matahari pagi agar tidak terlalu panas.\r\n4.	menghindari burung dari tempat yang langsung memantulkan Cahaya matahati masuk kedalam kerodong.\r\n5.	tetap memberikan makan extra fooding sesuai.\r\n', 'katarak.jpg'),
(4, 'Cacingan', '', '1.	Pisahkan burung yang terjangkit penyakit dengan burung kontes lainnya.\r\n2.	Berikan obat khusus penyakit  cacingan yang mengandung zat aktif piperrazin citrate\r\n3.	membersihkan selalu sangkar pagi dan sore hari teratur termasuk tempat makan dan minum.\r\n4.	Pemberian pakan yang sesuai dan air minum yang bersih.\r\n', 'cacingan.jpg'),
(5, 'Kutu', '', '1.	Pisahkan burung yang terjangkit penyakit dengan burung kontes lainnya.\r\n2.	mandikan burung dengan menggunakan cara alami seperti dengan menggunakan rebusan daun siri atau menggunakan jati jajar yang dicampurkan dengan air untuk disemprotkan ke badan burung.\r\n3.	membersihkan selalu sangkar pagi dan sore hari teratur termasuk tempat makan dan minum.\r\n4.	Pemberian pakan yang sesuai dan air minum yang bersih.\r\n', 'kutu.jpg'),
(6, 'ILT (Infectious Laryngo Tracheiti)', '', '1.	Pisahkan burung yang terjangkit penyakit dengan burung kontes lainnya.\r\n2.	Berikan obat khusus  Penyakit ILT (Infectious Laryngo Tracheitis) yang mengandung amantadine dan rimantadine.  \r\n3.	membersihkan selalu sangkar pagi dan sore hari teratur termasuk tempat makan dan minum.\r\n4.	Pemberian pakan yang sesuai dan air minum yang bersih.\r\n', 'ilt.jpg'),
(7, 'Bubulen', '', '1.	Pisahkan burung yang terjangkit penyakit dengan burung kontes lainnya.\r\n2.	Berikan obat khusus  Penyakit bubulen salicylic acid, benzoid acid dan sulphur praecipitatum.\r\n3.	membersihkan selalu sangkar pagi dan sore hari teratur termasuk tempat makan dan minum.\r\n4.	Pemberian pakan yang sesuai dan air minum bersih\r\n', 'bubulen.jpg'),
(8, 'Tetelo', '', '1.	Pisahkan burung yang terjangkit penyakit dengan burung kontes lainnya.\r\n2.	Berikan obat khusus  Penyakit tetelo menggunakan Pemberikan obat Neuro  plus sesuai aturan pakai.\r\n3.	membersihkan selalu sangkar pagi dan sore hari teratur termasuk tempat makan dan minum.\r\n4.	Pemberian pakan yang sesuai dan air minum yang bersih.\r\n', 'tetelo.jpg'),
(9, 'Serak', '', '1.	Pisahkan burung yang terjangkit penyakit dengan burung kontes lainnya.\r\n2.	Berikan obat khusus serak menggunakan Pemberikan obat Super-N diberikan selama 5 hari\r\n3.	berturut-turut pagi, siang dan sore sebanyak 3-4 tetes untuk burung besar.\r\n4.	membersihkan selalu sangkar pagi dan sore hari teratur termasuk tempat makan dan minum.\r\n5.	Pemberian pakan yang sesuai dan air minum yang bersih\r\n', 'serak.jpg'),
(10, 'Snot', '', '1.	Pisahkan burung yang terjangkit penyakit dengan burung kontes lainnya.\r\n2.	Berikan obat khusus penyakit snot yang didalamnya mengandung antibiotic seperti sulfadiazine dan trimethophim.\r\n3.	membersihkan selalu sangkar pagi dan sore hari teratur termasuk tempat makan dan minum.\r\n4.	Pemberian pakan yang sesuai dan air minum yang bersih.\r\n', 'snot.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `kode_post` int(11) NOT NULL,
  `nama_post` varchar(50) NOT NULL,
  `det_post` varchar(15000) NOT NULL,
  `srn_post` varchar(15000) NOT NULL,
  `gambar` varchar(500) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`kode_post`, `nama_post`, `det_post`, `srn_post`, `gambar`) VALUES
(27, 'Berak  kapur', '<p>Berak kapur adalah penyakit burung kontes yang menyerang bagian pencernaan. Penyakit ini&nbsp;disebabkan oleh bakteri yang Bernama salmonella<em> pullorum. </em>Di picu pergantian musim yang pancaroba.</p>\r\n', '<p>1.Pisahkan burung yang terjangkit penyakit dengan burung kontes lainnya.</p>\r\n\r\n<p>2. Berikan obat khusus penyakit Berak kapur yang mengandung amoxicillin trihydrate.</p>\r\n\r\n<p>3. Pemberikan obat Super-N diberikan selama 5 hari berturut-turut pagi, siang dan sore sebanyak 3-4 tetes untuk burung besar.</p>\r\n\r\n<p>4. membersihkan selalu sangkar pagi dan sore hari teratur termasuk tempat makan dan minum.</p>\r\n\r\n<p>5. Pemberian pakan yang sesuai dan air minum yang bersih.</p>\r\n', 'berak kapur (2).jpg'),
(28, 'Mencret atau diare', '<p>Penyakit mencert adalah penyakit burung yang menyerang pada bagian pencernaan . Penyakit ini&nbsp; disebabkan oleh bakteri yang Bernama <em>salmonella pullorum</em>.</p>\r\n', '<p>1.Pisahkan burung yang terjangkit penyakit dengan burung kontes lainnya.</p>\r\n\r\n<p>2. Berikan obat khusus penyakit mencret yang mengandung metronidazole.</p>\r\n\r\n<p>3. Pemberikan obat Super-N diberikan selama 5 hari</p>\r\n\r\n<p>berturut-turut pagi, siang dan sore sebanyak 3-4 tetes untuk burung besar.</p>\r\n\r\n<p>4. membersihkan selalu sangkar pagi dan sore hari teratur termasuk tempat makan dan minum.</p>\r\n\r\n<p>5. Pemberian pakan yang sesuai dan air minum yang bersih.</p>\r\n', 'mencret.jpg'),
(29, 'Katarak', '<p>Penyakit katarak adalah penyakit yang menyerang bagian mata yang berfungsi untuk penglihatan. Penyakit ini biasanya disebabkan kerena sering terkena sinar <em>ultra violet</em> berlebih pada saat penjemuran yang telalu panas.</p>\r\n', '<p>1.Pisahkan burung yang terjangkit penyakit dengan burung kontes lainnya.</p>\r\n\r\n<p>2.Berikan Obat khusus penyakit katarak yang mengandung ekstrak kitolot.</p>\r\n\r\n<p>3. jangan melakukan penjemuran terlalu lama, usahakan 30 menit matahari pagi agar tidak terlalu panas.</p>\r\n\r\n<p>4. menghindari burung dari tempat yang langsung memantulkan Cahaya matahati masuk kedalam kerodong.</p>\r\n\r\n<p>5. tetap memberikan makan extra fooding sesuai.</p>\r\n', 'katarak.jpg'),
(30, 'Cacingan', '<p>Penyakit cacingan adalah penyakit yang menyerang pada bagian pencernaan yang disebabkan oleh cacing gelang/ <em>ascaridia sp</em>, jenis cacing yang menyerang organ pencernaan burung kacer, khususnya usus kacer. Ketika sudah menginfeksi, cacing ini akan hidup bergerombol di usus kacer dan menyumbat pencernaannya.</p>\r\n', '<p>1.Pisahkan burung yang terjangkit penyakit dengan burung kontes lainnya.</p>\r\n\r\n<p>2. Berikan obat khusus penyakit&nbsp; cacingan yang mengandung zat aktif piperrazin citrate.</p>\r\n\r\n<p>3. membersihkan selalu sangkar pagi dan sore hari teratur termasuk tempat makan dan minum.</p>\r\n\r\n<p>4. Pemberian pakan yang sesuai dan air minum yang bersih.</p>\r\n', 'cacingan.jpg'),
(31, 'Kutu ', '<p>Penyakit kutu adalah&nbsp;penyakit yang sering menyerang bagian bulu-bulu pada permukaan burung. Yang menyebabkan burung mematuk bulunya sendiri. Penyakit kutu ini disebabkan oleh kutu yang bernama <em>menopane galinarum</em>.</p>\r\n', '<p>1.Pisahkan burung yang terjangkit penyakit dengan burung kontes lainnya.</p>\r\n\r\n<p>2. mandikan burung dengan menggunakan cara alami seperti dengan menggunakan rebusan daun siri atau menggunakan jati jajar yang dicampurkan dengan air untuk disemprotkan ke badan burung.</p>\r\n\r\n<p>3.membersihkan selalu sangkar pagi dan sore hari teratur termasuk tempat makan dan minum.</p>\r\n\r\n<p>4. Pemberian pakan yang sesuai dan air minum yang bersih.</p>\r\n', 'kutu.jpg'),
(32, 'Penyakit ILT (Infectious Laryngo Tracheitis)', '<p>Penyakit ILT (<em>Infectious Laryngo Tracheitis</em>) adalah penyakit burung yang menyerang bagian pernafasan. Penyakit ini disebakan oleh <em>virus</em> golongan <em>herpes</em>.</p>\r\n', '<p>1.Pisahkan burung yang terjangkit penyakit dengan burung kontes lainnya.</p>\r\n\r\n<p>2. Berikan obat khusus&nbsp; Penyakit ILT (<em>Infectious Laryngo Tracheitis</em>) yang mengandung amantadine dan rimantadine.&nbsp;</p>\r\n\r\n<p>3. membersihkan selalu sangkar pagi dan sore hari teratur termasuk tempat makan dan minum.</p>\r\n\r\n<p>4. Pemberian pakan yang sesuai dan air minum yang bersih.</p>\r\n', 'ilt (1).jpg'),
(33, 'Bubulen', '<p>Penyakit Bul-bulu adalah penyakit yang menyerang pada bagian kaki.&nbsp; Penyakit ini disebabkan oleh bakteri <em>stapylo coccus sp</em>.</p>\r\n', '<p>1.Pisahkan burung yang terjangkit penyakit dengan burung kontes lainnya.</p>\r\n\r\n<p>2. Berikan obat khusus&nbsp; Penyakit bubulen salicylic acid, benzoid acid dan sulphur praecipitatum.</p>\r\n\r\n<p>3.membersihkan selalu sangkar pagi dan sore hari teratur termasuk tempat makan dan minum.</p>\r\n\r\n<p>4. Pemberian pakan yang sesuai dan air minum yang bersih.</p>\r\n', 'bubulen.jpg'),
(34, 'Penyakit tetelo', '<p>Penyakit tetelo adalah penyakit burung yang menyerang pada bagian saraf pernafasan dan pencernaan burung, dapat menyebar melalui makanan, minuman, dan udara</p>\r\n', '<p>1.Pisahkan burung yang terjangkit penyakit dengan burung kontes lainnya.</p>\r\n\r\n<p>2. Berikan obat khusus&nbsp; Penyakit tetelo</p>\r\n\r\n<p>3. Bisa menggunakan Pemberikan obat Neuro&nbsp; plus sesuai aturan pakai.</p>\r\n\r\n<p>4. membersihkan selalu sangkar pagi dan sore hari teratur termasuk tempat makan dan minum.</p>\r\n\r\n<p>5. Pemberian pakan yang sesuai dan air minum yang bersih.</p>\r\n', 'tetelo.jpg'),
(35, 'Penyakit serak', '<p>Penyakit serak sering terjadi pada burung kontes karena banyak factor yang menyebabkannya. Suara serak pada burung disebabkan oleh infeksi bakteri dan infeksi spora jamur. Bakteri dan jamur menginfeksi secara massif sistem pernapasan dan organ-organ lain yang berkaitan.</p>\r\n', '<p>1.Pisahkan burung yang terjangkit penyakit dengan burung kontes lainnya.</p>\r\n\r\n<p>2. Berikan obat khusus&nbsp; serak menggunakan Pemberikan obat Super-N diberikan selama 5 hari</p>\r\n\r\n<p>berturut-turut pagi, siang dan sore sebanyak 3-4 tetes untuk burung besar.</p>\r\n\r\n<p>3membersihkan selalu sangkar pagi dan sore hari teratur termasuk tempat makan dan minum.</p>\r\n\r\n<p>4. Pemberian pakan yang sesuai dan air minum yang bersih</p>\r\n', 'serak.jpg'),
(36, 'Penyakit Snot', '<p>Penyakit snot adalah penyakit yang disebabkan oleh bakteri hemophillus gallinarum. Penyakit yang menyerang bagian penglihatan.</p>\r\n', '<p>1.Pisahkan burung yang terjangkit penyakit dengan burung kontes lainnya.</p>\r\n\r\n<p>2. Berikan obat khusus penyakit snot yang didalamnya mengandung antibiotic seperti sulfadiazine dan trimethophim.</p>\r\n\r\n<p>3. membersihkan selalu sangkar pagi dan sore hari teratur termasuk tempat makan dan minum.</p>\r\n\r\n<p>4. Pemberian pakan yang sesuai dan air minum yang bersih.</p>\r\n', 'snot.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_users` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_tpln` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `md_password` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_users`, `username`, `alamat`, `no_tpln`, `password`, `md_password`, `keterangan`) VALUES
(2, 'bibi', 'jkt', '989283', 'bibi', 'd41d8cd98f00b204e9800998ecf8427e', 'Active'),
(3, 'siti', 'BSD', '9812398912', 'siti', 'd41d8cd98f00b204e9800998ecf8427e', 'Pending');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `basis_pengetahuan`
--
ALTER TABLE `basis_pengetahuan`
  ADD PRIMARY KEY (`kode_pengetahuan`);

--
-- Indexes for table `gejala`
--
ALTER TABLE `gejala`
  ADD PRIMARY KEY (`kode_gejala`);

--
-- Indexes for table `hasil`
--
ALTER TABLE `hasil`
  ADD PRIMARY KEY (`id_hasil`);

--
-- Indexes for table `kondisi`
--
ALTER TABLE `kondisi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penyakit`
--
ALTER TABLE `penyakit`
  ADD PRIMARY KEY (`kode_penyakit`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`kode_post`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `basis_pengetahuan`
--
ALTER TABLE `basis_pengetahuan`
  MODIFY `kode_pengetahuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `gejala`
--
ALTER TABLE `gejala`
  MODIFY `kode_gejala` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `hasil`
--
ALTER TABLE `hasil`
  MODIFY `id_hasil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `kondisi`
--
ALTER TABLE `kondisi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `penyakit`
--
ALTER TABLE `penyakit`
  MODIFY `kode_penyakit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `kode_post` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
