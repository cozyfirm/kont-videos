-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 03, 2024 at 10:18 AM
-- Server version: 8.2.0
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kont-videos`
--

-- --------------------------------------------------------

--
-- Table structure for table `api__countries`
--

DROP TABLE IF EXISTS `api__countries`;
CREATE TABLE IF NOT EXISTS `api__countries` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_ba` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `flag` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_code` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `used` tinyint(1) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=163 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `api__countries`
--

INSERT INTO `api__countries` (`id`, `name`, `name_ba`, `code`, `flag`, `phone_code`, `used`, `created_at`, `updated_at`) VALUES
(1, 'Albania', 'Albanija', 'AL', 'https://media-2.api-sports.io/flags/al.svg', '+355', 1, '2023-06-11 12:05:30', '2024-01-16 09:18:00'),
(2, 'Algeria', 'Alžir', 'DZ', 'https://media-1.api-sports.io/flags/dz.svg', '+213', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(3, 'Andorra', 'Andora', 'AD', 'https://media-3.api-sports.io/flags/ad.svg', '+376', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(4, 'Angola', 'Angola', 'AO', 'https://media-1.api-sports.io/flags/ao.svg', '+244', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(5, 'Argentina', 'Argentina', 'AR', 'https://media-2.api-sports.io/flags/ar.svg', '+54', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(6, 'Armenia', 'Armenia', 'AM', 'https://media-3.api-sports.io/flags/am.svg', '+374', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(7, 'Aruba', 'Aruba', 'AW', 'https://media-3.api-sports.io/flags/aw.svg', '+297', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(8, 'Australia', 'Australija', 'AU', 'https://media-3.api-sports.io/flags/au.svg', '+61', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(9, 'Austria', 'Austrija', 'AT', 'https://media-2.api-sports.io/flags/at.svg', '+43', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(10, 'Azerbaidjan', 'Azerbejdžan', 'AZ', 'https://media-2.api-sports.io/flags/az.svg', '+994', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(11, 'Bahrain', 'Bahrein', 'BH', 'https://media-3.api-sports.io/flags/bh.svg', '+973', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(12, 'Bangladesh', 'Bangladeš', 'BD', 'https://media-3.api-sports.io/flags/bd.svg', '+880', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(13, 'Barbados', 'Barbados', 'BB', 'https://media-3.api-sports.io/flags/bb.svg', '+1-246', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(14, 'Belarus', 'Bjelorusija', 'BY', 'https://media-3.api-sports.io/flags/by.svg', '+375', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(15, 'Belgium', 'Belgija', 'BE', 'https://media-2.api-sports.io/flags/be.svg', '+32', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(16, 'Belize', 'Belize', 'BZ', 'https://media-2.api-sports.io/flags/bz.svg', '+501', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(17, 'Benin', 'Benin', 'BJ', 'https://media-2.api-sports.io/flags/bj.svg', '+229', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(18, 'Bermuda', 'Bermuda', 'BM', 'https://media-1.api-sports.io/flags/bm.svg', '+1-441', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(19, 'Bhutan', 'Butan', 'BT', 'https://media-2.api-sports.io/flags/bt.svg', '+975', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(20, 'Bolivia', 'Bolivija', 'BO', 'https://media-3.api-sports.io/flags/bo.svg', '+591', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(21, 'Bosnia', 'Bosna i Hercegovina', 'BA', 'https://media-1.api-sports.io/flags/ba.svg', '+387', 1, '2023-06-11 12:05:30', '2023-12-10 11:14:22'),
(22, 'Botswana', 'Bocvana', 'BW', 'https://media-2.api-sports.io/flags/bw.svg', '+267', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(23, 'Brazil', 'Brazil', 'BR', 'https://media-2.api-sports.io/flags/br.svg', '+55', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(24, 'Bulgaria', 'Bugarska', 'BG', 'https://media-2.api-sports.io/flags/bg.svg', '+359', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(25, 'Burkina-Faso', 'Burkina Faso', 'BF', 'https://media-3.api-sports.io/flags/bf.svg', '+226', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(26, 'Burundi', 'Burundi', 'BI', 'https://media-3.api-sports.io/flags/bi.svg', '+257', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(27, 'Cambodia', 'Kambodža', 'KH', 'https://media-2.api-sports.io/flags/kh.svg', '+855', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(28, 'Cameroon', 'Kamerun', 'CM', 'https://media-3.api-sports.io/flags/cm.svg', '+237', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(29, 'Canada', 'Kanada', 'CA', 'https://media-2.api-sports.io/flags/ca.svg', '+1', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(30, 'Chile', 'Čile', 'CL', 'https://media-3.api-sports.io/flags/cl.svg', '+56', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(31, 'China', 'Kina', 'CN', 'https://media-2.api-sports.io/flags/cn.svg', '+86', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(32, 'Chinese-Taipei', 'Tajvan', 'TW', 'https://media-1.api-sports.io/flags/tw.svg', '+886', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(33, 'Colombia', 'Kolumbija', 'CO', 'https://media-1.api-sports.io/flags/co.svg', '+57', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(34, 'Congo', 'Demokratska Republika Kongo', 'CD', 'https://media-3.api-sports.io/flags/cd.svg', '+243', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(35, 'Congo-DR', 'Demokratska Republika Kongo', 'CG', 'https://media-1.api-sports.io/flags/cg.svg', '+243', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(36, 'Costa-Rica', 'Kostarika', 'CR', 'https://media-2.api-sports.io/flags/cr.svg', '+506', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(37, 'Crimea', 'Krim', 'UA', 'https://media-3.api-sports.io/flags/ua.svg', '+380', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(38, 'Croatia', 'Hrvatska', 'HR', 'https://media-2.api-sports.io/flags/hr.svg', '+385', 1, '2023-06-11 12:05:30', '2023-12-17 12:39:07'),
(39, 'Cuba', 'Kuba', 'CU', 'https://media-2.api-sports.io/flags/cu.svg', '+53', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(40, 'Curacao', 'Kurasao', 'CW', 'https://media-3.api-sports.io/flags/cw.svg', '+599', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(41, 'Cyprus', 'Kipar', 'CY', 'https://media-3.api-sports.io/flags/cy.svg', '+357', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(42, 'Czech-Republic', 'Češka', 'CZ', 'https://media-3.api-sports.io/flags/cz.svg', '+420', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(43, 'Denmark', 'Danska', 'DK', 'https://media-1.api-sports.io/flags/dk.svg', '+45', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(44, 'Dominican-Republic', 'Dominikanska Republika', 'DO', 'https://media-1.api-sports.io/flags/do.svg', '+1-809', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(45, 'Ecuador', 'Ekvador', 'EC', 'https://media-3.api-sports.io/flags/ec.svg', '+593', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(46, 'Egypt', 'Egipat', 'EG', 'https://media-3.api-sports.io/flags/eg.svg', '+20', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(47, 'El-Salvador', 'Salvador', 'SV', 'https://media-1.api-sports.io/flags/sv.svg', '+503', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(48, 'England', 'Velika Britanija', 'GB', 'https://media-3.api-sports.io/flags/gb.svg', '+44', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(49, 'Estonia', 'Estonija', 'EE', 'https://media-1.api-sports.io/flags/ee.svg', '+372', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(50, 'Eswatini', 'Svazilend', 'SZ', 'https://media-1.api-sports.io/flags/sz.svg', '+268', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(51, 'Ethiopia', 'Etiopija', 'ET', 'https://media-3.api-sports.io/flags/et.svg', '+251', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(52, 'Faroe-Islands', 'Frska Ostrva', 'FO', 'https://media-3.api-sports.io/flags/fo.svg', '+298', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(53, 'Fiji', 'Fidži', 'FJ', 'https://media-2.api-sports.io/flags/fj.svg', '+679', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(54, 'Finland', 'Finska', 'FI', 'https://media-1.api-sports.io/flags/fi.svg', '+358', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(55, 'France', 'Francuska', 'FR', 'https://media-3.api-sports.io/flags/fr.svg', '+33', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(56, 'Gabon', 'Gabon', 'GA', 'https://media-3.api-sports.io/flags/ga.svg', '+241', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(57, 'Gambia', 'Gambija', 'GM', 'https://media-1.api-sports.io/flags/gm.svg', '+220', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(58, 'Georgia', 'Gruzija', 'GE', 'https://media-2.api-sports.io/flags/ge.svg', '+995', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(59, 'Germany', 'Njemačka', 'DE', 'https://media-3.api-sports.io/flags/de.svg', '+49', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(60, 'Ghana', 'Gana', 'GH', 'https://media-1.api-sports.io/flags/gh.svg', '+233', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(61, 'Gibraltar', 'Gibraltar', 'GI', 'https://media-1.api-sports.io/flags/gi.svg', '+350', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(62, 'Greece', 'Grčka', 'GR', 'https://media-1.api-sports.io/flags/gr.svg', '+30', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(63, 'Guadeloupe', 'Gvadalupe', 'GP', 'https://media-3.api-sports.io/flags/gp.svg', '+590', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(64, 'Guatemala', 'Gvatemala', 'GT', 'https://media-1.api-sports.io/flags/gt.svg', '+502', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(65, 'Guinea', 'Gvineja', 'GN', 'https://media-3.api-sports.io/flags/gn.svg', '+224', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(66, 'Haiti', 'Haiti', 'HT', 'https://media-1.api-sports.io/flags/ht.svg', '+509\n', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(67, 'Honduras', 'Honduras', 'HN', 'https://media-2.api-sports.io/flags/hn.svg', '+504', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(68, 'Hong-Kong', 'Hong Kong', 'HK', 'https://media-2.api-sports.io/flags/hk.svg', '+852', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(69, 'Hungary', 'Mađarska', 'HU', 'https://media-3.api-sports.io/flags/hu.svg', '+36', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(70, 'Iceland', 'Island', 'IS', 'https://media-1.api-sports.io/flags/is.svg', '+354', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(71, 'India', 'Indija', 'IN', 'https://media-3.api-sports.io/flags/in.svg', '+91', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(72, 'Indonesia', 'Indonezija', 'ID', 'https://media-1.api-sports.io/flags/id.svg', '+62', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(73, 'Iran', 'Iran', 'IR', 'https://media-2.api-sports.io/flags/ir.svg', '+98', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(74, 'Iraq', 'Irak', 'IQ', 'https://media-2.api-sports.io/flags/iq.svg', '+964', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(75, 'Ireland', 'Irska', 'IE', 'https://media-3.api-sports.io/flags/ie.svg', '+353', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(76, 'Israel', 'Izrael', 'IL', 'https://media-2.api-sports.io/flags/il.svg', '+972', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(77, 'Italy', 'Italija', 'IT', 'https://media-1.api-sports.io/flags/it.svg', '+39', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(78, 'Ivory-Coast', 'Obala Slonovače', 'CI', 'https://media-2.api-sports.io/flags/ci.svg', '+225', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(79, 'Jamaica', 'Jamajka', 'JM', 'https://media-2.api-sports.io/flags/jm.svg', '+1-876', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(80, 'Japan', 'Japan', 'JP', 'https://media-1.api-sports.io/flags/jp.svg', '+81', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(81, 'Jordan', 'Jordan', 'JO', 'https://media-2.api-sports.io/flags/jo.svg', '+962', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(82, 'Kazakhstan', 'Kazahstan', 'KZ', 'https://media-3.api-sports.io/flags/kz.svg', '+7', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(83, 'Kenya', 'Kenija', 'KE', 'https://media-1.api-sports.io/flags/ke.svg', '+254', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(84, 'Kosovo', 'Kosovo', 'XK', 'https://media-3.api-sports.io/flags/xk.svg', '+383', 1, '2023-06-11 12:05:30', '2023-12-17 12:41:21'),
(85, 'Kuwait', 'Kuvajt', 'KW', 'https://media-1.api-sports.io/flags/kw.svg', '+965', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(86, 'Kyrgyzstan', 'Kirgistan', 'KG', 'https://media-3.api-sports.io/flags/kg.svg', '+996', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(87, 'Laos', 'Laos', 'LA', 'https://media-2.api-sports.io/flags/la.svg', '+856', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(88, 'Latvia', 'Latvija', 'LV', 'https://media-2.api-sports.io/flags/lv.svg', '+371', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(89, 'Lebanon', 'Liban', 'LB', 'https://media-1.api-sports.io/flags/lb.svg', '+961', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(90, 'Lesotho', 'Lesoto', 'LS', 'https://media-3.api-sports.io/flags/ls.svg', '+266', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(91, 'Liberia', 'Liberija', 'LR', 'https://media-3.api-sports.io/flags/lr.svg', '+231', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(92, 'Libya', 'Libija', 'LY', 'https://media-2.api-sports.io/flags/ly.svg', '+218', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(93, 'Liechtenstein', 'Lihtenštajn', 'LI', 'https://media-1.api-sports.io/flags/li.svg', '+423', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(94, 'Lithuania', 'Litvanija', 'LT', 'https://media-3.api-sports.io/flags/lt.svg', '+370', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(95, 'Luxembourg', 'Luksemburg', 'LU', 'https://media-3.api-sports.io/flags/lu.svg', '+352', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(96, 'Macao', 'Makao', 'MO', 'https://media-3.api-sports.io/flags/mo.svg', '+853', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(97, 'Macedonia', 'Makedonija', 'MK', 'https://media-3.api-sports.io/flags/mk.svg', '+389', 1, '2023-06-11 12:05:30', '2023-12-17 12:41:02'),
(98, 'Malawi', 'Malavi', 'MW', 'https://media-1.api-sports.io/flags/mw.svg', '+265', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(99, 'Malaysia', 'Malezija', 'MY', 'https://media-1.api-sports.io/flags/my.svg', '+60', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(100, 'Maldives', 'Maldivi', 'MV', 'https://media-3.api-sports.io/flags/mv.svg', '+960', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(101, 'Mali', 'Mali', 'ML', 'https://media-2.api-sports.io/flags/ml.svg', '+223', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(102, 'Malta', 'Malta', 'MT', 'https://media-2.api-sports.io/flags/mt.svg', '+356', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(103, 'Mauritania', 'Mauritanija', 'MR', 'https://media-1.api-sports.io/flags/mr.svg', '+222', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(104, 'Mauritius', 'Mauricijus', 'MU', 'https://media-3.api-sports.io/flags/mu.svg', '+230', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(105, 'Mexico', 'Meksiko', 'MX', 'https://media-2.api-sports.io/flags/mx.svg', '+52', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(106, 'Moldova', 'Moldavija', 'MD', 'https://media-3.api-sports.io/flags/md.svg', '+373', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(107, 'Mongolia', 'Mongolija', 'MN', 'https://media-1.api-sports.io/flags/mn.svg', '+976', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(108, 'Montenegro', 'Crna Gora', 'ME', 'https://media-3.api-sports.io/flags/me.svg', '+382', 1, '2023-06-11 12:05:30', '2023-12-17 12:40:49'),
(109, 'Morocco', 'Maroko', 'MA', 'https://media-2.api-sports.io/flags/ma.svg', '+212', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(110, 'Myanmar', 'Mijanmar', 'MM', 'https://media-2.api-sports.io/flags/mm.svg', '+95', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(111, 'Namibia', 'Namibija', 'NA', 'https://media-2.api-sports.io/flags/na.svg', '+264', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(112, 'Nepal', 'Nepal', 'NP', 'https://media-2.api-sports.io/flags/np.svg', '+977', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(113, 'Netherlands', 'Holandija', 'NL', 'https://media-1.api-sports.io/flags/nl.svg', '+31', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(114, 'New-Zealand', 'Novi Zeland', 'NZ', 'https://media-3.api-sports.io/flags/nz.svg', '+64', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(115, 'Nicaragua', 'Nikaragva', 'NI', 'https://media-2.api-sports.io/flags/ni.svg', '+505', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(116, 'Nigeria', 'Nigerija', 'NG', 'https://media-1.api-sports.io/flags/ng.svg', '+234', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(117, 'Norway', 'Norveška', 'NO', 'https://media-1.api-sports.io/flags/no.svg', '+47', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(118, 'Oman', 'Oman', 'OM', 'https://media-1.api-sports.io/flags/om.svg', '+968', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(119, 'Pakistan', 'Pakistan', 'PK', 'https://media-1.api-sports.io/flags/pk.svg', '+92', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(120, 'Palestine', 'Palestina', 'PS', 'https://media-1.api-sports.io/flags/ps.svg', '+970', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(121, 'Panama', 'Panama', 'PA', 'https://media-2.api-sports.io/flags/pa.svg', '+507', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(122, 'Paraguay', 'Paragvaj', 'PY', 'https://media-2.api-sports.io/flags/py.svg', '+595', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(123, 'Peru', 'Peru', 'PE', 'https://media-3.api-sports.io/flags/pe.svg', '+51', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(124, 'Philippines', 'Filipini', 'PH', 'https://media-2.api-sports.io/flags/ph.svg', '+63', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(125, 'Poland', 'Poljska', 'PL', 'https://media-2.api-sports.io/flags/pl.svg', '+48', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(126, 'Portugal', 'Portugal', 'PT', 'https://media-3.api-sports.io/flags/pt.svg', '+351', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(127, 'Qatar', 'Katar', 'QA', 'https://media-3.api-sports.io/flags/qa.svg', '+974', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(128, 'Romania', 'Rumunija', 'RO', 'https://media-3.api-sports.io/flags/ro.svg', '+40', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(129, 'Russia', 'Rusija', 'RU', 'https://media-3.api-sports.io/flags/ru.svg', '+7', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(130, 'Rwanda', 'Ruanda', 'RW', 'https://media-2.api-sports.io/flags/rw.svg', '+250', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(131, 'San-Marino', 'San Marino', 'SM', 'https://media-1.api-sports.io/flags/sm.svg', '+378', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(132, 'Saudi-Arabia', 'Saudijska Arabija', 'SA', 'https://media-2.api-sports.io/flags/sa.svg', '+966', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(133, 'Senegal', 'Senegal', 'SN', 'https://media-2.api-sports.io/flags/sn.svg', '+221', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(134, 'Serbia', 'Srbija', 'RS', 'https://media-2.api-sports.io/flags/rs.svg', '+381', 1, '2023-06-11 12:05:30', '2023-12-17 12:40:40'),
(135, 'Singapore', 'Singapur', 'SG', 'https://media-2.api-sports.io/flags/sg.svg', '+65', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(136, 'Slovakia', 'Slovačka', 'SK', 'https://media-3.api-sports.io/flags/sk.svg', '+421', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(137, 'Slovenia', 'Slovenija', 'SI', 'https://media-2.api-sports.io/flags/si.svg', '+386', 1, '2023-06-11 12:05:30', '2023-12-17 12:41:13'),
(138, 'Somalia', 'Somalija', 'SO', 'https://media-1.api-sports.io/flags/so.svg', '+252', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(139, 'South-Africa', 'Južnoafrička Republika', 'ZA', 'https://media-3.api-sports.io/flags/za.svg', '+27', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(140, 'South-Korea', 'Južna Koreja', 'KR', 'https://media-1.api-sports.io/flags/kr.svg', '+82', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(141, 'Spain', 'Španija', 'ES', 'https://media-3.api-sports.io/flags/es.svg', '+34', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(142, 'Sudan', 'Sudan', 'SD', 'https://media-2.api-sports.io/flags/sd.svg', '+249', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(143, 'Surinam', 'Surinam', 'SR', 'https://media-1.api-sports.io/flags/sr.svg', '+597', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(144, 'Sweden', 'Švedska', 'SE', 'https://media-3.api-sports.io/flags/se.svg', '+46', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(145, 'Switzerland', 'Švicarska', 'CH', 'https://media-1.api-sports.io/flags/ch.svg', '+41', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(146, 'Syria', 'Sirija', 'SY', 'https://media-3.api-sports.io/flags/sy.svg', '+963', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(147, 'Tajikistan', 'Tadžikistan', 'TJ', 'https://media-2.api-sports.io/flags/tj.svg', '+992', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(148, 'Tanzania', 'Tanzanija', 'TZ', 'https://media-1.api-sports.io/flags/tz.svg', '+255', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(149, 'Thailand', 'Tajland', 'TH', 'https://media-2.api-sports.io/flags/th.svg', '+66', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(150, 'Trinidad-And-Tobago', 'Trinidad i Tobago', 'TT', 'https://media-2.api-sports.io/flags/tt.svg', '+1-868', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(151, 'Tunisia', 'Tunis', 'TN', 'https://media-1.api-sports.io/flags/tn.svg', '+216', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(152, 'Turkey', 'Turska', 'TR', 'https://media-3.api-sports.io/flags/tr.svg', '+90', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(153, 'Turkmenistan', 'Turkmenistan', 'TM', 'https://media-2.api-sports.io/flags/tm.svg', '+993', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(154, 'Uganda', 'Uganda', 'UG', 'https://media-2.api-sports.io/flags/ug.svg', '+256', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(155, 'United-Arab-Emirates', 'Ujedinjeni Arapski Emirati', 'AE', 'https://media-3.api-sports.io/flags/ae.svg', '+971', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(156, 'Uruguay', 'Urugvaj', 'UY', 'https://media-3.api-sports.io/flags/uy.svg', '+598', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(157, 'USA', 'Sjedinjene Američke Države', 'US', 'https://media-3.api-sports.io/flags/us.svg', '+1', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(158, 'Uzbekistan', 'Uzbekistan', 'UZ', 'https://media-2.api-sports.io/flags/uz.svg', '+998', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(159, 'Venezuela', 'Venecuela', 'VE', 'https://media-2.api-sports.io/flags/ve.svg', '+58', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(160, 'Vietnam', 'Vijetnam', 'VN', 'https://media-1.api-sports.io/flags/vn.svg', '+84', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(161, 'Zambia', 'Zambija', 'ZM', 'https://media-3.api-sports.io/flags/zm.svg', '+260', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(162, 'Zimbabwe', 'Zimbabve', 'ZW', 'https://media-2.api-sports.io/flags/zw.svg', '+263', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

DROP TABLE IF EXISTS `blog`;
CREATE TABLE IF NOT EXISTS `blog` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_desc` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` int NOT NULL DEFAULT '0',
  `small_img` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `main_img` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int NOT NULL,
  `published` tinyint NOT NULL DEFAULT '0',
  `views` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `title`, `slug`, `short_desc`, `description`, `category`, `small_img`, `main_img`, `video`, `created_by`, `published`, `views`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Test posta dijete drago', 'test-posta-dijete-drago', 'Kratk iopis djete It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. #post', '<h1><b>Why do we use it?</b></h1><p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p><h5>Where does it come from?</h5><p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p><p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham</p><p><br>#moda</p>', 4, '34', '26', 'https://www.youtube.com/embed/38rVt4Yp4Cs?si=vWuHkUDHB0N4mjEZ', 1, 1, 12, '2024-10-21 15:17:12', '2024-11-03 09:09:45', NULL),
(2, 'Moda kao umjetnost', 'moda-kao-umjetnost', 'Ako me ikada sretneš, podigni glavu, ne skreći pogled, slučajno me pogledaj. Ako me ikada sretneš, podigni glavu, ne skreći pogled, slučajno me pogledaj. Ako me ikada sretneš, podigni glavu, ne skreći pogled, slučajno me pogledaj.', '<p>yo</p>', 5, '39', NULL, NULL, 1, 1, 0, '2024-10-26 19:10:18', '2024-11-03 07:04:47', NULL),
(3, 'Deglobarizirani svijet', 'deglobarizirani-svijet', 'Hello', '<p>xDD</p>', 3, '40', NULL, '', 1, 1, 0, '2024-10-26 19:11:07', '2024-10-26 19:18:57', NULL),
(4, 'Kratki film - kokoška v0', 'kratki-film-kokoska-v0', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.It', '<p><span style=\"color: rgb(228, 226, 223); font-family: \"Josefin Sans\", sans-serif; font-size: 14px; background-color: rgb(30, 28, 28);\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\',</span></p>', 3, '41', '43', '', 1, 1, 18, '2024-10-26 19:15:05', '2024-11-03 06:52:37', NULL),
(5, 'Test posta dijete drago', 'test-posta-dijete-drago', 'Kratk iopis djete It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', '<h1><b>Why do we use it?</b></h1><p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p><h5>Where does it come from?</h5><p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p><p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham</p>', 4, '42', '26', 'https://music.youtube.com/watch?v=g6R_IKOUwIo&list=PLgaFNC_I_ZkmJN-4EckGjv6MzhG9Vb1wv', 1, 1, 0, '2024-10-21 15:17:12', '2024-10-26 19:22:06', NULL),
(6, 'Moda kao umjetnost', 'moda-kao-umjetnost', 'Ako me ikada sretneš, podigni glavu, ne skreći pogled, slučajno me pogledaj. Ako me ikada sretneš, podigni glavu, ne skreći pogled, slučajno me pogledaj. Ako me ikada sretneš, podigni glavu, ne skreći pogled, slučajno me pogledaj. Ako me ikada sretne', '<p>yo</p>', 5, '39', NULL, '', 1, 1, 0, '2024-10-26 19:10:18', '2024-10-26 19:18:35', NULL),
(7, 'Deglobarizirani svijet', 'deglobarizirani-svijet', 'Hello', '<p>xDD</p>', 3, '40', NULL, '', 1, 1, 0, '2024-10-26 19:11:07', '2024-10-26 19:18:57', NULL),
(8, 'Kratki film - kokoška', 'kratki-film-kokoska', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.It', '<p><span style=\"color: rgb(228, 226, 223);\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\',</span></p><p><span style=\"color: rgb(228, 226, 223);\"><br></span></p><p><span style=\"color: rgb(228, 226, 223);\">#tags #itWorks </span></p>', 3, '41', NULL, NULL, 1, 1, 19, '2024-10-26 19:15:05', '2024-11-03 07:24:45', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `blog__gallery`
--

DROP TABLE IF EXISTS `blog__gallery`;
CREATE TABLE IF NOT EXISTS `blog__gallery` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `blog_id` bigint UNSIGNED NOT NULL,
  `file_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `blog__gallery_blog_id_foreign` (`blog_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog__gallery`
--

INSERT INTO `blog__gallery` (`id`, `blog_id`, `file_id`, `created_at`, `updated_at`) VALUES
(2, 1, 29, '2024-10-21 15:46:22', '2024-10-21 15:46:22'),
(3, 1, 30, '2024-10-21 15:46:29', '2024-10-21 15:46:29'),
(4, 1, 31, '2024-10-21 15:46:36', '2024-10-21 15:46:36'),
(5, 1, 32, '2024-10-21 15:46:45', '2024-10-21 15:46:45');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `episodes`
--

DROP TABLE IF EXISTS `episodes`;
CREATE TABLE IF NOT EXISTS `episodes` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `presenter_id` int NOT NULL,
  `image_id` int NOT NULL,
  `video_id` int NOT NULL,
  `language_id` int NOT NULL DEFAULT '0',
  `stars` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1.0',
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_slug` (`slug`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `episodes`
--

INSERT INTO `episodes` (`id`, `title`, `slug`, `short_description`, `description`, `presenter_id`, `image_id`, `video_id`, `language_id`, `stars`, `created_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(9, 'Kaftan Studio', 'kaftan-studio', 'Društveno odgovorna moda', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum!</p><p><br></p><p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source.</p><p><br></p><p> </p><p>Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p>', 2, 46, 33, 6, '3.5', 1, '2024-10-10 15:23:50', '2024-11-02 20:25:02', NULL),
(2, 'Asimetrično ratovanje', 'asimetricno-ratovanje', '', '<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. </p><p>All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>', 2, 6, 7, 6, '1.0', 1, '2024-10-11 11:12:45', '2024-11-02 13:50:04', '2024-11-02 13:50:04'),
(3, 'Umjetnost i totalitarizam', 'umjetnost-i-totalitarizam', '', '<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. </p><p>All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>', 1, 8, 9, 0, '1.0', 1, '2024-10-11 11:13:07', '2024-11-02 13:50:20', '2024-11-02 13:50:20'),
(4, 'Novinarska etika', 'novinarska-etika', 'Novinarstvo i kulturica', '<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.</p><p>All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p><p><br>#hashtag #works #yeiA</p><p>#testxDD</p>', 8, 49, 11, 6, '1.0', 1, '2024-10-11 11:13:24', '2024-11-03 06:43:08', NULL),
(5, 'Umjetnost filmske režije', 'umjetnost-filmske-re', 'Film i politikanstvo', '<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.</p><p>All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>', 6, 47, 13, 6, '1.0', 1, '2024-10-11 11:13:32', '2024-11-02 19:47:07', NULL),
(6, 'Zarobljena država', 'zarobljena-drzava', 'Bosna i Hercegovina', '<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.</p><p>All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>', 5, 45, 16, 6, '1.0', 1, '2024-10-11 11:14:02', '2024-11-02 19:42:57', NULL),
(7, 'Deglobalizirani svijet', 'deglobalizirani-svijet', 'Yes', '<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.</p><p>All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>', 11, 51, 18, 6, '1.0', 1, '2024-10-11 11:14:19', '2024-11-02 19:53:08', NULL),
(8, 'Orkestracija u popularnoj muzici', 'orkestracija-u-popularnoj-muzici', 'Toshi i prijatelji', '<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.</p><p>All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>', 12, 52, 20, 6, '1.0', 1, '2024-10-11 11:14:58', '2024-11-02 19:53:59', NULL),
(10, 'Totalitarizmi iza nas', 'totalitarizmi-iza-nas', 'Tito je zakon', '<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.</p><p>All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>', 9, 50, 36, 6, '1.0', 1, '2024-10-26 13:05:22', '2024-11-02 19:51:35', NULL),
(11, 'Hibridno ratovanje', 'hibridno-ratovanje', 'Ratovanje u moderno doba', '<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.</p><p><br></p><p>All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p><p><br></p><p>All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>', 7, 48, 38, 6, '0.0', 1, '2024-10-26 13:05:58', '2024-11-02 20:32:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `episodes__activity`
--

DROP TABLE IF EXISTS `episodes__activity`;
CREATE TABLE IF NOT EXISTS `episodes__activity` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `episode_id` int NOT NULL,
  `video_id` int NOT NULL,
  `user_id` int NOT NULL,
  `finished` tinyint NOT NULL DEFAULT '0',
  `time` int NOT NULL DEFAULT '0',
  `progress` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_user_id` (`user_id`),
  KEY `idx_episode_id` (`episode_id`),
  KEY `idx_video_id` (`video_id`),
  KEY `idx_episode_video` (`episode_id`,`video_id`),
  KEY `idx_updated_at` (`updated_at`)
) ENGINE=MyISAM AUTO_INCREMENT=106 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `episodes__activity`
--

INSERT INTO `episodes__activity` (`id`, `episode_id`, `video_id`, `user_id`, `finished`, `time`, `progress`, `created_at`, `updated_at`) VALUES
(102, 9, 3, 3, 0, 78, '89', '2024-11-02 12:59:49', '2024-11-02 13:33:19'),
(101, 9, 2, 3, 1, 62, '100', '2024-11-02 12:59:39', '2024-11-02 12:59:49'),
(100, 11, 7, 3, 0, 64, '94', '2024-11-02 12:46:00', '2024-11-02 12:57:44'),
(99, 9, 1, 3, 1, 68, '100', '2024-11-02 12:26:46', '2024-11-02 12:59:39'),
(98, 10, 10, 3, 0, 1891, '87', '2024-11-02 12:26:41', '2024-11-02 13:01:54'),
(103, 9, 1, 1, 0, 0, '0', '2024-11-02 13:56:00', '2024-11-02 13:56:00'),
(104, 11, 7, 1, 0, 44, '64', '2024-11-02 14:28:12', '2024-11-02 19:34:38'),
(105, 6, 12, 1, 0, 0, '0', '2024-11-02 19:32:54', '2024-11-02 19:32:54');

-- --------------------------------------------------------

--
-- Table structure for table `episodes__notes`
--

DROP TABLE IF EXISTS `episodes__notes`;
CREATE TABLE IF NOT EXISTS `episodes__notes` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `episode_id` bigint UNSIGNED NOT NULL,
  `video_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `time` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `episodes__notes_episode_id_foreign` (`episode_id`),
  KEY `episodes__notes_video_id_foreign` (`video_id`),
  KEY `idx_user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `episodes__notes`
--

INSERT INTO `episodes__notes` (`id`, `episode_id`, `video_id`, `user_id`, `time`, `note`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 9, 1, 3, '03:22', 'eea aaa', '2024-10-30 19:32:37', '2024-11-01 15:30:25', '2024-11-01 15:30:25'),
(2, 9, 4, 3, '03:24', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. It is a long established fact that a reader will be distracted by the readable content of a page when', '2024-10-30 19:34:09', '2024-10-30 20:10:35', NULL),
(3, 9, 2, 3, '02:16', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. It is a long established fact that a reader will be distracted by the readable content of a page when looking at it', '2024-10-30 19:34:09', '2024-10-30 20:11:07', NULL),
(4, 9, 3, 3, '02:12', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. It is a long established fact that a reader will be distracted by the readable content of a page when looking at it', '2024-10-30 19:34:09', '2024-10-30 20:11:09', NULL),
(6, 9, 4, 3, '03:12', 'Ovo je meni bombonica :)', '2024-10-30 20:06:24', '2024-10-30 20:11:09', NULL),
(7, 9, 1, 3, '00:30', 'Bilješka jedna miki :)', '2024-11-01 15:49:13', '2024-11-01 15:49:13', NULL),
(8, 9, 2, 3, '00:03', 'Kraj bruda, does this one work?', '2024-11-01 15:49:38', '2024-11-01 15:49:38', NULL),
(9, 11, 6, 3, '02:15', 'Evo bilješka u 02:15. Evo da je uredimo :)', '2024-11-02 11:56:12', '2024-11-02 11:56:30', NULL),
(10, 11, 6, 3, '06:28', 'Evo još jedna', '2024-11-02 11:56:22', '2024-11-02 11:56:22', NULL),
(11, 11, 7, 3, '00:21', 'Bruga general gospodara mi', '2024-11-02 11:59:13', '2024-11-02 11:59:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `episodes__reviews`
--

DROP TABLE IF EXISTS `episodes__reviews`;
CREATE TABLE IF NOT EXISTS `episodes__reviews` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `episode_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `stars` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `note` text COLLATE utf8mb4_unicode_ci,
  `status` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `episodes__reviews_user_id_foreign` (`user_id`),
  KEY `idx_episode_id` (`episode_id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `episodes__reviews`
--

INSERT INTO `episodes__reviews` (`id`, `episode_id`, `user_id`, `stars`, `note`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(13, 9, 3, '3.5', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. \n\nThe point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters', 1, '2024-10-30 19:13:41', '2024-11-02 20:24:30', NULL),
(5, 9, 5, '4', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. \n\nThe point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters', 2, '2024-10-30 19:13:41', '2024-11-02 20:22:23', NULL),
(7, 9, 5, '4', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. \r\n\r\nThe point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters', 2, '2024-10-30 19:13:41', '2024-11-02 20:22:22', NULL),
(8, 9, 5, '3.5', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. \r\n\r\nThe point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters', 1, '2024-10-30 19:13:41', '2024-11-02 20:24:57', NULL),
(9, 9, 5, '3', '4', 2, '2024-10-30 19:13:41', '2024-11-02 20:22:18', NULL),
(10, 9, 5, '5', '3', 1, '2024-10-30 19:13:41', '2024-11-02 20:23:04', NULL),
(11, 9, 5, '1.5', '2', 1, '2024-10-30 19:13:41', '2024-11-02 20:25:02', NULL),
(12, 9, 5, '4', '1', 1, '2024-10-30 19:13:41', '2024-11-02 20:22:43', NULL),
(14, 11, 3, '3.5', 'Oks, nije uopšte loše!!', 2, '2024-11-02 11:46:17', '2024-11-02 20:22:12', NULL),
(15, 11, 1, '4.5', 'Odlično !!', 2, '2024-11-02 16:01:25', '2024-11-02 20:22:11', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `episodes__videos`
--

DROP TABLE IF EXISTS `episodes__videos`;
CREATE TABLE IF NOT EXISTS `episodes__videos` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `episode_id` int NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'video',
  `description` text COLLATE utf8mb4_unicode_ci,
  `library_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `video_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `duration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `duration_sec` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `views` int NOT NULL DEFAULT '0',
  `average_watch_time` int NOT NULL DEFAULT '0',
  `total_watch_time` int NOT NULL DEFAULT '0',
  `total_loads` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_episode_id` (`episode_id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `episodes__videos`
--

INSERT INTO `episodes__videos` (`id`, `episode_id`, `title`, `category`, `description`, `library_id`, `video_id`, `thumbnail`, `duration`, `duration_sec`, `views`, `average_watch_time`, `total_watch_time`, `total_loads`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 9, 'Izbori - Epizoda II', '1', '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source.</p><p><span style=\"font-size: var(--bs-body-font-size); font-weight: var(--bs-body-font-weight); letter-spacing: 0px; text-align: var(--bs-body-text-align);\">Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</span></p>', '61480', '0e947078-2670-44b3-a90f-5b7735fe0a88', 'thumbnail_72d7d7d8.jpg', '00:01:09', '69', 618, 46, 28911, 34, '2024-10-11 08:59:35', '2024-11-03 07:24:21', NULL),
(2, 9, 'Kraj Bruda', '1', '<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero</p>', '61480', '588be260-c8ef-4ab4-9baa-b9414c5196da', 'thumbnail.jpg', '00:01:03', '63', 715, 41, 29393, 16, '2024-10-11 11:09:31', '2024-11-02 12:59:39', NULL),
(3, 9, 'Kraj Bruca', '1', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters,</p>', '61480', 'c7cf806c-eac4-4e2e-a200-6f35ce1cf9a3', 'thumbnail.jpg', '00:01:28', '88', 680, 59, 40646, 20, '2024-10-11 11:09:52', '2024-11-02 13:33:12', NULL),
(4, 9, 'Kraj Bruca', '1', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters,</p>', '61480', 'ce86ff89-3cde-4e24-af66-ef15b691f518', 'thumbnail_777e8bb6.jpg', '00:01:13', '73', 623, 47, 29700, 33, '2024-10-11 11:09:52', '2024-11-01 19:13:42', NULL),
(5, 9, 'Izbori u Švrakinom 2022', '2', '<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sunt, ipsum mollitia. Temporibus suscipit quam ea non aut, ad rerum perspiciatis earum dolores pariatur quisquam magnam repudiandae dolorum dignissimos, minus incidunt.</p>', '61480', 'b0dfd23d-09ca-4c27-8c4d-22943dc75e8b', 'thumbnail.jpg', '00:36:13', '2173', 6758, 1429, 9662354, 0, '2024-11-01 20:56:47', '2024-11-01 20:56:47', NULL),
(6, 11, 'Rat - Trailer', '2', '<p><output class=\"note-status-output\" role=\"status\" aria-live=\"polite\" style=\"box-sizing: border-box; display: block; width: 1110.25px; font-size: 14px; line-height: 1.42857; height: 0px; margin-bottom: 0px; color: rgb(0, 0, 0); border-width: 0px; border-right-style: initial; border-bottom-style: initial; border-left-style: initial; border-right-color: initial; border-bottom-color: initial; border-left-color: initial; border-image: initial; border-top-style: solid; border-top-color: transparent; font-family: sans-serif; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(245, 245, 245); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\"></output><div class=\"note-statusbar\" role=\"status\" style=\"box-sizing: border-box; background-color: rgba(128, 128, 128, 0.11); border-bottom-left-radius: 4px; border-bottom-right-radius: 4px; border-top: 1px solid rgba(0, 0, 0, 0.2); color: rgb(0, 0, 0); font-family: sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\"><div class=\"note-resizebar\" aria-label=\"resize\" style=\"box-sizing: border-box; padding-top: 1px; height: 9px; width: 1110.25px; cursor: ns-resize;\"></div></div></p><div class=\"note-editing-area\" style=\"box-sizing: border-box; position: relative; overflow: hidden; color: rgb(0, 0, 0); font-family: sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(245, 245, 245); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\"><div class=\"note-editable\" contenteditable=\"false\" role=\"textbox\" aria-multiline=\"true\" spellcheck=\"true\" autocorrect=\"true\" style=\"box-sizing: border-box; outline: none; padding: 10px; overflow: auto; overflow-wrap: break-word; background-color: rgba(128, 128, 128, 0.11); height: 240px;\"><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;\">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sunt, ipsum mollitia. Temporibus suscipit quam ea non aut, ad rerum perspiciatis earum dolores pariatur quisquam magnam repudiandae dolorum dignissimos, minus incidunt.</p></div></div>', '61480', 'b0dfd23d-09ca-4c27-8c4d-22943dc75e8b', 'thumbnail.jpg', '00:36:13', '2173', 6760, 1429, 9662384, 8, '2024-11-02 11:43:53', '2024-11-02 11:55:55', NULL),
(7, 11, 'BBBB - Bruda General', '1', '<p><output class=\"note-status-output\" role=\"status\" aria-live=\"polite\" style=\"box-sizing: border-box; display: block; width: 1110.25px; font-size: 14px; line-height: 1.42857; height: 0px; margin-bottom: 0px; color: rgb(0, 0, 0); border-width: 0px; border-right-style: initial; border-bottom-style: initial; border-left-style: initial; border-right-color: initial; border-bottom-color: initial; border-left-color: initial; border-image: initial; border-top-style: solid; border-top-color: transparent; font-family: sans-serif; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(245, 245, 245); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\"></output><div class=\"note-statusbar\" role=\"status\" style=\"box-sizing: border-box; background-color: rgba(128, 128, 128, 0.11); border-bottom-left-radius: 4px; border-bottom-right-radius: 4px; border-top: 1px solid rgba(0, 0, 0, 0.2); color: rgb(0, 0, 0); font-family: sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\"><div class=\"note-resizebar\" aria-label=\"resize\" style=\"box-sizing: border-box; padding-top: 1px; height: 9px; width: 1110.25px; cursor: ns-resize;\"></div></div></p><div class=\"note-editing-area\" style=\"box-sizing: border-box; position: relative; overflow: hidden; color: rgb(0, 0, 0); font-family: sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(245, 245, 245); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\"><div class=\"note-editable\" contenteditable=\"false\" role=\"textbox\" aria-multiline=\"true\" spellcheck=\"true\" autocorrect=\"true\" style=\"box-sizing: border-box; outline: none; padding: 10px; overflow: auto; overflow-wrap: break-word; background-color: rgba(128, 128, 128, 0.11); height: 240px;\"><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;\">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sunt, ipsum mollitia. Temporibus suscipit quam ea non aut, ad rerum perspiciatis earum dolores pariatur quisquam magnam repudiandae dolorum dignissimos, minus incidunt.</p></div></div>', '61480', '0e947078-2670-44b3-a90f-5b7735fe0a88', 'thumbnail_72d7d7d8.jpg', '00:01:09', '69', 620, 46, 28989, 18, '2024-11-02 11:44:20', '2024-11-02 20:32:56', NULL),
(8, 10, 'Totalitarizam - Trailer', '2', '<p><output class=\"note-status-output\" role=\"status\" aria-live=\"polite\" style=\"box-sizing: border-box; display: block; width: 1110.25px; font-size: 14px; line-height: 1.42857; height: 0px; margin-bottom: 0px; color: rgb(0, 0, 0); border-width: 0px; border-right-style: initial; border-bottom-style: initial; border-left-style: initial; border-right-color: initial; border-bottom-color: initial; border-left-color: initial; border-image: initial; border-top-style: solid; border-top-color: transparent; font-family: sans-serif; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(245, 245, 245); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\"></output><div class=\"note-statusbar\" role=\"status\" style=\"box-sizing: border-box; background-color: rgba(128, 128, 128, 0.11); border-bottom-left-radius: 4px; border-bottom-right-radius: 4px; border-top: 1px solid rgba(0, 0, 0, 0.2); color: rgb(0, 0, 0); font-family: sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\"><div class=\"note-resizebar\" aria-label=\"resize\" style=\"box-sizing: border-box; padding-top: 1px; height: 9px; width: 1110.25px; cursor: ns-resize;\"></div></div></p><div class=\"note-editing-area\" style=\"box-sizing: border-box; position: relative; overflow: hidden; color: rgb(0, 0, 0); font-family: sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(245, 245, 245); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\"><div class=\"note-editable\" contenteditable=\"false\" role=\"textbox\" aria-multiline=\"true\" spellcheck=\"true\" autocorrect=\"true\" style=\"box-sizing: border-box; outline: none; padding: 10px; overflow: auto; overflow-wrap: break-word; background-color: rgba(128, 128, 128, 0.11); height: 240px;\"><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters,</p></div></div>', '61480', 'c7cf806c-eac4-4e2e-a200-6f35ce1cf9a3', 'thumbnail.jpg', '00:01:28', '88', 681, 59, 40653, 0, '2024-11-02 12:22:59', '2024-11-02 12:25:50', '2024-11-02 12:25:50'),
(9, 10, 'Totalitarizam - Trailer', '2', '<p><output class=\"note-status-output\" role=\"status\" aria-live=\"polite\" style=\"box-sizing: border-box; display: block; width: 1110.25px; font-size: 14px; line-height: 1.42857; height: 0px; margin-bottom: 0px; color: rgb(0, 0, 0); border-width: 0px; border-right-style: initial; border-bottom-style: initial; border-left-style: initial; border-right-color: initial; border-bottom-color: initial; border-left-color: initial; border-image: initial; border-top-style: solid; border-top-color: transparent; font-family: sans-serif; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(245, 245, 245); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\"></output><div class=\"note-statusbar\" role=\"status\" style=\"box-sizing: border-box; background-color: rgba(128, 128, 128, 0.11); border-bottom-left-radius: 4px; border-bottom-right-radius: 4px; border-top: 1px solid rgba(0, 0, 0, 0.2); color: rgb(0, 0, 0); font-family: sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\"><div class=\"note-resizebar\" aria-label=\"resize\" style=\"box-sizing: border-box; padding-top: 1px; height: 9px; width: 1110.25px; cursor: ns-resize;\"></div></div></p><div class=\"note-editing-area\" style=\"box-sizing: border-box; position: relative; overflow: hidden; color: rgb(0, 0, 0); font-family: sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(245, 245, 245); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\"><div class=\"note-editable\" contenteditable=\"false\" role=\"textbox\" aria-multiline=\"true\" spellcheck=\"true\" autocorrect=\"true\" style=\"box-sizing: border-box; outline: none; padding: 10px; overflow: auto; overflow-wrap: break-word; background-color: rgba(128, 128, 128, 0.11); height: 240px;\"><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters,</p></div></div>', '61480', 'c7cf806c-eac4-4e2e-a200-6f35ce1cf9a3', 'thumbnail.jpg', '00:01:28', '88', 681, 59, 40653, 2, '2024-11-02 12:23:28', '2024-11-02 12:24:55', NULL),
(10, 10, 'Tito i Partija', '1', '<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sunt, ipsum mollitia. Temporibus suscipit quam ea non aut, ad rerum perspiciatis earum dolores pariatur quisquam magnam repudiandae dolorum dignissimos, minus incidunt.Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sunt, ipsum mollitia. Temporibus suscipit quam ea non aut, ad rerum perspiciatis earum dolores pariatur quisquam magnam repudiandae dolorum dignissimos, minus incidunt.</p>', '61480', 'b0dfd23d-09ca-4c27-8c4d-22943dc75e8b', 'thumbnail.jpg', '00:36:13', '2173', 6761, 1429, 9662421, 5, '2024-11-02 12:24:24', '2024-11-02 13:01:48', NULL),
(11, 6, 'Trailer', '2', '<p>Test</p>', '61480', 'ce86ff89-3cde-4e24-af66-ef15b691f518', 'thumbnail_777e8bb6.jpg', '00:01:13', '73', 623, 47, 29700, 0, '2024-11-02 19:31:18', '2024-11-02 19:31:18', NULL),
(12, 6, 'Main video', '1', '<p>xD</p>', '61480', 'ce86ff89-3cde-4e24-af66-ef15b691f518', 'thumbnail_777e8bb6.jpg', '00:01:13', '73', 623, 47, 29700, 1, '2024-11-02 19:31:28', '2024-11-02 19:32:54', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hashtags`
--

DROP TABLE IF EXISTS `hashtags`;
CREATE TABLE IF NOT EXISTS `hashtags` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tag` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `clicks` int UNSIGNED NOT NULL DEFAULT '0',
  `views` int UNSIGNED NOT NULL DEFAULT '0',
  `lang` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'bs',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hashtags`
--

INSERT INTO `hashtags` (`id`, `tag`, `clicks`, `views`, `lang`, `created_at`, `updated_at`) VALUES
(17, '#testxDD', 0, 0, 'bs', '2024-11-03 06:44:44', '2024-11-03 06:44:44'),
(16, '#yeiA', 0, 0, 'bs', '2024-11-03 06:44:44', '2024-11-03 06:44:44'),
(18, '#tags', 1, 16, 'bs', '2024-11-03 06:47:14', '2024-11-03 09:09:41'),
(14, '#works', 0, 0, 'bs', '2024-11-03 06:43:30', '2024-11-03 06:43:30'),
(13, '#hashtag', 0, 0, 'bs', '2024-11-03 06:43:30', '2024-11-03 06:43:30'),
(20, '#itWorks ', 2, 16, 'bs', '2024-11-03 06:55:49', '2024-11-03 09:09:41'),
(22, '#post', 1, 14, 'bs', '2024-11-03 07:04:17', '2024-11-03 09:09:45'),
(23, '#moda', 2, 14, 'bs', '2024-11-03 07:04:17', '2024-11-03 09:09:45');

-- --------------------------------------------------------

--
-- Table structure for table `hashtags__rel`
--

DROP TABLE IF EXISTS `hashtags__rel`;
CREATE TABLE IF NOT EXISTS `hashtags__rel` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tag_id` bigint UNSIGNED NOT NULL,
  `category` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_id` int UNSIGNED NOT NULL,
  `parent` int UNSIGNED DEFAULT NULL,
  `t_column` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `hashtags__rel_tag_id_foreign` (`tag_id`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hashtags__rel`
--

INSERT INTO `hashtags__rel` (`id`, `tag_id`, `category`, `post_id`, `parent`, `t_column`, `created_at`, `updated_at`) VALUES
(23, 21, 'blog', 1, NULL, 'title', '2024-11-03 07:04:17', '2024-11-03 07:04:17'),
(21, 20, 'blog', 8, NULL, 'description', '2024-11-03 06:55:49', '2024-11-03 06:55:49'),
(20, 19, 'blog', 8, NULL, 'description', '2024-11-03 06:47:14', '2024-11-03 06:47:14'),
(19, 18, 'blog', 8, NULL, 'description', '2024-11-03 06:47:14', '2024-11-03 06:47:14'),
(18, 17, 'episodes', 4, NULL, 'description', '2024-11-03 06:44:44', '2024-11-03 06:44:44'),
(17, 16, 'episodes', 4, NULL, 'description', '2024-11-03 06:44:44', '2024-11-03 06:44:44'),
(16, 15, 'episodes', 4, NULL, 'description', '2024-11-03 06:43:30', '2024-11-03 06:43:30'),
(15, 14, 'episodes', 4, NULL, 'description', '2024-11-03 06:43:30', '2024-11-03 06:43:30'),
(14, 13, 'episodes', 4, NULL, 'description', '2024-11-03 06:43:30', '2024-11-03 06:43:30'),
(25, 22, 'blog', 1, NULL, 'short_desc', '2024-11-03 07:04:17', '2024-11-03 07:04:17'),
(26, 23, 'blog', 1, NULL, 'description', '2024-11-03 07:04:17', '2024-11-03 07:04:17'),
(27, 24, 'blog', 1, NULL, 'description', '2024-11-03 07:04:17', '2024-11-03 07:04:17');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `queue` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
CREATE TABLE IF NOT EXISTS `job_batches` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_09_24_161059___files', 2),
(5, '2024_09_24_183717___keywords', 2),
(6, '2024_09_24_183116___faqs', 3),
(7, '2024_09_24_183140___pages', 3),
(8, '2024_10_10_165405___episodes', 4),
(10, '2024_10_10_175724___episodes__videos', 5),
(11, '2024_10_11_151506___episodes__videos_activity', 6),
(12, '2024_10_19_083927___blog', 7),
(13, '2024_10_19_084054___blog_galery', 7),
(14, '2024_10_19_084233___blog_gallery', 8),
(15, '2024_10_28_172544___reviews', 9),
(16, '2024_10_30_200806___notes', 10),
(17, '2024_09_29_161419___hashtags', 11),
(18, '2024_09_29_161438___hashtags__rel', 11);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('ck6C7NRSNHJMVVMfBL7sSez9pv7PaqMT0u3yb3Qg', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoidnY5cGVKcEhtTTE4TmJhWHZGaE55YW1vU21lZEtMRmVKR0o1OU50RiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1730629100);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `api_token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birth_date` date NOT NULL,
  `address` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` int NOT NULL,
  `about` text COLLATE utf8mb4_unicode_ci,
  `photo_uri` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cover_photo_uri` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `web` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `api_token`, `remember_token`, `role`, `phone`, `birth_date`, `address`, `city`, `country`, `about`, `photo_uri`, `cover_photo_uri`, `instagram`, `facebook`, `twitter`, `linkedin`, `web`, `created_at`, `updated_at`) VALUES
(1, 'Aladin Kapić', 'aladin-kapic', 'kaapiic@gmail.com', '2024-09-28 18:41:22', '$2y$12$IqFZpDCKcrWuoa/S99PiVeefq7tPbyP6uYdC5ztyHksUfFzKfPSZW', '01387b7f7cbebf9ed48cf24a3285109dfb456142074b01d738c847050d0a82de', NULL, 'admin', '061683449', '1994-05-03', 'Muhameda ef. Pandže 55', 'Sarajevo', 21, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-09-27 16:41:15', '2024-09-27 16:41:15'),
(2, 'Emina Hodžić Adilović', 'emina-hodzic-adilovic', 'emina@hodzicadilovic.com', NULL, '$2y$12$LGPPfPLdMgBypgGL9jeGie26QyiBV/HXoCk08gk9Pm/VTRlDvttfS', '9294fad9eb4145b133488a21a2a91aa8843ea2f1e6d9271fe14eafd733d4d8fb', NULL, 'presenter', '+38762225883', '2020-01-20', 'Adresa', 'Sarajevo', 21, '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. </p><p><br></p><p>Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p><p><br></p><p> </p><p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham</p>', 'b1c4dcc2ca6a960f2db8554533d8525d.jpg', NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-11 11:57:09', '2024-11-02 19:44:29'),
(3, 'Admira Kerić', 'admira-keric', 'admira.keric@hotmail.com', '2024-10-11 15:20:36', '$2y$12$IqFZpDCKcrWuoa/S99PiVeefq7tPbyP6uYdC5ztyHksUfFzKfPSZW', 'ed3047f306c2d753bbd74536d580e2385a893e0700c7c8ba7116da4aec24391f', NULL, 'user', '+38761225883', '1991-11-12', 'Mrakuša 44', 'Sarajevo', 21, NULL, '1ef32a1de3ecd666cd3c19511c8f68f6.jpg', NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-11 13:20:09', '2024-10-28 19:42:14'),
(5, 'Ivana Korajić', 'ivana-korajic', 'ivana@korajic.com', NULL, '$2y$12$LGPPfPLdMgBypgGL9jeGie26QyiBV/HXoCk08gk9Pm/VTRlDvttf12', '9294fad9eb4145b133488a21a2a91aa8843ea2f1e6d9271fe14eafd733d4d8fC', NULL, 'presenter', '+38762225883', '2020-01-20', 'Adresa', 'Sarajevo', 21, '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. </p><p><br></p><p>Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p><p><br></p><p> </p><p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham</p>', 'ecd0a84d1904e33ee1c1f63e2056edc7.JPG', '3b8bb860f2b06276bb5765cdd61b8e2e.JPG', NULL, NULL, NULL, NULL, NULL, '2024-10-11 11:57:09', '2024-11-02 19:39:11'),
(6, 'Una Gunjak', 'una-gunjak', 'una@gunjak.com', NULL, '$2y$12$LGPPfPLdMgBypgGL9jeGie26QyiBV/HXoCk08gk9Pm/VTRlDvttf12', '9294fad9eb4145b133488a21a2a91aa8843ea2f1e6d9271fe14eafd733d4d8fD', NULL, 'presenter', '+38762225883', '2020-01-20', 'Adresa', 'Sarajevo', 21, '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. </p><p><br></p><p>Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p><p><br></p><p> </p><p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham</p>', '7c20d9c8df5d41710b815164ddc971b5.jpg', '9b7876abac1fbbce98325c7cd199d022.jpeg', NULL, NULL, NULL, NULL, NULL, '2024-10-11 11:57:09', '2024-11-02 19:46:52'),
(7, 'Robert Barić', 'robert-baric', 'robert@baric.com', NULL, '$2y$12$LGPPfPLdMgBypgGL9jeGie26QyiBV/HXoCk08gk9Pm/VTRlDvttf12', '9294fad9eb4145b133488a21a2a91aa8843ea2f1e6d9271fe14eafd733d4d8fE', NULL, 'presenter', '+38762225883', '2020-01-20', 'Adresa', 'Sarajevo', 21, '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. </p><p><br></p><p>Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p><p><br></p><p> </p><p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham</p>', '928d0d1df2949789df2d4c1d778ce40f.jpg', NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-11 11:57:09', '2024-11-02 19:48:07'),
(8, 'Tamara Skrozza', 'tamara-skrozza', 'tamara@skrozza.com', NULL, '$2y$12$LGPPfPLdMgBypgGL9jeGie26QyiBV/HXoCk08gk9Pm/VTRlDvttf12', '9294fad9eb4145b133488a21a2a91aa8843ea2f1e6d9271fe14eafd733d4d8fF', NULL, 'presenter', '+38762225883', '2020-01-20', 'Adresa', 'Sarajevo', 21, '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. </p><p><br></p><p>Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p><p><br></p><p> </p><p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham</p>', 'ee773f9068f045299d1f7ec23e5d33e3.jpg', NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-11 11:57:09', '2024-11-02 19:49:13'),
(9, 'Ivan Novak LAIBACH', 'laibach', 'laibach@laibach.com', NULL, '$2y$12$LGPPfPLdMgBypgGL9jeGie26QyiBV/HXoCk08gk9Pm/VTRlDvttf12', '9294fad9eb4145b133488a21a2a91aa8843ea2f1e6d9271fe14eafd733d4d8fG', NULL, 'presenter', '+38762225883', '2020-01-20', 'Adresa', 'Sarajevo', 21, '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. </p><p><br></p><p>Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p><p><br></p><p> </p><p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham</p>', '5f0ee09eea80ae0db70b080aa2b4ab1b.jpg', NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-11 11:57:09', '2024-11-02 19:51:21'),
(12, 'Emir Merjemić', 'emir-merjemic', 'emir@merjemic.com', NULL, '$2y$12$LGPPfPLdMgBypgGL9jeGie26QyiBV/HXoCk08gk9Pm/VTRlDvttf12', '9294fad9eb4145b133488a21a2a91aa8843ea2f1e6d9271fe14eafd733d4d8fJ', NULL, 'presenter', '+38762225883', '2020-01-20', 'Adresa', 'Sarajevo', 21, '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. </p><p><br></p><p>Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p><p><br></p><p> </p><p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham</p>', '3bbc8bd42d2e70e47b2bd40da8cc0a5c.jpg', NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-11 11:57:09', '2024-11-02 19:53:47'),
(11, 'Neven Vidaković', 'neven-vidakovic', 'neven@vidakovic.com', NULL, '$2y$12$LGPPfPLdMgBypgGL9jeGie26QyiBV/HXoCk08gk9Pm/VTRlDvttf12', '9294fad9eb4145b133488a21a2a91aa8843ea2f1e6d9271fe14eafd733d4d8fI', NULL, 'presenter', '+38762225883', '2020-01-20', 'Adresa', 'Sarajevo', 21, '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. </p><p><br></p><p>Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p><p><br></p><p> </p><p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham</p>', 'b03e0b55891cd021dd815c64779797f4.jpg', NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-11 11:57:09', '2024-11-02 19:52:55');

-- --------------------------------------------------------

--
-- Table structure for table `__faq`
--

DROP TABLE IF EXISTS `__faq`;
CREATE TABLE IF NOT EXISTS `__faq` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `what` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `__faq`
--

INSERT INTO `__faq` (`id`, `title`, `description`, `what`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Šta su to kont videa?', '<h4>Šta ti misliš o ovome?</h4><p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero.&nbsp;</p><p></p><h5><br></h5><span style=\"font-size: var(--bs-body-font-size); font-weight: var(--bs-body-font-weight); letter-spacing: 0px; text-align: var(--bs-body-text-align);\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters,</span><p></p>', 1, '2024-10-19 06:32:25', '2024-11-01 17:42:34', NULL),
(2, 'Kako se mogu pretplatiti i da li su KONT vide besplatna?', '<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero.&nbsp;</p><p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters,</p>', 1, '2024-11-01 17:33:14', '2024-11-01 17:33:14', NULL),
(3, 'Koje teme obrađuju kont videa?', '<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero.&nbsp;</p><p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters,</p>', 1, '2024-11-01 17:33:24', '2024-11-01 17:33:24', NULL),
(4, 'Da li će se kont videa nastaviti objavljivati?', '<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero.&nbsp;</p><p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters,</p>', 1, '2024-11-01 17:33:30', '2024-11-01 17:33:30', NULL),
(5, 'Kako mogu postati govorinik?', '<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero.&nbsp;</p><p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters,</p>', 1, '2024-11-01 17:33:36', '2024-11-01 17:33:36', NULL),
(6, 'Kako mogu predložiti temu?', '<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero.&nbsp;</p><p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters,</p>', 1, '2024-11-01 17:33:42', '2024-11-01 17:33:42', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `__files`
--

DROP TABLE IF EXISTS `__files`;
CREATE TABLE IF NOT EXISTS `__files` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `file` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ext` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'img',
  `path` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=54 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `__files`
--

INSERT INTO `__files` (`id`, `file`, `name`, `ext`, `type`, `path`, `created_at`, `updated_at`) VALUES
(1, 'novi.mp4', '7d3dd3e3dab41b50dac07bdd43a2138b.mp4', 'mp4', 'video', 'files/videos/', '2024-10-10 15:14:54', '2024-10-10 15:14:54'),
(2, 'novi.mp4', '2163a73505996a43509068a8371113fe.mp4', 'mp4', 'video', 'files/videos/', '2024-10-10 15:15:26', '2024-10-10 15:15:26'),
(3, 'Kaftan.jpg', '427b17d2e7921daa51e007da4d849f57.jpg', 'jpg', 'video', 'files/images/episodes/', '2024-10-10 15:15:26', '2024-10-10 15:15:26'),
(4, 'novi.mp4', 'c1e6ae6e602696c06612d79ce88d40bf.mp4', 'mp4', 'video', 'files/videos/', '2024-10-10 15:23:50', '2024-10-10 15:23:50'),
(5, 'Kaftan.jpg', '6ddf8fb6d2326e2914e8a1001efec2d8.jpg', 'jpg', 'video', 'files/images/episodes/', '2024-10-10 15:23:50', '2024-10-10 15:23:50'),
(6, 'RoberBaric01.JPG', '0cc0d454249b6a7347b8d3e1702bb688.JPG', 'JPG', 'video', 'files/images/episodes/', '2024-10-11 11:12:44', '2024-10-11 11:12:44'),
(7, 'novi.mp4', '1942b27195df2ac08d9fd687cd9946db.mp4', 'mp4', 'video', 'files/videos/', '2024-10-11 11:12:45', '2024-10-11 11:12:45'),
(8, 'Leibach.jpg', '92b4c981471d182c6ded0b4972ae3a99.jpg', 'jpg', 'video', 'files/images/episodes/', '2024-10-11 11:13:07', '2024-10-11 11:13:07'),
(9, 'novi.mp4', 'd150066ca218488fce3ef00f9035c0c1.mp4', 'mp4', 'video', 'files/videos/', '2024-10-11 11:13:07', '2024-10-11 11:13:07'),
(10, 'TamaraSkroza.JPG', '33e6a6e39d0693c52b4d8623940faa1e.JPG', 'JPG', 'video', 'files/images/episodes/', '2024-10-11 11:13:24', '2024-10-11 11:13:24'),
(11, 'novi.mp4', '8eaf8038d0c98a92585a326f72e02931.mp4', 'mp4', 'video', 'files/videos/', '2024-10-11 11:13:24', '2024-10-11 11:13:24'),
(12, 'TamaraSkroza.JPG', '8e3b59e2d1ad0c11e0aa9921ce01d3df.JPG', 'JPG', 'video', 'files/images/episodes/', '2024-10-11 11:13:32', '2024-10-11 11:13:32'),
(13, 'novi.mp4', 'baa1a56f8cf8276f8bee90c47c95dea7.mp4', 'mp4', 'video', 'files/videos/', '2024-10-11 11:13:32', '2024-10-11 11:13:32'),
(14, 'Una Gunjak.jpeg', 'ee8131fa3a5b14b5ee2a0217b9c8e919.jpeg', 'jpeg', 'video', 'files/images/episodes/', '2024-10-11 11:13:44', '2024-10-11 11:13:44'),
(15, 'IvanaKorajlic03.JPG', '2b0d78c4fa4faaae930dd95a69fac4d2.JPG', 'JPG', 'video', 'files/images/episodes/', '2024-10-11 11:14:02', '2024-10-11 11:14:02'),
(16, 'novi.mp4', '19afa1a03fae886bebeda0601623415d.mp4', 'mp4', 'video', 'files/videos/', '2024-10-11 11:14:02', '2024-10-11 11:14:02'),
(17, 'NevenVidakovic.jpg', '6661b8911511b765dac6b5b88cc903c2.jpg', 'jpg', 'video', 'files/images/episodes/', '2024-10-11 11:14:19', '2024-10-11 11:14:19'),
(18, 'novi.mp4', '94e4231df0619bf5e03ac02b59cafecb.mp4', 'mp4', 'video', 'files/videos/', '2024-10-11 11:14:19', '2024-10-11 11:14:19'),
(19, 'EmirMerjemic.jpg', 'f395d0130964a32ea9046a964bc751d7.jpg', 'jpg', 'video', 'files/images/episodes/', '2024-10-11 11:14:58', '2024-10-11 11:14:58'),
(20, 'novi.mp4', '7d36edb07c0b78a1b3befe8324ef4c2a.mp4', 'mp4', 'video', 'files/videos/', '2024-10-11 11:14:58', '2024-10-11 11:14:58'),
(21, 'Screenshot_1.png', 'a04d9ff204415caa128f548934f72730.png', 'png', 'blog_main_img', 'files/images/public-part/blog', '2024-10-21 15:34:38', '2024-10-21 15:34:38'),
(22, 'Screenshot_1.png', '4612a71b600c2188a2b9287bef2304e1.png', 'png', 'blog_main_img', 'files/images/public-part/blog', '2024-10-21 15:35:39', '2024-10-21 15:35:39'),
(23, 'Novi Projekt (1).jpg', '347995cd4824e40e2ffad67daaa9844c.jpg', 'jpg', 'blog_main_img', 'files/images/public-part/blog', '2024-10-21 15:35:53', '2024-10-21 15:35:53'),
(24, 'Novi Projekt (1).jpg', '1323970f456cec1b5fb1378b6acad19d.jpg', 'jpg', 'blog_main_img', 'files/images/public-part/blog', '2024-10-21 15:36:11', '2024-10-21 15:36:11'),
(25, 'Screenshot_1.png', '11ceade39b2ee55fc0b769451f8fce5b.png', 'png', 'blog_main_img', 'files/images/public-part/blog', '2024-10-21 15:36:46', '2024-10-21 15:36:46'),
(26, 'Novi Projekt (1).jpg', 'd6dfbb68c3ceb545609baac06fcb7cf0.jpg', 'jpg', 'blog_main_img', 'files/images/public-part/blog', '2024-10-21 15:36:59', '2024-10-21 15:36:59'),
(27, 'Haris Dž..png', 'e1452fd94a8f9f38d09cf6083d4c5637.png', 'png', 'blog_main_img', 'files/images/public-part/blog', '2024-10-21 15:37:15', '2024-10-21 15:37:15'),
(28, 'project.png', '57e35ddedcd8f2af87eef6b8e4c44e18.png', 'png', 'blog_gallery_img', 'files/images/public-part/blog', '2024-10-21 15:43:33', '2024-10-21 15:43:33'),
(29, 'project.png', '905dc69d05957ca9d529647c3a35c794.png', 'png', 'blog_gallery_img', 'files/images/public-part/blog', '2024-10-21 15:46:22', '2024-10-21 15:46:22'),
(30, 'ccc.jpg', 'ecacb41f6ffc8a230273ad29acf6467a.jpg', 'jpg', 'blog_gallery_img', 'files/images/public-part/blog', '2024-10-21 15:46:29', '2024-10-21 15:46:29'),
(31, 'aaa.jpg', '26e5f1b8ad737dbdc58fbe74cc27d991.jpg', 'jpg', 'blog_gallery_img', 'files/images/public-part/blog', '2024-10-21 15:46:36', '2024-10-21 15:46:36'),
(32, 'ee.jpg', '40bde43ee013e43092b63b7ed0701c2b.jpg', 'jpg', 'blog_gallery_img', 'files/images/public-part/blog', '2024-10-21 15:46:45', '2024-10-21 15:46:45'),
(33, 'KONT TEST h265.mp4', '4b725ffae552e350087bdd2742740106.mp4', 'mp4', 'video', 'files/videos/', '2024-10-26 12:09:26', '2024-10-26 12:09:26'),
(34, 'kaftan2.jpg', '06df230ea9aebfb4f85700d90414254c.jpg', 'jpg', 'small_img_img', 'files/images/public-part/blog', '2024-10-26 12:25:25', '2024-10-26 12:25:25'),
(35, 'UvanNovakColor.JPG', '639d22e37815006e86f35f9e32909c8b.JPG', 'JPG', 'video', 'files/images/episodes/', '2024-10-26 13:05:22', '2024-10-26 13:05:22'),
(36, 'novi.mp4', 'fed3260ceab583977eaeb8d2e4ae3d23.mp4', 'mp4', 'video', 'files/videos/', '2024-10-26 13:05:22', '2024-10-26 13:05:22'),
(37, 'RoberBaric02.JPG', '8d8820922fb68c0acf373d1658d6d773.JPG', 'JPG', 'video', 'files/images/episodes/', '2024-10-26 13:05:58', '2024-10-26 13:05:58'),
(38, 'novi.mp4', '67055112a06fbc9472ce86e566141eff.mp4', 'mp4', 'video', 'files/videos/', '2024-10-26 13:05:58', '2024-10-26 13:05:58'),
(39, '6661b8911511b765dac6b5b88cc903c2.jpg', 'a160271e375aef10ae7f04246cb1155d.jpg', 'jpg', 'small_img_img', 'files/images/public-part/blog', '2024-10-26 19:10:47', '2024-10-26 19:10:47'),
(40, 'UnaGunjak.jpg', '9e8ae38abe4bcfb9704c7bcce905a097.jpg', 'jpg', 'small_img_img', 'files/images/public-part/blog', '2024-10-26 19:11:23', '2024-10-26 19:11:23'),
(41, '8d8820922fb68c0acf373d1658d6d773.JPG', 'e01cef365266da7feadb5b0c45e19b0d.JPG', 'JPG', 'small_img_img', 'files/images/public-part/blog', '2024-10-26 19:15:14', '2024-10-26 19:15:14'),
(42, 'IvanNovak.jpg', '80ea1721f458afe80cfb951342dda57c.jpg', 'jpg', 'small_img_img', 'files/images/public-part/blog', '2024-10-26 19:22:06', '2024-10-26 19:22:06'),
(43, 'RoberBaric01.JPG', '94ff1d2a85a0e43d3c116617720c3d37.JPG', 'JPG', 'main_img_img', 'files/images/public-part/blog', '2024-10-26 20:01:02', '2024-10-26 20:01:02'),
(44, 'ivana-photo.JPG', 'abb80981242fe88106ab489c801f2bce.JPG', 'JPG', 'video', 'files/images/episodes/', '2024-11-02 16:22:49', '2024-11-02 16:22:49'),
(45, 'ivana-photo.JPG', 'c89960d0af1700f5b385d15ea4499a6e.JPG', 'JPG', 'video', 'files/images/episodes/', '2024-11-02 19:42:57', '2024-11-02 19:42:57'),
(46, 'kaftan-photo.jpg', '352d864f3fbbceb32af62684fa15661b.jpg', 'jpg', 'video', 'files/images/episodes/', '2024-11-02 19:44:43', '2024-11-02 19:44:43'),
(47, 'una-photo.jpg', 'd22e7b4456c8ebfa201a1bffa65ba030.jpg', 'jpg', 'video', 'files/images/episodes/', '2024-11-02 19:47:07', '2024-11-02 19:47:07'),
(48, 'robert-photo.jpg', 'b8be172648b92e131124c0a284848a71.jpg', 'jpg', 'video', 'files/images/episodes/', '2024-11-02 19:48:19', '2024-11-02 19:48:19'),
(49, 'tamara-photo.jpg', '88ee1366d96e610e8532c76b8687b775.jpg', 'jpg', 'video', 'files/images/episodes/', '2024-11-02 19:49:24', '2024-11-02 19:49:24'),
(50, 'laibach-photo.jpg', '8a6620c152e7bdb69617750425874514.jpg', 'jpg', 'video', 'files/images/episodes/', '2024-11-02 19:51:35', '2024-11-02 19:51:35'),
(51, 'neven-photo.jpg', 'add35f93466279ae6fdba8f70d6e7610.jpg', 'jpg', 'video', 'files/images/episodes/', '2024-11-02 19:53:08', '2024-11-02 19:53:08'),
(52, 'emir-photo.jpg', '9a607739b09532d1473cdd3df54a2088.jpg', 'jpg', 'video', 'files/images/episodes/', '2024-11-02 19:53:59', '2024-11-02 19:53:59'),
(53, '639d22e37815006e86f35f9e32909c8b.JPG', '4b9b591b822e05e39652e1afa4b90c21.JPG', 'JPG', 'program_file', 'files/images/public-part/single-pages/', '2024-11-03 08:29:38', '2024-11-03 08:29:38');

-- --------------------------------------------------------

--
-- Table structure for table `__keywords`
--

DROP TABLE IF EXISTS `__keywords`;
CREATE TABLE IF NOT EXISTS `__keywords` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `type` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `value` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `__keywords`
--

INSERT INTO `__keywords` (`id`, `type`, `name`, `description`, `value`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'video_category', 'Video', 'Normalni video', 'video', '2024-10-10 16:01:02', '2024-10-10 16:01:02', NULL),
(2, 'video_category', 'Trailer', 'Trailer videa', 'trailer', '2024-10-10 16:01:20', '2024-10-10 16:01:20', NULL),
(3, 'blog_category', 'Video i produkcija', NULL, NULL, '2024-10-21 15:14:45', '2024-10-21 15:14:45', NULL),
(4, 'blog_category', 'Umjetnost', NULL, NULL, '2024-10-21 15:14:48', '2024-10-21 15:14:48', NULL),
(5, 'blog_category', 'Šuplja priča', NULL, NULL, '2024-10-21 15:14:48', '2024-10-21 15:14:48', NULL),
(6, 'languages', 'Bosanski jezik', NULL, NULL, '2024-10-30 16:46:09', '2024-10-30 16:46:09', NULL),
(7, 'languages', 'Engleski jezik', NULL, NULL, '2024-10-30 16:46:15', '2024-10-30 16:46:15', NULL),
(8, 'faq__section', 'General', 'Generalna sekcija FAQ-a (U biti, FAQ u ovom slučaju pošto nema kategorije)', '1', '2024-11-01 17:28:40', '2024-11-01 17:30:41', NULL),
(9, 'faq__section', 'Epizode', 'Šifarnik za Epizode ..', '2', '2024-11-01 17:30:51', '2024-11-01 17:30:53', '2024-11-01 17:30:53'),
(10, 'reviews_status', 'Na čekanju', 'Recenzija čeka na odobrenje administratora', '0', '2024-11-02 20:10:34', '2024-11-02 20:10:58', NULL),
(11, 'reviews_status', 'Objavljeno', 'Recenzija je vidljiva javnosti', '1', '2024-11-02 20:10:50', '2024-11-02 20:10:50', NULL),
(12, 'reviews_status', 'Odbijena', 'Recenzija je odbijena iz određenog razloga', '2', '2024-11-02 20:11:13', '2024-11-02 20:11:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `__pages`
--

DROP TABLE IF EXISTS `__pages`;
CREATE TABLE IF NOT EXISTS `__pages` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_id` int DEFAULT NULL,
  `yt_link` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `__pages`
--

INSERT INTO `__pages` (`id`, `title`, `description`, `image_id`, `yt_link`, `created_at`, `updated_at`) VALUES
(1, 'O nama', '<h4>O nama</h4><p>Why do we use it?</p><p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p><p><br></p><p>Where does it come from?</p><p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p><p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>', 53, 'https://www.youtube.com/embed/EYV85g7X8Ek?si=0tpL84PyHkX_VCEV', NULL, '2024-11-03 09:10:12'),
(2, 'Impressum', '<h1 style=\"color: rgb(0, 0, 0);\">Impressum</h1><p style=\"color: rgb(0, 0, 0);\"><br></p><p>Why do we use it?</p><p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p><p><br></p><p>Where does it come from?</p><p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p><p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>', NULL, NULL, NULL, '2024-11-03 09:17:57'),
(3, 'Pravila korištenja', '', NULL, NULL, NULL, NULL),
(4, 'Politika privatnosti', '', NULL, NULL, NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
