-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2021 at 05:52 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sifd`
--

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `BERITA_ID` int(11) NOT NULL,
  `RW_ID` int(11) DEFAULT NULL,
  `RT_ID` int(11) DEFAULT NULL,
  `KAT_ID` int(11) DEFAULT NULL,
  `PENG_ID` int(11) DEFAULT NULL,
  `JUDUL` varchar(100) DEFAULT NULL,
  `ISI` mediumtext,
  `STATUS` varchar(30) DEFAULT NULL,
  `FOTO` varchar(100) DEFAULT NULL,
  `HAPUS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`BERITA_ID`, `RW_ID`, `RT_ID`, `KAT_ID`, `PENG_ID`, `JUDUL`, `ISI`, `STATUS`, `FOTO`, `HAPUS`) VALUES
(1, 1, 1, 2, 2, 'Zidane: Tak Ada Artinya Menonton Pertandingan Chelsea', 'Bola.net - Zinedine Zidane menegaskan bahwa Real Madrid harus berjuang bermain menjaga identitas mereka dalam duel tandang kontra Chelsea nanti. Los Blancos tidak boleh terlalu fokus pada kekuatan lawan.\r\n\r\nKamis (6/5/2021) nanti, Madrid akan menantang Chelsea di Stamford Bridge dalam duel leg kedua semifinal Liga Champions 2020/21. Los Blancos harus menang, tidak ada opsi lain.Madrid hanya bermain imbang 1-1 di kandang dalam duel leg pertama pekan lalu. Karena itu, Madrid harus melakukan segalanya untuk menang dan lolos ke final.\r\n\r\nZidane sudah tahu betul situasi itu. Dia juga bicara soal kekuatan Chelsea. Apa katanya? Tidak ada gunanya\r\nZidane tahu betul bahwa Chelsea adalah salah satu tim terkuat di Inggris saat ini. Kedatangan Thomas Tuchel telah mendongkrak performa The Blues.\r\n\r\nTuchel adalah pelatih dengan detail taktik luar biasa, setiap pertandingan Chelsea disiapkan dengan hati-hati. Artinya Madrid harus mengamati permainan Chelsea dan mencoba menyiapkan strategi balasan.Namun, ternyata hal itu tidak berlaku bagi Zidane. Baginya menonton semua laga Chelsea tidak akan terlalu berguna.\"Kami telah melihat semua pertandingan Chelsea, tapi itu semua tidak ada artinya besok karena pertandingan akan berjalan berbeda,\" buka Zidane di Realmadrid.com.', 'Aktif', 'chelsea-madrid_51eae5e.jpg', 0),
(2, 1, 1, 4, 3, 'Survei: 36 Juta Orang Nekat Mudik Meski Dilarang Pemerintah', 'Jakarta, CNN Indonesia -- Lembaga Survei Indikator Politik Indonesia menyebut ada 36 juta orang yang nekat mudik meski dilarang pemerintah. Angka itu diketahui dari survei yang dilakukan pada 13-17 April 2021.\r\n\r\nDirektur Eksekutif Indikator Politik Indonesia Burhanuddin Muhtadi menyebut 2,9 responden punya keinginan sangat besar untuk mudik tahun ini. Selain itu, ada 17,9 persen responden punya keinginan mudik cukup besar Lebaran ini.\"Ini bukan angka yang kecil, apalagi situasi pandemi belum selesai. Jumlah 20,8 persen dari total populasi pemilih, itu kurang lebih sekitar 36 juta orang,\" kata Burhan dalam jumpa pers daring, Selasa (4/5).\r\n\r\nDia menyebut populasi yang diikutsertakan dalam survei ini adalah orang yang punya hak pilih. Menurutnya, populasi itu berjumlah sekitar 180 juta orang.Indikator juga mencatat jumlah masyarakat yang mendukung larangan mudik tak sampai separuh populasi. Burhan menyebut hanya 45,8 persen responden yang mendukung larangan mudik.\r\n\"Yang tidak setuju 28 persen. Ini masukan buat pemerintah, termasuk Komite Penanganan Covid,\" tuturnya.\r\n\r\nSurvei dilakukan pada 13-17 April dengan melibatkan 1.200 orang responden. Survei ini memiliki toleransi kesalahan kurang lebih 2,9 persen pada tingkat kepercayaan 95 persen.Sebelumnya, pemerintah memutuskan melarang mudik pada masa libur Lebaran Idulfitri. Kebijakan akan diterapkan 6-17 Mei.Presiden Joko Widodo sempat menyebut masih ada 18,9 juta orang yang akan mudik tahun ini. Oleh karena itu, ia memerintahkan seluruh kepala daerah menggencarkan sosialisasi larangan mudik.\r\n\r\n\"Angkanya masih besar, 18,9 juta orang yang masih akan mudik. Oleh sebab itu, harus disampaikan terus larangan mudik ini agar bisa berkurang lagi,\" ungkap Jokowi seperti disiarkan kanal Youtube Sekretariat Presiden pada Kamis (29/4).', 'Nonaktif', 'hiruk-pikuk-warga-di-pelabuhan-sungai-jelang-pelarangan-mudik-lokal-10_169.jpeg', 0),
(3, 1, 1, 2, 3, 'DNA Eropa! 5 Alasan Real Madrid Bakal Pecundangi Chelsea dan Lolos ke Final Liga Champions', 'Bola.net - Real Madrid bertandang ke markas Chelsea, Stamford Bridge untuk melakoni partai leg kedua semifinal Liga Champions 2020/21 pada Kamis (6/5/2021) dini hari WIB.Tak ada pemenang dari leg pertama di Spanyol. Di kandang Madrid pekan lalu, kedua tim bermain seri 1-1. Chelsea unggul lewat gol Christian Pulisic menit 14, dan anak-anak asuh Zinedine Zidane menyamakan kedudukan melalui gol sang bomber Karim Benzema menit 29.\r\n\r\nChelsea maupun Madrid sama-sama telah memanaskan mesin untuk duel penentuan ini dengan kemenangan di liga masing-masing akhir pekan kemarin.Chelsea menang 2-0 menjamu Fulham di Premier League. Kai Havertz memborong dua gol, sedangkan kiper Edouard Mendy lagi-lagi tampil solid untuk membawa Chelsea meraih clean sheet. Sementara itu, Madrid menang menjamu Osasuna di La Liga, juga dengan skor 2-0, melalui gol-gol Eder Militao dan Casemiro yang tercipta di menit-menit akhir.\r\n\r\nTerlepas dari fakta bahwa Chelsea memiliki modal gol tandang, peluang Real Madrid untuk lolos ke final tetaplah cukup besar. Apa alasannya? Berikut ulasan selengkapnya.\r\n\r\n1.Kembalinya Sergio Ramos\r\n\r\nTerlepas dari cedera yang dialami Raphael Varane, Real Madrid mendapatkan kabar bagus dengan kembalinya sang kapten, Sergio Ramos yang sebelumnya harus absen karena cedera.Kembalinya Ramos tak hanya akan membuat pertahanan Real Madrid semakin tangguh, tetapi juga bakal membuat Los Blancos memiliki senjata mematikan ketika mendapat hadiah penalti atau set piece di gawang Chelsea.\r\n\r\nPasalnya, Ramos dikenal sangat piawai untuk membobol gawang lawan memanfaatkan situasi set piece. Musim ini Ramos sudah mencetak empat gol bagi Real Madrid.', 'Aktif', 'madrid-vs-liverpool-_8aae2d7.jpg', 0),
(4, 2, 8, 3, 22, 'Kerja Bakti', 'Besok hari minggu kita akan adakan kerja bakti untuk rt 3 rw 2 guna membersihkan selokan', 'Aktif', 'defaultberita.png', 0),
(5, 1, 7, 3, 42, 'Bansos', 'Bagi yang ingin mendapatkan bansos untuk tahun 2021 harap mengumpulkan kk dan ktp di pak RT. Paling lambat pengumpulan jam 18.00.\r\nBerkas-berkas yang telah dikumpulkan nanti kan di seleksi ulang oleh pihak desa.', 'Aktif', 'defaultberita.png', 0),
(6, 1, 2, 3, 13, 'Vaksin Gratis', 'bertepatan dengan dirgahayu kejaksaan kabupaten kediri, mengadakan acara vaksinasi gratis.\r\nBagi warga yang ingin berpartisipasi harap mengumpulkan foto ktp di pak RT langsung ataupun dikirim via WA. Pengumpulan paling lambat besok.\r\nUntuk jadwal vaksin akan menyusulbersama undangannya. Harap tetap patuhi prokes yaa....', 'Nonaktif', 'defaultberita.png', 0),
(7, 2, 3, 3, 45, 'Peduli Palestina', 'Dari rapat yang diadakan kemarin di rumah bapak sutoyo, kita semua bersepakat nebgada galang dana untuk saudara kita di palestina. Sumbangan yang diberikan dapat berupa uang, bahan makanan, obat-obatan, pakaian dll.\r\njika ada yang bertanya perihal acara peduli palestina dapat bertannya melalui kolom komentar', 'Aktif', 'defaultberita.png', 0),
(8, 6, 9, 3, 52, 'Vaksin Gratis', 'bertepatan dengan dirgahayu kejaksaan kabupaten kediri, mengadakan acara vaksinasi gratis.\r\nBagi warga yang ingin berpartisipasi harap mengumpulkan foto ktp di pak RT langsung ataupun dikirim via WA. Pengumpulan paling lambat besok.\r\nUntuk jadwal vaksin akan menyusulbersama undangannya. Harap tetap patuhi prokes yaa....', 'Aktif', 'defaultberita.png', 0),
(9, 7, 12, 4, 64, 'PEMILU', 'Acara pemilu untuk memilih Bupati dan Wakil bupati kediri bagi warga RT. diadakan dihalaman rumah bapak sarwani.\r\nacara diadakan pada:\r\nJam :08.00-12.00\r\nharap membawa FC KTP dan undangan\r\ndan jangan lupa menerapkan 3M karena adanya wabah firus korona', 'Aktif', 'defaultberita.png', 0),
(10, 7, 13, 4, 67, 'Pemilu bupati', 'Acara pemilu untuk memilih Bupati dan Wakil bupati kediri bagi warga RT. diadakan dihalaman rumah bapak Tamam.\r\nacara diadakan pada:\r\nJam :08.00-12.00\r\nharap membawa FC KTP dan undangan\r\ndan jangan lupa menerapkan 3M karena adanya wabah firus korona', 'Aktif', 'defaultberita.png', 0),
(11, 7, 14, 4, 70, 'Pemilihan Ketua RT', 'Karena masa jabatan keua RT sebentar lagi akan habis, maka akan diadakan rapat guna memilih kandidat ketua RT baru\r\nUntuk jam dan tempat pelaksanaan rapat menyusul. Mungkin warga ada kandidat atau mau mengajukan diri sebagaiketua RT monggo bisa komen di kolom komentar', 'Aktif', 'defaultberita.png', 0),
(12, 8, 16, 7, 16, 'Hari Lahir Pancasila', 'Bertepatan dengan hari lahirnya pancasila yang jatuh pada tanggal 1 Juni, Harap semua warga memasag atau mengibarkan bendera merah putih didepan rumah.\r\nHal ini guna mengenang jasa para pahlawan. Bagi yang tidak memasang atau mengibarkan bendera akan dikenakan sanksi beb\r\nmbayar uang kas sebesar 5000 rupiah. paham nggeh semua ?', 'Aktif', 'defaultberita.png', 0),
(13, 8, 17, 1, 76, 'Khataman Rutin', 'Tiap hariminggu akan diadakan khataman rutin di mushola. Bagi siapapun yang ingin mengikuti kathaman bisa langsung datang nggeh', 'Aktif', 'defaultberita.png', 0),
(14, 9, 19, 1, 81, 'Kajian Rutin Akhir Bulan', 'Besok akan diadakan kajian rutin akhir bulan di rumah bapak sutojo\r\nseperti biasa kajian diadakan guna menyampaikan rasa syukur kepada Yang Maha Kuasa dan Meminta agar wabah virus corona segera selesai.\r\n\r\nJangan Lupa yaaa :)', 'Aktif', 'defaultberita.png', 0),
(15, 9, 20, 2, 86, 'Lomba Voli Antar RT', 'Ayo bapak-bapak yang ingin ikut lomba voli antar RT bisa setor nama dari sekarang nggeh. Stor nama bisa langsung ke Pak RT vias WA atau dikolom komentar. Ayo partisipasinyta.', 'Aktif', 'defaultberita.png', 0),
(16, 9, 19, 1, 83, 'Tadarus', 'Assalamualaikum. Selamat siang semuanya \r\nsaya berencana mengadakan tadarus besok hari minggu\r\napakah ada yang mau ikut atau sekedar datang untuk semakan', 'Aktif', 'defaultberita.png', 0),
(17, 9, 18, 2, 80, 'Senam Aerobik', 'Monggo ibuk-ibuk, bapak-bapak dan semuanya. Akan diadakan senam bersama setiaphari minggu dihalaman Ibu kasiatun. \r\nIuran 2 ribu rupiah mawon.', 'Aktif', 'defaultberita.png', 0),
(18, 9, 18, 2, 80, 'Senam Lansia', 'Bagi yang punya kakek nenek seng sampun sepuh, monngo diikutkan senam lansia di balai desa setiap hari senin jam 7\r\nGratis tidak dipungut biaya karena program dari pemerintah langsung agar bagi mbah-mbah tetap sehat.', 'Aktif', 'defaultberita.png', 0),
(19, 8, 16, 1, 75, 'Hari Raya Idul Adha', 'Sebentar lagi umat muslim akan bertemu bulan yang mulia yaitu hari raya qurban atau hari raya idul adha.\r\nKarena kondidi pandemi dan mengikuti arahan pemerintah untuk menerapkan PPKM, dengan terpaksa sholat ied bersama dimasjid ditiadakan. Sholat ied akan diadakan dirumah masing2', 'Aktif', 'defaultberita.png', 0),
(20, 8, 16, 3, 75, 'Bansos', 'Bagi yang ingin mendapatkan bansos untuk tahun 2021 harap mengumpulkan kk dan ktp di pak RT. Paling lambat pengumpulan jam 18.00.\r\nBerkas-berkas yang telah dikumpulkan nanti kan di seleksi ulang oleh pihak desa.\r\n\r\n(Pemberitahuan dari desa langsung)', 'Aktif', 'defaultberita.png', 0),
(21, 6, 11, 7, 59, 'Bersih Desa', 'Selamat pagi semuanya salam sejahtera, Acara bersih desa tiap setahun sekali akan diadakan pada hari jumatr pagi jam 06.00 bertempat di depan makam desa tugurejo.\r\nSeperti biasa, kita harus tetap menjaga warisan leluhur kita yaitu dengan melaksanakan bersih desa. Harap membawa nasi atau engkong sendiri-sendiri nggeh.', 'Aktif', 'defaultberita.png', 0),
(22, 1, 1, 3, 4, 'Rapat Rutinan RT', 'Rapat rutinan RT dilaksanakan Jam 17.00 dirumah bapak sobirin selaku ketua RT\r\nhayo datang ya', 'Nonaktif', 'defaultberita.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `dusun`
--

CREATE TABLE `dusun` (
  `DUSUN_ID` int(11) NOT NULL,
  `NAMA_DSN` varchar(30) DEFAULT NULL,
  `HAPUS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dusun`
--

INSERT INTO `dusun` (`DUSUN_ID`, `NAMA_DSN`, `HAPUS`) VALUES
(1, 'Luksongo', 0),
(2, 'Sukorame', 1),
(4, 'Dander', 0),
(5, 'Jeruk', 0),
(6, 'Babakan', 1),
(7, 'Ketami', 0);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `KAT_ID` int(11) NOT NULL,
  `JENIS_KAT` varchar(30) DEFAULT NULL,
  `HAPUS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`KAT_ID`, `JENIS_KAT`, `HAPUS`) VALUES
(1, 'Keagamaan', 0),
(2, 'Olahraga', 0),
(3, 'Sosial', 0),
(4, 'Politik', 0),
(6, 'Ekonomi', 1),
(7, 'Budaya', 0);

-- --------------------------------------------------------

--
-- Table structure for table `komen`
--

CREATE TABLE `komen` (
  `KOMEN_ID` int(11) NOT NULL,
  `PENG_ID` int(11) DEFAULT NULL,
  `BERITA_ID` int(11) DEFAULT NULL,
  `KOMEN` mediumtext,
  `STATUS` varchar(30) DEFAULT NULL,
  `TGL` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `komen`
--

INSERT INTO `komen` (`KOMEN_ID`, `PENG_ID`, `BERITA_ID`, `KOMEN`, `STATUS`, `TGL`) VALUES
(1, 2, 1, 'Assalamualaikum ...', 'Aktif', '2021-05-14 13:41:04'),
(2, 3, 1, 'waalaikumsalam', 'Aktif', '2021-05-14 13:58:53'),
(3, 4, 1, 'wah lagi seru banget ini , siapa yang dukung real madrid ini ?', 'Nonaktif', '2021-05-14 14:02:01'),
(4, 20, 9, 'pasti rame nih', 'Aktif', '2021-07-08 02:02:25'),
(5, 41, 6, 'Kapan dilaksanakan vaksinini?', 'Aktif', '2021-07-09 08:02:51'),
(6, 4, 22, 'Jangan Lupa untuk hadir', 'Aktif', '2021-07-09 08:37:46'),
(7, 39, 22, 'Tidak usah datang, tidak penting', 'Nonaktif', '2021-07-09 08:38:59'),
(8, 2, 1, 'Wah seru, harus liat ini', 'Aktif', '2021-07-09 08:56:12'),
(9, 4, 1, 'halo', 'Aktif', '2021-07-09 09:02:55');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `PENG_ID` int(11) NOT NULL,
  `RT_ID` int(11) DEFAULT NULL,
  `DUSUN_ID` int(11) DEFAULT NULL,
  `RW_ID` int(11) DEFAULT NULL,
  `NAMA` varchar(50) DEFAULT NULL,
  `EMAIL` varchar(30) DEFAULT NULL,
  `USERNAME` varchar(20) DEFAULT NULL,
  `PASSWORD` varchar(20) DEFAULT NULL,
  `LEVEL` varchar(20) DEFAULT NULL,
  `FOTO` varchar(100) DEFAULT NULL,
  `HAPUS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`PENG_ID`, `RT_ID`, `DUSUN_ID`, `RW_ID`, `NAMA`, `EMAIL`, `USERNAME`, `PASSWORD`, `LEVEL`, `FOTO`, `HAPUS`) VALUES
(2, 1, 1, 1, 'Muhammad sobirin', 'sobirin02@gmail.com', 'sobirin', 'sobirin', 'Ketua RT', 'Ilustrasi Buah Apel-Blogger Lobby-Final Result.jpg', 0),
(3, 1, 1, 1, 'Ahmad Baizaki', 'ahmad03@gmail.com', 'ahmad', 'ahmad', 'Warga', 'jack.jpg', 0),
(4, 1, 1, 1, 'Putri berliana', 'berliana22@gmail.com', 'putri', 'putri', 'Warga', '0.jpg', 0),
(5, NULL, 1, 1, 'Muhammad Fuad', 'mfuad01@gmail.com', 'mfuad01', 'mfuad', 'Ketua RW', 'defaultprofile.png', 0),
(6, NULL, NULL, NULL, 'Jarwo', 'jarwo17@gmail.com', 'jarwo', 'jarwo', 'Kepala Desa', 'WhatsApp Image 2021-07-09 at 14.12.25.jpeg', 0),
(8, NULL, 4, 6, 'Sucipto', 'cipto@gmail.com', 'sucipto', 'sucipto', 'Ketua RW', 'defaultprofile.png', 0),
(9, NULL, 5, 8, 'Panji', 'panji@gmail.com', 'panji', 'panji', 'Ketua RW', 'defaultprofile.png', 0),
(10, 9, 4, 6, 'Surono', 'surono@gmail.com', 'surono', 'surono', 'Ketua RT', 'defaultprofile.png', 0),
(11, 7, 1, 1, 'Masrukin', 'ukin@gmail.com', 'masrukin', 'masrukin', 'Ketua RT', 'defaultprofile.png', 0),
(12, 15, 5, 8, 'Suwaji', 'suwaji@gmail.com', 'suwaji', 'suwaji', 'Ketua RT', 'defaultprofile.png', 0),
(13, 2, 1, 1, 'Sri Wahyuni', 'yuni10@gmail.com', 'yuni', 'yuni', 'Warga', 'defaultprofile.png', 0),
(14, 3, 1, 2, 'Sriyati', 'sriyati@gmail.com', 'sriyati', 'sriyati', 'Warga', 'defaultprofile.png', 0),
(15, 12, 4, 7, 'Kristian', 'tian@gmail.com', 'tian', 'tian', 'Warga', 'defaultprofile.png', 0),
(16, 16, 5, 8, 'Jonathan', 'nathan@gmail.com', 'nathan', 'nathan', 'Warga', 'defaultprofile.png', 0),
(17, NULL, 5, 9, 'Supardi', 'pardi@gmail.com', 'supardi', 'supardi', 'Ketua RW', 'defaultprofile.png', 0),
(18, 19, 5, 9, 'Arianto', 'ari1@gmail.com', 'hadi', 'hadi', 'Ketua RT', 'defaultprofile.png', 0),
(19, 10, 5, 6, 'Rizaldo', 'rn@gmail.com', 'jado', 'jado', 'Warga', 'defaultprofile.png', 0),
(20, 12, 4, 7, 'Deta Berliana', 'deta@gmail.com', 'deta', 'deta', 'Warga', 'defaultprofile.png', 0),
(21, 18, 5, 9, 'Chen', 'chenle@yahoo.com', 'chenle', 'chenle', 'Warga', 'defaultprofile.png', 0),
(22, 8, 1, 2, 'Aiman Dermawan', 'aiman@gmail.com', 'aiman', 'aiman', 'Warga', 'defaultprofile.png', 0),
(23, NULL, 1, 2, 'Tri Sutrisno', 'trisno@yahoo.com', 'sutrisno', 'sutrisno', 'Ketua RW', 'defaultprofile.png', 0),
(24, NULL, 4, 7, 'Anton Jumadi', 'jum@yahoo.com', 'jumadi', 'jumadi', 'Ketua RW', 'defaultprofile.png', 0),
(25, 2, 1, 1, 'M. Suyanto', 'yanto@gmail.com', 'suyanto', 'suyanto', 'Ketua RT', 'defaultprofile.png', 0),
(26, 3, 1, 2, 'Masruri', 'ruri@yahoo.com', 'masruri', 'masruri', 'Ketua RT', 'defaultprofile.png', 0),
(27, 4, 1, 2, 'Suwito', 'wito@yahoo.com', 'suwito', 'suwito', 'Ketua RT', 'defaultprofile.png', 0),
(28, 8, 1, 2, 'Jariyanto', 'jari@gmail.com', 'jari', 'jari', 'Ketua RT', 'defaultprofile.png', 0),
(29, 10, 4, 6, 'Fahri', 'fah@yahoo.com', 'fahri', 'fahri', 'Ketua RT', 'defaultprofile.png', 0),
(30, 11, 4, 6, 'Iqbal Azril', 'iqball@yahoo.com', 'iqbal', 'iqbal', 'Ketua RT', 'defaultprofile.png', 0),
(31, 12, 4, 7, 'Sugik', 'ugik90@gamil.com', 'ugik', 'ugik', 'Ketua RT', 'defaultprofile.png', 0),
(32, 13, 4, 7, 'Risa Hanifah', 'risah@gmail.com', 'risa', 'risa', 'Ketua RT', 'defaultprofile.png', 0),
(33, 14, 4, 7, 'Jum Jumasri', 'jum@gmail.com', 'jumasri', 'jumasri', 'Ketua RT', 'defaultprofile.png', 0),
(34, 15, 5, 8, 'Suwaji', 'waji@yahoo.com', 'suwaji', 'suwaji', 'Ketua RT', 'defaultprofile.png', 0),
(35, 16, 5, 8, 'Muslikah', 'likah@gmail.com', 'likah', 'likah', 'Ketua RT', 'defaultprofile.png', 0),
(36, 17, 5, 8, 'Suri', 'sury@gmail.com', 'suri', 'suri', 'Ketua RT', 'defaultprofile.png', 0),
(37, 18, 5, 9, 'Ulfatul Lalila', 'ulfatul@gmail.com', 'ulfa', 'ulfa', 'Ketua RT', 'defaultprofile.png', 0),
(38, 20, 5, 9, 'Abidin Nur Hasyim', 'abidinnur@gmail.com', 'abidin', 'abidin', 'Ketua RT', 'defaultprofile.png', 0),
(39, 1, 1, 1, 'Sahriani Martin Ayupi', 'sahrianimartin3003@gmai.com', 'ayupi', 'ayupi', 'Warga', 'defaultprofile.png', 0),
(40, 2, 1, 1, 'Sahrian Bagus Setiawan', 'sahrian@gmail.com', 'bagus', 'bagus', 'Warga', 'defaultprofile.png', 0),
(41, 2, 1, 1, 'Aprilia Herawati', 'sahrianiaprilia@gmail.com', 'rara', 'rara', 'Warga', 'defaultprofile.png', 0),
(42, 7, 1, 1, 'Arif Setiawan', 'sahrianarif@gmail.com', 'rian', 'rian', 'Warga', 'defaultprofile.png', 0),
(43, 7, 1, 1, 'Adam Putra', 'adam@yahoo.com', 'adam', 'adam', 'Warga', 'defaultprofile.png', 0),
(44, 7, 1, 1, 'Dewi Purnama Putri', 'dewipp@gmail.com', 'dewi', 'dewi', 'Warga', 'defaultprofile.png', 0),
(45, 3, 1, 2, 'Fitria', 'fit@yahoo.com', 'fitri', 'fitri', 'Warga', 'defaultprofile.png', 0),
(46, 3, 1, 2, 'Deni Ramadhan', 'densoyi@gmail.com', 'deni', 'deni', 'Warga', 'defaultprofile.png', 0),
(47, 4, 1, 2, 'Oktavia Sinta', 'oktavia@gmail.com', 'sinta', 'sinta', 'Warga', 'defaultprofile.png', 0),
(48, 4, 1, 2, 'Dwi Susanti', 'sansan@gmail.com', 'santi', 'santi', 'Warga', 'defaultprofile.png', 0),
(49, 4, 1, 2, 'Serli Fitrianingrum', 'itsherl@gmail.com', 'serli', 'serli', 'Warga', 'defaultprofile.png', 0),
(50, 8, 1, 2, 'Trizha Juniar', 'niar@gmai.com', 'niar', 'niar', 'Warga', 'defaultprofile.png', 0),
(51, 8, 1, 2, 'Rizky', 'ris@yahoo.com', 'riski', 'riski', 'Warga', 'defaultprofile.png', 0),
(52, 9, 4, 6, 'Septiana anggreini', 'tiatia@gmail.com', 'tia', 'tia', 'Warga', 'defaultprofile.png', 0),
(53, 9, 4, 6, 'Emi Eriyani', 'emiemi01@gmail.com', 'emi', 'emi', 'Warga', 'defaultprofile.png', 0),
(54, 9, 4, 6, 'Ardi Nata', 'ardinata@gmail.com', 'ardi', 'ardi', 'Warga', 'defaultprofile.png', 0),
(55, 10, 4, 6, 'Amirul Fahri', 'amirul09@gmail.com', 'fahri', 'fahri', 'Warga', 'defaultprofile.png', 1),
(56, 10, 4, 6, 'Rizal priandana', 'rizalpriandana01@gmail.com', 'rizal', 'rizal', 'Warga', 'defaultprofile.png', 0),
(57, 10, 4, 6, 'Andik dermawan', 'andikmawan@gmail.com', 'andik', 'andik', 'Warga', 'defaultprofile.png', 0),
(58, 10, 4, 6, 'Ahmadar hermawan', 'ahmadar08@gmail.com', 'ahmadar', 'ahmadar', 'Warga', 'defaultprofile.png', 0),
(59, 11, 4, 6, 'Arik Kusuma', 'arikuskus@gmail.com', 'arik', 'arik', 'Warga', 'defaultprofile.png', 0),
(60, 14, 4, 6, 'Imam hartono', 'imamtono@gmail.com', 'imam', 'imam', 'Warga', 'defaultprofile.png', 0),
(61, 12, 4, 7, 'Suharto', 'harto00@gmail.com', 'harto', 'harto', 'Warga', 'defaultprofile.png', 0),
(62, 12, 4, 7, 'Detta Maharani', 'detamaha@gmail.com', 'maharani', 'maharani', 'Warga', 'defaultprofile.png', 0),
(63, 12, 4, 7, 'Septian Wijaya', 'tiantian@gmail.com', 'tian', 'tian', 'Warga', 'defaultprofile.png', 0),
(64, 12, 4, 7, 'Sutanto', 'tanto@gmail.com', 'tanto', 'tanto', 'Warga', 'defaultprofile.png', 0),
(65, 13, 4, 7, 'Suparti', 'partiiii@gmail.com', 'parti', 'parti', 'Warga', 'defaultprofile.png', 0),
(66, 13, 4, 7, 'Samiran', 'samiran00@gmail.com', 'samiran', 'samiran', 'Warga', 'defaultprofile.png', 0),
(67, 13, 4, 7, 'Puji Sulastri', 'pujilas@gmail.com', 'puji', 'puji', 'Warga', 'defaultprofile.png', 0),
(68, 12, 4, 7, 'Andika Mahardika', 'andikadika@gmail.com', 'andika', 'andika', 'Warga', 'defaultprofile.png', 0),
(69, 14, 4, 7, 'Aditya Suherman', 'adityatya@gmail.com', 'didit', 'didit', 'Warga', 'defaultprofile.png', 0),
(70, 14, 4, 7, 'David Hendrawan', 'davidhendra@gmail.com', 'david', 'david', 'Warga', 'defaultprofile.png', 0),
(71, 15, 5, 8, 'Aditya Permana', 'adityaya@gmail.com', 'adit', 'adit', 'Warga', 'defaultprofile.png', 0),
(72, 15, 5, 8, 'Furi Pertiwi', 'furipertiwi@gmail.com', 'furi', 'furi', 'Warga', 'defaultprofile.png', 0),
(73, 15, 5, 8, 'Fajar Achirudin Soleh', 'fajri@yahoo.com', 'fajar', 'fajar', 'Warga', 'defaultprofile.png', 0),
(74, 16, 5, 8, 'Faizal Izal', 'faizalizal@yahoo.com', 'faiz', 'faiz', 'Warga', 'defaultprofile.png', 0),
(75, 16, 5, 8, 'Muhidin Fanani', 'rfanani@gmail.com', 'fanani', 'fanani', 'Warga', 'defaultprofile.png', 0),
(76, 17, 5, 8, 'Paramitha', 'mita@gmail.com', 'mita', 'mita', 'Warga', 'defaultprofile.png', 0),
(77, 17, 5, 8, 'Via Alfiani Setiana', 'viasetiana@yahoo.com', 'via', 'via', 'Warga', 'defaultprofile.png', 0),
(78, 17, 5, 8, 'Sintia Dwiky', 'dwikysintia@yahoo.com', 'sintia', 'sintia', 'Warga', 'defaultprofile.png', 0),
(79, 18, 5, 9, 'Intan Frida', 'intan2404@gmail.com', 'intan', 'intan', 'Warga', 'defaultprofile.png', 0),
(80, 18, 5, 9, 'Anggi Nandahapsari', 'angginanda@gmail.com', 'anggi', 'anggi', 'Warga', 'defaultprofile.png', 0),
(81, 19, 5, 9, 'Viviana', 'viviana1@gmail.com', 'vivi', 'vivi', 'Warga', 'defaultprofile.png', 0),
(82, 19, 5, 9, 'Noveni Dian Prameswari', 'novenidian@gmail.com', 'noveni', 'noveni', 'Warga', 'defaultprofile.png', 0),
(83, 19, 5, 9, 'Ainun Najib', 'ainunnajib@gmail.com', 'ainun', 'ainun', 'Warga', 'defaultprofile.png', 0),
(84, 20, 5, 9, 'Nino Putra Pradana', 'nikopp@gmail.com', 'niko', 'niko', 'Warga', 'defaultprofile.png', 0),
(85, 20, 5, 9, 'Endah', 'endah@yahoo.com', 'endah', 'endah', 'Warga', 'defaultprofile.png', 0),
(86, 20, 5, 9, 'Robertus', 'robertus01@gmail.com', 'robet', 'robet', 'Warga', 'defaultprofile.png', 0),
(87, NULL, 6, 10, 'Lili Rusliana', 'lili@gmail.com', 'lili', 'lili', 'Ketua RW', 'defaultprofile.png', 1),
(88, 21, 6, 10, 'Lulu Rusliana', 'lulu@gmail.com', 'lulu', 'lulu', 'Ketua RT', 'defaultprofile.png', 1),
(89, NULL, NULL, NULL, 'Admin', 'admin@gmail.com', 'admin', 'admin', 'Staf IT', 'defaultprofile.png', 0),
(90, NULL, 7, 12, 'Arif Sahri', 'arif@gmail.com', 'arif', 'arif', 'Ketua RW', 'defaultprofile.png', 0),
(91, 3, 1, 2, 'Heri Purwati', 'heripurwati@gmail.com', 'atik', 'atik', 'Warga', 'defaultprofile.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `rukun_tetangga`
--

CREATE TABLE `rukun_tetangga` (
  `RT_ID` int(11) NOT NULL,
  `RW_ID` int(11) DEFAULT NULL,
  `RT` varchar(5) DEFAULT NULL,
  `HAPUS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rukun_tetangga`
--

INSERT INTO `rukun_tetangga` (`RT_ID`, `RW_ID`, `RT`, `HAPUS`) VALUES
(1, 1, '01', 0),
(2, 1, '02', 0),
(3, 2, '01', 0),
(4, 2, '02', 0),
(5, 3, '01', 0),
(6, 3, '02', 0),
(7, 1, '03', 0),
(8, 2, '03', 0),
(9, 6, '01', 0),
(10, 6, '02', 0),
(11, 6, '03', 0),
(12, 7, '01', 0),
(13, 7, '02', 0),
(14, 7, '03', 0),
(15, 8, '01', 0),
(16, 8, '02', 0),
(17, 8, '03', 0),
(18, 9, '01', 0),
(19, 9, '02', 0),
(20, 9, '03', 0),
(21, 10, '09', 0),
(22, 12, '01', 0);

-- --------------------------------------------------------

--
-- Table structure for table `rukun_warga`
--

CREATE TABLE `rukun_warga` (
  `RW_ID` int(11) NOT NULL,
  `DUSUN_ID` int(11) DEFAULT NULL,
  `RW` varchar(5) DEFAULT NULL,
  `HAPUS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rukun_warga`
--

INSERT INTO `rukun_warga` (`RW_ID`, `DUSUN_ID`, `RW`, `HAPUS`) VALUES
(1, 1, '01', 0),
(2, 1, '02', 0),
(3, 2, '01', 0),
(4, 2, '02', 0),
(5, 2, '03', 1),
(6, 4, '03', 0),
(7, 4, '04', 0),
(8, 5, '05', 0),
(9, 5, '06', 0),
(10, 6, '09', 0),
(11, 7, '07', 0),
(12, 7, '09', 0);

-- --------------------------------------------------------

--
-- Table structure for table `warga`
--

CREATE TABLE `warga` (
  `NIK` varchar(20) NOT NULL,
  `PENG_ID` int(11) DEFAULT NULL,
  `NAMA_WG` varchar(40) DEFAULT NULL,
  `GENDER` varchar(10) DEFAULT NULL,
  `ALAMAT` varchar(50) DEFAULT NULL,
  `AGAMA` varchar(20) DEFAULT NULL,
  `NO_TELP` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `warga`
--

INSERT INTO `warga` (`NIK`, `PENG_ID`, `NAMA_WG`, `GENDER`, `ALAMAT`, `AGAMA`, `NO_TELP`) VALUES
('085788901445', 81, 'Viviana', 'Perempuan', 'Jl Trunojoyo 30', 'Kristen(Protestan)', '081335100808'),
('327102346198563', 44, 'Dewi Purnama Putri', 'Perempuan', 'Jalan Karet', 'Islam', '08937215464562'),
('3271023467353858', 43, 'Adam Putra', 'Laki-laki', 'Jalan Karet', 'Islam', '0893275463534'),
('3271034835854336', 42, 'Arif Setiawan', 'Laki-laki', 'Jalan Karet', 'Islam', '08162374725442'),
('3271037003000004', 39, 'Sahriani Martin Ayupi', 'Perempuan', 'Jalan Karet', 'Islam', '085735715207'),
('327103848364735', 41, 'Aprilia Herawati', 'Perempuan', 'Jalan Karet', 'Islam', '0872356462356'),
('327104328438364', 19, 'Rizaldo', 'Laki-laki', 'Jalan Kapuk', 'Hindu', '085216325372'),
('32710458623468', 13, 'Sri Wahyuni', 'Perempuan', 'Jalan Karet', 'Islam', '085786468345'),
('3271067894872508', 16, 'Jonathan', 'Laki-laki', 'Jalan Kapas', 'Katolik', '085815050398'),
('327107000009821', 40, 'Sahrian Bagus Setiawan', 'Laki-laki', 'Jalan Karet', 'Islam', '085784375556'),
('327107384672374', 21, 'Chen', 'Laki-laki', 'Jalan Penanggungan', 'Kong Hu Cu', '085538273826'),
('32710748625683', 22, 'Aiman Dermawan', 'Laki-laki', 'Jalan Kapuk', 'Islam', '082747537543'),
('3271082457374667', 20, 'Deta Berliana', 'Perempuan', 'Jalan Kemerdekaan', 'Buddha', '0873654834367'),
('3271089995673', 82, 'Noveni Dian Prameswari', 'Perempuan', 'Jl. Trunojoyo 5', 'Islam', '089242628623'),
('327109332748662', 79, 'Intan Frida', 'Perempuan', 'Jl. Trunojoyo', 'Islam', '085735335800'),
('32710933378646', 80, 'Anggi Nandahapsari', 'Perempuan', 'Jl Trunojoyo', 'Islam', '085321000987'),
('32710983456821', 15, 'Kristian', 'Laki-laki', 'Jalan Kapuk', 'Kristen(Protestan)', '0824569912645'),
('327109856238549', 14, 'Sriyati', 'Perempuan', 'Jalan Karet', 'Islam', '081234598754'),
('333006778002', 69, 'Aditya Suherman', 'Laki-laki', 'JL. Welirang', 'Islam', '085444782360'),
('333012467000', 60, 'Imam hartono', 'Laki-laki', 'JL. Welirang', 'Islam', '081332457890'),
('3330135670002', 58, 'Ahmadar hermawan', 'Laki-laki', 'JL. Arjuna 07', 'Islam', '0812340897666'),
('3330145678002', 54, 'Ardi Nata', 'Laki-laki', 'jl.Arjuna no.05', 'Kristen(Protestan)', '082345168907'),
('3330234511001', 52, 'Septiana anggreini', 'Perempuan', 'jl.Arjuna', 'Islam', '095156459001'),
('33302456018001', 62, 'Detta Maharani', 'Perempuan', 'jl.welirang', 'Kristen(Protestan)', '081224570980'),
('33304156608001', 64, 'Sutanto', 'Laki-laki', 'JL.Welirang', 'Kristen(Protestan)', '088567768009'),
('33306788901000', 68, 'Andika Mahardika', 'Laki-laki', 'JL. Welirang 06', 'Kristen(Protestan)', '085664890006'),
('333067890002', 53, 'Emi Eriyani', 'Perempuan', 'jl.arjuna no.05', 'Islam', '081335153456'),
('333078806190001', 61, 'Suharto', 'Laki-laki', 'Jl. Welirang', 'Islam', '085567009812'),
('333084365767200', 85, 'Endah', 'Perempuan', 'Jl. Trunojoyo 02', 'Islam', '0858346823782'),
('3330895634463700', 73, 'Fajar Achirudin Soleh', 'Laki-laki', 'Jl. Pegangsaan 28', 'Katolik', '08543132999'),
('3330912340012', 56, 'Rizal priandana', 'Laki-laki', 'Jl. Arjuna 05', 'Kristen(Protestan)', '089457897001'),
('3330984560007280', 83, 'Ainun Najib', 'Perempuan', 'Jl. Trunojoyo 1', 'Islam', '089452735783'),
('333150689002', 67, 'Puji Sulastri', 'Perempuan', 'JL. Welirang 05', 'Islam', '088564784002'),
('333162562366726', 78, 'Sintia Dwiky', 'Perempuan', 'Jl. Pegangsaan Gg. 1', 'Islam', '08523434318'),
('333230499002', 70, 'David Hendrawan', 'Laki-laki', 'JL. Welirang', 'Islam', '089675332006'),
('3332506170001', 63, 'Septian Wijaya', 'Laki-laki', 'Jl.Welirang', 'Kristen(Protestan)', '087354666601'),
('333452199108002', 66, 'Samiran', 'Laki-laki', 'Jl. Welirang 05', 'Islam', '08541678092'),
('333456987456000', 71, 'Aditya Permana', 'Laki-laki', 'Jl. Pegangsaan', 'Kong Hu Cu', '085784396875'),
('333586565806000', 84, 'Nino Putra Pradana', 'Laki-laki', 'Jl. Trunojoyo', 'Hindu', '085331729000'),
('333725783843827', 76, 'Paramitha', 'Perempuan', 'Jl. Pegangsaan Gg. 1', 'Islam', '0871134524324'),
('333745888904400', 74, 'Faizal Izal', 'Laki-laki', 'Jl. Pegangsaan 05', 'Islam', '0883436366663'),
('33382368253764', 77, 'Via Alfiani Setiana', 'Perempuan', 'Jl. Pegangsaan Gg 1', 'Islam', '0892735624322'),
('333825745723578', 86, 'Robertus', 'Laki-laki', 'Jl. Trunojoyo 9', 'Kristen(Protestan)', '081335678000'),
('33390812560001', 57, 'Andik dermawan', 'Laki-laki', 'Jl. Arjuna no 5', 'Kristen(Protestan)', '088654897012'),
('3339475476347448', 75, 'Muhidin Fanani', 'Laki-laki', 'Jl. Pegangsaan Gg. 1', 'Islam', '085890034866'),
('33397457467357', 72, 'Furi Pertiwi', 'Perempuan', 'Jl Pegangsaan 3', 'Islam', '089364563564'),
('3339823400006', 59, 'Arik Kusuma', 'Laki-laki', 'Jl. arjuna no.6', 'Islam', '089567156778'),
('33714500718000', 65, 'Suparti', 'Perempuan', 'Jl. wlirang 07', 'Islam', '0812555780016'),
('3571012835286532', 50, 'Trizha Juniar', 'Perempuan', 'Jalan Randu', 'Islam', '085218763263'),
('357102345147637', 51, 'Rizky', 'Laki-laki', 'Jalan Randu', 'Islam', '085346764182'),
('3571032538548715', 47, 'Oktavia Sinta', 'Perempuan', 'Jalan Randu', 'Islam', '08571723677628'),
('3571034518458731', 46, 'Deni Ramadhan', 'Laki-laki', 'Jalan Randu', 'Islam', '085212367268'),
('3571034562536253', 45, 'Fitria', 'Perempuan', 'Jalan Randu', 'Islam', '08125623516316'),
('35710347138457', 49, 'Serli Fitrianingrum', 'Perempuan', 'Jalan Randu', 'Islam', '0854167347834'),
('3571036901700001', 91, 'Heri Purwati', 'Perempuan', 'Jalan Karet', 'Islam', '085815050398'),
('3571072344764787', 48, 'Dwi Susanti', 'Perempuan', 'Jalan Randu', 'Islam', '08523716477236'),
('99239723764582', 3, 'Ahmad Baizaki', 'Laki-laki', 'jl. buana no 3', 'Islam', '089237234762'),
('9924398573474', 4, 'Putri berliana', 'Perempuan', 'jl. buana no 5', 'Katolik', '0892439584327');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`BERITA_ID`),
  ADD UNIQUE KEY `BERITA_PK` (`BERITA_ID`),
  ADD KEY `RELATIONSHIP_7_FK` (`KAT_ID`),
  ADD KEY `RELATIONSHIP_12_FK` (`RW_ID`),
  ADD KEY `RELATIONSHIP_16_FK` (`RT_ID`),
  ADD KEY `RELATIONSHIP_17_FK` (`PENG_ID`);

--
-- Indexes for table `dusun`
--
ALTER TABLE `dusun`
  ADD PRIMARY KEY (`DUSUN_ID`),
  ADD UNIQUE KEY `DUSUN_PK` (`DUSUN_ID`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`KAT_ID`),
  ADD UNIQUE KEY `KATEGORI_PK` (`KAT_ID`);

--
-- Indexes for table `komen`
--
ALTER TABLE `komen`
  ADD PRIMARY KEY (`KOMEN_ID`),
  ADD UNIQUE KEY `KOMEN_PK` (`KOMEN_ID`),
  ADD KEY `RELATIONSHIP_9_FK` (`BERITA_ID`),
  ADD KEY `RELATIONSHIP_18_FK` (`PENG_ID`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`PENG_ID`),
  ADD UNIQUE KEY `PENGGUNA_PK` (`PENG_ID`),
  ADD KEY `RELATIONSHIP_11_FK` (`RW_ID`),
  ADD KEY `RELATIONSHIP_13_FK` (`DUSUN_ID`),
  ADD KEY `RELATIONSHIP_15_FK` (`RT_ID`);

--
-- Indexes for table `rukun_tetangga`
--
ALTER TABLE `rukun_tetangga`
  ADD PRIMARY KEY (`RT_ID`),
  ADD UNIQUE KEY `RUKUN_TETANGGA_PK` (`RT_ID`),
  ADD KEY `RELATIONSHIP_14_FK` (`RW_ID`);

--
-- Indexes for table `rukun_warga`
--
ALTER TABLE `rukun_warga`
  ADD PRIMARY KEY (`RW_ID`),
  ADD UNIQUE KEY `RUKUN_WARGA_PK` (`RW_ID`),
  ADD KEY `RELATIONSHIP_4_FK` (`DUSUN_ID`);

--
-- Indexes for table `warga`
--
ALTER TABLE `warga`
  ADD PRIMARY KEY (`NIK`),
  ADD UNIQUE KEY `WARGA_PK` (`NIK`),
  ADD KEY `RELATIONSHIP_3_FK` (`PENG_ID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `berita`
--
ALTER TABLE `berita`
  ADD CONSTRAINT `FK_BERITA_RELATIONS_KATEGORI` FOREIGN KEY (`KAT_ID`) REFERENCES `kategori` (`KAT_ID`),
  ADD CONSTRAINT `FK_BERITA_RELATIONS_PENGGUNA` FOREIGN KEY (`PENG_ID`) REFERENCES `pengguna` (`PENG_ID`),
  ADD CONSTRAINT `FK_BERITA_RELATIONS_RUKUN_TE` FOREIGN KEY (`RT_ID`) REFERENCES `rukun_tetangga` (`RT_ID`),
  ADD CONSTRAINT `FK_BERITA_RELATIONS_RUKUN_WA` FOREIGN KEY (`RW_ID`) REFERENCES `rukun_warga` (`RW_ID`);

--
-- Constraints for table `komen`
--
ALTER TABLE `komen`
  ADD CONSTRAINT `FK_KOMEN_RELATIONS_BERITA` FOREIGN KEY (`BERITA_ID`) REFERENCES `berita` (`BERITA_ID`),
  ADD CONSTRAINT `FK_KOMEN_RELATIONS_PENGGUNA` FOREIGN KEY (`PENG_ID`) REFERENCES `pengguna` (`PENG_ID`);

--
-- Constraints for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD CONSTRAINT `FK_PENGGUNA_RELATIONS_DUSUN` FOREIGN KEY (`DUSUN_ID`) REFERENCES `dusun` (`DUSUN_ID`),
  ADD CONSTRAINT `FK_PENGGUNA_RELATIONS_RUKUN_TE` FOREIGN KEY (`RT_ID`) REFERENCES `rukun_tetangga` (`RT_ID`),
  ADD CONSTRAINT `FK_PENGGUNA_RELATIONS_RUKUN_WA` FOREIGN KEY (`RW_ID`) REFERENCES `rukun_warga` (`RW_ID`);

--
-- Constraints for table `rukun_tetangga`
--
ALTER TABLE `rukun_tetangga`
  ADD CONSTRAINT `FK_RUKUN_TE_RELATIONS_RUKUN_WA` FOREIGN KEY (`RW_ID`) REFERENCES `rukun_warga` (`RW_ID`);

--
-- Constraints for table `rukun_warga`
--
ALTER TABLE `rukun_warga`
  ADD CONSTRAINT `FK_RUKUN_WA_RELATIONS_DUSUN` FOREIGN KEY (`DUSUN_ID`) REFERENCES `dusun` (`DUSUN_ID`);

--
-- Constraints for table `warga`
--
ALTER TABLE `warga`
  ADD CONSTRAINT `FK_WARGA_RELATIONS_PENGGUNA` FOREIGN KEY (`PENG_ID`) REFERENCES `pengguna` (`PENG_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
