<?php
// ==========================
// Fungsi koneksi database
// ==========================
function koneksiDB() {
    // Membuat koneksi ke database (localhost, user=root, tidak pakai password, database: beasiswa_db)
    $conn = new mysqli("localhost", "root", "", "beasiswa_db");

    // Cek apakah koneksi berhasil, jika gagal tampilkan pesan dan hentikan program
    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    // Mengembalikan objek koneksi jika sukses
    return $conn;
}

// ==================================================
// Fungsi untuk mengambil semua data dari tabel pendaftaran
// ==================================================
function getPendaftar($conn) {
    // Jalankan query untuk mengambil semua data dari tabel pendaftaran
    $result = $conn->query("SELECT * FROM pendaftaran");

    // Siapkan array kosong untuk menampung data
    $pendaftar = [];

    // Ambil semua data baris demi baris dan simpan ke array
    while ($row = $result->fetch_assoc()) {
        $pendaftar[] = $row;
    }

    // Kembalikan seluruh data pendaftar sebagai array
    return $pendaftar;
}

// ==================================================
// Fungsi untuk menampilkan baris HTML data pendaftar
// ==================================================
function tampilkanDataPendaftar($pendaftar) {
    // Loop melalui tiap data pendaftar
    foreach ($pendaftar as $row) {
        echo "<tr>";

        // Tampilkan nama, email, hp, semester, ipk, dan jenis beasiswa
        echo "<td>" . htmlspecialchars($row['nama']) . "</td>";
        echo "<td>" . htmlspecialchars($row['email']) . "</td>";
        echo "<td>" . htmlspecialchars($row['hp']) . "</td>";
        echo "<td>" . htmlspecialchars($row['semester']) . "</td>";
        echo "<td>" . htmlspecialchars($row['ipk']) . "</td>";
        echo "<td>" . htmlspecialchars($row['jenis_beasiswa']) . "</td>";

        // Tampilkan link berkas jika tersedia, atau tulis "Tidak ada"
        echo "<td>";
        if (!empty($row['berkas']) && file_exists($row['berkas'])) {
            echo '<a href="' . htmlspecialchars($row['berkas']) . '" target="_blank">Lihat</a>';
        } else {
            echo "Tidak ada";
        }
        echo "</td>";

        // Tampilkan status ajuan (default: "belum di verifikasi" jika kosong)
        echo "<td>" . htmlspecialchars($row['status_ajuan'] ?? 'belum di verifikasi') . "</td>";
        echo "</tr>";
    }
}

// ==========================
// Eksekusi fungsi utama
// ==========================
$conn = koneksiDB();              // Koneksi ke database
$pendaftar = getPendaftar($conn); // Ambil seluruh data pendaftar
?>
<!DOCTYPE html>
<html>
<head>
    <title>Hasil Pendaftaran</title>

    <!-- Memuat CSS utama dan Bootstrap offline -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>

    <!-- Menu Navigasi -->
    <ul class="menu">
        <li><a href="pilihan.php">Pilihan Beasiswa</a></li>
        <li><a href="daftar.php">Daftar</a></li>
        <li><a href="hasil.php" class="active">Lihat Hasil</a></li>
    </ul>

    <!-- Judul halaman -->
    <h2>Daftar Hasil Pendaftaran</h2>

    <!-- Tabel data pendaftar -->
    <table>
        <tr>
            <th>Nama</th>
            <th>Email</th>
            <th>HP</th>
            <th>Semester</th>
            <th>IPK</th>
            <th>Beasiswa</th>
            <th>Berkas</th>
            <th>Status</th>
        </tr>

        <!-- Cetak baris data pendaftar -->
        <?php tampilkanDataPendaftar($pendaftar); ?>
    </table>

    <!-- Bootstrap JS offline -->
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>