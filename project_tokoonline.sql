-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 05, 2021 at 07:43 PM
-- Server version: 8.0.21
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_tokoonline`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int NOT NULL,
  `admin_nama` varchar(100) NOT NULL,
  `admin_username` varchar(100) NOT NULL,
  `admin_password` varchar(100) NOT NULL,
  `admin_foto` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_nama`, `admin_username`, `admin_password`, `admin_foto`) VALUES
(1, 'Ahmad Jhony', 'admin', '21232f297a57a5a743894a0e4a801fc3', '1352025327_avatar.png');

-- --------------------------------------------------------

--
-- Table structure for table `admingudang`
--

CREATE TABLE `admingudang` (
  `admingudang_id` int NOT NULL,
  `admingudang_nama` varchar(255) NOT NULL,
  `admingudang_username` varchar(100) NOT NULL,
  `admingudang_password` varchar(100) NOT NULL,
  `admingudang_foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admingudang`
--

INSERT INTO `admingudang` (`admingudang_id`, `admingudang_nama`, `admingudang_username`, `admingudang_password`, `admingudang_foto`) VALUES
(1, 'admin gudang', 'admingudang', '4eae18cf9e54a0f62b44176d074cbe2f', '');

-- --------------------------------------------------------

--
-- Table structure for table `bahanbaku`
--

CREATE TABLE `bahanbaku` (
  `bahanbaku_id` int NOT NULL,
  `bahanbaku_kategori` int NOT NULL,
  `bahanbaku_nama` varchar(255) NOT NULL,
  `bahanbaku_harga` int NOT NULL,
  `bahanbaku_jumlah` int NOT NULL,
  `bahanbaku_panjang` int NOT NULL,
  `bahanbaku_lebar` int NOT NULL,
  `bahanbaku_suplier` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `bahanbaku`
--

INSERT INTO `bahanbaku` (`bahanbaku_id`, `bahanbaku_kategori`, `bahanbaku_nama`, `bahanbaku_harga`, `bahanbaku_jumlah`, `bahanbaku_panjang`, `bahanbaku_lebar`, `bahanbaku_suplier`) VALUES
(2, 1, 'asaasaw', 9000, 20, 120, 320, 'xasd'),
(3, 2, 'asdssassa', 21321412, 120, 113, 1314, '2141241'),
(4, 1, 'z', 2000, 1131, 33, 21, '131');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int NOT NULL,
  `customer_nama` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_hp` varchar(20) NOT NULL,
  `customer_alamat` text NOT NULL,
  `customer_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_nama`, `customer_email`, `customer_hp`, `customer_alamat`, `customer_password`) VALUES
(3, 'Ahmad Jhony', 'jhony@gmail.com', '0927883733', 'jala sdjasl', '91ec1f9324753048c0096d036a694f86'),
(5, 'Jamaika Bob', 'jamaika@gmail.com', '08262122771', 'jalan rasta uye nomor 1', '91ec1f9324753048c0096d036a694f86'),
(6, 'Rosalina', 'rosalina@gmail.com', '082827287', 'jalan meruakaja', '91ec1f9324753048c0096d036a694f86'),
(7, 'suleha alala', 'suleha@gmail.com', '982737383737', 'sasdkajndkasjdn', 'ae2831cce9ac4de6a703a728f26cc07b'),
(9, 'ivan', 'ivan@ivan', '087986574635', 'sfdgfhgjhkj', '2c42e5cf1cdbafea04ed267018ef1511'),
(10, 'B', 'kesfsdnfnvdsjgb@gmail.com', '0217816284', 'sakdhlashlasfla', 'c1f68ec06b490b3ecb4066b1b13a9ee9');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `invoice_id` int NOT NULL,
  `invoice_tanggal` date NOT NULL,
  `invoice_customer` int NOT NULL,
  `invoice_nama` varchar(255) NOT NULL,
  `invoice_hp` varchar(255) NOT NULL,
  `invoice_alamat` text NOT NULL,
  `invoice_provinsi` varchar(255) NOT NULL,
  `invoice_kabupaten` varchar(255) NOT NULL,
  `invoice_kurir` varchar(255) NOT NULL,
  `invoice_berat` int NOT NULL,
  `invoice_ongkir` int NOT NULL,
  `invoice_total_bayar` int NOT NULL,
  `invoice_status` int NOT NULL,
  `invoice_resi` varchar(255) NOT NULL,
  `invoice_bukti` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`invoice_id`, `invoice_tanggal`, `invoice_customer`, `invoice_nama`, `invoice_hp`, `invoice_alamat`, `invoice_provinsi`, `invoice_kabupaten`, `invoice_kurir`, `invoice_berat`, `invoice_ongkir`, `invoice_total_bayar`, `invoice_status`, `invoice_resi`, `invoice_bukti`) VALUES
(5, '2019-06-13', 5, 'Jamaika / Ibu ida', '9828272723', 'JL. makmur no.17 , rumahw arna putih', '1', '1', 'JNE', 300, 24000, 960000, 0, '', ''),
(6, '2019-06-13', 5, 'Jamaika Bob', '08272263637', 'Jalan Pentolan Nomor 1C, Rasta mania', 'Maluku', 'Maluku Tenggara', 'JNE - OKE', 300, 108000, 808500, 3, '', '577813088.jpg'),
(7, '2019-06-14', 6, 'Rosalina / Ibu Ros', '08282723833', 'jalan mewawaw nomor 34 A. Komplek Pertamburan,', 'Kalimantan Utara', 'Nunukan', 'Pos Indonesia - Paket Kilat Khusus', 200, 71500, 351500, 5, '', '2001382847.jpg'),
(8, '2019-07-25', 7, 'Suleha', '0897273737383', 'jalan merpati putih nomor 21, surabaya', 'Banten', 'Pandeglang', 'Pos Indonesia - Paket Kilat Khusus', 200, 13000, 353000, 2, '', '1048853755.jpg'),
(9, '2021-01-03', 9, 'ivan', '087766789', 'sajhdkahsdnasd asdhasd', 'Jawa Tengah', 'Banjarnegara', 'Pos Indonesia - Paket Kilat Khusus', 3000, 36000, 86000, 0, '', ''),
(10, '2021-01-03', 9, 'safasfas', '098675432', 'sdfghjkjhgf', 'DI Yogyakarta', 'Yogyakarta', 'Pos Indonesia - Paket Kilat Khusus', 8000, 80000, 83000, 0, '', ''),
(11, '2021-01-03', 9, 'az', '088656879', 'sgajdbasd', 'Bengkulu', 'Seluma', 'Pos Indonesia - Paket Kilat Khusus', 8000, 304000, 307000, 0, '', ''),
(12, '2021-01-03', 9, '9807545', '097865463243', 'sfffdsdsdfs', 'Kalimantan Barat', 'Sintang', 'Pos Indonesia - Paket Kilat Khusus', 3000, 132000, 182000, 0, '', ''),
(13, '2021-01-03', 9, 'zx', '09685746354', 'fdhgjh', 'Kalimantan Utara', 'Malinau', 'JNE - OKE', 3000, 201000, 251000, 0, '', ''),
(14, '2021-01-03', 9, 'gggggg', '08676878', 'sadsasadsd', 'Jawa Tengah', 'Kebumen', 'Pos Indonesia - Paket Kilat Khusus', 8000, 96000, 99000, 0, '', ''),
(15, '2021-01-03', 9, 'sdfsdgdfdfh', '09875432', 'dsfghkujil', 'DI Yogyakarta', 'Bantul', 'Pos Indonesia - Paket Kilat Khusus', 8000, 80000, 83000, 0, '', ''),
(16, '2021-01-03', 9, '234', '09786543', 'swadfgh', 'Bangka Belitung', 'Belitung', 'Pos Indonesia - Paket Kilat Khusus', 8000, 272000, 275000, 0, '', ''),
(17, '2021-01-03', 9, '234', '09786543', 'swadfgh', 'Bangka Belitung', 'Belitung', 'Pos Indonesia - Paket Kilat Khusus', 8000, 272000, 275000, 0, '', ''),
(18, '2021-01-03', 9, 'z', '08976543', 'wergthgjk', 'Kalimantan Barat', 'Singkawang', 'TIKI - REG', 20000, 1080000, 6080000, 0, '', ''),
(19, '2021-01-03', 9, 'sa', '90876543', 'dsfgj', 'Kalimantan Tengah', 'Seruyan', 'Pos Indonesia - Paket Kilat Khusus', 20000, 1160000, 1360000, 0, '', ''),
(20, '2021-01-03', 9, '23546576', '89765324', 'sadfghj', 'Kalimantan Barat', 'Sekadau', 'JNE - REG', 10000, 470000, 20470000, 0, '', ''),
(21, '2021-01-03', 9, 'yjhtgrfed', '98765432', 'ertytjuki', 'Jawa Timur', 'Lumajang', 'JNE - REG', 3000, 60000, 110000, 4, '4732895925', '442445096.jpg'),
(22, '2021-01-03', 9, 'sfdsg', '90876', 'fhffhfhfhf', 'Kalimantan Selatan', 'Tanah Laut', 'Pos Indonesia - Paket Kilat Khusus', 6300, 339500, 529500, 0, '', ''),
(23, '2021-01-04', 9, 'al', '0843857', 'shfksnfsn', 'DKI Jakarta', 'Jakarta Selatan', 'Pos Indonesia - Express Next Day Barang', 3100, 81000, 161000, 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `kategori_id` int NOT NULL,
  `kategori_nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`kategori_id`, `kategori_nama`) VALUES
(1, 'Tidak Berkategori'),
(3, 'Baju'),
(4, 'Celana'),
(5, 'Tas Selempang'),
(6, 'Sepatu'),
(7, 'Celana Pendek'),
(8, 'Jaket'),
(9, 'Aksesoris'),
(10, 'Tes');

-- --------------------------------------------------------

--
-- Table structure for table `kategori2`
--

CREATE TABLE `kategori2` (
  `kategori_id` int NOT NULL,
  `kategori_nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `kategori2`
--

INSERT INTO `kategori2` (`kategori_id`, `kategori_nama`) VALUES
(1, 'Tidak Berkategori'),
(2, 'Kain');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `produk_id` int NOT NULL,
  `produk_nama` varchar(255) NOT NULL,
  `produk_kategori` int NOT NULL,
  `produk_harga` int NOT NULL,
  `produk_keterangan` text NOT NULL,
  `produk_jumlah` int NOT NULL,
  `produk_berat` int NOT NULL,
  `produk_foto1` varchar(255) DEFAULT NULL,
  `produk_foto2` varchar(255) DEFAULT NULL,
  `produk_foto3` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`produk_id`, `produk_nama`, `produk_kategori`, `produk_harga`, `produk_keterangan`, `produk_jumlah`, `produk_berat`, `produk_foto1`, `produk_foto2`, `produk_foto3`) VALUES
(14, 'Batik', 3, 50000, 'sagdjasgd asdgajsd asdsabd asdga dasdad', 0, 3000, NULL, NULL, NULL),
(15, 'AX', 5, 30000, 'dvxcvcxb', 99, 100, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `request_id` int NOT NULL,
  `request_kategori` int NOT NULL,
  `request_customer` int NOT NULL,
  `request_gambar` varchar(255) NOT NULL,
  `request_status` set('Invoice Sudah Diisi','Disetujui','Tidak Disetujui','Tunggu') CHARACTER SET utf8 COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `request_keterangan` text NOT NULL,
  `request_harga` int DEFAULT NULL,
  `request_berat` int DEFAULT NULL,
  `request_jumlah` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`request_id`, `request_kategori`, `request_customer`, `request_gambar`, `request_status`, `request_keterangan`, `request_harga`, `request_berat`, `request_jumlah`) VALUES
(2, 8, 9, 'BqKbEtU4MD.png', 'Invoice Sudah Diisi', 'x', 90000, 9000, 100),
(3, 7, 9, 'iAhBdtcm03.png', 'Invoice Sudah Diisi', 'x', 50000, 200, 100),
(6, 4, 9, 'l7ScuB6qiK.jpg', 'Invoice Sudah Diisi', 'x', 30, 80, 100),
(7, 4, 9, 'sagCGH5YAU.jpg', 'Invoice Sudah Diisi', 'a', 20000, 2000, 10),
(8, 4, 9, 'QDrRBaK4fg.jpg', 'Invoice Sudah Diisi', 'asdsasad', 200000, 100, 100);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `transaksi_id` int NOT NULL,
  `transaksi_invoice` int NOT NULL,
  `transaksi_request` int DEFAULT NULL,
  `transaksi_produk` int DEFAULT NULL,
  `transaksi_jumlah` int NOT NULL,
  `transaksi_harga` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`transaksi_id`, `transaksi_invoice`, `transaksi_request`, `transaksi_produk`, `transaksi_jumlah`, `transaksi_harga`) VALUES
(1, 0, 0, 3, 1, 120000),
(2, 0, 0, 1, 1, 1234),
(3, 0, 0, 3, 1, 120000),
(4, 0, 0, 1, 1, 1234),
(5, 1, 0, 3, 1, 120000),
(6, 1, 0, 1, 1, 1234),
(9, 3, 0, 3, 1, 120000),
(10, 4, 0, 4, 1, 123000),
(11, 5, 0, 7, 2, 240000),
(12, 5, 0, 8, 1, 80000),
(13, 5, 0, 10, 1, 400000),
(14, 6, 0, 10, 1, 400000),
(15, 6, 0, 9, 1, 300500),
(16, 7, 0, 11, 2, 80000),
(17, 7, 0, 12, 1, 120000),
(18, 8, 0, 13, 2, 130000),
(19, 8, 0, 11, 1, 80000),
(20, 9, 0, 14, 1, 50000),
(21, 12, 0, 14, 1, 182000),
(22, 13, NULL, 14, 1, 251000),
(23, 17, 6, NULL, 100, 275000),
(24, 18, 3, NULL, 100, 6080000),
(25, 19, 7, NULL, 10, 200000),
(26, 20, 8, NULL, 100, 20000000),
(27, 21, NULL, 14, 1, 50000),
(28, 22, NULL, 15, 3, 190000),
(29, 22, NULL, 14, 2, 190000),
(30, 23, NULL, 14, 1, 80000),
(31, 23, NULL, 15, 1, 80000);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_bahanbaku`
--

CREATE TABLE `transaksi_bahanbaku` (
  `id` int NOT NULL,
  `kategori_id` int NOT NULL,
  `nama` varchar(255) NOT NULL,
  `suplier` varchar(255) NOT NULL,
  `jumlah` int NOT NULL,
  `harga` int NOT NULL,
  `panjang` int NOT NULL,
  `lebar` int NOT NULL,
  `tanggal_input` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `transaksi_bahanbaku`
--

INSERT INTO `transaksi_bahanbaku` (`id`, `kategori_id`, `nama`, `suplier`, `jumlah`, `harga`, `panjang`, `lebar`, `tanggal_input`) VALUES
(1, 2, 'asdssassa', 'asdassadasd', 2141241, 21321412, 113, 1314, '2021-01-05 19:10:00'),
(2, 1, 'z', 'xx', 131, 2000, 33, 21, '2021-01-05 19:15:51'),
(3, 1, 'z', '131', 1000, 2000, 33, 21, '2021-01-05 19:32:31'),
(4, 2, 'asdssassa', '2141241', 20, 21321412, 113, 1314, '2021-01-05 19:33:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `admingudang`
--
ALTER TABLE `admingudang`
  ADD PRIMARY KEY (`admingudang_id`);

--
-- Indexes for table `bahanbaku`
--
ALTER TABLE `bahanbaku`
  ADD PRIMARY KEY (`bahanbaku_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoice_id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indexes for table `kategori2`
--
ALTER TABLE `kategori2`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`produk_id`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`request_id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`transaksi_id`);

--
-- Indexes for table `transaksi_bahanbaku`
--
ALTER TABLE `transaksi_bahanbaku`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `bahanbaku`
--
ALTER TABLE `bahanbaku`
  MODIFY `bahanbaku_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `invoice_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `kategori_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `kategori2`
--
ALTER TABLE `kategori2`
  MODIFY `kategori_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `produk_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `request_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `transaksi_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `transaksi_bahanbaku`
--
ALTER TABLE `transaksi_bahanbaku`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
