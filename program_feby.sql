-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Bulan Mei 2025 pada 07.30
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `program_feby`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_barang`
--

CREATE TABLE `data_barang` (
  `id` int(11) NOT NULL,
  `kode_barang` varchar(255) NOT NULL,
  `kategori_barang` varchar(255) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `harga_barang` bigint(255) NOT NULL,
  `qty` varchar(255) NOT NULL,
  `isi` varchar(255) DEFAULT NULL,
  `grosir_1` bigint(255) NOT NULL,
  `grosir_2` bigint(255) NOT NULL,
  `grosir_3` bigint(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_barang`
--

INSERT INTO `data_barang` (`id`, `kode_barang`, `kategori_barang`, `nama_barang`, `harga_barang`, `qty`, `isi`, `grosir_1`, `grosir_2`, `grosir_3`, `created_at`, `updated_at`) VALUES
(5, 'LP2025001', 'Lampu', 'PROVI LED 15 WATT', 25000, 'PCS', NULL, 25500, 26000, 26500, '2025-05-06 06:31:54', '2025-05-06 06:31:54'),
(6, 'PL2025001', 'Peralatan Listrik', 'FIT PLAF BROCO 1210/SEGI/PAK', 250000, 'PAK', '24', 251000, 252000, 253000, '2025-05-06 06:33:25', '2025-05-06 06:33:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_pelanggan`
--

CREATE TABLE `data_pelanggan` (
  `id` int(11) NOT NULL,
  `nama_pelanggan` varchar(255) NOT NULL,
  `no_tlp` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_pelanggan`
--

INSERT INTO `data_pelanggan` (`id`, `nama_pelanggan`, `no_tlp`, `alamat`, `created_at`, `updated_at`) VALUES
(4, 'TK. Nana', '083846788549', 'Sedong', '2025-05-06 14:17:01', '2025-05-06 14:17:01'),
(5, 'TK. Abud', '083846788549', 'Kuningan', '2025-05-06 14:17:17', '2025-05-06 14:17:17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `faktur`
--

CREATE TABLE `faktur` (
  `id` int(11) NOT NULL,
  `data_pelanggan_id` int(11) NOT NULL,
  `no_faktur` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `faktur`
--

INSERT INTO `faktur` (`id`, `data_pelanggan_id`, `no_faktur`, `tanggal`, `created_at`, `updated_at`) VALUES
(2, 4, 'FK2025001', '2025-05-06', '2025-05-06 14:17:50', '2025-05-06 14:17:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `invoice`
--

CREATE TABLE `invoice` (
  `id` int(11) NOT NULL,
  `faktur_id` int(11) NOT NULL,
  `data_barang_id` int(11) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `harga_barang` bigint(255) NOT NULL,
  `harga_grosir` bigint(255) NOT NULL,
  `ongkos_toko` bigint(255) DEFAULT NULL,
  `disc` varchar(255) DEFAULT NULL,
  `jumlah` bigint(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `invoice`
--

INSERT INTO `invoice` (`id`, `faktur_id`, `data_barang_id`, `nama_barang`, `harga_barang`, `harga_grosir`, `ongkos_toko`, `disc`, `jumlah`, `created_at`, `updated_at`) VALUES
(2, 2, 6, 'FIT PLAF BROCO 1210/SEGI/PAK', 250000, 252000, 1000, '2', 3, '2025-05-06 15:33:07', '2025-05-07 04:53:25'),
(3, 2, 5, 'PROVI LED 15 WATT', 25000, 25500, 50000, '2', 12, '2025-05-06 15:40:35', '2025-05-07 04:53:52');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_barang`
--
ALTER TABLE `data_barang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_pelanggan`
--
ALTER TABLE `data_pelanggan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `faktur`
--
ALTER TABLE `faktur`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_barang`
--
ALTER TABLE `data_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `data_pelanggan`
--
ALTER TABLE `data_pelanggan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `faktur`
--
ALTER TABLE `faktur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
