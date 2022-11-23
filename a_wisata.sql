-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2020 at 08:43 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `a_wisata`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminID` char(4) NOT NULL,
  `adminNAMA` varchar(30) NOT NULL,
  `adminEMAIL` varchar(60) NOT NULL,
  `adminPASSWORD` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminID`, `adminNAMA`, `adminEMAIL`, `adminPASSWORD`) VALUES
('A002', 'uas', 'uas@yahoo.com', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `area`
--

CREATE TABLE `area` (
  `areaID` char(35) NOT NULL,
  `areanama` char(35) NOT NULL,
  `areawilayah` char(35) NOT NULL,
  `areaketerangan` varchar(255) NOT NULL,
  `provinsiID` char(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `area`
--

INSERT INTO `area` (`areaID`, `areanama`, `areawilayah`, `areaketerangan`, `provinsiID`) VALUES
('W01', 'Area Wisata 1', 'Papua', 'Tempat Indah', 'L1'),
('W02', 'Area Wisata 2', 'Banjarmasin', 'Tempat Elok', 'L2'),
('W03', 'Area Wisata 3', 'Malang', 'Sangat Bagus', 'L3'),
('W04', 'Area Wisata 4', 'Jambi', 'Tempat Yang Sangat Rindang', 'L4'),
('W05', 'Area Wisata 5', 'NTT', 'Tempat Yang Sangat Indah', 'L5');

-- --------------------------------------------------------

--
-- Table structure for table `beritawisata`
--

CREATE TABLE `beritawisata` (
  `beritaID` char(4) NOT NULL,
  `judulberita` varchar(60) NOT NULL,
  `tipeberita` varchar(100) NOT NULL,
  `isiberita` varchar(300) NOT NULL,
  `areaID` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `beritawisata`
--

INSERT INTO `beritawisata` (`beritaID`, `judulberita`, `tipeberita`, `isiberita`, `areaID`) VALUES
('B002', 'Berita 2', 'Entertainment', 'Saat itu....', 'W01'),
('B01', 'Berita 1', 'Olahraga', 'Saat ini....', 'W01');

-- --------------------------------------------------------

--
-- Table structure for table `destinasi`
--

CREATE TABLE `destinasi` (
  `destinasiID` char(5) NOT NULL,
  `destinasinama` varchar(35) NOT NULL,
  `destinasialamat` varchar(255) NOT NULL,
  `areaID` char(4) NOT NULL,
  `kategoriID` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `destinasi`
--

INSERT INTO `destinasi` (`destinasiID`, `destinasinama`, `destinasialamat`, `areaID`, `kategoriID`) VALUES
('D01', 'Destinasi Wisata 1', 'Jakarta', 'W01', 'WK01'),
('D02', 'Destinasi Wisata 2', 'Tangerang Raya', 'W02', 'WK02'),
('D03', 'Destinasi Wisata 3', 'Jambi', 'W01', 'WK03'),
('D04', 'Destinasi Wisata 4', 'Lampung', 'W02', 'WK04'),
('D05', 'Destinasi Wisata 5', 'Medan', 'W01', 'WK05');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `ID` int(11) NOT NULL,
  `full_name` varchar(250) NOT NULL,
  `gender` char(50) NOT NULL,
  `position` varchar(250) NOT NULL,
  `salary` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`ID`, `full_name`, `gender`, `position`, `salary`) VALUES
(1, 'Andi Garcia', 'Male', 'Director', 4500),
(2, 'Bob Marzelino', 'Male', 'Operation Manager', 3500);

-- --------------------------------------------------------

--
-- Table structure for table `fotoarea`
--

CREATE TABLE `fotoarea` (
  `fotoID` char(5) NOT NULL,
  `fotonama` char(60) NOT NULL,
  `fotowilayah` varchar(250) NOT NULL,
  `areaID` char(5) NOT NULL,
  `fotofile` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fotoarea`
--

INSERT INTO `fotoarea` (`fotoID`, `fotonama`, `fotowilayah`, `areaID`, `fotofile`) VALUES
('A001', 'Foto Area 1', 'Jakarta Barat', 'W01', 'ame.jpg'),
('F002', 'Foto Area 2', 'Jakarta Timur', 'W02', 'gura.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `fotodestinasi`
--

CREATE TABLE `fotodestinasi` (
  `fotoID` char(5) NOT NULL,
  `fotonama` char(60) NOT NULL,
  `destinasiID` char(4) NOT NULL,
  `fotofile` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fotodestinasi`
--

INSERT INTO `fotodestinasi` (`fotoID`, `fotonama`, `destinasiID`, `fotofile`) VALUES
('F001', 'Foto Wisata 1', 'D01', 'ame.png'),
('F002', 'Foto Wisata 2', 'D02', 'ame.png'),
('F003', 'Foto Wisata 3', 'D03', 'ame.png'),
('F004', 'Foto Wisata 4', 'D04', 'ame.png'),
('F005', 'Foto Wisata 5', 'D05', 'ame.png');

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

CREATE TABLE `hotel` (
  `hotelID` char(5) NOT NULL,
  `hotelnama` varchar(70) NOT NULL,
  `hotelalamat` varchar(250) NOT NULL,
  `areaID` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`hotelID`, `hotelnama`, `hotelalamat`, `areaID`) VALUES
('H001', 'Hotel A', 'Jakarta', 'W01');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `kategoriID` char(4) NOT NULL,
  `kategorinama` char(30) NOT NULL,
  `kategoriketerangan` varchar(255) NOT NULL,
  `kategorireferensi` char(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`kategoriID`, `kategorinama`, `kategoriketerangan`, `kategorireferensi`) VALUES
('WK01', 'Alam', 'Wisata dengan pemandangan pantai dan gunung', 'Buku'),
('WK02', 'Sastra', 'Wisata Perbukuan', 'Internet'),
('WK03', 'Olahraga', 'Wisata olahraga yang sedang dinikmati banyak orang', 'Internet'),
('WK04', 'Hiburan', 'Wisata hiburan untuk menghilangkan penat', 'Buku'),
('WK05', 'Memasak', 'Wisata untuk yang tertarik belajar memasak', 'Buku');

-- --------------------------------------------------------

--
-- Table structure for table `provinsi`
--

CREATE TABLE `provinsi` (
  `provinsiID` char(2) NOT NULL,
  `provinsinama` char(25) NOT NULL,
  `provinsitglberdiri` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `provinsi`
--

INSERT INTO `provinsi` (`provinsiID`, `provinsinama`, `provinsitglberdiri`) VALUES
('L1', 'Aceh', '1949-01-02'),
('L2', 'Sumbar', '1950-11-18'),
('L3', 'Papua', '2020-12-01'),
('L4', 'NTB', '1954-02-18'),
('L5', 'NTT', '2020-12-04');

-- --------------------------------------------------------

--
-- Table structure for table `registrasi`
--

CREATE TABLE `registrasi` (
  `regisID` char(4) NOT NULL,
  `firstname` char(20) NOT NULL,
  `lastname` char(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` char(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registrasi`
--

INSERT INTO `registrasi` (`regisID`, `firstname`, `lastname`, `email`, `password`) VALUES
('R001', 'Andi', 'Surjana', 'andi@yahoo.com', 'andi001'),
('R002', 'Budi', 'Budiman', 'budiman002@gmail.com', 'budi002aa');

-- --------------------------------------------------------

--
-- Table structure for table `restoran`
--

CREATE TABLE `restoran` (
  `fotoID` char(5) NOT NULL,
  `fotonama` char(60) NOT NULL,
  `areaID` char(4) NOT NULL,
  `fotofile` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `restoran`
--

INSERT INTO `restoran` (`fotoID`, `fotonama`, `areaID`, `fotofile`) VALUES
('F001', 'Foto Wisata 1', 'W01', 'gura.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`areaID`);

--
-- Indexes for table `beritawisata`
--
ALTER TABLE `beritawisata`
  ADD PRIMARY KEY (`beritaID`);

--
-- Indexes for table `destinasi`
--
ALTER TABLE `destinasi`
  ADD PRIMARY KEY (`destinasiID`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `fotoarea`
--
ALTER TABLE `fotoarea`
  ADD PRIMARY KEY (`fotoID`);

--
-- Indexes for table `fotodestinasi`
--
ALTER TABLE `fotodestinasi`
  ADD PRIMARY KEY (`fotoID`);

--
-- Indexes for table `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`hotelID`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kategoriID`);

--
-- Indexes for table `provinsi`
--
ALTER TABLE `provinsi`
  ADD PRIMARY KEY (`provinsiID`);

--
-- Indexes for table `registrasi`
--
ALTER TABLE `registrasi`
  ADD PRIMARY KEY (`regisID`);

--
-- Indexes for table `restoran`
--
ALTER TABLE `restoran`
  ADD PRIMARY KEY (`fotoID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
