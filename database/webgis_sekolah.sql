-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Waktu pembuatan: 02 Jun 2020 pada 15.04
-- Versi server: 10.4.10-MariaDB
-- Versi PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webgis_sekolah`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun`
--

DROP TABLE IF EXISTS `akun`;
CREATE TABLE IF NOT EXISTS `akun` (
  `akun_id` int(11) NOT NULL AUTO_INCREMENT,
  `akun_jenjang` int(11) NOT NULL,
  `akun_name` varchar(20) NOT NULL,
  `akun_username` varchar(12) NOT NULL,
  `akun_password` varchar(250) NOT NULL,
  `akun_lastpassword` varchar(250) NOT NULL,
  `akun_isactive` enum('true','false') NOT NULL,
  `akun_createat` timestamp NULL DEFAULT NULL,
  `akun_modifyat` timestamp NULL DEFAULT NULL,
  `akun_status` enum('root','admin','user') NOT NULL,
  `akun_image` varchar(250) NOT NULL,
  PRIMARY KEY (`akun_id`),
  KEY `akun_jenjang` (`akun_jenjang`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `akun`
--

INSERT INTO `akun` (`akun_id`, `akun_jenjang`, `akun_name`, `akun_username`, `akun_password`, `akun_lastpassword`, `akun_isactive`, `akun_createat`, `akun_modifyat`, `akun_status`, `akun_image`) VALUES
(1, 1, 'Admin', 'admin', '$2y$08$CTIiYmOSqJbaOqFGdl.R/ORr0NSmjsSFCc2efk1TTetn6ISOXbdnm', '$2y$08$CTIiYmOSqJbaOqFGdl.R/ORr0NSmjsSFCc2efk1TTetn6ISOXbdnm', 'true', '2020-04-19 17:00:00', '2020-04-19 17:00:00', 'root', 'default.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `foto`
--

DROP TABLE IF EXISTS `foto`;
CREATE TABLE IF NOT EXISTS `foto` (
  `foto_id` int(11) NOT NULL AUTO_INCREMENT,
  `foto_sekolah` int(11) NOT NULL,
  `foto_folder` varchar(250) NOT NULL,
  `foto_nama` varchar(250) NOT NULL,
  `foto_tanggal` date NOT NULL,
  PRIMARY KEY (`foto_id`),
  KEY `foto_sekolah` (`foto_sekolah`)
) ENGINE=InnoDB AUTO_INCREMENT=378 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `foto`
--

INSERT INTO `foto` (`foto_id`, `foto_sekolah`, `foto_folder`, `foto_nama`, `foto_tanggal`) VALUES
(1, 1, '20327966', 'ca4c768f30642a03b9961c1916f5a1e1.jpg', '2020-04-21'),
(2, 1, '20327966', '222b0a18278da68db58748424038a5f9.jpg', '2020-04-21'),
(3, 2, '20327968', 'ff7a25c5ab6c70c1b7fac65e308ccb25.jpg', '2020-04-21'),
(4, 2, '20327968', 'c8197f2862f78799a01c955e85396b7c.jpg', '2020-04-21'),
(5, 2, '20327968', '98d9d3c6c062abd90cc27d807e9a4d13.jpg', '2020-04-21'),
(6, 2, '20327968', '4a1acc63b9d1e2f3e679cdc396a9f254.jpg', '2020-04-21'),
(7, 3, '20327969', '7429f91a0ecdce408c75be54cdf0d8cb.jpg', '2020-04-21'),
(8, 3, '20327969', 'aaf4844d414b53ed9236a85d1067564f.jpg', '2020-04-21'),
(9, 3, '20327969', '8a497e743e2115c9a4c3b628a47dc3a6.jpg', '2020-04-21'),
(10, 3, '20327969', '7037978948b7d0f54713a0239c43a004.jpg', '2020-04-21'),
(11, 4, '20327971', '8e5a12e35000fa5933e09c15874d1355.jpg', '2020-04-21'),
(12, 4, '20327971', '8907c28b618d442260aefeadbc3eeaa1.jpg', '2020-04-21'),
(13, 4, '20327971', '1ff406eb38c34ee44363bba49adb47c9.jpg', '2020-04-21'),
(14, 4, '20327971', 'b4096596332c6c4511b1c278067afe49.jpg', '2020-04-21'),
(15, 4, '20327971', 'bb7926cc9f04d193063a35e6e7a1ff0b.jpg', '2020-04-21'),
(16, 5, '20327967', '264c8c1aa334cd8bee5e7cde25020e71.jpg', '2020-04-21'),
(17, 5, '20327967', 'c5120da8436e9ad42b7eae08150131e4.jpg', '2020-04-21'),
(18, 5, '20327967', 'e96f6f911eeedf60902d27143b0314bc.jpg', '2020-04-21'),
(19, 6, '20327970', '8420c854783cbc9192de7542c8c937a7.jpg', '2020-04-21'),
(20, 6, '20327970', 'f0d9e3c53ccfbd3d31a92efe9a398a16.jpg', '2020-04-21'),
(21, 6, '20327970', '79c037c2f835fcafaace88a15281a090.jpg', '2020-04-21'),
(22, 7, '20327972', 'c8f5f1fd5e7f3de3a9835954d22a0901.jpg', '2020-04-21'),
(23, 7, '20327972', '7b982c7ea091d665eec76502592c1cd5.jpg', '2020-04-21'),
(24, 7, '20327972', '873f9db6b170b5be21461048126376a5.jpg', '2020-04-21'),
(25, 7, '20327972', '08e4994b8c9cd95e8b2ff8b252bb2dd7.jpg', '2020-04-21'),
(26, 7, '20327972', 'f3ce4fa41652ddd7234186fd6fd76de9.jpg', '2020-04-21'),
(27, 8, '20327973', '5eaa6a9f50dc4001afc7174cb09ea1d8.jpg', '2020-04-21'),
(28, 8, '20327973', '842ef183f929b81aa9a75e67a040c7d8.jpg', '2020-04-21'),
(29, 8, '20327973', '3909519665bc8390d032cbcbbc81e859.jpg', '2020-04-21'),
(30, 8, '20327973', 'f5d91a0ddff014cd498d1db0e880af36.jpg', '2020-04-21'),
(31, 9, '69949652', '3611558e77b00eb72b9bf13ed70f3681.jpg', '2020-04-21'),
(32, 9, '69949652', '270e424f3a7d222c3edfce52766808cb.jpg', '2020-04-21'),
(33, 10, '20330346', '659c299c6d33637cf6cc736d4a040536.jpg', '2020-04-21'),
(34, 10, '20330346', '33e8caac7f5d3b7ed2badd88a50ca699.jpg', '2020-04-21'),
(35, 10, '20330346', 'e5dca4b49d6e6093c9e3c545a2459fa3.jpg', '2020-04-21'),
(36, 10, '20330346', 'ecb9a60aeb76437a7864a482a07a5ddd.jpg', '2020-04-21'),
(37, 11, '20327940', 'b8165c5f401542b9644410971c03c40b.jpg', '2020-04-21'),
(38, 11, '20327940', '0306ef9d370d9c091bb5d63d7b4c9424.jpg', '2020-04-21'),
(39, 11, '20327940', '393c512acb4f94377b78116cb623e4d1.jpg', '2020-04-21'),
(40, 11, '20327940', '043e9250035cec766d1165a7c7fab320.jpg', '2020-04-21'),
(41, 12, '20327962', '441894b9636416112ca1a20ddaa5b4ef.jpg', '2020-04-21'),
(42, 12, '20327962', 'db41682462f3d6c3e1f26a1410b018b8.jpg', '2020-04-21'),
(43, 12, '20327962', 'ee5759347acf2e5414848d63b07de32b.jpg', '2020-04-21'),
(44, 12, '20327962', 'f1aebb004575ff37a569c443a5782de8.jpg', '2020-04-21'),
(45, 13, '69950487', '2be792fbb99787018d9ce9d8dde88be0.jpg', '2020-04-21'),
(46, 13, '69950487', '68b0b4c21efcf33f0d288a38f42bb3a4.jpg', '2020-04-21'),
(47, 14, '20327944', '6814b7d7fe64a9402087a5af868bd4e7.jpg', '2020-04-21'),
(48, 14, '20327944', '4cce8db2fd4e0d9034b085e42ee5bfd6.jpg', '2020-04-21'),
(49, 14, '20327944', '4f09d5b3ce467335c826e998db1853a2.jpg', '2020-04-21'),
(50, 14, '20327944', '69ff10a3f89304583e66daabef0721df.jpg', '2020-04-21'),
(51, 15, '20327987', 'f316cb798288d0a24e9e9bc107c63e53.jpg', '2020-04-21'),
(52, 15, '20327987', 'b3b83babac18b5f65f29bd6b821ab5da.jpg', '2020-04-21'),
(53, 15, '20327987', 'b22676e3233a99d1a53920c8cebbac24.jpg', '2020-04-21'),
(54, 15, '20327987', '171abdbbdb7f65b1b80fd58c7c2b5a11.jpg', '2020-04-21'),
(55, 16, '20327975', 'bce0de131f1d32afdb2367a0b69a7600.jpg', '2020-04-21'),
(56, 16, '20327975', 'dc17f8f42fcd9f0f0abd2125b3e279c1.jpg', '2020-04-21'),
(57, 16, '20327975', '6cae25b30e62ca8a155d08aeb13735a2.jpg', '2020-04-21'),
(58, 17, '20327946', '360eeda300f4dff1e9351bf2e94ac557.jpg', '2020-04-21'),
(59, 17, '20327946', '2fcdd92a87f4d5f7f43cdf829e26cb3a.jpg', '2020-04-21'),
(60, 17, '20327946', 'd7eab9a40a9842162883c6b1d385313d.jpg', '2020-04-21'),
(61, 17, '20327946', '10dfa5e78e8808c2b9bcae10ee94abad.jpg', '2020-04-21'),
(62, 17, '20327946', 'f05aee57174b6ee546873fa2ec6c3f90.jpg', '2020-04-21'),
(63, 18, '20327979', '6f38b8f5372fe08107f1d9bdf17d3477.jpg', '2020-04-21'),
(64, 18, '20327979', '86fe71ab728278d48030e34ffdfef881.jpg', '2020-04-21'),
(65, 18, '20327979', '0cc070a35b817248cdec7cd38a245742.jpg', '2020-04-21'),
(66, 18, '20327979', 'bc527910ef53abc07f04b05564c677b0.jpg', '2020-04-21'),
(67, 18, '20327979', '0fcf33c9ceb828389d22862ace78758e.jpg', '2020-04-21'),
(68, 19, '20327980', 'd942b5cfc1991b6f8c019b0073b9c788.jpg', '2020-04-21'),
(69, 19, '20327980', 'ac46c4d8b70ff1796d7b4c8b137f22dd.jpg', '2020-04-21'),
(70, 19, '20327980', 'f345200e7f5bb9822a19cca0a78d78a5.jpg', '2020-04-21'),
(71, 19, '20327980', '8595f28e69a5b28dea7d37b0c856f773.jpg', '2020-04-21'),
(72, 20, '20340947', '98833ecb4515b7894cd341b041a26b55.jpg', '2020-04-21'),
(73, 20, '20340947', 'e591e110b61768ccd81570e308cd433c.jpg', '2020-04-21'),
(74, 20, '20340947', '1471b6745311c0d0ebfb61c01ef32d3c.jpg', '2020-04-21'),
(75, 21, '69967607', '86e365b13b8a210fe453c45153b2ada8.jpg', '2020-04-21'),
(76, 21, '69967607', '6af130a6db38f3746d7c75259bd70f6f.jpg', '2020-04-21'),
(77, 21, '69967607', 'aa95efb05a56e52fbe6cf758c56b07e6.jpg', '2020-04-21'),
(78, 22, '20327936', 'a7b9d4d7836b1de502ad09b2fd8ed17a.jpg', '2020-04-21'),
(79, 22, '20327936', '36702eff2c4d22b28e562f878db497cf.jpg', '2020-04-21'),
(80, 22, '20327936', 'a590d69fa3a603761292b3b249ebffae.jpg', '2020-04-21'),
(81, 23, '20327945', 'd82951509a530d093feb2a0f59205258.jpg', '2020-04-21'),
(82, 23, '20327945', '0d817b768dcb9d3c891818dee0059d62.jpg', '2020-04-21'),
(83, 23, '20327945', '5701da98da2e9dfa7037ac70a99fe76b.jpg', '2020-04-21'),
(84, 24, '20327982', '4647756a02fe1455f5541d6712611ca9.jpg', '2020-04-21'),
(85, 24, '20327982', '7e0fef3c8a3bf197d711b4c7f6463a6d.jpg', '2020-04-21'),
(86, 24, '20327982', '6e61f4337ee6a7ceba9b0b74e1af9dbb.jpg', '2020-04-21'),
(87, 25, '20327935', '55b8ff782ab4e94d928e7412d5bda7ba.jpg', '2020-04-21'),
(88, 25, '20327935', '3125d8a2699da45540133e1cfe8a859e.jpg', '2020-04-21'),
(89, 25, '20327935', '8fa2f99152926eba1fe35a24f1994d69.jpg', '2020-04-21'),
(90, 25, '20327935', '7dcd495805d9a420aa5678ea5c1fc05d.jpg', '2020-04-21'),
(91, 25, '20327935', '9981ec968560d9fea5ec2f99dab62def.jpg', '2020-04-21'),
(92, 25, '20327935', 'f63c226cd5c5a4e36164bc63d65a46a2.jpg', '2020-04-21'),
(93, 25, '20327935', '3aa9f02d53b3f93b53f9bd5d619f6660.jpg', '2020-04-21'),
(94, 25, '20327935', '236b3bd82dd9a1bdaa836ab202fe00c6.jpg', '2020-04-21'),
(95, 25, '20327935', '2261f1db0c6d5cad44439c6bbccae302.jpg', '2020-04-21'),
(96, 26, '20327981', 'f232068f7f9b884ffba11be1e51326ad.jpg', '2020-04-21'),
(97, 26, '20327981', 'b4739d1680fe92c7d39219fa685f6f68.jpg', '2020-04-21'),
(98, 26, '20327981', '8b68d90515015fb1140c81450ea5ccd1.jpg', '2020-04-21'),
(99, 27, '20327976', '2f8443585fea800ee8d58fb9cb253d2b.jpg', '2020-04-21'),
(100, 27, '20327976', '44ede09d4602b09d6642ce0816fdb39f.jpg', '2020-04-21'),
(101, 27, '20327976', 'b22ca8c7345a45745bc52588476cb1f1.jpg', '2020-04-21'),
(102, 27, '20327976', '2907bd970c7c1998ba38506e55ffefe6.jpg', '2020-04-21'),
(103, 28, '20327964', '8e3fac4604bf2f341931935372589e04.jpg', '2020-04-21'),
(104, 28, '20327964', 'cadd8797ebc26b3d765ef189907e75fb.jpg', '2020-04-21'),
(105, 28, '20327964', '5f9449baac9d16b7cf052a80649457ab.jpg', '2020-04-21'),
(106, 28, '20327964', 'c4e4c37c553d0f1c315f5819695de25b.jpg', '2020-04-21'),
(107, 29, '69823287', '1e05048bc9a62fcebfeb74279a52389d.jpg', '2020-04-21'),
(108, 29, '69823287', '98473aaf848998afb9be67e4a3b0b7c8.jpg', '2020-04-21'),
(109, 29, '69823287', 'cc884e5e11b2fb577debfc3a8777b62a.jpg', '2020-04-21'),
(110, 29, '69823287', 'bc10c5e3629589adb9b9a08b62393d01.jpg', '2020-04-21'),
(111, 30, '20330347', 'a5843c4d5c42b96e00854b4d2736ede5.jpg', '2020-04-21'),
(112, 30, '20330347', 'f2ef9c210ed6b00f33c1fb7df0ec7c52.jpg', '2020-04-21'),
(113, 30, '20330347', 'b9d6062e9f7e985ed80628b3927f15b2.jpg', '2020-04-21'),
(114, 30, '20330347', '8efa7a0ba25e32c18e11fd6a0bfbe138.jpg', '2020-04-21'),
(115, 30, '20330347', '2c18beda96e362530a20cb115c4d95fa.jpg', '2020-04-21'),
(116, 30, '20330347', '6ef91cb7c98c080eaf0ff9b8f52f9504.jpg', '2020-04-21'),
(117, 30, '20330347', '93dad409fadf1b04496eb9b14a902749.jpg', '2020-04-21'),
(118, 30, '20330347', 'fd55d4a679bd6d8f6f4d7ed103e2f588.jpg', '2020-04-21'),
(119, 30, '20330347', 'cd0568bb41a4fc6fe42812a3e8d6446f.jpg', '2020-04-21'),
(120, 30, '20330347', 'a94635e5f25e3c12843a9b22caffb081.jpg', '2020-04-21'),
(121, 31, '20327986', 'd225a814c1a094b06e516f9b8f9ae444.jpg', '2020-04-21'),
(122, 31, '20327986', '34334f1a94260a882f7b557786133eeb.jpg', '2020-04-21'),
(123, 32, '20327988', '7de3ff38b3d246de8c8d1521b5937d6d.jpg', '2020-04-21'),
(124, 32, '20327988', 'aa4e23f98c0b9a10497487b202b1b4fd.jpg', '2020-04-21'),
(125, 32, '20327988', '78945be4fb0e00bb1ce9898af1043e9e.jpg', '2020-04-21'),
(126, 33, '20327978', 'd6bb46b99e6bede465aac83e5c9a188e.jpg', '2020-04-21'),
(127, 33, '20327978', '7f79528639574391d47754e5b7693791.jpg', '2020-04-21'),
(128, 33, '20327978', '162cc82d9a15a2cdbe6cbe29869d3ae0.jpg', '2020-04-21'),
(129, 33, '20327978', '2948e502e3c830a0e4cd698ffe6f2f3c.jpg', '2020-04-21'),
(130, 33, '20327978', '254b1ff7b6335ad78a92f37a130130bb.jpg', '2020-04-21'),
(131, 33, '20327978', 'b670a26ced83193e3b6cf94a6414a1a5.jpg', '2020-04-21'),
(132, 33, '20327978', 'bc651d61c02da0aeb3028a01384d8df2.jpg', '2020-04-21'),
(133, 34, '20327939', '8c2e8c29a2a8f96e353f3ac9c4a99b5c.jpg', '2020-04-21'),
(134, 34, '20327939', 'b5c2697487a8288a2093cc989d4b254f.jpg', '2020-04-21'),
(135, 34, '20327939', 'f14bdb454cf623f2c5a5757d6d8a13fa.jpg', '2020-04-21'),
(136, 35, '20330348', 'ae1d1364f77945db506868542cfb058a.jpg', '2020-04-21'),
(137, 36, '20328109', '9cea3e43dea93cb1d08814dcb9013c4d.jpg', '2020-04-23'),
(138, 36, '20328109', 'd63a0c983600410285bf70be99d5b2cc.jpg', '2020-04-23'),
(139, 36, '20328109', 'b3b52826400c72c323186b9d3dbf1ffa.jpg', '2020-04-23'),
(140, 36, '20328109', 'b1c2a8c33b7be9175b53e76d8cfc6ecc.jpg', '2020-04-23'),
(141, 36, '20328109', 'a0f2f2f3b46ba1efc2f7e05279b68e47.jpg', '2020-04-23'),
(142, 36, '20328109', '4f278aa9c2761680d4f2fd3dfc0e86af.jpg', '2020-04-23'),
(143, 36, '20328109', '6e9a257e177857bc850596133a60fcee.jpg', '2020-04-23'),
(144, 36, '20328109', 'a355d36d16d75266eabed6ab434a63bb.jpg', '2020-04-23'),
(145, 36, '20328109', '488dcb74c32fdf2483adefd98859d6e7.jpg', '2020-04-23'),
(146, 36, '20328109', '0f9d9245854fc2c17afa8d8eadfacbc4.jpg', '2020-04-23'),
(147, 36, '20328109', 'acad697282ea17fe3612dc4fa0505a3b.jpg', '2020-04-23'),
(148, 36, '20328109', '2ef10bd531a7e2770a67399dd8b1c338.jpg', '2020-04-23'),
(149, 36, '20328109', 'bf2da56ac17691edf8cf07f0741ab1f5.jpg', '2020-04-23'),
(150, 36, '20328109', 'f7950eb7417f9fd5b74c8858d52fd8cb.jpg', '2020-04-23'),
(151, 37, '20328128', '6bbfd62b25c04031c345cf45da084099.jpg', '2020-04-23'),
(152, 37, '20328128', 'be62523e5308fe1a5e0595cce7fad916.jpg', '2020-04-23'),
(153, 37, '20328128', '1e653644717fcf165fb40f61cf47709c.jpg', '2020-04-23'),
(154, 37, '20328128', '4b60154307d611da1defd5f759b7cd53.jpg', '2020-04-23'),
(155, 37, '20328128', '1a47dc93cd512f7802bf12ab95497656.jpg', '2020-04-23'),
(156, 37, '20328128', '3f4c748cde0e9db5eade056738a24b6b.jpg', '2020-04-23'),
(157, 37, '20328128', '5ac4b5fe285c7b358e354b6073cc0064.jpg', '2020-04-23'),
(158, 37, '20328128', 'ac6b6aa64b9519270290eddcdb4867e5.jpg', '2020-04-23'),
(159, 37, '20328128', 'e0d5d32ccdc17fef669892608a8305a2.jpg', '2020-04-23'),
(160, 38, '20328153', '5486f02078b95c6b6f155103db7e695c.jpg', '2020-04-23'),
(161, 38, '20328153', 'bc2b2c730eb9780f7493273a3c83474a.jpg', '2020-04-23'),
(162, 38, '20328153', '1844005c6041c674e26e9cc178131faa.jpg', '2020-04-23'),
(163, 38, '20328153', 'dedf03c38ec48524eb01b7d776ae8ef6.jpg', '2020-04-23'),
(164, 38, '20328153', '26dd0415cca9d71873d1c7143e522041.jpg', '2020-04-23'),
(165, 38, '20328153', '8ef1625951bc7f1231514810d0c94dad.jpg', '2020-04-23'),
(166, 38, '20328153', '99d58a5fe124f85b5a2af6fa2bdbfed7.jpg', '2020-04-23'),
(167, 39, '20328154', 'aa8343edf609d9f6bd3f12ec8ff2ae34.jpg', '2020-04-23'),
(168, 39, '20328154', '07b0c22b29dd60354ea15b402c12227b.jpg', '2020-04-23'),
(169, 39, '20328154', '45a4b7c7159858b6aaa87bafe588dc41.jpg', '2020-04-23'),
(170, 39, '20328154', 'dd5b0b4181e35fa0f1b65350b3870957.jpg', '2020-04-23'),
(171, 40, '20328126', '955ec69b9c462d804d53fb9b9d01aaaf.jpg', '2020-04-23'),
(172, 40, '20328126', 'd28199202901bce6a912f82debea2c6c.jpg', '2020-04-23'),
(173, 40, '20328126', '61d9d30d574106a1c7db51d5aa144a00.jpg', '2020-04-23'),
(174, 40, '20328126', 'a9e59519a33fced50c361a3ba90a043f.jpg', '2020-04-23'),
(175, 40, '20328126', 'f0bd40ea8b39bc71286ae8ca2f344e6b.jpg', '2020-04-23'),
(176, 40, '20328126', '3e9afede3a91528a0ca764f61e8027e1.jpg', '2020-04-23'),
(177, 40, '20328126', 'fa57c437555629281778fb8073c1589b.jpg', '2020-04-23'),
(178, 41, '20328108', '88f8225858ff8d6a301a584064ce9b26.jpg', '2020-04-23'),
(179, 41, '20328108', 'c9a918e116900382307155d9d5eaabfa.jpg', '2020-04-23'),
(180, 41, '20328108', '3e6aa8f58654a9e4f58ffd356a967e62.jpg', '2020-04-23'),
(181, 41, '20328108', '2a79e9dab18bf4ef9a9f15a26fa50e16.jpg', '2020-04-23'),
(182, 41, '20328108', '9f628d6c21900be2858cf123ca19a2bc.jpg', '2020-04-23'),
(183, 41, '20328108', '7d58688dc62e60e4a6026950812f2e6e.jpg', '2020-04-23'),
(184, 41, '20328108', '7176c04e95d9205b142cc21505066bf8.jpg', '2020-04-23'),
(185, 41, '20328108', '2a017181d9920d509357290de5328542.jpg', '2020-04-23'),
(186, 42, '20328127', 'd7646aa78c268f390a539c596ec4b23c.jpg', '2020-04-23'),
(187, 42, '20328127', '24855db873b7a467c33e904fc7653556.jpg', '2020-04-23'),
(188, 43, '20328152', 'fa790e4c3885c4f769fa0870316308fb.jpg', '2020-04-23'),
(189, 44, '20328155', '706aacaba9c2a6ef87a99e673da30b57.jpg', '2020-04-23'),
(190, 44, '20328155', '2b6694f435796538396c0eb28499925b.jpg', '2020-04-23'),
(191, 44, '20328155', '393528c32b1abca214b9dccb6e3d3d29.jpg', '2020-04-23'),
(192, 44, '20328155', '43a362032a51f4f785df6d6c9331972b.jpg', '2020-04-23'),
(193, 45, '20328119', '4fd8db5fb6d7d35c0897ba28c79138a7.jpg', '2020-04-25'),
(194, 45, '20328119', '3e4998054a07fead65d47b042c3485cf.jpg', '2020-04-25'),
(195, 45, '20328119', 'cfe2f861cf6e87d952406109d07788fa.jpg', '2020-04-25'),
(196, 46, '20328122', '0b10d64a951673d54fc813df6953be07.jpg', '2020-04-25'),
(197, 46, '20328122', 'dbc55a6391e52ab17c9c5ac5a74bd160.jpg', '2020-04-25'),
(198, 46, '20328122', '2985b2626c56456b27bed4654cbfb232.jpg', '2020-04-25'),
(199, 47, '20328104', 'a02d260ff7e4898cc2c294b6b6c7b82b.jpg', '2020-04-25'),
(200, 48, '20328118', 'fefe5b5f560328a1c28ebaa9291576f0.jpg', '2020-04-25'),
(201, 48, '20328118', '8224021f032f82347461d4daa1da8088.jpg', '2020-04-25'),
(202, 48, '20328118', 'ffd970f146d3cc8020bd7a545dc90bc3.jpg', '2020-04-25'),
(203, 49, '20353323', 'a25c74a0dacc27a9fc2050a35645475a.jpg', '2020-04-25'),
(204, 50, '20327989', 'e5a5f11b5fa71ff786576b02068b0a7e.jpg', '2020-04-25'),
(205, 50, '20327989', 'e74ec32a5fafaa90f6b600d160ca2270.jpg', '2020-04-25'),
(206, 50, '20327989', 'ee5c7b81f819ffef2b00a33306587b47.jpg', '2020-04-25'),
(207, 50, '20327989', 'c66099f57b16ae561336f8a230c13137.jpg', '2020-04-25'),
(208, 50, '20327989', '0afb067fe33f83ee91c052a9a64e09d4.jpg', '2020-04-25'),
(209, 50, '20327989', '6e6b517c1ec9bbe49ea511958df885bd.jpg', '2020-04-25'),
(210, 50, '20327989', '39d60d7445dc85ac6374aeaf4d7990e3.jpg', '2020-04-25'),
(211, 50, '20327989', '1e4e1b4fcf8fedeaa5c6846529d5166e.jpg', '2020-04-25'),
(212, 51, '20328151', '0e3596fbf6d1ad30cc32776e799c8b03.jpg', '2020-04-25'),
(213, 51, '20328151', '3783c0ccca3cc017c26635581141ab60.jpg', '2020-04-25'),
(214, 51, '20328151', 'd5f7f0845e0309dc5ebbef1fea04fc3b.jpg', '2020-04-25'),
(215, 51, '20328151', 'a9ce28c6cf33143ef178cb4bf48a97ca.jpg', '2020-04-25'),
(216, 51, '20328151', '04a37329db3625a4351f89e8a576aaf4.jpg', '2020-04-25'),
(217, 52, '20328129', 'c82110114100c379f38e03f1bd7e3b39.jpg', '2020-04-25'),
(218, 52, '20328129', 'ea12e53eb4ab92dce8c8d5fa78948329.jpg', '2020-04-25'),
(219, 53, '69827629', 'b22137aa8ce4d080fe64f735b273bb7f.jpg', '2020-04-25'),
(220, 53, '69827629', '896a78bbef99148cbe62184fd2ff7414.jpg', '2020-04-25'),
(221, 53, '69827629', '7f86c3cbba6ffcd3892f64321081ea8e.jpg', '2020-04-25'),
(222, 53, '69827629', '4da2aa49f166955bcd1e0f771a16efc4.jpg', '2020-04-25'),
(223, 53, '69827629', 'd8557700fe0311c459320a0269b476b7.jpg', '2020-04-25'),
(224, 53, '69827629', 'b62f7b8a4d2bcdd207932a6aa9ce4cb7.jpg', '2020-04-25'),
(225, 54, '20328116', 'c36fbc5c9b5b64c80b48451a5ecba9d9.jpg', '2020-04-25'),
(226, 54, '20328116', '1f24104ec343fd81930c57e571b5d7ca.jpg', '2020-04-25'),
(227, 54, '20328116', 'ad6f8342ba8ae7eb5920fdf0ccc613d7.jpg', '2020-04-25'),
(228, 54, '20328116', '40ac4e20cdcee5d43ad82a2eb8ebcea8.jpg', '2020-04-25'),
(229, 54, '20328116', 'e69643606d8005e9734b5572aa90741f.jpg', '2020-04-25'),
(230, 55, '20328150', 'aa9f0931ebf673b768596fa04625f759.jpg', '2020-04-25'),
(231, 55, '20328150', 'b2f7e821c408766eae16945b8d18fc8c.jpg', '2020-04-25'),
(232, 55, '20328150', '7f92f094f4b3a7c7a586239d860c1d60.jpg', '2020-04-25'),
(233, 55, '20328150', '2cc871c0c7ea82853475ef7f4099912a.jpg', '2020-04-25'),
(234, 56, '20328105', '4bcac17c43b85bcdd7195c86db5e36e6.jpg', '2020-04-25'),
(235, 56, '20328105', '639b8734e233d1c9c28826c71190926b.jpg', '2020-04-25'),
(236, 57, '20331829', 'c2e52b129483dd54e83109fd1bde3618.jpg', '2020-04-25'),
(237, 57, '20331829', 'd2adf149ecc95760a45a67212b8a31af.jpg', '2020-04-25'),
(238, 58, '20328103', 'dd2478d18e92083f24684ce23919acf0.jpg', '2020-04-25'),
(239, 58, '20328103', '3c8f543de81a6e2d01835805d73bfd9e.jpg', '2020-04-25'),
(240, 58, '20328103', '00a12c5e64b5dbf9087555d630f03cb0.jpg', '2020-04-25'),
(241, 58, '20328103', '4e6a89997826e2963ab1a15249c7d746.jpg', '2020-04-25'),
(242, 58, '20328103', 'd063deea412013262f56151a155f9299.jpg', '2020-04-25'),
(243, 58, '20328103', 'cfac9778e7b4dfef32f4d08addd101c2.jpg', '2020-04-25'),
(244, 59, '20328121', '74ad94fa67f05360fabfe186c8a4beb2.jpg', '2020-04-25'),
(245, 59, '20328121', '67959e5ef1944edd4f4a1cb3b9480d76.jpg', '2020-04-25'),
(246, 59, '20328121', 'e40c3be41b24ff1161165450a84b31e3.jpg', '2020-04-25'),
(247, 60, '20328149', 'abfa940261955eb05787c674489b3d0e.jpg', '2020-04-25'),
(248, 60, '20328149', '394337dc6b19c4c1834d15f6cb8b0eb1.jpg', '2020-04-25'),
(249, 60, '20328149', '8746cf5d3931f84b4a8e977efd8cfbf3.jpg', '2020-04-25'),
(250, 60, '20328149', 'fbde3f3c142ccaa8b49afaf74d232d69.jpg', '2020-04-25'),
(251, 60, '20328149', '9ad3ed52b9b0534b6f7ff88ee68f8756.jpg', '2020-04-25'),
(252, 60, '20328149', 'c5441c9c29db768425908d66dbaa11c2.jpg', '2020-04-25'),
(253, 60, '20328149', 'a914850308c478a183061d67a9f6514c.jpg', '2020-04-25'),
(254, 60, '20328149', 'd6f7058f3c63a86496e42dbad6df493c.jpg', '2020-04-25'),
(255, 60, '20328149', 'acc9ff951b9bee0854df4ab82bc9560c.jpg', '2020-04-25'),
(256, 61, '20341141', '0fddcb3df61bd5f564ba6c7c805683d3.jpg', '2020-04-25'),
(257, 61, '20341141', 'f9bba0ce287319ada0187f72ca325ae9.jpg', '2020-04-25'),
(258, 61, '20341141', '1c3869ae29135f6a61e0de331daae1de.jpg', '2020-04-25'),
(259, 61, '20341141', '19080076ae149c7150c9f8a0910abab7.jpg', '2020-04-25'),
(260, 62, '69827628', '618dd248687925862fd6f9eb7984b2ab.jpg', '2020-04-25'),
(261, 62, '69827628', '4ecbddabe5c38b584f7a130d13fb27a7.jpg', '2020-04-25'),
(262, 62, '69827628', 'f016ad6f3ebb0fe74476e605e32198a9.jpg', '2020-04-25'),
(263, 62, '69827628', '2801a034abf218d4ca3ccbf1dd109d2b.jpg', '2020-04-25'),
(264, 62, '69827628', 'fdd64e29560a492e5a40f24a5adb3685.jpg', '2020-04-25'),
(265, 62, '69827628', '15bb9251181f40e04f01fd7716dc9190.jpg', '2020-04-25'),
(266, 62, '69827628', '091113f81bb6686376803a9057550646.jpg', '2020-04-25'),
(267, 62, '69827628', '78ca8014202cc25a48ee2cddbab354ab.jpg', '2020-04-25'),
(268, 62, '69827628', '59aae3bc3461bf38a45fd7cc300920e7.jpg', '2020-04-25'),
(269, 63, '20341142', 'bfccb02dc68401ca024c76fb80ceffbe.jpg', '2020-04-25'),
(270, 63, '20341142', '85efc6676f748ed1d9de2cfcddd69ac0.jpg', '2020-04-25'),
(271, 63, '20341142', 'c965cc7f8ff7a0b6cbcdab6ca1ec04d5.jpg', '2020-04-25'),
(272, 63, '20341142', '0f2f8f47c66ea8a32e0d450ec1235ad4.jpg', '2020-04-25'),
(273, 63, '20341142', 'a08fdb512b7752870b25b7239e93c610.jpg', '2020-04-25'),
(274, 64, '20328115', '0bf0a589c45e460dc83c4593f16227e4.jpg', '2020-04-25'),
(275, 64, '20328115', '656e13ea0a10072cfad85e1a1162d9aa.jpg', '2020-04-25'),
(276, 64, '20328115', 'ebdfab9642c549a6f82b7ceab3a025a9.jpg', '2020-04-25'),
(277, 65, '20351974', 'de7f296a10846d1ddb6d0b6cf1f25c89.jpg', '2020-04-25'),
(278, 65, '20351974', 'e164a88e1b3c05df75868c1f3c8bab76.jpg', '2020-04-25'),
(279, 65, '20351974', '4372aae40acc77a3cfc056b2a4be2b6a.jpg', '2020-04-25'),
(280, 65, '20351974', '07fd779f4d57b19b8b89ed70dc102b69.jpg', '2020-04-25'),
(281, 65, '20351974', '5d71d195a92844cbdd247f7daa11bb9d.jpg', '2020-04-25'),
(282, 65, '20351974', '36651105b4df3055a6560f1500bab8aa.jpg', '2020-04-25'),
(283, 65, '20351974', '6e3f6e2993e7c862cf1c94123a69cd71.jpg', '2020-04-25'),
(284, 65, '20351974', '2a151a5fb5a87966e0e4a6aacec90f25.jpg', '2020-04-25'),
(285, 65, '20351974', 'e1cf6ff12261d2caaeee8af027c21b1b.jpg', '2020-04-25'),
(286, 66, '20328110', '46c7f050a935ddadc8d85894a206ccd4.jpg', '2020-04-25'),
(287, 66, '20328110', '45578f8a19836d5d6bb13d501d16de40.jpg', '2020-04-25'),
(288, 66, '20328110', '31f7d052f3d86240247bda537d63cc45.jpg', '2020-04-25'),
(289, 67, '20328114', 'a8febff16b3dcce2cc5e19da5ffa014e.jpg', '2020-04-25'),
(290, 67, '20328114', '24631e2f1f005fdae3af10e70a11c5ef.jpg', '2020-04-25'),
(291, 67, '20328114', '136d0b20861a8359419d601d9d73ef70.jpg', '2020-04-25'),
(292, 68, '20328132', '7dc00e692d9209612e344a73898cccb3.jpg', '2020-04-25'),
(293, 68, '20328132', '53b2c4218f6678905f50b5ad1612fcb0.jpg', '2020-04-25'),
(294, 68, '20328132', 'd2b40c0d1ebc7a1bd5121c69560989b0.jpg', '2020-04-25'),
(295, 68, '20328132', '827c2263db6dc49e82fe2d05aa3dcf7d.jpg', '2020-04-25'),
(296, 68, '20328132', 'cc45d430de32d8237d1fbf9e539fdfb1.jpg', '2020-04-25'),
(297, 69, '20328117', '287214f8ad87d16b8444b88ec603722f.jpg', '2020-04-25'),
(298, 69, '20328117', '8c66dad181767ff867d20d84d831880f.jpg', '2020-04-25'),
(299, 69, '20328117', 'f4bb9e066a4b94589c1a6e4fa7340d2a.jpg', '2020-04-25'),
(300, 69, '20328117', '4608c2c0fff4c89dec1af2306fc38e6c.jpg', '2020-04-25'),
(301, 69, '20328117', 'a69ad7b8c224ea80645d32d3d7386ec5.jpg', '2020-04-25'),
(302, 69, '20328117', '3908aca67605d91ef0457696fd913e23.jpg', '2020-04-25'),
(303, 69, '20328117', 'b81193972d17eaf255ac1f715cae1f56.jpg', '2020-04-25'),
(304, 69, '20328117', 'db7d3aad761aac8e45309b708124ca30.jpg', '2020-04-25'),
(305, 69, '20328117', 'b7b89f70fb2d68311a7bc542aac7f57b.jpg', '2020-04-25'),
(306, 69, '20328117', 'd7ba2ee7d13b230381bf880cd019e948.jpg', '2020-04-25'),
(307, 69, '20328117', 'ac52fc7bee24b8561176687492437b55.jpg', '2020-04-25'),
(308, 69, '20328117', '7f08c9b1f412fde02d601b232205a12b.jpg', '2020-04-25'),
(309, 70, '20328120', '1c63c317d10f631675226b1b9c67aa4f.jpg', '2020-04-25'),
(310, 70, '20328120', '37f26bec66f7e8fa3b6d446461aae8ce.jpg', '2020-04-25'),
(311, 70, '20328120', 'ca8c0409c96b357d07c767962e156910.jpg', '2020-04-25'),
(312, 71, '20362528', 'c73ca0b3e25d0b09af015587e3433d1b.jpg', '2020-04-25'),
(313, 71, '20362528', 'd4f9f2612e393b0bf036b8b05abd9e51.jpg', '2020-04-25'),
(314, 72, '20328106', 'f9f6062bf0229802d5002c3673e35236.jpg', '2020-04-25'),
(315, 72, '20328106', 'cb3c2aa9a710ca5141332c9a6e475834.jpg', '2020-04-25'),
(316, 72, '20328106', 'ee1c89974f67fcafa6e730c25428b2b1.jpg', '2020-04-25'),
(317, 72, '20328106', 'feef56ccb356bf6e00d0da98678a3fa0.jpg', '2020-04-25'),
(318, 72, '20328106', '6a56db75f3091aae227d9e3cfa1e2e54.jpg', '2020-04-25'),
(319, 72, '20328106', 'c1e970cadff906d1748e87b792e27db3.jpg', '2020-04-25'),
(320, 72, '20328106', '7a5845f33306a6fb890e0a6ff4a5340c.jpg', '2020-04-25'),
(321, 73, '20327974', 'cfefc99169e193bedce55f11937b1fcf.jpg', '2020-04-25'),
(322, 73, '20327974', 'c76fb7779fbdac86052d6cd8bd8f6664.jpg', '2020-04-25'),
(323, 73, '20327974', '9b38232896b9605ebb15d705d74cfd6e.jpg', '2020-04-25'),
(324, 73, '20327974', 'a02ab9160cff75a74d744840449db8ba.jpg', '2020-04-25'),
(325, 73, '20327974', 'cba3aaa2c36f5fb98d8618c7713e245b.jpg', '2020-04-25'),
(326, 73, '20327974', '2a46c23f3133ba2f787842a56768510e.jpg', '2020-04-25'),
(327, 73, '20327974', '56b117d61add2b4e873bdc952632095c.jpg', '2020-04-25'),
(328, 74, '20331830', 'f499d159ece402f6ab5543a929db61d5.jpg', '2020-04-25'),
(329, 74, '20331830', '6b1f166d99c9424c12a51ceec950d02c.jpg', '2020-04-25'),
(330, 74, '20331830', '4675a103a95fabf9670c8e2a97e6680c.jpg', '2020-04-25'),
(331, 74, '20331830', '7eb352981e8773df67776262dd8de5eb.jpg', '2020-04-25'),
(332, 75, '20328133', 'b4b915d6568655296d6e83edc38107cd.jpg', '2020-04-25'),
(333, 75, '20328133', '673b223036cf995b7a5bdcdf655591d5.jpg', '2020-04-25'),
(334, 75, '20328133', 'ade6213e5515b61812daf863f64c4dbc.jpg', '2020-04-25'),
(335, 76, '20328124', '838336ad0661e1cc6f7bdb71c1644a2d.jpg', '2020-04-25'),
(336, 76, '20328124', '042e6d36ee1183c0ee20641c6431e126.jpg', '2020-04-25'),
(337, 76, '20328124', '600b01d69d6c2c83f5f47a84194b63f5.jpg', '2020-04-25'),
(338, 76, '20328124', '9c175833a25ef99c1f542ac4d18b3809.jpg', '2020-04-25'),
(339, 77, '20328112', 'ec2dd7103f2adb63f2151e35f4b9112c.jpg', '2020-04-25'),
(340, 77, '20328112', '830b023825ad02ae60f800abc097a2e3.jpg', '2020-04-25'),
(341, 77, '20328112', 'bffabac13d9ef03f580ef45261e2f690.jpg', '2020-04-25'),
(342, 77, '20328112', '57e618425ec2a836ddc5eefd304efa8a.jpg', '2020-04-25'),
(343, 77, '20328112', '737db91148a42f6586a7bc2523031ef3.jpg', '2020-04-25'),
(344, 77, '20328112', '6a6f925970f3c0c814bb562b757caca4.jpg', '2020-04-25'),
(345, 78, '20328113', 'a936e4b00e41f7f0d6c786280196b618.jpg', '2020-04-25'),
(346, 78, '20328113', '5590fdb9c5e886eb8ff4d3bb1ab2c6e0.jpg', '2020-04-25'),
(347, 78, '20328113', '0ae011521ee67f71606ea62eec69ee69.jpg', '2020-04-25'),
(348, 78, '20328113', '8d2c910fe6e36863186e2db7ac9a1647.jpg', '2020-04-25'),
(349, 78, '20328113', '28f37bbb47c6129d5c62cb067fb94ac9.jpg', '2020-04-25'),
(350, 78, '20328113', '1af186a2b81842e0d4eae1a762944c90.jpg', '2020-04-25'),
(351, 79, '20328156', '3cf22021f4b09f005b387cf988f06ace.jpg', '2020-04-25'),
(352, 79, '20328156', '95d11324b421221514c1c247aeba010e.jpg', '2020-04-25'),
(353, 79, '20328156', '9f2cdddc32df78a3093e89978e578822.jpg', '2020-04-25'),
(354, 79, '20328156', '57b8f67b05412bd469449cf48050364d.jpg', '2020-04-25'),
(355, 80, '20328131', '82fbc803849d4807ba75ab2d7cb490b9.jpg', '2020-04-25'),
(356, 80, '20328131', '8295a93ba04f01d681ecaa7ca18a5033.jpg', '2020-04-25'),
(357, 80, '20328131', '273bc46c813c065a4e5eb7d5740eb8a1.jpg', '2020-04-25'),
(358, 81, '69867983', '63234e5ef0b354411b0638bd71274717.jpg', '2020-04-25'),
(359, 81, '69867983', '9a6e3e3e4a5d833f8225302c0c2a15e7.jpg', '2020-04-25'),
(360, 81, '69867983', '886679315a1684801c9747682d4ecc58.jpg', '2020-04-25'),
(361, 81, '69867983', 'ab5caff92f59817fd45bfe76dc9f56ae.jpg', '2020-04-25'),
(362, 81, '69867983', '3cd2f614e767489cfccf42d30816fbf4.jpg', '2020-04-25'),
(363, 81, '69867983', 'e7e11139357902fe8c9ec3a5cf865894.jpg', '2020-04-25'),
(364, 81, '69867983', '284a2e4a25adb0c4d2d69c8a4cd56ebd.jpg', '2020-04-25'),
(365, 81, '69867983', 'e00a1b606d86ecf3a1a08365817825fc.jpg', '2020-04-25'),
(366, 81, '69867983', '0043fb10ace1cbe9d05565cab5f546c4.jpg', '2020-04-25'),
(367, 81, '69867983', 'd388d2a64703d95fce0d8a06e9ae5929.jpg', '2020-04-25'),
(368, 82, '20328148', '2bf86eaa67fcced79d3ed6b8bcf724c8.jpg', '2020-04-25'),
(369, 83, '20328107', '65cd9a98c0c90adebf80be91f9d75ed2.jpg', '2020-04-25'),
(370, 83, '20328107', '28dddd8c1621bd37fda60151f8cf30c6.jpg', '2020-04-25'),
(371, 83, '20328107', 'f71af083f17683c111973dbcea0bf102.jpg', '2020-04-25'),
(372, 83, '20328107', '7f1ea864883f0b75cf4ca92e7d076751.jpg', '2020-04-25'),
(373, 83, '20328107', 'ba429fa09585e18a9dfb1de7affa35fb.jpg', '2020-04-25'),
(374, 83, '20328107', 'a1c7ba5ea82dc9c2ca1ba7eeb0480d2a.jpg', '2020-04-25'),
(375, 83, '20328107', '2e7fb8c1396ba7803c7e6c4748b6e56c.jpg', '2020-04-25'),
(376, 83, '20328107', '570522e43ec94ce0a0f337d46b51044e.jpg', '2020-04-25'),
(377, 84, '20328125', '050410c14b45853950f5956b2e291d8d.jpg', '2020-04-25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenjang`
--

DROP TABLE IF EXISTS `jenjang`;
CREATE TABLE IF NOT EXISTS `jenjang` (
  `jenjang_id` int(11) NOT NULL AUTO_INCREMENT,
  `jenjang_nama` varchar(250) NOT NULL,
  `jenjang_singkatan` varchar(150) NOT NULL,
  PRIMARY KEY (`jenjang_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenjang`
--

INSERT INTO `jenjang` (`jenjang_id`, `jenjang_nama`, `jenjang_singkatan`) VALUES
(1, 'Sekolah Dasar', 'SD'),
(2, 'Sekolah Menengah Pertama', 'SMP'),
(3, 'Sekolah Menengah Atas', 'SMA'),
(4, 'Sekolah Menengah Kejuruan', 'SMK');

-- --------------------------------------------------------

--
-- Struktur dari tabel `layer`
--

DROP TABLE IF EXISTS `layer`;
CREATE TABLE IF NOT EXISTS `layer` (
  `layer_id` int(11) NOT NULL AUTO_INCREMENT,
  `layer_nama` varchar(20) NOT NULL,
  `layer_warna` varchar(8) NOT NULL,
  `layer_file` varchar(250) NOT NULL,
  PRIMARY KEY (`layer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `layer`
--

INSERT INTO `layer` (`layer_id`, `layer_nama`, `layer_warna`, `layer_file`) VALUES
(1, 'Batas Provinsi Jawa', '#505759', 'c1c4b34e4938f3ed5b2f5f7accb96d13.geojson'),
(2, 'Batas Kota Surakarta', '#6512f7', '855d04051dd846491a526c977cec129c.geojson'),
(3, 'Batas Kecamatan', '#34aa07', '201f03756cec399491d92571a66af23e.geojson'),
(4, 'Batas Desa Surakarta', '#006fce', 'e8f02b64e2ccdb2d75f082992699f0cd.geojson');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sekolah`
--

DROP TABLE IF EXISTS `sekolah`;
CREATE TABLE IF NOT EXISTS `sekolah` (
  `sekolah_id` int(11) NOT NULL AUTO_INCREMENT,
  `sekolah_jenjang` int(11) NOT NULL,
  `sekolah_npsn` int(10) NOT NULL,
  `sekolah_nama` varchar(250) NOT NULL,
  `sekolah_akreditasi` varchar(250) NOT NULL,
  `sekolah_kepala` varchar(250) NOT NULL,
  `sekolah_operator` varchar(250) NOT NULL,
  `sekolah_kurikulum` varchar(250) NOT NULL,
  `sekolah_penyelenggaraan` varchar(250) NOT NULL,
  `sekolah_ruangkelas` int(11) NOT NULL,
  `sekolah_laboratorium` int(11) NOT NULL,
  `sekolah_perpustakaan` int(11) NOT NULL,
  `sekolah_sanitasisiswa` int(11) NOT NULL,
  `sekolah_internet` enum('true','false') NOT NULL,
  `sekolah_listrik` enum('true','false') NOT NULL,
  `sekolah_dayalistrik` int(11) NOT NULL,
  `sekolah_luastanah` int(11) NOT NULL,
  `sekolah_guru` int(11) NOT NULL,
  `sekolah_siswalk` int(11) NOT NULL,
  `sekolah_siswapr` int(11) NOT NULL,
  `sekolah_rombonganbelajar` int(11) NOT NULL,
  `sekolah_status` enum('negeri','swasta') NOT NULL,
  `sekolah_alamat` varchar(250) NOT NULL,
  `sekolah_rtrw` varchar(250) NOT NULL,
  `sekolah_dusun` varchar(250) NOT NULL,
  `sekolah_kelurahan` varchar(250) NOT NULL,
  `sekolah_kecamatan` varchar(250) NOT NULL,
  `sekolah_kabupaten` varchar(250) NOT NULL,
  `sekolah_provinsi` varchar(250) NOT NULL,
  `sekolah_kodepos` int(11) NOT NULL,
  `sekolah_email` varchar(250) NOT NULL,
  `sekolah_website` varchar(250) NOT NULL,
  `sekolah_lokasi` geometry NOT NULL,
  PRIMARY KEY (`sekolah_id`),
  KEY `sekolah_jenjang` (`sekolah_jenjang`)
) ENGINE=InnoDB AUTO_INCREMENT=85 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sekolah`
--

INSERT INTO `sekolah` (`sekolah_id`, `sekolah_jenjang`, `sekolah_npsn`, `sekolah_nama`, `sekolah_akreditasi`, `sekolah_kepala`, `sekolah_operator`, `sekolah_kurikulum`, `sekolah_penyelenggaraan`, `sekolah_ruangkelas`, `sekolah_laboratorium`, `sekolah_perpustakaan`, `sekolah_sanitasisiswa`, `sekolah_internet`, `sekolah_listrik`, `sekolah_dayalistrik`, `sekolah_luastanah`, `sekolah_guru`, `sekolah_siswalk`, `sekolah_siswapr`, `sekolah_rombonganbelajar`, `sekolah_status`, `sekolah_alamat`, `sekolah_rtrw`, `sekolah_dusun`, `sekolah_kelurahan`, `sekolah_kecamatan`, `sekolah_kabupaten`, `sekolah_provinsi`, `sekolah_kodepos`, `sekolah_email`, `sekolah_website`, `sekolah_lokasi`) VALUES
(1, 3, 20327966, 'SMAN 1 SURAKARTA', 'A', 'Harminingsih', 'Thoyibatul Musangadah', 'K-13', 'Sehari Penuh/5h', 33, 8, 1, 6, 'true', 'true', 190000, 7105, 64, 436, 688, 33, 'negeri', 'JL. MONGINSIDI NO. 40', '1 / 12', 'Gilingan', 'Gilingan', 'Banjarsari', 'Kota Surakarta', 'Jawa Tengah', 57134, 'SURAT@SMAN1-SLO.SCH.ID', 'http://SMAN1-SLO.SCH.ID', 0x000000000101000000000060e624b55b401bc1935f543b1ec0),
(2, 3, 20327968, 'SMAN 3 SURAKARTA', 'A', 'Agung Wijayanto', 'Jumari', 'K-13', 'Sehari Penuh/5h', 38, 6, 2, 2, 'true', 'true', 147000, 5000, 65, 447, 680, 34, 'negeri', 'Jl. Prof. W.Z. Johanes no 58', '1 / 6', 'Purwodiningratan', 'Purwodiningratan', 'Jebres', 'Kota Surakarta', 'Jawa Tengah', 57128, 'kepsek@sman3-slo.sch.id', 'http://sman3-slo.sch.id', 0x0000000001010000004a00a076ccb55b40828c06e331421ec0),
(3, 3, 20327969, 'SMAN 4 SURAKARTA', 'A', 'Adkha Dewi Gayatri', 'Argo Prakoso', 'K-13', 'Sehari Penuh/5h', 35, 5, 1, 23, 'true', 'true', 220000, 435, 63, 425, 692, 33, 'negeri', 'JL. LU. ADI SUCIPTO NO. 1', '0 / 0', '-', 'MANAHAN', 'Banjarsari', 'Kota Surakarta', 'Jawa Tengah', 57139, 'mail@smaracatur.sch.id', 'http://smaracatur.sch.id', 0x000000000101000000000060765ab35b40925f4edceb381ec0),
(4, 3, 20327971, 'SMAN 6 SURAKARTA', 'A', 'Narman', 'Kristiawan Adi Purnomo', 'K-13', 'Sehari Penuh/5h', 33, 5, 2, 1, 'true', 'true', 36000, 37640, 57, 442, 700, 33, 'negeri', 'JL. MR. SARTONO NO. 30', '6 / 24', '-', 'Nusukan', 'Banjarsari', 'Kota Surakarta', 'Jawa Tengah', 57135, 'info@sman6surakarta.sch.id', 'http://www.sman6surakarta.sch.id', 0x0000000001010000000100c07139b55b40ee211f5a41331ec0),
(5, 3, 20327967, 'SMAN 2 SURAKARTA', 'A', 'Maryadi', 'Ahmad Paryanta', 'K-13', 'Sehari Penuh/5h', 34, 4, 1, 1, 'true', 'true', 66000, 6454, 63, 365, 637, 30, 'negeri', 'JL. MONGINSIDI NO. 40', '1 / 4', 'Margoyudan', 'GILINGAN', 'Banjarsari', 'Kota Surakarta', 'Jawa Tengah', 57134, 'smada@sman2solo.sch.id', 'http://www.sman2solo.sch.id', 0x0000000001010000000200e0a224b55b40b50c774d9f3b1ec0),
(6, 3, 20327970, 'SMAN 5 SURAKARTA', 'A', 'Endang Purwaningsih Agustina', 'SUGENG TRI HANDONO', 'K-13', 'Sehari Penuh/5h', 31, 8, 1, 8, 'true', 'true', 88000, 2000, 61, 360, 619, 30, 'negeri', 'JL. LETJEND. SUTOYO NO. 18', '6 / 24', 'BIBIS BARU', 'NUSUKAN', 'Banjarsari', 'Kota Surakarta', 'Jawa Tengah', 57135, 'sma5ska@yahoo.com', 'http://www.sma5solo.sch.id', 0x0000000001010000000100000e21b55b407fdb820968331ec0),
(7, 3, 20327972, 'SMAN 7 SURAKARTA', 'A', 'Adkha Dewi Gayatri', 'Sriyatno SE', 'K-13', 'Sehari Penuh/5h', 30, 4, 1, 0, 'true', 'true', 66000, 7698, 47, 446, 602, 29, 'negeri', 'JL. MUH. YAMIN 79', '6 / 4', 'TIPES', 'TIPES', 'Serengan', 'Kota Surakarta', 'Jawa Tengah', 57174, 'sman7slo@gmail.com', 'http://www.sman7-slo.sch.id', 0x00000000010100000001000028dbb35b4093b81c9e174d1ec0),
(8, 3, 20327973, 'SMAN 8 SURAKARTA', 'A', 'Daryanto', 'Indra Rahadi', 'K-13', 'Sehari Penuh/5h', 22, 1, 1, 0, 'false', 'true', 56000, 37986, 65, 446, 602, 33, 'negeri', 'JL. SUMBING VI/49', '0 / 0', '-', 'MOJOSONGO', 'Jebres', 'Kota Surakarta', 'Jawa Tengah', 57127, 'sman8solo@gmail.com', 'http://sman8solo.sch.id', 0x0000000001010000000200c02d4fb65b40243ad638912f1ec0),
(9, 3, 69949652, 'SMA Muhammadiyah Program Khusus Kottabarat Surakarta', 'A', 'Hendro Susilo', 'Diyan Nur Arifin, A.Md', 'K-13', 'Pagi/6h', 6, 1, 1, 0, 'true', 'true', 33000, 3364, 17, 76, 51, 6, 'swasta', 'Jl. Pleret Raya Sumber', '6 / 7', 'Sumber', 'Sumber', 'Banjarsari', 'Kota Surakarta', 'Jawa Tengah', 57138, 'smamuhpk@gmail.com', 'https://sma.muhpksolo.sch.id', 0x000000000101000000010020d23eb35b4049d0ddcabb2b1ec0),
(10, 3, 20330346, 'SMAS AL ISLAM 1 SURAKARTA', 'A', 'Umi Faizah', 'Sur\'an,S.Pd.I', 'K-13', 'Pagi/6h', 30, 5, 1, 2, 'true', 'true', 130000, 8000, 65, 400, 557, 30, 'swasta', 'JL. HONGGOWONGSO NO. 94', '2 / 7', '-', 'Panularan', 'Laweyan', 'Kota Surakarta', 'Jawa Tengah', 57149, 'smulsa.alislam@gmail.com', 'http://www.smulsa.sch.id', 0x000000000101000000010040ac34b45b4069e599562b4c1ec0),
(11, 3, 20327940, 'SMAS BATIK 2 SURAKARTA', 'A', 'Joko Sumarsono', 'DADANG YHAN EDY H', 'K-13', 'Sehari Penuh/5h', 24, 4, 1, 3, 'false', 'true', 34999, 1250, 33, 370, 371, 22, 'swasta', 'JL. SAM RATULANGI NO. 86', '3 / 6', 'Kerten', 'Kerten', 'Laweyan', 'Kota Surakarta', 'Jawa Tengah', 57146, 'smabatik2@yahoo.co.id', 'http://www.smabatik2solo.sch.id', 0x0000000001010000000200e0c4d7b25b40e57a1122483d1ec0),
(12, 3, 20327962, 'SMAS KRISTEN 2 SURAKARTA', 'A', 'Bambang Suwito', 'Bibit Supriyanto', '-', '-', 7, 1, 1, 0, 'true', 'true', 3000, 4000, 0, 0, 0, 0, 'swasta', 'JL. ABDUL MUIS NO. 45', '1 / 2', 'Setabelan', 'Setabelan', 'Banjarsari', 'Kota Surakarta', 'Jawa Tengah', 57133, 'sma_kristen_dua@yahoo.com', '-', 0x0000000001010000000200e0a90eb55b402a500a75a03e1ec0),
(13, 3, 69950487, 'SMAS BINA WIDYA SOLO', 'B', 'Hapsoro', 'ANITA SUKARINI', 'K-13', 'Sehari Penuh/5h', 5, 5, 1, 2, 'false', 'true', 44000, 3716, 11, 16, 14, 5, 'swasta', 'Jl. HOS Cokroaminoto No. 18', '1 / 5', 'Pucangsawit', 'Pucangsawit', 'Jebres', 'Kota Surakarta', 'Jawa Tengah', 57125, 'smabinawidyasolo@gmail.com', '-', 0x000000000101000000010040d743b65b40f8949372f4451ec0),
(14, 3, 20327944, 'SMAS ISLAM 1 SURAKARTA', 'A', 'Sudadi Wahyono', 'Imam Muhtraom', 'K-13', 'Sehari Penuh/5h', 22, 3, 1, 0, 'true', 'true', 22000, 3093, 20, 86, 129, 9, 'swasta', 'JL. BRIGJEN SUDIARTO 151', '4 / 12', 'Joyosuran', 'Joyosuran', 'Pasarkliwon', 'Kota Surakarta', 'Jawa Tengah', 57116, 'sma_islam_1@yahoo.com', 'http://www.smaistuka.sch.id', 0x00000000010100000001002071bcb45b4023ed1547ac5b1ec0),
(15, 3, 20327987, 'SMAS REGINA PACIS SURAKARTA', 'A', 'Maria Budi Priyarti', 'Theresia Erwinda Deni Nawang Wulan', 'K-13', 'Sehari Penuh/5h', 33, 5, 1, 1, 'true', 'true', 184000, 25200, 59, 333, 565, 30, 'swasta', 'JL. LU. ADI SUCIPTO NO. 45', '1 / 10', '-', 'Kerten', 'Laweyan', 'Kota Surakarta', 'Jawa Tengah', 57143, 'smareginapacissolo@gmail.com', 'http://smareginapacis-solo.sch.id', 0x0000000001010000000000009cefb25b400ea8570c19361ec0),
(16, 3, 20327975, 'SMAS Tunas Pembangunan 1 Surakarta', 'C', 'Eko Sarimo', 'CURIE MUSTIKAWATI', '-', '-', 3, 4, 1, 0, 'true', 'true', 900, 2227, 0, 0, 0, 0, 'swasta', 'JL. KRAKATAU UTARA NO. 1/6', '6 / 24', 'bibisbaru', 'Nusukan', 'Banjarsari', 'Kota Surakarta', 'Jawa Tengah', 57135, 'smatp1solo@yahoo.co.id', '-', 0x0000000001010000000100a03040b55b400b3c9b8649341ec0),
(17, 3, 20327946, 'SMAS KRISTEN 1 SURAKARTA', 'A', 'Sri Hery Setiobudi', 'Bhakti Mahargyadi', 'K-13', 'Siang/6h', 13, 5, 1, 2, 'true', 'true', 12500, 4595, 24, 129, 152, 11, 'swasta', 'JL. HONGGOWONGSO NO. 135', '2 / 4', 'Kratonan', 'Kratonan', 'Serengan', 'Kota Surakarta', 'Jawa Tengah', 57153, 'smakristen1surakarta@yahoo.co.id', 'http://www.smakristen1surakarta.sch.id', 0x000000000101000000010000c62db45b402aed689ec14f1ec0),
(18, 3, 20327979, 'SMAS MTA SURAKARTA', 'A', 'Diastono', 'Ubaydillah', 'K-13', 'Pagi/6h', 36, 4, 2, 2, 'true', 'true', 35000, 4744, 67, 502, 659, 36, 'swasta', 'JL. KYAI MOJO', '1 / 5', 'Semanggi', 'Semanggi', 'Pasarkliwon', 'Kota Surakarta', 'Jawa Tengah', 57117, 'info@smamta-ska.sch.id', 'http://www.smamta-ska.sch.id', 0x0000000001010000000000007b86b55b40d367624fc5581ec0),
(19, 3, 20327980, 'SMAS MUHAMMADIYAH 1 SURAKARTA', 'A', 'Rahayuningsih', 'Putri Safitri', 'K-13', 'Sehari Penuh/5h', 22, 4, 1, 2, 'true', 'true', 84000, 750, 45, 385, 335, 22, 'swasta', 'JL. RADEN MAS SAID NO.35', '1 / 9', '-', 'Ketelan', 'Banjarsari', 'Kota Surakarta', 'Jawa Tengah', 57132, 'smamuh1solo@smamuh1solo.sch.id', 'http://smamuh1solo.sch.id', 0x0000000001010000000100006b97b45b40b3f0f5093d421ec0),
(20, 3, 20340947, 'SMAS PELITA NUSANTARA KASIH', 'A', 'Agus Sugijanto', 'Christien Yuliawati Edhy', 'K-13', 'Sehari Penuh/5h', 6, 3, 1, 1, 'false', 'true', 13000, 1225, 11, 37, 44, 6, 'swasta', 'JL. SURYA NO. 54-56', '3 / 5', '-', 'Purwodiningratan', 'Jebres', 'Kota Surakarta', 'Jawa Tengah', 57128, 'info@pelitanusantarakasih.sch.id', 'http://www.pelitanusantarakasih.sch.id', 0x0000000001010000000000e03aaab55b40088ffd49d4421ec0),
(21, 3, 69967607, 'SMA AL-AZHAR SYIFA BUDI SOLO', 'A', 'Masykur Fitriawan', 'Hadi Kurnianto', 'K-13', 'Sehari Penuh/5h', 7, 5, 1, 2, 'true', 'true', 41000, 1714, 11, 56, 47, 7, 'swasta', 'JL. RM. SAID NO. 232', '6 / 3', 'Sidorejo', 'Mangkubumen', 'Banjarsari', 'Kota Surakarta', 'Jawa Tengah', 57139, 'admin@smaasbsolo.sch.id', 'http://www.smaasbsolo.sch.id', 0x0000000001010000000200c02ef6b35b401bd5487818391ec0),
(22, 3, 20327936, 'SMAS AL MUAYYAD SURAKARTA', 'B', 'Suranto', 'Syarifudin', 'K-13', 'Pagi/6h', 6, 3, 1, 1, 'false', 'true', 3500, 4190, 18, 51, 102, 6, 'swasta', 'JL. KH. SAMANHUDI NO. 64', '5 / 2', 'Mangkuyudan', 'Purwosari', 'Laweyan', 'Kota Surakarta', 'Jawa Tengah', 57142, 'sma.almuayyad@gmail.com', 'http://www.sma-almuayyad.sch.id', 0x000000000101000000020060be3fb35b40abd032fff4441ec0),
(23, 3, 20327945, 'SMAS ISLAM DIPONEGORO', 'A', 'Ahmadi', 'Amalia Safitri, S.Psi.', 'K-13', 'Pagi/6h', 6, 2, 1, 0, 'true', 'true', 13500, 943, 16, 0, 83, 6, 'swasta', 'JL. SERAYU VIII NO. 2', '4 / 16', 'Semanggi', 'Pasar Kliwon', 'Pasarkliwon', 'Kota Surakarta', 'Jawa Tengah', 57117, 'smaislamdiponegoro@yahoo.com', 'http://www.ypid.or.id', 0x000000000101000000000060d940b55b40e4a6c744c7521ec0),
(24, 3, 20327982, 'SMAS MUHAMMADIYAH 3 SURAKARTA', 'A', 'Madiyono', 'PURWADI', 'K-13', 'Sehari Penuh/5h', 9, 5, 1, 2, 'true', 'true', 7500, 1230, 14, 50, 52, 6, 'swasta', 'JL. KOL. SUTARTO NO. 62', '3 / 6', 'TEGALBARU', 'Jebres', 'Jebres', 'Kota Surakarta', 'Jawa Tengah', 57126, 'smamuhtigasolo@ymail.com', '-', 0x0000000001010000000000e0b600b65b40ce1f2c7a033d1ec0),
(25, 3, 20327935, 'SMAS BATIK 1 SURAKARTA', 'A', 'Literzet Sobri', 'Tomy Istanto', 'K-13', 'Sehari Penuh/5h', 30, 4, 1, 2, 'true', 'true', 60000, 4024, 54, 612, 610, 30, 'swasta', 'JL. SLAMET RIYADI NO. 445', '1 / 10', '-', 'Pajang', 'Laweyan', 'Kota Surakarta', 'Jawa Tengah', 57146, 'smaba1_solo@yahoo.com', 'http://www.smubatik1-slo.sch.id', 0x0000000001010000000000e0bfa0b25b403e5feaf9e13e1ec0),
(26, 3, 20327981, 'SMAS MUHAMMADIYAH 2 SURAKARTA', 'A', 'Sri Darwati', 'Saiful Bahri', 'K-13', 'Sehari Penuh/5h', 12, 4, 1, 10, 'true', 'true', 21000, 1666, 19, 78, 135, 9, 'swasta', 'JL. YOSODIPURO NO. 95', '0 / 0', 'Mangkubumen', 'Mangkubumen', 'Banjarsari', 'Kota Surakarta', 'Jawa Tengah', 57139, 'smamuh2ska@gmail.com', 'http://smamuh2ska.sch.id', 0x000000000101000000010080451fb45b40760a3f20d7401ec0),
(27, 3, 20327976, 'SMAS TRI PUSAKA SURAKARTA', 'C', 'Joko Tri Haryanto', 'Sari Wahono', 'K-13', '-', 3, 1, 1, 1, 'true', 'true', 1500, 5373, 0, 11, 1, 1, 'swasta', 'JL. KOLONEL SUTARTO 77', '2 / 25', 'Tegal Kuniran', 'Jebres', 'Jebres', 'Kota Surakarta', 'Jawa Tengah', 57126, 'smatripusaka@ymail.com', '-', 0x0000000001010000000000e02d99b55b4023be510de83f1ec0),
(28, 3, 20327964, 'SMAS WARGA SURAKARTA', 'A', 'Purwoto', 'Rony Rinegar Christiawan, S.Kom.', 'K-13', 'Pagi/6h', 18, 4, 1, 2, 'true', 'true', 23000, 5100, 28, 155, 226, 14, 'swasta', 'JL. MONGINSIDI NO. 17', '5 / 5', '-', 'Tegalharjo', 'Jebres', 'Kota Surakarta', 'Jawa Tengah', 57128, 'sma.warga@yahoo.com', 'http://www.smawarga.sch.id', 0x0000000001010000000100806846b55b40d353b3b7e23c1ec0),
(29, 3, 69823287, 'SMA AL-ABIDIN BILINGUAL BOARDING SCHOOL', 'A', 'Imam Samodra', 'Syih Almayanti', 'K-13', 'Pagi/6h', 30, 2, 1, 2, 'false', 'true', 32998, 683, 48, 304, 427, 22, 'swasta', 'JL. TARUMANEGARA 3', '3 / 6', 'Dukuhan', 'Banyuanyar', 'Banjarsari', 'Kota Surakarta', 'Jawa Tengah', 57137, 'abbs@alabidin.sch.id', 'http://abbs.alabidin.sch.id', 0x000000000101000000010020679ab35b40c73739bd87261ec0),
(30, 3, 20330347, 'SMAS MUHAMMADIYAH 6 SURAKARTA', 'B', 'Muhammad Syaiful Syahri', 'Muh Adib Sutyaji', 'K-13', 'Sehari Penuh/5h', 6, 1, 1, 2, 'false', 'true', 2200, 465, 10, 17, 16, 6, 'swasta', 'JL. BANYUANYAR DALAM', '2 / 12', 'Banyuanyar', 'Banyuanyar', 'Banjarsari', 'Kota Surakarta', 'Jawa Tengah', 57137, 'smamuh6slo@yahoo.com', '-', 0x0000000001010000000000e0e47ab35b405da46923d6281ec0),
(31, 3, 20327986, 'SMAS PANGUDI LUHUR ST, YOSEF', 'A', 'Stephanus Ngadenan', 'SUSILO BUDI NOVIANTO', 'K-13', 'Sehari Penuh/5h', 24, 5, 1, 4, 'true', 'true', 66000, 30070, 40, 298, 307, 18, 'swasta', 'JL. LU. ADISUCIPTO (JL. KELENGKENG 1)', '2 / 8', '-', 'Kerten', 'Laweyan', 'Kota Surakarta', 'Jawa Tengah', 57143, 'styosef@pangudiluhur.org', 'http://styosef.pangudiluhur.org', 0x0000000001010000000100a02106b35b40b01ef219ff341ec0),
(32, 3, 20327988, 'SMAS SANTO PAULUS SURAKARTA', 'A', 'Theresia Suharyanti', 'Topo Susilo, S.Pd', 'K-13', 'Sehari Penuh/5h', 6, 1, 1, 1, 'true', 'true', 5500, 1600, 7, 5, 3, 3, 'swasta', 'JL. DR. RAJIMAN NO 659 R', '1 / 6', '-', 'Pajang', 'Laweyan', 'Kota Surakarta', 'Jawa Tengah', 57146, 'toposusilo.80@gmail.com', 'http://www.smasantopaulussurakarta.blogspot.com', 0x0000000001010000000100c0cc59b25b4091ef823791481ec0),
(33, 3, 20327978, 'SMAS KRISTEN WIDYA WACANA', 'A', 'Agus Prasetyo', 'IGNATIUS SUPARJAN', 'K-13', 'Pagi/6h', 9, 4, 1, 2, 'true', 'true', 16500, 1823, 19, 62, 60, 7, 'swasta', 'Jl. MERTOLULUTAN No. 26', '1 / 4', '-', 'Purwodiningratan', 'Jebres', 'Kota Surakarta', 'Jawa Tengah', 57128, 'sma_widyawacanasolo@yahoo.com', 'http://smawidyawacanasolo.sch.id', 0x0000000001010000000100c09b96b55b4048fc1178e4431ec0),
(34, 3, 20327939, 'SMAS TUJUH BELAS SURAKARTA', 'C', 'Drs Lugiyem', 'Sri Subekti', 'K-13', 'Pagi/6h', 3, 0, 0, 0, 'true', 'true', 1300, 0, 4, 28, 3, 3, 'swasta', 'JL. R.M. SAID NO. 111', '3 / 4', 'Punggawan', 'Punggawan', 'Banjarsari', 'Kota Surakarta', 'Jawa Tengah', 57132, 'tujuhbelas_sma@yahoo.co.id', '-', 0x0000000001010000000100006d77b45b40c410e1c9a5411ec0),
(35, 3, 20330348, 'SMAS YOSODIPURO SURAKARTA', 'C', 'Dwi Hanawati', 'Ibnu Sudarmanto', 'K-13', 'Pagi/6h', 3, 0, 0, 0, 'true', 'true', 900, 0, 8, 19, 2, 3, 'swasta', 'JL. YOSODIPURO NO. 1', '3 / 3', '-', 'Timuran', 'Banjarsari', 'Kota Surakarta', 'Jawa Tengah', 57132, 'sma_yosodipurosolo@yahoo.com', '-', 0x00000000010100000001008080a7b45b40055f0329ac441ec0),
(36, 4, 20328109, 'SMKN 5 SURAKARTA', 'A', 'Edi Haryana', 'Cicik Heriyanto', 'K-13 Rev', 'Sehari Penuh/5h', 58, 4, 1, 6, 'false', 'true', 150000, 22530, 136, 2195, 56, 66, 'negeri', 'JL. LU. ADI SUCIPTO NO. 42', '2 / 8', 'Kerten', 'Kerten', 'Laweyan', 'Kota Surakarta', 'Jawa Tengah', 57143, 'info@smkn5solo.net', 'http://www.smkn5solo.sch.id', 0x000000000101000000020040f10eb35b408d3918f4e8351ec0),
(37, 4, 20328128, 'SMKN 6 SURAKARTA', 'A', 'Tenang Pranata', 'Ika Wahyu Septiawan', 'K-13 Rev', 'Sehari Penuh/5h', 32, 2, 1, 2, 'true', 'true', 172000, 13449, 71, 236, 1309, 45, 'negeri', 'JL. L.U. ADI SUCIPTO NO. 38', '0 / 0', 'Kerten', 'Kerten', 'Laweyan', 'Kota Surakarta', 'Jawa Tengah', 57143, 'smk6solo@gmail.com', 'http://www.smkn6solo.sch.id', 0x0000000001010000000100c0f520b35b40eabff97ce2361ec0),
(38, 4, 20328153, 'SMKN 7 SURAKARTA', 'B', 'Bangkit Budiarto', 'Yusnia Asriyatul Chusna', 'K-13 Rev', 'Sehari Penuh/5h', 39, 2, 1, 8, 'false', 'true', 115800, 18000, 81, 778, 753, 48, 'negeri', 'JL. JENDRAL AKHMAD YANI 374', '2 / 9', 'Kerten', 'Kerten', 'Laweyan', 'Kota Surakarta', 'Jawa Tengah', 57143, 'smkn7surakarta@gmail.com', 'http://www.smkn7surakarta.sch.id', 0x0000000001010000000100204814b35b406bc540120b381ec0),
(39, 4, 20328154, 'SMKN 8 SURAKARTA', 'A', 'Sri Ekowati', 'Drs. Ely Prihmono Suwarso Putro, M.Pd.', 'K-13 Rev', 'Sehari Penuh/5h', 28, 2, 1, 7, 'true', 'true', 3500, 18137, 83, 600, 446, 39, 'negeri', 'JL. SANGIHE, KEPATIHAN WETAN', '7 / 1', 'Kepatihan Wetan', 'Kepatihan Wetan', 'Jebres', 'Kota Surakarta', 'Jawa Tengah', 57129, 'smkn8_surakarta@yahoo.com', 'http://smkn8surakarta.sch.id', 0x000000000101000000010020874bb55b40cb27a2e6ff401ec0),
(40, 4, 20328126, 'SMKN 1 SURAKARTA', 'A', 'Siaga Purnomo', 'Muhammad Rusni Ahli Nugroho', 'K-13 Rev', 'Sehari Penuh/5h', 30, 1, 1, 5, 'true', 'true', 75500, 3160, 54, 107, 912, 30, 'negeri', 'JL. SUNGAI KAPUAS NO.28', '6 / 7', 'Lojiwetan', 'Kedung Lumbu', 'Pasarkliwon', 'Kota Surakarta', 'Jawa Tengah', 57113, 'smk1slo@yahoo.co.id', 'http://www.smkn1solo.sch.id', 0x0000000001010000000100806576b55b402a26a3f0c4491ec0),
(41, 4, 20328108, 'SMKN 2 SURAKARTA', 'A', 'Sugiyarso', 'Nur Rudhiyanto', 'K-13 Rev', 'Sehari Penuh/5h', 56, 2, 1, 10, 'true', 'true', 198000, 23150, 155, 2153, 173, 69, 'negeri', 'JL. ADISUCIPTO NO.33', '7 / 11', 'Manahan', 'Manahan', 'Banjarsari', 'Kota Surakarta', 'Jawa Tengah', 57139, 'info@smkn2solo.sch.id', 'http://www.smkn2solo.sch.id', 0x000000000101000000010080f344b35b4086d0a882d4381ec0),
(42, 4, 20328127, 'SMKN 3 SURAKARTA', 'A', 'Rohmad', 'Bayu Wibowo', 'K-13 Rev', 'Sehari Penuh/5h', 36, 1, 1, 2, 'true', 'true', 50000, 9160, 75, 225, 1038, 36, 'negeri', 'JL. BRIGEN SUDIARTO NO. 34', '4 / 4', 'Danukusuman', 'Danukusuman', 'Serengan', 'Kota Surakarta', 'Jawa Tengah', 57156, 'smkn3ska@yahoo.co.id', 'http://www.smkn3ska.sch.id', 0x0000000001010000000000e091ccb45b405f8ff32fa2561ec0),
(43, 4, 20328152, 'SMKN 4 SURAKARTA', 'A', 'Wening Sukmanawati', 'Wagimin', 'K-13 Rev', 'Sehari Penuh/5h', 24, 2, 1, 1, 'false', 'true', 0, 10185, 76, 167, 1125, 39, 'negeri', 'JL. L.U. ADISUCIPTO NO.40', '2 / 8', 'Kerten', 'Kerten', 'Laweyan', 'Kota Surakarta', 'Jawa Tengah', 57143, 'smkn4solo@gmail.com', 'http://www.smkn4solo.sch.id', 0x0000000001010000000100409c18b35b40b6343e3988361ec0),
(44, 4, 20328155, 'SMKN 9 SURAKARTA', 'A', 'Bangkit Budiarto', 'Handyto Bayu Eko Sapto', 'K-13 Rev', 'Sehari Penuh/5h', 26, 5, 1, 16, 'true', 'true', 0, 13382, 106, 822, 652, 45, 'negeri', 'JL. TARUMANEGARA', '4 / 7', 'Banyuanyar', 'Banyuanyar', 'Banjarsari', 'Kota Surakarta', 'Jawa Tengah', 57137, 'info@smkn9-solo.sch.id', 'http://www.smkn9-solo.sch.id', 0x000000000101000000010080097ab35b40e94f778c36241ec0),
(45, 4, 20328119, 'SMKS COKROAMINOTO 1 SURAKARTA', 'B', 'Nurhidayati', 'Hari Jatmiko', 'K-13 Rev', 'Sehari Penuh/5h', 9, 2, 1, 2, 'false', 'true', 12999, 8080, 19, 53, 32, 9, 'swasta', 'JL. HOS COKROAMINOTO NO. 53', '4 / 8', '-', 'Jebres', 'Jebres', 'Kota Surakarta', 'Jawa Tengah', 57126, 'cokroaminotosmk@ymail.com', '-', 0x000000000101000000010020664db65b40c38de35724401ec0),
(46, 4, 20328122, 'SMKS KRISTEN 1 SURAKARTA', 'B', 'Sunarni', 'NOVI NAIN IKE PRABOWATI', 'K-13 Rev', 'Sehari Penuh/5h', 17, 2, 1, 2, 'true', 'true', 15000, 2400, 34, 120, 214, 16, 'swasta', 'JL. JEND. AHMAD YANI, NO. 2', '5 / 2', 'Tegalharjo', 'Tegalharjo', 'Jebres', 'Kota Surakarta', 'Jawa Tengah', 57128, 'smkkristen1solo@yahoo.com', '-', 0x0000000001010000000100a02e8db55b40859106d7f43c1ec0),
(47, 4, 20328104, 'SMKS KRISTEN 2 SURAKARTA', 'A', 'Wijanto', 'Dwi Kasiyanta', 'K-13 Rev', 'Sehari Penuh/5h', 18, 3, 1, 0, 'false', 'true', 53000, 8095, 28, 341, 2, 14, 'swasta', 'JL. D.I. PANJAITAN NO.1', '1 / 2', '-', 'Setabelan', 'Banjarsari', 'Kota Surakarta', 'Jawa Tengah', 57133, 'smk2kr_solo@yahoo.co.id', 'http://www.smkkristen2ska.sch.id', 0x0000000001010000000100c0f9fcb45b4052b7af70813e1ec0),
(48, 4, 20328118, 'SMKS WIJAYA KUSUMA SURAKARTA', 'B', 'Winarno', 'NANANG KOSIM', 'K-13 Rev', 'Pagi/6h', 10, 1, 1, 2, 'false', 'true', 11000, 2610, 13, 1, 158, 9, 'swasta', 'JL. KUTAI RAYA', '7 / 7', 'Sumber', 'Sumber', 'Banjarsari', 'Kota Surakarta', 'Jawa Tengah', 57138, 'wkusumaska@gmail.com', 'http://smkwijayakusumasolo.sch.id', 0x0000000001010000000100801b68b35b40c8733063792c1ec0),
(49, 4, 20353323, 'SMKS AL ISLAM SURAKARTA', 'B', 'Saifuddin Aziz', 'Muhammad Nur Kholis Dwi Putranto', 'K-13 Rev', 'Pagi/6h', 8, 1, 2, 2, 'false', 'true', 23000, 3779, 18, 141, 47, 7, 'swasta', 'JL. PARANG KESIT NO. 03', '1 / 5', 'Sondakan', 'Sondakan', 'Laweyan', 'Kota Surakarta', 'Jawa Tengah', 57147, 'smk_alislamska@yahoo.com', 'http://www.smk-alaska.sch.id', 0x0000000001010000000000607600b35b40fc9bfeff39451ec0),
(50, 4, 20327989, 'SMKS BATIK 2 SURAKARTA', 'A', 'Drs. Bambang Kandiawan', 'ENDWIE NUR HIDAYAT', 'K-13 Rev', 'Sehari Penuh/5h', 28, 2, 2, 0, 'false', 'true', 30000, 1500, 48, 175, 410, 22, 'swasta', 'JL SLAMET RIYADI KLECO', '5 / 16', 'Tunggul Sari', 'Pajang', 'Laweyan', 'Kota Surakarta', 'Jawa Tengah', 57146, 'smkbatik2ska@gmail.com', 'http://www.smkbatik2surakarta.sch.id', 0x0000000001010000000100c09be5b15b408cef29dd913c1ec0),
(51, 4, 20328151, 'SMKS MARSUDIRINI MARGANINGSIH SURAKARTA', 'A', 'Sr. M. Bonifacia, Osf', 'Rhisma Uliana', 'K-13 Rev', 'Pagi/6h', 12, 2, 1, 2, 'false', 'true', 14992, 1952, 16, 45, 112, 10, 'swasta', 'JL. MADYOTAMAN I/22', '4 / 1', '-', 'Punggawan', 'Banjarsari', 'Kota Surakarta', 'Jawa Tengah', 57132, 'marsudirini_smksolo@yahoo.com', 'http://www.smkmarsudirini.sch.id', 0x0000000001010000000100a06b60b45b401613372d3d3c1ec0),
(52, 4, 20328129, 'SMKS PGRI 2 SURAKARTA', 'B', 'Suwarno', 'Emmy Teguh SH, A.Md.', 'K-13 Rev', 'Sehari Penuh/5h', 6, 0, 1, 2, 'false', 'true', 4400, 2404, 15, 18, 33, 6, 'swasta', 'JL. KELUT TIMUR I/13 NGADISONO SURAKARTA', '6 / 14', '-', 'Kadipiro', 'Banjarsari', 'Kota Surakarta', 'Jawa Tengah', 57136, 'smkpgri2solo@gmail.com', '-', 0x000000000101000000010040672db55b40423e47f54d2f1ec0),
(53, 4, 69827629, 'SMKS EMPAT LIMA', 'B', 'Ernawati', 'Danny Febryan Nur Muhamad Saifullah', 'K-13 Rev', 'Sehari Penuh/5h', 8, 1, 1, 2, 'true', 'true', 30000, 10, 12, 17, 246, 8, 'swasta', 'JL. LETJEN SUTOYO GG. JODIPATI NO. 10', '1 / 12', 'Genengan', 'Mojosongo', 'Jebres', 'Kota Surakarta', 'Jawa Tengah', 57127, 'smkkeperawatan45@gmail.com', 'http://smkkeperawatan45.blogspot.com', 0x0000000001010000000100a0b083b55b40d57ca546da2c1ec0),
(54, 4, 20328116, 'SMKS KATOLIK ST MIKAEL SURAKARTA', 'A', 'Albertus Murdianto', 'Yulius Kinta Kanisia', 'K-13 Rev', 'Sehari Penuh/5h', 15, 1, 1, 1, 'true', 'true', 6500, 12850, 32, 517, 0, 15, 'swasta', 'JL. MOJO NO. 1 KARANGASEM', '2 / 7', '-', 'Karangasem', 'Laweyan', 'Kota Surakarta', 'Jawa Tengah', 57145, 'smkmikael@gmail.com', 'http://www.smkmikael.sch.id', 0x0000000001010000000100808c9eb15b401566df29cf351ec0),
(55, 4, 20328150, 'SMKS KRISTEN SMKSK SURAKARTA', 'B', 'Yusak Sugiato', 'Dwi Joko Adhi Nugroho', 'K-13 Rev', 'Sehari Penuh/5h', 8, 0, 0, 0, 'true', 'true', 7600, 0, 11, 8, 39, 6, 'swasta', 'JL. MONGINSIDI NO 35', '1 / 1', 'Kepatihan Kulon', 'Kepatihan Kulon', 'Jebres', 'Kota Surakarta', 'Jawa Tengah', 57129, 'SMKKristenSurakarta@gmail.com', 'http://smkkkristen.sch.id', 0x0000000001010000000100a0c92eb55b401901d4ec9a3c1ec0),
(56, 4, 20328105, 'SMKS MUHAMMADIYAH 1 SURAKARTA', 'A', 'Tarmo', 'Sumaryono', 'K-13 Rev', 'Sehari Penuh/5h', 19, 1, 1, 1, 'true', 'true', 65600, 2843, 35, 447, 0, 18, 'swasta', 'JL. KAHAYAN 1 JOYOTAKAN', '8 / 5', '-', 'Joyotakan', 'Serengan', 'Kota Surakarta', 'Jawa Tengah', 57157, 'smk_muh1ska@yahoo.com', 'http://www.smkmuh1solo.sch.id', 0x0000000001010000000100a040c7b45b40a0755f9eba5e1ec0),
(57, 4, 20331829, 'SMKS ANALIS KESEHATAN NASIONAL SURAKARTA', 'B', 'Dr. Juniarti Winarno, M.kes.', 'Jati Utomo, ST.', 'K-13 Rev', 'Sehari Penuh/5h', 12, 8, 1, 2, 'false', 'true', 4700, 3006, 22, 42, 301, 12, 'swasta', 'JL. YOS SUDARSO 338', '13 / 1', 'Dawung', 'Serengan', 'Serengan', 'Kota Surakarta', 'Jawa Tengah', 57155, 'smkak_nasional@yahoo.co.id', 'http://smkanaliskesehatannas.sch.id', 0x0000000001010000000100a07367b45b406fcf3df21b581ec0),
(58, 4, 20328103, 'SMKS BINA MANDIRI INDONESIA SURAKARTA', 'C', 'Cahya Hartana', 'DHANANG ARDYANSYAH', 'K-13 Rev', 'Sehari Penuh/5h', 9, 0, 1, 3, 'false', 'true', 7700, 2095, 12, 5, 24, 6, 'swasta', 'JL BUNGUR V/10 PUNGGAWAN', '2 / 6', '-', 'Punggawan', 'Banjarsari', 'Kota Surakarta', 'Jawa Tengah', 57132, 'smk_bimaska@yahoo.co.id', 'http://www.smkbimando-solo.sch.id', 0x000000000101000000020040843eb45b40bff1c77e233f1ec0),
(59, 4, 20328121, 'SMKS KANISIUS SURAKARTA', 'C', 'Y. Rusmanto Budiatmo', 'Drs. Y. Joko Supriyadi', 'K-13 Rev', 'Pagi/6h', 9, 0, 1, 2, 'false', 'true', 18000, 3018, 9, 8, 21, 3, 'swasta', 'JL. TELASIH IV/02', '2 / 12', 'Mangkubumen', 'Mangkubumen', 'Banjarsari', 'Kota Surakarta', 'Jawa Tengah', 57139, 'smkkanslo@yahoo.com', 'http://www.smkkanisiussolo.com', 0x0000000001010000000100006309b45b409def51008b3f1ec0),
(60, 4, 20328149, 'SMKS KRISTEN MARGOYUDAN SURAKARTA', 'B', 'Sudarwanto', 'Sudarwanto, S.Pd.', 'K-13 Rev', 'Sehari Penuh/5h', 6, 1, 1, 1, 'true', 'true', 7500, 27821, 9, 30, 0, 3, 'swasta', 'JALAN MONGINSIDI 28', '1 / 12', 'Margorejo', 'Gilingan', 'Banjarsari', 'Kota Surakarta', 'Jawa Tengah', 57134, 'smkkristenmgy@yahoo.co.id', 'http://www.smkkristenmargoyudan.sch.id', 0x0000000001010000000000e0793eb55b40a583fe46eb3b1ec0),
(61, 4, 20341141, 'SMKS MUHAMMADIYAH 4 SURAKARTA', 'B', 'Elly Elliyun', 'Suryanto', 'K-13 Rev', 'Sehari Penuh/5h', 12, 2, 1, 2, 'true', 'true', 22000, 12459, 21, 34, 178, 11, 'swasta', 'SLAMET RIYADI NO 443', '1 / 10', 'Pajang', 'Pajang', 'Laweyan', 'Kota Surakarta', 'Jawa Tengah', 57146, 'smkmuh4ska@gmail.com', '-', 0x000000000101000000020040e9adb25b40bf348628e63e1ec0),
(62, 4, 69827628, 'SMKS MUHAMMADIYAH 5 SURAKARTA', 'B', 'Elly Elliyun', 'Erbin Musyiamah', 'K-13 Rev', 'Sehari Penuh/5h', 6, 0, 1, 2, 'true', 'true', 0, 1170, 11, 5, 103, 4, 'swasta', 'JL. KERINCI 15 A', '4 / 23', 'Sekip', 'Kadipiro', 'Banjarsari', 'Kota Surakarta', 'Jawa Tengah', 57136, 'smkmuh5ska@yahoo.co.id', '-', 0x0000000001010000000200606b91b45b40267fbc26be201ec0),
(63, 4, 20341142, 'SMKS TEKNO SA SURAKARTA', 'B', 'Ahadiah Noor Diana', 'Gunawan Saputro', 'K-13 Rev', 'Sehari Penuh/5h', 8, 0, 2, 4, 'true', 'true', 17000, 2220, 16, 81, 26, 6, 'swasta', 'JL. PAKEL NO.66', '4 / 9', '-', 'Sumber', 'Banjarsari', 'Kota Surakarta', 'Jawa Tengah', 57138, 'info@smkteknosa.sch.id', 'http://smkteknosa.sch.id', 0x0000000001010000000100407b0cb35b40872c84c0b32d1ec0),
(64, 4, 20328115, 'SMKS TUNAS PEMBANGUNAN 2 SURAKARTA', 'B', 'Sri Sugiastuti', 'Ali Hasyim Rasidin', 'K-13 Rev', 'Sehari Penuh/5h', 8, 3, 1, 1, 'true', 'true', 66000, 5000, 15, 55, 0, 6, 'swasta', 'JL BALEKAMBANG LOR NO. 1', '3 / 3', 'Manahan', 'Manahan', 'Banjarsari', 'Kota Surakarta', 'Jawa Tengah', 57139, 'smktp2ska@yahoo.com', '-', 0x00000000010100000001002016ebb35b40e06b781e1e351ec0),
(65, 4, 20351974, 'SMKS IGNATIUS SLAMET RIYADI', 'C', 'Caecilia Sri Mulyani', 'Yovita Anum Prihantari', 'K-13 Rev', 'Sehari Penuh/5h', 6, 0, 1, 1, 'false', 'true', 18000, 1328, 8, 49, 8, 5, 'swasta', 'JL. ALOR NO. 3 KEBALEN TENGAH', '3 / 4', 'Kampung Baru', 'Kampung Baru', 'Pasarkliwon', 'Kota Surakarta', 'Jawa Tengah', 57111, 'smkgrafika@ymail.com', 'http://www.smkgrafikasolo.sch.id', 0x000000000101000000010000102eb55b4041b3db8c37511ec0),
(66, 4, 20328110, 'SMKS PANCASILA SURAKARTA', 'B', 'Budi Santoso', 'Sutarji', 'K-13 Rev', 'Sehari Penuh/5h', 18, 2, 1, 1, 'true', 'true', 35200, 4408, 32, 307, 1, 12, 'swasta', 'JL. APEL NO. 5 JAJAR SURAKARTA', '3 / 2', '-', 'Jajar', 'Laweyan', 'Kota Surakarta', 'Jawa Tengah', 57144, 'smkpancasilaska@gmail.com', 'http://smkpancasilasolo.mysch.id', 0x000000000101000000020060357eb25b4010f1281741381ec0),
(67, 4, 20328114, 'SMKS SANTO PAULUS SURAKARTA', 'B', 'T. Rita Martanti', 'FL. HERY SISWANTO', 'K-13 Rev', 'Sehari Penuh/5h', 10, 8, 1, 8, 'false', 'true', 14998, 1520, 22, 47, 89, 6, 'swasta', 'JL. DR. RAJIMAN 659', '1 / 5', 'Bratan', 'Pajang', 'Laweyan', 'Kota Surakarta', 'Jawa Tengah', 57146, 'smksantopaulus@yahoo.com', '-', 0x0000000001010000000100a0645ab25b4046e29743c0481ec0),
(68, 4, 20328132, 'SMKS WARGA SURAKARTA', 'A', 'Sjam Rahadi Heru Munandar', 'Sutaryo, S.Pd.', 'K-13 Rev', 'Sehari Penuh/5h', 26, 1, 1, 0, 'true', 'true', 50000, 5000, 60, 845, 5, 26, 'swasta', 'JL. KOL. SUTARTO NO. 81', '2 / 26', 'Tegalkuniran', 'Jebres', 'Jebres', 'Kota Surakarta', 'Jawa Tengah', 57126, 'wargsmk@yahoo.com', 'http://www.smkwarga-slo.sch.id', 0x0000000001010000000100200833b65b40e5949e0fcb3a1ec0),
(69, 4, 20328117, 'SMKS BHINNEKA KARYA SURAKARTA', 'A', 'Sarjiman', 'Eko Supriyadi', 'K-13 Rev', 'Sehari Penuh/5h', 21, 0, 0, 0, 'false', 'true', 15000, 4298, 32, 578, 0, 20, 'swasta', 'JL. LETJEN SUPRAPTO 34 SURAKARTA', '4 / 12', 'Sumber', 'Sumber', 'Banjarsari', 'Kota Surakarta', 'Jawa Tengah', 57138, 'smkbksolo@yahoo.co.id', 'http://www.smkbksolo.sch.id', 0x000000000101000000020060ff67b35b4017e8a8ca43331ec0),
(70, 4, 20328120, 'SMKS COKROAMINOTO 2 SURAKARTA', 'C', 'Eni Nurwidayati', 'PURWANTO', 'K-13 Rev', 'Sehari Penuh/5h', 8, 1, 1, 2, 'true', 'true', 33000, 3000, 13, 36, 26, 8, 'swasta', 'JL. HOS. COKROAMINOTO NO. 61 JEBRES SURAKARTA', '4 / 8', 'Petoran', 'Jebres', 'Jebres', 'Kota Surakarta', 'Jawa Tengah', 57126, 'cokroaminoto2@yahoo.co.id', 'http://smkcokro2solo.sch.id', 0x0000000001010000000100806e4eb65b405c948e570d401ec0),
(71, 4, 20362528, 'SMKS IT SMART INFORMATIKA', 'B', 'Muhammad Ali Mursidi', 'Suryawan Nugrahanto', 'K-13 Rev', 'Pagi/6h', 6, 0, 1, 5, 'true', 'true', 12000, 1962, 16, 78, 84, 6, 'swasta', 'JL. SRI GUNTING VII NO. 9 SURAKARTA', '4 / 11', 'Gremet', 'Manahan', 'Banjarsari', 'Kota Surakarta', 'Jawa Tengah', 57139, 'smk@smkitsi.sch.id', 'http://www.smkitsi.sch.id', 0x0000000001010000000100004636b35b407331292eaf3a1ec0),
(72, 4, 20328106, 'SMKS MUHAMMADIYAH 3 SURAKARTA', 'B', 'Fauzi Hidayat', 'RURIN BUSTANUL AMINAH', 'K-13 Rev', 'Sehari Penuh/5h', 11, 1, 1, 7, 'false', 'true', 29000, 1150, 30, 271, 10, 12, 'swasta', 'JL. PROF. DR. SUPOMO NO. 51', '1 / 13', 'Mangkubumen', 'Mangkubumen', 'Banjarsari', 'Kota Surakarta', 'Jawa Tengah', 57139, 'smkmuh3ska@yahoo.co.id', 'http://www.smkmuh3solo.sch.id', 0x0000000001010000000200601821b45b40d4839af217411ec0),
(73, 4, 20327974, 'SMKS BATIK 1 SURAKARTA', 'A', 'Pris Priyanto, M.kom', 'Muhammad Rosyid Ridlo', 'K-13 Rev', 'Sehari Penuh/5h', 26, 1, 1, 2, 'false', 'true', 53000, 10000, 34, 261, 469, 26, 'swasta', 'JL. SLAMET RIYADI', '6 / 16', 'Tunggul Sari', 'Pajang', 'Laweyan', 'Kota Surakarta', 'Jawa Tengah', 57146, 'smkbatik1ska@yahoo.co.id', 'http://www.smkbatik1solo.sch.id', 0x00000000010100000042c7d800e8b15b405d532fe47e3b1ec0),
(74, 4, 20331830, 'SMKS FARMASI NASIONAL SURAKARTA', 'B', 'Joko Kristianto', 'Epnu Paryanto', 'K-13 Rev', 'Sehari Penuh/5h', 15, 4, 1, 2, 'true', 'true', 30000, 3952, 30, 37, 400, 14, 'swasta', 'JL. YOS SUDARSO 338', '1 / 13', 'Serengan', 'Serengan', 'Serengan', 'Kota Surakarta', 'Jawa Tengah', 57155, 'smf_nasional@yahoo.com', 'http://www.smkfarmasinasional.sch.id', 0x0000000001010000000200e07e67b45b406128744b1c581ec0),
(75, 4, 20328133, 'SMKS JAYAWISATA SURAKARTA', 'B', 'Suprapti,s.pd.,s.st.par.,m.si', 'Sumartini Tinuk', 'K-13 Rev', 'Sehari Penuh/5h', 6, 1, 1, 2, 'true', 'true', 1300, 0, 8, 35, 44, 6, 'swasta', 'JL. SEKAR JAGAD I', '3 / 2', 'Jegon', 'Pajang', 'Laweyan', 'Kota Surakarta', 'Jawa Tengah', 57146, 'jayawisata.solo@gmail.com', 'http://www.smk.sch.id', 0x0000000001010000000000e0514bb25b408c89d0923b4b1ec0),
(76, 4, 20328124, 'SMKS MUHAMMADIYAH 2 SURAKARTA', 'B', 'Ahmad Munawir', 'Arief Fitriyanto', 'K-13 Rev', 'Sehari Penuh/5h', 9, 1, 1, 2, 'false', 'true', 15000, 9, 11, 8, 39, 4, 'swasta', 'JL. LETJEND. S PARMAN 9', '1 / 2', '-', 'Kestalan', 'Banjarsari', 'Kota Surakarta', 'Jawa Tengah', 57133, 'smkmuhduaska@ymail.com', 'http://smkmuh2ska.sch.id', 0x0000000001010000000100a04aaeb45b4079104ccc3a411ec0),
(77, 4, 20328112, 'SMKS PGRI 1 SURAKARTA', 'B', 'Sumarno', 'Trimo,S.Pd', 'K-13 Rev', 'Sehari Penuh/5h', 10, 0, 1, 1, 'false', 'true', 23000, 2700, 20, 249, 2, 12, 'swasta', 'JL. PLERET UTAMA', '2 / 12', 'Banyuanyar', 'Banyuanyar', 'Banjarsari', 'Kota Surakarta', 'Jawa Tengah', 57137, 'smkpgri1_slo@yahoo.co.id', 'http://www.smkpgri1solo.sch.id', 0x0000000001010000000100203239b35b40b8f0c6e3b5291ec0),
(78, 4, 20328113, 'SMKS PURNAMA SURAKARTA', 'B', 'Sri Mulyono', 'Sukirno', 'K-13 Rev', 'Sehari Penuh/5h', 6, 0, 1, 0, 'true', 'true', 3500, 2225, 6, 46, 3, 3, 'swasta', 'JL. A. YANI SUMBERTAPEN', '1 / 3', 'Sumber', 'Sumber', 'Banjarsari', 'Kota Surakarta', 'Jawa Tengah', 57138, 'smkpu12n4ma@yahoo.com', '-', 0x0000000001010000000100a09de3b35b406a78717271331ec0),
(79, 4, 20328156, 'SMKS SAHID SURAKARTA', 'B', 'Naim Mabruri', 'Ari Setyawan', 'K-13 Rev', 'Sehari Penuh/5h', 26, 1, 1, 4, 'true', 'true', 65000, 1450, 31, 327, 337, 25, 'swasta', 'JL. YOSODIPURO NO. 87 Surakarta', '1 / 1', 'Timuran', 'Timuran', 'Banjarsari', 'Kota Surakarta', 'Jawa Tengah', 57131, 'smksahid@yahoo.co.id', 'http://www.smksahidsolo.sch.id', 0x0000000001010000000200e05d2eb45b40a0ef6d6739411ec0),
(80, 4, 20328131, 'SMKS TUNAS PEMBANGUNAN 3 SURAKARTA', 'C', 'Suwardjo', 'Sri Lestari', 'K-13 Rev', 'Sehari Penuh/5h', 13, 1, 1, 2, 'true', 'true', 12000, 2000, 10, 32, 0, 6, 'swasta', 'JL. KRAKATAU UTARA NO.5 BIBIS BARU', '2 / 0', 'Cengklik', 'Nusukan', 'Banjarsari', 'Kota Surakarta', 'Jawa Tengah', 57135, 'smktp3ska@yahoo.com', 'http://www.smktp3ska.sch.id', 0x0000000001010000000200c04943b55b403a381db905351ec0),
(81, 4, 69867983, 'SMK Kesehatan Mandala Bhakti', 'B', '\'ifwa Mas\'udah', 'Fitri Setiawan Ningsih', 'K-13 Rev', 'Sehari Penuh/5h', 18, 0, 1, 3, 'true', 'true', 13000, 5007, 23, 38, 441, 17, 'swasta', 'Jl. Singosari Utara II', '2 / 1', 'Nusukan', 'Nusukan', 'Banjarsari', 'Kota Surakarta', 'Jawa Tengah', 57135, 'smkkmandalabhakti@gmail.com', 'http://www.smkmbsolo.sch.id', 0x0000000001010000000100a08d5cb45b4046dd18ca0b2b1ec0),
(82, 4, 20328148, 'SMKS KASATRIYAN SURAKARTA', 'A', 'Danang Giyarso', 'Rahmat Basuki', 'K-13 Rev', 'Sehari Penuh/5h', 21, 2, 1, 1, 'true', 'true', 22000, 13200, 31, 227, 145, 13, 'swasta', 'Pamardiputri', '4 / 1', '-', 'Baluwarti', 'Pasarkliwon', 'Kota Surakarta', 'Jawa Tengah', 57114, 'smk_kasatriyan_surakarta@yahoo.co.id', 'http://smkkasatriyankratonsolo.sch.id', 0x0000000001010000000100c056cdb45b402753c7bd01501ec0),
(83, 4, 20328107, 'SMKS MURNI 1 SURAKARTA', 'B', 'Suwitadi', 'Luluk Bayu Dwi Prasetyo', 'K-13 Rev', 'Pagi/6h', 16, 3, 1, 3, 'true', 'true', 5000, 7500, 22, 137, 54, 12, 'swasta', 'JL. DR. WAHIDIN NO. 33', '4 / 4', 'Penumping', 'Penumping', 'Laweyan', 'Kota Surakarta', 'Jawa Tengah', 57141, 'smkmurni1solo@yahoo.com', 'http://smkmurni1surakarta.sch.id', 0x0000000001010000000100003592b35b4027b980b54e461ec0),
(84, 4, 20328125, 'SMKS MURNI 2 SURAKARTA', 'B', 'Suwitadi', 'Satya Budi Santoso', 'K-13 Rev', 'Pagi/6h', 12, 1, 1, 1, 'true', 'true', 7700, 1052, 26, 14, 52, 12, 'swasta', 'JL. DR. WAHIDIN NO.33', '4 / 4', 'Penumping', 'Penumping', 'Laweyan', 'Kota Surakarta', 'Jawa Tengah', 57141, 'smkmurni2@gmail.com', 'http://www.smkmurni.blogspot', 0x000000000101000000010080be97b35b407de14d3cf7451ec0);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `foto`
--
ALTER TABLE `foto`
  ADD CONSTRAINT `foto_ibfk_1` FOREIGN KEY (`foto_sekolah`) REFERENCES `sekolah` (`sekolah_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `sekolah`
--
ALTER TABLE `sekolah`
  ADD CONSTRAINT `sekolah_ibfk_1` FOREIGN KEY (`sekolah_jenjang`) REFERENCES `jenjang` (`jenjang_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
