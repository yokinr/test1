-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2022 at 06:42 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sisfo`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota_rombel`
--

CREATE TABLE `anggota_rombel` (
  `id` int(11) NOT NULL,
  `rombongan_belajar_id` varchar(255) NOT NULL,
  `anggota_rombel_id` varchar(255) DEFAULT NULL,
  `peserta_didik_id` varchar(255) DEFAULT NULL,
  `jenis_pendaftaran_id` varchar(255) DEFAULT NULL,
  `jenis_pendaftaran_id_str` varchar(255) DEFAULT NULL,
  `semester_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `getgtk`
--

CREATE TABLE `getgtk` (
  `id` int(11) NOT NULL,
  `tahun_ajaran_id` varchar(255) DEFAULT NULL,
  `ptk_terdaftar_id` varchar(255) DEFAULT NULL,
  `ptk_id` varchar(255) DEFAULT NULL,
  `ptk_induk` varchar(255) DEFAULT NULL,
  `tanggal_surat_tugas` varchar(255) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `jenis_kelamin` varchar(255) DEFAULT NULL,
  `tempat_lahir` varchar(255) DEFAULT NULL,
  `tanggal_lahir` varchar(255) DEFAULT NULL,
  `agama_id` varchar(255) DEFAULT NULL,
  `agama_id_str` varchar(255) DEFAULT NULL,
  `nuptk` varchar(255) DEFAULT NULL,
  `nik` varchar(255) DEFAULT NULL,
  `jenis_ptk_id` varchar(255) DEFAULT NULL,
  `jenis_ptk_id_str` varchar(255) DEFAULT NULL,
  `status_kepegawaian_id` varchar(255) DEFAULT NULL,
  `status_kepegawaian_id_str` varchar(255) DEFAULT NULL,
  `nip` varchar(255) DEFAULT NULL,
  `pendidikan_terakhir` varchar(255) DEFAULT NULL,
  `bidang_studi_terakhir` varchar(255) DEFAULT NULL,
  `pangkat_golongan_terakhir` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `getpengguna`
--

CREATE TABLE `getpengguna` (
  `id` int(11) NOT NULL,
  `pengguna_id` varchar(255) NOT NULL,
  `sekolah_id` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `peran_id_str` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `no_telepon` varchar(255) DEFAULT NULL,
  `no_hp` varchar(255) DEFAULT NULL,
  `ptk_id` varchar(255) DEFAULT NULL,
  `peserta_didik_id` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `getpesertadidik`
--

CREATE TABLE `getpesertadidik` (
  `id` int(11) NOT NULL,
  `registrasi_id` text,
  `jenis_pendaftaran_id` text,
  `jenis_pendaftaran_id_str` text,
  `nipd` text,
  `tanggal_masuk_sekolah` text,
  `sekolah_asal` text,
  `peserta_didik_id` text,
  `nama` text,
  `nisn` text,
  `jenis_kelamin` text,
  `nik` text,
  `tempat_lahir` text,
  `tanggal_lahir` text,
  `agama_id` text,
  `agama_id_str` text,
  `alamat_jalan` text,
  `nomor_telepon_rumah` text,
  `nomor_telepon_seluler` text,
  `nama_ayah` text,
  `pekerjaan_ayah_id` text,
  `pekerjaan_ayah_id_str` text,
  `nama_ibu` text,
  `pekerjaan_ibu_id` text,
  `pekerjaan_ibu_id_str` text,
  `nama_wali` text,
  `pekerjaan_wali_id` text,
  `pekerjaan_wali_id_str` text,
  `tinggi_badan` text,
  `berat_badan` text,
  `semester_id` text,
  `email` text,
  `anggota_rombel_id` text,
  `rombongan_belajar_id` text,
  `tingkat_pendidikan_id` text,
  `nama_rombel` text,
  `kurikulum_id` text,
  `kurikulum_id_str` text,
  `anak_keberapa` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `Alamat` text NOT NULL,
  `Dusun` text NOT NULL,
  `RW` text NOT NULL,
  `RT` text NOT NULL,
  `Kelurahan` text NOT NULL,
  `Kecamatan` text NOT NULL,
  `Kode_Pos` text NOT NULL,
  `Jenis_Tinggal` text NOT NULL,
  `Alat_Transportasi` text NOT NULL,
  `SKHUN` text NOT NULL,
  `Penerima_KPS` text NOT NULL,
  `No_KPS` text NOT NULL,
  `Tahun_Lahir_Ayah` text NOT NULL,
  `Jenjang_Pendidikan_Ayah` text NOT NULL,
  `Penghasilan_Ayah` text NOT NULL,
  `NIK_Ayah` text NOT NULL,
  `Tahun_Lahir_Ibu` text NOT NULL,
  `Jenjang_Pendidikan_Ibu` text NOT NULL,
  `Penghasilan_Ibu` text NOT NULL,
  `NIK_Ibu` text NOT NULL,
  `Tahun_Lahir_Wali` text NOT NULL,
  `Jenjang_Pendidikan_Wali` text NOT NULL,
  `Penghasilan_Wali` text NOT NULL,
  `NIK_Wali` text NOT NULL,
  `No_Peserta_Ujian_Nasional` text NOT NULL,
  `No_Seri_Ijazah` text NOT NULL,
  `Penerima_KIP` text NOT NULL,
  `Nomor_KIP` text NOT NULL,
  `Nama_di_KIP` text NOT NULL,
  `Nomor_KKS` text NOT NULL,
  `No_Registrasi_Akta_Lahir` text NOT NULL,
  `Bank` text NOT NULL,
  `Nomor_Rekening_Bank` text NOT NULL,
  `Rekening_Atas_Nama` text NOT NULL,
  `Layak_PIP_usulan_dari_sekolah` text NOT NULL,
  `Alasan_Layak_PIP` text NOT NULL,
  `Kebutuhan_Khusus` text NOT NULL,
  `lintang` text NOT NULL,
  `bujur` text NOT NULL,
  `no_kk` text NOT NULL,
  `lingkar_kepala` text NOT NULL,
  `jml_saudara` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `getrombonganbelajar`
--

CREATE TABLE `getrombonganbelajar` (
  `id` int(11) NOT NULL,
  `rombongan_belajar_id` varchar(255) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `tingkat_pendidikan_id` varchar(255) DEFAULT NULL,
  `semester_id` varchar(255) DEFAULT NULL,
  `jenis_rombel` varchar(255) DEFAULT NULL,
  `kurikulum_id` varchar(255) DEFAULT NULL,
  `kurikulum_id_str` varchar(255) DEFAULT NULL,
  `id_ruang` varchar(255) DEFAULT NULL,
  `id_ruang_str` varchar(255) DEFAULT NULL,
  `moving_class` varchar(255) DEFAULT NULL,
  `ptk_id` varchar(255) DEFAULT NULL,
  `ptk_id_str` varchar(255) DEFAULT NULL,
  `jenis_rombel_str` varchar(255) DEFAULT NULL,
  `jurusan_id` varchar(255) DEFAULT NULL,
  `jurusan_id_str` varchar(255) DEFAULT NULL,
  `npsn` varchar(255) DEFAULT NULL,
  `tingkat_pendidikan_id_str` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `getsekolah`
--

CREATE TABLE `getsekolah` (
  `id` int(11) NOT NULL,
  `sekolah_id` varchar(255) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `nss` varchar(255) DEFAULT NULL,
  `npsn` varchar(255) DEFAULT NULL,
  `bentuk_pendidikan_id` varchar(255) DEFAULT NULL,
  `bentuk_pendidikan_id_str` varchar(255) DEFAULT NULL,
  `status_sekolah` varchar(255) DEFAULT NULL,
  `status_sekolah_str` varchar(255) DEFAULT NULL,
  `alamat_jalan` varchar(255) DEFAULT NULL,
  `rt` varchar(255) DEFAULT NULL,
  `rw` varchar(255) DEFAULT NULL,
  `kode_wilayah` varchar(255) DEFAULT NULL,
  `kode_pos` varchar(255) DEFAULT NULL,
  `nomor_telepon` varchar(255) DEFAULT NULL,
  `nomor_fax` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `is_sks` varchar(255) DEFAULT NULL,
  `lintang` varchar(255) DEFAULT NULL,
  `bujur` varchar(255) DEFAULT NULL,
  `dusun` varchar(255) DEFAULT NULL,
  `desa_kelurahan` varchar(255) DEFAULT NULL,
  `kecamatan` varchar(255) DEFAULT NULL,
  `kabupaten_kota` varchar(255) DEFAULT NULL,
  `provinsi` varchar(255) DEFAULT NULL,
  `semester_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `iuran_cara_bayar`
--

CREATE TABLE `iuran_cara_bayar` (
  `id` int(11) NOT NULL,
  `uniq` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jenis_transaksi` int(11) NOT NULL,
  `semester_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `iuran_kategori`
--

CREATE TABLE `iuran_kategori` (
  `id` int(11) NOT NULL,
  `uniq` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nominal` int(11) NOT NULL,
  `jenis_iuran` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `iuran_mapping`
--

CREATE TABLE `iuran_mapping` (
  `id` int(11) NOT NULL,
  `uniq` varchar(255) NOT NULL,
  `rombongan_belajar_id` varchar(255) NOT NULL,
  `uniq_iuran` varchar(255) NOT NULL,
  `semester_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `iuran_pembayaran`
--

CREATE TABLE `iuran_pembayaran` (
  `id` int(11) NOT NULL,
  `peserta_didik_id` varchar(255) NOT NULL,
  `uniq_iuran` varchar(255) NOT NULL,
  `bulan_rutin` int(11) NOT NULL,
  `semester_id` int(11) NOT NULL,
  `nominal` bigint(20) NOT NULL,
  `cara_bayar` varchar(255) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `kategori_penyimpanan`
--

CREATE TABLE `kategori_penyimpanan` (
  `id` int(11) NOT NULL,
  `uniq` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `peran_id_str` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kategori_penyimpanan_mapping`
--

CREATE TABLE `kategori_penyimpanan_mapping` (
  `id` int(11) NOT NULL,
  `uniq` varchar(255) NOT NULL,
  `uniq_kategori` varchar(255) NOT NULL,
  `peran_id_str` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pembelajaran`
--

CREATE TABLE `pembelajaran` (
  `id` int(11) NOT NULL,
  `rombongan_belajar_id` varchar(255) DEFAULT NULL,
  `pembelajaran_id` varchar(255) DEFAULT NULL,
  `mata_pelajaran_id` varchar(255) DEFAULT NULL,
  `mata_pelajaran_id_str` varchar(255) DEFAULT NULL,
  `ptk_terdaftar_id` varchar(255) DEFAULT NULL,
  `ptk_id` varchar(255) DEFAULT NULL,
  `nama_mata_pelajaran` varchar(255) DEFAULT NULL,
  `induk_pembelajaran_id` varchar(255) DEFAULT NULL,
  `jam_mengajar_per_minggu` varchar(255) DEFAULT NULL,
  `status_di_kurikulum` varchar(255) DEFAULT NULL,
  `status_di_kurikulum_str` varchar(255) DEFAULT NULL,
  `semester_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `penataan_linearitas`
--

CREATE TABLE `penataan_linearitas` (
  `id` int(11) NOT NULL,
  `uniq` text NOT NULL,
  `kurikulum_id` text NOT NULL,
  `program_keahlian` text NOT NULL,
  `nama_mapel` text NOT NULL,
  `sertifikat_pendidik` text NOT NULL,
  `kode_sertifikat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rwy_kepangkatan`
--

CREATE TABLE `rwy_kepangkatan` (
  `id` int(11) NOT NULL,
  `ptk_id` varchar(255) NOT NULL,
  `riwayat_kepangkatan_id` varchar(255) NOT NULL,
  `nomor_sk` varchar(255) NOT NULL,
  `tanggal_sk` varchar(255) NOT NULL,
  `tmt_pangkat` varchar(255) NOT NULL,
  `masa_kerja_gol_tahun` varchar(255) NOT NULL,
  `masa_kerja_gol_bulan` varchar(255) NOT NULL,
  `pangkat_golongan_id_str` varchar(255) NOT NULL,
  `semester_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rwy_pend_formal`
--

CREATE TABLE `rwy_pend_formal` (
  `id` int(11) NOT NULL,
  `ptk_id` varchar(255) DEFAULT NULL,
  `riwayat_pendidikan_formal_id` varchar(255) DEFAULT NULL,
  `satuan_pendidikan_formal` varchar(255) DEFAULT NULL,
  `fakultas` varchar(255) DEFAULT NULL,
  `kependidikan` varchar(255) DEFAULT NULL,
  `tahun_masuk` varchar(255) DEFAULT NULL,
  `tahun_lulus` varchar(255) DEFAULT NULL,
  `nim` varchar(255) DEFAULT NULL,
  `status_kuliah` varchar(255) DEFAULT NULL,
  `semester` varchar(255) DEFAULT NULL,
  `ipk` varchar(255) DEFAULT NULL,
  `prodi` varchar(255) DEFAULT NULL,
  `id_reg_pd` varchar(255) DEFAULT NULL,
  `bidang_studi_id_str` varchar(255) DEFAULT NULL,
  `jenjang_pendidikan_id_str` varchar(255) DEFAULT NULL,
  `gelar_akademik_id_str` varchar(255) DEFAULT NULL,
  `semester_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sertifikat_pendidik`
--

CREATE TABLE `sertifikat_pendidik` (
  `id` int(11) NOT NULL,
  `ptk_id` text NOT NULL,
  `nomor_sertifikat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `upload_file`
--

CREATE TABLE `upload_file` (
  `id` int(11) NOT NULL,
  `uniq` varchar(255) NOT NULL,
  `tanggal` datetime NOT NULL,
  `pengguna_id` varchar(255) NOT NULL,
  `peran_id_str` varchar(255) NOT NULL,
  `nama_file` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `ext` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `kategori_penyimpanan` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `vervalpd`
--

CREATE TABLE `vervalpd` (
  `id` int(11) NOT NULL,
  `nik` varchar(255) NOT NULL,
  `ket` text NOT NULL,
  `ket1` text NOT NULL,
  `nisn` text NOT NULL,
  `nik1` text NOT NULL,
  `nama` text NOT NULL,
  `tempat_lahir` text NOT NULL,
  `tanggal_lahir` text NOT NULL,
  `ibu_kandung` text NOT NULL,
  `jenis_kelamin` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `webservice`
--

CREATE TABLE `webservice` (
  `id` int(11) NOT NULL,
  `uniq` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `npsn` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota_rombel`
--
ALTER TABLE `anggota_rombel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `getgtk`
--
ALTER TABLE `getgtk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `getpengguna`
--
ALTER TABLE `getpengguna`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `getpesertadidik`
--
ALTER TABLE `getpesertadidik`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `getrombonganbelajar`
--
ALTER TABLE `getrombonganbelajar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `getsekolah`
--
ALTER TABLE `getsekolah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `iuran_cara_bayar`
--
ALTER TABLE `iuran_cara_bayar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `iuran_kategori`
--
ALTER TABLE `iuran_kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `iuran_mapping`
--
ALTER TABLE `iuran_mapping`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `iuran_pembayaran`
--
ALTER TABLE `iuran_pembayaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori_penyimpanan`
--
ALTER TABLE `kategori_penyimpanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori_penyimpanan_mapping`
--
ALTER TABLE `kategori_penyimpanan_mapping`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembelajaran`
--
ALTER TABLE `pembelajaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penataan_linearitas`
--
ALTER TABLE `penataan_linearitas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rwy_kepangkatan`
--
ALTER TABLE `rwy_kepangkatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rwy_pend_formal`
--
ALTER TABLE `rwy_pend_formal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sertifikat_pendidik`
--
ALTER TABLE `sertifikat_pendidik`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `upload_file`
--
ALTER TABLE `upload_file`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vervalpd`
--
ALTER TABLE `vervalpd`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `webservice`
--
ALTER TABLE `webservice`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggota_rombel`
--
ALTER TABLE `anggota_rombel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48505;
--
-- AUTO_INCREMENT for table `getgtk`
--
ALTER TABLE `getgtk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1555;
--
-- AUTO_INCREMENT for table `getpengguna`
--
ALTER TABLE `getpengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26906;
--
-- AUTO_INCREMENT for table `getpesertadidik`
--
ALTER TABLE `getpesertadidik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32991;
--
-- AUTO_INCREMENT for table `getrombonganbelajar`
--
ALTER TABLE `getrombonganbelajar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1419;
--
-- AUTO_INCREMENT for table `getsekolah`
--
ALTER TABLE `getsekolah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `iuran_cara_bayar`
--
ALTER TABLE `iuran_cara_bayar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `iuran_kategori`
--
ALTER TABLE `iuran_kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `iuran_mapping`
--
ALTER TABLE `iuran_mapping`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `iuran_pembayaran`
--
ALTER TABLE `iuran_pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `kategori_penyimpanan`
--
ALTER TABLE `kategori_penyimpanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `kategori_penyimpanan_mapping`
--
ALTER TABLE `kategori_penyimpanan_mapping`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `pembelajaran`
--
ALTER TABLE `pembelajaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12254;
--
-- AUTO_INCREMENT for table `penataan_linearitas`
--
ALTER TABLE `penataan_linearitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=421;
--
-- AUTO_INCREMENT for table `rwy_kepangkatan`
--
ALTER TABLE `rwy_kepangkatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3337;
--
-- AUTO_INCREMENT for table `rwy_pend_formal`
--
ALTER TABLE `rwy_pend_formal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2458;
--
-- AUTO_INCREMENT for table `sertifikat_pendidik`
--
ALTER TABLE `sertifikat_pendidik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `upload_file`
--
ALTER TABLE `upload_file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `vervalpd`
--
ALTER TABLE `vervalpd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=457;
--
-- AUTO_INCREMENT for table `webservice`
--
ALTER TABLE `webservice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
