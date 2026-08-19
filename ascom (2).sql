-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 19, 2026 at 08:41 AM
-- Server version: 8.0.30
-- PHP Version: 8.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ascom`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_pesanan`
--

CREATE TABLE `detail_pesanan` (
  `id` int NOT NULL,
  `pesanan_id` int NOT NULL,
  `produk_id` int NOT NULL,
  `jumlah` int NOT NULL,
  `harga_satuan` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `detail_pesanan`
--

INSERT INTO `detail_pesanan` (`id`, `pesanan_id`, `produk_id`, `jumlah`, `harga_satuan`) VALUES
(24, 23, 11, 1, 1000),
(25, 24, 11, 1, 1000),
(26, 24, 12, 1, 1500),
(27, 25, 12, 6, 1500);

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `total_harga` int NOT NULL,
  `status` enum('pending','done') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `tanggal_dibuat` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id`, `user_id`, `total_harga`, `status`, `tanggal_dibuat`) VALUES
(23, 13, 1000, 'done', '2026-08-19 06:25:10'),
(24, 13, 2500, 'done', '2026-08-19 06:28:06'),
(25, 13, 9000, 'done', '2026-08-18 06:38:42');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `deskripsi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `kategori` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `harga` int NOT NULL,
  `stok` int NOT NULL,
  `path_gambar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `nama_produk`, `deskripsi`, `kategori`, `harga`, `stok`, `path_gambar`) VALUES
(11, 'pensil', 'desk', 'alat_tulis', 1000, 93, 'assets/img/img_produk/315c02b52af4a687beb132995352b9ac.jpg'),
(12, 'pulpen', 'deskripsi', 'alat_tulis', 1500, 10, 'assets/img/img_produk/77deddd8b3f6603e1119119fd6e53d00.jpg'),
(13, 'gunting', 'memotong', 'alat_potong', 5000, 36, 'assets/img/img_produk/047f5b65c310de79a9957d74df24b217.jpg'),
(14, 'double tape', 'Double tape adalah pita perekat khusus yang dirancang dengan lapisan lem di kedua permukaannya, baik sisi atas maupun sisi bawah. Berbeda dengan isolasi biasa yang hanya merekatkan satu sisi objek ke media lain, double tape berfungsi sebagai penyambung tersembunyi yang menjepit dua material secara bersamaan dari bagian dalam, sehingga hasil rekatannya terlihat rapi tanpa ada isolasi yang tampak dari luar.Secara struktural, pita perekat ini terdiri dari sebuah lapisan pembawa (carrier) di bagian tengah—seperti kertas, plastik film, kain, atau busa—yang dilapisi lem perekat di kedua sisinya. Untuk mencegah kedua sisi lem saling menempel saat digulung, salah satu permukaannya dilindungi oleh lapisan kertas atau plastik pelindung (liner) yang harus dikelupas terlebih dahulu sebelum digunakan.', 'alat_perekat', 10000, 28, 'assets/img/img_produk/8ff9ee99aa51ed95eeebea06c7a21527.jpg'),
(15, 'buku tulis', 'buku tulis campus yang besar', 'buku', 50000, 50, 'assets/img/img_produk/c6a1ae5ab97781005120c9cfd7c91fcb.webp');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `role` enum('user','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`) VALUES
(11, 'admin', 'admin@gmail.com', '$2y$12$4cFRpfjg3Zi58/gQJk7vUe0ifisl29eEX.HT2w693h1nDg2M1HLge', 'admin'),
(13, 'Zz', 'ziddanm45@gmail.com', '$2y$12$0SYp.zAzqQLJTbi8z.0MMuJAM9i3PQvlNvY4chalIQUOQLEfpS3Ou', 'user'),
(14, 'diz', 'ziddanm45@gmail.com', '$2y$12$iP7UhMNjfd9nrypIIrmTo.hRIN9HQ7Mkirk2lrLN2qeLMwLSvgf/e', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pesanan_id` (`pesanan_id`),
  ADD KEY `produk_id` (`produk_id`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  ADD CONSTRAINT `pesanan_id` FOREIGN KEY (`pesanan_id`) REFERENCES `pesanan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `produk_id` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
