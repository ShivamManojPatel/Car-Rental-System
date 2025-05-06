-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2025 at 06:08 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `carrentalsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `CAR_ID` int(11) NOT NULL,
  `CAR_BRAND` varchar(50) NOT NULL,
  `CAR_MODEL` varchar(50) NOT NULL,
  `CAR_YEAR` int(11) NOT NULL,
  `LICENSE_PLATE` varchar(15) NOT NULL,
  `CAR_AMOUNT` decimal(10,2) NOT NULL,
  `CAR_TYPE` varchar(20) NOT NULL,
  `CAR_MILEAGE` bigint(20) NOT NULL,
  `CAR_TRANSMISSION` varchar(20) NOT NULL,
  `CAR_SEAT` int(10) NOT NULL,
  `CAR_LUGGAGE` int(10) NOT NULL,
  `CAR_PHOTO` varchar(200) NOT NULL,
  `CAR_STATUS` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`CAR_ID`, `CAR_BRAND`, `CAR_MODEL`, `CAR_YEAR`, `LICENSE_PLATE`, `CAR_AMOUNT`, `CAR_TYPE`, `CAR_MILEAGE`, `CAR_TRANSMISSION`, `CAR_SEAT`, `CAR_LUGGAGE`, `CAR_PHOTO`, `CAR_STATUS`) VALUES
(1, 'Honda', 'Civic', 2010, 'XYZ-123', 35.00, 'Petrol', 40000, 'Manual', 5, 4, 'Uploads/Honda-Civic-2010-1.png', 'Available'),
(2, 'Mercedez', 'G-Wagon', 2022, 'XYZ-256', 450.00, 'Hybrid', 5000, 'Automatic', 5, 4, 'Uploads/Mercedez-G-wagon-2022-1.png', 'Available'),
(3, 'Rolls Royce', 'Ghost', 2022, 'XYZ-888', 1500.00, 'Petrol', 2000, 'Automatic', 4, 2, 'Uploads/Rolls-Royce-Ghost-2022-1.png', 'Available'),
(5, 'Audi', 'r8', 2020, 'ABC-123', 750.00, 'Diesel', 7000, 'Automatic', 2, 1, 'Uploads/Audi-r8-2020-1.png', 'Available'),
(10, 'Koenigsegg', 'Jesko', 2023, 'Z1B-X90', 4000.00, 'Petrol', 5200, 'Automatic', 2, 1, 'Uploads/Koenigsegg-Jesko-2023-1.png', 'Available'),
(11, 'Koenigsegg', 'Gemera', 2022, 'J4M-E63', 3500.00, 'Diesel', 3000, 'Automatic', 4, 1, 'Uploads/Koenigsegg-Gemera-2022-1.png', 'Available'),
(12, 'Koenigsegg', 'Regera', 2020, 'K8F-S78', 3600.00, 'Petrol', 8000, 'Automatic', 2, 1, 'Uploads/Koenigsegg-Regera-2020-1.png', 'Available'),
(13, 'Koenigsegg', 'Agera RS', 2019, 'V3Z-N52', 3700.00, 'Electric', 9500, 'Manual', 2, 1, 'Uploads/Koenigsegg-Agera-RS-2019-1.png', 'Available'),
(14, 'Koenigsegg', 'One:1', 2018, 'B6C-H74', 3900.00, 'Diesel', 10000, 'Manual', 2, 1, 'Uploads/Koenigsegg-One-1-2018-1.png', 'Available'),
(15, 'Rolls Royce', 'Phantom', 2022, 'R9T-A62', 2200.00, 'Petrol', 24000, 'Automatic', 5, 2, 'Uploads/Rolls-Royce-Phantom-2022-1.png', 'Available'),
(16, 'Rolls Royce', 'Cullinan', 2021, 'ZIF-D89', 2000.00, 'Petrol', 27080, 'Automatic', 5, 4, 'Uploads/Rolls-Royce-Cullinan-2021-1.png', 'Available'),
(17, 'Rolls Royce', 'Droptail', 2024, '09H-K4F', 9000.00, 'Petrol', 1062, 'Automatic', 2, 1, 'Uploads/Rolls-Royce-Droptail-2024-1.png', 'Available'),
(18, 'Rolls Royce', 'Spectre', 2025, '1TU-XI8', 4000.00, 'Electric', 2427, 'Automatic', 5, 2, 'Uploads/Rolls-Royce-Spectre-2025-1.png', 'Available'),
(19, 'Rolls Royce', 'Wraith', 2022, '3HJ-OX7', 2500.00, 'Diesel', 2652, 'Automatic', 5, 2, 'Uploads/Rolls-Royce-Wraith-2022-1.png', 'Available'),
(20, 'Land Rover', 'Defender', 2024, 'B1N-P4J', 935.00, 'Diesel', 18061, 'Automatic', 5, 2, 'Uploads/Land-Rover-Defender-2024-1.png', 'Available'),
(21, 'Land Rover', 'Discovery', 2021, 'GGA-UXN', 1000.00, 'Diesel', 23927, 'Automatic', 5, 2, 'Uploads/Land-Rover-Discovery-2021-1.png', 'Available'),
(22, 'Land Rover', 'Evoque', 2023, 'HBF-F0Q', 580.00, 'Diesel', 11712, 'Automatic', 5, 2, 'Uploads/Land-Rover-Evoque-2023-1.png', 'Available'),
(23, 'Land Rover', 'Range Rover', 2024, 'SJI-JIY', 890.00, 'Diesel', 33019, 'Automatic', 5, 2, 'Uploads/Land-Rover-Range-Rover-2024-1.png', 'Available'),
(24, 'Land Rover', 'Velar', 2021, 'MCY-5Z0', 750.00, 'Petrol', 12354, 'Automatic', 5, 2, 'Uploads/Land-Rover-Velar-2021-1.png', 'Available'),
(25, 'Toyota', 'Camry', 2021, 'BM6-GXQ', 120.00, 'Petrol', 98245, 'Automatic', 5, 4, 'Uploads/Toyato-Camry-2021-1.png', 'Available'),
(26, 'Toyota', 'Corolla', 2021, 'Z76-FNR', 125.00, 'Diesel', 54268, 'Manual', 5, 4, 'Uploads/Toyato-Corolla-2021-1.png', 'Available'),
(27, 'Toyota', 'Fortuner', 2023, '1PC-EX6', 130.00, 'Diesel', 45287, 'Automatic', 8, 4, 'Uploads/Toyato-Fortuner-2023-1.png', 'Available'),
(28, 'Toyota', 'GR Supra', 2024, 'OTG-AIM', 190.00, 'Diesel', 12563, 'Manual', 2, 2, 'Uploads/Toyota-GR-Supra-2024-1.png', 'Available'),
(29, 'Toyota', 'Prius', 2020, 'RRF-9HI', 65.00, 'Electric', 52564, 'Automatic', 5, 4, 'Uploads/Toyota-Prius-2020-1.png', 'Available'),
(30, 'Honda', 'Accord', 2022, 'XTY-389', 65.00, 'Petrol', 32750, 'Automatic', 5, 4, 'Uploads/Honda-Accord-2022-1.png', 'Available'),
(31, 'Honda', 'CR-V', 2023, 'QWE-591', 75.00, 'Hybrid', 19840, 'Automatic', 5, 4, 'Uploads/Honda-CR-V-2023-1.png', 'Available'),
(32, 'Honda', 'Pilot', 2021, 'M7P-ZXK', 85.00, 'Petrol', 48200, 'Manual', 8, 4, 'Uploads/Honda-Pilot-2021-1.png', 'Available'),
(33, 'Honda', 'HR-V', 2020, 'ZTR-203', 60.00, 'Petrol', 56000, 'Automatic', 5, 4, 'Uploads/Honda-HR-V-2020-1.png', 'Available'),
(34, 'Hyundia', 'Sonata', 2022, 'B7F-LQ2', 60.00, 'Petrol', 34000, 'Automatic', 5, 4, 'Uploads/Hyundia-Sonata-2022-1.png', 'Available'),
(35, 'Hyundia', 'Elantra N', 2021, 'XPL-918', 55.00, 'Petrol', 51000, 'Manual', 5, 4, 'Uploads/Hyundia-Elantra-N-2021-1.png', 'Available'),
(36, 'Hyundia', 'Tucson', 2023, 'M2R-HND', 75.00, 'Hybrid', 22800, 'Automatic', 5, 4, 'Uploads/Hyundia-Tucson-2023-1.png', 'Available'),
(37, 'Hyundia', 'Santa Fe', 2022, 'GJK-301', 80.00, 'Hybrid', 41500, 'Automatic', 5, 4, 'Uploads/Hyundia-Santa-Fe-2022-1.png', 'Available'),
(38, 'Hyundia', 'Palisade', 2023, 'N5Y-ZXC', 90.00, 'Diesel', 19700, 'Automatic', 8, 4, 'Uploads/Hyundia-Palisade-2023-1.png', 'Available'),
(39, 'Kia', 'K4', 2023, 'V8M-XQ2	', 58.00, 'Petrol', 27800, 'Manual', 5, 4, 'Uploads/Kia-K4-2023-1.png', 'Available'),
(40, 'Kia', 'K5', 2022, 'JLK-379', 62.00, 'Petrol', 39000, 'Automatic', 5, 4, 'Uploads/Kia-K5-2022-1.png', 'Available'),
(41, 'Kia', 'Sorento', 2021, 'R2N-WHD', 78.00, 'Diesel', 56400, 'Automatic', 5, 4, 'Uploads/Kia-Sorento-2021-1.png', 'Available'),
(42, 'Kia', 'EV6', 2024, 'XPE-1A9', 95.00, 'Electric', 10500, 'Automatic', 5, 4, 'Uploads/Kia-EV6-2024-1.png', 'Available'),
(43, 'Kia', 'EV9 GT', 2024, 'MZ7-QLK', 110.00, 'Electric', 8900, 'Automatic', 5, 4, 'Uploads/Kia-EV9-GT-2024-1.png', 'Available'),
(44, 'Nissan', 'Altima', 2022, 'XNZ-735', 60.00, 'Petrol', 32800, 'Automatic', 5, 4, 'Uploads/Nissan-Altima-2022-1.png', 'Available'),
(45, 'Nissan', 'Rogue', 2023, 'M5V-WTR', 68.00, 'Diesel', 19400, 'Automatic', 5, 4, 'Uploads/Nissan-Rogue-2023-1.png', 'Available'),
(46, 'Nissan', 'Pathfinder', 2021, 'JKR-820', 80.00, 'Petrol', 48300, 'Manual', 8, 4, 'Uploads/Nissan-Pathfinder-2021-1.png', 'Available'),
(47, 'Nissan', 'Frontier', 2022, 'D7L-QMP', 75.00, 'Diesel', 40200, 'Manual', 5, 4, 'Uploads/Nissan-Frontier-2022-1.png', 'Available'),
(48, 'Nissan', 'Ariya', 2024, 'ZKY-149', 100.00, 'Electric', 7400, 'Automatic', 5, 4, 'Uploads/Nissan-Ariya-2024-1.png', 'Available'),
(49, 'Mazda', 'CX-5', 2022, 'T9V-LMR', 65.00, 'Petrol', 31000, 'Automatic', 5, 4, 'Uploads/Mazda-CX-5-2022-1.png', 'Available'),
(50, 'Mazda', 'CX-90', 2023, 'B4K-XWN', 85.00, 'Diesel', 18900, 'Automatic', 5, 4, 'Uploads/Mazda-CX-90-2023-1.png', 'Available'),
(51, 'Mazda', 'CX-50', 2021, 'MZN-480', 72.00, 'Hybrid', 43700, 'Manual', 5, 4, 'Uploads/Mazda-CX-50-2021-1.png', 'Available'),
(52, 'Mazda', 'MX-5 Miata', 2020, 'QWG-215', 70.00, 'Petrol', 50400, 'Manual', 2, 2, 'Uploads/Mazda-MX-5-Miata-2020-1.png', 'Available'),
(53, 'Mazda', '3 Sedan', 2022, 'L3D-PQV', 60.00, 'Petrol', 32900, 'Automatic', 5, 4, 'Uploads/Mazda-3-Sedan-2022-1.png', 'Available'),
(54, 'Volkswagen', 'Buzz', 2023, 'QLD-528', 105.00, 'Electric', 5200, 'Automatic', 8, 4, 'Uploads/Volkswagen-Buzz-2023-1.png', 'Available'),
(55, 'Volkswagen', 'Jetta', 2024, 'M7R-XCU', 60.00, 'Petrol', 34700, 'Manual', 5, 2, 'Uploads/Volkswagen-Jetta-2024-1.png', 'Available'),
(56, 'Volkswagen', 'Tiguan', 2023, 'ZVN-184', 75.00, 'Diesel', 21900, 'Automatic', 5, 4, 'Uploads/Volkswagen-Tiguan-2023-1.png', 'Available'),
(57, 'Volkswagen', 'Taos', 2021, 'B2Y-WLM', 75.00, 'Petrol', 46300, 'Manual', 5, 4, 'Uploads/Volkswagen-Taos-2021-1.png', 'Available'),
(58, 'Volkswagen', 'ID7', 2024, 'JKC-970', 110.00, 'Electric', 8800, 'Automatic', 5, 4, 'Uploads/Volkswagen-ID7-2024-1.png', 'Available'),
(59, 'Ford', 'Mustang', 2024, 'GJK-742', 250.00, 'Petrol', 47600, 'Manual', 2, 2, 'Uploads/Ford-Mustang-2024-1.png', 'Available'),
(60, 'Ford', 'Mustang Mach-E', 2023, 'LZP-WX9', 200.00, 'Electric', 9800, 'Automatic', 5, 4, 'Uploads/Ford-Mustang-Mach-E-2023-1.png', 'Available'),
(61, 'Ford', 'Raptor', 2023, 'XQM-319	', 215.00, 'Petrol', 34500, 'Automatic', 4, 6, 'Uploads/Ford-Raptor-2023-1.png', 'Available'),
(62, 'Ford', 'Explorer', 2022, 'B2K-HFD', 150.00, 'Petrol', 63900, 'Automatic', 5, 4, 'Uploads/Ford-Explorer-2022-1.png', 'Available'),
(63, 'Ford', 'Escape', 2021, 'V8L-MRJ', 115.00, 'Petrol', 23500, 'Automatic', 5, 4, 'Uploads/Ford-Escape-2021-1.png', 'Available'),
(64, 'Chevrolet', 'Camaro', 2022, 'FSA-492', 160.00, 'Petrol', 43000, 'Manual', 2, 2, 'Uploads/Chevrolet-Camaro-2022-1.png', 'Available'),
(65, 'Chevrolet', 'Corvette ZR1', 2023, 'RND-376', 110.00, 'Petrol', 15000, 'Automatic', 2, 2, 'Uploads/Chevrolet-Corvette-ZR1-2023-1.png', 'Available'),
(66, 'Chevrolet', 'Malibu', 2021, 'KLM-258', 65.00, 'Petrol', 52000, 'Automatic', 5, 4, 'Uploads/Chevrolet-Malibu-2021-1.png', 'Available'),
(67, 'Chevrolet', 'Equinox EV', 2022, 'WDQ-104', 90.00, 'Electric', 12000, 'Automatic', 5, 4, 'Uploads/Chevrolet-Equinox-EV-2022-1.png', 'Available'),
(68, 'Chevrolet', 'Silverado', 2020, 'ZCX-839', 150.00, 'Diesel', 60000, 'Automatic', 5, 4, 'Uploads/Chevrolet-Silverado-1500-2020-1.png', 'Available'),
(69, 'Skoda', 'Elroq', 2024, 'HZN-358', 100.00, 'Electric', 6100, 'Automatic', 5, 4, 'Uploads/Skoda-Elroq-2024-1.png', 'Available'),
(70, 'Skoda', 'Enyaq iV', 2023, 'QTB-497	', 100.00, 'Electric', 9200, 'Automatic', 5, 4, 'Uploads/Skoda-Enyaq-iV-2023-1.png', 'Available'),
(71, 'Skoda', 'Epiq', 2024, 'JKP-742', 90.00, 'Electric', 4800, 'Automatic', 5, 4, 'Uploads/Skoda-Epiq-2024-1.png', 'Available'),
(72, 'Skoda', 'Superb', 2022, 'MLC-613', 90.00, 'Petrol', 38900, 'Manual', 5, 4, 'Uploads/Skoda-Superb-2022-1.png', 'Available'),
(73, 'Skoda', 'Kodiaq', 2023, 'WDF-802', 80.00, 'Diesel', 24000, 'Automatic', 8, 6, 'Uploads/Skoda-Kodiaq-2023-1.png', 'Available'),
(74, 'Mitsubishi', 'Lancer', 2004, 'XPT-904', 60.00, 'Petrol', 98000, 'Manual', 5, 4, 'Uploads/Mitsubishi-Lancer-2004-1.png', 'Available'),
(75, 'Mitsubishi', 'Outlander', 2022, 'MVQ-437', 78.00, 'Petrol', 28800, 'Automatic', 5, 4, 'Uploads/Mitsubishi-Outlander-2022-1.png', 'Available'),
(76, 'Mitsubishi', 'Montero', 2021, 'JHZ-153', 85.00, 'Diesel', 36100, 'Automatic', 8, 6, 'Uploads/Mitsubishi-Montero-2021-1.png', 'Available'),
(77, 'Mitsubishi', 'ASX', 2020, 'KWT-806', 65.00, 'Petrol', 47500, 'Manual', 5, 4, 'Uploads/Mitsubishi-ASX-2020-1.png', 'Available'),
(78, 'Mitsubishi', 'Eclipse', 1996, 'PQL-372', 45.00, 'Petrol', 95000, 'Manual', 2, 2, 'Uploads/Mitsubishi-Eclipse-1996-1.png', 'Available'),
(79, 'Lexus', 'RX', 2023, 'VPM-812', 250.00, 'Hybrid', 12400, 'Automatic', 5, 4, 'Uploads/Lexus-RX-2023-1.png', 'Available'),
(80, 'Lexus', 'ES', 2022, 'TKW-341', 190.00, 'Petrol', 27600, 'Automatic', 5, 4, 'Uploads/Lexus-ES-2022-1.png', 'Available'),
(81, 'Lexus', 'LS', 2023, 'QZN-695', 120.00, 'Hybrid', 9800, 'Automatic', 5, 4, 'Uploads/Lexus-LS-2023-1.png', 'Available'),
(82, 'Lexus', 'NX', 2021, 'HFT-590', 200.00, 'Petrol', 38700, 'Manual', 5, 4, 'Uploads/Lexus-NX-2021-1.png', 'Available'),
(83, 'Lexus', 'IS', 2022, 'MLC-837', 160.00, 'Petrol', 31400, 'Automatic', 5, 4, 'Uploads/Lexus-IS-2022-1.png', 'Available'),
(84, 'Jaguar', 'F-type', 2022, 'JWL-193', 150.00, 'Petrol', 18500, 'Automatic', 2, 2, 'Uploads/Jaguar-F-type-2022-1.png', 'Available'),
(85, 'Jaguar', 'XE', 2021, 'BHD-624', 120.00, 'Petrol', 43300, 'Automatic', 5, 4, 'Uploads/Jaguar-XE-2021-1.png', 'Available'),
(86, 'Jaguar', 'XF', 2021, 'VQR-789', 110.00, 'Diesel', 27600, 'Automatic', 5, 4, 'Uploads/Jaguar-XF-2021-1.png', 'Available'),
(87, 'Jaguar', 'F-Pace', 2022, 'MTP-317', 105.00, 'Petrol', 20400, 'Automatic', 5, 4, 'Uploads/Jaguar-F-Pace-2022-1.png', 'Available'),
(88, 'Jaguar', 'E-Pace', 2021, 'KLS-580', 125.00, 'Diesel', 39000, 'Manual', 5, 4, 'Uploads/Jaguar-E-Pace-2021-1.png', 'Available'),
(89, 'Volvo', 'XC90', 2023, 'PLX-483', 160.00, 'Hybrid', 14500, 'Automatic', 8, 4, 'Uploads/Volvo-XC90-2023-1.png', 'Available'),
(90, 'Volvo', 'XC60', 2022, 'WKR-197', 150.00, 'Petrol', 26400, 'Automatic', 5, 4, 'Uploads/Volvo-XC60-2022-1.png', 'Available'),
(91, 'Volvo', 'XC40', 2023, 'JDN-528', 150.00, 'Electric', 10200, 'Automatic', 5, 4, 'Uploads/Volvo-XC40-2023-1.png', 'Available'),
(92, 'Volvo', 'S60', 2021, 'MTF-864', 180.00, 'Petrol', 37400, 'Manual', 5, 4, 'Uploads/Volvo-S60-2021-1.png', 'Available'),
(93, 'Volvo', 'V60', 2020, 'RCH-690', 140.00, 'Hybrid', 49800, 'Manual', 8, 4, 'Uploads/Volvo-V60-2020-1.png', 'Available'),
(94, 'Cadallic', 'Escalade', 2024, 'ZTX-481', 200.00, 'Petrol', 16800, 'Automatic', 8, 4, 'Uploads/Cadallic-Escalade-2024-1.png', 'Available'),
(95, 'Cadallic', 'CT5', 2022, 'BRK-732', 160.00, 'Petrol', 24100, 'Automatic', 5, 4, 'Uploads/Cadallic-CT5-2022-1.png', 'Available'),
(96, 'Cadallic', 'CT4', 2021, 'MQS-159', 140.00, 'Hybrid', 38700, 'Manual', 5, 4, 'Uploads/Cadallic-CT4-2021-1.png', 'Available'),
(97, 'Cadallic', 'XT5', 2022, 'LHF-624', 130.00, 'Diesel', 22300, 'Automatic', 5, 4, 'Uploads/Cadallic-XT5-2022-1.png', 'Available'),
(98, 'Cadallic', 'Lyriq', 2023, 'PVD-376', 160.00, 'Electric', 9700, 'Automatic', 5, 4, 'Uploads/Cadallic-Lyriq-2023-1.png', 'Available'),
(99, 'Lincoln', 'Navigator', 2023, 'XLP-714', 160.00, 'Hybrid', 14200, 'Automatic', 8, 4, 'Uploads/Lincoln-Navigator-2023-1.png', 'Available'),
(100, 'Lincoln', 'Aviator', 2022, 'BRM-620', 150.00, 'Petrol', 21800, 'Automatic', 8, 4, 'Uploads/Lincoln-Aviator-2022-1.png', 'Available'),
(101, 'Lincoln', 'Nautilius', 2021, 'JFH-852', 140.00, 'Hybrid', 28400, 'Automatic', 5, 4, 'Uploads/Lincoln-Nautilius-2021-1.png', 'Available'),
(102, 'Lincoln', 'Corsair', 2023, 'QNL-308', 150.00, 'Petrol', 17400, 'Automatic', 5, 4, 'Uploads/Lincoln-Corsair-2023-1.png', 'Available'),
(103, 'Lincoln', 'Continental', 2020, 'TWD-439', 130.00, 'Petrol', 44300, 'Manual', 5, 4, 'Uploads/Lincoln-Continental-2020-1.png', 'Available'),
(104, 'Ferrari', '812', 2022, 'FLY-918', 480.00, 'Petrol', 9700, 'Automatic', 2, 1, 'Uploads/Ferrari-812-2022-1.png', 'Available'),
(105, 'Ferrari', 'SF90', 2023, 'ZMR-267', 520.00, 'Hybrid', 6800, 'Automatic', 2, 1, 'Uploads/Ferrari-SF90-2023-1.png', 'Available'),
(106, 'Ferrari', 'Roma', 2021, 'JVP-834', 450.00, 'Petrol', 12800, 'Automatic', 2, 1, 'Uploads/Ferrari-Roma-2021-1.png', 'Available'),
(107, 'Ferrari', 'F8', 2022, 'KDS-309', 470.00, 'Petrol', 7400, 'Automatic', 2, 1, 'Uploads/Ferrari-F8-2022-1.png', 'Available'),
(108, 'Ferrari', 'LaFerrari', 2020, 'QNX-712', 600.00, 'Hybrid', 5600, 'Automatic', 2, 1, 'Uploads/Ferrari-LaFerrari-2020-1.png', 'Available'),
(109, 'Porsche', '911 GT3', 2023, 'PLD-294', 520.00, 'Petrol', 8600, 'Automatic', 2, 1, 'Uploads/Porsche-911-GT3-2023-1.png', 'Available'),
(110, 'Porsche', 'Cayenne', 2022, 'KTR-861', 450.00, 'Hybrid', 19800, 'Automatic', 5, 2, 'Uploads/Porsche-Cayenne-2022-1.png', 'Available'),
(111, 'Porsche', 'Macan', 2021, 'JSM-437', 350.00, 'Petrol', 34500, 'Automatic', 5, 2, 'Uploads/Porsche-Macan-2021-1.png', 'Available'),
(112, 'Porsche', 'Panamera', 2023, 'ZXY-182', 400.00, 'Hybrid', 12100, 'Automatic', 5, 4, 'Uploads/Porsche-Panamera-2023-1.png', 'Available'),
(113, 'Porsche', 'Taycan', 2024, 'VFN-503', 420.00, 'Electric', 5200, 'Automatic', 5, 4, 'Uploads/Porsche-Taycan-2024-1.png', 'Available'),
(114, 'Mclaren', '720s', 2022, 'ZFK-812', 1250.00, 'Petrol', 9200, 'Automatic', 2, 1, 'Uploads/Mclaren-720s-2022-1.png', 'Available'),
(115, 'Mclaren', '750s', 2023, 'MTJ-439', 1430.00, 'Petrol', 6700, 'Automatic', 2, 1, 'Uploads/Mclaren-750s-2023-1.png', 'Available'),
(116, 'Mclaren', 'Artura', 2023, 'QLS-197', 1330.00, 'Hybrid', 5100, 'Automatic', 2, 1, 'Uploads/Mclaren-Artura-2023-1.png', 'Available'),
(117, 'Mclaren', 'GT', 2021, 'DWB-658', 1600.00, 'Petrol', 13300, 'Automatic', 2, 1, 'Uploads/Mclaren-GT-2021-1.png', 'Available'),
(118, 'Mclaren', 'P1', 2020, 'KZN-384', 1760.00, 'Hybrid', 7100, 'Automatic', 2, 1, 'Uploads/Mclaren-P1-2020-1.png', 'Available'),
(119, 'Bugatti', 'Veyron', 2020, 'DXP-713', 3600.00, 'Petrol', 7300, 'Automatic', 2, 1, 'Uploads/Bugatti-Veyron-2020-1.png', 'Available'),
(120, 'Bugatti', 'Chiron', 2022, 'KZR-481', 4000.00, 'Petrol', 6100, 'Automatic', 2, 1, 'Uploads/Bugatti-Chiron-2022-1.png', 'Available'),
(121, 'Bugatti', 'Divo', 2023, 'VML-268', 4250.00, 'Petrol', 4800, 'Automatic', 2, 1, 'Uploads/Bugatti-Divo-2023-1.png', 'Available'),
(122, 'Bugatti', 'Bolide', 2024, 'HQU-359', 4500.00, 'Petrol', 1100, 'Automatic', 2, 1, 'Uploads/Bugatti-Bolide-2024-1.png', 'Available'),
(123, 'Bugatti', 'Mistral', 2025, 'BTE-907', 4490.00, 'Hybrid', 3700, 'Automatic', 2, 1, 'Uploads/Bugatti-Mistral-2025-1.png', 'Available'),
(124, 'Pagani', 'Zonda', 2020, 'JZX-381', 3200.00, 'Hybrid', 6200, 'Automatic', 2, 1, 'Uploads/Pagani-Zonda-2020-1.png', 'Available'),
(125, 'Pagani', 'Huayra', 2022, 'KLM-754', 3800.00, 'Hybrid', 6200, 'Automatic', 2, 1, 'Uploads/Pagani-Huayra-2022-1.png', 'Available'),
(126, 'Pagani', 'Huayra r', 2023, 'BRN-406', 4200.00, 'Hybrid', 4700, 'Automatic', 2, 1, 'Uploads/Pagani-Huayra-r-2023-1.png', 'Available'),
(127, 'Pagani', 'Utopia', 2024, 'VDS-187', 4220.00, 'Hybrid', 1050, 'Automatic', 2, 1, 'Uploads/Pagani-Utopia-2024-1.png', 'Available'),
(128, 'Pagani', 'Unico', 2023, 'QHF-298	', 4500.00, 'Hybrid', 980, 'Automatic', 2, 1, 'Uploads/Pagani-Unico-2023-1.png', 'Available'),
(129, 'Tesla', 'Model S', 2022, 'KZD-384', 230.00, 'Electric', 18200, 'Automatic', 5, 2, 'Uploads/Tesla-Model-S-2022-1.png', 'Available'),
(130, 'Tesla', 'Model X', 2023, 'BTL-970', 250.00, 'Electric', 14300, 'Automatic', 5, 4, 'Uploads/Tesla-Model-X-2023-1.png', 'Available'),
(131, 'Tesla', 'Model Y', 2021, 'MVJ-516', 210.00, 'Electric', 27400, 'Automatic', 5, 2, 'Uploads/Tesla-Model-Y-2021-1.png', 'Available'),
(132, 'Tesla', 'Cybertruck', 2024, 'PRX-208', 270.00, 'Electric', 7600, 'Automatic', 5, 4, 'Uploads/Tesla-Cybertruck-2024-1.png', 'Available'),
(133, 'Tesla', 'Roadster', 2022, 'JVL-684', 300.00, 'Electric', 5200, 'Automatic', 2, 2, 'Uploads/Tesla-Roadster-2022-1.png', 'Available'),
(134, 'BMW', '740i', 2023, 'BNY-328', 110.00, 'Petrol', 12500, 'Automatic', 5, 4, 'Uploads/BMW-740i-2023-1.png', 'Available'),
(135, 'BMW', 'i8 Roadster', 2021, 'EV8-001', 210.00, 'Hybrid', 10667, 'Automatic', 2, 2, 'Uploads/BMW-i8-Roadster-2021-1.png', 'Available'),
(136, 'BMW', 'M4', 2024, 'M4C-999', 195.00, 'Petrol', 5200, 'Automatic', 4, 2, 'Uploads/BMW-M4-2024-1.png', 'Available'),
(137, 'BMW', 'X7', 2022, 'X7L-456', 180.00, 'Petrol', 20000, 'Automatic', 8, 4, 'Uploads/BMW-X7-2022-1.png', 'Available'),
(138, 'BMW', '8 Series', 2023, 'GC8-789', 200.00, 'Petrol', 15000, 'Automatic', 5, 4, 'Uploads/BMW-8-Series-2023-1.png', 'Available'),
(139, 'Mercedes', 'S500', 2023, 'SCL-789', 180.00, 'Petrol', 30000, 'Automatic', 5, 4, 'Uploads/Mercedes-S500-2023-1.png', 'Available'),
(140, 'Mercedes', 'GLE 450', 2020, 'GLE-123', 160.00, 'Diesel', 40000, 'Automatic', 5, 4, 'Uploads/Mercedes-GLE-450-2020-1.png', 'Available'),
(141, 'Mercedes', 'E-Class', 2022, 'ECL-456', 160.00, 'Petrol', 25000, 'Automatic', 4, 2, 'Uploads/Mercedes-E-Class-2022-1.png', 'Available'),
(142, 'Mercedes', 'CLS 450', 2023, 'CLS-321', 160.00, 'Petrol', 18000, 'Automatic', 5, 4, 'Uploads/Mercedes-CLS-450-2023-1.png', 'Available'),
(143, 'Mercedes', 'A-Class', 2024, 'ACL-456', 105.00, 'Petrol', 3500, 'Automatic', 5, 2, 'Uploads/Mercedes-A-Class-2024-1.png', 'Available'),
(144, 'Lamborghini', 'Huracan EVO', 2022, 'LMB-789', 1200.00, 'Petrol', 6513, 'Automatic', 2, 2, 'Uploads/Lamborghini-Huracan-EVO-2022-1.png', 'Available'),
(145, 'Lamborghini', 'Aventador S', 2021, 'AVT-456', 1600.00, 'Petrol', 4823, 'Automatic', 2, 1, 'Uploads/Lamborghini-Aventador-S-2021-1.png', 'Available'),
(146, 'Lamborghini', 'Urus', 2023, 'URS-741', 1300.00, 'Petrol', 4586, 'Automatic', 5, 4, 'Uploads/Lamborghini-Urus-2023-1.png', 'Available'),
(147, 'Lamborghini', 'Gallardo Spyder', 2014, 'GLR-007', 750.00, 'Petrol', 5846, 'Automatic', 2, 1, 'Uploads/Lamborghini-Gallardo-Spyder-2014-1.png', 'Available'),
(148, 'Lamborghini', 'Sian', 2022, 'SIN-784', 2000.00, 'Petrol', 4562, 'Automatic', 2, 1, 'Uploads/Lamborghini-Sian-2022-1.png', 'Available'),
(149, 'Acura', 'EDX', 2021, 'ACR-452', 140.00, 'Petrol', 22080, 'Automatic', 5, 4, 'Uploads/Acura-EDX-2021-1.png', 'Available'),
(150, 'Acura', 'NSX', 2022, 'NSX-001', 850.00, 'Hybrid', 2154, 'Automatic', 2, 1, 'Uploads/Acura-NSX-2022-1.png', 'Available'),
(151, 'Acura', 'MDX', 2023, 'AMD-X24', 180.00, 'Petrol', 2245, 'Automatic', 8, 4, 'Uploads/Acura-MDX-2023-1.png', 'Available'),
(152, 'Acura', 'TLX', 2022, 'ATl-X22', 140.00, 'Petrol', 2514, 'Automatic', 5, 2, 'Uploads/Acura-TLX-2022-1.png', 'Available'),
(153, 'Acura', 'ADX', 2021, 'AAD-X45', 160.00, 'Petrol', 2458, 'Automatic', 5, 2, 'Uploads/Acura-ADX-2021-1.png', 'Available'),
(154, 'Ford', 'Mustang gt', 1969, 'DFR-874', 510.00, 'Petrol', 5500, 'Automatic', 2, 2, 'Uploads/Ford-Mustang-gt-1969-1.png', 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `CUS_ID` int(11) NOT NULL,
  `CUS_FNAME` varchar(20) NOT NULL,
  `CUS_LNAME` varchar(20) NOT NULL,
  `CUS_EMAIL` varchar(40) NOT NULL,
  `CUS_PASSWORD` varchar(100) NOT NULL,
  `CUS_PHONE` bigint(10) NOT NULL,
  `CUS_LICENSE_NUM` int(15) NOT NULL,
  `USER_TYPE` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`CUS_ID`, `CUS_FNAME`, `CUS_LNAME`, `CUS_EMAIL`, `CUS_PASSWORD`, `CUS_PHONE`, `CUS_LICENSE_NUM`, `USER_TYPE`) VALUES
(3, 'Shivam', 'Patel', 'shivamp2819@gmail.com', '$2y$10$yIaN.e4CtKjTmgrIOyLWyOOsE8r7CIj82oGgBowYIykp8GJm/.WZK', 5597806361, 123456789, 'Admin'),
(6, 'smit', 'maghapara', 'meghaparasmit@gmail.com', '$2y$10$ulWw.yIb/Flo.mhkSnVBGuRVBo5ZHtRmS5D0eqfiNONBFauwCghNG', 2018776735, 123456789, 'Customer'),
(7, 'Shivam', 'Patel', 'shivamp1119@gmail.com', '$2y$10$Ub96ptRZjtriGduGNaHHWuxcn2hDU34IwcDewLDtfxm5XrNy5AFuK', 5597806361, 123456789, 'Customer'),
(8, 'Krushi', 'Patel', 'krushipatel314@gmail.com', '$2y$10$CdidbTTiCJ7KWJfr5wPke.91AY7uQ7yfJBDylslaa5TlKBi2cVzuC', 5597806361, 123456789, 'Customer'),
(9, 'Shivam', 'Patel', 'primary.shivampatel@gmail.com', '$2y$10$bT6Uqh5PsnuFee9DtjtPletO0SxTzY6VJnVtyFVNnajrEpvp6imte', 5597806361, 123456789, 'Customer');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `PAY_ID` int(11) NOT NULL,
  `RENT_ID` int(11) NOT NULL,
  `PAYMENT_DATE` date NOT NULL,
  `TOTAL_AMOUNT` decimal(10,2) NOT NULL,
  `PAYMENT_METHOD` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`PAY_ID`, `RENT_ID`, `PAYMENT_DATE`, `TOTAL_AMOUNT`, `PAYMENT_METHOD`) VALUES
(6, 6, '2025-04-24', 4500.00, 'Credit Card'),
(8, 8, '2025-04-25', 3000.00, 'Credit Card'),
(9, 9, '2025-04-27', 3000.00, 'Credit Card'),
(10, 10, '2025-05-06', 84.00, 'Credit Card'),
(11, 11, '2025-05-06', 1620.00, 'Credit Card');

-- --------------------------------------------------------

--
-- Table structure for table `rental`
--

CREATE TABLE `rental` (
  `Rent_ID` int(11) NOT NULL,
  `CUS_ID` int(11) NOT NULL,
  `CAR_ID` int(11) NOT NULL,
  `START_DATE` date NOT NULL,
  `END_DATE` date NOT NULL,
  `RENT_STATUS` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rental`
