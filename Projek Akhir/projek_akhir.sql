-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2022 at 12:05 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projek_akhir`
--

-- --------------------------------------------------------

--
-- Table structure for table `admn`
--

CREATE TABLE `admn` (
  `id` int(11) NOT NULL,
  `useradmin` varchar(25) NOT NULL,
  `sandiadmin` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admn`
--

INSERT INTO `admn` (`id`, `useradmin`, `sandiadmin`) VALUES
(1, 'ADMIN', '3c1');

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `katasandi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id`, `email`, `username`, `katasandi`) VALUES
(2, 'athief@gmail.com', 'athief', '$2y$10$ZdKGrlnKg7HPAiMe55GE1uhMnIXfmkYpFd9YMUWzMf/qq5wYTFVTC');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `id_req` int(11) NOT NULL,
  `nama_makanan` varchar(50) NOT NULL,
  `asal_makanan` varchar(255) NOT NULL,
  `bahan_utama` varchar(50) NOT NULL,
  `gambar` varchar(50) DEFAULT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`id_req`, `nama_makanan`, `asal_makanan`, `bahan_utama`, `gambar`, `keterangan`) VALUES
(11, 'Ikan Bakar', 'Indonesia', 'Ikan', 'Ikan Bakar.jpg', '12-11-2022'),
(13, 'Ayam Betutu', 'Bali', 'Ayam', 'Ayam Betutu.jpg', '13-11-2022'),
(14, 'Soto Banjar', 'Banjarmasin', 'Daging', 'Soto Banjar.jpg', '13-11-2022');

-- --------------------------------------------------------

--
-- Table structure for table `resep`
--

