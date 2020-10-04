-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 01, 2020 at 03:37 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistempakar`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_latih_hama`
--

CREATE TABLE `data_latih_hama` (
  `id` int(11) NOT NULL,
  `pengujian_ke` int(11) NOT NULL,
  `hama_id` int(11) NOT NULL,
  `gejala_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_latih_hama`
--

INSERT INTO `data_latih_hama` (`id`, `pengujian_ke`, `hama_id`, `gejala_id`) VALUES
(1, 1, 1, 1),
(2, 1, 1, 13),
(3, 2, 1, 1),
(4, 2, 1, 13),
(5, 3, 1, 1),
(6, 3, 1, 13),
(7, 4, 1, 2),
(8, 4, 1, 3),
(9, 5, 1, 2),
(10, 5, 1, 3),
(11, 6, 1, 1),
(12, 6, 1, 2),
(13, 6, 1, 3),
(14, 7, 1, 1),
(15, 7, 1, 2),
(16, 7, 1, 3),
(17, 8, 1, 1),
(18, 8, 1, 3),
(19, 9, 1, 1),
(20, 9, 1, 3),
(21, 10, 1, 1),
(22, 10, 1, 3),
(23, 11, 1, 1),
(24, 12, 1, 1),
(25, 13, 2, 4),
(26, 14, 2, 4),
(27, 15, 2, 4),
(28, 16, 2, 4),
(29, 17, 2, 4),
(30, 18, 2, 4),
(31, 19, 3, 15),
(32, 20, 3, 15),
(33, 21, 3, 15),
(34, 21, 3, 16),
(35, 22, 3, 15),
(36, 22, 3, 16),
(37, 23, 3, 15),
(38, 23, 3, 16),
(39, 24, 4, 10),
(40, 25, 4, 11),
(41, 26, 4, 10),
(42, 26, 4, 11),
(43, 27, 4, 10),
(44, 27, 4, 11),
(45, 28, 4, 11),
(46, 28, 4, 12),
(47, 29, 4, 11),
(48, 29, 4, 12),
(49, 30, 5, 6),
(50, 31, 5, 6),
(51, 32, 5, 5),
(52, 32, 5, 6),
(53, 33, 5, 5),
(54, 33, 5, 6),
(55, 34, 5, 5),
(56, 34, 5, 6),
(57, 34, 5, 7),
(58, 35, 5, 5),
(59, 35, 5, 6),
(60, 35, 5, 7),
(61, 36, 5, 5),
(62, 36, 5, 6),
(63, 36, 5, 7),
(64, 37, 6, 13),
(65, 38, 6, 13),
(66, 39, 6, 13),
(67, 40, 7, 14),
(68, 41, 7, 14),
(69, 42, 7, 14),
(70, 43, 8, 2),
(71, 43, 8, 8),
(72, 44, 8, 2),
(73, 44, 8, 8),
(74, 45, 8, 2),
(75, 45, 8, 8),
(76, 46, 8, 8),
(77, 47, 8, 8),
(78, 48, 8, 8),
(79, 49, 9, 9),
(80, 50, 9, 9),
(81, 51, 1, 1),
(82, 51, 1, 13),
(83, 52, 1, 3),
(84, 52, 1, 2),
(85, 53, 1, 3),
(86, 53, 1, 1),
(87, 53, 1, 2),
(88, 54, 1, 3),
(89, 54, 1, 1),
(90, 55, 1, 1),
(91, 56, 2, 4),
(92, 57, 3, 15),
(93, 58, 3, 16),
(94, 58, 3, 15),
(95, 59, 4, 10),
(96, 60, 4, 11),
(97, 61, 4, 11),
(98, 61, 4, 10),
(99, 62, 4, 12),
(100, 63, 5, 6),
(101, 64, 5, 6),
(102, 65, 5, 6),
(103, 66, 5, 6),
(104, 66, 5, 5),
(105, 67, 5, 6),
(106, 67, 5, 5),
(107, 68, 5, 6),
(108, 69, 5, 7),
(109, 69, 5, 5),
(110, 70, 5, 7),
(111, 70, 5, 5),
(112, 71, 1, 13),
(113, 72, 1, 13),
(114, 73, 7, 14),
(115, 74, 8, 8),
(116, 74, 8, 2),
(117, 75, 8, 8),
(118, 76, 9, 9),
(119, 77, 5, 6),
(120, 77, 5, 7),
(121, 77, 5, 5),
(122, 78, 3, 16),
(123, 78, 3, 15),
(124, 79, 5, 6),
(125, 79, 5, 5),
(126, 80, 5, 6),
(127, 80, 5, 7),
(128, 80, 5, 5),
(129, 81, 1, 13),
(130, 82, 4, 12),
(131, 82, 4, 11),
(132, 83, 1, 13),
(133, 84, 7, 14),
(134, 84, 7, 4),
(135, 84, 7, 1),
(136, 85, 6, 13),
(137, 85, 6, 2),
(138, 85, 6, 6),
(139, 86, 3, 7),
(140, 86, 3, 15),
(141, 87, 3, 1),
(142, 87, 3, 16),
(143, 87, 3, 9);

-- --------------------------------------------------------

--
-- Table structure for table `data_latih_penyakit`
--

CREATE TABLE `data_latih_penyakit` (
  `id` int(11) NOT NULL,
  `pengujian_ke` int(11) NOT NULL,
  `penyakit_id` int(11) NOT NULL,
  `gejala_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_latih_penyakit`
--

INSERT INTO `data_latih_penyakit` (`id`, `pengujian_ke`, `penyakit_id`, `gejala_id`) VALUES
(1, 1, 1, 1),
(2, 2, 1, 1),
(3, 3, 1, 1),
(4, 4, 1, 1),
(5, 4, 1, 2),
(6, 5, 1, 1),
(7, 5, 1, 2),
(8, 6, 1, 1),
(9, 6, 1, 2),
(10, 7, 1, 1),
(11, 7, 1, 2),
(12, 8, 1, 2),
(13, 9, 1, 2),
(14, 10, 1, 2),
(15, 11, 1, 2),
(16, 12, 2, 3),
(17, 12, 2, 4),
(18, 13, 2, 3),
(19, 13, 2, 4),
(20, 14, 2, 3),
(21, 14, 2, 4),
(22, 15, 2, 3),
(24, 15, 2, 4),
(25, 16, 2, 3),
(26, 17, 2, 3),
(27, 18, 2, 3),
(28, 19, 3, 5),
(29, 20, 3, 5),
(30, 21, 3, 5),
(31, 22, 3, 5),
(32, 23, 3, 2),
(33, 23, 3, 5),
(34, 24, 3, 2),
(35, 24, 3, 5),
(36, 25, 3, 2),
(37, 25, 3, 5),
(38, 26, 3, 2),
(39, 26, 3, 5),
(40, 27, 3, 2),
(41, 27, 3, 5),
(42, 28, 4, 6),
(43, 29, 4, 6),
(44, 30, 4, 6),
(45, 31, 4, 6),
(46, 32, 4, 6),
(47, 33, 4, 6),
(48, 34, 4, 6),
(49, 35, 5, 7),
(50, 36, 5, 7),
(51, 37, 5, 7),
(52, 38, 5, 7),
(53, 39, 5, 7),
(54, 40, 6, 9),
(55, 41, 6, 9),
(56, 42, 6, 9),
(57, 43, 6, 9),
(58, 44, 6, 9),
(59, 45, 6, 8),
(60, 46, 6, 8),
(61, 47, 6, 8),
(62, 47, 6, 9),
(63, 48, 6, 8),
(64, 48, 6, 9),
(65, 49, 6, 8),
(66, 49, 6, 9),
(67, 50, 6, 8),
(68, 50, 6, 9),
(69, 51, 1, 1),
(70, 51, 1, 4),
(71, 52, 1, 3),
(72, 52, 1, 2),
(73, 52, 1, 8),
(74, 53, 5, 3),
(75, 53, 5, 7),
(76, 53, 5, 2),
(77, 54, 1, 1),
(78, 55, 1, 1),
(79, 56, 1, 2),
(80, 56, 1, 1),
(81, 57, 1, 2),
(82, 57, 1, 1),
(83, 58, 2, 3),
(84, 59, 2, 3),
(85, 60, 1, 1),
(86, 61, 2, 3),
(87, 61, 2, 4),
(88, 62, 2, 3),
(89, 62, 2, 4),
(90, 63, 2, 3),
(91, 64, 2, 3),
(92, 65, 3, 5),
(93, 66, 3, 5),
(94, 67, 3, 5),
(95, 67, 3, 2),
(96, 68, 3, 5),
(97, 68, 3, 2),
(98, 69, 4, 6),
(99, 70, 4, 6),
(100, 71, 5, 7),
(101, 72, 5, 7),
(102, 73, 6, 9),
(103, 74, 6, 8),
(104, 75, 6, 8),
(105, 75, 6, 9),
(106, 76, 6, 8),
(107, 76, 6, 9),
(108, 77, 5, 5),
(109, 77, 5, 7),
(110, 77, 5, 1),
(111, 78, 1, 3),
(112, 78, 1, 2),
(113, 78, 1, 8),
(114, 79, 6, 1),
(115, 79, 6, 8),
(116, 79, 6, 9),
(117, 80, 1, 7),
(118, 80, 1, 2),
(119, 80, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `hama`
--

CREATE TABLE `hama` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nama_lain` varchar(255) DEFAULT NULL,
  `penanganan` varchar(500) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hama`
--

INSERT INTO `hama` (`id`, `nama`, `nama_lain`, `penanganan`, `created_at`, `updated_at`) VALUES
(1, 'Kutu Loncat', 'Allocaridara Malayensis\r\n', '- Daun dan ranting-ranting yang terserang dipangkas untuk dimusnahkan. \r\n- Menyemprotkan insektisida Supracide 40 EC dosis 100-150 gram/5 liter air.', '2020-07-12 21:04:22', '2020-07-13 04:07:49'),
(2, 'Lebah Mini', '', '- Menggunakan parvasida seperti Hostathion 40 EC (Triazofos 420 gram/lier), dan insektisida seperti Supracide 40 EC dosis 420 gram/liter dan Ternik 106 (Aldikarl 10%).', '2020-08-05 07:27:14', '0000-00-00 00:00:00'),
(3, 'Penggerek Buah', 'Hypopereqa sp (red. Jawa) Gala-gala\r\n', '- Pemberian insektisida, seperti Basudin, Sumithion 50 AC, Thiodan 35 EC, dengan dosis 2-3 cc/liter air.\r\n- Buah yang terinfeksi dan jatuh harus dikumpulkan dan dibakar.\r\n- Buah sebaiknya disemprot dengan campuran 20 ml cyholothrin-L(Karate 2,5% EC) dan surfatant(Triton CS7) dalam 20 liter air pada interval 20 hari hingga 15 hari sebelum panen.\r\n- Pembungkusan buah dengan plastic atau bahan lain.', '2020-08-05 07:27:14', '0000-00-00 00:00:00'),
(4, 'Ulat Penggerek Bunga', 'Prays Citrys\r\n', '- Menyemprotkan obat-obatan seperti Supracide 40 EC, nuvacrom SWC., Perfekthion 400 EC (Eimetoat 400 gram/liter).', '2020-08-05 12:01:24', '0000-00-00 00:00:00'),
(5, 'Embug', '', '- Menggunakan insektisida sistemik.\r\n- Menggunakan insektisida tabur.\r\n- Menggunakan sistem penyiraman dengan menggunakan insektisida yang dicairkan seperti imadikoplorid yang berbahan aktif.\r\n- Menggunakan Jamur Metarhizium Anisopliae.\r\n- Mencangkuli tanah di sekitar tanaman untuk mengambil dan mengumpulkan hama embuk tersebut.\r\n- Menggunakan sistem mutualisme dengan menanam tanaman yang sangat disukai hama embug seperti ubi, nanas dan sejenisnya di sekitar pohon durian.', '2020-08-05 12:17:53', '0000-00-00 00:00:00'),
(6, 'Ulat Daun', 'Papilio Angamemmon (L.)', '- Menyemprot insektisida kontak atau perut.', '2020-08-05 12:01:24', '0000-00-00 00:00:00'),
(7, 'Rayap', '', '- Melakukan sanitasi pada kebun.\r\n- Insektisida berbahan aktif karbofuran dapat ditaburkan di lubang tanam sebelum penanaman dilakukan.', '2020-08-05 12:04:39', '0000-00-00 00:00:00'),
(8, 'Kutu Putih', 'Pseudococcus sp.\r\n', '- Memberantas embun jelaga dan semut yang menjadi alat penyebarannya.\r\n- Menggunakan insektisida dan akarisida.', '2020-08-05 12:04:39', '0000-00-00 00:00:00'),
(9, 'Penggerek Batang', '\r\n', '- Memotong batang sebanyak 5 cm.\r\n- Menyemprotkan cairan insektisida jenis Tamaron 0,3% dan Diazinon 0,5%.\r\n', '2020-08-05 12:06:25', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `hama_gejala`
--

CREATE TABLE `hama_gejala` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hama_gejala`
--

INSERT INTO `hama_gejala` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Bintik-bintik berwarna kecokelatan pada daun', '2020-07-02 02:01:19', '0000-00-00 00:00:00'),
(2, 'Daun keriting', '2020-08-05 07:28:11', '0000-00-00 00:00:00'),
(3, 'Berukuran kerdil', '2020-08-05 07:28:11', '0000-00-00 00:00:00'),
(4, 'Adanya luka gerekan pada daun dan ranting muda', '2020-08-05 07:28:11', '0000-00-00 00:00:00'),
(5, 'Pertumbuhan pohon durian sangat lama', '2020-08-05 07:28:11', '0000-00-00 00:00:00'),
(6, 'Daun secara perlahan layu dan mengering diikuti oleh ranting dan batang', '2020-08-05 12:47:29', '0000-00-00 00:00:00'),
(7, 'Daun yang kering tidak jatuh semua melainkan masih melekat pada tangkainya', '2020-08-05 12:47:29', '0000-00-00 00:00:00'),
(8, 'Bunga atau buah mengalami kerontokan', '2020-08-05 12:51:36', '0000-00-00 00:00:00'),
(9, 'Adanya kotoran dibawah batang', '2020-08-05 12:51:36', '0000-00-00 00:00:00'),
(10, 'Rusaknya kuncup bunga sehingga putik bunga berguguran', '2020-08-05 12:47:29', '0000-00-00 00:00:00'),
(11, 'Rusaknya benang sari dan tajuk bunga', '2020-08-05 12:47:29', '0000-00-00 00:00:00'),
(12, 'Kuncup dan putik patah karena luka digerek', '2020-08-05 12:47:29', '0000-00-00 00:00:00'),
(13, 'Daun berlubang', '2020-08-05 12:51:36', '0000-00-00 00:00:00'),
(14, 'Adanya alur dari tanah yang menempel di bagian batang', '2020-08-05 12:51:36', '0000-00-00 00:00:00'),
(15, 'Kulit dan duri buah menjadi hitam seperti busuk', '2020-08-16 11:53:22', '0000-00-00 00:00:00'),
(16, 'Buah jatuh sebelum tua', '2020-08-16 11:53:22', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `hama_hama_gejala`
--

CREATE TABLE `hama_hama_gejala` (
  `id` int(11) NOT NULL,
  `hama_id` int(11) NOT NULL,
  `hama_gejala_id` int(11) NOT NULL,
  `nilai_cf` float NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hama_hama_gejala`
--

INSERT INTO `hama_hama_gejala` (`id`, `hama_id`, `hama_gejala_id`, `nilai_cf`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 0.4, '2020-07-12 23:42:12', '2020-07-13 06:42:12'),
(2, 1, 2, 0.8, '2020-07-14 19:11:21', '2020-07-15 02:11:21'),
(3, 1, 3, 0.8, '2020-07-15 02:24:38', '2020-08-05 07:16:54'),
(4, 1, 13, 0.4, '2020-07-15 02:24:30', '2020-07-15 09:24:30'),
(5, 2, 4, 0.8, '2020-07-29 06:21:37', '0000-00-00 00:00:00'),
(6, 3, 15, 0.8, '2020-08-25 10:29:59', '0000-00-00 00:00:00'),
(7, 3, 16, 0.8, '2020-08-25 10:29:59', '0000-00-00 00:00:00'),
(8, 4, 10, 0.8, '2020-07-29 06:21:37', '0000-00-00 00:00:00'),
(9, 4, 11, 0.8, '2020-07-29 06:23:32', '0000-00-00 00:00:00'),
(10, 4, 12, 0.8, '2020-07-29 06:23:32', '0000-00-00 00:00:00'),
(11, 5, 5, 0.8, '2020-07-29 06:21:37', '0000-00-00 00:00:00'),
(12, 5, 6, 0.8, '2020-07-29 06:21:37', '0000-00-00 00:00:00'),
(13, 5, 7, 0.8, '2020-07-29 06:21:37', '0000-00-00 00:00:00'),
(14, 6, 13, 0.8, '2020-08-16 11:32:07', '0000-00-00 00:00:00'),
(15, 7, 3, 0.4, '2020-07-29 06:27:19', '0000-00-00 00:00:00'),
(16, 7, 14, 0.8, '2020-08-16 11:34:11', '0000-00-00 00:00:00'),
(17, 8, 2, 0.8, '2020-08-05 14:48:47', '0000-00-00 00:00:00'),
(18, 8, 8, 0.8, '2020-08-16 11:37:19', '0000-00-00 00:00:00'),
(19, 9, 9, 0.8, '2020-08-16 11:41:08', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `penyakit`
--

CREATE TABLE `penyakit` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nama_lain` varchar(255) DEFAULT NULL,
  `penanganan` varchar(2000) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penyakit`
--

INSERT INTO `penyakit` (`id`, `nama`, `nama_lain`, `penanganan`, `created_at`, `updated_at`) VALUES
(1, 'Jamur Daun', 'Phytopthora parasitica dan Pythium complectens', '- Serangan jamur yang masih pada tingkat sarang laba-laba dapat dikendalikan dengan cara melumasi cabang yang terserang dengan fungisida, misalnya calizin RM\r\n- Jika jamur sudah membentuk kerak merah jambu, sebaiknya dilakukan pemotongan cabang kira-kira lebih 30 cm ke bawah bagian yang berjamur.\r\n- Dengan menyemprotkan Antrocol 70 WP (propineb 70,5%), dosis 100-200 gram/liter air atau 1 – 1,5 kg/ha aplikasi.\r\n- Menyediakan kebutuhan utama pohon agar memiliki daya tahan yang baik. Ini bisa dilakukan dengan pemilihan lokasi yang sesuai dan termasuk jarak tanam yang tepat, nutrisi, pasokan air, penyiangan, pemangkasan, dan penjarangan buah.\r\n- Jika pH tanah terlalu asam, sesuaikan ke 5.5-6.5 dengan mengaplikasikan kapur/dolomit.\r\n- Hindari kelembaban relatif yang berlebihan dengan cara penyiangan rutin, pemangkasan yang tepat termasuk pemindahan cabang paling bawah, sanitasi yang baik, dan perampingan pohon untuk menghindari cabang yang tumpang tindih.\r\n- Membangun drainase yang baik untuk mengurangi genangan air dari permukaan tanah atau air dari bawah tanah selama musim penghujan.\r\n- Pantau secara teratur perkembangan tanaman dan terapkan prosedur standar sanitasi. Kumpulkan buah, batang dan bagian tanaman yang rusak dan sakit. Setelah itu musnahkan dengan membakar atau menguburnya.\r\n- Hindari kerusakan mekanis pada batang tanaman. Jika ada, harus segera dicat dengan pasta insektisida sistemik atau bisa juga menggunakan ter/meni.\r\n- Oleskan/semprotan fungisida pelindung setiap 15 hari di musim penghujan.', '2020-07-14 19:10:48', '2020-09-21 04:39:28'),
(2, 'Busuk Akar', '', '- Menggunakan fungisida dengan bahan aktif : metalaxyl, fosetyl alumunium, atau etridiazole.\r\n- Tanaman yang terserang dan mati sebaiknya dibakar dan bekas lubangnya diberi kapur.\r\n- Pada musim hujan sistem drainase kebun diperbaiki agar tidak terjadi genangan air yang dapat membusukkan akar.', '2020-07-14 19:10:57', '2020-07-15 02:10:57'),
(3, 'Kanker Batang', '', 'Tindakan Kuratif:\r\n- Menyemprotkan fungisida dengan bahan aktif, seperti; metalaxyl, fosetyl, alumunium, atau etridiazole.\r\n- Tanaman yang sudah terserang dan mati sebaiknya dibakar. \r\n- Bekas lubangnya diberi kapur, \r\nTindakan Preventif:\r\n- Pencegahan dapat dilakukan dengan pada musim hujan sistem drainase kebun diperbaiki agar tidak terjadi genangan air yang dapat membusukan akar.', '2020-07-14 19:11:05', '2020-07-15 02:11:05'),
(4, 'Jamur Upas', 'Upasia Salmonicolor', '- Serangan jamur yang masih pada tingkat sarang laba-laba dapat dikendalikan dengan cara melumasi/ mengoleskan fungisida berbahan aktif tembaga pada bagian akar, cabang maupun bagian yang lain yang terserang dengan fungisida, misalnya calizin RM.\r\n- Jika jamur sudah membentuk kerak merah jambu, sebaiknya dilakukan pemotongan cabang kira-kira lebih 30 cm ke bawah bagian yang berjamur.\r\n- Menyemprotkan Antrocol 70 WP (propineb 70,5%), dosis 100-200 gram/liter air atau 1-1,5 kg/ha.\r\n- Mengurangi ke', '2020-07-28 07:36:38', NULL),
(5, 'Busuk Buah', '', '- Menyemprotkan fungisida dan insektisida untuk membunuh serangga dan siput yang menjadi vektornya. \r\n- Buah yang telah diserang harus dibuang atau dibakar.', '2020-08-05 13:02:23', NULL),
(6, 'Kanker Bercak', '', '- Menjaga keseimbangan ekosistem dengan menggunakan pengendali hayati seperti bakteri antogonis yang ramah lingkungan seperti Bacillus subtilis, Bacllus cereus dan Bacillus mageterium.\r\n- Pengendalian penyakit ini juga dapat dilakukan dengan menggunakan bahan organik seperti pupuk kandang dan kompos. Dari beberapa penelitian menyatakan bahwa pupuk kandang ayam merupakan sumber bahan organik yang paling mampu menekan pertumbuhan protista pada tanaman durian karena bahan ini dapat menstabilkan pH.', '2020-09-16 09:22:58', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `penyakit_gejala`
--

CREATE TABLE `penyakit_gejala` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penyakit_gejala`
--

INSERT INTO `penyakit_gejala` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Daun menguning', '2020-07-13 06:30:40', NULL),
(2, 'Daun berguguran', '2020-07-02 02:25:34', '0000-00-00 00:00:00'),
(3, 'Bercak yang berawal dari ujung akar lateral', '2020-08-05 13:37:58', NULL),
(4, 'Jaringan akar berwarna cokelat ', '2020-08-05 13:37:58', NULL),
(5, 'Bekas luka pada batang seperti blendok berwarna coklat kemerahan', '2020-08-05 13:37:58', NULL),
(6, 'Terdapat kerak berwarna merah jambu', '2020-08-05 13:37:58', NULL),
(7, 'Bercak – bercak berwarna cokelat kehitaman dan basah pada kulit buah', '2020-08-05 13:37:58', NULL),
(8, 'Tanaman terlihat layu', '2020-08-25 13:26:06', NULL),
(9, 'Tumbuh spora berwarna putih disekitar bawah daun', '2020-08-05 13:38:17', '2020-09-17 13:28:51');

-- --------------------------------------------------------

--
-- Table structure for table `penyakit_penyakit_gejala`
--

CREATE TABLE `penyakit_penyakit_gejala` (
  `id` int(11) NOT NULL,
  `penyakit_id` int(11) NOT NULL,
  `penyakit_gejala_id` int(11) NOT NULL,
  `nilai_cf` float NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penyakit_penyakit_gejala`
--

INSERT INTO `penyakit_penyakit_gejala` (`id`, `penyakit_id`, `penyakit_gejala_id`, `nilai_cf`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 0.4, '2020-07-12 23:42:12', '2020-07-13 06:42:12'),
(2, 1, 2, 0.4, '2020-07-14 19:11:21', '2020-07-15 02:11:21'),
(3, 2, 3, 0.8, '2020-07-15 02:24:30', '2020-07-15 09:24:30'),
(4, 2, 4, 0.8, '2020-07-15 02:24:38', '2020-08-05 07:16:54'),
(5, 3, 2, 0.4, '2020-07-29 06:21:37', '0000-00-00 00:00:00'),
(6, 3, 5, 0.8, '2020-07-29 06:21:37', '0000-00-00 00:00:00'),
(8, 4, 6, 0.8, '2020-07-29 06:21:37', '0000-00-00 00:00:00'),
(9, 5, 7, 0.8, '2020-07-29 06:21:37', '0000-00-00 00:00:00'),
(10, 6, 8, 0.6, '2020-07-29 06:23:32', '0000-00-00 00:00:00'),
(11, 6, 9, 0.6, '2020-07-29 06:23:32', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_diagnosa_hama`
--

CREATE TABLE `riwayat_diagnosa_hama` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `riwayat_ke` int(11) NOT NULL,
  `hama_id` int(11) NOT NULL,
  `gejala_id` int(11) NOT NULL,
  `nilai_cf` float NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `riwayat_diagnosa_hama`
--

INSERT INTO `riwayat_diagnosa_hama` (`id`, `user_id`, `riwayat_ke`, `hama_id`, `gejala_id`, `nilai_cf`, `created_at`) VALUES
(1, 1, 1, 1, 1, 64, '2020-09-05 11:35:38'),
(2, 1, 1, 1, 13, 64, '2020-09-05 11:35:38'),
(3, 1, 2, 1, 3, 100, '2020-09-05 11:36:33'),
(4, 1, 2, 1, 2, 100, '2020-09-05 11:36:33'),
(5, 1, 3, 1, 3, 100, '2020-09-05 11:37:02'),
(6, 1, 3, 1, 1, 100, '2020-09-05 11:37:02'),
(7, 1, 3, 1, 2, 100, '2020-09-05 11:37:02'),
(8, 1, 4, 1, 3, 100, '2020-09-05 11:37:26'),
(9, 1, 4, 1, 1, 100, '2020-09-05 11:37:27'),
(10, 1, 5, 1, 1, 40, '2020-09-05 11:37:45'),
(11, 1, 6, 2, 4, 100, '2020-09-05 11:38:09'),
(12, 1, 7, 3, 15, 100, '2020-09-05 11:38:31'),
(13, 1, 8, 3, 16, 100, '2020-09-05 11:39:14'),
(14, 1, 8, 3, 15, 100, '2020-09-05 11:39:14'),
(15, 1, 9, 4, 10, 100, '2020-09-05 11:39:31'),
(16, 1, 10, 4, 11, 100, '2020-09-05 11:39:49'),
(17, 1, 11, 4, 11, 100, '2020-09-05 11:40:05'),
(18, 1, 11, 4, 10, 100, '2020-09-05 11:40:05'),
(19, 1, 12, 5, 6, 100, '2020-09-05 11:55:54'),
(20, 1, 12, 5, 7, 100, '2020-09-05 11:55:54'),
(21, 1, 12, 5, 5, 100, '2020-09-05 11:55:54'),
(22, 1, 13, 5, 6, 100, '2020-09-05 11:41:52'),
(23, 1, 14, 5, 6, 100, '2020-09-05 11:42:13'),
(24, 1, 14, 5, 5, 100, '2020-09-05 11:42:13'),
(25, 1, 15, 7, 14, 100, '2020-09-05 11:53:00'),
(26, 1, 16, 8, 8, 100, '2020-09-05 11:53:41'),
(27, 1, 16, 8, 2, 100, '2020-09-05 11:53:41'),
(28, 1, 17, 8, 8, 100, '2020-09-05 11:53:55'),
(29, 1, 18, 9, 9, 100, '2020-09-05 11:54:26'),
(50, 1, 19, 4, 12, 100, '2020-09-05 12:24:00'),
(51, 1, 19, 4, 11, 100, '2020-09-05 12:24:00'),
(52, 5, 20, 7, 14, 100, '2020-09-16 08:34:17'),
(53, 5, 20, 7, 4, 100, '2020-09-16 08:34:17'),
(54, 5, 20, 7, 1, 100, '2020-09-16 08:34:17'),
(55, 6, 21, 6, 13, 100, '2020-09-16 08:39:22'),
(56, 6, 21, 6, 2, 100, '2020-09-16 08:39:22'),
(57, 6, 21, 6, 6, 100, '2020-09-16 08:39:22'),
(58, 4, 22, 3, 7, 100, '2020-09-16 10:13:11'),
(59, 4, 22, 3, 15, 100, '2020-09-16 10:13:11');

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_diagnosa_penyakit`
--

CREATE TABLE `riwayat_diagnosa_penyakit` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `riwayat_ke` int(11) NOT NULL,
  `penyakit_id` int(11) NOT NULL,
  `gejala_id` int(11) NOT NULL,
  `nilai_cf` float NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `riwayat_diagnosa_penyakit`
--

INSERT INTO `riwayat_diagnosa_penyakit` (`id`, `user_id`, `riwayat_ke`, `penyakit_id`, `gejala_id`, `nilai_cf`, `created_at`) VALUES
(4, 1, 1, 1, 1, 40, '2020-09-05 12:35:18'),
(5, 1, 2, 1, 1, 40, '2020-09-05 12:35:42'),
(6, 1, 3, 1, 2, 64, '2020-09-05 12:35:52'),
(7, 1, 3, 1, 1, 64, '2020-09-05 12:35:52'),
(8, 1, 4, 1, 2, 64, '2020-09-05 12:36:03'),
(9, 1, 4, 1, 1, 64, '2020-09-05 12:36:03'),
(13, 1, 5, 2, 3, 100, '2020-09-05 12:39:03'),
(14, 1, 5, 2, 4, 100, '2020-09-05 12:39:03'),
(15, 1, 6, 2, 3, 100, '2020-09-05 12:39:14'),
(16, 1, 6, 2, 4, 100, '2020-09-05 12:39:14'),
(17, 1, 7, 2, 3, 100, '2020-09-05 12:39:28'),
(18, 1, 8, 2, 3, 100, '2020-09-05 12:39:35'),
(19, 1, 9, 3, 5, 100, '2020-09-05 12:39:53'),
(20, 1, 10, 3, 5, 100, '2020-09-05 12:40:01'),
(21, 1, 11, 3, 5, 100, '2020-09-05 12:40:18'),
(22, 1, 11, 3, 2, 100, '2020-09-05 12:40:18'),
(23, 1, 12, 3, 5, 100, '2020-09-05 12:40:27'),
(24, 1, 12, 3, 2, 100, '2020-09-05 12:40:27'),
(25, 1, 13, 4, 6, 100, '2020-09-05 12:40:44'),
(26, 1, 14, 4, 6, 100, '2020-09-05 12:40:51'),
(27, 1, 15, 5, 7, 80, '2020-09-05 12:41:03'),
(28, 1, 16, 5, 7, 80, '2020-09-05 12:41:20'),
(29, 1, 17, 6, 9, 60, '2020-09-05 12:41:40'),
(30, 1, 18, 6, 8, 60, '2020-09-05 12:41:54'),
(31, 1, 19, 6, 8, 84, '2020-09-05 12:42:14'),
(32, 1, 19, 6, 9, 84, '2020-09-05 12:42:14'),
(33, 1, 20, 6, 8, 84, '2020-09-05 12:42:37'),
(34, 1, 20, 6, 9, 84, '2020-09-05 12:42:37'),
(35, 5, 21, 5, 5, 80, '2020-09-16 08:33:27'),
(36, 5, 21, 5, 7, 80, '2020-09-16 08:33:27'),
(37, 5, 21, 5, 1, 80, '2020-09-16 08:33:27'),
(38, 6, 22, 1, 3, 40, '2020-09-16 08:39:07'),
(39, 6, 22, 1, 2, 40, '2020-09-16 08:39:07'),
(40, 6, 22, 1, 8, 40, '2020-09-16 08:39:07'),
(41, 1, 23, 6, 1, 84, '2020-09-24 21:03:50'),
(42, 1, 23, 6, 8, 84, '2020-09-24 21:03:51'),
(43, 1, 23, 6, 9, 84, '2020-09-24 21:03:51'),
(44, 1, 24, 1, 7, 64, '2020-09-25 08:58:08'),
(45, 1, 24, 1, 2, 64, '2020-09-25 08:58:08'),
(46, 1, 24, 1, 1, 64, '2020-09-25 08:58:08');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'member', 'tania', 'tania123@gmail.com', NULL, '$2y$10$t11LiYuJe8Xfy2RAROpdEeXWhx5/cLy6.6fYC1NfqyqQjeta9iXbK', NULL, '2020-08-13 07:29:47', '2020-08-13 07:29:47'),
(2, 'admin', 'admin', 'admin@gmail.com', NULL, '$2y$10$QJbtiYwRFPHKJ9B.2/MbTu4gP.1IBxwrnoE40jMuETr8xy.estcZS', 'kPK76V55lHh2MMPvhbo4v8tUD3MRFBk0mrTPHfynFAa954TtdtsxCgsSLO2e', '2020-06-26 01:55:56', '2020-06-26 01:55:56'),
(3, 'member', 'rois', 'rois@gmail.com', NULL, '$2y$10$fM6TDLVe/SMInu6.qxkjsOfpNQP9tiMQZNs50ke4aMOiJ1/zUc5Y2', NULL, '2020-06-28 19:46:21', '2020-06-28 19:46:21'),
(4, 'member', 'Tania Malik Iryana', 'tania15@gmail.com', NULL, '$2y$10$zo4twNUJmjgLhAEiMsELMuUB28IOxnw/9HdxbGCHzUAPJxzOTVUsW', NULL, '2020-09-16 01:38:19', '2020-09-16 01:38:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_latih_hama`
--
ALTER TABLE `data_latih_hama`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_latih_penyakit`
--
ALTER TABLE `data_latih_penyakit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hama`
--
ALTER TABLE `hama`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nama` (`nama`);

--
-- Indexes for table `hama_gejala`
--
ALTER TABLE `hama_gejala`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hama_hama_gejala`
--
ALTER TABLE `hama_hama_gejala`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penyakit`
--
ALTER TABLE `penyakit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penyakit_gejala`
--
ALTER TABLE `penyakit_gejala`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penyakit_penyakit_gejala`
--
ALTER TABLE `penyakit_penyakit_gejala`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `riwayat_diagnosa_hama`
--
ALTER TABLE `riwayat_diagnosa_hama`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `riwayat_diagnosa_penyakit`
--
ALTER TABLE `riwayat_diagnosa_penyakit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_latih_hama`
--
ALTER TABLE `data_latih_hama`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT for table `data_latih_penyakit`
--
ALTER TABLE `data_latih_penyakit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT for table `hama`
--
ALTER TABLE `hama`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `hama_gejala`
--
ALTER TABLE `hama_gejala`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `hama_hama_gejala`
--
ALTER TABLE `hama_hama_gejala`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `penyakit`
--
ALTER TABLE `penyakit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `penyakit_gejala`
--
ALTER TABLE `penyakit_gejala`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `penyakit_penyakit_gejala`
--
ALTER TABLE `penyakit_penyakit_gejala`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `riwayat_diagnosa_hama`
--
ALTER TABLE `riwayat_diagnosa_hama`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `riwayat_diagnosa_penyakit`
--
ALTER TABLE `riwayat_diagnosa_penyakit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
