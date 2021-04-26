-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.10-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             10.3.0.5771
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table sample_banking.branch_tbl
DROP TABLE IF EXISTS `branch_tbl`;
CREATE TABLE IF NOT EXISTS `branch_tbl` (
  `branch_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT '',
  `icon_class` varchar(255) DEFAULT '',
  `phone` varchar(255) DEFAULT '',
  `address` varchar(255) DEFAULT '',
  `created_stamp` datetime DEFAULT NULL,
  PRIMARY KEY (`branch_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Dumping data for table sample_banking.branch_tbl: 6 rows
/*!40000 ALTER TABLE `branch_tbl` DISABLE KEYS */;
REPLACE INTO `branch_tbl` (`branch_id`, `name`, `icon_class`, `phone`, `address`, `created_stamp`) VALUES
	(1, 'Bank Z 1', 'fas fa-chess-board', '112 992 1123', '522 checkered st', '2021-04-23 17:11:03'),
	(2, 'Micro Bank', 'fas fa-chess-pawn', '298 332 1121', '9109 Slam dunk ave.', '2021-04-23 17:55:09'),
	(3, 'Waterfront', 'fas fa-chess', '389-221-4421', '2708 skeeter st', '2021-04-24 12:11:33'),
	(5, 'Showtime Bank', 'fas fa-chess-queen', '9208452021', '982 everson ave', '2021-04-25 16:53:43'),
	(7, 'Golden Banking', 'fas fa-user-check', '528-1132-5589', '859 noodle st', '2021-04-25 17:20:47'),
	(6, 'Craftwood Bank', 'fas fa-chess-knight', '3458939822', '1908 zoomer st.', '2021-04-25 17:07:03');
/*!40000 ALTER TABLE `branch_tbl` ENABLE KEYS */;

-- Dumping structure for table sample_banking.customer_tbl
DROP TABLE IF EXISTS `customer_tbl`;
CREATE TABLE IF NOT EXISTS `customer_tbl` (
  `customer_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `branch_id` int(10) unsigned DEFAULT 0,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `balance` decimal(10,2) DEFAULT 0.00,
  `created_stamp` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=MyISAM AUTO_INCREMENT=102 DEFAULT CHARSET=utf8;

-- Dumping data for table sample_banking.customer_tbl: 101 rows
/*!40000 ALTER TABLE `customer_tbl` DISABLE KEYS */;
REPLACE INTO `customer_tbl` (`customer_id`, `branch_id`, `first_name`, `last_name`, `phone`, `address`, `balance`, `created_stamp`) VALUES
	(1, 1, 'Neville', 'Hanson', '1-207-796-7921', '445-6874 Mollis Street', 238560.00, '2020-11-09 12:59:07'),
	(2, 1, 'Yardley', 'Flynn', '1-843-429-4144', '4086 Sapien Road', 168118.00, '2020-07-30 11:27:20'),
	(3, 1, 'Conan', 'Meyers', '1-348-691-5657', '623 Aliquam St.', 174533.00, '2020-05-06 12:37:35'),
	(4, 1, 'Porter', 'Newman', '1-861-246-8614', '3961 Quisque St.', 156479.00, '2021-04-01 09:22:23'),
	(5, 1, 'Vernon', 'Sosa', '1-732-605-1488', 'P.O. Box 781, 4935 Bibendum St.', 4090188.50, '2022-04-24 22:55:22'),
	(6, 1, 'Halla', 'Young', '1-988-960-3027', '6757 Purus Street', 59336.00, '2021-03-12 09:59:32'),
	(7, 1, 'Rebekah', 'Randall', '1-441-330-8541', '107-6383 Dolor. Street', 197344.00, '2021-12-16 08:47:53'),
	(8, 1, 'Arsenio', 'Palmer', '1-988-259-7941', '8591 Blandit. Road', 138727.00, '2020-10-17 23:17:10'),
	(9, 1, 'Joan', 'Leach', '1-967-792-2323', 'Ap #926-4616 Tellus Avenue', 84155.00, '2020-11-19 03:50:31'),
	(10, 1, 'Irene', 'Reyes', '1-515-708-7695', 'Ap #853-180 Diam. St.', 100869.00, '2021-03-12 06:20:49'),
	(11, 1, 'Benedict', 'Flores', '1-741-101-8668', '1711 Sed St.', 88611.00, '2020-12-04 17:11:02'),
	(12, 1, 'Marvin', 'Boone', '1-735-946-0752', '5470 Ultricies Ave', 227618.00, '2021-07-25 04:11:04'),
	(13, 1, 'India', 'Cortez', '1-602-708-3807', 'Ap #366-5138 Dictum Ave', 179907.00, '2022-02-07 00:49:38'),
	(14, 1, 'Genevieve', 'Rojas', '1-329-961-1584', 'Ap #126-8794 Magna St.', 46119.00, '2022-01-02 12:42:34'),
	(15, 1, 'Sawyer', 'Roy', '1-243-983-9520', '357-8091 Donec Street', 128330.00, '2021-08-09 08:12:40'),
	(16, 1, 'Carly', 'Whitaker', '1-265-878-0946', 'Ap #786-7039 Molestie Road', 75481.00, '2020-08-30 17:45:07'),
	(17, 1, 'Palmer', 'Carter', '1-393-976-2280', 'Ap #847-5535 Porttitor Street', 43543.00, '2020-09-22 11:55:05'),
	(18, 1, 'Meredith', 'Lopez', '1-380-704-4158', '8498 Pede. St.', 1982.00, '2022-03-09 23:26:38'),
	(19, 1, 'Tatiana', 'Carpenter', '1-413-152-6686', 'Ap #744-4624 At Street', 30887.00, '2020-07-08 19:25:26'),
	(20, 1, 'Stephen', 'Wall', '1-384-410-9424', 'P.O. Box 613, 1966 Tristique St.', 189535.00, '2022-02-21 07:17:03'),
	(21, 1, 'Hoyt', 'Burns', '1-834-218-1763', '598-5429 Nunc Rd.', 107373.00, '2021-04-22 11:10:55'),
	(22, 5, 'Desiree', 'Stanton', '1-501-373-8706', '8877 Suspendisse St.', 204688.00, '2021-11-09 02:11:48'),
	(23, 1, 'Joy', 'Shepard', '1-266-627-9775', '6775 Nam St.', 236606.00, '2020-08-26 10:49:24'),
	(24, 5, 'Desirae', 'Bradford', '1-695-206-5035', '622-7309 Massa. Rd.', 233879.00, '2021-10-18 22:02:58'),
	(25, 1, 'Damian', 'Harper', '1-181-466-8354', 'Ap #280-1858 Pede Road', 80653.00, '2020-08-23 18:05:31'),
	(26, 1, 'Porter', 'Fitzpatrick', '1-197-486-3181', 'P.O. Box 573, 9932 Et Avenue', 105473.00, '2021-05-03 17:33:31'),
	(27, 1, 'Olivia', 'Valentine', '1-307-503-6903', 'P.O. Box 505, 4998 Orci Road', 156757.00, '2020-12-27 17:03:01'),
	(28, 2, 'Keane', 'Gallegos', '1-324-785-1095', 'P.O. Box 901, 8205 Quisque St.', 140454.00, '2021-04-21 23:24:24'),
	(29, 5, 'Garth', 'Brock', '1-240-291-9621', '918-9195 Leo Road', 190028.00, '2021-12-08 06:46:29'),
	(30, 2, 'Keefe', 'Hill', '1-233-981-2043', 'Ap #357-921 Id St.', 185304.00, '2020-10-14 16:50:28'),
	(31, 2, 'Kenyon', 'Saunders', '1-738-931-5892', 'Ap #365-8321 Ligula. St.', 236466.00, '2020-11-29 20:07:46'),
	(32, 5, 'Lacy', 'Sloan', '1-207-963-4709', 'Ap #133-9075 Et St.', 47754.00, '2022-04-02 03:01:48'),
	(33, 2, 'Rowan', 'Crosby', '1-500-200-9911', 'Ap #780-1364 Ligula. St.', 167422.00, '2021-07-22 12:54:52'),
	(34, 2, 'Hamilton', 'Bruce', '1-318-782-6421', 'Ap #512-6882 Urna. Rd.', 156436.00, '2021-04-07 13:37:04'),
	(35, 2, 'Dieter', 'Harding', '1-440-336-0601', '2064 Ultrices Ave', 56761.00, '2022-03-17 13:43:02'),
	(36, 2, 'Blake', 'Vega', '1-869-459-5175', 'Ap #857-8003 Et Avenue', 130963.00, '2020-12-17 12:59:28'),
	(37, 2, 'Colleen', 'Barber', '1-896-800-2072', 'P.O. Box 762, 1955 Amet St.', 94186.00, '2021-07-22 19:37:26'),
	(38, 2, 'Joy', 'Galloway', '1-195-305-8484', 'Ap #259-2397 Nunc Ave', 92004.00, '2021-03-29 23:43:36'),
	(39, 2, 'Yuli', 'Serrano', '1-740-764-2586', '2380 Aliquet. Rd.', 16388.00, '2020-09-24 14:18:16'),
	(40, 2, 'Judith', 'Banks', '1-182-769-3015', 'Ap #487-5050 A, Road', 32485.00, '2020-11-23 06:16:09'),
	(41, 2, 'Holmes', 'Shepard', '1-866-849-5943', '2703 Nulla St.', 69327.00, '2020-06-19 13:08:52'),
	(42, 2, 'Georgia', 'Hendricks', '1-892-265-8635', 'P.O. Box 186, 6098 Nulla Ave', 104829.00, '2020-11-03 07:05:02'),
	(43, 2, 'Zorita', 'Barrett', '1-990-630-9131', 'P.O. Box 944, 5510 Aliquam, Av.', 114686.00, '2020-09-05 12:15:49'),
	(44, 2, 'Tasha', 'Collier', '1-325-102-4937', 'Ap #709-9177 Id St.', 56563.00, '2021-05-03 01:57:14'),
	(45, 2, 'Denton', 'Patrick', '1-692-228-6756', '492-3335 Sed Street', 99686.00, '2020-09-10 05:55:26'),
	(46, 2, 'Edward', 'Kline', '1-669-770-6940', 'P.O. Box 120, 159 Ornare, St.', 50223.00, '2021-11-06 10:10:22'),
	(47, 2, 'Nomlanga', 'Mcbride', '1-317-626-5901', 'P.O. Box 446, 3066 Ac St.', 133894.00, '2021-01-11 11:14:36'),
	(48, 2, 'Sawyer', 'Nolan', '1-525-452-6508', '5527 Nunc Rd.', 19003.00, '2020-08-06 05:43:41'),
	(49, 2, 'Kyle', 'Knowles', '1-411-868-8919', 'P.O. Box 382, 2193 Ante Av.', 241706.00, '2020-07-24 21:05:47'),
	(50, 2, 'Keegan', 'Townsend', '1-625-623-7995', 'P.O. Box 461, 4249 Neque. St.', 178710.00, '2021-09-05 14:31:43'),
	(51, 2, 'Noble', 'Witt', '1-156-272-9976', 'P.O. Box 858, 8539 In Rd.', 157717.00, '2021-02-08 10:11:07'),
	(52, 2, 'Porter', 'Barlow', '1-706-946-3222', '5583 Fringilla Rd.', 229374.00, '2020-09-18 01:04:03'),
	(53, 2, 'Gail', 'Barnes', '1-898-836-3359', '146-301 Diam. Rd.', 3806.00, '2020-07-30 13:23:40'),
	(54, 2, 'Oliver', 'Davis', '1-431-583-9261', 'Ap #141-9578 Et Avenue', 230418.00, '2021-08-01 07:06:38'),
	(55, 2, 'Isabelle', 'Mckee', '1-162-986-0979', '732-2202 Sapien Rd.', 138168.00, '2022-02-20 02:01:59'),
	(56, 2, 'Dean', 'Ferrell', '1-261-964-8379', '9889 A St.', 249801.00, '2020-07-27 05:15:38'),
	(57, 2, 'Coby', 'Vinson', '1-916-405-3468', 'P.O. Box 993, 3974 Sollicitudin Rd.', 228884.00, '2021-07-09 21:50:41'),
	(58, 2, 'Austin', 'Garza', '1-936-520-3426', 'Ap #233-5893 Gravida. Ave', 32150.00, '2022-03-09 17:17:15'),
	(59, 2, 'Barbara', 'Austin', '1-186-182-1172', '407-6573 Eget, Avenue', 7661.00, '2022-02-15 19:10:36'),
	(60, 2, 'Lilah', 'Sheppard', '1-325-423-0635', '622-6745 Urna. Rd.', 89164.00, '2022-01-18 05:40:12'),
	(61, 3, 'David', 'Kennedy', '1-418-600-8447', 'P.O. Box 475, 7119 Orci Rd.', 92951.00, '2021-06-07 19:54:23'),
	(62, 5, 'Rylee', 'Holden', '1-982-627-3903', 'P.O. Box 137, 1227 Cras Avenue', 150321.00, '2022-03-29 00:04:16'),
	(63, 3, 'Uriel', 'Cain', '1-453-364-8399', '519-3725 Donec St.', 196735.00, '2021-07-26 15:31:22'),
	(64, 5, 'Raphael', 'Blevins', '1-917-779-9896', '2073 Lectus St.', 96558.00, '2022-03-28 18:38:49'),
	(65, 5, 'Cameron', 'Barrera', '1-807-330-0725', '8490 Varius Av.', 99873.00, '2021-09-28 18:11:46'),
	(66, 3, 'Xanthus', 'Scott', '1-631-601-4551', '740-7077 Ultrices Ave', 140587.00, '2020-06-11 12:39:27'),
	(67, 3, 'Malachi', 'Parker', '1-378-327-8700', 'P.O. Box 177, 5454 Iaculis Rd.', 2147.00, '2020-08-17 01:48:28'),
	(68, 3, 'Alice', 'Delaney', '1-580-590-8470', '564-1161 Lacus. Rd.', 163396.00, '2020-08-24 16:10:21'),
	(69, 3, 'Gisela', 'Banks', '1-700-827-8854', 'Ap #571-2778 Posuere St.', 37151.00, '2022-02-28 12:12:17'),
	(70, 3, 'Rana', 'Stafford', '1-874-711-3889', '380-9864 Turpis Avenue', 24896.00, '2020-12-12 11:41:05'),
	(71, 3, 'Ella', 'Harrington', '1-126-537-7733', '244-4800 Vitae Road', 1519.00, '2020-08-06 04:44:42'),
	(72, 3, 'Ulysses', 'Holder', '1-578-934-1955', 'P.O. Box 126, 3399 Enim. Street', 238646.00, '2020-08-06 02:01:12'),
	(73, 3, 'Ivory', 'Dunlap', '1-770-393-3014', '9652 Metus. Road', 15520.00, '2021-11-10 17:48:54'),
	(74, 3, 'Graiden', 'Parrish', '1-114-551-9032', '757-7782 Integer Rd.', 60878.00, '2020-06-12 22:11:06'),
	(75, 5, 'Emery', 'Hill', '1-599-407-5114', '2085 Nec Avenue', 193723.00, '2021-11-20 20:07:02'),
	(76, 3, 'Doris', 'Lane', '1-910-365-2481', '216-5161 Ut Ave', 88182.00, '2021-03-26 12:56:50'),
	(77, 3, 'Lavinia', 'Mccoy', '1-921-198-1930', '609-4901 Nulla Rd.', 178252.00, '2020-04-28 05:51:46'),
	(78, 3, 'Vincent', 'Mccarty', '1-177-553-0011', 'Ap #238-9123 Vivamus Rd.', 246803.00, '2021-03-09 22:02:00'),
	(79, 3, 'Zeus', 'Schwartz', '1-434-761-1396', '3365 In Ave', 202859.00, '2021-09-07 20:20:29'),
	(80, 3, 'Melvin', 'Harper', '1-104-739-4356', '357-5001 Magnis St.', 25365.00, '2020-12-04 08:48:42'),
	(81, 3, 'Blair', 'Pollard', '1-480-673-4459', '4372 Cum St.', 30754.00, '2021-09-29 18:00:34'),
	(82, 3, 'Fiona', 'Schneider', '1-528-207-6687', '924-9607 Cursus, Street', 83049.00, '2020-08-24 20:01:09'),
	(83, 3, 'Kyle', 'Riley', '1-841-818-1855', '834-7262 Ipsum Ave', 103802.00, '2020-05-04 12:10:01'),
	(84, 3, 'Ori', 'Mccoy', '1-909-302-6202', '6972 Dui, St.', 189345.00, '2021-05-13 11:44:09'),
	(85, 3, 'Jonah', 'Nielsen', '1-293-801-1557', 'Ap #380-2158 Risus. Ave', 234158.00, '2021-04-09 11:55:00'),
	(86, 3, 'Rooney', 'Hewitt', '1-781-893-8380', '2253 Nec Avenue', 193481.00, '2020-08-02 07:10:48'),
	(87, 3, 'Sonia', 'Palmer', '1-747-354-1939', 'P.O. Box 365, 5269 Enim Av.', 208425.00, '2020-09-06 19:42:22'),
	(88, 3, 'TaShya', 'Wall', '1-977-190-6372', '803-3711 Condimentum. Street', 123868.00, '2020-06-22 06:44:12'),
	(89, 3, 'Shannon', 'Pace', '1-602-957-5400', '250-6376 A, Rd.', 108647.00, '2020-08-13 23:42:45'),
	(90, 3, 'Chiquita', 'Hebert', '1-916-958-1458', '8700 Feugiat Avenue', 246134.00, '2021-04-22 05:57:22'),
	(91, 3, 'Adria', 'Ayala', '1-252-200-1191', '695-1857 Vulputate St.', 46802.00, '2021-08-08 03:00:13'),
	(92, 3, 'Nadine', 'Thompson', '1-931-730-1554', 'P.O. Box 202, 5202 Nulla Avenue', 176240.00, '2021-12-01 12:18:53'),
	(93, 3, 'Macaulay', 'Harrington', '1-433-692-1567', 'P.O. Box 533, 8968 Est. Rd.', 145991.00, '2021-10-05 06:01:46'),
	(94, 3, 'Scarlet', 'Kinney', '1-339-995-1154', '953-1827 Sapien. Av.', 175874.00, '2022-03-26 11:21:10'),
	(95, 3, 'Cara', 'Wooten', '1-915-858-0892', 'P.O. Box 371, 4118 Vel Rd.', 205838.00, '2022-03-28 17:06:35'),
	(96, 3, 'Sloane', 'Campos', '1-506-887-7856', 'P.O. Box 430, 9596 Dui. St.', 107809.00, '2020-05-18 04:32:04'),
	(97, 3, 'Jane', 'Becker', '1-484-589-5541', '890-6411 Proin Avenue', 146287.00, '2021-06-25 00:06:20'),
	(98, 3, 'Orla', 'Rose', '1-454-327-7693', 'Ap #247-6421 Odio. Road', 188151.00, '2022-03-21 16:03:20'),
	(99, 3, 'Troy', 'Thompson', '1-333-788-6461', 'P.O. Box 649, 4348 Rutrum Street', 39601.00, '2021-04-18 18:41:00'),
	(100, 3, 'Ivor', 'Carson', '1-375-876-1801', 'P.O. Box 489, 2645 Dictum Avenue', 93601.00, '2021-10-19 09:11:52'),
	(101, 7, 'Avery', 'Reeves', '489-322-1123', '298 repeat drive', 60000.00, '2021-04-25 17:21:23');
/*!40000 ALTER TABLE `customer_tbl` ENABLE KEYS */;

-- Dumping structure for table sample_banking.location_tbl
DROP TABLE IF EXISTS `location_tbl`;
CREATE TABLE IF NOT EXISTS `location_tbl` (
  `location_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `branch_id` int(10) unsigned DEFAULT 0,
  `title` varchar(255) DEFAULT '',
  `address` varchar(255) DEFAULT '',
  `phone` varchar(255) DEFAULT '',
  `created_stamp` datetime DEFAULT NULL,
  PRIMARY KEY (`location_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table sample_banking.location_tbl: 0 rows
/*!40000 ALTER TABLE `location_tbl` DISABLE KEYS */;
REPLACE INTO `location_tbl` (`location_id`, `branch_id`, `title`, `address`, `phone`, `created_stamp`) VALUES
	(1, 7, 'Waterloo', '720 drip drop st', '289-332-2213', '2021-04-25 17:47:23'),
	(2, 7, 'Mapleton', '2890 Underwood ave', '283-332-6643', '2021-04-25 17:48:02'),
	(3, 3, 'Boardwalk', '20092 Boardwalk Ave', '423-221-5535', '2021-04-25 17:58:08');
/*!40000 ALTER TABLE `location_tbl` ENABLE KEYS */;

-- Dumping structure for table sample_banking.note_customer_tbl
DROP TABLE IF EXISTS `note_customer_tbl`;
CREATE TABLE IF NOT EXISTS `note_customer_tbl` (
  `note_customer_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `note_id` int(11) unsigned DEFAULT 0,
  `customer_id` int(11) unsigned DEFAULT 0,
  `branch_id` int(11) unsigned DEFAULT 0,
  PRIMARY KEY (`note_customer_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table sample_banking.note_customer_tbl: 0 rows
/*!40000 ALTER TABLE `note_customer_tbl` DISABLE KEYS */;
/*!40000 ALTER TABLE `note_customer_tbl` ENABLE KEYS */;

-- Dumping structure for table sample_banking.note_tbl
DROP TABLE IF EXISTS `note_tbl`;
CREATE TABLE IF NOT EXISTS `note_tbl` (
  `note_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `note_type_id` int(10) DEFAULT 0 COMMENT 'customer added, customer edited, transaction',
  `note` text DEFAULT '',
  `created_stamp` datetime DEFAULT NULL,
  PRIMARY KEY (`note_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table sample_banking.note_tbl: 0 rows
/*!40000 ALTER TABLE `note_tbl` DISABLE KEYS */;
/*!40000 ALTER TABLE `note_tbl` ENABLE KEYS */;

-- Dumping structure for table sample_banking.note_type_tbl
DROP TABLE IF EXISTS `note_type_tbl`;
CREATE TABLE IF NOT EXISTS `note_type_tbl` (
  `note_type_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(255) DEFAULT '',
  `color` varchar(255) DEFAULT '',
  `icon_class` varchar(255) DEFAULT '',
  PRIMARY KEY (`note_type_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table sample_banking.note_type_tbl: 0 rows
/*!40000 ALTER TABLE `note_type_tbl` DISABLE KEYS */;
/*!40000 ALTER TABLE `note_type_tbl` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
