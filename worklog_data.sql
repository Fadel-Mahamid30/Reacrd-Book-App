-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Jul 2023 pada 04.19
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
-- Database: `worklog_data`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `absensis`
--

CREATE TABLE `absensis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `status_absensi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_kerja` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shift_id` bigint(20) UNSIGNED NOT NULL,
  `jam_masuk` time DEFAULT NULL,
  `jam_keluar` time DEFAULT NULL,
  `terlambat` int(11) DEFAULT NULL,
  `latitude` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `longitude` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `absensis`
--

INSERT INTO `absensis` (`id`, `tanggal`, `status_absensi`, `tempat_kerja`, `shift_id`, `jam_masuk`, `jam_keluar`, `terlambat`, `latitude`, `longitude`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '2023-07-01', 'Hadir', 'Kantor', 1, '08:00:00', '17:00:00', 0, '-6.3541914', '106.8385086', 3, NULL, NULL),
(2, '2023-07-02', 'Hadir', 'Kantor', 1, '08:00:00', '17:00:00', 0, '-6.3541914', '106.8385086', 3, NULL, NULL),
(3, '2023-07-03', 'Hadir', 'Kantor', 2, '12:00:00', '20:09:00', 0, '-6.3541914', '106.8385086', 3, NULL, '2023-07-03 04:46:14'),
(4, '2023-07-04', 'Hadir', 'Kantor', 1, '07:46:00', '17:00:00', 0, '-6.3541914', '106.8385086', 3, NULL, '2023-07-29 08:49:36'),
(5, '2023-07-05', 'Hadir', 'Kantor', 2, '08:00:00', '17:00:00', 0, '-6.3541914', '106.8385086', 3, NULL, '2023-07-03 04:41:01'),
(6, '2023-07-06', 'Hadir', 'Kantor', 2, '11:55:00', '20:15:00', 0, '-6.3541914', '106.8385086', 3, NULL, '2023-07-03 04:39:22'),
(7, '2023-07-07', 'Hadir', 'Kantor', 1, '08:00:00', '17:00:00', 0, '-6.3541914', '106.8385086', 3, NULL, '2023-07-29 07:49:25'),
(8, '2023-07-01', 'Hadir', 'Kantor', 1, '08:00:00', '17:00:00', 0, '-6.3541914', '106.8385086', 4, NULL, NULL),
(9, '2023-07-02', 'Hadir', 'Kantor', 1, '08:00:00', '17:00:00', 0, '-6.3541914', '106.8385086', 4, NULL, NULL),
(11, '2023-07-04', 'Hadir', 'Kantor', 1, '11:56:00', '20:11:00', 236, '-6.3541914', '106.8385086', 4, NULL, '2023-07-03 04:45:05'),
(12, '2023-07-05', 'Hadir', 'Kantor', 1, '08:04:00', '17:08:00', 4, '-6.3541914', '106.8385086', 4, NULL, '2023-07-03 04:41:39'),
(13, '2023-07-06', 'Sakit', 'Kantor', 1, '00:00:00', '00:00:00', 0, '-6.3541914', '106.8385086', 4, NULL, '2023-07-03 04:48:48'),
(14, '2023-07-07', 'Hadir', 'Kantor', 1, '08:00:00', '17:00:00', 0, '-6.3541914', '106.8385086', 4, NULL, NULL),
(15, '2023-07-01', 'Hadir', 'Kantor', 1, '08:00:00', '17:00:00', 0, '-6.3541914', '106.8385086', 5, NULL, NULL),
(16, '2023-07-02', 'Hadir', 'Kantor', 1, '08:01:00', '17:12:00', 1, '-6.3541914', '106.8385086', 5, NULL, '2023-07-03 04:47:16'),
(17, '2023-07-03', 'Hadir', 'Kantor', 1, '08:00:00', '17:00:00', 0, '-6.3541914', '106.8385086', 5, NULL, NULL),
(18, '2023-07-04', 'Hadir', 'Kantor', 1, '08:00:00', '17:00:00', 0, '-6.3541914', '106.8385086', 5, NULL, NULL),
(19, '2023-07-05', 'Hadir', 'Kantor', 2, '12:01:00', '20:09:00', 1, '-6.3541914', '106.8385086', 5, NULL, '2023-07-03 04:42:17'),
(20, '2023-07-06', 'Hadir', 'Kantor', 1, '08:10:00', '17:00:00', 10, '-6.3541914', '106.8385086', 5, NULL, '2023-07-03 04:38:08'),
(21, '2023-07-07', 'Hadir', 'Kantor', 1, '08:05:00', '17:00:00', 5, '-6.3541914', '106.8385086', 5, NULL, '2023-07-03 04:36:50'),
(22, '2023-07-01', 'Hadir', 'Kantor', 1, '08:00:00', '17:00:00', 0, '-6.3541914', '106.8385086', 6, NULL, NULL),
(23, '2023-07-02', 'Hadir', 'Kantor', 1, '08:00:00', '17:00:00', 0, '-6.3541914', '106.8385086', 6, NULL, NULL),
(24, '2023-07-03', 'Hadir', 'Kantor', 1, '08:00:00', '17:00:00', 0, '-6.3541914', '106.8385086', 6, NULL, NULL),
(25, '2023-07-04', 'Hadir', 'Kantor', 1, '08:07:00', '17:00:00', 7, '-6.3541914', '106.8385086', 6, NULL, '2023-07-03 04:43:17'),
(26, '2023-07-05', 'Hadir', 'Kantor', 1, '08:00:00', '17:00:00', 0, '-6.3541914', '106.8385086', 6, NULL, NULL),
(27, '2023-07-06', 'Hadir', 'Kantor', 1, '08:00:00', '17:00:00', 0, '-6.3541914', '106.8385086', 6, NULL, NULL),
(28, '2023-07-07', 'Hadir', 'Kantor', 2, '11:57:00', '20:00:00', 0, '-6.3541914', '106.8385086', 6, NULL, '2023-07-03 04:37:42'),
(29, '2023-07-01', 'Hadir', 'Kantor', 1, '08:00:00', '17:00:00', 0, '-6.3541914', '106.8385086', 7, NULL, NULL),
(30, '2023-07-02', 'Hadir', 'Kantor', 1, '08:00:00', '17:00:00', 0, '-6.3541914', '106.8385086', 7, NULL, NULL),
(31, '2023-07-03', 'Hadir', 'Kantor', 2, '11:58:00', '20:12:00', 0, '-6.3541914', '106.8385086', 7, NULL, '2023-07-03 04:46:39'),
(32, '2023-07-04', 'Hadir', 'Kantor', 1, '08:00:00', '17:00:00', 0, '-6.3541914', '106.8385086', 7, NULL, NULL),
(33, '2023-07-05', 'Hadir', 'Kantor', 1, '08:00:00', '17:00:00', 0, '-6.3541914', '106.8385086', 7, NULL, NULL),
(34, '2023-07-06', 'Hadir', 'Kantor', 1, '08:04:00', '17:00:00', 4, '-6.3541914', '106.8385086', 7, NULL, '2023-07-03 04:38:46'),
(35, '2023-07-07', 'Hadir', 'Kantor', 1, '08:00:00', '17:00:00', 0, '-6.3541914', '106.8385086', 7, NULL, NULL),
(36, '2023-07-01', 'Izin', 'Kantor', 1, '00:00:00', '00:00:00', 0, '-6.3541914', '106.8385086', 8, NULL, '2023-07-03 04:49:11'),
(37, '2023-07-02', 'Hadir', 'Kantor', 1, '08:00:00', '17:00:00', 0, '-6.3541914', '106.8385086', 8, NULL, NULL),
(38, '2023-07-03', 'Hadir', 'Kantor', 1, '08:00:00', '17:00:00', 0, '-6.3541914', '106.8385086', 8, NULL, NULL),
(39, '2023-07-04', 'Hadir', 'Kantor', 2, '11:50:00', '20:06:00', 0, '-6.3541914', '106.8385086', 8, NULL, '2023-07-03 04:44:33'),
(40, '2023-07-05', 'Hadir', 'Kantor', 1, '08:00:00', '17:00:00', 0, '-6.3541914', '106.8385086', 8, NULL, NULL),
(41, '2023-07-06', 'Hadir', 'Kantor', 2, '11:54:00', '20:11:00', 0, '-6.3541914', '106.8385086', 8, NULL, '2023-07-03 04:43:37'),
(42, '2023-07-07', 'Hadir', 'Kantor', 1, '08:06:00', '17:00:00', 6, '-6.3541914', '106.8385086', 8, NULL, '2023-07-29 08:46:21'),
(43, '2023-07-01', 'Hadir', 'Kantor', 2, '12:00:00', '20:12:00', 0, '-6.3541914', '106.8385086', 9, NULL, '2023-07-03 04:48:28'),
(44, '2023-07-02', 'Hadir', 'Kantor', 2, '11:56:00', '20:18:00', 0, '-6.3541914', '106.8385086', 9, NULL, '2023-07-03 04:47:54'),
(45, '2023-07-03', 'Hadir', 'Kantor', 1, '08:00:00', '17:00:00', 0, '-6.3541914', '106.8385086', 9, NULL, NULL),
(46, '2023-07-04', 'Hadir', 'Kantor', 2, '12:01:00', '20:11:00', 1, '-6.3541914', '106.8385086', 9, NULL, '2023-07-03 04:45:36'),
(47, '2023-07-05', 'Hadir', 'Kantor', 1, '08:00:00', '17:00:00', 0, '-6.3541914', '106.8385086', 9, NULL, NULL),
(48, '2023-07-06', 'Hadir', 'Kantor', 1, '08:07:00', '17:11:00', 7, '-6.3541914', '106.8385086', 9, NULL, '2023-07-03 04:40:11'),
(49, '2023-07-07', 'Hadir', 'Kantor', 1, '08:00:00', '17:00:00', 0, '-6.3541914', '106.8385086', 9, NULL, NULL),
(50, '2023-07-03', 'Hadir', 'Kantor', 1, '08:00:00', '17:00:00', 0, '-6.3541914', '106.8385086', 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `divisis`
--

CREATE TABLE `divisis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `divisi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `divisis`
--

INSERT INTO `divisis` (`id`, `divisi`, `created_at`, `updated_at`) VALUES
(1, 'Pimpinan', '2023-07-28 11:48:52', '2023-07-28 11:48:52'),
(2, 'Admin', '2023-07-28 11:48:53', '2023-07-28 11:48:53'),
(3, 'SDM IT', '2023-07-28 11:48:53', '2023-07-28 11:48:53'),
(4, 'Akademik', '2023-07-28 11:48:53', '2023-07-28 11:48:53'),
(5, 'Marketing', '2023-07-28 11:48:53', '2023-07-28 11:48:53');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `logbook_notes`
--

CREATE TABLE `logbook_notes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_kerja` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `logbook_dibuat_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `logbook_notes`
--

INSERT INTO `logbook_notes` (`id`, `item_kerja`, `deskripsi`, `logbook_dibuat_id`, `created_at`, `updated_at`) VALUES
(1, 'Membuat desain grafis untuk banner promosi.', 'Membuat desain grafis menarik dan kreatif untuk banner promosi di berbagai platform digital, sehingga dapat menarik minat calon siswa untuk mendaftar di bimbel dan les privat.', 1, NULL, NULL),
(2, 'Merancang poster promosi untuk acara les privat.', 'Merancang poster promosi yang menarik dan informatif untuk acara les privat tertentu, dengan mempertimbangkan target audiens dan tujuan pemasaran.', 2, NULL, NULL),
(3, 'Mengelola akun media sosial perusahaan.', 'Mengelola akun media sosial perusahaan, seperti Instagram, dengan membuat postingan kreatif dan informatif tentang kegiatan bimbel dan les privat, serta memastikan keterlibatan pengguna dan pertumbuhan jumlah pengikut.', 3, NULL, NULL),
(4, 'Melakukan analisis kata kunci untuk strategi SEO website.', 'Melakukan penelitian kata kunci yang relevan dengan les privat dan bimbel, serta menerapkan strategi SEO yang efektif untuk meningkatkan peringkat website perusahaan di mesin pencari.', 4, NULL, NULL),
(5, 'Mengoptimalkan konten website untuk meningkatkan visibilitas.', 'Mengoptimalkan konten website dengan menggunakan teknik SEO on-page, seperti mengoptimalkan judul halaman, meta deskripsi, dan struktur URL, guna meningkatkan visibilitas dan peringkat website di mesin pencari.', 5, NULL, NULL),
(6, 'Membuat laman web baru untuk produk les privat.', 'Membuat laman web yang menarik dan informatif tentang berbagai program les privat yang ditawarkan, termasuk deskripsi program, jadwal, biaya, dan testimoni siswa.', 6, NULL, NULL),
(7, 'Mengelola dan memperbarui konten produk di website.', 'Mengelola dan memperbarui konten produk les privat di website, seperti mengubah informasi program, menambahkan artikel pendidikan terkait, dan mengganti gambar atau video yang relevan.', 7, NULL, NULL),
(8, 'Membuat konten visual untuk media sosial.', 'Membuat konten visual menarik, seperti gambar dan video pendek, untuk diposting di media sosial perusahaan, dengan tujuan untuk meningkatkan keterlibatan pengguna dan memperluas jangkauan konten.', 8, NULL, NULL),
(9, 'Melakukan riset kompetitor.', 'Melakukan riset tentang kompetitor di industri bimbel dan les privat, termasuk analisis kekuatan, kelemahan, dan strategi pemasaran mereka, untuk mendapatkan wawasan dan ide-ide baru dalam meningkatkan keunggulan perusahaan.', 9, NULL, NULL),
(10, 'Mengelola kampanye iklan online.', 'Merencanakan, mengimplementasikan, dan mengelola kampanye iklan online menggunakan platform periklanan seperti Google Ads atau Facebook Ads. Mengidentifikasi target audiens yang tepat, membuat iklan yang menarik, mengatur anggaran iklan, dan melakukan pemantauan serta optimisasi berkelanjutan untuk mencapai tujuan pemasaran.', 10, NULL, NULL),
(11, 'Menganalisis data pemasaran digital.', 'Mengumpulkan dan menganalisis data pemasaran digital, seperti lalu lintas website, konversi, dan metrik kinerja kampanye iklan. Menerjemahkan data tersebut menjadi wawasan yang dapat digunakan untuk meningkatkan efektivitas strategi pemasaran dan pengambilan keputusan yang lebih baik.', 11, NULL, NULL),
(12, 'Menyusun strategi pemasaran konten.', 'Merencanakan dan menyusun strategi pemasaran konten untuk meningkatkan kesadaran merek dan minat calon siswa. Membuat konten yang relevan dan menarik, seperti artikel blog, infografis, dan video pendidikan, serta mempromosikannya melalui berbagai saluran digital.', 12, NULL, NULL),
(13, 'Melakukan pemeliharaan dan pembaruan website.', 'Memastikan website perusahaan selalu berfungsi dengan baik dan diperbarui secara berkala. Melakukan pemeliharaan rutin, termasuk memperbaiki bug, mengoptimalkan kecepatan loading, dan memperbarui plugin atau tema. Memastikan tampilan website tetap menarik dan sesuai dengan perubahan tren desain.', 13, NULL, NULL),
(14, 'Membantu pengembangan produk dan layanan baru.', 'Berkolaborasi dengan tim pengembangan produk dan manajemen untuk memberikan masukan tentang kebutuhan dan preferensi pasar dalam hal bimbel dan les privat. Memberikan kontribusi ide dan saran untuk pengembangan program baru, metode pembelajaran inovatif, dan peningkatan kualitas layanan yang ditawarkan.', 14, NULL, NULL),
(15, 'Mencari dan merekrut guru bimbel atau les privat.', 'Melakukan pencarian dan seleksi guru yang berkualifikasi untuk mengajar di bimbel atau les privat perusahaan. Meninjau latar belakang pendidikan, pengalaman, dan kemampuan mengajar calon guru untuk memastikan kualitas pengajaran yang baik.', 15, NULL, NULL),
(16, 'Mengatur dan menyusun jadwal bimbel atau les privat.', 'Mengelola jadwal pengajaran dengan mengkoordinasikan waktu, tempat, dan guru yang tersedia. Menyesuaikan jadwal sesuai dengan kebutuhan siswa dan memastikan kelancaran proses pembelajaran.', 16, NULL, NULL),
(17, 'Menyusun modul pembelajaran dan materi ajar.', 'Mengembangkan modul pembelajaran yang terstruktur dan sesuai dengan kurikulum yang berlaku. Menyusun materi ajar yang komprehensif dan memastikan tersedianya sumber belajar yang relevan dan bermutu.', 17, NULL, NULL),
(18, 'Mengevaluasi perkembangan siswa.', 'Melakukan evaluasi terhadap kemajuan belajar siswa secara berkala. Menggunakan berbagai metode penilaian, seperti ujian, tugas, atau tes lainnya, untuk menilai pemahaman dan pencapaian siswa serta memberikan umpan balik yang konstruktif.', 18, NULL, NULL),
(19, 'Memberikan bimbingan akademik kepada siswa.', 'Memberikan bimbingan dan dorongan kepada siswa dalam mencapai tujuan akademik mereka. Membantu siswa memahami konsep yang sulit, memberikan strategi belajar yang efektif, dan memberikan motivasi dalam meningkatkan prestasi mereka.', 19, NULL, NULL),
(20, 'Mengembangkan program pembelajaran khusus.', 'Mengidentifikasi kebutuhan siswa yang memerlukan perhatian khusus, seperti siswa dengan kesulitan belajar atau siswa berprestasi tinggi. Mengembangkan program pembelajaran yang sesuai untuk memenuhi kebutuhan mereka dan memberikan dukungan yang dibutuhkan.', 20, NULL, NULL),
(21, 'Melakukan pemantauan dan evaluasi terhadap kualitas pengajaran.', 'Melakukan pemantauan terhadap kualitas pengajaran yang diberikan oleh guru-guru bimbel atau les privat. Menyusun dan melaksanakan program evaluasi pengajaran, serta memberikan umpan balik dan saran untuk meningkatkan kualitas pembelajaran.', 21, NULL, NULL),
(22, 'Mengelola program remedial atau pengayaan.', 'Mengidentifikasi siswa yang memerlukan bantuan tambahan dalam memahami materi pelajaran (program remedial) atau siswa yang membutuhkan tantangan lebih (program pengayaan). Mengatur dan mengelola program-program tersebut untuk meningkatkan hasil belajar siswa.', 22, NULL, NULL),
(23, 'Mengkoordinasikan program tryout.', 'Mengorganisir dan mengkoordinasikan program tryout sebagai persiapan siswa menghadapi ujian atau tes penting. Menyusun jadwal, mengatur lokasi, dan menghubungi peserta serta memberikan petunjuk dan panduan terkait program tryout.', 23, NULL, NULL),
(24, 'Melakukan analisis data hasil tryout.', 'Menganalisis data hasil tryout untuk mengidentifikasi kelemahan dan kekuatan siswa dalam memahami materi pelajaran. Menggunakan analisis ini untuk memberikan masukan kepada guru dan siswa guna meningkatkan strategi pembelajaran dan pemahaman materi.', 24, NULL, NULL),
(25, 'Mengembangkan dan mengelola program mentoring.', 'Merancang program mentoring yang efektif untuk membantu siswa dalam mempersiapkan diri untuk ujian atau tes penting. Mengidentifikasi mentor yang sesuai, memfasilitasi pertemuan antara mentor dan siswa, dan memastikan berlangsungnya bimbingan yang berkualitas.', 25, NULL, NULL),
(26, 'Mengelola sistem informasi siswa.', 'Mengelola dan memelihara basis data siswa yang terintegrasi. Memperbarui informasi pribadi, riwayat belajar, dan perkembangan siswa secara berkala. Memastikan data siswa tersedia secara akurat dan aman.', 26, NULL, NULL),
(27, 'Membantu dalam penyusunan kurikulum.', 'Berkontribusi dalam penyusunan kurikulum yang sesuai dengan kebutuhan siswa dan mengikuti standar pendidikan yang berlaku. Memberikan masukan dan saran dalam pengembangan materi pelajaran yang relevan dan metode pembelajaran yang efektif.', 27, NULL, NULL),
(28, 'Berkoordinasi dengan orang tua siswa.', 'Menjalin komunikasi yang efektif dengan orang tua siswa untuk memberikan informasi terkait perkembangan akademik anak mereka. Memberikan update mengenai prestasi siswa, rekomendasi peningkatan, dan menjawab pertanyaan atau kekhawatiran orang tua terkait pembelajaran anak mereka.', 28, NULL, NULL),
(29, 'Melakukan penilaian kebutuhan belajar siswa.', 'Mengidentifikasi kebutuhan belajar individu siswa melalui pengamatan, analisis kinerja, dan komunikasi dengan siswa dan orang tua. Merancang program pembelajaran yang disesuaikan dengan kebutuhan belajar siswa untuk memastikan kemajuan yang optimal.', 29, NULL, NULL),
(30, 'Menyusun dan mengembangkan materi pembelajaran digital.', 'Merancang, mengembangkan, dan mengkaji ulang materi pembelajaran digital yang inovatif dan menarik untuk meningkatkan interaksi dan keterlibatan siswa. Menggunakan teknologi pendidikan terkini dalam pengembangan materi, seperti video pembelajaran, animasi, atau platform pembelajaran daring.', 30, NULL, NULL),
(31, 'Mengadakan sesi bimbingan studi dan motivasi.', 'Mengadakan sesi bimbingan studi dan motivasi bagi siswa, baik secara individu maupun kelompok. Memberikan strategi efektif dalam mengatur waktu belajar, teknik belajar yang efisien, dan memberikan motivasi dan dukungan yang diperlukan bagi siswa.', 31, NULL, NULL),
(32, 'Melakukan koordinasi dengan sekolah dan lembaga pendidikan lainnya.', 'Berkoordinasi dengan sekolah dan lembaga pendidikan lainnya untuk memastikan sinergi antara program bimbel atau les privat dengan kurikulum yang berlaku. Mendiskusikan metode dan strategi pembelajaran yang efektif serta menjalin kerjasama untuk meningkatkan hasil belajar siswa.', 32, NULL, NULL),
(33, 'Menyusun laporan perkembangan belajar siswa.', 'Menyusun laporan reguler yang menggambarkan perkembangan belajar siswa, termasuk kehadiran, nilai ujian, dan evaluasi kemajuan. Berkomunikasi dengan orang tua atau wali siswa mengenai perkembangan belajar siswa dan memberikan rekomendasi untuk perbaikan yang diperlukan.', 33, NULL, NULL),
(34, 'Mengelola program penghargaan dan insentif.', 'Mengembangkan dan mengelola program penghargaan dan insentif untuk mendorong dan memotivasi siswa dalam mencapai hasil belajar yang baik. Mengatur sistem penghargaan, seperti sertifikat prestasi atau hadiah lainnya, dan memonitor partisipasi dan pencapaian siswa dalam program ini.', 34, NULL, NULL),
(35, 'Mengikuti perkembangan dan tren dalam dunia pendidikan.', 'Mengikuti perkembangan terkini dalam dunia pendidikan, termasuk kebijakan dan inovasi pendidikan. Mempelajari tren baru dalam metode pembelajaran, teknologi pendidikan, dan penelitian pendidikan untuk memperbarui dan meningkatkan strategi pembelajaran yang digunakan dalam bimbel atau les privat.', 35, NULL, NULL),
(36, 'Merancang dan melaksanakan strategi pemasaran.', 'Mengidentifikasi target pasar, menganalisis persaingan, dan merancang strategi pemasaran yang efektif untuk meningkatkan jumlah siswa yang mendaftar di bimbel dan les privat perusahaan.', 36, NULL, NULL),
(37, 'Mengembangkan dan melaksanakan kampanye pemasaran.', 'Mengembangkan kampanye pemasaran yang menarik, termasuk iklan online, pemasaran email, pemasaran media sosial, dan kegiatan promosi lainnya untuk meningkatkan kesadaran merek dan menghasilkan prospek baru.', 37, NULL, NULL),
(38, 'Menganalisis tren pasar dan mengidentifikasi peluang baru.', 'Melakukan riset pasar secara teratur untuk mengidentifikasi tren, kebutuhan, dan preferensi pelanggan potensial. Menggunakan informasi ini untuk mengidentifikasi peluang baru dalam meningkatkan penjualan dan kehadiran perusahaan di pasar.', 38, NULL, NULL),
(39, 'Membangun dan memelihara hubungan dengan pelanggan.', 'Membangun hubungan yang kuat dengan pelanggan saat ini dan potensial. Mengelola komunikasi dengan pelanggan melalui berbagai saluran, memberikan dukungan pelanggan yang efektif, dan memastikan kepuasan pelanggan yang tinggi.', 39, NULL, NULL),
(40, 'Mengatur dan berpartisipasi dalam acara pemasaran.', 'Mengatur dan mengkoordinasikan acara pemasaran, seperti pameran pendidikan, seminar, atau workshop. Berpartisipasi dalam acara tersebut untuk mempromosikan produk dan layanan bimbel dan les privat perusahaan.', 40, NULL, NULL),
(41, 'Mengelola konten pemasaran.', 'Membuat, mengedit, dan mengelola konten pemasaran yang menarik, termasuk materi promosi, brosur, panduan studi, dan konten digital lainnya. Memastikan konsistensi merek dan pesan perusahaan dalam semua materi pemasaran.', 41, NULL, NULL),
(42, 'Membangun kemitraan strategis.', 'Mengidentifikasi dan menjalin kemitraan dengan lembaga pendidikan, sekolah, atau organisasi lain yang dapat menjadi mitra strategis untuk mempromosikan produk dan layanan perusahaan. Melakukan negosiasi dan mengelola hubungan dengan mitra tersebut.', 42, NULL, '2023-07-29 07:50:28'),
(43, 'Membuat dan meluncurkan program referral.', 'Mengembangkan program referral untuk mendorong pelanggan saat ini untuk merekomendasikan bimbel dan les privat kepada teman dan keluarga mereka. Meluncurkan program ini dengan memastikan insentif yang menarik dan melakukan pemantauan dan penghargaan bagi pelanggan yang berhasil mereferensikan siswa baru.', 43, NULL, NULL),
(44, 'Melakukan riset pesaing.', 'Melakukan riset kompetitor untuk memahami strategi pemasaran pesaing di industri bimbel dan les privat. Menganalisis produk, harga, promosi, dan strategi distribusi pesaing. Menggunakan informasi ini untuk mengidentifikasi keunggulan kompetitif perusahaan dan mengembangkan strategi pemasaran yang lebih efektif.', 44, NULL, NULL),
(45, 'Melakukan analisis pasar dan segmentasi pelanggan.', 'Mengumpulkan data pasar dan melakukan analisis yang mendalam untuk memahami preferensi dan kebutuhan pelanggan potensial. Melakukan segmentasi pelanggan berdasarkan kriteria demografis, geografis, dan perilaku untuk mengarahkan upaya pemasaran dengan lebih efektif.', 45, NULL, NULL),
(46, 'Melakukan penelitian kata kunci untuk strategi pemasaran digital.', 'Melakukan penelitian kata kunci untuk strategi pemasaran digital, termasuk SEO (Search Engine Optimization) dan kampanye iklan online. Mengidentifikasi kata kunci yang relevan dengan bimbel dan les privat serta mengoptimalkan konten dan kampanye untuk meningkatkan visibilitas dan konversi.', 46, NULL, NULL),
(47, 'Melakukan survei dan analisis kepuasan pelanggan.', 'Melakukan survei pelanggan secara rutin untuk mengukur tingkat kepuasan dan memperoleh masukan yang berharga. Menganalisis data survei untuk mengidentifikasi area di mana perusahaan dapat meningkatkan pelayanan dan pengalaman pelanggan.', 47, NULL, NULL),
(48, 'Membangun dan mengelola strategi pemasaran email.', 'Merancang dan mengelola kampanye pemasaran email yang efektif untuk berkomunikasi dengan pelanggan dan calon siswa. Membuat konten yang menarik, merencanakan jadwal pengiriman, dan melakukan analisis hasil kampanye untuk meningkatkan tingkat keterlibatan dan konversi.', 48, NULL, NULL),
(49, 'Melakukan pemantauan dan analisis kinerja pemasaran.', 'Memantau dan menganalisis kinerja berbagai upaya pemasaran, termasuk iklan online, media sosial, kampanye email, dan kegiatan promosi lainnya. Menggunakan alat analisis untuk mengukur ROI (Return on Investment) dan mengidentifikasi area yang perlu ditingkatkan dalam strategi pemasaran.', 49, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2013_05_12_101028_create_divisis_table', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_05_12_084230_create_permission_tables', 1),
(7, '2023_05_12_101040_create_tanggal_pembuatan_logbooks_table', 1),
(8, '2023_05_12_101126_create_logbook_notes_table', 1),
(9, '2023_05_12_101208_create_shifts_table', 1),
(10, '2023_05_12_102222_create_absensis_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2),
(3, 'App\\Models\\User', 3),
(3, 'App\\Models\\User', 4),
(3, 'App\\Models\\User', 5),
(3, 'App\\Models\\User', 6),
(3, 'App\\Models\\User', 7),
(3, 'App\\Models\\User', 8),
(3, 'App\\Models\\User', 9),
(3, 'App\\Models\\User', 10),
(3, 'App\\Models\\User', 11);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'pimpinan', 'web', '2023-07-28 11:48:52', '2023-07-28 11:48:52'),
(2, 'admin', 'web', '2023-07-28 11:48:52', '2023-07-28 11:48:52'),
(3, 'user', 'web', '2023-07-28 11:48:52', '2023-07-28 11:48:52');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `shifts`
--

CREATE TABLE `shifts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `shift` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jam_masuk` time NOT NULL,
  `jam_keluar` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `shifts`
--

INSERT INTO `shifts` (`id`, `shift`, `jam_masuk`, `jam_keluar`, `created_at`, `updated_at`) VALUES
(1, 'Shift 1', '08:00:00', '17:00:00', '2023-07-28 11:49:13', '2023-07-28 11:49:13'),
(2, 'Shift 2', '12:00:00', '20:00:00', '2023-07-28 11:49:13', '2023-07-28 11:49:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tanggal_pembuatan_logbooks`
--

CREATE TABLE `tanggal_pembuatan_logbooks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tanggal_dibuat` date NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tanggal_pembuatan_logbooks`
--

INSERT INTO `tanggal_pembuatan_logbooks` (`id`, `tanggal_dibuat`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '2023-07-01', 3, NULL, NULL),
(2, '2023-07-02', 3, NULL, NULL),
(3, '2023-07-03', 3, NULL, NULL),
(4, '2023-07-04', 3, NULL, NULL),
(5, '2023-07-05', 3, NULL, NULL),
(6, '2023-07-06', 3, NULL, NULL),
(7, '2023-07-07', 3, NULL, NULL),
(8, '2023-07-01', 4, NULL, NULL),
(9, '2023-07-02', 4, NULL, NULL),
(10, '2023-07-03', 4, NULL, NULL),
(11, '2023-07-04', 4, NULL, NULL),
(12, '2023-07-05', 4, NULL, NULL),
(13, '2023-07-06', 4, NULL, NULL),
(14, '2023-07-07', 4, NULL, NULL),
(15, '2023-07-01', 5, NULL, NULL),
(16, '2023-07-02', 5, NULL, NULL),
(17, '2023-07-03', 5, NULL, NULL),
(18, '2023-07-04', 5, NULL, NULL),
(19, '2023-07-05', 5, NULL, NULL),
(20, '2023-07-06', 5, NULL, NULL),
(21, '2023-07-07', 5, NULL, NULL),
(22, '2023-07-01', 6, NULL, NULL),
(23, '2023-07-02', 6, NULL, NULL),
(24, '2023-07-03', 6, NULL, NULL),
(25, '2023-07-04', 6, NULL, NULL),
(26, '2023-07-05', 6, NULL, NULL),
(27, '2023-07-06', 6, NULL, NULL),
(28, '2023-07-07', 6, NULL, NULL),
(29, '2023-07-01', 7, NULL, NULL),
(30, '2023-07-02', 7, NULL, NULL),
(31, '2023-07-03', 7, NULL, NULL),
(32, '2023-07-04', 7, NULL, NULL),
(33, '2023-07-05', 7, NULL, NULL),
(34, '2023-07-06', 7, NULL, NULL),
(35, '2023-07-07', 7, NULL, NULL),
(36, '2023-07-01', 8, NULL, NULL),
(37, '2023-07-02', 8, NULL, NULL),
(38, '2023-07-03', 8, NULL, NULL),
(39, '2023-07-04', 8, NULL, NULL),
(40, '2023-07-05', 8, NULL, NULL),
(41, '2023-07-06', 8, NULL, NULL),
(42, '2023-07-07', 8, NULL, '2023-07-29 07:50:28'),
(43, '2023-07-01', 9, NULL, NULL),
(44, '2023-07-02', 9, NULL, NULL),
(45, '2023-07-03', 9, NULL, NULL),
(46, '2023-07-04', 9, NULL, NULL),
(47, '2023-07-05', 9, NULL, NULL),
(48, '2023-07-06', 9, NULL, NULL),
(49, '2023-07-07', 9, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kontak` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jenis_kelamin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `divisi_id` bigint(20) UNSIGNED NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `foto`, `nama`, `kontak`, `tanggal_lahir`, `jenis_kelamin`, `alamat`, `status`, `divisi_id`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'pimpinan@gmail.com', '$2y$10$hG9zpIaEwsLuaOfxxW3a8utP8Emg2mladlakV9CKnytXbsMe4fcGO', NULL, 'Arif Raharto', '081530129180', '1987-06-08', 'Pria', 'Jl. Akses UI No. 99, Tugu, Kec. Cimanggis, Kota Depok, Jawa Barat', 1, 1, NULL, NULL, '2023-07-28 11:49:22', '2023-07-30 02:15:38'),
(2, 'admin01@gmail.com', '$2y$10$xnZAPvoizLW8DxCQJJa/uOkrV1FNKPczk2d8hQ1dLDq7wxmPRTHmi', NULL, 'Siti Nur Khofifah', '082431147080', '2001-07-28', 'Wanita', 'Jl. Cibinong Indah No. 40, Cibinong, Jawa Barat', 1, 2, NULL, NULL, '2023-07-28 11:49:23', '2023-07-28 11:49:23'),
(3, 'user01@gmail.com', '$2y$10$lq4F317p20LfJq9fXOSxrOunJtQRtzLFKI5YjB2Two3egaiuccSHi', NULL, 'Candra Adi Nugroho', '085710678971', '2004-07-28', 'Pria', 'Jl. Depok Raya No. 12, Depok, Jawa Barat', 1, 3, NULL, NULL, '2023-07-28 11:49:24', '2023-07-28 11:49:24'),
(4, 'user02@gmail.com', '$2y$10$uJZx9x8hgKuvr4FrD5d.rO8pLUxOAKBdZrbVjlQ1VoIX2dzF9WNGS', NULL, 'Dewi Kusuma Wardhani', '085710678962', '2003-07-28', 'Wanita', 'Jl. Cibinong Indah No. 45, Cibinong, Jawa Barat', 1, 3, NULL, NULL, '2023-07-28 11:49:24', '2023-07-28 11:49:24'),
(5, 'user03@gmail.com', '$2y$10$xpMUZt5Rae6qNswogymepO/hpdwt0TuaQsnvLV0uAtcG0C1mKskZC', NULL, 'Eko Putra Santoso', '085710678953', '2003-07-28', 'Pria', 'Jl. Bogor Kota No. 78, Bogor Kota, Jawa Barat', 1, 4, NULL, NULL, '2023-07-28 11:49:24', '2023-07-28 11:49:24'),
(6, 'user04@gmail.com', '$2y$10$E9VbuB/AG1r2mCIM08.n/.BZCnPvty0du5fvZF7jNo1t9A4CbhUn6', NULL, 'Citra Fitriani Wijayanti', '085710678944', '2002-07-28', 'Wanita', 'Jl. Depok Jaya No. 32, Depok, Jawa Barat', 1, 4, NULL, NULL, '2023-07-28 11:49:24', '2023-07-28 11:49:24'),
(7, 'user05@gmail.com', '$2y$10$pFIWU2xaoJoqwZkxDiPsXeVTloUQ3fyQU/hGz/JN2SGpUkPIi9hwy', NULL, ' Fajar Ardhana Nugroho', '085710678935', '2004-07-28', 'Pria', 'Jl. Cibinong Permai No. 65, Cibinong, Jawa Barat', 1, 4, NULL, NULL, '2023-07-28 11:49:25', '2023-07-28 11:49:25'),
(8, 'user06@gmail.com', '$2y$10$aprtjQ/90fg0NVCr96XjQeEXvLefhL8vXx9ZL6HLg/E2JStvlmEzK', NULL, 'Anindita Dewi Maharani', '085710678926', '2001-07-28', 'Wanita', 'Jl. Bogor Kota No. 98, Bogor Kota, Jawa Barat', 1, 5, NULL, NULL, '2023-07-28 11:49:25', '2023-07-28 11:49:25'),
(9, 'user07@gmail.com', '$2y$10$3z5llWhXHCRr36Z1hZq3e.VKM8KxqGET6.8KWQwzwHGV4TiHOWpSu', NULL, 'Gilang Kusumo Putra', '085710678917', '2000-07-28', 'Pria', ' Jl. Depok No. 13, Depok, Jawa Barat', 1, 5, NULL, NULL, '2023-07-28 11:49:25', '2023-07-28 11:49:25'),
(10, 'fadelmahamid107@gmail.com', '$2y$10$eaNqW8Z7jy3vOkG5p6vDZeTLqd1OpglOwt2O1TNZcuIwo8EF.SVqe', NULL, 'Fadel Mahamid Ahmad', NULL, NULL, NULL, NULL, 0, 3, NULL, NULL, '2023-07-28 11:53:11', '2023-07-28 11:53:11'),
(11, 'user08@gmail.com', '$2y$10$xM8T8IeQwFt4Uh/CAT817e79HbRO/IFgL3okwW1z01a1igV/OS5Pa', NULL, 'Riski Aris Sandy', NULL, NULL, NULL, NULL, 0, 3, NULL, NULL, '2023-07-28 11:54:01', '2023-07-28 11:54:01');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `absensis`
--
ALTER TABLE `absensis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `absensis_shift_id_foreign` (`shift_id`),
  ADD KEY `absensis_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `divisis`
