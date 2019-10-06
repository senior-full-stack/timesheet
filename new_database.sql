-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.6-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             10.1.0.5464
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for timetrack_new
CREATE DATABASE IF NOT EXISTS `timetrack_new` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `timetrack_new`;

-- Dumping structure for table timetrack_new.admins
CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table timetrack_new.admins: ~0 rows (approximately)
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
REPLACE INTO `admins` (`id`, `username`, `password`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'admin', 'fcea920f7412b5da7be0cf42b8c93759', 1, '2018-12-15 00:00:00', '2018-12-15 20:13:46');
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;

-- Dumping structure for table timetrack_new.clients
CREATE TABLE IF NOT EXISTS `clients` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `client_name` varchar(255) NOT NULL,
  `client_addr` varchar(255) NOT NULL,
  `client_phone` varchar(255) NOT NULL,
  `client_email` varchar(255) NOT NULL,
  `client_contact` varchar(255) DEFAULT NULL,
  `client_dicip` varchar(255) DEFAULT NULL,
  `importance_level` varchar(255) DEFAULT NULL,
  `client_comments` varchar(255) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Dumping data for table timetrack_new.clients: ~5 rows (approximately)
/*!40000 ALTER TABLE `clients` DISABLE KEYS */;
REPLACE INTO `clients` (`id`, `client_name`, `client_addr`, `client_phone`, `client_email`, `client_contact`, `client_dicip`, `importance_level`, `client_comments`, `updated_at`, `created_at`) VALUES
	(1, 'gdae', 'address', '123', 'gdae@email.com', 'contact', 'dicp', 'medium', 'wow', '2019-10-04 14:15:28', '2019-09-09 01:43:04'),
	(2, 'fgead', 'add', '12', 'fgead@outlook.com', 'con', 'di', 'high', 'wonder full', '2019-10-04 14:18:05', '2019-09-17 01:43:10'),
	(3, 'ttew', 'address1', '12345667890', 'ttew@test.com', 'person', 'dicipline', 'low', 'poor', '2019-10-04 14:18:53', '2019-09-02 01:43:16'),
	(5, 'Angel_change', 'address', '123456', 'angel@angel.com', 'aaa', 'dicipline', 'high', 'This is changed by angel', '2019-10-04 15:30:17', '2019-10-04 02:07:24'),
	(6, 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'medium', 'asdf', '2019-10-04 15:31:22', '2019-10-04 15:31:22');
/*!40000 ALTER TABLE `clients` ENABLE KEYS */;

-- Dumping structure for table timetrack_new.departments
CREATE TABLE IF NOT EXISTS `departments` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table timetrack_new.departments: ~9 rows (approximately)
/*!40000 ALTER TABLE `departments` DISABLE KEYS */;
REPLACE INTO `departments` (`id`, `type`) VALUES
	(1, 'Highways'),
	(2, 'Bridges'),
	(3, 'Utilities'),
	(4, 'Architectural'),
	(5, 'Structural'),
	(6, 'MEP'),
	(7, 'LandScaping'),
	(8, 'Traffic'),
	(9, 'Constracts/QS');
/*!40000 ALTER TABLE `departments` ENABLE KEYS */;