CREATE TABLE `resep` (
  `id_resep` int(11) NOT NULL,
  `nama_resep` varchar(50) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `bahan_resep` longtext NOT NULL,
  `bumbu_halus` longtext NOT NULL,
  `cara_buat` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `resep`
--

INSERT INTO `resep` (`id_resep`, `nama_resep`, `kategori`, `bahan_resep`, `bumbu_halus`, `cara_buat`) VALUES
(1, 'Ayam Betutu Bali', 'Ayam', '- 1 ekor ayam \r\n- 2 buah jeruk nipis, ambil airnya \'\\n\'\r\n- 50 g daun belimbing wuluh, rebus, cincang kasar \r\n- 2 sdt garam\r\n- 2 batang serai, ambil bagian putih, memarkan\r\n- 30 g gula Jawa, sisir\r\n- 3 lembar daun jeruk\r\n- 2 lembar daun pisang\r\n- Minyak goreng untuk menumis', '- 12 butir bawang merah\r\n- 7 siung bawang putih\r\n- 12 buah cabai merah keriting\r\n- 1 sdt merica butiran\r\n- 2 cm kunyit bakar\r\n- 2 cm kencur\r\n- 2 cm jahe, parut\r\n- 2 cm lengkuas, parut\r\n- 2 sdt terasi bakar\r\n- 1 sdt ketumbar\r\n- 1 sdm garam', '1. Cuci bersih ayam. Jika tidak suka leher, kepala dan cekernya bisa disisihkan.\r\n2. Lumuri ayam utuh dengan air jeruk nipis dan garam. \r\n3. Biarkan lebih kurang 30 menit.\r\n4. Panaskan 4 sdm minyak, tumis bumbu halus, serai dan irisan gula merah hingga harum. Angkat dan sisihkan.\r\n5. Bagi bumbu yang sudah matang menjadi 2 bagian.\r\n6. Campur satu bagian bumbu matang dengan duan belimbing sayur dan daun jeruk.\r\n7. Satu bagian bumbu sisanya lumurkan ke seluruh badan ayam.\r\n8. Tusuk-tusuk dengan garpu serta remas-remas agar bumbu meyerap ke bagian daging ayam.\r\n9. Masukkan daun belimbing berbumbu ke dalam perut ayam hingga padat. Lipast sayapnya ke arah belakang.\r\n10. Bungkus dengan daun pisang dan kukus selama 1 ½ jam, angkat lalu dinginkan.\r\n11. Panggang ayam kukus tadi di dalam oven panas hingga daun pembungkus ayam berwarna kecokelatan.\r\nAngkat, buka bungkusannya. Sajikan selagi hangat.'),
(2, 'Rawon', 'Daging', '- 1/2 kg Daging sapi\r\n- 5 sdm Tauge pendek, seduh air panas \r\n- 2 lembar Daun salam \r\n- 3 lembar Daun jeruk \r\n- 2 batang Serai \r\n- 2 cm Lengkuas, memarkan \r\n- 2 sdt Garam \r\n- 1 sdtGula merah \r\n- 1 sdt Kaldu sapi bubuk \r\n- 2 sdmMinyak goreng \r\n- 2 liter Air ', '- 7 siung Bawang merah \r\n- 5 siung Bawang putih \r\n- 1/2 sdt Merica \r\n- 1/4 sdt Ketumbar \r\n- 2 cm Kunyit \r\n- 2 cm Jahe \r\n- 2 butirKemiri, sangrai\r\n- 5 butir Kluwek ', '1. Masak air sampai mendidih, masukkan daging sapi, rebus sampai berubah warna.\r\n2. Buang busa kotoran yang mengapung. Lanjutkan merebus sampai daging empuk.\r\n3. Buang kulit kluwek, ambil dagingnya dan rendam air panas sampai lembut. Haluskan bersama bumbu halus. Lalu tumis bumbu halus sampai harum.\r\n4. Masukkan daun salam, serai, daun jeruk, lengkuas, aduk sebentar. \r\n5. Masukkan tumisan bumbu ke dalam rebusan daging. \r\n6. Bumbui dengan garam, kaldu sapi bubuk, dan gula merah, aduk rata kemudian koreksi rasa.\r\n7. Angkat dan potong-potong daging.\r\n8. Masukkan kembali ke air rebusan. Masak lagi sebentar.\r\n9. Angkat, sajikan dengan telur asin, tauge, taburan daun bawang, bawang merah goreng, sambal dan perasan jeruk nipis.'),
(3, 'Ikan Bakar', 'Ikan', '- 500 gram ikan jenis apa saja (kira-kira 3 ekor)\r\n- 4 sendok makan kecap manis\r\n- 1 buah jeruk nipis\r\n- 1 sendok makan air asam Jawa kental\r\n- 1 sendok makan minyak goreng', '- 5 butir bawang merah\r\n- 3 siung bawang putih\r\n- 2 cm jahe\r\n- 1 buah cabai merah besar\r\n- 1/2 sendok teh ketumbar sangrai\r\n- garam secukupnya', '1. Bersihkan insang dan isi perut ikan, kemudian bersihkan sisiknya agar bumbu mudah meresap.\r\n2. Rendam ikan dengan jeruk nipis dan diamkan selama 15 menit, kemudian bilas lagi.\r\n3. Panaskan minyak goreng, tumis bumbu halus sampai harum, kemudian campur dengan air asam dan kecap manis.\r\n4. Panaskan panggangan, bakar ikan sambil dioles bumbu sampai matang.'),
(4, 'Gado-gado', 'Sayur', '- 100 gram tahu (potong dan goreng) \r\n- 1 ikat kacang panjang (iris dan rebus) \r\n- 1 buah mentimun \r\n- 200 gram kol (iris dan rebus) \r\n- 50 gram taoge \r\n- 1 buah labu siam (iris dan rebus) \r\n- 1 lembar daun jeruk purut \r\n- 1 buah tomat \r\n- 1 batang tempe goreng \r\n- 2 butir telur ayam (rebus) \r\n- Kerupuk secukupnya ', '- 3 sendok makan kacang tanah \r\n- 1 siung bawang putih \r\n- larutan asam jawa secukupnya \r\n- Gula merah secukupnya \r\n- Kecap manis secukupnya \r\n- 1 lembar daun jeruk purut', '1. Goreng kacang tanah di dalam wajan menggunakan api sedang hingga matang, lalu angkat dan tiriskan. \r\n2. Haluskan tiga sendok makan kacang tanah, satu siung bawang putih, satu lembar daun jeruk purut, dan gula merah secukupnya. Setelah itu campur dengan larutan asam jawa dan kecap manis. \r\n3. Setelah semua bahan bumbu kacang halus, taruh di dalam mangkuk dan sisihkan untuk siraman gado-gado. \r\n4. Siapkan piring saji lalu masukkan tahu goreng, telur, kacang panjang, mentimun, kol, taoge, labu siam, tempe goreng, dan tomat. Setelah itu siram isian gado-gado dengan bumbu kacang yang sudah dicampur air panas.  \r\n5. Sajikan gado-gado betawi dengan tambahan bawang goreng dan kerupuk supaya lebih nikmat.'),
(5, 'Kepiting Lada Hitam', 'Seafood', '- 2 ekor kepiting telur \r\n- 2 cm jahe, memarkan \r\n- 1 buah bawang bombai, iris \r\n- 5 siung bawang putih, memarkan \r\n- 2 sdm minyak goreng \r\n- 1 sdm minyak wijen \r\n- 5 sdm saus tiram \r\n- 1 sdm kecap asin pekat \r\n- 2 sdm madu \r\n- 3 sdm saus sambal botolan \r\n- 2 butir telur, kocok\r\n- Minyak goreng secukupnya', 'Tidak Ada', '1. Potong kepiting menjadi empat bagian. Cuci bersih dan tiriskan. \r\n2. Panaskan minyak. Goreng kepiting sampai berubah warna. Angkat. \r\n3. Panaskan 2 sendok makan minyak sisa menggoreng kepiting. Campur dengan minyak wijen. Tumis bawang bombai dan bawang putih sampai layu. \r\n4. Masukkan saus tiram, kecap asin, madu, dan saus sambal. Aduk rata. Masukkan kepiting, aduk lagi sampai rata. Kentalkan saus dengan telur kocok. Campur kembali. \r\n5. Tambahkan lada hitam dan daun bawang. Aduk rata. Angkat. Sajikan kepiting lada hitam di atas piring saji.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admn`
--
ALTER TABLE `admn`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`id_req`);

--
-- Indexes for table `resep`
--
ALTER TABLE `resep`
  ADD PRIMARY KEY (`id_resep`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admn`
--
ALTER TABLE `admn`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `id_req` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `resep`
--
ALTER TABLE `resep`
  MODIFY `id_resep` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