--
ALTER TABLE `divisis`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `logbook_notes`
--
ALTER TABLE `logbook_notes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `logbook_notes_logbook_dibuat_id_foreign` (`logbook_dibuat_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indeks untuk tabel `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indeks untuk tabel `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indeks untuk tabel `shifts`
--
ALTER TABLE `shifts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tanggal_pembuatan_logbooks`
--
ALTER TABLE `tanggal_pembuatan_logbooks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tanggal_pembuatan_logbooks_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_kontak_unique` (`kontak`),
  ADD KEY `users_divisi_id_foreign` (`divisi_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `absensis`
--
ALTER TABLE `absensis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT untuk tabel `divisis`
--
ALTER TABLE `divisis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `logbook_notes`
--
ALTER TABLE `logbook_notes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `shifts`
--
ALTER TABLE `shifts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tanggal_pembuatan_logbooks`
--
ALTER TABLE `tanggal_pembuatan_logbooks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `absensis`
--
ALTER TABLE `absensis`
  ADD CONSTRAINT `absensis_shift_id_foreign` FOREIGN KEY (`shift_id`) REFERENCES `shifts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `absensis_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `logbook_notes`
--
ALTER TABLE `logbook_notes`
  ADD CONSTRAINT `logbook_notes_logbook_dibuat_id_foreign` FOREIGN KEY (`logbook_dibuat_id`) REFERENCES `tanggal_pembuatan_logbooks` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tanggal_pembuatan_logbooks`
--
ALTER TABLE `tanggal_pembuatan_logbooks`
  ADD CONSTRAINT `tanggal_pembuatan_logbooks_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_divisi_id_foreign` FOREIGN KEY (`divisi_id`) REFERENCES `divisis` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
