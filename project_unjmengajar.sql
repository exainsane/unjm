-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2017 at 06:08 PM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `project_unjmengajar`
--
CREATE DATABASE IF NOT EXISTS `project_unjmengajar` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `project_unjmengajar`;

-- --------------------------------------------------------

--
-- Table structure for table `a_jadwal_ajar`
--

CREATE TABLE IF NOT EXISTS `a_jadwal_ajar` (
  `id` bigint(255) NOT NULL AUTO_INCREMENT,
  `_enable` tinyint(1) NOT NULL DEFAULT '1',
  `id_pengajar` bigint(255) NOT NULL,
  `stat_jadwal` tinyint(1) NOT NULL,
  `mata_ajar` int(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `a_jadwal_ajar_detail`
--

CREATE TABLE IF NOT EXISTS `a_jadwal_ajar_detail` (
  `id` bigint(255) NOT NULL AUTO_INCREMENT,
  `_enable` tinyint(1) NOT NULL DEFAULT '1',
  `id_jadwal` bigint(255) NOT NULL,
  `hari` int(1) NOT NULL,
  `jam` int(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `m_admin`
--

CREATE TABLE IF NOT EXISTS `m_admin` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `_enable` tinyint(1) NOT NULL DEFAULT '1',
  `id_user` bigint(255) NOT NULL,
  `id_level` int(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `m_admin_level`
--

CREATE TABLE IF NOT EXISTS `m_admin_level` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `_enable` tinyint(1) NOT NULL DEFAULT '1',
  `access_to` varchar(255) NOT NULL,
  `access_stat` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `m_mata_ajar`
--

CREATE TABLE IF NOT EXISTS `m_mata_ajar` (
  `id` smallint(255) NOT NULL AUTO_INCREMENT,
  `_enable` tinyint(1) NOT NULL DEFAULT '1',
  `mata_ajar` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `m_pengajar`
--

CREATE TABLE IF NOT EXISTS `m_pengajar` (
  `id` bigint(255) NOT NULL AUTO_INCREMENT,
  `_enable` tinyint(1) NOT NULL DEFAULT '1',
  `id_user` bigint(255) NOT NULL,
  `pin` int(4) NOT NULL,
  `province_target` varchar(255) NOT NULL,
  `city_target` varchar(255) NOT NULL,
  `postal_code_target` varchar(255) NOT NULL,
  `base_price` decimal(18,4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `m_saldo`
--

CREATE TABLE IF NOT EXISTS `m_saldo` (
  `id` bigint(255) NOT NULL AUTO_INCREMENT,
  `id_user` bigint(255) NOT NULL,
  `saldo` decimal(18,4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `m_user`
--

CREATE TABLE IF NOT EXISTS `m_user` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `_enable` tinyint(1) NOT NULL DEFAULT '1',
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `address` text NOT NULL,
  `province` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `postal_code` varchar(7) NOT NULL,
  `profile_img` varchar(255) NOT NULL,
  `bio` varchar(255) NOT NULL,
  `motto` varchar(255) NOT NULL,
  `fbm_token` varchar(255) NOT NULL,
  `user_activated` tinyint(1) NOT NULL DEFAULT '0',
  `last_active` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `t_auth_token`
--

CREATE TABLE IF NOT EXISTS `t_auth_token` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `for_user` bigint(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `valid_until` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `t_materi`
--

CREATE TABLE IF NOT EXISTS `t_materi` (
  `id` bigint(255) NOT NULL AUTO_INCREMENT,
  `_enable` tinyint(1) NOT NULL DEFAULT '1',
  `judul` varchar(255) NOT NULL,
  `id_mata_ajar` int(255) NOT NULL,
  `sinopsis` text NOT NULL,
  `file` varchar(255) NOT NULL,
  `upload_by` bigint(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `t_payment`
--

CREATE TABLE IF NOT EXISTS `t_payment` (
  `id` bigint(255) NOT NULL AUTO_INCREMENT,
  `_enable` tinyint(1) NOT NULL,
  `id_request` bigint(255) NOT NULL,
  `total_amount` decimal(18,4) NOT NULL,
  `payment_status` int(1) NOT NULL,
  `verified` tinyint(1) NOT NULL,
  `verified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `verified_by` int(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `t_request`
--

CREATE TABLE IF NOT EXISTS `t_request` (
  `id` bigint(255) NOT NULL AUTO_INCREMENT,
  `_enable` tinyint(1) NOT NULL DEFAULT '1',
  `stat_req` int(1) NOT NULL,
  `stat_change_by` int(255) NOT NULL,
  `id_user_request` bigint(255) NOT NULL,
  `id_pengajar` bigint(255) NOT NULL,
  `id_mata_ajar` smallint(255) NOT NULL,
  `payment_type` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `t_request_schedule`
--

CREATE TABLE IF NOT EXISTS `t_request_schedule` (
  `id` bigint(255) NOT NULL AUTO_INCREMENT,
  `_enable` tinyint(1) NOT NULL DEFAULT '1',
  `id_request` bigint(255) NOT NULL,
  `hari` int(1) NOT NULL,
  `jam` int(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `t_saldo_topup`
--

CREATE TABLE IF NOT EXISTS `t_saldo_topup` (
  `id` bigint(255) NOT NULL AUTO_INCREMENT,
  `id_saldo` bigint(255) NOT NULL,
  `topup_amount` decimal(18,4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ui_about`
--

CREATE TABLE IF NOT EXISTS `ui_about` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `about` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `ui_about`
--

INSERT INTO `ui_about` (`id`, `about`) VALUES
(1, '<p>EDIT Melihat dari latar belakang Universitas Negeri Jakarta yang mencetak calon-calon guru. Sekumpulan mahasiswa PTIK UNJ melihat potensi yang cukup besar untuk mengorganisasi sistem bimbel untuk memenuhi kebutuhan akan pendidikan. Hal ini dilakukan dengan mengembangkan sebuah situs privat.</p>\r\n\r\n<p>Maka berdasarkan potensi dan keadaan saat ini, tim kami menggagas sebuah ide bernama &ldquo;UNJ Mengajar&quot; Sebagai Upaya menciptakan lapangan pekerjaan dan tambahan penghasilan bagi mahasiswa UNJ khususnya dan Mahasiswa/Guru di Indonesia pada umumnya. Di sisi lain, murid juga dapat mendapatkan guru kursus yang berkualitas.</p>\r\n\r\n<p>UNJ Mengajar tidak hanya menawarkan privat untuk mata pelajaran normatif saja, namun juga menawarkan khursus bahasa asing (jerman, arab, inggris, perancis), privat untuk anak berkebutuhan khusus, khursus tari, khursus drama, pelatihan jaringan, pelatihan design, dll dengan guru yang berkualitas dan harga yang terjangkau.</p>\r\n\r\n<p>Kami akan terus mengembangkan produk dan layanan di bidang teknologi pendidikan, dan kami juga berupaya untuk ikut serta berperan dalam memajukan pendidikan di Indonesia.</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `ui_blog`
--

CREATE TABLE IF NOT EXISTS `ui_blog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(100) NOT NULL,
  `des` text NOT NULL,
  `img` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `ui_blog`
--

INSERT INTO `ui_blog` (`id`, `judul`, `des`, `img`) VALUES
(1, 'PHARETRA EU TEMPOR VEL', '<p>Nullam metus arcu, pharetra eu tempor vel, consectetur nec metus. Praesent malesuada, purus et euismod rutrum, augue nisi facilisis diam, vitae auctor nisl libero nec eros. Vivamus vitae pulvinar augue. Nulla facilisi. Quisque rutrum ante interdum</p>\r\n', 'assets/img/blog/blog-img1.jpg'),
(2, 'PELLENTESQUE NIBH LIBERO', '<p>Nullam metus arcu, pharetra eu tempor vel, consectetur nec metus. Praesent malesuada, purus et euismod rutrum, augue nisi facilisis diam, vitae auctor nisl libero nec eros. Vivamus vitae pulvinar augue. Nulla facilisi. Quisque rutrum ante interdum</p>\r\n', 'assets/img/blog/blog-img3.jpg'),
(3, 'HOW TO FIX YOUR BUG', '<p>Nullam metus arcu, pharetra eu tempor vel, consectetur nec metus. Praesent malesuada, purus et euismod rutrum, augue nisi facilisis diam, vitae auctor nisl libero nec eros. Vivamus vitae pulvinar augue. Nulla facilisi. Quisque rutrum ante interdum</p>\n', 'assets/img/blog/blog-img2.jpg'),
(11, 'TIDAK ADA JUDUL!', '<p>awdawdawdadawdwa</p>\r\n', 'assets/images/uploads/1485787740884JPG.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `ui_contact`
--

CREATE TABLE IF NOT EXISTS `ui_contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `message` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `ui_contact`
--

INSERT INTO `ui_contact` (`id`, `name`, `email`, `message`) VALUES
(1, 'Naufal Ibnu Salam', 'naufal@fsialbiruni.org', 'Test Contact :)'),
(2, 'Naufal Ibnu Salam', 'naufalibnusalam@gmail.com', 'Test kedua :p'),
(3, 'creep', 'aliq220311@gmail.com', 'lorem ipsum dolor sit amet'),
(4, 'dimaz', 'naufal@fsialbiruni.org', 'diawuhdwaiud'),
(5, 'Ridwan Achadi Nugroh', 'rnugraha305@gmail.com', '1');

-- --------------------------------------------------------

--
-- Table structure for table `ui_services`
--

CREATE TABLE IF NOT EXISTS `ui_services` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(50) NOT NULL,
  `des` text NOT NULL,
  `icon` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `ui_services`
--

INSERT INTO `ui_services` (`id`, `judul`, `des`, `icon`) VALUES
(1, 'Pembayaran Mudah &amp; Aman', '<p>sistem pembayaran dengan internet banking, dan bank transfer. Seluruhnya aman dan mudah!</p>', 'money'),
(2, 'Pengajar Berkualitas', '<p>Guru privat berasal dari UNJ dan luar UNJ dengan pengalaman mumpuni dan metode pengajaran terkini.</p>\n', 'graduation-cap'),
(3, 'Laporan Perkembangan Belajar', '<p>Setiap murid dan orangtua akan mendapatkan laporan perkembangan belajar secara reguler dari guru.</p>', 'line-chart'),
(4, 'Layanan Bantuan', '<p>Tim kami selalu siap membantu Anda kapan saja. Hubungi kami lewat WA, Email, Chat ataupun Telepon.</p>', 'users');

-- --------------------------------------------------------

--
-- Table structure for table `ui_slider`
--

CREATE TABLE IF NOT EXISTS `ui_slider` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(20) NOT NULL,
  `des` text NOT NULL,
  `class` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `ui_slider`
--

INSERT INTO `ui_slider` (`id`, `judul`, `des`, `class`) VALUES
(1, 'UNJ Mengajar', '<p>TEMPAT YANG ASIK UNTUK BELAJAR PRIVAT dwad</p>\r\n', 'item active'),
(2, 'UNJ Mengajar', '<p>BELAJAR MUDAH DENGAN GURU PROFESIONAL</p>\r\n', 'item '),
(3, 'UNJ Mengajar', '<p>MENJAWAB KEBUTUHAN PENDIDIKAN ANDA</p>\r\n', 'item ');

-- --------------------------------------------------------

--
-- Table structure for table `ui_team`
--

CREATE TABLE IF NOT EXISTS `ui_team` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(20) NOT NULL,
  `des` text NOT NULL,
  `img` varchar(200) NOT NULL,
  `job` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `ui_team`
--

INSERT INTO `ui_team` (`id`, `nama`, `des`, `img`, `job`) VALUES
(1, 'Naufal Ibnu Salam', '<p>Mahasiswa Universitas Negeri Jakarta Prodi Pendidikan Teknik Informatika &amp;amp; Komputer</p>\r\n', 'assets/img/team/naufal.png', 'Web Developer'),
(2, 'Ridwan Achadi Nugroh', '<p>Mahasiswa Universitas Negeri Jakarta Prodi Pendidikan Teknik Informatika &amp;amp; Komputer</p>\r\n', 'assets/img/team/ridwan.png', 'Web Developer'),
(3, 'Ahmad Syawlana', '<p>Mahasiswa Universitas Negeri Jakarta Prodi Pendidikan Teknik Informatika &amp;amp; Komputer</p>\r\n', 'assets/img/team/syawlana.png', 'Web Admin'),
(4, 'Erfan Kurniawan', '<p>Mahasiswa Universitas Negeri Jakarta Prodi Pendidikan Luar Biasa</p>\r\n', 'assets/img/team/erfan.png', 'Marketing'),
(5, 'Farida Nurhasanah', '<p>Mahasiswa Universitas Negeri Jakarta Prodi Pendidikan Teknik Elektronika</p>\r\n', 'assets/img/team/farida.png', 'Admin Social Media'),
(7, 'TEST TEAM', '<p>awdawdawdadawdwa</p>\r\n', 'assets/images/uploads/1485787061847jpg.jpg', 'Tukang Sapu (parah)');

-- --------------------------------------------------------

--
-- Table structure for table `ui_testimoni`
--

CREATE TABLE IF NOT EXISTS `ui_testimoni` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(20) NOT NULL,
  `des` text NOT NULL,
  `nama` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `ui_testimoni`
--

INSERT INTO `ui_testimoni` (`id`, `judul`, `des`, `nama`) VALUES
(2, 'Clien Design', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur sequi accusamus voluptatum rem itaque alias deleniti nostrum aperiam fugiat voluptates debitis praesentium incidunt accusantium distinctio</p>\r\n,', '- shura deo'),
(3, 'Awesome Support SIMA', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur sequi accusamus voluptatum rem itaque alias deleniti nostrum aperiam fugiat voluptates debitis praesentium incidunt accusantium distinctio</p>\r\n,', '- kumara deo'),
(4, 'Theme Feature great', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur sequi accusamus voluptatum rem itaque alias deleniti nostrum aperiam fugiat voluptates debitis praesentium incidunt accusantium distinctio</p>\r\n,', '- dhera deo'),
(5, 'Non conflict', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur sequi accusamus voluptatum rem itaque alias deleniti nostrum aperiam fugiat voluptates debitis praesentium incidunt accusantium distinctio</p>\r\n,', '- jhon deo'),
(7, 'Test', '<p>dwuadkuagwwdawdigyawudgyuawdgy</p>\r\n', 'dwaiudgawidbawb');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