--

INSERT INTO `rental` (`Rent_ID`, `CUS_ID`, `CAR_ID`, `START_DATE`, `END_DATE`, `RENT_STATUS`) VALUES
(6, 7, 3, '2025-04-26', '2025-04-29', 'Complete'),
(8, 7, 3, '2025-04-25', '2025-04-27', 'Complete'),
(9, 7, 3, '2025-04-27', '2025-04-29', 'Complete'),
(10, 9, 1, '2025-05-09', '2025-05-11', 'Complete'),
(11, 7, 2, '2025-05-07', '2025-05-10', 'Complete');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `Res_ID` int(11) NOT NULL,
  `CUS_ID` int(11) NOT NULL,
  `CAR_ID` int(11) NOT NULL,
  `PICKUP_DATE` date NOT NULL,
  `RES_STATUS` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`Res_ID`, `CUS_ID`, `CAR_ID`, `PICKUP_DATE`, `RES_STATUS`) VALUES
(13, 7, 3, '2025-04-26', 'Complete'),
(14, 9, 1, '2025-05-08', 'Cancelled'),
(15, 7, 2, '2025-05-07', 'Complete');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`CAR_ID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`CUS_ID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`PAY_ID`),
  ADD KEY `Rent_ID` (`RENT_ID`);

--
-- Indexes for table `rental`
--
ALTER TABLE `rental`
  ADD PRIMARY KEY (`Rent_ID`),
  ADD KEY `User_ID` (`CUS_ID`),
  ADD KEY `Car_ID` (`CAR_ID`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`Res_ID`),
  ADD KEY `User_ID` (`CUS_ID`),
  ADD KEY `Car_ID` (`CAR_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `CAR_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=155;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `CUS_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `PAY_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `rental`
--
ALTER TABLE `rental`
  MODIFY `Rent_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `Res_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`Rent_ID`) REFERENCES `rental` (`Rent_ID`);

--
-- Constraints for table `rental`
--
ALTER TABLE `rental`
  ADD CONSTRAINT `rental_ibfk_1` FOREIGN KEY (`CUS_ID`) REFERENCES `customer` (`CUS_ID`),
  ADD CONSTRAINT `rental_ibfk_2` FOREIGN KEY (`Car_ID`) REFERENCES `cars` (`Car_ID`);

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`CUS_ID`) REFERENCES `customer` (`CUS_ID`),
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`Car_ID`) REFERENCES `cars` (`Car_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
