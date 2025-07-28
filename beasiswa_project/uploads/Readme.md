# Aplikasi Pendaftaran Beasiswa Sederhana

Aplikasi ini merupakan sistem pendaftaran beasiswa berbasis web menggunakan PHP dan MySQL. Mahasiswa dapat melihat pilihan beasiswa, mendaftar beasiswa sesuai IPK, dan melihat hasil pendaftaran.

## 📁 Struktur Folder

/ (beasiswa_project)
│
├── index.php # Halaman utama / landing page
├── daftar.php # Formulir pendaftaran beasiswa
├── hasil.php # Halaman untuk melihat hasil pendaftaran
├── pilihan.php # Daftar jenis beasiswa & syaratnya
├── proses_daftar.php # Proses backend untuk menyimpan data pendaftaran
├── style.css # File styling untuk semua halaman
├── uploads/ # Folder tempat menyimpan berkas yang diupload
│ └── <file>.pdf # File syarat pendaftaran yang diunggah user
├── Readme.md #deskripsi aplikasi, struktur, dan cara menjalankan

CREATE TABLE pendaftaran (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100),
    email VARCHAR(100),
    hp VARCHAR(20),
    semester INT,
    ipk FLOAT,
    jenis_beasiswa VARCHAR(50),
    berkas VARCHAR(255),
    status_ajuan VARCHAR(50) DEFAULT 'belum di verifikasi'
);