-- Dumping structure for table timetrack_new.disciplines
CREATE TABLE IF NOT EXISTS `disciplines` (
  `discipline_id` int(50) NOT NULL AUTO_INCREMENT,
  `discipline_number` varchar(50) DEFAULT NULL,
  `discipline_type` varchar(255) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`discipline_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table timetrack_new.disciplines: ~9 rows (approximately)
/*!40000 ALTER TABLE `disciplines` DISABLE KEYS */;
REPLACE INTO `disciplines` (`discipline_id`, `discipline_number`, `discipline_type`, `updated_at`, `created_at`) VALUES
	(1, '001', 'Highways', '2019-09-04 19:53:22', '2019-09-04 19:47:09'),
	(2, '002', 'Bridges', '2019-09-04 19:53:54', '2019-09-04 19:53:54'),
	(3, '003', 'Utilities', '2019-09-12 16:31:29', '2019-09-12 16:31:29'),
	(4, '004', 'Architectrual', '2019-09-12 16:31:39', '2019-09-12 16:31:39'),
	(5, '005', 'Structural', '2019-09-12 16:31:47', '2019-09-12 16:31:47'),
	(6, '006', 'MEP', '2019-09-12 16:31:55', '2019-09-12 16:31:55'),
	(7, '007', 'Landscaping', '2019-09-12 16:32:32', '2019-09-12 16:32:32'),
	(8, '008', 'Traffic', '2019-09-12 16:32:45', '2019-09-12 16:32:45'),
	(9, '009', 'Contracts/QS', '2019-09-13 01:14:39', '2019-09-13 01:14:39');
/*!40000 ALTER TABLE `disciplines` ENABLE KEYS */;

-- Dumping structure for table timetrack_new.messages
CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `from_user_id` int(11) NOT NULL,
  `to_user_id` int(11) NOT NULL,
  `type` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_format` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `time` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table timetrack_new.messages: ~13 rows (approximately)
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
REPLACE INTO `messages` (`id`, `from_user_id`, `to_user_id`, `type`, `file_format`, `file_path`, `message`, `date`, `time`, `ip`, `deleted_at`, `created_at`, `updated_at`) VALUES
	(11, 2, 1, 'text', '', '', 'Hello', '2019-09-20', '03:59 PM', '127.0.0.1', NULL, NULL, NULL),
	(12, 2, 1, 'text', '', '', 'Nice to meet you', '2019-09-20', '03:59 PM', '127.0.0.1', NULL, NULL, NULL),
	(13, 1, 2, 'text', '', '', 'hello', '2019-09-20', '03:59 PM', '127.0.0.1', NULL, NULL, NULL),
	(14, 1, 2, 'text', '', '', 'are you there', '2019-09-20', '03:59 PM', '127.0.0.1', NULL, NULL, NULL),
	(15, 2, 1, 'text', '', '', 'I am here', '2019-09-20', '04:00 PM', '127.0.0.1', NULL, NULL, NULL),
	(16, 1, 2, 'text', '', '', 'okay', '2019-09-20', '04:00 PM', '127.0.0.1', NULL, NULL, NULL),
	(17, 1, 2, 'text', '', '', 'hey', '2019-09-20', '05:25 PM', '127.0.0.1', NULL, NULL, NULL),
	(18, 1, 2, 'text', '', '', 'asdfsdfsdasdfasdfasdfasdfasdfasdfasdfasdfasdf', '2019-09-20', '06:08 PM', '127.0.0.1', NULL, NULL, NULL),
	(19, 1, 2, 'text', '', '', 'Hello', '2019-09-20', '06:26 PM', '127.0.0.1', NULL, NULL, NULL),
	(20, 1, 2, 'text', '', '', 'Nice to meet you', '2019-09-20', '06:26 PM', '127.0.0.1', NULL, NULL, NULL),
	(21, 2, 1, 'text', '', '', 'hi.', '2019-09-20', '06:29 PM', '127.0.0.1', NULL, NULL, NULL),
	(22, 2, 1, 'text', '', '', 'sorry for being late', '2019-09-20', '06:29 PM', '127.0.0.1', NULL, NULL, NULL),
	(23, 1, 2, 'text', '', '', 'sdfsf', '2019-09-24', '07:23 PM', '127.0.0.1', NULL, NULL, NULL);
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;

-- Dumping structure for table timetrack_new.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table timetrack_new.migrations: ~3 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
REPLACE INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(3, '2014_10_12_000000_create_users_table', 1),
	(4, '2014_10_12_100000_create_password_resets_table', 1),
	(5, '2018_07_27_092819_create_messages_table', 2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table timetrack_new.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table timetrack_new.password_resets: ~0 rows (approximately)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table timetrack_new.phases
CREATE TABLE IF NOT EXISTS `phases` (
  `phase_id` int(50) NOT NULL AUTO_INCREMENT,
  `phase_number` varchar(50) DEFAULT NULL,
  `phase_name` varchar(255) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`phase_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table timetrack_new.phases: ~6 rows (approximately)
/*!40000 ALTER TABLE `phases` DISABLE KEYS */;
REPLACE INTO `phases` (`phase_id`, `phase_number`, `phase_name`, `updated_at`, `created_at`) VALUES
	(1, '001', 'Concept Design', '2019-09-04 20:22:45', '2019-09-04 20:22:45'),
	(2, '002', 'Preliminary Design', '2019-09-04 20:22:59', '2019-09-04 20:22:59'),
	(3, '003', 'Final Design', '2019-09-13 01:15:03', '2019-09-13 01:15:03'),
	(4, '004', 'Tender Documents', '2019-09-13 01:15:15', '2019-09-13 01:15:15'),
	(5, '005', 'NOC\'s', '2019-09-13 01:15:25', '2019-09-13 01:15:25'),
	(6, '006', 'Site Support', '2019-09-13 01:15:34', '2019-09-13 01:15:34');
/*!40000 ALTER TABLE `phases` ENABLE KEYS */;

-- Dumping structure for table timetrack_new.projects
CREATE TABLE IF NOT EXISTS `projects` (
  `project_id` int(50) NOT NULL AUTO_INCREMENT,
  `project_number` varchar(50) DEFAULT NULL,
  `project_name` varchar(255) NOT NULL,
  `project_totalhrs` double DEFAULT NULL,
  `project_rate` double DEFAULT NULL,
  `project_actual_rate` double DEFAULT NULL,
  `clientid` int(50) DEFAULT NULL,
  `contractamount` double DEFAULT NULL,
  `authorizedbudget` double DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`project_id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table timetrack_new.projects: ~21 rows (approximately)
/*!40000 ALTER TABLE `projects` DISABLE KEYS */;
REPLACE INTO `projects` (`project_id`, `project_number`, `project_name`, `project_totalhrs`, `project_rate`, `project_actual_rate`, `clientid`, `contractamount`, `authorizedbudget`, `updated_at`, `created_at`) VALUES
	(2, '103-04', 'Global Village', 100, 11, 33, 1, 42000, 24000, '2019-10-04 11:48:01', '2019-09-17 16:21:39'),
	(3, '1200-005', 'Business Bay Canal', 300, 20, 39, 1, 1500, 1000, '2019-09-25 18:17:16', '2019-09-12 16:21:52'),
	(4, '123‐07', 'Meydan Heights', 250, 30, NULL, NULL, NULL, NULL, '2019-09-12 16:22:02', '2019-09-12 16:22:02'),
	(5, '144‐01', 'R910 Al Khawaneej', 120, 20, 5, 1, 200000, 200000, '2019-10-03 15:27:58', '2019-09-16 04:22:16'),
	(6, '144-02', 'RTA R1015-3 Various Improvements', 350, 15, 44, 1, 122350, 122350, '2019-10-03 15:57:10', '2019-09-12 16:22:28'),
	(7, '144-02 (R1015/4)', 'R1015/4 - Various Improvement', 212, 50, NULL, 2, NULL, NULL, '2019-09-12 16:22:39', '2019-09-02 12:22:39'),
	(8, '153‐002', 'Meydan Racecourse Villas', 232, 6, NULL, 2, NULL, NULL, '2019-09-12 16:22:51', '2019-09-12 16:22:51'),
	(9, '153‐002A', 'Meydan Racecourse Villas ‐ Water Bodies', 240, 15, NULL, 3, NULL, NULL, '2019-09-12 16:23:08', '2019-09-08 12:23:08'),
	(10, '153‐004', 'MGC(Meydan Southern Extension)', 560, 20, NULL, 3, NULL, NULL, '2019-09-12 16:23:24', '2019-09-06 03:23:24'),
	(11, '153‐005', 'Meydan Avenue (Diamond Business Park)', 471, 20, NULL, 3, NULL, NULL, '2019-09-12 16:23:37', '2019-09-03 20:23:37'),
	(12, '153-012', 'Meydan Utilities As-Built Drawings', 561, 20, NULL, 3, NULL, NULL, '2019-09-12 16:23:53', '2019-09-12 16:23:53'),
	(13, '153‐014', 'Meydan Business Park 1', 364, 30, NULL, 3, NULL, NULL, '2019-09-12 16:24:06', '2019-09-09 05:24:06'),
	(14, '153-021', 'Belhasa Project', 366, 30, NULL, 2, NULL, NULL, '2019-09-12 16:24:33', '2019-09-12 16:24:33'),
	(15, '153‐027', 'Reclamation of Ex. Asphalt', 189, 30, NULL, 2, NULL, NULL, '2019-09-12 16:24:44', '2019-09-18 11:24:44'),
	(16, '159‐007', 'RAK Sheikh Rashid Road', 696, 25, NULL, 4, NULL, NULL, '2019-09-12 16:24:54', '2019-09-12 16:24:54'),
	(17, '168-001', 'Roads & Drainage Design for EBS Factory', 450, 25, NULL, 4, NULL, NULL, '2019-09-12 16:25:06', '2019-09-14 22:25:06'),
	(18, '172‐003', 'Falcon City Security Guard', 669, 25, NULL, NULL, NULL, NULL, '2019-09-12 16:25:17', '2019-09-12 16:25:17'),
	(19, '172‐004', 'Falcon City Parking Lot', 548, 50, NULL, NULL, NULL, NULL, '2019-09-12 16:25:30', '2019-09-20 10:25:30'),
	(20, '172‐005', 'Falcon City Sign Board', 233, 50, NULL, NULL, NULL, NULL, '2019-09-12 16:25:42', '2019-09-12 16:25:42'),
	(21, '172-006', 'FC- Electrical Network & 132kV SS', 900, 50, NULL, NULL, NULL, NULL, '2019-09-12 16:25:54', '2019-09-15 11:25:54'),
	(22, '172-007', 'Electrical & Storm Water Master Plan', 599, 60, NULL, NULL, NULL, NULL, '2019-09-12 16:26:29', '2019-09-12 16:26:29');
/*!40000 ALTER TABLE `projects` ENABLE KEYS */;

-- Dumping structure for table timetrack_new.proposals
CREATE TABLE IF NOT EXISTS `proposals` (
  `proposal_id` int(11) NOT NULL AUTO_INCREMENT,
  `client_id` int(11) NOT NULL DEFAULT 0,
  `proposal_name` varchar(50) DEFAULT '0',
  `importance_level` varchar(50) DEFAULT '0',
  `startDate` date DEFAULT NULL,
  `endDate` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`proposal_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Dumping data for table timetrack_new.proposals: ~2 rows (approximately)
/*!40000 ALTER TABLE `proposals` DISABLE KEYS */;
REPLACE INTO `proposals` (`proposal_id`, `client_id`, `proposal_name`, `importance_level`, `startDate`, `endDate`, `created_at`, `updated_at`) VALUES
	(3, 5, 'when can you', 'low', '2019-10-01', '2019-10-04', '2019-10-04 13:36:50', '2019-10-04 14:07:59'),
	(4, 5, 'qwer', 'low', '2019-10-03', '2019-10-15', '2019-10-04 15:38:54', '2019-10-04 15:38:54');
/*!40000 ALTER TABLE `proposals` ENABLE KEYS */;

-- Dumping structure for table timetrack_new.resources
CREATE TABLE IF NOT EXISTS `resources` (
  `resource_id` int(50) NOT NULL AUTO_INCREMENT,
  `resource_number` varchar(50) DEFAULT NULL,
  `resource_type` varchar(255) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`resource_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table timetrack_new.resources: ~5 rows (approximately)
/*!40000 ALTER TABLE `resources` DISABLE KEYS */;
REPLACE INTO `resources` (`resource_id`, `resource_number`, `resource_type`, `updated_at`, `created_at`) VALUES
	(1, '001', 'Proj. Manager', '2019-09-13 01:16:03', '2019-09-04 20:36:32'),
	(2, '002', 'Engineer', '2019-10-04 16:59:38', '2019-09-04 20:38:38'),
	(3, '003', 'Architect', '2019-09-13 01:16:24', '2019-09-13 01:16:24'),
	(4, '004', 'QS', '2019-09-13 01:16:34', '2019-09-13 01:16:34'),
	(5, '005', 'CAD1', '2019-09-15 08:26:25', '2019-09-13 01:16:44');
/*!40000 ALTER TABLE `resources` ENABLE KEYS */;

-- Dumping structure for table timetrack_new.timesheets
CREATE TABLE IF NOT EXISTS `timesheets` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `project_id` int(50) DEFAULT NULL,
  `discipline_id` int(50) DEFAULT NULL,
  `phase_id` int(50) DEFAULT NULL,
  `resource_id` int(50) DEFAULT NULL,
  `time_value1` double DEFAULT NULL,
  `time_value2` double DEFAULT NULL,
  `time_value3` double DEFAULT NULL,
  `time_value4` double DEFAULT NULL,
  `time_value5` double DEFAULT NULL,
  `time_value6` double DEFAULT NULL,
  `time_value7` double DEFAULT NULL,
  `total_time` double DEFAULT NULL,
  `hourly_type` varchar(255) DEFAULT NULL,
  `orderby_id` int(50) NOT NULL,
  `week_date` date DEFAULT NULL,
  `month_val` int(11) DEFAULT NULL,
  `user_id` int(50) NOT NULL,
  `task_contract_amount` double DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=425 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table timetrack_new.timesheets: ~100 rows (approximately)
/*!40000 ALTER TABLE `timesheets` DISABLE KEYS */;
REPLACE INTO `timesheets` (`id`, `project_id`, `discipline_id`, `phase_id`, `resource_id`, `time_value1`, `time_value2`, `time_value3`, `time_value4`, `time_value5`, `time_value6`, `time_value7`, `total_time`, `hourly_type`, `orderby_id`, `week_date`, `month_val`, `user_id`, `task_contract_amount`, `updated_at`, `created_at`) VALUES
	(325, 2, 2, 2, 2, 0, 3, 4, 2, 4, 3, 5, 23, 'regular', 0, '2019-09-19', 9, 1, 12000, '2019-10-04 11:48:02', '2019-09-13 13:07:40'),
	(326, 6, 5, 5, 3, 0, 4, 3, 5, 3, 5, 3, 26, 'regular', 1, '2019-09-19', 9, 1, 34850, '2019-10-03 15:57:11', '2019-09-13 13:07:40'),
	(327, 3, 2, 1, 4, 0, 3, 2, 1, 5, 3, 1, 20, 'regular', 2, '2019-09-19', 9, 1, 25, '2019-09-25 18:17:16', '2019-09-13 13:07:40'),
	(328, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'regular', 3, '2019-09-19', 9, 1, NULL, '2019-09-16 12:23:02', '2019-09-13 13:07:40'),
	(329, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'regular', 4, '2019-09-19', 9, 1, NULL, '2019-09-16 12:23:02', '2019-09-13 13:07:40'),
	(330, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'regular', 5, '2019-09-19', 9, 1, NULL, '2019-09-16 12:23:02', '2019-09-13 13:07:40'),
	(331, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'regular', 6, '2019-09-19', 9, 1, NULL, '2019-09-16 12:23:03', '2019-09-13 13:07:40'),
	(332, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'regular', 7, '2019-09-19', 9, 1, NULL, '2019-09-16 12:23:03', '2019-09-13 13:07:40'),
	(333, 3, 3, 2, 3, 2, 6, 2, 5, 8, 7, 5, 35, 'overtime', 8, '2019-09-19', 9, 1, 23, '2019-09-25 18:17:16', '2019-09-13 13:07:40'),
	(334, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'overtime', 9, '2019-09-19', 9, 1, NULL, '2019-09-16 12:23:03', '2019-09-13 13:07:40'),
	(335, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'overtime', 10, '2019-09-19', 9, 1, NULL, '2019-09-16 12:23:03', '2019-09-13 13:07:40'),
	(336, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'overtime', 11, '2019-09-19', 9, 1, NULL, '2019-09-16 12:23:03', '2019-09-13 13:07:40'),
	(337, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'overtime', 12, '2019-09-19', 9, 1, NULL, '2019-09-16 12:23:03', '2019-09-13 13:07:40'),
	(338, NULL, NULL, NULL, 2, 3, 5, 8, 7, 2, 3, 1, 29, 'othertime', 13, '2019-09-19', 9, 1, NULL, '2019-09-16 12:23:03', '2019-09-13 13:07:40'),
	(339, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'othertime', 14, '2019-09-19', 9, 1, NULL, '2019-09-16 12:23:03', '2019-09-13 13:07:40'),
	(340, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'othertime', 15, '2019-09-19', 9, 1, NULL, '2019-09-16 12:23:03', '2019-09-13 13:07:40'),
	(341, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'othertime', 16, '2019-09-19', 9, 1, NULL, '2019-09-16 12:23:03', '2019-09-13 13:07:40'),
	(342, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'othertime', 17, '2019-09-19', 9, 1, NULL, '2019-09-16 12:23:03', '2019-09-13 13:07:40'),
	(343, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'othertime', 18, '2019-09-19', 9, 1, NULL, '2019-09-16 12:23:03', '2019-09-13 13:07:40'),
	(344, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'othertime', 19, '2019-09-19', 9, 1, NULL, '2019-09-16 12:23:03', '2019-09-13 13:07:40'),
	(345, 4, 3, 2, 3, NULL, 5, 16, 5, 3, 64, 5, 98, 'regular', 0, '2019-09-19', 9, 2, NULL, '2019-09-19 06:23:21', '2019-09-19 06:23:21'),
	(346, 6, 3, 3, 3, NULL, 3, 4, 5, 6, 3, 4, 25, 'regular', 1, '2019-09-19', 9, 2, 62500, '2019-10-03 15:57:10', '2019-09-19 06:23:21'),
	(347, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'regular', 2, '2019-09-19', 9, 2, NULL, '2019-09-19 06:23:21', '2019-09-19 06:23:21'),
	(348, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'regular', 3, '2019-09-19', 9, 2, NULL, '2019-09-19 06:23:21', '2019-09-19 06:23:21'),
	(349, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'regular', 4, '2019-09-19', 9, 2, NULL, '2019-09-19 06:23:21', '2019-09-19 06:23:21'),
	(350, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'regular', 5, '2019-09-19', 9, 2, NULL, '2019-09-19 06:23:21', '2019-09-19 06:23:21'),
	(351, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'regular', 6, '2019-09-19', 9, 2, NULL, '2019-09-19 06:23:21', '2019-09-19 06:23:21'),
	(352, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'regular', 7, '2019-09-19', 9, 2, NULL, '2019-09-19 06:23:22', '2019-09-19 06:23:22'),
	(353, 20, 2, 2, 4, 5, 6, 4, 4, 5, 4, 5, 33, 'overtime', 8, '2019-09-19', 9, 2, NULL, '2019-09-19 06:23:22', '2019-09-19 06:23:22'),
	(354, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'overtime', 9, '2019-09-19', 9, 2, NULL, '2019-09-19 06:23:22', '2019-09-19 06:23:22'),
	(355, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'overtime', 10, '2019-09-19', 9, 2, NULL, '2019-09-19 06:23:22', '2019-09-19 06:23:22'),
	(356, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'overtime', 11, '2019-09-19', 9, 2, NULL, '2019-09-19 06:23:22', '2019-09-19 06:23:22'),
	(357, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'overtime', 12, '2019-09-19', 9, 2, NULL, '2019-09-19 06:23:22', '2019-09-19 06:23:22'),
	(358, NULL, NULL, NULL, 4, 4, 5, 6, 4, 3, 6, 4, 32, 'othertime', 13, '2019-09-19', 9, 2, NULL, '2019-09-19 06:23:22', '2019-09-19 06:23:22'),
	(359, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'othertime', 14, '2019-09-19', 9, 2, NULL, '2019-09-19 06:23:22', '2019-09-19 06:23:22'),
	(360, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'othertime', 15, '2019-09-19', 9, 2, NULL, '2019-09-19 06:23:22', '2019-09-19 06:23:22'),
	(361, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'othertime', 16, '2019-09-19', 9, 2, NULL, '2019-09-19 06:23:22', '2019-09-19 06:23:22'),
	(362, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'othertime', 17, '2019-09-19', 9, 2, NULL, '2019-09-19 06:23:22', '2019-09-19 06:23:22'),
	(363, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'othertime', 18, '2019-09-19', 9, 2, NULL, '2019-09-19 06:23:22', '2019-09-19 06:23:22'),
	(364, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'othertime', 19, '2019-09-19', 9, 2, NULL, '2019-09-19 06:23:22', '2019-09-19 06:23:22'),
	(365, 3, 3, 2, 2, NULL, 4, 5, 3, 4, 5, 3, 24, 'regular', 0, '2019-09-26', 9, 1, 49, '2019-09-25 18:17:16', '2019-09-24 09:15:42'),
	(366, 5, 2, 4, 4, NULL, 4, 3, 2, 4, 5, 3, 21, 'regular', 1, '2019-09-26', 9, 1, 50000, '2019-10-03 15:27:58', '2019-09-24 09:15:42'),
	(367, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'regular', 2, '2019-09-26', 9, 1, NULL, '2019-09-24 09:15:42', '2019-09-24 09:15:42'),
	(368, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'regular', 3, '2019-09-26', 9, 1, NULL, '2019-09-24 09:15:42', '2019-09-24 09:15:42'),
	(369, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'regular', 4, '2019-09-26', 9, 1, NULL, '2019-09-24 09:15:42', '2019-09-24 09:15:42'),
	(370, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'regular', 5, '2019-09-26', 9, 1, NULL, '2019-09-24 09:15:42', '2019-09-24 09:15:42'),
	(371, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'regular', 6, '2019-09-26', 9, 1, NULL, '2019-09-24 09:15:42', '2019-09-24 09:15:42'),
	(372, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'regular', 7, '2019-09-26', 9, 1, NULL, '2019-09-24 09:15:42', '2019-09-24 09:15:42'),
	(373, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'overtime', 8, '2019-09-26', 9, 1, NULL, '2019-09-24 09:15:42', '2019-09-24 09:15:42'),
	(374, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'overtime', 9, '2019-09-26', 9, 1, NULL, '2019-09-24 09:15:42', '2019-09-24 09:15:42'),
	(375, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'overtime', 10, '2019-09-26', 9, 1, NULL, '2019-09-24 09:15:42', '2019-09-24 09:15:42'),
	(376, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'overtime', 11, '2019-09-26', 9, 1, NULL, '2019-09-24 09:15:42', '2019-09-24 09:15:42'),
	(377, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'overtime', 12, '2019-09-26', 9, 1, NULL, '2019-09-24 09:15:42', '2019-09-24 09:15:42'),
	(378, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'othertime', 13, '2019-09-26', 9, 1, NULL, '2019-09-24 09:15:42', '2019-09-24 09:15:42'),
	(379, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'othertime', 14, '2019-09-26', 9, 1, NULL, '2019-09-24 09:15:42', '2019-09-24 09:15:42'),
	(380, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'othertime', 15, '2019-09-26', 9, 1, NULL, '2019-09-24 09:15:42', '2019-09-24 09:15:42'),
	(381, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'othertime', 16, '2019-09-26', 9, 1, NULL, '2019-09-24 09:15:42', '2019-09-24 09:15:42'),
	(382, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'othertime', 17, '2019-09-26', 9, 1, NULL, '2019-09-24 09:15:42', '2019-09-24 09:15:42'),
	(383, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'othertime', 18, '2019-09-26', 9, 1, NULL, '2019-09-24 09:15:43', '2019-09-24 09:15:43'),
	(384, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'othertime', 19, '2019-09-26', 9, 1, NULL, '2019-09-24 09:15:43', '2019-09-24 09:15:43'),
	(385, 2, 1, 1, 2, NULL, 3, 2, 13, 13, 123, 21, 175, 'regular', 0, '2019-10-03', 10, 1, 10000, '2019-10-04 11:48:02', '2019-10-03 17:10:28'),
	(386, 8, NULL, NULL, NULL, NULL, 100, NULL, NULL, NULL, NULL, NULL, 100, 'regular', 1, '2019-10-03', 10, 1, NULL, '2019-10-03 17:25:57', '2019-10-03 17:10:28'),
	(387, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'regular', 2, '2019-10-03', 10, 1, NULL, '2019-10-03 17:25:57', '2019-10-03 17:10:28'),
	(388, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'regular', 3, '2019-10-03', 10, 1, NULL, '2019-10-03 17:25:57', '2019-10-03 17:10:28'),
	(389, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'regular', 4, '2019-10-03', 10, 1, NULL, '2019-10-03 17:25:57', '2019-10-03 17:10:28'),
	(390, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'regular', 5, '2019-10-03', 10, 1, NULL, '2019-10-03 17:25:57', '2019-10-03 17:10:29'),
	(391, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'regular', 6, '2019-10-03', 10, 1, NULL, '2019-10-03 17:25:57', '2019-10-03 17:10:29'),
	(392, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'regular', 7, '2019-10-03', 10, 1, NULL, '2019-10-03 17:25:57', '2019-10-03 17:10:29'),
	(393, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'overtime', 8, '2019-10-03', 10, 1, NULL, '2019-10-03 17:25:57', '2019-10-03 17:10:29'),
	(394, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'overtime', 9, '2019-10-03', 10, 1, NULL, '2019-10-03 17:25:57', '2019-10-03 17:10:29'),
	(395, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'overtime', 10, '2019-10-03', 10, 1, NULL, '2019-10-03 17:25:57', '2019-10-03 17:10:29'),
	(396, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'overtime', 11, '2019-10-03', 10, 1, NULL, '2019-10-03 17:25:57', '2019-10-03 17:10:29'),
	(397, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'overtime', 12, '2019-10-03', 10, 1, NULL, '2019-10-03 17:25:57', '2019-10-03 17:10:29'),
	(398, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'othertime', 13, '2019-10-03', 10, 1, NULL, '2019-10-03 17:25:57', '2019-10-03 17:10:29'),
	(399, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'othertime', 14, '2019-10-03', 10, 1, NULL, '2019-10-03 17:25:57', '2019-10-03 17:10:29'),
	(400, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'othertime', 15, '2019-10-03', 10, 1, NULL, '2019-10-03 17:25:57', '2019-10-03 17:10:29'),
	(401, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'othertime', 16, '2019-10-03', 10, 1, NULL, '2019-10-03 17:25:57', '2019-10-03 17:10:29'),
	(402, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'othertime', 17, '2019-10-03', 10, 1, NULL, '2019-10-03 17:25:57', '2019-10-03 17:10:29'),
	(403, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'othertime', 18, '2019-10-03', 10, 1, NULL, '2019-10-03 17:25:57', '2019-10-03 17:10:29'),
	(404, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'othertime', 19, '2019-10-03', 10, 1, NULL, '2019-10-03 17:25:57', '2019-10-03 17:10:29'),
	(405, 2, 1, 1, 1, NULL, 5, NULL, NULL, NULL, NULL, 5, 10, 'regular', 0, '2019-10-10', 10, 1, 5000, '2019-10-04 11:48:02', '2019-10-04 08:04:06'),
	(406, 2, 2, 2, 2, NULL, NULL, NULL, NULL, NULL, NULL, 15, 15, 'regular', 1, '2019-10-10', 10, 1, 15000, '2019-10-04 11:48:02', '2019-10-04 08:04:06'),
	(407, 3, 3, 3, 3, NULL, NULL, NULL, NULL, NULL, NULL, 20, 20, 'regular', 2, '2019-10-10', 10, 1, NULL, '2019-10-04 08:04:06', '2019-10-04 08:04:06'),
	(408, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'regular', 3, '2019-10-10', 10, 1, NULL, '2019-10-04 08:04:06', '2019-10-04 08:04:06'),
	(409, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'regular', 4, '2019-10-10', 10, 1, NULL, '2019-10-04 08:04:07', '2019-10-04 08:04:07'),
	(410, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'regular', 5, '2019-10-10', 10, 1, NULL, '2019-10-04 08:04:07', '2019-10-04 08:04:07'),
	(411, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'regular', 6, '2019-10-10', 10, 1, NULL, '2019-10-04 08:04:07', '2019-10-04 08:04:07'),
	(412, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'regular', 7, '2019-10-10', 10, 1, NULL, '2019-10-04 08:04:07', '2019-10-04 08:04:07'),
	(413, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'overtime', 8, '2019-10-10', 10, 1, NULL, '2019-10-04 08:04:07', '2019-10-04 08:04:07'),
	(414, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'overtime', 9, '2019-10-10', 10, 1, NULL, '2019-10-04 08:04:07', '2019-10-04 08:04:07'),
	(415, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'overtime', 10, '2019-10-10', 10, 1, NULL, '2019-10-04 08:04:07', '2019-10-04 08:04:07'),
	(416, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'overtime', 11, '2019-10-10', 10, 1, NULL, '2019-10-04 08:04:07', '2019-10-04 08:04:07'),
	(417, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'overtime', 12, '2019-10-10', 10, 1, NULL, '2019-10-04 08:04:07', '2019-10-04 08:04:07'),
	(418, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'othertime', 13, '2019-10-10', 10, 1, NULL, '2019-10-04 08:04:07', '2019-10-04 08:04:07'),
	(419, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'othertime', 14, '2019-10-10', 10, 1, NULL, '2019-10-04 08:04:07', '2019-10-04 08:04:07'),
	(420, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'othertime', 15, '2019-10-10', 10, 1, NULL, '2019-10-04 08:04:07', '2019-10-04 08:04:07'),
	(421, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'othertime', 16, '2019-10-10', 10, 1, NULL, '2019-10-04 08:04:07', '2019-10-04 08:04:07'),
	(422, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'othertime', 17, '2019-10-10', 10, 1, NULL, '2019-10-04 08:04:07', '2019-10-04 08:04:07'),
	(423, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'othertime', 18, '2019-10-10', 10, 1, NULL, '2019-10-04 08:04:07', '2019-10-04 08:04:07'),
	(424, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'othertime', 19, '2019-10-10', 10, 1, NULL, '2019-10-04 08:04:07', '2019-10-04 08:04:07');
/*!40000 ALTER TABLE `timesheets` ENABLE KEYS */;

-- Dumping structure for table timetrack_new.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `departmentid` int(10) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `education` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `citizenship` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supervisor` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_timesheets` int(11) NOT NULL DEFAULT 0,
  `is_summary` int(11) NOT NULL DEFAULT 0,
  `is_accounting` int(11) NOT NULL DEFAULT 0,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rates` int(50) DEFAULT NULL,
  `mime` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `original_filename` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `filename` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `socket_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `online` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table timetrack_new.users: ~4 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
REPLACE INTO `users` (`id`, `fullname`, `firstname`, `lastname`, `departmentid`, `email`, `education`, `citizenship`, `supervisor`, `is_timesheets`, `is_summary`, `is_accounting`, `email_verified_at`, `password`, `rates`, `mime`, `original_filename`, `filename`, `socket_id`, `online`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Apple C', 'C', 'Apple', 5, NULL, 'grw', 'sd', 'gd', 1, 0, 1, NULL, '1', 23, 'image/jpeg', '06.jpg', 'php246E.tmp.jpg', '', 'N', NULL, NULL, '2019-10-04 17:04:59'),
	(2, 'ppp aaa', 'aaa', 'ppp', 2, NULL, NULL, NULL, NULL, 1, 0, 0, NULL, '2', 234, NULL, NULL, NULL, '', 'N', NULL, '2019-09-08 12:39:29', '2019-09-19 06:22:05'),
	(3, 'Kons T', 'T', 'Kons', 4, NULL, 'sg', 'da', 'gde', 0, 1, 1, NULL, '3', 45, NULL, NULL, NULL, '', 'N', NULL, '2019-09-19 06:21:44', '2019-09-19 06:21:44'),
	(4, 'ddd aaa', 'aaa', 'ddd', 2, NULL, 'adf', 'dfg', 'sdfg', 1, 0, 0, NULL, '4', 132, NULL, NULL, NULL, NULL, 'N', NULL, '2019-09-24 09:20:02', '2019-09-24 09:20:02');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
