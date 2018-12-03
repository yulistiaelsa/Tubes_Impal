-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Des 2018 pada 13.23
-- Versi server: 10.1.36-MariaDB
-- Versi PHP: 7.1.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `resto`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `kode_menu` varchar(5) NOT NULL,
  `nama_menu` varchar(20) NOT NULL,
  `desk_menu` varchar(100) NOT NULL,
  `gambar_menu` varchar(20) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id`, `kode_menu`, `nama_menu`, `desk_menu`, `gambar_menu`, `jumlah`, `harga`) VALUES
(1, 'ayam1', 'Ayam Geprek', 'Ayam yang digoreng garing lalu digeprek menggunakan sambal extra pedas yang baru dibuat', '1.jpg', 0, 15000),
(2, 'ayam2', 'Ayam Bakar', 'Ayam yang sudah dibumbui dengan bumbu pilihan lalu dibakar dilumuri saus kecap', '2.jpg', -1, 20000),
(3, 'ayam3', 'Ayam Serundeng', 'Ayam yang digoreng garing bersamaan dengan campuran kelapa parut yang telah dibumbui dan digoreng', '4.jpg', -1, 20000),
(4, 'mi1', 'Mie Ayam', 'Mie rebus topping ayam', '5.jpg', 28, 12000),
(5, 'mi2', 'Mie Bakso', 'Mie yang disajukan bersamaan dengan bakso, dan sayuran lain', '6.jpg', 28, 15000),
(6, 'mi3', 'Mie Ayam Yamin', 'mie yang direbus lalu diberi bumbu khas mie ayam dan tanpa kuah', '7.jpg', 28, 12000),
(7, 'chic1', 'Kentang Goreng', 'Kentang yang digoreng garing dan dengan sedikit diberi bumbu yang gurih', '10.jpg', 49, 10000),
(8, 'chic2', 'Chicken Bites', 'daging ayam yang sudah dicincang lalu diberikan tepung dan digoreng kering', '11.jpg', 29, 12000),
(9, 'chic3', 'Chicken Nugget', 'daging ayam yang sudah dihancurkan lalu dibalut dengan tepung dan digoreng dengan kering', '12.jpg', 30, 12000),
(10, 'es1', 'Es Teh Manis', 'air teh yang dikasih es batu dan diminum disaat siang hari sangat menyegarkan', '25.jpg', 100, 5000),
(11, 'es2', 'Sop Buah', 'buah yang sudah dipotong kecil lalu diberikan serutan es yang banyak dan diberikan sirup dan susu ke', '21.jpg', 50, 12000),
(12, 'es3', 'Es Cream (Coklat)', 'dari susu coklat yang di dinginkan hingga menjadi es cream', '17.jpg', 48, 9000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan`
--

CREATE TABLE `pesanan` (
  `idP` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `kode_login` int(11) NOT NULL,
  `nama_menu` varchar(20) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `email` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `kode_login` int(11) NOT NULL,
  `nama` varchar(5) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`kode_login`, `nama`, `email`, `password`) VALUES
(1, 'Meja1', 'cafeku1@gmail.com', 'meja1'),
(2, 'Meja2', 'cafeku2@gmail.com', 'meja2'),
(3, 'Meja3', 'cafeku3@gmail.com', 'meja3'),
(4, 'Meja4', 'cafeku4@gmail.com', 'meja4'),
(5, 'Meja5', 'cafeku5@gmail.com', 'meja5');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`idP`),
  ADD KEY `menu` (`id`),
  ADD KEY `user` (`kode_login`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`kode_login`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `menu` FOREIGN KEY (`id`) REFERENCES `menu` (`id`),
  ADD CONSTRAINT `user` FOREIGN KEY (`kode_login`) REFERENCES `user` (`kode_login`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
