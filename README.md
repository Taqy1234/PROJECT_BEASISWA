# project-beasiswa
ujian e-sekom

# Sistem Pendaftaran Beasiswa

Proyek ini merupakan aplikasi web sederhana untuk pendaftaran beasiswa, dikembangkan sebagai bagian dari sertifikasi *Junior Web Developer* program VSGA e-Serkom. Aplikasi ini dibangun menggunakan **PHP**, **MySQL**, **HTML**, **CSS**, dan **Bootstrap**, serta berjalan secara lokal menggunakan **XAMPP**.

## Fitur Utama

- Formulir pendaftaran beasiswa berbasis IPK (otomatis terisi dari sistem).
- Validasi otomatis: pilihan beasiswa & upload file hanya aktif jika IPK ≥ 3.0.
- Upload berkas syarat dalam format PDF atau ZIP.
- Penyimpanan data pendaftar ke database MySQL.
- Tabel hasil pendaftaran lengkap dengan status ajuan dan tautan berkas.

## Struktur File

- `index.php` – Halaman beranda dengan navigasi utama.
- `pilihan.php` – Menampilkan jenis dan syarat beasiswa.
- `daftar.php` – Formulir pendaftaran dan upload berkas.
- `proses_daftar.php` – Proses validasi, upload, dan penyimpanan ke database.
- `hasil.php` – Menampilkan data semua pendaftar dalam tabel.
- `style.css` – File CSS tambahan untuk custom styling.
- `uploads/` – Folder penyimpanan file yang diunggah.

## Struktur Database

Nama Tabel: `pendaftaran`

| Kolom           | Tipe Data     | Keterangan                          |
|-----------------|---------------|-------------------------------------|
| `id`            | int(11)       | Primary key, Auto Increment         |
| `nama`          | varchar(100)  | Nama lengkap pendaftar              |
| `email`         | varchar(100)  | Alamat email pendaftar              |
| `hp`            | varchar(20)   | Nomor HP                            |
| `semester`      | int(11)       | Semester saat ini                   |
| `ipk`           | float         | IPK terakhir (otomatis dari sistem) |
| `jenis_beasiswa`| varchar(50)   | Pilihan jenis beasiswa              |
| `berkas`        | varchar(255)  | Path file berkas yang diunggah      |
| `status_ajuan`  | varchar(50)   | Status proses ajuan                 |

> Default `status_ajuan`: **belum di verifikasi**

## Cara Menjalankan

1. **Clone/Extract** file project ke folder `htdocs` pada XAMPP.
2. **Import database**:
   - Buka `phpMyAdmin`.
   - Buat database baru: `beasiswa_db`.
   - Impor file SQL (buat manual sesuai struktur tabel di atas jika tidak tersedia).
3. Jalankan **Apache dan MySQL** via XAMPP.
4. Akses aplikasi melalui browser di `http://localhost/beasiswa_project/`.

## Catatan

- File `daftar.php` hanya memungkinkan submit jika `IPK ≥ 3.0`.
- File disimpan otomatis ke folder `uploads/` dengan nama unik.
- Belum tersedia panel admin atau fitur verifikasi status lanjutan.

## Lisensi

Proyek ini dibuat untuk tujuan edukasi dalam pelatihan *VSGA Junior Web Developer*.

