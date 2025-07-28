<?php
// Konstanta IPK minimum yang diperbolehkan untuk mendaftar
define("IPK_MINIMAL", 3.0);

// ------------------------------------
// Fungsi koneksi ke database MySQL
// ------------------------------------
function koneksiDB() {
    $conn = new mysqli("localhost", "root", "", "beasiswa_db"); // buat objek koneksi
    if ($conn->connect_error) {
        // Jika gagal terkoneksi, hentikan program dan tampilkan pesan error
        die("Koneksi gagal: " . $conn->connect_error);
    }
    return $conn; // Kembalikan objek koneksi
}

// --------------------------------------
// Fungsi untuk validasi nilai IPK
// --------------------------------------
function validasiIPK($ipk) {
    // Jika IPK kurang dari nilai minimum
    if ($ipk < IPK_MINIMAL) {
        // Tampilkan pesan dan kembalikan ke halaman daftar
        echo "<script>alert('IPK kurang dari " . IPK_MINIMAL . ". Tidak dapat mendaftar beasiswa.'); window.location.href='daftar.php';</script>";
        exit; // Hentikan eksekusi script
    }
}

// -----------------------------------------------------
// Fungsi untuk meng-handle proses upload file berkas
// -----------------------------------------------------
function uploadBerkas($file) {
    // Cek apakah ada file yang diupload dan tidak ada error
    if (isset($file) && $file['error'] === 0) {
        $folder = "uploads/"; // Folder tujuan penyimpanan
        $filename = basename($file['name']); // Ambil nama file asli
        $upload_path = $folder . time() . "_" . $filename; // Buat nama unik dengan timestamp

        // Pindahkan file dari temporary ke folder tujuan
        if (move_uploaded_file($file['tmp_name'], $upload_path)) {
            return $upload_path; // Kembalikan path jika berhasil
        }
    }
    return ""; // Jika gagal, kembalikan string kosong
}

// ------------------------------------------------------------------
// Fungsi untuk menyimpan data pendaftaran ke tabel 'pendaftaran'
// ------------------------------------------------------------------
function simpanPendaftaran($conn, $data) {
    // Query SQL untuk insert data ke tabel pendaftaran
    $sql = "INSERT INTO pendaftaran 
            (nama, email, hp, semester, ipk, jenis_beasiswa, berkas, status_ajuan)
            VALUES 
            (
                '{$data['nama']}', 
                '{$data['email']}', 
                '{$data['hp']}', 
                {$data['semester']}, 
                {$data['ipk']}, 
                '{$data['jenis_beasiswa']}', 
                '{$data['berkas']}', 
                'belum di verifikasi'
            )";

    // Jalankan query
    if ($conn->query($sql) === TRUE) {
        // Jika sukses, tampilkan pesan sukses dan arahkan ke halaman hasil
        echo "<script>alert('Pendaftaran berhasil!'); window.location.href='hasil.php';</script>";
    } else {
        // Jika gagal, tampilkan pesan error dari database
        echo "Error: " . $conn->error;
    }
}

// -----------------------------
// Blok utama eksekusi program
// -----------------------------

$conn = koneksiDB(); // Panggil fungsi koneksi DB

// Ambil data dari form dan simpan ke array asosiatif
$data = [
    'nama' => $_POST['nama'],
    'email' => $_POST['email'],
    'hp' => $_POST['hp'],
    'semester' => $_POST['semester'],
    'ipk' => $_POST['ipk'],
    'jenis_beasiswa' => $_POST['jenis_beasiswa'] ?? null, // jika tidak ada, nilainya null
    'berkas' => uploadBerkas($_FILES['berkas']) // panggil fungsi upload berkas
];

// Validasi IPK sebelum data disimpan
validasiIPK($data['ipk']);

// Simpan data pendaftaran ke database
simpanPendaftaran($conn, $data);

// Tutup koneksi database
$conn->close();
?>
