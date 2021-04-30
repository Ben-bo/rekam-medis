-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Apr 2021 pada 02.21
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rekam_medis`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokter`
--

CREATE TABLE `dokter` (
  `id_dokter` int(11) NOT NULL,
  `nama_dokter` varchar(50) NOT NULL,
  `spesialis` varchar(50) NOT NULL,
  `jenis_kelamin_dokter` varchar(50) NOT NULL,
  `ttl` varchar(50) NOT NULL,
  `no_hp_dokter` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `foto` varchar(255) NOT NULL,
  `created_at_dokter` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dokter`
--

INSERT INTO `dokter` (`id_dokter`, `nama_dokter`, `spesialis`, `jenis_kelamin_dokter`, `ttl`, `no_hp_dokter`, `email`, `alamat`, `foto`, `created_at_dokter`) VALUES
(1, 'Ahmad Samsudin', 'Umum', 'laki laki', 'Mataram, 09 januari 1987', '083128873447', 'Ahmad@gmail.com', 'jl. setapak no 30 mataram', 'imageedit_4_6778580084.png', '2021-01-09'),
(2, 'Fitri Bin Slamed', 'Bidan', 'perempuan', 'Mataram, 27 Januari 1995', '083287344482', 'ahmad@gmail.com', 'jl. Mana saja , no 32', 'atomix_user31_1.png', '2021-02-10'),
(3, 'Albi Mus Lava', 'Dokter Gigi', 'laki laki', 'Mataram, 27 Januari 1995', '081873649827', 'albi@gmail.com', 'Jl. Serabutan no 35, Mataram', 'default.jpg', '2021-02-24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `obat`
--

CREATE TABLE `obat` (
  `id_obat` int(11) NOT NULL,
  `nama_obat` varchar(50) NOT NULL,
  `jenis_obat` varchar(50) NOT NULL,
  `sediaan` varchar(50) NOT NULL,
  `dosis_anak` varchar(50) NOT NULL,
  `dosis_dewasa` varchar(50) NOT NULL,
  `stok` int(255) NOT NULL,
  `created_at_obat` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `obat`
--

INSERT INTO `obat` (`id_obat`, `nama_obat`, `jenis_obat`, `sediaan`, `dosis_anak`, `dosis_dewasa`, `stok`, `created_at_obat`) VALUES
(2, 'Allopurinol', 'Tablet', '100mg', '10mg/kgbb', '100mg/daily', 141, '2021-01-11'),
(3, 'Captopril', 'Tablet', '12.5mg/25mg', '0.1mg/kgbb', '2.5-5mg/ 8 jam', 200, '2021-01-11'),
(4, 'Ciprofloxacin', 'Tablet', '500mg', '5-10mg/kgbb', '250-500mg/ 12 jam', 236, '2021-02-11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasien`
--

CREATE TABLE `pasien` (
  `id_pasien` int(11) NOT NULL,
  `nama_pasien` varchar(50) NOT NULL,
  `no_ktp` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(50) NOT NULL,
  `agama` varchar(50) NOT NULL,
  `pendidikan_terakhir` varchar(50) NOT NULL,
  `status_perkawinan` varchar(50) NOT NULL,
  `ttl` varchar(50) NOT NULL,
  `pekerjaan` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(50) NOT NULL,
  `kota/kabupaten` varchar(50) NOT NULL,
  `desa/kelurahan` varchar(50) NOT NULL,
  `created_at_pasien` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pasien`
--

INSERT INTO `pasien` (`id_pasien`, `nama_pasien`, `no_ktp`, `jenis_kelamin`, `agama`, `pendidikan_terakhir`, `status_perkawinan`, `ttl`, `pekerjaan`, `alamat`, `no_hp`, `kota/kabupaten`, `desa/kelurahan`, `created_at_pasien`) VALUES
(1, 'Monika Angraeni', '5204873222000233', 'perempuan', 'Islam', 'SMA/SMK/MA', 'Belum Menikah', 'Sumbawa, 5 Agustus 1995', 'Teller Bank', 'jl. Samping no 1', '083128874556', 'Sumbawa', 'Atas', '2021-01-09'),
(3, 'Mener Bin Somad', '5204998846288811', 'laki laki', 'Islam', 'SMA/SMK/MA', 'Belum Menikah', 'Sumbawa Besar, 5 maret 1998', 'Guru', 'jl. Mana saja , no 32', '089876532789', 'Sumbawa', 'Kalimango', '2021-01-13'),
(4, 'Vivid Bin Samsudin', '5204888876550001', 'perempuan', 'Islam', 'S2/Megister', 'Sudah Menikah', 'Sumbawa Besar, 8 januari 1988', 'Animator', 'jl. Buber no 22', '083129839876', 'Sumbawa', 'Alasta', '2021-01-01'),
(5, 'Abdul Somad', '5402911100099888', 'laki laki', 'Islam', 'S1/Sarjana', 'Sudah Menikah', 'Mataram, 09 januari 1987', 'Dokter', 'jl. Ngaret no 45', '083455869988', 'Sumbawa', 'Gelampar', '2021-02-19'),
(6, 'Albert Wula Berian', '5204938477768899', 'perempuan', 'Budha', 'SMA/SMK/MA', 'Belum Menikah', 'Mataram, 27 Januari 1995', 'Manager', 'Jl. Serabutan no 35', '082139846558', 'Mataram', 'Kekalik', '2021-02-23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rekam_medis`
--

CREATE TABLE `rekam_medis` (
  `id` int(11) NOT NULL,
  `no_rekam_medis` varchar(50) NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `keluhan` varchar(50) NOT NULL,
  `anamnese/diagnosa` varchar(50) NOT NULL,
  `id_dokter` int(11) NOT NULL,
  `id_obat` int(11) NOT NULL,
  `created_at_rm` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `rekam_medis`
--

INSERT INTO `rekam_medis` (`id`, `no_rekam_medis`, `id_pasien`, `keluhan`, `anamnese/diagnosa`, `id_dokter`, `id_obat`, `created_at_rm`) VALUES
(19, 'RM523022021001', 1, 'Sakit Pinggang', 'Asam Urat', 2, 2, '2021-02-21'),
(20, 'RM523022021002', 3, 'Panas, pusing', 'Demam', 2, 3, '2021-02-22'),
(21, 'RM523022021003', 1, 'Sesak Nafas', 'Asma', 2, 4, '2021-02-23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_users` int(11) NOT NULL,
  `foto` varchar(200) NOT NULL,
  `nama_users` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `email` varchar(50) NOT NULL,
  `hak_akses` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_users`, `foto`, `nama_users`, `password`, `email`, `hak_akses`, `created_at`) VALUES
(1, 'FB_IMG_foto ijazah-removebg-preview.jpg', 'Beni Iskandar', '$2y$10$ZixKvh0ki.Zg.Nom4mfrfePDXH2Y5ZsLgGeO44JsVMzN6lIReEhqG', 'Beni@gmail.com', 'admin', '2021-01-21 22:57:09'),
(2, 'atomix_user31.png', 'rekam medis', '$2y$10$C6RAcZ0toPELexU0IIg5IufMUFUayuCW0iu92aGYWCyOd8iCRqnXG', 'dennybazooka@gmail.com', 'rekam medis', '2021-01-25 01:49:57'),
(3, 'usericon.png', 'pendaftaran', '$2y$10$outwokK0HoqVprvTJo/.t.yfrMxbtprhpSvPoWGyN0ovDjoB7p4Ta', 'ahmad@gmail.com', 'pendaftaran', '2021-01-25 02:09:19');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id_dokter`);

--
-- Indeks untuk tabel `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id_obat`);

--
-- Indeks untuk tabel `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indeks untuk tabel `rekam_medis`
--
ALTER TABLE `rekam_medis`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `dokter`
--
ALTER TABLE `dokter`
  MODIFY `id_dokter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `obat`
--
ALTER TABLE `obat`
  MODIFY `id_obat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id_pasien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `rekam_medis`
--
ALTER TABLE `rekam_medis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
