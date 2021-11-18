-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Jul 2021 pada 08.31
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rental_mobil`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(4) NOT NULL,
  `nama_admin` varchar(30) DEFAULT NULL,
  `username` varchar(15) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `username`, `password`) VALUES
(2, 'user', 'user', 'user'),
(12, 'admin', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id_detail` int(11) NOT NULL,
  `id_transaksi` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id_detail`, `id_transaksi`) VALUES
(25, 18),
(30, 23);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mobil`
--

CREATE TABLE `mobil` (
  `no_mobil` varchar(10) NOT NULL,
  `merk` varchar(20) DEFAULT NULL,
  `nama_mobil` varchar(30) DEFAULT NULL,
  `deskripsi` varchar(200) DEFAULT NULL,
  `gambar` varchar(100) DEFAULT NULL,
  `harga` int(7) DEFAULT NULL,
  `status` enum('0','1') DEFAULT NULL,
  `id_pemilik` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mobil`
--

INSERT INTO `mobil` (`no_mobil`, `merk`, `nama_mobil`, `deskripsi`, `gambar`, `harga`, `status`, `id_pemilik`) VALUES
('DK 0101 KL', 'Toyota', 'Vios', 'Jumlah Penumpang Maksimal 6 Orang', 'mobil1.jpg', 370000, '1', 1),
('DK 1212 CD', 'Suzuki', 'Ertiga', 'Max Penumpang 6 Orang, Warna Putih', 'mobil7.jpg', 300000, '1', 2),
('DK 2343 LS', 'Daihatsu', 'Sigra', 'Jumlah Penumpang Maksimal 6 Orang', 'mobil4.jpg', 320000, '1', 3),
('DK 3454 LS', 'Toyota', 'Calya', 'Jumlah Penumpang Maksimal 6 Orang', 'mobil3.jpg', 300000, '1', 1),
('DK 4343 LS', 'Honda', 'Brio', 'Jumlah Penumpang Maksimal 6 Orang', 'mobil2.jpg', 320000, '1', 2),
('DK 5555 KW', 'Toyota', 'Avanza Veloz', 'Max Penumpang 6 Orang', 'mobil5.jpg', 600000, '1', 1),
('DK 8888 KL', 'Mitsubishi', 'Xpander', 'Penumpang Maksimal 6 Orang, AC Bagus', 'mobil6.jpg', 600000, '1', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `no_ktp` varchar(20) NOT NULL,
  `nama` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `no_telp` varchar(15) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `username` varchar(10) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`no_ktp`, `nama`, `email`, `no_telp`, `alamat`, `username`, `password`) VALUES
('234567654', 'Brembo', 'Brembo@gmail.com', '0752353545', 'gorontaloo', 'brembo', 'brembo'),
('45434242', 'sony', 'sonyadip190301@gmail.com', '453324243', 'gianyar', 'sony', 'sony'),
('5432535343324', 'Asep', 'asep@gmail.com', '0985445455', 'Banyuwangi', 'asep', 'asep'),
('5467867675846', 'Tenkle', 'tenkle@gmail.com', '089669696969', 'gorontalo', 'tenkle', 'tenkle');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemilik_mobil`
--

CREATE TABLE `pemilik_mobil` (
  `id_pemilik` int(10) NOT NULL,
  `no_ktp_pemilik` varchar(16) DEFAULT NULL,
  `nama_pemilik` varchar(30) DEFAULT NULL,
  `email_pemilik` varchar(30) DEFAULT NULL,
  `no_telp_pemilik` varchar(15) DEFAULT NULL,
  `alamat_pemilik` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pemilik_mobil`
--

INSERT INTO `pemilik_mobil` (`id_pemilik`, `no_ktp_pemilik`, `nama_pemilik`, `email_pemilik`, `no_telp_pemilik`, `alamat_pemilik`) VALUES
(1, '5867645347', 'asep', 'asep@gmail.com', '0882325434', 'Banyuwangi'),
(2, '76435242434', 'udin saripudin', 'asep@gmail.com', '452334244511', 'jalan cinta'),
(3, '653423423', 'asep sukasep', 'asep@gmail.com', '3232', 'jalan cinta');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `no_ktp` varchar(16) DEFAULT NULL,
  `no_mobil` varchar(10) DEFAULT NULL,
  `tgl_sewa` date DEFAULT NULL,
  `lama` int(5) DEFAULT NULL,
  `status` enum('0','1') DEFAULT NULL,
  `bukti` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `no_ktp`, `no_mobil`, `tgl_sewa`, `lama`, `status`, `bukti`) VALUES
(18, '5467867675846', 'DK 0101 KL', '2021-07-23', 2, '0', 'Capture.PNG'),
(23, '45434242', 'DK 1212 CD', '2021-07-27', 3, '0', 'Bukti Pembayaran.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `fk_detail_transaksi` (`id_transaksi`);

--
-- Indeks untuk tabel `mobil`
--
ALTER TABLE `mobil`
  ADD PRIMARY KEY (`no_mobil`),
  ADD KEY `fk_id_pemilik` (`id_pemilik`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`no_ktp`);

--
-- Indeks untuk tabel `pemilik_mobil`
--
ALTER TABLE `pemilik_mobil`
  ADD PRIMARY KEY (`id_pemilik`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `fk_no_ktp` (`no_ktp`),
  ADD KEY `fk_no_mobil` (`no_mobil`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD CONSTRAINT `fk_detail_transaksi` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`);

--
-- Ketidakleluasaan untuk tabel `mobil`
--
ALTER TABLE `mobil`
  ADD CONSTRAINT `fk_id_pemilik` FOREIGN KEY (`id_pemilik`) REFERENCES `pemilik_mobil` (`id_pemilik`);

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `fk_no_ktp` FOREIGN KEY (`no_ktp`) REFERENCES `pelanggan` (`no_ktp`),
  ADD CONSTRAINT `fk_no_mobil` FOREIGN KEY (`no_mobil`) REFERENCES `mobil` (`no_mobil`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
