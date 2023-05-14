-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2023 at 12:09 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `jenis_produk`
--

CREATE TABLE `jenis_produk` (
  `id` int(11) NOT NULL,
  `nama` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jenis_produk`
--

INSERT INTO `jenis_produk` (`id`, `nama`) VALUES
(1, 'Kitchen'),
(2, 'Bath Room'),
(3, 'Living Room'),
(4, 'Patio'),
(5, 'Bedroom');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id` int(11) NOT NULL,
  `nama_produk` varchar(45) NOT NULL,
  `qty` int(11) NOT NULL DEFAULT 1,
  `tanggal` date NOT NULL,
  `total_harga` double NOT NULL,
  `nama_pemesan` varchar(45) NOT NULL,
  `alamat_pemesan` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id`, `nama_produk`, `qty`, `tanggal`, `total_harga`, `nama_pemesan`, `alamat_pemesan`) VALUES
(1, 'Kasur busa', 1, '2023-04-29', 750000, 'Aila', 'Tanggerang'),
(2, 'Sabun mandi', 1, '2023-04-29', 15000, 'Milaa', 'jakarta'),
(3, 'Lampu meja', 1, '2023-04-29', 250000, 'Salma', 'Tanggerang');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `kode` varchar(45) DEFAULT NULL,
  `nama` varchar(45) NOT NULL,
  `harga` double NOT NULL,
  `stok` int(11) NOT NULL,
  `jenis_produk` varchar(45) NOT NULL,
  `desk` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `kode`, `nama`, `harga`, `stok`, `jenis_produk`, `desk`) VALUES
(1, 'P001', 'Panci', 150000, 10, 'Kitchen', 'Panci ukuran sedang dengan tutup kaca yang cocok untuk memasak berbagai jenis makanan.'),
(2, 'P002', 'Wajan', 175000, 15, 'Kitchen', 'Wajan anti lengket dengan ukuran sedang yang cocok untuk membuat tumisan atau masakan lainnya.'),
(3, 'P003', 'Gelas', 25000, 50, 'Kitchen', 'Gelas berkapasitas 300 ml yang terbuat dari bahan kaca berkualitas tinggi dan aman untuk digunakan.'),
(4, 'P004', 'Mangkuk', 30000, 30, 'Kitchen', 'Mangkuk berdiameter 15 cm dengan bentuk yang elegan dan cocok untuk menyajikan berbagai hidangan.'),
(5, 'P005', 'Sendok', 10000, 100, 'Kitchen', 'Sendok makan stainless steel yang awet dan mudah digunakan untuk menyantap berbagai hidangan.'),
(6, 'P006', 'Sikat toilet', 20000, 20, 'Bath Room', 'Sikat toilet dengan gagang yang kokoh dan bulu sikat yang lembut untuk membersihkan kamar mandi.'),
(7, 'P007', 'Handuk', 50000, 40, 'Bath Room', 'Handuk berukuran sedang dengan bahan yang lembut dan cepat menyerap air.'),
(8, 'P008', 'Sabun mandi', 15000, 60, 'Bath Room', 'Sabun mandi dengan aroma yang segar dan ampuh membersihkan kulit.'),
(9, 'P009', 'Meja tamu', 750000, 5, 'Living Room', 'Meja tamu dengan desain minimalis yang elegan dan kokoh.'),
(10, 'P010', 'Sofa', 1500000, 3, 'Living Room', 'Sofa yang empuk dan nyaman dengan bahan kulit asli yang awet.'),
(11, 'P011', 'Tanaman hias', 50000, 20, 'Patio', 'Tanaman hias dengan daun yang hijau dan segar untuk mempercantik taman atau halaman.'),
(12, 'P012', 'Kursi taman', 200000, 10, 'Patio', 'Kursi taman yang ringan dan kokoh dengan bahan yang tahan cuaca.'),
(13, 'P013', 'Kasur', 1000000, 2, 'Bedroom', 'Kasur dengan ukuran king size yang nyaman dan awet.'),
(14, 'P014', 'Bantal', 50000, 30, 'Bedroom', 'Bantal empuk dan nyaman dengan bahan yang lembut untuk tidur yang nyenyak.'),
(15, 'P015', 'Selimut', 200000, 15, 'Bedroom', 'Selimut dengan bahan yang lembut dan hangat untuk menghangatkan tubuh saat tidur di malam hari.'),
(16, 'P016', 'Lampu meja', 250000, 8, 'Living Room', 'Lampu meja dengan desain modern yang cocok untuk menerangi ruangan tamu.'),
(17, 'P017', 'Karpet', 500000, 3, 'Living Room', 'Karpet berukuran besar dengan motif yang elegan untuk memberikan kesan mewah pada ruangan tamu.'),
(18, 'P018', 'Kursi santai', 750000, 5, 'Living Room', 'Kursi santai yang nyaman dengan sandaran dan bantalan empuk untuk bersantai di ruangan tamu.'),
(19, 'P019', 'Gantungan bunga', 75000, 15, 'Patio', 'Gantungan bunga dengan bahan logam yang kuat dan kokoh untuk menampilkan tanaman hias di teras atau halaman.'),
(20, 'P020', 'Meja outdoor', 1500000, 2, 'Patio', 'Meja outdoor yang tahan cuaca dan kokoh dengan desain modern.'),
(21, 'P021', 'Payung', 500000, 10, 'Patio', 'Payung besar dengan bahan yang tahan air untuk melindungi dari sinar matahari dan hujan.'),
(22, 'P022', 'Lemari pakaian', 3000000, 3, 'Bedroom', 'Lemari pakaian dengan banyak rak dan gantungan untuk menyimpan pakaian dan aksesori.'),
(23, 'P023', 'Kasur busa', 750000, 8, 'Bedroom', 'Kasur busa dengan kelembutan dan kenyamanan yang baik untuk tidur yang nyenyak.'),
(24, 'P024', 'Lemari buku', 1250000, 5, 'Bedroom', 'Lemari buku dengan desain modern dan banyak rak untuk menyimpan buku atau barang lainnya.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jenis_produk`
--
ALTER TABLE `jenis_produk`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jenis_produk`
--
ALTER TABLE `jenis_produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
