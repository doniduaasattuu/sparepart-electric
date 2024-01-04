-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2024 at 04:31 AM
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
-- Database: `sparepart_electric`
--

-- --------------------------------------------------------

--
-- Table structure for table `material_types`
--

CREATE TABLE `material_types` (
  `type` varchar(5) NOT NULL,
  `type_description` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `material_types`
--

INSERT INTO `material_types` (`type`, `type_description`) VALUES
('M0', 'MPS, fixing type -0-'),
('M1', 'MPS, fixing type -1-'),
('M2', 'MPS, fixing type -2-'),
('M3', 'MPS, fixing type -3-'),
('M4', 'MPS, fixing type -4-'),
('ND', 'No planning'),
('P1', 'MRP, fixing type -1-'),
('P2', 'MRP, fixing type -2-'),
('P3', 'MRP, fixing type -3-'),
('P4', 'MRP, fixing type -4-'),
('PD', 'MRP'),
('R1', 'Time-phased planning'),
('R2', 'Time-phased w.auto.reord.point'),
('RE', 'Replenishment plnd externally'),
('RF', 'Replenish with dyn. TargetStock'),
('RP', 'Replenishment'),
('RR', 'Tmphsd. repl. w. dyn.trgt.stck'),
('RS', 'Time-phased replenishment plng'),
('V1', 'Manual reord.point w. ext.reqs'),
('V2', 'Autom. reord.point w. ext.reqs'),
('VB', 'Manual reord point planning'),
('VI', 'Vendor Managed Inventory'),
('VM', 'Automatic reorder point plng'),
('VS', 'Seasonal MRP'),
('VV', 'Forecast-based planning'),
('X0', 'W/O MRP, with BOM Explosion');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2023_12_09_020007_material_types', 1),
(3, '2023_12_10_061025_create_products_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `parts`
--

CREATE TABLE `parts` (
  `id` varchar(8) NOT NULL,
  `material_description` varchar(200) NOT NULL,
  `material_type` varchar(5) NOT NULL,
  `qty` int(11) NOT NULL DEFAULT 0,
  `location` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `parts`
--

INSERT INTO `parts` (`id`, `material_description`, `material_type`, `qty`, `location`) VALUES
('10000163', 'AMPERE METER,PZ72-AI,ACREL', 'V1', 6, 'LEMARI 1 SLOT A'),
('10000227', 'VOLT METER,K3MA-J-A2,100-240V', 'V1', 0, 'LEMARI 1 SLOT B'),
('10000966', '#BEARING, 6001 2RS', 'V1', 3, 'LEMARI 5 SLOT D'),
('10001028', '#BEARING, 6203 2RS', 'V1', 0, 'LEMARI 4 SLOT C'),
('10001030', '#BEARING, 6204 2RS', 'V1', 0, 'LEMARI 4 SLOT E'),
('10003439', 'PANEL,OPERATOR,6AV6-642-0BA01-1AX1', 'ND', 0, 'LEMARI 4 SLOT C'),
('10003670', 'CABLE SCOON,RING SC,300-16MM', 'ND', 0, 'LEMARI KECIL SLOT 4'),
('10004315', 'CAPACITOR,RG-2,SHIZUKI,50KVAR,3PHAS,415V', 'V1', 0, 'WORKSHOP BAWAH'),
('10004394', 'CARBON BRUSH,25X32X50MM,NOVOTEX,600KW', 'V1', 12, 'LEMARI 5 SLOT D'),
('10004567', 'AUTO STAR COUPLER,ASC 25', 'ND', 1, 'LEMARI 6 SLOT C'),
('10004684', 'CONTROLLER PROGRAMABLE,FX1/FX3 S-10MR-ES', 'V1', 0, 'LEMARI 4 SLOT C'),
('10004685', 'CONTROLLER PROGRAMABLE,GS2PU 72 AS', 'ND', 1, 'LEMARI 7 SLOT B'),
('10004686', 'CONTROLLER PROGRAMABLE,GS2PU 82,TOSHIBA', 'ND', 3, 'LEMARI 7 SLOT B'),
('10004750', 'ENCODER POSITION XMTR,JRQ2-44-R', 'ND', 0, 'LEMARI 7 SLOT B'),
('10004838', 'INPUT ANALOG,GAD 668-S,TOSHIBA', 'ND', 0, 'LEMARI 7 SLOT B'),
('10004844', 'INPUT DIGITAL,GD1 635-S', 'ND', 0, 'LEMARI 7 SLOT B'),
('10004845', 'INPUT DIGITAL,GPI 632-S', 'ND', 1, 'LEMARI 7 SLOT B'),
('10004865', 'MODULE COM.,GEN 651A-S', 'ND', 0, 'LEMARI 7 SLOT B'),
('10004866', 'MODULE COM.,GPF 611-S', 'ND', 1, 'LEMARI 7 SLOT B'),
('10004912', 'NAME GP PROFIBUS I/F,070.PF11 DC', 'ND', 1, 'LEMARI 6 SLOT C'),
('10004917', 'OUTPUT ANALOG,GDA 664-S,TOSHIBA', 'ND', 1, 'LEMARI 7 SLOT B'),
('10004923', 'OUTPUT DIGITAL,GDQ 635-S', 'ND', 0, 'LEMARI 7 SLOT B'),
('10005001', 'POWER SUPPLY UNIT,EGD DR-4524', 'ND', 0, 'LEMARI 7 SLOT B'),
('10005013', 'POWER SUPPLY,S82K 01524,INPUT,100-240VAC', 'ND', 0, 'LEMARI 4 SLOT C'),
('10005020', 'POWER SUPPLY,DPP/DRB-120-24,120W,5A,24V', 'V1', 1, 'LEMARI 4 SLOT C'),
('10005021', 'POWER SUPPLY,DPP 240-24,10 A,24 V', 'V1', 2, 'LEMARI 4 SLOT C'),
('10005028', 'POWER SUPPLY,JWS50-24', 'ND', 2, 'LEMARI 7 SLOT B'),
('10005030', 'POWER SUPPLY,LWT50H-5FF,100 – 240 VAC', 'ND', 5, 'LEMARI 7 SLOT B'),
('10005061', 'PRINTED CIRCUIT BOARD, 1821.152.020', 'ND', 2, 'LEMARI 4 SLOT D'),
('10005066', 'PRINTED WIRING BOARD,ARND-3110N+3620A', 'ND', 1, 'LEMARI 7 SLOT A'),
('10005069', 'PRINTED WIRING BOARD,ARND-3119A,TOSHIBA', 'ND', 2, 'LEMARI 7 SLOT A'),
('10005071', 'PRINTED WIRING BOARD,ARND-3621B', 'ND', 1, 'LEMARI 7 SLOT A'),
('10005072', 'PRINTED WIRING BOARD,ARND-4025 A', 'ND', 10, 'LEMARI 7 SLOT A'),
('10005075', 'PRINTED WIRING BOARD,ARND-4061A', 'ND', 1, 'LEMARI 7 SLOT A'),
('10005639', 'CONTACT CLEANER,SPRAY,2016,CRC', 'V1', 0, 'LEMARI KAYU WS ATAS'),
('10005672', 'RED URETHON SEAL COT,SPRAY,2044,CRC', 'V1', 1, 'LEMARI KAYU WS ATAS'),
('10005683', 'WD, 40, LIQUID, 412 ML', 'V1', 1, 'LEMARI KAYU WS ATAS'),
('10005780', 'DP/DP COUPLER,6ES7 158 0AD01 0XA0', 'ND', 1, 'LEMARI 7 SLOT B'),
('10005782', 'F/O MODUL,OZD PROFI 12M G12,HIRSCHMANN', 'ND', 1, 'LEMARI 6 SLOT C'),
('10005825', 'CABLE SCOON,RING SC,120-12MM', 'ND', 0, 'LEMARI KECIL SLOT 4'),
('10005827', 'CABLE SCOON,RING SC,150-12MM', 'ND', 0, 'LEMARI KECIL SLOT 4'),
('10005828', 'CABLE SCOON,RING SC,16-10MM', 'ND', 0, 'LEMARI KECIL SLOT 4'),
('10005829', 'CABLE SCOON,RING SC,185-14MM', 'ND', 0, 'LEMARI KECIL SLOT 4'),
('10005835', 'CABLE SCOON,RING SC,25-10MM', 'ND', 0, 'LEMARI KECIL SLOT 4'),
('10005838', 'CABLE SCOON,RING SC,35-8MM', 'ND', 0, 'LEMARI KECIL SLOT 4'),
('10005840', 'CABLE SCOON,RING SC,4-5MM', 'ND', 0, 'LEMARI KECIL SLOT 4'),
('10005842', 'CABLE SCOON,RING SC,50-10MM', 'ND', 0, 'LEMARI KECIL SLOT 4'),
('10005843', 'CABLE SCOON,RING SC,6MM', 'ND', 0, 'LEMARI KECIL SLOT 4'),
('10005846', 'CABLE SCOON,RING SC,70-10MM', 'ND', 0, 'LEMARI KECIL SLOT 4'),
('10005848', 'CABLE SCOON,RING SC,95-12MM', 'ND', 0, 'LEMARI KECIL SLOT 4'),
('10005850', 'CABLE SCOON,Y,1.25-3MM', 'ND', 0, 'LEMARI KECIL SLOT 4'),
('10005869', 'CONECTING,RAIL WHEEL,CRANE KY-BC 3300', 'ND', 5, 'LEMARI 4 SLOT A'),
('10005991', 'CONNECTOR,RJ 45', 'ND', 2, 'LEMARI 7 SLOT B'),
('10006090', 'CABLE SCOON,RING SC,10-8MM', 'ND', 0, 'LEMARI KECIL SLOT 4'),
('10006093', 'CABLE SCOON,RING SC,240-16MM', 'ND', 0, 'LEMARI KECIL SLOT 4'),
('10006097', 'CABLE,SCOON,PIN HOLE,1,5MM,FERRUL', 'ND', 0, 'LEMARI KECIL SLOT 4'),
('10006112', 'SUBCON PLUS PROFIB,SC2,571151,PHOENIX', 'ND', 14, 'LEMARI 6 SLOT C'),
('10006140', 'TERMINAL BLOCK, VIKING 4 MM, 371-69/61', 'ND', 0, 'LEMARI 5 SLOT C'),
('10006178', 'CONTACT BLOCK,XENL112/XENG1191,SCHNEIDER', 'V1', 5, 'LEMARI 4 SLOT A'),
('10006213', 'CONTACTOR MAGNETIC, S-N 400, 220V', 'V1', 0, 'LEMARI 1 SLOT D'),
('10006215', 'CONTACTOR MAGNETIC, S-N 220, 220V', 'V1', 2, 'LEMARI 1 SLOT D'),
('10006216', 'CONTACTOR MAGNETIC, S-N/T - 100', 'V1', 3, 'LEMARI 1 SLOT D'),
('10006217', 'CONTACTOR MAGNETIC,S-N125,MITSUBISH,220V', 'V1', 3, 'LEMARI 1 SLOT D'),
('10006218', 'CONTACTOR MAGNETIC,SN-150(SK),200V-240V', 'V1', 2, 'LEMARI 1 SLOT D'),
('10006219', 'CONTACTOR MAGNETIC, S/N 180, 220V', 'V1', 2, 'LEMARI 1 SLOT D'),
('10006220', 'CONTACTOR MAGNETIC, S-N/T - 25', 'V1', 3, 'LEMARI 1 SLOT D'),
('10006221', 'CONTACTOR MAGNETIC, S-N 300, 220V', 'V1', 0, 'LEMARI 1 SLOT D'),
('10006222', 'CONTACTOR MAGNETIC, S-N/T-35, 3P, 220V', 'V1', 0, 'LEMARI 1 SLOT D'),
('10006223', 'CONTACTOR MAGNETIC, S-N/T - 50', 'V1', 2, 'LEMARI 1 SLOT D'),
('10006224', 'CONTACTOR MAGNETIC, S-N/T 65, 240V', 'V1', 0, 'LEMARI 1 SLOT D'),
('10006225', 'CONTACTOR MAGNETIC, S-N/T - 80', 'V1', 4, 'LEMARI 1 SLOT D'),
('10006239', 'CONTACTOR,AUXILIARY,LADN20,TELEMECANIQUE', 'ND', 2, 'LEMARI 4 SLOT A'),
('10006245', 'CONTACTOR,AUXILIARY,LADN40,TELEMECANIQ', 'ND', 4, 'LEMARI 4 SLOT A'),
('10006248', 'CONTACTOR, AUXILIARY, LADN-22', 'V1', 20, 'LEMARI 4 SLOT A'),
('10006272', 'CONTACTOR,LADN 04,TELEMECANIQUE', 'ND', 0, 'LEMARI 4 SLOT A'),
('10006275', 'CONTACTOR,LC1D09 E7,TELEMECANIQUE,48V', 'ND', 2, 'LEMARI 4 SLOT A'),
('10006278', 'CONTACTOR,LC1D258 F7,1NC + 1NO,110 VAC', 'ND', 0, 'LEMARI 4 SLOT B'),
('10006283', 'CONTACTOR,LC1D25 F7,TELEMECANIQUE,110V', 'V1', 2, 'LEMARI 4 SLOT A'),
('10006285', 'CONTACTOR,LC1D09 F7,TELEMECANIQUE,110V', 'V1', 7, 'LEMARI 4 SLOT A'),
('10006286', 'CONTACTOR,LC1D09 D7,SCHNEIDER,50HZ,42V', 'V1', 3, 'LEMARI 4 SLOT B'),
('10006287', 'CONTACTOR,LC1D09 M7,SCHNEIDER,220V', 'V1', 2, 'LEMARI 1 SLOT D'),
('10006290', 'CONTACTOR,LC1D18 M7,SCHNEIDER,50HZ,220V', 'V1', 6, 'LEMARI 1 SLOT D'),
('10006292', 'CONTACTOR,LC1D25 M7,SCHNEIDER,200-220V', 'V1', 2, 'LEMARI 1 SLOT D'),
('10006300', 'CONTACTOR, LC1D80 F7, 110V', 'ND', 2, 'LEMARI 4 SLOT B'),
('10006301', 'CONTACTOR,LC1D80 M7,TELEMECANIQUE', 'V1', 3, 'LEMARI 4 SLOT B'),
('10006302', 'CONTACTOR,LC1DWK12 M5/7,SCHNEIDER,220V', 'V1', 4, 'LEMARI 1 SLOT D'),
('10006310', 'CONTACTOR,LC1D258E7,TELEMECANIQ,50HZ,48V', 'ND', 2, 'LEMARI 4 SLOT A'),
('10006313', 'CONTACTOR,MAGNETIC,CAD32F7,SCHNEIDE,110V', 'ND', 0, 'LEMARI 1 SLOT D'),
('10006345', 'TIMER ON DELAY,RE48ATM12MW,24-240VAC/DC', 'V1', 5, 'LEMARI 5 SLOT C'),
('10006349', 'TIMER,H3CR-A11,OMRON,240 VAC', 'ND', 5, 'LEMARI 5 SLOT C'),
('10006350', 'Timer, RE7YR12BU/RE22R2QGMR, 220V', 'V1', 2, 'LEMARI 5 SLOT C'),
('10006352', 'TIMER,H3CR-H8L OFF DELAY(MIN),OMRON,240V', 'ND', 5, 'LEMARI 5 SLOT C'),
('10006355', 'TIMER, LADR0 0.1-3S 0FF DL,TELEMECANIC', 'V1', 6, 'LEMARI 4 SLOT A'),
('10006358', 'TIMER,LADTO,0,1 – 3 SEC,TELEMECANIC', 'V1', 5, 'LEMARI 4 SLOT A'),
('10007669', 'FUSE,TABUNG,GLASS,100 MA,250 V', 'ND', 0, 'LEMARI 1 SLOT C'),
('10007789', 'FUSE LINK TYP:CLS 3.6KV/C70A/M100A ', 'ND', 0, 'LEMARI 5 SLOT B'),
('10007816', 'FUSE,HIGH SPEED,10URD73TTF1000', 'V1', 11, 'LEMARI 6 SLOT A'),
('10007821', 'FUSE,HIGH SPEED,9.5URD 273TTF2200,2200A', 'ND', 2, 'LEMARI 6 SLOT A'),
('10007966', 'MCB, C 60H C4, 4A, 2P', 'ND', 2, 'LEMARI 1 SLOT C'),
('10007974', 'NFB, NF 250-HW/V, 250A, 3P, 690V', 'V1', 1, 'LEMARI 1 SLOT C'),
('10007981', 'NFB, NF 125-HW, 20A, 3P', 'ND', 2, 'LEMARI 1 SLOT C'),
('10007991', 'NFB, NF-250-HW/V, 125A, 3P', 'V1', 0, 'LEMARI 1 SLOT C'),
('10007993', 'NFB, NF 125-HW, 30-32A, 3P', 'ND', 0, 'LEMARI 1 SLOT C'),
('10007995', 'NFB, NF 125-HW, 50A, 3P, 690V', 'V1', 2, 'LEMARI 1 SLOT C'),
('10007996', 'NFB, NF 125-HW, 63A, 2P', 'ND', 2, 'LEMARI 1 SLOT C'),
('10008001', 'NFB, NF 160-HW, 160A, 3P,690V', 'V1', 2, 'LEMARI 1 SLOT C'),
('10008004', 'NFB, NF 250-HW, 200A, 3P', 'ND', 0, 'LEMARI 1 SLOT C'),
('10008005', 'NFB, NF 250-HW/V, 150A, 3P', 'ND', 0, 'LEMARI 1 SLOT C'),
('10008009', 'NFB, NF 400-SP/SW, 350A, 3P, 690V', 'ND', 0, 'LEMARI 1 SLOT C'),
('10008010', 'NFB, NF 400-SW, 400A, 3P, 690V', 'V1', 0, 'LEMARI 1 SLOT C'),
('10008884', 'HOLDER BRUSH,26 X 10 MM', 'ND', 0, 'LEMARI 5 SLOT D'),
('10009979', 'TRANSMITTER,LTCE-5A-L3/T,0-5A,220V,ATT2', 'ND', 43, 'LEMARI 1 SLOT A'),
('10010004', 'COUPLING FLEXIBLE,INSULATED,406040-17A', 'ND', 1, 'LEMARI 6 SLOT B'),
('10010055', 'ISOLATOR TYPE:DGP3 IN/OUT 0-10VDC/220V', 'ND', 6, 'LEMARI 7 SLOT B'),
('10010152', 'SPEED CON,ED MOTOR CONTROL PANEL,S5200', 'V1', 1, 'LEMARI 6 SLOT D'),
('10010331', 'LAMP PILOT, GREEN, XB4BVM3, 25MM, 220V', 'ND', 0, 'LEMARI 5 SLOT C'),
('10010332', 'LAMP PILOT, RED, XB4BVM4, 25MM, 220V', 'V1', 0, 'LEMARI 5 SLOT C'),
('10010333', 'LAMP PILOT, YELLOW, XB4BVM5, 25MM, 220V', 'V1', 0, 'LEMARI 5 SLOT C'),
('10010523', 'MOTOR SERVO&DRIVE,HC-SFS102,1KW,2000RPM', 'ND', 1, 'LEMARI 4 SLOT E'),
('10010550', 'MOTOR,1821.140.010,118W,6,5A,24V,GEFECNE', 'V1', 2, 'LEMARI 4 SLOT D'),
('10010801', 'INVERTER, ELECTRA DRIVE, FR-E720S-030', 'V1', 1, 'LEMARI 4 SLOT C'),
('10011126', 'RESOLVER,TS.2025N371E 10D,1KHZ,10V', 'V1', 1, 'LEMARI 6 SLOT B'),
('10012556', 'SEAL, CUP DST, RUBBER, 15326/274045', 'V1', 10, 'LEMARI 4 SLOT B'),
('10014667', 'SOCKET TIMER,P2CF-08,H3CR-F8, RUZC2M', 'ND', 30, 'LEMARI 5 SLOT C'),
('10014724', 'SOCKET,PYF.14-AN/RXZE2M114M,U/RELAY MY4', 'V1', 40, 'LEMARI 5 SLOT C'),
('10016377', 'CURRENT, COLLECTOR, CL7 - 7 - 100', 'V1', 1, 'LEMARI 4 SLOT A'),
('10016380', 'CURRENT COLECTOR,DOUBLE,GROUND ,153682', 'ND', 1, 'LEMARI 4 SLOT B'),
('10016381', 'CURRENT COLECTOR,DOUBLE,120 PHASE,153681', 'V1', 3, 'LEMARI 4 SLOT B'),
('10016428', 'RECTIFIER,ESD141,60003098,200-690VAC50HZ', 'V1', 2, 'LEMARI 4 SLOT A'),
('10016430', 'RECTIFIER, NM181NR4, 60003169, CONE', 'V1', 1, 'LEMARI 4 SLOT A'),
('10016447', 'MANUAL STATER,GV2-M07,TELEMEC,1,6-2,5A', 'ND', 1, 'LEMARI 1 SLOT C'),
('10016449', 'MOTOR RELAY,CCR21/CCR22,TOSHIBA,200V', 'ND', 0, 'LEMARI 4 SLOT D'),
('10016456', 'OVERLOAD,LRD-08,TELEMECANIQUE,2.5–4A', 'ND', 4, 'LEMARI 1 SLOT B'),
('10016503', 'POWER FACTOR REG, RVT2-12/V-MS-12Q', 'V1', 2, 'LEMARI 4 SLOT D'),
('10016571', 'RELAY, LY4N/RPM42P7, 220 V', 'V1', 30, 'LEMARI 5 SLOT C'),
('10016584', 'RELAY, MY4N/RXM4AB2P7, 220-240 VAC', 'V1', 50, 'LEMARI 5 SLOT C'),
('10016585', 'RELAY, MY4N/RXM4AB2BD, 24 VDC', 'V1', 20, 'LEMARI 5 SLOT C'),
('10016629', 'SOCKET,PTF 14A-E/RPZF4-U/LY4N,220V', 'V1', 40, 'LEMARI 5 SLOT C'),
('10016640', 'SOCKET,OMRON,U/TIMER P2CF-11,100A,250VAC', 'ND', 4, 'LEMARI 5 SLOT C'),
('10018213', 'EMERGENCY STOP (PAKAI KUNCI),AH 30/NO+NC', 'ND', 0, 'LEMARI 5 SLOT C'),
('10018246', 'NFB, NF 125-HW/HV, 100A, 3P', 'ND', 3, 'LEMARI 1 SLOT C'),
('10018291', 'PROFIBUS,CA5-PFSALL/EX-01,PROFACE', 'V1', 4, 'LEMARI 6 SLOT C'),
('10018332', 'PUSH BUTTON PILOT LAMP,AH25,XB4BW334,GRN', 'V1', 0, 'LEMARI 5 SLOT C'),
('10018333', 'PUSH BUTTON PILOT LAMP,AH25,XB4BW344,RED', 'V1', 0, 'LEMARI 5 SLOT C'),
('10018398', 'LIMIT SWITCH,WL - NJ,WL 9514M,OMRON', 'V1', 0, 'LEMARI 4 SLOT C'),
('10018399', 'LIMIT SWITCH,WL CA 12,OMRON', 'V1', 2, 'LEMARI 4 SLOT C'),
('10018400', 'LIMIT SWITCH,WLD2', 'ND', 12, 'LEMARI 4 SLOT C'),
('10018416', 'PROXIMITY SWITCH,IFRM08P17A1/L,EMO PR', 'ND', 0, 'LEMARI 4 SLOT C'),
('10018443', 'FLOATLESS LEVEL, SWITCH, 61F-G-AP, 220V', 'ND', 0, 'LEMARI 5 SLOT C'),
('10018481', 'SELECTOR SWITCH,1-0-2,3P,SPRING RETURN', 'V1', 0, 'LEMARI 5 SLOT C'),
('10018989', 'SAKAPHEN', 'V1', 2, 'LEMARI KAYU WS ATAS'),
('10019221', 'CURRENT TRANSFORMER,CT 70,100/5 A', 'V1', 0, 'LEMARI 1 SLOT B'),
('10019222', 'CURRENT TRANSFORMER,CT 70,150/5A', 'ND', 0, 'LEMARI 1 SLOT B'),
('10019223', 'CURRENT TRANSFORMER,CT 70,200/5A', 'ND', 0, 'LEMARI 1 SLOT B'),
('10019224', 'CURRENT TRANSFORMER,CT 70,250/5A', 'ND', 0, 'LEMARI 1 SLOT B'),
('10019225', 'CURRENT TRANSFORMER,CT 70,300/5A', 'ND', 0, 'LEMARI 1 SLOT B'),
('10019270', 'CURRENT TRANSFORMER,CT 70,50/5A', 'ND', 0, 'LEMARI 1 SLOT B'),
('10020433', 'PRINTED WIRING BOARD,ARND-3110L+3620A', 'ND', 1, 'LEMARI 7 SLOT A'),
('10020519', 'MCB, IC60H, 32A, 3P', 'ND', 0, 'LEMARI 1 SLOT C'),
('10020539', 'ETHERNET MOXA,EDS-308-MM-SC 2FO/6PORT', 'ND', 3, 'LEMARI 7 SLOT B'),
('10020592', 'THERMAL MCB,GV2-P08,2.5 - 4A', 'ND', 2, 'LEMARI 1 SLOT C'),
('10020948', 'TRANSDUCER CT ,WSK 30,1/5AMP ,2.5VAC', 'ND', 0, 'LEMARI 6 SLOT A'),
('10021322', 'TENSION,TRANSMITTER,PFEA111,ABB', 'ND', 1, 'LEMARI 7 SLOT D'),
('10021491', 'SWITCH ELEMENT,SES2BE,87455044/33,274550', 'V1', 12, 'LEMARI 4 SLOT B'),
('10021992', '1ST SHUNT RELEASE,FOR VCB 3 AH 1264-2', 'ND', 0, 'LEMARI 5 SLOT D'),
('10022174', 'FUSE,170M7597,BUSSMAN,1500A,1250V', 'ND', 9, 'LEMARI 6 SLOT A'),
('10022253', 'FUSE,HIGH SPEED,12.5URD2X73TTF0800', 'ND', 4, 'LEMARI 6 SLOT A'),
('10022258', 'FUSE,HIGH SPEED12URD73TTF0900,900A,1200V', 'ND', 11, 'LEMARI 6 SLOT A'),
('10022263', 'CABLE SCOON,RING SC,50-14MM', 'ND', 0, 'LEMARI KECIL SLOT 4'),
('10022268', 'CABLE SCOON,RING SC,35-10MM', 'ND', 0, 'LEMARI KECIL SLOT 4'),
('10022314', 'FUSE,HIGH SPEED,12.5URD2X73TTF1600,1600A', 'ND', 4, 'LEMARI 6 SLOT A'),
('10022315', 'FUSE,HIGH SPEED,12.5URD2X73TTF1250,1250A', 'ND', 4, 'LEMARI 6 SLOT A'),
('10022316', 'FUSE,HIGH SPEED,11URD71TTF0500,500A', 'ND', 1, 'LEMARI 6 SLOT A'),
('10022317', 'FUSE,HIGH SPEED,6.9URD31TTF0400,400A', 'ND', 0, 'LEMARI 6 SLOT A'),
('10022318', 'FUSE,HIGH SPEED,6.9URD31TTF0350,350A', 'ND', 2, 'LEMARI 6 SLOT A'),
('10022393', 'MANUAL STARTER,GV2ME14,SCHNEIDER,6-10A', 'ND', 0, 'LEMARI 1 SLOT C'),
('10022418', 'MANUAL STATER,GV2ME10,SCHNEIDER,4-6,3A', 'ND', 0, 'LEMARI 1 SLOT C'),
('10022590', 'EOCR, LT4706M7S, SCHNEIDER, DS3-05S', 'V1', 20, 'LEMARI 1 SLOT B'),
('10022591', 'EOCR,LT4730M7S,SCHNEIDER,3-30 A', 'ND', 9, 'LEMARI 1 SLOT B'),
('10022674', 'PUSH BUTTON,XB4BW31M5,WHITE,SCHNEID,220V', 'ND', 0, 'LEMARI 5 SLOT C'),
('10022675', 'PUSH BUTTON,XB4BW33M5,GREEN,SCHNEID,220V', 'ND', 10, 'LEMARI 5 SLOT C'),
('10022676', 'PUSH BUTTON,XB4BW34M5,RED,SCHNEID,220V', 'ND', 10, 'LEMARI 5 SLOT C'),
('10022677', 'PUSH BUTTON,XB4BW35M5,YELLOW,SCHNEI,220V', 'ND', 10, 'LEMARI 5 SLOT C'),
('10022892', 'GATEWAY,UC-7402-PLUS,MOXA,12-48VDC', 'ND', 1, 'LEMARI 7 SLOT B'),
('10022893', 'ETHERNET,EDS-408A-MM-SC 2FO/6PORT,MOXA', 'ND', 1, 'LEMARI 7 SLOT B'),
('10022894', 'ETHERNET,EDS-205A-MM-SC 5PORT,MOXA', 'ND', 1, 'LEMARI 7 SLOT B'),
('10022968', 'PRINTED WIRING BOARD,ARND-4061B', 'ND', 0, 'LEMARI 7 SLOT A'),
('10023058', 'FUSE,HIGH SPEED,6.9URD33TTF1000,1000A', 'ND', 4, 'LEMARI 6 SLOT A'),
('10023323', 'ELECT. POS.TRANS,RWG4020,AUMA', 'ND', 2, 'LEMARI 6 SLOT B'),
('10023329', 'CONTACTOR,LC1D25E7,TELEMECANI,50HZ,48VAC', 'ND', 2, 'LEMARI 4 SLOT A'),
('10023491', 'INVERTER,ACS355-03E-15A6-4,7.5KW,ABB', 'ND', 0, 'LEMARI 4 SLOT E'),
('10023595', 'FAN,AC,TYPE:20060,8\",ORIX,2P,220V\"', 'V1', 3, 'LEMARI 5 SLOT A'),
('10023767', 'FUSE LINK,FPC3-3X25N,TOSHIBA,M100A,3.3KV', 'ND', 3, 'LEMARI 5 SLOT D'),
('10023771', 'FUSE LINK,CLS,M150A,3.6KV,MITSUBISHI', 'ND', 6, 'LEMARI 5 SLOT B'),
('10023835', 'ENCODER,OSA18-130,MITSUBISHI', 'ND', 0, 'LEMARI 4 SLOT E'),
('10023836', 'DRIVE SERVO,MR-J2S-100A,MITSUBISHI', 'V1', 0, 'LEMARI 4 SLOT E'),
('10023960', 'VOLTAGE SENSOR,SDV-FM2,OMRON,24VDC', 'ND', 0, 'LEMARI 5 SLOT C'),
('10024055', 'KEYPAD,6511,FOR SSD DRIVE 650', 'ND', 0, 'LEMARI 6 SLOT C'),
('10025949', 'PROXIMITY SWITCH,PR08-2DP,AUTONICS,24VDC', 'V1', 5, 'LEMARI 4 SLOT C'),
('10025990', 'PROTECTION RELAY,GRE120-401A-10-10', 'ND', 4, 'LEMARI 5 SLOT B'),
('10026498', 'PRINTED WIRING BOARD,ARND-4131A', 'ND', 1, 'LEMARI 7 SLOT A'),
('10026499', 'PRINTED WIRING BOARD,ARND-4130A', 'ND', 1, 'LEMARI 7 SLOT A'),
('10026614', 'MODULE COM, GPF-612-S, TOSHIBA', 'ND', 0, 'LEMARI 7 SLOT B'),
('10026633', 'MOTOR,SERVO,RML 14CA,KMF, 908-00006', 'ND', 0, 'LEMARI 4 SLOT C'),
('10026634', 'SINAMICS,CU310 DP, 6SL3040-0/1LA00-0AA0', 'ND', 1, 'LEMARI 4 SLOT C'),
('10026635', 'SINAMICS,PM340, 6SL3210-1SE11-7UA0', 'ND', 1, 'LEMARI 4 SLOT C'),
('10026636', 'MICROMASTER 4 EMC FILTER,M-CLEAN', 'ND', 1, 'LEMARI 4 SLOT C'),
('10026801', 'RESOLVER,RTD2A4Y16,10KHZ,4P,BAUMER', 'ND', 1, 'LEMARI 4 SLOT C'),
('10026876', 'PRINTED WIRING BOARD,ARND-4045B,XIO CARD', 'ND', 1, 'LEMARI 7 SLOT A'),
('10026877', 'PRINTED WIRING BOARD,ARND-4046A,DISPLAY', 'ND', 0, 'LEMARI 7 SLOT A'),
('10026880', 'POWER SUPPLY,MTW60-51515,220V,5,-15,+15V', 'ND', 2, 'LEMARI 7 SLOT B'),
('10026885', 'POWER SUPPLY,LDA30F-24,224V-24VDC,1.3A', 'ND', 1, 'LEMARI 7 SLOT B'),
('10026886', 'FUSE,170M6471,2000A,500V,BUSSMANN', 'ND', 1, 'LEMARI 6 SLOT A'),
('10027730', 'PLC, FX3S-14 MR-DS, MELSEC, MITSUBISHI', 'ND', 0, 'LEMARI 4 SLOT C'),
('10027791', 'MODULE,FL-NET COMM,FL612,TOSHIBA', 'ND', 1, 'LEMARI 7 SLOT B'),
('10027992', 'ENCODER,FA-CODER TS5013N156,15VDC,2048', 'ND', 1, 'LEMARI 6 SLOT B'),
('10028209', 'COUPLING RESOLVER,TS.2025N371E10D,NM0285', 'V1', 3, 'LEMARI 6 SLOT B'),
('10028693', 'CONTACTOR, LC1D65AE7, 48VAC, SCHNEIDER', 'ND', 2, 'LEMARI 4 SLOT A'),
('10028819', 'FLOATLESS LEVEL, CONT, 61F-G2, 220V', 'ND', 0, 'LEMARI 5 SLOT C'),
('10028843', 'POWER SUPPLY,DR120-48,48VDC', 'ND', 0, 'LEMARI 4 SLOT C'),
('10029065', 'IGBT,2MBI400U4H-170-01,400A,1700V', 'ND', 20, 'LEMARI 7 SLOT D'),
('10029207', 'TRAFO STEP DOWN,100VA,380V/220V', 'ND', 1, 'LEMARI 4 SLOT A'),
('10029244', 'CAPACITOR,LNXV2G222HSHATG,2200UF,400V', 'ND', 4, 'LEMARI 7 SLOT C'),
('10029899', 'MODULE,POWER SUPPLY,PS693,TOSHIBA', 'ND', 1, 'LEMARI 7 SLOT B'),
('10029964', 'CONTACTOR, LC1D40AE7, 48VAC, SCHNEIDER', 'ND', 2, 'LEMARI 4 SLOT A'),
('10029965', 'CABLE SCOON,RING SC,70-14MM', 'ND', 0, 'LEMARI KECIL SLOT 4'),
('10029982', 'INVERTER,ACS355-03E-05A6-4,1.5KW,ABB', 'ND', 1, 'LEMARI 4 SLOT E'),
('10030523', 'TENSION AMPLIFIER,AST 3P,VISHAY', 'ND', 2, 'LEMARI 7 SLOT C'),
('10030600', 'SINAMICS,CU320,6SL3054-0AA00/0EH00-1BAO', 'ND', 0, 'LEMARI 4 SLOT C'),
('10030601', 'SINAMICS,BOP20,6SL3055-0AA00-4BA0', 'ND', 1, 'LEMARI 4 SLOT C'),
('10030602', 'SINAMICS,SMC10,6SL3055-0AA00-5AA0/3', 'ND', 1, 'LEMARI 4 SLOT C'),
('10030603', 'SINAMICS,HUB DMC20,6SL3055-0AA00-6AA0/1', 'ND', 1, 'LEMARI 4 SLOT C'),
('10030628', 'POWER METER, PM5350, SCHNEIDER', 'ND', 0, 'LEMARI 1 SLOT A'),
('10030638', 'SINAMICS,CHOKE,1P6SE6400-3TC00-4AD2', 'ND', 2, 'LEMARI 4 SLOT C'),
('10030665', 'MANUAL STARTER,GV2ME08,SCHNEIDER,2.5-4A', 'ND', 3, 'LEMARI 1 SLOT C'),
('10034373', 'FUSE LINK,FPC3-3G25N,TOSHIBA,M200A,3.3KV', 'ND', 3, 'LEMARI 5 SLOT D'),
('10034455', 'DIGITAL PANEL METER,K3MA-F,AC100-240', 'ND', 3, 'LEMARI 1 SLOT B'),
('10034636', 'MOTOR CONTROLLER,LTMR08MFM+LTMCU', 'ND', 3, 'LEMARI 1 SLOT B'),
('10034704', 'CAPACITOR,LNR2G402MSMCTG,4000UF,400V', 'ND', 2, 'LEMARI 7 SLOT C'),
('10034720', 'MECHANICAL CONTACT RELAY,MKA-2,42/48V', 'ND', 1, 'LEMARI 4 SLOT B'),
('10034919', 'CURRENT TRANSFORMER,LT6CT2001,200A/1A', 'ND', 0, 'LEMARI 1 SLOT B'),
('10034944', 'ISOLATOR,KNICK,P-27000 H1', 'ND', 3, 'LEMARI 5 SLOT A'),
('10035619', 'CARBON BRUSH,5334,12 X 8 X 4.5MM', 'ND', 10, 'LEMARI 4 SLOT D'),
('10035653', 'BOX MODULE,PFXSP5B10,PROFACE', 'ND', 3, 'LEMARI 6 SLOT C'),
('10035654', 'PROFIBUS MODULE,PFXZCDEUPF1,PROFACE', 'ND', 3, 'LEMARI 6 SLOT C'),
('10035655', 'TOUCH MONITOR,PFXSP5500TPD,PROFACE', 'ND', 3, 'LEMARI 6 SLOT C'),
('10035690', 'PROTECTION RELAY,GRE110-4014-10-10', 'ND', 5, 'LEMARI 5 SLOT D'),
('10035772', 'FUSE,170M7595,BUSSMANN,2500A,1250V', 'ND', 0, 'LEMARI 6 SLOT A'),
('10035938', 'PRINTED WIRING BOARD, ARND-4027B6', 'ND', 3, 'LEMARI 7 SLOT A'),
('10035941', 'DRIVE DEVICE ADAPTER,USIO21,TOSHIBA', 'ND', 1, 'LEMARI 6 SLOT C'),
('10036016', 'DIODE, 5SDD-5128L0003, ABB', 'ND', 4, 'LEMARI 6 SLOT B'),
('10036017', 'INVERTER, CIMRVT4A000BAA, 3KW, YASKAWA', 'ND', 1, 'LEMARI 7 SLOT C'),
('10036019', 'PDM, ARND-8122A, TMEIC', 'ND', 1, 'LEMARI 7 SLOT A'),
('10036178', 'MAINTENANCE KITS,EMOIII,OSCILATING,KADAN', 'ND', 0, 'LEMARI 4 SLOT C'),
('10036348', 'CAPACITOR,LNKV6402MSEBTG,4000UF,430V', 'ND', 7, 'LEMARI 7 SLOT C'),
('10036383', 'CAPACITOR,LNXV6402MSMBTG,4000UF,430V', 'ND', 1, 'LEMARI 7 SLOT C'),
('10036394', 'CAPACITOR,LNKV6202MTECTG,2000UF,430V', 'ND', 0, 'LEMARI 7 SLOT C'),
('10036421', 'SINAMIC,CU250S-2PN,6SL3246-0BA22-1FA0,SI', 'ND', 0, 'LEMARI 1 SLOT B'),
('10036422', 'SINAMIC,BOP-2,6SL3255-0AA00-4CA1,SIE', 'ND', 0, 'LEMARI 1 SLOT B'),
('10036536', 'DIODE,D2520N22T,V1013,INFINEON', 'ND', 6, 'LEMARI 6 SLOT B'),
('10036599', 'CONTACTOR,LC1D40A M7,220V,SCHNEIDER', 'ND', 2, 'LEMARI 4 SLOT B'),
('10036808', 'SOCKET,PENDANT TROLLEY,3412A 16 PIN,KY-B', 'ND', 0, 'LEMARI 4 SLOT A'),
('10036931', 'IGBT,6MBP50RA120-04,1200V,50A,FUJI', 'ND', 1, 'LEMARI 7 SLOT D'),
('10037327', 'FUSE, NT00, 100A', 'ND', 0, 'LEMARI 6 SLOT B'),
('10037398', 'FUSE, NT00C, 63A', 'ND', 0, 'LEMARI 6 SLOT B'),
('10038563', 'RECTIFIER,GS 26089484,DEMAG', 'ND', 5, 'LEMARI 4 SLOT B'),
('10041536', 'CONTACTOR, LC1D80E7, SCHNEIDER', 'ND', 2, 'LEMARI 4 SLOT A'),
('10041560', 'CONTACTOR, LC1D32E7', 'ND', 2, 'LEMARI 4 SLOT A'),
('10041561', 'RELAY SMART, ZELIO SR3B261B', 'ND', 2, 'LEMARI 4 SLOT A'),
('10041562', 'EXTENSION, ZELIO SR3XT141BD', 'ND', 2, 'LEMARI 4 SLOT A'),
('10041565', 'CONTACTOR, LC1D128E7', 'ND', 2, 'LEMARI 4 SLOT A'),
('10041566', 'CONTACTOR, LC1D09Q7', 'ND', 2, 'LEMARI 4 SLOT A');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `material_types`
--
ALTER TABLE `material_types`
  ADD PRIMARY KEY (`type`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parts`
--
ALTER TABLE `parts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parts_material_type_foreign` (`material_type`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `parts`
--
ALTER TABLE `parts`
  ADD CONSTRAINT `parts_material_type_foreign` FOREIGN KEY (`material_type`) REFERENCES `material_types` (`type`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
